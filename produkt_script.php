<?php
$mysqli = new mysqli("localhost","root","","rozvoz");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
if ($_POST){
    if($_POST["edit"]){
        $idp = $_POST["idp"];
        $nazev = $_POST["nazev"];
        $cena = $_POST["cena"];
        $update = "update produkt set nazev='$nazev', cena='$cena' where idp='$idp'";
        mysqli_query($mysqli, $update);
        header( 'HTTP/1.1 301 Moved Permanently' );
        header("Location: produkty.php");
        exit;
    }
    elseif ($_POST["add"]){
        $idp = $_POST["idp"];
        $nazev = $_POST["nazev"];
        $cena = $_POST["cena"];
        $insert = "insert into produkt (nazev, cena) values ('$nazev', '$cena')";
        mysqli_query($mysqli, $insert);
        header( 'HTTP/1.1 301 Moved Permanently' );
        header("Location: produkty.php");
        exit;
    }
}