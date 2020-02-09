
# docker build --no-cache -t pigochu/fat-php:7.4-centos7 -t pigochu/fat-php:7.4-cli-centos7 -f build/7.3/centos7/Dockerfile .
docker build -t pigochu/fat-php:7.4-centos7 -t pigochu/fat-php:7.4-cli-centos7 -f build/7.4/centos7/Dockerfile .
docker build -t pigochu/fat-php:7.4-apache-centos7 -f build/7.4/centos7/Dockerfile-apache .
docker build -t pigochu/fat-php:7.4-fpm-centos7 -f build/7.4/centos7/Dockerfile-fpm .
docker build -t pigochu/fat-php:7.4-nginx-centos7 -f build/7.4/centos7/Dockerfile-nginx .