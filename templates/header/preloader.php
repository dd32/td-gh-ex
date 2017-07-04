<?php // Preloader HTML Codes

if ( ashe_options( 'preloader_label' ) === true ) : ?>

<div class="ashe-preloader-wrap">

	<?php if ( ashe_options( 'preloader_type' ) === 'logo' ) : ?>

	<div class="logo-img">
		<img src="<?php echo ashe_options( 'page_header_logo' ); ?>" alt="<?php bloginfo('name'); ?>">
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_1' ) : ?>

	<div class="cssload-container">
		<div class="cssload-speeding-wheel"></div>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_2' ) : ?>

	<div class="cssload-loader">
		<div class="cssload-side"></div>
		<div class="cssload-side"></div>
		<div class="cssload-side"></div>
		<div class="cssload-side"></div>
		<div class="cssload-side"></div>
		<div class="cssload-side"></div>
		<div class="cssload-side"></div>
		<div class="cssload-side"></div>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_3' ) : ?>

	<div class="cssload-container">
		<div class="cssload-tube-tunnel"></div>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_4' ) : ?>

	<div class="cssload-container">
		<span class="cssload-loader">
			<span class="cssload-loader-inner"></span>
		</span>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_5' ) : ?>

	<div align="center" class="cssload-fond">
		<div class="cssload-container-general">
				<div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_1"> </div></div>
				<div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_2"> </div></div>
				<div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_3"> </div></div>
				<div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_4"> </div></div>
		</div>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_6' ) : ?>

	<div class="cssload-container">
		<div id="loadFacebookG">
			<div id="blockG_1" class="facebook_blockG"></div>
			<div id="blockG_2" class="facebook_blockG"></div>
			<div id="blockG_3" class="facebook_blockG"></div>
		</div>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_7' ) : ?>

	<div class="loader">
		<span class="block-1"></span>
		<span class="block-2"></span>
		<span class="block-3"></span>
		<span class="block-4"></span>
		<span class="block-5"></span>
		<span class="block-6"></span>
		<span class="block-7"></span>
		<span class="block-8"></span>
		<span class="block-9"></span>
		<span class="block-10"></span>
		<span class="block-11"></span>
		<span class="block-12"></span>
		<span class="block-13"></span>
		<span class="block-14"></span>
		<span class="block-15"></span>
		<span class="block-16"></span>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_8' ) : ?>

	<div class="cssload-spinner">
		<div class="cssload-cube cssload-cube0"></div>
		<div class="cssload-cube cssload-cube1"></div>
		<div class="cssload-cube cssload-cube2"></div>
		<div class="cssload-cube cssload-cube3"></div>
		<div class="cssload-cube cssload-cube4"></div>
		<div class="cssload-cube cssload-cube5"></div>
		<div class="cssload-cube cssload-cube6"></div>
		<div class="cssload-cube cssload-cube7"></div>
		<div class="cssload-cube cssload-cube8"></div>
		<div class="cssload-cube cssload-cube9"></div>
		<div class="cssload-cube cssload-cube10"></div>
		<div class="cssload-cube cssload-cube11"></div>
		<div class="cssload-cube cssload-cube12"></div>
		<div class="cssload-cube cssload-cube13"></div>
		<div class="cssload-cube cssload-cube14"></div>
		<div class="cssload-cube cssload-cube15"></div>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_9' ) : ?>

	<div class="cssload-loader">
		<div class="cssload-flipper">
			<div class="cssload-front"></div>
			<div class="cssload-back"></div>
		</div>
	</div>

	<?php elseif ( ashe_options( 'preloader_type' ) === 'animation_10' ) : ?>

	<div class="cssload-loader">
		<div class="cssload-box-loading"></div>
	</div>

	<?php endif; ?>

</div><!-- .ashe-preloader-wrap -->

<?php endif; ?>