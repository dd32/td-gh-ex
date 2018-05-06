<?php 

/**
 * About Section
*/
function agensy_home_section(){
    $agensy_home_about_us_enable = get_theme_mod('agensy_home_about_us_enable','on');
    if( $agensy_home_about_us_enable == 'on' ){
        $agensy_about_page = get_theme_mod('agensy_about_page');
        $agensy_about_args = new WP_Query(array(
            'post_type' => 'page', 
            'post_status' => 'publish',
            'post__in' => array($agensy_about_page)));
        ?>
            <section class ="agensy-about-us-section agensy-home-section" id = "agensy-scroll-about">
            	<div class="agensy-container">
                    <?php if($agensy_about_args->have_posts()):
                        while($agensy_about_args->have_posts()) : 
                            $agensy_about_args->the_post(); ?>
                                <div class="about-content-wrap clearfix">
                                    <div class="left-about-content wow fadeInLeft">
                                            <div class="section-title-sub-wrap">
                                                <div class="section-title"><h2><?php echo the_title(); ?></h2></div>
                                            </div>
                                        <?php if(get_the_content()){ ?>
                                            <div class="about-posts">
                                                <?php if(get_the_content()){ ?><div class="about-post-content"><?php echo esc_html(wp_trim_words(get_the_content(),'50','...')) ?></div><?php } ?>
                                                <span class="about-button"><a href="<?php the_permalink(); ?>"><?php _e('Read More','agensy'); ?></a></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                        $agensy_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'agensy-about-image');
                                        if($agensy_image_src){
                                    ?>
                                        <div class="right-about-content wow fadeInRight">
                                            <div class="about-image-wrap"><img src="<?php echo esc_url($agensy_image_src[0]); ?>" /></div>
                                        </div>
                                        <?php } ?>
                                </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php
    }
}

 add_action('agensy_home_section_role','agensy_home_section');

