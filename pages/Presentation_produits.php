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
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
    <?php require("../connexion/open_session.php");
    if (isset($_GET["id"])) $IDDET = $_GET["id"];
    else $IDDET = 9;            //ID de ce produit, à modifier pour modifier la page
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "among_us");
    if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM products WHERE IDDET=".$IDDET))==0){
        echo '
        <script lang="JavaScript">
            window.location.replace("./Accueil.php");
        </script>
    ';
    }
    $current_product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE IDDET=".$IDDET));
    echo '<title>'.$current_product["NAME"].'</title>';
    ?>
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
                    //connecté.e
                    echo '
                    <div class="item">
                        <a href="./boutique.php?type=favorites"><i class="fa-regular fa-heart"></i></a>
                        <a href="./Panier.php"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="./session.php"><i class="fa-solid fa-user"></i></a>
                    </div>
                    ';
                }
                else{
                    //non connecté.e
                    echo '
                    <div class="item">
                        <a href="#"><i class="fa-regular fa-heart" class="ouvrir" onclick="ouvre()"></i></a>
                        <a href="#"><i class="fa-solid fa-basket-shopping" class="ouvrir" onclick="ouvre()"></i></a>
                        <a href="#"><i class="fa-solid fa-user" class="ouvrir" onclick="ouvre()"></i></a>
                    </div>
                    ';

                }
                
            ?>
        </div>
        
        <!--FIN header-principal-->
        
        <!--Connexion-->
        <section class="connexion" id="connexion">
            <bouton class="btn_close" onclick="ferme()">x</bouton>
            <div class="container">
                <form method="POST" action="../connexion/signup.php" class="inscription">
                    <h1>Je suis nouveau ici</h1>
                    <div class="input">
                        <input type="text" name="identifiant" id="identifiant" placeholder="Pseudo" required>
                        <input type="text" name="nom" id="nom" placeholder="Nom" required>
                        <input type="text" name="prenom" id="prenom" placeholder="Prenom" required>
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                    </div>
                    <input type="submit" value="S'inscrire" name="signup">
                </form>
    
                <form method="POST" action="../connexion/login.php" class="identification">
                    <h1>Connexion</h1>
                    <div class="input">
                        <div class="ligne">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" id="identifiant" placeholder="* ADRESSE E-MAIL" required>
                        </div>
                        <div class="ligne">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" id="password" placeholder="* MOT DE PASSE" required>
                        </div>
                    </div>
                    <input type="submit" value="Se connecter" name="login">
                    <a href="#">Mot de passe oublié ?</a>
                </form>
            </div>
    
        </section>

        <?php

        ?>
        <!--FIN Connexion-->

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

    <!-- Presentation des produits-->

    <div class="galerie">
        <div class="presentation_produits">
            <div class="container">
                <?php echo '<img src="images/Produits_IDDET/'.$IDDET.'.jpg">';?>
            </div>

            <div class="details">
                <h6><a href="Accueil.html">Accueil</a> / <a href="#" class="">
                    <?php
                        if ($current_product["TYPE"] == "cosplay" || $current_product["TYPE"] == "plush" || $current_product["TYPE"] == "clothing" || $current_product["TYPE"] == "other"){
                            echo $current_product["TYPE"];
                        }
                        else echo "autres";
                    ?>
                </a></h6>
                <h3><?php echo $current_product["NAME"];?></h3>
                <h2><?php echo (intval($current_product["PRICE"])/100)."€";?></h2>
                <br><?php 
                        if (isset($_SESSION["login"])){
                            if (mysqli_query($link, "SELECT * FROM carts WHERE product_id=".$IDDET."and user_id = ".$_SESSION["id"])!=NULL){
                                $customer_info = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM carts WHERE product_id=".$IDDET."and user_id = ".$_SESSION["id"]));
                                echo "Actuellement <b>";
                                echo $customer_info["quant"]."</b> dans le panier";
                                
                            }

                        }
                    ?>           
                <div class="description">
                    <h3>Description</h3>
                    <?php 
                        $description_request = mysqli_query($link, "SELECT * FROM descriptions WHERE IDDET = ".$IDDET);
                        if ($description_request!=NULL && mysqli_num_rows($description_request)!=0){
                            echo "<p>".mysqli_fetch_assoc($description_request)["texte"]."</p>";
                        }
                        else 
                            echo "<p>Notre produit le plus convoité !</p>";        
                    ?>
                </div>

                <div class="ajout">
                    <form method="post">
                        <?php $_POST["product_id"] = $current_product["IDDET"]; //id à automatiser?>             
                        <input type="submit" value="Ajouter au panier" id="add_or_buy" name="add_to_cart">
                        <input type="submit" value="Achetez maintenant" id="add_or_buy" name="buy_now">
                    </form>
                    <?php 
                        if (isset($_POST["add_to_cart"]))
                            require("../gestion_produits/ajout_panier.php");?>             
                </div>

                
            </div>
        </div>

        <div class="produits_similaire">
            <!-- <div class= "container produit">
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
            </div> -->
            <?php
                if ($IDDET>=5 && $IDDET<=10){
                    $id_of_plushes = \array_diff(range(5, 10), [$IDDET]);
                    shuffle($id_of_plushes);
                    array_pop($id_of_plushes);
                    foreach ($id_of_plushes as $i){
                        echo ' 
                        <div class="container produit">
                            <a href="./Presentation_produits?id='.$i.'" class=""><img src="images/Produits_IDDET/'.$i.'.jpg"></a>
                        </div>
                        ';
                    }
                }
                else {
                    $all_ids =\array_diff(range(1, 34), [17, 18, 19, 20, 24, 25, 26, 27, 28, 29, 30, $IDDET]);
                    shuffle($all_ids);
                    for ($i = 0 ; $i<4 ; $i++){
                        echo ' 
                        <div class="container produit">
                            <a href="./Presentation_produits?id='.$all_ids[$i].'" class=""><img src="images/Produits_IDDET/'.$all_ids[$i].'.jpg"></a>
                        </div>
                        ';
                    }

                }
            ?>
        </div>
        
    </div>
    <!-- FIN Presentation des produits-->

    <!-- avis clients -->
    <div class="avis-clients">
        <?php
            if (isset($_SESSION["login"])){
                echo '
                <div class="new-avis">
                    <form method="post">
                        <label for="note">Notez ce produit :</label>
                        <input type="number" name="note" id="note" value=5 min=0 max=5> /5<br>
                        <label for="avis">Laissez un avis :</label><br>
                        <textarea name="avis" id="avis" cols="100" rows="10" placeholder="Très bon produit..." maxlength="1000"></textarea>
                        <input type="submit" value="Envoyer" name="submit-avis" id="submit-avis">
                    </form>
                </div>
                ';
                if (isset($_POST["submit-avis"])){
                    $result = mysqli_query($link, "INSERT INTO avis VALUES (".$_SESSION["id"].", ".$_POST["note"].', "'.$_POST["avis"].'", '.$IDDET.")");
                    if ($result) echo "Merci de nous transmettre votre avis !";
                }
            }
            else echo "Connectez vous pour écrire un avis.";

            function print_avis($NAME, $NOTE, $AVIS){
                echo '
                <div class="avis-autres-clients">
                    <p id="nom-client"><strong>'.$NAME.'</strong> donne <strong>'.$NOTE.'/5</strong> : </p>
                    <p id="avis-texte-client">'.$AVIS.'</p>
                    </div>
                    <br><hr>
                ';
            }
            $all_avis = mysqli_query($link, "SELECT users.identifiant, avis.note, avis.texte FROM avis JOIN users ON avis.userid = users.id WHERE IDDET = ".$IDDET);
            $i = 0;
            while ($row = mysqli_fetch_assoc($all_avis)){
                if ($i>=5) break;
                print_avis($row["identifiant"], $row["note"], $row["texte"]);
            } 
        ?>

        
    </div>
    <!-- FIN avis clients -->

    <!--Autres articles-->
    <div class="autres_articles">
        <div class="container">
            <i class="fa-regular fa-heart"></i>
            <p>Vous aimerez aussi</p>
        </div>
    </div>

    <div class="container_carte_produit" visibility=hidden>

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
                        echo '
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>
                        ';
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
                        echo '
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>
                        ';
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
                        echo '
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>
                        ';
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
                        echo '
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <a href="../gestion_produits/ajout_panier.php?id='.$IDDET.'"><i class="fa-solid fa-basket-shopping"></i></a>
                        <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>
                        ';
                    ?>
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