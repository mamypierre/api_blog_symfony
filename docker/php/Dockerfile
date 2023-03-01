FROM php:8.1-fpm


ARG PHP_ROOT_DIR
ARG WORK_ROOT_DIR
ARG WEB_USER
ARG WEB_GROUP

COPY 8/www.conf ${PHP_ROOT_DIR}/php-fpm.d/www.conf



RUN mkdir -p ${WORK_ROOT_DIR}
RUN chmod uog+xwr -R ${WORK_ROOT_DIR}



WORKDIR ${WORK_ROOT_DIR}
#module
RUN apt-get update -y
RUN apt-get install -y apt-utils
RUN apt-get install libxml2-dev  -y
RUN apt-get install libzip-dev -y
RUN apt-get install libxslt-dev  -y



#extension
RUN docker-php-ext-install ctype
RUN docker-php-ext-install dom
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install xsl
RUN apt-get install -y git
RUN echo 'deb [trusted=yes] https://repo.symfony.com/apt/ /' | tee /etc/apt/sources.list.d/symfony-cli.list
RUN apt update
RUN apt-get install symfony-cli
RUN docker-php-ext-install zip
RUN docker-php-ext-configure zip

#composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

