<?php
if ( ! is_logged_in() ) {
  echo "Usted no tiene permisos para ver esta página.";
  return;
}

get_header();
?>
Ver Usuarios
<?php nav_menu(); ?>
<?php print_user_message_maybe(); ?>
<?php view_users_table() ?>
<?php get_footer(); ?>
