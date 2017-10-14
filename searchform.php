<form class="searchform" method="get" action="<?php echo get_home_url(); ?>">
	<div class="input-group">
	    <input type="text" name="s" class="form-control" placeholder="Search">
	    <span class="input-group-btn">
	    	<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
	    </span>
    </div>
    <?php do_action('graphene_search_form'); ?>
</form>