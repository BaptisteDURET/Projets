<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="flexcontainer">
        <Form action="Search.php" method="Post" enctype="multipart/form-data">
            <label for="NomEtudiant">Nom de l'étudiant</label>
            <input id="NomEtudiant" name="NomEtudiant" type="text">
            <input type="submit" value="Rechercher">
        </Form>
        
        <Form action="AddPromo.php" method="Post" enctype="multipart/form-data">
            <label for="NomPromo">Nom de la promotion</label>
            <input id="NomPromo" name="NomPromo" type="text">
            <input type="submit" value="Ajouter Promotion">
        </Form>
    </div>
    <hr/>
    <?php
        AffichagePromos();
    ?>
</body>
</html>