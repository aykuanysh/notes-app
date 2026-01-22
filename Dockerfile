FROM php:8.4-cli

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /app

# Копируем проект в контейнер
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install --no-interaction --prefer-dist

# Открываем порт
EXPOSE 8000

# Запуск сервера Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
