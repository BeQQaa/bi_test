FROM debian:bullseye
LABEL maintaner="Oleg_Butskyi_BeQQaa"

ENV php='php8.2'
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y --no-install-recommends curl wget gnupg2 ca-certificates lsb-release apt-transport-https debian-archive-keyring php-sqlite3
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg &&\
    sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'

RUN apt-get update && apt-get  install -y --no-install-recommends  \
    $php-fpm $php-cli $php-common $php-mysql $php-zip $php-gd $php-mbstring $php-curl $php-xml $php-bcmath

RUN curl https://nginx.org/keys/nginx_signing.key | gpg --dearmor | tee /usr/share/keyrings/nginx-archive-keyring.gpg >/dev/null

RUN gpg --dry-run --quiet --no-keyring --import --import-options import-show /usr/share/keyrings/nginx-archive-keyring.gpg

RUN echo "deb [signed-by=/usr/share/keyrings/nginx-archive-keyring.gpg] \
    https://nginx.org/packages/debian `lsb_release -cs` nginx" \
        | tee /etc/apt/sources.list.d/nginx.list

RUN apt-get update && apt-get install nginx
RUN apt-get update && apt-get install -y php-sqlite3


RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends supervisor
RUN mkdir -p /var/log/supervisor


COPY /nginx/nginx-default.conf /etc/nginx/conf.d/default.conf
COPY /nginx/nginx.conf /etc/nginx/nginx.conf
COPY /nginx/www.conf /etc/php/8.2/fpm/pool.d/www.conf
COPY /php/php.ini /etc/php/8.2/cli/php.ini
COPY /supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

STOPSIGNAL SIGQUIT

CMD ["/usr/bin/supervisord"]
