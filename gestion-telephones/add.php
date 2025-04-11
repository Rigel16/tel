<?php
require 'includes/db.php';
require 'includes/functions.php';

$errors = [];
$colors = getAllColors($pdo); // Récupérer les couleurs disponibles

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
        $errors[] = "La capacité doit être un multiple de 2 et > 0.";
    }

    if (!$errors) {
        createPhone($pdo, $data);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un téléphone</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Ajouter un téléphone</h2>
        <?php foreach ($errors as $e): ?>
            <p class="error"><?= $e ?></p>
        <?php endforeach; ?>
        <form method="post" class="phone-form">
            <div class="form-group">
                <label for="brand">Marque:</label>
                <input id="brand" name="brand" required>
            </div>
            <div class="form-group">
                <label for="imei">IMEI:</label>
                <input id="imei" name="imei" required>
            </div>
            <div class="form-group">
                <label for="name">Nom:</label>
                <input id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="color">Couleur:</label>
                <select id="color" name="color">
                    <?php foreach ($colors as $color): ?>
                        <option><?= htmlspecialchars($color) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="capacity">Capacité (GO):</label>
                <input type="number" id="capacity" name="capacity" required>
            </div>
            <button type="submit" class="btn">Enregistrer</button>
        </form>
        <a href="index.php" class="back-link">Retour</a>
    </div>
</body>
</html>