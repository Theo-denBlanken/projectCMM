<?php

require_once('../includes/header.php');

 ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Contact</h1>
            <h3> <?php
            echo ( ingelogd() ? 'u bent ingelogd' : 'Probeer eerst in te loggen.' )
            ?></h3>
            <p>Dit is de contactpagina van een eenvoudige website. <br>
				Het omvat een grote callout genoemd de helden. Eenheid en drie ondersteunende stukken of inhoud. Gebruik het als een uitgangspunt om iets.</p>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <h5>uw gegevens alstublieft</h5>
            <form class="" action="contact.php" method="post">
              <div class="form-group">
              <input type="text" name="voornaam" value="<?php echo $voornaam ?>" placeholder="voornaam" autofocus class="form-control"> <br>
              <input type="text" name="tv" value="<?php echo $tv ?>" placeholder="tussenvoegsels" size="13" class="form-control"> <br>
              <input type="text" name="achternaam" value="<?php echo $achternaam ?>" placeholder="achternaam" class="form-control"> <br>
              <input type="text" name="email" value="<?php echo $email ?>" placeholder="mailadres@service.nl" class="form-control"> <?php echo $foutmeldingMail; ?> <br>
              <select class="form-control" name="woonplaats">
                <option value="<?php echo $woonplaats ?>" ><?php echo $woonplaats ?></option>
                <option value="Aalsmeer">Aalsmeer</option>
                <option value="Amstelveen">Amstelveen</option>
                <option value="Amsterdam">Amsterdam</option>
                <option value="Zaandam">Zaandam</option>
              </select>
              <div class="radio">
                <input type="radio" name="geslacht" value="Vrouw" id="vrouw" <?php echo $vrouw ?> ><label for="vrouw">Vrouw</label><br>
                <input type="radio" name="geslacht" value="Man" id="man" <?php echo $man ?> ><label for="man" >Man</label><br>
              </div>
              <input type="reset" value="reset" class="btn">
              <input type="submit" value="Verstuur" class="btn btn-success">
            </div>
            </form>
        </div>

<?php
  require_once('../includes/footer.php');
 ?>
