<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Accesspress Mag
 */


$sidebar_top_ad = of_get_option('value_sidebar_top_ad');
$sidebar_middle_ad = of_get_option('value_sidebar_middle_ad');
$sidebar_bottom_ad = of_get_option('value_sidebar_bottom_ad'); 
?>
<div id="secondary-right-sidebar">
    <div id="secondary" class="secondary-wrapper">
    <?php if ( is_active_sidebar( 'apmag-home-top-sidebar' )) : ?>
    <div id="home-top-sidebar" class="widget-area" role="complementary">
    	<?php dynamic_sidebar( 'apmag-home-top-sidebar' ); ?>
    </div><!-- #secondary -->
    <?php 
        else:
            get_template_part( 'demo-content/demo-sidebar-top');
        endif ;
    ?>
    
    <?php if(!empty($sidebar_top_ad)){
    ?>
    <div class="sidebar-top-ad widget-area">
        <h1 class="sidebar-title"><span><?php _e( 'Advertisement', 'accesspress-mage' );?></span></h1>
        <div class="ad_content"><?php echo $sidebar_top_ad;?></div>
    </div>
    <?php    
    } else {
    ?>
    <div class="sidebar-top-ad widget-area">
        <h1 class="sidebar-title"><span><?php _e( 'Advertisement', 'accesspress-mage' );?></span></h1>
        <div class="ad_content"><img src="http://placehold.it/300x250&text=Advertisement 300x250" /></div>
    </div>
    <?php } ?>
    
    <?php if ( is_active_sidebar( 'apmag-home-middle-sidebar' )) : ?>
    <div id="home-top-sidebar" class="widget-area" role="complementary">
    	<?php dynamic_sidebar( 'apmag-home-middle-sidebar' ); ?>
    </div><!-- #secondary -->
    <?php 
        else:
            get_template_part( 'demo-content/demo-sidebar-middle');
        endif ; 
    ?>
    
    <div class="sidebar-editor-pick widget-area">
        <div class="content-wrapper">
        <?php 
            $editor_cat = of_get_option('editor_pick_category');
            $editor_posts_per_page = of_get_option('posts_for_editor_pick');
            if(!empty($editor_cat)):
        ?>
            <h1 class="sidebar-title"><span><?php _e( 'Editor Pick`s', 'accesspress-mage' );?></span></h1>
        <?php
            echo '<div class="sidebar-posts-wrapper">';
            $editor_args = array(
                            'category_name'=>$editor_cat,
                            'post_status'=>'pubish',
                            'posts_per_page'=>$editor_posts_per_page,
                            'order'=>'DESC'
                            );
            $editor_query = new WP_Query($editor_args);
            $e_counter = 0;
            $total_posts_editor = $editor_query->found_posts;
            if($editor_query->have_posts()){
                while($editor_query->have_posts()){
                    $e_counter++;
                    $editor_query->the_post();
                    $editor_image_id = get_post_thumbnail_id();
                    $editor_big_image_path = wp_get_attachment_image_src($editor_image_id,'block-big-thumb',true);
                    $editor_small_image_path = wp_get_attachment_image_src($editor_image_id,'block-small-thumb',true);
                    $editor_image_alt = get_post_meta($editor_image_id,'_wp_attachment_image_alt',true);
        ?>
            <div class="single_post clearfix <?php if($e_counter==1){echo 'first-post';}?>">
                <?php if(has_post_thumbnail()): ?>   
                    <div class="post-image"><a href="<?php the_permalink();?>"><img src="<?php if($e_counter <=1){echo $editor_big_image_path[0];}else{ echo $editor_small_image_path[0] ;}?>" alt="<?php echo esc_attr($editor_image_alt);?>" /></a></div>                                
                <?php 
                    endif ;
                    if($e_counter>1){echo '<div class="post-desc-wrapper">';} 
                ?>
                    <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="block-poston"><?php do_action('accesspress_mag_home_posted_on');?></div>
                    <div class="block-poston"><?php do_action('accesspress_mag_block_post_on');?></div>
                    <?php if($e_counter>1){echo '</div>';} if($e_counter <=1 ):?><div class="post-content"><?php echo '<p>'. accesspress_word_count(get_the_content(),25) .'</p>' ;?></div><?php endif ;?>
            </div>
        <?php
                }
            }
            echo '</div>';
        ?>
        <?php 
            else:
                get_template_part( 'demo-content/demo-editorspick');
            endif ;
        ?>    
        </div>
    </div>
    
    
    <?php if(!empty($sidebar_middle_ad)){
    ?>
    <div class="sidebar-top-ad widget-area">
        <h1 class="sidebar-title"><span><?php _e( 'Advertisement', 'accesspress-mage' );?></span></h1>
        <div class="ad_content"><?php echo $sidebar_middle_ad;?></div>
    </div>
    <?php    
    }else {
    ?>
    <div class="sidebar-top-ad widget-area">
        <h1 class="sidebar-title"><span><?php _e( 'Advertisement', 'accesspress-mage' );?></span></h1>
        <div class="ad_content"><img src="http://placehold.it/300x250&text=Advertisement 300x250" /></div>
    </div>
    <?php } ?>
    
    <?php if ( is_active_sidebar( 'apmag-home-bottom-sidebar' )) : ?>
    <div id="home-top-sidebar" class="widget-area" role="complementary">
    	<?php dynamic_sidebar( 'apmag-home-bottom-sidebar' ); ?>
    </div><!-- #secondary -->
    <?php 
        else:
            get_template_part( 'demo-content/demo-sidebar-bottom');
        endif ;
    ?>
    
    </div>
</div><!--Secondary-right-sidebar-->

