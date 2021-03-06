<?php
class Database {
  protected $host;
  protected $username;
  protected $password;
  protected $name;
  protected $link;
  protected $last_query;

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

  public function connect() {
    $this->link = mysqli_connect( $this->host, $this->username, $this->password, $this->name );
  }

  public function query( $query ) {
    $result = [];
    $query_result = mysqli_query( $this->link, $query );

    $this->last_query = $query;

    return $query_result;
  }

  public function get_results( $query ) {
    $result = [];

    $query_result = $this->query( $query );

    if ( ! empty( $query_result ) && mysqli_num_rows( $query_result ) ) {
      while ( $row = mysqli_fetch_assoc( $query_result ) ) {
        $result[] = $row;
      }
    }

    return $result;
  }
}
