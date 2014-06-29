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
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  <script src="js/modal.js"></script>
</head>
<body>
  <?php 

  ?>
  <div data-role="page" data-url="/_display/" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 550px;">
    <div data-role="header" class="ui-header ui-bar-a" role="banner">
      <div class="header-content clearfix">
       <div class="back-btn-wrapper"><a href="" class="back-btn"></a></div>
       <h1 class="header-headline">Neue Mahlzeit</h1>
     </div>
   </div>
   <div data-role="content" class="ui-content" role="main" style="min-height: 455px;">

    <form method="post" action="?act=addmeal" class="add-meal-form">
      <input type="text" id="title" class="title-input" name="title" placeholder="Was gibt es leckeres zu essen?"/>
      <fieldset>
        <span class="icon meal-meta-data-icon calendar-icon"></span>
        <label for="date">Wann?</label>
        <input type="date" class="date-input" name="date">
      </fieldset>
      <fieldset>
        <span class="icon meal-meta-data-icon clock-icon"></span>
        <label for="time">Wieviel Uhr?</label>
        <input type="time" class="time-input" name="time">
      </fieldset>
      <fieldset>
        <span class="icon meal-meta-data-icon person-icon"></span>
        <label for="seats">Freie Plätze</label>
        <input type="number" class="seats-input" name="seats">
      </fieldset>
      <textarea class="description" rows="5" name="description"></textarea>
      <div class="cta-btn-wrapper">
        <input type="submit" class="btn btn-6 btn-6j btn-wide" value="Add Meal">
      </div>
    </form>

 <!--      <?php 
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
   ?>  -->
 </div>
</div>

<div data-role="footer" class="ui-footer ui-bar-a" role="contentinfo">
  <!-- Inner content -->
  <div class="footer-icon-wrapper ">
    <a href="addmeal.php" class="icon add-icon"></a>
  </div>
  <div class="footer-icon-wrapper">
    <a href="index.php" class="icon home-icon"></a>
  </div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>
</html>

