<?php 
/** Remove Default Taxonomy Title */
remove_action( 'chip_life_content', 'chip_life_taxonomy_title_init' );
/** Remove Default Loop */
remove_action( 'chip_life_content', 'chip_life_loop_init' );
/** Chip Life 404 Page */
add_action( 'chip_life_content', 'chip_life_404_init' );

/** Chip Life Framework */
do_action( 'chip_life' );
?>