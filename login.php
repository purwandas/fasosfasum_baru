<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> Login </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	</head>
	
	<body class="menu-on-top">
		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="img/logo.png" alt="SmartAdmin"> </span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->

			</div>


		</header>
		<!-- END HEADER -->

		<div id='main' role='main'>
				
				<div class="modal-dialog demo-modal" style="width:300px;">
					<div class="modal-content">
					<?php
						if(!isset($_GET['register']))
						{
					?>
						<form action="login-exec.php" method="post">

						<div class="modal-header">
							<h4 class="modal-title">User Login</h4>
						</div>
						<div class="modal-body smart-form">
							<?php
								if(isset($_GET['e'])){
									echo"
									<p class='alert alert-danger'>
									Periksa kembali Username/Password
									</p>
									";
								}
								if(isset($_GET['s'])){
									echo"
									<p class='alert alert-success'>
									Registration Success
									</p>
									";
								}
							?>
							Username:<br />

							<input type="text" name="login" value=""  id="login"  style="margin-top: 4px;width:100%" />
							<br>
							              
							Password:<br />
			              	<input type="password" name="password" value=""   id="password"  style="margin-top: 4px;width:100%" />
				            <br />
				            <br />

							<!-- <a href="login.php?register=1">Register</a> -->
						</div>
						<div class="modal-footer">
							<center>
							<button type="submit" class="btn btn-lg btn-default">
								Login
							</button>
							</center>
						</div>
						</form>
					<?php
					}
					else
					{
					?>
						<form action="daftar.php" method="post">

						<div class="modal-header">
							<h4 class="modal-title">Pendaftaran User</h4>
						</div>
						<div class="modal-body smart-form">
							<?php
								if(isset($_GET['e'])){
									echo"
									<p class='alert alert-danger'>
									Gagal membuat akun
									</p>
									";
								}
								if(isset($_GET['s'])){
									echo"
									<p class='alert alert-success'>
									Registration Success
									</p>
									";
								}
							?>
							<table class='table'>
							    <tr>
							      <th>First Name </th>
							      <td><input name="fname" type="text" class="textfield" id="fname" /></td>
							    </tr>
							    <tr>
							      <th>Last Name </th>
							      <td><input name="lname" type="text" class="textfield" id="lname" /></td>
							    </tr>
							    <tr>
							      <th width="124">Login Username</th>
							      <td width="168"><input name="login" type="text" class="textfield" id="login" /></td>
							    </tr>
							    <tr>
							      <th>Password</th>
							      <td><input name="password" type="password" class="textfield" id="password" /></td>
							    </tr>
							    <tr>
							      <th>Confirm Password </th>
							      <td><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
							    </tr>
							  </table>
						</div>
						<div class="modal-footer">
							<center>
							<button type="submit" class="btn btn-lg btn-default">
								Register
							</button>
							</center>
						</div>
						</form>
					<?php
					}
					?>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->


		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			
		</div>
		<!-- END PAGE FOOTER -->


	</body>

</html>