<?php
/**
 * Template part for displaying section content in template-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage beetech
 */
?>
<?php
	$section_option = get_theme_mod( 'homepage_service_option', 'hide' );
	if( $section_option == 'show' ) {
		$section_title = get_theme_mod( 'service_section_title', esc_html__( 'service', 'beetech' ) );
		$section_desc_title = get_theme_mod( 'service_section_sub_title', esc_html__( 'Who We Are', 'beetech' ) );
        $service_icon_1 = get_theme_mod('service_icon_1');
        $service_icon_2 = get_theme_mod('service_icon_2');
        $service_icon_0 = get_theme_mod('service_icon_0');
        $service_page_id_1 = get_theme_mod('service_page_id_1');
        $service_page_id_2 = get_theme_mod('service_page_id_2');
        $service_page_id_0 = get_theme_mod('service_page_id_0');
?>
		<section class="bt-section-services" id="bt-section-services">
		<div class="bt-wrapper">
            <?php if($section_title || $section_desc_title){ ?>
			<div class="bt-section-header">
				<?php if($section_title){ ?><h2><?php echo esc_html($section_title); ?></h2><?php } ?>
                <?php if($section_desc_title){ ?>
				<p>
                    <?php echo esc_html($section_desc_title); ?> 
				</p>
                <?php } ?>
			</div>
            <?php } ?>
			<div class="row clearfix">
            
                <?php if($service_page_id_0){
                    $service_page_0_query = new WP_Query(array('post_type' => 'page','post__in'=>array(absint($service_page_id_0))));
                    if($service_page_0_query->have_posts()):
                        while($service_page_0_query->have_posts()): $service_page_0_query->the_post();
                        ?>
            				<div class="col">
                            
                                <?php if($service_icon_0){ ?>
            					<div class="icon-holder">
            						<i class="fa <?php echo esc_attr($service_icon_0); ?>"></i>
            					</div>
                                <?php } ?>
                                
            					<?php if(get_the_title()){ ?><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5><?php } ?>
                                
                                <?php if(get_the_content()){ ?>
                					<p>
                					   <?php echo esc_attr(wp_trim_words(get_the_content(),20,'&hellip;')); ?>
                					</p>
                                <?php } ?>
                                
            				</div>
                        <?php
                        endwhile;
                    endif;
                } 
                ?>
                
                <?php if($service_page_id_1){
                    $service_page_1_query = new WP_Query(array('post_type' => 'page','post__in'=>array(absint($service_page_id_1))));
                    if($service_page_1_query->have_posts()):
                        while($service_page_1_query->have_posts()): $service_page_1_query->the_post();
                        ?>
            				<div class="col">
                            
                                <?php if($service_icon_1){ ?>
            					<div class="icon-holder">
            						<i class="fa <?php echo esc_attr($service_icon_1); ?>"></i>
            					</div>
                                <?php } ?>
                                
            					<?php if(get_the_title()){ ?><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5><?php } ?>
                                
                                <?php if(get_the_content()){ ?>
                					<p>
                					   <?php echo esc_attr(wp_trim_words(get_the_content(),20,'&hellip;')); ?>
                					</p>
                                <?php } ?>
                                
            				</div>
                        <?php
                        endwhile;
                    endif;
                } 
                ?>
                
				<?php if($service_page_id_2){
                    $service_page_2_query = new WP_Query(array('post_type' => 'page','post__in'=>array(absint($service_page_id_2))));
                    if($service_page_2_query->have_posts()):
                        while($service_page_2_query->have_posts()): $service_page_2_query->the_post();
                        ?>
            				<div class="col">
                            
                                <?php if($service_icon_2){ ?>
            					<div class="icon-holder">
            						<i class="fa <?php echo esc_attr($service_icon_2); ?>"></i>
            					</div>
                                <?php } ?>
                                
            					<?php if(get_the_title()){ ?><h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5><?php } ?>
                                
                                <?php if(get_the_content()){ ?>
                					<p>
                					   <?php echo esc_attr(wp_trim_words(get_the_content(),20,'&hellip;')); ?>
                					</p>
                                <?php } ?>
                                
            				</div>
                        <?php
                        endwhile;
                    endif;
                } 
                ?>
                
			</div>
		</div>
	</section>
<?php
	}
?>