<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
	<?php get_header(); ?>
</head>
<body>
	<div class="main">
		<div class="container">
			<?php include (TEMPLATEPATH . "/head.php"); ?>
	
			<div class="span-24 body">
				<div class="span-16 content">
				
					<?php if (is_home()) 
						include (TEMPLATEPATH . "/gallery.php");
					?>

					<div class="paddings">
						<ul class="items">
							<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
							<li>
								<?php include (TEMPLATEPATH . "/item.php"); ?>
							</li>
							<?php endwhile; ?>
							<?php else : ?>
							<li>
								<?php include (TEMPLATEPATH . "/missing.php"); ?>
							</li>
							<?php endif; ?>
							<li>
								<div class="navigation">
			            			<?php if (function_exists('wp_link_pages()')): echo "exists"; ?>
			            			<?php	wp_link_pages(); ?>
									<?php else: ?>
									<div class="fl"><?php next_posts_link(__('&laquo; Older Entries', 'default')) ?></div>
			                        <div class="fr"><?php previous_posts_link(__('Newer Entries &raquo;', 'default')) ?></div>
									<?php endif; ?>
			                    	<div class="clear"></div>
		                        </div>
		                    </li>
						</ul>
					</div>

				</div>
				<?php get_sidebar(); ?>
			</div>
			<div class="clear"></div>
					
			<?php include (TEMPLATEPATH . "/footer.php"); ?>
		</div>
	</div>
</body>
</html>