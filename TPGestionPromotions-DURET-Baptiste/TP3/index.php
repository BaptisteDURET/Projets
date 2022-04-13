<?php

function AffichagePromos()
{
    
    //Commande pour obtenir les promotions
    $db = new PDO('mysql:host=localhost;dbname=iia;charset=utf8', 'root');
    $promotions = $db->prepare('SELECT * FROM promotion ORDER BY label');
    $promotions->execute();

    $ListPromo = $promotions->fetchall();
    


    echo '<h1>Liste des '.$promotions->rowCount().' promotions</h1>';
    echo '<ul class="grid">';
    //Affichage des promotions
    foreach($ListPromo as $promo)
    {
        
        echo '<li><a href="etudiants.php?idpromo='.$promo['identifier'].'">'.htmlspecialchars($promo['label']).'</a><a class="red" href="RemovePromo.php?idpromo='.$promo['identifier'].'"><img src="./images/arrow.png" alt="arrow-left"/>Supprimer</a></br></li>';
        
    }
    echo '</ul>';
}


require 'view-index.php';
?>