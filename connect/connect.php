<?php

$user = 'root';
$pass = '';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=quizz', $user, $pass);
} catch (PDOException $e) {
      print "Erreur ! : " . $e->getMessage() . "<br/>";
      die();
}



?>