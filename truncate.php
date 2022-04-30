<?php require_once("includes/header.php") ?>

<?php

    if(isset($_POST['tableName'])){

        $table = $_POST['tableName'];

        if(pieceController::Truncate($table)){

            session::set("truncate", "Tabela ".$_POST['tableName']." została pomyślnie wyczyszczona !");
            header("location: index.php");

        } else {

            session::set("truncate", "Nie udało się wyczyścić tabeli!");
            header("location: index.php");

        } 

    } else {

        session::set("truncate", "Nie wybrano tabeli do wyczyszczenia!");
        header("location: index.php");

    }
        
?>



