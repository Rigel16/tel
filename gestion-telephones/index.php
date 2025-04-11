<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    <div class="container">
        <h1>📱 Gestion des Téléphones</h1>
        <div class="actions">
            <a href="add.php" class="btn">➕ Ajouter un téléphone</a>
            <a href="colors.php" class="btn">🎨 Gérer les couleurs</a>
        </div>
        <table>
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
                    <td><?= htmlspecialchars($phone['color_name']) ?></td>
                    <td><?= htmlspecialchars($phone['capacity']) ?> GO</td>
                    <td>
                        <a href="edit.php?id=<?= $phone['id'] ?>" class="btn">✏️</a>
                        <a href="delete.php?id=<?= $phone['id'] ?>" class="btn" onclick="return confirm('Supprimer ce téléphone ?');">🗑️</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>