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
        $user_info = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE id =".$_SESSION["id"]));
        
    ?>
    <title>Mon compte</title>
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

    <div class="description_section">
        <div class="container">
            <h4><a href="Accueil.php">Accueil</a> / <a href="#">Mon compte</a></h4>
            <div class="details">
                <?php 
                    echo "<h2>Informations du compte de ".$user_info["identifiant"]."</h2>";
                    echo '<br>
                        <p><strong>Nom :</strong> '.$user_info["name"].'<br><br>
                        <strong>Pseudo : </strong>'.$user_info["identifiant"].'<br><br>
                        <strong>Adresse email : </strong>'.$user_info["email"].'<br><br>
                        </p>
                    ';
                ?><br><br>
                <a href="../connexion/logout.php" id="logout">Se déconnecter</a><br><br><br><br>
                <a href="../connexion/delete.php" id="delete-account">Effacer mon compte</a>
            </div>
        </div><br><br>
        <?php
            if ($_SESSION["login"] == "admin"){
                $link = mysqli_connect("localhost", "root", "");
                mysqli_select_db($link, "among_us");
                $users_table = mysqli_query($link, "SELECT * FROM users ORDER BY id");
                echo '<table id="users_table">';
                while ($row = mysqli_fetch_assoc($users_table)){
                    echo "<tr><td>";
                    echo $row["id"]."</td><td>".$row["name"]."</td><td>".$row["identifiant"]."</td><td>".$row["email"]."</td>";
                    echo "<td><a href='delete.php?id=".$row["id"]."' id='delete_btn'> supprimer </a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

        ?>
    </div>

    






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