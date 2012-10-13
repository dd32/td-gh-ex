<!-- Single -->
<article class="single-wrap">

<div class="post-edit"><?php edit_post_link( 'Edit This' ); ?></div>

<header>	
	<h1 class="single-title">
		<a href="<?php the_permalink(); ?>" class="entry-title"><?php the_title(); ?></a>
	</h1>
</header>

<!-- Widgets: Before Post -->
<?php if ( ( is_active_sidebar( 'widgets_before_post' ) ) && !is_page() ) : ?>
	<div id="widgets-wrap-before-post"><?php dynamic_sidebar( 'widgets_before_post' ); ?></div>
<?php endif ; ?>
<!-- Widgets: Before Page -->
<?php if ( ( is_active_sidebar( 'widgets_before_page' ) ) && is_page() ) : ?>
	<div id="widgets-wrap-before-page"><?php dynamic_sidebar( 'widgets_before_page' ); ?></div>
<?php endif ; ?>


<div class="single-entry">

	<!-- Date & Author -->
	<?php if ( !is_page() ) : ?> 

		<div class="single-top-meta">
			<?php if ( asteroid_option('ast_post_date') == 1 ) : ?>
				<div class="single-date"><?php the_time('F j, Y'); ?></div>
			<?php endif ; ?>
			
			<?php if ( asteroid_option('ast_post_author') == 1 ) : ?>
				<div class="single-author">Posted by <?php the_author_posts_link(); ?></a></div>
			<?php endif ; ?>
		</div>
		
	<?php else : ?>
	
		<div class="single-top-meta">
			<?php if ( asteroid_option('ast_page_date') == 1 ) : ?>
				<div class="single-date"><?php the_time('F j, Y'); ?></div>
			<?php endif ; ?>
			
			<?php if ( asteroid_option('ast_page_author') == 1 ) : ?>
				<div class="single-author">Posted by <?php the_author_posts_link(); ?></a></div>
			<?php endif ; ?>
		</div>
		
	<?php endif ; ?>
	
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

</div><!-- End of Single-Entry -->

<div class="page-links">
	<?php wp_link_pages( array(
		'before'           => '<div>' . 'Pages: ',
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
</div>

<?php if ( is_single() && asteroid_option('ast_date_modified') == 1 ) : ?>
	<div class="updated">Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></div>
<?php elseif ( is_page() && asteroid_option('ast_date_modified') == 2 )  : ?>
	<div class="updated">Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></div>
<?php elseif ( asteroid_option('ast_date_modified') == 3 ) : ?>
	<div class="updated">Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></div>
<?php endif ; ?>

<div class="single-tags"><?php the_tags(); ?></div>

<!-- Widgets: After Post -->
<?php if ( ( is_active_sidebar( 'widgets_after_post' ) ) && !is_page() ) : ?>
	<div id="widgets-wrap-after-post"><?php dynamic_sidebar( 'widgets_after_post' ); ?></div>
<?php endif ; ?>
<!-- Widgets: After Page -->
<?php if ( ( is_active_sidebar( 'widgets_after_page' ) ) && is_page() ) : ?>
	<div id="widgets-wrap-after-page"><?php dynamic_sidebar( 'widgets_after_page' ); ?></div>
<?php endif ; ?>

</article><!-- Single End -->

<?php if (! is_page() ) : ?>
	<div class="next-previous-post">
		<div class="previous-post-link left"><?php previous_post_link('&#x25C0; %link'); ?></div>
		<div class="next-post-link right"><?php next_post_link('%link &#x25B6;'); ?></div>
	</div>
<?php endif; ?>

<?php if ( (!is_page()) && (asteroid_option('ast_post_comments') == 1) ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>
<?php if ( is_page() && (asteroid_option('ast_page_comments') == 1) ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>