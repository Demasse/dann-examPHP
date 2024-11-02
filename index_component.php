<?php
require_once('database.php');

$sql='SELECT * FROM composant ORDER BY id DESC';

$req_select=$pdo->prepare($sql);
$req_select->execute();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>liste des composant
</h1>

<a href="create_component.php">Ajoute un composant</a>

<table>
    <tr>
        <th>id</th>
        <th>libelle</th>
        <th>description</th>
        <th>cout_unitaire</th>
        <th>action</th>

    </tr>

    <tbody>

    <?php

    while($donnees=$req_select->fetch(PDO::FETCH_ASSOC)) {  

        ?>

        <tr>
            <td><?=$donnees['id'];?></td>
            <td><?=$donnees['libelle'];?></td>
            <td><?=$donnees['description'];?></td>
            <td><?=$donnees['cout'];?></td>
            <td>

                <a  href="update_component.php?id=<?=$donnees['id'];?>">update</a>
                <a  href="delete_component.php?id=<?=$donnees['id'];?>">delete</a>

            </td>
        </tr>


        <?php
         }

         ?>

    </tbody>

</table>
    
</body>
</html>