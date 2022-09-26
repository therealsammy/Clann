FROM php:8.0-apache
COPY site/ var/www/html
RUN echo "SeverName localhost" >> /etc/apache2/apache2.conf
EXPOSE 80