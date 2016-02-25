<?php 
/**
 * 
 * @package Avvocato 
 */
?>
<?php while (have_posts()) : the_post(); ?>  
<div class="section-blog">
	<div class="container">
		<div class="column-container blog-container">			
			<div class="column-12-12">
				<div class="gutter">
					<div class="inner-page-container">
						<article class="single-post">	
							<div class="article-text">
								<?php the_content(); ?>
							</div>
						</article>
					</div>
				</div>
			</div>			
		</div>
	</div> <!--  ENd container  -->
</div> <!--  END section-blog  -->
<?php endwhile; ?>