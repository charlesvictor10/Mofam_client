<?php
/**
 * Created by PhpStorm.
 * User: Charlesvictor26
 * Date: 02/09/2020
 * Time: 16:10
 */
include_once 'inc/server.class.php';

/* Article exemple */
$select = array();
$select['id'] = $_GET['prod'];
$select['qte'] = $_GET['qtte'];
$select['prix'] = $_GET['prix'];
$ref_article = $_GET['prod'];
/* On vérifie l'existence du panier, sinon, on le crée */
if(!isset($_SESSION['panier']))
{
    /* Initialisation du panier */
    $_SESSION['panier'] = array();
    /* Subdivision du panier */
    $_SESSION['panier']['qte'] = array();
    $_SESSION['panier']['prix'] = array();
    $_SESSION['panier']['id_article'] = array();
}

if(verif_panier($ref_article))
{
    modif_qte($ref_article,$select['qte']);
}
else
{
    ajout($select);
}
header('location:'.$_GET['loc'].'');
?>

