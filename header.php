<?php
session_start();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta name="description" content="簡単に専門家に相談できるサービス">
  <title>ママぷらす</title>
  <meta property="og:url" content="">
  <meta property="og:site_name" content="お子さんのことが心配であればいつでも相談してください">
  <link rel="stylesheet" href="css
/style.min.css" type="text/css" media="all">
</head>


<link rel="stylesheet" href="base.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link href="img/mamapluslogo.png" sizes="192x192">
<link href="img/mamapluslogo.png">


<body>


  <div>
    <img class="imagecenter" src="img/mamaplus.png" style="width:20%;height:auto; padding:20px;">
    <p style="text-align: right;">
   <a href="logout.php">Sign Out</a>
  </p>
    <ul>
      <li><a href="index.php" style="padding-right: 70px;">TOP </a></li>
      <li><a href="service.php" style="padding-right:70px;">サービス紹介</a></li>
      <li><a href="intro.php" style="padding-right:70px;">担当紹介</a></li>
      <li><a href="example.php" style="padding-right:70px;">相談例</a></li>
      <li><a href="info.php" style="padding-right:70px;">保健師とは</a></li>

      <?php
      if (isset($_SESSION["useruid"])) {
        echo "<li><a href='profile.php' style='padding-right:70px;'>profile page</a></li>";
        echo "<li><a href='includes/logout.inc.php'>logout</a></li>";
      } else {
        echo "<li><a href='signup.php'>Signup/</a></li>";
        echo "<li><a href='login.php'>Login</a></li>";
      }

      ?>

    </ul>

  </div>