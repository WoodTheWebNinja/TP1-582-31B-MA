<?php

   class ModelVille extends CRUD{
       protected $table = 'ville';
       protected $primaryKey = 'idville';
       protected $fillable = ['nom'];

   } 

?>