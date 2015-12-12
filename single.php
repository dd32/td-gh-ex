<?php
/**
 * The template for displaying all single posts.
 *
 * @package Ample
 */

get_header(); ?>

<div class="content-wrapper">
<div class="container">
	<div id="primary" class="content-area">
             <div class="row">
            <div class="col-md-8">
                <div class="content-bar" id="content">
		 <!-- Start the Loop. -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
                        <!-- ---------------Post starts ---------------- -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="post-heading">
                                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="post-meta">
                                <ul>
                                    <li class="meta-admin"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></li>
                                    <li class="meta-date"><?php
                                        $archive_year = get_the_time('Y');
                                        $archive_month = get_the_time('m');
                                        $archive_day = get_the_time('d');
                                        ?>
                				    <i class="fa fa-clock-o"></i> <a href="<?php the_permalink() ?>"> <?php echo esc_html( get_the_date('j M Y') ) ?></a></li>
                                    <li class="meta-cat"><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></li>
                                    <?php if( has_tag() ) { ?>
				                        <li class="meta-tag"><i class="fa fa-tag"></i> <?php the_tags(''); ?></li>
                                    <?php } ?>
                                    <li class="meta-comm"><i class="fa fa-comment"></i> <?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></li>
                                </ul>
                            </div>
                            <div class="post-content clear">
                                <?php the_content(); ?>
                                
                                <?php wp_link_pages( ); ?>
                                
                            </div>
                        </div>
                        <?php
                    endwhile;
                else:
                    ?>
                    <div>
                        <p>
                            <?php echo BFRONT_SORRY_NO_POST_MATCHED_YOUR_CRETERIA; ?>
                        </p>
                    </div>
                <?php endif; ?>
                        <nav id="nav-single"> <span class="nav-previous">
                        <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post <span class="post-title">%title</span>', 'bfront')); ?>
                    </span> <span class="nav-next">
                        <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span><span class="post-title">%title</span>', 'bfront')); ?>
                    </span> </nav>
                        <!-- Post Single Ends -->
                <!-- Comment starts  -->
                <?php comments_template(); ?>
                <!-- Comment Ends -->
                </div>
                 </div>
                 <div class="col-md-4">
                    
                     <?php get_sidebar(); ?>
                         
                 </div>
                 
                 </div><!-- #main -->
	</div><!-- #primary -->
    </div>
</div>
<?php get_footer(); ?>