<?php
    $id_panier = $_SESSION['code'];
    $arra = select_id_produit_qtte($pdo, $id_panier);
    $montant_total = montant_panier();
    $date_commande = date('Y-m-d');

    if (!isset ($_SESSION['id']))
    {
        $id_acheteur = -1;
    }else if ($_SESSION['type']=="acheteur") {
        $id_acheteur = $_SESSION['id'];
    }

    ajoute_commande($pdo,$_SESSION['code'],$id_acheteur,$date_commande,$montant_total,1);
    $cbr = cbr($pdo,$id_acheteur,$_SESSION['code'],date('Y-m-d'), 0);
    
    foreach ($arra as $ar){
    actualise($pdo, $ar[0], $ar[1]);
    ajoute_produit_commande($pdo,$_SESSION['code'],$ar[0],$ar[1],$cbr,0);
    /*ajouter_cbr_deja($cbr,$ar[2]);*/
}?>
