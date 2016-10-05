<?php
	require_once('auth.php');
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> Fasos Fasum </title>
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

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin -->
		     <!-- specific styles this will also ensure you retrain your customization with each SmartAdmin update. -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css">

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

		<style type="text/css">
			.smart-form{
				color: black;
			}
			.size130{
				font-size: 130%;
			}
		</style>

<!--=======================javascript=========================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		  <!-- <script type="text/javascript" src="js/libs/jquery-1.3.2.min.js"></script>
  <script type="text/javascript" src="view/javascript/jquery/jquery-1.3.2.min.js"></script> -->
		  

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>


		<!-- IMPORTANT: APP CONFIG -->
		<script src="js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<!-- <script src="js/demo.min.js"></script> -->

		<!-- MAIN APP JS FILE -->
		<script src="js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) 
		<script src="..."></script>-->
		<script src="js/plugin/chartjs/chart.min.js"></script>

		<script type="text/javascript">

			$(document).ready(function() {
			 	
				/* DO NOT REMOVE : GLOBAL FUNCTIONS!
				 *
				 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
				 *
				 * // activate tooltips
				 * $("[rel=tooltip]").tooltip();
				 *
				 * // activate popovers
				 * $("[rel=popover]").popover();
				 *
				 * // activate popovers with hover states
				 * $("[rel=popover-hover]").popover({ trigger: "hover" });
				 *
				 * // activate inline charts
				 * runAllCharts();
				 *
				 * // setup widgets
				 * setup_widgets_desktop();
				 *
				 * // run form elements
				 * runAllForms();
				 *
				 ********************************
				 *
				 * pageSetUp() is needed whenever you load a page.
				 * It initializes and checks for all basic elements of the page
				 * and makes rendering easier.
				 *
				 */
				
				 pageSetUp();
				 
				/*
				 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
				 * eg alert("my home function");
				 * 
				 * var pagefunction = function() {
				 *   ...
				 * }
				 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
				 * 
				 * TO LOAD A SCRIPT:
				 * var pagefunction = function (){ 
				 *  loadScript(".../plugin.js", run_after_loaded);	
				 * }
				 * 
				 * OR
				 * 
				 * loadScript(".../plugin.js", run_after_loaded);
				 */

				 // reference: http://www.chartjs.org/docs/

			    
				
			})
		
		</script>

		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="js/plugin/flot/jquery.flot.cust.min.js"></script>
		<script src="js/plugin/flot/jquery.flot.resize.min.js"></script>
		<script src="js/plugin/flot/jquery.flot.fillbetween.min.js"></script>
		<script src="js/plugin/flot/jquery.flot.orderBar.min.js"></script>
		<script src="js/plugin/flot/jquery.flot.pie.min.js"></script>
		<script src="js/plugin/flot/jquery.flot.time.min.js"></script>
		<script src="js/plugin/flot/jquery.flot.tooltip.min.js"></script>

		

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
				_gaq.push(['_trackPageview']);
			
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>
<!--================================================== -->


	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="menu-on-top smart-style-3">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo" style="margin:0px;padding:0px;padding-top:5px;padding-left:5px;"> <img src="img/logo2.png" alt="Fasos Fasum DKI Jakarta" ></span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->

			</div>

			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<?php
					if(isset($_SESSION))
					{
				?>
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li style="font-size:large">
						<a href="logout.php" title="Sign Out" data-action="userLogout"><i class="fa fa-sign-out"></i>
						LOGOUT
						</a>
					</li>
				</ul>
				<?php
					}
				?>

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<ul>
					<li class="active">
						<a href="index.php" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
					<li>
						<a href="index.php?hal=pencarian"><i class="fa fa-lg fa-fw fa-search"></i> <span class="menu-item-parent">Pencarian</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-file-text-o"></i> <span class="menu-item-parent">Dok. Acuan</span></a>
						<ul>
							<li>
								<a href="index.php?hal=tambahdokacuan">Tambah Dok. Acuan</a>
							</li>
							<li>
								<a href="index.php?hal=lihatdokacuan">Lihat Semua Dok. Acuan</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-file-text"></i> <span class="menu-item-parent">BAST</span></a>
						<ul>
							<li>
								<a href="index.php?hal=tambahbast">Tambah BAST</a>
							</li>
							<li>
								<a href="index.php?hal=lihatbast">Lihat Semua BAST</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-file-text"></i> <span class="menu-item-parent">BOT/BTO</span></a>
						<ul>
							<li>
								<a href="index.php?hal=markingbot">Marking Data BOT/BTO</a>
							</li>
							<li>
								<a href="index.php?hal=botvsskpd">BOT/BTO vs SKPD</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-file-text"></i> <span class="menu-item-parent">SKPD</span></a>
						<ul>
							<li>
								<a href="index.php?hal=markingskpd">Marking Data SKPD</a>
							</li>
							<li>
								<a href="index.php?hal=ffskpd">Fasos Fasum vs SKPD</a>
							</li>
						</ul>
					</li>
					<li id="reports">
					<a class="top"><i class="fa fa-lg fa-fw fa-file-text"></i> <span class="menu-item-parent">Laporan</span></a>
			          <ul>
			            <li><a class="parent">Rekapitulasi BAST</a>
			              <ul>
			                <li><a target="_blank" href="rekapjaksel.php">Rekap Jakarta Selatan</a></li>
			                <li><a target="_blank" href="rekapjakut.php">Rekap Jakarta Utara</a></li>
			                <li><a target="_blank" href="rekapjakbar.php">Rekap Jakarta Barat</a></li>
			                <li><a target="_blank" href="rekapjaktim.php">Rekap Jakarta Timur</a></li>
			                <li><a target="_blank" href="rekapjakpus.php">Rekap Jakarta Pusat</a></li>
			                <li><a target="_blank" href="rekapseribu.php">Rekap Kepulauan Seribu</a></li>

			              </ul>

			              <li><a class="parent">Progress Rekonsiliasi</a>
			                <ul>
			                  <li><a target="_blank" href="pdfsemuabast.php">Data Seluruh BAST</a></li>
			                  <li><a target="_blank" href="pdf163.php">Data Rekon Kel.163</a></li>
			                  <li><a target="_blank" href="pdf54.php">Data Rekon Kel.54</a></li>
			                  <li><a target="_blank" href="pdf129.php">Data Rekon Kel.129</a></li>
			                  <li><a target="_blank" href="pdf101.php">Data Rekon Kel.101</a></li>
			                  <li><a target="_blank" href="pdf58.php">Data Lokasi 58</a></li>
			                  <li><a target="_blank" href="pdfdtr.php">Semua DTR</a></li>
			                  <li><a target="_blank" href="pdfdtraja.php">DTR Tanpa Irisan</a></li>
			                  <li><a target="_blank" href="bastirisanrekon.php">Data irisan Rekon</a></li>
			                  <li><a target="_blank" href="pdfbpk.php">Semua LK2010</a></li>
			                  <li><a target="_blank" href="pdfbpkaja.php">LK2010 Tanpa Iris</a></li>

			                </ul>
			              </li>



			             <!--  <li><a href="laporanperkecamatan.php">Laporan Perkecamatan</a>
			              </li> -->

			              <!-- <li><a class="parent">Laporan SIPPT</a>
			                <ul>
			                  <li><a target="_blank" href="pdfsippt.php">Data SIPPT</a></li>
			                  <li><a target="_blank" href="pdfnonsippt.php">Data Non SIPPT</a></li>
			                  <li><a target="_blank" href="pdfhitung.php">Aril Mop</a></li>
			                  <li><a href="#">Data Kewajiban</a></li>
			                </ul>
			              </li>
			              <li><a href="#">SIPPT vs BAST</a>
			              </li>        

			            </li>
			            <li><a href="laporanirisan.php">Data Irisan</a>
			            </li>  -->  
			          </ul>
			        </li>
			        <li>
						<a href="index.php?hal=table"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Master Data</a>
						<ul>
							<li>
								<a href="index.php?hal=lihatperuntukan">Data Peruntukan</a>
							</li>
							<li>
								<a href="index.php?hal=dataaset">Data Aset</a>
							</li>
							<!-- <li>
								<a href="#">Data Pengembang</a>
							</li> -->
							<li>
								<a href="index.php?hal=kategoriaset">Master Kategori Aset</a>
							</li>
							<!-- <li>
								<a href="#">Master Satuan Ukur</a>
							</li> -->
							<!-- <li>
								<a href="#">Data Alamat</a>
								<ul>
									<li>
										<a href="index.php?hal=wilayah">Wilayah</a>
									</li>
									<li>
										<a href="index.php?hal=kecamatan">Kecamatan</a>
									</li>
									<li>
										<a href="index.php?hal=kelurahan">Kelurahan</a>
									</li>
								</ul>
							</li> -->
						</ul>
					</li>
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<!-- <div id="ribbon">

				<!-- <span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span> -->

				<!-- breadcrumb -->
				<!-- <ol class="breadcrumb">
					<li>
					<?php
						// if(isset($_GET['hal'])){
						// 	echo strtoupper("$_GET[hal]");
						// }else{
						// 	echo"Dashboard";
						// }
					?>
					</li>
				</ol> 
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			<!-- </div> --> 
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<!-- <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1> -->
					</div>
					
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">

						<?php

							if(isset($_GET['hal'])){
								include "$_GET[hal].php";
							}else{
								include "home.php";
							}
						?>
						
					</div>

					<!-- end row -->

				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			
		</div>
		<!-- END PAGE FOOTER -->

		

		<!--================================================== -->

	</body>

</html>