<?php
session_start();
echo '<pre>';
print_r( $_SESSION );
echo '</pre>';

error_reporting(E_ALL);
ini_set('display_errors', true);

// de namen voor de verbinding met de database
define ('DB_HOST'       , 'localhost');
define ('DB_USERNAME'   , 'root');
define ('DB_WACHTWOORD' , 'root');
define ('DB_DATABASE'   , 'berichten');
define ('sleutel'       , 'cmm');
