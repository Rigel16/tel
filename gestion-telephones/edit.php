<?php
require 'includes/db.php';
require 'includes/functions.php';

$id = $_GET['id'] ?? null;
$phone = getPhoneById($pdo, $id);
$errors = [];

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

<h2>Modifier le téléphone</h2>
<?php foreach ($errors as $e): ?>
    <p style="color:red"><?= $e ?></p>
<?php endforeach; ?>
<form method="post">
    Marque: <input name="brand" value="<?= $phone['brand'] ?>"><br>
    IMEI: <input name="imei" value="<?= $phone['imei'] ?>"><br>
    Nom: <input name="name" value="<?= $phone['name'] ?>"><br>
    Couleur:
    <select name="color">
        <?php foreach (['Rouge', 'Vert', 'Bleu'] as $color): ?>
            <option <?= $color === $phone['color'] ? 'selected' : '' ?>><?= $color ?></option>
        <?php endforeach; ?>
    </select><br>
    Capacité (GO): <input type="number" name="capacity" value="<?= $phone['capacity'] ?>"><br>
    <button type="submit">Mettre à jour</button>
</form>
<a href="index.php">Retour</a>
