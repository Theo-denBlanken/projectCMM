<?php
// echo "pagina start... ";
// geefSession();

// de inlogsessie ook wel inlogfunctie
// variablen aanmaken of uit de $_SESSION halen
$email          = ( isset($_SESSION['email']) )       ? $_SESSION['email'] 	    : '';
$ww             = ( isset($_SESSION['ww']) )          ? $_SESSION['ww'] 		    : '';
$fouten         = ( isset($_SESSION['fouten']) )      ? $_SESSION['fouten']     : '';
$voornaam       = ( isset($_SESSION['vnaam']) )       ? $_SESSION['vnaam']      : '';
$tsv            = ( isset($_SESSION['tsv']) )         ? $_SESSION['tsv']        : '';
$achternaam     = ( isset($_SESSION['anaam']) )       ? $_SESSION['anaam']      : '';
$inlogKnopTekst = ( isset($_SESSION['knopTekst']) )   ? $_SESSION['knopTekst']  : 'Log in';
$inlogKnopName  = ( isset($_SESSION['submitNaam']) )  ? $_SESSION['submitNaam'] : 'log_in';
$inlogKnopClass = ( isset($_SESSION['verberg']) )     ? $_SESSION['verberg']    : 'form-group';
$schrijfKnop    = ( isset($_SESSION['schrijf']) )     ? $_SESSION['schrijf']    :'';  // extra pagina

// echo "variabelen geset of gehaald";
// geefSession();
// verwerking van de submit-knop actie

if ( isset($_POST['log_in']) ) {
  $email = $_POST['email'];
  $email = schoneString( $email );
  $ww = md5( sleutel . $_POST['wachtwoord']);  			// versleuteld met sleutel en md5 encryptie

  if ( isset( $_POST['email'] ) && '' != $_POST['email']
	&&  isset( $_POST['wachtwoord'] ) && '' != $_POST['wachtwoord']  ) {

         // verbind met database
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
           $voornaam = $_SESSION['vnaam'] = $gebruiker['vnaam'];
           $_SESSION['email']   = $email;
           $_SESSION['ww']      = $ww;
           if( 1 == count( $gebruiker['tsv'] ) ) {
             $_SESSION['tsv'] = $gebruiker['tsv'];
           }
           $_SESSION['anaam']   = $gebruiker['anaam'];
           // knop functionaliteit omwisselen van de inlogknop
           $inlogKnopTekst      = $_SESSION['knopTekst']     = $voornaam . ' afmelden';
           $inlogKnopName       = $_SESSION['submitNaam'] = 'meld_af';
           $inlogKnopClass		  = $_SESSION['verberg'] = 'verberg';
           $schrijfKnop         = $_SESSION['schrijf'] = '<li><a href="../www/schrijf.php">Bericht plaatsen</a></li>';
         } else {
           // niet gevonden in de database
           $fouten = 'Uw gebruikersnaam en wachtwoord stemmen niet overeen.';
         }
  } else {
    $fouten = 'Zowel email als wachtwoord invullen';
  }
} elseif (isset($_POST['meld_af'])) {

  // als het geen submit 'log-in' is amken we alles leeg of default
  $_SESSION['email']  =  $email     =
  $_SESSION['ww']     = $ww         =
  $_SESSION['vnaam']  = $voornaam   =
  $_SESSION['tsv']    = $tsv        =
  $_SESSION['anaam']  = $achternaam = '';
  $inlogKnopTekst     = $_SESSION['knopTekst'] = 'Log in';
  $inlogKnopName      = $_SESSION['submitNaam'] = 'log_in';
  $inlogKnopClass	    =	$_SESSION['verberg'] = 'form-group';
  $schrijfKnop        = $_SESSION['schrijf']  ='';
  //header('location: index.php'); geeft foutmelding headers sent
}


// echo "loginphp doorlopen...";
// geefSession();
// de sessie weergeven
function geefSession() {
  echo '<pre>';
  print_r( $_SESSION );
  echo '</pre>';
}
