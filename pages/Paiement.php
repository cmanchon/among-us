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
    <title>Paiement en ligne - Among Us Fan Shop</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
    <?php
        require("../connexion/open_session.php");
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "among_us");
        $user_info = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE id =".$_SESSION["id"]));
        if (!isset($_SESSION["login"]) || mysqli_num_rows(mysqli_query($link, "SELECT * FROM carts WHERE user_id = ".$_SESSION["id"]))==0){
            //aucun client connecté ou panier vide -> redirige vers accueil
            echo '<script lang="JavaScript">
                    window.location.replace("./Accueil/php");
                </script>';
        }
        
        
    ?>
</head>
<body>

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
                <a href="./Panier.php" class="Commande">1</a>
                <a href="#" class="Paiement">2</a>
                <a href="#" class="Confirmation">3</a>
            </div>
      
            <div class="text">
                <p class="Commande">Commande</p>
                <p class="Paiement">Paiement</p>
                <p class="Confirmation">Confirmation</p>
            </div>
        </div>

        <form method="post">
        <div class="coordonnees">
            <div class="head">
                <h2><i class="fa-solid fa-user"></i>  Coordonnées</h2>
                <button>Besoin d'aide ?</button>  
            </div>
            <div class="row">
                <div class="row1">
                    <div class="client">
                        <label for="client">Client</label>
                        <input type="text" placeholder="Marc Duboit" id="client" name="client" value=<?php echo "'".$user_info["name"]."'";?>>
                    </div>

                    <div class="email">
                        <label for="email">E-mail</label>
                        <input type="email" placeholder="marc.duboit@live.fr" id="email" name="email" value=<?php echo "'".$user_info["email"]."'";?>>
                    </div>
                </div>
                <div class="row2">
                    <div class="facture">
                        <label for="adresse">Adresse de facturation</label>
                        <input type="text" placeholder="Adresse" id="adresse" name="adresse">
                        <input type="text" placeholder="Pays" id="pays" name="pays">
                        <input type="text" placeholder="Ville" id="ville" name="ville">

                    </div>
                </div>
            </div>
        </div>
        <div class="carte">
            <div class="head">  
                <h2><i class="fa-solid fa-credit-card"></i>  Carte</h2>
                <div class="items">
                    <i class="fa-brands fa-cc-amex"></i>
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-paypal"></i>
                    <i class="fa-brands fa-cc-visa"></i>
                </div>
            </div>
            <div class="row">
                <div class="ligne1">
                    <label for="carte">Numéro de carte</label>
                    <input type="text" placeholder="numéro de carte" name="carte">
                </div>
                <div class="ligne2">
                    
                    <div class="exp">
                        <label for="carte">Expiration</label>
                        <input type="text" placeholder="mm / aa" name="expiration">
                    </div>
                    <div class="cvc">
                        <label for="carte">CVC <i class="fa-solid fa-circle-info"></i></label>
                        <input type="text" placeholder="cvc" name="cvc">
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="but_payer">
            <input type="submit" name="payer" value="Valider">
            <!-- <a href="Confirmation_Paiement.html"><input type="submit" value="Valider"></a> -->
        </div>
        </form>
        <?php
            //on définit d'abord le numéro de la commande : le numéro maximum de la table
            $commande_table = mysqli_query($link, "SELECT * FROM commande");
            $num_max = 0;
            while ($row = mysqli_fetch_assoc($commande_table)){
                if ($row['num_commande']>= $num_max) $num_max = $row['num_commande'];
            }
            $num_max++;
            if (isset($_POST["payer"]) && isset($_SESSION["login"])){
                $adding_request = mysqli_query($link, "INSERT INTO paiement VALUES (".$_SESSION["id"].', "'.$_POST["client"].'", "'.$_POST["email"].'", "'.$_POST["adresse"].'", "'.$_POST["pays"].'", "'.$_POST["ville"].'", '.$_POST["carte"].', "'.$_POST["expiration"].'", '.$_POST["cvc"].", ".$num_max.")");
                if ($adding_request){
                    if (isset($_GET["id"])){
                        //si la personne a acheté 1 produit avec le bouton "acheter maintenant de présentation_produits.php
                        $ajout_commande = mysqli_query($link, "INSERT INTO commande VALUES (".$num_max.", ".$_SESSION["id"].", ".$_GET["id"].", 1, FALSE)");
                        $single_product = mysqli_query($link, "UPDATE products SET QUANT=QUANT-1 WHERE IDDET = ".$_GET["id"]);
                    }    
                    else {
                        //sinon si la personne a validé son panier -> on ajoute dans sa commande son panier
                        $users_cart = mysqli_query($link, "SELECT * FROM carts WHERE user_id =".$_SESSION["id"]);
                        while ($row = mysqli_fetch_assoc($users_cart)){
                            mysqli_query($link, "INSERT INTO commande VALUES (".$num_max.", ".$_SESSION["id"].", ".$row["product_id"].", ".$row["quant"].", FALSE)");
                        }

                        $whole_cart = mysqli_query($link, "UPDATE products JOIN carts ON products.IDDET=carts.product_id SET products.QUANT = products.QUANT-carts.quant WHERE carts.user_id =".$_SESSION["id"]) && mysqli_query($link, "DELETE FROM carts WHERE user_id =".$_SESSION["id"]);
                    }
                    if (isset($single_product) && $single_product && $ajout_commande || $whole_cart){
                        //= si stock mis à jour et panier supprimé
                        echo '<div class="carte">
                        <p>Commande validée !<p><br>
                        <a href="./Accueil.php">Revenir à la page d\'accueil</a> 
                        </div>'
                        ;
                        echo '<script lang="JavaScript">
                        window.location.replace("./Confirmation_Paiement.html");
                        </script>';
                        
                        }
                }
            }
        ?>
    </div>

</body>
</html>

