<?php
/** Chip Life Loop */
function chip_life_loop_init() {
	
	if ( have_posts() ) :		
	
	do_action( 'chip_life_while_before' );
	while ( have_posts() ) : the_post();
	
	do_action( 'chip_life_post_wrap_before' );	
	?>
    
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <?php do_action( 'chip_life_post_title_before' ); ?>
        <?php do_action( 'chip_life_post_title' ); ?>
        <?php do_action( 'chip_life_post_title_after' ); ?>
        
        <?php do_action( 'chip_life_post_content_before' ); ?>
        <div class="entry-content">
            <?php do_action( 'chip_life_post_content' ); ?>
        <div class="clear"></div>
        </div><!-- end .entry-content -->
        <?php do_action( 'chip_life_post_content_after' ); ?>
    
    <div class="clear"></div>
    </div> <!-- end .postclass -->

<?php
	
	do_action( 'chip_life_post_wrap_after' );		
	endwhile; /** end loop */
	do_action( 'chip_life_while_after' );
	
	else : /** if no posts exist **/			
	do_action( 'chip_life_have_posts_else_before' );	
	endif;	

} /** function chip_life_loop_init() */

/** Chip Life Custom Loop */
function chip_life_custom_loop_init( $args = array() ) {
	
	/** For forward compatibility **/
	$defaults = array(); 
	$args = apply_filters( 'chip_life_custom_loop_args', wp_parse_args( $args, $defaults ), $args, $defaults );
	$custom_query = new WP_Query( $args );
	
	if ( $custom_query->have_posts() ):	
	
	do_action( 'chip_life_while_before' );
	while ( $custom_query->have_posts() ) : $custom_query->the_post();
	
	do_action( 'chip_life_post_wrap_before' );	
	?>
    
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <?php do_action( 'chip_life_post_title_before' ); ?>
        <?php do_action( 'chip_life_post_title' ); ?>
        <?php do_action( 'chip_life_post_title_after' ); ?>
        
        <?php do_action( 'chip_life_post_content_before' ); ?>
        <div class="entry-content">
            <?php do_action( 'chip_life_post_content' ); ?>
        <div class="clear"></div>
        </div><!-- end .entry-content -->
        <?php do_action( 'chip_life_post_content_after' ); ?>
    
    </div> <!-- end .postclass -->

<?php
	
	do_action( 'chip_life_post_wrap_after' );		
	endwhile; /** end loop */	
	
	/** restore original query **/
	wp_reset_query();
	do_action( 'chip_life_while_after' );
	
	else : /** if no posts exist **/	
	do_action( 'chip_life_have_posts_else_before' );	
	endif;

} /** function chip_life_loop_init() */
?>