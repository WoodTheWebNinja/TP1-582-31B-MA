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




public function select($champOrdre = null, $ordre = null){
    if($champOrdre == null){
        $sql= "SELECT * FROM $this->table";
    }else{
        $sql = "SELECT * FROM $this->table ORDER BY $champOrdre $ordre";
    }
    $query = $this->query($sql);
    return $query->fetchAll();
}

// Select Coach et afficher le nom de son equipe 
public function selectCoach($champOrdre = null, $ordre = null){
    if($champOrdre == null){
        $sql= "SELECT * 
        FROM $this->table
        JOIN $this->table_equipe 
        ON  $this->joinKey  =  $this->joinKey_equipe
        ";
    }else{
        $sql = "SELECT * 
        FROM $this->table
        JOIN $this->table_equipe  ON  $this->joinKey  =  $this->joinKey_equipe
        ORDER BY $champOrdre $ordre";
    }
    $query = $this->query($sql);
    return $query->fetchAll();
}



// Select Coach et afficher le nom de son equipe 
public function selectTeams($champOrdre = null, $ordre = null){
    if($champOrdre == null){
        $sql= "SELECT * 
        FROM $this->table_equipe 
        JOIN $this->table
        ON  $this->joinKey_equipe =  $this->joinKey 
        ";
    }else{
        $sql = "SELECT * 
       FROM $this->$table_equipe
        JOIN $this->table
        ON  $this->joinKey_equipe =  $this->joinKey 
        ORDER BY $champOrdre $ordre";
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


public function selectId($id){
    $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
    $query = $this->prepare($sql);
    $query->bindValue(":$this->primaryKey", $id);
    $query->execute();
    return $query->fetch();
}







public function update( $champ, $id){
    $champRequete = null;
    foreach($data as $key=>$value){
        $champRequete .=$key."=:".$key.", ";
    }
    $champRequete = rtrim($champRequete, ", ");
    $sql = "UPDATE $this-> table SET $champRequete WHERE $this->primarkey = : $this->primarkey";
    return $sql ; // Ajouter wb 

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

public function delete( $id, $url){
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

public function insert($data){

    $data_keys = array_fill_keys($this->fillable, '');
    $data_map = array_intersect_key($data, $data_keys);
    //return($data_map);
    $nomChamp = implode(", ",array_keys($data_map));
    $valeurChamp = ":".implode(", :", array_keys($data_map));

    $sql ="INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
   // return $sql;
    
    $query = $this->prepare($sql);
    foreach($data_map as $key=>$value){
        $query->bindValue(":$key", $value);
    }
    if(!$query->execute()){
        return $query->errorInfo();
    }else{
        return $this->lastInsertId();
    }
}


/*
public function update( $champ, $id){
    $champRequete = null;
    foreach($data as $key=>$value){
        $champRequete .=$key."=:".$key.", ";
    }
    $champRequete = rtrim($champRequete, ", ");
    $sql = "UPDATE $this-> table SET $champRequete WHERE $this->primarkey = : $this->primarkey";

    return $sql ; 

    $query= $this->prepare($sql);
    foreach($data as $key=>$value){
        $query->bindValue(":$key", $value);
    }
    if(!$query->execute()){
        print_r($query->errorInfo());
    }else{
        return $id;
    }
}
*/







}   