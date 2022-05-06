
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - Among Us Shop</title>
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
            $link = mysqli_connect("localhost", "root", "");
            mysqli_select_db($link, "among_us");
            if (!isset($_GET["id"])){
                $delete_request = "DELETE FROM users WHERE id = ". $_SESSION["id"];
            }
            else{
                $delete_request = "DELETE FROM users WHERE id = ". $_GET["id"];
            }
            if (mysqli_query($link, $delete_request)){
                echo "account deleted succesfully";
                if ($_SESSION["login"]!="admin"){
                    setcookie("sid", SID, 1);                   //unset the cookie
                    session_destroy();
                }
            }
            else{
                echo "could not delete this account.";
            }
        ?>

    
</body>
</html>

