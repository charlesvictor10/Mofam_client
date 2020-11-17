<?php
/**
 * Created by PhpStorm.
 * User: Charlesvictor26
 * Date: 08/09/2020
 * Time: 12:18
 */
include_once 'inc/server.class.php';

if(!empty($_POST["id_region"])){
    $resultat = list_departement($pdo,$_POST["id_region"]);
?>
<option>Sélectionner votre département</option>
<?php
    foreach($resultat as $departement){
?>
<option value="<?php echo $departement["id_departement"]; ?> ">
    <?php echo $departement["nom_departement"]; ?>
</option>
<?php }
} ?>