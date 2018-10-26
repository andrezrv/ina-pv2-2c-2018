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
    if ( ! empty( $_POST ) ) {
      $query = '';

      $name     = isset( $_POST['name'] ) ? $_POST['name'] : '';
      $lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : '';
      $email    = isset( $_POST['email'] ) ? $_POST['email'] : '';
      $username = isset( $_POST['username'] ) ? $_POST['username'] : '';
      $password = isset( $_POST['password'] ) ? md5( $_POST['password'] ) : '';

      if ( $name && $lastname && $email && $username && $password ) {
        $query = "INSERT INTO users
        ( name, lastname, email, username, password, )
        VALUES
        ( '$name', '$lastname', '$email', '$username', '$password' )";
      } else {
        self::$message = 'Complete todos los campos.';
      }

      if ( $query ) {
        db()->query( $query );
        self::$message = 'El usuario se creó correctamente.';
      }
    }
  }

  public static function get_message() {
    return self::$message;
  }

  public function modify() {

  }

  public function delete() {

  }

  public function login() {

  }

  public function logout() {

  }

  public function validate() {

  }

  public function view() {

  }
}
