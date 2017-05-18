<?php get_header(); ?>

	<section id="slogan">
            
		<div class="container">

			<div class="row">
                    
				<div class="col-md-12">
        
					<h1><?php esc_html_e( '<span>Search </span> results for', "alhena-lite" ) ?> <strong><?php echo $s; ?> </strong></h1>
                    
				</div>
        
			</div>
        
		</div>
        
	</section>

	<div class="container main-content blog">
            
		<div class="row" id="blog" >

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="post-container col-md-12">
            
                <?php do_action('alhenalite_postformat'); ?>
                
				<div class="clear"></div>  
                    
            </div>
        
		<?php endwhile; else:  ?>

            <div class="post-container col-md-12">
    
                <div class="post-article">
    
                    <header class="title">
                        
                        <div class="line"><h1><?php esc_html_e( 'Not Found',"alhena-lite" ) ?></h1></div>
                    
                    </header>
                                    
                    <p> <?php esc_html_e( 'You can repeat your search with the following form.',"alhena-lite" ) ?> </p>
                            
                    <section class="contact-form searchform">
                        
                        <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                            <div>
                                <input type="text" placeholder="<?php esc_attr_e( 'Search here', "alhena-lite" ) ?>"  name="s" id="s" class="input-search"/>
                                <input type="submit" id="searchsubmit" class="button-search" value="<?php esc_attr_e( 'Search', "alhena-lite" ) ?>" />
                            </div>
                        </form>
                        
                        <div class="clear"></div>  
                        
                    </section>
                        
                </div>
    
            </div>
                    
		<?php endif; ?>
           
    </div>
    
</div>

<?php
	
	get_template_part('pagination');
	get_footer(); 

?>