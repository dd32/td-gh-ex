<div class="container">
	
    <div class="row" id="blog" >
    
	<?php if ( ( bazaarlite_template('sidebar') == "left-sidebar" ) || ( bazaarlite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo bazaarlite_template('span') .' '. bazaarlite_template('sidebar'); ?>"> 
       
        	<div class="row"> 
        
    <?php 
	
		endif;
	
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div <?php post_class(); ?> >
    
				<?php do_action('bazaarlite_postformat'); ?>
        
                <div style="clear:both"></div>
            
			</div>
		
		<?php 
		
		endwhile; 

		if ( bazaarlite_setting('wip_infinitescroll_system') == "on" ) :
			
			do_action('bazaarlite_infinitescroll_script','wip_category_layout'); 
					
		endif;

		else:  
		
		?>

            <div <?php post_class(); ?> >
        
                <article class="article category">
                        
                    <div class="post-article">
        
                        <h2><?php _e( 'Content not found',"bazaar-lite" ) ?></h2>           
                        
                        <p> <?php _e( 'No article found in this category.','bazaar-lite'); ?> </p>
        
                        <h3> <?php _e( 'What can i do?',"bazaar-lite" ) ?> </h3>           
        
                        <p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage','bazaar-lite'); ?> </a> </p>
        
                        <p> <?php _e( 'Make a search, from the below form:','bazaar-lite'); ?> </p>
                        
                        <section class="contact-form">
                        
                            <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                 <input type="text" value="<?php _e( 'Search', 'bazaar-lite' ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'bazaar-lite' ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', 'bazaar-lite' ) ?>') {this.value = '';}" class="input-search"/>
                                 <input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', 'bazaar-lite' ) ?>" />
                            </form>
                            
                            <div class="clear"></div>
                            
                        </section>
    
                    </div>
         
               </article>
        
            </div>
	
		<?php endif; ?>
        
	<?php if ( ( bazaarlite_template('sidebar') == "left-sidebar" ) || ( bazaarlite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        </div>
        
    </div>
        
    <?php 
		
		endif; 

		if ( bazaarlite_template('span') == "col-md-8" ) :
					
			do_action('bazaarlite_side_sidebar', 'side_sidebar_area'); 
					
		endif;
			
	?>
          
    </div>

	<?php 

		do_action( 'bazaarlite_pagination', 'archive');
		
	?>

</div>