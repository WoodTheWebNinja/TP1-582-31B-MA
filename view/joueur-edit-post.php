<?php
 include("../templates/header.php"); 
 require_once "../class/Crud.php";


$crud = new Crud;

$update = $crud->update("joueur", $_POST, "numero_Joeur", $_POST["numero_Joeur"]);

echo $update;
?>


<?php include("../templates/footer.php"); ?>
