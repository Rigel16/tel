<?php
require 'includes/db.php';
require 'includes/functions.php';

$errors = [];

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

<h2>Ajouter un téléphone</h2>
<?php foreach ($errors as $e): ?>
    <p style="color:red"><?= $e ?></p>
<?php endforeach; ?>
<form method="post">
    Marque: <input name="brand" required><br>
    IMEI: <input name="imei" required><br>
    Nom: <input name="name" required><br>
    Couleur:
    <select name="color">
        <option>Rouge</option>
        <option>Vert</option>
        <option>Bleu</option>
    </select><br>
    Capacité (GO): <input type="number" name="capacity" required><br>
    <button type="submit">Enregistrer</button>
</form>
<a href="index.php">Retour</a>
