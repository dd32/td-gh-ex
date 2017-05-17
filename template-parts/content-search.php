<?php

/**
 * Template part for displaying results in search pages.
 * @link https://codex.wordpress.org/Template_Hierarchy 
 * @package Aquaparallax
 */
 
 ?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	

<div class="aqa-single-blog">
		
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<p class="post-discription"><?php the_excerpt(); ?></p>

</div>

</article>