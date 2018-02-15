<?php 
/*
* Display Theme menus
*/
?>

<div class="header">
  <div class="container">
    <div class="menubox">
      <div class="nav">
          <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
      </div>
    </div>
  </div>
</div>