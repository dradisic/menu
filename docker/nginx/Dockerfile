FROM nginx:latest

WORKDIR /var/www/

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

ARG user=laravel
ARG uid=1001

RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN chown -R $user:$user /var/www
