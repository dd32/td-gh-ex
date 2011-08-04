<?php 
/** Chip Life 404 Page */
function chip_life_404_init() {
?>
<div class="taxonomy-wrap">
  <h2 class="taxonomy-title">Not Found, Error 404</h2>
</div>

<div class="post">  
  <div class="entry-content">	  
      <p>Apologies, but the page you requested could not be found. Perhaps searching will help.</p>
      <p><?php get_search_form(); ?></p>      
  <div class="clear"></div>
  </div><!-- end .entry-content -->  
</div>
<?php
}

/** Remove Default Taxonomy Title */
remove_action( 'chip_life_content', 'chip_life_taxonomy_title_init' );
/** Remove Default Loop */
remove_action( 'chip_life_content', 'chip_life_loop_init' );
/** Chip Life 404 Page */
add_action( 'chip_life_content', 'chip_life_404_init' );

/** Chip Life Framework */
do_action( 'chip_life' );
?>