
docker build --no-cache -t pigochu/fat-php:5.6-centos7 -t pigochu/fat-php:5.6-cli-centos7 -f build/5.6/centos7/Dockerfile .
# docker build -t pigochu/fat-php:5.6-centos7 -t pigochu/fat-php:5.6-cli-centos7 -f build/5.6/centos7/Dockerfile .
docker build -t pigochu/fat-php:5.6-apache-centos7 -f build/5.6/centos7/Dockerfile-apache .
docker build -t pigochu/fat-php:5.6-fpm-centos7 -f build/5.6/centos7/Dockerfile-fpm .
docker build -t pigochu/fat-php:5.6-nginx-centos7 -f build/5.6/centos7/Dockerfile-nginx .