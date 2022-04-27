<?php require_once("includes/header.php") ?>

<?php

if(isset($_POST['submit'])){

	$file=fopen($_FILES["naklejki"]["tmp_name"], "r");

	if($file===false){

		echo "Błąd przy wczytywaniu pliku CSV";
		exit();

	}

	$import = pieceController::Import($file);
	fclose($file);

}

?>

<div id="container">

	<h5>Zaimportuj dzisiejszy plik produkcyjny w formacie CSV</h5>
	<hr>
			

	<form class="form-group" action="" method="post" enctype="multipart/form-data">

		<input type="file" name="naklejki" accept=".csv" required/>
		<input type="submit" value="Importuj" name="submit">

	</form>
	<hr>

	<a href="index.php">Powrót do menu głównego</a>
					
</div>