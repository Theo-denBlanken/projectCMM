<?php
include_once('../includes/header.php');

// variabelen aanmaken
$kop = $samenvatting = $inhoud = $onvolledig = '';

// voorwaarde: knop met name 'plaats' geklikt'
 if( isset($_POST['plaats'] ) ) {

   // formulierinhoud indien aanwezig in variabelen stoppen (ze kunnen dan teruggegeven worden)
    if( isset($_POST['kop']) && ( $_POST['kop'] != '') ){
      $kop = $_POST['kop'];
   } else { $onvolledig .= 'De kop onbreekt <br>';
   }
   if( isset($_POST['samenvatting']) && ('' != $_POST['samenvatting'] ) ) {
      $samenvatting = $_POST['samenvatting'];
   } else { $onvolledig .= 'De samenvatting onbreekt <br>';
   }
   if( isset($_POST['inhoud']) && ('' != $_POST['inhoud'] )  ) {
      $inhoud = $_POST['inhoud'];
   } else { $onvolledig .= 'De samenvatting onbreekt <br>';
   }



        // verbind met database
        $verbinding = mysqli_connect( DB_HOST, DB_USERNAME, DB_WACHTWOORD, DB_DATABASE );
        // controlleer de verbinding
        if( mysqli_connect_errno() ) {
          die( 'Fout bij het maken van de databaseverbinding: ' . mysqli_connect_error( $db_verbinding ) );
        }

        // de query opstellen


 }


 ?>
<div class="container">
  <div class="row">
    <h2>Maak uw bericht</h2>
    <form method="post">
    <div class="form-group"><label for="kop">Kop</label> <br>
      <input type="text" name="kop" id="kop" value="<?php echo $kop ?>" placeholder="kop van het bericht" size="80" autofocus> </div>

    <div class="form-group"><label for="samenvatting">Samenvatting</label> <br>
      <textarea name="samenvatting" id="samenvatting" rows="8" cols="80"><?php echo $samenvatting ?></textarea> </div>

    <div class="form-group">
      <label for="inhoud">Inhoud</label><br>
      <textarea name="inhoud" id="inhoud" rows="18" cols="80"><?php echo $inhoud ?></textarea>
    </div>

<div class="form-group">
      <label for="foto" class="btn btn-default btn-file">Foto toevoegen
      <input type="file" name="foto" id="foto" style="display: none;"></label>
</div>
<button type="submit" name="plaats" class="btn btn-success">Bericht plaatsen</button>
</form>
<p style="color: red; "><?php echo  $onvolledig; ?></p>
    </div>


 <?php include_once('../includes/footer.php') ?>
