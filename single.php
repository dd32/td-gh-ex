<?php get_header(); ?>   

<div class="ct_single">

	<div class="container"><div class="row">
    
    	<?php if( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED ){ get_sidebar( 'content' );} ?>
    
 		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb',1) ){ acool_breadcrumbs();} ?>  
    
        <div class="col-md-8 ct_single_content" > 
            
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        	
        	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="ct_border">
                    <h1 class="ct_title_h1"><?php esc_html(the_title()); ?></h1>
                 	<?php 
						$hide_post_meta = acool_get_option( 'ct_acool','hide_post_meta',0 ); 
						if(!$hide_post_meta ){ acool_show_post_meta();}
					?> 
            
                    <?php the_content(); ?>      

					<?php if(has_tag()){?>
                        <div id="article-tag">
                        <?php the_tags('<strong>'.__( 'Tags: ', 'acool' ).'</strong> ', ' , ' , ''); ?>
                        </div> 
                    <?php }?> 
                
                <p class="ct_clear"></p> 
                </div>
             
				<?php
					if( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED ){ 
						if ( is_active_sidebar( 'sidebar-7' ) ) :
							dynamic_sidebar( 'sidebar-7' );
						endif;
					}
                ?><!-- #after content widgets -->

                <?php
					if ( comments_open() ){ 
						$withcomments = "1";
						comments_template();
					}
                ?>  
            
                <?php 
					if ( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED )
					{
						acool_previous_next($post->ID);
					}
                ?>
		  
         	</div><!--div id="post-<?php the_ID(); ?>" <?php post_class(); ?>-->   
        <?php endwhile;endif; ?> 
        </div><!--div class="col-md-8 ct_single_content" --> 
    
        <?php get_sidebar( 'acool' ); ?>
             
	</div></div><!--div class="container"><div class="row"--> 		      
</div><!--div class="ct_single"-->
<?php wp_link_pages(); ?>
<?php get_footer(); ?>