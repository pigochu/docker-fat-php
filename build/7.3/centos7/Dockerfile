# Fat-PHP Docker image
# Fat-PHP on CentOS 7 use remi repository
FROM centos:7

# some php extensions are disabled , if you want to enable , set PHP_ENABLE_EXTENSIONS like:
# PHP_ENABLE_EXTENSIONS="mysqli,pdo_mysql,xdebug"

# APP_ROOT : Your appication root
# WWW_ROOT : Nginx or Apache Document root
ENV PHP_ENABLE_EXTENSIONS="" \
    PHP_FPM_LISTEN="0.0.0.0:9000" \
    APP_ROOT="/var/www/html" \
    WWW_ROOT="/var/www/html" \
    RUN_USER="www-data" \
    COMPOSER_ALLOW_SUPERUSER=1 \
    CONTAINER_OS=centos7
ENV PATH=$APP_ROOT:$APP_ROOT/vendor/bin:/root/.composer/vendor/bin:$PATH


WORKDIR $APP_ROOT





RUN echo $'[mariadb] \n\
name = MariaDB \n\
baseurl = http://yum.mariadb.org/10.4/centos7-amd64 \n\
gpgkey=https://yum.mariadb.org/RPM-GPG-KEY-MariaDB \n\
gpgcheck=1 \n\
enabled=1' > /etc/yum.repos.d/MariaDB.repo && \
    yum upgrade -y && \
    yum install -y epel-release && \
	rpm -Uvh https://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
	yum-config-manager --enable remi remi-php73 && \
    curl -sL https://rpm.nodesource.com/setup_12.x | bash - && \
    yum install -y \
        apache \
        mod_php \
        php-cli \
        php-fpm \
        nginx \
        nginx-mod-http-perl \
        composer \
        nodejs \
        git \
        gettext \
        net-tools \
        inotify-tools \
        unzip \
        crontabs \
        mariadb \
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
        php-soap \
        php-tidy \
        php-xml \
        php-mbstring \
        php-oci8 \
        php-odbc \
        php-process \
        php-pecl-apcu \
        php-pecl-event \
        php-pecl-inotify \
        php-pecl-mongodb \
        php-pecl-rar \
        php-pecl-zip \
        php-pecl-ssh2 \
        php-pecl-swoole4 \
        php-pecl-imagick \
        php-pecl-protobuf \
        php-pecl-xdebug && \
    yum clean all


COPY ["common-files", "/opt/"]


RUN sed -i -e '/pam_loginuid.so/s/^/#/' /etc/pam.d/crond && \
# create folder
    mkdir -p /opt/fatphp/bin && \
    cp -Rf /opt/override/etc/* /etc && \
    ln -s /opt/fatphp/bin/httpd-foreground /usr/local/bin/httpd-foreground && \
    ln -s /opt/fatphp/bin/nginx-foreground /usr/local/bin/nginx-foreground && \
    ln -s /opt/fatphp/bin/crond-foreground /usr/local/bin/crond-foreground && \
    mkdir -p /root/.npm && \
    mkdir -p /root/.composer && \
    rm /etc/nginx/nginx.conf && \
    rm /var/log/yum.log && \
    rm -rf /opt/override && \
# permissions
    groupadd -g 1000 $RUN_USER && \
    useradd -u 1000 -g $RUN_USER $RUN_USER && \
    chmod +x /opt/fatphp/bin/* && \
    chown -Rf root:$RUN_USER /var/lib/php && \
    chown $RUN_USER /var/run/httpd && \
    chown -Rf $RUN_USER /var/run/httpd/* &&\
    chmod 755 /root/.npm && \
    chmod 755 /root/.composer && \
    chmod 755 -Rf /opt/fatphp && \
    chmod 644 /opt/fatphp/templates/*.template && \
    PHP_INI_SCAN_DIR=/tmp /opt/fatphp/bin/php-ext-config docker-build




# xdebug use 9009 , because php-fpm use 9000
EXPOSE 9009

ENTRYPOINT [ "/opt/fatphp/bin/entrypoint.sh" ]
CMD ["php" , "-a"]