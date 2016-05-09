<?php

define('USER', 'ipdw');
define('PASSWORD', 'ISFCE2016');
define('DSN', 'mysql:host=localhost;dbname=cinema;charset=UTF8');


global $msg_erreur;

try {
    $dbh = new PDO(DSN, USER, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $exception) {
    echo "Erreur ! : " . $exception->getMessage() . "<br/>";
    die();
}
?>