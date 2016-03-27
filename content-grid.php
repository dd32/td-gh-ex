<?php // The template for displaying grid items ?>

<?php
// Define variables
global $bnt_parent_page_id; 
$bnt_tile_size = 'tile-'.get_post_meta( get_the_ID(), 'bnt_tile_size', true );
$bnt_tile_hide_overlay = '';
if ( get_post_meta( get_the_ID(), 'bnt_hide_tile_overlays', true) != 'on' ) {
	$bnt_tile_hide_overlay = 'hide-overlay';
}
$bnt_class_array = array( $bnt_tile_size, $bnt_tile_hide_overlay, 'grid-item' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $bnt_class_array ); ?>>

	<?php 
	// Masonry layout elements
	if ( get_post_meta( $bnt_parent_page_id, 'bnt_page_grid_mode', true ) == 'masonry' ) {
	?>
		
		<div class="masonry-item-before">
        </div>
        
        <div class="masonry-item-inner grid-item-inner">
        	<div class="masonry-item-box grid-item-box">
            	<a class="masonry-item-link" href="<?php echo esc_url( get_permalink() ); ?>">
                    <?php bnt_masonry_item_content(); ?>
                </a>
            </div>
        </div>
        
	<?php 	
	// Column and row layout elements
	} else {
	?>
    
    	<div class="grid-item-inner">
        	<div class="grid-item-box">
	
				<?php bnt_post_thumbnail(); ?>
                
                <?php if ( ! in_array(get_post_format(), array('link','aside','status','quote'), true ) ) { ?>
                    <header class="entry-header grid-item-header">
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </header>
                <?php } ?>
                
				<?php bnt_excerpt(); ?>
                
                <?php bnt_entry_meta(); ?>
                
            </div>
        </div>
        
    <?php } ?>

</article>