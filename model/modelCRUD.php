<?php

abstract class CRUD extends PDO{
    public function __construct(){
        parent ::__construct("mysql:host=localhost;dbname=basketball", "root", "");
    }
/*    
public function __construct(){
    parent ::__construct("mysql:host=localhost;dbname=e2194801", "e2194801", "aYoyx9Dsc5cDDxq175rC");
}

*/

public function insert($table,$data){

    $nomChamp = implode(", ",array_keys($data));
    $valeurChamp = ":".implode(", :", array_keys($data));


    $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";


    $query = $this ->prepare($sql);
    foreach($data as $key=> $value){
        $query -> bindValue(":$key",$value); 
    }
    if(!$query->exucte()){
        return $query-> errorInfo();
    }else {
        return $this-> LastInsertID();
    }

}


public function select($table, $champOrdre = null, $ordre = null){
    if($champOrdre == null){
        $sql= "SELECT * FROM $table";
    }else{
        $sql = "SELECT * FROM $table ORDER BY $champOrdre $ordre";
    }
    $query = $this->query($sql);
    return $query->fetchAll();
}




// Select Coach et afficher le nom de son equipe 
public function selectCoach($table, $table2,$champOrdre = null, $ordre = null){
    if($champOrdre == null){
        $sql= "SELECT coach.nom, coach.nom_famille,equipe.nom_Equipe,equipe.idEquipe 
        FROM coach
        JOIN equipe ON equipe.idEquipe = coach.Equipe_idEquipe";
    }else{
        $sql = "SELECT coach.nom, coach.nom_famille,equipe.nom_Equipe
        FROM coach
        JOIN equipe ON equipe.idEquipe = coach.Equipe_idEquipe ORDER BY $champOrdre $ordre";
    }
    $query = $this->query($sql);
    return $query->fetchAll();
}


// Select Team et afficher les  noms  des villes 
public function selectTeams($table, $table2,$champOrdre = null, $ordre = null){
    if($champOrdre == null){
        $sql= "SELECT $table.nom_Equipe,$table2.nom AS ville, $table2.idville,equipe.idEquipe 
        FROM  $table2
        JOIN $table ON equipe.ville_idville = ville.idville";
    }else{
        $sql = "SELECT equipe.nom_Equipe, ville.nom AS ville, ville.idville
        FROM ville
        JOIN equipe ON equipe.ville_idville = ville.idville ORDER BY $champOrdre $ordre";
    }
    $query = $this->query($sql);
    return $query->fetchAll();
}




// Select Jouer par Equipe 

public function selectJoueurparEquipe($table, $champ, $idEquipe){
    $sql = "SELECT * FROM $table WHERE $champ = :$champ";
    $query = $this->prepare($sql);
    $query->bindValue(":$champ", $idEquipe);
    $query->execute();
    return $query->fetchAll();
}


public function selectId($table, $champ, $id){
    $sql = "SELECT * FROM $table WHERE $champ = :$champ";
    $query = $this->prepare($sql);
    $query->bindValue(":$champ", $id);
    $query->execute();
    return $query->fetch();
}

public function update($table, $data, $champ, $id){
    $champRequete = null;
    foreach($data as $key=>$value){
        $champRequete .=$key."=:".$key.", ";
    }
    $champRequete = rtrim($champRequete, ", ");
    $sql = "UPDATE $table SET $champRequete WHERE $champ = :$champ";

    $query= $this->prepare($sql);
    foreach($data as $key=>$value){
        $query->bindValue(":$key", $value);
    }
    if(!$query->execute()){
        print_r($query->errorInfo());
    }else{
        // retourner sur la page liste des joueurs
        $location = header("Location: joueur-list.php");
        return $location;
    }
}

public function delete($table, $id, $url){
    var_dump($id);
    $sql = "DELETE FROM $table WHERE numero_Joeur = :id";
    $query = $this->prepare($sql);
    $query->bindValue(":id", $id);
    if(!$query->execute()){
        print_r($query->errorInfo());
    }else{
        header("Location: $url");
    }
}


public function add($table, $data){
    $value =implode(" ",$data);
    $champRequete = "'$value'" ;
    $champRequete = rtrim($champRequete, ", ");

    var_dump($champRequete) ;
    $sql = " INSERT INTO $table (`nom`) VALUES ($champRequete)";
    $query= $this->prepare($sql);

    if(!$query->execute()){
        print_r($query->errorInfo());
    }else{
        // retourner sur la page liste des joueurs
        $location = header("Location:index.php");
        return $location;
    }
}


}   