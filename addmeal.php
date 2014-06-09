<?php
session_start();
?>
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
            			<a href="info.php" > <img src="img/info.png" width="30px" height="30px" align="right"></a>
            		</div>

            		<div class="logo">
            			<h1> <a href="index.html" class="color1" >MEALSHARE </a></h1>
            		</div>

            	</div>

            	<div data-role="content" class="ui-content" role="main" style="min-height: 455px;">
            		<!-- Inner content -->
            		<form method="post" action="?act=addmeal">
            			<fieldset>
            				<h2 class="account"> MAHLZEIT HINZUF&Uuml;GEN </h2>
            				<ul>
            					<li>
            						<label for="title">Titel:</label>
            						<input type="text" id="title" name="title" class="large"/>
            					</li>
            					<li>
            						<label for="description">Beschreibung:</label>
            						<textarea id="description" name="description" rows="8"
            						cols="50" class="large">
            					</textarea>
            				</li>
            				<li>
            					<label for="seats">freie Pl&auml;tze</label>
            					<select id="seats" name="seats">
            						<option value="1"> 1 </option>
            						<option value="2"> 2 </option>
            						<option value="3"> 3 </option>
            						<option value="4"> 4 </option>
            						<option value="5"> 5 </option>
            						<option value="6"> 6 </option>
            						<option value="7"> 7 </option>
            						<option value="8"> 8 </option>
            						<option value="9"> 9 </option>
            						<option value="10"> 10 </option>
            					</select>
            				</li>
            				<li>
            					<label for="date"> Datum</label>
            					<input type="date" name="date" class="large">						
            				</li>
            				<li>
            					<label for="time"> Uhrzeit</label>
            					<input type="time" name="time" class="large">						
            				</li>

            				<input type="submit" class="create_profile" value="Add Meal">
            			</fieldset>
            		</form>
            		<?php 
//This function will register users data
            		function addmeal(){
            			require_once 'connect.php';
//Collecting info
            			$title = $_REQUEST['title'];
            			$description = $_REQUEST['description'];
            			$seats = $_REQUEST['seats'];
            			$date = $_REQUEST['date'];
            			$time = $_REQUEST['time'];
            			if (isset($_SESSION['user_ID'])){
            				$user_ID = $_SESSION['user_ID'];
            			}
//Here we will check do we have all inputs filled
            			if(empty($title)){
            				die("Please enter the title!<br>");
            			}
            			if(empty($description)){
            				die("Please enter the description!<br>");
            			}
            			if(empty($seats)){
            				die("Please enter the seats!<br>");
            			}
            			if(empty($date)){
            				die("Please enter the date!<br>");
            			}
            			if(empty($time)){
            				die("Please enter the time!");
            			}
            			$insert = mysql_query("INSERT INTO meal_tbl (user_ID, title, description, meal_date, hour, seats) VALUES ('$user_ID', '$title', '$description', '$date', '$time', '$seats')");
            			if(!$insert){
            				die("There's little problem: ".mysql_error());
            			}
            				//echo '<script type="text/javascript">
            				//window.location = "http://localhost:8888/Mealshare/index.php"
            				//</script>';
            		}
            		if($_REQUEST['act'] == "addmeal"){
            			addmeal();
            		}            			
            		?> 
            	</div>
            </div>

            <div data-role="footer" class="ui-footer ui-bar-a" role="contentinfo">
            	<!-- Inner content -->
            	<div id="menu" align="center">
            		<a href="index.php" > <img src="img/menu.png" width="30px" height="30px"></a>
            	</div>

            	<div id="add" align="center">
            		<h1> <a href="addmeal.php" class="color1">ADD MEAL </a> </h1>
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
