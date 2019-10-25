#!/bin/bash

rm -rf /root/test
mkdir -p /root/test
cd /root/test
composer global require "fxp/composer-asset-plugin:~1.2.0"
composer create-project --prefer-dist yiisoft/yii2-app-basic:2.0.22 basic
cd basic
php yii serve --host=0.0.0.0 --port=9801