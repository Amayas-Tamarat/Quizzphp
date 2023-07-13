<?php 
function question(){
    global $bdd;
    $idUser = $_SESSION["user"][0]["id_users"];
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['answer']) && is_array($_POST['answer'])) {
        $answers = $_POST['answer']; 
        // Loop through the submitted answers
        foreach ($answers as $questionId => $selectedAnswer) {
        // $questionId is the ID of the question
        // $selectedAnswer is the value of the selected answer
        // echo "Question ID: " . $questionId . ", Selected Answer: " . $selectedAnswer .$idUser. "<br>";
        $sql = "INSERT INTO `answer_given` ( `id_users`,`id_answers`) 
        VALUES ( :idUser,:idAnswer);";
        $query = $bdd->prepare($sql);
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idAnswer', $selectedAnswer, PDO::PARAM_STR);
        $query->execute();
        }
        header('Location:./process/score.php');
      }
}
}
?>