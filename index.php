<?php
ini_set( 'display_errors', 1 );

// Incluir todos los archivos que necesitamos:
require dirname( __FILE__ ) . '/url.php';
require_once dirname( __FILE__ ) . '/config.php';
require_once dirname( __FILE__ ) . '/includes/functions.php';
require_once SITE_PATH . '/classes/class-database.php';
require_once SITE_PATH . '/classes/class-user.php';
require_once SITE_PATH . '/classes/class-link.php';
require_once SITE_PATH . '/classes/class-nav.php';

// Crear usuario.
create_user();
delete_user();

// Mostrar página actual:
render_page();
