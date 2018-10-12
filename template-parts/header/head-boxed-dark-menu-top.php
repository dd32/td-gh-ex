<?php
/**
 * The template file to display the boxed dark top header
 *
 * @package agncy
 */

get_template_part( 'template-parts/header/contact-bar' ); ?>
<div class="container-fluid header-container">
	<div class="row header-row">
		<div class="col-sm-12 boxed-dark-col">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 header-col">
						<?php get_template_part( 'template-parts/header/navigation' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 header-col">
						<?php get_template_part( 'template-parts/header/logo' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
