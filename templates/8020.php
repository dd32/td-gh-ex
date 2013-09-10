<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
//Template Name:80% Main, 20% Sidebar.
get_header();
	get_template_part('navigation');
	get_breadcrumbs(); ?>
	<!-- Body -->
    <div id="body">
    	<div class="row">
        	<div id="main" class="col width-80">
            	<?php if(have_posts()) :
					while(have_posts()) : the_post(); ?>      
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
					endwhile;
            	else :
                    get_template_part('not-found');
                endif; ?>
            </div>
            <div id="sidebar" class="col width-20 last">
				<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
	<!-- Body end -->
<?php get_footer(); ?>