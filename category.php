<?php 
/*
 * Category Template File.
 */
get_header(); 
?>
<section>
    <div class="breadcumb-bg">
	<div class="deserve-container container">
    	<div class="site-breadcumb">
			<div class="row">
			 <div class="col-md-6 col-sm-6">
				<h1><?php   printf( __( 'Category : %s', 'deserve' ),' '.single_cat_title( '', false ) ); ?></h1>
        	 </div>
        	 <div class="col-md-6 col-sm-6">
				<ol class="breadcrumb breadcrumb-menubar">
				<?php if (function_exists('deserve_custom_breadcrumbs')) deserve_custom_breadcrumbs(); ?>
				</ol>
			</div>
			</div>
        </div>
    </div>
    </div>    
    <div class="deserve-container">       
        <div class="col-md-9 col-sm-8  dblog">        
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="blog-box">
            	<?php $deserve_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'large'); 
            	 if($deserve_image[0] != "") { ?>
					<a href="<?php echo get_permalink(); ?>">
					<img src="<?php echo esc_url($deserve_image[0]); ?>" width="<?php echo $deserve_image[1]; ?>" height="<?php echo $deserve_image[2]; ?>"  alt="<?php the_title(); ?>" class="img-responsive" />
				</a>
                <?php } ?>
                   <div class="post-data">
					<a href="<?php echo get_permalink(); ?>" class="blog-title"><?php the_title(); ?></a>   
					 <div class="post-meta">
						<ul>
							<?php deserve_entry_meta(); ?>
						</ul>
                    </div>
                    <?php the_excerpt(); ?>
                </div>         
            </div>
         <?php endwhile;  ?>
         <div class="gallery-pagination blog-pagination">
                <ul>					
					<li class="link_pagination" >
					<?php deserve_pagination(); ?>
				</li>
                </ul>
            </div>
        </div>
    <?php get_sidebar(); ?>
    </div>    
</section>
<?php get_footer(); ?>
