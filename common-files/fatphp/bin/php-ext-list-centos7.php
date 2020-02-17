<?php
return [
        "apcu"          => "40-apcu.ini",
        "opcache"       => "10-opcache.ini" ,
        "xdebug"        => "15-xdebug.ini",
        "bcmath"        => "20-bcmath.ini",
        "bz2"           => "20-bz2.ini",
        "intl"          => "20-intl.ini",
        "gd"            => "20-gd.ini",
        "gmp"           => "20-gmp.ini",
        "event"         => "40-event.ini",
        "exif"          => "20-exif.ini",
        "fileinfo"      => "20-fileinfo.ini",
        "ftp"           => "20-ftp.ini",
        "iconv"         => "20-iconv.ini",
        "inotify"       => "40-inotify.ini",
        "imagick"       => "40-imagick.ini",
        "ldap"          => "20-ldap.ini",
        "mongodb"       => "50-mongodb.ini", 
        "mysqli"        => "30-mysqli.ini",
        "mysqlnd"       => "20-mysqlnd.ini",
        "odbc"          => "20-odbc.ini",
        "oci8"          => "20-oci8.ini",
        "pdo"           => "20-pdo.ini",
        "pdo_sqlite"    => ["20-pdo.ini" , "30-pdo_sqlite.ini"],
        "pdo_mysql"     => ["20-pdo.ini" , "30-pdo_mysql.ini"],
        "pdo_pgsql"     => ["20-pdo.ini" , "30-pdo_pgsql.ini"],
        "pdo_oci"       => ["20-pdo.ini" , "30-pdo_oci.ini"],
        "pdo_odbc"      => ["30-pdo_odbc.ini"],
        "pgsql"         => "20-pgsql.ini",
        "phpiredis"     => "40-phpiredis.ini",
        "protobuf"      => "40-protobuf.ini",
        "rar"           => "40-rar.ini",
        "shmop"         => "20-shmop.ini",
        "simplexml"     => "20-simplexml.ini",
        "snmp"          => "20-snmp.ini",
        "soap"          => "20-soap.ini",
        "sqlite3"       => "20-sqlite3.ini",
        "ssh2"          => "40-ssh2.ini",
        "swoole"        => "40-swoole.ini",
        "sysvmsg"       => "20-sysvmsg.ini",
        "sysvsem"       => "20-sysvsem.ini",
        "sysvshm"       => "20-sysvshm.ini",
        "tidy"          => "20-tidy.ini",
        "tokenizer"     => "20-tokenizer.ini",
        "wddx"          => ["20-xml.ini" , "30-wddx.ini"],
        "xml"           => "20-xml.ini",
        "xmlreader"     => "30-xmlreader.ini",
        "xmlwriter"     => "20-xmlwriter.ini",
        "xsl"           => "20-xsl.ini",
        "zip"           => "40-zip.ini",


        "@laravel"      => [
            "20-bz2.ini",
            "20-iconv.ini",
            "20-intl.ini",
            "20-xml.ini",
            "20-tokenizer.ini",
            "20-xmlwriter.ini",
            "30-xmlreader.ini",
            "40-zip.ini",
            "20-fileinfo.ini",
        ],

        "@laravel-mysql" => [
            "20-bz2.ini",
            "20-iconv.ini",
            "20-intl.ini",
            "20-xml.ini",
            "20-tokenizer.ini",
            "20-xmlwriter.ini",
            "30-xmlreader.ini",
            "40-zip.ini",
            "20-fileinfo.ini",
            "20-pdo.ini" ,"30-pdo_mysql.ini","20-mysqlnd.ini",
        ],

        "@yii2"         => [
            "20-bcmath.ini",
            "20-iconv.ini",
            "20-intl.ini",
            "20-gd.ini",
            "20-tokenizer.ini",
            "20-fileinfo.ini",
            "20-xml.ini",
        ],

        "@yii2-mysql"   => [
            "20-bcmath.ini",
            "20-iconv.ini",
            "20-intl.ini",
            "20-gd.ini",
            "20-tokenizer.ini",
            "20-fileinfo.ini",
            "20-pdo.ini" ,"30-pdo_mysql.ini","20-mysqlnd.ini",
            "20-xml.ini",
        ],

        '@magento2' => [
            "20-bcmath.ini",
            "20-iconv.ini",
            "20-intl.ini",
            "20-gd.ini",
            "20-soap.ini",
            "20-tokenizer.ini",
            "20-fileinfo.ini",
            "20-simplexml.ini",
            "20-xml.ini",
            "20-xmlwriter.ini",
            "20-xsl.ini",
            "40-zip.ini",
            "20-pdo.ini" ,"30-pdo_mysql.ini","20-mysqlnd.ini",
        ]

    ];