<?php
    require_once("../connexion/open_session.php");  
    if (!isset($_SESSION["login"])){
        echo '
            <script lang="JavaScript">
                window.location.replace("../pages/Accueil.php");
            </script>
    ';
    }
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (isset($_GET["id"])){
        $product_price = mysqli_fetch_assoc(mysqli_query($link, "SELECT PRICE FROM products WHERE IDDET='".$_GET["id"]."'"))["PRICE"];
        if (mysqli_num_rows(mysqli_query($link, "SELECT quant FROM carts WHERE product_id=".$_GET["id"]." and user_id = ".$_SESSION["id"]))==0){
            //l'objet n'est pas déjà dans le panier -> on l'ajoute
            $result = mysqli_query($link, "INSERT INTO carts VALUES (".$_GET["id"].", ".$_SESSION["id"].", 1, ".$product_price.")");
            if ($result)
            echo "<p>Ce produit a été ajouté à votre panier !</p>";
            else 
            echo "<p>Une erreur a empêché votre produit d'être ajouté au panier.</p>";
        }
        else {
            $result = mysqli_query($link, "UPDATE carts SET quant = quant+1, total_price = total_price + ".$product_price." WHERE product_id = ".$_GET["id"]." and user_id = ".$_SESSION["id"]);
            if ($result)
                echo "<p>Ce produit a été ajouté à votre panier !</p>";
            else 
                echo "<p>Une erreur a empêché votre produit d'être ajouté au panier.</p>";
        }
    }
    else if (isset($_POST["add_to_cart"])){
        $product_price = mysqli_fetch_assoc(mysqli_query($link, "SELECT PRICE FROM products WHERE IDDET=".$_POST["product_id"]))["PRICE"];
        if (mysqli_num_rows(mysqli_query($link, "SELECT quant FROM carts WHERE product_id=".$_POST["product_id"]." and user_id = ".$_SESSION["id"]))==0){
            //l'objet n'est pas déjà dans le panier -> on l'ajoute
            $result = mysqli_query($link, "INSERT INTO carts VALUES (".$_POST["product_id"].", ".$_SESSION["id"].", 1, ".$product_price.")");
            if ($result)
            echo "<p>Ce produit a été ajouté à votre panier !</p>";
            else 
            echo "<p>Une erreur a empêché votre produit d'être ajouté au panier.</p>";
        }
        else{
            $result = mysqli_query($link, "UPDATE carts SET quant = quant+1, total_price = total_price + ".$product_price." WHERE product_id = ".$_POST["product_id"]."and user_id = ".$_SESSION["id"]);
            if ($result)
            echo "<p>Ce produit a été ajouté à votre panier !</p>";
            else 
            echo "<p>Une erreur a empêché votre produit d'être ajouté au panier.</p>";
        }
    }
    echo '
    <script lang="JavaScript">
        window.location.replace("../pages/Panier.php");
    </script>
    ';

?>