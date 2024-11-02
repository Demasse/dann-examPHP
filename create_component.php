<?php
require_once('database.php');

$message='';
function clean_input($data){

    return htmlspecialchars(stripslashes(trim($data)));
}

if(isset($_POST['create'])){
    $libelle=clean_input($_POST['libelle']);
    $description=clean_input($_POST['description']);
    $cout=clean_input($_POST['cout']);


    if(  empty('libelle') || empty('description') || empty('cout')){
     
        $message=' <p> veilleuz remplir les champs </p>';

    }else{
       $sql=' INSERT INTO  `composant`( `libelle`,`description`,`cout` ) VALUES(?,?,?) ';
       $req_select=$pdo->prepare($sql);
       $req_select->execute([ $libelle, $description ,$cout]);

 echo 'composant créé avec succès';


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

<h1>la creation des composants</h1>
 <?= $message ?>

 <form action="" method="post">

 <br>

<label for="libelle">libelle </label>
<input type="text" id="libelle" name="libelle">


<br>



<label for="description">description </label>
<input type="text" id="description" name="description">

<br>

<label for="cout">cout </label>
<input type="text" id="cout" name="cout">

 
<br> 
<input type="submit" name="create" value="Créer">
<br>

<a href="http://localhost/dann_exam/index_component.php">retour</a>

</form>

</body>
</html>
