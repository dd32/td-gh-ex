<?php get_header(); ?>
<div id="content" class="container">
<div class="row breadcrumb-container">
	<?php wp_fanzone_breadcrumb(); ?>
</div>
	<div class="row">
		<article class="col-md-9">
			<?php if (have_posts()) : ?>
            
            <div id="page-heading">
                <?php $post = $posts[0]; ?>
                <?php if (is_category()) { ?>
                <h1><?php single_cat_title(); ?></h1>
                <?php  } elseif (is_author()) { ?>
                <h1>Author: <?php the_author(); ?></h1>
                <?php } elseif( is_tag() ) { ?>
                <h1>Posts Tagged &quot;<?php single_tag_title(); ?>&quot;</h1>
                <?php  } elseif (is_day()) { ?>
                <h1>Daily Archive: <?php the_time( get_option( 'date_format' ) ); ?></h1>
                <?php  } elseif (is_month()) { ?>
                <h1>Monthly Archive: <?php single_month_title(' '); ?></h1>
                <?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <h1>Blog Archives</h1>
                <?php } ?>
            </div>
            <!-- END page-heading -->
            
            <div id="post" class="post clearfix">   
                <?php while (have_posts()) : the_post(); ?>  
                    <div class="col-md-12">
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
                            <div id="post_archive" class="post_box">
                                <div class="row">
                                    <div class="col-md-12"><h4 class="post_title"><?php the_title(); ?></h4></div>
                                <?php if ( '' != get_the_post_thumbnail() ) { ?>	
                                    <div class="col-md-6">
                                        <a href="<?php the_permalink('') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
                                        <div class="meta-info row">
                                            <div class="col-md-6"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></div>
                                            <div class="col-md-6"><a href="<?php comments_link(); ?>" class="meta-comment"><i class="fa fa-comments"></i><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a> </div>
                                        </div> 
                                    </div>                               
                                    <div class="col-md-6">                                                           
                                        <p class="post_desc"><?php echo excerpt('70'); ?></p>
                                        <div class="clearfix"></div>
                                    </div> 
                                 <?php } else { ?>
                                    <div class="col-md-12">                                                           
                                        <p class="post_desc"><?php echo excerpt('70'); ?></p>
                                    </div>
                                     <div class="meta-info row">
                                        <div class="col-md-6"> 
                                            <div class="col-md-6"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></div>
                                            <div class="col-md-6"><a href="<?php comments_link(); ?>" class="meta-comment"><i class="fa fa-comments"></i><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></div> 
                                        </div>                                 
                                        
                                    </div> 
                                 <?php } ?>                                  
                                </div>
                                <a href="<?php the_permalink('') ?>" class="btn btn-info read_more">Read More >></a>
                                </div>
                        </div>
                     </div>   
                <?php endwhile; ?>               	     
                <div class="clearfix"></div>
					 <?php if (function_exists("wp_fanzone_pagination")) {
                                wp_fanzone_pagination(); 
                    }
                    ?>
            </div>
            <!-- END post -->
            <?php endif; ?>
		</article>            
	    <aside class="col-md-3">         
			<?php get_sidebar(); ?>
        </aside>
	</div>
</div>   
<?php get_footer(' '); ?>