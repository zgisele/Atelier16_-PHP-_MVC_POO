<?php
    include '../modeles/classeAjout.php';
if(isset($_POST['ajouter'])){

$id = (int)$_POST['id_contact'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$favori=$_POST['favori'];


if (empty($nom) or empty($prenom) or empty( $telephone) ){
    
    echo 'veillez renseigner les champs';//quant les variables sont vides

}else{


    $Ajouter1 = new Ajouter($nom,$prenom,$telephone,$favori);
    $Ajouter1->modifierContact($nom,$prenom,$telephone,$favori,$id,$db);

} 
}
?>