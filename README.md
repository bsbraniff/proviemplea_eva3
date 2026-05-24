# ProviEmplea EVA3

## Integrantes

* Barbara Santa Maria
* Elizabeth Pizarro Lara 


Repositorio:

https://github.com/bsbraniff/proviemplea_eva3

---
---

# Índice

- Descripción
- Objetivos
- Stack Tecnológico
- Arquitectura
- Configuración
- CRUD
- Swagger
- Pruebas
- Errores
- Optimización
- GitHub
- Conclusión


# Descripción del Proyecto

ProviEmplea es una plataforma digital orientada a la búsqueda inversa de empleo, donde las empresas pueden encontrar candidatos según sus habilidades, experiencia laboral y certificaciones.

El objetivo principal de este proyecto fue desarrollar un backend preliminar utilizando Laravel, PHP, MySQL y Docker, implementando operaciones CRUD completas para la administración de clientes mediante una API REST.

Además, se desarrolló documentación técnica utilizando Swagger/OpenAPI para describir cada endpoint implementado en el sistema.

---

# Objetivos  

* Diseñar operaciones CRUD utilizando el framework Laravel.
* Implementar endpoints funcionales para manipular datos.
* Utilizar Docker para la ejecución del entorno de desarrollo.
* Crear documentación OpenAPI mediante Swagger.
* Probar y depurar errores relacionados con la API y la base de datos.
* Utilizar GitHub para el control de versiones del proyecto.

---

# Stack Tecnológico Utilizado

| Tecnología        | Descripción                                      |
| ----------------- | ------------------------------------------------ |
| PHP               | Lenguaje principal del backend                   |
| Laravel           | Framework utilizado para el desarrollo de la API |
| MySQL             | Sistema de gestión de base de datos              |
| Docker            | Contenedorización del proyecto                   |
| Swagger / OpenAPI | Documentación de endpoints                       |
| Git y GitHub      | Control de versiones                             |
| Postman           | Pruebas de endpoints                             |

---

# Arquitectura del Proyecto

El proyecto fue desarrollado siguiendo una arquitectura basada en API REST utilizando Laravel como framework principal.

Se implementó una estructura MVC (Modelo - Vista - Controlador), utilizando:

* Modelos Eloquent para la manipulación de datos.
* Controladores para la lógica CRUD.
* Migraciones para la creación de tablas.
* Rutas API para exponer los endpoints.

---

# Configuración del Entorno

## Requisitos

* Docker Desktop
* Git
* Visual Studio Code
* Postman

---

# Ejecución del Proyecto

## 1. Levantar contenedores Docker

```bash
docker compose up -d
```

## 2. Ejecutar migraciones

```bash
docker compose exec app php artisan migrate
```

## 3. Verificar contenedores

```bash
docker ps
```

---

# Funcionalidades Implementadas

Se desarrolló un CRUD completo para la entidad Clientes.

Las funcionalidades implementadas son:

* Crear clientes
* Listar clientes
* Buscar clientes por ID
* Actualizar clientes
* Eliminar clientes

---

# Modelo de Datos

La tabla `clientes` contiene los siguientes campos:

| Campo      | Tipo      |
| ---------- | --------- |
| id         | bigint    |
| nombre     | varchar   |
| apellido   | varchar   |
| correo     | varchar   |
| telefono   | varchar   |
| created_at | timestamp |
| updated_at | timestamp |

---

# Endpoints Implementados

| Método | Endpoint           | Descripción                |
| ------ | ------------------ | -------------------------- |
| GET    | /api/clientes      | Obtener todos los clientes |
| POST   | /api/clientes      | Crear cliente              |
| GET    | /api/clientes/{id} | Obtener cliente por ID     |
| PUT    | /api/clientes/{id} | Actualizar cliente         |
| DELETE | /api/clientes/{id} | Eliminar cliente           |

---

# Ejemplo JSON de Creación

```json
{
  "nombre": "Barbara",
  "apellido": "Santa Maria",
  "correo": "barbara@test.com",
  "telefono": "123456789"
}
```

---

# Documentación Swagger

La documentaciónfue desarrollada utilizando el estándar Swagger 3.0.

OpenAPI puede visualizarse utilizando:

https://editor.swagger.io/

Copiando el contenido del archivo `swagger.yaml`.

Se documentaron:

- Parámetros de entrada
- Respuestas HTTP
- Ejemplos JSON
- Códigos de error
- Descripción de endpoints
- Tipos de datos

Swagger facilita la validación y pruebas automáticas de la API REST desarrollada.


---

# Validaciones y Pruebas

Durante el desarrollo se realizaron pruebas funcionales utilizando Postman y Swagger UI.

Se probaron los siguientes escenarios:

- Inserción correcta de clientes
- Consulta de registros
- Actualización de datos
- Eliminación de registros
- Validación de errores
- Respuestas HTTP

Códigos verificados:

- 200 OK
- 201 Created
- 404 Not Found
- 500 Internal Server Error


# Depuración de Errores

Durante el desarrollo se identificaron y corrigieron distintos errores relacionados con:

* Conexión Docker
* Configuración de Laravel
* Migraciones
* Columnas inexistentes en MySQL
* Tabla sessions no encontrada
* Configuración de rutas API
* Errores 500 Internal Server Error



# Problemas Detectados y Soluciones

## Error tabla sessions

Error detectado:
```bash
Table 'proviemplea.sessions' doesn't exist

```

Solución aplicada:
- Reconfiguración de sesiones
- Ejecución correcta de migraciones

La depuración permitió asegurar el correcto funcionamiento del CRUD.


---

# Optimización y Buenas Prácticas

Se aplicaron buenas prácticas utilizando:

* Framework Laravel
* Arquitectura MVC
* Migraciones estructuradas
* Uso de Eloquent ORM
* Docker para entorno aislado
* Separación de responsabilidades
* Versionamiento con GitHub

---

# Control de Versiones

El proyecto fue administrado utilizando Git y GitHub para mantener respaldo y control de cambios del código fuente.

# Evidencias de Pruebas

Se adjunta carpeta `Pruebas postman` con evidencias de ejecución de los endpoints en Postman.

También se incluye la colección de Postman para facilitar la verificación de la API:

- `postman_collection.json`

Las pruebas realizadas incluyen:
- GET clientes
- POST clientes
- PUT clientes
- DELETE clientes
- Verificación en Docker
- Documentación Swagger

---

# Conclusión

El desarrollo del backend de ProviEmplea permitió implementar correctamente operaciones CRUD mediante Laravel y MySQL utilizando Docker como entorno de desarrollo.

Además, se logró documentar la API utilizando Swagger/OpenAPI, permitiendo visualizar y comprender cada endpoint implementado.

El proyecto cumple con los requerimientos solicitados en la evaluación, integrando desarrollo backend, documentación técnica, control de versiones y pruebas funcionales.
