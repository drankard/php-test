FROM amazonlinux

RUN yum update -y

RUN yum groupinstall "Development Tools" -y

RUN amazon-linux-extras enable php7.4 nginx1
RUN yum clean metadata

RUN yum install -y php nginx php-{pear,cgi,common,curl,mbstring,gd,mysqlnd,gettext,bcmath,json,xml,fpm,intl,zip,imap}
RUN yum install -y curl poppler-utils rsync zip wget  git unzip mariadb libjpeg-devel libpng-devel  libxml2 libzip-devel libxml2-devel libcurl-devel gettext  openssl-devel


RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN ln -s /usr/local/bin/composer /usr/bin/composer

RUN systemctl enable php-fpm
RUN systemctl enable nginx

USER nginx
RUN mkdir -p /tmp/html

COPY index.php /tmp/html/
COPY composer.json /tmp/html/
WORKDIR /tmp/html/

RUN ls -la 
RUN composer install    
CMD tail -f /dev/null

USER root