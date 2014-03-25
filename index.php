<?php get_header(); ?>

<div class="container content">

	<div class="row" id="masonry">
                
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           
			<article id="post-<?php the_ID(); ?>" <?php post_class(array('post-container','col-md-12')); ?>>
				
				<?php do_action('lookilite_postformat'); ?>

			</article>
			
		<?php endwhile; else: ?>
        
			<article class="post-container col-md-12">
                
                <div class="post-article">
    
                    <h1><?php _e( 'Content not found',"wip" ) ?></h1>           
                    
                    <p> <?php _e( 'No article found in this blog.','wip'); ?> </p>
    
                    <h2> <?php _e( 'What can i do?',"wip" ) ?> </h2>           
    
                    <p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage','wip'); ?> </a> </p>
                  
                    <p> <?php _e( 'Make a search, from the below form:','wip'); ?> </p>
                    
                    <section class="contact-form">
                    
                        <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                             <input type="text" value="<?php _e( 'Search', 'wip' ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'wip' ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', 'wip' ) ?>') {this.value = '';}" class="input-search"/>
                             <input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', 'wip' ) ?>" />
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