<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="car.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Main</title>
</head>
<body class="bg-light">
<?php include("navbar.html") ?>
<main class="container pt-5">

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#pridatKuryra">
        Přidat produkt
    </button>

    <div class="modal fade" id="pridatKuryra" tabindex="-1" aria-labelledby="pridatKuryraLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pridatKuryraLabel">Přidat produkt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="produkt_script.php">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nazevInput" name="nazev" placeholder="name@example.com">
                            <label for="nazevInput">Název</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="cenaInput" name="cena" placeholder="name@example.com">
                            <label for="cenaInput">cena</label>
                        </div>
                        <input type='submit' class='w-100 btn btn-primary' name="add" value="Přidat produkt">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="w-100 btn btn-danger" data-bs-dismiss="modal">Zavřít</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    $mysqli = new mysqli("localhost","root","","rozvoz");
    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    ?>
    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Jméno</th>
            <th>Příjmení</th>
            <th>Edit</th>
        </tr>
        <?php
        $produkty = mysqli_query($mysqli, "SELECT * FROM produkt", MYSQLI_USE_RESULT);
        foreach ($produkty as $produkt){
            echo "<tr>";
            echo "<td>$produkt[idp]</td>";
            echo "<td>$produkt[nazev]</td>";
            echo "<td>$produkt[cena]</td>";
            echo "<td>
<!-- Button trigger modal -->
<button type='button' class='w-100 btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal$produkt[idp]'>
Editovat            </button>

<!-- Modal -->
<div class='modal fade' id='exampleModal$produkt[idp]' tabindex='-1' aria-labelledby='exampleModalLabel$produkt[idp]' aria-hidden='true'>
  <div class='modal-dialog modal-fullscreen-md-down modal-dialog-centered'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel$produkt[idp]'>Modal title</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form method='post' action='produkt_script.php'>
            <input type='hidden' value='$produkt[idp]' name='idp'>
            <div class='form-floating mb-3'>
                <input type='text' value='$produkt[nazev]' class='form-control' id='nazevInput$produkt[idp]' name='nazev' placeholder='name@example.com'>
                <label for='nazevInput$produkt[idp]'>Název</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='number' value='$produkt[cena]' class='form-control' id='cenaInput$produkt[idp]' name='cena' placeholder='name@example.com'>
                <label for='cenaInput$produkt[idp]'>Cena</label>
            </div>
            <input type='submit' name='edit' class='w-100 btn btn-primary' value='Uložit'>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='w-100 btn btn-danger ' data-bs-dismiss='modal'>Zavřít</button>
      </div>
    </div>
  </div>
</div>
</td>";
            echo "</tr>";
        }
        ?>
    </table>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
