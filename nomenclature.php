<?php
require_once('database.php');

$sql='SELECT * FROM nomenclature ORDER BY id DESC';

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

<h1>liste des nomenclature
</h1>

<a href="create_nomenclature.php">Ajoute un nomenclature</a>

<table>
    <tr>
        <th>id</th>
        <th>id_produits</th>
        <th>id_composant</th>
        <th>quantite</th>

    </tr>

    <tbody>

    <?php

    while($donnees=$req_select->fetch(PDO::FETCH_ASSOC)) {  

        ?>

        <tr>
            <td><?=$donnees['id'];?></td>
            <td><?=$donnees['id_produits'];?></td>
            <td><?=$donnees['id_composant'];?></td>
            <td><?=$donnees['quantite'];?></td>
            <td>

                <a  href="update.php?id=<?=$donnees['id'];?>">update</a>
                <a  href="delete.php?id=<?=$donnees['id'];?>">delete</a>

            </td>
        </tr>


        <?php
         }

         ?>

    </tbody>

</table>
    
</body>
</html>