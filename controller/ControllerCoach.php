<?php

require_once "./library/RequirePage.php";
require_once "./model/ModelCRUD.php";
require_once "./model/ModelCoach.php";
require_once "./model/ModelEquipe.php";
require_once "./library/Validation.php";




class ControllerCoach{

    public function index(){
      $coach = new ModelCoach;
      $select = $coach->select();
      //var_dump( $select) ;
      return Twig::render('coach-index.php', ['coachs' => $select]);

     function error(){
        return Twig::render('error.php');
    }

    }
    // Listes des coachs par Équipes 
    public function list(){
      $coachParEquipe = new ModelCoachEquipe;
      $SelectcoachParEquipe =  $coachParEquipe ->selectCoach();
      
     return Twig::render('coach-list.php', ['coachs' =>  $SelectcoachParEquipe ]);

     function error(){
        return Twig::render('error.php');
      }
    }

    public function create(){
      $equipe = new ModelEquipe;
      $equipe = $equipe->select('nom_Equipe');
      return Twig::render('coach-insert.php', ['equipe'=> $equipe]);
    }
    public function store(){
      $validation = new Validation;
      //Array ( [nom] => Peter [adresse] => abc [phone] => 544878 [ville_id] => 1 [pays] => Canada ) 

     var_dump($_POST);
      

      extract($_POST);
      $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
      $validation->name('nom_famille')->value($nomFamille)->pattern('alpha')->required()->max(45);
      $validation->name('Equipe_idEquipe')->value($equipe_id)->pattern('int')->required();
      
      //print_r($_POST);
      if($validation->isSuccess()){
        $coach = new ModelCoach;
        $insert = $coach->insert($_POST);
        RequirePage::redirect('../coach/list');   
      }else{
       // var_dump($validation->getErrors());
         $errors =  $validation->displayErrors();
         $equipe = new ModelEquipe;
         $equipe = $equipe->select('nom_Equipe');
        return Twig::render('coach-insert.php', ['errors' => $errors, 'equipe'=> $villes, 'coach' => $_POST]);
      }
    }

    public function show($value){
      $coach = new ModelCoach;
      $selectId = $coach->selectId($value);

      // echo $selectId['ville_id'];
      $equipe = new ModelEquipe;
      $selectequipe = $ville->selectId($selectId['idEquipe']);
      $coachEquipe = $selectEquipe['nom_Equipe'];
      
     return Twig::render('coach-show.php', ['coach' => $selectId, 'equipe' => $coachEquipe]);
    
    }

    public function edit($value){
      $coach = new ModelCoach;
      $selectId = $coach->selectId($value);

      $equipe = new ModelEquipe;
      $equipe = $equipe->select('nom_Equipe');

      return Twig::render('coach-edit.php', ['coach' => $selectId, 'villes' => $equipe]);

    }

}