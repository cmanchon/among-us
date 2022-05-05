<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter - Among Us Shop</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1 id="title"><a href="./tmp_accueil.php">AMONG US</a></h1>
        <?php
            require("./open_session.php");  
            if (isset($_SESSION["login"]) && isset($_SESSION["password"])){
                echo '<h2><a href="./session.php">Ma session</a></h2>
                <h2><a href="./logout.php">Déconnexion</a></h2>';
                if ($_SESSION["login"]=="admin" && $_SESSION["password"]=="admin"){
                    echo '<h2><a href="./admin.php">Admin</a></h2>';
                }
            }
            else{
                echo '<h2><a href="./signup.php">S\'inscrire</a></h2>
                <h2><a href="./login.php">Se connecter</a></h2>';
            }
        ?>
    </header>
    <hr>
    <form method="POST">
        <h3><a href="./login.php">S'identifier</a></h3>
        <label for="identifiant">Identifiant</label><input type="text" name="identifiant" id="identifiant"><br>
        <label for="password">Mot de passe</label><input type="password" name="password" id="password"><br>
        <input type="submit" id="submit" name="submit" value="Se connecter">
    </form>

</body>
</html>

<?php
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (isset($_POST['submit'])){
        //DATABASE
        if (str_contains($_POST['identifiant'], '@')) $id_used = "email";
        else $id_used = "identifiant";
        $users_table = mysqli_query($link, "SELECT ".$id_used.", password from users");
        while ($row = mysqli_fetch_assoc($users_table)){
            if ($row[$id_used]==$_POST['identifiant'] && $row['password']==$_POST['password']){
                //SESSION
                $_SESSION["login"]=$_POST["identifiant"];
                $_SESSION["password"]=$_POST["password"];
                $_SESSION["userId"]=session_id();
                $_SESSION["compteur"]=0;
                header("Refresh:0, url=session.php");
                echo "t'es connecté";
                $connected = true;
            }
        }
        if (!isset($connected)){
            echo "erreur de connexion.";
        }
    }
    mysqli_close($link);

?>