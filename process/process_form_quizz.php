<?php

require_once('../connect/connect.php');
session_start();

$idUser = $_SESSION["user"][0]["id_users"];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!empty($_POST['answer']) && is_array($_POST['answer'])) {
    $answers = $_POST['answer'];
    foreach ($answers as $questionId => $selectedAnswer) {
      $query = "INSERT INTO `answer_given` ( `id_users`,`id_answers`) 
      VALUES ( :idUser,:idAnswer);";
      $request = $bdd->prepare($query);
      $request->execute([
        ':idUser' => $idUser,
        ':idAnswer' => $selectedAnswer,
      ]);
    }
    header('Location: ./score.php');
  }
}
?>