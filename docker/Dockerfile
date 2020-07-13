FROM php:7.4-apache
LABEL maintainer="Felippe Miguel <felippe.miguel.silva@gmail.com>"

RUN docker-php-ext-install pdo_mysql

# alterando o padrão do apache para acessar a pasta public do laravel ao invés da raiz var/www/html
ADD apache/000-default.conf /etc/apache2/sites-available/000-default.conf

ADD clear-cache.sh /clear-cache.sh
ADD wait-for-it.sh /wait-for-it.sh
ADD migrate.sh /migrate.sh
ADD permissions.sh /permissions.sh

RUN chmod 755 /clear-cache.sh
RUN chmod 755 /wait-for-it.sh
RUN chmod 755 /migrate.sh
RUN chmod 755 /permissions.sh

WORKDIR /var/www/html

#/clear-cache.sh  - Limpa e configura os caches
#/wait-for-it.sh  - Testa e aguarda a conexão com o banco de dados antes de prosseguir
#/migrate.sh      - Gera uma nova key para o app e executa as migrations
CMD /permissions.sh && /clear-cache.sh && /wait-for-it.sh $DB_HOST:$DB_PORT && /migrate.sh && apache2-foreground