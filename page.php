<?php get_header(); ?>   

<div class="ct_single">
	<div class="container"><div class="row">    
 		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb',1 ) ){ acool_breadcrumbs();} ?>  
        <div class="col-md-9 ct_single_content" >     
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="ct_title_h1"><?php esc_html(the_title()); ?></h1>
            <?php 
				$hide_post_meta = acool_get_option( 'ct_acool','hide_post_meta',0 ); 
				if(!$hide_post_meta ){ acool_show_post_meta();}
			?>  
    
            <?php the_content(); ?>
            
            <p class="ct_clear"></p>
            <hr class="ct_hr"> 
            <?php if(has_tag()){?>
                <div id="article-tag">
                <?php the_tags(__( 'Tags: ', 'acool' ), ' , ' , ''); ?>

                </div> 
            <?php }?> 
            <p></p>
 			<?php acool_previous_next('normal');?>
             <br> <br>         
            <?php
                $withcomments = "1";
                comments_template();
            ?>       
             </div>  
        <?php endwhile;endif; ?> 
        <?php 
			wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'acool' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			) );
		?>
        </div>
    
        <?php get_sidebar( 'acool' ); ?>
             
	</div></div> 		      
</div>

<?php get_footer(); ?>