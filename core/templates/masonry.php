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

if (!function_exists('suevafree_masonry_function')) {

	function suevafree_masonry_function() { ?>
	
		<div class="row masonry masonry-layout">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	   
                <article <?php post_class(); ?>>
                
                    <?php do_action('suevafree_postformat'); ?>
                
                </article>
        
			<?php 

				endwhile; 

				else:  
			
			?>
    
                <article class="post-container col-md-12" >
            
					<div class="post-article">
            
						<h1><?php _e( 'Content not found',"suevafree" ) ?></h1>           
                            
						<p> <?php _e( 'No article found in this blog.',"suevafree"); ?> </p>
            
						<h2> <?php _e( 'What can i do?',"suevafree" ) ?> </h2>           
            
						<p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage',"suevafree"); ?> </a> </p>
                          
						<p> <?php _e( 'Make a search, from the below form:',"suevafree"); ?> </p>
                            
						<section class="contact-form">
                            
							<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
							<input type="text" value="<?php _e( 'Search', "suevafree" ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', "suevafree" ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', "suevafree" ) ?>') {this.value = '';}" class="input-search"/>
							<input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', "suevafree" ) ?>" />
							</form>
                                
							<div class="clear"></div>
                                
						</section>
             
                   </div>
            
                </article>
        
            <?php endif; ?>
			
		</div>
		
	<?php 
			
	} 
	
	add_action( 'suevafree_masonry', 'suevafree_masonry_function', 10, 2 );

}

?>