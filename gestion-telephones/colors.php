<?php
require 'includes/db.php';
require 'includes/functions.php';

$errors = [];
$success = false;
$colors = getAllColors($pdo);

// Ajouter une couleur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = trim($_POST['name']);
    
    if (empty($name)) {
        $errors[] = "Le nom de la couleur est requis.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO colors (name) VALUES (?)");
        $stmt->execute([$name]);
        $success = true;
        header("Location: colors.php");
        exit;
    }
}

// Supprimer une couleur
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Vérifier si la couleur est utilisée par des téléphones
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM phones WHERE color_id = ?");
    $stmt->execute([$id]);
    $count = $stmt->fetchColumn();
    
    if ($count > 0) {
        $errors[] = "Cette couleur est utilisée par $count téléphone(s) et ne peut pas être supprimée.";
    } else {
        $stmt = $pdo->prepare("DELETE FROM colors WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: colors.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Couleurs</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>🎨 Gestion des Couleurs</h1>
        
        <?php foreach ($errors as $e): ?>
            <p class="error"><?= $e ?></p>
        <?php endforeach; ?>
        
        <?php if ($success): ?>
            <p class="success">Couleur ajoutée avec succès.</p>
        <?php endif; ?>
        
        <h2>Ajouter une couleur</h2>
        <form method="post" class="color-form">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for="name">Nom de la couleur:</label>
                <input id="name" name="name" required>
            </div>
            <button type="submit" class="btn">Ajouter</button>
        </form>
        
        <h2>Couleurs disponibles</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($colors as $color): ?>
                <tr>
                    <td><?= $color['id'] ?></td>
                    <td><?= htmlspecialchars($color['name']) ?></td>
                    <td>
                        <a href="colors.php?delete=<?= $color['id'] ?>" class="btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette couleur?');">🗑️</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <a href="index.php" class="back-link">Retour à la liste des téléphones</a>
    </div>
</body>
</html>