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
            echo "login : ".$_SESSION["login"]."<br>mot de passe : ".$_SESSION["password"]."<br>SID : ".session_id();
            echo '
            <br><br><br>
            <form method="POST">
                <input type="submit" value="effacer mon compte" id="delete" name="delete-btn">
            </form>
            ';
            if (isset($_POST["delete-btn"])){
                echo '<script lang="JavaScript/text">
                const result = confirm("Êtes vous sûr.e de vouloir supprimer votre compte ?");
                </script>';
                $link = mysqli_connect("localhost", "root", "");
                mysqli_select_db($link, "among_us");
                $result = json_encode($result);
                if ($result){
                    $delete_request = "DELETE FROM users WHERE identifiant = \"".$_SESSION["login"]."\"";
                    //$result = mysqli_query($link, $delete_request);
                    if ($result) echo "compte supprimé."; //faudra déconnecter
                    else echo "votre compte n\'a pas pu être supprimé";
                }
                mysqli_close($link);
            }

            
        }
        else{
            echo "La session précédente a été détruite.";
        }

    ?>
</body>
</html>

