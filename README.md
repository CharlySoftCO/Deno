# Outsourcing Management Application

## Descripción
Este software es un sistema integral de gestión de outsourcing diseñado para optimizar la administración de proyectos, usuarios, empresas y clientes. Permite realizar un seguimiento detallado de tareas, informes y otras funcionalidades esenciales para empresas que ofrecen servicios tercerizados.

## Características
- **Gestión de Usuarios**: Creación, edición y visualización de usuarios con información detallada.
- **Gestión de Clientes**: Registro y seguimiento de clientes asociados a proyectos específicos.
- **Gestión de Empresas**: Organización de empresas contratantes y asociadas.
- **Gestión de Proyectos**: Monitoreo de proyectos asociados a clientes y empresas.
- **Informes**: Generación de reportes detallados para un mejor análisis.
- **Seguimiento**: Supervisión en tiempo real de actividades y resultados.

## Tecnologías utilizadas
- **Frontend**: React.js
- **Backend**: Laravel (PHP)
- **Base de Datos**: MySQL
- **Estilos**: Bootstrap 5.3

## Instalación
### Requisitos previos
1. Tener instalado [Node.js](https://nodejs.org/) y [npm](https://www.npmjs.com/) o [Yarn](https://yarnpkg.com/).
2. Tener instalado [Composer](https://getcomposer.org/).
3. Tener un servidor local configurado (ej. Laragon, XAMPP, Valet).

### Pasos
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/tuusuario/outsourcing-app.git
   cd outsourcing-app
   ```

2. Configurar el backend:
   ```bash
   cd backend
   cp .env.example .env
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan db:seed # Opcional para datos iniciales
   php artisan serve
   ```

3. Configurar el frontend:
   ```bash
   cd frontend
   cp .env.example .env
   npm install # O yarn install si usas Yarn
   npm run dev
   ```

## Uso
1. Accede al sistema:
   - Backend: `http://localhost:8000`
   - Frontend: `http://localhost:3000`

2. Inicia sesión con las credenciales iniciales configuradas en los seeds (si se ejecutaron).

## Funcionalidades principales
### Usuarios
- Crear y gestionar usuarios con roles y permisos específicos.

### Clientes
- Registrar y organizar clientes asociados a empresas y proyectos.

### Empresas
- Llevar un control detallado de empresas contratantes y asociadas.

### Proyectos
- Supervisar el avance de proyectos y su relación con clientes y empresas.

### Informes y Seguimiento
- Generar informes detallados y realizar el seguimiento de las actividades.

## Contribución
Las contribuciones son bienvenidas. Por favor, sigue estos pasos:
1. Haz un fork del repositorio.
2. Crea una nueva rama para tu funcionalidad (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza un commit de tus cambios (`git commit -am 'Añadí una nueva funcionalidad'`).
4. Haz push a la rama (`git push origin feature/nueva-funcionalidad`).
5. Crea un pull request.

## Licencia

Este software es propiedad exclusiva de [Nombre de tu Empresa]. Todos los derechos están reservados.

El acceso, uso, distribución o modificación de este software sin la autorización previa y por escrito de [Nombre de tu Empresa] está estrictamente prohibido. 

Para más información sobre los términos de uso o para adquirir una licencia, comuníquese con nosotros a través de [correo electrónico o sitio web oficial de la empresa].

