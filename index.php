<?php 
	get_header();
	if ( ! isset( $content_width ) ) $content_width = 900;
	?>
	<main class="container" id="main-content" role="main" style="max-width:<?php echo $content_width?>" data-view="responsive/AnimationHandler" aria-hidden="false">
    <div class="l-top-banner__logo">

                            <div class="c-logo " itemscope="" itemtype="http://schema.org/Organization">
                                <a href="/" id="logo" itemprop="url">
                                    <meta itemprop="name" content="Demo">
                                    <?php 
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			if ( has_custom_logo() ) {
					echo '<img src="'. esc_url( $logo[0] ) .'" alt="Demo logo" class="c-logo__img" itemprop="logo">';
			} else {
					echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
			}
			?>
                                </a>
                            </div>

						</div>
    <div class="row">
        <div class="col-sm-12 <?php if ( is_active_sidebar( 'apelleuno-sidebar-laterale' ) ){ echo "col-md-8"; }?> ">
        <?php	
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			?><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php 
				the_title();
			?></h1>
            
			<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} 	
				the_content();
			?></div><?php
			endwhile;
			else :
				esc_attr_e( 'Sorry, no posts matched your criteria.', 'apelle-uno' );
			endif;
          ?>
        </div>
      <?php if ( is_active_sidebar( 'apelleuno-sidebar-laterale' ) ) : ?>
       <div class=" col-sm-12 col-md-4 d-none d-md-block bg-light sidebar">
            <ul id="apelleuno-sidebar-laterale">
                <?php dynamic_sidebar( 'apelleuno-sidebar-laterale' ); ?>
            </ul>
        </div>
<?php endif; ?>
      </div>
    </main>
    <div class="container">
    	<?php get_footer(); ?>
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
       	 	<h5 class="modal-title"><?php __('Comment', 'apelle-uno' );?></h5>
       	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        </div>
        <div class="modal-body">
        	<!--<form method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </form>-->
        	<div class="comment list">
	    <?php comments_template(); ?>
    	<?php wp_list_comments( array( 'style' => 'div' ) ); ?>
        <?php 
		$comments_args = array(
        // change the title of send button 
        'label_submit'=>__('Send', 'apelle-uno' ),
        // change the title of the reply section
        'title_reply'=>__('Write a Reply or Comment', 'apelle-uno' ),
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ,'apelle-uno' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
);

comment_form($comments_args);
?>
	</div>
    <div class="comment list">
    	<?php the_comments_navigation( ); ?>
	</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php __('Close', 'apelle-uno' );?></button>
            <button type="button" class="btn btn-primary"><?php __('Save changes', 'apelle-uno' );?></button>
        </div>
      
    </div>
  </div>
</div>

<!-- FINE Large modal -->
<?php 

    wp_footer();
?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
</body>
</html>