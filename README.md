
# Inicialización de trazabilidApp

## Requisitos previos
- PHP >= 7.3
- Composer

## Pasos para la inicialización

1. Navega hasta el directorio de tu aplicación:

      ```bash
      cd tu-repositorio
      ```

2. Instala las dependencias de Composer:

      ```bash
      composer install
      ```

3. Crea un archivo `.env` a partir del archivo `.env.example`:

      ```bash
      cp .env.example .env
      ```

4. Genera una clave de aplicación:

      ```bash
      php artisan key:generate
      ```

5. Configura la conexión a la base de datos en el archivo `.env`:

      ```dotenv
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=nombre_de_la_base_de_datos
      DB_USERNAME=usuario_de_la_base_de_datos
      DB_PASSWORD=contraseña_de_la_base_de_datos
      ```

6. Ejecuta las migraciones de la base de datos:

      ```bash
      php artisan migrate
      ```

7. Inicia el servidor de desarrollo:

      ```bash
      php artisan serve
      ```

9. Accede a tu aplicación en tu navegador web en la siguiente URL:

      ```
      http://localhost:8000
      ```

