#!/bin/bash


if [ ! -f "/root/.init-php" ]
then
    ## init php extensions
    /opt/fatphp/bin/php-ext-config init
    touch /root/.init-php
    chmod 600 /root/.init-php
fi


exec "$@"