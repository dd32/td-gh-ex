<?php 
//single.php

get_header(); ?>   

<div class="ct_single">
	<div class="container"><div class="row">

        <div class="col-md-9 ct_single_content">    
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    
            <h1 class="ct_title_h1"><a href="<?php echo esc_url(get_permalink());?>"><?php esc_html(the_title()); ?></a></h1>
            <?php 
				$hide_post_meta = acool_get_option( 'ct_acool','hide_post_meta',0 ); 
				if(!$hide_post_meta ){ acool_show_post_meta();}
			?> 
    
            <?php the_content(); ?>
            
            <hr>    
            
            <?php
                $withcomments = "1";
                comments_template(); 
            ?>       
  
        <?php endwhile;endif; ?> 
        </div>

        <?php get_sidebar( 'acool' ); ?>
          
	</div></div> 		      
</div>
<?php get_footer(); ?>