<?php

// de inlogfunctie
include('inlog.php');

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
