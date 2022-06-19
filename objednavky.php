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
<?php
$mysqli = new mysqli("localhost","root","","rozvoz");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
?>
<?php include("navbar.html") ?>
<main class="container pt-5">

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#vytvoritObj">
        Vytvořit objednávku
    </button>

    <div class="modal fade" id="vytvoritObj" tabindex="-1" aria-labelledby="vytvoritObjLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vytvoritObjLabel">Vytvořit objednávku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="vytvorit_obj.php">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="typ_platby">
                                <option value="Hotove">Hotově</option>
                                <option value="On-line">Kartou</option>
                            </select>
                            <label for="floatingSelect">Typ platby</label>
                        </div>
                        <div class="row">
                        <?php
                            $produkty = mysqli_query($mysqli, "SELECT * FROM produkt", MYSQLI_USE_RESULT);
                            foreach ($produkty as $produkt){
                              echo "<h5 class='mb-3 col-4 align-self-center'>$produkt[nazev] $produkt[cena]Kč</h5>";
                              echo "
                            <div class='col-8'>
                              <div class='form-floating mb-3'>
                                  <input type='number' class='form-control' id='$produkt[idp]' name='$produkt[idp]' placeholder='0' min='0' >
                                  <label for='pocet$produkt[idp]'>Počet</label>
                              </div>
                            </div>
                              ";
                            }
                        ?>
                        </div>
                        <input type='submit' class='w-100 btn btn-primary' name="add" value="Vytvořit objednávku">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="w-100 btn btn-danger" data-bs-dismiss="modal">Zavřít</button>
                </div>
            </div>
        </div>
    </div>
<br>
    <table class="table table-striped table-hove">
        <tr>
            <th>Číslo objednávky</th>
            <th>Typ platby</th>
            <th>Produkty</th>
            <th>Cena celkem</th>
        </tr>
        <?php
        $objednavky = mysqli_query($mysqli, "SELECT * FROM objednavka");
        foreach ($objednavky as $objednavka){
            echo "<tr>";
            echo "<td>",$objednavka["ido"],"</td>";
            echo "<td>",$objednavka["typ_platby"],"</td>";
            $select = "SELECT nazev, cena, mnozstvi FROM kosik join produkt on kosik.idp=produkt.idp where ido='$objednavka[ido]'";
            $produkty = mysqli_query($mysqli, $select);
            echo "<td>";
            foreach ($produkty as $produkt){
                echo "$produkt[mnozstvi]x $produkt[nazev], $produkt[cena]Kč <br>";
            }
            echo "</td>";
            $cena_select = "SELECT sum(cena*kosik.mnozstvi) as cena_celkem FROM kosik join produkt on kosik.idp=produkt.idp where ido='$objednavka[ido]'";
            $cena_celkem = mysqli_fetch_assoc(mysqli_query($mysqli, $cena_select))["cena_celkem"];
            echo "<td>$cena_celkem Kč</td>";
            echo "</tr>";
        }
        ?>
    </table>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
