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

function nav() {
  $links = array();

  $nav_data = array(
    array(
      'name'   => 'Inicio',
      'href'   => SITE_URL,
      'target' => '_self',
      'title'  => 'Inicio',
    ),
    array(
      'name'   => 'Novedades',
      'href'   => SITE_URL . 'index.php?page=novedades',
      'target' => '_self',
      'title'  => 'Novedades',
    ),
    array(
      'name'   => 'Contacto',
      'href'   => SITE_URL . 'index.php?page=contacto',
      'target' => '_self',
      'title'  => 'Contacto',
    ),
    array(
      'name'   => 'Nosotros',
      'href'   => SITE_URL . 'index.php?page=nosotros',
      'target' => '_self',
      'title'  => 'Nosotros',
    ),
    array(
      'name'   => 'Registrarme',
      'href'   => SITE_URL . 'index.php?page=user/register',
      'target' => '_self',
      'title'  => 'Registrarme',
    ),
    array(
      'name'   => 'Ver Usuarios',
      'href'   => SITE_URL . 'index.php?page=user/list',
      'target' => '_self',
      'title'  => 'Ver Usuarios',
    ),
  );

  foreach ( $nav_data as $link_data ) {
    $links[] = new Link( $link_data['name'], $link_data['href'], $link_data['target'], $link_data['title'] );
  }

  $nav = new Nav( $links, 'site-header-nav', 'site-nav' );

  $nav->render();
}

function db() {
  static $db = null;

  if ( is_null( $db ) ) {
    $db = new Database( array(
      'host'     => DB_HOST,
      'username' => DB_USER,
      'password' => DB_PASS,
      'name'     => DB_NAME,
    ) );

    $db->connect();
  }

  return $db;
}

function create_user() {
  return User::create();
}

function modify_user() {
  return User::modify();
}

function delete_user() {
  User::delete();
}

function print_user_message_maybe() {
  $message = User::get_message();

  if ( ! $message ) {
    return;
  }

  echo $message;
}

function view_users_table() {
  $users = User::list();

  if ( empty( $users ) ) {
    return;
  }

  ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Lastname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ( $users as $user ) : ?>
        <tr>
          <td><?php echo $user->id; ?></td>
          <td><?php echo $user->name; ?></td>
          <td><?php echo $user->lastname; ?></td>
          <td><?php echo $user->username; ?></td>
          <td><?php echo $user->email; ?></td>
          <td><?php echo $user->role; ?></td>
          <td>
            <a href="<?php echo SITE_URL . 'index.php?page=user/list&action=delete_user&id=' . $user->id; ?>">Eliminar</a>
            <a href="<?php echo SITE_URL . 'index.php?page=user/edit&action=edit_user&id=' . $user->id; ?>">Modificar</a>
            <a href="<?php echo SITE_URL . 'index.php?page=user/details&id=' . $user->id; ?>">Ver Detalles</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
}
