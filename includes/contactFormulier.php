<?php
$geslacht = $man = $vrouw = $woonplaats = $foutmeldingMail = '';

$voornaam     = haalWaardeVanKeyOp($_POST, 'voornaam');
$tv           = haalWaardeVanKeyOp($_POST, 'tv');
$achternaam   = haalWaardeVanKeyOp($_POST, 'achternaam');
$email        = haalWaardeVanKeyOp($_POST, 'email');
$woonplaats   = haalWaardeVanKeyOp($_POST, 'woonplaats');
$geslacht     = haalWaardeVanKeyOp($_POST, 'geslacht');

if( $geslacht === 'Vrouw') {
  $vrouw = 'checked';
  $man = '';
} elseif ($geslacht === 'Man') {
  $man = 'checked';
  $vrouw = '';
} else {
  $man = $vrouw = '';         // dit lijkt nodig te zijn om bij het begin alles genchecked te hebben
}

// valideer het mailadres
if ( ! filter_var($email, FILTER_VALIDATE_EMAIL) && $email !='') {
  $foutmeldingMail = '<span style="color: red;"> Geen geldig emailadres!</span>';
}

// controle op alle noodzakelijke en valide velden
if ($voornaam && $achternaam && $email && !$foutmeldingMail && $woonplaats && $geslacht ) {
    header("Location: dank.php?voornaam=$voornaam&tv=$tv&achternaam=$achternaam&email=$email&woonplaats=$woonplaats&geslacht=$geslacht");
    exit;
}
