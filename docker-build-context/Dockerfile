#php7.2-fpm with + git + composer utility
FROM php:7.2-fpm

RUN apt-get update
RUN apt-get install\
        zip\
        wget\
        git\
        -y

COPY install-composer.sh install-composer.sh
COPY move-composer.sh move-composer.sh

RUN ./install-composer.sh\
 && rm ./install-composer.sh

RUN ./move-composer.sh\
 && rm ./move-composer.sh