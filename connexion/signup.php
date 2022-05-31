<?php
    require("./open_session.php");
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    //DATABASE
    $users_table = mysqli_query($link, "SELECT * FROM users");
    $id_max = 0;
    $identifiant_is_used = 0;
    while ($row = mysqli_fetch_assoc($users_table)){
        if ($row['id']>= $id_max) $id_max = $row['id'];
        if ($_POST["identifiant"] == $row["identifiant"]) $identifiant_is_used++;
    }
    $adding_request = "INSERT INTO users VALUES (".($id_max+1).", '".$_POST['nom']." ".$_POST['prenom']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['identifiant']."')";
    $result = mysqli_query($link, $adding_request);
    if ($result && $identifiant_is_used==0){
        echo "You are signed up !";
        //SESSION
        $_SESSION["login"]=$_POST["identifiant"];
        $_SESSION["password"]=$_POST["password"];
        $_SESSION["userId"]=session_id();
        $_SESSION["id"] = $id_max+1;
        echo '
                <script lang="JavaScript">
                    window.location.replace("../pages/Accueil.php");
                </script>
            ';
    }
    elseif ($identifiant_is_used!=0) echo "Cet identifiant a déjà été utilisé, choisissez-en un autre.";
    else echo "There was an error signing you up.";
?>