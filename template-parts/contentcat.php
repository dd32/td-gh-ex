<?php
/**
* contentcat.php
* @author    Franchi Design
* @package   Atomy
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="<?php echo esc_attr(get_theme_mod('atomy_enable_full_width_body','container'))?>">
     <div class="row">
      <div class="col-md-12 mb-4">
         <?php the_post_thumbnail('atomy_archive'); ?>
      </div>
     <div class="col-md-12 at-archive-padding">
       <header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title mb-4">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title mb-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		if ( 'post' === get_post_type() ) :?>
			<div class="entry-meta">
			<i class="far fa-calendar mr-2"></i> <?php echo get_the_date (); ?><span class="at-div-icon-blog"></span>
			<i class="fas fa-user mr-2"></i> <?php the_author(); ?><span class="at-div-icon-blog"></span>
			<i class="fas fa-comment mr-2"></i><?php comments_number( 'Comments (0)', 'Comment (1)', 'Comments (%)' ); ?>
			 <?php
                //atomy_posted_on();
				//atomy_posted_by();
				?>	
			</div><!-- .entry-meta -->
		<?php endif;?>
	  </header><!-- .entry-header -->
	  <div class="entry-content">
		<?php
		the_excerpt( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'atomy' ),
				array(
					'span'  => array(
					'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atomy' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</div>
</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->

