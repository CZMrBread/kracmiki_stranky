<?php
$mysqli = new mysqli("localhost","root","","rozvoz");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
    if ($_POST){
        if($_POST["edit"]){
            $idk = $_POST["idk"];
            $jmeno = $_POST["jmeno"];
            $prijmeni = $_POST["prijmeni"];
            $telefon = $_POST["telefon"];
            $update = "update kuryr set jmeno='$jmeno', prijmeni='$prijmeni', tel_cislo='$telefon' where idk='$idk'";
            mysqli_query($mysqli, $update);
            header( 'HTTP/1.1 301 Moved Permanently' );
            header("Location: kuryri.php");
            exit;
        }
        elseif ($_POST["add"]){
            $jmeno = $_POST["jmeno"];
            $prijmeni = $_POST["prijmeni"];
            $telefon = $_POST["telefon"];
            $insert = "insert into kuryr (jmeno, prijmeni, tel_cislo) values ('$jmeno', '$prijmeni', '$telefon')";
            mysqli_query($mysqli, $insert);
            header( 'HTTP/1.1 301 Moved Permanently' );
            header("Location: kuryri.php");
            exit;
        }
    }