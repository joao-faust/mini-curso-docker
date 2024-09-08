# baixa a imagem do php através do dockerhub
FROM php:8.3.11-apache

# instala o zip para poder utilizar o composer
RUN apt-get update && apt-get install -y \
  zlib1g-dev \
  libzip-dev \
  unzip
RUN docker-php-ext-install zip

# instala drivers php
RUN docker-php-ext-install pdo pdo_mysql

# instala e atualiza o composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update

# define o diretorio onde os arquivos iram ficar no container
WORKDIR /var/www/html

# copia arquivos .php para o workdir definido
COPY . .

EXPOSE 80
