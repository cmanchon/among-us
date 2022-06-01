<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href ="style.css" rel = "stylesheet" type = "text/css" />
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/ffb4a8c022.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <title>Panier - Among Us Fan Shop</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
    <?php require("../connexion/open_session.php");
    $total_price = 0;
    ?>
    
</head>
<body>


    <!--Panier-->
    <div class="panier">
        <!--Head-->
        <div class="paiement">
            <div class="head">
                <div class="container">
                    <div class="details">
                        <h3>Paiement en ligne</h3>
                        <h4>Site sécurisé   <i class="fa-solid fa-lock"></i></h4>
                    </div>
                    <div class="continuer_achat">
                        <a href="Accueil.php">CONTINUER MES ACHATS <i class="fa-solid fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="container_items">
                <div class="items">
                    <a href="#" class="Commande">1</a>
                    <a href="Paiement.php" class="Paiement">2</a>
                    <a href="#" class="Confirmation">3</a>
                </div>
          
                <div class="text">
                    <p class="Commande">Commande</p>
                    <p class="Paiement">Paiement</p>
                    <p class="Confirmation">Confirmation</p>
                </div>
            </div>
        </div>

        <!--FIN Head-->

        <div class="container-panier">
            <div class="achats">
                <div class="container">
                    <h2>Panier</h2>
                    <!-- <div class="details">
                        <span>Article(s)</span>
                        <p>Prix</p>
                        <p>Quantité(s)</p>
                        <p>Total</p>
                    </div> -->
                    <br><br><br><br><br><br>
                    <?php
                        $link = mysqli_connect("localhost", "root", "");
                        mysqli_select_db($link, "among_us");
                        if (!isset(mysqli_fetch_assoc(mysqli_query($link, "SELECT user_id FROM carts WHERE user_id='".$_SESSION["id"]."'"))["user_id"])){
                            //panier vide
                            echo '
                            <div class="panier_vide">
                                <div class="img_panier_vide">
                                    <img src="images/Font/panier-vide.jpg.jpeg" alt="">
                                </div>
                                <h2>VOTRE PANIER EST VIDE!</h2>
                                <a href="Accueil.php">ACHETER MAINTENANT</a>
                            </div>  
                            ';
                        }
                        else{
                            //panier non vide
                            echo '<div class="panier_non_vide">';
                            $cart_table = mysqli_query($link, "SELECT products.NAME, products.PRICE, carts.quant, carts.total_price, carts.product_id FROM carts JOIN products ON carts.product_id=products.IDDET WHERE carts.user_id = ".$_SESSION["id"]);
                            // echo "<br><br>";
                            echo '<table id="cart_table">';
                            echo '<div class="details">
                            <tr><th><span>Article(s)</span></th>
                            <th><p>Prix</p></th>
                            <th><p>Quantité</p></th>
                            <th><p>Total</p></th></tr>
                            </div>';
                            while ($row = mysqli_fetch_assoc($cart_table)){
                                echo "<tr><td>";
                                echo '<a href="Presentation_produits?id='.$row["product_id"].'" id ="product_name">'.$row["NAME"]."</a>";
                                echo "</td><td>".(intval($row["PRICE"])/100)."</td><td>".$row["quant"]."</td><td>".(intval($row["total_price"])/100)."</td>";
                                $total_price += intval($row["total_price"]);
                                echo "<td><a href='../gestion_produits/soustraction_panier.php?id=".$row["product_id"]."' id='remove_product_btn'> -1 </a></td><td><a href='../gestion_produits/ajout_panier.php?id=".$row["product_id"]."' id='remove_product_btn'> +1 </a></td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
            <div class="recap">
                <H2>Résumé De Votre Commande</H2>
                <div class="prix">
                    <h5>Prix Total</h5>
                    <h3><?php echo ($total_price/100)." €";?></h3>
                </div>
                <!-- <input type="submit" value="PAYER" id="recap-button-payer"> -->
                <a href="./Paiement.php" id="recap-button-payer">PAYER</a>
            </div>
        </div>
        
    </div >

    <!--FIN Panier-->

    <!--Autre articles-->
    <div class="autres_articles">
        <div class="container">
            <i class="fa-regular fa-heart"></i>
            <p>Vous aimerez aussi</p>
        </div>
    </div>

    <div class="container_carte_produit">

        <div class="carte_produit2">
            <div class="container">
            <div class="carte">
                <img src="images/Produits/familial.jpg">
                <div class="details">
                    <?php
                        $IDDET = 16;
                        $current_product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET = ".$IDDET));
                        echo '
                        <p class="marque">'.$current_product["TYPE"].'</p>
                        <h5>'.$current_product["NAME"].'</h5> 
                        <p class="prix">'.(intval($current_product["PRICE"])/100).' €</p>
                        
                        ';
                    ?>
                </div>
                <div class="items">
                    <?php 
                        if (isset($_SESSION["login"])){
                            $check_request = mysqli_query($link, "SELECT * FROM favorites WHERE product_id =".$IDDET." and user_id =".$_SESSION["id"]);
                            if (isset(mysqli_fetch_assoc($check_request)["product_id"])){
                                //le produit est déjà en fav
                                echo '<a href="../gestion_produits/soustraction_fav.php?id='.$IDDET.'"><i class="fa fa-heart"></i></a>';
                            }
                            else{
                                //le produit n'est pas en fav
                                echo '<a href="../gestion_produits/ajout_fav.php?id='.$IDDET.'"><i class="fa-regular fa-heart"></i></a>';
                            }
                                
                            }
                        else echo '<a href="#"><i class="fa-regular fa-heart"></i></a>';
                            echo'   <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                                    <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>';
                    ?>
                </div>
            </div>
                <div class="carte">
                    <img src="images/Produits/gonflable_cyan.jpg">
                    <div class="details">
                    <?php
                        $IDDET = 15;
                        $current_product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET = ".$IDDET));
                        echo '
                        <p class="marque">'.$current_product["TYPE"].'</p>
                        <h5>'.$current_product["NAME"].'</h5> 
                        <p class="prix">'.(intval($current_product["PRICE"])/100).' €</p>
                        
                        ';
                    ?>
                </div>
                <div class="items">
                    <?php 
                        if (isset($_SESSION["login"])){
                            $check_request = mysqli_query($link, "SELECT * FROM favorites WHERE product_id =".$IDDET." and user_id =".$_SESSION["id"]);
                            if (isset(mysqli_fetch_assoc($check_request)["product_id"])){
                                //le produit est déjà en fav
                                echo '<a href="../gestion_produits/soustraction_fav.php?id='.$IDDET.'"><i class="fa fa-heart"></i></a>';
                            }
                            else{
                                //le produit n'est pas en fav
                                echo '<a href="../gestion_produits/ajout_fav.php?id='.$IDDET.'"><i class="fa-regular fa-heart"></i></a>';
                            }
                                
                            }
                        else echo '<a href="#"><i class="fa-regular fa-heart"></i></a>';
                            echo'   <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                                    <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>';
                    ?>
                </div>          
                </div>
                <div class="carte">
                    <img src="images/Produits/CHAPEAU.jpg">
                    <div class="details">
                    <?php
                        $IDDET = 1;
                        $current_product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET = ".$IDDET));
                        echo '
                        <p class="marque">'.$current_product["TYPE"].'</p>
                        <h5>'.$current_product["NAME"].'</h5> 
                        <p class="prix">'.(intval($current_product["PRICE"])/100).' €</p>
                        
                        ';
                    ?>
                </div>
                <div class="items">
                    <?php 
                        if (isset($_SESSION["login"])){
                            $check_request = mysqli_query($link, "SELECT * FROM favorites WHERE product_id =".$IDDET." and user_id =".$_SESSION["id"]);
                            if (isset(mysqli_fetch_assoc($check_request)["product_id"])){
                                //le produit est déjà en fav
                                echo '<a href="../gestion_produits/soustraction_fav.php?id='.$IDDET.'"><i class="fa fa-heart"></i></a>';
                            }
                            else{
                                //le produit n'est pas en fav
                                echo '<a href="../gestion_produits/ajout_fav.php?id='.$IDDET.'"><i class="fa-regular fa-heart"></i></a>';
                            }
                                
                            }
                        else echo '<a href="#"><i class="fa-regular fa-heart"></i></a>';
                            echo'   <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                                    <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>';
                    ?>
                </div>          
                </div>
                <div class="carte">
                    <img src="images/Produits/jogging.jpg">
                    <div class="details">
                    <?php
                        $IDDET = 21;
                        $current_product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET = ".$IDDET));
                        echo '
                        <p class="marque">'.$current_product["TYPE"].'</p>
                        <h5>'.$current_product["NAME"].'</h5> 
                        <p class="prix">'.(intval($current_product["PRICE"])/100).' €</p>
                        
                        ';
                    ?>
                </div>
                <div class="items">
                    <?php 
                        if (isset($_SESSION["login"])){
                            $check_request = mysqli_query($link, "SELECT * FROM favorites WHERE product_id =".$IDDET." and user_id =".$_SESSION["id"]);
                            if (isset(mysqli_fetch_assoc($check_request)["product_id"])){
                                //le produit est déjà en fav
                                echo '<a href="../gestion_produits/soustraction_fav.php?id='.$IDDET.'"><i class="fa fa-heart"></i></a>';
                            }
                            else{
                                //le produit n'est pas en fav
                                echo '<a href="../gestion_produits/ajout_fav.php?id='.$IDDET.'"><i class="fa-regular fa-heart"></i></a>';
                            }
                                
                            }
                        else echo '<a href="#"><i class="fa-regular fa-heart"></i></a>';
                            echo'   <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                                    <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>';
                    ?>
                </div>           
                </div>
            </div>
        </div>
    </div>    


    <!--FIN Autre articles-->
    


</body>
</html>
