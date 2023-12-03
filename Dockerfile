# Use a imagem base do PHP com Apache
FROM php:7.4-apache

# Instale as extensões necessárias do PHP
RUN docker-php-ext-install mysqli

# Ative o mod_rewrite para o Apache
RUN a2enmod rewrite

# Copie os arquivos do CodeIgniter para o contêiner
COPY . /var/www/html

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Exponha a porta 80
EXPOSE 80
