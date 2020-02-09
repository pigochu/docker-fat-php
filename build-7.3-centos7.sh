
# docker build --no-cache -t pigochu/fat-php:7.3-centos7 -t pigochu/fat-php:7.3-cli-centos7 -f build/7.3/centos7/Dockerfile .
docker build -t pigochu/fat-php:7.3-centos7 -t pigochu/fat-php:7.3-cli-centos7 -f build/7.3/centos7/Dockerfile .
docker build -t pigochu/fat-php:7.3-apache-centos7 -f build/7.3/centos7/Dockerfile-apache .
docker build -t pigochu/fat-php:7.3-fpm-centos7 -f build/7.3/centos7/Dockerfile-fpm .
docker build -t pigochu/fat-php:7.3-nginx-centos7 -f build/7.3/centos7/Dockerfile-nginx .