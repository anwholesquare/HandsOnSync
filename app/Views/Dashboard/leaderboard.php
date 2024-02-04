<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php echo view("Dashboard/common_header.php"); ?>
</head>

<body>




    <?php echo view('Dashboard/header.php'); ?>
    <style>
        .profile {
            width: 30px;
            height: auto;
            border-radius: 80px;
        }

        a {
            text-decoration: none;
            color: #36b7ff;
        }
    </style>


    <div class="container-fluid">
        <div class="row">
            <?php echo view('Dashboard/navbar.php', ["id" => 3]); ?>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:70px;margin-bottom:70px;">

                <h2 class="mb-4">Leaderboard Ranking</h2>


                <div class="container mt-5" style="max-width:768px;margin-left:0px;">


                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%">#</th>
                                <th width="30%">Username</th>
                                <th width="20%">Highscore</th>
                                <th width="45%">Registered at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $key => $value) {
                                echo "<tr>
                                <th scope='row'>$i</th>
                                <td> <img class='profile' src='" . base_url('public/uploads/') . $value['image'] . "'/> &nbsp;" . $value['user_name'] . "</td>
                                <td>" . $value['highscore'] . "</td>
                                <td>" . date("d M, Y", strtotime($value['registration_datetime'])) . "</td>
                                </tr>";
                                $i++;
                            }


                            ?>

                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
    <?php echo view('Dashboard/footer.php'); ?>



</body>

</html>