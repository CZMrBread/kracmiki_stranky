<?php
$mysqli = new mysqli("localhost","root","","rozvoz");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
if ($_POST){
    $jmeno = $_POST["jmeno"];
    $prijmeni = $_POST["prijmeni"];
    $telefon = $_POST["telefon"];
    $adresa = $_POST["adresa"];
    if($_POST["edit"]){
        $idz = $_POST["idz"];
        $update = "update zakaznik set jmeno='$jmeno', prijmeni='$prijmeni', tel_cislo='$telefon', adresa='$adresa' where idz='$idz'";
        mysqli_query($mysqli, $update);
        header( 'HTTP/1.1 301 Moved Permanently' );
        header("Location: zakaznici.php");
        exit;
    }
    elseif ($_POST["add"]){
        $insert = "insert into zakaznik (jmeno, prijmeni, tel_cislo, adresa) values ('$jmeno', '$prijmeni', '$telefon', '$adresa')";
        mysqli_query($mysqli, $insert);
        header( 'HTTP/1.1 301 Moved Permanently' );
        header("Location: zakaznici.php");
        exit;
    }
}