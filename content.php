<div class="blog-lg-area-left">
	<div class="media">
		
		<?php
		global $post;
				if(is_page() )
				// call post if any page is call 
				{
				the_post();
				}
				else 
				{
				// call post related meta contant like posted by, author name and comment
				appointment_post_meta_content();
				}
		?>
			<div class="media-body" <?php post_class(); ?>>
		<?php 
				// Check Image size for fullwidth template
				if( is_page_template('blog-full-width.php'))
				appointment_image_thumbnail('blog-area-full','img-responsive'); 
				
				
				// Check Image size for Different format like Single post,page
				elseif(is_single() || is_page())
				appointment_post_thumbnail('blog-area-full','img-responsive'); 
				else
				appointment_post_thumbnail('webriti_blogfull_img','img-responsive');	
				//hide permalink for fullwidth template
				if( !is_page_template('fullwidth.php') && get_the_title() && !is_page() ) { ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php   } ?>
		
		<?php		
                // call editor content of post/page	
				the_content( __( 'Read More' , 'appointment' ) );
				wp_link_pages( );
		?>
		<div class="blog-btn-area-lg"></div>
	</div>
</div>