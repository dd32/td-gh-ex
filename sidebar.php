<div class="sidebar">
                <!--search-->
                <form action="" method="get" accept-charset="utf-8">
                    <label for="" class="blog-search">
                        <input type="search" name="s" value="" placeholder="Blog Search">
                        <input class="icon-search" type="submit" name="" value="">
                    </label>
                </form>

                <!--Categories-->
                <div class="sidebar-section">
                    <h2>Categories</h2>
                    <ul class="blog-category">
                    	<?php wp_list_categories('title_li='); ?> 
                   	</ul>
            	</div>


                <!--Recent Posts-->
                
                <div class="sidebar-section">
                    <h2>Recent Posts</h2>
                    <ul class="hot-articles">
                    <?php
                        $recent_posts = wp_get_recent_posts();
                        foreach( $recent_posts as $recent )
						{
                        	$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"]), "Full");
                            echo '<li><a href="' . get_permalink($recent["ID"]) . '"  class="image">
									<img width="185" height="135"  src="'.$img_src[0].'"  class="attachment-post-thumbnail wp-post-image" alt="" /></a>
									<h3><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></h3>		
                                  </li> ';
                        }
                    ?>
                    </ul>                

                </div>
                
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
<?php endif; ?>                
                
  <?php
 	$defaults = array(
		'before'           => '<p>' . __( 'Pages:','ascreen' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page','ascreen' ),
		'previouspagelink' => __( 'Previous page','ascreen' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
        wp_link_pages( $defaults );

?>              
			</div><!--siedbar end-->
            
            
