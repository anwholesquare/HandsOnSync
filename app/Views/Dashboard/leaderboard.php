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
            color: #000645;
        }

        .colorprimary {
            color: #000645 !important;
            font-weight: 600;
        }
    </style>


    <div class="container-fluid">
        <div class="row">
            <?php echo view('Dashboard/navbar.php', ["id" => 3]); ?>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:70px;margin-bottom:70px;">

                <h2 class="mb-4" style="color:white;">Leaderboard</h2>


                <div class="container mt-5" style="max-width:768px;margin-left:0px;">

                    <div class="table-responsive card w-100 p-4">
                        <table class="table table-borderless w-100">
                            <thead class="thead-dark">
                                <tr style="vertical-align: baseline">
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Highscore</th>
                                    <th class="d-none d-sm-block">Registered at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($users as $key => $value) {
                                    $locale = 'en_US';
                                    $nf = new NumberFormatter($locale, NumberFormatter::ORDINAL);
                                    $num = $nf->format($i);
                                    echo "<tr>
                                <td scope='row' class='colorprimary'>$num</td>
                                <td class='text-nowrap'> <img class='profile' src='" . base_url('public/uploads/') . $value['image'] . "'/> &nbsp;" . $value['user_name'] . "</td>
                                <td>" . $value['highscore'] . "</td>
                                <td class='d-none d-sm-block'>" . date("d M, Y", strtotime($value['registration_datetime'])) . "</td>
                                </tr>";
                                    $i++;
                                }


                                ?>

                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <?php echo view('Dashboard/footer.php'); ?>



</body>

</html>