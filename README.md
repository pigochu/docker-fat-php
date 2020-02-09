# Docker Fat-PHP #

Fat-PHP is a docker image for PHP developers that contains most of the commonly used development tools, so the image size is very large .

## Support Tags ##

- 7.3-centos7 : php 7.3 on CentOS 7 , CMD is "php -i"
- 7.3-cli-centos7 : The same as 7.3-centos7
- 7.3-apache-centos7 : build from 7.3-centos7 , CMD is "httpd-foreground" , mod_php is enabled.
- 7.3-fpm-centos7 : build from  7.3-centos7 , CMD is "php-fpm"
- 7.3-nginx-centos7 : build from  7.3-centos7 , CMD is "nginx-forgeround"

apache / fpm / nginx is not a new image , it just extended 7.3-centos7 image , so you don't care download too large size images.


## Usage ##


### Example 1: php-cli list extensions and enable pdo_sqlite & xdebug ###

~~~bash
docker run --rm --env "PHP_ENABLE_EXTENSIONS=pdo_sqlite,xdebug"  pigochu/fat-php:7.3-centos7 php -m
~~~

### Example 2: php-fpm on background and enable yii2 support,apcu,imagick,zip and expose port 9000 ###

~~~bash
docker run -d --env "PHP_ENABLE_EXTENSIONS=@yii2,apcu,imagick,zip" -p "9000:9000" pigochu/fat-php:7.3-centos7 php-fpm
~~~

or use tag 7.3-fpm-centos7

~~~bash
docker run -d --env "ENABLE_PHP_EXTENSIONS=@yii2,apcu,imagick,zip" -p "9000:9000" pigochu/fat-php:7.3-fpm-centos7
~~~

### Example 3: apache (mod_php with opcache enabled) and expose port 80 ###

~~~bash
docker run -d --env "PHP_ENABLE_EXTENSIONS=opcache"  -p "80:80" pigochu/fat-php:7.3-centos7 httpd-foreground
~~~

or use tag 7.3-apache-centos7

~~~bash
docker run -d --env "PHP_ENABLE_EXTENSIONS=opcache"  -p "80:80" pigochu/fat-php:7.3-apache-centos7
~~~

### Example 4: docker-compose nginx + php-fpm  ###

Please check folder **tests** , in docker-compose.yml define nginx and phpfpm. You can run command:

~~~bash
cd tests
docker-compose up nginx
~~~

After service started , open url http://localhost:8900 will show phpinfo.

### Example 5: docker-compose crond ###

Please check folder **tests** , in docker-compose.yml define cron service. You can run command:

~~~bash
cd tests
docker-compose up cron
~~~

This example will write time to tests/html/time.html every minute.

## Included packages ##

- apache with mod_php (run as user www-data) and mod_ssl
- nginx (run as user www-data)
- cronie
- git
- php-cli
- php-fpm (run as user www-data)
- mariadb(mysql) client
- composer
- nodejs (v12.x LTS) & npm
- net-tools
- inotify-tools

## Included php extensions ##

Some extensions are disabled , if you want to enable , please set enviroment ENABLE_PHP_EXTENSIONS , ex :

~~~bash
ENABLE_PHP_EXTENSIONS="pdo_sqlite,xdebug"
~~~

For framework or app minimum requirements , ex yii2(with pdo_mysql extension) and xdebug support , you can do this:

~~~bash
ENABLE_PHP_EXTENSIONS="@yii2-mysql,xdebug"
~~~

###### Currently supported framework:

- @yii2: Yii framework 2 minimum requirements
- @yii2-mysql: Yii framework 2 minimum requirements +  mysql support
- @laravel : Laravel framework minimum requirements
- @laravel-mysql : Laravel framework minimum requirements + mysql support

### Always enable extensions ###

- calendar
- curl
- ctype
- dom
- gettext
- json
- mcrypt (only for php 5.6)
- mbstring
- openssl
- pcntl
- phar
- posix
- sockets

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
- mysql (only for php 5.6)
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
- rar
- ssh2
- shmop
- simplexml
- snmp
- soap
- sqlite3
- swoole (v2.0 for php5.6 , v4.0 for php7.3)
- sysvmsg
- sysvsem
- sysvshm
- tokenizer
- xdebug (port is 9009)
- xmlreader
- xmlwriter
- xsl
- zip

## Author ##

Pigo Chu <pigochu@gmail.com>

## Build Image ##

~~~sh
./build-7.3-centos7.sh
~~~