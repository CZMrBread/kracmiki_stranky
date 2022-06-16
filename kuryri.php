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
        Přidat kurýra
    </button>

    <div class="modal fade" id="pridatKuryra" tabindex="-1" aria-labelledby="pridatKuryraLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pridatKuryraLabel">Přidat kurýra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jmenoInput" placeholder="name@example.com">
                            <label for="jmenoInput">Jméno</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="prijmeniInput" placeholder="name@example.com">
                            <label for="prijmeniInput">Příjmení</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="telefonInput" placeholder="name@example.com">
                            <label for="telefonInput">Telefon</label>
                        </div>
                        <button type='submit' class='w-100 btn btn-primary'>Přidat kurýra</button>
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
        $kuryri = mysqli_query($mysqli, "SELECT * FROM kuryr", MYSQLI_USE_RESULT);
        foreach ($kuryri as $kuryr){
            echo "<tr>";
            echo "<td>$kuryr[idk]</td>";
            echo "<td>$kuryr[jmeno]</td>";
            echo "<td>$kuryr[prijmeni]</td>";
            echo "<td>
<!-- Button trigger modal -->
<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal$kuryr[idk]'>
Editovat            </button>

<!-- Modal -->
<div class='modal fade' id='exampleModal$kuryr[idk]' tabindex='-1' aria-labelledby='exampleModalLabel$kuryr[idk]' aria-hidden='true'>
  <div class='modal-dialog modal-fullscreen-md-down modal-dialog-centered'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel$kuryr[idk]'>Modal title</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form method='post' action='scripts.php'>
            <input type='hidden' value='$kuryr[idk]'>
            <div class='form-floating mb-3'>
                <input type='text' value='$kuryr[jmeno]' class='form-control' id='jmenoInput$kuryr[idk]' placeholder='name@example.com'>
                <label for='jmenoInput$kuryr[idk]'>Jméno</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='text' value='$kuryr[prijmeni]' class='form-control' id='prijmeniInput$kuryr[idk]' placeholder='name@example.com'>
                <label for='prijmeniInput$kuryr[idk]'>Příjmení</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='tel' value='$kuryr[tel_cislo]' class='form-control' id='telefonInput$kuryr[idk]' placeholder='name@example.com'>
                <label for='telefonInput$kuryr[idk]'>Telefon</label>
            </div>
            <button type='submit' class='w-100 btn btn-primary'>Uložit</button>
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
