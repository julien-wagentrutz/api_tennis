# image à utiliser
FROM php:7.4-fpm-alpine

#Apk install

RUN apk --no-cache update && apk  --no-cache add bash git make yarn

#Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

# Client symfony
RUN  wget https://get.symfony.com/cli/installer -O - | bash &&  mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo_mysql

WORKDIR /var/www/public

EXPOSE 8000

