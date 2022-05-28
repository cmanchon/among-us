<?php
    require_once("../connexion/open_session.php");  
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (isset($_GET["id"])){
        $product_info = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET=".$_GET["id"]));
        if (mysqli_num_rows(mysqli_query($link, "SELECT product_id FROM favorites WHERE product_id=".$_GET["id"]." and user_id =".$_SESSION["id"]))==0){
            //l'objet n'est pas déjà en fav -> on l'ajoute
            $result = mysqli_query($link, "INSERT INTO favorites VALUES (".$_GET["id"].", ".$_SESSION["id"].")");
            if ($result)
                echo "<p>Ce produit a été ajouté à votre liste de favoris !</p>";
            else 
                echo "<p>Une erreur a empêché votre produit d'être ajouté à votre liste de favoris.</p>";
        }
    }
    else if (isset($_POST["add_to_favs"])){
        $product_price = mysqli_fetch_assoc(mysqli_query($link, "SELECT PRICE FROM products WHERE IDDET='".$_POST["product_id"]."'"))["PRICE"];
        if (mysqli_num_rows(mysqli_query($link, "SELECT product_id FROM favorites WHERE product_id=".$_POST["product_id"]." and user_id =".$_SESSION["id"]))==0){
            //l'objet n'est pas déjà en fav -> on l'ajoute
            $result = mysqli_query($link, "INSERT INTO favorites VALUES (".$_POST["product_id"].", ".$_SESSION["id"].")");
            if ($result)
                echo "<p>Ce produit a été ajouté à votre liste de favoris !</p>";
            else 
                echo "<p>Une erreur a empêché votre produit d'être ajouté à votre liste de favoris.</p>";
            
        }
    }
    echo '<script lang="JavaScript">
        window.location.replace("../pages/boutique.php?type='.$product_info["TYPE"].'");
    </script>';

?>