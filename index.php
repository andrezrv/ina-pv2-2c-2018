<?php
ini_set( 'display_errors', 1 );
// index.php

// Incluir todos los archivos que necesitamos:
require dirname( __FILE__ ) . '/url.php';
require_once dirname( __FILE__ ) . '/config.php';
require_once dirname( __FILE__ ) . '/includes/functions.php';
require_once SITE_PATH . '/classes/class-database.php';
require_once SITE_PATH . '/classes/class-user.php';
require_once SITE_PATH . '/classes/class-link.php';
require_once SITE_PATH . '/classes/class-nav.php';

/*$user = new User( array(
  'name'     => 'Juana',
  'id'       => 1,
  'lastname' => 'Molina',
  'username' => 'juanamolina',
  'email'    => 'juanamolina@gmail.com',
  'role'     => 'admin',
) );

echo $user->id;
// var_dump( $user );
die();*/

// $users = db()->get_results( "SELECT * FROM users" );
//var_dump( $users ); die();
global $message;

create_user();

// Mostrar página actual:
render_page();
