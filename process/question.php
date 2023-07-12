<?php 
function question(){
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['answer']) && is_array($_POST['answer'])) {
        $answers = $_POST['answer']; 
        // Loop through the submitted answers
        foreach ($answers as $questionId => $selectedAnswer) {
        // $questionId is the ID of the question
        // $selectedAnswer is the value of the selected answer
        echo "Question ID: " . $questionId . ", Selected Answer: " . $selectedAnswer . "<br>";
        }
      }
}
}
?>