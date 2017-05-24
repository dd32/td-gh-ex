<?php
/**
 * Team Section
 * @package beetech
 */
?>

<?php
	$section_option = get_theme_mod( 'homepage_team_option');
	if( $section_option == 'show' ) {
		$section_title = get_theme_mod( 'team_section_title');
		$section_description = get_theme_mod( 'team_section_description');
        $team_cat_id = get_theme_mod('team_cat_id');
        $team_bg_image = get_theme_mod('team_bg_image');
?>
		<section class="bt-team" style="background-image: url(<?php echo esc_url($team_bg_image); ?>);" id="bt-section-team">
    		<div class="bt-wrapper">
    			<?php if($section_title || $section_description){ ?>
        			<div class="bt-section-header">
        				<?php if($section_title){ ?><h2><?php echo esc_html($section_title); ?></h2><?php } ?>
                        <?php if($section_description){ ?>
        				<p>
                            <?php echo esc_html($section_description); ?> 
        				</p>
                        <?php } ?>
        			</div>
                <?php }
                if($team_cat_id){
                $team_cat_query = new WP_Query(array('post_type' => 'post','cat' => $team_cat_id,'posts_per_page'=>'6'));
                if($team_cat_query->have_posts()):
                ?>
    			<div class="row clearfix">
                <?php while($team_cat_query->have_posts()): $team_cat_query->the_post();
                    $image_team = wp_get_attachment_image_src(get_post_thumbnail_id(),'beetech_team_thumb'); ?>
    				<div class="col">
                        <?php if($image_team[0]){ ?>
    					<div class="img-holder">
    						<img src="<?php echo esc_url($image_team[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"/>
    					</div>
                        <?php } ?>
    					<div class="text-holder">
                            <?php if(get_the_title()){ ?>
        						<div class="heading">
        							<?php the_title(); ?>
        						</div>
                            <?php } ?>
                            <?php if(get_the_content()){ ?>
        						<p>
        							<?php echo esc_attr(wp_trim_words(get_the_content(),20,'...')); ?>
        						</p>
                            <?php } ?>
    					</div>
    				</div>
   				<?php endwhile; ?>
    			</div>
                <?php endif;
                } ?>
    		</div>
    	</section>
<?php } ?>