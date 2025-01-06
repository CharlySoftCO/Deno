import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Sidebar from './components/Sidebar';
import Navbar from './components/Navbar';

// Montar Sidebar en el contenedor con ID 'sidebar'
const sidebarElement = document.getElementById('sidebar');
if (sidebarElement) {
    const root = ReactDOM.createRoot(sidebarElement);
    root.render(<Sidebar />);
}

// Montar Navbar en el contenedor con ID 'navbar'
const navbarElement = document.getElementById('navbar');
if (navbarElement) {
    const root = ReactDOM.createRoot(navbarElement);
    root.render(<Navbar />);
}
