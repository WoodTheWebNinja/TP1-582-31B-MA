<?php
 include("../templates/header.php"); 
 require_once "../class/Crud.php";


$crud = new Crud;

$update = $crud->update("client", $_POST, "id", $_POST["id"]);

echo $update;
?>

<?php include("../templates/footer.php"); ?>