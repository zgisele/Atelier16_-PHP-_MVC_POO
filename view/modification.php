<?php
if (isset ($_POST['modifier'])){
    $id = (int)$_POST['modifier'];
        include '../modeles/classeAjout.php';
        // include '../modeles/classeBase.php';
        $sql = "SELECT * FROM `contacts`where id_contact = $id";

        $stm = $db->query($sql);
        $utilisateur = $stm->fetch(PDO::FETCH_ASSOC);
  

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Renseignement_contacts </title>
</head>
<body>
        <div class="formModi">
           <h1>Ajouter un contact</h1>
            <form action="../controllers/modifier.php" method="POST">
                <div class="entre3">
                    <input type="hidden" name="id_contact" value="<?= $utilisateur['id_contact']?>">
                    <label for="nom">Nom :</label><br>
                    <input type="text" name="nom" required class="entre2" value="<?= $utilisateur['nom']?>"><br>

                    <label for="prenom">Prénom :</label><br>
                    <input type="text" name="prenom" required class="entre2" value="<?= $utilisateur['Prenom']?>"><br>

                    <label for="telephone">Telephone :</label><br>
                    <input type="text" name="telephone" required class="entre2"  value="<?= $utilisateur['telephone']?>"><br>

                    <label for="favori"> Favori :</label><br>
                    <select name="favori" required class="entre2" value="<?= $utilisateur['favori']?>">
                        <option value="0">non</option>
                        <option value="1">oui</option>
                    </select>
                    <!-- <input type="number" name="favori"  min="0" max="1"><br> -->
                </div>
                <div class="boutton4">
                   
                    <input type="submit" value="Ajouter" name="ajouter" class="B3">
                </div>
            </form>
        </div>
</body>
</html>
 