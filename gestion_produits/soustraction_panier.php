<?php
    // require_once("../connexion/open_session.php");  
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (isset($_GET["id"])){
        $product_price = mysqli_fetch_assoc(mysqli_query($link, "SELECT PRICE FROM products WHERE IDDET='".$_GET['id']."'"))["PRICE"];
        $result = mysqli_query($link, "UPDATE carts SET quant = quant-1, total_price = total_price - ".$product_price." WHERE product_id = ".$_GET['id']);
        if ($result)
            echo "<p>Ce produit a été retiré de votre panier !</p>";
        else 
            echo "<p>Une erreur a empêché votre produit d'être retiré du panier.</p>";
    }
    // header("Location : ../pages/Panier.php");
    mysqli_query($link, "DELETE FROM carts WHERE quant = 0");
?>
<script lang="JavaScript">
    window.location.replace("../pages/Panier.php");
</script>