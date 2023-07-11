<?php

include_once('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <marquee class="marquee">
        <h5 style="color: white;">***Welcome To Our QuiZz***</h5>
    </marquee>

    <div class="container">
        <div>
            <div class="pseudo">
                <p><strong><?php echo $_POST['pseudo']; ?></strong></p>
            </div>
            <div class="quizz" id="quizz">
                <div class="qsm">
                    <?php
                    $query = "SELECT q.question, a.answer FROM question q INNER JOIN answer a ON q.id_question = a.id_question";
                    $result = $query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $question = $row['question'];
                        $answer = $row['answer'];
                        echo "<p>$question</p>";
                        echo "<p>$answer</p>";
                    }
                    ?>
                    <button type="onsubmit">Send</button>
                    </form>


                </div>

            </div>

        </div>
        <div class="section2">
            <button type="submit" id="deconnexion">Deconnecxion</button>
            <div class="score"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>