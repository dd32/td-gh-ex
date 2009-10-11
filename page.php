<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		
	<div class="entry">		
		<div class="one">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
					<?php the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
				
			<p class="postmetadata">
				<span class="tags">	<?php the_tags(__( 'Tag: ') , ' ', ' | ', ' '); ?> </span>
		
	 			<span class="category"><?php printf(__('Categorie: %s', 'kubrick'), get_the_category_list(' ')); ?></span>
		 
				<span class="time"><?php the_time(__('| j F Y', 'kubrick')) ?> <!-- by <?php the_author() ?> --></span>
				<br>
				<span class="com">
		 		 <?php comments_popup_link(__('No Comments &#187;', 'kubrick'), __('1 Comment &#187;', 'kubrick'), __('% Comments &#187;', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?>
	  			</span>
			</p>
			
	<?php comments_template(); ?>
		</div>
	</div>
	</div>
	
	<?php endwhile; endif; ?>
	<?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
