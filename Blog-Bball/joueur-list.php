<?php
 include("./views/header.php"); 
require_once "class/Crud.php";
$crud = new Crud;
$select = $crud->select(" joueur");

?>



<table>
    <h3> Cliquez sur un nom pour modifier ou effacer un joueur </h3>
    <thead>
        <tr>
            <th>Nom</th>
            <th>nom de famille</th>
           
        </tr>
    </thead>
    <tbody>
<?php
    foreach($select as $row){
?>
        <tr>
        <td><a href="joueur-edit.php?id=<?php echo $row["numero_Joeur"];?>"><?php echo $row["nom"]; ?></a></td>
        <td><a href="joueur-edit.php?id=<?php echo $row["numero_Joeur"];?>"><?php echo $row["nom_famille"]; ?></a></td>
          
           
        </tr>
<?php
    }
?>       
    </tbody>
</table>
<?php include("./views/footer.php"); ?>

</body>
</html>