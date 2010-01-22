<?php
$arjunaOptions = get_option('arjuna_options');
if ($arjunaOptions['sidebarDisplay']!='none') {
?><div class="sidebars">
	<div class="t"><div></div></div>
	<div class="i"><div class="i2"><div class="c">
		<div class="sidebarIcons"><a class="rssBtn" href="<?php bloginfo('rss2_url'); ?>">RSS</a></div>
		<div class="">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_full_top') ) : ?>
			<div class="sidebarbox">
			<h4><?php _e('Recent Posts', 'Arjuna'); ?></h4>
			<ul>
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
			</ul>
			</div>
			
			<div class="sidebarbox">
			<h4><?php _e('Browse by Tags', 'Arjuna'); ?></h4>
			<?php wp_tag_cloud('smallest=8&largest=17&number=30'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="sidebarLeft">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_left') ) : ?>
			<div class="sidebarbox">
			<h2><?php _e('Categories', 'Arjuna'); ?></h2>
			<ul>
				<?php wp_list_categories('show_count=0&title_li='); ?>
			</ul>
			</div>
			<?php endif; ?>
		</div>
		<div class="sidebarRight">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_right') ) : ?>
			<div class="sidebarbox">
			<h2><?php _e('Meta', 'Arjuna'); ?></h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
				<?php wp_meta(); ?>
			</ul>
			</div>
			<?php endif; ?>
		</div>
		<div class="clear">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_full_bottom') ) : ?>
			<?php endif; ?>
		</div>
	</div></div></div>
	<div class="b"><div></div></div>
</div><?php
}
?>

