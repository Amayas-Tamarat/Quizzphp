<?php
session_start();
include_once('./connect/connect.php')
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
                <?php
                foreach ($_SESSION["user"] as $user) {
                   echo $user['username'];
                }
                ?>
            </div>
            <div class="quizz" id="quizz">
                <div class="qsm">
                    <form action="quizz.php" method="POST" onsubmit="return validationForm()">
                        <?php
                        $sql = ("SELECT * FROM  question");
                        $query = $bdd->prepare($sql);
                        $query->execute();
                        $questions = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($questions as $question) {
                            $sql = 'SELECT * FROM `answer` WHERE id_question = :questionId';
                            $request = $bdd->prepare($sql);
                            $request->execute([
                                ':questionId' => $question['id_question'],
                            ]);
                            $answers = $request->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                            <fieldset>
                                <legend><?php echo $question['question'] ?></legend>
                                <?php foreach ($answers as $answer) { ?>
                                    <div>
                                        <input type="radio" id="<?php echo $answer['answer'] ?>"
                                         name="<?php echo $question['id_question'] ?>" value="<?php echo $answer['answer'] ?>">
                                        <label for="<?php echo $answer['answer'] ?>"><?php echo $answer['answer'] ?></label>
                                    </div>
                                <?php } ?>
                            </fieldset>
                        <?php
                        }
                        ?>
                        <button type="onsubmit">Send</button>
                    </form>
                </div>
                <?php echo $_POST[$question['id_question']]; ?>
            </div>
        </div>
        <div class="section2">
        <a href="./connect/logout.php"><button>deconnection</button></a>
            <div class="score"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>