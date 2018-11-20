<?php
class User {
  protected $id;
  protected $name;
  protected $lastname;
  protected $username;
  protected $email;
  protected $role;

  protected static $message;

  public function __construct( $args = array() ) {
    foreach ( $args as $key => $value ) {
      if ( property_exists( $this, $key ) ) {
        $this->$key = $value;
      }
    }
  }

  public function __get( $property ) {
    return $this->$property;
  }

  public static function create() {
    if ( empty( $_POST ) ) {
      return;
    }

    if ( isset( $_GET['action'] ) && $_GET['action'] === 'edit_user' ) {
      return;
    }

    $query = '';

    $name     = isset( $_POST['name'] ) ? $_POST['name'] : '';
    $lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : '';
    $email    = isset( $_POST['email'] ) ? $_POST['email'] : '';
    $username = isset( $_POST['username'] ) ? $_POST['username'] : '';
    $password = isset( $_POST['password'] ) ? md5( $_POST['password'] ) : '';

    if ( $name && $lastname && $email && $username && $password ) {
      $query = "INSERT INTO users
      ( name, lastname, email, username, password, role )
      VALUES
      ( '$name', '$lastname', '$email', '$username', '$password', 'user' )";
    } else {
      self::$message = 'Complete todos los campos.';
    }

    if ( $query ) {
      db()->query( $query );
      self::$message = 'El usuario se creó correctamente.';
    }
  }

  public static function get_message() {
    return self::$message;
  }

  public static function modify() {
    if ( empty( $_POST ) ) {
      return;
    }

    if ( isset( $_GET['action'] ) && $_GET['action'] !== 'edit_user' ) {
      return;
    }

    $query = '';

    $id       = isset( $_GET['id'] ) ? $_GET['id'] : null;    
    $name     = isset( $_POST['name'] ) ? $_POST['name'] : '';
    $lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : '';
    $email    = isset( $_POST['email'] ) ? $_POST['email'] : '';
    $username = isset( $_POST['username'] ) ? $_POST['username'] : '';

    if ( $name && $lastname && $email && $username ) {
      $query = "UPDATE users
      SET name = '$name', lastname = '$lastname', email = '$email', username = '$username'
      WHERE id = '$id'";
    }

    if ( $query ) {
      db()->query( $query );
      self::$message = 'El usuario se modificó correctamente.';
    }
  }

  public static function delete() {
    if ( empty( $_GET['delete_user'] ) || empty( $_GET['id'] ) ) {
      return;
    }

    $id = intval( $_GET['id'] ) ? : null;

    if ( ! $id ) {
      return;
    }

    $query_check = "SELECT id FROM users WHERE id = $id";
    $result = db()->get_results( $query_check );

    if ( empty( $result ) ) {
      return;
    }

    $query = "DELETE FROM users WHERE id = $id";

    db()->query( $query );

    self::$message = 'El usuario se eliminó correctamente';
  }

  public function login() {

  }

  public function logout() {

  }

  public function validate() {

  }

  public function view() {

  }

  public static function get_by_id( $id ) {
    $query = "SELECT * FROM users WHERE id = '$id' LIMIT 0,1";
    $results = db()->get_results( $query );

    if ( ! empty( $results ) ) {
      return new self( $results[0] );
    }

    return null;
  }

  public static function list() {
    $query = "SELECT id, name, lastname, username, email, role FROM users WHERE 1";
    $results = db()->get_results( $query );
    $users = array();

    foreach ( $results as $user_data ) {
      $users[] = new User( array(
        'id'       => $user_data['id'],
        'name'     => $user_data['name'],
        'lastname' => $user_data['lastname'],
        'email'    => $user_data['email'],
        'role'     => $user_data['role'],
        'username' => $user_data['username'],
      ) );
    }

    return $users;
  }
}
