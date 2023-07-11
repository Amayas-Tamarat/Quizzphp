
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
        header('Location: quizz.php');
    } else {
    echo 'erreur';
    }
    }
}
?>