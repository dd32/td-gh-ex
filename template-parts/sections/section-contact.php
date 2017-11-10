<?php
/**
 * Template part for displaying section content in template-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beetech
 */
?>

<?php
	$section_option = get_theme_mod( 'homepage_contact_option');
	if( $section_option == 'show' ) {
		$section_title = get_theme_mod( 'contact_section_title');
		$bt_phone_num = get_theme_mod( 'contact_section_phone');
		$bt_section_address = get_theme_mod( 'contact_section_address');
        $contact_section_form_page = get_theme_mod('contact_section_form_page');
        $contact_section_map_page = get_theme_mod('contact_section_map_page');
        
        $contact_section_form_query = new WP_Query(array('post_type'=>'page','post__in'=>array(absint($contact_section_form_page))));
        $contact_section_map_query = new WP_Query(array('post_type'=>'page','post__in'=>array(absint($contact_section_map_page))));
?>
		<section class="bt-contact-section" id="bt-section-contact">
                <?php if($contact_section_map_query->have_posts()){ ?>
                        <div class="map-contact">
                            <?php
                                while($contact_section_map_query->have_posts()){
                                    $contact_section_map_query->the_post();
                                    the_content();
                                }
                            ?>
                        </div>
                <?php wp_reset_postdata(); 
                } ?>
                <div class="bt-wrapper">
                    <?php if($section_title){ ?>
            			<div class="bt-section-header">
            				<?php if($section_title){ ?><h2><?php echo esc_html($section_title); ?></h2><?php } ?>
            			</div>
                    <?php } ?>
                    
                    <div class="contact-form">
                        <?php if($contact_section_form_query->have_posts()){ ?>
                            <div class="form-7">
                                <?php
                                    while($contact_section_form_query->have_posts()){
                                        $contact_section_form_query->the_post();
                                        the_content();
                                    }
                                ?>
                            </div>
                        <?php  wp_reset_postdata();
                        } ?>
                        <?php if($bt_section_address || $bt_section_address){ ?>
                        <div class="detail-contact">
                            <?php if($bt_phone_num){ ?><div class="number"><?php echo esc_html__('Call US: ','beetech'); ?><span><?php echo esc_attr($bt_phone_num); ?></span></div><?php } ?>
                            <?php if($bt_section_address){ ?><div class="address"><?php echo esc_html__('Visit US: ','beetech'); ?><span><?php echo esc_attr($bt_section_address); ?></span></div><?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
		</section>
<?php } ?>