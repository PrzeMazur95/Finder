<?php require_once("includes/header.php") ?>

<?php

    if(isset($_GET['id'])){

        if(pieceController::Delete($_GET['id'])){

            session::set("delete", "Kawałek o id " .$_GET['id']. " usunięty pomyślnie !");

            if($_GET['page']=="specific"){

                header("location: find_specific.php");

            } elseif ($_GET['page']=="all") {

                header("location: find_all.php");

            }

        } else {

            session::set("delete", "Coś poszło nie tak !");
            header("location: find_all.php");

        }
        
    } else {

        session::set("delete", "Nie wybrałeś numeru kawałka do usunięcia !");
        header("location: find_all.php");

    }

?>
