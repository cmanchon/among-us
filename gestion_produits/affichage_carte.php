<?php
    function print_carte($link, $IDDET){
        echo '
            <div class="carte">
                <img src="images/Produits_IDDET/'.$IDDET.'.jpg">
                <div class="details">';
                        $current_product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET = ".$IDDET));
        echo '
                        <p class="marque">'.$current_product["TYPE"].'</p>
                        <h5>'.$current_product["NAME"].'</h5> 
                        <p class="prix">'.(intval($current_product["PRICE"])/100).' €</p>
                        
                        '.
                '</div>
                <div class="items">';
        if (isset($_SESSION["login"])){
            $check_request = mysqli_query($link, "SELECT * FROM favorites WHERE product_id =".$IDDET." and user_id =".$_SESSION["id"]);
            if (mysqli_num_rows($check_request)!=0){
                //le produit est déjà en fav
                echo '<a href="../gestion_produits/soustraction_fav.php?id='.$IDDET.'"><i class="fa fa-heart"></i></a>';
            }
            else{
                //le produit n'est pas en fav
                echo '<a href="../gestion_produits/ajout_fav.php?id='.$IDDET.'"><i class="fa-regular fa-heart"></i></a>';
            }
                
        }
        else echo '<a href="./Accueil.php?log=log"><i class="fa-regular fa-heart"></i></a>';
        echo'   <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
        ';
    }
?>