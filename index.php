<?php 
	get_header();
	if ( ! isset( $content_width ) ) $content_width = 900;
	?>
	<main class="container" id="main-content" role="main" style="max-width:<?php echo esc_attr($content_width)?>" data-view="responsive/AnimationHandler" aria-hidden="false">
    
    <div class="row">
        <div class="col-sm-12 <?php if ( is_active_sidebar( 'apelleuno-sidebar-laterale' ) ){ echo "col-md-8"; }?> ">
        <?php	
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			?><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href="<?php echo esc_url( get_permalink() ); ?>"><h1><?php 
				the_title();
			?></h1></a>
            
			<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} 	
			
			if (is_singular()) {
				
				the_content();
				
			}else{
				
				the_excerpt();
				
				}
				
			?></div><?php
			endwhile;
			else :
				esc_attr_e( 'Sorry, no posts matched your criteria.', 'apelle-uno' );
			endif;
          ?>
           <?php if ( is_singular() && comments_open() ) { ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><?php esc_attr_e( 'Leave a comment.', 'apelle-uno' ); ?></button>
<?php } ?>
        </div>
      <?php if ( is_active_sidebar( 'apelleuno-sidebar-laterale' ) ) : ?>
       <div class=" col-sm-12 col-md-4 d-md-block bg-light sidebar">
            <ul id="apelleuno-sidebar-laterale">
                <?php dynamic_sidebar( 'apelleuno-sidebar-laterale' ); ?>
            </ul>
        </div>
<?php endif; ?>
      </div>
    </main>
    <div class="container">
    	
        <div><?php the_posts_navigation() ?>
            <?php wp_link_pages(); ?>
        </div>
        
    </div>
    
</div>

<style>
#contenuto-centrale.l-takeover__content{     z-index: unset;}
#contenuto-menu-sinistro.l-takeover__wrapper { position:absolute; z-index:99;}
#mappa-di-sfondo.l-takeover__media:before{z-index:0;}
#contenuto-menu-sinistro.l-takeover__wrapper {background-color: rgba(26,26,26,0.7);      }
.modal-backdrop {
    z-index: 10;}
	

</style>

<!-- Large modal -->


<div class="modal  fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
       	 	<h5 class="modal-title"><?php esc_html_e('Comment', 'apelle-uno' );?></h5>
       	 	<button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_attr_e( "Close" ,'apelle-uno' ); ?>">
          		<span aria-hidden="true">&times;</span>
        	</button>
        </div>
        <div class="modal-body">
        	<?php
			 comments_template(); 
			?>
	
    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ><?php esc_html_e('Close', 'apelle-uno' );?></button>
        </div>
      
    </div>
  </div>
</div>

<!-- FINE Large modal -->
<?php get_footer(); ?>
