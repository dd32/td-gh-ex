<?php
/**
 * The template part for displaying header layout.
 *
 * @package Fmi
 */

?>
<div class="navbar navbar-topbar">
  <div class="navbar-wrap">
    <div class="navbar-container">
      <div class="navbar-content">
        <div class="navbar-col">
          <?php do_action( 'vs_navbar_topbar_left' ); ?>
        </div>
        <div class="navbar-col">
          <?php do_action( 'vs_navbar_topbar_right' ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="navbar navbar-bottombar">
  <div class="navbar-wrap">
    <div class="navbar-container">
      <div class="navbar-content">
        <div class="navbar-col">
          <?php do_action( 'vs_navbar_bottombar' ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
