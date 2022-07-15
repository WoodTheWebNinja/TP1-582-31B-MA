<?php
require_once "../class/Crud.php";


$crud = new Crud;

var_dump($_POST) ;
$add = $crud->add("ville", $_POST);


echo $add;
?> 