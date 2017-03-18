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
              // berichten uit de database

              // verbinden met de database
              $verbinding = mysqli_connect( DB_HOST, DB_USERNAME, DB_WACHTWOORD, DB_DATABASE );
              // controlleer de verbinding
              if( mysqli_connect_errno() ) {
                die( 'Fout bij het maken van de databaseverbinding: ' . mysqli_connect_error( $db_verbinding ) );
              }

              // query opstellen
              $query = "SELECT kop, samenvatting, datum, vnaam, tsv, anaam FROM nieuws
                        LEFT JOIN gebruikers ON nieuws.id
                        WHERE gebruikers.id = nieuws.gebruiker_id";

              // query uitvoeren
              $deBerichten = mysqli_query( $verbinding, $query );
              // controle bericht succesvol
              if ( mysqli_errno( $verbinding ) ) {
                die( 'de query is niet goed: '. $verbinding->error );
              } else {
                $gelukt = 'berichten opgehaald';
              }

              // de berichten plaatsen
              if ( mysqli_num_rows($deBerichten) > 1 ) {
                while( $bericht = mysqli_fetch_assoc( $deBerichten ) ) {
                  $html =   '<div class="col-lg-4">';
                  $html .=  '<h3>' . $bericht['kop'] . "</h3> \n";
                  $html .=  '<p>' . $bericht['samenvatting'] . "</p> \n";
                  $html .= '<p><em>' . $bericht['vnaam'] . ' ' . $bericht['anaam'];
                  $html .= ' ' . $bericht['datum'] . "</em></p> \n";
                  $html .=  "</div> \n";
                  echo $html;
                }
              }


            // nep berichten maken
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
             <?php echo $gelukt ?>

        </div>


<?php
require_once('../includes/footer.php');
 ?>
