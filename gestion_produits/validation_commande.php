<?php 
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    $commandes = mysqli_query($link, "SELECT * FROM commande WHERE num_commande = ".$_GET["id"]);
    if (mysqli_fetch_assoc($commandes)["validation"] == 0) {
        mysqli_query($link, "UPDATE commande SET validation = TRUE WHERE num_commande =".$_GET["id"]);
    }
    else {
        mysqli_query($link, "UPDATE commande SET validation = FALSE WHERE num_commande =".$_GET["id"]);
    }
    $commandes = mysqli_query($link, "SELECT * FROM commande WHERE num_commande = ".$_GET["id"]);
    echo '<script lang="JavaScript">
                window.location.replace("../pages/commande.php?id='.mysqli_fetch_array($commandes)["user_id"].'");
            </script>';
?>

