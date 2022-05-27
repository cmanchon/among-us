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
    <title>Paiement en ligne</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon_io/apple-touch-icon.png"/>
    
</head>
<body>

    <div class="paiement">
        <div class="head">
            <div class="container">
                <div class="details">
                    <h3>Paiement en ligne</h3>
                    <h4>Site sécurisé   <i class="fa-solid fa-lock"></i></h4>
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

        <div class="coordonnees">
            <div class="head">
                <h2><i class="fa-solid fa-user"></i>  Coordonnées</h2>
                <button>Besoin d'aide ?</button>  
            </div>
            <div class="row">
                <div class="row1">
                    <div class="client">
                        <label for="client">Client</label>
                        <input type="text" placeholder="Marc Duboit" id="client" name="client">
                    </div>

                    <div class="email">
                        <label for="email">E-mail</label>
                        <input type="email" placeholder="marc.duboit@live.fr" id="email" name="email">
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
                    <input type="text" placeholder="numéro de carte">
                </div>
                <div class="ligne2">
                    
                    <div class="exp">
                        <label for="carte">Expiration</label>
                        <input type="text" placeholder="mm / aa">
                    </div>
                    <div class="cvc">
                        <label for="carte">CVC <i class="fa-solid fa-circle-info"></i></label>
                        <input type="text" placeholder="cvc">
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="but_payer">
            <input type="submit" value="Valider">
        </div>
    </div>

</body>
</html>