<?php


include('settings.php');
require_once('functions.php');
require_once('../includes/contactFormulier.php');


 ?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

	<title>College of MultiMedia | PHP MySQL t</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

</head>

<body>
      <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">PHP MySQL</a>
              </div>
              <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="index.php">Home</a></li>
                      <li><a href="about.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                  </ul>
                  <form class="navbar-form navbar-right" method="post">
                      <div class="<?php echo $inlogKnopClass ?>">
                          <input type="text" placeholder="theo@cmm.nl" value="<?php echo $_SESSION['email']; ?>" class="form-control" name="email">
                      </div>
                      <div class="<?php echo $inlogKnopClass ?>">
                          <input type="password" placeholder="Wachtwoord" value="<?php echo ''; ?>" class="form-control" name="wachtwoord">
                      </div>
                      <button type="submit" name="<?php echo  $inlogKnopName ; ?>" class="btn btn-success"><?php echo $inlogKnopTekst; ?></button>
                      <p style="color: red;"><?php echo $fouten ?></p>
                  </form>

              </div>
              <!--/.navbar-collapse -->
          </div>
      </div>
