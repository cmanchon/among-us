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
    <?php

        require("../connexion/open_session.php");
        if (!isset($_SESSION["login"])){
            //non connecté.e -> redirige vers l'accueil
            echo '<script lang="JavaScript">
                window.location.replace("./Accueil.php");
            </script>';
        }
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "among_us");
        if (isset($_GET["id"])){
            $commande_info = mysqli_query($link, "SELECT commande.num_commande, commande.user_id, commande.product_id, commande.quant, commande.validation, products.NAME, products.PRICE FROM commande JOIN products ON products.IDDET=commande.product_id WHERE user_id =".$_GET["id"]);
            $user_name = mysqli_fetch_assoc(mysqli_query($link, "SELECT name FROM users WHERE id = ".$_GET["id"]))["name"];
        } 
        else {
            //pas de id défini -> redirige vers la page session
            echo '<script lang="JavaScript">
                window.location.replace("./session.php");
            </script>';
        }
        
    ?>
    <title>Among Us Fan Shop - Commandes</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
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

            <form class="recherche" method=POST>
                <input type="search" placeholder="Rechercher des produits" id="search" name="barre-recherche">
                <button type="submit" name="recherche">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <?php
                $all_products = mysqli_query($link, "SELECT * FROM products");
                if (isset($_POST["recherche"])){
                    while ($row = mysqli_fetch_assoc($all_products)){
                        if (stripos($row["TYPE"], $_POST["barre-recherche"]) !== false){
                            echo '
                                    <script lang="JavaScript">
                                        window.location.replace("./boutique.php?type='.$row["TYPE"].'");
                                    </script>
                            ';
                        }
                        else if (stripos($row["NAME"], $_POST["barre-recherche"])!==false || $_POST["barre-recherche"]== $row["IDDET"]){
                            echo '
                                    <script lang="JavaScript">
                                        window.location.replace("./Presentation_produits.php?id='.$row["IDDET"].'");
                                    </script>
                            ';
                        }
                    }
                }


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

    <div class="description_section">
        <div class="container">
            <h4><a href="Accueil.php">Accueil</a> / <a href="#">Commandes</a></h4>
            <div class="details">
                <?php 
                    if (isset($user_name)) echo "<h2>Informations sur les commandes de ".$user_name."</h2><br><br>";
                ?>
        <?php
            if ($_SESSION["login"] == "admin" && mysqli_num_rows($commande_info)!=0){
                echo '<table id="users_table">';
                echo '
                <tr>
                    <th>N° de la commande</th>
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                    <th>Validation</th>
                </tr>';
                while ($row = mysqli_fetch_assoc($commande_info)){
                    echo "<tr><td>";
                    echo $row["num_commande"]."</td><td>".$row["NAME"]."</td><td>".$row["quant"]."</td><td>".(intval($row["quant"]*$row["PRICE"])/100)."</td><td>".$row["validation"]."</td>";
                    echo '<td><a href="../gestion_produits/validation_commande.php?id='.$row["num_commande"].'" id="valider_commande">Valider</a></td>';
                    
                    echo "</tr>";
                }
                echo "</table>";
            }
            else echo "Cet utilisateur n'a aucune commande.";

        ?>
    </div></div><br>

    






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

            <p class="copyright">&copy; 2022 Among Us Fan Shop - Tous droits réservés.</p>
        </div>
    </footer>
    <!-- FIN Footer -->
href
    <!--Scroll-Top-->
    <div class="scroll_top">
        <a href="#"><i class="fa-solid fa-arrow-up-long"></i></a>
    </div>
    <!--FIN Scroll-Top-->

</body>
</html>

<script>
    function confirm_delete(id){
        if (confirm("Êtes vous sûr.e de vouloir supprimer ce compte ?")){
            if (id==-1){
                //suppression d'un compte d'un utilisateur 
                window.location.replace("../connexion/delete.php");
            }
            else{
                //suppression d'un compte d'un utilisateur choisi par l'admin
                window.location.replace("../connexion/delete.php?id="+id);
            }
        }
    }
</script>
