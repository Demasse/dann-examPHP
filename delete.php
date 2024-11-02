
<?php
require_once('database.php');

$message='';

if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $sql = 'DELETE FROM produits WHERE id=?';
    $id=(int)$_GET['id'];
    

    $req_select=$pdo->prepare($sql);
    $req_select->execute([$id]);

    if($req_select->rowCount() > 0){
        $message='<p> ft avec success </p>';
    }else{
        $message='<p> aucun personne avec cette id </p>';
        
    }
}else{
    $message='<p> id not found </p>';

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

<?php echo $message ;?>

<a href="http://localhost/dann_exam/index_produit.php">retour</a>


    
</body>
</html>