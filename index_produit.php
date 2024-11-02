<?php
require_once('database.php');

$sql='SELECT * FROM produits ORDER BY id DESC';

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

<h1>liste des produit
</h1>

<a href="create.php">Ajoute un produit</a>

<table>
    <tr>
        <th>id</th>
        <th>libelle</th>
        <th>description</th>
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
            <td>
                <a  href="update.php?id=<?=$donnees['id'];?>">update</a>
                <a  href="delete.php?id=<?=$donnees['id'];?>">delete</a>

                <a href="delete.php?id=<=?donnees['id']"></a>
            </td>
        </tr>


        <?php
         }

         ?>

    </tbody>

</table>
    
</body>
</html>