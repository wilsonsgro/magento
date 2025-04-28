FROM alpine:3.20

USER root

RUN apk --no-cache add \
php82 \
php82-pdo \
php82-pdo_mysql \
php82-mysqlnd \
php82-opcache \
php82-xml \
php82-simplexml \
php82-pecl-mcrypt \
php82-gd \
php82-intl \
php82-mbstring \
php82-phar \
php82-dom \
php82-session \
php82-xmlwriter \
php82-bcmath \
php82-tokenizer \
php82-json \
php82-sockets \
php82-iconv \
php82-xsl \
php82-curl \
php82-soap \
php82-zip \
php82-fpm \
php82-ctype \
php82-imap \
php82-xmlreader \
php82-fileinfo \
php82-sodium \
apache2 \
apache2-utils \
apache2-proxy \
busybox-extras \
bash \
curl \
coreutils \
fcgi \
fuse \
graphviz \
gcc \
git \
iputils \
jq \
libssh2 \
libssh2-dev \
mysql-client \
musl-dev \
net-tools \
netcat-openbsd \
patch \
python3 \
rsync \
ssmtp \
tcptraceroute \
tzdata \
unzip \
which

#lib causing issue with stock alpire repo version
RUN apk --no-cache add \
        libsodium \
        php-apcu  \
        php-ssh2

RUN cp /usr/share/zoneinfo/Europe/Rome /etc/localtime

#fix for iconv alpine
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/v3.13/community/ --allow-untrusted gnu-libiconv=1.15-r3 
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php


#Create php user
RUN chmod g=u /etc/passwd && \
addgroup -S php && adduser -S php -G php

COPY start.sh /start.sh

RUN chmod 777 /start.sh

RUN mkdir -p /run/php-fpm && \
chown -R php /run/php-fpm \
 /var/www \
 /var/log/ && \
chmod -R 777 /var/www \
/var/log/

# install locale
RUN apk add --no-cache \
    cmake make musl-dev gcc gettext-dev libintl \
    && wget https://gitlab.com/rilian-la-te/musl-locales/-/archive/master/musl-locales-master.zip \
    && unzip musl-locales-master.zip \
      && cd musl-locales-master \
      && cmake -DLOCALE_PROFILE=OFF -D CMAKE_INSTALL_PREFIX:PATH=/usr . && make && make install \
      && cd .. && rm -r musl-locales-master

RUN apk add php82-pecl-xdebug --repository https://dl-cdn.alpinelinux.org/alpine/v3.20/community
RUN apk add perl-alien-libxml2 --repository https://dl-cdn.alpinelinux.org/alpine/v3.20/community
RUN apk add icu-dev icu-libs icu-data-full
RUN apk --update add imagemagick imagemagick-dev
RUN apk add php82-pecl-imagick --repository https://dl-cdn.alpinelinux.org/alpine/edge/community 




WORKDIR /var/www/

RUN mkdir -p /var/log/php-fpm \
/var/log/php
RUN touch /var/log/php/error.log
RUN chmod 777 /var/log/php/error.log

EXPOSE 9000

CMD /start.sh
