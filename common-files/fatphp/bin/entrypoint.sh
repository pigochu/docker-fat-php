#!/bin/bash

set -e

if [ ! -f "/root/.fatphp-inited" ] || [ "$PHP_ENABLE_EXTENSIONS" !=  "$(cat /root/.fatphp-inited)" ];
then
    ## init php extensions
    # echo "Enable php extensions : $PHP_ENABLE_EXTENSIONS"
    /opt/fatphp/bin/php-ext-config init
    touch /root/.fatphp-inited
    echo "$PHP_ENABLE_EXTENSIONS" > /root/.fatphp-inited
    chmod 600 /root/.fatphp-inited
fi
runuser -l www-data -c 'nvm use $NVM_USE_NODE_VERSION'

exec "$@"