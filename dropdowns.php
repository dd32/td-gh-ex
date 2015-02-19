<!-- Drop Downs -->
		<div id="selectcattag" class="grid_16">
			<div class="selectwrap">
				<form action="<?php echo home_url(); ?>/" method="get">
					<div>
							<?php $optionnone = __('Categories', 'minimum-minimal'); 
							$select = wp_dropdown_categories('show_option_none='.$optionnone.'&class=selecttarget&show_count=1&orderby=name&echo=0'); $select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select); echo $select; ?>
				<noscript><div><input type="submit" value="View" /></div></noscript>
					</div>
				</form>
			</div>
	
			<div class="selectwrap selectmenu"><?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'shopselect1', 'menu_class' => 'shopselect', 'theme_location' => 'shopselect1', 'depth' => -1 ) ); ?></div>

			<div style="clear:both;"></div>		
		</div><!-- .selecttagcat -->