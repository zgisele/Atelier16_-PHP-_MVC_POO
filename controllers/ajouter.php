<?php
// --------------------------------Ajout de Contacte-----------------------------------------
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['favori'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $favori=$_POST['favori'];
 
    if (empty($nom) or empty($prenom) or empty( $telephone) ){
        
        echo 'veillez renseigner les champs';//quant les variables sont vides

    }else{

         include '../modeles/classeAjout.php';
        $Contacts1 = new Contacts($nom,$prenom,$telephone,$favori);
        $Contacts1->AjoutContact($db);

     }
}
 

 
?>