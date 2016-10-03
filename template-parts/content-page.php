<h2 class="title"><span><?php the_title(); ?></span></h2>
<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	echo '<span class="voffset5">'; the_post_thumbnail('page-thumb',array( 'class'	=> "img-responsive")); echo '</span>';
} ?>
<?php the_content(); ?> 