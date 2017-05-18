<?php if ( have_posts() ) : ?>

<div class="container main-content blog">

	<div class="row" id="blog" >
    
	<?php if ( ( alhenalite_template('sidebar') == "left-sidebar" ) || ( alhenalite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo alhenalite_template('span') .' '. alhenalite_template('sidebar'); ?>"> 
        
        <div class="row"> 
        
    <?php endif; ?>
        
		<?php while ( have_posts() ) : the_post(); ?>

        <div <?php post_class(); ?> >
    
				<?php do_action('alhenalite_postformat'); ?>
        
                <div style="clear:both"></div>
            
            </div>
		
		<?php endwhile; else:  ?>

        <div class="container">
           
            <div class="row" id="blog" >

                <div class="post-container col-md-12">
        
                    <div class="post-article">

                        <h1>Not found</h1>

                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria',"alhena-lite" ) ?> </p>
         
                    </div>
        
                </div>
                
            </div>
            
        </div>
	
		<?php endif; ?>
        
	<?php if ( ( alhenalite_template('sidebar') == "left-sidebar" ) || ( alhenalite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        </div>
	
    </div>
        
    <?php endif; ?>

	<?php if ( alhenalite_template('span') == "col-md-8" ) :  ?>

    <!-- HOME WIDGET -->

	<div class="col-md-4">
                
		<div class="row">
            
			<div id="sidebar" class="col-md-12">
                        
				<div class="sidebar-box">

					<?php if ( is_active_sidebar('category_sidebar_area') ) { 
                    
                        dynamic_sidebar('category_sidebar_area');
                    
                    } else { 
                        
                        the_widget( 'WP_Widget_Archives','',
                        array(	'before_widget' => '<div class="post-article widget-box">',
                                'after_widget'  => '</div>',
                                'before_title'  => '<header class="title"><div class="line"><h3>',
                                'after_title'   => '</h3></div></header>'
                        ));
        
                        the_widget( 'WP_Widget_Calendar',
                        array("title"=> esc_html__('Calendar',"alhena-lite")),
                        array(	'before_widget' => '<div class="post-article widget-box">',
                                'after_widget'  => '</div>',
                                'before_title'  => '<header class="title"><div class="line"><h3>',
                                'after_title'   => '</h3></div></header>'
                        ));
        
                        the_widget( 'WP_Widget_Categories','',
                        array(	'before_widget' => '<div class="post-article widget-box">',
                                'after_widget'  => '</div>',
                                'before_title'  => '<header class="title"><div class="line"><h3>',
                                'after_title'   => '</h3></div></header>'
                        ));
                    
                     } 
                     
                     ?>
        
				</div>
                        
			</div>
            
		</div>
                    
	</div>

	<?php endif;?>

    </div>
    
</div>