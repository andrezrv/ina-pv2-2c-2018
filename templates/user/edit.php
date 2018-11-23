<?php
if ( ! is_logged_in() ) {
  echo "Usted no tiene permisos para ver esta página.";
  return;
}

$id   = isset( $_GET['id'] ) ? $_GET['id'] : null;
$user = User::get_by_id( $id );
?>
<?php get_header(); ?>
<?php nav_menu(); ?>

<h2>Modificar usuario</h2>

<?php print_user_message_maybe(); ?>

<?php if ( $user ) : ?>
  <form action="" method="post">
    <p>
      <label for="name">Nombre</label><br />
      <input type="text" name="name" value="<?php echo $user->name; ?>">
    </p>

    <p>
      <label for="lastname">Apellido</label><br />
      <input type="text" name="lastname" value="<?php echo $user->lastname; ?>">
    </p>

    <p>
      <label for="email">Email</label><br />
      <input type="email" name="email" value="<?php echo $user->email; ?>">
    </p>

    <p>
      <label for="username">Username</label><br />
      <input type="text" name="username" value="<?php echo $user->username; ?>">
    </p>

    <input type="submit" name="" value="Modificar">
  </form>
<?php else : ?>
  No se encontró el usuario.
<?php endif; ?>

<?php get_footer(); ?>
