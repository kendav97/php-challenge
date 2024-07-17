# PHP Challenge  
<p align="left">
<img src="https://img.shields.io/badge/Autor-Kenneth_Gonzalez-brightgreen?style=flat&logo=codementor&logoColor=%23959da5
" alt="Build Status">
<img src="https://img.shields.io/badge/laravel-v10.48.16-blue?style=flat&logo=laravel" alt="Laravel Version">
</p>
Este es un desafío de PHP y laravel para demostrar mis habilidades como programador.

## Tabla de contenidos  
1. [Introduction](#introduction)  
2. [Some paragraph](#paragraph1)  
    1. [Sub paragraph](#subparagraph1)  
3. [Another paragraph](#paragraph2)

## Pre requisitos

- Tener docker instalado
- Hacerse una cuenta y generar una clave de acceso a la API de Giphy, leer la siguiente [documentación](https://developers.giphy.com/docs/api#quick-start-guide)

## Ejecutar en entorno local

Clonar el proyecto  

~~~bash  
  git clone https://github.com/kendav97/php-challenge.git
~~~

Ingresar al directorio del proyecto

~~~bash  
  cd php-challenge
~~~

Iniciar docker

~~~bash  
docker compose buld
docker compose up -d
~~~

Instalar dependencias

~~~bash
docker compose exec app bash
composer install
cp .env.example .env
cp .env.example .env.testing
~~~

Editar `.env` y `.env.testing` 

`API_KEY`  

`ANOTHER_API_KEY` 

## Acknowledgements  

- [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
- [Awesome README](https://github.com/matiassingers/awesome-readme)
- [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)

## Feedback  

If you have any feedback, please reach out to us at fake@fake.com

## License  

[MIT](https://choosealicense.com/licenses/mit/)
