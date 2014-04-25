<div class="row">
	<div class="col-sm-12 col-md-12">
	<div class="thumbnail">
			<span class="post-format-icon link">
				<i class="fa fa-link"></i>
			</span>
			</div>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-link'); ?>>
		
			<h3>
				<?php if (has_post_format('link')): ?>
				<?php
				        $content = get_the_content('more');
				        $linktoend = stristr($content, "http" );
				        $afterlink = stristr($linktoend, ">");
				        if ( ! strlen( $afterlink ) == 0 ):
				        $linkurl = substr($linktoend, 0, -(strlen($afterlink) + 1));
				        else:
				        $linkurl = $linktoend;
				        endif;
				?>
				<a href="<?php echo $linkurl; ?>">
					<?php the_title(); ?>
					<span class="glyphicon glyphicon-new-window"></span>
				</a>
				<?php endif; ?>				
			</h3>
		<?php do_action('ThemingStrap_entry_header'); ?>
		</div>
	</div>
</div>