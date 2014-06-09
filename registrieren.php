<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>


    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <!-- Add your site or application content here -->
            <div data-role="page" data-url="/_display/" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 550px;">
            	<div data-role="header" class="ui-header ui-bar-a" role="banner">

            		<!-- oberer Bereich -->
            		<div class="info">
            			<a href="info.html" > <img src="img/info.png" width="30px" height="30px" align="right"></a>
            		</div>

            		<div class="logo">
            			<h1> <a href="index.html" class="color1" >MEALSHARE </a></h1>
            		</div>

            	</div>

            	<div data-role="content" class="ui-content" role="main" style="min-height: 455px;">
            		<!-- Inner content -->
            		<form action='?act=register' method='post'>
            			<fieldset>
            				<h2 class="account"> Konto </h2>
            				<ul>
            					<li>
            						<label for="firstname">Vorname:</label>
            						<input type="text" id="firstname" name="firstname" class="large"/>
            					</li>
            					<li>
            						<label for="lastname">Nachname:</label>
            						<input type="text" id="lastname" name="lastname" class="large"/>
            					</li>
            					<li>
            						<label for="street">Stra&szlig;e, Nr.:</label>
            						<input type="text" id="street" name="street" class="large"/>
            					</li>
            					<li>
            						<label for="city">PLZ, Ort:</label>
            						<input type="text" id="city" name="city" class="large"/>
            					</li>
            					<li>
            						<label for="email">E-Mail:</label>
            						<input type="email" id="email" name="email" class="large"/>
            					</li>
            					<li>
            						<label for="password">Passwort:</label>
            						<input type="password" id="password" name="password"/>
            					</li>
            					<li>
            						<label for="password">Passwort erneut eingeben:</label>
            						<input type="password" id="password_conf" name="password_conf"/>
            					</li>
            					<input type="submit" class="create_profile" value="create profile">
            				</fieldset>
            			</form>
            			<?php 
//This function will register users data
            			function register(){
            				require_once 'connect.php';
//Collecting info
            				$firstname = $_REQUEST['firstname'];
            				$lastname = $_REQUEST['lastname'];
            				$street = $_REQUEST['street'];
            				$city = $_REQUEST['city'];
            				$password = $_REQUEST['password'];
            				$pass_conf = $_REQUEST['password_conf'];
            				$email = $_REQUEST['email'];
//Here we will check do we have all inputs filled
            				if(empty($firstname)){
            					die("Please enter your firstname!<br>");
            				}
            				if(empty($lastname)){
            					die("Please enter your lastname!<br>");
            				}
            				if(empty($password)){
            					die("Please enter your password!<br>");
            				}
            				if(empty($pass_conf)){
            					die("Please confirm your password!<br>");
            				}
            				if(empty($email)){
            					die("Please enter your email!");
            				}
//Let's check if this username is already in use
            				$user_check = mysql_query("SELECT firstname FROM user_tbl WHERE firstname='$firstname'");
            				$do_user_check = mysql_num_rows($user_check);
//Now if email is already in use
            				$email_check = mysql_query("SELECT email FROM user_tbl WHERE email='$email'");
            				$do_email_check = mysql_num_rows($email_check);
//Now display errors
            				if($do_user_check > 0){
            					die("Name is already in use!<br>");
            				}
            				if($do_email_check > 0){
            					die("Email is already in use!");
            				}
//Now let's check does passwords match
            				if($password != $pass_conf){
            					die("Passwords don't match!");
            				}
            				//Encode Password before inserting into db
            				$password_encode = md5($password); 
//If everything is okay let's register this user
            				$insert = mysql_query("INSERT INTO user_tbl (firstname, lastname, street, city, password, email) VALUES ('$firstname', '$lastname', '$street', '$city', '$password_encode', '$email')");
            				if(!$insert){
            					die("There's little problem: ".mysql_error());
            				}
            				?>
            				<script type="text/javascript">
            				window.location = "http://localhost:8888/Mealshare/login.php"
            				</script>
            				<?php
            			}
            			if($_REQUEST['act'] == "register"){
            				register();
            			}            			
            			?>
            		</div>
            	</div>
            	<div data-role="footer" class="ui-footer ui-bar-a" role="contentinfo">
            		<!-- Inner content -->
            		<div id="menu" align="center">
            			<a href="menu.html" > <img src="img/menu.png" width="30px" height="30px"></a>
            		</div>

            		<div id="add" align="center">
            			<h1> <a href="addmeal.html" class="color1"> ADD MEAL </a> </h1>
            		</div>

            	</div>

            	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
            	<script src="js/plugins.js"></script>
            	<script src="js/main.js"></script><script>
            	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            	e.src='//www.google-analytics.com/analytics.js';
            	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            	ga('create','UA-XXXXX-X');ga('send','pageview');
            </script>
        </body>
        </html>
