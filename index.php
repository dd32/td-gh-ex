<?php 
/*
*	DO NOT MODIFY HERE!
*
*	Check wich front page is selected.
*/	
	$wich_page = get_option('show_on_front');
		if(($wich_page =='custom_frontpage') && autoshow_check_if_home())
				get_template_part('custom','home');
		elseif($wich_page == 'page' && get_option('page_for_posts') == 'option_none_value')
				get_template_part('page');
		elseif (($wich_page == 'posts') || ($wich_page == 'page' && get_option('page_for_posts') !== 'option_none_value') || (( $wich_page =='custom_frontpage' ) && ! autoshow_check_if_home() )) { ?>
<?php			 

/*
*	YOU CAN START MODIFY FROM HERE.
*/

?>
<?php get_header(); ?>

<!-- archive-title -->		
<?php if(is_day()) { ?>
	<div id="archive-title">
		Browsing articles from "<strong><?php the_time(get_option('date_format')) ?></strong>"
	</div>
<?php } ?>		
<?php if(is_month()) { ?>
	<div id="archive-title">
		Browsing articles from "<strong><?php the_time(get_option('date_format')) ?></strong>"
	</div>
<?php } ?>
<?php if(is_category()) { ?>
	<div id="archive-title">
		Browsing articles in "<strong><?php $current_category = single_cat_title("", true); ?></strong>"
	</div>
<?php } ?>
<?php if(is_tag()) { ?>
	<div id="archive-title">
		Browsing articles tagged with "<strong><?php wp_title('',true,''); ?></strong>"
	</div>
<?php } ?>
<?php if(is_author()) { ?>
	<div id="archive-title">
		Browsing articles by "<strong><?php wp_title('',true,''); ?></strong>"
	</div>		
<?php } ?>
<!-- /archive-title -->
		
<div id="content" class="clear" > <!-- begin content -->		

	<div id="left-column"> <!-- begin left-column -->
		<div id="left-column-inner" class="clear"> <!-- begin left-column-inner -->
			<?php if (have_posts()) :
				while (have_posts()) : the_post(); ?>
          <div <?php post_class(); ?>>
            <?php if ( has_post_thumbnail())
         		{
              echo "<div class=\"image-thumb\">";
              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
  						echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
  						the_post_thumbnail(array(100, 100), 'class=image'); 
  						echo '</a>';
  						echo "</div>";
						} ?>	
						<div class="entry entry-list">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?> 
							<div class="more"><a href="<?php the_permalink() ?>">More</a></div>
							<div class="clear"></div>
						</div>
            <div class="clear"></div>
            <div class="info-bar-top"></div>
            <div class="clear"></div>
            <div class="info-bar info-bar-list">
              <div class="info-bar-left">
                <p class="comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>&nbsp;|&nbsp;</p>
                <?php autoshow_the_category(); ?>
                <?php autoshow_the_tags(); ?>
                <p class="edit-link"><?php edit_post_link('Edit','&nbsp;|&nbsp;',''); ?></p>
                <?php if(function_exists('the_ratings')) { ?><div class="rating"><?php the_ratings();?> </div> <?php } ?>
              </div>
              <div class="info-bar-right"><p class="date"><?php the_time(get_option('date_format')) ?></p></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="info-bar-bottom"></div>
					</div>
					<?php wp_link_pages('before=<div>&after=</div>'); ?>
        <?php endwhile; ?>
				<?php if (  $wp_query->max_num_pages > 1 )
				{ 
          if(function_exists('wp_pagenavi')) 
        	{ ?>
            <div id="navigation"><?php wp_pagenavi(); ?></div>
         	<?php	
         	}
	        else
    	    { ?>
            <div id="navigation" class="old-navi">
              <?php next_posts_link( '&larr; Older posts', '' ); ?>&nbsp;
              <?php previous_posts_link( 'Newer posts &rarr;', '' ); ?>
            </div><!-- end navigation -->
       		<?php
 	    		} ?>
				<?php
				} ?>
      <?php else : ?>                    
        <p>Sorry, but you are looking for something that isn't here.</p>
			<?php endif; ?>
	  </div> <!-- end left-column-inner -->
	</div> <!-- end left-column -->
		
<?php  get_sidebar(); ?>

<?php get_footer(); ?>

<?php

/*
*	DO NOT MODIFY HERE!
*/

	}
?>