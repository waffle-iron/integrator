FROM lojassimonetti/apache2-php7-silex

ENV http_proxy ${http_proxy}
ENV https_proxy ${http_proxy}

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y zip supervisor \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        git \
        wget \
        libxslt-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install -j$(nproc) bcmath

# Install xDebug
RUN cd /tmp && wget http://xdebug.org/files/xdebug-2.5.0.tgz && tar -xvzf xdebug-2.5.0.tgz \
    && cd xdebug-2.5.0 && phpize && ./configure && make && make install \
    && cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20160303 \
    && echo "zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
&& echo "xdebug.var_display_max_depth=15" >> /usr/local/etc/php/conf.d/xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

COPY ./provisioning/php.ini /usr/local/etc/php/conf.d/timezone.ini
COPY ./provisioning/apache.conf /etc/apache2/sites-available/000-default.conf

ADD ./provisioning/supervisor.conf /etc/supervisor/conf.d/integrador-financeiro.conf

CMD usermod -u 1000 www-data \
    && cd /var/www/html && composer install \
    && chown -R www-data:www-data /var/www/html/app/cache && chmod 777 /var/www/html/app/cache \
    && chown -R www-data:www-data /var/www/html/app/logs && chmod 777 /var/www/html/app/logs \
    && supervisord -c /etc/supervisor/supervisord.conf -n

EXPOSE 80 9001