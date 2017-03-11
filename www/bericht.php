<?php
require_once('../includes/header.php');
 ?>

    <div class="jumbotron">
        <div class="container">
            <h1>een statisch bericht</h1>

            <p>Dit is de aboutpagina van een eenvoudige website. <br>
				Het omvat een grote callout genoemd de heldenEenheid en drie ondersteunende stukken of inhoud. Gebruik het as een uitgangspunt om iets.</p>

            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php

            $paragraaf = '<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </p>

            <p><a class="btn btn-default" href="#">Terug &laquo;</a></p>';

            for ($i=0; $i<5; $i++) {
              $berichtnummer = $i + 1;
              $uitvoer = '<div class="col-lg-4">';
              $uitvoer .= "\n<h3>Bericht $berichtnummer</h3> \n";
              $uitvoer .= $paragraaf;
              echo $uitvoer;
              echo "</div>";
            }
             ?>

        </div>

<?php
require_once('../includes/footer.php');
 ?>
