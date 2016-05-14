<?php 
    /* Template Name: Blog */
    get_header(); 
?>

<?php global $advance;?>

        <?php get_template_part('headers/part','headsingle'); ?>

<div id="sub_banner">
     <h1>
    <?php the_title(); ?>
    </h1>
<div class='h-line'></div>
	</div><!-- sub_banner -->
	
<div id="content" >

<div class="row">

<div class="large-9 columns <?php if ( !is_active_sidebar( 'sidebar' ) ){ ?> nosid <?php }?>">

<!--Content-->
 <?php  
  		
		if(!empty($advance['blog_cat_id'])){
			$blogcat = $advance['blog_cat_id'];
			$blogcats =implode(',', $blogcat);
			}else{$blogcats = '';}
       $args = array(
                     'post_type' => 'post',
                     'cat' => ''.$blogcats.'',
                     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
                     'posts_per_page' => ''.absint($advance['blog_num_id']).'');
      $the_query = new WP_Query( $args );
   ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                   
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> </div>
               
<div id="content" class="content_blog blog_style_b1" role="main">
           
			
							   
                        
					<article class="post_format_standard odd">
						                        
						<div class="title_area">
							
                            <?php the_title( sprintf( '<h1 class="post_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
						</div>
                        
						<div class="post_info post_info_2">
                       <span class="post_author"> <i class="fa fa-calendar"></i><a class="post_date"><?php the_time( get_option('date_format') ); ?></a></span>
                       <span class="post_info_delimiter"></span>
							<span class="post_author"><i class="fa fa-user"></i> <a class="post_author"><?php the_author(); ?></a></span>
							<span class="post_info_delimiter"></span>
                           <?php if( has_category() ) { ?>
							<span class="post_categories">
								<span class="cats_label"><i class="fa fa-th-list"></i></span>
								<a class="cat_link"><?php the_category(' '); ?></a>
							
							</span>
							
							<?php } ?>
                          <div class="post_comments"><a><i class="fa fa-comments"></i><span class="comments_number"> <?php comments_popup_link( __('0 Comment', 'advance'), __('1 Comment', 'advance'), __('% Comments', 'advance'), '', __('Off' , 'advance')); ?> </span><span class="icon-comment"></span></a></div>  
                            
						</div>
                        
						
						<div class="post_content">
							<p><?php the_excerpt(); ?></p>
							
						</div>
                        <div class="readmore">
                        <a href="<?php echo get_permalink();?>" rel="bookmark" class="more-link">
						<?php echo esc_html__('Read more', 'advance'); ?>
                       </a>
                      </div>
						<div class="post_info post_info_3 clearboth">
                       
							<span class="post_tags">
								<?php if( has_tag() ) { ?><i class="fa fa-tag fa-lg"></i><?php } ?>
								<?php if( has_tag() ) { ?><a class="tag_link"><?php the_tags('','  '); ?></a>
								
							</span><?php } ?>
						</div>
					</article>
                    <div class="share">
					<?php get_template_part('share_this');?></div>
                    <div class="sep-20"><img  src="<?php echo esc_url (get_template_directory_uri(). '/images/sep-shadow.png');?>" /></div>
                    </div>
  <?php endwhile ?>
  
  
              <!--PAGINATION -->
                <div class="advance_nav">
                    <?php
                        global $the_query;
                        $big = 999999999; 
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $the_query->max_num_pages,
                                'show_all'     => true,
                                'prev_next'    => false
                            
                            ) );
                    ?>
                </div>
            <!--PAGINATION END-->
</div>

<div class=" wow fadeIn large-3 columns"> 
<?php get_sidebar();?>
</div>

</div>
</div>
<?php get_footer(); ?>