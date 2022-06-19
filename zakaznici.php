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

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#pridazakznika">
        Přidat zákazníka
    </button>

    <div class="modal fade" id="pridazakznika" tabindex="-1" aria-labelledby="pridazakznikaLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pridazakznikaLabel">Přidat zákazníka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="zakaznici_script.php">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jmenoInput" name="jmeno" placeholder="name@example.com">
                            <label for="jmenoInput">Jméno</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="prijmeniInput" name="prijmeni" placeholder="name@example.com">
                            <label for="prijmeniInput">Příjmení</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="telefonInput" name="telefon" placeholder="name@example.com">
                            <label for="telefonInput">Telefon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="adresaInput" name="adresa" placeholder="name@example.com">
                            <label for="adresaInput">Adresa</label>
                        </div>
                        <input type='submit' class='w-100 btn btn-primary' name="add" value="Přidat zákazníka">
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
            <th>Telefon</th>
            <th>Adresa</th>
            <th>Edit</th>
        </tr>
        <?php
        $zakaznici = mysqli_query($mysqli, "SELECT * FROM zakaznik", MYSQLI_USE_RESULT);
        foreach ($zakaznici as $zakaznik){
            echo "<tr>";
            echo "<td>$zakaznik[idz]</td>";
            echo "<td>$zakaznik[jmeno]</td>";
            echo "<td>$zakaznik[prijmeni]</td>";
            echo "<td>$zakaznik[tel_cislo]</td>";
            echo "<td>$zakaznik[adresa]</td>";
            echo "<td>
<!-- Button trigger modal -->
<button type='button' class='w-100 btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal$zakaznik[idz]'>
Editovat
</button>

<!-- Modal -->
<div class='modal fade' id='exampleModal$zakaznik[idz]' tabindex='-1' aria-labelledby='exampleModalLabel$zakaznik[idz]' aria-hidden='true'>
  <div class='modal-dialog modal-fullscreen-md-down modal-dialog-centered'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel$zakaznik[idz]'>Editovat zákazníka</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form method='post' action='zakaznici_script.php'>
            <input type='hidden' value='$zakaznik[idz]' name='idz'>
            <div class='form-floating mb-3'>
                <input type='text' value='$zakaznik[jmeno]' class='form-control' id='jmenoInput$zakaznik[idz]' name='jmeno' placeholder='name@example.com'>
                <label for='jmenoInput$zakaznik[idz]'>Jméno</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='text' value='$zakaznik[prijmeni]' class='form-control' id='prijmeniInput$zakaznik[idz]' name='prijmeni' placeholder='name@example.com'>
                <label for='prijmeniInput$zakaznik[idz]'>Příjmení</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='tel' value='$zakaznik[tel_cislo]' class='form-control' id='telInput$zakaznik[idz]' name='telefon' placeholder='name@example.com'>
                <label for='telInput$zakaznik[idz]'>Telefon</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='text' value='$zakaznik[adresa]' class='form-control' id='adresaInput$zakaznik[idz]' name='adresa' placeholder='name@example.com'>
                <label for='adresaInput$zakaznik[idz]'>Adresa</label>
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
