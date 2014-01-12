<?php echo'<div class="gap"></div><div id="pagenavi" class="clearfix">'; if('optimize_pagenavi') { optimize_pagenavi(); } else { ?>
		<?php next_posts_link('<span class="alignleft">&nbsp; &laquo; Older posts</span>') ?>
		<?php previous_posts_link('<span class="alignright">Newer posts &raquo; &nbsp;</span>') ?>
	<?php } echo'</div><p></p>';?>
<div class="gap"></div>



