<?php
require 'includes/db.php';
require 'includes/functions.php';

$id = $_GET['id'] ?? null;
$phone = getPhoneById($pdo, $id);
$errors = [];
$colors = getAllColors($pdo); // Récupérer les couleurs disponibles

if (!$phone) {
    die("Téléphone introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'brand' => $_POST['brand'],
        'imei' => $_POST['imei'],
        'name' => trim($_POST['name']),
        'color' => $_POST['color'],
        'capacity' => (int)$_POST['capacity']
    ];

    if (empty($data['name'])) {
        $errors[] = "Le nom est requis.";
    }
    if ($data['capacity'] <= 0 || $data['capacity'] % 2 !== 0) {
        $errors[] = "Capacité invalide.";
    }

    if (!$errors) {
        updatePhone($pdo, $id, $data);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le téléphone</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Modifier le téléphone</h2>
        <?php foreach ($errors as $e): ?>
            <p class="error"><?= $e ?></p>
        <?php endforeach; ?>
        <form method="post" class="phone-form">
            <div class="form-group">
                <label for="brand">Marque:</label>
                <input id="brand" name="brand" value="<?= htmlspecialchars($phone['brand']) ?>">
            </div>
            <div class="form-group">
                <label for="imei">IMEI:</label>
                <input id="imei" name="imei" value="<?= htmlspecialchars($phone['imei']) ?>">
            </div>
            <div class="form-group">
                <label for="name">Nom:</label>
                <input id="name" name="name" value="<?= htmlspecialchars($phone['name']) ?>">
            </div>
            <div class="form-group">
                <label for="color">Couleur:</label>
                <select id="color" name="color">
                    <?php foreach ($colors as $color): ?>
                        <option <?= $color === $phone['color'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($color) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="capacity">Capacité (GO):</label>
                <input type="number" id="capacity" name="capacity" value="<?= htmlspecialchars($phone['capacity']) ?>">
            </div>
            <button type="submit" class="btn">Mettre à jour</button>
        </form>
        <a href="index.php" class="back-link">Retour</a>
    </div>
</body>
</html>