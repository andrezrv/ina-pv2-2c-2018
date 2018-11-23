<?php get_header(); ?>
<?php nav_menu(); ?>

<h2>Ingresar</h2>

<?php print_user_message_maybe(); ?>

<form action="" method="post">
  <input type="hidden" name="action" value="login">

  <p>
    <label for="username">Username</label><br />
    <input type="text" name="username" value="">
  </p>

  <p>
    <label for="password">Contraseña</label><br />
    <input type="password" name="password" value="">
  </p>

  <input type="submit" name="" value="Ingresar">
</form>

<?php get_footer(); ?>
