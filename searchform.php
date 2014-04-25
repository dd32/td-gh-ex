<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
	      <input type="text" class="field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'ThemingStrap' ); ?>">
	      <span class="input-group-btn">
	        <button class="btn btn-primary submit" type="submit" name="submit" id="searchsubmit">
	        	<span class="glyphicon glyphicon-search"></span>
	        </button>
	      </span>
	</div>
</form>