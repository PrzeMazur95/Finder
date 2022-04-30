<?php require_once("includes/header.php") ?>

<?php

    if(isset($_POST['tableName'])){

        $table = $_POST['tableName'];

    } else {

        session::set("truncate", "Nie wybrano tabeli do wyczyszczenia!");
        header("location: index.php");

    }

?>



