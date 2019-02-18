FROM ubuntu:17.10

RUN apt-get update \
  && apt-get -y install apache2 unzip git mysql-client

RUN apt-get -y --fix-missing  install libapache2-mod-php php php-cli php-xdebug php-mbstring php-mysql postgresql-client sqlite3 php-imagick php-memcached php-pear curl imagemagick php-dev php-phpdbg php-gd npm nodejs node-gyp nodejs-dev php-json php-curl php-sqlite3 php-intl apache2 vim git-core wget libsasl2-dev libssl-dev libcurl4-openssl-dev autoconf g++ make openssl libssl-dev libcurl4-openssl-dev pkg-config libsasl2-dev libpcre3-dev \
  	&& a2enmod headers \
 	&& a2enmod rewrite

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
RUN ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log
RUN mkdir -p $APACHE_RUN_DIR $APACHE_LOCK_DIR $APACHE_LOG_DIR

VOLUME [ "/var/www/html" ]
WORKDIR /var/www/html
##COPY . /var/www/html

EXPOSE 80

ENTRYPOINT [ "/usr/sbin/apache2" ]
CMD ["-D", "FOREGROUND"]
