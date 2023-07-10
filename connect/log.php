
<?php
require_once('connect.php');
session_start();
function login($username): void
{
    // Si les champs obligatoires ne sont pas remplis
    if ('' == $username){
        echo("Nom d'utilisateur ou mot de passe manquant");
        return;
    }

    // Préparation de la requête
    // Fonction getPDO() hérité de General.php
    $query = $bdd ->prepare('SELECT * FROM users WHERE username=:pseudo');
    $query->execute(['pseudo' => $username]);

    // Récupération de l'utilisateur
    $user = $query->fetch();

    // Si l'utilisateur n'est pas trouvé
    if (!$user) {
        return;
    }
    // Ajout de l'utilisateur à la session
    $S_SESSION['user'] =$user;

    header('Location: index.php');
}
?>