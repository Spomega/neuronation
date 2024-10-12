FROM php:8.3-apache

WORKDIR /var/www/neuronation

RUN apt-get update && apt-get install -y \
    build-essential \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl


ADD app.neuronation.conf /etc/apache2/sites-available/

RUN a2ensite app.neuronation.conf && \
	a2dissite 000-default.conf  &&  \
	a2dissite default-ssl.conf

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/neuronation/

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/neuronation/storage

EXPOSE 80

CMD ["apache2-foreground"]
