FROM ubuntu:18.04

ENV TZ="America/Lima"
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt -yqq update && \
    apt -yqq install software-properties-common && \
    add-apt-repository -y ppa:ondrej/php && \
    apt -yqq update && \
    apt -yqq install php5.6 php5.6-mysql php5.6-gd php5.6-mcrypt php5.6-mbstring php5.6-xml php5.6-sqlite3 apache2 libapache2-mod-php5.6 && \
    rm -rf /var/lib/apt/lists/* && \
    apt autoclean && apt clean

#RUN bash -c "debconf-set-selections <<< 'mariadb-server mariadb-server/root_password password Tec5201.'"
#RUN bash -c "debconf-set-selections <<< 'mariadb-server mariadb-server/root_password_again password Tec5201.'"
RUN apt -yqq update && \
    apt -yqq install dialog mariadb-server git && \
    rm -rf /var/lib/apt/lists/* && \
    apt autoclean && apt clean

# INSTALL COMPOSER
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# COPY AND CONFIG PROJECT
WORKDIR /var/www/html/
RUN rm -R /var/www/html/*
COPY . /var/www/html/
RUN composer install
RUN cp .env.example .env && php artisan key:generate
RUN sed -i 's/DB_DATABASE=homestead/DB_DATABASE=tienda/g' .env
RUN sed -i 's/DB_USERNAME=homestead/DB_USERNAME=root/g' .env
RUN sed -i 's/DB_PASSWORD=secret/DB_PASSWORD=admin/g' .env

# CONFIG DATABASE PASSWORD
# AND MIGRATE PROJECT DATABASE
RUN service mysql restart && \
    echo "create database tienda; use mysql; UPDATE mysql.user SET Password=PASSWORD('admin') WHERE User='root'; GRANT ALL ON tienda.* TO root@localhost IDENTIFIED BY 'admin'; FLUSH privileges;" | mysql -u root
RUN sed -i 's/password =/password = admin/g' /etc/mysql/debian.cnf && \
    service mysql restart && \
    php artisan migrate

#RUN php artisan migrate

EXPOSE 80
EXPOSE 8000

CMD ["sh","-c","service apache2 restart && service mysql restart && php artisan serve --host 0.0.0.0"]
# CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]