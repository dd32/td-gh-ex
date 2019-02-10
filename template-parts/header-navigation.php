<?php
/**
 * Header Navigation File
 *
 * @package advance-startup
 */
?>

<div id="header">
  <div class="main-menu">
    <div class="container">
      <div class="menu-color">
        <div class="row ">
          <div class="col-lg-11 col-md-11 ">
            <div class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 search-box">
            <i class="fas fa-search"></i>
          </div>
        </div>
      </div>
      <div class="serach_outer">
        <div class="closepop"><i class="far fa-window-close"></i></div>
        <div class="serach_inner">
         <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>