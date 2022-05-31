<?php
    require("./open_session.php");
    
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (!isset($_GET["id"])){
        $account_delete = mysqli_query($link, "DELETE FROM users WHERE id = ".$_SESSION["id"]);
        $fav_delete = mysqli_query($link, "DELETE FROM favorites WHERE user_id = ".$_SESSION["id"]);
        $cart_delete = mysqli_query($link, "DELETE FROM carts WHERE user_id = ".$_SESSION["id"]);
        $paiement_delete = mysqli_query($link, "DELETE FROM paiement WHERE userid = ".$_SESSION["id"]);
        $commande_delete = mysqli_query($link, "DELETE FROM commande WHERE user_id = ".$_SESSION["id"]);
        
    }
    else{
        $account_delete = mysqli_query($link, "DELETE FROM users WHERE id = ".$_GET["id"]);
        $fav_delete = mysqli_query($link, "DELETE FROM favorites WHERE user_id = ".$_GET["id"]);
        $cart_delete = mysqli_query($link, "DELETE FROM carts WHERE user_id = ".$_GET["id"]);
        $paiement_delete = mysqli_query($link, "DELETE FROM paiement WHERE userid = ".$_GET["id"]);
        $commande_delete = mysqli_query($link, "DELETE FROM commande WHERE user_id = ".$_GET["id"]);
    }
    if ($account_delete && $fav_delete && $cart_delete && $paiement_delete && $commande_delete && $_SESSION["login"]!="admin"){
            echo "account deleted succesfully";
            setcookie("sid", SID, 1);                   //unset the cookie
            session_destroy();
    }
    
    else{
        echo "could not delete this account.";
    }
    
?>

<script lang="JavaScript">
    window.location.replace("../pages/Accueil.php");
</script>