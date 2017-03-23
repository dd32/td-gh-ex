<h2 class="title"><span><?php the_title(); ?></span></h2>
<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	echo '<span class="voffset5">'; the_post_thumbnail(array( 'class'	=> "img-responsive")); echo '</span>';
} ?>
<?php the_content(); ?> 
<?php wp_link_pages(array('before'=>'<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'backyard' ).'</span>', 'after'=> '</div>','link_before' => '<span>','link_after'  => '</span>',)); ?>