<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Renseignement_contacts </title>
</head>
<body>
    <div class="bloc">
        <div class="formulaire">
           <h1>Ajouter un contact</h1>
            <form action="../controllers/ajouter.php" method="POST">
                <div class="entre">
                    <label for="nom">Nom :</label><br>
                    <input type="text" name="nom" required class="entre1"><br>

                    <label for="prenom">Prénom :</label><br>
                    <input type="text" name="prenom" required class="entre1"><br>

                    <label for="telephone">Telephone :</label><br>
                    <input type="text" name="telephone" required class="entre1"><br>

                    <label for="favori"> Favori :</label><br>
                    <select name="favori" required class="entre1">
                        <option value="0">non</option>
                        <option value="1">oui</option>
                    </select>
                    <!-- <input type="number" name="favori"  min="0" max="1"><br> -->
                </div>
                <div class="boutton">
                    <input type="submit" value="Ajouter" name="ajouter" class="B1">
                    <!-- <input type="submit" value="Modifier" name="modifier" class="B2">
                    <input type="submit" value="Supprimer" name="supprimer" class="B3"> -->
                </div>
            </form>
        </div>

        <?php
            include '../modeles/classeAjout.php';
            $sql = "SELECT * FROM `contacts`";
            $stm = $db->query($sql);
            $utilisateurs = $stm->fetchAll(PDO::FETCH_ASSOC);
           
        ?>
        
        <div class="tableau">
                <h1>Liste des utilisateurs</h1>
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Favori</th>
                        <th>Actions</th>
                        
                        
                    </tr> 
                    <?php foreach ($utilisateurs as $utilisateur): ?>   
                    <tr>
                        <td><?php echo $utilisateur['nom']; ?></td>
                        <td><?php echo $utilisateur['Prenom']; ?></td>
                        <td><?php echo $utilisateur['telephone']; ?></td>
                        <td><?php echo $utilisateur['favori']; ?></td>
                        <td>
                        <div class="boutton1">

                           <form action="../view/modification.php" method="POST">
                                <button name="modifier" class="B2" value="<?= $utilisateur['id_contact']; ?>" >Modifier</button>    
                            </form> 
                              <!--supprimer -->
                            <form action="../controllers/supprimer.php" method="POST">
                                <button name="supprimer" class="B3" value="<?= $utilisateur['id_contact']; ?>" >Supprimer</button>
                            </form> 
                        </div>
                        </td>
                       
                    </tr>
                    <?php endforeach;?> 
                </table>
            </div>
          
    </div>
</body>
</html>