<?php
function render_page() {
  $page = SITE_PATH . '/templates/main.php';

  if ( isset( $_GET['page'] ) ) {
    $page = SITE_PATH . '/templates/' . $_GET['page'] . '.php';
  }

  if ( ! file_exists( $page ) ) {
    $page = SITE_PATH . '/templates/404.php';
  }

  require $page;
}

function nav_menu() {
  get_template( 'nav' );
}

function get_header() {
  get_template( 'header' );
}

function get_footer() {
  get_template( 'footer' );
}

function get_template( $name ) {
  $template = SITE_PATH . '/templates/' . $name . '.php';

  if ( file_exists( $template ) ) {
    include SITE_PATH . '/templates/' . $name . '.php';
  }
}
