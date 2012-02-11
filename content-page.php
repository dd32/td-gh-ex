<?php

//The template used for displaying page content in page.php


?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="page-entry-header clearfix">

		<h1 class="page-entry-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->


   <?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumb clearfix">'; the_post_thumbnail(); echo '</div>'; } ?>
   

	<div class="page-entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'azurebasic' ) . '</span>', 'after' => '</div>' ) ); ?>

	</div><!-- .entry-content -->

	<footer class="page-entry-meta clearfix">

		<?php edit_post_link( __( 'Edit', 'azurebasic' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->