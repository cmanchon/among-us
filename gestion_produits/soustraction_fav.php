<?php
    require_once("../connexion/open_session.php");  
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (isset($_GET["id"]) && isset($_SESSION["login"])){
        $product_info = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET=".$_GET['id']));
        $result = mysqli_query($link, "DELETE FROM favorites WHERE product_id = ".$_GET['id']." and user_id=".$_SESSION["id"]);
        if ($result)
            echo "<p>Ce produit a été retiré de votre liste de favoris !</p>";
        else 
            echo "<p>Une erreur a empêché votre produit d'être retiré de votre liste de favoris.</p>";
    }
    else {
        echo '
            <script lang="JavaScript">
                window.location.replace("../pages/Accueil.php?log=log");
            </script>
        ';
    }
    echo '<script lang="JavaScript">
        window.location.replace("../pages/boutique.php?type='.$product_info["TYPE"].'");
    </script>';

?>
