<?php
$mysqli = new mysqli("localhost","root","","rozvoz");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
if ($_POST){
    if ($_POST["add"]){
        $select = "select max(ido) + 1 as ido from objednavka";
        $ido = mysqli_fetch_assoc(mysqli_query($mysqli, $select))["ido"];
        $insert = "insert into objednavka values ('$ido', '$_POST[typ_platby]', 0, now())";
        mysqli_query($mysqli, $insert);
        foreach ($_POST as $key => $value){
            echo $key, " ", $value, "<br>";
            if (!$value){
                continue;
            }
            $insert = "insert into kosik (idp, ido, mnozstvi) values ('$key','$ido', '$value')";
            mysqli_query($mysqli, $insert);
        }

        header( 'HTTP/1.1 301 Moved Permanently' );
        header("Location: objednavky.php");
        exit;
    }
}