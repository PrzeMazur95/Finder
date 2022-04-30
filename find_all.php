<?php require_once("includes/header.php") ?>

<?php

  $regal = new pieceView();

  $results = $regal->Show_all();


?>

<div id="container-result">
<?php echo session::get("delete"); ?></p>
<?php echo session::unset("delete"); ?></p>
<h2>Wyszystkie Kawałki</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Sku</th>
        <th scope="col">Ilość</th>
        <th scope="col">Regał</th>
        <th scope="col">Data</th>
        <th scope="col">Opcje</th>
      </tr>
    </thead>
    <tbody>

    <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) : ?>

      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['sku']; ?></td>
        <td><?php echo $row['ilosc']; ?></td>
        <td><?php echo $row['nrregalu']; ?></td>
        <td><?php echo $row['data']; ?></td>

        <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edytuj</a>
        <a href="delete.php?id=<?php echo $row['id']; ?>&page=all" class="btn btn-danger btn-sm">Usuń</a>
        </td>
        
      </tr>

    <?php endwhile; ?>

    </tbody>
  </table>
</div>
  
