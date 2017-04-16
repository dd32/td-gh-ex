<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Adaptativo
 */


require_once get_template_directory().'/inc/helper.php';


$img_background = "";

if ( has_post_thumbnail()  ){
  $thumbnail = get_the_post_thumbnail_url( null, 'adaptativo_img_home' );
  $img_background = ' style="background-image:url('.$thumbnail.')"';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo $img_background; ?> >

  <a class="wrap-article-home" href="<?php echo esc_url( get_permalink() ); ?>"  >



    	<header class="entry-header">
    		<?php
    		if ( is_single() ) :
    			the_title( '<h1 class="entry-title">', '</h1>' );
    		else :
    			the_title( '<h2 class="entry-title">', '</h2>' );
    		endif;

    		if ( 'post' === get_post_type() ) : ?>
    		<div class="entry-meta">
    			<?php adaptativo_posted_on_home(); ?>
    		</div><!-- .entry-meta -->
    		<?php
    		endif; ?>
    	</header><!-- .entry-header -->

    	<div class="entry-content">
    		<?php

          the_excerpt_max_charlength(140);

    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adaptativo' ),
    				'after'  => '</div>',
    			) );
    		?>
    	</div><!-- .entry-content -->


  </a><!-- wrap-article-home -->

</article><!-- #post-## -->
