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
	$section_option = get_theme_mod( 'homepage_fact_option');
	if( $section_option == 'show' ) {
		$section_title = get_theme_mod( 'fact_section_title');
		$section_description = get_theme_mod( 'fact_section_description');
		$section_bg_image = get_theme_mod( 'fact_bg_image');
        
        $fact_icon_0 = get_theme_mod('fact_icon_0');
        $fact_counter_title_0 = get_theme_mod('fact_counter_title_0');
        $fact_counter_number_0 = get_theme_mod('fact_counter_number_0');
        
        $fact_icon_1 = get_theme_mod('fact_icon_1');
        $fact_counter_title_1 = get_theme_mod('fact_counter_title_1');
        $fact_counter_number_1 = get_theme_mod('fact_counter_number_1');
        
        $fact_icon_2 = get_theme_mod('fact_icon_2');
        $fact_counter_title_2 = get_theme_mod('fact_counter_title_2');
        $fact_counter_number_2 = get_theme_mod('fact_counter_number_2');
        
        $fact_icon_3 = get_theme_mod('fact_icon_3');
        $fact_counter_title_3 = get_theme_mod('fact_counter_title_3');
        $fact_counter_number_3 = get_theme_mod('fact_counter_number_3');
        
        $fact_bg_image = get_theme_mod('fact_bg_image');
?>
		<section style="background-image: url(<?php echo esc_url($fact_bg_image); ?>);" class="bt-achievements" id="bt-section-fact">
		<div class="bt-wrapper">
            <?php if($section_title || $section_description){ ?>
    			<div class="bt-section-header">
    				<?php if($section_title){ ?><h2><?php echo esc_attr($section_title); ?></h2><?php } ?>
                    <?php if($section_description){ ?>
        				<p>
        				    <?php echo esc_attr($section_description); ?>
        				</p>
                    <?php } ?>
    			</div>
            <?php } ?>
			<div class="row">
                <?php if($fact_icon_0 || $fact_counter_title_0 || $fact_counter_number_0){ ?>
    				<div class="col" id="first">
    					<?php if($fact_counter_number_0){ ?><span class="number"><?php echo absint($fact_counter_number_0); ?></span><?php } ?>
    					<?php if($fact_icon_0){ ?>
                            <div class="icon-holder">
        						<i class="fa <?php echo esc_attr($fact_icon_0); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($fact_counter_title_0){ ?>
    					<span class="title">
    						<?php echo esc_attr($fact_counter_title_0); ?>
    					</span>
                        <?php } ?>
    				</div>
                <?php } ?>
				
                <?php if($fact_icon_1 || $fact_counter_title_1 || $fact_counter_number_1){ ?>
    				<div class="col" id="second">
    					<?php if($fact_counter_number_1){ ?><span class="number"><?php echo absint($fact_counter_number_1); ?></span><?php } ?>
    					<?php if($fact_icon_1){ ?>
                            <div class="icon-holder">
        						<i class="fa <?php echo esc_attr($fact_icon_1); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($fact_counter_title_1){ ?>
    					<span class="title">
    						<?php echo esc_attr($fact_counter_title_1); ?>
    					</span>
                        <?php } ?>
    				</div>
                <?php } ?>
                
                <?php if($fact_icon_2 || $fact_counter_title_2 || $fact_counter_number_2){ ?>
    				<div class="col" id="third">
    					<?php if($fact_counter_number_2){ ?><span class="number"><?php echo absint($fact_counter_number_2); ?></span><?php } ?>
    					<?php if($fact_icon_2){ ?>
                            <div class="icon-holder">
        						<i class="fa <?php echo esc_attr($fact_icon_2); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($fact_counter_title_2){ ?>
    					<span class="title">
    						<?php echo esc_attr($fact_counter_title_2); ?>
    					</span>
                        <?php } ?>
    				</div>
                <?php } ?>
                
                <?php if($fact_icon_3 || $fact_counter_title_3 || $fact_counter_number_3){ ?>
    				<div class="col" id="forth">
    					<?php if($fact_counter_number_3){ ?><span class="number"><?php echo absint($fact_counter_number_3); ?></span><?php } ?>
    					<?php if($fact_icon_3){ ?>
                            <div class="icon-holder">
        						<i class="fa <?php echo esc_attr($fact_icon_3); ?>"></i>
        					</div>
                        <?php } ?>
                        <?php if($fact_counter_title_3){ ?>
    					<span class="title">
    						<?php echo esc_attr($fact_counter_title_3); ?>
    					</span>
                        <?php } ?>
    				</div>
                <?php } ?>
			</div>
		</div>
	</section>
<?php } ?>