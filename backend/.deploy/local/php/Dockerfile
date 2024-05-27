# Используем образ PHP на базе Alpine Linux
FROM php:8.2-fpm-alpine

WORKDIR /app

# Обновляем пакеты и устанавливаем необходимые зависимости
RUN apk update && apk add \
    supervisor \
    build-base \
    bash \
    curl

# Устанавливаем инструмент для удобной установки PHP расширений
RUN curl -sSLf \
    -o /usr/local/bin/install-php-extensions \
    https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions

# Устанавливаем необходимые PHP расширения
RUN install-php-extensions pdo pdo_pgsql gd

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем файлы Laravel приложения в контейнер
COPY --chown=www-data:www-data ./laravel /app

# Добавляем пользовательские настройки php.ini
COPY ./.deploy/local/php.ini /usr/local/etc/php/conf.d/40-custom.ini

# Добавляем пользовательские настройки supervisor
COPY ./.deploy/local/supervisor.ini /etc/supervisor/supervisord.conf
COPY ./.deploy/local/supervisor.ini /etc/supervisor/conf.d/supervisord.conf

# Очищаем кеш apk и удаляем ненужные файлы
RUN rm -rf /var/cache/apk/* && docker-php-source delete

# Устанавливаем порт для контейнера
EXPOSE 9000
