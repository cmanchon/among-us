<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href ="style.css" rel = "stylesheet" type = "text/css" />
    <script type="text/javascript" src="script.js"></script>
    <script src="https://kit.fontawesome.com/ffb4a8c022.js" crossorigin="anonymous"></script>
    <title>Accueil</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
    <?php  require("../connexion/open_session.php");?>
</head>
<body>

    <!--Header-->
    <header>
        <!--headTOP-->
        <div class ="head-top">
            <div class="promo">
                <p><strong>OFFRE SPECIALE </strong>Pack 6 mini CREWMATE LÉGENDAIRES</p>
            </div>

            <div class ="monnaie">
                <select name ="monnaie">
                    <option value="euro"> EUR € </option>
                    <option value ="dollar"> USD $ </option>

                </select>
            </div>

            <div class="langue">
                <select name ="langue">
                    <option value ="fr"> Français </option>
                    <option value ="esp">English</option>
                    <option value ="fr"> Español</option> 
                </select>
            </div>
        </div>
        
        <!--FIN headTOP-->

        <!--header-principal-->
        <div class="header-principal">
            <a href="Accueil.php" class="logo"><img src="images/Logo/49EF6F10-40D3-4537-8833-819406CB00D2.webp"></a>

            <form class="recherche">
                <input type="search" placeholder="Rechercher des produits" id="search">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <?php
                if (isset($_SESSION["login"])){
                    echo '
                    <div class="item">
                        <a href="#"><i class="fa-solid fa-moon"></i></a>
                        <a href="./boutique.php?type=favorites"><i class="fa-regular fa-heart"></i></a>
                        <a href="./Panier.php"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="../connexion/session.php"><i class="fa-solid fa-user"></i></i></a>
                    </div>
                    ';
                }
                else{
                    echo '
                    <div class="item">
                        <a href="#"><i class="fa-solid fa-moon"></i></a>
                        <a href="../connexion/login.php"><i class="fa-regular fa-heart"></i></a>
                        <a href="../connexion/login.php"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="../connexion/login.php"><i class="fa-solid fa-user"></i></i></a>
                    </div>
                    ';

                }
                
            ?>
        </div>
        
        <!--FIN header-principal-->

        <!-- Menu-->
        <nav class="menu">
            <ul class="onglet"><a href="./Accueil.php">Accueil</a></ul>
            <ul class="onglet"><a href="./boutique.php?type=plush">Peluches</a>
                <!-- <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li> -->
            </ul>
            <ul class="onglet"><a href="./boutique.php?type=cosplay">Cosplay</a>
                <!-- <li class="link">Enfants</li>
                <li class="link">Adultes</li> -->

            </ul>
            <ul class="onglet"><a href="./boutique.php?type=clothing">Vetements</a>
                <li class="link"><a href="./Presentation_produits.php?id=21">Sweats</a></li>
                <li class="link"><a href="./Presentation_produits.php?id=22">Tee-Shirt</a></li>
                <li class="link"><a href="./Presentation_produits.php?id=23">Casquette</a></li>
            </ul>
            <ul class="onglet" ><a href="./boutique.php?type=other">Autres</a>
                <li class="link"><a href="./Presentation_produits.php?id=31">Mugs</a></li>
                <li class="link"><a href="./Presentation_produits.php?id=23">Poster</a></li>
                <li class="link"><a href="./Presentation_produits.php?id=34">Tapis de<br> Souris</a></li>
            </ul>
            <ul class="onglet"><a href="./boutique.php?type=gift">Cadeaux</a>
                <!-- <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
                <li class="link">BLBLAB</li>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li> -->
            </ul>
        </nav>
        <!-- FIN Menu-->

    </header>
    <!-- FIN Header-->

    <!--Image de presentation-->
    <div class="spot">
        <div class="container">
          <div class="slider">
              <div class="slides">
                <img src="images/Font/5.jpg">
            </div>
  
            <div class="slides">
                <img src="images/Font/7.jpg">
            </div> 
          </div>
        </div>
    </div>


    <!--Carte_promo-->
    <div class="carte_promo">
        <div class="container container1">
            <div class="details">
                <p>Du 32 juillet<br> au 33 juillet 2022</p>
                <h2>-10%</h2>
                <h3>dès 50€ d'achat</h3>
                <button>J'EN PROFITE</button>
                <a href="#">*Voir les conditions</a>
            </div>
        </div>
        <div class="container container2">
        </div>
    </div>

    <!--FIN Carte_promo-->


    <!--Carte de produit 2-->
    <div class="carte_produit2">
        <?php 
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "among_us");
        $all_products = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products"));
        ?>
        <h1>Nouveaux <span>Produits</span></h1>
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

        <div class="container">
            <div class="carte">
                <img src="images/Produits/gonflable_rose.jpg">
                <div class="details">
                    <?php
                        $IDDET = 12;
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
                </div>            </div>
            <div class="carte">
                <img src="images/Produits/LIMITEE.webp">
                <div class="details">
                    <?php
                        $IDDET = 3;
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
                </div>            </div>
            <div class="carte">
                <img src="images/Produits/blanc.jpg">
                <div class="details">
                    <?php
                        $IDDET = 9;
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
                </div>            </div>
            <div class="carte">
                <img src="images/Produits/mousepad.jpg">
                <div class="details">
                    <?php
                        $IDDET = 34;
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

    <!--FIN Carte de produit 2-->

    <!--Carte Menu-->
    <div class="carte_menu">
        <div class="container">
            <p>Costumes<p>
            <a href="./boutique.php?type=cosplay"><button>DECOUVRIR</button></a>
        </div>
        <div class="container container2">
            <p>Peluches<p>
            <a href="./boutique.php?type=plush"><button>DECOUVRIR</button></a>
        </div>
    </div>
    <div class="carte_menu">
        <div class="container container3">
            <p>Accessoires<p>
            <a href="./boutique.php?type=other"><button>DECOUVRIR</button></a>
        </div>
        <div class="container container4">
            <p>Mugs<p>
            <a href="./boutique.php?type=other"><button>DECOUVRIR</button></a>
        </div>
        <div class="container container5">
            <p>Vêtements<p>
            <a href="./boutique.php?type=clothing"><button>DECOUVRIR</button></a>
        </div>
    </div>

    <!--FIN Carte Menu-->

    <!--Garantie-->
    <div class="garanties">
        <div class="container">
            <i class="fa-solid fa-truck"></i>
            <h5>Livraison Gratuite</h5>
            <p>Livraison payante <br>partout en France</p>
        </div>
        <div class="container">
            <i class="fa-solid fa-headphones"></i>
            <h5>Service Apres Vente</h5>
            <p>du lundi au samedi</p>
        </div>
        <div class="container">
            <i class="fa-solid fa-credit-card"></i>
            <h5>Payement 100% Securise</h5>
            <p>Nos transactions sont<br> 100% sécurisées. </p>
        </div>
    </div>

    <!--FIN Garantie-->

    <!--personnages-->
    <div class="personnages">
        <div class="container container1">
            <img src="images/Logo/61d183173a856e0004c63349.png">
        </div>
        <div class="container container2">
            <img src="images/Font/Among-Us-PNG-Isolated-Transparent.png">
        </div>
        <div class="container container3">
            <img src="images/Font/Among-Us-Transparent-Images-PNG.png">
        </div>
    </div>

    <!--FIN personnages-->

    <!--Video-->
    <div class="video">
        <iframe src="https://www.youtube.com/embed/K_XJyKXYI9M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <!--FIN Video-->

    <!-- newsletter2  -->
    <div class="newsletter2">
        <div class="container">
            <span>Abonnez-vous à notre newsletter</span>
            <p>Suivez toute l'actualité  en avant-première et profitez d'offres exclusives !</p>
    
            <form>
                <input type="email" placeholder="Votre Adresse E-mail">
                <input type="submit" value="S'abonner">
            </form>
        </div>
    </div>

    <!-- FIN newsletter2  -->


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="social">
                <p class="instagram"><i class="fa-brands fa-instagram"></i></p>
                <P class="linkedin"><i class="fa-brands fa-linkedin"></i></p>
                <p class="facebook"><i class="fa-brands fa-facebook"></i></p>
                <P class="twitter"><i class="fa-brands fa-twitter-square"></i></P>
                <p class="youtube"><i class="fa-brands fa-youtube"></i></p>
                <p class="discord"><i class="fa-brands fa-discord"></i></p>
                <p class="twitch"><i class="fa-brands fa-twitch"></i></p>
            </div>
            
            <div class="liens">
                <a href="#">Accueil</a>
                <a href="#">A propos de nous</a>
                <a href="#">Conditions Générales</a>
                <a href="#">Cookies</a>
                <a href="#"><i class="fa-solid fa-location-dot"></i> France</a>

            </div>

            <p class="copyright">&copy; 2022 XXXXXXX.XX - Tous droits réservés.</p>
        </div>
    </footer>
    <!-- FIN Footer -->

    <!--Scroll-Top-->
    <div class="scroll_top">
        <a href="#"><i class="fa-solid fa-arrow-up-long"></i></a>
    </div>
    <!--FIN Scroll-Top-->


    <!--Notification-->
    <div class="notification" id="notif">
        <bouton class="btn_notif" id='close-notif' onclick="fermeNotif()">
            <p>x</p>
        </bouton>
        <a href="./Presentation_produits.php?id=3">
        <div class="offre">
            <img src="images/Produits/SPECIAL.jpg">
        </div>

        <div class="offre-details">
            <p class="offre-texte">Offre spéciale</p>

            <p class="offre-titre">Pack 6 mini CREWMATE LÉGENDAIRES</p>
        </div></a>

    </div>
    <!--FIN Notification-->

    
</body>
</html>