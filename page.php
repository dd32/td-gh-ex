<?php
/**
 * @package WordPress
 * @subpackage Webfish_Theme
 */

get_header(); 
global $webfish_settings; ?>
<div id="c_wrap">
<div id="c_top"></div>

	<div id="content" class="narrowcolumn" role="main">

		<?php if (have_posts()) : the_post(); ?>
		<div class="page" id="post-<?php the_ID(); ?>">
		<h1 id="page_title"><?php the_title(); ?></h1>
			<div class="entry">
				<?php 
				if (WEBFISH_USE_THUMBNAILS && $webfish_settings['thumbnails_page']==1)
						if ( has_post_thumbnail()) 
  							the_post_thumbnail();
				the_content('<p class="serif">'.__('Read the rest of this page &raquo;').'</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<div class="clear"></div>
			</div>
		</div>
		
		<?php else:?>
		<div class="page">
		<h1><?php _e("Page not found","webfish");?></h1>
			<div class="entry">
			<?php _e("We could not find the page you are looking for. We have searched in more than 404 places...","webfish");?>
			</div>
		</div>
		
		<?php endif; ?>
	<?php comments_template(); ?>
	
	</div>
<div id="c_bottom"></div>
<div class="clear"></div>
</div><!-- End: c_wrap -->



<?php get_footer(); ?>
