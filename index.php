<?php require_once("includes/header.php"); ?>

<!-- Body -->
<div id="container">
<?php echo session::get("truncate"); ?></p>
<?php echo session::unset("truncate"); ?></p>
<p>SPRAWDZANIE NAKLEJEK Z REGAŁAMI </p>
<hr>
	<div class="opcje">
		<form action="truncate.php" method="post">
				<p>Wybierz tabelę do wyczyszczenia</p>
					<select name="tableName">
						<option value="naklejki">Naklejki</option>
						<option value="regal">Regał</option>
					</select>
				<button type="submit" name="submit" onclick="return confirm('Jesteś pewny wyczyszczenia tej tabeli?')">Wyczyść</button>
		</form>
	</div>
    <div class="opcje">
		<a href="add.php">Dodaj nowe kawałki</a>
	</div>
	<div class="opcje">
		<a href="import.php">Importuj naklejki</a>
	</div>
	<div class="opcje">
		<a href="find_specific.php">Sprawdź kawałki produkcyjne</a>
	</div>
	<div class="opcje">
		<a href="find_all.php">Sprawdź wszystkie kawałki</a>
	</div>		
</div>

<!-- footer -->
<?php require_once("includes/footer.php"); ?>
