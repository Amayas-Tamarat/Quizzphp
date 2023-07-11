<?php

include_once('connect.php');

$req = $db->prepare('INSERT INTO `users` (pseudo) VALUES(:pseudo)');

$req->execute([
    'pseudo' => $_POST['pseudo']
]);

header('location: .\Quizzphp\quizz.php');

?>
