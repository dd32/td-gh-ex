<?php // The default template for displaying content ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	
	bnt_post_date_blog(); 
	
	bnt_post_thumbnail();
	
	bnt_post_title();
	
	bnt_post_content();
	
	bnt_entry_meta();
	
	bnt_author_info();
	
	?>
		
</article>