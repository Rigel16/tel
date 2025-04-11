<?php

function getAllPhones(PDO $pdo) {
$stmt = $pdo->query("SELECT p.*, c.name as color_name 
                        FROM phones p
                        LEFT JOIN colors c ON p.color_id = c.id");
return $stmt->fetchAll();
}

function getPhoneById(PDO $pdo, $id) {
$stmt = $pdo->prepare("SELECT * FROM phones WHERE id = ?");
$stmt->execute([$id]);
return $stmt->fetch();
}

function createPhone(PDO $pdo, $data) {
$stmt = $pdo->prepare("INSERT INTO phones (brand, imei, name, color_id, capacity) 
                        VALUES (?, ?, ?, ?, ?)");
return $stmt->execute([
    $data['brand'], 
    $data['imei'], 
    $data['name'], 
    $data['color_id'], 
    $data['capacity']
]);
}

function updatePhone(PDO $pdo, $id, $data) {
$stmt = $pdo->prepare("UPDATE phones 
                        SET brand=?, imei=?, name=?, color_id=?, capacity=? 
                        WHERE id=?");
return $stmt->execute([
    $data['brand'], 
    $data['imei'], 
    $data['name'], 
    $data['color_id'], 
    $data['capacity'], 
    $id
]);
}

function deletePhone(PDO $pdo, $id) {
$stmt = $pdo->prepare("DELETE FROM phones WHERE id=?");
return $stmt->execute([$id]);
}

function getAllColors(PDO $pdo) {
$stmt = $pdo->query("SELECT * FROM colors ORDER BY name");
return $stmt->fetchAll();
}