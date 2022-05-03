<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire' - Among Us Shop</title>
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
            }
            else{
                echo '<h2><a href="./signup.php">S\'inscrire</a></h2>
        <h2><a href="./login.php">Se connecter</a></h2>';
            }
        ?>
    </header>
    <hr>
    <form method="POST">
        <h3><a href="./signup.php">S'inscrire</a></h3>
        <label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom">
        <label for="nom">Nom</label><input type="text" name="nom" id="nom"><br>
        <label for="identifiant">Pseudo</label><input type="text" name="identifiant" id="identifiant" required=required><br>
        <label for="email">Email</label><input type="email" name="email" id="email" required=required><br>
        <label for="password">Mot de passe</label><input type="password" name="password" id="password" required=required><br>
        <input type="submit" value="S'inscrire" id="submit" name="submit"><br>
    </form>

</body>
</html>

<?php
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (isset($_POST['submit'])){
        //DATABASE
        $users_table = mysqli_query($link, "SELECT id FROM users");
        $id_max = 0;
        while ($row = mysqli_fetch_assoc($users_table)){
            if ($row['id']>= $id_max) $id_max = $row['id'];
        }
        $adding_request = "INSERT INTO users VALUES (".($id_max+1).", '".$_POST['nom']." ".$_POST['prenom']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['identifiant']."')";
        $result = mysqli_query($link, $adding_request);
        if ($result){
            echo "You are signed up !";
            //SESSION
            $_SESSION["login"]=$_POST["identifiant"];
            $_SESSION["password"]=$_POST["password"];
            $_SESSION["userId"]=session_id();
            $_SESSION["compteur"]=0;
        }
        else echo "There was an error signing you up.";
    }

?>