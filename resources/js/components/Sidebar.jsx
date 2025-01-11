import React from 'react';
import { useLocation } from 'react-router-dom';
import routes from '../routes';

const Sidebar = () => {
    const location = useLocation(); // Hook para obtener la ubicación actual

    // Función para verificar si la ruta actual coincide con la ruta del enlace
    const isActive = (route) => location.pathname === route;

    return (
        <div className="sidebar">
            <nav className="mt-2">
                <ul className="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                    <li className="nav-header">PANEL DE CONTROL</li>

                    {/* Tablero */}
                    <li className="nav-item">
                        <a
                            href={routes.dashboard}
                            className={`nav-link ${isActive(routes.dashboard) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-tachometer-alt"></i>
                            <p>Tablero</p>
                        </a>
                    </li>

                    {/* Seguimiento */}
                    <li className="nav-item">
                        <a
                            href={routes.followUp}
                            className={`nav-link ${isActive(routes.followUp) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-eye"></i>
                            <p>Seguimiento</p>
                        </a>
                    </li>

                    {/* Informes */}
                    <li className="nav-item">
                        <a
                            href={routes.reports}
                            className={`nav-link ${isActive(routes.reports) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-chart-line"></i>
                            <p>Informes</p>
                        </a>
                    </li>

                    <li className="nav-header">ADMINISTRACIÓN</li>

                    {/* Inventario */}
                    <li className="nav-item">
                        <a
                            href={routes.inventoryIndex}
                            className={`nav-link ${isActive(routes.inventoryIndex) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-boxes"></i>
                            <p>Inventario</p>
                        </a>
                    </li>

                    {/* Clientes */}
                    <li className="nav-item">
                        <a
                            href={routes.clientsIndex}
                            className={`nav-link ${isActive(routes.clientsIndex) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-user-tie"></i>
                            <p>Clientes</p>
                        </a>
                    </li>

                    {/* Usuarios */}
                    <li className="nav-item">
                        <a
                            href={routes.usersIndex}
                            className={`nav-link ${isActive(routes.usersIndex) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>

                    <li className="nav-header">CONFIGURACIÓN</li>

                    {/* Empresas */}
                    <li className="nav-item">
                        <a
                            href={routes.companiesIndex}
                            className={`nav-link ${isActive(routes.companiesIndex) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-building"></i>
                            <p>Empresas</p>
                        </a>
                    </li>

                    {/* Proyectos */}
                    <li className="nav-item">
                        <a
                            href={routes.projectsIndex}
                            className={`nav-link ${isActive(routes.projectsIndex) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-project-diagram"></i>
                            <p>Proyectos</p>
                        </a>
                    </li>

                    {/* Servicios */}
                    <li className="nav-item">
                        <a
                            href={routes.servicesIndex}
                            className={`nav-link ${isActive(routes.servicesIndex) ? 'active' : ''}`}
                        >
                            <i className="nav-icon fas fa-cogs"></i>
                            <p>Servicios</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    );
};

export default Sidebar;
