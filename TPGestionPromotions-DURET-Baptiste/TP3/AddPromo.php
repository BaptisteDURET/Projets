<?php
$db = new PDO('mysql:host=localhost;dbname=iia;charset=utf8', 'root');
$verif = $db->prepare('SELECT * FROM promotion WHERE label = :NomPromo');
$verif->execute([
    'NomPromo' => $_POST['NomPromo']
]);
$result = $verif->rowCount();
if($result == 0)
{
    //Ajouter une promotion
    if($_POST['NomPromo'] != '')
    {
        $AddPromo = $db->prepare('INSERT INTO promotion (label) VALUES (:NomPromo)');
        $AddPromo->execute([
            'NomPromo' => $_POST['NomPromo']
        ]);
    }
}
header('location: index.php')
?>