FROM php:7.4-fpm

RUN apt-get update

RUN apt-get install -y git wget unzip

# extensions
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install sockets
RUN docker-php-ext-install calendar
RUN apt-get install libicu-dev -y && docker-php-ext-install intl
RUN docker-php-ext-install opcache

# composer
COPY ./docker/php/install-composer.sh /tmp/install-composer.sh
RUN bash /tmp/install-composer.sh

# php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/

# nodejs
#RUN apt install gnupg2 -y \
#    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
#    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
#    && apt update \
#    && apt install nodejs yarn -y
