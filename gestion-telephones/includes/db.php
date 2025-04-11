<?php
$host = 'localhost';
$db   = 'telephones';
$user = 'root';
$pass = '';
$charset = '';
$port = ;
$socket = ;

$dsn = "mysql:host=$host;dbname=$db;port=$port;unix_socket=$socket;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Connexion réussie à la base de données.";
} catch (\PDOException $e) {
    echo "Échec de la connexion : " . $e->getMessage();
}
