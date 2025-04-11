<?php
require 'includes/db.php';
require 'includes/functions.php';

$id = $_GET['id'] ?? null;

if ($id) {
    deletePhone($pdo, $id);
}

header("Location: index.php");
exit;
