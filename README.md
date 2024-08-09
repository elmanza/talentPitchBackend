# Talent Pitch API

## Descripción

Talent Pitch API es una API que permite a los usuarios participar en desafíos (challenges) mediante la presentación de videos. Los jueces asignados a los desafíos pueden calificar los videos, y los usuarios pueden dar "likes" a los videos. Los usuarios también pueden crear videos llamados "pitch" sobre sus talentos, los cuales no están asociados a ningún desafío.

## Requisitos

- **PHP**: 8.2.7
- **Composer**: 2.5.8
- **Base de datos**: Debe crear una base de datos con `default charset utf8mb4` y `default_collation utf8mb4_0900_ai_ci`.
- **Laravel**: 10.x

## Instalación

1. Clona este repositorio:

    ```bash
    git clone https://github.com/tuusuario/talent-pitch-api.git
    cd talent-pitch-api
    ```

2. Instala las dependencias:

    ```bash
    composer install
    ```

3. Configura el archivo `.env`:

    - Copia el archivo `.env.example` a `.env`:
    
        ```bash
        cp .env.example .env
        ```
    
    - Modifica las siguientes variables en el archivo `.env`:
    
        ```env
        DB_PORT=3306
        DB_DATABASE=nombre_de_tu_base_de_datos
        DB_USERNAME=tu_usuario
        DB_PASSWORD=tu_contraseña
        ```
4. Ejecuta el comando personalizado para migrar, seedear la base de datos e iniciar el servidor:

    ```bash
    php artisan serve:migrate
    ```

   Este comando ejecutará las migraciones para crear las tablas necesarias, llenará la base de datos con datos de prueba utilizando los seeders, y luego iniciará el servidor de desarrollo.

5. ó Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

## Rutas de la API

Todas las rutas de la API están prefijadas con `/api/v1`. Aquí tienes un resumen de las rutas disponibles:

### Role

- `GET /role`: Lista todos los roles.
- `GET /role/{id}`: Muestra un rol específico.
- `POST /role`: Crea un nuevo rol.
- `PUT /role/{id}`: Actualiza un rol existente.
- `DELETE /role/{id}`: Elimina un rol.

### Main Goal

- `GET /main-goal`: Lista todos los objetivos principales.
- `GET /main-goal/{id}`: Muestra un objetivo principal específico.
- `POST /main-goal`: Crea un nuevo objetivo principal.
- `PUT /main-goal/{id}`: Actualiza un objetivo principal existente.
- `DELETE /main-goal/{id}`: Elimina un objetivo principal.

### Achievement

- `GET /achievement`: Lista todos los logros.
- `GET /achievement/{id}`: Muestra un logro específico.
- `POST /achievement`: Crea un nuevo logro.
- `PUT /achievement/{id}`: Actualiza un logro existente.
- `DELETE /achievement/{id}`: Elimina un logro.

### Audience Category

- `GET /audience-category`: Lista todas las categorías de audiencia.
- `GET /audience-category/{id}`: Muestra una categoría de audiencia específica.
- `POST /audience-category`: Crea una nueva categoría de audiencia.
- `PUT /audience-category/{id}`: Actualiza una categoría de audiencia existente.
- `DELETE /audience-category/{id}`: Elimina una categoría de audiencia.

### Audience

- `GET /audience`: Lista todas las audiencias.
- `GET /audience/{id}`: Muestra una audiencia específica.
- `POST /audience`: Crea una nueva audiencia.
- `PUT /audience/{id}`: Actualiza una audiencia existente.
- `DELETE /audience/{id}`: Elimina una audiencia.

### Language

- `GET /language`: Lista todos los idiomas.
- `GET /language/{id}`: Muestra un idioma específico.
- `POST /language`: Crea un nuevo idioma.
- `PUT /language/{id}`: Actualiza un idioma existente.
- `DELETE /language/{id}`: Elimina un idioma.

### Users

- `GET /users`: Lista todos los usuarios.
- `GET /users/{id}`: Muestra un usuario específico.
- `POST /users`: Crea un nuevo usuario.
- `PUT /users/{id}`: Actualiza un usuario existente.
- `DELETE /users/{id}`: Elimina un usuario.

  - **User Achievements**
    - `GET /users/achievement/{id}`: Muestra un logro de usuario específico.
    - `POST /users/achievement`: Asocia un logro a un usuario.
    - `DELETE /users/achievement/{id}`: Elimina un logro de usuario.

  - **User Audience**
    - `GET /users/audience/{id}`: Muestra una audiencia de usuario específica.
    - `POST /users/audience`: Asocia una audiencia a un usuario.
    - `DELETE /users/audience/{id}`: Elimina una audiencia de usuario.

### Challenge

- `GET /challenge`: Lista todos los desafíos.
- `GET /challenge/{id}`: Muestra un desafío específico.
- `POST /challenge`: Crea un nuevo desafío.
- `PUT /challenge/{id}`: Actualiza un desafío existente.
- `DELETE /challenge/{id}`: Elimina un desafío.

  - **Challenge Participants**
    - `GET /challenge/participant/{id}`: Muestra un participante de un desafío específico.
    - `POST /challenge/participant`: Asocia un participante a un desafío.
    - `DELETE /challenge/participant/{id}`: Elimina un participante de un desafío.

  - **Challenge Judge**
    - `GET /challenge/judge/{id}`: Muestra un juez de un desafío específico.
    - `POST /challenge/judge`: Asocia un juez a un desafío.
    - `DELETE /challenge/judge/{id}`: Elimina un juez de un desafío.

### Video

- `GET /video`: Lista todos los videos.
- `GET /video/{id}`: Muestra un video específico.
- `POST /video`: Crea un nuevo video.
- `PUT /video/{id}`: Actualiza un video existente.
- `DELETE /video/{id}`: Elimina un video.

  - **Video Challenge**
    - `GET /video/challenge/{id}`: Muestra un video relacionado con un desafío específico.
    - `POST /video/challenge`: Asocia un video a un desafío.
    - `DELETE /video/challenge/{id}`: Elimina un video de un desafío.

  - **Video Challenge Rate**
    - `GET /video/challenge-rate/{id}`: Muestra una calificación de un video en un desafío específico.
    - `POST /video/challenge-rate`: Asocia una calificación a un video en un desafío.
    - `DELETE /video/challenge-rate/{id}`: Elimina una calificación de un video en un desafío.

  - **Video Likes**
    - `GET /video/like/{id}`: Muestra los "likes" de un video específico.
    - `POST /video/like`: Asocia un "like" a un video.
    - `DELETE /video/like/{id}`: Elimina un "like" de un video.

## Estructura del Proyecto

El proyecto sigue una arquitectura basada en servicios y repositorios, donde la lógica de negocio se encapsula en **Servicios** (App\Services), y los controladores son responsables de manejar las solicitudes HTTP y delegar la lógica a los servicios correspondientes.

### Controladores

Todos los controladores extienden de una clase base `BaseController` que proporciona las operaciones CRUD comunes. Esto evita la repetición de código y permite una implementación más limpia y mantenible.

### Servicios

Todos los servicios extienden de `BaseServices`, que proporciona la implementación básica de CRUD. Los servicios específicos para cada modelo se definen en `App\Services` y contienen la lógica de negocio específica para cada recurso.

## Comando Personalizado

El proyecto incluye un comando personalizado `php artisan serve:migrate` que ejecuta las migraciones y los seeders para poblar la base de datos, seguido de la inicialización del servidor de desarrollo.

## Cómo Contribuir

1. Crea un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios.
4. Haz un commit (`git commit -am 'Agrega nueva funcionalidad'`).
5. Empuja tu rama (`git push origin feature/nueva-funcionalidad`).
6. Crea un Pull Request.

## Licencia

Este proyecto está bajo la [Licencia MIT](LICENSE).

