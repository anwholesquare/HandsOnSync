<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $user[0]['full_name'] ?>'s Page
    </title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('bg.css') ?>" rel="stylesheet">
    <style>
        @media print {
            .noPrint {
                display: none;
            }
        }

        .blog-keywords {
            margin-bottom: 20px;
            font-style: italic;
        }

        .blog-tags .badge {
            margin-right: 5px;
        }

        .recommended-posts .card {
            margin-top: 10px;
        }

        .cover-image {
            width: 100%;
            height: auto;
            max-height: 300px;
        }

        .card-body {
            color: black;
        }

        #bg {
            position: fixed;
            height: 100vh;
            margin: 0;
            width: 100vw;
            overflow: hidden !important;
            z-index: -1000 !important;
        }
    </style>
</head>

<body>

    <div id="bg">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
    </div>

    <header class="navbar sticky-top flex-md-nowrap p-0 shadow" data-bs-theme="dark"
        style="position:fixed;width:100%;background:#202020;border-bottom: 5px solid #0006457a;display:flex;justify-content:center;">
        <a class="col-md-12 col-lg-12 me-0 fs-6 text-white" href="#">
            <div style="height:50px;display: flex;width:auto;justify-content: center;">
                <img src="/assets/logo.png" style="height:50px;width:auto;" />
            </div>
        </a>


    </header>
    <div class="container" style="margin-top: 50px;">
        <!-- add padding to the top of the page -->


        <div class="row justify-content-center py-5">

            <div class="col-md-3 ">
                <!-- Author Profile -->
                <div class="card mb-4 text-center">
                    <div class="rounded-circle overflow-hidden mx-auto my-4" style="width: 150px; height: 150px;">
                        <img src="<?= base_url('') . "public/uploads/" . $user[0]['image'] ?>" class="card-img-top"
                            alt="Author Image" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $user[0]['full_name'] ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $user[0]['bio'] ?>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> 🤘 Highscore:
                            <?php echo $user[0]['highscore']; ?>
                        </li>
                        <li class="list-group-item"> 🤙
                            <?php echo $user[0]['email'] ?>
                        </li>
                        <li class="list-group-item"> ✍️ Joined at
                            <?php echo date('d M, Y', strtotime($user[0]['registration_datetime'])); ?>
                        </li>

                        <!-- Add more user details here -->

                    </ul>
                </div>

            </div>
            <div class="col-md-9">

                <h2> My Certification </h2>
                <br>

                <div class="row">
                    <div class="col">
                        <h4>
                            <?= ($user[0]['highscore'] / 50) * 100 . "%" ?>
                        </h4>
                        <h6> Certification Completion Rate</h6>
                    </div>

                    <div class="col">
                        <h4>
                            <?= $totalwords[0]['totalwords'] ?>
                        </h4>
                        <h6> Learnt Words</h6>
                    </div>

                    <div class="col">
                        <h4>
                            <?= $user[0]['highscore'] ?>
                        </h4>
                        <h6> Highest Score</h6>
                    </div>
                </div>

                <div class="col" style="z-index:1000;position:relative;">
                    <button class="btn btn-primary mt-3 noPrint" onclick="window.print();"> Download Profile </button>
                    <a href="<?= base_url('asl/quiz') ?> "><button class="btn btn-danger mt-3 noPrint"> Beat The Score
                        </button> </a>
                    <a href="<?= 'https://www.facebook.com/sharer/sharer.php?u=' . current_url() ?>"><button
                            class="btn btn-info mt-3 noPrint"> Share this link
                        </button> </a>
                </div>

                <br>

                <h2> Join the Community </h2>
                <br>
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhandsonsync&tabs=timeline&width=320&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1158072914856138"
                    width="320" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>











            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>