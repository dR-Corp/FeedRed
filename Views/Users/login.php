<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Feed|Red</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="<?php echo ASSETS;?>"/> -->
	<!-- icon -->
    <link rel="icon" href="<?php echo ASSETS;?>LTE/dist/img/as.png" type="image/x-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/css/main.css">
<!--===============================================================================================-->
	<style>
		.wrap-login100 {
			width: 70%;
			height: 65vh;
			padding: 60px 0px 70px 0px;
			background: #19233e;
		}
		.login100-pic {
			visibility: hidden;
			width: 50%;
			padding-left: 6%;
			padding-right: 3%;
		}
		.login100-form {
			width: 50%;
			padding-left: 3%;
			padding-right: 6%;
		}
		
		@media screen and (max-width: 768px) {
			.wrap-login100 {
				width: 85%;
				height: 75vh;
				padding: 40px 0px 70px 0px;
				background: #19233e;
			}
			.login100-form {
				width: 100%;
				padding-left: 5%;
				padding-right: 5%;
			}
			
		}
		@media screen and (min-width: 768px) {
			.container-login100 {
				background: url('<?php echo ASSETS;?>Login/images/redac.jpg'); 
				background-size: 100% 100%;
			}
			.login100-pic {
				visibility: visible;
			}
			.login100-form {
				margin-top: -20px;
			}
		}
	</style>
    <?php //echo $scripts; ?>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo ASSETS;?>Login/images/img-01.png" alt="IMG">
				</div>

				<form action="log.html" method="post" class="login100-form validate-form">
                    <div class="">
						<a href="accueil.html"><h3 class="text-center font-weight-bold" style="color: #24a9ff;">Feed|Red</h3></a>
                        <span class="login100-form-title text-white">
                            Connexion
                        </span>
                    </div>

					<div class="wrap-input100 validate-input" data-validate = "Un email valide est requis: ex@abc.xyz">
						<input class="input100" type="text" name="values[email]" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Le mot de passe est requis">
						<input class="input100" type="password" name="values[password]" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="background-color: #044687;">
							Se connecter
						</button>
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="#">
							Mot de passe,
						</a>
						<span class="txt1">
							oublié ?
						</span>
					</div>
                </form>
			</div>
        </div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo ASSETS;?>Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo ASSETS;?>Login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo ASSETS;?>Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo ASSETS;?>Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo ASSETS;?>Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo ASSETS;?>Login/js/main.js"></script>

</body>
</html>