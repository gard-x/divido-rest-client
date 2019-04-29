FROM phpstorm/php-71-apache-xdebug-27

RUN apt-get update -y
RUN apt-get install -y \
    libpng-dev curl libcurl4-openssl-dev wget git

RUN docker-php-ext-install \
    pdo pdo_mysql gd curl


ADD https://api.github.com/repos/gard-x/divido-rest-client/git/refs/heads/master /var/www/version.json
RUN git clone -bmaster https://github.com/gard-x/divido-rest-client.git /var/www/html/



RUN wget -O /usr/local/bin/composer "https://getcomposer.org/composer.phar" && \
    chmod +x /usr/local/bin/composer

RUN composer update -d /var/www/html

RUN a2enmod rewrite

RUN echo "\
xdebug.enable=1\n\
xdebug.remote_enable=1\n\
xdebug.remote_connect_back=0\n\
xdebug.remote_port=9000\n\
xdebug.idekey=\"PHPSTORM\"\n\
xdebug.extended_info=on\n\
xdebug.max_nesting_level=400\n\
xdebug.var_display_max_depth=-1\n\
">> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN service apache2 restart


