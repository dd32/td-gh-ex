<?php
get_header(); 
global  $avata_post_meta;

$sidebar       = isset($avata_post_meta['page_layout'])?esc_attr($avata_post_meta['page_layout']):'none';
$left_sidebar  = isset($avata_post_meta['left_sidebar'])?esc_attr($avata_post_meta['left_sidebar']):''; 
$right_sidebar = isset($avata_post_meta['right_sidebar'])?esc_attr($avata_post_meta['right_sidebar']):'';


$main_class = 'no-aside';
if( $sidebar == 'left' )
$main_class = 'left-aside';

if( $sidebar == 'right' )
$main_class = 'right-aside';

if( $sidebar == 'both' )
$main_class = 'both-aside';

?>

<section class="page-main" id="content">
  <div class="container">
    <div id="primary" class="content-area row <?php echo $main_class;?>">
        <main id="main" class="site-main col-main" role="main">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'page' ); ?>
          <?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>
          <?php endwhile; // end of the loop. ?>
        </main>
        <!-- #main -->
        <?php if( $sidebar == 'left' || $sidebar == 'both'  ): ?>
        <aside id="sidebar" class="col-aside-left">
          <?php get_sidebar( 'pageleft' ); ?>          
         </aside>
         <?php endif; ?>
          <?php if( $sidebar == 'right' || $sidebar == 'both'  ): ?>
        <aside id="sidebar" class="col-aside-right">
          <?php get_sidebar( 'pageright' ); ?>          
         </aside>
         <?php endif; ?>
        
        <!-- #sidebar -->
</div>
      <!-- #primary -->
    
  </div>
</section>
<?php get_footer(); ?>
