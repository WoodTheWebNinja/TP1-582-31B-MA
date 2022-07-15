<?php
require_once "./class/Crud.php";
 include("../templates/header.php"); 

?>

<h2>Client</h1>
    <form action="ville-ajouter.php" method="post">
    <label for="name">Nom de la ville </label>
    <input type="text" id="nom" name="nom" maxlenght="30" value="Ajouter la ville ">
 

    <input type="submit">
    </form>
    <hr>


</body>



<?php include("../templates/footer.php"); ?>
</html>