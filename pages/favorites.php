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
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "among_us");
        if (isset($_GET["type"])){
            $TYPE = $_GET["type"];
        }
        else $TYPE = "cosplay"; //modifiable
        if (isset($_GET["order"])){
            if ($_GET["order"] == "AZ") $ORDER = "NAME ASC";
            else if ($_GET["order"] == "ZA") $ORDER = "NAME DESC";
            else if ($_GET["order"] == "price_asc") $ORDER = "PRICE ASC";
            else if ($_GET["order"] == "price_desc") $ORDER = "PRICE DESC";
        }
        else $ORDER = "IDDET ASC";
        echo '
        <title>'.$TYPE.'</title>
        ';
    ?>
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
    <?php require("../connexion/open_session.php"); ?>
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
    

            <div class="item">
                <a href="#"><i class="fa-solid fa-moon"></i></a>
                <a href="#"><i class="fa-regular fa-heart"></i></a>
                <a href="./Panier.php"><i class="fa-solid fa-basket-shopping"></i></a>
                <a href="#"><i class="fa-solid fa-user"></i></i></a>
            </div>
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

    <div class="description_section">
        <div class="container">
            <h4><a href="Accueil.php">Accueil</a> / <a href="#"><?php echo $TYPE;?></a></h4>
            <div class="details">
                <h2><?php echo $TYPE;?></h2>
                <p>
                    fjzh ebfzjgf bzljh bdaa fziufiaf iupzafaf hfziuzhaif jfhafhe fjzh ebfzjgf bzljh bdaa fziufiaf iupzafaf hfziuzhaif jfhafhe<br>
                    ,kjz fziuih ah JFHUIZ JDAYvjhg zjhfl jzgefh jfjh zjhfihf jzh fjzh ebfzjgf bzljh bdaa fziufiaf iupzafaf hfziuzhaif jfhafhe<br>
                    hf hfgez yiuuz jfhzj jfhez jfheh zjhefhzf fhezkjf fjzh ebfzjgf bzljh bdaa fziufiaf iupzafaf hfziuzhaif jfhafhe<br>
                </p>
            </div>
        </div>
    </div>


    <!--Trie-->
    <div class="trie">
        <div class="container">
            <label for="trie">Trie par : </label>
            <select name="trie" id="trie" onChange="location.href=''+this.options[this.selectedIndex].value+'';">
                <option value="#">Pertinence</option>
                <option value ="?type=<?php echo $TYPE?>&order=AZ">De A à Z</option>
                <option value ="?type=<?php echo $TYPE?>&order=ZA">De Z à A</option>
                <option value ="?type=<?php echo $TYPE?>&order=price_asc">Prix bas à élevé</option>
                <option value ="?type=<?php echo $TYPE?>&order=price_desc">Prix élevé à bas</option>
            </select>
        </div>
    </div>
    <!--FIN Trie-->



    <!--Carte de produit 2-->
    <div class="carte_produit2">
    <?php 
        if ($TYPE!="gift")
            $all_products = mysqli_query($link, "SELECT * FROM products WHERE TYPE = '".$TYPE."' ORDER BY ".$ORDER);
        else {
            $all_products = mysqli_query($link, "SELECT * FROM products ORDER BY rand()");
        }

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
                            <a href="Presentation_produits?id='.$IDDET.'"><i class="fa-solid fa-eye"></i></a>
                    </div>
                </div>
            ';
        }
        $i = 0;
        echo '<div class="container">';
        while ($row = mysqli_fetch_assoc($all_products)){
            if ($i%4 == 0) echo '</div><div class="container">';
            else if ($i>10) break;
            print_carte($link, $row["IDDET"]);
            $i++;
        }
    ?>

        <div class="container">
            
        </div>
        <div class="container">
            
        </div>
        <div class="container">

        </div>
    </div>

    <!--FIN Carte de produit 2-->








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