<div id="left_sidebar">

<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

       	<li><h2><?php _e('Categories'); ?></h2>
		<ul>
			<?php wp_list_categories('title_li='); ?>
		</ul>
	</li>

        <?php wp_list_pages('depth=3&title_li=<h2>Pages</h2>'); ?>
	
	<li><h2><?php _e('Recent Posts'); ?></h2>
               <ul>
		<?php wp_get_archives('type=postbypost&limit=5'); ?>  
               </ul>
	</li>
	
	<li><h2><?php _e('Archives'); ?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>

	<?php wp_list_bookmarks(); ?>	
	
<?php endif; ?>

</ul>

</div>