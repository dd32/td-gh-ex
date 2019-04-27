<?php
/**
 *  Author 
 */

?>

<div class="entry-author">

	<h4 class="entry-author-title">
		<?php echo __( "Author" , "bnw-theme" ); ?>
	</h4>
	
	<div class="author-box">
		<div class="row">
			<div class="two columns">
				<div class="author-box-img">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
				</div>
			</div>
			<div class="ten columns">
				<div class="card author-bio-wrapper">
					<div class="card-body">
						<h5 class="card-title author-name"><?php the_author(); ?></h5>
						<p class="card-text author-bio">
							<?php echo get_the_author_meta( 'description' ); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>