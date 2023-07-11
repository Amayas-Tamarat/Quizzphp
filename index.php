<?php
session_start();
include('./connect/log.php');
login(':pseudo');
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
   <div class="items"> 
   <img class="logo" src="./css/image/logo.png" alt="">
    <form class="form"  method="POST">
    <label for="pseudo"><h5 style="color: white;">pseudo</h5></label>
        <input type="text" name="pseudo">


        <button type="submit">Connecxion</button>
       
        </div>
    </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>