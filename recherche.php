<?php
/**
 * Created by PhpStorm.
 * User: bounda
 * Date: 12/11/2020
 * Time: 11:03
 */
$conn = new mysqli("localhost","root","","mofam");
if($conn->connect_error){
    die("Failed to connect!".$conn->connect_error);
}
if(isset($_POST['query'])){
    $inputText = $_POST['query'];
    $query = "SELECT designation FROM produits WHERE designation LIKE '%$inputText%' LIMIT 10";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action'>".$row['designation']."</a>";
        }
    } else {
        echo "<p class='list-group-item'>Aucun produit n'a été enregistré avec ce nom</p>";
    }
}
