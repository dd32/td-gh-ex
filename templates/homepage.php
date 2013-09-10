<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
//Template Name:Homepage
get_header();
	get_template_part('navigation');
	get_slider(); ?>  
    <div id="body">
    	<div class="row">
        	<div id="main" class="col width-100 last">
            	<?php if(have_posts()) :
					while(have_posts()) : the_post();
						if(!empty($post->post_content)) : ?>      
                            <!-- Entry -->
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry">
                                    <?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
                                    <div class="content clearfix">
                                        <h1 class="title"><?php the_title(); ?></h1>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Entry end -->
							<?php
                            comments_template(); 
						endif;
					endwhile;
            	else :
                    get_template_part('not-found');
                endif; ?>
            </div>
        </div>
        <?php
        custom_homepage();
		homepage_social_icons();      
        if(is_active_sidebar('home_1') || is_active_sidebar('home_2') || is_active_sidebar('home_3')) : ?>
            <div class="row">
                <div class="col width-33">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_1')) : endif; ?> 
                </div>
                <div class="col width-33">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_2')) : endif; ?> 
                </div>
                <div class="col width-33 last">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_3')) : endif; ?> 
                </div>
            </div>
		<?php endif; ?>
    </div>
	<!-- Body end -->
<?php get_footer(); ?>