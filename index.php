<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
<?php 
	wp_enqueue_script("jquery");
	wp_head(); ?>
    <meta name="viewport" content="width=device-width">
</head>

<body <?php body_class(); ?>>


<div class="page-wrapper page-wrapper page-wrapper">
    <header id="main-header" class="l-header  l-header--concierge" role="banner" aria-hidden="false">
		<div class="l-header__top-strip">
			<div class="l-top-strip js-topStrip ">
				<div class="l-top-strip__cta-list">	
                <?php if ( has_nav_menu( 'header-home-menu' ) ) {
					?>
                <!-------- MENU TOP HOME --------------->
         <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topHomeMenu" aria-controls="topHomeMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


                <?php 
                    wp_nav_menu(
                      array(
                        'menu' => 'header-home-menu',
                        'theme_location' => 'header-home-menu',
                        'container' => 'div',
                        'container_id' => 'topHomeMenu',
                        'container_class' => 'collapse navbar-collapse',
                        'menu_class'=>'nav navbar-nav',
                        'link_before' => '',
                        'link_after' => '',
						'depth'=>'11',
						'walker'=> new Apelle_Walker_Nav_Menu()
                      )
                    );
                    
                    
                    ?>
           
</nav>  
                <!-------- FINE MENU TOP HOME ---------->
<?php } ?>
				</div>
            </div>
		</div>
        
        <div class="l-header__inner" style="margin-top:50px" >
			<div class="l-header__top-banner">
				<div class="l-top-banner" >
					<div class="l-top-banner__inner">
						 <?php if ( has_nav_menu( 'top-primary' ) ) {
					?>
                        <!-------- PRIMARY TOP MENU --------------->
						<div class="l-top-banner__primary-nav">
                        	<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<?php 
                            wp_nav_menu(
                              array(
                                'menu' => 'top-primary',
                                'theme_location' => 'top-primary',
                                'container' => 'div',
                                'container_id' => 'topPrimaryMenu',
                                'container_class' => 'collapse navbar-collapse',
								'menu_class'=>'navbar-nav',
                                'link_before' => '',
                                'link_after' => '',
								'depth'=>'11',
								'walker'=> new Apelle_Walker_Nav_Menu_primary()
                              )
                            );
                            
                            
                            ?>
                            </nav>
                        </div>
                        <!-------- PRIMARY TOP MENU ---------->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
	</header>
	<?php 
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
				esc_attr_e( 'Sorry, no posts matched your criteria.', 'apelleuno' );
			endif;
          ?>
        </div>
      <?php if ( is_active_sidebar( 'apelleuno-sidebar-laterale' ) ) : ?>
       <div class=" col-sm-12 col-md-4">
            <ul id="apelleuno-sidebar-laterale">
                <?php dynamic_sidebar( 'apelleuno-sidebar-laterale' ); ?>
            </ul>
        </div>
<?php endif; ?>
      </div>
    </main>
    <div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <!--<img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">-->
            Apelle uno
            <small class="d-block mb-3 text-muted">© 2018-2019</small>
            <?php the_tags();?>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
			
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
            
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>
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
       	 	<h5 class="modal-title">Comemnti</h5>
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
        'label_submit'=>'Send',
        // change the title of the reply section
        'title_reply'=>'Write a Reply or Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ,'apelleuno' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
);

comment_form($comments_args);
?>
	</div>
    <div class="comment list">
    	<?php the_comments_navigation( ); ?>
	</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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