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
    <title>Présentation_produits</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
    <?php require("../connexion/open_session.php");
    $IDDET = 16;            //ID de ce produit, à modifier ppour modifier le titre et le prix
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    $current_product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET=".$IDDET));
    ?>
</head>
<body>

    <!--Header-->
    <header>
        <!--headTOP-->
        <div class ="head-top">
            <div class="promo">
                <p><strong>OFFRE SPECIAL </strong>Pack 6 mini CREWMATE LÉGENDAIRES</p>
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
            <a href="Accueil.html" class="logo"><img src="images/Logo/49EF6F10-40D3-4537-8833-819406CB00D2.webp"></a>

            <form class="recherche">
                <input type="search" placeholder="Rechercher des produits" id="search">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
    

            <div class="item">
                <a href="#"><i class="fa-solid fa-moon"></i></a>
                <a href="#"><i class="fa-regular fa-heart"></i></a>
                <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
                <a href="#"><i class="fa-solid fa-user"></i></i></a>
            </div>
        </div>
        
        <!--FIN header-principal-->

        <!-- Menu-->
        <nav class="menu">
            <ul class="onglet"><a href="projet1.html">Accueil</a></ul>
            <ul class="onglet"><a href="#">Peluches</a>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
                <li class="link">BLBLAB</li>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
            </ul>
            <ul class="onglet"><a href="#">Cosplay</a>
                <li class="link">Enfants</li>
                <li class="link">Adultes</li>

            </ul>
            <ul class="onglet"><a href="#">Vetements</a>
                <li class="link">Sweets</li>
                <li class="link">Tee-shirts</li>
                <li class="link">Casquettes</li>
            </ul>
            <ul class="onglet" ><a href="#">Autres</a>
                <li class="link">Mugs</li>
                <li class="link">Stickers</li>
                <li class="link">Tapis de<br> Souris</li>
            </ul>
            <ul class="onglet"><a href="#">Cadeaux</a>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
                <li class="link">BLBLAB</li>
                <li class="link">BLABLA</li>
                <li class="link">BLABLA</li>
            </ul>
        </nav>
        <!-- FIN Menu-->

    </header>
    <!-- FIN Header-->

    <!-- Presentation des produits-->

    <div class="galerie">
        <div class="presentation_produits">
            <div class="container">
                <img src="images/Produits/cyan1.jpg">
            </div>

            <div class="details">
                <h6><a href="Accueil.html">Accueil</a> / <a href="#" class="">
                    <?php
                        if ($current_product["TYPE"] == "cosplay" || $current_product["TYPE"] == "plush" || $current_product["TYPE"] == "clothing"){
                            echo $current_product["TYPE"];
                        }
                        else echo "autres";
                    ?>
                </a></h6>
                <h3><?php echo $current_product["NAME"];?></h3>
                <h2><?php echo (intval($current_product["PRICE"])/100)."€";?></h2>

                <div class="description">
                    <h3>Description</h3>
                    <p> jkzkzkjflkjMAF dzjbfjbl bzjHBLJB JBJLBZFJBZZJBFJ FBJZJLHJZ ZBJLF <br>
                        jkzkzkjflkjMAF dzjbfjbl bzjHBLJB JBJLBZFJBZZJBFJ FBJZJLHJZ ZBJLF <br>
                        jkzkzkjflkjMAF dzjbfjbl bzjHBLJB JBJLBZFJBZZJBFJ FBJZJLHJZ ZBJLF <br>
                        jkzkzkjflkjMAF dzjbfjbl bzjHBLJB JBJLBZFJBZZJBFJ FBJZJLHJZ ZBJLF <br>
                        jkzkzkjflkjMAF dzjbfjbl bzjHBLJB JBJLBZFJBZZJBFJ FBJZJLHJZ ZBJLF <br>
                        jkzkzkjflkjMAF dzjbfjbl bzjHBLJB JBJLBZFJBZZJBFJ FBJZJLHJZ ZBJLF <br>

                    </p>
                </div>

                <div class="ajout">
                    <form method="post">
                        <?php $_POST["product_id"] = $current_product["IDDET"]; //id à automatiser?>             
                        <input type="submit" value="Ajouter au panier" id="add_or_buy" name="add_to_cart">
                        <input type="submit" value="Achetez maintenant" id="add_or_buy" name="buy_now">
                    </form>
                    <?php require("../gestion_produits/ajout_panier.php");?>             
                </div>

                
            </div>
        </div>

        <div class="produits_similaire">
            <div class= "container produit">
                <a href="#"><img src="images/Produits/blanc.jpg"></a>
            </div>
            <div class="container produit">
                <a href="" class=""><img src="images/Produits/jaune.jpg"></a>
            </div>
            <div class="container produit">
                <a href="#" class=""><img src="images/Produits/rouge1.jpg"></a>
            </div>
            <div class="container produit">
                <a href="" class=""><img src="images/Produits/rose.jpg"></a>
            </div>
        </div>
        
    </div>
    <!-- FIN Presentation des produits-->

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
                        <p class="marque">Marque</p>
                        <h5>Titre de l'article</h5> 
                        <p class="prix">58€</p>
                    </div>
                    <div class="items">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="#"><i class="fa-solid fa-eye"></i></a>
                    </div>
                </div>
                <div class="carte">
                    <img src="images/Produits/gonflable_cyan.jpg">
                    <div class="details">
                        <p class="marque">Marque</p>
                        <h5>Titre de l'article</h5> 
                        <p class="prix">58€</p>
                    </div>
                    <div class="items">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="#"><i class="fa-solid fa-eye"></i></a>
                    </div>            
                </div>
                <div class="carte">
                    <img src="images/Produits/CHAPEAU.jpg">
                    <div class="details">
                        <p class="marque">Marque</p>
                        <h5>Titre de l'article</h5> 
                        <p class="prix">58€</p>
                    </div>
                    <div class="items">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="#"><i class="fa-solid fa-eye"></i></a>
                    </div>            
                </div>
                <div class="carte">
                    <img src="images/Produits/jogging.jpg">
                    <div class="details">
                        <p class="marque">Marque</p>
                        <h5>Titre de l'article</h5> 
                        <p class="prix">58€</p>
                    </div>
                    <div class="items">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="#"><i class="fa-solid fa-eye"></i></a>
                    </div>            
                </div>
            </div>
        </div>
    </div>    


    <!--FIN Autre articles-->

    <!--Moyen de paiement-->

    <div class="moyens_paiements">
        <div class="container">
            <p>Moyens de paiement acceptés pour vos achats en ligne - Paiement 100% sécurisé</p>
            <div class="items">
                <i class="fa-brands fa-cc-amex"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-paypal"></i>
                <i class="fa-brands fa-cc-visa"></i>
            </div>
        </div>
    </div>

    <!--FIN Moyen de paiement-->

    <!--Garantie-->
    <div class="container_garantie">
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
    </div>

<!--FIN Garantie-->

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

</body>
</html>