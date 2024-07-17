# PHP Challenge <a name="introduction"></a>
<p align="left">
<img src="https://img.shields.io/badge/Autor-Kenneth_Gonzalez-brightgreen?style=flat&logo=codementor&logoColor=%23959da5
" alt="Build Status">
<img src="https://img.shields.io/badge/laravel-v10.48.16-blue?style=flat&logo=laravel" alt="Laravel Version">
</p>

Este es un desafío de PHP y laravel para demostrar mis habilidades como programador, basandome en [ésta](https://drive.google.com/file/d/1Zr75EPMFhxoyTG1iRi4f5SG931Ng9Bc5/view?usp=drive_link) consigna.

## Tabla de contenidos  
1. [Introducción](#introduction)
2. [Pre requisitos](#pre-requisites)
3. [Ejecutar en entorno local](#run-local)
4. [API Reference](#api-reference)

## Pre requisitos <a name="pre-requisites"></a>

- Tener docker instalado
- Hacerse una cuenta y generar una clave de acceso a la API de Giphy, leer la siguiente [documentación](https://developers.giphy.com/docs/api#quick-start-guide)

## Ejecutar en entorno local <a name="run-local"></a>

- Clonar el proyecto  

  ~~~bash  
  git clone https://github.com/kendav97/php-challenge.git
  ~~~

- Ingresar al directorio del proyecto y configurar

  ~~~bash  
  cd php-challenge
  cp .env.example .env
  cp .env.example .env.testing
  ~~~

- Editar `.env` de la siguiente manera:

  - Escribir una constraseña cualquiera para `DB_PASSWORD`
  - Completar el valor `GIPHY_API_KEY` con la clave de la API de Giphy

- Editar `.env.testing` de la siguiente manera:

  - Reemplazar las siguientes variables:

    ~~~
    DB_CONNECTION=mysql
    DB_HOST=db-test
    DB_PORT=3306
    DB_DATABASE=php-challenge-test
    DB_USERNAME=admin
    DB_PASSWORD=admin
    ~~~

  - Completar el valor `GIPHY_API_KEY` con la clave de la API de Giphy

- Iniciar docker

  ~~~bash
  docker compose build
  docker compose up -d
  ~~~

- Instalar dependencias y generar claves

  ~~~bash
  docker compose exec app bash
  composer install
  php artisan key:generate
  php artisan key:generate --env=testing
  php artisan passport:keys
  php artisan passport:client --personal --name="Personal Access Client"
  php artisan db:seed
  ~~~

- Y por último, correr los tests
  ~~~bash
  php artisan test
  ~~~

## Postman

Para probar esta API simplemente importe [este](https://drive.google.com/file/d/1Hi1ny_yFIlkDBoKr-bZYE26LK2_W235w/download?usp=drive_link) archivo json con postman y en primer lugar pruebe el `login` ya que el mismo le entregará un token (con una duración de 30 minutos) que automáticamente se utilizará en las otras solucitudes.

## API Reference <a name="api-reference"></a>

#### Iniciar sesión  

```http
  POST /api/v1.0/login
```  

| Parámetro | Tipo     | Descripción                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Obligatorio**. Email del usuario |
| `password` | `string` | **Obligatorio**. Contraseña del usuario |

#### Buscar

~~~http
  GET /api/v1.0/giphy/search
~~~

| Parámetro | Tipo     | Descripción                |
| :-------- | :------- | :-------------------------------- |
| `Authorization`  | `string` | **Obligatorio**. Header con token de autorización |
| `query`  | `string` | **Obligatorio**. Valor a buscar |
| `limit` | `number` | Máxima cantidad de resultados |  
| `offset` | `number` | Iniciar desde X resultado |  

#### Encontrar por ID

~~~http
  GET /api/v1.0/giphy/[id]
~~~

| Parámetro | Tipo     | Descripción                |
| :-------- | :------- | :-------------------------------- |
| `Authorization`  | `string` | **Obligatorio**. Header con token de autorización |
| `id`  | `string` | **Obligatorio**. ID a encontrar |

#### Guardar favorito a usuario

~~~http
  POST /api/v1.0/user/[user_id]/favorite
~~~

| Parámetro | Tipo     | Descripción                |
| :-------- | :------- | :-------------------------------- |
| `Authorization`  | `string` | **Obligatorio**. Header con token de autorización |
| `user_id`  | `number` | **Obligatorio**. ID de usuario |
| `gif_id`  | `string` | **Obligatorio**. ID de gif |
| `alias`  | `string` | **Obligatorio**. Apodo |

#### Listar todos los favoritos de todos los usuarios

~~~http
  GET /api/v1.0/user/favorite
~~~

| Parámetro | Tipo     | Descripción                |
| :-------- | :------- | :-------------------------------- |
| `Authorization`  | `string` | **Obligatorio**. Header con token de autorización |

## Documentación adicional

- [Diagrama UML de casos de uso](https://drive.google.com/file/d/1_Cmzt0RZ-lYAotkne72c9TQw4xaya01P/view?usp=drive_link)
- [Diagrama UML de secuencia](https://drive.google.com/file/d/1gM9u5_14SYzrr7kjNi6jVTR4TB1hDZTC/view?usp=drive_link)
- [Diagrama de datos DER](https://drive.google.com/file/d/1mF6HrhUbfx1YJC_s50dYCH49atm8sIu3/view?usp=drive_link)
- [Colección POSTMAN](https://drive.google.com/file/d/1Hi1ny_yFIlkDBoKr-bZYE26LK2_W235w/view?usp=drive_link)
- [DockerFile](https://github.com/kendav97/php-challenge/blob/main/docker-compose/Dockerfile)
