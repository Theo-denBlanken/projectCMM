<?php

function haalWaardeVanKeyOp($arr, $key) {
  // deze functie controlleert of een key bestaat en haalt dan de waarde op
  if( !isset($arr[$key]) ) {
    return '';    // als er geen key gezet is een lege string teruggeven en stoppen
  }
  return trim($arr[$key]);  // retourneer de waarde bij de key en haal de spaties aan begin en einde weg
}

//ingevoerde strings schoonmaken ter beveiliging
function schoneString ( $input_string = '' ) {
	// verwijder spaties aan begin en einde
	$output = trim( $input_string );

	//als de string leeg is kan het hier stoppen
	if ( empty( $output ) ) {
		return $output;
	}

	// verwijder de union, concat en information schema's om hacking te voorkomen
	$output = preg_replace( '/(union[\s\+]*?select)|(concat(_ws)?\s*?\()|(information_schema)/i', '', urldecode( $output ) );

	// return the data
	return $output;
}

// de inlogsessie   ook wel inlogfunctie 

$email                = '';
$ww                   = '';
$fouten               = '';
if( ! $_SESSION['vnaam'] ) {
	$voornaam             = '';
}

$inlogKnopTekst       		= 'Log in';
$inlogKnopName        		= 'log_in';

if ( ! isset( $_SESSION['verberg'] ) ) {
	$inlogKnopClass 	= $_SESSION['verberg'];
} else {
	$inlogKnopClass		= 'form-group';
}

	
if ( ! isset( $_SESSION['submitNaam'] ) ) {
	$inlogKnopName		= 'log_in';
} else {
	$inlogKnopName 	= $_SESSION['submitNaam'];
}

if ( isset($_POST['log_in']) ) {
  $email = $_POST['email'];
  $email = schoneString( $email );
  $ww = md5( sleutel . $_POST['wachtwoord']);  			// versleuteld met sleutel en md5

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

         // als het resultaat uit d equery precies 1 oplevert
         if ( 1 == mysqli_num_rows( $resultaat ) ) {
           $gebruiker = mysqli_fetch_assoc($resultaat);
           $voornaam = $gebruiker['vnaam'];
           $_SESSION['vnaam'] = $voornaam;
           if( 1 == count( $gebruiker['tsv'] ) ) {
             $_SESSION['tsv'] = $gebruiker['tsv'];
           }
           $_SESSION['anaam'] = $gebruiker['anaam'];
           // knop functionaliteit omwisselen van de inlogknop
           $inlogKnopTekst      = 'afmelden';
           $inlogKnopName       = 'meld_af';
           $inlogKnopClass		= 'verberg';
           $_SESSION['verberg'] = 'verberg';
           $_SESSION['submitNaam'] = 'meld-af';
          //  header('location: welkom.php');
         } else {
           // niet gevonden in de database
           $fouten = 'Uw gebruikersnaam en wachtwoord stemmen niet overeen.';
         }

  } else {
    $fouten = 'Zowel email als wachtwoord invullen';
  }
}
