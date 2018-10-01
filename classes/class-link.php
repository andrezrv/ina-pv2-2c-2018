<?php
// <a href="contact.php" target="_blank" title="Contacto">Contacto</a>
class Link {
  var $name = '';
  var $href = '';
  var $target = '';
  var $title = '';

  function __construct( $name, $href, $target, $title ) {
    $this->name   = $name;
    $this->href   = $href;
    $this->target = $target;
    $this->title  = $title;
  }

  function render() {
    ?>
    <a href="<?php echo $this->href; ?>" target="<?php echo $this->target; ?>" title="<?php echo $this->title; ?>"><?php echo $this->name; ?></a>
    <?php
  }
}
