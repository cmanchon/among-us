<?php
    require("./open_session.php");
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    //DATABASE
    $users_table = mysqli_query($link, "SELECT * FROM users");
    while ($row = mysqli_fetch_assoc($users_table)){
        if ($row["email"]==$_POST['email'] && $row['password']==$_POST['password']){
            //SESSION
            $_SESSION["login"]=$row["identifiant"];
            $_SESSION["password"]=$_POST["password"];
            $_SESSION["userId"]=session_id();
            $_SESSION["id"] = $row["id"];
            echo "t'es connecté";
            $connected = true;
        }
    }
    if (!isset($connected)){
        echo "erreur de connexion.";
        echo '
            <script lang="JavaScript">
                window.location.replace("../pages/Accueil.php?log=log");
            </script>
        ';
    }
    echo '
        <script lang="JavaScript">
            window.location.replace("../pages/Accueil.php");
        </script>
    ';
    mysqli_close($link);

?>