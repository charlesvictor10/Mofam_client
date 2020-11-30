<?php
/**
 * Created by PhpStorm.
 * User: bounda
 * Date: 16/10/2020
 * Time: 17:12
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
                        <p>Modifier profil</p>
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
                            <li class="shop-pro">Modifier profil</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <?php
    //On verifie si lutilisateur est connecte
    if(isset($_SESSION['id_acheteur']))
    {
    //On verifie si le formulaire a ete envoye
    if(isset($_POST['email'], $_POST['password'], $_POST['prenom'], $_POST['nom'], $_POST['tel']) and $_POST['email']!='')
    {
        //On verifie si le mot de passe a 8 caracteres ou plus
        if(strlen($_POST['password'])>=8)
        {
            //On verifie si lemail est valide
            if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
            {
                //On verifie si le pseudo a ete modifie pour un autre et que celui-ci n'est pas deja utilise
                if((exist_acheteur($pdo,$_POST['email']) or $_POST['email']==$_SESSION['email']))
                {
                    $pass_hash = password_hash($_POST['password'],PASSWORD_BCRYPT);
                    //On modifie les informations de lutilisateur avec les nouvelles
                    if(update($pdo, $_POST['prenom'], $_POST['nom'], $_POST['email'], $pass_hash, $_POST['tel']))
                    {
                        //Sinon on dit quil y a eu une erreur
                        $form = true;
                        $message = 'Une erreur est survenue lors des modifications.';
                    }
                    else
                    {
                        //Si ca a fonctionne, on naffiche pas le formulaire
                        $form = false;
                        //On supprime les sessions username et userid au cas ou il aurait modifie son pseudo
                        unset($_SESSION['email'], $_SESSION['id_acheteur']);
                        ?>
                        <div class="message">Vos informations ont bien &eacute;t&eacute; modifif&eacute;e. Vous devez vous reconnecter.<br />
                            <a href="connexion.php">Se connecter</a></div>
                        <?php
                    }
                }
                else
                {
                    //Sinon, on dit que le pseudo voulu est deja pris
                    $form = true;
                    $message = 'Un autre utilisateur utilise d&eacute;j&agrave; le nom d\'utilisateur que vous d&eacute;sirez utiliser.';
                }
            }
            else
            {
                //Sinon, on dit que lemail nest pas valide
                $form = true;
                $message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
            }
        }
        else
        {
            //Sinon, on dit que le mot de passe nest pas assez long
            $form = true;
            $message = 'Le mot de passe que vous avez entr&eacute; contien moins de 8 caract&egrave;res.';
        }
    }
    else
    {
        $form = true;
    }
    if($form)
    {
    //On affiche un message sil y a lieu
    if(isset($message))
    {
        echo '<strong>'.$message.'</strong>';
    }
    //Si le formulaire a deja ete envoye on recupere les donnes que lutilisateur avait deja insere
    if(isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'], $_POST['tel']))
    {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];
    }
    else
    {
        //Sinon, on affiche les donnes a partir de la base de donnee
        if(isset($_SESSION['id_acheteur'])) {
            $id = intval($_SESSION['id_acheteur']);
            $dn = exist_utilisateur($pdo, $id);
            if ($dn > 0) {
                $prof = profile_acheteur($pdo, $id);
                $prenom = $prof['prenom'];
                $nom = $prof['nom'];
                $email = $prof['email'];
                $tel = $prof['tel'];
                $password = $prof['password'];
                $id_acheteur = $prof['id_acheteur'];
            }
        }
    }
    //On affiche le formulaire
    ?>
    <!--start-my-account-area -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="login-content login-margin">
                        <h2 class="login-title" style="text-align: center">Modifier profil</h2>
                        <p style="text-align: center">Vous pouvez modifier vos informations</p>
                        <form method="post" action="edit_info.php">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>Prénom</label>
                                <input type="text" name="prenom" value="<?php echo $prenom; ?>"/>
                                <label>Nom</label>
                                <input type="text" name="nom" value="<?php echo $nom; ?>"/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>Téléphone</label>
                                <input type="text" name="tel" value="<?php echo $tel; ?>"/>
                                <label>Adresse email</label>
                                <input type="text" name="email" value="<?php echo $email; ?>"/>
                                <input type="hidden" name="id_acheteur" value="<?php echo $id_acheteur; ?>"/>
                            </div>
                            <input class="login-sub" type="submit" name="update" value="Mettre à jour" style="display: block; position: relative; margin-left: auto; margin-right: auto;"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-my-account-area -->
    <?php }
    }
    else
    {
        ?>
        <div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
            <a href="connexion.php">Se connecter</a></div>
        <?php
    }
    ?>
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

