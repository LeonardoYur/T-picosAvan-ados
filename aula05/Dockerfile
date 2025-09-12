FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install -y mariadb-server mariadb-client zlib1g-dev libzip-dev unzip && \
    docker-php-ext-install pdo_mysql opcache zip

RUN mysql_install_db --user=mysql --basedir=/usr --datadir=/var/lib/mysql

EXPOSE 3306

COPY ./docker-entrypoint.sh /usr/local/bin/
COPY ./banco_de_dados.sql /docker-entrypoint-initdb.d/
COPY ./.htaccess /var/www/html/

COPY ./config.php /var/www/html/
COPY ./database.php /var/www/html/
COPY ./index.php /var/www/html/
COPY ./style.css /var/www/html/

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]