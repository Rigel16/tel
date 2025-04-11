# Application de Gestion des Téléphones

Une application PHP simple permettant de gérer un inventaire de téléphones et leurs caractéristiques.

## Fonctionnalités

- Affichage de la liste des téléphones
- Ajout de nouveaux téléphones
- Modification des téléphones existants
- Suppression des téléphones
- Gestion des couleurs disponibles

## Prérequis

- PHP 7.4 ou plus récent
- Serveur MySQL (MAMP recommandé)
- Extension PDO PHP

## Installation

1. Clonez le dépôt ou téléchargez les fichiers vers votre serveur web.
2. Importez la base de données en utilisant le script SQL fourni.
3. Configurez la connexion à la base de données dans `includes/db.php` si nécessaire.

## Configuration de la base de données

La base de données est configurée par défaut pour fonctionner avec MAMP :

- **Hôte**: `localhost`
- **Base de données**: `telephones`
- **Utilisateur**: `root`
- **Mot de passe**: `root`
- **Port**: `8889`

## Structure de la base de données

La base de données `telephones` comporte deux tables :

### Table `phones`

| Nom de la colonne | Type       | Description                              |
|-------------------|------------|------------------------------------------|
| `id`              | INT        | Clé primaire                             |
| `brand`           | VARCHAR    | Marque du téléphone                      |
| `imei`            | VARCHAR    | Numéro IMEI unique                       |
| `name`            | VARCHAR    | Nom du modèle                            |
| `color_id`        | INT        | Clé étrangère vers la table `colors`     |
| `capacity`        | INT        | Capacité de stockage en GO               |

### Table `colors`

| Nom de la colonne | Type       | Description                              |
|-------------------|------------|------------------------------------------|
| `id`              | INT        | Clé primaire                             |
| `name`            | VARCHAR    | Nom de la couleur                        |

## Structure des fichiers

- **`index.php`** : Page d'accueil listant tous les téléphones
- **`add.php`** : Formulaire d'ajout d'un téléphone
- **`edit.php`** : Formulaire de modification d'un téléphone
- **`delete.php`** : Script de suppression d'un téléphone
- **`colors.php`** : Gestion des couleurs disponibles

### Dossier `includes/`

- **`db.php`** : Configuration de la connexion à la base de données
- **`functions.php`** : Fonctions utilitaires pour interagir avec la base de données

### Dossier `public/css/`

- **`style.css`** : Feuille de style pour l'application

## Utilisation

1. Accédez à `index.php` pour voir la liste des téléphones.
2. Utilisez le bouton "Ajouter un téléphone" pour créer un nouveau téléphone.
3. Utilisez les boutons d'action pour modifier ou supprimer des téléphones existants.
4. Utilisez "Gérer les couleurs" pour ajouter ou supprimer des couleurs disponibles.

## Règles de validation

- Le **nom** du téléphone est requis.
- La **capacité** doit être un nombre positif et un multiple de 2.
- Une **couleur** ne peut pas être supprimée si elle est utilisée par un téléphone.

## Remarques

- L'application est en **français**.
- La sécurité de base est implémentée avec des **requêtes préparées**.
- Les données sont **échappées** correctement lors de l'affichage.


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
mysql -u votre_utilisateur -p < sql/telephones.sql
```

4. **Lancer l'application**

Accédez à l'application via votre navigateur en fonction de votre configuration de serveur local.

---

## 📝 Notes

- Assurez-vous que les permissions sont correctement configurées pour les fichiers de l'application
- Pour les environnements de production, considérez la mise en place de mesures de sécurité supplémentaires