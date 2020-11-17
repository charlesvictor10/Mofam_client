<?php
/**
 * Created by PhpStorm.
 * User: Charlesvictor26
 * Date: 08/09/2020
 * Time: 12:18
 */
include_once 'inc/server.class.php';

if(!empty($_POST["id_departement"])){
    $resultat = list_ville($pdo,$_POST["id_departement"]);
?>
<option>Sélectionner votre ville</option>
<?php
    foreach($resultat as $ville){
?>
<option value="<?php echo $ville["id_ville"]; ?> ">
    <?php echo $ville["nom_ville"]; ?>
</option>
<?php }
} ?>