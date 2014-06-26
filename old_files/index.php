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
  <?php 

  ?>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <!-- Add your site or application content here -->
            <div data-role="page" data-url="/_display/" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 550px;">
              <div data-role="header" class="ui-header ui-bar-a" role="banner">

                <!-- oberer Bereich -->


                <div class="logo"><h1> Newsfeed </h1></div>
              </div>

              <div data-role="content" class="ui-content" role="main" style="min-height: 455px;">
                <!-- Inner content -->
               <!--  <?php  
                require_once 'connect.php';
                $select_meals = mysql_query("SELECT * FROM meal_tbl ORDER BY `meal_tbl`.`meal_ID` DESC"); 
                while($array_meals = mysql_fetch_array($select_meals,MYSQL_ASSOC)):
                  $user_ID= $array_meals['user_ID'];
                $select_user = mysql_query("SELECT * FROM user_tbl WHERE user_ID='$user_ID'") or die ("Invalid query: " . mysql_error ());;
                $selected_user = mysql_fetch_array($select_user,MYSQL_ASSOC);
                $firstname = $selected_user['firstname'];
                $lastname = $selected_user['lastname'];
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
                ?> -->
                <!-- <div class="meal-content">
                 <a href="<?php //LINK TO OVERLAY HERE echo "#meal-" . $meal_ID; ?>"><h3 class="headline"><?php echo $title; ?></h3></a>
                 <div class="date"><p>am <strong><?php echo $localyzedate; ?></strong>
                 </p></div>
                 <div class="time"><p>um <strong><?php echo $localyzehour; ?></strong>
                 </p></div>
                 <div class="author"><p>von <strong><?php echo $firstname . " " . $lastname; ?></strong>
                 </p></div>
                 <div class="seats"><p>für <strong><?php echo $seats; ?> Personen</strong>
                 </p></div>
               </div> -->



               <div class="wrapper accepted">
                <p> <strong>Peter Pan</strong> <br> Bahnhofstr. 12 <br> 78120 Furtwangen</p>
                <h3>Hackbraten mit Kartoffelbrei und Salat</h3>

                <table class="details">
                  <tr>
                    <td><img src="img/days.png" width="30px" height="30px"></td>
                    <td><p>15.06.2014</p></td>
                    <td><img src="img/clock.png" width="30px" height="30px"></td>
                    <td><p>13:30</p></td>
                  </tr>
                  <tr>
                    <td><img src="img/group.png" width="30px" height="30px"></td>
                    <td><p>f&uuml;r <strong>4 Personen</strong></p></td>
                    <td><img src="img/restaurant.png" width="30px" height="30px"></td>
                    <td><p><strong>nicht mehr mitessen</strong></p></td>
                  </tr>

                </table>
                <a href="details.php">Angebot ansehen</a>
              </div>

              <div class="wrapper offer">
                <p> <strong>Du</strong> <br> Dolor 6<br> 78120 Sitamet</p>
                <h3>Lorem ipsum dolor sit amet</h3>

                <table class="details">
                  <tr>
                    <td><img src="img/days.png" width="30px" height="30px"></td>
                    <td><p>15.06.2014</p></td>
                    <td><img src="img/clock.png" width="30px" height="30px"></td>
                    <td><p>14:15</p></td>
                  </tr>
                  <tr>

                    <td><img src="img/group.png" width="30px" height="30px"></td>
                    <td><p><strong>Isst mit:</strong><br>Rosa Panther, Ella Example</p></td>
                  </tr>
                </table>
                <table>
                  <tr>
                    <td><a href="details.php">Angebot &auml;ndern</a></td>
                    <td><img src="img/trash.png" width="30px" height="30px"></td>
                  </tr>
                </table>

              </div>

              <div class="wrapper">
                <p> <strong>Lorem Ipsum</strong> <br> Dolor 6 <br> 78120 Sitamet</p>
                <h3>Lorem ipsum dolor sit amet</h3>

                <table class="details">
                  <tr>
                    <td><img src="img/days.png" width="30px" height="30px"></td>
                    <td><p>15.06.2014</p></td>
                    <td><img src="img/clock.png" width="30px" height="30px"></td>
                    <td><p>14:15</p></td>
                  </tr>
                  <tr>
                    <td><img src="img/group.png" width="30px" height="30px"></td>
                    <td><p>f&uuml;r <strong>2 Personen</strong></p></td>
                    <td><img src="img/restaurant.png" width="30px" height="30px"></td>
                    <td><p>mitessen</p></td>
                  </tr>
                </table>
                <a href="details.php">Angebot ansehen</a>
              </div>

<!--               <div id="meal-<?php echo $meal_ID; ?>" class="meal-overlay hidden">
               <h3 class="headline"><?php echo $title; ?></h3>
               <div class="date"><p><?php echo $description; ?>
               </p></div>
               <div class="date"><p>am <strong><?php echo $localyzedate; ?></strong>
               </p></div>
               <div class="time"><p>um <strong><?php echo $localyzehour; ?></strong>
               </p></div>
               <div class="author"><p>von <strong><?php echo $firstname . " " . $lastname; ?></strong>
               </p></div>
               <div class="seats"><p>für <strong><?php echo $seats; ?></strong>
               </p></div>
             </div>
             <?php 
             endwhile;
             ?> -->
           </div>
           <div data-role="footer" class="ui-footer ui-bar-a" role="contentinfo">
            <!-- Inner content -->
            <div class="menu" align="center" >
              <h1><a href="index.php" class="color1">fl</a></h1>
            </div>

            <div class="add" align="center">
              <a href="addmeal.php" class="color1"><img src="img/add.svg"></a>
            </div>
          </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
      </body>
      </html>
