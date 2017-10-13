<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package atoz
 */

get_header(); ?>
 <?php if(have_posts() ) : while(have_posts() ) : the_post(); ?>     
<div id="single-banner" style="background-image:url('<?php echo the_post_thumbnail_url('atoz_single_post'); ?>'); "> 
    <div class="content wow fdeInUp">
      <div class="container">
           <?php 
              $categories = get_the_category();
              if($categories!=''){
              foreach ( $categories as $category ) {
                echo '<a class="category" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a> ';
              }
              }
              ?> 
			<h1><?php the_title(); ?> </h1>
			<header class="entry-header">
				<a href="#"> </a>
				<span class="date-article"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span> 
			</header>
			<!--breadcrumb-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#"><?php get_breadcrumb(); ?></a></li>
			</ol>
      </div>
    </div>
</div>
 <?php endwhile;endif; ?>

<!--Content Body-->
<div id="single-body">
  <div class="container">
    <div class="row wow fdeInUp"> 
      <!--blog posts container-->
      <div class="col-md-8 col-sm-8 single-post <?php background_color(); ?>">        
        <?php         
        if ( have_posts() ) :   
			/* Start the Loop */
		while ( have_posts() ) : the_post();
        ?> 
		<?php the_content();?>        
         <div class="clearfix"></div>        
        <!--Footer tags-->        
        <footer class="entry-footer entry-meta-bar">
          <div class="entry-meta">  			
			<span class="tag-links">
              <?php echo get_the_tag_list('Tagged in: ',', '); ?>              
            </span></div>
        </footer>       
        <?php endwhile; endif;?>
		
         <!--Share the Post-->
        <ul class="share-ico">
        <li><?php _e('Share on :', 'atoz'); ?></li>
            <li>
                <a data-original-title="Facebook"  data-placement="left" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="<?php _e('Share this post on Facebook!', 'atoz')?>"><i class="fa fa-facebook"  data-placement="left"></i></a>
            </li>
            <li>                
                <a data-original-title="Twitter" data-placement="left" target="_blank" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>: <?php the_permalink(); ?>" title="<?php _e('Share this post on Twitter!', 'atoz')?>"><i class="fa fa-twitter"></i></a>
            </li>
            <li>                
                <a data-original-title="Google+"  data-placement="left" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php _e('Share this post on Google Plus!', 'atoz')?>"><i class="fa fa-google-plus"></i></a>
            </li>
            <li>
				<a data-original-title="Dribbble"  data-placement="left" target="_blank" href="https://dribbble.com?url=<?php the_permalink(); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=Dribbble" title="<?php _e('Share this post on Dribbble!', 'atoz')?>"><i class="fa fa-dribbble"></i></a>                       
            </li>
            <li>
               <a data-original-title="Instagram"  data-placement="left" target="_blank" href="https://www.instagram.com/?hl=en?url=<?php the_permalink();?>&description=<?php the_title();?> on <?php bloginfo('name'); ?> <?php echo site_url()?>" class="pin-it-button" count-layout="horizontal" title="<?php _e('Share on instagram','atoz') ?>"><i class="fa fa-instagram"></i></a>
            </li>
          </ul>
        <div class="clearfix"></div>
        
           
        <!--Author box-->
        <div class="author-box">
             <?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?>			 
          <div class="author-box-title"><?php _e('Authored By:', 'atoz'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author_meta('display_name') ; ?></a></div>
          <div class="author-description"><?php the_author_meta('description'); ?></div>
          <div class="author_social"><a href="<?php echo get_the_author_meta('url') ; ?>"><i class="fa fa-globe"></i></a></div>
        </div>        
        <div class="clearfix"></div>
        <!--Comments-->      
          <?php comments_template();?>        
      </div><!--blog posts container end--> 
      
      <!--aside-->
      <aside class="col-md-4 col-sm-4" >         
        <?php get_sidebar(); ?>         
      </aside>
    </div>
  </div>
</div>
<?php if( get_theme_mod( 'atoz_related_post_check' ) == 1 ) { ?>
<!-- Related Posts -->
<section id="sb-imgbox">
  <div class="container">
    <div class="row ">     
		
         <?php atoz_related_post(); ?>               
    </div>
  </div>
</section>
<?php } ?>
<?php
get_footer();