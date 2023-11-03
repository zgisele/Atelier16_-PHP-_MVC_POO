<?php
require('classeBase.php');
class Ajouter{
    private $nom;
    private $prenom;
    private $telephone;
    private $favori;
    
   
// -----------------------------------------------partie constructeur---------------------------------------------------------------------------
    public function __construct($nom,$prenom,$telephone,$favori){
        // parent::__construct($conn);
        $this->setnom($nom);
        $this->setprenom($prenom);
        $this->settelephone($telephone);
        $this->setfavori($favori);
    
       

    }
// ----------------------------------------------partie getter-------------------------------------------------------------------------
    public function getnom()
    {
      return $this->nom;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function gettelephone()
    {
        return  $this->telephone;
    }
    public function getfavori()
    {
        return  $this->favori;
    }
    
   
    // ------------------------------------partie setter------------------------------------------------------------------------
    public function setnom($nom)
    {
    
        if(!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ-]+$/",$nom)){

            echo "Le nom  doit contenir uniquement des lettres alphabétiques.";
        
        }else {

            $this->nom = $nom;
        }
    }

    public function setprenom($prenom){

        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ-]+$/", $prenom)) {

            echo "Le  prénom doit contenir uniquement des lettres alphabétiques.";
        
        }else {
            $this->prenom = $prenom;
        }
        
    }
    public function settelephone($telephone){

        if(!preg_match("/^7[0-9]{8}$/", $telephone)){

            echo "le numero de telephone n'est pas valide.";

        }else {

            $this->telephone = $telephone;
        }
    }

      public function setfavori($favori){

        if( $favori!= 0 and $favori!= 1 ){

            echo "le favorie  prendre 1 ou 0";

        }else {

            $this->favori = $favori;
        }


    }
    // ---------------------les fonctions particulier----------------------------
    // ---------------------les fonctions ajout de contact----------------------------

    public function Ajout($db){

        $sqlQuery ="INSERT INTO `contacts` (nom,prenom,telephone,favori) VALUES ('".$this->nom."','".$this->prenom."','".$this->telephone."','".$this->favori."')";

                $reponse = $db->exec($sqlQuery);//execution de la requete

                // $this->conn
                if ($reponse==0) {
                    echo 'Rien n\'est insérer' ;// Le resultat si l'execution n'a pas fonctionner
                }else{

                    echo'<h2> Ajout confirmer </h2><br>'.$this->prenom.'  '.$this->nom;// Le resultat si l'execution a pas fonctionner
                    echo'<a href="../view/formulaire.php">Page ajout contact</a>';

                
                }

    }
    // ---------------------lfonction suppression contact----------------------------
    public function SuppressionContact($id_contact,$db){
        try{
          $stmt = $db->prepare("DELETE FROM `contacts` WHERE id_contact = :id_contact");
          // Liaison des paramètres
          $stmt->bindParam(':id_contact',$id_contact , PDO::PARAM_INT);
  
          // Exécution de la requête
          $stmt->execute();

          // Vérification du succès de la suppression
          if ($stmt->rowCount() > 0) {

            echo'Données supprimées avec succès.';
            echo'<a href="../view/formulaire.php">Page ajout contact</a>';

            return "Données supprimées avec succès.";

            

        } else {
            return "Aucune donnée n'a été supprimée.";
        }
  
        
      }catch (PDOException $e) {
        return "Erreur de suppression : " . $e->getMessage();
    }

}
// ---------------------Fonction de mis à jour ----------------------------
public function modifierContact($nom,$prenom,$telephone,$favori,$id_contact,$db){
    try {
        // Connexion à la base de données
       
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête de mise à jour
        $sql = "UPDATE contacts SET nom = ?, Prenom = ?,telephone = ?, favori = ? WHERE id_contact = ?";
        // ou encore
        // $sql = "UPDATE contacts SET nom =:nom, Prenom =:prenom,telephone =:telephone, favori = :favori, WHERE id_contact = :id_contact";
        $stmt = $db->prepare($sql);


        // var_dump($id_contact);
        // var_dump($nom);
        // var_dump($prenom);
        // var_dump($telephone);
        // var_dump($favori);


        // Liaison des paramètres
        $stmt->bindParam(1, $nom, PDO::PARAM_STR);
        $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
        $stmt->bindParam(3, $telephone, PDO::PARAM_STR);
        $stmt->bindParam(4, $favori,PDO::PARAM_BOOL);
        $stmt->bindParam(5,$id_contact, PDO::PARAM_INT);
    

        // $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        // $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        // $stmt->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        // $stmt->bindParam(':favori', $favori,PDO::PARAM_BOOL);
        // $stmt->bindParam(':id_contact',$id_contact, PDO::PARAM_INT);
        // echo ' ou encore';
        // Exécution de la requête
       if( $stmt->execute()){

        echo'Contact mis à jour avec succès..';
        echo'<a href="../view/formulaire.php">Page ajout contact</a>';

       }
        

        return "Contact mis à jour avec succès.";

       
}catch (PDOException $e) {

    return "Erreur de mise à jour : " . $e->getMessage();
}
}
}

 

// $Ajouter1 = new Ajouter("Florant","ZOUNDETE",776547557);
// $Ajouter1->Ajout($db);

