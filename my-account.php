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
        <div class="blog-page">
            <!--Start-Header-area-->
            <?php include 'header.php'; ?>
            <!--End-Header-area-->
            <!--start-single-heading-banner-->
            <div class="single-banner-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="single-ban-top-content">
                                <p>Mon compte</p>
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
                        <div class="col-lg-12">
                            <div class="shop-head-menu">
                                <ul>
                                    <li><i class="fa fa-home"></i><a class="shop-home" href="index.php"><span>Accueil</span></a><span><i class="fa fa-angle-right"></i></span></li>
                                    <li class="shop-pro">Mon compte</li>
                                </ul>
                            </div>
                        </div>
                        <!--end-shop-head-->
                    </div>
                </div>
            </div>
            <!--end-single-heading-->
            <!--start-my-account-area -->
            <div class="my-account-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="my-account-title">
                                <?php
                                //On verifie que l'identifiant de l'utilisateur est defini
                                if(isset($_SESSION['id_acheteur']))
                                {
                                    $id = intval($_SESSION['id_acheteur']);
                                    $dn = exist_utilisateur($pdo,$id);
                                    if($dn > 0){
                                    $prof = profile_acheteur($pdo,$id);
                                ?>
                                <h2 style="text-align: center; font-size: 22px; font-weight: 900; color: #0E7F3A;">Bonjour <?php echo $prof['prenom']; ?> <?php echo $prof['nom']; ?> </h2>
                                <div style="text-align: center; padding-top: 20px;">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                        <div class="quality-products banner-r-b">
                                            <span class="dooon"><a href="edit_info.php"><i class="fa fa-user"></i></a></span>
                                            <div class="quality-text">
                                                <h4>Mon profil</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="quality-products banner-r-b">
                                            <span class="dooon"><a href="liste_commande.php"><i class="fa fa-fw fa-cube"></i></a></span>
                                            <div class="quality-text">
                                                <h4>Mes achats</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                   }
                                } else {
                                    echo 'L\'identifiant de l\'acheteur n\'est pas d&eacute;fini.';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end-my-account-area -->
            <!--Start-footer-wrap-->
            <?php include 'footer.php'; ?>
            <!--Edn-footer-wrap-->
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
