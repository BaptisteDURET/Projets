<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=iia;charset=utf8', 'root');
//Ajouter un étudiant
if($_GET['NomEtudiant'] != '' && $_GET['PrenomEtudiant'] != '')
{
    $AddEtudiant = $db->prepare('INSERT INTO etudiant (name, firstName, promotion_identifier) VALUES (:nom, :prenom, :identifiantpromo)');
    $AddEtudiant->execute([
        'nom' => $_GET['NomEtudiant'],
        'prenom' => $_GET['PrenomEtudiant'],
        'identifiantpromo' => $_SESSION['idpromo']
    ]);
}
header('location: etudiants.php?idpromo='.$_SESSION['idpromo'].'');
?>