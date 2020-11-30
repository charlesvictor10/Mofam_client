<?php
    include_once 'inc/server.class.php';
    include_once 'inc/define.php';
?>
<!doctype html>
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset='UTF-8'>
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
            <?php include 'header.php'; ?>
            <!-- Start-slider-->
            <section class="slider-area home-1 home-7">
                <div class="preview-1 home-3 home-7">
                    <div id="ensign-nivoslider" class="slides">
                        <img src="images/slider/1.jpg" alt="" title="#slider-direction-1" />
                        <img src="images/slider/2.jpg" alt="" title="#slider-direction-2" />
                    </div>
                    <!-- direction 1 -->
                    <div id="slider-direction-1" class="t-cn slider-direction slider-one">
                        <div class="slider-progress"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 text-right">
                                    <div class="slider-content home-7">
                                        <!-- layer 1 -->
                                        <div class="layer-1-1">
                                            <h2 class="title1 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay=".8s">Mo <span class="h-color">fam</span></h2>
                                        </div>
                                        <!-- layer 2 -->
                                        <div class="layer-1-2">
                                            <p class="title2">
                                                <span class="fashion-1 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="1s"><i class="fa fa-modx"></i>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- layer 3 -->
                                        <div class="layer-1-3 hidden-xs">
                                            <p class="title3 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="1.5s">la distance de la casa n'est plus un obstacle</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- direction 2 -->
                    <div id="slider-direction-2" class="slider-direction">
                        <div class="slider-progress"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 text-left">
                                    <div class="slider-content home-7">
                                        <!-- layer 1 -->
                                        <div class="layer-1-1">
                                            <h2 class="title1 wow bounceInRight" data-wow-duration="0.5s" data-wow-delay=".8s">Mo<span class="h-color">fam</span></h2>
                                        </div>
                                        <!-- layer 2 -->
                                        <div class="layer-1-2">
                                            <p class="title2">
                                                <span class="fashion-1 fashion-2 wow bounceInRight" data-wow-duration="0.5s" data-wow-delay="1s"><i class="fa fa-modx"></i>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- layer 3 -->
                                        <div class="layer-1-3 layer-2-3 hidden-xs">
                                            <p class="title3  wow bounceInRight" data-wow-duration="0.5s" data-wow-delay="1.5s">nous voulons encourager la consommation locale</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End-slider-->
            <!-- Start-banner-area-->
            <div class="banner-area padding-t home-2 home-7">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-banner banner-r-b four">
                                <a href="#"><img alt="Hi Guys" src="images/banner/1.jpg" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-banner">
                                <a href="#"><img alt="Hi Guys" src="images/banner/2.jpg" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End-banner-area-->
             <!-- Start-featured-area-->
            <div class="featured-product-wrap home-2 home-7 padding-t">
                <div class="container">
                    <!-- section-heading start -->
                    <div class="section-heading">
                        <h3><span class="h-color">nouveaux</span> produits</h3>
                    </div>
                    <!-- section-heading end -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="features-tab">
                                <div class="tab-content">
                                    <!--start-home-section-->
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="row">
                                            <div class="featured-carousel indicator">
                                            	<?php $arr = liste_last_produit($pdo);
                                            	foreach ($arr as $ar) {
                                            		$arr1 = Liste_par_produits_limite($pdo,$ar[0]);
                                            	?>
                                                <!-- Start-single-product -->
                                                <div class="col-lg-3">
                                                    <div class="single-product">
                                                        <div class="product-img-wrap">
                                                            <a class="product-img" href="#"> <img src="data:<?php echo $arr1[0][3]; ?>;base64,<?php echo base64_encode($arr1[0][1]); ?>" alt="<?php echo $arr1[0][2]; ?>" /></a>
                                                        </div>
                                                        <div class="product-info text-center">
                                                            <div class="product-content">
                                                                <a href="#"><h3 class="pro-name"><?php echo $ar[2]; ?></h3></a>
                                                                <div class="pro-price">
	                                                                <span class="price-text">Prix:</span>
	                                                                <span class="normal-price"><?php echo $ar[4] ?> fcfa</span>
                                                            	</div>
                                                                <div class="pro-content-bottom">
                                                                    <p><?php echo $ar[3]; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End-single-product -->
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end-home-section-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-featured-area-->
            <div class="clear"></div>
            <!--Start-blog-area-->
            <div class="latest-blog-wrap padding-t home-2 home-7">
                <div class="container">
                    <!--start-blog-area-heading-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="blog-heading">
                                <div class="section-heading">
                                    <h3><span class="h-color">Mofam</span> pour une bonne sante</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end-blog-area-heading-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!--start-single-blog-area-->
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="#"><img src="images/sante/1.jpg" alt="bettrave"></a>
                                    </div>
                                    <div class="blog-inner-content">
                                        <div class="blog-title">
                                            <h4>Les betteraves</h4>
                                        </div>
                                        <div class="post-time">
                                            <p>Grâce à son puissant pouvoir antioxydant, <span class="normal-price">la betterave</span> fait partie de ce qu’on appelle les «superaliments».
                                                Elle est aussi une bonne source de vitamines A, K, B2, B9, de fibres, de calcium, de magnésium, de manganèse,
                                                de cuivre et de fer. il facilite la circulation du sang en augmentant le taux de globules blancs et de globules rouges.</p>
                                        </div>
                                        <div class="blog-button">
                                            <a class="blog-readmore" href="#">En savoir plus <span><i class="fa fa-long-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-single-blog-area-->
                            <!--start-single-blog-area-->
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="#"><img src="images/sante/2.jpg" alt="brocoli"></a>
                                    </div>
                                    <div class="blog-inner-content">
                                        <div class="blog-title">
                                            <h4>Les brocolis</h4>
                                        </div>
                                        <div class="post-time">
                                            <p>Légume de la famille des crucifères, <span class="normal-price">le brocoli</span> constitue une excellente source de vitamines C
                                                et K et une bonne source de vitamines A, B2, B5, B6, B9, E, de cuivre, de fer, de magnésium,
                                                de manganèse, de phosphore et de potassium. Il pourrait être associé à un risque plus faible de cancer colorectal et de l'estomac.</p>
                                        </div>
                                        <div class="blog-button">
                                            <a class="blog-readmore" href="#">En savoir plus <span><i class="fa fa-long-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-single-blog-area-->
                            <!--start-single-blog-area-->
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="#"><img src="images/sante/3.jpg" alt="epinards"></a>
                                    </div>
                                    <div class="blog-inner-content">
                                        <div class="blog-title">
                                            <h4>Les épinards</h4>
                                        </div>
                                        <div class="post-time">
                                            <p><span class="normal-price">Les épinards</span>, mais également les autres légumes feuillus vert foncé renferment des vitamines B9,
                                                B6 et K, du bêta-carotène, des fibres, du magnésium, du phosphore, du potassium, du zinc, du calcium
                                                et du manganèse. Ils contiennent également du fer, mais en quantité moindre qu’on le pensait autrefois.</br>
                                                </p>
                                        </div>
                                        <div class="blog-button">
                                            <a class="blog-readmore" href="#">En savoir plus <span><i class="fa fa-long-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-single-blog-area-->
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 50px;">
                            <!--start-single-blog-area-->
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="#"><img src="images/sante/4.jpg" alt="kiwi"></a>
                                    </div>
                                    <div class="blog-inner-content">
                                        <div class="blog-title">
                                            <h4>Les kiwis</h4>
                                        </div>
                                        <div class="post-time">
                                            <p>Un <span class="normal-price">kiwi</span>équivaut à lui seul 40 kcal et assure nos besoins journaliers conseillés en vitamine C. Riche en minéraux,
                                                il recharge l'organisme en potassium, en fer, en cuivre, en calcium et agît contre la paresse intestinale.
                                                Pris au petit déjeuner, le kiwi est notre conseil pleine forme pour toute la journée.</p>
                                        </div>
                                        <div class="blog-button">
                                            <a class="blog-readmore" href="#">En savoir plus <span><i class="fa fa-long-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-single-blog-area-->
                            <!--start-single-blog-area-->
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="#"><img src="images/sante/5.jpg" alt="clementine"></a>
                                    </div>
                                    <div class="blog-inner-content">
                                        <div class="blog-title">
                                            <h4>La clémentine</h4>
                                        </div>
                                        <div class="post-time">
                                            <p>Véritable star de l'hiver et facile à consommer à n'importe quel moment de la journée, <span class="normal-price">la clémentine</span> est un
                                                fruit excellent pour la santé. Très peu calorique, riche en vitamine C, en minéraux et oligo-éléments,
                                                elle possède de nombreuses propriétés anti-infectieuses. Les bienfaits de la clémentine sont reconnus unanimement.</p>
                                        </div>
                                        <div class="blog-button">
                                            <a class="blog-readmore" href="#">En savoir plus <span><i class="fa fa-long-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-single-blog-area-->
                            <!--start-single-blog-area-->
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="#"><img src="images/sante/6.jpg" alt="pomme"></a>
                                    </div>
                                    <div class="blog-inner-content">
                                        <div class="blog-title">
                                            <h4>Les pommes</h4>
                                        </div>
                                        <div class="post-time">
                                            <p>Les bienfaits de <span class="normal-price">la pomme</span>sont visibles à l'œil nu. La beauté de notre peau et de notre teint sont liés
                                                directement à sa consommation. Elle joue aussi un rôle sur la diminution du taux de cholestérol et
                                                stabilise la glycémie. Riche en minéraux et en vitamines, elle est source d'un bon équilibre nutritionnel.
                                                Ses fibres régularisent le transit intestinal.</p>
                                        </div>
                                        <div class="blog-button">
                                            <a class="blog-readmore" href="#">En savoir plus <span><i class="fa fa-long-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-single-blog-area-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End-blog-area-->
            <div class="clear"></div>
            <!--Start-latest-testimonials-->
            <div class="latest-testimonial-wrap home-2 home-7">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <!--start-testimonial-heading-->
                            <div class="testimonial-heading home-2">
                                <div class="section-heading">
                                    <h3><span class="h-color">Témoignages</span> clients</h3>
                                </div>
                            </div>
                            <!--End-testimonial-heading-->
                        </div>
                    </div>
                </div>
                <div class="main-testimonial">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="testimonial-carousel indicator">
                                    <!--single-testimonial-start-->
                                    <div class="single-testimonial">
                                        <div class="testimonial-img">
                                            <p><img src="images/testimonial/1.jpg" alt=""></p>
                                        </div>
                                        <div class="testimonial-des home-1">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mattis dui odio, non suscipit consectetur elit, Lorem ipsum dolor sit<br> amet, consectetur adipiscing elit. Mattis dui odio, non suscipit , Lorem... </p>
                                        </div>
                                        <div class="testimonial-author">
                                            <h5>Miss.Anna</h5>
                                        </div>
                                    </div>
                                    <!--single-testimonial-end-->
                                    <!--single-testimonial-start-->
                                    <div class="single-testimonial">
                                        <div class="testimonial-img">
                                            <p><img src="images/testimonial/2.jpg" alt=""></p>
                                        </div>
                                        <div class="testimonial-des">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mattis dui odio, non suscipit consectetur elit, Lorem ipsum dolor sit<br> amet, consectetur adipiscing elit. Mattis dui odio, non suscipit , Lorem... </p>
                                        </div>
                                        <div class="testimonial-author">
                                            <h5>Jems David</h5>
                                        </div>
                                    </div>
                                    <!--single-testimonial-end-->
                                    <!--single-testimonial-start-->
                                    <div class="single-testimonial">
                                        <div class="testimonial-img">
                                            <p><img src="images/testimonial/3.jpg" alt=""></p>
                                        </div>
                                        <div class="testimonial-des">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mattis dui odio, non suscipit consectetur elit, Lorem ipsum dolor sit<br> amet, consectetur adipiscing elit. Mattis dui odio, non suscipit , Lorem... </p>
                                        </div>
                                        <div class="testimonial-author">
                                            <h5>Miss.Jerin</h5>
                                        </div>
                                    </div>
                                    <!--single-testimonial-end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-latest-testimonials-->
            <!--start-instagram-area-->
            <div class="instagram-area" style="margin-bottom: 50px; text-align: left; padding-left: 105px; padding-right: 105px;">
                <div class="container-fluid">
                    <div class="latest-content text-center">
                        <div class="section-heading">
                            <h3><span class="h-color">nos</span> partenaires</h3>
                        </div>
                    </div>
                    <div id="instafeed" class="instafeed">
                        <?php $partenaires = liste_partenaires($pdo);
                            foreach ($partenaires as $part) {
                                $photo = liste_par_partenaires_limite($pdo,$part['id_part']);
                        ?>
                        <a href="https://<?php echo $part['site_web']; ?>" target="_blank"><img src="data:<?php echo $photo[0][3]; ?>;base64,<?php echo base64_encode($photo[0][1]); ?>"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--start-instagram-area-->

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