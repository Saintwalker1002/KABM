<?php

function conn(){
$hostname = "A2019_mvallejo";
$usuariodb = "A2019_mvallejo";
$password = "A2019_mvallejo";
$dbname = "A2019_mvallejo";

    $conectar = mysqli_connect($hostname, $usuariodb, $password, $dbname);
    return $conectar;
}
?>