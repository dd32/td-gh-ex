<?php get_header(); ?>

	<!--welcome-->
	<div id="welcome_container">

		<div id="welcome-box">
		
	<h1><?php if(of_get_option('welcome_head') != NULL){ echo of_get_option('welcome_head');} else echo "Write your welcome headline here" ?></h1>
	<p><?php if(of_get_option('welcome_text') != NULL){ echo of_get_option('welcome_text');} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus." ?></p>
		
	</div>
	
		<div id="quote-box">
		
	<div id="author-quote"><?php if(of_get_option('quote_text') != NULL){ echo of_get_option('quote_text');} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus." ?></div>
		<div id="author-name"><?php if(of_get_option('author_text') != NULL){ echo of_get_option('author_text');} else echo "- Manish G" ?></div>
	</div>	

</div><!--welcome end-->

<div class="clear"></div>
				
		<!--boxes-->
		<div id="box_container">
				
		<?php for ($i = 1; $i <= 4; $i++) { ?>
		
		
				<div class="boxes <?php if ($i == 1) {echo "box1";} ?><?php if($i == 2) {echo "box2";} ?> <?php if($i == 3) {echo "box3";} ?>">
						<div class="box-head">
								
	<a href="<?php echo of_get_option('box_link' . $i); ?>"><img src="<?php if(of_get_option('box_image' . $i) != NULL){ echo of_get_option('box_image' . $i);} else echo get_template_directory_uri() . '/images/box' .$i. '.png' ?>" alt="<?php echo of_get_option('box_head' . $i); ?>" /></a>

					
					</div> <!--box-head close-->
					
				<div class="title-box">						
						
				<div class="title-head"><?php if(of_get_option('box_head' . $i) != NULL){ echo of_get_option('box_head' . $i);} else echo "Box heading" ?></div></div>
					
					<div class="box-content">

				<?php if(of_get_option('box_text' . $i) != NULL){ echo of_get_option('box_text' . $i);} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus." ?>
					
					</div> <!--box-content close-->

				
				</div><!--boxes  end-->
				
		<?php } ?>
		
		</div><!--box-container end-->
			
			<div class="clear"></div>
		
</div>
<!--wrapper end-->

<?php get_footer(); ?>