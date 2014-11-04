<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
// Admin panel that gets added to the page edit page for per page options

add_action('admin_menu', 'weaverx_add_page_fields');

function weaverx_add_page_fields() {
	add_meta_box('page-box', 'Weaver Xtreme Options For This Page (Per Page Options)', 'weaverx_page_extras', 'page', 'normal', 'high');
	add_meta_box('post-box', 'Weaver Xtreme Options For This Post (Per Post Options)', 'weaverx_post_extras', 'post', 'normal', 'high');
    global $post;
	$opts = get_option( apply_filters('weaverx_options','weaverx_settings') , array());	// need to fetch Weaver Xtreme options
    if (isset($opts['_show_per_post_all']) && $opts['_show_per_post_all']) {
        $i = 1;
        $args=array( 'public'   => true, '_builtin' => false );
        $post_types=get_post_types($args,'names','and');
        foreach ($post_types  as $post_type ) {
            add_meta_box('post-box' . $i, 'Weaver Xtreme Options For This Post', 'weaverx_post_extras', $post_type, 'normal', 'high');
            $i++;
        }
    }
}

function weaverx_isp_true($val) {
	if ($val) return true;
	return false;
}

function weaverx_page_checkbox($opt, $msg, $width = 33, $br = 0) {
	global $post;
?>
	<div style="float:left;width:<?php echo $width; ?>%"><label><input type="checkbox" id="<?php echo($opt); ?>" name="<?php echo($opt); ?>"
<?php checked(weaverx_isp_true(get_post_meta($post->ID, $opt, true))); ?> />
<?php 	echo($msg . '</label></div>');
	for ($i = 0 ; $i < $br ; $i++)
        echo '<br class="page_checkbox" style="clear:both;" />';
}

function weaverx_page_layout( $page = 'page' ) {

    if ( $page == 'page')
        $msg = wvr__('Select <em>Sidebar Layout</em> for this page - overrides default Page layout.');
    else
        $msg = wvr__('Select Single Page View <em>Sidebar Layout</em> for this post - overrides default Single View layout.');

    $opts = array( 'id' => '_pp_page_layout',
        'info' => $msg,
        'value' => array(
            array('val' => '', 'desc' => wvr__('Use Default') ),
            array('val' => 'right', 'desc' => wvr__('Sidebars on Right') ),
            array('val' => 'right-top', 'desc' => wvr__('Sidebars on Right (stack top)') ),
            array('val' => 'left', 'desc' => wvr__('Sidebars on Left') ),
            array('val' => 'left-top', 'desc' => wvr__('Sidebars on Left (stack top)') ),
            array('val' => 'split', 'desc' => wvr__('Split - Sidebars on Right and Left') ),
            array('val' => 'split-top', 'desc' => wvr__('Split (stack top)') ),
            array('val' => 'one-column', 'desc' => wvr__('No sidebars, content only') )
	));
    weaverx_pp_select_id($opts);
}
//--



function weaverx_pp_replacement( $desc, $id ) {
    global $post;
    global $wp_registered_sidebars;

    $id = '_' . $id;

    echo "\n<div style='float:left;width:40%;'><select name='{$id}' id='{$id}'> <option value=''>&nbsp;</option>\n";


	foreach ( (array) $wp_registered_sidebars as $key => $value ) {
        $area_name = $value['id']; //sanitize_title($value['name']);
        if ( strpos( $area_name, 'per-page-' ) !== false ) {
            echo ' <option value="' . $area_name . '"';
            selected( weaverx_isp_true( get_post_meta($post->ID, $id, true) == $area_name ));
            echo '>' . substr($area_name,9) . "</option>\n";

        }
	}
    echo '</select>&nbsp;&nbsp;' . $desc . "</div>\n";
}
//--


function weaverx_pp_select_id( $value ) {
    global $post;

    if ( isset( $value['name'] ) && $value['name'] != '' )
        echo "\n{$value['name']}&nbsp;&nbsp;&nbsp;\n";

    echo "\n<select name=\"" . $value['id'] . '" id="' . $value['id'] . "\">\n";

	foreach ($value['value'] as $option) {
        if ( $option['val'] == '' ) {
            echo '<option value="">';
        } else {
            echo ' <option value="' . $option['val'] . '"';
            selected( weaverx_isp_true( get_post_meta($post->ID, $value['id'], true) == $option['val'] ));
            echo ">";
        }
        echo $option['desc'] . "</option>\n";
    }
    echo '</select>&nbsp;' . $value['info'] . "\n";
}
//--



function weaverx_pwp_atw_show_post_filter() {
    // use plugin options...
	global $post;

if ( function_exists( 'atw_showposts_installed' ) ) {
    $filters = atw_posts_getopt('filters');

    $first = true;
    echo '<select id="_pp_post_filter" name="_pp_post_filter" >';
    foreach ($filters as $filter => $val) {     // display dropdown of available filters
        if ( $first ) {
            $first = false;
            echo '<option value="" ' . selected(get_post_meta($post->ID, '_pp_post_filter', true) == '') . '>Use above post filtering options</option>';
        } else {
            echo '<option value="' . $filter .'" ' . selected(get_post_meta($post->ID, '_pp_post_filter', true) == $filter) . '>' . $val['name'] . '</option>';
        }
    }
    echo '</select>&nbsp;Use a Filter from <em>ATW Show Posts Plugin</em> <strong>instead</strong> of above post selection options.<br /> ' .
    '<span style="margin-left:8em;"><span>(Note: ATW Show Posts <em>Post Display</em> options and <em>Use Paging</em> option <strong>not</strong> used for posts using this filter.)<br />' . '<br />';
} else {
?>
<strong>Want More Post Filtering Options?</strong> Install the <em>Aspen Themeworks Show Posts</em> plugin for more filtering options.<br /><br />
<?php }
}
//--



function weaverx_pwp_type() {
    $opts = array( 'name' => 'Display posts as:', 'id' => '_pp_wvrx_pwp_type',
        'info' => wvr__('How to display posts on this Page with Posts (Default: global Full Post/Excerpt setting)'),
        'value' => array(
            array('val' => '', 'desc' => wvr__('&nbsp;') ),
            array('val' => 'full', 'desc' => wvr__('Full post') ),
            array('val' => 'excerpt', 'desc' => wvr__('Excerpt') ),
            array('val' => 'title', 'desc' => wvr__('Title only') ),
            array('val' => 'title_featured', 'desc' => wvr__('Title + Featured Image') )
	));
    weaverx_pp_select_id($opts);
}


function weaverx_pwp_cols() {

    $opts = array( 'name' => 'Display post columns: ', 'id' => '_pp_wvrx_pwp_cols',
        'info' => wvr__('Display posts in this many columns - left to right, then top to bottom'),
        'value' => array(
            array('val' => '', 'desc' => wvr__('&nbsp;') ),
            array('val' => '1', 'desc' => wvr__('One Column') ),
            array('val' => '2', 'desc' => wvr__('Two Columns') ),
            array('val' => '3', 'desc' => wvr__('Three Columns') ) )
        );
    weaverx_pp_select_id($opts);

    weaverx_html_br();

    $opts2 = array( 'name' => 'Use <em>Masonry</em> columns:', 'id' => '_pp_pwp_masonry',
        'info' => wvr__('Use <em>Masonry</em> for multi-column display'),
        'value' => array(
            array('val' => '', 'desc' => wvr__('&nbsp;') ),
            array('val' => '1', 'desc' => wvr__('One Column') ),
            array('val' => '2', 'desc' => wvr__('Two Columns') ),
            array('val' => '3', 'desc' => wvr__('Three Columns') ),
            array('val' => '4', 'desc' => wvr__('Four Columns') ),
            array('val' => '5', 'desc' => wvr__('Five Columns') ) )
        );
    weaverx_pp_select_id($opts2);

?>
	<br />
<?php
	weaverx_page_checkbox('_pp_pwp_compact', 'For posts with <em>Post Format</em> specified, use compact layout on blog/archive pages.',90,1);
	weaverx_page_checkbox('_pp_pwp_compact_posts', 'For regular, <em>non-PostFormats</em> posts, show <em>title + first image</em> on blog pages.',90,1);
}

function weaverx_page_extras() {
	global $post;
	$opts = get_option( apply_filters('weaverx_options','weaverx_settings') , array());	// need to fetch Weaver Xtreme options

	if ( !( current_user_can('edit_themes')
		|| (current_user_can('edit_theme_options') && !isset($opts['_hide_mu_admin_per']))	// multi-site regular admin
		|| (current_user_can('edit_pages') && !isset($opts['_hide_editor_per']))	// Editor
		|| (current_user_can('edit_posts') && !isset($opts['_hide_author_per'])))    // Author/Contributor
	) {
        if (isset($opts['_show_per_post_all']) && $opts['_show_per_post_all'])
         echo '<p>You can enable Weaver Xtreme Per Page Options for Custom Post Types on the Weaver X:Advanced Options:Admin Options tab.</p>';
        else
            echo '<p>Weaver Xtreme Per Page Options not available for your User Role.</p>';
		return;	// don't show per post panel
	   }

	echo("<div style=\"line-height:150%;\"><p>\n");
	if (get_the_ID() == get_option( 'page_on_front' ) ) { ?>
<div style="padding:2px; border:2px solid yellow; background:#FF8;">Information: This page has been set
to serve as your front page in the <em>Dashboard:Settings:Reading</em> 'Front page:' option.
</div><br />
<?php
    }

    if (get_the_ID() == get_option( 'page_for_posts' ) ) { ?>
<div style="padding:2px; border:2px solid red; background:#FAA;"><strong>WARNING!</strong> You have the
<em>Dashboard:Settings:Reading</em> 'Posts page:' option set to this page. You may intend to do this, but
note this means that <em>only</em> this page's Title will be used
on the default WordPress blog page, and any content you may have entered above is <em>not</em> used.
If you want this page to serve as your blog page, and enable Weaver Xtreme Per Page options,
including the option of using the Page with Posts page template,
then that Reading:'Posts page:' selection <strong><em>must</em></strong> be set to the '&mdash; Select &mdash;' default value.
</div><br />
<?php
            return;
    }
	echo("<strong>Page Templates</strong>");
	weaverx_help_link('help.html#PageTemplates',wvr__('Help for Weaver Xtreme Page Templates'));
	echo '<span style="float:right;">(This Page\'s ID: '; the_ID() ; echo ')</span>';
	weaverx_html_br();
	echo('Please click the (?) for more information about all the Weaver Xtreme Page Templates.');
	echo("</p><p>\n");
	echo("<strong>Per Page Options</strong>");
	weaverx_help_link('help.html#optsperpage', wvr__('Help for Per Page Options'));
	weaverx_html_br();
	echo("These settings let you hide various elements on a per page basis.");
	weaverx_html_br();


	weaverx_page_checkbox('_pp_hide_site_title',wvr__('Hide Site Title/Tagline'));
	weaverx_page_checkbox('_pp_hide_header_image',wvr__('Hide Standard Header Image'));
	weaverx_page_checkbox('_pp_hide_header',wvr__('Hide Entire Header'), 33, 1);

    weaverx_page_checkbox('_pp_hide_menus',wvr__('Hide Menus'));
	weaverx_page_checkbox('_pp_hide_page_infobar',wvr__('Hide Info Bar on this page'));
	weaverx_page_checkbox('_pp_hide_footer',wvr__('Hide Entire Footer'),33,1);


	weaverx_page_checkbox('_pp_hide_page_title',wvr__('Hide Page Title'),33,2);

	echo '<em>Note:</em> the following options work with the default menu - not custom menus.<br>';
	weaverx_page_checkbox('_pp_hide_on_menu',wvr__('Hide Page on the default Primary Menu'),90,1);


	weaverx_page_checkbox('_pp_stay_on_page',wvr__('Menu "Placeholder" page. Useful for top-level menu item - don\'t go anywhere when menu item is clicked.'),90,2);

	weaverx_page_checkbox('_pp_hide_visual_editor',wvr__('Disable Visual Editor for this page. Useful if you enter simple HTML or other code.'),90,1);

	if (weaverx_allow_multisite()) {
		weaverx_page_checkbox('_pp_raw_html',wvr__('Allow Raw HTML and scripts. Disables auto paragraph, texturize, and other processing.'),90,1);
	}

?>
	<p><strong>Sidebars &amp; Widgets</strong></p>

<?php
    weaverx_page_layout();
?>
<br />
    <input type="text" size="4" id="_pp_category" name="_pp_sidebar_width"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_sidebar_width", true)); ?>" />
	<?php echo("% &nbsp;- <em>Sidebar Width</em> - Per Page Sidebar width (applies to all layouts)"); ?> <br /><br />
<?php

	weaverx_page_checkbox('_pp_primary-widget-area',wvr__('Hide Primary Sidebar'),40);
	weaverx_page_checkbox('_pp_secondary-widget-area',wvr__('Hide Secondary Sidebar'),40,1);

	weaverx_page_checkbox('_pp_sitewide-top-widget-area',wvr__('Hide Sitewide Top Area'),40);
	weaverx_page_checkbox('_pp_sitewide-bottom-widget-area',wvr__('Hide Sitewide Bottom Area'),40,1);

    weaverx_page_checkbox('_pp_top-widget-area',wvr__('Hide Pages Top Area'),40);
	weaverx_page_checkbox('_pp_bottom-widget-area',wvr__('Hide Pages Bottom Area'),40,1);
?>

    <p><strong>Widget Area Replacements</strong></p>
    <p>Select extra widget areas to replace the default widget areas for this page.
    You can define extra widget areas on the bottom of the <em>Main Options &rarr; Sidebars &amp; Layout</em> tab.
    </p>
<?php
    weaverx_pp_replacement( 'Primary Sidebar' , 'primary-widget-area' );
    weaverx_pp_replacement( 'Secondary Sidebar' , 'secondary-widget-area' );

    weaverx_pp_replacement( 'Header Widget Area' , 'header-widget-area' );
    weaverx_pp_replacement( 'Footer Widget Area' , 'footer-widget-area' );

    weaverx_pp_replacement( 'Sitewide Top Widget Area' , 'sitewide-top-widget-area' );
    weaverx_pp_replacement( 'Sitewide Bottom Widget Area' , 'sitewide-bottom-widget-area' );

    weaverx_pp_replacement( 'Pages Top Widget Area' , 'page-top-widget-area' );
    weaverx_pp_replacement( 'Pages Bottom Widget Area' , 'page-bottom-widget-area' );
?>
    <br style="clear:both;" /><p><strong>Featured Image</strong></p>
<?php
    $opts3 = array(  'id' => '_pp_fi_location',
        'info' => wvr__('How to display Page FI on this page'),
        'value' => array(
            array('val' => '', 'desc' => wvr__('Default Page FI') ),
            array('val' => 'content-top', 'desc' => wvr__('With Content - top') ),
            array('val' => 'content-bottom', 'desc' => wvr__('With Content - bottom') ),
            array('val' => 'title-before', 'desc' => wvr__('Before Title') ),
            array('val' => 'header-image', 'desc' => wvr__('Header Image Replacement') ),
            array('val' => 'hide', 'desc' => wvr__('Hide FI on this Page') )
            )
        );
    weaverx_pp_select_id($opts3);
?>
<br />
<input type="text" size="30" id='_pp_fi_link' name='_pp_fi_link'
	value="<?php echo esc_textarea(get_post_meta($post->ID, '_pp_fi_link', true)); ?>" />
	<?php echo("<em>Featured Image Link</em> - Full URL for link from FI"); ?>
    <br style="clear:both;" />
    <hr />
	<input type="text" size="15" id="bodyclass" name="_pp_bodyclass"
		value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_bodyclass", true)); ?>" />

	<em>Per Page body Class</em> - CSS class name to add to HTML &lt;body&gt; block. Allows Per Page custom styling.
	<br />
</p>
<p>
	<?php echo('<strong>Settings for "Page with Posts" Template</strong>');
	weaverx_help_link('help.html#PerPostTemplate',wvr__('Help for Page with Posts Template') );

	$template = !empty($post->page_template) ? $post->page_template : "Default Template";
	if ($template == 'paget-posts.php') {
	?>
	<br />
	<?php echo('These settings are optional, and can filter which posts are displayed when you use the "Page
	with Posts" template. The settings will be combined for the final filtered list of posts displayed.
	(If you make mistakes in your settings, it won\'t be apparent until you display the page.)'); ?><br />


	<input type="text" size="30" id="_pp_category" name="_pp_category"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_category", true)); ?>" />
	<?php echo("<em>Category</em> - Enter list of category slugs of posts to include. (-slug will exclude specified category)"); ?> <br />

	<input type="text" size="30" id="_pp_tag" name="_pp_tag"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_tag", true)); ?>" />
	<?php echo("<em>Tags</em> - Enter list of tag slugs of posts to include."); ?> <br />

	<input type="text" size="30" id="_pp_onepost" name="_pp_onepost"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_onepost", true)); ?>" />
	<?php echo("<em>Single Post</em> - Enter post slug of a single post to display."); ?> <br />

	<input type="text" size="30" id="_pp_orderby" name="_pp_orderby"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_orderby", true)); ?>" />
	<?php echo("<em>Order by</em> - Enter method to order posts by: author, date, title, or rand."); ?> <br />

	<input type="text" size="30" id="_pp_sort_order" name="_pp_sort_order"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_sort_order", true)); ?>" />
	<?php echo("<em>Sort order</em> - Enter ASC or DESC for sort order."); ?> <br />

	<input type="text" size="30" id="_pp_posts_per_page" name="_pp_posts_per_page"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_posts_per_page", true)); ?>" />
	<?php echo("<em>Posts per Page</em> - Enter maximum number of posts per page."); ?> <br />

	<input type="text" size="30" id="_pp_author" name="_pp_author"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_author", true)); ?>" />
	<?php echo('<em>Author</em> - Enter author (use username, including spaces), or list of author IDs'); ?> <br />

	<input type="text" size="30" id="_pp_post_type" name="_pp_post_type"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_post_type", true)); ?>" />
	<?php echo('<em>Custom Post Type</em> - Enter slug of one custom post type to display'); ?> <br />

    <?php weaverx_pwp_atw_show_post_filter(); ?>

	<?php weaverx_pwp_type(); ?><br />
	<?php weaverx_pwp_cols(); ?><br />
	<input type="text" size="5" id="_pp_fullposts" name="_pp_fullposts"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_fullposts", true)); ?>" />
	<?php echo("<em>Don't excerpt 1st <em>\"n\"</em> Posts</em> - Display the non-excerpted post for the first \"n\" posts."); ?>
	<br />

	<input type="text" size="5" id="_pp_hide_n_posts" name="_pp_hide_n_posts"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_hide_n_posts", true)); ?>" />
	<?php echo("<em>Hide first \"n\" posts</em> - Start with post n+1.
Useful with plugin that will display first n posts using a shortcode. (e.g., Post slider)"); ?>

	<br /><br />

	<?php weaverx_page_checkbox('_pp_hide_infotop',wvr__('Hide top info line'), 40); ?>
	<?php weaverx_page_checkbox('_pp_hide_infobottom',wvr__('Hide bottom info line'), 40, 1); ?>
    <?php weaverx_page_checkbox('_pp_hide_sticky',wvr__('No special treatment for Sticky Posts'), 40); ?>
</p>
<?php
	} else {	// NOT a page with posts
?>	<p><strong>Note:</strong> After you choose the "Page with Posts" template from the <em>Template</em>
	option in the <em>Page Attributes</em> box, <strong>and</strong> <em>Publish</em> or <em>Save Draft</em>,
	settings for "Page with Posts" will be displayed here. (Current page template: <?php echo $template; ?>)
	</p>
<?php
	}
		do_action('weaverxplus_add_per_page');
?>
	<input type='hidden' id='post_meta' name='post_meta' value='post_meta'/>
	</div>
<?php
}

function weaverx_post_extras() {
	global $post;
	$opts = get_option( apply_filters('weaverx_options','weaverx_settings') , array());	// need to fetch Weaver Xtreme options
	if ( !( current_user_can('edit_themes')
		|| (current_user_can('edit_theme_options') && !isset($opts['_hide_mu_admin_per']))	// multi-site regular admin
		|| (current_user_can('edit_pages') && !isset($opts['_hide_editor_per']))	// Editor
		|| (current_user_can('edit_posts') && !isset($opts['_hide_author_per']))) // Author/Contributor
	   ) {
		echo '<p>Weaver Xtreme Per Post Options not available for your User Role.</p>';
		return;	// don't show per post panel
	   }
?>
<div style="line-height:150%;">
<p>
	<?php
	echo("<strong>Per Post Options</strong>");
	weaverx_help_link('help.html#PerPage', wvr__('Help for Per Post Options'));
	echo '<span style="float:right;">(This Post\'s ID: '; the_ID() ; echo ')</span>';
	weaverx_html_br();
	echo("These settings let you control display of this individual post. Many of these options override global options set on the Weaver Xtreme admin tabs.");
	weaverx_html_br();

    weaverx_page_checkbox('_pp_force_post_excerpt',wvr__('Display post as excerpt'), 40);
	weaverx_page_checkbox('_pp_force_post_full',wvr__('Display as full post where normally excerpted.'),55,1);


	weaverx_page_checkbox('_pp_show_post_avatar',wvr__('Show author avatar with post'),40);
    weaverx_page_checkbox('_show_post_bubble',wvr__('Show the comment bubble'), 40, 1);

	weaverx_page_checkbox('_pp_hide_post_format_label',wvr__('Hide <em>Post Format</em> label'),40);
	weaverx_page_checkbox('_pp_hide_post_title',wvr__('Hide post title'),40,1);

	weaverx_page_checkbox('_pp_hide_top_post_meta',wvr__('Hide top post info line'),40);
	weaverx_page_checkbox('_pp_hide_bottom_post_meta',wvr__('Hide bottom post info line'),40,1);
    weaverx_page_checkbox('_pp_masonry_span2',wvr__('For <em>Masonry</em> multi-columns: make this post span two columns.'),90,1);

    weaverx_page_checkbox('_pp_post_add_link',wvr__('Show a "link to single page" icon at bottom of post - useful with compact posts'),90);


    echo('<br style="clear:both;"/><br /><strong>Per Post Style</strong>' /*a*/ );
	weaverx_help_link('help.html#perpoststyle', wvr__('Help for Per Post Style' /*a*/ ));
    echo("<br />Enter optional per post CSS style rules. <strong>Do not</strong> include the &lt;style> and &lt;/style> tags.
		Include the {}'s. Don't use class names if rules apply to whole post, but do include class names
		(e.g., <em>.entry-title a</em>) for specific elements. Custom styles will not be displayed by the Post Editor."); ?>
            <br />
		<textarea name="_pp_post_style" rows=2 style="width: 95%"><?php echo(get_post_meta($post->ID, "_pp_post_style", true)); ?></textarea>
		<br />
<br />
<p><strong><em>Single Page View:</em> Sidebars</strong></p>

<?php
    weaverx_page_layout('post');
?>
<br />
    <input type="text" size="4" id="_pp_category" name="_pp_sidebar_width"
	value="<?php echo esc_textarea(get_post_meta($post->ID, "_pp_sidebar_width", true)); ?>" />
	<?php echo("% &nbsp;- <em>Sidebar Width</em> - Post Single View Sidebar width (applies to all layouts)"); ?> <br /><br />
<?php

	weaverx_page_checkbox('_pp_primary-widget-area',wvr__('Hide Primary Sidebar, Single View'),40);
	weaverx_page_checkbox('_pp_secondary-widget-area',wvr__('Hide Secondary Sidebar, Single View'),40,1);

	weaverx_page_checkbox('_pp_sitewide-top-widget-area',wvr__('Hide Sitewide Top Area, Single View'),40);
	weaverx_page_checkbox('_pp_sitewide-bottom-widget-area',wvr__('Hide Sitewide Bottom Area, Single View'),40,1);

    weaverx_page_checkbox('_pp_top-widget-area',wvr__('Hide Blog Top Area, Single View'),40);
	weaverx_page_checkbox('_pp_bottom-widget-area',wvr__('Hide Blog Bottom Area, Single View'),40,1);
?>
</p>
<p><strong><em>Single Page View:</em> Widget Area Replacements</strong></p>
    <p>Select extra widget areas to replace the default widget areas for <em>Single Page</em> view of this post.
    You can define extra widget areas on the bottom of the <em>Main Options &rarr; Sidebars &amp; Layout</em> tab.
    </p>
<?php
    weaverx_pp_replacement( 'Primary Sidebar' , 'primary-widget-area' );
    weaverx_pp_replacement( 'Secondary Sidebar' , 'secondary-widget-area' );

    weaverx_pp_replacement( 'Header Widget Area' , 'header-widget-area' );
    weaverx_pp_replacement( 'Footer Widget Area' , 'footer-widget-area' );

    weaverx_pp_replacement( 'Sitewide Top Widget Area' , 'sitewide-top-widget-area' );
    weaverx_pp_replacement( 'Sitewide Bottom Widget Area' , 'sitewide-bottom-widget-area' );
?>
<br style="clear:both;" /><p><strong><em>Single Page View:</em> Featured Image</strong></p>
<?php
    $opts3 = array(  'id' => '_pp_fi_location',
        'info' => wvr__('Override <em>Single Page</em> setting for where to display FI'),
        'value' => array(
            array('val' => '', 'desc' => wvr__('Default Single Page FI') ),
            array('val' => 'content-top', 'desc' => wvr__('With Content - top') ),
            array('val' => 'content-bottom', 'desc' => wvr__('With Content - bottom') ),
            array('val' => 'title-before', 'desc' => wvr__('Before Title') ),
            array('val' => 'header-image', 'desc' => wvr__('Header Image Replacement') ),
            array('val' => 'post-before', 'desc' => wvr__('Outside of Post') ),
            array('val' => 'hide', 'desc' => wvr__('Hide FI on Single Page') )
            )
        );
    weaverx_pp_select_id($opts3);
?>
<br />
<input type="text" size="30" id='_pp_fi_link' name='_pp_fi_link'
	value="<?php echo esc_textarea(get_post_meta($post->ID, '_pp_fi_link', true)); ?>" />
	<?php echo("<em>Featured Image Link</em> - Full URL for link from FI"); ?>
    <br style="clear:both;" />
    </p><p>
    <strong>Post Editor Options</strong>

<?php
	weaverx_page_checkbox('_pp_hide_visual_editor',wvr__('Disable Visual Editor for this page. Useful if you enter simple HTML or other code.'),90,  1);

	if (weaverx_allow_multisite()) {
		weaverx_page_checkbox('_pp_raw_html',wvr__('Allow Raw HTML and scripts. Disables auto paragraph, texturize, and other processing.'),90, 1);
	}
	?>
</p>
<p>
	<?php echo('<strong>Post Format</strong>');
	weaverx_help_link('help.html#gallerypost', wvr__('Help for Per Post Format'));
	weaverx_html_br();
	echo('Weaver Xtreme supports Post Formats. Click the ? for more info.');
	weaverx_html_br();
	weaverx_html_br();

	do_action('weaverxplus_add_per_post'); ?>
</p>
	<input type='hidden' id='post_meta' name='post_meta' value='post_meta'/>
</div>
<?php
}


function weaverx_save_post_fields($post_id) {
	$default_post_fields = array('_pp_category', '_pp_tag', '_pp_onepost', '_pp_orderby', '_pp_sort_order',
	'_pp_author', '_pp_posts_per_page', '_pp_primary-widget-area', '_pp_secondary-widget-area', '_pp_sidebar_width',
	'_pp_top-widget-area','_pp_bottom-widget-area','_pp_sitewide-top-widget-area', '_pp_sitewide-bottom-widget-area',
	'_pp_post_type', '_pp_hide_page_title','_pp_hide_site_title','_pp_hide_menus','_pp_hide_header_image',
	'_pp_hide_footer','_pp_hide_header','_pp_hide_sticky', '_pp_force_post_full','_pp_force_post_excerpt',
	'_pp_show_post_avatar', '_pp_bodyclass', '_pp_fi_link', '_pp_fi_location', '_pp_post_style',
	'_pp_hide_top_post_meta','_pp_hide_bottom_post_meta', '_pp_stay_on_page', '_pp_hide_on_menu', '_pp_show_featured_img',
	'_pp_hide_infotop','_pp_hide_infobottom', '_pp_hide_visual_editor', '_pp_masonry_span2', '_show_post_bubble',
	'_pp_hide_post_title', '_pp_post_add_link', '_pp_hide_post_format_label', '_pp_page_layout', '_pp_wvrx_pwp_type', '_pp_wvrx_pwp_cols', '_pp_post_filter',
	'_pp_hide_page_infobar', '_pp_hide_n_posts','_pp_fullposts', '_pp_pwp_masonry','_pp_pwp_compact','_pp_pwp_compact_posts',
    '_primary-widget-area', '_secondary-widget-area', '_header-widget-area', '_footer-widget-area', '_sitewide-top-widget-area',
    '_sitewide-bottom-widget-area', '_page-top-widget-area', '_page-bottom-widget-area'
	);
if (weaverx_allow_multisite()) {
	array_push($default_post_fields, '_pp_raw_html');
}

	$all_post_fields = $default_post_fields;

	if (isset($_POST['post_meta'])) {
		foreach ($all_post_fields as $post_field) {
            if (isset($_POST[$post_field])) {
                $data = stripslashes($_POST[$post_field]);

                if (get_post_meta($post_id, $post_field) == '') {
                    add_post_meta($post_id, $post_field, weaverx_filter_textarea($data), true);
                }
                else if ($data != get_post_meta($post_id, $post_field, true)) {
                    update_post_meta($post_id, $post_field, weaverx_filter_textarea($data));
                } else if ($data == '') {
                    delete_post_meta($post_id, $post_field, get_post_meta($post_id, $post_field, true));
                }
            } else {
                delete_post_meta($post_id, $post_field, get_post_meta($post_id, $post_field, true));
            }
		}
	}
}

add_action("save_post", "weaverx_save_post_fields");
add_action("publish_post", "weaverx_save_post_fields");
?>
