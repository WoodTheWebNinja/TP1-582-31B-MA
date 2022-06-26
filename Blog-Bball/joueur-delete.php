<?php
require_once "class/Crud.php";


$crud = new Crud;

$delete = $crud->delete("joueur", $_POST["numero_Joeur"], "joueur-list.php");



?>