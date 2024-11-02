<?php
require_once('database.php');

$message = '';
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['create'])) {
    $id_produits = clean_input($_POST['id_produits']);
    $id_composant = clean_input($_POST['id_composant']);
    $quantite = clean_input($_POST['quantite']);

    if (empty($id_produits) || empty($id_composant) || empty($quantite)) {
        $message = '<p>Veuillez remplir les champs</p>';
    } else {
        $sql = 'INSERT INTO `nomenclature` (`id_produits`, `id_composant`, `quantite`) VALUES (?, ?, ?)';
        $req_select = $pdo->prepare($sql);
        $req_select->execute([$id_produits, $id_composant, $quantite]);

        echo 'Nomenclature créée avec succès';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>La création des composants</h1>
    <?= $message ?>

    <form action="" method="post">
        <label for="id_produits">id_produits</label>
        <input type="text" id="id_produits" name="id_produits">
        
        <br>
        <label for="id_composant">id_composant</label>
        <input type="text" id="id_composant" name="id_composant">
        
        <br>
        <label for="quantite">quantite</label>
        <input type="text" id="quantite" name="quantite">
        
        <br>
        <input type="submit" name="create" value="Créer">
        <br>
        <a href="http://localhost/dann_exam/nomenclature.php">Retour</a>
    </form>
</body>
</html>
