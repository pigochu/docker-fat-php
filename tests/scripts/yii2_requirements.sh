#!/bin/bash

rm -rf /root/test
mkdir -p /root/test
cd /root/test

composer -vv create-project --prefer-dist yiisoft/yii2-app-basic basic
cd basic
php yii serve 0.0.0.0 --port=9801