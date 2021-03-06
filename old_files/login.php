<?php 
session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
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
                    <form method="post" action="?act=login">
                        <fieldset>
                            <h2 class="account"> Einloggen</h2>
                            <ul>
                                <li>
                                    <label for="email">E-Mail</label>
                                    <input type="text" id="email" name="email" class="large"/>
                                </li>
                                <li>
                                    <label for="password">Passwort</label>
                                    <input type="password" id="password" name="password" class="large"/>
                                </li>
                                <input type="submit" name="login" class="create_profile" value="login">
                            </fieldset>
                        </form>  
                        <?php 
//This function will find and checks if your data is correct
                        function login(){
//Collect your info from login form
                            require_once 'connect.php';
                            $email = $_REQUEST['email'];
                            $password = $_REQUEST['password'];
                            $password_decode = md5($password);
//Find if entered data is correct
                            $result = mysql_query("SELECT * FROM user_tbl WHERE email='$email' AND password='$password_decode'");
                            $row = mysql_fetch_array($result);
                            $id = $row['user_ID'];
                            $select_user = mysql_query("SELECT * FROM user_tbl WHERE user_ID='$id'");
                            $row2 = mysql_fetch_array($select_user);
                            $email2 = $row2['email'];
                            if($email != $email2){
                                die("Email is wrong!");
                            }
                            $pass_check = mysql_query("SELECT * FROM user_tbl WHERE email='$email' AND user_ID='$id'");
                            $row3 = mysql_fetch_array($pass_check);
                            $firstname = $row3['firstname'];
                            $lastname = $row3['lastname'];
                            $select_pass = mysql_query("SELECT * FROM user_tbl WHERE email='$email' AND user_ID='$id' AND firstname='$firstname' AND lastname='$lastname'");
                            $row4 = mysql_fetch_array($select_pass);
                            $real_password = $row4['password'];
                            if($password_decode != $real_password){
                                die("Your password is wrong!");
                            }
                            else if($password_decode == $real_password){
                            //Now if everything is correct let's finish his/her/its login
                                $_SESSION['loggedin'] = true;
                                $_SESSION['user'] = $email;
                                $_SESSION['firstname'] = $firstname;
                                $_SESSION['lastname'] = $lastname;
                                $_SESSION['user_ID'] = $id;
                                echo '<script type="text/javascript">
                                window.location = "http://localhost:8888/Mealshare/index.php"
                            </script>';
                        }
                    }
                    if($_REQUEST['act']=='login'){
                        login();
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
