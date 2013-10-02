<?php if ( ( is_active_sidebar(wip_postmeta('wip_sidebar')) ) && ( wip_template('span') == "span8" ) ) : ?>
        
	<section id="sidebar" class="pin-article span4">
		<div class="sidebar-box">
            	<?php dynamic_sidebar(wip_postmeta('wip_sidebar')) ?>
		</div>
	</section>
    
<?php endif; ?>