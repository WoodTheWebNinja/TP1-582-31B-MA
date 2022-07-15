<?php
require_once "../class/Crud.php";

include("../templates/header.php"); 

$crud = new Crud;
$joueur = $crud-> selectJoueurparEquipe("joueur", "Equipe_idEquipe", $_GET["idEquipe"]);


?>

<div class="table_wrapper">
<table class = "fl-table">

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
</div>
</body>
<?php include("../templates/footer.php"); ?>

</html>