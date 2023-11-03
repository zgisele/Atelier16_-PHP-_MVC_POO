<?php

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['favori'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $favori=$_POST['favori'];
 
    if (empty($nom) or empty($prenom) or empty( $telephone) ){
        
        echo 'veillez renseigner les champs';//quant les variables sont vides

    }else{

         include '../modeles/classeAjout.php';
        $Ajouter1 = new Ajouter($nom,$prenom,$telephone,$favori);
        $Ajouter1->Ajout($db);

     }
}

// -------------------------------------supression----------------------------------------------
if (isset($_POST["supprimer"])){
    $supprimer=$_POST["supprimer"];

    if(empty($supprimer)){

        echo 'veillez renseigner les champs';//quant les variables sont vides

    }else{

        include '../modeles/classeAjout.php';
        $Ajouter1 = new Ajouter("falu","mop","775675641",1);
        $Ajouter1->SuppressionContact($supprimer,$db);
    }
    
// -------------------------------------Mise a jour (Modifier)----------------------------------------------
if (isset($_POST["modifier"])){

    $modifier=$_POST["modifier"];

    if(empty($modifier)){

        echo 'veillez renseigner les champs';//quant les variables sont vides

    }else{

 include '../modeles/classeAjout.php';
        $Ajouter1 = new Ajouter($nom="",$prenom="",$telephone="",$favori="");
        $Ajouter1->modifierContact($nom,$prenom,$telephone,$favori,$id_contact,$db);
    }

}
}   

 
?>