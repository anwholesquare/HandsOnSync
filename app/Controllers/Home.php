<?php


namespace App\Controllers;


use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Config\Database;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{


    use ResponseTrait;
    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
    }
    public function index(): string
    {
        return view('landingpage');
    }

    public function quiz()
    {
        helper(['auth']);
        if (isAuthenticated()) {
            return view('quizcentre');
        } else {
            return view('Auth/register.php');

        }

    }

    public function learn()
    {
        helper(['auth']);
        if (isAuthenticated()) {
            return view('learningcentre');
        } else {
            return view('Auth/register.php');

        }
    }


    public function register()
    {

        helper(['auth']);
        if (isAuthenticated()) {
            return redirect()->route('dashboard');
        } else {
            return view('Auth/register.php');

        }

    }

    public function login()
    {

        helper(['auth']);
        if (isAuthenticated()) {
            return redirect()->route('dashboard');
        } else {
            return view('Auth/login.php');

        }
    }

    public function authenticate()
    {
        $session = session();
        $db = Database::connect();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        try {
            $query = $db->query("SELECT * FROM users WHERE user_name = ?", [$username]);
            $user = $query->getRow();
            print_r($user);
            if ($user) {
                if (password_verify($password, $user->token)) {
                    $ses_data = [
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                        'email' => $user->email,
                        'logged_in' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->route('dashboard');
                } else {
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    return redirect()->route('login');
                }
            } else {
                $session->setFlashdata('msg', 'Username does not exist.');
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            $session->setFlashdata('msg', 'Database error: ' . $e->getMessage());
            return redirect()->route('login');
        }
    }

    public function store()
    {
        helper(['form', 'url', 'text']);

        $input = $this->validate([
            'user_name' => 'required|min_length[3]|max_length[30]',
            'email' => 'required|valid_email|max_length[30]',
            'full_name' => 'required|max_length[50]',
            'bio' => 'max_length[200]',
            'password' => 'required|min_length[8]',
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]',
            ],
        ]);

        if (!$input) {
            return view('Auth/register.php', [
                'validation' => $this->validator
            ]);
        } else {
            $db = \Config\Database::connect();

            $img = $this->request->getFile('image');
            $newName = '';
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move(FCPATH . 'public/uploads/', $newName);
            }

            $password = $this->request->getVar('password');
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (user_name, email, full_name, bio, token, image, status, registration_datetime, last_login) VALUES (:user_name:, :email:, :full_name:, :bio:, :token:, :image:, 'active', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

            try {
                $result = $db->query($sql, [
                    'user_name' => $this->request->getVar('user_name'),
                    'email' => $this->request->getVar('email'),
                    'full_name' => $this->request->getVar('full_name'),
                    'bio' => $this->request->getVar('bio'),
                    'token' => $hashedPassword,
                    'image' => $newName,
                ]);

                if ($result) {
                    $ses_data = [
                        'user_id' => $db->insertID(),
                        'user_name' => $this->request->getVar('user_name'),
                        'email' => $this->request->getVar('email'),
                        'logged_in' => TRUE
                    ];
                    session()->set($ses_data);
                    return redirect()->route('dashboard');
                } else {
                    return view('Auth/register.php', ['error' => 'Failed to register. Please try again.']);
                }
            } catch (DatabaseException $e) {
                return view('Auth/register.php', ['error' => 'Database error: ' . $e->getMessage()]);
            }
        }
    }

    public function dashboard()
    {
        helper(['auth']);
        if (isAuthenticated()) {
            $db = \Config\Database::connect();


            $result2 = $db->query('SELECT count(user_id) as totalusers FROM `users`');


            $result = $db->query('SELECT count(user_id) as totalwords FROM `learntwords` WHERE user_id = ?;', [session()->get('user_id')]);

            $result1 = $db->query('SELECT * FROM `users` WHERE user_id = ?;', [session()->get('user_id')]);

            return view("Dashboard/home.php", [
                "totalwords" => $result->getResultArray(),
                "user" => $result1->getResultArray(),
                "totalusers" => $result2->getResultArray()
            ]);
        } else {
            return redirect()->route('login');
        }

    }


    public function setscore($score)
    {
        helper(['auth']);
        if (isAuthenticated()) {
            $db = \Config\Database::connect();
            $sql = "UPDATE `users` SET `highscore` = ? WHERE user_id = ? and highscore < ?";
            $result = $db->query($sql, [$score, session()->get('user_id'), $score]);

            $sql = "select highscore from `users`  WHERE user_id = ?";
            $result = $db->query($sql, [session()->get('user_id')]);
            return $this->respond(["highscore" => $result->getResultArray()[0]['highscore']]);
        }

    }


    public function learntword($word)
    {
        helper(['auth']);
        if (isAuthenticated()) {
            $db = \Config\Database::connect();
            $sql = 'SELECT * FROM `learntwords` WHERE user_id = ? and word = ?';
            $result = $db->query($sql, [session()->get('user_id'), $word]);
            $newbool = false;
            if (count($result->getResultArray()) <= 0) {
                $sql = 'INSERT INTO `learntwords`(`user_id`, `word`) VALUES (?, ?)';
                $result = $db->query($sql, [session()->get('user_id'), $word]);
                $newbool = true;
            }
            return $this->respond(["new_word" => $newbool]);
        }

    }

    public function leaderboard()
    {
        helper(['auth']);
        if (isAuthenticated()) {
            $db = \Config\Database::connect();
            $result = $db->query('SELECT * FROM `users` ORDER BY highscore DESC LIMIT 10;');

            return view("Dashboard/leaderboard.php", ["users" => $result->getResultArray()]);
        } else {
            return redirect()->route('login');
        }
    }

    public function showuser($id)
    {
        $db = \Config\Database::connect();
        $result = $db->query('select * from users where user_id = ?;', [$id]);

        if (count($result->getResultArray()) > 0) {
            $result1 = $db->query('SELECT count(user_id) as totalwords FROM `learntwords` WHERE user_id = ?;', [session()->get('user_id')]);
            return view('User/index', [
                'user' => $result->getResultArray(),
                "totalwords" => $result1->getResultArray()
            ]);
        } else {
            return redirect()->route('/');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->route('login');
    }
}
