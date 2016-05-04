FROM php:5.6-apache
RUN apt-get update && apt-get -y install git && docker-php-ext-install pdo_mysql filter

#debug:
RUN apt-get install nano
RUN /bin/echo "export TERM=xterm-256color" >> /root/.bashrc
VOLUME /var/www/html/

COPY app /var/www/html
COPY apache2.conf /etc/apache2/apache2.conf
