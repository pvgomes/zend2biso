#!/bin/bash

echo "127.0.0.1  zend2biso.dev" >> /etc/hosts \
&& /etc/init.d/php5-fpm start \
&& /usr/sbin/nginx