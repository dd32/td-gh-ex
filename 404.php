<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

    	<div class="post">
            <h2>404 Error &#8212; Page Not Found</h2>
    		<div class="entry">
      			<h6>Did you hear something?</h6>

      			<p>The file you are attempting to access does not exist.  Why not try using the links or the search box?</p>
				
				<h3>Last 5 blog posts:</h3>
					<ol class="postlist">
						<?php (function_exists('ard_get_archives'))? ard_get_archives('limit=5') : wp_get_archives('type=postbypost&limit=5') ;  ?>
					</ol>

			</div>
		</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>