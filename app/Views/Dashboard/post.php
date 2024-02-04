<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php echo view("Dashboard/common_header.php"); ?>
</head>

<body>




    <?php echo view('Dashboard/header.php'); ?>


    <div class="container-fluid">
        <div class="row">
            <?php echo view('Dashboard/navbar.php', ["id" => 1]); ?>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:70px;margin-bottom:70px;">
                <h2>My Posts</h2>
                <div class="container">
                    <div class="row">

                        <?php

                        foreach ($result as $row) {


                            echo '
                        <div class="col-md-6 col-lg-3 mt-4">
                            <div class="card">
                                <!-- Card Image -->
                                <img src=" ' . base_url('') . "/public/uploads/" . $row['cover_image'] . ' " class="card-img-top" style="max-height:200px;"  alt="Post Image">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h5 class="card-title"> ' . $row['title'] . '</h5>
                                    Published at ' . date("d M, Y", strtotime($row['publication_datetime'])) . '
                                    <br></br>
                                    <a href="' . base_url('dashboard/edit/post/') . $row['post_id'] . '" class="btn btn-primary text-white">Edit Post</a>
                                    <a href="' . base_url('post/') . $row['symlink'] . '" class="btn btn-danger">Read More</a>
                                   
                                </div>

                                
                                <div class="card-footer text-muted">
                                Views: ' . $row['views_count'] . '
                                </div>
                                <div class="card-footer text-muted">
                                Total Seconds: ' . $row['total_seconds_views'] . '
                                </div>
                            </div>
                        </div>
                    ';
                        }

                        ?>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <?php echo view('Dashboard/footer.php'); ?>

</body>

</html>