<?php get_header();

    if (have_posts()) :

        while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php if ( has_post_thumbnail()) : post_class('has_featured_image'); else : post_class(); endif;?>>

                <?php if ( get_theme_mod('display_post_title_setting') == 'off' ) : else : ?>

                    <h5 id="get_to_it" class="post_title"><?php if (get_theme_mod('display_date_setting') != 'off' ) : ?><time datetime="<?php the_time('Y-m-d H:i') ?>"><?php the_time('M jS') ?><br/><?php the_time('Y') ?></time><?php endif; ?><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'localize_semperfi'); } ?></h5>

                <?php endif; ?>

                <?php echo wp_get_attachment_image( get_the_ID(), 'large_featured' );?>
                
                <div class="stars_and_bars">
                <span class="center">Download:
                <?php $images = array();
                    $image_sizes = get_intermediate_image_sizes();
                    array_unshift( $image_sizes, 'full' );
                    foreach( $image_sizes as $image_size ) {
                        if (($image_size == 'full') || ($image_size == 'medium') || ($image_size == 'small') || ($image_size == 'thumbnail')) {
                        $image = wp_get_attachment_image_src( get_the_ID(), $image_size );
                        $name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
                        $images[] = '<a href="' . $image[0] . '">' . ucfirst(strtolower($name)) . '</a>';}}
                    
                    echo implode( ' | ', $images ); ?></span></div>

                <?php if (the_content() != '') :?><blockquote><?php the_content(); ?></blockquote><?php endif;?>
                
<?php
                if ( $post->post_status == 'inherit' ) {
		$attachments = get_posts( array(
			'post_type' => 'attachment',
			'posts_per_page' => -1,
			'post_parent' => $post->post_parent,
			'exclude'     => get_post_thumbnail_id()
		) );

		if ( $attachments ) { $number_attachments = count($attachments);
        ?>
        <h6 class="center">List of <a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a>'s Attachments</h6>
        <div class="gallery gallery-columns-<?php echo $number_attachments; if ($number_attachments > 6) { echo ' gallery-columns-lots'} ?>">     
        <?php
			foreach ( $attachments as $attachment ) {
				$class = "post-attachment" . sanitize_title( $attachment->post_mime_type );
				$thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail_size', true );
				echo '<dl class="gallery-item"><dt class="gallery-icon landscape">' . $thumbimg . '</dt></dl>';
			}?>
             </div>
		<?php	
		}
	}
?>


                <div class="stars_and_bars">
                    <span class="left">
                        Return to : <a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a>
                    </span>
                    <span class="right">
                        <a href="<?php echo home_url(); ?>/">Home</a>
                    </span>
                </div>

            </div>

            <?php if (!is_home() && (get_theme_mod('comments_setting') != 'none')) :

                comments_template();

            endif;

        endwhile;

    endif; ?>

<?php if ( (get_next_posts_link() != '') || (get_previous_posts_link() != '') ) : ?>

    <div class="stars_and_bars">   
        <span class="left"><?php next_posts_link( '&#8249; ' . __('Older Posts', 'localize_semperfi')); ?></span>
        <span class="right"><?php previous_posts_link( __('Newer Posts', 'localize_semperfi') . ' &#8250;'); ?></span>
    </div>

<?php else : ?>

    <div class="stars_and_bars"></div>

<?php endif;

if (semperfi_is_sidebar_active('widget')) get_sidebar();

get_footer(); ?>