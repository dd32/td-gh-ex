<?php 

function agensy_services_pages(){
    $agensy_enable_service_slider_control = get_theme_mod('agensy_enable_service_slider_control','on');
    if($agensy_enable_service_slider_control == 'on'){
        ?>
        <section class = "agensy-service-page-wrap agensy-home-section" id ="agensy-scroll-service">
            <div class="agensy-container-full">
                <div class = "agensy-service-slider owl-carousel">
                    <?php
                    $services_pages = array('one','two', 'three','four','five' );
                    foreach ($services_pages as $services_page) {
                        $agensy_service_slider_page = get_theme_mod('agensy_'.$services_page.'_slider_pages');
                        if($agensy_service_slider_page){
                            $agensy_service_slider_args = array(
                                'post_type' => 'page',
                                'post_status' => 'publish',
                                'p' => absint($agensy_service_slider_page));
                            $agensy_service_query = new WP_Query($agensy_service_slider_args);
                            if($agensy_service_query->have_posts()){?>
                                <?php 
                                $count = 1;
                                while($agensy_service_query->have_posts()){
                                    $agensy_service_query->the_post();
                                    $agensy_service_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                                    $agensy_service_image_url = $agensy_service_image_src[0];
                                    //echo $count;
                                    ?>
                                    <div class = "agensy-service-slidder-wrapper clearfix">
                                        <div class = "agensy-featured-image" style="background-image:url('<?php echo $agensy_service_image_url; ?>'); background-size:cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class = "agensy_featured-content">
                                            <div class = "agensy-service-num">
                                                <?php 
                                                    if($count < 10){
                                                        echo '0' . $count;
                                                    }
                                                    else{
                                                        echo $count;
                                                    }
                                                 ?>
                                            </div>
                                            <div class="agensy_featured-content-main">
                                                <a class="agensy-feature-title" href="<?php the_permalink(); ?>">
                                                    <h2><?php the_title(); ?></h2>
                                                </a>
                                                <p><?php echo esc_attr(wp_trim_words( get_the_content(), 15, '...' )); ?></p>
                                                <div class = "serv-btn">
                                                    <a href="<?php the_permalink(); ?>">Read More</a>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>        
                                <?php 
                                $count++;
                                }
                                ?>
                        <?php 
                        wp_reset_postdata();
                        }
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
<?php }
}


add_action('agensy_services_pages_roles','agensy_services_pages');