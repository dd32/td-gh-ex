<?php get_header(); ?>

<section id="subheader">
	
    <div class="container">
    	
        <div class="row">
            
            <div class="col-md-12">
				
				<?php if (is_tag()) { ?>

                    <p><?php _e( 'Tag','wip'); ?> : <?php single_tag_title(); ?> </p>
				
				<?php  } else if (is_category()) { ?>
                
                    <p><?php _e( 'Category','wip'); ?> : <?php single_cat_title(); ?> </p>

				<?php  } else if (is_month()) { ?>

                    <p><?php _e( 'Archive for','wip'); ?> : <?php the_time('F, Y'); ?> </p>

                <?php } ?>
                
            </div>   
                 
		</div>
        
    </div>
    
</section>

<div class="container content">

	<div class="row" id="masonry">
                
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           
			<article <?php post_class(array('post-container','col-md-12')); ?>>
				
				<?php do_action('lookilite_postformat'); ?>
                
			</article>

		<?php endwhile; else: ?>

			<article class="post-container col-md-12">
                
                <div class="post-article">
    
                    <h2><?php _e( 'Content not found',"wip" ) ?></h2>           
                    
                    <p> <?php _e( 'No article found in this category.','wip'); ?> </p>
    
                    <h3> <?php _e( 'What can i do?',"wip" ) ?> </h3>           
    
                    <p> <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage','wip'); ?> </a> </p>
    
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