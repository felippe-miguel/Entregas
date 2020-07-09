FROM php:7.4-apache
LABEL maintainer="Felippe Miguel <felippe.miguel.silva@gmail.com>"

# alterando o padrão do apache para acessar a pasta public do laravel ao invés da raiz var/www/html
ADD apache/000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html