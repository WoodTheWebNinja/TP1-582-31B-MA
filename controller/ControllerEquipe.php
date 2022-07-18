<?php

require_once "./library/RequirePage.php";
require_once "./model/ModelCRUD.php";
require_once "./model/ModelVille.php";
require_once "./model/ModelEquipe.php";
require_once "./model/ModelJoueur.php";

require_once "./library/Validation.php";

class ControllerEquipe{

    public function index(){
     
      $equipeVille = new ModelVilleEquipe;
      $select = $equipeVille->selectTeams();
      $villes = new ModelVille;
      $selectvilles = $villes->select();
    
      return Twig::render('team-list.php', ['equipe' => $select, 'ville' => $selectvilles]);

    }

    public function list(){
        
        $equipeVille = new ModelVilleEquipe;
        $select = $equipeVille->selectTeams();

        $villes = new ModelVille;
        $selectvilles = $villes->select();

        return Twig::render('team-list.php', ['equipe' => $select, 'ville' => $selectvilles]);
    }

    public function create(){
      $villes = new ModelVille;
      $villes = $villes->select('nom');
      return Twig::render('ajouter-ville.php', ['ville'=> $villes]);
    }

    public function store(){
      $validation = new Validation;
      var_dump($_POST);
      

      extract($_POST);
      $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
      
      //print_r($_POST);
      if($validation->isSuccess()){
        $villes = new ModelVille;
        $insert = $villes->insert($_POST);
        $location = header("Location: ./sucess");
        return $location;
      }else{
       // var_dump($validation->getErrors());
         $errors =  $validation->displayErrors();
         $equipe = new ModelEquipe;
         $equipe = $equipe->select('nom_Equipe');
        return Twig::render('ajouter-ville.php', ['errors' => $errors, 'ville' => $_POST]);
      }
    }


    public function sucess(){

      $_SESSION['fini'] ='done';
      return Twig::render('fini.php', ['message' => 'Bravo, vous aveez bien rajouter une ville ',                                     
                                            ]);
    

    }


    public function show($value){
      $equipe = new ModelEquipe;
      $selectId = $equipe->selectId($value);
      $nomEquipe =  $selectId['nom_Equipe']; 


      $joueur = new ModelJoueur;
      $selectJoueur =$joueur->selectId($value);
     

     return Twig::render('joueur-par-equipe.php', ['players' =>   $selectJoueur,
     'name ' =>   $nomEquipe]);
    
    }

}
