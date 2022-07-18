<?php

   class ModelEquipe extends CRUD{
       protected $table = 'equipe';
       protected $primaryKey = 'idEquipe';
       protected $joinKey = 'equipe.idEquipe'; 
       protected $fillable = ['nom_Equipe', 'ville_idville'];

   } 


   class ModelCoachEquipe extends CRUD{
    protected $table = 'coach';
    protected $primaryKey = 'coach_id';
    protected $joinKey = ' coach.Equipe_idEquipe';
    protected $fillable = ['nom', 'nom_famille', 'Equipe_idEquipe'];

    protected $table_equipe = 'equipe';
    protected $joinKey_equipe = 'equipe.idEquipe'; 
    protected $fillable_equipe = ['nom_Equipe', 'ville_idville'];



} 




class ModelJoueurEquipe extends CRUD{
    protected $table = 'joueur';
    protected $primaryKey = 'numero_Joeur';
    protected $joinKey = ' coach.Equipe_idEquipe';
    protected $fillable = ['nom', 'nom_famille', 'Equipe_idEquipe'];

    protected $table_equipe = 'equipe';
    protected $joinKey_equipe = 'equipe.idEquipe'; 
    protected $fillable_equipe = ['nom_Equipe', 'ville_idville'];



} 



class ModelVilleEquipe extends CRUD{
    protected $table = 'ville';
    protected $primaryKey = 'idville';
    protected $joinKey= 'ville.idville'; 

    protected $fillable = ['nom'];

    protected $table_equipe = 'equipe';
    protected $joinKey_equipe = 'equipe.ville_idville'; 
    protected $fillable_equipe = ['nom_Equipe', 'ville_idville'];



} 




?>