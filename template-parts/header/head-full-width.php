<?php
/**
 * The template file to display the full width header
 *
 * @package agncy
 */

get_template_part( 'template-parts/header/contact-bar' ); ?>
<div class="container-fluid header-container">
	<div class="row header-row">
		<div class="col-sm-2 header-col">
			<?php get_template_part( 'template-parts/header/logo' ); ?>
		</div>
		<div class="col-sm-10 header-col">
			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		</div>
	</div>
</div>
