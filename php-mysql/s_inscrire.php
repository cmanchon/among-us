<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>
<body>
    <a href="./accueil.php"><h1>Accueil</h1></a>
    <a href="./s_inscrire.php"><h2>S'inscrire</h2></a>
    <form method="POST">
        <label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom">
        <label for="nom">Nom</label><input type="text" name="nom" id="nom"><br>
        <label for="identifiant">Pseudo</label><input type="text" name="identifiant" id="identifiant" required=required><br>
        <label for="email">Email</label><input type="email" name="email" id="email" required=required><br>
        <label for="password">Mot de passe</label><input type="password" name="password" id="password" required=required><br>
        <input type="submit" value="s'inscrire" name="submit"><br>
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
        $adding_request = "INSERT INTO users VALUES (".time().", '".$_POST['nom']." ".$_POST['prenom']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['identifiant']."')";
        var_dump($adding_request);
        $result = mysqli_query($link, $adding_request);
        if ($result){
            echo "You are signed up !";
        }
        else echo "There was an error signing you up.";
    }

?>