<?php
require_once "class/Crud.php";
include("./views/header.php"); 

$crud = new Crud;
$joueur = $crud-> selectJoueurparEquipe("joueur", "Equipe_idEquipe", $_GET["idEquipe"]);


?>


<table>

            <h2> Liste des joueurs par Equipes !  </h2>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Nom de famille</th>
            
           
        </tr>
    </thead>
    <tbody>
<?php
    foreach($joueur as $row){
?>
        <tr>
            <td><?php echo $row["nom"]; ?></td>
            <td><?php echo $row["nom_famille"]; ?></td>
           
            
           
        </tr>
<?php
    }
?>       
    </tbody>
</table>

</body>
<?php include("./views/footer.php"); ?>

</html>