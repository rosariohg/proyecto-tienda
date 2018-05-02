FROM ubuntu:18.04

ENV TZ="America/Lima"
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt -yqq update && \
    apt install -yqq software-properties-common && \
    add-apt-repository -y ppa:ondrej/php && \
    apt -yqq update && \
    apt install -yqq php5.6 php5.6-mysql php5.6-gd php5.6-mcrypt php5.6-mbstring php5.6-xml php5.6-sqlite3 apache2 libapache2-mod-php5.6 && \
    rm -rf /var/lib/apt/lists/* && \
    apt autoclean && apt clean

#RUN bash -c "debconf-set-selections <<< 'mariadb-server mariadb-server/root_password password Tec5201.'"
#RUN bash -c "debconf-set-selections <<< 'mariadb-server mariadb-server/root_password_again password Tec5201.'"
RUN apt update && \
    apt -yqq install dialog mariadb-server git && \
    rm -rf /var/lib/apt/lists/* && \
    apt autoclean && apt clean

# INSTALL COMPOSER
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html/
RUN rm -R /var/www/html/*
RUN git clone https://github.com/rosariohg/proyecto-tienda.git .
RUN composer install
RUN cp .env.example .env && php artisan key:generate
RUN sed -i 's/DB_DATABASE=homestead/DB_DATABASE=tienda/g' .env
RUN sed -i 's/DB_USERNAME=homestead/DB_USERNAME=root/g' .env
RUN sed -i 's/DB_PASSWORD=secret/DB_PASSWORD=/g' .env
RUN service mysql restart && \
    echo "create database `tienda`;" | mysql -u root -p''

EXPOSE 80

CMD ["service mysql restart"]

#    rm -rf /var/lib/apt/lists/* \
#    apt autoclean \
#    apt clean
