FROM php:8.4-alpine3.21

# Copia i file del sito nella directory del web server
COPY index.php /var/www/html/

# Espone la porta 80 per il traffico web
EXPOSE 80

# Avvia il server PHP integrato
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]