<?php
require 'includes/db.php';
require 'includes/functions.php';

$phones = getAllPhones($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Téléphones</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>📱 Gestion des Téléphones</h1>
    <a href="add.php">➕ Ajouter un téléphone</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Marque</th>
            <th>IMEI</th>
            <th>Nom</th>
            <th>Couleur</th>
            <th>Capacité</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($phones as $phone): ?>
            <tr>
                <td><?= $phone['id'] ?></td>
                <td><?= htmlspecialchars($phone['brand']) ?></td>
                <td><?= htmlspecialchars($phone['imei']) ?></td>
                <td><?= htmlspecialchars($phone['name']) ?></td>
                <td><?= htmlspecialchars($phone['color']) ?></td>
                <td><?= htmlspecialchars($phone['capacity']) ?> GO</td>
                <td>
                    <a href="edit.php?id=<?= $phone['id'] ?>">✏️</a>
                    <a href="delete.php?id=<?= $phone['id'] ?>" onclick="return confirm('Supprimer ce téléphone ?');">🗑️</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
