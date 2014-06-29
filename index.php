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

  <div data-role="page" data-url="/_display/" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 550px;">
    <div data-role="header" class="ui-header ui-bar-a" role="banner">
      <div class="header-content clearfix">
        <h1 class="header-headline"> Newsfeed </h1>
        <div class="info-btn-wrapper"><a href="" class="info-btn"></a></div>
      </div>
    </div>
    <div data-role="content" class="ui-content" role="main" style="min-height: 455px;">
      <?php  
      require_once 'connect.php';
      $select_meals = mysql_query("SELECT * FROM meal_tbl ORDER BY `meal_tbl`.`meal_ID` DESC"); 
      while($array_meals = mysql_fetch_array($select_meals,MYSQL_ASSOC)):
            // Select User by User ID from meals_tbl
        $user_ID= $array_meals['user_ID'];
      $select_user = mysql_query("SELECT * FROM user_tbl WHERE user_ID='$user_ID'") or die ("Invalid query: " . mysql_error ());;
      $selected_user = mysql_fetch_array($select_user,MYSQL_ASSOC);
            // Get values of the user
      $firstname = $selected_user['firstname'];
      $lastname = $selected_user['lastname'];
      $city= $selected_user['city'];
      $street= $selected_user['street'];
            // Get values of the meal
      $meal_ID= $array_meals['meal_ID'];
      sort($meal_ID);
      $title= $array_meals['title'];
      $description= $array_meals['description'];
      $meal_date= $array_meals['meal_date'];
      setlocale(LC_TIME, 'de_DE');
      $localyzedate = date("d.m.Y", strtotime($meal_date));
      $hour= $array_meals['hour'];
      $localyzehour = date("G:i", strtotime($hour));
      $seats= $array_meals['seats'];
            // Get Session Variables
      if (isset($_SESSION['loggedin'])){
        $loggedin = $_SESSION['loggedin'];
        //var_dump($loggedin);
      }
      if (isset($_SESSION['user_ID'])){
        $session_user_ID = $_SESSION['user_ID'];
        //var_dump($session_user_ID);
      }
      ?>
      <div class="meal-wrapper
      <?php 
      if($session_user_ID == 0){
       echo 'meal-wrapper-accepted';
     } 
     if($session_user_ID == 0){
      echo 'meal-wrapper-offer';
    }
    ?>
    clearfix">
    <div class="person-data-wrapper">
      <p class="name 
      <?php 
      if($session_user_ID == $user_ID){
        echo 'name-own';
      }
      ?>
      "><?php echo $firstname . " " . $lastname; ?></p>
      <p class="person-meta-data"><?php echo $street; ?></p>
      <p class="person-meta-data"><?php echo $city; ?></p>
    </div>
    <div class="meal-info-wrapper">
      <h2 class="meal-headline"><?php echo $title; ?></h2>
      <div class="meal-meta-data-wrapper clearfix">
        <div class="meal-meta-data-content">
          <span class="icon meal-meta-data-icon calendar-icon"></span>
          <p class="meal-meta-data"><?php echo $localyzedate; ?></p>
        </div>
        <div class="meal-meta-data-content">
          <span class="icon meal-meta-data-icon clock-icon"></span>
          <p class="meal-meta-data"><?php echo $localyzehour; ?> Uhr</p>
        </div>
        <div class="meal-meta-data-content meal-meta-data-content-wide">
          <span class="icon meal-meta-data-icon person-icon"></span>
          <p class="meal-meta-data"><?php echo $seats; ?> freie Plätze</p>
        </div>
        <div class="meal-meta-data-content meal-meta-data-content-wide">
          <div class="eat-wrapper">
            <span class="icon meal-meta-data-icon fork-icon"></span>
            <p class="meal-meta-data meal-meta-data-hightlighted">Isst mit:</p>
          </div>
          <div class="meal-meta-data-person-wrapper">
            <p class="meal-meta-data-person">Willi Wichtel</p>
            <p class="meal-meta-data-person">Selma Selfiegeil</p>
            <p class="meal-meta-data-person 
            <?php 
            if($session_user_ID == 0){
             echo 'meal-meta-data-person-own';
           }
           ?>
           ">Peter Prittstift</p>
         </div>
       </div>
     </div>
   </div>
   <div class="cta-wrapper clearfix">
    <a class="btn btn-6 btn-6j" href="details.php">Angebot ansehen</a> 
    <?php 
    if($user_ID == 0){
     echo '<div class="cta-btn-wrapper"><p class="cta-btn btn btn-6 btn-6j">Nicht mehr mitessen</p></div>';
   } 
   if($user_ID == 0){
    echo '<form class="icon-wrapper"><button name="delete" class="btn btn-7 btn-7d btn-icon-only icon-remove"></form>';
  }
  ?>
</div>
</div>
<?php 
endwhile;
?>
<!--
<div class="meal-wrapper meal-wrapper-offer clearfix">
  <div class="person-data-wrapper">
    <p class="name name-own">Mein Name</p>
    <p class="person-meta-data">Bahnhofstr. 2</p>
    <p class="person-meta-data">78120 Furtwangen</p>
  </div>
  <div class="meal-info-wrapper">
    <h2 class="meal-headline">Bohnen mit ordentlich viel Speck</h2>
    <div class="meal-meta-data-wrapper clearfix">
      <div class="meal-meta-data-content">
        <span class="icon meal-meta-data-icon calendar-icon"></span>
        <p class="meal-meta-data">15.06.14</p>
      </div>
      <div class="meal-meta-data-content">
        <span class="icon meal-meta-data-icon clock-icon"></span>
        <p class="meal-meta-data">13:00 Uhr</p>
      </div>
      <div class="meal-meta-data-content meal-meta-data-content-wide">
        <span class="icon meal-meta-data-icon person-icon"></span>
        <p class="meal-meta-data">2 freie Plätze</p>
      </div>
      <div class="meal-meta-data-content meal-meta-data-content-wide">
        <div class="eat-wrapper">
          <span class="icon meal-meta-data-icon fork-icon"></span>
          <p class="meal-meta-data meal-meta-data-hightlighted">Will mitessen:</p>
        </div>
        <div class="meal-meta-data-person-wrapper">
          <p class="meal-meta-data-person">Elli Eitel</p>
          <p class="meal-meta-data-person">Selma Selfiegeil</p>
        </div>
      </div>
    </div>
  </div>
  <div class="cta-wrapper clearfix">
    <a class="btn btn-6 btn-6j" href="details.php">Angebot ansehen</a>

  </div>
</div>

<div class="meal-wrapper clearfix">
  <div class="person-data-wrapper">
    <p class="name">Selma Selfiegeil</p>
    <p class="person-meta-data">Bahnhofstr. 3</p>
    <p class="person-meta-data">78120 Furtwangen</p>
  </div>
  <div class="meal-info-wrapper">
    <h2 class="meal-headline">Supergeiles Salatblatt ohne Dressing</h2>
    <div class="meal-meta-data-wrapper clearfix">
      <div class="meal-meta-data-content">
        <span class="icon meal-meta-data-icon calendar-icon"></span>
        <p class="meal-meta-data">15.06.14</p>
      </div>
      <div class="meal-meta-data-content">
        <span class="icon meal-meta-data-icon clock-icon"></span>
        <p class="meal-meta-data">13:00 Uhr</p>
      </div>
      <div class="meal-meta-data-content meal-meta-data-content-wide">
        <span class="icon meal-meta-data-icon person-icon"></span>
        <p class="meal-meta-data">1 freien Platz</p>
      </div>
      <div class="meal-meta-data-content meal-meta-data-content-wide">
        <div class="eat-wrapper">
          <span class="icon meal-meta-data-icon fork-icon"></span>
          <p class="meal-meta-data meal-meta-data-hightlighted">Isst mit:</p>
        </div>
        <div class="meal-meta-data-person-wrapper"></div>
      </div>
    </div>
  </div>
  <div class="cta-wrapper clearfix">
    <a class="btn btn-6 btn-6j" href="details.php">Angebot ansehen</a>
  </div>
</div>-->

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
