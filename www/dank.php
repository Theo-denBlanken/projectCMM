<?php

require_once('../includes/header.php');

 echo "<pre>";
 print_r($_GET);
 print_r($_POST);    // drukt variablen en hun inhoud leesbaar af.
 echo "</pre>";



 $voornaam     = $_GET['voornaam'];
 $tv           = $_GET['tv'];
 $achternaam   = $_GET['achternaam'];
 $email        = $_GET['email'];
 $geslacht     = $_GET['geslacht'];
 $woonplaats   = $_GET['woonplaats'];

 ( $geslacht == 'Vrouw') ? $aanhef = 'Mw.' : $aanhef = 'Dhr.';

 // mail versturen
 $naar      = $email;
 $onderwerp = 'registratie bij CMM';
 $bericht = "Beste $voornaam,\n U bent succesvol geregistreerd.";
 $headers = 'Van: blanken5@xs4all.nl' . "\r\n" .
     'Reply-To: blanken5@xs4all.nl' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

 mail($naar, $onderwerp, $bericht, $headers);


  ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Bedankt</h1>

            <p>voor uw informatie <br>

            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
          <table>
            <tr>
              <td>
                Naam:
              </td>
              <td>
                <?php echo "$aanhef $voornaam $tv $achternaam"  ?>
              </td>
            </tr>
            <tr>
              <td>
                email:
              </td>
              <td>
                <?php echo "$email"; ?>
              </td>
            </tr>
            <tr>
              <td>
                Woonplaats:
              </td>
              <td><?php echo "$woonplaats"; ?></td>
            </tr>
          </table>
        </div>

<?php
  require_once('../includes/footer.php');
 ?>
