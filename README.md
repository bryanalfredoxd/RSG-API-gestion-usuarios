<h1 align="center">🛠️ Prueba Técnica Backend: API RESTful con Laravel y JWT</h1>

<p align="center">
  <img src="https://img.shields.io/badge/status-en%20desarrollo-blue?style=flat-square" alt="Estado del proyecto">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=flat-square" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-blue?style=flat-square" alt="PHP">
  <img src="https://img.shields.io/badge/license-MIT-green?style=flat-square" alt="Licencia">
</p>

---

## 📝 Descripción del Proyecto

Esta es una API RESTful desarrollada como parte de una prueba técnica. El sistema permite gestionar usuarios mediante autenticación basada en JSON Web Tokens (JWT), restringiendo el acceso a rutas según el rol del usuario (admin o usuario normal). La aplicación está construida en Laravel 12 y sigue una arquitectura profesional basada en MVC.

---

## 📂 Tabla de Contenidos

- [🚀 Tecnologías Utilizadas](#-tecnologías-utilizadas)  
- [⚙️ Características Implementadas](#️-características-implementadas)  
- [📋 Requisitos Previos](#-requisitos-previos)  
- [🔧 Guía de Instalación](#-guía-de-instalación)  
- [📮 Endpoints de la API](#-endpoints-de-la-api)  
- [🧑‍💻 Autor](#-autor)  
- [📄 Licencia](#-licencia)

---

## 🚀 Tecnologías Utilizadas

- **Framework**: Laravel 12  
- **Lenguaje**: PHP 8.2+  
- **Base de datos**: MySQL  
- **Autenticación**: [`php-open-source-saver/jwt-auth`](https://github.com/PHP-Open-Source-Saver/jwt-auth)  
- **Servidor**: Servidor de desarrollo de Laravel (`php artisan serve`)

---

## ⚙️ Características Implementadas

- 🔐 **Autenticación JWT**: Protección de rutas mediante tokens.
- 🛡️ **Control de Acceso**: Middleware personalizado para limitar rutas a admins.
- 🧾 **Validación de Datos**: Verificaciones robustas en el registro.
- 📑 **Paginación**: Soporte de `page` y `limit` en listados de usuarios.
- 🧱 **Estructura MVC**: Código organizado según convenciones de Laravel.

---

## 📋 Requisitos Previos

Antes de ejecutar este proyecto, asegúrate de tener instalado:

- PHP 8.2 o superior  
- Composer  
- MySQL (Servidor de base de datos)  

---

## 🔧 Guía de Instalación

Sigue estos pasos para ejecutar el proyecto localmente:

```bash
# 1. Clona el repositorio
git clone https://github.com/bryanalfredoxd/RSG-API-gestion-usuarios.git
cd RSG-API-gestion-usuarios

# 2. Instala dependencias
composer install

# 3. Configura el entorno (copiar .env y configurar base de datos)
cp .env.example .env
php artisan key:generate
php artisan jwt:secret

# 4. Ejecuta migraciones
php artisan migrate

# 5. Inicia el servidor
php artisan serve
```

## 📮 Endpoints de la API

Usa Postman, Insomnia o similar para probar los siguientes endpoints.

---

### 🔸 POST `/api/register`

**📌 Descripción**: Crea un nuevo usuario.  
**🔐 Autenticación**: No requerida.

**🔤 Parámetros JSON**:
```json
{
  "name": "Bryan Moreno",
  "email": "bryanmoreno@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

### 🔸 POST `/api/login`

**📌 Descripción**: Inicia sesión y devuelve un JWT.  
**🔐 Autenticación**: No requerida.

**🔤 Parámetros JSON:**
```json
{
  "email": "bryanmoreno@example.com",
  "password": "password123"
}
```

### 🔸 GET `/api/profile`

**📌 Descripción**: Muestra los datos del usuario autenticado.  
**🔐 Autenticación**: Requiere token en el header:

```http
Authorization: Bearer {token}
```

### 🔸 GET `/api/users`

**📌 Descripción**: Devuelve todos los usuarios paginados.  
**🔐 Autenticación**: Solo usuarios con rol de **admin**.  

**🔤 Header requerido:**

```http
Authorization: Bearer {admin_token}
```

## 🧑‍💻 Autor

**Bryan Alfredo Moreno Márquez**  

---

## 📄 Licencia

Este proyecto está bajo la Licencia [MIT](LICENSE).

