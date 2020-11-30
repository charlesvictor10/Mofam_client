<?php
require_once('config.inc.php');

// Fonction pour afficher les categories
function liste_all($pdo)
{
  $sql = 'SELECT id_cat,libelle_cat from categorie';

  try {
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur categorie ' .$e->getMessage());
  }
}

// Fonction pour afficher les sous categories
function liste_par_categorie($pdo, $categorie)
{
  $sql = 'SELECT id_sous_cat,libelle_sous_cat FROM sous_categorie where categorie_id= "'.$categorie.'" ';

  try {
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur sous categorie ' .$e->getMessage());
  }
}

//Fonction qui permet d'afficher les produits 
function liste_limite_produit($pdo,$id_sousCat,$start_from,$num_per_page){
  $sql = 'SELECT id_produit,date_commande,description,designation,etat,prix,proprietaire,quantite,sous_categorie_id,ville_id FROM produits WHERE sous_categorie_id = "'.$id_sousCat.'" AND etat = 1 AND quantite > 0 ORDER BY date_commande DESC LIMIT '.$start_from.','.$num_per_page.' ';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e) {
    die('Erreur produit ' .$e->getMessage());
  }
}

function pagination($pdo){
  $sql = 'SELECT COUNT(*) FROM produits,sous_categorie WHERE produits.sous_categorie_id = sous_categorie.id_sous_cat AND etat = 1 AND quantite > 0';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchColumn();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e) {
    die('Erreur produit '.$e->getMessage());
  }
}

function Liste_par_produits_limite($pdo,$id_produit){
  $sql = 'SELECT * from photos where produit_id="'.$id_produit.'" LIMIT 0,1';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e) {
    die('Erreur photo ' .$e->getMessage());
  }
}

function Location_produit($pdo,$id_ville){
  $sql = 'SELECT nom_ville from ville where id_ville="'.$id_ville.'" LIMIT 0,1';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e) {
    die('Erreur ville '.$e->getMessage());
  }
}

function Liste_par_partenaires_limite($pdo,$id_partener){
  $sql = 'SELECT * from logos where partener_id="'.$id_partener.'" LIMIT 0,1';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e) {
    die('Erreur photo ' .$e->getMessage());
  }
}

function liste_last_produit($pdo){
  $sql = 'SELECT id_produit,sous_categorie.libelle_sous_cat,designation,description,prix,quantite,etat,date_commande FROM produits,sous_categorie WHERE produits.sous_categorie_id = sous_categorie.id_sous_cat AND etat = 1 AND quantite > 0 ORDER BY date_commande DESC LIMIT 0,4';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e) {
    die('Erreur produit ' .$e->getMessage());
  }
}

//Fonction pour rechercher un produit
function recherche_produit($pdo,$nom){
  $sql = 'SELECT * FROM produits WHERE designation = "'.$nom.'" LIMIT 100';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e) {
    die('Erreur produit ' .$e->getMessage());
  }
}

//Fonction pour inscrire un acheteur
function inscription($pdo,$prenom,$nom,$email,$password,$tel,$actived,$adresse,$ville_id)
{
	$sql = 'INSERT INTO acheteur(nom,prenom,email,password,tel,actived,adresse,ville_id) VALUES (:nom, :prenom, :email, :password, :tel, :actived, :adresse, :ville_id)';

	try{
		$prep = $pdo->prepare($sql);
		$prep->bindValue(':nom', $nom, PDO::PARAM_STR);
		$prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
		$prep->bindValue(':email', $email, PDO::PARAM_STR);
		$prep->bindValue(':password', $password, PDO::PARAM_STR);
		$prep->bindValue(':tel', $tel, PDO::PARAM_STR);
		$prep->bindValue(':actived', $actived, PDO::PARAM_BOOL);
        $prep->bindValue(':adresse', $adresse, PDO::PARAM_STR);
		$prep->bindValue(':ville_id', $ville_id, PDO::PARAM_INT);
		$prep->execute();
	} catch (Exception $e) {
		die('Erreur inscription '.$e->getMessage());
	}
}

//Fonction pour connecter un acheteur
function connexion($pdo,$email){
  $sql = 'SELECT password, id_acheteur FROM acheteur WHERE email = "'.$email.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetch(PDO::FETCH_ASSOC);
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur acheteur ' .$e->getMessage());
  }
}

function update($pdo,$id_acheteur,$prenom,$nom,$email,$password,$tel){
  $sql = 'UPDATE acheteur SET prenom = "'.$prenom.'", nom = "'.$nom.'", email = "'.$email.'", password = "'.$password.'", tel = "'.$tel.'" WHERE id_acheteur = "'.$id_acheteur.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':nom', $nom, PDO::PARAM_STR);
    $prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $prep->bindValue(':email', $email, PDO::PARAM_STR);
    $prep->bindValue(':password', $password, PDO::PARAM_STR);
    $prep->bindValue(':tel', $tel, PDO::PARAM_STR);
    $prep->execute();
  } catch(Exception $e) {
    die('Erreur acheteur ' .$e->getMessage());
  }
}

function forget_password($pdo,$email,$date_changement_mdp,$token){
  $sql = 'UPDATE acheteur SET date_changement_mdp = "'.$date_changement_mdp.'", token = "'.$token.'" WHERE email = "'.$email.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':date_changement_mdp', $date_changement_mdp);
    $prep->bindValue(':token', $token, PDO::PARAM_STR);
    $prep->bindValue(':email', $email, PDO::PARAM_STR);
    $prep->execute();
  } catch(Exception $e) {
    die('Erreur acheteur '.$e->getMessage());
  }
}

function recup_token($pdo,$token){
  $sql = 'SELECT date_changement_mdp FROM acheteur WHERE token = "'.$token.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetch(PDO::FETCH_ASSOC);
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e){
    die('Erreur token '.$e->getMessage());
  }
}

function modifie_password($pdo,$password,$token){
  $sql = 'UPDATE acheteur SET password = "'.$password.'", token = "" WHERE token = "'.$token.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':password', $password, PDO::PARAM_STR);
    $prep->bindValue(':token', $token, PDO::PARAM_STR);
    $prep->execute();
  } catch(Exception $e) {
    die('Erreur mot de passe '.$e->getMessage());
  }
}

function exist_acheteur($pdo,$email){
  $sql = 'SELECT id_acheteur FROM acheteur WHERE email = "'.$email.'"';

  try {
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->rowCount();
    $prep->closeCursor();
    $prep = NULL;
    if ($arr){
      return true;
    }
    else{
      return false;
    }
  } catch (Exception $e) {
    die('Erreur acheteur ' .$e->getMessage());
  }
}

function exist_utilisateur($pdo,$id){
  $sql = 'SELECT prenom, nom, email FROM acheteur WHERE id_acheteur = "'.$id.'"';

  try {
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->rowCount();
    $prep->closeCursor();
    $prep = NULL;
    if ($arr){
      return true;
    }
    else{
      return false;
    }
  } catch (Exception $e) {
    die('Erreur acheteur ' .$e->getMessage());
  }
}

function profile_acheteur($pdo,$id){
  $sql = 'SELECT id_acheteur, prenom, nom, email, adresse, tel, password, ville_id FROM acheteur WHERE id_acheteur = "'.$id.'"';

  try {
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetch();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur acheteur ' .$e->getMessage());
  }
}

function commande_acheteur($pdo,$id){
  $sql = 'SELECT code, date_commande, etat, montant_total FROM commande WHERE id_acheteur = "'.$id.'" ORDER BY date_commande DESC';

  try {
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur commande ' .$e->getMessage());
  }
}

function verif_compte($pdo, $email,$password){
  $sql = 'SELECT prenom, nom from acheteur where email = "'.$email.'" and password = "'.$password.'"';
      
  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetch();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur acheteur ' .$e->getMessage());
  }
}

function get_id_acheteur($pdo,$mail){
  $sql = 'SELECT id_acheteur from acheteur where email="'.$mail.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetch();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur acheteur ' .$e->getMessage());
  }
}

//Fonction pour afficher l'adresse
function list_region($pdo){
  $sql = 'SELECT id_region, nom_region FROM region';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur region ' .$e->getMessage());
  }
}

function list_departement($pdo, $region)
{
  $sql = 'SELECT * FROM departement WHERE id_region = "'.$region.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur département ' .$e->getMessage());
  }
}

function list_ville($pdo, $departement)
{
  $sql = 'SELECT * FROM ville WHERE id_departement = "'.$departement.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur ville ' .$e->getMessage());
  }
}

function getIdCommande($pdo,$code){
  $sql = 'SELECT id FROM commande WHERE code = "'.$code.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetch();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur commande ' .$e->getMessage());
  }
}

function ajouter_produit_commande($pdo,$quantite,$id_produit,$code){
  $sql = 'INSERT INTO produit_commande(quantite,id_produit,code) VALUES(:quantite,:id_produit,:code)';

  try{
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':quantite', $quantite, PDO::PARAM_INT);
    $prep->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
    $prep->bindValue(':code', $code, PDO::PARAM_STR);
    $prep->execute();
  } catch(Exception $e){
    die('Erreur d\'ajout '.$e->getMessage());
  }
}

function get_produit($pdo, $id){
  $sql = 'SELECT id_produit,sous_categorie.id_sous_cat,sous_categorie.libelle_sous_cat
    as lib_s,categorie.libelle_cat,designation,prix,quantite,description,etat,date_commande,categorie.id_cat
    from produits,sous_categorie,categorie
    where produits.sous_categorie_id = sous_categorie.id_sous_cat
    and sous_categorie.categorie_id = categorie.id_cat
    and id_produit= '.$id.'';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetch();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch(Exception $e){
    die('Erreur produit '.$e->getMessage());
  }
}

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*                Fonctions de base de gestion du panier                   */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
* Ajoute un article dans le panier après vérification que nous ne somme pas en phase de paiement
*
* @param array  $select variable tableau associatif contenant les valeurs de l'article
* @return Mixed Retourne VRAI si l'ajout est effectué, FAUX sinon voire une autre valeur si l'ajout
*               est renvoyé vers la modification de quantité.
* @see {@link modif_qte()}
*/
function ajout($select)
{
  $ajout = false;
  if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false)
  {
    if(!verif_panier($select['id']))
    {
      array_push($_SESSION['panier']['id_article'],$select['id']);
      array_push($_SESSION['panier']['qte'],$select['qte']);
      array_push($_SESSION['panier']['prix'],$select['prix']);
      $ajout = true;
    }
    else
    {
      $ajout = modif_qte($select['id'],$select['qte']);
    }
  }
  return $ajout;
}

/**
* Modifie la quantité d'un article dans le panier après vérification que nous ne somme pas en phase de paiement
*
* @param String $ref_article    Identifiant de l'article à modifier
* @param Int $qte               Nouvelle quantité à enregistrer
* @return Mixed                 Retourne VRAI si la modification a bien eu lieu,
*                               FAUX sinon,
*                               "absent" si l'article est absent du panier,
*                               "qte_ok" si la quantité n'est pas modifiée car déjà correctement enregistrée.
*/
function modif_qte($ref_article, $qte)
{
  /* On initialise la variable de retour */
  $modifie = false;
  if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false)
  {
    if(nombre_article($ref_article) != false && $qte != nombre_article($ref_article))
    {
      /* On compte le nombre d'articles différents dans le panier */
      $nb_articles = count($_SESSION['panier']['id_article']);
      /* On parcoure le tableau de session pour modifier l'article précis. */
      for($i = 0; $i < $nb_articles; $i++)
      {
        if($ref_article == $_SESSION['panier']['id_article'][$i])
        {
          $_SESSION['panier']['qte'][$i] = $qte;
          $modifie = true;
        }
      }
    }
    else
    {
      /* L'article est absent du panier, donc on ne peut pas modifier la quantité ou bien
      * le nombre est exactement le même et il est inutile de le modifier
      * Si l'article est absent, comme on a ni la taille  ni le prix, on ne peut pas l'ajouter
      * Si le nombre est le même, on ne fait pas de changement. On peut donc retourner un autre
      * type de valeur pour indiquer une erreur qu'il faudra traiter à part lors du retour d'appel
      */
      if(nombre_article($ref_article) != false)
      {
        $modifie = "absent";
      }
      if($qte != nombre_article($ref_article))
      {
        $modifie = "qte_ok";
      }
    }
  }
  return $modifie;
}

/**
* Supprimer un article du panier après vérification que nous ne somme pas en phase de paiement
*
* @param String     $ref_article numéro de référence de l'article à supprimer
* @return Mixed     Retourne TRUE si la suppression a bien été effectuée,
*                   FALSE sinon, "absent" si l'article était déjà retiré du panier
*/
function supprim_article($ref_article)
{
  $suppression = false;
  if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false)
  {
    /* On vérifie que l'article à supprimer est bien présent dans le panier */
    if(nombre_article($ref_article) != false)
    {
      /* création d'un tableau temporaire de stockage des articles */
      $panier_tmp = array("id_article"=>array(),"qte"=>array(),"taille"=>array(),"prix"=>array());
      /* Comptage des articles du panier */
      $nb_articles = count($_SESSION['panier']['id_article']);
      /* Transfert du panier dans le panier temporaire */
      for($i = 0; $i < $nb_articles; $i++)
      {
        /* On transfère tout sauf l'article à supprimer */
        if($_SESSION['panier']['id_article'][$i] != $ref_article)
        {
          array_push($panier_tmp['id_article'],$_SESSION['panier']['id_article'][$i]);
          array_push($panier_tmp['qte'],$_SESSION['panier']['qte'][$i]);
          array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]);
        }
      }
      /* Le transfert est terminé, on ré-initialise le panier */
      $_SESSION['panier'] = $panier_tmp;
      /* Option : on peut maintenant supprimer notre panier temporaire: */
      unset($panier_tmp);
      $suppression = true;
    }
    else
    {
      $suppression == "absent";
    }
  }
  return $suppression;
}

/**
* Fonction qui supprime tout le contenu du panier en détruisant la variable après
* vérification qu'on ne soit pas en phase de paiement.
*
* @return Mixed    Retourne VRAI si l'exécution s'est correctement déroulée, Faux sinon et "inexistant" si
*                  le panier avait déjà été détruit ou n'avait jamais été créé.
*/
function vider_panier()
{
  $vide = false;
  if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false)
  {
    if(isset($_SESSION['panier']))
    {
      unset($_SESSION['panier']);
      if(!isset($_SESSION['panier']))
      {
        $vide = true;
      }
    }
    else
    {
      /* Le panier était déjà détruit, on renvoie une autre valeur exploitable au retour */
      $vide = "inexistant";
    }
  }
  return $vide;
}

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*                 Fonctions annexes de gestion du panier                  */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
* Vérifie la quantité enregistrée d'un article dans le panier
*
* @param String $ref_article référence de l'article à vérifier
* @return Mixed Renvoie le nombre d'article s'il y en a, ou Faux si cet article est absent du panier
*/
function nombre_article($ref_article)
{
  /* On initialise la variable de retour */
  $nombre = false;
  /* Comptage du panier */
  $nb_art = count($_SESSION['panier']['id_article']);
  /* On parcoure le panier à la recherche de l'article pour vérifier le cas échéant combien sont enregistrés */
  for($i = 0; $i < $nb_art; $i++)
  {
    if($_SESSION['panier']['id_article'][$i] == $ref_article)
      $nombre = $_SESSION['panier']['qte'][$i];
  }
  return $nombre;
}

function nbr()
{
  $nb = count($_SESSION['panier']['id_article']);
  return $nb;
}

function qte(){
  $qte = $_SESSION['panier']['qte'];
  $nb = array_sum($qte);
  return $nb;
}

/**
* Calcule le montant total du panier
*
* @return Double
*/
function montant_panier()
{
  /* On initialise le montant */
  $montant = 0;
  /* Comptage des articles du panier */
  $nb_articles = count($_SESSION['panier']['id_article']);
  /* On va calculer le total par article */
  for($i = 0; $i < $nb_articles; $i++)
  {
    $montant += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
  }
  /* On retourne le résultat */
  return $montant;
}

/**
* Vérifie la présence d'un article dans le panier
*
* @param String $ref_article référence de l'article à vérifier
* @return Boolean Renvoie Vrai si l'article est trouvé dans le panier, Faux sinon
*/
function verif_panier($ref_article)
{
  /* On initialise la variable de retour */
  $present = false;
  /* On vérifie les numéros de références des articles et on compare avec l'article à vérifier */
  if(count($_SESSION['panier']['id_article']) > 0 && array_search($ref_article,$_SESSION['panier']['id_article']) !== false)
  {
    $present = true;
  }
  return $present;
}

/**
* Fonction de verrouillage du panier pendant la phase de paiement.
*
*/
function preparerPaiement()
{
  $_SESSION['panier']['verrouille'] = true;
  header("Location: URL_DU_SITE_DE_BANQUE");
}

/**
* Fonction qui va enregistrer les informations de la commande dans
* la base de données et détruire le panier.
*
*/
function paiementAccepte()
{
  /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
  /*   Stockage du panier dans la BDD   */
  /* ajoutez ici votre code d'insertion */
  /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
  unset($_SESSION['panier']);
}

function select_id_produit_qtte($pdo, $id_panier){
  $sql = 'SELECT produit_panier.id_produit,produit_panier.quantite from produit_panier,produits where id_panier ="'.$id_panier.'" and produits.id_produit = produit_panier.id_produit';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $x = $prep->fetchAll();
    return $x;
  } catch(Exception $e){
    die('Erreur produit ' .$e->getMessage());
  }
}

function nombre($pdo){
  $sql = "select * from commande";

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->rowCount();
    $prep->closeCursor();
    $prep = NULL;
    return $arr+1;
  } catch(Exception $e) {
    die('Erreur panier ' .$e->getMessage());
  }
}

function ajoute_commande($pdo,$code,$id_acheteur,$date_commande,$montant_total,$etat)
{
  $sql = 'INSERT INTO commande(code,id_acheteur,date_commande,montant_total,etat) VALUES(:code, :id_acheteur, :date_commande, :montant_total, :etat)';

  try{
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':code', $code, PDO::PARAM_STR);
    $prep->bindValue(':id_acheteur', $id_acheteur, PDO::PARAM_INT);
    $prep->bindValue(':date_commande', $date_commande);
    $prep->bindValue(':montant_total', $montant_total);
    $prep->bindValue(':etat', $etat, PDO::PARAM_STR);
    $prep->execute();
  } catch(Exception $e) {
    die('Erreur commande ' .$e->getMessage());
  }
}

function actualise($pdo,$id_produit,$qtte){
  $sql = 'UPDATE produits SET quantite = quantite-'.$qtte.' WHERE produits.id_produit ="'.$id_produit.'"';

  try{
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $prep->closeCursor();
    $prep = NULL;
  } catch(Exception $e){
    die('Erreur produits ' .$e->getMessage());
  }
}

// Fonction pour afficher les partenaires
function liste_partenaires($pdo)
{
  $sql = 'SELECT id_part, nom_partenaire, site_web from partener';

  try {
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $arr = $prep->fetchAll();
    $prep->closeCursor();
    $prep = NULL;
    return $arr;
  } catch (Exception $e) {
    die('Erreur partenaire ' .$e->getMessage());
  }
}
?>