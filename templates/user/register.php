<?php get_header(); ?>
<?php nav_menu(); ?>

<h2>Registrarme</h2>

<?php if ( User::get_message() ) {
  echo User::get_message();
} ?>

<form action="" method="post">
  <p>
    <label for="name">Nombre</label><br />
    <input type="text" name="name" value="">
  </p>

  <p>
    <label for="lastname">Apellido</label><br />
    <input type="text" name="lastname" value="">
  </p>

  <p>
    <label for="email">Email</label><br />
    <input type="email" name="email" value="">
  </p>

  <p>
    <label for="username">Username</label><br />
    <input type="text" name="username" value="">
  </p>

  <p>
    <label for="password">Contraseña</label><br />
    <input type="password" name="password" value="">
  </p>

  <input type="submit" name="" value="Registrarme">
</form>

<?php get_footer(); ?>
