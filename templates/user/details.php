<?php
$id   = isset( $_GET['id'] ) ? $_GET['id'] : null;
$user = User::get_by_id( $id );
?>
<?php get_header(); ?>
Ver Usuario
<?php nav_menu(); ?>
<h2>Detalles</h2>

<?php if ( $user ) : ?>
  <ul>
    <li>ID: <?php echo $user->id; ?></li>
    <li>Nombre: <?php echo $user->name; ?></li>
    <li>Apellido: <?php echo $user->lastname; ?></li>
    <li>Username: <?php echo $user->username; ?></li>
    <li>Email: <?php echo $user->email; ?></li>
    <li>Rol: <?php echo $user->role; ?></li>
  </ul>
<?php else : ?>
  No se encontró el usuario.
<?php endif; ?>

<?php get_footer(); ?>
