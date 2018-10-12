<?php
/**
 * The template file to display the left logo header
 *
 * @package agncy
 */

get_template_part( 'template-parts/header/contact-bar' ); ?>
<div class="container header-container">
	<div class="row header-row">
		<div class="col-sm-3 header-col">
			<?php get_template_part( 'template-parts/header/logo' ); ?>
		</div>
		<div class="col-sm-9 header-col">
			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		</div>
	</div>
</div>
