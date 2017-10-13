<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package atoz
 */

?>
<!--blog-box-->
      <article class="col-md-4 col-sm-4">
        <div class="blog-box-inn eq-blocks"> <span><?php echo get_the_date('M d');?></span> 
            <?php
            if  ( get_the_post_thumbnail()!='')
            {?><a href="<?php the_permalink();?>"><?php
             the_post_thumbnail('atoz_home_posts'); ?></a><?php
            }else{?>
            <a href="<?php the_permalink();?>"><img src="<?php echo get_template_directory_uri()?>/img/default.jpg" alt="<?php the_title_attribute(); ?>" class="img-responsive blog-img"></a>
            <?php }?>
            <h2><a href="<?php the_permalink();?>" class="eq-blocks-title"><?php the_title();?></a></h2>
          <?php the_category();?>
          <a href="<?php the_permalink();?>" class="btn btn-default" style="background-color:<?php echo esc_attr(get_theme_mod( 'atoz_accent_color' ));?>"><?php _e('View', 'atoz'); ?></a> </div>
      </article>
