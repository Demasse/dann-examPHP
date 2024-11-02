<?php
require_once('database.php');


$message = '';
$libelle = '';
$description = '';
$var_id = null;

// Fonction pour nettoyer les entrées
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Vérification et récupération des informations
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $var_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    
        $sql = "SELECT * FROM produits WHERE id = ?";
        $req_select = $pdo->prepare($sql);
        $req_select->execute([$var_id]);
        $donnees = $req_select->fetch(PDO::FETCH_ASSOC);

        if ($donnees) {
            // Récupération des données
            $libelle = $donnees['libelle'];
            $description = $donnees['description'];
        } else {
            $message = "<p>Élément non trouvé.</p>";
        }
   
    }


// Mise à jour des informations
if (isset($_POST['update'])) {
    $var_libelle = clean_input($_POST['libelle']);
    $var_description = clean_input($_POST['description']);
    $var_id = clean_input($_POST['id']);

    if (empty($var_libelle) || empty($var_description)) {
        $message = "<p style='color: red;'>Veuillez remplir tous les champs du formulaire !</p>";
    } else {
    
            $sql = "UPDATE produits SET libelle = ?, description = ? WHERE id = ?";
            $req_upd = $pdo->prepare($sql);
            $req_upd->execute([$var_libelle, $var_description, $var_id]);

            $message = "<p style='color: green;'>Élément modifié avec succès.</p>";
       
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Modification Élément</title>
</head>
<body>
    <h1>Modifier un produit</h1>
    <?= $message; ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($var_id); ?>">
        
        <label for="libelle">Libellé :</label>
        <input type="text" id="libelle" name="libelle" value="<?= htmlspecialchars($libelle); ?>">
        <br><br>
        
        <label for="description">Description :</label>
        <textarea id="description" name="description"><?= htmlspecialchars($description); ?></textarea>
        <br><br>
        
        <input type="submit" name="update" value="Modifier">
    </form>

<a href="http://localhost/dann_exam/index_produit.php">retour</a>

</body>
</html>
