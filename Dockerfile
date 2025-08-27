# Estágio 1: Build com Composer
# Usa a imagem oficial do Composer para instalar as dependências
FROM composer:2 AS builder

WORKDIR /app

# Copia os arquivos de dependência primeiro
COPY composer.json composer.lock ./

# Instala as dependências de produção, sem scripts de dev
RUN composer install --no-dev --no-scripts --no-autoloader

# Copia o resto da aplicação
COPY . .

# Gera o autoloader otimizado do Composer
RUN composer dump-autoload --optimize


# Estágio 2: Imagem final de produção
# Parte de uma imagem oficial do PHP com FPM, que é otimizada para web
FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Instala as dependências do sistema e as extensões PHP necessárias para o Lumen e PostgreSQL
RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia os arquivos da aplicação e as dependências do estágio anterior
COPY --from=builder /app .

# Expõe a porta que a aplicação vai usar
EXPOSE 8000

# Comando para iniciar o servidor embutido do PHP
# Ele vai escutar em 0.0.0.0 para ser acessível de fora do container
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
