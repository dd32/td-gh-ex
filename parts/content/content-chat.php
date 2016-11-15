<article id="post-<?php the_ID(); ?>" resource="?<?php the_ID() ; ?>#id" <?php post_class(); ?> vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header">
		<div class="thumbnail"><?PHP
			the_post_thumbnail();
		?></div>
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header>

	<div class="entry-content chat">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'antonine' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
	</div>
	
	<script type="text/javascript">
		jQuery(document).ready(
			function(){
				jQuery(".entry-content p")
					.each(
						function(index,value){
							output = "";
							lines = jQuery(value).html().split("\n");
							for(x in lines){
								if((x % 2)==0){
									output = output + "\n<strong>" + lines[x] + "</strong>";
								}else{
									output = output + "\n" + lines[x];
								}
							}
							jQuery(value).html(output);
						}
					);
			}
		);
	</script>
	
	<footer class="entry-footer">
		<?php antonine_author_meta(); ?><br />
		<?php antonine_entry_meta(); ?><br />
		<?php edit_post_link( __( 'Edit', 'antonine' ), '<span class="edit-link">', '</span>' ); ?><br /><br />
		<?php antonine_licence(); ?>	
	</footer>
</article>
