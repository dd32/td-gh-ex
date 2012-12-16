<!-- Loop Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-view'); ?> >

<div class="entry-header">					
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" >
		<?php 
			if ( the_title( '', '', false ) != '' ){
				echo the_title();
			}	
			else {						
				echo 'Untitled';
			}
		?>
	</a></h2>
</div>

<?php if ( asteroid_option('ast_blog_date') == 1 ) : ?>
	<div class="entry-date"><?php the_time('F j, Y'); ?></div>
<?php endif; ?>

<div class="entry-categories"><?php the_category(' '); ?></div>

<div class="entry-content">
					
	<?php if ( asteroid_option('ast_post_display_type') == 1 ) : ?>
	
		<?php if ( asteroid_option('ast_excerpt_thumbnails') == 1 ) : ?>
			<?php if ( has_post_thumbnail()) : ?>
				<a class="entry-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail') ; ?></a>
			<?php endif ; ?>
		<?php endif ; ?>
		
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
	<?php else : ?>				
	
		<?php the_content(); ?>
		
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

</div>	<!-- entry-content -->

<?php if ( asteroid_option('ast_post_display_type') == 1 ) : ?>
	<div class="read-more">
		<a href="<?php the_permalink(); ?>" class="read-more-button">Read More</a>
	</div>
	
	<!-- Widgets: Below Excerpts -->
	<?php if ( is_active_sidebar( 'widgets_below_excerpts' ) )  : ?>
		<div id="widgets-wrap-below-excerpts">
			<?php dynamic_sidebar( 'widgets_below_excerpts' ); ?>
		</div>
	<?php endif ; ?>
<?php else : ?>
	<div class="entry-tags"><?php the_tags(); ?></div>
<?php endif ; ?>
	
</article>