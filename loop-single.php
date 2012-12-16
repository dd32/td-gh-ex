<!-- Single -->
<article id="post-<?php the_ID(); ?>" <?php post_class('single-view'); ?> >

<div class="edit-post">
	<?php edit_post_link( 'Edit This' ); ?>
</div>

<div class="entry-header">	
	<h1 class="entry-title"><a href="<?php the_permalink(); ?>" >
		<?php 
			if ( the_title( '', '', false ) != '' ){
				echo the_title();
			}	
			else {						
				echo 'Untitled';
			}
		?>
	</a></h1>
</div>

<!-- Widgets: Before Post -->
<?php if ( ( is_active_sidebar( 'widgets_before_post' ) ) && !is_page() ) : ?>
	<div id="widgets-wrap-before-post"><?php dynamic_sidebar( 'widgets_before_post' ); ?></div>
<?php endif ; ?>
<!-- Widgets: Before Page -->
<?php if ( ( is_active_sidebar( 'widgets_before_page' ) ) && is_page() ) : ?>
	<div id="widgets-wrap-before-page"><?php dynamic_sidebar( 'widgets_before_page' ); ?></div>
<?php endif ; ?>

<!-- Date & Author -->
<div class="entry-meta-top">
	<?php if ( !is_page() ) : ?> 

			<?php if ( asteroid_option('ast_post_date') == 1 ) : ?>
				<div class="entry-date"><?php the_time('F j, Y'); ?></div>
			<?php endif ; ?>
			
			<?php if ( asteroid_option('ast_post_author') == 1 ) : ?>
				<div class="entry-author">Posted by <?php the_author_posts_link(); ?></a></div>
			<?php endif ; ?>
		
	<?php else : ?>
	
			<?php if ( asteroid_option('ast_page_date') == 1 ) : ?>
				<div class="entry-date"><?php the_time('F j, Y'); ?></div>
			<?php endif ; ?>
			
			<?php if ( asteroid_option('ast_page_author') == 1 ) : ?>
				<div class="entry-author">Posted by <?php the_author_posts_link(); ?></a></div>
			<?php endif ; ?>

	<?php endif ; ?>
</div>

<div class="entry-content">

	<!-- Widgets: Before Post Content -->
	<?php if ( ( is_active_sidebar( 'widgets_before_post_content' ) ) && !is_page() ) : ?>
		<div id="widgets-wrap-before-post-content"><?php dynamic_sidebar( 'widgets_before_post_content' ); ?></div>
	<?php endif ; ?>
	<!-- Widgets: Before Page Content -->
	<?php if ( ( is_active_sidebar( 'widgets_before_page_content' ) ) && is_page() ) : ?>
		<div id="widgets-wrap-before-page-content"><?php dynamic_sidebar( 'widgets_before_page_content' ); ?></div>
	<?php endif ; ?>
	
	<?php the_content(); ?>
	
	<!-- Widgets: After Post Content -->
	<?php if ( ( is_active_sidebar( 'widgets_after_post_content' ) ) && !is_page() ) : ?>
		<div id="widgets-wrap-after-post-content"><?php dynamic_sidebar( 'widgets_after_post_content' ); ?></div>
	<?php endif ; ?>
	<!-- Widgets: After Page Content -->
	<?php if ( ( is_active_sidebar( 'widgets_after_page_content' ) ) && is_page() ) : ?>
		<div id="widgets-wrap-after-page-content"><?php dynamic_sidebar( 'widgets_after_page_content' ); ?></div>
	<?php endif ; ?>

	<?php wp_link_pages( array(
		'before'           => '<div class="page-nav">' . 'Pages: ',
		'after'            => '</div>',
		'link_before'      => '<span>',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'nextpagelink'     => ('Next page'),
		'previouspagelink' => ('Previous page'),
		'pagelink'         => '%',
		'echo'             => 1 ) 
		);
	?>

</div><!-- End Entry-Content -->

<div class="entry-meta-bottom">

	<?php if ( !is_attachment() && is_single() && asteroid_option('ast_date_modified') == 1 ) : ?>
		<div class="updated">Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></div>
	<?php elseif ( !is_attachment() && is_page() && asteroid_option('ast_date_modified') == 2 )  : ?>
		<div class="updated">Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></div>
	<?php elseif ( !is_attachment() && asteroid_option('ast_date_modified') == 3 ) : ?>
		<div class="updated">Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></div>
	<?php endif ; ?>
	
	<div class="entry-tags"><?php the_tags(); ?></div>

	<?php if ( is_attachment() ) : ?>
		<div class="next-previous-attachment">
			<div class="left"><?php previous_image_link(0,'&laquo; Previous Image') ?></div>
			<div class="right"><?php next_image_link(0,'Next Image &raquo;') ?></div>
		</div>
	<?php endif; ?>

	<!-- Widgets: After Post -->
	<?php if ( ( is_active_sidebar( 'widgets_after_post' ) ) && !is_page() ) : ?>
		<div id="widgets-wrap-after-post"><?php dynamic_sidebar( 'widgets_after_post' ); ?></div>
	<?php endif ; ?>
	<!-- Widgets: After Page -->
	<?php if ( ( is_active_sidebar( 'widgets_after_page' ) ) && is_page() ) : ?>
		<div id="widgets-wrap-after-page"><?php dynamic_sidebar( 'widgets_after_page' ); ?></div>
	<?php endif ; ?>
	
	<?php if (! is_page() ) : ?>
		<div class="next-previous-post">
			<div class="previous-post-link left"><?php previous_post_link('&#x25C0; %link'); ?></div>
			<div class="next-post-link right"><?php next_post_link('%link &#x25B6;'); ?></div>
		</div>
	<?php endif; ?>
</div>


<?php if ( (!is_page()) && (asteroid_option('ast_post_comments') == 1) ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>
<?php if ( is_page() && (asteroid_option('ast_page_comments') == 1) ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>

</article><!-- Single End -->