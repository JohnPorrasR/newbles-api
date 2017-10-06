<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Newbles

El proyecto se direccionara de la siguiente manera, las cuales se encuentran alineados a los 44 procesos de la Guía de Dirección de Proyectos del PMBOK, los cuales agrupamos por las 10 áreas de conocimiento y los 5 grupos de Procesos, asimismo cabe resaltar que cada proceso cuenta con Entradas y Salidas correspondientes.

## Herramientas necesarias

Componentes necesarios para instalación del servicio

- **[php 7](https://www.apachefriends.org/es/download.html)**
- **[Composer](https://getcomposer.org/download/)**
- **[Git](https://git-scm.com/downloads)**

## Instalación del servicio

1. Instalar php
2. Instalar y configurar composer
3. Descargar el proyecto con git
4. Abrir la terminal en la carpeta del proyecto y ejecutar:
    ```php
        composer install
    ```
5. Conectar con la base de datos
    - **Copiar el archivo .env.example y cambiar de nombre por .env**
        - **DB_CONNECTION=mysql**
        - **DB_HOST=127.0.0.1**
        - **DB_PORT=3306**
        - **DB_DATABASE=DB_DATABASE**
        - **DB_USERNAME=DB_USERNAME**
        - **DB_PASSWORD=DB_PASSWORD**
6.  Generar llave en Laravel
    ```php
        php artisan key:generate
    ```
7. Ver lista de las rutas habiles
    ```php
        php artisan route:list
    ```
8. Ejecutar el servidor de Laravel
    ```php
        php artisan serve
    ```
