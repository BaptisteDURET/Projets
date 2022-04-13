<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=iia;charset=utf8', 'root');
$verif = $db->prepare('SELECT * FROM etudiant WHERE identifier = :IdentifiantEtudiant');
$verif->execute([
    'IdentifiantEtudiant' => $_GET['idEtudiant']
]);
$result = $verif->rowCount();
if($result > 0)
{
    //Supprimer un étudiant
    
    $RemoveEtudiant = $db->prepare('DELETE FROM etudiant WHERE identifier = :identifiant ');
    $RemoveEtudiant->execute([
        'identifiant' => $_GET['idEtudiant']
    ]);
    
}
header('location: etudiants.php?idpromo='.$_SESSION['idpromo'].'');
?>