<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion - Among Us Shop</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1 id="title"><a href="./tmp_accueil.php">AMONG US</a></h1>
        <?php
            require_once("./open_session.php");  
            setcookie("sid", SID, 1);                   //unset the cookie
            session_destroy();
            if (isset($_SESSION["login"]) && isset($_SESSION["password"])){
                echo '<h2><a href="./session.php">Ma session</a></h2>
        <h2><a href="./logout.php">Déconnexion</a></h2>';
            }
            else{
                echo '<h2><a href="./signup.php">S\'inscrire</a></h2>
        <h2><a href="./login.php">Se connecter</a></h2>';
            }
        ?>
    </header>
    <hr>
    <h2>Session détruite !</h2> 


</body>
</html>
