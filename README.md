# 📱 Gestion des Téléphones - Projet PHP + Docker

Ce projet est une application de gestion de téléphones construite en PHP avec une base de données MySQL, le tout conteneurisé avec Docker.

---

## Lancer l'application

### 1. Cloner le dépôt

```bash
git clone https://github.com/votre-utilisateur/votre-repo.git
cd votre-repo
```

> Remplacez l’URL par celle de votre dépôt GitHub.

---

### 2. Prérequis

Assurez-vous d’avoir installé **Docker** et **Docker Compose** sur votre machine :

- **Mac** : [Installer Docker Desktop](https://www.docker.com/products/docker-desktop/)
- **Windows** : [Installer Docker Desktop](https://www.docker.com/products/docker-desktop/)
- **Linux** : [Installer Docker Engine](https://docs.docker.com/engine/install/) et [Docker Compose](https://docs.docker.com/compose/install/)

⚠️ Les **ports `8080` et `8081`** doivent être libres.

---

### 3. Lancer l'application avec Docker

Dans le dossier du projet, exécutez la commande suivante :

```bash
docker-compose up --build
```

Cette commande :

- construit les images Docker
- initialise la base de données avec `telephones.sql`
- démarre les services `web` et `db`

---

## Accéder à l'application

- 👉 Application Web : [http://localhost:8080](http://localhost:8080)
- 👉 phpMyAdmin : [http://localhost:8081](http://localhost:8081)

---

## Connexion à phpMyAdmin

- **Serveur** : `db`
- **Utilisateur** : `root`
- **Mot de passe** : `votre_mot_de_passe` *(défini dans `docker-compose.yml`)*

---

## Structure du projet

- `docker-compose.yml` – Définit les services Docker
- `Dockerfile` – Configuration du conteneur PHP + Apache
- `telephones.sql` – Script SQL de création de la base
- `gestion-telephones/` – Code source de l’application

---

## Notes

- Le module Apache `mod_rewrite` est activé.
- Les `.htaccess` sont pris en charge grâce à `AllowOverride All`.
- Le code PHP est monté dans le conteneur via un volume.

---

## Contact

Pour toute question, n’hésitez pas à créer une issue sur ce dépôt ou à me contacter directement.

---