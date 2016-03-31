<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_masonry_function')) {

	function bazaarlite_masonry_function() { ?>
	
		<div class="row masonry">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	   
                <article <?php post_class(); ?>>
                
                    <?php do_action('bazaarlite_postformat'); ?>
                
                </article>
        
			<?php 

				endwhile; 

				do_action('bazaarlite_masonry_script'); 

				if ( bazaarlite_setting('wip_infinitescroll_system') == "on" ) :
				
					do_action('bazaarlite_infinitescroll_masonry_script'); 
						
				endif;

				else:  
			
			?>
    
                <article class="post-container col-md-12" >
            
					<div class="post-article">
            
						<h1><?php _e( 'Content not found',"bazaar-lite" ) ?></h1>           
                            
						<p> <?php _e( 'No article found in this blog.',"bazaar-lite"); ?> </p>
            
						<h2> <?php _e( 'What can i do?',"bazaar-lite" ) ?> </h2>           
            
						<p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage',"bazaar-lite"); ?> </a> </p>
                          
						<p> <?php _e( 'Make a search, from the below form:',"bazaar-lite"); ?> </p>
                            
						<section class="contact-form">
                            
							<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="text" value="<?php _e( 'Search', "bazaar-lite" ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', "bazaar-lite" ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', "bazaar-lite" ) ?>') {this.value = '';}" class="input-search"/>
							<input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', "bazaar-lite" ) ?>" />
							</form>
                                
							<div class="clear"></div>
                                
						</section>
             
                   </div>
            
                </article>
        
            <?php endif; ?>
			
		</div>
		
	<?php 
			
	} 
	
	add_action( 'bazaarlite_masonry', 'bazaarlite_masonry_function', 10, 2 );

}

?>