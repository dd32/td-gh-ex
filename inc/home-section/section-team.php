<?php 

	function agensy_team_page(){
		$agensy_team_page_enable = get_theme_mod('agensy_team_page_enable','on');
			if($agensy_team_page_enable == 'on'){
			?>
				<section class = "agensy-team-wrap agensy-home-section" id = "agensy-scroll-team">
					<div class = "agensy-container">
					<?php 
						$agensy_team_title = get_theme_mod('agensy_team_title');
						$agensy_team_description = get_theme_mod('agensy_team_description');
						
						if($agensy_team_title || $agensy_team_description){ ?>
					        <div class="section-title-sub-wrap wow fadeInUp">
					            <?php if($agensy_team_title){ ?>
					            	<div class="section-title">
					            		<h2><?php echo esc_html($agensy_team_title); ?></h2>
					            	</div>
					            <?php } ?>
					            <?php if($agensy_team_description) { ?>
					            	<div class="section-description">
					            		<?php echo esc_html($agensy_team_description); ?>
					            	</div>
					            <?php } ?>
					        </div>
		   				 <?php } ?>
					    <?php if(is_active_sidebar('home-team-area')){ ?>
					            <div class="team-members-contents  clearfix">
					                <?php
					                    dynamic_sidebar('home-team-area');
					                ?>
					            </div>
					    <?php } ?>
					</div>
				</section>
			<?php 
		}
	}

	add_action('agensy_team_page_role','agensy_team_page');

