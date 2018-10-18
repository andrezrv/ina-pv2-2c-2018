<?php
class User {
  protected $id;
  protected $name;
  protected $lastname;
  protected $username;
  protected $email;
  protected $role;

  /*public function __construct( $id, $name, $lastname, $username, $email, $role ) {
    $this->id = $id;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->username = $username;
    $this->email = $email;
    $this->role = $role;
  }*/

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

  public function __set( $property, $value ) {
    $this->$property = $value;
  }

  public function create() {

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
