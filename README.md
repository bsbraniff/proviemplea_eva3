# Centro de Negocios Santiago — SERCOTEC
Landing page desarrollada con **React + Vite + Bootstrap 5** para el Centro de Negocios Santiago de SERCOTEC.

## Equipo — Impulso Digital
| Integrante | Rol |
|---|---|
| Bárbara Santa María Braniff | Frontend / Integración |
| Elizabeth Pizarro Lara | Frontend / Backend |

---

## Descripción del proyecto

Landing page moderna, accesible e interactiva para el **Centro de Negocios Santiago de SERCOTEC**, institución dedicada al apoyo de micro, pequeñas y medianas empresas. El sitio incluye secciones informativas, carrusel de testimonios, tarjetas de servicios reutilizables y un formulario de contacto integrado con un backend Laravel que almacena los datos de cada consulta.

---

## Tecnologías utilizadas

| Tecnología | Versión | Uso |
|---|---|---|
| React | 18 | Framework UI |
| Vite | 5 | Bundler y servidor de desarrollo |
| Bootstrap | 5 | Estilos y componentes visuales |
| React Router DOM | 6 | Navegación entre páginas |
| Axios | — | Llamadas HTTP al backend |
| Laravel | — | Backend API REST |
| Docker | — | Contenedor del backend |

---

## Estructura del proyecto

```
proyecto/
├── frontend/                   ← Proyecto React + Vite
│   ├── src/
│   │   ├── components/
│   │   │   ├── FAQ.jsx         → Sección preguntas frecuentes (accordion)
│   │   │   ├── Footer.jsx      → Pie de página
│   │   │   ├── Hero.jsx        → Sección principal de bienvenida
│   │   │   ├── Layout.jsx      → Envuelve navbar + contenido + footer
│   │   │   ├── Navbar.jsx      → Navegación principal sticky
│   │   │   ├── Nosotros.jsx    → Sección misión, visión y valores
│   │   │   ├── Service.jsx     → Grilla de tarjetas de servicios
│   │   │   ├── ServiceCard.jsx → Tarjeta reutilizable de servicio
│   │   │   └── Testimonios.jsx → Carrusel de testimonios
│   │   ├── data/
│   │   │   └── data.js         → CMS de contenido (datos locales)
│   │   ├── hooks/
│   │   │   └── useClientes.js  → Hook reutilizable GET/POST
│   │   ├── pages/
│   │   │   ├── Contacto.jsx    → Formulario de contacto
│   │   │   └── home.jsx        → Página principal
│   │   ├── services/
│   │   │   └── clientes.service.js → Llamadas HTTP al backend
│   │   ├── App.jsx             → Definición de rutas
│   │   └── main.jsx            → Punto de entrada
│   ├── vite.config.js          → Configuración proxy CORS
│   └── package.json
│
└── backend/                    ← Proyecto Laravel (API REST)
    ├── app/
    ├── routes/api.php          → Definición de endpoints
    ├── docker-compose.yml      → Configuración Docker
    └── ...
```

---

## Instalación y uso

### Requisitos previos
- Node.js 18+
- Docker Desktop instalado y corriendo

### 1. Clonar el repositorio
```bash
git clone https://github.com/bsbraniff/proviemplea_eva3
```

### 2. Levantar el backend con Docker
```bash
cd backend
docker-compose up
```
> El backend quedará disponible en `http://localhost:8000`  
> Esperar a que Docker termine de construir los contenedores antes de continuar.

### 3. Instalar dependencias del frontend
```bash
cd frontend
npm install
```

### 4. Levantar el frontend
```bash
npm run dev
```

### 5. Abrir en el navegador
```
http://localhost:5173
```

> **Importante:** El backend debe estar corriendo antes de levantar el frontend, de lo contrario el formulario de contacto no podrá enviar datos.

---

## Variables de entorno

El frontend usa el proxy de Vite para comunicarse con el backend, por lo que no requiere archivo `.env`. La configuración del proxy está en `vite.config.js`:

```js
// vite.config.js
export default defineConfig({
  plugins: [react()],
  server: {
    proxy: {
      '/api': 'http://localhost:8000'
    }
  }
})
```

Esto evita errores de CORS y permite usar rutas relativas en el código:
```js
// En lugar de: http://localhost:8000/api/clientes
// Se usa simplemente:
axios.get('/api/clientes')
```

---

## Guía de componentes

### ServiceCard
Tarjeta reutilizable que muestra un servicio del centro. Al hacer clic en "Contáctanos" navega al formulario con el campo servicio prellenado automáticamente.

**Props:**
| Prop | Tipo | Descripción |
|---|---|---|
| titulo | string | Nombre del servicio |
| descripcion | string | Descripción breve |
| imagen | string | URL de la imagen |

**Ejemplo de uso:**
```jsx
<ServiceCard
  titulo="Asesoría Empresarial"
  descripcion="Orientación personalizada para tu negocio."
  imagen="https://ejemplo.com/imagen.jpg"
/>
```

---

### Testimonios
Carrusel accesible con navegación por botones e indicadores. Soporta navegación por teclado y lectores de pantalla.

**Ejemplo de uso:**
```jsx
<Testimonios />
```

---

### useClientes (hook personalizado)
Hook reutilizable que centraliza toda la lógica de comunicación con el backend. Expone estados de `loading`, `error` y `success` para manejar la UI durante las peticiones.

**Ejemplo de uso:**
```jsx
const { crearCliente, loading, error, success } = useClientes()

await crearCliente({
  nombre: 'Elizabeth',
  apellido: 'Pizarro',
  correo: 'elizabeth@test.com',
  telefono: '+56912345678',
  servicio: 'Asesoría Empresarial',
  mensaje: 'Me interesa más información.'
})
```

---

## API — Endpoints del backend

**Base URL:** `http://localhost:8000/api`

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/clientes` | Lista todos los contactos registrados |
| POST | `/clientes` | Crea un nuevo contacto desde el formulario |
| GET | `/clientes/{id}` | Ver detalle de un contacto |
| PUT | `/clientes/{id}` | Actualizar datos de un contacto |
| DELETE | `/clientes/{id}` | Eliminar un contacto |

### Ejemplo de cuerpo para POST `/clientes`
```json
{
  "nombre": "Elizabeth",
  "apellido": "Pizarro",
  "correo": "elizabeth@test.com",
  "telefono": "+56912345678",
  "servicio": "Asesoría Empresarial",
  "mensaje": "Me interesa más información sobre sus servicios."
}
```

### Respuesta exitosa (201)
```json
{
  "message": "Contacto creado exitosamente",
  "data": {
    "id": 1,
    "nombre": "Elizabeth",
    "correo": "elizabeth@test.com"
  }
}
```

---

## Funcionalidades implementadas

- Landing page responsive (mobile, tablet, desktop)
- Navegación dinámica con React Router DOM
- Tarjetas reutilizables de servicios con navegación al formulario
- Carrusel de testimonios accesible
- Formulario de contacto con validación cliente y servidor
- Consumo de API REST con Axios
- Preguntas frecuentes con accordion dinámico
- Hook personalizado para gestión de estado HTTP
- Optimización de imágenes con `loading="lazy"`
- Proxy Vite para evitar errores CORS
- Diseño centrado en accesibilidad y usabilidad (WCAG 2.1)

---

## Accesibilidad

- Atributos `aria-label`, `aria-live`, `aria-required` en todos los componentes interactivos
- Navegación completa por teclado
- Contraste de colores según WCAG 2.1
- Imágenes con `alt` descriptivo en todos los casos
- Formularios con `label` asociado a cada campo mediante `htmlFor`

---

## Seguridad implementada

- Validación del lado cliente con JavaScript antes de enviar la petición
- Validación del lado servidor mediante Laravel (campos requeridos, formato de correo, largo mínimo)
- Sanitización de datos antes de enviarlos al backend
- Manejo de errores HTTP con mensajes claros al usuario
- Protección contra envío de formularios vacíos o inválidos
- Proxy Vite configurado para evitar exposición directa del backend

---

## Optimizaciones aplicadas

- `loading="lazy"` en todas las imágenes para mejorar tiempo de carga inicial
- Proxy Vite para evitar CORS sin configuración adicional en producción
- Componentes reutilizables (`ServiceCard`, `Layout`) para evitar duplicación de código
- Hook `useClientes` centraliza la lógica HTTP evitando repetición en cada componente
- Validación cliente antes de llamar al backend para evitar requests innecesarios

---

## Arquitectura del proyecto

El proyecto implementa una arquitectura basada en **separación de responsabilidades**:

```
Components  → Piezas visuales reutilizables (qué se ve)
Pages       → Vistas completas, una por ruta (dónde se ve)
Hooks       → Lógica reutilizable con estado (qué hace)
Services    → Comunicación con el backend (cómo se conecta)
Data        → Contenido local / CMS interno (qué muestra)
```

Esta separación permite mantener un código **modular, escalable y fácil de mantener**, donde cada archivo tiene una única responsabilidad clara.

---

## Documentación adicional

| Archivo | Contenido |
|---|---|
| `BUENAS_PRACTICAS.md` | Convenciones de nomenclatura, estructura de archivos, accesibilidad y ejemplos de código |
| `RETROSPECTIVA.md` | Análisis del sprint, lecciones aprendidas y plan de mejora del equipo |

---

## Video de demostración

Se adjunta video mostrando el funcionamiento completo del proyecto:
- Levantamiento del backend con Docker
- Levantamiento del frontend con Vite
- Navegación por todas las secciones de la landing
- Envío del formulario de contacto
- Verificación de los datos almacenados en el backend
