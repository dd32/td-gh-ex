<?php
/* Template Name: Custom Home Page */
get_header(); ?>
<div id="archive-title"></div>
<div id="content" class="clear" > <!-- begin content -->	
	<div id="left-column" style="width:610px;"> <!-- begin left-column -->
		<div id="left-column-inner" class="clear"> <!-- begin left-column-inner -->
	       <?php 
	       	$args = array(
	   			'post_type' => 'attachment',
	   			'numberposts' => -1,
	   			'post_status' => null,
	   			'post_parent' => 0,
	   			'orderby' => 'rand'
				); 
				
			$attachments = get_posts($args);
			$img_id=0;
			if($attachments)
				foreach($attachments as $attachment)
				{
					$img = wp_get_attachment_image_src($attachment->ID, 'home-thumb' );
					if($img[1] == 590 && $img[2]==330) //!!!!! -> Must be Foto width & height
					{
						$img_id=$attachment->ID;
					}
				}
			if($img_id!=0)
			{
				$image_attributes = wp_get_attachment_image_src( $img_id,'home-thumb' ); // returns an array
				?>
				<img src="<?php echo $image_attributes[0] ?>" width="<?php echo $image_attributes[1] ?>" height="<?php echo $image_attributes[2] ?>" alt=""/>
			<?php
			}
			else
			{ ?>
				<div id="error" style="background:white;color:black;width:590px;height:330px;">
					<p>No image found. To see your own images on the Home page, please go to <em>Media</em> and upload images greather than 590 x 330 pixels. If you uploaded more, they will be displayed random to each page's refresh.</p>
					<p><strong>Note:</strong> To view these images, please do not attach them to any post.</p>
				</div>
			<?php
			} ?>	
			<?php wp_reset_query(); ?>
	    </div> <!-- end left-column-inner -->
	</div> <!-- end left-column -->
			
	<div id="right-column" style="width:360px;"> <!-- begin right-column -->
		<div id="right-column-inner" class="clear"> <!-- begin begin-column-inner -->
			<?php
			$page = get_page(get_theme_mod('about_page', '0'));
			if($page)
			{
				$page_id = $page->ID;
				$content = apply_filters('the_content', $page->post_content);
				$title = $page->post_title;
			?>
			<div class="about">
				<h2><a href="<?php echo home_url(); ?>/"><?php echo $title; ?></a></h2>
				<div class="post" style="width: 340px;">
					<div class="entry">
						<?php echo $content; ?>	
						<?php edit_post_link('Edit this entry.', '<p>', '</p>', $page_id); ?>
					</div>
				</div>
			</div>				
			<?php
			}
			else
			{
				$error = "Please select a page to be displayed as ABOUT PAGE. Go to Dashboard -> Appearance -> Home page.";
				?>
				<div class="about">
				<h2><a href="<?php echo home_url(); ?>/"><?php echo "Error"; ?></a></h2>
				<div class="post" style="width: 340px;">
					<div class="entry">
						<?php echo $error; ?>	
					</div>
				</div>
			</div>	
			<?php
			}
			?>
		</div> <!-- end right-column-inner -->
	</div> <!-- end right-column -->
	
<?php get_footer(); ?>