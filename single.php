<?php
/**
 * Single
 *
 * @package Bcorp Basics
 * @author Tim Brattberg
 * @link http://www.bcorp.com
 *
 */

get_header();
$bcorp_sidebar = bcorp_sidebar_position($post->ID); ?>
<div id="main-content" class="main-content <?php echo esc_attr($bcorp_sidebar); ?>">
	<section id="primary" class="content-area bcorp-color-main">
		<div id="content" class="site-content" role="main">
			<div class="bcorp-row bcorp-content bcorp-blog-single">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'content', get_post_format() );
					bcorp_post_nav();
					if ( comments_open() || get_comments_number() ) comments_template();
				}
			?></div><?php
			if ($bcorp_sidebar!='bcorp_no_sidebar') {
				get_sidebar( 'content' );
				get_sidebar();
			} ?>
		</div>
	</section>
</div>
<?php
get_footer();
