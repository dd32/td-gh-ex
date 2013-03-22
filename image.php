<?php
/**
 * The template for displaying image attachments.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div class="inner_top_mn">
		<div class="page_wi">			
			<h2>
				<?php bloginfo('title')?><br>
				<span><?php bloginfo('description')?></span>	
			</h2>
			<div class="search_box">
			   <div id="searchbox">
                 <form role="search" method="get" id="searchform" action=""  >
                 <input type="text" value="Search here" name="s" id="s" onClick="if(this.value=='Search here'){this.value=''}" 
                 onBlur="if(this.value==''){this.value='Search here'}"  />  
                 </form>
              </div>
		   </div>
		</div>
	</div>
    </header>
   
   
		<div class="page_wi">
			<div class="blog_full_width">
			
			
		<?php while ( have_posts() ) : the_post(); ?>
                  <h2><?php the_title(); ?></h2>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
				      
						

						<footer >
							<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'appointment' ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
									get_the_title( $post->post_parent )
								);
							?>
							<?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
			
			<div class="blog_full_width_border_row"></div>
			<div> </div>
						
				

				
<?php
/**
 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
 */
$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
foreach ( $attachments as $k => $attachment ) :
	if ( $attachment->ID == $post->ID )
		break;
endforeach;

$k++;
// If there is more than 1 attachment in a gallery
if ( count( $attachments ) > 1 ) :
	if ( isset( $attachments[ $k ] ) ) :
		// get the URL of the next image attachment
		$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
	else :
		// or get the URL of the first image attachment
		$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	endif;
else :
	// or, if there's only 1 image, get the URL of the image
	$next_attachment_url = wp_get_attachment_url();
endif;
?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
								$attachment_size = apply_filters( 'appointment_attachment_size', array( 960, 960 ) );
								echo wp_get_attachment_image( $post->ID, $attachment_size );
								?></a>
<nav id="image-navigation" class="navigation" role="navigation">
							<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'appointment' ) ); ?></span>
							<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'appointment' ) ); ?></span>
						</nav><!-- #image-navigation --><br />
								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							

						<div class="entry-description">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'appointment' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-description -->

				
            
				</article><!-- #post -->
          </div>
		  
		  <div class="blog_full_width_border_row"></div>
		  
				<?php comments_template(); ?>

			<?php endwhile; // end of the loop. ?>

		
	</div><!-- page_wi -->

<?php get_footer(); ?>