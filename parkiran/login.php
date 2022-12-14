<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Parking</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<?php
	  include "koneksi.php";

	  date_default_timezone_set('Asia/Jakarta');
	  $waktu = date('H:i:s');
	  $tanggal = date('D, d M Y');

	?>

<body style="background-color: #999999;">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/parkir.jpg');"></div>
			<div class="wrap-login100 p-l-50 p-r-30 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="post" action="aksi_login.php">
					<div style="float: left;">
		              <h1 class="animated fadeInLeft" id="jam" style="margin-left: 60px; font-size: 60pt"><?= $waktu ?></h1>
		              <p class="animated fadeInRight" style="text-align: center; font-size: 14pt; margin-left:70px;"><?= $tanggal;?></p>
		            </div>
		           <hr size="20px" width="100%">
                    <table style="width:100%;">
                        <tr>
                            <td style="width:70%;">
                                <span class="login100-form-title p-b-20">
                                    Log In
                                </span>
                            </td>
                            <td style="text-align:right;">
                                <div class="wrap-input100 validate-input" data-validate="Username is required" style="width:50px;">
                                    <input class="input100" type="text" name="gate" placeholder="Gate">
                                    <span class="focus-input100"></span>
                                </div>
                            </td>
                        </tr>
                    
                    </table>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Log In
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>