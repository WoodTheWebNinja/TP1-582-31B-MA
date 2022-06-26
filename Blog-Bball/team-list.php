<?php
 include("./views/header.php"); 
require_once "class/Crud.php";
$crud = new Crud;
$crudVille = new Crud;
$select = $crud->selectTeams("equipe","ville");
$selectVille = $crudVille->select("ville");


// Tableau liste villes et leur équipe de Basket-bal 
?>
<div class="table_wrapper">
<table class = "fl-table">
    <thead>
        <tr>
            <th>Nom Equipe </th>
            <th>Nom ville </th>
          
           
        </tr>
    </thead>
    <tbody>
<?php
    foreach($select as $row){
?>
        <tr>
        <td><a href="joueur-par-equipe.php?idEquipe=<?php echo $row["idEquipe"];?>"><?php echo $row["nom_Equipe"]; ?></a></td>
        <td><?php echo $row["ville"]; ?></td>


        </tr>

<?php
    }
 echo "</tbody>" ;
 echo "</table>" ;
 echo "</div>" ;
 
// Tableau liste de villes 
?>
       
  <div class="table_wrapper">
    
  <table class = "fl-table">
    <thead>
        <tr>
      
            <th>Listes des ville </th>
          
           
        </tr>
    </thead>
    <tbody>
<?php
    foreach($selectVille as $row){
?>
        <tr>
        <td><?php echo $row["nom"]; ?></td>
        </tr>

<?php
    }
 echo "</tbody>" ;
 echo "</table>" ;
 echo "</div>" ;

?>       



<div class="button_wrapper"> 
  <a href="ajouter-ville.php " class="buttoncta" >  Ajouter des Villes  </a> 

  </div>


</body>
<?php include("./views/footer.php"); ?>
</html>