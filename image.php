<?php

/* 	AssociationX Theme's Image Page to display Single Image
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header();
?>
<div id="pagename" class="d5_image_page"></div>
<div id="container" class="sinpagepostcon sinimagecon box90 fullcontent"> 
	<div id="containerin">
		<div id="content">
			<div class="contentin narrowwidth">
				<?php         
				if (have_posts()): while ( have_posts() ) : the_post(); ?>
					<div <?php post_class('sinimagepost postandpage'); ?> id="post-<?php the_ID(); ?>">
						<h1 class="page-title"><?php the_title(); ?></h1>					                     
						<div class="content-ver-sep"></div>
						<div class="entrytext">
							<?php echo wp_get_attachment_image( $attachment_id, 'full' ); the_content(); ?>
						</div>
						<div class="clear"></div><?php  
						associationx_singleimage_next_previous(); 
						$authorn = esc_html__('Author: ', 'associationx');						
						associationx_author_bio( $authorn, 1, 0 );
						associationx_post_meta(); ?>
					</div><?php 
				endwhile; ?>
					<div class="clear"></div>
					<?php
					comments_template('', true);
				else: associationx_not_found(); 
				endif; ?><!-- End the Loop. -->             
			</div>
		</div>	
	</div>
</div>
<?php get_footer();