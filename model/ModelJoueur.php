<?php

   class ModelJoueur extends CRUD{
       protected $table = 'joueur';
       protected $primaryKey = 'numero_Joeur';

       protected $fillable = ['nom', 'nom_famille', 'Equipe_idEquipe'];

   } 


?>