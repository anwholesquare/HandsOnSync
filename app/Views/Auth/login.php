<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="blog management">
	<meta name="author" content="Khandoker Anan">
	<link rel="icon" type="image/png" href="<?= base_url() ?>/favicon.png">
	<meta name="description" content="HandsOnSync system">
	<meta property="og:title" content="HandsOnSync Landing Page">
	<meta property="og:description" content="HandsOnSync: one gesture, at a time">
	<meta property="og:type" content="website">
	<meta property="og:image" content="./assets/images/common/og-image.jpg">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<title>HandsOnSync</title>
	<style>
		.fab {
			font-size: 32px;
			text-align: center;
			width: auto;
			padding: 10px;
			text-decoration: none;
			margin: 5px 2px;
			color: white;
		}

		.fab:hover {
			opacity: 0.7;
		}

		.form-control {
			padding: 14px !important;
		}
	</style>


	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>



	<div class="container">
		<div class="row">
			<style>
				body {
					background-color: #212121;
				}

				#logocover {
					display: flex;
					margin-top: 30px;
					justify-content: center;
				}
			</style>
			<div id="logocover">
				<img class="logo-default" src="<?= base_url() ?>/assets/logo.png" style="
	height:70px;
" alt="HandsOnSync">
			</div>
			<h5 class="text-black text-center text-white">Learn, Communicate and Teach People ASL</h5>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 mt-4">

				<?php if (isset ($validation)): ?>
					<div class="alert alert-danger" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				<?php endif; ?>

				<?php if (isset ($error)): ?>
					<div class="alert alert-warning" role="alert">
						<?= $error ?>
					</div>
				<?php endif; ?>

				<div class="card">
					<div class="card-body">
						<form method="post" action="<?= base_url('login/authenticate') ?>">
							<div class="mb-3">
								<label for="username" class="form-label">Username or Email</label>
								<input type="text" class="form-control" id="username" name="username"
									placeholder="Username or Email" required>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password"
									placeholder="Password" required>
							</div>
							<div class="d-flex flex-column justify-content-center">
								<button type="submit" class="btn"
									style="background: #000645; color:white; margin-right:5px; padding:14px; margin-top: 10px; float:none">Sign
									In
									Now</button>

								<a href="<?= base_url('register') ?>" class="btn" style="color:##000645;">
									Create a new
									account?</a>
							</div>
						</form>
					</div>
				</div>

				<div class="text-center text-white m-5">
					<h5 class="text-black text-center text-white">Support Us</h5>
					<div class="d-flex justify-content-center">
						<a href="#" class="fab fa-facebook"></a>
						<a href="#" class="fab fa-twitter"></a>
						<a href="#" class="fab fa-linkedin"></a>
						<a href="#" class="fab fa-youtube"></a>
						<a href="#" class="fab fa-instagram"></a>
					</div>
				</div>



			</div>
		</div>

	</div>









	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
</body>

</html>