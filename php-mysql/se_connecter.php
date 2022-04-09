<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <a href="./accueil.php"><h1>Accueil</h1></a>
    <a href="./se_connecter.php"><h2>Se connecter</h2></a>
    <form method="POST">
        <label for="identifiant">Identifiant ou email</label><input type="text" name="identifiant" id="identifiant">
        <input type="password" name="password" id="password">
        <input type="submit" value="Se connecter" name="submit">
    </form>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
</style>
</body>
</html>

<?php
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (isset($_POST['submit'])){
        if (str_contains($_POST['identifiant'], '@')) $id_used = "email";
        else $id_used = "identifiant";
        $users_table = mysqli_query($link, "SELECT ".$id_used.", password from users");
        while ($row = mysqli_fetch_assoc($users_table)){
            if ($row[$id_used]==$_POST['identifiant'] && $row['password']==$_POST['password']){
                echo "t'es connecté";
            }
        }
    }
?>