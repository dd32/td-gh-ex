<div class="container">
	
    <div class="row" id="blog" >

	<?php if ( ( bazaarlite_template('sidebar') == "left-sidebar" ) || ( bazaarlite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo bazaarlite_template('span') .' '. bazaarlite_template('sidebar'); ?> blog"> 
       
        	<div class="row"> 
        
    <?php 
	
		endif; 
	
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?> >
    
				<?php do_action('bazaarlite_postformat'); ?>
        
                <div style="clear:both"></div>
            
			</article>
		
		<?php 
		
			endwhile; 

			if ( bazaarlite_setting('wip_infinitescroll_system') == "on" ) :
				
				do_action('bazaarlite_infinitescroll_script','wip_home'); 
						
			endif;
		
			else:  
			
		?>

            <article <?php post_class(); ?> >
        
                <div class="article">
                        
                    <div class="post-article">
        
                        <h1><?php _e( 'Content not found',"bazaar-lite" ) ?></h1>           
                        
                        <p> <?php _e( 'No article found in this blog.','bazaar-lite'); ?> </p>
        
                        <h2> <?php _e( 'What can i do?',"bazaar-lite" ) ?> </h2>           
        
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
         
               </div>
        
            </article>
	
		<?php endif; ?>
        
	<?php if ( ( bazaarlite_template('sidebar') == "left-sidebar" ) || ( bazaarlite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        </div>
        
    </div>
        
    <?php 
		
		endif;
		
		if ( bazaarlite_template('span') == "col-md-8" ) :
					
			do_action('bazaarlite_side_sidebar', 'side_sidebar_area' ); 
					
		endif;
 	
	?>
           
    </div>

    <?php do_action( 'bazaarlite_pagination', 'home'); ?>

</div>