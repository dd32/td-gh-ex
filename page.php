<?php get_header(); ?>
		<?php get_template_part('navigation'); ?>
    	<!-- BODY -->
    	<div id="body">
        	<div class="container row">
            	<!-- CONTENT -->
            	<div id="content" class="col width-75">
					<?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <!-- ENTRY NO:<?php the_ID(); ?> -->
                            <div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php autoadjust_entry_thumbnail(); ?>
                                <div class="entry">
                                    <?php autoadjust_entry_edit(); ?>
                                    <h1 class="title"><?php the_title(); ?></h1>
                                    <?php the_content(__('Continue Reading &rarr;', 'autoadjust'));
                                    wp_link_pages(array('before' => '<div class="pagination">'.__('Pages:', 'autoadjust'), 'after' => '</div>'));
                                    autoadjust_entry_after(); ?>
                                </div>
                            </div>
                            <!-- ENTRY NO:<?php the_ID(); ?> END -->                     
                        	<?php comments_template();
                        endwhile;
						autoadjust_pagination();
					else :
						get_template_part('not-found');
					endif; ?>
                </div>
                <!-- CONTENT END -->
				<?php get_sidebar(); ?>
            </div>
        </div>
        <!-- BODY END --> 
<?php get_footer(); ?>