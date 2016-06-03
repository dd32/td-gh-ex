<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" tabindex="-1">
		<?php
		while ( have_posts() ) : the_post();
		
			if(get_post_format()!=""){
				get_template_part( 'parts/content/content-' .  get_post_format() );
			}else{
				get_template_part( 'parts/content/content-standard' );
			}
			
			?><div class="links"><div class="linkprevious"><?PHP previous_post_link() ?></div><div class="linknext"><?PHP next_post_link() ?></div><div id="gradient"></div></div><?PHP
			
			if ( comments_open() || get_comments_number() ) :
				comments_template();

				?><div class="linkslower">
					<div class="linkprevious"><?PHP previous_post_link() ?></div><div class="linknext"><?PHP next_post_link() ?></div>
					<div class="linkhome"><a href="<?PHP echo site_url() ?>"><?PHP echo get_bloginfo('name'); ?> <?PHP echo __("home", "antonine"); ?></a></div>
				</div><?PHP
			
			endif;
							

		endwhile;
		?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
