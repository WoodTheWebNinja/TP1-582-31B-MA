<?php

class ControllerHome{

    public function index(){
       return Twig::render('home-index.php', ['nom' => 'Wood',
                                              'prenom' => 'Boursiquot'
                                            ]);
    }

    public function error(){
        return Twig::render('error.php');
    }
}