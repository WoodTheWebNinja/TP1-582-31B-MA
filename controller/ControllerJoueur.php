<?php
require_once "./library/RequirePage.php";
require_once "./model/ModelCRUD.php";
require_once "./model/Modeljoueur.php";
require_once "./model/ModelEquipe.php";
require_once "./library/Validation.php";




class ControllerJoueur{

  public function index(){
    $joueurParEquipe = new ModelJoueur;
    $Selectjoueur =  $joueurParEquipe ->select();

    return Twig::render('joueur-list.php', ['joueurs' =>   $Selectjoueur ]);

   function error(){
      return Twig::render('error.php');
  }

  }
  // Listes des joueurs par Équipes 
  public function list(){
  
    $joueurParEquipe = new ModelJoueur;
    $Selectjoueur =  $joueurParEquipe ->select();

    return Twig::render('joueur-list.php', ['joueurs' =>   $Selectjoueur ]);


   function error(){
      return Twig::render('error.php');
    }
  }

  public function create(){
    $equipe = new ModelEquipe;
    $equipe = $equipe->select('nom_Equipe');
    return Twig::render('joueur-insert.php', ['equipe'=> $equipe]);
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
      $joueur = new Modeljoueur;
      $insert = $joueur->insert($_POST);
      RequirePage::redirect('../joueur/list');   
    }else{
     // var_dump($validation->getErrors());
       $errors =  $validation->displayErrors();
       $equipe = new ModelEquipe;
       $equipe = $equipe->select('nom_Equipe');
      return Twig::render('joueur-insert.php', ['errors' => $errors, 'equipe'=> $villes, 'joueur' => $_POST]);
    }
  }

  public function show($value){
    $joueur = new Modeljoueur;
    $selectId = $joueur->selectId($value);

    // echo $selectId['ville_id'];
    $equipe = new ModelEquipe;
    $selectequipe = $ville->selectId($selectId['idEquipe']);
    $joueurEquipe = $selectEquipe['nom_Equipe'];
    
   return Twig::render('joueur-show.php', ['joueur' => $selectId, 'equipe' => $joueurEquipe]);
  
  }

  public function edit($value){
    $joueur = new ModelJoueur;
    $Selectjoueur =  $joueur ->select();
    $selectId = $joueur->selectId($value);
    

    return Twig::render('joueur-edit.php', ['joueurs' =>   $Selectjoueur , 'jouerId' =>  $selectId  ]);

  }

}