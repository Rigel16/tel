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

function getAllColors(PDO $pdo) {
    $stmt = $pdo->query("SELECT DISTINCT color FROM phones ORDER BY color");
    $colors = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Si aucune couleur n'existe encore dans la BD, retourner des couleurs par défaut
    if (empty($colors)) {
        return ['Rouge', 'Vert', 'Bleu', 'Noir', 'Blanc'];
    }
    
    return $colors;
}