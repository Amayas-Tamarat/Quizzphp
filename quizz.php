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
            <div>
                <div class="quizz" id="quizz">

                    <div class="qsm" id="scroll" onscroll="myFunction()">
                        <form action="quizz.php" method="POST" onsubmit="return validationForm()">
                            <?php
                            $sql = ("SELECT * FROM  question");
                            $query = $bdd->prepare($sql);
                            $query->execute();
                            $questions = $query->fetchAll(PDO::FETCH_ASSOC);
                            shuffle($questions);
                            foreach ($questions as $question) {

                                // echo $question['question'] . '<br>';
                                $sql = 'SELECT * FROM `answer` WHERE id_question = :questionId';
                                $request = $bdd->prepare($sql);
                                $request->execute([
                                    ':questionId' => $question['id_question'],
                                ]);
                                $answers = $request->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                                <fieldset>
                                    <legend style="color: black; font-size: 22px;"><?php echo $question['question'] ?></legend>
                                    <?php foreach ($answers as $answer) { ?>
                                        <div style="color: red; font-size: 20px;">
                                            <input type="radio" id="<?php echo $answer['answer'] ?>" name="answer[<?php echo $question['id_question'] ?>]" value="<?php echo $answer['answer'] ?>">
                                            <label for="<?php echo $answer['answer'] ?>"><?php echo $answer['answer'] ?></label>

                                        </div>

                                    <?php }



                                    ?>
                                </fieldset>
                            <?php
                            }
                            ?>


                                <button type="onsubmit" class="btn btn-primary">Send</button>
                           
                        </form>



                    </div>
                    <div class="timer" id="timer">
                        <script>
                            function startTimer(duration, display) {
                                let timer = duration,
                                    minutes, seconds;
                                setInterval(function() {
                                    minutes = parseInt(timer / 60, 10);
                                    seconds = parseInt(timer % 60, 10);

                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;

                                    display.textContent = minutes + ":" + seconds;

                                    if (--timer < 0) {
                                        timer = duration;
                                    }
                                }, 1000);
                            }

                            window.onload = function() {
                                let duration = 420;
                                let display = document.querySelector('#timer');
                                startTimer(duration, display);
                            };
                        </script>
                    </div>
                </div>
                <form>


                </form>
            </div>

        </div>
        <div class="section2">
            <button type="submit" id="deconnexion" class="btn btn-primary">Deconnecxion</button>
            <div class="score">
                <?php
                $sql = 'SELECT score,username from `score`,`users` where score.id_score = users.id_score ORDER BY score DESC;';
                $request = $bdd->prepare($sql);
                $request->execute();
                $scores = $request->fetchAll(PDO::FETCH_ASSOC);
                foreach ($scores as $score) {
                    echo $score['score'] . ' = ' . $score['username'] . '<br>';
                }

                ?>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>