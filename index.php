<?php 

	get_header();
	do_action( 'alhenalite_header_content' );
	if ( have_posts() ) : 
	
?>

<div class="container main-content blog">

	<div class="row" id="blog" >
    
	<?php if ( ( alhenalite_template('sidebar') == "left-sidebar" ) || ( alhenalite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo alhenalite_template('span') .' '. alhenalite_template('sidebar'); ?>"> 
        
        <div class="row"> 
        
    <?php endif; ?>
        
		<?php while ( have_posts() ) : the_post(); ?>

        <div <?php post_class(array('pin-article', alhenalite_template('span') )); ?> >
    
				<?php do_action('alhenalite_postformat'); ?>
        
                <div style="clear:both"></div>
            
            </div>
		
		<?php endwhile; else:  ?>

        <div class="container">
           
            <div class="row" id="blog" >

                <div class="pin-article span12">
        
                    <article class="article">

                        <h1>Not found</h1>

                        <p><?php _e( 'Sorry, no posts matched your criteria',"alhenalite" ) ?> </p>
         
                    </article>
        
                </div>
                
            </div>
            
        </div>
	
		<?php endif; ?>
        
	<?php if ( ( alhenalite_template('sidebar') == "left-sidebar" ) || ( alhenalite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        </div>
	
    </div>
        
    <?php endif; ?>

	<?php if ( alhenalite_template('span') == "span8" ) :  ?>

    <!-- HOME WIDGET -->

    <section id="sidebar" class="pin-article span4">
    	
        <div class="sidebar-box">

			<?php if ( is_active_sidebar('home_sidebar_area') ) { 
            
				dynamic_sidebar('home_sidebar_area');
            
            } else { 
                
                the_widget( 'WP_Widget_Archives','',
				array('before_widget' => '<div id="%1$s" class="widget-box %2$s">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				));

                the_widget( 'WP_Widget_Calendar',
				array("title"=> __('Calendar',"alhenalite")),
				array('before_widget' => '<div id="%1$s" class="widget-box %2$s">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				));

                the_widget( 'WP_Widget_Categories','',
				array('before_widget' => '<div id="%1$s" class="widget-box %2$s">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				));
            
             } 
			 
			 ?>

            </div>
        
        </section>

	<!--  END HOME WIDGET -->

	<?php endif;?>

    </div>
    
</div>

<?php

	get_template_part('pagination');
	do_action( 'alhenalite_footer_content' ); 
	get_footer(); 

?>