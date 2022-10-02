<?php 
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'kaiserabm';
/*comprobar coneccion */
    try {
        $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
      } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
      }
?>
