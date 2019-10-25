# Fat-PHP Docker image
# Fat-PHP on CentOS 7 use remi repository
FROM centos:7

# some php extensions are disabled , if you want to enable , set PHP_ENABLE_EXTENSIONS like:
# PHP_ENABLE_EXTENSIONS="mysqli,swoole"
ENV ENABLE_PHP_EXTENSIONS="" \
    RUN_USER="www-data" \
    COMPOSER_ALLOW_SUPERUSER=1 \
    CONTAINER_OS=centos7

RUN yum upgrade -y && \
    yum install -y epel-release && \
	rpm -Uvh https://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
	yum-config-manager --enable remi remi-php73 && \
    yum install -y \
        apache \
        mod_php \
        php-cli \
        php-fpm \
        composer \
        nginx \
        npm \
        git \
        unzip \
        crontabs \
        php-opcache \
        php-bcmath \
        php-gd \
        php-gmp \
        php-intl \
        php-json \
        php-ldap \
        php-pgsql \
        php-phpiredis \
        php-snmp \
        php-tidy \
        php-xml \
        php-mbstring \
        php-oci8 \
        php-odbc \
        php-process \
        php-pecl-apcu \
        php-pecl-event \
        php-pecl-mongodb \
        php-pecl-zip \
        php-pecl-swoole4 \
        php-pecl-imagick \
        php-pecl-protobuf \
        php-pecl-xdebug && \
    yum clean all
# create folder for need
RUN echo "xdebug.remote_port = 9009" >> /etc/php.d/15-xdebug.ini && \
    mkdir -p /opt/fatphp/bin && \
    mkdir -p /root/.npm && \
    mkdir -p /root/.composer && \
    chmod 755 /root/.npm && \
    chmod 755 /root/.composer && \
# change php/apache/nginx permissions
    groupadd -g 1000 www-data && \
    useradd -u 1000 -g www-data www-data && \
    chown -Rf www-data:www-data /var/lib/php && \
    chown www-data /var/run/httpd && \
    chown -Rf www-data /var/run/httpd/*

COPY entrypoint.sh /opt/fatphp/bin/
COPY build/7.3/centos7/httpd-foreground /usr/local/bin
COPY build/7.3/centos7/php-ext-config /opt/fatphp/bin

RUN  PHP_INI_SCAN_DIR=/tmp /opt/fatphp/bin/php-ext-config docker-build

EXPOSE 80
EXPOSE 443
EXPOSE 9000

# xdebug use 9009 , because php-fpm use 9000
EXPOSE 9009

ENTRYPOINT [ "/opt/fatphp/bin/entrypoint.sh" ]
CMD ["php"]