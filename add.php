<?php require_once("includes/header.php") ?>

<?php

    if(isset($_POST['Add'])){


        if(empty($_POST['sku'] || $_POST['ilosc'] || $_POST['nrregalu'])){

            session::set('empty_inputs', "Któreś z pól jest puste!");

        } else {

            $sku=$_POST['sku'];
            $ilosc=$_POST['ilosc'];
            $nrregalu=$_POST['nrregalu'];


                $kawalek = new pieceController();
                $kawalek->sku = $sku;
                $kawalek->ilosc = $ilosc;
                $kawalek->nrregalu = $nrregalu;


                $kawalek->Add();

                session::set('empty_inputs', "Kawałek dodany poprawnie!");

        }

    }



?>

<div id="container">
    <form action="" method="post">
        <p> <?php echo session::get('empty_inputs')  ?></p>
        <?php session::unset('empty_inputs')  ?>
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