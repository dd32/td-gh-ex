<?php 
	
	global $wip_setting;
    
	if ( has_post_thumbnail() ) : ?>
        
		<div class="pin-container">
			<?php the_post_thumbnail('blog'); ?>
        </div>
        
<?php 

	endif; 
	
?>
    
<article class="article">

    <h1 class="title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1>
    
    <div class="line"> 

        <div class="entry-info <?php if (suevafree_setting('suevafree_view_comments') == "on" ) echo "viewcomments"; ?>">
       
            <span class="entry-date"><?php echo get_the_date(); ?></span>
            <?php if (suevafree_setting('suevafree_view_comments') == "on" ): ?>
            <span class="entry-comments"><?php echo comments_number( '<a href="'.get_permalink($post->ID).'#respond">'.__( "No comments","wip").'</a>', '<a href="'.get_permalink($post->ID).'#comments">1 '.__( "comment","wip").'</a>', '<a href="'.get_permalink($post->ID).'#comments">% '.__( "comments","wip").'</a>' ); ?></span>
            <?php endif; ?>
            <span class="entry-standard">Article</span>
        </div>
    
    </div>

	<?php 
	
	if ((is_home()) || (is_category()) || (is_page() )):
		
		the_excerpt(); 
	
	else:

		the_content();
		
    	wp_link_pages();

		the_tags( '<footer class="line"><div class="entry-info"><span class="tags">Tags: ', ', ', '</span></div></footer>' );
		
		if (suevafree_setting('suevafree_view_social_buttons') == "on" ) :
			get_template_part('socialbuttons');
		endif;
		
		if (suevafree_setting('suevafree_view_comments') == "on" ) :
			comments_template();
		endif;
		
	endif;
	
	
	?>

</article>