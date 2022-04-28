<?php require_once("includes/header.php") ?>

<?php

    if(isset($_GET['id'])){

    $piece = new pieceView();

    $choosen_piece = $piece->Find_by_id($_GET['id']);

    }


    if(isset($_POST['edit'])){


        $edited_piece = new pieceController();
    
        $edited_piece->id=$choosen_piece->id;
        $edited_piece->sku=$_POST['sku'];
        $edited_piece->ilosc=$_POST['ilosc'];
        $edited_piece->nrregalu=$_POST['nrregalu'];

        $edited_piece->update();
    
        header("Location: edit.php?id=".$choosen_piece->id."");
        
    }



?>

<div id="container">
    <?php echo session::get("find_by_id"); ?>
	<?php session::unset("find_by_id"); ?>
    <form action="" method="post">
        <p>Edytuj wybrany kawałek o id : <?php echo $choosen_piece->id;?></p>
        <p>Poniej wyświetlone są jego aktualne dane</p>
        <hr>
        <div class="form-group">
            <input class="form-control" id="sku" name="sku" value="<?php $choosen_piece->sku;?>" placeholder="SKU : <?php echo $choosen_piece->sku;?>">
        </div>
        <div class="form-group">
            <input class="form-control" id="ilosc" name="ilosc" value="<?php $choosen_piece->ilosc;?>" placeholder="Ilość : <?php echo $choosen_piece->ilosc;?>">
        </div>
        <div class="form-group">
            <input class="form-control" id="nrregalu" name="nrregalu" value="<?php $choosen_piece->nrregalu;?>" placeholder="Nr. Regału : <?php echo $choosen_piece->nrregalu;?>">
        </div>
        <button type="submit" name="edit" class="btn btn-primary">Edytuj</button>

        <div class="opcje">
                    
            <a href="index.php">Powrót do menu głównego</a>
                             
        </div>
    </form>

</div>