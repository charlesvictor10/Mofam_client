<?php
include_once 'inc/server.class.php';

$QTE = $_GET['qte'];
$ID = $_GET['id'];

if($QTE == 1){
    $_SESSION['panier']['qte'][$ID]++;
    count($_SESSION['panier']['id_article']) == $_SESSION['panier']['qte'][$ID];
    nbr();
} elseif(($QTE == 0) && ($_SESSION ['panier']['qte'][$ID] > 1)) {
    $newqte = $_SESSION ['panier']['qte'][$ID];
    $_SESSION['panier']['qte'][$ID]--;
}



