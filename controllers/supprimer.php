<?php
    // -------------------------------------supression----------------------------------------------
if (isset($_POST["supprimer"])){
    $supprimer=$_POST["supprimer"];

    if(empty($supprimer)){

        echo 'veillez renseigner les champs';//quant les variables sont vides

    }else{

        include '../modeles/classeAjout.php';
        $Contacts1 = new Contacts("falu","mop","775675641",1);
        $Contacts1->SuppressionContact($supprimer,$db);
    }
}
?>