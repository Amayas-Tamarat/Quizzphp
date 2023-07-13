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
                <div class="result" id="result">
                <marquee class="marquee2">
                <h5 style="color: white;">Resultat</h5>
    </marquee>
                    
                   
                </div>
                
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
                echo $score['score']. ' = ' .$score['username'].'<br>';
            }

             ?>

            </div>
        </div>
    </div>





 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

 </body>
 </html>