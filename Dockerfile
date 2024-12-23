FROM php:8.2-cli

COPY /. /var/www/html
RUN apt-get update -y && apt-get install -y

EXPOSE 80