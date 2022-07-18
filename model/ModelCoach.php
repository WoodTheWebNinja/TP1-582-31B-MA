<?php

   class ModelCoach extends CRUD{
       protected $table = 'coach';
       protected $primaryKey = 'coach_id';
       protected $joinKey = ' coach.Equipe_idEquipe';

       protected $fillable = ['nom', 'nom_famille', 'Equipe_idEquipe'];

   } 


?>