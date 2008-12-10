			<form method="get" action="<?php bloginfo('url'); ?>/">
			  <fieldset>
					<input type="text" name="s" id="s" value="<?php the_search_query(); ?>"/>
					<input type="image" src="<?php bloginfo('template_url') ?>/images/header-searchform-button.png" name="submit" id="submit"/>
				</fieldset>
			</form>