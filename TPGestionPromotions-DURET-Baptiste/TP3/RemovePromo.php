<?php
$db = new PDO('mysql:host=localhost;dbname=iia;charset=utf8', 'root');
$verif = $db->prepare('SELECT * FROM promotion WHERE identifier = :IdentifiantPromo');
$verif->execute([
    'IdentifiantPromo' => $_GET['idpromo']
]);
$result = $verif->rowCount();
if($result > 0)
{
    //Supprimer une promotion
    
    $RemovePromo = $db->prepare('DELETE FROM etudiant WHERE promotion_identifier = :identifiant; DELETE FROM promotion WHERE identifier = :identifiant ');
    $RemovePromo->execute([
        'identifiant' => $_GET['idpromo']
    ]);
    
}
header('location: index.php')
?>