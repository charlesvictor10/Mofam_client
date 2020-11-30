<?php
/**
 * Created by PhpStorm.
 * User: Charlesvictor26
 * Date: 02/09/2020
 * Time: 16:01
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                                <p>Liste Panier</p>
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
                                    <li class="shop-pro">Liste Panier</li>
                                </ul>
                            </div>
                        </div>
                        <!--end-shop-head-->
                    </div>
                </div>
            </div>
            <!--end-single-heading-->
            <!-- cart-main-area start-->
            <div class="cart-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php if (!isset($_SESSION['panier'])){ ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <h4>Désolé le panier est vide</h4>
                                </div>
                            <?php }
                            else { ?>
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="font-size: 18px; font-weight: 700;">Produits</th>
                                                <th style="font-size: 18px; font-weight: 700;">Catégorie</th>
                                                <th style="font-size: 18px; font-weight: 700;">Quantitée à commander</th>
                                                <th style="font-size: 18px; font-weight: 700;">Prix unitaire</th>
                                                <th style="font-size: 18px; font-weight: 700;">Prix total</th>
                                                <th style="font-size: 18px; font-weight: 700;">Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(nbr() > 0){ ?>
                                                <?php
                                                nbr();
                                                for($i = 0; $i < nbr(); $i++){
                                                    $produits = get_produit($pdo, $_SESSION['panier']['id_article'][$i]);
                                                    ?>
                                                    <tr>
                                                        <td style="font-size: 16px;"><?php echo $produits['designation'];?></td>
                                                        <td style="font-size: 16px;"><?php echo $produits['lib_s'];?></td>
                                                        <td class="product-quantity">
                                                            <div class="qty-button" style="">
                                                                <input type="text" class="input-text qty" id="qte" value="<?php echo $_SESSION['panier']['qte'][$i]; ?>" size="1" name="qte" readonly autocomplete="off">

                                                                <div class="box-icon button-plus">
                                                                    <input type="button" class="qty-increase" onclick="change_var(<?php echo ($i.",1");?>);refresh();return false;" value="+">
                                                                </div>
                                                                <div class="box-icon button-minus">
                                                                    <input type="button" class="qty-decrease" onclick="change_var(<?php echo ($i.",0");?>);refresh();return false;" value="-">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="product-price" style="font-size: 16px;"><?php echo $produits['prix'];?> FCFA</td>
                                                        <td class="product-price" style="font-size: 16px;"><?php echo $_SESSION['panier']['qte'][$i] * $produits['prix'];?> FCFA</td>
                                                        <td class="product-remove"><a href="enlever_panier.php?k=<?php echo $_SESSION['panier']['id_article'][$i];?>"><i class="fa fa-times"></i></a></td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <th colspan='3' style="font-size: 18px; font-weight: 800;">Total</th>
                                                    <td colspan='3' style="font-size: 18px; font-weight: 800;"><?php echo montant_panier(); ?> FCFA</td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="buttons-cart">
                                            <?php
                                            if(isset($_SESSION['id_acheteur'])){
                                                ?>
                                                <div class="login"><a href="validation.php"><span class="">Valider panier</span></a></div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="login"><a href="login.php"><span class="">Valider panier</span></a></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="buttons-cart">
                                            <a href="tel:+221781890993">Appeler pour commander</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="buttons-cart">
                                            <a href="#" onclick="vider(this)">Vider mon panier</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-main-area end -->
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
        <script>
            function vider(shamp)
            {
                if (confirm("Voulez-vous vraiment vider le panier?")) {
                    shamp.href ="vider_panier.php";
                }
                else
                    return false;
            }
        </script>
        <script>
            /*************************************************
             Fonction de definition de l'object xhr
             **************************************************/
            function new_xhr(){
                var xhr_object = null;
                if(window.XMLHttpRequest) // Firefox et autres
                    xhr_object = new XMLHttpRequest();
                else if(window.ActiveXObject){ // Internet Explorer
                    try {
                        xhr_object = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                }
                else { // XMLHttpRequest non supporté par le navigateur
                    alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
                    xhr_object = false;
                }
                return xhr_object;
            }
            /*****************************************************
             Fonction qui va modifier la variable de session
             ******************************************************/
            function change_var(str, str2) {
                var xhr2 = new_xhr();//On crée un nouvel objet XMLHttpRequest
                xhr2.open("GET", "plusmoins.php?id="+str+"&qte="+str2, true);//Appel du fichier externe
                xhr2.send();
            }

            function refresh(){
                window.location.reload();
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
