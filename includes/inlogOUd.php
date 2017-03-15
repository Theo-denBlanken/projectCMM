<?php
// de inlogsessie ook wel inlogfunctie
echo 'de functie gaat starten $_Session....';
geefSession();
echo ' de post-settings: ';
echo '<pre>';
print_r( $_POST );
echo '</pre>';
$email                        = '';
$ww                           = '';
$fouten                       = '';
if( ! isset($_SESSION['vnaam'] ) ) {
	$voornaam                    = '';
}

$inlogKnopTekst       		= 'Log in';
$inlogKnopName        		= 'log_in';

if (  isset( $_SESSION['verberg'] )  ) {
	$inlogKnopClass 	= $_SESSION['verberg'];
} else {
	$inlogKnopClass		= 'form-group';
}


echo '$inlogKnopName: ' . $inlogKnopName . "<br>\n";

// verwerking van de submit-knop actie
if ( isset($_POST['log_in']) ) {
  $email = $_POST['email'];
  $email = schoneString( $email );
  $ww = md5( sleutel . $_POST['wachtwoord']);  			// versleuteld met sleutel en md5 encryptie

  if ( isset( $_POST['email'] ) && '' != $_POST['email']
	&&  isset( $_POST['wachtwoord'] ) && '' != $_POST['wachtwoord']  ) {

         // verbind met database
         echo 'verbinden....' . "<br>\n";
         $verbinding = mysqli_connect( DB_HOST, DB_USERNAME, DB_WACHTWOORD, DB_DATABASE );
         // controlleer de verbinding
         if( mysqli_connect_errno() ) {
           die( 'Fout bij het maken van de databaseverbinding: ' . mysqli_connect_error( $db_verbinding ) );
         }

         // de query opstellen
         $query = "SELECT * FROM gebruikers
                   WHERE email='$email' AND ww='$ww'";

         // query versturen en resultaat in variabele stoppen
         $resultaat = mysqli_query( $verbinding, $query );

         // controlleer of er resultaat is
         if ( mysqli_errno( $verbinding ) ) {
           die( 'de query is niet goed: '. $verbinding->error );
         }
         // resultaat verwerken
         // als het resultaat uit de equery precies 1 oplevert:
         if ( 1 == mysqli_num_rows( $resultaat ) ) {
           $gebruiker = mysqli_fetch_assoc($resultaat);
           $voornaam = $gebruiker['vnaam'];
           $_SESSION['vnaam']   = $voornaam;
           $_SESSION['email']   = $email;
           $_SESSION['ww']      = $ww;
           if( 1 == count( $gebruiker['tsv'] ) ) {
             $_SESSION['tsv'] = $gebruiker['tsv'];
           }
           $_SESSION['anaam'] = $gebruiker['anaam'];
           // knop functionaliteit omwisselen van de inlogknop
           $inlogKnopTekst      = $voornaam . ' afmelden';
           $inlogKnopName       = 'meld_af';
           $inlogKnopClass		  = $_SESSION['verberg'] = 'verberg';
           $_SESSION['submitNaam'] = 'meld-af';
           echo 'login-status: ingelogd' . "<br>\n";
         } else {
           // niet gevonden in de database
           $fouten = 'Uw gebruikersnaam en wachtwoord stemmen niet overeen.';
         }

  } else {
    $fouten = 'Zowel email als wachtwoord invullen';
  }
} else {
  // als het geen submit 'log-in' is
  $inlogKnopName = 'log_in';
  $inlogKnopClass		= 'form-group';
  $inlogKnopTekst =  $email = '';
  $_SESSION['vnaam'] =
  $_SESSION['tsv'] =
  $_SESSION['anaam'] =
  $_SESSION['ww'] =
  $_SESSION['email'] = '';
  $inlogKnopTekst = 'Log in';
  $_SESSION['verberg'] = 'form-group';
  $_SESSION['submitNaam'] = 'log_in';
  echo 'login-status: helaas niet ingelogd' . "<br>\n";
}

echo 'de inlogfunctie heeft gedraaid.' ;


geefSession();
// de sessie weergeven
function geefSession() {
  echo '<pre>';
  print_r( $_SESSION );
  echo '</pre>';
}
