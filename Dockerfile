# Utiliser l'image officielle PHP avec Apache
FROM php:8.1-apache

# Installation des extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activation du module rewrite d'Apache
RUN a2enmod rewrite

# Copier les fichiers du projet dans le conteneur
COPY ./gestion-telephones/ /var/www/html/

# Définir les permissions appropriées
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

# Exposer le port 80
EXPOSE 80