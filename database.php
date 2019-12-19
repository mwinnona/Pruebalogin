<?php
$server ='localhost';
$username='root';
$password='Y@xicu3029$$2019';
$database='Prueba';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);

} catch (PDOException $e) {
    die('Connectetd failed: '.$e->getMessage());
    
}
?>