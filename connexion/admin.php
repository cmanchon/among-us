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
        if (isset($_SESSION["login"]) && isset($_SESSION["password"]) && $_SESSION["login"]=="admin" && $_SESSION["password"]=="admin"){
            $link = mysqli_connect("localhost", "root", "");
            mysqli_select_db($link, "among_us");
            $users_table = mysqli_query($link, "SELECT * FROM users");
            echo '<table id="users_table">';
            while ($row = mysqli_fetch_assoc($users_table)){
                echo "<tr><td>";
                echo $row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td>";
                echo "<td><a href='delete.php?id=".$row["id"]."' id='delete_btn'> - </a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "La session précédente a été détruite.";
        }
    ?>
</body>
</html>

