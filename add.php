<?php require_once("includes/header.php") ?>

<?php

    if(isset($_POST['Add'])){

    $sku=$_POST['sku'];
    $ilosc=$_POST['ilosc'];
    $nrregalu=$_POST['nrregalu'];

    $kawalek = new pieceController($sku, $ilosc, $nrregalu);

    $kawalek->Add();

    }



?>

<div id="container">
    <form action="" method="post">
        <p>Dodaj nowy kawałek do Bazy</p>
        <hr>
        <div class="form-group">
            <input class="form-control" id="sku" name="sku" placeholder="Wpisz sku produktu">
        </div>
        <div class="form-group">
            <input class="form-control" id="ilosc" name="ilosc" placeholder="Wpisz ilość">
        </div>
        <div class="form-group">
            <input class="form-control" id="nrregalu" name="nrregalu" placeholder="Wpisz nr. regału">
        </div>
        <button type="submit" name="Add" class="btn btn-primary">Dodaj</button>

        <div class="opcje">
                    
            <a href="index.php">Powrót do menu głównego</a>
                             
        </div>
    </form>

</div>