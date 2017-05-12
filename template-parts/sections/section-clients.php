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
	$section_option = get_theme_mod( 'homepage_clients_option' );
	if( $section_option == 'show' ) {
		$section_title = get_theme_mod( 'clients_section_title');
		$clients_section_description = get_theme_mod( 'clients_section_description');
        $clients_cat_id = get_theme_mod('clients_cat_id');
        $clients_bg_image = get_theme_mod('clients_bg_image');
?>
		<section style="background-image: url(<?php echo esc_url($clients_bg_image);?>)" class="bt-client" id="bt-section-clients">
    		<div class="bt-wrapper">
                <?php if($section_title || $clients_section_description){ ?>
        			<div class="bt-section-header">
        				<?php if($section_title){ ?><h2><?php echo esc_attr($section_title); ?></h2><?php } ?>
                        <?php if($clients_section_description){ ?>
        				<p>
        				    <?php echo esc_attr($clients_section_description); ?>
        				</p>
                        <?php } ?>
        			</div>
                <?php } 
                if($clients_cat_id){
                    $bt_client_query = new WP_Query(array('post_type'=>'post','cat'=>$clients_cat_id));
                    if($bt_client_query->have_posts()): ?>
        			<div class="col-holder">
                        <?php 
                        while($bt_client_query->have_posts()): $bt_client_query->the_post();
                            $bt_client_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'beetech_partner_thumb');
                                if($bt_client_image[0]){
                                ?>
                    				<div class="col">
                    					<img src="<?php echo esc_url($bt_client_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>
                    				</div>
                                <?php } ?>
                        <?php endwhile; ?>
        			</div>
                    <?php endif; 
                }?>
    		</div>
    	</section>
<?php } ?>