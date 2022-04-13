<?php
function AffichageEtudiants()
{
    $idpromo = $_GET['idpromo'];
    $_SESSION['idpromo'] = $idpromo;
    //Commandes SQL
        
        $db = new PDO('mysql:host=localhost;dbname=iia;charset=utf8', 'root');
        
        //Commande pour obtenir l'identifiant le plus élevé de promotion
        $ids = $db->prepare('SELECT MAX(identifier) FROM promotion');
        $ids->execute();
        $Maxid = $ids->fetch();

        if($idpromo > $Maxid[0] || !isset($idpromo) || empty($idpromo))
        {
            header('location: index.php');
        }


        //Commande pour obtenir les étudiants
        $etudiants = $db->prepare('SELECT * FROM etudiant WHERE promotion_identifier = :idpromo');
        $etudiants->execute([
            'idpromo' => $idpromo
        ]);
        $ListEtudiants = $etudiants->fetchall();

        //Commandes pour obtenir la promotion des étudiants
        $promo = $db->prepare('SELECT promotion.label FROM promotion WHERE identifier = :idpromo');
        $promo->execute([
            'idpromo' => $idpromo
        ]);
        $promotion = $promo->fetch();



        //Affichage de tout les étudiants de la promotion
        echo '<h1>Liste des '.$etudiants->rowCount().' '.$promotion[0].'</h1>';
        echo '<ul class="grid">';
        foreach($ListEtudiants as $etudiant)
        {
            
            echo '<li>'.$etudiant["firstName"].' '. $etudiant["name"].'<a class="red" href="RemoveEtudiant.php?idEtudiant='.$etudiant['identifier'].'"><img src="./images/arrow.png" alt="arrow-left"/>Supprimer</a></li>';
            
        }
        echo '</ul>';
}

require 'view-etudiants.php'
?>