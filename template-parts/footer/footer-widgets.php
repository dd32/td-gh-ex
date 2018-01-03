<?php
/**
 * Displays footer widgets if assigned
 *
 * imonthemes
 * @subpackage bestblog
 * @since 1.0
 * @version 1.0
 */

?>
<?php if ( is_active_sidebar( 'foot_sidebar' ) ) { ?>
  <!--FOOTER WIDGETS-->
  <div class="top-footer-wrap">
    <div class="grid-container">
      <div class="grid-x grid-padding-x align-center ">
        <?php if ( is_active_sidebar('dynamic_sidebar') || !dynamic_sidebar('foot_sidebar') ) : ?><?php endif; ?>
      </div>
    </div>
  </div>
  <!--FOOTER WIDGETS END-->
<?php } ?>
