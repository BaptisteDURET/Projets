<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="right">Retour au menu</a>
    <Form action="AddEtudiant.php" method="Get" enctype="multipart/form-data">
        <label for="PrenomEtudiant">Prénom de l'étudiant</label>
        <input id="PrenomEtudiant" name="PrenomEtudiant" type="text">
    </br>
        <label for="NomEtudiant">Nom de l'étudiant</label>
        <input id="NomEtudiant" name="NomEtudiant" type="text">
    </br>
        <input type="submit" value="Ajouter un étudiant">
    </Form>
    <hr/>


    <?php
        AffichageEtudiants()
    ?>
</body>
</html>