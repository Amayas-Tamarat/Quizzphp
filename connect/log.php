
<?php
require_once('connect.php');
function login($username): void
{
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
    $username =$_POST['pseudo'];
    global $bdd;
    $sql = ("SELECT * FROM users WHERE username ='$username'");
    $query = $bdd->prepare($sql);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($users == true) {
        $_SESSION["user"]=$users;
        header('Location: quizz.php');
    } else {
        $username = strip_tags($_POST['pseudo']);

        $sql = "INSERT INTO `users` ( `username`) 
        VALUES ( :pseudo);";
        $query = $bdd->prepare($sql);
        $query->bindValue(':pseudo', $username, PDO::PARAM_STR);
        $query->execute();

        $sql = ("SELECT * FROM users WHERE username ='$username'");
        $query = $bdd->prepare($sql);
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION["user"]=$users;
        header('Location: quizz.php');
    }
    }
}
?>
