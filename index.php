<?php
ini_set( 'display_errors', 1 );
session_start();

// Incluir todos los archivos que necesitamos:
require dirname( __FILE__ ) . '/url.php'; // Remover.
require_once dirname( __FILE__ ) . '/config.php';
require_once SITE_PATH . '/includes/functions.php';
require_once SITE_PATH . '/classes/class-database.php';
require_once SITE_PATH . '/classes/class-user.php';
require_once SITE_PATH . '/classes/class-link.php';
require_once SITE_PATH . '/classes/class-nav.php';

// Iniciar sesión.
login_user();

// Crear usuario.
create_user();

// Modificar usuario.
modify_user();

// Borrar usuario.
delete_user();

// Mostrar página actual:
render_page();
