<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php global $page, $paged; ?>
            <?php wp_title('|', true, 'right'); ?>
            <?php bloginfo('name'); ?>
            <?php $site_description = get_bloginfo('description', 'display'); ?>
            <?php if ($site_description && (is_home() || is_front_page())) : ?>
                <?php echo " | $site_description"; ?>
            <?php endif; ?>
            <?php if ($paged >= 2 || $page >= 2) : ?>
                <?php echo ' | '.sprintf(__('Page %s'), max($paged, $page)); ?>
            <?php endif; ?>
        </title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if (is_singular() && get_option('thread_comments')) : ?>
			<?php wp_enqueue_script('comment-reply'); ?>
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <div id="header-frame"></div><!-- #header-frame -->
	<div id="header">
		<div id="site-title">
			<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('name'); ?></a>
		</div><!-- #site-title -->
	</div><!-- #header -->
    <div id="wrapper" class="hfeed">
		<div id="main">
        		<div id="left-bar" class="widget-area">
    				<ul class="xoxo">
                        <li id="pages" class="widget-container">
                            <h3 class="widget-title"><?php _e('Pages'); ?></h3>
                            <ul>
                                <?php wp_list_pages('sort_column=post_title&title_li='); ?>
                            </ul>
                        </li>
                    </ul>
				</div>