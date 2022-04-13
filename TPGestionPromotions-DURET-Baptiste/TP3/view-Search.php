<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="right">Retour au menu</a>
    <Form action="Search.php" method="Post" enctype="multipart/form-data">
        <label for="NomEtudiant">Nom de l'étudiant</label>
        <input id="NomEtudiant" name="NomEtudiant" type="text" value=<?php if(!empty($_POST['NomEtudiant'])){echo $_POST['NomEtudiant'];}?>>
        <input type="submit" value="Rechercher">
    </Form>
    <hr/>
    <?php
        AfficheSearch();
    ?>
</body>
</html>