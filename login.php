<?php
/**
 * Created by PhpStorm.
 * User: Charlesvictor26
 * Date: 07/09/2020
 * Time: 09:43
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
<div class="page-2 page-7">
    <!--Start-Header-area-->
    <?php include 'header.php'; ?>
    <!--End-Header-area-->
    <!--start-single-heading-banner-->
    <div class="single-banner-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">
                    <div class="single-ban-top-content">
                        <p>Connexion</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-single-heading-banner-->
    <!--start-single-heading-->
    <div class="signle-heading login-m">
        <div class="container">
            <div class="row">
                <!--start-shop-head -->
                <div class="col-lg-12">
                    <div class="shop-head-menu">
                        <ul>
                            <li><i class="fa fa-home"></i><a class="shop-home" href="index.html"><span>Accueil</span></a><span><i class="fa fa-angle-right"></i></span></li>
                            <li class="shop-pro">Connexion</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <?php
    $email = '';
    $password = '';
    //Si l'acheteur est connecte, on le deconecte
    if(isset($_SESSION['email']))
    {
        //On le deconecte en supprimant simplement les sessions email et id_acheteur
        unset($_SESSION['email'], $_SESSION['id_acheteur']);
        ?>
        <div class="message">Vous avez bien &eacute;t&eacute; d&eacute;connect&eacute;.<br />
            <a href="index.php">Accueil</a>
        </div>
        <?php
    } else {
        //On verifie si le formulaire a ete envoye
        if(isset($_POST['email'], $_POST['password']))
        {
            //On recupere le mot de passe de l'acheteur
            $res = connexion($pdo,$_POST['email']);
            //On le compare a celui qu'il a entre et on verifie si l'acheteur existe
            if(password_verify($_POST['password'],$res['password']))
            {
                //Si le mot de passe est bon, on ne vas pas afficher le formulaire
                $form = false;
                //On enregistre son pseudo dans la session email et son identifiant dans la session acheteur
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['id_acheteur'] = $res['id_acheteur'];
                ?>
                <div class="message">Vous avez bien &eacute;t&eacute; connect&eacute;. Vous pouvez acc&eacute;der &agrave; votre espace membre.<br />
                    <a href="my-account.php">Mon compte</a>
                </div>
                <?php
            }
            else
            {
                //Sinon, on indique que la combinaison n'est pas bonne
                $form = true;
                $message = 'La combinaison que vous avez entr&eacute; n\'est pas bonne.';
            }
        }
        else
        {
            $form = true;
        }
        if($form)
        {
            //On affiche un message s'il y a lieu
            if(isset($message))
            {
                echo '<div class="message">'.$message.'</div>';
            }
            //On affiche le formulaire
    ?>
    <!-- login-area start -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                    <div class="login-content login-margin">
                        <h2 class="login-title" style="text-align: center">Connexion</h2>
                        <p style="text-align: center">Connectez vous pour valider votre commande</p>
                        <form method="post" action="login.php">
                            <label>Adresse email</label>
                            <input type="text" name="email" value="<?php echo ($email); ?>" required placeholder="Votre email">
                            <label>Mot de passe</label>
                            <input type="password" name="password" value="" required placeholder="Votre mot de passe">
                            <div class="login-lost">
                                <span class="log-rem">
                                    <a href="creation_compte.php">Pas encore inscrit !</a>
                                </span>
                                <span class="forgot-login">
                                    <a href="mot_de_passe_oublie.php">Mot de passe oublié?</a>
                                </span>
                            </div>
                            <input class="login-sub" type="submit" name="connexion" value="Se connecter" style="display: block; position: relative; margin-left: auto; margin-right: auto;"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area end -->
    <?php }
    }?>
    <!--Start-footer-wrap-->
    <?php include 'footer.php'; ?>
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
<script type="text/javascript">
    function getDepartement(val) {
        $.ajax({
            type: "POST",
            url: "login.php",
            data:'id_region='+val,
            success: function(data){
                $("#list-departement").html(data);
            }
        });
    }
</script>
<script type="text/javascript">
    function getVille(val) {
        $.ajax({
            type: "POST",
            url: "login.php",
            data:'id_departement='+val,
            success: function(data){
                $("#list-ville").html(data);
            }
        });
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
