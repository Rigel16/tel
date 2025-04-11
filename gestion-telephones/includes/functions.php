<?php

function getAllPhones(PDO $pdo) {
    $stmt = $pdo->query("SELECT * FROM phones");
    return $stmt->fetchAll();
}

function getPhoneById(PDO $pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM phones WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function createPhone(PDO $pdo, $data) {
    $stmt = $pdo->prepare("INSERT INTO phones (brand, imei, name, color, capacity) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$data['brand'], $data['imei'], $data['name'], $data['color'], $data['capacity']]);
}

function updatePhone(PDO $pdo, $id, $data) {
    $stmt = $pdo->prepare("UPDATE phones SET brand=?, imei=?, name=?, color=?, capacity=? WHERE id=?");
    return $stmt->execute([$data['brand'], $data['imei'], $data['name'], $data['color'], $data['capacity'], $id]);
}

function deletePhone(PDO $pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM phones WHERE id=?");
    return $stmt->execute([$id]);
}
