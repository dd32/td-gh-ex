<?php
/**
 * @package mwsmall
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<?php the_post_thumbnail('blog_img'); ?>
		<?php endif; ?>

		<div class="mw_title">
			<div class="entry-time">
				<?php 
					$deftime = get_theme_mod( 'mwsmall_time', '' );
					if ( $deftime == '' ) : ?>
					<span class="day"><?php echo get_the_date('j'); ?></span>
					<span class="month"><?php echo get_the_date('M'); ?></span> /
					<span class="year"><?php echo get_the_date('Y'); ?></span>
				<?php else : ?>
					<span class="mw-date-format"><?php echo get_the_date(); ?></span>
				<?php endif; ?>
			</div><!-- .entry-time -->
			<h1 class="entry-title col-lg-8 col-sm-6 col-xs-7"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php mwsmall_post_icon(); ?>
			<?php if( is_sticky() ) { ?> <span class="sticky-post"><i class="fa fa-star-o fa-2x"></i></span> <?php } ?>

		</div><!-- .mw_title -->

	</header><!-- .entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content clearfix">
		<?php
			if ( get_post_format() == 'gallery' ){
				// no content
			}else{
				the_content( __( '[...]', 'mw-small' ) );
			}?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mw-small' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<footer class="entry-meta">
		<span class="author-link fa fa-user"></span><?php the_author_posts_link() ?>
		<span class="cat-link fa  fa-folder-open"></span><?php the_category(', '); ?>
		<?php the_tags( '<span class="tag-link fa fa-tags"></span>', ', ', '' ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<span class="comments-link fa fa-comments"></span><?php comments_popup_link('0', '1', '%', 'comments-link', ''); ?>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'mw-small' ), '<span class="edit-link">', '</span>' ); ?>
		<a class="more-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e( 'Read more', 'mw-small' ); ?><span> &rarr;</span></a>
	</footer><!-- .entry-meta -->
	
</article><!-- #post-## -->