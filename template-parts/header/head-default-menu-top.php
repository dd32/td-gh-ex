<?php
/**
 * The template file to display the default menu top header
 *
 * @package agncy
 */

get_template_part( 'template-parts/header/contact-bar' ); ?>
<div class="container header-container">
	<div class="row header-row">
		<div class="col-sm-12 header-col">
			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		</div>
		<div class="col-sm-12 header-col">
			<hr class="divider color-primary--border">
		</div>
		<div class="col-sm-12 header-col">
			<?php get_template_part( 'template-parts/header/logo' ); ?>
		</div>
	</div>
</div>
