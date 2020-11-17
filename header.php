<?php
    include_once 'inc/server.class.php';
?>
<!--Start-Header-area-->
<header>
    <div class="header-top-wrap home-2 home-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="header-top-left">
                        <!--Start-welcome-message-->
                        <div class="welcome-mg hidden-xs"><span>Bienvenue à Mofam !</span></div>
                        <!--End-welcome-message-->
                    </div>
                </div>
                <!-- Start-Header-links -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="header-top-right">
                        <div class="top-link-wrap">
                            <div class="single-link">
                                <div class="my-account"><a href="my-account.php"><span class="">Mon compte</span></a></div>
                                <?php 
                                    if(isset($_SESSION['id_acheteur'])){
                                ?>
                                        <div class="login"><a href="login.php"><span class="">Déconnexion</span></a></div>
                                <?php        
                                    } else {
                                ?>
                                    <div class="login"><a href="login.php"><span class="">Connexion</span></a></div>
                                <?php        
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End-Header-links -->
            </div>
        </div>
    </div>
    <!--Start-header-mid-area-->
    <div class="header-mid-wrap home-2 home-7">
        <div class="container">
            <div class="header-mid-content">
                <div class="row">
                    <!--Start-logo-area-->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="header-logo">
                            <a href="index.php"><img src="images/logo/2.png" alt="Mofam"></a>
                        </div>
                    </div>
                    <!--End-logo-area-->
                    <!--Start-gategory-searchbox-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div id="search-category-wrap">
                            <form class="header-search-box home-7" action="resultat_recherche.php" method="post">
                                <input type="search" placeholder="Rechercher un article..." id="text-search" name="search">
                                <button id="btn-search-category" type="submit" name="submit" value="Recherche">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="list-group" id="show-list" style="margin: -15px 7px 0 0; width: 80%; position: relative;">

                        </div>
                    </div>
                    <!--End-gategory-searchbox-->
                    <!--Start-cart-wrap-->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <ul class="header-cart-wrap">
                            <li><a class="cart" href="liste_panier.php">
                                Mon Panier:
                                    <?php if(isset($_SESSION['panier'])){
                                        echo '<span style="color:#0da241">'.qte().'</span>';
                                    }
                                    else {
                                        echo '<span style="color:#dd1e1e">0</span>';
                                    }?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--End-cart-wrap-->
                </div>
            </div>
        </div>
    </div>
    <!--End-header-mid-area-->
    <!--Start-Mainmenu-area -->
    <div class="mainmenu-area home-2 home-7 hidden-sm hidden-xs">
        <div id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                        <div class="log-small"><a class="logo" href="index.php"><img alt="Mofam" src="images/logo/2.png"></a></div>
                        <div class="mainmenu home-2 home-7">
                            <nav>
                                <ul id="nav">
                                    <li><a href="index.php">Accueil</a></li>
                                    <?php $arra = liste_all($pdo);
                                    foreach ($arra as $ar) {
                                    ?>
                                    <li class="angle-down"><a href="#">
                                        <?php echo ucwords($ar[1]); ?>
                                    </a>
                                        <div class="megamenu">
                                            <div class="megamenu-list">
                                                <?php $arcs = liste_par_categorie($pdo,$ar[0]);
                                                foreach ($arcs as $arc) {?>
                                                    <span class="mega-single">
                                                        <a href="#" class="mega-title"></a>
                                                        <a href="categorie.php?souscat=<?php echo $arc[0] ?>"><?php echo ucwords($arc[1]) ?></a>
                                                    </span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-Mainmenu-area-->
    <!--Start-Mobile-Menu-Area -->
    <div class="mobile-menu-area visible-sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="index.php">Accueil</a></li>
                                <?php $arra = liste_all($pdo);
                                foreach ($arra as $ar) { ?>
                                <li><a href="#"><?php echo ucwords($ar[1]); ?></a>
                                    <?php 
                                        $arcs = liste_par_categorie($pdo,$ar[0]);
                                        foreach ($arcs as $arc) {
                                    ?>
                                            <ul>
                                                <li><a href="categorie.php?souscat=<?php echo $arc[0] ?>"><?php echo ucwords($arc[1]) ?></a></li>
                                            </ul>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-Mobile-Menu-Area -->
</header>
<!--End-Header-area-->