<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma session - Among Us Shop</title>
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

    <?php
        if (isset($_SESSION["login"]) && isset($_SESSION["password"])){
            echo "login : ".$_SESSION["login"]."<br>mot de passe : ".$_SESSION["password"]."<br>ID : ".$_SESSION['id'];
            echo '
            <br><br><br>
            <form method="POST">
                <input type="submit" value="effacer mon compte" id="delete_btn" name="delete-btn">
            </form>
            ';
            if (isset($_POST["delete-btn"])){
                echo '<script lang="JavaScript/text">
                if(confirm("Êtes vous sûr.e de vouloir supprimer votre compte ?")){
                    document.location.href ="./delete.php";
                }
                </script>';
            }

            
        }
        else{
            echo "La session précédente a été détruite.";
        }

    ?>
</body>
</html>

