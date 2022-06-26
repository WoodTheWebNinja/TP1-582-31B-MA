<?php
include("./views/header.php"); 
require_once "class/Crud.php";

$crudJoueur = new Crud;
$joueur = $crudJoueur->selectId("joueur", "numero_Joeur", $_GET["id"]);

foreach($joueur as $key=>$value){
    $$key = $value;
}
?>

<h1>Fiche Joueur</h1>
    <form action="joueur-edit-post.php" method="post">
    <input type="hidden" value="<?php echo $numero_Joeur; ?>" name="numero_Joeur">
    <label for="name">Nom</label>
    <input type="text" id="name" name="nom" maxlenght="30" value="<?php echo $nom; ?>">
    <label for="add">Nom de famille</label>
    <input type="text"  id="nom_famille" name="nom_famille" maxlenght="45" value="<?php echo $nom_famille; ?>">

    <input type="submit">
    </form>
    <hr>
    <form action="joueur-delete.php" method="post">
    <input type="hidden" value="<?php echo $numero_Joeur; ?>"  name="numero_Joeur">
    <input type="submit" value="Delete">
    </form>


    <?php include("./views/footer.php"); ?>

</body>

</html>