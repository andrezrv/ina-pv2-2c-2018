<?php
class Nav {
  var $id = '';
  var $class = '';
  var $links = array();

  function __construct( $links = array(), $id = '', $class = '' ) {
    $this->links = $links;
    $this->id = $id;
    $this->class = $class;
  }

  function render() {
    if ( ! empty( $this->links ) ) {
      ?>
      <nav id="<?php echo $this->id ?>" class="<?php echo $this->class ?>">
        <ul>
          <?php
            foreach ( $this->links as $link ) {
              ?>
              <li><?php $link->render(); ?></li>
              <?php
            }
          ?>
        </ul>
      </nav>
      <?php
    }
  }
}
