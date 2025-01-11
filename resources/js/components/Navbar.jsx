import React from 'react';

const Navbar = () => {
    const handleLogout = () => {
        // Crear un formulario y enviarlo para cerrar sesión
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/logout';
        
        // Agregar el token CSRF al formulario
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').content;
        
        form.appendChild(csrfInput);
        document.body.appendChild(form);
        form.submit();
    };

    return (
        <nav className="main-header navbar navbar-expand navbar-white navbar-light">
            {/* Left navbar links */}
            <ul className="navbar-nav">
                <li className="nav-item">
                    <a className="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i className="fas fa-bars"></i>
                    </a>
                </li>
                <li className="nav-item d-none d-sm-inline-block">
                    <a href="/" className="nav-link">Soporte Técnico</a>
                </li>
            </ul>

            {/* Right navbar links */}
            <ul className="navbar-nav ms-auto">
                {/* User Dropdown */}
                <li className="nav-item dropdown">
                    <a
                        href="#"
                        className="nav-link d-flex align-items-center"
                        id="userDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="https://www.gravatar.com/avatar/94d093eda664addd6e450d7e9881bcad?s=32&r=PG"
                            className="user-image img-circle me-2"
                            alt="User"
                        />
                        <span>Alexander Pierce</span>
                    </a>
                    <ul className="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <button
                                className="dropdown-item text-danger fw-bold"
                                onClick={handleLogout}
                            >
                                <i className="fas fa-sign-out-alt me-2"></i>
                                Cerrar sesión
                            </button>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>
    );
};

export default Navbar;
