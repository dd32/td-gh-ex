<?php //Theme by Gordon French ?>
<?php get_header(); ?>




<!-- ......................... MAIN CONTENT .............................-->

<div id="mainWrap">
  <div id="mainContentTop"></div>
  <div id="mainContent">
  	<div id="text">
    
    	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
    
            <div class="post" id="post-<?php the_ID(); ?>">
            
           
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
            
            <p class="time"><?php the_time('l, F j, Y') ?> by <?php the_author() ?></p>
            
             <?php $image = get_first_image();?>
			<?php if ($image != 'nope'){ ?>
            <div class="postImage"><img src="<?php echo $image ?>"/></div>
            <?php } ?>
            
             <?php $truncateContent = truncate::doTruncate(strip_tags(get_the_content(), '<p><a><br/>'), 300, '.', '...'); ?>    
             <p class="desc"><?php echo $truncateContent; ?></p>

            <br clear="all" />
            <p class="postmetadata">
            	<?php the_tags('Tags: ', ', ', ' '); ?><br />
                Posted in <?php the_category(', ') ?>
            </p>
        
        	</div>
        <?php comments_template(); ?>
		<?php endwhile; ?>
        
        
        <div class="previous_next">
			<?php posts_nav_link(' | ','&laquo; Previous Page','Next Page &raquo;'); ?>
        </div>
        
		<?php else : ?>
            <div class="post">
                <h2 class="notfound">Not Found</h2>
                <p class="sorry">Sorry, but you are looking for something that isn't here. 
                Please use the following tags to find content which could be interessting for you:</p>
                <div id="tags-nofound">
                <?php wp_tag_cloud(''); ?>
                </div>
            </div>
        <?php endif; ?>
        
       
        
        </div><!-- close #text -->
	</div><!-- end #mainContent -->
    <div id="mainContentBottom"><div id="mainContentDecor"></div></div></div>
  
  
  <!-- ......................... SIDEBAR .............................-->



<?php get_sidebar(); ?>


<!-- ......................... FOOTER .............................-->



<?php get_footer(); ?>


