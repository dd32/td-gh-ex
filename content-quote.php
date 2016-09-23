<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package Catch Themes
 * @subpackage Catch Kathmandu
 * @since Catch Kathmandu 1.0
 */
//Getting data from Theme Options Panel and Meta Box 
global $catchkathmandu_options_settings;
$options = $catchkathmandu_options_settings; 

//More Tag
$moretag = $options[ 'more_tag_text' ];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( function_exists( 'catchkathmandu_content_image' ) ) : catchkathmandu_content_image(); endif; ?>
    
	<div class="entry-container post-format">
    
        <div class="entry-content">
            <?php the_content( $moretag ); ?>
			<?php wp_link_pages( array( 
                'before'		=> '<div class="page-link"><span class="pages">' . __( 'Pages:', 'catch-kathmandu' ) . '</span>',
                'after'			=> '</div>',
                'link_before' 	=> '<span>',
                'link_after'   	=> '</span>',
            ) ); 
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-meta">
            <?php catchkathmandu_post_format_meta(); ?>   
            <?php if ( comments_open() ) : ?>
            	<span class="sep"> | </span>
            	<span class="comments-link"><?php comments_popup_link(__('Leave a reply', 'catch-kathmandu'), __('1 Reply', 'catch-kathmandu'), __('% Replies;', 'catch-kathmandu')); ?></span>
            <?php endif; ?>
            <?php edit_post_link( __( 'Edit', 'catch-kathmandu' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
    
   	</div><!-- .entry-container -->
         
</article><!-- #post-<?php the_ID(); ?> -->