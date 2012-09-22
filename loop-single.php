<!-- Single Post -->
<div class="single-post-wrap">
<div id="edit-post"><?php edit_post_link( 'Edit This' ); ?></div>
		
<?php if ( ( asteroid_option('single_date_on') == 1 ) && (! is_page() ) ) : ?>
	<div class="post-date">
		<div class="mdate"><?php the_time('M') ; ?></div>
		<div class="pdate"><?php the_time('d') ; ?></div>
	</div>
<?php endif ; ?>

<h1 class="single-title">
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h1>

<!-- Widgets: Before Post -->
<?php if ( is_active_sidebar( 'before_post_widgets' ) ) : ?>
	<div id="before-post-widgets-wrap"><?php dynamic_sidebar( 'before_post_widgets' ); ?></div>
<?php endif ; ?>

<div class="single-entry">

	<!-- Don't Show Date & Author on Pages -->
	<?php if (! is_page() ) : ?> 
		<div class="post-top-meta">
		
			<?php if ( asteroid_option('full_post_date') == 1 ) : ?>
				<div class="post-date-full"><?php the_time('F j, Y'); ?></div>
			<?php endif ; ?>
			
			<?php if ( asteroid_option('show_post_author') == 1 ) : ?>
				<div class="post-author">Posted by <?php the_author_posts_link(); ?></a></div>
			<?php endif ; ?>
			
		</div>
	<?php endif ; ?>
	
	<!-- Widgets: Before Content -->
	<?php if ( is_active_sidebar( 'before_post_content_widgets' ) ) : ?>
		<div id="before-post-content-widgets-wrap"><?php dynamic_sidebar( 'before_post_content_widgets' ); ?></div>
	<?php endif ; ?>
	
	<?php the_content(); ?>
	
	<!-- Widgets: After Content -->
	<?php if ( is_active_sidebar( 'after_post_content_widgets' ) ) : ?>
		<div id="after-post-content-widgets-wrap"><?php dynamic_sidebar( 'after_post_content_widgets' ); ?></div>
	<?php endif ; ?>

	<div class="clear"></div>
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

<div class="single-tags"><?php the_tags(); ?></div>

<!-- Widgets: After Post -->
<?php if ( is_active_sidebar( 'after_post_widgets' ) ) : ?>
	<div id="after-post-widgets-wrap"><?php dynamic_sidebar( 'after_post_widgets' ); ?></div>
<?php endif ; ?>

</div><!-- Single Post -->

<?php comments_template(); ?>