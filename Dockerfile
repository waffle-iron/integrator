FROM lojassimonetti/apache2-php7-silex

# Install xDebug
RUN cd /tmp && wget http://xdebug.org/files/xdebug-2.5.0.tgz && tar -xvzf xdebug-2.5.0.tgz \
    && cd xdebug-2.5.0 && phpize && ./configure && make && make install \
    && cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20160303 \
    && echo "zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
&& echo "xdebug.var_display_max_depth=15" >> /usr/local/etc/php/conf.d/xdebug.ini