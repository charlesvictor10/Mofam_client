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
    <meta charset="utf-8">
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
    <script type="text/javascript">
        function getDepartement(val) {
            $.ajax({
                type: "POST",
                url: "get_departement.php",
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
                url: "get_ville.php",
                data:'id_departement='+val,
                success: function(data){
                    $("#list-ville").html(data);
                }
            });
        }
    </script>
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
                        <p>Création compte</p>
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
                            <li class="shop-pro">Création compte</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <?php
    $prenom = '';
    $nom = '';
    $email = '';
    $adresse = '';
    $tel = '';
    $region = array();
    $departement = array();
    $id_ville = array();
    //On verifie que le formulaire a ete envoye
    if(isset($_POST['email'], $_POST['password'], $_POST['prenom'], $_POST['nom'], $_POST['adresse'], $_POST['tel'], $_POST['id_ville']) and $_POST['email']!='')
    {
        //On verifie si le mot de passe a 8 caracteres ou plus
        if(strlen($_POST['password'])>=8)
        {
            //On verifie si l'email est valide
            if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
            {
                //On verifie s'il n'y a pas deja un utilisateur inscrit avec le pseudo choisis
                if(exist_acheteur($pdo,$_POST['email']))
                {
                     //Sinon, on dit que le pseudo voulu est deja pris
                    $form = true;
                    $message = 'Un autre utilisateur utilise d&eacute;j&agrave; l\'email que vous d&eacute;sirez utiliser.';
                }
                else
                {
                    $pass_hash = password_hash($_POST['password'],PASSWORD_BCRYPT);
                    //On enregistre les informations dans la base de donnee
                    if(inscription($pdo, $_POST['prenom'], $_POST['nom'], $_POST['email'], $pass_hash, $_POST['tel'], true, $_POST['adresse'], $_POST['id_ville']))
                    {
                        //Sinon on dit qu'il y a eu une erreur
                        $form = true;
                        $message = 'Une erreur est survenue lors de l\'inscription.';
                    }
                    else
                    {
                        //Si ca a fonctionne, on n'affiche pas le formulaire
                        $form = false;
                        ?>
                        <div class="message">Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez dor&eacute;navant vous connecter.<br />
                            <a href="login.php">Se connecter</a>
                        </div>
                        <?php
                    }
                }
            }
            else
            {
                //Sinon, on dit que l'email n'est pas valide
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
        echo '<div class="message">'.$message.'</div>';
    }
    //On affiche le formulaire
    ?>
    <!-- login-area start -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="login-content login-margin">
                        <h2 class="login-title" style="text-align: center">Inscription</h2>
                        <p style="text-align: center">Inscrivez vous pour avoir un compte</p>
                        <form method="post" action="creation_compte.php">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>Prénom</label>
                                <input type="text" name="prenom" value="<?php echo $prenom ?>" required autocomplete="on" placeholder="Votre prénom"/>
                                <label>Nom</label>
                                <input type="text" name="nom" value="<?php echo $nom ?>" required autocomplete="on" placeholder="Votre nom">
                                <label>Adresse email</label>
                                <input type="text" name="email" value="<?php echo $email ?>" required autocomplete="on" placeholder="Votre email">
                                <label>Mot de passe</label>
                                <input type="password" name="password" value="" required autocomplete="off" placeholder="Votre mot de passe">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label>Téléphone</label>
                                <input type="text" name="tel" value="<?php echo $tel ?>" required autocomplete="off" placeholder="Votre numéro mobile">
                                <label>Région</label>
                                <select id="list-region" name="region" onChange="getDepartement(this.value);" style="border: 1px solid #e3e3e3; box-shadow: none; font-size: 14px; height: 40px; letter-spacing: 1px; margin-bottom: 20px; padding-left: 10px; width: 100%;">
                                    <option>Sélectionner votre région</option>
                                    <?php $resultat = list_region($pdo);
                                    foreach ($resultat as $region) {
                                    ?>
                                    <option value="<?php echo $region["id_region"]; ?> "><?php echo $region["nom_region"]; ?></option>
                                    <?php } ?>
                                </select>
                                <label>Département</label>
                                <select id="list-departement" name="departement" onChange="getVille(this.value);" style="border: 1px solid #e3e3e3; box-shadow: none; font-size: 14px; height: 40px; letter-spacing: 1px; margin-bottom: 20px; padding-left: 10px; width: 100%;">
                                    <option>Sélectionner votre département</option>
                                </select>
                                <label>Ville</label>
                                <select id="list-ville" name="id_ville" style="border: 1px solid #e3e3e3; box-shadow: none; font-size: 14px; height: 40px; letter-spacing: 1px; margin-bottom: 20px; padding-left: 10px; width: 100%;">
                                    <option>Sélectionner votre ville</option>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Adresse</label>
                                <textarea rows="3" name="adresse" style="width: 100%; border: 1px solid #e3e3e3;
                                                   box-shadow: none; font-size: 14px;
                                                   letter-spacing: 1px; margin-bottom: 20px;" placeholder="Donner nous votre position exact ..."></textarea>
                            </div>
                            <input class="login-sub" type="submit" name="inscription" value="S'inscrire" style="display: block; position: relative; margin-left: auto; margin-right: auto;"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area end -->
    <?php } ?>
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
