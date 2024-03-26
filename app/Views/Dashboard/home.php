<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php echo view("Dashboard/common_header.php"); ?>
</head>

<body>




    <?php echo view('Dashboard/header.php'); ?>


    <div class="container-fluid">
        <div class="row">
            <?php echo view('Dashboard/navbar.php', ["id" => 0]); ?>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:70px;margin-bottom:70px;">

                <h2 style="color:white;">Dashboard </h2>

                <div class="container mt-5">
                    <div class="row">
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total <br> Users</h5>
                                    <p class="card-text">
                                        <?= $totalusers[0]['totalusers'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Highest <br> Score</h5>
                                    <p class="card-text">
                                        <?= $user[0]['highscore'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Learnt <br> Words</h5>
                                    <p class="card-text">
                                        <?= $totalwords[0]['totalwords'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Time <br>spent</h5>
                                    <p class="card-text">
                                        130
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> Registration <br> date</h5>
                                    <p class="card-text">
                                        <?= date('d M, Y ', strtotime($user[0]['registration_datetime'])) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Certification <br> Complete</h5>
                                    <p class="card-text">
                                        <?= ($user[0]['highscore'] / 50) * 100 . "%" ?>
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>



        </div>

        </main>
    </div>
    </div>
    <?php echo view('Dashboard/footer.php'); ?>


</body>

</html>