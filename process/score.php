<?php
session_start();
$idUser = $_SESSION["user"][0]["id_users"];
require_once('../connect/connect.php');
    global $bdd;
    $sql = ("SELECT COUNT(answer) 
            FROM answer, answer_given 
            WHERE answer.id_answers = answer_given.id_answers AND answer_given.id_users =:idUser AND answer.type_reponse ='true'; ");
            $query = $bdd->prepare($sql);
            $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
            $query->execute();
            $scores = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($scores as $score) {
        $scoreQuizz = $score['COUNT(answer)'];
    }

$sql = "INSERT INTO `score` ( `score`) VALUES ( :scoreQuizz);";
$query = $bdd->prepare($sql);
$query->bindValue(':scoreQuizz', $scoreQuizz, PDO::PARAM_STR);
$query->execute();
$lastIdScore = $bdd->lastInsertId();

$sql = "UPDATE `users` SET `id_score` = :idScore WHERE `id_users` = :idUser";
$query = $bdd->prepare($sql);
$query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
$query->bindValue(':idScore', $lastIdScore, PDO::PARAM_STR);
$query->execute();
?>