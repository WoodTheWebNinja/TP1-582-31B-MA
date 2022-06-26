<?php
 include("./views/header.php"); 

require_once "class/Crud.php";

$crud = new Crud;
$select = $crud->selectCoach("coach","equipe");

?>

<div class="table_wrapper">
<table class = "fl-table">

<h3> Cliquez sur une equipe  pour voir la liste des joueurs par equipe </h3>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Nom de famille</th>
            <th>Equipe</th>
           
        </tr>
    </thead>
    <tbody>
<?php
    foreach($select as $row){
?>
        <tr>
            <td><?php echo $row["nom"]; ?></td>
            <td><?php echo $row["nom_famille"]; ?></td>
            <td><a href="joueur-par-equipe.php?idEquipe=<?php echo $row["idEquipe"];?>"><?php echo $row["nom_Equipe"]; ?></a></td>
            
           
        </tr>
<?php
    }
?>       
    </tbody>
</table>
</div>
<?php include("./views/footer.php"); ?>

</body>
</html>