<?php
// index.php

// Incluir todos los archivos que necesitamos:
require dirname( __FILE__ ) . '/url.php';
require_once dirname( __FILE__ ) . '/config.php';
require_once dirname( __FILE__ ) . '/includes/functions.php';
require_once SITE_PATH . '/classes/class-link.php';

$link = new Link( 'Contacto', 'contact.php', '_blank', 'Contacto' );

var_dump( $link );

$link->render();

die();

// Mostrar página actual:
render_page();
