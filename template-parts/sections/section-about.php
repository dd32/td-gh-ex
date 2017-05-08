<?php
/**
 * About Section 
*/
 
	$section_option = get_theme_mod( 'homepage_about_option');
	if( $section_option != 'hide' ) {
	$section_title = get_theme_mod( 'about_section_title');
	$about_section_description = get_theme_mod( 'about_section_description');
    
    $about_icon_0 = get_theme_mod('about_icon_0');
    $about_icon_1 = get_theme_mod('about_icon_1');
    $about_icon_2 = get_theme_mod('about_icon_2');
    $about_icon_3 = get_theme_mod('about_icon_3');
    
    $about_page_id_0 = get_theme_mod('about_page_id_0');
    $about_page_id_1 = get_theme_mod('about_page_id_1');
    $about_page_id_2 = get_theme_mod('about_page_id_2');
    $about_page_id_3 = get_theme_mod('about_page_id_3');
    
    $about_title_0 = get_theme_mod('about_title_0');
    $about_title_1 = get_theme_mod('about_title_1');
    $about_title_2 = get_theme_mod('about_title_2');
    $about_title_3 = get_theme_mod('about_title_3');
    
    $about_sub_title_0 = get_theme_mod('about_title_sub_0');
    $about_sub_title_1 = get_theme_mod('about_title_sub_1');
    $about_sub_title_2 = get_theme_mod('about_title_sub_2');
    $about_sub_title_3 = get_theme_mod('about_title_sub_3');
    
 ?>
    <section class="bt-about" id="bt-section-about">
    	<div class="bt-wrapper">
    		<?php if($section_title || $about_section_description){ ?>
			<div class="bt-section-header">
				<?php if($section_title){ ?><h2><?php echo esc_attr($section_title); ?></h2><?php } ?>
                <?php if($about_section_description){ ?>
				<p>
                    <?php echo esc_html($about_section_description); ?> 
				</p>
                <?php } ?>
			</div>
            <?php } ?>
    		<div class="about-tab clearfix">
    			<ul class="clearfix">
    				<li class="clearfix active" id="first">
                        <?php if($about_icon_0){ ?>
        					<div class="icon-holder">
        						<i class="fa <?php echo esc_attr($about_icon_0); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($about_title_0 || $about_sub_title_0){ ?>
    					<div class="text-holder">
    						<h6><?php echo esc_attr($about_title_0); ?></h6>
    						<?php if($about_sub_title_0){ ?><span><?php echo esc_attr($about_sub_title_0); ?></span><?php } ?>
    					</div>
                        <?php } ?>
    				</li>
    				
                    <li class="clearfix" id="second">
                        <?php if($about_icon_1){ ?>
        					<div class="icon-holder">
        						<i class="fa <?php echo esc_attr($about_icon_1); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($about_title_1 || $about_sub_title_1){ ?>
    					<div class="text-holder">
    						<h6><?php echo esc_attr($about_title_1); ?></h6>
    						<?php if($about_sub_title_1){ ?><span><?php echo esc_attr($about_sub_title_1); ?></span><?php } ?>
    					</div>
                        <?php } ?>
    				</li>
                    
                    <li class="clearfix" id="third">
                        <?php if($about_icon_2){ ?>
        					<div class="icon-holder">
        						<i class="fa <?php echo esc_attr($about_icon_2); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($about_title_2 || $about_sub_title_2){ ?>
    					<div class="text-holder">
    						<h6><?php echo esc_attr($about_title_2); ?></h6>
    						<?php if($about_sub_title_2){ ?><span><?php echo esc_attr($about_sub_title_2); ?></span><?php } ?>
    					</div>
                        <?php } ?>
    				</li>
                    
                    <li class="clearfix" id="forth">
                        <?php if($about_icon_3){ ?>
        					<div class="icon-holder">
        						<i class="fa <?php echo esc_attr($about_icon_3); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($about_title_3 || $about_sub_title_3){ ?>
    					<div class="text-holder">
    						<h6><?php echo esc_attr($about_title_3); ?></h6>
    						<?php if($about_sub_title_3){ ?><span><?php echo esc_attr($about_sub_title_3); ?></span><?php } ?>
    					</div>
                        <?php } ?>
    				</li>
    			</ul>
                <?php if($about_page_id_0){ 
                    $about_page_0_query = new WP_Query(array('post_type'=>'page','post__in' => array($about_page_id_0)));
                    if($about_page_0_query->have_posts()):
                        while($about_page_0_query->have_posts()): $about_page_0_query->the_post();
                        $image_about = wp_get_attachment_image_src(get_post_thumbnail_id(),'');
                        ?>
                			<div class="wowextra fadeIn tab-container first active clearfix" data-wow-duration="2s">
                				<?php if($image_about[0]){ ?>
                                <div class="img-holder">
                					<img src="<?php echo esc_url($image_about[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"/>
                				</div>
                                <?php } ?>
                				<div class="text-holder">
                					<?php if(get_the_title()){ ?><h6><?php the_title(); ?></h6><?php } ?>
                					<?php if(get_the_content()){ ?>
                                    <p>
                						<?php echo esc_attr(wp_trim_words(get_the_content(),60,'...')); ?>
                					</p>
                                    <?php } ?>
                					<a href="<?php the_permalink() ?>" class="learn-more"><?php esc_html_e('Learn more','beetech'); ?></a>
                				</div>
                			</div>
                        <?php 
                        endwhile;
                        wp_reset_postdata();
                    endif;
                } ?>
                
                <?php if($about_page_id_1){ 
                    $about_page_1_query = new WP_Query(array('post_type'=>'page','post__in' => array($about_page_id_1)));
                    if($about_page_1_query->have_posts()):
                        while($about_page_1_query->have_posts()): $about_page_1_query->the_post();
                        $image_about = wp_get_attachment_image_src(get_post_thumbnail_id(),'');
                        ?>
                			<div class="wowextra fadeIn tab-container second clearfix" data-wow-duration="2s">
                				<?php if($image_about[0]){ ?>
                                <div class="img-holder">
                					<img src="<?php echo esc_url($image_about[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"/>
                				</div>
                                <?php } ?>
                				<div class="text-holder">
                					<?php if(get_the_title()){ ?><h6><?php the_title(); ?></h6><?php } ?>
                					<?php if(get_the_content()){ ?>
                                    <p>
                						<?php echo esc_attr(wp_trim_words(get_the_content(),60,'...')); ?>
                					</p>
                                    <?php } ?>
                					<a href="<?php the_permalink() ?>" class="learn-more"><?php esc_html_e('Learn more','beetech'); ?></a>
                				</div>
                			</div>
                        <?php 
                        endwhile;
                        wp_reset_postdata();
                    endif;
                } ?>
                
                <?php if($about_page_id_2){ 
                    $about_page_2_query = new WP_Query(array('post_type'=>'page','post__in' => array($about_page_id_2)));
                    if($about_page_2_query->have_posts()):
                        while($about_page_2_query->have_posts()): $about_page_2_query->the_post();
                        $image_about = wp_get_attachment_image_src(get_post_thumbnail_id(),'');
                        ?>
                			<div class="wowextra fadeIn tab-container third clearfix" data-wow-duration="2s">
                				<?php if($image_about[0]){ ?>
                                <div class="img-holder">
                					<img src="<?php echo esc_url($image_about[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"/>
                				</div>
                                <?php } ?>
                				<div class="text-holder">
                					<?php if(get_the_title()){ ?><h6><?php the_title(); ?></h6><?php } ?>
                					<?php if(get_the_content()){ ?>
                                    <p>
                						<?php echo esc_attr(wp_trim_words(get_the_content(),60,'...')); ?>
                					</p>
                                    <?php } ?>
                					<a href="<?php the_permalink() ?>" class="learn-more"><?php esc_html_e('Learn more','beetech'); ?></a>
                				</div>
                			</div>
                        <?php 
                        endwhile;
                        wp_reset_postdata();
                    endif;
                } ?>
                
                <?php if($about_page_id_3){ 
                    $about_page_3_query = new WP_Query(array('post_type'=>'page','post__in' => array($about_page_id_3)));
                    if($about_page_3_query->have_posts()):
                        while($about_page_3_query->have_posts()): $about_page_3_query->the_post();
                        $image_about = wp_get_attachment_image_src(get_post_thumbnail_id(),'');
                        ?>
                			<div class="wowextra fadeIn tab-container forth clearfix" data-wow-duration="2s">
                				<?php if($image_about[0]){ ?>
                                <div class="img-holder">
                					<img src="<?php echo esc_url($image_about[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"/>
                				</div>
                                <?php } ?>
                				<div class="text-holder">
                					<?php if(get_the_title()){ ?><h6><?php the_title(); ?></h6><?php } ?>
                					<?php if(get_the_content()){ ?>
                                    <p>
                						<?php echo esc_attr(wp_trim_words(get_the_content(),60,'...')); ?>
                					</p>
                                    <?php } ?>
                					<a href="<?php the_permalink() ?>" class="learn-more"><?php esc_html_e('Learn more','beetech'); ?></a>
                				</div>
                			</div>
                        <?php 
                        endwhile;
                        wp_reset_postdata();
                    endif;
                } ?>
                
    		</div>
    	</div>
    </section>
<?php } ?>