<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="blog management">
	<meta name="author" content="Khandoker Anan">
	<meta name="description" content="HandsOnSync system">
	<meta property="og:title" content="HandsOnSync Landing Page">
	<meta property="og:description" content="HandsOnSync: one gesture, at a time">
	<meta property="og:type" content="website">
	<meta property="og:image" content="./assets/images/common/og-image.jpg">

	<title>HandsOnSync</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">



	<div class="container">
		<div class="row">
			<style>
				#logocover {
					display: flex;
					margin-top: 30px;
					justify-content: center;
				}
			</style>
			<div id="logocover">
				<img class="logo-default" src="<?= base_url() ?>/assets/logo.png" style="
	height:70px;
" alt="Lazyblog">
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 mt-5">

				<?php if (isset($validation)): ?>
					<div class="alert alert-danger" role="alert">
						<?= $validation->listErrors() ?>
					</div>
				<?php endif; ?>

				<?php if (isset($error)): ?>
					<div class="alert alert-warning" role="alert">
						<?= $error ?>
					</div>
				<?php endif; ?>

				<div class="card">
					<div class="card-header text-white">
						<h5 class="text-black">Sign Up Now For Free!!!</h5>
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url('register/store') ?>" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" name="user_name"
									placeholder="Username" required>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email"
									required>
							</div>
							<div class="mb-3">
								<label for="fullname" class="form-label">Full Name</label>
								<input type="text" class="form-control" id="fullname" name="full_name"
									placeholder="Full Name" required>
							</div>

							<div class="mb-3">
								<label for="bio" class="form-label">Bio</label>
								<textarea class="form-control" id="bio" name="bio" placeholder="Bio"
									rows="3"></textarea>
							</div>
							<div class="row">

								<div class="col-md-6">
									<div class="mb-3">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control" id="password" name="password"
											placeholder="Password" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label for="image" class="form-label">Profile Image</label>
										<input type="file" class="form-control" id="image" name="image" required>
									</div>
								</div>
							</div>

							<button type="submit" class="btn"
								style="background: #36b7ff; color:white; margin-right:5px;">Register</button>

							<a href="<?= base_url('login') ?>" class="btn"
								style="background: black; color:white;">Already
								have an
								account?</a>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
	<script>
		function addDarkmodeWidget() {
			const options = {
				bottom: '64px', // default: '32px'
				right: '32px', // default: '32px'
				left: 'unset', // default: 'unset'
				time: '0.5s', // default: '0.3s'
				mixColor: '#fff', // default: '#fff'
				backgroundColor: '#fff',  // default: '#fff'
				buttonColorDark: '#100f2c',  // default: '#100f2c'
				buttonColorLight: '#fff', // default: '#fff'
				saveInCookies: true, // default: true,
				label: '🌓', // default: ''
				autoMatchOsTheme: true // default: true
			}
			new Darkmode(options).showWidget();
		}
		window.addEventListener('load', addDarkmodeWidget);
	</script>

	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
</body>

</html>