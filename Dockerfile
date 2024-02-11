# Usa un'immagine di base con Apache e PHP
FROM php:8.2-apache

# Aggiorna i repository e installa le dipendenze necessarie
RUN apt-get update && \
    apt-get install -y iputils-ping

# Copia i file del sito nella directory del web server
COPY index.php /var/www/html/

# Esponi la porta 80 per il traffico web
EXPOSE 80

# Avvia il server Apache in background
CMD ["apache2-foreground"]
