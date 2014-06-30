<?php
session_start();
?>
<?php 
if($_SESSION['loggedin']!='true'){
  echo '<script type="text/javascript">
  window.location = "http://localhost:8888/Mealshare_2/login.php"
</script>';
}
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

  <div data-role="page" data-url="/_display/" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 550px;">
    <div data-role="header" class="ui-header ui-bar-a" role="banner">
      <div class="header-content clearfix">
        <h1 class="header-headline"> Newsfeed </h1>
        <div class="info-btn-wrapper"><a href="info.php" class="info-btn"></a></div>
      </div>
    </div>
    <div id="content" data-role="content" class="ui-content" role="main" style="min-height: 455px;">
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
      $meal_ID = $array_meals['meal_ID'];
      //var_dump($meal_ID);
      sort($meal_ID);
      $title= $array_meals['title'];
      $description= $array_meals['description'];
      $meal_date= $array_meals['meal_date'];
      setlocale(LC_TIME, 'de_DE');
      $localyzedate = date("d.m.Y", strtotime($meal_date));
      $hour= $array_meals['hour'];
      $localyzehour = date("G:i", strtotime($hour));
      $seats= $array_meals['seats'];
      // Auslesen der Daten
      $participants= $array_meals['participants'];
      $participants_new = explode(";", $participants);
      //var_dump($participants_new);
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
      <div id="meal-<?php echo $meal_ID; ?>"
        class="meal-wrapper
        <?php //if($_REQUEST['act'] == "delete"){ echo 'hidden'; } ?>
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
          <?php if(isset($participants_new[1])){ ?>
          <div class="meal-meta-data-content meal-meta-data-content-wide">
            <div class="eat-wrapper">
              <span class="icon meal-meta-data-icon fork-icon"></span>
              <p class="meal-meta-data meal-meta-data-hightlighted">Isst mit:</p>
            </div>
            <div class="meal-meta-data-person-wrapper">
              <?php foreach ($participants_new as $key => $value) {?>
              <p class="meal-meta-data-person
              <?php 
              if($session_user_ID == 0){
               echo 'meal-meta-data-person-own';
             }
             ?>
             "><?php echo $value; ?></p>
             <?php 
           }
           ?>
         </div>
       </div>
       <?php } ?>
     </div>
   </div>
   <div class="cta-wrapper clearfix">
    <a class="btn btn-6 btn-6j" href="#mealoverlay_<?php echo $meal_ID;?>">Angebot ansehen</a> 
    <?php
    if($user_ID != $session_user_ID && $_REQUEST['act'] == 'eat'){
      ?>
      <form method="post" action="?act=uneat">
        <div class="cta-btn-wrapper">
          <button name="uneat" value="uneat" class="cta-btn btn btn-6 btn-6j">
            Nicht mehr Mitessen
          </button>
        </div>
      </form>
      <?php
    }
    else if($user_ID != $session_user_ID || $_REQUEST['act'] == 'uneat' && $user_ID != $session_user_ID){
      ?>
      <form method="post" action="?act=eat">
        <div class="cta-btn-wrapper">
          <button name="eat" value="eat" class="cta-btn btn btn-6 btn-6j">
            Mitessen
          </button>
        </div>
      </form>
      <?php 
    }
    
    if($user_ID == $session_user_ID){
      ?>
      <form class="icon-wrapper" method="post" action="?act=delete">
        <button name="delete" class="btn btn-7 btn-7d btn-icon-only icon-remove">
          <input type="hidden" name="meal_ID" value="<?php echo $meal_ID; ?>">
        </form>
        <?php
      }
      ?>
    </div>
  </div>
  <?php 
  $meal_ID_post = $_REQUEST['meal_ID'];
  if($_REQUEST['act'] == "delete"){
    $delete = mysql_query("DELETE FROM meal_tbl WHERE meal_ID = '$meal_ID_post'");
    echo '<script type="text/javascript">  
    var content = document.getElementById("meal-' . $meal_ID_post . '");
    content.classList.add("hidden");
  </script>';
}
?>
<?php 
endwhile;
?>
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
<div class="ui-footer ui-bar-a" >
  <form method="post" action="?act=logout">
  <button name="logout" class="btn">Logout</button>
  </form>
  <?php if($_REQUEST['act']=='logout'){
    session_destroy();
  } ?>
</div>
</div>
<?php  
//require_once 'connect.php';
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
// Auslesen der Daten
$participants= $array_meals['participants'];
$participants_new = explode(";", $participants);
      //var_dump($participants_new);
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
<section class="meal-overlay semantic-content" id="mealoverlay_<?php echo $meal_ID; ?>" tabindex="-1"
  role="dialog" aria-labelledby="modal-label" aria-hidden="true">
  <div class="modal-inner">
   <div class="modal-content">
     <div class="meal-info-headline-wrapper">
       <h2 class="meal-info-headline">
         <?php 
         if($session_user_ID == '0'){
          echo 'Hier ist du mit.';
        }
        ?>
        <?php 
        if($session_user_ID == $user_ID){
          echo 'Dein Essensangebot.';
        }
        ?>
        <?php 
        if($session_user_ID != $user_ID){
          echo 'Hier könntest du mitessen!';
        }
        ?>
      </h2>           <!--Hier steht der passende Text zum Angebot; Eingetragen zum Mitessen: "Hier isst du mit!"  Eigenes Angebot: "Dein Essensangebot" Neutrales Angebot:  "Hier könntest du mitessen!"-->
    </div>
    <div class="meal-wrapper meal-wrapper-accepted clearfix"> <!---Der mealwrapper wird ausgetauscht je Nach Art des Angebots - accepted - offered - default (siehe details.php)!-->
     <div class="person-data-wrapper">
      <p class="name <?php 
      if($session_user_ID == $user_ID){
        echo 'name-own';
      }
      ?>"><?php echo $firstname . " " . $lastname; ?></p>
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
            <?php foreach ($participants_new as $key => $value) {?>
            <p class="meal-meta-data-person
            <?php 
            if($session_user_ID == 0){
             echo 'meal-meta-data-person-own';
           }
           ?>
           "><?php echo $value; ?></p>
           <?php 
         }
         ?>
       </div>
     </div>
   </div>
 </div>
 <?php 
 if($user_ID == '0' ){
  ?>
  <div class="cta-wrapper clearfix">
    <div class="cta-btn-wrapper"><p class="cta-btn btn btn-6 btn-6j">Nicht mehr mitessen</p></div>
  </div>
  <?php 
} ?>
<div class="description-wrapper">
  <p class="description"><?php echo $description; ?></p>
</div>
</div>
</div>
</div>
<a href="#!" class="modal-close icon close-icon" title="Close this modal" data-close="Close"
data-dismiss="modal">X</a>
</section>
<?php 
endwhile;
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>
</html>
