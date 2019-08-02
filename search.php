<?php get_header(); ?>

<section id="subheader">
	
    <div class="container">
    	
        <div class="row">
            
            <div class="col-md-12">
            
            	<h1><?php _e( '<span>Search </span> results for: ', 'looki-lite' ); echo $s; ?></h1>
                
            </div>   
                 
		</div>
        
    </div>
    
</section>

<div id="content" class="container content">

	<div class="row">
                
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php do_action('lookilite_postformat'); ?>
                
			</article>

		<?php endwhile; else:  ?>

			<article class="post-container col-md-12">

                <div class="post-article">
    
                    <h2> <?php _e( 'Content not found',"looki-lite" ) ?> </h2>           
                    
                    <p> <?php _e( 'The page that you requested, was not found.','looki-lite'); ?> </p>
    
                    <h3> <?php _e( 'What can i do?',"looki-lite" ) ?> </h3>           
    
                    <p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage','looki-lite'); ?> </a> </p>
                  
                    <p> <?php _e( 'Check the typed term','looki-lite'); ?> </p>

                    <p> <?php _e( 'Make a new search, from the below form:','looki-lite'); ?> </p>
                    
                    <section class="contact-form">
                    
                        <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                             <input type="text" value="<?php _e( 'Search', 'looki-lite' ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'looki-lite' ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', 'looki-lite' ) ?>') {this.value = '';}" class="input-search"/>
                             <input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', 'looki-lite' ) ?>" />
                        </form>
                        
                        <div class="clear"></div>
                        
                    </section>
    
                </div>

			</article>

		<?php endif; ?>
                
	</div>
            
	<?php get_template_part('pagination'); ?>
		
</div>

<?php get_footer(); ?>