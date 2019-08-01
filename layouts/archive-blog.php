<section id="subheader">
	
    <div class="container">
    	
        <div class="row">
            
            <div class="col-md-12">
				
				<p> <?php echo diarjolite_get_archive_title(); ?> </p>
                
            </div>   
                 
		</div>
        
    </div>
    
</section>

<div id="content" class="container">
	
    <div class="row" id="blog" >
    
	<?php if ( ( diarjolite_template('sidebar') == "left-sidebar" ) || ( diarjolite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo diarjolite_template('span') .' '. diarjolite_template('sidebar'); ?>"> 
       
        	<div class="row"> 
        
    <?php 
	
		endif; 
	
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div <?php post_class(); ?> >
    
				<?php do_action('diarjolite_postformat'); ?>
        
                <div style="clear:both"></div>
            
			</div>
		
		<?php endwhile; else:  ?>

            <div <?php post_class(); ?> >
        
                <article class="article category">
                        
                    <div class="post-article">
        
                        <h2><?php _e( 'Content not found',"diarjo-lite" ) ?></h2>           
                        
                        <p> <?php _e( 'No article found in this category.','diarjo-lite'); ?> </p>
        
                        <h3> <?php _e( 'What can i do?',"diarjo-lite" ) ?> </h3>           
        
                        <p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage','diarjo-lite'); ?> </a> </p>
        
                        <p> <?php _e( 'Make a search, from the below form:','diarjo-lite'); ?> </p>
                        
                        <section class="contact-form">
                        
                            <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                 <input type="text" value="<?php _e( 'Search', 'diarjo-lite' ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'diarjo-lite' ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', 'diarjo-lite' ) ?>') {this.value = '';}" class="input-search"/>
                                 <input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', 'diarjo-lite' ) ?>" />
                            </form>
                            
                            <div class="clear"></div>
                            
                        </section>
    
                    </div>
         
               </article>
        
            </div>
	
		<?php endif; ?>
        
	<?php if ( ( diarjolite_template('sidebar') == "left-sidebar" ) || ( diarjolite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        </div>
        
    </div>
        
    <?php endif; ?>

	<?php if ( diarjolite_template('span') == "col-md-8" ) :  ?>

        <section id="sidebar" class="post-container col-md-4">
            
            <div class="sidebar-box">
            
				<?php if ( is_active_sidebar('category-sidebar-area') ) { 
                
                    dynamic_sidebar('category-sidebar-area');
                
                } else { 
                    
                    the_widget( 'WP_Widget_Archives','',
                    array('before_widget' => '<div class="post-article">',
                          'after_widget'  => '</div>',
                          'before_title'  => '<h3 class="title">',
                          'after_title'   => '</h3>'
                    ));
    
                    the_widget( 'WP_Widget_Calendar',
                    array("title"=> __('Calendar',"diarjo-lite")),
                    array('before_widget' => '<div class="post-article">',
                          'after_widget'  => '</div>',
                          'before_title'  => '<h3 class="title">',
                          'after_title'   => '</h3>'
                    ));
    
                    the_widget( 'WP_Widget_Categories','',
                    array('before_widget' => '<div class="post-article">',
                          'after_widget'  => '</div>',
                          'before_title'  => '<h3 class="title">',
                          'after_title'   => '</h3>'
                    ));
                
                 } 
                 
                 ?>
                 
            </div>
            
        </section>
    
	<?php endif; ?>
           
    </div>

	<?php get_template_part('pagination'); ?>

</div>