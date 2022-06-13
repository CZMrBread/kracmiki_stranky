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
    </tr>
<?php
$kuryri = mysqli_query($mysqli, "SELECT * FROM kuryr", MYSQLI_USE_RESULT);
foreach ($kuryri as $kuryr){
        echo "<tr>";
        echo "<td>$kuryr[idk]</td>";
        echo "<td>$kuryr[jmeno]</td>";
        echo "<td>$kuryr[prijmeni]</td>";
        echo "</tr>";
    }
?>
</table>
<table class="table table-striped table-hover">
    <?php
    $pocet_obj = mysqli_query($mysqli, "SELECT count(*) as pocet FROM objednavka", MYSQLI_USE_RESULT);
    echo "<tr>";
    echo "<th>Počet objednávek</th>";
    foreach ($pocet_obj as $pocet){
        echo "<td>$pocet[pocet]</td>";
    }
    echo "</tr>"
    ?>
</table>
<table class="table table-striped table-hover">
    <tr>
        <th>Id</th>
        <th>Jméno</th>
        <th>Příjmení</th>
    </tr>
<?php
$zakaznici = mysqli_query($mysqli, "SELECT * FROM zakaznik", MYSQLI_USE_RESULT);
foreach ($zakaznici as $zakaznik){
        echo "<tr>";
        echo "<td>$zakaznik[idz]</td>";
        echo "<td>$zakaznik[jmeno]</td>";
        echo "<td>$zakaznik[prijmeni]</td>";
        echo "</tr>";
    }
?>
</table>
<table class="table table-striped table-hover">
    <?php
    $pocet_prod = mysqli_query($mysqli, "SELECT count(*) as pocetp FROM produkt", MYSQLI_USE_RESULT);
    echo "<tr>";
    echo "<th>Počet produktů</th>";
    foreach ($pocet_prod as $pocetp){
        echo "<td>$pocetp[pocetp]</td>";
    }
    echo "</tr>"
    ?>
</table>



</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
