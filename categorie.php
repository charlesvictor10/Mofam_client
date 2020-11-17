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
<div class="shop-page shop-grid shop-list">
    <!--Start-Header-area-->
    <?php include 'header.php'; ?>
    <!--End-Header-area-->
    <!--start-single-heading-banner-->
    <div class="single-banner-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="single-ban-top-content">
                        <p>Sous catégorie</p>
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
                            <li class="shop-pro">Sous catégorie</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <!--start-shop-product-area-->
    <div class="shop-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Shop-Product-View-start -->
                    <div class="shop-product-view shop-list">
                        <!-- Shop Product Tab Area -->
                        <div class="product-tab-area">
                            <!-- Tab Bar -->
                            <div class="tab-bar">
                                <div class="tab-bar-inner">
                                    <ul role="tablist" class="nav nav-tabs">
                                        <li><a title="Grid" data-toggle="tab" href="#shop-product"><i class="fa fa-th-large"></i><span class="grid" title="Grid">Grille</span></a></li>
                                        <li class="active"><a title="List" data-toggle="tab" href="#shop-list"><i class="fa fa-list"></i><span class="list">Liste</span></a></li>
                                    </ul>
                                </div>
                                <div class="toolbar">
                                    <div class="sorter">
                                        <div class="sort-by">
                                            <label class="sort-none">Trier par</label>
                                            <select>
                                                <option value="designation">Nom</option>
                                                <option value="prix">Prix</option>
                                            </select>
                                            <a class="up-arrow" href="#"><i class="fa fa-long-arrow-up"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End-Tab-Bar -->
                            <!-- Tab-Content -->
                            <div class="tab-content">
                                <!-- Shop Product-->
                                <div id="shop-product" class="tab-pane">
                                    <div class="row">
                                        <?php
                                        if(isset($_GET['page'])){
                                            $page = $_GET['page'];
                                        } else {
                                            $page = 1;
                                        }
                                        $num_per_page = 020;
                                        $start_from = ($page-1)*020;
                                        $arr = liste_limite_produit($pdo,$start_from,$num_per_page);
                                        foreach ($arr as $ar) {
                                        $arr1 = Liste_par_produits_limite($pdo,$ar[0]);
                                        ?>
                                        <!-- Start-single-product -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-product shop-mar-bottom">
                                                <div class="product-img-wrap">
                                                    <a class="product-img" href="#"><img src="data:<?php echo $arr1[0][3]; ?>;base64,<?php echo base64_encode($arr1[0][1]); ?>" alt="<?php echo $arr1[0][2]; ?>"/></a>
                                                    <div class="add-to-cart">
                                                        <a href="panier_ajouter.php?action=ajout&prod=<?php echo $ar[0]; ?>&qtte=1&prix=<?php echo $ar[4] ?>&loc=categorie.php?souscat=<?php echo $ar[0]; ?>" title="add to cart">
                                                            <div><i class="fa fa-shopping-cart"></i><span>Ajouter au panier</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-info text-center">
                                                    <div class="product-content">
                                                        <a href="#"><h3 class="pro-name"><?php echo $ar[2]; ?></h3></a>
                                                        <div class="pro-rating">
                                                            <ul>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="price-text">Prix:</span>
                                                            <span class="normal-price"><?php echo $ar[4]; ?> fcfa</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End-single-product -->
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- End-Shop-Product-->
                                <!-- Shop List -->
                                <div id="shop-list" class="tab-pane active">
                                    <!-- start-Single-Shop-list-->
                                    <div class="single-shop">
                                        <div class="row">
                                            <?php
                                            if(isset($_GET['page'])){
                                                $page = $_GET['page'];
                                            } else {
                                                $page = 1;
                                            }
                                            $num_per_page = 020;
                                            $start_from = ($page-1)*020;
                                            $arr = liste_limite_produit($pdo,$start_from,$num_per_page);
                                            foreach ($arr as $ar) {
                                            $arr1 = Liste_par_produits_limite($pdo,$ar[0]);
                                            ?>
                                            <!-- single-product-start -->
                                            <div class="single-product">
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="product-img-wrap">
                                                        <a class="product-img" href="#"> <img src="data:<?php echo $arr1[0][3]; ?>;base64,<?php echo base64_encode($arr1[0][1]); ?>" alt="<?php echo $arr1[0][2]; ?>"/></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <div class="product-info text-left">
                                                        <div class="product-content shop">
                                                            <a href="#"><h3 class="pro-name"><?php echo $ar[2]; ?></h3></a>
                                                            <div class="pro-price">
                                                                <span class="price-text">Prix:</span>
                                                                <span class="normal-price"><?php echo $ar[4]; ?> fcfa</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shop-article text-left">
                                                        <p><?php echo $ar[3]; ?></p>
                                                    </div>
                                                    <div class="shop-button-area shop-list">
                                                        <div class="add-to-cartbest shop">
                                                            <a href="panier_ajouter.php?prod=<?php echo $ar[0]; ?>&qtte=1&prix=<?php echo $ar[4]; ?>&loc=categorie.php?souscat=<?php echo $ar[0]; ?>" title="add to cart">
                                                                <div><span>Ajouter au panier</span></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-end -->
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- end-Single-Shop-list-->
                                </div>
                                <!-- End Shop List -->
                            </div>
                            <!-- End Tab Content -->
                            <!-- Tab Bar -->
                            <div class="tab-bar tab-bar-bottom">
                                <div class="tab-bar-inner">
                                    <ul role="tablist" class="nav nav-tabs">
                                        <li><a title="Grid" data-toggle="tab" href="#shop-product"><i class="fa fa-th-large"></i><span class="grid" title="Grid">Grille</span></a></li>
                                        <li class="active"><a title="List" data-toggle="tab" href="#shop-list"><i class="fa fa-list"></i><span class="list">Liste</span></a></li>
                                    </ul>
                                </div>
                                <div class="toolbar">
                                    <div class="sorter">
                                        <div class="sort-by">
                                            <label class="sort-none">Trier par</label>
                                            <select>
                                                <option value="designation">Nom</option>
                                                <option value="prix">Prix</option>
                                            </select>
                                            <a class="up-arrow" href="#"><i class="fa fa-long-arrow-up"></i></a>
                                        </div>
                                    </div>
                                    <div class="pages">
                                        <label>Page</label>
                                        <ol>
                                            <?php
                                                $id_sous_cat = $_GET['souscat'];
                                                $pr_query = pagination($pdo);
                                                $total_page = ceil($pr_query/$num_per_page);
                                                if($page > 1){
                                                    echo "<li><a href='categorie.php?souscat=$id_sous_cat&page=".($page-1)."' title='Précédent'><i class='fa fa-arrow-left'></i></a></li>";
                                                }

                                                for($i = 1; $i < $total_page; $i++){
                                                    echo "<li><a href='categorie.php?souscat=$id_sous_cat&page=".$i."'>$i</a></li>";
                                                }

                                                if($i > $page){
                                                    echo "<li><a href='categorie.php?souscat=$id_sous_cat&page=".($page+1)."' title='Suivant'><i class='fa fa-arrow-right'></i></a></li>";
                                                }
                                            ?>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Bar -->
                        </div>
                        <!-- End Shop Product Tab Area -->
                    </div>
                    <!-- End Shop Product View -->
                </div>
            </div>
        </div>
    </div>
    <!--shop-product-area-end-->
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
