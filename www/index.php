<?php
require_once('../includes/header.php');


 ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>
            <h3> <?php
            echo ( ingelogd() ? 'u bent ingelogd' : 'Probeer eerst in te loggen.' )
            ?></h3>
            <p>Dit is een template voor een eenvoudige website. <br>
				Het omvat een grote callout genoemd de heldenEenheid en drie ondersteunende stukken of inhoud. Gebruik het als een uitgangspunt om iets</p>

            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php

            $paragraaf = '<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </p>'."\n";
            $paragraaf .= '<p><em>';
            $paragraaf .= date('l jS \of F Y G:i');
            $paragraaf .= '</em></p>'."\n";
            $paragraaf .= '<p><a class="btn btn-default" href="bericht.php">View details &raquo;</a></p>';


            for ($i=0; $i<8; $i++) {
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
