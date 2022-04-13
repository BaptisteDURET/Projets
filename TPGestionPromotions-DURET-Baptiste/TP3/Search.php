<?php

function AfficheSearch()
{
    $db = new PDO('mysql:host=localhost;dbname=iia;charset=utf8', 'root');
    $search = $db->prepare("SELECT * FROM `etudiant` WHERE name LIKE :etudiantNom or firstName LIKE :etudiantNom;");
    $search->execute([
        'etudiantNom' =>  '%'.$_POST['NomEtudiant'].'%'
    ]);

    $ListEtudiants = $search->fetchall();
    echo '<ul class="grid">';
    foreach($ListEtudiants as $etudiant)
    {
        echo '<li><a href="etudiants.php?idpromo='.$etudiant['promotion_identifier'].'">'.$etudiant['firstName'].' '.$etudiant['name'].'</a></br></li>';
    }

    echo '</ul>';
}


require 'view-Search.php';
?>