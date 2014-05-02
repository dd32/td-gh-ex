<?php get_header(); ?>
		<div id = "site-article">	
			<header class = "site-archive">
			<h1 class ="entry-archive"><?php
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'whitespektrum' ), '<span>' . get_the_date() . '</span>' );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'whitespektrum' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'whitespektrum' ) ) . '</span>' );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'whitespektrum' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'whitespektrum' ) ) . '</span>' );
			else :
				_e( 'Categories', 'whitespektrum' );
			endif;
			?></h1>
			</header>
			
			<?php if(have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1 class = "entry-title">
						<a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h1>
					<?php the_content(); ?>
				<?php endwhile; ?>
				<?php whitespektrum_content_nav(); ?>
			<?php else : ?>
				<article>
					<?php if( current_user_can( 'edit_posts' )) : ?>
						<header class = "entry-header">
						<h1 class = "entry-title"><?php _e('No Posts to Display','whitespektrum'); ?></h1>
						</header>
							<div class="entry-content">
							<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'whitespektrum' ), admin_url( 'post-new.php' ) ); ?></p>
							</div>
					<?php else : ?>
						<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'whitespektrum' ); ?></h1>
						</header>
							<div class="entry-content">
							<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'whitespektrum' ); ?></p>
							<?php get_search_form(); ?>
							</div>
					<?php endif; ?>
				</article>
			<?php endif; ?>
		</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
