
# To-Do List en PHP con Docker y MySQL

Una aplicación de lista de tareas sencilla construida en PHP con MySQL como base de datos, usando contenedores Docker para facilitar la configuración y despliegue. La interfaz está diseñada con Bootstrap para una experiencia de usuario mejorada e incluye opciones para agregar, marcar como completadas y eliminar tareas. También se incluye phpMyAdmin para la administración de la base de datos desde el navegador.

## Características

- **Agregar** tareas a la lista
- **Marcar** tareas como completadas
- **Eliminar** tareas de la lista
- **Gestión de la base de datos** usando phpMyAdmin
- Diseño visual mejorado con **Bootstrap**

## Requisitos previos

- [Docker](https://www.docker.com/get-started) y [Docker Compose](https://docs.docker.com/compose/install/)

## Configuración

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/todo-list-docker-php.git
   cd todo-list-docker-php
   ```

2. Crea y levanta los contenedores:
   ```bash
   docker-compose up -d
   ```

3. Accede a la aplicación desde tu navegador en `http://localhost:8080`.

4. Para gestionar la base de datos, ve a `http://localhost:8081` y usa las credenciales configuradas en el archivo `docker-compose.yml`:
   - Usuario: `root`
   - Contraseña: `rootpassword`

## Estructura del Proyecto

- `app/`: Código fuente de la aplicación en PHP
- `mysql/`: Directorio con datos de MySQL y archivo de inicialización `init.sql`
- `docker-compose.yml`: Configuración de los servicios en Docker (PHP, MySQL y phpMyAdmin)

## Uso

### Agregar Tarea
1. Escribe una nueva tarea en el campo de entrada y presiona "Agregar tarea".
   
### Marcar Tarea como Completada
1. Presiona el botón verde `✓` junto a una tarea para marcarla como completada.
   
### Eliminar Tarea
1. Presiona el botón rojo `✗` junto a una tarea para eliminarla de la lista.

## Personalización

Puedes modificar el archivo `init.sql` para cambiar el nombre de la base de datos o los campos de la tabla `tasks` según tus necesidades.

## Apagar el Entorno

Para detener y eliminar los contenedores, ejecuta:
```bash
docker-compose down
```

## Créditos

Desarrollado una aplicación To-Do List utilizando Docker, PHP, MySQL y Bootstrap, para la entrega de la semana número 3 de la asignatura Integración Continua del Politécnico Grancolombiano
