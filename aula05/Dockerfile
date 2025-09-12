FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install -y \
        mariadb-server \
        mariadb-client \
        zlib1g-dev \
        libzip-dev \
        unzip \
        nano \
        curl \
        wget && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql opcache zip

RUN mysql_install_db --user=mysql --basedir=/usr --datadir=/var/lib/mysql

EXPOSE 80 3306

COPY ./docker-entrypoint.sh /usr/local/bin/
COPY ./banco_de_dados.sql /docker-entrypoint-initdb.d/

COPY ./.htaccess /var/www/html/
COPY ./index.php /var/www/html/
COPY ./style.css /var/www/html/

RUN chmod +x /usr/local/bin/docker-entrypoint.sh && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

RUN a2enmod rewrite expires deflate

RUN echo "upload_max_filesize = 50M" >> /usr/local/etc/php/php.ini-production && \
    echo "post_max_size = 50M" >> /usr/local/etc/php/php.ini-production && \
    echo "memory_limit = 256M" >> /usr/local/etc/php/php.ini-production && \
    cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]