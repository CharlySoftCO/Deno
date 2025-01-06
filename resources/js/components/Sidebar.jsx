import React from 'react';
import routes from '../routes';

const Sidebar = () => {
    return (
        <div className="sidebar">
            {/* Menú de navegación */}
            <nav className="mt-2">
                <ul
                    className="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    {/* Opción Tablero */}
                    <li className="nav-item">
                        <a href={routes.dashboard} className="nav-link">
                            <i className="nav-icon fas fa-tachometer-alt"></i>
                            <p>Tablero</p>
                        </a>
                    </li>

                    {/* Opción Seguimiento */}
                    <li className="nav-item">
                        <a href={routes.dashboard} className="nav-link">
                            <i className="nav-icon fas fa-eye"></i>
                            <p>Seguimiento</p>
                        </a>
                    </li>

                    {/* Opción Informes */}
                    <li className="nav-item">
                        <a href={routes.dashboard} className="nav-link">
                            <i className="nav-icon fas fa-chart-line"></i>
                            <p>Informes</p>
                        </a>
                    </li>

                    <li class="nav-header">ADMINISTRACIÓN</li>

                    {/* Opción Usuarios */}
                    <li className="nav-item">
                        <a href="#" className="nav-link">
                            <i className="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                                <i className="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul className="nav nav-treeview">
                            <li className="nav-item">
                                <a href={routes.usersIndex} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Lista de usuarios</p>
                                </a>
                            </li>
                            <li className="nav-item">
                                <a href={routes.usersCreate} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Nuevo usuario</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {/* Opción Empresas */}
                    <li className="nav-item">
                        <a href="#" className="nav-link">
                            <i className="nav-icon fas fa-building"></i>
                            <p>
                                Empresas
                                <i className="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul className="nav nav-treeview">
                            <li className="nav-item">
                                <a href={routes.companiesIndex} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Lista de empresas</p>
                                </a>
                            </li>
                            <li className="nav-item">
                                <a href={routes.companiesCreate} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Nueva empresa</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {/* Opción Proyectos */}
                    <li className="nav-item">
                        <a href="#" className="nav-link">
                            <i className="nav-icon fas fa-project-diagram"></i>
                            <p>
                                Proyectos
                                <i className="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul className="nav nav-treeview">
                            <li className="nav-item">
                                <a href={routes.projectsIndex} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Lista de proyectos</p>
                                </a>
                            </li>
                            <li className="nav-item">
                                <a href={routes.projectsCreate} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Nuevo proyecto</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {/* Opción Clientes */}
                    <li className="nav-item">
                        <a href="#" className="nav-link">
                            <i className="nav-icon fas fa-user-tie"></i>
                            <p>
                                Clientes
                                <i className="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul className="nav nav-treeview">
                            <li className="nav-item">
                                <a href={routes.clientsIndex} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Lista de clientes</p>
                                </a>
                            </li>
                            <li className="nav-item">
                                <a href={routes.clientsCreate} className="nav-link">
                                    <i className="far fa-circle nav-icon"></i>
                                    <p>Nuevo cliente</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    );
};

export default Sidebar;
