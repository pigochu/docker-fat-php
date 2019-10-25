# Docker Fat-PHP #

Fat-PHP is a project for PHP developers that contains most of the commonly used development tools, so the image size is very large .

## Support Tags ##

- 7.3-centos7 : php 7.3 on CentOS 7

## Usage ##


### Example 1: php-cli list extensions and enable pdo_sqlite & xdebug ###

    ~~~bash
    docker run --rm --env "ENABLE_PHP_EXTENSIONS=pdo_sqlite,xdebug"  pigochu/fat-php:7.3-centos7 php -m
    ~~~

### Example 2: php-fpm on background and enable yii2 support,apcu,imagick,zip and expose port 9000 ###

    ~~~bash
    docker run -d --env "ENABLE_PHP_EXTENSIONS=@yii2,apcu,imagick,zip" -p "9000:9000" pigochu/fat-php:7.3-centos7 php-fpm
    ~~~

### Example 3: apache (mod_php with opcache enabled) and expose port 80 ###

    ~~~bash
    docker run -d --env "ENABLE_PHP_EXTENSIONS=opcache"  -p "80:80" pigochu/fat-php:7.3-centos7 httpd-foreground
    ~~~

### Example 4: docker-compose nginx + php-fpm + crontab ###

1. Create a test project folder and index.php

~~~text
mkdir test
cd test
echo "<?php phpinfo(); " > index.php
~~~

2. Create a cron file , ex: echo time to /var/www/html/now.txt at every minute

~~~
* * * * * echo $(date +"%T") > /var/www/html/now.txt
~~~

3. Create docker-compose.yml in project root and content is:

~~~yaml
    Version: 3.5
    services:
        nginx:
            image: pigochu/fat-php:7.3-centos7
            container_name: test_nginx
            volumes:
                - www-data: /var/www/html
            links:
                - fpm
        cron:
            image: pigochu/fat-php:7.3-centos7
            container_name: test_cron
            links:
                - fpm
            volumes:
                - ./cron-test /etc/cron.d/cron-test
        fpm:
            image: pigochu/fat-php:7.3-centos7
            container_name: test_fpm
            volumes:
                - www-data: ./

    volumes:
        www-data:
~~~



3. Run command

~~~bash
docker-compose up -d
~~~

## Included packages ##

- apache with mod_php (run as user www-data)
- nginx (run as user www-data)
- cron
- git
- php-cli
- php-fpm (run as user www-data)
- mariadb client
- pgsql client
- composer
- nodejs & npm

## Included php extensions ##

Some extensions are disabled , if you want to enable , please set enviroment ENABLE_PHP_EXTENSIONS , ex :

~~~bash
ENABLE_PHP_EXTENSIONS="pdo_sqlite,xdebug"
~~~

For framework or app minimum requirements , ex yii2 and pdo_mysql support , you can do this:

~~~bash
ENABLE_PHP_EXTENSIONS="@yii2,pdo_mysql"
~~~

Framework list :

- @yii2: Yii framework 2 minimum requirements
- @yii2-mysql: Yii framework 2 minimum requirements +  mysql support
- @laravel : Laravel framework minimum requirements
- @laravel-mysql : Laravel framework minimum requirements + mysql support
- @phpmyadmin : phpmyadmin minimum requirements

### Always enabled extensions ###

- curl
- ctype
- gettext
- json
- mbstring
- openssl
- phar

### Disabled extensions ###

- apcu
- bcmath
- bz2
- event
- exif
- gd
- gmp
- ftp
- fileinfo
- iconv
- intl
- ldap
- mongodb
- mysqli
- mysqlnd
- odbc
- oci8
- opcache
- pdo_mysql
- pdo_pgsql
- pdo_sqlite
- pdo_oci
- protobuf
- pgsql
- phpiredis (redis client , laravel use it)
- snmp
- sqlite3
- swoole4
- tokenizer
- xdebug ( port is 9009 , because php-fpm's port is 9000 )
- xsl
- zip

## Build Image ##

1. change workdir to project root
2. Execute the following command

~~~bash
docker build -t pigochu/fat-php:7.3-centos7 build/7.3/centos7
~~~

## Author ##

Pigo Chu <pigochu@gmail.com>

## Build Image ##

In project root folder , run command:

~~~bash
docker build -t pigochu/fat-php:7.3-centos7 -f build/7.3/centos7/Dockerfile .
~~~