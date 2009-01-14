<?php
function wpguy_initial_cap($content){
    // Regular Expression, matches a single letter
    // * even if it's inside a link tag.
    $searchfor = '/>(<a [^>]+>)?([^<\s])/';
    // The string we're replacing the letter for
    $replacewith = '>$1<span class="drop">$2</span>';
    // Replace it, but just once (for the very first letter of the post)
    $content = preg_replace($searchfor, $replacewith, $content, 1);
    // Return the result
    return $content;
}
// Add this function to the WordPress hook
add_filter('the_content', 'wpguy_initial_cap');
add_filter('the_excerpt', 'wpguy_initial_cap');
?><?php
/*     Variables     */
@define('CATEGORYTAGGING_VERSION', '2.4'); // Version
@define('CATEGORYTAGGING_BUILD', 1); // Build version
@define('CATEGORYTAGGING_ROOT', get_bloginfo('url') . '/' . PLUGINDIR . '/category-tagging/'); // Category Tagging directory
/*     Category Cloud Function <cattag_tagcloud>     */
function cattag_tagcloud(
	$min_scale = 10,
	$max_scale = 30,
	$min_include = 0,		// The minimum count to include a tag in the cloud. The default is 0 (include all tags).
	$sort_by = 'NAME_ASC',	// NAME_ASC | NAME_DESC | WEIGHT_ASC | WEIGHT_DESC
	$exclude = '',			// Tags to be excluded
	$include = '',			// Only these tags will be considered if you enter one ore more IDs
	$format = '<li><a rel="tag" href="%link%" title="%description% (%count%)" style="font-size:%size%pt">%title%<sub style="font-size:60%; color:#ccc;">%count%</sub></a></li>',
	$notfound = 'No tags found.'
	) {
	##############################################
	# Globals, variables, etc.
	##############################################
	$opt = array();
	$min_scale = (int) $min_scale;
	$max_scale = (int) $max_scale;
	$min_include = (int) $min_include;
	$exclude = preg_replace('/[^0-9,]/', '', $exclude);	// remove everything except 0-9 and comma
	$include = preg_replace('/[^0-9,]/', '', $include);	// remove everything except 0-9 and comma
	##############################################
	# Prepare order
	##############################################
	switch (strtoupper($sort_by)) {
		case 'NAME_DESC':
			$opt['$orderby'] = 'name';
			$opt['$ordertype'] = 'DESC';
	   		break;
		case 'WEIGHT_ASC':
			$opt['$orderby'] = 'count';
			$opt['$ordertype'] = 'ASC';
	   		break;
		case 'WEIGHT_DESC':
			$opt['$orderby'] = 'count';
			$opt['$ordertype'] = 'DESC';
	   		break;
		case 'RANDOM':	// Will be shuffled later 
			$opt['$orderby'] = 'name';
			$opt['$ordertype'] = 'ASC';
	   		break;
		default:	// 'NAME_ASC'
			$opt['$orderby'] = 'name';
			$opt['$ordertype'] = 'ASC';
	}
	##############################################
	# Retrieve categories
	##############################################	
	$catObjectOpt = array('type' => 'post', 'child_of' => 0, 'orderby' => $opt['$orderby'], 'order' => $opt['$ordertype'],
			'hide_empty' => true, 'include_last_update_time' => false, 'hierarchical' => 0, 'exclude' => $exclude, 'include' => $include,
			'number' => '', 'pad_counts' => false);
	$catObject = get_categories($catObjectOpt); // Returns an object of the categories
	##############################################
	# Prepare array
	##############################################
	// Convert object into array
	$catArray = cattag_aux_object_to_array($catObject); 
	// Remove tags
	$helper  = array_keys($catArray);	// for being able to unset 
	foreach( $helper as $cat ) { 
		if ( $catArray[$cat]['category_count'] < $min_include ) {
			unset($catArray[$cat]);
		}
	}
	// Exit if no tag found
	if (count($catArray) == 0) {
		return $notfound;
	}
	##############################################
	# Prepare font scaling
	##############################################
	// Get counts for calculating min and max values
	$countsArr = array();
	foreach( $catArray as $cat ) { $countsArr[] = $cat['category_count']; }
	$count_min = min($countsArr);
	$count_max = max($countsArr);
	// Calculate
	$spread_current = $count_max - $count_min; 
	$spread_default = $max_scale - $min_scale;
	if ($spread_current <= 0) { $spread_current = 1; };
	if ($spread_default <= 0) { $spread_default = 1; }
	$scale_factor = $spread_default / $spread_current;
	##############################################
	# Loop thru the values and create the result
	##############################################
	// Shuffle... -- thanks to Alex <http://www.artsy.ca/archives/159>
	if ( strtoupper($sort_by) == 'RANDOM') {
		$catArray = cattag_aux_shuffle_assoc($catArray);
	}
	$result = '';
	foreach( $catArray as $cat ) {
		// format
		$element_loop = $format;
		// font scaling		
		$final_font = (int) (($cat['category_count'] - $count_min) * $scale_factor + $min_scale);
		// replace identifiers
		$element_loop = str_replace('%link%', get_category_link($cat['cat_ID']), $element_loop);
		$element_loop = str_replace('%title%', $cat['cat_name'], $element_loop);
		$element_loop = str_replace('%description%', $cat['category_description'], $element_loop);
		$element_loop = str_replace('%count%', $cat['category_count'], $element_loop);
		$element_loop = str_replace('%size%', $final_font, $element_loop);
		// result
		$result .= $element_loop . "\n";	
	}
	$result = "\n" . '<!-- Tag Cloud, generated by \'Category Tagging\' plugin - http://blog.bull3t.me.uk/ -->' . "\n" . $result; // Please do not remove this line.
	return $result;
}
/*     Related Posts Function <cattag_related_posts>     */
function cattag_related_posts(
	$order = 'RANDOM',
	$limit = 5,
	$exclude = '',
	$display_posts = true,
	$display_pages = false,	
	$format = '<li><a href="%permalink%" title="%title%">%title%</a></li>',
	$dateformat = 'd.m.y',
	$notfound = '<li>No related posts found.</li>',
	$limit_days = 365
	) {
	##############################################
	# Globals, variables, etc.
	##############################################
	global $wpdb, $post, $wp_version;
	$limit = (int) $limit;
	$exclude = preg_replace('/[^0-9,]/','',$exclude);	// remove everything except 0-9 and comma
	##############################################
	# Prepare selection of posts and pages
	##############################################
	if ( ($display_posts === true) AND ($display_pages === true) ) {
		// Display both posts and pages
		$poststatus = "IN('publish', 'static')";
	} elseif ( ($display_posts === true) AND ($display_pages === false) ) {
		// Display posts only
		$poststatus = "= 'publish'";
	} elseif ( ($display_posts === false) AND ($display_pages === true) ) {
		// Display pages only
		$poststatus = "= 'static'";
	} else {
		// Nothing can be displayed
		return $notfound;
	}
	##############################################
	# Prepare exlusion of categories
	##############################################	
	$exclude_ids_sql = ($exclude == '') ? '' : 'AND post2cat.category_id NOT IN(' . $exclude . ')';
	##############################################
	# Put the category IDs into a comma-separated string
	##############################################
	$catsList = '';
	$count = 0;
	foreach((get_the_category()) as $loop_cat) { 
		// Add category id to list
		$catsList .= ( $catsList == '' ) ? $loop_cat->cat_ID : ',' . $loop_cat->cat_ID;
	}
	##############################################
	# Prepare order
	##############################################
	switch (strtoupper($order)) {
		case 'RANDOM':
			$order_by = 'RAND()';
			break;
		default:	// 'DATE_DESC'
			$order_by = 'posts.post_date DESC';
	}
	##############################################
	# Set limit of posting date. 86400 seconds = 1 day
	##############################################
	$timelimit = '';
	if ($limit_days != 0) $timelimit = 'AND posts.post_date > ' . date('YmdHis', time() - $limit_days*86400);
	##############################################
 	# SQL query. DISTINCT is here for getting a unique result without duplicates
	##############################################
	// since we support >= WP 2.1 only, stuff like AND posts.post_date < '" . current_time('mysql') . "'
	// is not necessary as future posts now gain the post_status of 'future' 
	if ($wp_version < "2.3") {
		// check wp version - if lower than 2.3 use old database format of 'categories' and 'post2cat'
		$queryresult = $wpdb->get_results("SELECT DISTINCT posts.ID, posts.post_title, posts.post_date, posts.comment_count
								FROM $wpdb->posts posts, $wpdb->post2cat post2cat
								WHERE posts.ID <> $post->ID
								AND posts.post_status $poststatus
								AND posts.ID = post2cat.post_id
								AND post2cat.category_id IN($catsList)
								$timelimit
								$exclude_ids_sql
								ORDER BY $order_by 
								LIMIT $limit
								");
	} else {
		// check wp version - if higher than 2.3 change to new database format of 'terms'
		$queryresult = $wpdb->get_results("SELECT DISTINCT posts.ID, posts.post_title, posts.post_date, posts.comment_count
								FROM $wpdb->posts posts, $wpdb->term_relationships term_relationships, $wpdb->term_taxonomy term_taxonomy
								WHERE posts.ID <> $post->ID
								AND posts.post_status $poststatus
								AND posts.ID = term_relationships.object_id
								AND term_relationships.term_taxonomy_id = term_taxonomy.term_taxonomy_id
								AND term_taxonomy.term_id IN($catsList)
								$timelimit
								$exclude_ids_sql
								ORDER BY $order_by 
								LIMIT $limit
								");
	}
	##############################################
	// Return the related posts
	##############################################
	$result = '';
	if (count($queryresult) > 0) {
		foreach($queryresult as $tag_loop) {
			// Date of post
			$loop_postdate = mysql2date($dateformat, $tag_loop->post_date);
			// Get format
			$element_loop = $format;
			// Replace identifiers
			$element_loop = str_replace('%date%', $loop_postdate, $element_loop);
			$element_loop = str_replace('%permalink%', get_permalink($tag_loop->ID), $element_loop);
			$element_loop = str_replace('%title%', $tag_loop->post_title, $element_loop);
			$element_loop = str_replace('%commentcount%', $tag_loop->comment_count, $element_loop);
			// Add to list
			$result .= $element_loop . "\n";
		}
		$result = "\n" . '<!-- Related Posts, generated by \'Category Tagging\' plugin - http://blog.bull3t.me.uk/ -->' . "\n" . $result; // Please do not remove this line.
		return $result;
	} else {
		return $notfound;
	}

}
################################################################################
# Additional functions
################################################################################
function cattag_aux_object_to_array($obj) {
	// dumps all the object properties and its associations recursively into an array
	// Source: http://de3.php.net/manual/de/function.get-object-vars.php#62470
       $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
       foreach ($_arr as $key => $val) {
               $val = (is_array($val) || is_object($val)) ? cattag_aux_object_to_array($val) : $val;
               $arr[$key] = $val;
       }
       return $arr;
}
function cattag_aux_shuffle_assoc($input_array) {
	   if(!is_array($input_array) or !count($input_array))
	       return null;
	   $randomized_keys = array_rand($input_array, count($input_array));
	   $output_array = array();
	   foreach($randomized_keys as $current_key) {
	       $output_array[$current_key] = $input_array[$current_key];
	       unset($input_array[$current_key]);
	   }
	   return $output_array;
}
?><?php
/**
* OPTIONS:
*
* breadcrumb() specific:
* sep, before, after, last, echo
*
* global:
* home_always, home_never, home_title
* link_all, link_none
*/
// Default breadcrumb filters.
add_filter("get_breadcrumb", "get_breadcrumb_home", 1, 2);
add_filter("get_breadcrumb", "get_breadcrumb_category", 5, 2);
add_filter("get_breadcrumb", "get_breadcrumb_page", 5, 2);
add_filter("get_breadcrumb", "get_breadcrumb_single", 5, 2);
add_filter("get_breadcrumb", "get_breadcrumb_date", 5, 2);
add_filter("get_breadcrumb", "get_breadcrumb_author", 5, 2);
add_filter("get_breadcrumb", "get_breadcrumb_search", 5, 2);
add_filter("get_breadcrumb", "get_breadcrumb_404", 5, 2);
add_filter("get_breadcrumb", "get_breadcrumb_paged", 5, 2);
/**
* @return bool
*/
function has_breadcrumb()
{
  global $wp_query;
  if (!$wp_query->is_home)
    return true;
  if (breadcrumb_is_paged())
    return true;
  return false;
}
/**
* @return bool
*/
function breadcrumb_is_paged()
{
  global $wp_query;
  return ((($page = $wp_query->get("paged")) || ($page = $wp_query->get("page"))) && $page > 1);
}
/**
* @param string Text to put inbetween crumbs. OR options in the format of key1=value1&key2=value2&key3=value3 and so on. If this is used, other params are ignored.
* @param string Text to put infront of a crumb.
* @param string Text to put behind a crumb.
* @param string Text to put infront of the current crumb (last crumb in the list, the users current location).
* @return string
*/
function breadcrumb($sep = "&raquo;", $before = "", $after = "", $last = "")
{
  global $wp_query;
  // Did the user use options?
  $options    = $sep;
  $echo       = false;
  $breadcrumb = array();
  parse_str($options, $params);
  if (count($params))
  {
    $sep    = isset($params["sep"]) ? $params["sep"] : "&raquo;";
    $before = isset($params["before"]) ? stripslashes($params["before"]) : "";
    $after  = isset($params["after"]) ? stripslashes($params["after"]) : "";
    $last   = isset($params["last"]) ? stripslashes($params["last"]) : "";
    $echo   = isset($params["echo"]) ? $params["echo"] : true;
  }
  else
  {
    $options = "";
  }
  $breadcrumb = get_breadcrumb($options);
  $count      = count($breadcrumb);
  for($i = 0; $i < $count; $i++)
  {
    if (!$last || ($i+1) < $count)
      $breadcrumb[$i] = $before . $breadcrumb[$i] . $after;
    else
      $breadcrumb[$i] = $last . $breadcrumb[$i] . $after;
  }
  $breadcrumb = implode(" ".$sep." ", $breadcrumb);
  if ($echo)
    print $breadcrumb;
  else
    return $breadcrumb;
}
/**
* Displays the breadcrumb for browser title use.
*/
function breadcrumb_title()
{
  breadcrumb("always_home=true&link_none=true&home_title=".bloginfo("name"));
}
/**
* @param string   Options in the format of key1=value1&key2=value2&key3=value3 and so on.
* @return array
*/
function get_breadcrumb($options = "")
{
  parse_str($options, $params);
  // Set defaults if no param specified.
  $params["link_all"]     = isset($params["link_all"]) ? $params["link_all"] : false;
  $params["link_none"]    = isset($params["link_none"]) ? $params["link_none"] : false;
  $params["home_always"]  = isset($params["home_always"]) ? $params["home_always"] : false;
  $params["home_never"]   = isset($params["home_never"]) ? $params["home_never"] : false;
  $params["home_title"]   = isset($params["home_title"]) ? $params["home_title"] : __("Home");
  $breadcrumb = array();
  $breadcrumb = apply_filters("get_breadcrumb", $breadcrumb, $params);
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_home($breadcrumb, $params)
{
  if ($params["home_never"])
    return $breadcrumb;
  global $wp_query;
  if (has_breadcrumb() || $params["home_always"])
  {
    if ((has_breadcrumb() || $params["link_all"]) && !$params["link_none"])
      $breadcrumb[] = '<a href="'.get_settings("home").'" title="'.get_settings("name").'">'.$params["home_title"].'</a>';
    else
      $breadcrumb[] = $params["home_title"];
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_category($breadcrumb, $params)
{
  global $wp_query;
  if ($wp_query->is_category)
  {
    $object = $wp_query->get_queried_object();
    // Parents.
    $parent_id  = $object->category_parent;
    $parents    = array();
    while ($parent_id)
    {
      $category   = get_category($parent_id);
      if ($params["link_none"])
        $parents[]  = $category->cat_name;
      else
        $parents[]  = '<a href="'.get_category_link($category->cat_ID).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a>';
      $parent_id  = $category->category_parent;
    }
    // Parents were retrieved in reverse order.
    $parents    = array_reverse($parents);
    $breadcrumb = array_merge($breadcrumb, $parents);
    // Current category.
    if ((breadcrumb_is_paged() || $params["link_all"]) && !$params["link_none"])
      $breadcrumb[] = '<a href="'.get_category_link($object->cat_ID).'" title="'.$object->cat_name.'">'.$object->cat_name.'</a>';
    else
      $breadcrumb[] = $object->cat_name;
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_page($breadcrumb, $params)
{
  global $wp_query;
  if ($wp_query->is_page)
  {
    $object = $wp_query->get_queried_object();
    // Parents.
    $parent_id  = $object->post_parent;
    $parents    = array();
    while ($parent_id)
    {
      $page       = get_page($parent_id);
      if ($params["link_none"])
        $parents[]  = get_the_title($page->ID);
      else
        $parents[]  = '<a href="'.get_permalink($page->ID).'" title="'.get_the_title($page->ID).'">'.get_the_title($page->ID).'</a>';
      $parent_id  = $page->post_parent;
    }
    // Parents are in reverse order.
    $parents    = array_reverse($parents);
    $breadcrumb = array_merge($breadcrumb, $parents);
    // Current page.
    if ((breadcrumb_is_paged() || $params["link_all"]) && !$params["link_none"])
      $breadcrumb[] = '<a href="'.get_permalink($object->ID).'" title="'.get_the_title($object->ID).'">'.get_the_title($object->ID).'</a>';
    else
      $breadcrumb[] = get_the_title($object->ID);
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_single($breadcrumb, $params)
{
  global $wp_query;
  if ($wp_query->is_single)
  {
    $object = $wp_query->get_queried_object();
    if ((breadcrumb_is_paged() || $params["link_all"]) && !$params["link_none"])
      $breadcrumb[] = '<a href="'.get_permalink($object->ID).'" title="'.get_the_title($object->ID).'">'.get_the_title($object->ID).'</a>';
    else
      $breadcrumb[] = get_the_title($object->ID);
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_date($breadcrumb, $params)
{
  global $wp_query, $year, $monthnum, $month, $day;
  if ($wp_query->is_date)
  {
    // Year
    if ($wp_query->is_year || $wp_query->is_month || $wp_query->is_day)
    {
      if ($params["link_none"] || ($wp_query->is_year && !breadcrumb_is_paged() && !$params["link_all"]))
        $breadcrumb[] = $year;
      else
        $breadcrumb[] = '<a href="'.get_year_link($year).'" title="'.$year.'">'.$year.'</a>';
    }
    // Month.
    if ($wp_query->is_month || $wp_query->is_day)
    {
      $monthname = $month[zeroise($monthnum, 2)];
      if ($params["link_none"] || ($wp_query->is_month && !breadcrumb_is_paged() && !$params["link_all"]))
        $breadcrumb[] = $monthname;
      else
        $breadcrumb[] = '<a href="'.get_month_link($year, $monthnum).'" title="'.$monthname.'">'.$monthname.'</a>';
    }
    // Day.
    if ($wp_query->is_day)
    {
      if ($params["link_none"] || (!breadcrumb_is_paged() && !$params["link_all"]))
        $breadcrumb[] = $day;
      else
        $breadcrumb[] = '<a href="'.get_day_link($year, $monthnum, $day).'" title="'.$day.'">'.$day.'</a>';
    }
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_author($breadcrumb, $params)
{
  global $wp_query;
  if (is_author())
  {
    $object = $wp_query->get_queried_object();
    if ($params["link_all"] || (breadcrumb_is_paged() && !$params["link_none"]))
      $breadcrumb[] = '<a href="'.$_SERVER["REQUEST_URI"].'" title="'.$object->display_name.'">'.$object->display_name.'</a>';
    else
      $breadcrumb[] = $object->display_name;
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_search($breadcrumb, $params)
{
  global $wp_query;
  if (is_search())
  {
    if ((!breadcrumb_is_paged() && !$params["link_all"]) || $params["link_none"])
      $breadcrumb[] = get_breadcrumb_search_phrase();
    else
      $breadcrumb[] = '<a href="'.get_settings("home").'?s='.get_breadcrumb_search_uri().'" title="Search">'.get_breadcrumb_search_phrase().'</a>';
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_404($breadcrumb, $params)
{
  global $wp_query;
  if ($wp_query->is_404)
  {
    if ($params["link_all"])
      $breadcrumb[] = '<a href="'.$_SERVER["REQUEST_URI"].'" title="404">404</a>';
    else
      $breadcrumb[] = "404";
  }
  return $breadcrumb;
}
/**
* @param array
* @param array
* @return array
*/
function get_breadcrumb_paged($breadcrumb, $params)
{
  global $wp_query;
  if ((($page = $wp_query->get("paged")) || ($page = $wp_query->get("page"))) && $page > 1)
  {
    if ($params["link_all"])
      $breadcrumb[] = '<a href="'.$_SERVER["REQUEST_URI"].'" title="Page "'.$page.'">Page '.$page.'</a>';
    else
      $breadcrumb[] = __("Page ").$page;
  }   
  return $breadcrumb;
}
/**
* @return string
*/
function get_breadcrumb_search_phrase()
{
  return htmlentities(stripslashes($_GET["s"]), ENT_QUOTES);
}
/**
* @return string
*/
function get_breadcrumb_search_uri()
{
  return htmlentities(rawurlencode(stripslashes($_GET["s"])), ENT_QUOTES);
}
?><?php
function fb_replace_wp_version() {
	if ( !is_admin() ) {
		global $wp_version;
		// random value
		$v = intval( rand(0, 9999) );
		if ( function_exists('the_generator') ) {
			// eliminate version for wordpress >= 2.4
			add_filter( 'the_generator', create_function('$a', "return null;") );
			// add_filter( 'wp_generator_type', create_function( '$a', "return null;" ) );
			// for $wp_version and db_version
			$wp_version = $v;
		} else {
			// for wordpress < 2.4
			add_filter( "bloginfo_rss('version')", create_function('$a', "return $v;") );
			// for rdf and rss v0.92
			$wp_version = $v;
		}
	}
}
if ( function_exists('add_action') ) {
	add_action('init', fb_replace_wp_version, 1);
}
?><?php
// Recent Comments with Gravatars
function recent_cmts($num) {
	global $wpdb;
	$query = ("SELECT ID, post_title, comment_author, comment_id, comment_author_email, comment_date, comment_post_ID FROM  $wpdb->posts, $wpdb->comments WHERE $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND $wpdb->comments.comment_approved = '1' AND $wpdb->comments.comment_type = '' AND comment_author != '' ORDER BY $wpdb->comments.comment_date DESC LIMIT $num");
	$result = mysql_query($query);
		while ($data = mysql_fetch_row($result)) {
		echo '<li class="recent-cmts">';
			echo '<img style="float:right; margin-left: 5px; padding: 3px; background:#ccc;" src="http://www.gravatar.com/avatar.php?gravatar_id=';
			echo md5($data[4]);
			echo '&amp;size=24&amp;default=';
			echo bloginfo('template_url');
			echo '/images/24.gif';
			echo '" alt="';
			echo $data[2];
			echo '&#39;s Gravatar" height="24" width="24" class="right" />';
			echo '<div style="margin-left:5px;"><a href="';
			echo get_permalink($data[0]);
			echo "#comment-$data[3]";
			echo '" title="';
			echo 'commented on &raquo; ';
			echo $data[1];
			echo '">';
			echo $data[2];
			echo '</a><br /><small>';
			echo $data[5];
			echo '</small></div>';
		echo '</li>';
		}
	}
?><?php
function gte_random_posts (){
global $wpdb, $post;
$current_title = get_the_title();
$randompostthis = $wpdb->get_results("SELECT $wpdb->posts.ID, post_title, post_name, post_date, post_type, post_status FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_title != '$current_title' ORDER BY RAND() limit 5");
foreach ($randompostthis as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
echo "<li><a href=\"".get_permalink()."\">$post_title</a></li>";
}
}
function gte_recent_updated_posts(){
global $wpdb, $post;
$recentupdatethis = $wpdb->get_results("SELECT $wpdb->posts.ID, post_title, post_name, post_date, post_type, post_status, post_modified FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER by post_modified_gmt DESC limit 5");
foreach ($recentupdatethis as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
echo "<li><a href=\"".get_permalink()."\">$post_title</a></li>";
}
}
function get_hottopics($limit = 10) {
    global $wpdb, $post;
    $mostcommenteds = $wpdb->get_results("SELECT  $wpdb->posts.ID, post_title, post_name, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'comment_total' FROM $wpdb->posts LEFT JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date_gmt < '".gmdate("Y-m-d H:i:s")."' AND post_status = 'publish' AND post_password = '' GROUP BY $wpdb->comments.comment_post_ID ORDER  BY comment_total DESC LIMIT $limit");
    foreach ($mostcommenteds as $post) {
			$post_title = htmlspecialchars(stripslashes($post->post_title));
			$comment_total = (int) $post->comment_total;
			echo "<li><a href=\"".get_permalink()."\">$post_title&nbsp;<strong>($comment_total)</strong></a></li>";
    }
}
function widget_mypopulartopic() {
?>
<?php if(function_exists("akpc_most_popular")) : ?>
<h3><?php _e('Most Popular'); ?></h3>
<ul class="list">
<?php akpc_most_popular(); ?>
</ul>
<?php endif; ?>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Popular Post'), 'widget_mypopulartopic');
function widget_myhottopic() {
?>
<?php if(function_exists("get_hottopics")) : ?>
<h3><?php _e('Most Comments'); ?></h3>
<ul class="list">
<?php get_hottopics(); ?>
</ul>
<?php endif; ?>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Most Comments'), 'widget_myhottopic');
function widget_myrecentcoms() {
?>
<h3><?php _e('Recent Comments'); ?></h3>
<ul class="list">
<?php if(function_exists("get_recent_comments")) : ?>
<?php get_recent_comments(); ?>
<?php else : ?>
<?php mw_recent_comments(10, false, 55, 35, 35, 'all', '<li><a href="%permalink%" title="%title%">%author_name%</a>&nbsp;in&nbsp;%title%</li>','d.m.y, H:i'); ?>
<?php endif; ?>
</ul>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Recent Comments'), 'widget_myrecentcoms');
?><?php
remove_action('wp_head', 'rsd_link'); 
remove_action('wp_head', 'wlwmanifest_link');
?><?php
function get_flickrRSS() {
	// the function can accept up to seven parameters, otherwise it uses option panel defaults 	
  	for($i = 0 ; $i < func_num_args(); $i++) {
    	$args[] = func_get_arg($i);
    	}
  	if (!isset($args[0])) $num_items = get_option('flickrRSS_display_numitems'); else $num_items = $args[0];
  	if (!isset($args[1])) $type = get_option('flickrRSS_display_type'); else $type = $args[1];
  	if (!isset($args[2])) $tags = trim(get_option('flickrRSS_tags')); else $tags = trim($args[2]);
  	if (!isset($args[3])) $imagesize = get_option('flickrRSS_display_imagesize'); else $imagesize = $args[3];
  	if (!isset($args[4])) $before_image = stripslashes(get_option('flickrRSS_before')); else $before_image = $args[4];
  	if (!isset($args[5])) $after_image = stripslashes(get_option('flickrRSS_after')); else $after_image = $args[5];
  	if (!isset($args[6])) $id_number = stripslashes(get_option('flickrRSS_flickrid')); else $id_number = $args[6];
  	if (!isset($args[7])) $set_id = stripslashes(get_option('flickrRSS_set')); else $set_id = $args[7];
	# use image cache & set location
	$useImageCache = get_option('flickrRSS_use_image_cache');
	$cachePath = get_option('flickrRSS_image_cache_uri');
	$fullPath = get_option('flickrRSS_image_cache_dest'); 
	if (!function_exists('MagpieRSS')) { // Check if another plugin is using RSS, may not work
		include_once (ABSPATH . WPINC . '/rss.php');
		error_reporting(E_ERROR);
	}
	// get the feeds
	if ($type == "user") { $rss_url = 'http://api.flickr.com/services/feeds/photos_public.gne?id=' . $id_number . '&tags=' . $tags . '&format=rss_200'; }
	elseif ($type == "favorite") { $rss_url = 'http://api.flickr.com/services/feeds/photos_faves.gne?id=' . $id_number . '&format=rss_200'; }
	elseif ($type == "set") { $rss_url = 'http://api.flickr.com/services/feeds/photoset.gne?set=' . $set_id . '&nsid=' . $id_number . '&format=rss_200'; }
	elseif ($type == "group") { $rss_url = 'http://api.flickr.com/services/feeds/groups_pool.gne?id=' . $id_number . '&format=rss_200'; }
	elseif ($type == "community" || $type == "public") { $rss_url = 'http://api.flickr.com/services/feeds/photos_public.gne?tags=' . $tags . '&format=rss_200'; }
	else { print "flickrRSS probably needs to be setup"; }
	# get rss file
	$rss = @ fetch_rss($rss_url);
	if ($rss) {
    	$imgurl = "";
    	# specifies number of pictures
		$items = array_slice($rss->items, 0, $num_items);
	    # builds html from array
    	foreach ( $items as $item ) {
       	 if(preg_match('<img src="([^"]*)" [^/]*/>', $item['description'],$imgUrlMatches)) {
            	$imgurl = $imgUrlMatches[1];
            #change image size         
           	if ($imagesize == "square") {
             	$imgurl = str_replace("m.jpg", "s.jpg", $imgurl);
           	} elseif ($imagesize == "thumbnail") {
             $imgurl = str_replace("m.jpg", "t.jpg", $imgurl);
           	} elseif ($imagesize == "medium") {
             $imgurl = str_replace("_m.jpg", ".jpg", $imgurl);
           	}
           #check if there is an image title (for html validation purposes)
           if($item['title'] !== "") $title = htmlspecialchars(stripslashes($item['title']));
           else $title = "Flickr photo";          
           $url = $item['link'];
	       preg_match('<http://farm[0-9]{0,3}\.static.flickr\.com/\d+?\/([^.]*)\.jpg>', $imgurl, $flickrSlugMatches);
	       $flickrSlug = $flickrSlugMatches[1];
	       # cache images 
	       if ($useImageCache) {   
               # check if file already exists in cache
               # if not, grab a copy of it
               if (!file_exists("$fullPath$flickrSlug.jpg")) {   
                 if ( function_exists('curl_init') ) { // check for CURL, if not use fopen
                    $curl = curl_init();
                    $localimage = fopen("$fullPath$flickrSlug.jpg", "wb");
                    curl_setopt($curl, CURLOPT_URL, $imgurl);
                    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
                    curl_setopt($curl, CURLOPT_FILE, $localimage);
                    curl_exec($curl);
                    curl_close($curl);
                   } else {
                 	$filedata = "";
                    $remoteimage = fopen($imgurl, 'rb');
                  	if ($remoteimage) {
                    	 while(!feof($remoteimage)) {
                         	$filedata.= fread($remoteimage,1024*8);
                       	 }
                  	}
                	fclose($remoteimage);
                	$localimage = fopen("$fullPath$flickrSlug.jpg", 'wb');
                	fwrite($localimage,$filedata);
                	fclose($localimage);
                 } // end CURL check
                } // end file check
                # use cached image
                print $before_image . "<a href=\"$url\" title=\"$title\"><img src=\"$cachePath$flickrSlug.jpg\" alt=\"$title\" /></a>" . $after_image;
            } else {
                # grab image direct from flickr
                print $before_image . "<a href=\"$url\" title=\"$title\"><img src=\"$imgurl\" alt=\"$title\" /></a>" . $after_image;      
            } // end use imageCache
       } // end pregmatch
     } // end foreach
  } // end if($rss)
} # end get_flickrRSS() function
function widget_flickrRSS_init() {
	if (!function_exists('register_sidebar_widget')) return;
	function widget_flickrRSS($args) {
		extract($args);
		$options = get_option('widget_flickrRSS');
		$title = $options['title'];
		$before_images = $options['before_images'];
		$after_images = $options['after_images'];
		echo $before_widget . $before_title . $title . $after_title . $before_images;
		get_flickrRSS();
		echo $after_images . $after_widget;
	}
	function widget_flickrRSS_control() {
		$options = get_option('widget_flickrRSS');
		if ( $_POST['flickrRSS-submit'] ) {
			$options['title'] = strip_tags(stripslashes($_POST['flickrRSS-title']));
			$options['before_images'] = $_POST['flickrRSS-beforeimages'];
			$options['after_images'] = $_POST['flickrRSS-afterimages'];
			update_option('widget_flickrRSS', $options);
		}
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$before_images = htmlspecialchars($options['before_images'], ENT_QUOTES);
		$after_images = htmlspecialchars($options['after_images'], ENT_QUOTES);
		echo '<p style="text-align:right;"><label for="flickrRSS-title">Title: <input style="width: 180px;" id="gsearch-title" name="flickrRSS-title" type="text" value="'.$title.'" /></label></p>';
		echo '<p style="text-align:right;"><label for="flickrRSS-beforeimages">Before all images: <input style="width: 180px;" id="flickrRSS-beforeimages" name="flickrRSS-beforeimages" type="text" value="'.$before_images.'" /></label></p>';
		echo '<p style="text-align:right;"><label for="flickrRSS-afterimages">After all images: <input style="width: 180px;" id="flickrRSS-afterimages" name="flickrRSS-afterimages" type="text" value="'.$after_images.'" /></label></p>';
		echo '<input type="hidden" id="flickrRSS-submit" name="flickrRSS-submit" value="1" />';
	}		
	register_sidebar_widget('flickrRSS', 'widget_flickrRSS');
	register_widget_control('flickrRSS', 'widget_flickrRSS_control', 300, 100);
}
function flickrRSS_subpanel() {
     if (isset($_POST['save_flickrRSS_settings'])) {
       $option_flickrid = $_POST['flickr_id'];
       $option_tags = $_POST['tags'];
       $option_set = $_POST['set'];
       $option_display_type = $_POST['display_type'];
       $option_display_numitems = $_POST['display_numitems'];
       $option_display_imagesize = $_POST['display_imagesize'];
       $option_before = $_POST['before_image'];
       $option_after = $_POST['after_image'];
       $option_useimagecache = $_POST['use_image_cache'];
       $option_imagecacheuri = $_POST['image_cache_uri'];
       $option_imagecachedest = $_POST['image_cache_dest'];
       update_option('flickrRSS_flickrid', $option_flickrid);
       update_option('flickrRSS_tags', $option_tags);
       update_option('flickrRSS_set', $option_set);
       update_option('flickrRSS_display_type', $option_display_type);
       update_option('flickrRSS_display_numitems', $option_display_numitems);
       update_option('flickrRSS_display_imagesize', $option_display_imagesize);
       update_option('flickrRSS_before', $option_before);
       update_option('flickrRSS_after', $option_after);
       update_option('flickrRSS_use_image_cache', $option_useimagecache);
       update_option('flickrRSS_image_cache_uri', $option_imagecacheuri);
       update_option('flickrRSS_image_cache_dest', $option_imagecachedest);
       ?> <div class="updated"><p>flickrRSS settings saved</p></div> <?php
     }
	?>
	<div class="wrap">
		<h2>flickrRSS Settings</h2>
		<form method="post">
		<table class="form-table">
		 <tr valign="top">
		  <th scope="row">ID Number</th>
	      <td><input name="flickr_id" type="text" id="flickr_id" value="<?php echo get_option('flickrRSS_flickrid'); ?>" size="20" />
        		Use the <a href="http://idgettr.com">idGettr</a> to find your user or group id.</p></td>
         </tr>
         <tr valign="top">
          <th scope="row">Display</th>
          <td>
        	<select name="display_type" id="display_type">
        	  <option <?php if(get_option('flickrRSS_display_type') == 'user') { echo 'selected'; } ?> value="user">user</option>
        	  <option <?php if(get_option('flickrRSS_display_type') == 'set') { echo 'selected'; } ?> value="set">set</option>
        	  <option <?php if(get_option('flickrRSS_display_type') == 'favorite') { echo 'selected'; } ?> value="favorite">favorite</option>
		      <option <?php if(get_option('flickrRSS_display_type') == 'group') { echo 'selected'; } ?> value="group">group</option>
		      <option <?php if(get_option('flickrRSS_display_type') == 'community') { echo 'selected'; } ?> value="community">community</option>
		    </select>
		 	items using 
        	<select name="display_numitems" id="display_numitems">
		      <option <?php if(get_option('flickrRSS_display_numitems') == '1') { echo 'selected'; } ?> value="1">1</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '2') { echo 'selected'; } ?> value="2">2</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '3') { echo 'selected'; } ?> value="3">3</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '4') { echo 'selected'; } ?> value="4">4</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '5') { echo 'selected'; } ?> value="5">5</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '6') { echo 'selected'; } ?> value="6">6</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '7') { echo 'selected'; } ?> value="7">7</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '8') { echo 'selected'; } ?> value="8">8</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '9') { echo 'selected'; } ?> value="9">9</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '10') { echo 'selected'; } ?> value="10">10</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '11') { echo 'selected'; } ?> value="11">11</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '12') { echo 'selected'; } ?> value="12">12</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '13') { echo 'selected'; } ?> value="13">13</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '14') { echo 'selected'; } ?> value="14">14</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '15') { echo 'selected'; } ?> value="15">15</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '16') { echo 'selected'; } ?> value="16">16</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '17') { echo 'selected'; } ?> value="17">17</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '18') { echo 'selected'; } ?> value="18">18</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '19') { echo 'selected'; } ?> value="19">19</option>
		      <option <?php if(get_option('flickrRSS_display_numitems') == '20') { echo 'selected'; } ?> value="20">20</option>
		      </select>
            <select name="display_imagesize" id="display_imagesize">
		      <option <?php if(get_option('flickrRSS_display_imagesize') == 'square') { echo 'selected'; } ?> value="square">square</option>
		      <option <?php if(get_option('flickrRSS_display_imagesize') == 'thumbnail') { echo 'selected'; } ?> value="thumbnail">thumbnail</option>
		      <option <?php if(get_option('flickrRSS_display_imagesize') == 'small') { echo 'selected'; } ?> value="small">small</option>
		      <option <?php if(get_option('flickrRSS_display_imagesize') == 'medium') { echo 'selected'; } ?> value="medium">medium</option>
		    </select>
            images</p>
           </td> 
         </tr>
         <tr valign="top">
		  <th scope="row">Set</th>
          <td><input name="set" type="text" id="set" value="<?php echo get_option('flickrRSS_set'); ?>" size="40" /> Use number from the set url</p>
         </tr>
         <tr valign="top">
		  <th scope="row">Tags</th>
          <td><input name="tags" type="text" id="tags" value="<?php echo get_option('flickrRSS_tags'); ?>" size="40" /> Comma separated, no spaces</p>
         </tr>
         <tr valign="top">
          <th scope="row">HTML Wrapper</th>
          <td><label for="before_image">Before Image:</label> <input name="before_image" type="text" id="before_image" value="<?php echo htmlspecialchars(stripslashes(get_option('flickrRSS_before'))); ?>" size="10" />
        	  <label for="after_image">After Image:</label> <input name="after_image" type="text" id="after_image" value="<?php echo htmlspecialchars(stripslashes(get_option('flickrRSS_after'))); ?>" size="10" />
          </td>
         </tr>
         </table>      
        <h3>Cache Settings</h3>
		<p>This allows you to store the images on your server and reduce the load on Flickr. Make sure the plugin works without the cache enabled first. If you're still having
		trouble, try visiting the <a href="http://eightface.com/forum/viewforum.php?id=3">forum</a>.</p>
		<table class="form-table">
         <tr valign="top">
          <th scope="row">URL</th>
          <td><input name="image_cache_uri" type="text" id="image_cache_uri" value="<?php echo get_option('flickrRSS_image_cache_uri'); ?>" size="50" />
          <em>http://yoursite.com/cache/</em></td>
         </tr>
         <tr valign="top">
          <th scope="row">Full Path</th>
          <td><input name="image_cache_dest" type="text" id="image_cache_dest" value="<?php echo get_option('flickrRSS_image_cache_dest'); ?>" size="50" /> 
          <em>/home/path/to/wp-content/flickrrss/cache/</em></td>
         </tr>
		 <tr valign="top">
		  <th scope="row" colspan="2" class="th-full">
		  <input name="use_image_cache" type="checkbox" id="use_image_cache" value="true" <?php if(get_option('flickrRSS_use_image_cache') == 'true') { echo 'checked="checked"'; } ?> />  
		  <label for="use_image_cache">Enable the image cache</label></th>
		 </tr>
        </table>
        <div class="submit">
           <input type="submit" name="save_flickrRSS_settings" value="<?php _e('Save Settings', 'save_flickrRSS_settings') ?>" />
        </div>
        </form>
    </div>
<?php } // end flickrRSS_subpanel()
function flickrRSS_admin_menu() {
   if (function_exists('add_options_page')) {
        add_options_page('flickrRSS Settings', 'flickrRSS', 8, basename(__FILE__), 'flickrRSS_subpanel');
        }
}
add_action('admin_menu', 'flickrRSS_admin_menu'); 
add_action('plugins_loaded', 'widget_flickrRSS_init');
?><?php
function wp_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '<strong>&laquo;</strong>';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '<strong>&raquo;</strong>';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);		
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before <div class='Nav'><span>Pages ($max_page): </span>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'">&laquo; First</a> ... ';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo "<strong class='on'>$i</strong>";
					} else {
						echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo ' ... <a href="'.get_pagenum_link($max_page).'">Last &raquo;</a>';
			}
			echo "</div> $after";
		}
	}
}
?><?php
define('MAGPIE_CACHE_AGE', 120);
define('MAGPIE_INPUT_ENCODING', 'UTF-8');
$twitter_options['widget_fields']['title'] = array('label'=>'Title:', 'type'=>'text', 'default'=>'');
$twitter_options['widget_fields']['username'] = array('label'=>'Username:', 'type'=>'text', 'default'=>'');
$twitter_options['widget_fields']['num'] = array('label'=>'Number of links:', 'type'=>'text', 'default'=>'5');
$twitter_options['widget_fields']['update'] = array('label'=>'Show timestamps:', 'type'=>'checkbox', 'default'=>true);
$twitter_options['widget_fields']['linked'] = array('label'=>'Linked:', 'type'=>'text', 'default'=>'#');
$twitter_options['widget_fields']['hyperlinks'] = array('label'=>'Discover Hyperlinks:', 'type'=>'checkbox', 'default'=>true);
$twitter_options['widget_fields']['twitter_users'] = array('label'=>'Discover @replies:', 'type'=>'checkbox', 'default'=>true);
$twitter_options['widget_fields']['encode_utf8'] = array('label'=>'UTF8 Encode:', 'type'=>'checkbox', 'default'=>false);
$twitter_options['prefix'] = 'twitter';
function twitter_messages($username = '', $num = 1, $list = false, $update = true, $linked  = '#', $hyperlinks = true, $twitter_users = true, $encode_utf8 = false) {
	global $twitter_options;
	include_once(ABSPATH . WPINC . '/rss.php');	
	$messages = fetch_rss('http://twitter.com/statuses/user_timeline/'.$username.'.rss');
	if ($list) echo '<ul class="twitter">';	
	if ($username == '') {
		if ($list) echo '<li>';
		echo 'RSS not configured';
		if ($list) echo '</li>';
	} else {
			if ( empty($messages->items) ) {
				if ($list) echo '<li>';
				echo 'No public Twitter messages.';
				if ($list) echo '</li>';
			} else {
				foreach ( $messages->items as $message ) {
					$msg = " ".substr(strstr($message['description'],': '), 2, strlen($message['description']))." ";
					if($encode_utf8) $msg = utf8_encode($msg);
					$link = $message['link'];			
					if ($list) echo '<li class="twitter-item">'; elseif ($num != 1) echo '<p class="twitter-message">';				
					if ($linked != '' || $linked != false) {
            if($linked == 'all')  { 
              $msg = '<a href="'.$link.'" class="twitter-link">'.$msg.'</a>';  // Puts a link to the status of each tweet 
            } else {
              $msg = $msg . '<a href="'.$link.'" class="twitter-link">'.$linked.'</a>'; // Puts a link to the status of each tweet             
            }
          } 
          if ($hyperlinks) { $msg = hyperlinks($msg); }
          if ($twitter_users)  { $msg = twitter_users($msg); }
          echo $msg;
        if($update) {				
          $time = strtotime($message['pubdate']);
          if ( ( abs( time() - $time) ) < 86400 )
            $h_time = sprintf( __('%s ago'), human_time_diff( $time ) );
          else
            $h_time = date(__('Y/m/d'), $time);
          echo sprintf( __('%s', 'twitter-for-wordpress'),' <span class="twitter-timestamp"><abbr title="' . date(__('Y/m/d H:i:s'), $time) . '">' . $h_time . '</abbr></span>' );
         }          
					if ($list) echo '</li>'; elseif ($num != 1) echo '</p>';
					$i++;
					if ( $i >= $num ) break;
				}
			}
		}
		if ($list) echo '</ul>';
	}
// Link discover stuff
function hyperlinks($text) {
    // match protocol://address/path/file.extension?some=variable&another=asf%
    $text = preg_replace("/\s([a-zA-Z]+:\/\/[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)([\s|\.|\,])/i"," <a href=\"$1\" class=\"twitter-link\">$1</a>$2", $text);
    // match www.something.domain/path/file.extension?some=variable&another=asf%
    $text = preg_replace("/\s(www\.[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)([\s|\.|\,])/i"," <a href=\"http://$1\" class=\"twitter-link\">$1</a>$2", $text);      
    // match name@address
    $text = preg_replace("/\s([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})([\s|\.|\,])/i"," <a href=\"mailto://$1\" class=\"twitter-link\">$1</a>$2", $text);    
    return $text;
}
function twitter_users($text) {
       $text = preg_replace('/([\.|\,|\:|\?|\?|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
       return $text;
}     
// Twitter widget stuff
function widget_twitter_init() {
	if ( !function_exists('register_sidebar_widget') )
		return;
	$check_options = get_option('widget_twitter');
  if ($check_options['number']=='') {
    $check_options['number'] = 1;
    update_option('widget_twitter', $check_options);
  }
	function widget_twitter($args, $number = 1) {
		global $twitter_options;
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);
		// Each widget can store its own options. We keep strings here.
		include_once(ABSPATH . WPINC . '/rss.php');
		$options = get_option('widget_twitter');
		// fill options with default values if value is not set
		$item = $options[$number];
		foreach($twitter_options['widget_fields'] as $key => $field) {
			if (! isset($item[$key])) {
				$item[$key] = $field['default'];
			}
		}
		$messages = fetch_rss('http://twitter.com/statuses/user_timeline/'.$username.'.rss');
		// These lines generate our output.
		echo $before_widget . $before_title . $item['title'] . $after_title;
		twitter_messages($item['username'], $item['num'], true, $item['update'], $item['linked'], $item['hyperlinks'], $item['twitter_users'], $item['encode_utf8']);
		echo $after_widget;		
	}
	// This is the function that outputs the form to let the users edit
	// the widget's title. It's an optional feature that users cry for.
	function widget_twitter_control($number) {
		global $twitter_options;
		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_twitter');
		if ( isset($_POST['twitter-submit']) ) {
			foreach($twitter_options['widget_fields'] as $key => $field) {
				$options[$number][$key] = $field['default'];
				$field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $number);
				if ($field['type'] == 'text') {
					$options[$number][$key] = strip_tags(stripslashes($_POST[$field_name]));
				} elseif ($field['type'] == 'checkbox') {
					$options[$number][$key] = isset($_POST[$field_name]);
				}
			}
			update_option('widget_twitter', $options);
		}
		foreach($twitter_options['widget_fields'] as $key => $field) {
			$field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $number);
			$field_checked = '';
			if ($field['type'] == 'text') {
				$field_value = htmlspecialchars($options[$number][$key], ENT_QUOTES);
			} elseif ($field['type'] == 'checkbox') {
				$field_value = 1;
				if (! empty($options[$number][$key])) {
					$field_checked = 'checked="checked"';
				}
			}
			printf('<p style="text-align:right;" class="twitter_field"><label for="%s">%s <input id="%s" name="%s" type="%s" value="%s" class="%s" %s /></label></p>',
				$field_name, __($field['label']), $field_name, $field_name, $field['type'], $field_value, $field['type'], $field_checked);
		}
		echo '<input type="hidden" id="twitter-submit" name="twitter-submit" value="1" />';
	}
	function widget_twitter_setup() {
		$options = $newoptions = get_option('widget_twitter');
		if ( isset($_POST['twitter-number-submit']) ) {
			$number = (int) $_POST['twitter-number'];
			$newoptions['number'] = $number;
		}
		if ( $options != $newoptions ) {
			update_option('widget_twitter', $newoptions);
			widget_twitter_register();
		}
	}
	function widget_twitter_page() {
		$options = $newoptions = get_option('widget_twitter');
	?>
		<div class="wrap">
			<form method="POST">
				<h2><?php _e('Twitter Widgets'); ?></h2>
				<p style="line-height: 30px;"><?php _e('How many Twitter widgets would you like?'); ?>
				<select id="twitter-number" name="twitter-number" value="<?php echo $options['number']; ?>">
	<?php for ( $i = 1; $i < 10; ++$i ) echo "<option value='$i' ".($options['number']==$i ? "selected='selected'" : '').">$i</option>"; ?>
				</select>
				<span class="submit"><input type="submit" name="twitter-number-submit" id="twitter-number-submit" value="<?php echo attribute_escape(__('Save')); ?>" /></span></p>
			</form>
		</div>
	<?php
	}
	function widget_twitter_register() {
		$options = get_option('widget_twitter');
		$dims = array('width' => 300, 'height' => 300);
		$class = array('classname' => 'widget_twitter');
		for ($i = 1; $i <= 9; $i++) {
			$name = sprintf(__('Twitter #%d'), $i);
			$id = "twitter-$i"; // Never never never translate an id
			wp_register_sidebar_widget($id, $name, $i <= $options['number'] ? 'widget_twitter' : /* unregister */ '', $class, $i);
			wp_register_widget_control($id, $name, $i <= $options['number'] ? 'widget_twitter_control' : /* unregister */ '', $dims, $i);
		}
		add_action('sidebar_admin_setup', 'widget_twitter_setup');
		add_action('sidebar_admin_page', 'widget_twitter_page');
	}
	widget_twitter_register();
}
add_action('widgets_init', 'widget_twitter_init');
?>