<?php
session_start();
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

<marquee class="marquee" ><h5 style="color: white;">***Welcome To Our QuiZz***</h5></marquee>

    <div class="container">
        <div>
            <div class="pseudo"></div>
            <div class="quizz" id="quizz">
                <div class="qsm">
                    <form action="quizz.php" method="POST" onsubmit="return validationForm()">
                        <legend>En quelle année le Titanic a-t-il coulé  :</legend>

                        <div>
                            <input type="radio" id="1890" name="q1" value="1890" checked>
                            <label for="1890">1890</label>
                        </div>

                        <div>
                            <input type="radio" id="1912" name="q1" value="1912">
                            <label for="titanic">1912</label>
                        </div>

                        <div>
                            <input type="radio" id="1930" name="q1" value="1930">
                            <label for="titanic">1930</label>

                        </div>

                        <legend>Quelle est la capitale du Portugal?  :</legend>

                        <div>
                            <input type="radio" id="paris" name="q2" value="paris" checked>
                            <label for="portugale">paris</label>
                        </div>

                        <div>
                            <input type="radio" id="Lisbonne" name="q2" value="Lisbonne">
                            <label for="portugale">lisbonne</label>
                        </div>

                        <div>
                            <input type="radio" id="london" name="q2" value="london">
                            <label for="portugale">london</label>

                        </div>
                        <button type="onsubmit" class="btn btn-primary">Send</button>
                    </form>
                    

                </div>
                <form>


                </form>
            </div>

        </div>
        <div class="section2">
            <button type="submit" id="deconnexion" class="btn btn-primary">Deconnecxion</button>
            <div class="score"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>