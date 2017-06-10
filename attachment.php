<?php get_header(); ?>

<!-- start content -->

<div class="container main-content custom-post">

	<div class="row" >
    
        <div <?php post_class(); ?> >
          
           <div class="post-article attachment">
            
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <header class="title"><div class="line"><h1><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1></div></header>

                <div class="entry-info">
                   
                     <span class="entry-date">
                        <?php echo get_the_date(); ?>
                     </span>

                </div>

				<p> 

					<?php if (wp_attachment_is_image($post->id)) { ?>
    
                        <a data-rel="prettyPhoto" href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php echo the_title_attribute(); ?>">
                            <?php echo wp_get_attachment_image($post->id, 'blog'); ?>
                        </a>
    
                    <?php } else { ?>
                            
                        <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            
                    <?php } ?>

				</p>
                
                </div>
                
            <div style="clear:both"></div>
            
        </div>
		
		<?php endwhile; endif;?>

    </div>
    
</div>

<?php get_footer(); ?>