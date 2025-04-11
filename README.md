# 📱 Application de gestion de téléphones

Une petite application PHP + HTML/CSS/JS pour gérer un inventaire de téléphones (CRUD : Create, Read, Update, Delete).

---

## ⚙️ Fonctionnalités

- Lister les téléphones
- Ajouter un téléphone
- Modifier un téléphone
- Supprimer un téléphone

---

## 💾 Structure d'un téléphone

Chaque téléphone contient les champs suivants :
- **Marque** (ex: Samsung, Apple, Oppo)
- **Code IMEI**
- **Nom** *(obligatoire)*
- **Couleur** (Rouge, Vert, Bleu)
- **Capacité** *(multiple de 2 et > 0)*

---

## 🧰 Prérequis

- PHP 8.x
- MySQL ou MariaDB
- Un serveur local (ou PHP CLI pour tester rapidement)

---

## 🛠️ Installation

1. **Cloner le projet ou le télécharger**

```bash
git clone <url-du-repo>
cd gestion-telephones
```

2. **Configuration de la base de données**

Modifiez le fichier de configuration de connexion à la base de données avec vos informations :

```php
// Exemple dans config/database.php
$host = 'localhost';
$dbname = 'gestion_telephones';
$username = 'votre_utilisateur';
$password = 'votre_mot_de_passe';
$port = 3306; // Port par défaut MySQL

// Utilisation de socket si défini
$socket = null; // Changez cette valeur si vous utilisez un socket Unix
if ($socket) {
    $dsn = "mysql:unix_socket=$socket;dbname=$dbname";
} else {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
}
```

3. **Création de la base de données**

Importez le schéma de la base de données :

```bash
mysql -u votre_utilisateur -p < sql/schema.sql
```

4. **Lancer l'application**

Accédez à l'application via votre navigateur en fonction de votre configuration de serveur local.

---

## 📝 Notes

- Assurez-vous que les permissions sont correctement configurées pour les fichiers de l'application
- Pour les environnements de production, considérez la mise en place de mesures de sécurité supplémentaires