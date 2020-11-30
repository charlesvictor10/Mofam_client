<?php
/**
 * Created by PhpStorm.
 * User: bounda
 * Date: 18/10/2020
 * Time: 12:41
 */
include_once 'inc/server.class.php';
include_once 'inc/define.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo _SITE_NAME; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800i" rel="stylesheet">

    <!-- favicon icon -->
    <link rel="shortcut icon" type="images/png" href="images/favicon.ico">

    <!-- all css here -->

    <link rel="stylesheet" href="style.css">
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Add your site or application content here -->
<!--Start-Preloader-area-->
<div class="preloader">
    <div class="loading-center">
        <div class="loading-center-absolute">
            <div class="object object_one home-4"></div>
            <div class="object object_two home-4"></div>
            <div class="object object_three home-4"></div>
        </div>
    </div>
</div>
<!--end-Preloader-area-->
<!--header-area-start-->
<!--Start-main-wrapper-->
<div class="page-2 page-7 shopping-cart">
    <!--Start-Header-area-->
    <?php include 'header.php'; ?>
    <!--End-Header-area-->
    <!--start-single-heading-banner-->
    <div class="single-banner-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="single-ban-top-content">
                        <p>Validation commande</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-single-heading-banner-->
    <!--start-single-heading-->
    <div class="signle-heading">
        <div class="container">
            <div class="row">
                <!--start-shop-head -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-head-menu">
                        <ul>
                            <li><i class="fa fa-home"></i><a class="shop-home" href="index.php"><span>Accueil</span></a><span><i class="fa fa-angle-right"></i></span></li>
                            <li class="shop-pro">Validation commande</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <?php
    //On verifie si le formulaire a ete envoye
    if(isset($_POST['submit'])){
        $_POST['code'] = "BCB".nombre($pdo);
        $_POST['date_commande'] = date("Y-m-d");
        $_POST['etat'] = "Attente";
        if(ajoute_commande($pdo,$_POST['code'],intval($_SESSION['id_acheteur']),$_POST['date_commande'],montant_panier(),$_POST['etat'])){
            $form = true;
            $message = 'Une erreur est survenue lors de la validation de votre commande.';
        } else {
            //$id_com = intval(getIdCommande($pdo,$_POST['code']));
            //var_dump($id_com, $_POST['code']);
            for($i=0; $i < nbr(); $i++){
                $qte = $_SESSION['panier']['qte'][$i];
                $prods = get_produit($pdo, $_SESSION['panier']['id_article'][$i]);
                $id_produit = intval($prods['id_produit']);
                if(ajouter_produit_commande($pdo,$qte,$id_produit,$_POST['code'])){
                    $form = true;
                    $message = 'Une erreur est survenue lors de l\'enregistrement des produits.';
                } else {
                    $form = false;
                }
            }
            ?>
            <div class="message">Votre commande a été bien enregistré.<br />
                <a href="my-account.php" onclick="vider(this)">Mes commandes</a>
            </div>
            <?php
        }
    } else {
        $form = true;
    }
    if($form)
    {
        //On affiche un message sil y a lieu
        if(isset($message))
        {
            echo '<div class="message">'.$message.'</div>';
        }
        //On affiche le formulaire
        ?>
    <!-- coupon-area start -->
    <div class="coupon-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Comment vous livrez votre commande? <span id="showlogin">Cliquez pour faire votre choix</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text">Tarif de livraison trés abordable.</p>
                                <form action="#">
                                    <p class="form-row-first">
                                        <label>Livraison à domicile</label>
                                        <input type="text" />
                                    </p>
                                    <p class="form-row-last">
                                        <label>Déplacement à l'agence</label>
                                        <input type="text" />
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Comment voulez vous payez? <span id="showcoupon">Cliquez pour entrer votre code paiement</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input type="text" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- coupon-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <form method="post" action="validation.php">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="checkbox-form">
                            <h3>Informations personnelle</h3>
                            <?php
                                //On verifie que l'identifiant de l'utilisateur est defini
                                if(isset($_SESSION['id_acheteur'])) {
                                    $id = intval($_SESSION['id_acheteur']);
                                    $dn = exist_utilisateur($pdo, $id);
                                    if ($dn > 0) {
                                        $prof = profile_acheteur($pdo, $id);
                                    }
                                }
                            ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>Prénom <span class="required">*</span></label>
                                        <input type="text" value="<?php echo $prof['prenom']; ?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>Nom <span class="required">*</span></label>
                                        <input type="text" value="<?php echo $prof['prenom']; ?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>Adresse <span class="required">*</span></label>
                                        <input type="text" value="<?php echo $prof['adresse']; ?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>Email Adresse <span class="required">*</span></label>
                                        <input type="text" value="<?php echo $prof['email']; ?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>Téléphone  <span class="required">*</span></label>
                                        <input type="text" value="<?php echo $prof['tel']; ?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkout-form-list">
                                        <input type="hidden" value="<?php echo $prof['id_acheteur']; ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="your-order">
                            <h3>Details de votre commande</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-name">Produits</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(nbr() > 0){ ?>
                                            <?php
                                            nbr();
                                            for($i=0; $i<nbr(); $i++){
                                                $produits = get_produit($pdo, $_SESSION['panier']['id_article'][$i]);
                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <?php echo $produits['designation'];?> <strong class="product-quantity"> × <?php echo intval($_SESSION['panier']['qte'][$i]);?></strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount"><?php echo $produits['prix'] * $_SESSION['panier']['qte'][$i];?></span> FCFA
                                            </td>
                                        </tr>
                                        <?php }
                                        }?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Sous total</th>
                                            <td><span class="amount"><?php echo montant_panier();?></span> FCFA</td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Livraison</th>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="amount"><?php echo montant_panier();?></span> FCFA</strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="order-button-payment">
                                <input type="submit" name="submit" value="Terminer commande"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
    <?php } ?>
    <!--Start-footer-wrap-->
    <?php include 'footer.php' ?>
    <!--End-footer-wrap-->
    </div>
    <!--End-main-wrapper-->

    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- meanmenu.js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- nivo.slider.js -->
    <script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="lib/home.js" type="text/javascript"></script>
    <!-- jquery-ui js -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- scrollUp.min.js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- jquery.parallax.js -->
    <script src="js/jquery.parallax.js"></script>
    <!-- sticky.js -->
    <script src="js/jquery.sticky.js"></script>
    <!-- jquery.simpleGallery.min.js -->
    <script src="js/jquery.simpleGallery.min.js"></script>
    <script src="js/jquery.simpleLens.min.js"></script>
    <!-- countdown.min.js -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- isotope.pkgd.min -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
    <script LANGUAGE="JavaScript">
        function vider(shamp)
        {
            if (confirm("Voulez-vous vraiment vider le panier ?")) {
                shamp.href ="vider_panier.php";
            }
            else
                return false;
        }
    </script>
    <script>
        $(document).ready(function(){
            $("#text-search").keyup(function(){
                var searchText = $(this).val();
                if(searchText != ''){
                    $.ajax({
                        url: 'recherche.php',
                        method: 'post'
                        data: {query:searchText},
                        success: function(response){
                            $("#show-list").html(response);
                        }
                    });
                } else {
                    $("#show-list").html('');
                }
            });
            $(document).on('click','a',function(){
                $("#text-search").val($(this).text());
                $("#show-list").html('');
            })
        });
    </script>
    </body>
</html>
