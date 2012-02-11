<?php
/**
 * SaTema Theme functions and definitions
 */

 
$themename = "satema";
$shortname = "sa";



function wp_get_archives_new($args = '') {
	global $wpdb, $wp_locale;
	$defaults = array(
		'type' => 'monthly', 'limit' => '',
		'format' => 'html', 'before' => '',
		'after' => '', 'show_post_count' => false,
		'echo' => 1
	);
	
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );
	        if ( '' == $type )
	                $type = 'monthly';
	
	        if ( '' != $limit ) {
	                $limit = absint($limit);
	                $limit = ' LIMIT '.$limit;
	        }
	
	        // this is what will separate dates on weekly archive links
	        $archive_week_separator = '&#8211;';
	
	        // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
	        $archive_date_format_over_ride = 0;
	
	        // options for daily archive (only if you over-ride the general date format)
	        $archive_day_date_format = 'Y/m/d';
	
	        // options for weekly archive (only if you over-ride the general date format)
	        $archive_week_start_date_format = 'Y/m/d';
	        $archive_week_end_date_format   = 'Y/m/d';
	
	        if ( !$archive_date_format_over_ride ) {
	                $archive_day_date_format = get_option('date_format');
	                $archive_week_start_date_format = get_option('date_format');
	                $archive_week_end_date_format = get_option('date_format');
	        }
	
	        //filters
	        $where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
	        $join = apply_filters( 'getarchives_join', '', $r );
	
	        $output = '';
	
	        if ( 'monthly' == $type ) {
	                $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
	                $key = md5($query);
	                $cache = wp_cache_get( 'wp_get_archives' , 'general');
	                if ( !isset( $cache[ $key ] ) ) {
	                        $arcresults = $wpdb->get_results($query);
	                        $cache[ $key ] = $arcresults;
	                        wp_cache_set( 'wp_get_archives', $cache, 'general' );
	                } else {
	                        $arcresults = $cache[ $key ];
	                }
	                if ( $arcresults ) {
	                        $afterafter = $after;
	                        foreach ( (array) $arcresults as $arcresult ) {
	                                $url = get_month_link( $arcresult->year, $arcresult->month );
	                                /* translators: 1: month name, 2: 4-digit year */
	                                $text = sprintf(__('%1$s %2$d', SATEMA_TEXT_DOMAIN), $wp_locale->get_month($arcresult->month), $arcresult->year);
	                                if ( $show_post_count )
	                                        $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
	                                $output .= get_archives_link($url, $text.$after, $format, $before);
	                        }
	                }
	        } elseif ('yearly' == $type) {
	                $query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC $limit";
	                $key = md5($query);
	                $cache = wp_cache_get( 'wp_get_archives' , 'general');
	                if ( !isset( $cache[ $key ] ) ) {
	                        $arcresults = $wpdb->get_results($query);
	                        $cache[ $key ] = $arcresults;
	                        wp_cache_set( 'wp_get_archives', $cache, 'general' );
	                } else {
	                        $arcresults = $cache[ $key ];
	                }
	                if ($arcresults) {
	                        $afterafter = $after;
	                        foreach ( (array) $arcresults as $arcresult) {
	                                $url = get_year_link($arcresult->year);
	                                $text = sprintf('%d', $arcresult->year);
	                                if ($show_post_count)
	                                        $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
	                                $output .= get_archives_link($url, $text.$after, $format, $before);
	                        }
	                }
	        } elseif ( 'daily' == $type ) {
	                $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, DAYOFMONTH(post_date) AS `dayofmonth`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date), DAYOFMONTH(post_date) ORDER BY post_date DESC $limit";
	                $cache = wp_cache_get( 'wp_get_archives' , 'general');
	                if ( !isset( $cache[ $key ] ) ) {
	                        $arcresults = $wpdb->get_results($query);
	                        $cache[ $key ] = $arcresults;
	                        wp_cache_set( 'wp_get_archives', $cache, 'general' );
	                } else {
	                        $arcresults = $cache[ $key ];
	                }
	                if ( $arcresults ) {
	                        $afterafter = $after;
	                        foreach ( (array) $arcresults as $arcresult ) {
	                                $url    = get_day_link($arcresult->year, $arcresult->month, $arcresult->dayofmonth);
	                                $date = sprintf('%1$d-%2$02d-%3$02d 00:00:00', $arcresult->year, $arcresult->month, $arcresult->dayofmonth);
	                                $text = mysql2date($archive_day_date_format, $date);
	                                if ($show_post_count)
	                                        $after = '&nbsp;('.$arcresult->posts.')'.$afterafter;
	                                $output .= get_archives_link($url, $text.$after, $format, $before);
	                        }
	                }
	        } elseif ( 'weekly' == $type ) {
	                $week = _wp_mysql_week( '`post_date`' );
	                $query = "SELECT DISTINCT $week AS `week`, YEAR( `post_date` ) AS `yr`, DATE_FORMAT( `post_date`, '%Y-%m-%d' ) AS `yyyymmdd`, count( `ID` ) AS `posts` FROM `$wpdb->posts` $join $where GROUP BY $week, YEAR( `post_date` ) ORDER BY `post_date` DESC $limit";
	                $key = md5($query);
	                $cache = wp_cache_get( 'wp_get_archives' , 'general');
	                if ( !isset( $cache[ $key ] ) ) {
	                        $arcresults = $wpdb->get_results($query);
	                        $cache[ $key ] = $arcresults;
	                        wp_cache_set( 'wp_get_archives', $cache, 'general' );
	                } else {
	                        $arcresults = $cache[ $key ];
	                }
	                $arc_w_last = '';
	                $afterafter = $after;
	                if ( $arcresults ) {
	                                foreach ( (array) $arcresults as $arcresult ) {
	                                        if ( $arcresult->week != $arc_w_last ) {
	                                                $arc_year = $arcresult->yr;
	                                                $arc_w_last = $arcresult->week;
	                                                $arc_week = get_weekstartend($arcresult->yyyymmdd, get_option('start_of_week'));
	                                                $arc_week_start = date_i18n($archive_week_start_date_format, $arc_week['start']);
	                                                $arc_week_end = date_i18n($archive_week_end_date_format, $arc_week['end']);
	                                                $url  = sprintf('%1$s/%2$s%3$sm%4$s%5$s%6$sw%7$s%8$d', home_url(), '', '?', '=', $arc_year, '&amp;', '=', $arcresult->week);
	                                                $text = $arc_week_start . $archive_week_separator . $arc_week_end;
	                                                if ($show_post_count)
	                                                        $after = '&nbsp;('.$arcresult->posts.')'.$afterafter;
	                                                $output .= get_archives_link($url, $text.$after, $format, $before);
	                                        }
	                                }
	                }
	        } elseif ( ( 'postbypost' == $type ) || ('alpha' == $type) ) {
	                $orderby = ('alpha' == $type) ? 'post_title ASC ' : 'post_date DESC ';
	                $query = "SELECT * FROM $wpdb->posts $join $where ORDER BY $orderby $limit";
	                $key = md5($query);
	                $cache = wp_cache_get( 'wp_get_archives' , 'general');
	                if ( !isset( $cache[ $key ] ) ) {
	                        $arcresults = $wpdb->get_results($query);
	                        $cache[ $key ] = $arcresults;
	                        wp_cache_set( 'wp_get_archives', $cache, 'general' );
	                } else {
	                        $arcresults = $cache[ $key ];
	                }
	                if ( $arcresults ) {
	                        foreach ( (array) $arcresults as $arcresult ) {
	                                if ( $arcresult->post_date != '0000-00-00 00:00:00' ) {
	                                        $url  = get_permalink($arcresult);
	                                        $arc_title = $arcresult->post_title;
	                                        if ( $arc_title )
	                                                $text = strip_tags(apply_filters('the_title', $arc_title));
	                                        else
	                                                $text = $arcresult->ID;
	                                        $output .= get_archives_link($url, $text, $format, $before, $after);
	                                }
	                        }
	                }
	        }
	        if ( $echo )
	                echo $output;
	        else
	                return $output;
	}

	

/**************************
 * Breadcrumbs Function
 **************************/
	function dimox_breadcrumbs() {
		$delimiter = '&raquo;';
		$home = 'Home'; // text for the 'Home' link
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb
		if ( !is_home() && !is_front_page() || is_paged() ) {
			echo '<div id="crumbs">';
			global $post;
			$homeLink = home_url();
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
			if ( is_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category($thisCat);
				$parentCat = get_category($thisCat->parent);
				if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
				echo $before . ' Categories  ' . $delimiter . ' ' . single_cat_title('', false) . '' . $after;
			} elseif ( is_search() ) {
				echo $before . 'Search ' . $delimiter . ' ' . get_search_query() . ' ' . $after;
			} elseif ( is_day() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('d') . $after;
			} elseif ( is_month() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('F') . $after;
			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					echo $before . get_the_title() . $after;
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;
			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} elseif ( is_page() && !$post->post_parent ) {
				echo $before . get_the_title() . $after;
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} elseif ( is_tag() ) {
				echo $before . 'Tags '  . $delimiter . ' ' .single_tag_title('', false) . ' ' . $after;
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . 'Users ' . $delimiter . ' ' . $userdata->display_name . ' ' . $after;
			} elseif ( is_404() ) {
				echo $before . 'Error 404' . $after;
			}
			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo __('Page', SATEMA_TEXT_DOMAIN) . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}
			echo '</div>';
		}
	} // end dimox_breadcrumbs()

	
	
	
	
/**************************
 * Paginations Function
 **************************/
function pagination($pages = '', $range = 4){
     $showitems = ($range * 2)+1; 
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {$pages = 1;}
     } 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++){
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
          if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

	
function wp_corenavi() {
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = ($wp_rewrite->using_permalinks()) ? user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ) : @add_query_arg('paged','%#%');
	if( !empty($wp_query->query_vars['s']) ) $a['add_args'] = array( 's' => get_query_var( 's' ) );
	$a['total'] = $max;
	$a['current'] = $current;
 
	$total = 1; //1 - display the text "Page N of N", 0 - not display
	$a['mid_size'] = 5; //how many links to show on the left and right of the current
	$a['end_size'] = 1; //how many links to show in the beginning and end
	$a['prev_text'] = '&laquo; Previous'; //text of the "Previous page" link
	$a['next_text'] = 'Next &raquo;'; //text of the "Next page" link
 
	if ($max > 1) echo '<div class="navigation">';
	if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}


function satema_time_ago( $type = 'post' ) {
	$t = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
	return human_time_diff($t('U'), current_time('timestamp')) . " " . __( 'ago', SATEMA_TEXT_DOMAIN );
}


function __popular_posts($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
	global $wpdb;
	$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if(!$show_pass_post) $request .= " AND post_password =\"\"";
	if($duration !="") { 
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts=$wpdb->get_results($request);
	$output="";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title=stripslashes($post->post_title);
			$comment_count=$post->comment_count;
			$permalink=get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title."\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
} 




class SatemaArchivesWidget extends WP_Widget {
	function SatemaArchivesWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, 'SaTema Archives' );
	}
	function widget( $args, $instance ) {
	
		extract($args, EXTR_SKIP);
		echo $before_widget;
		
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$stype = empty($instance['stype']) ? ' ' : apply_filters('widget_sordr', $instance['stype']);
		$spcnt = empty($instance['spcnt']) ? ' ' : apply_filters('widget_sexcl', $instance['spcnt']);
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		
		$args=array('type' => $stype, 'echo' => '0', 'show_post_count' => $spcnt);
		$archives=wp_get_archives_new($args);?>
			<ul>
				<?php echo $archives; ?>
			</ul>
		<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title'] );
		$instance['stype'] = strip_tags($new_instance['stype'] );
		$instance['spcnt'] = strip_tags($new_instance['spcnt'] );
		return $instance;
	}
	function form( $instance ) {
		// Output admin widget options form
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'stype' => '', 'spcnt' => '0' ) );
		$title = strip_tags($instance['title']);
		$stype = strip_tags($instance['stype']);
		$spcnt = strip_tags($instance['spcnt']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __( 'Archives Title', SATEMA_TEXT_DOMAIN );?>    : 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('stype'); ?>"><?php echo __( 'Archives Type', SATEMA_TEXT_DOMAIN ); ?>: 
				<select class="widefat" id="<?php echo $this->get_field_id('stype'); ?>" name="<?php echo $this->get_field_name('stype'); ?>">
					<option value="yearly"     <?php if (esc_attr($stype) == 'yearly')     { echo 'selected="selected"'; } ?>>yearly    </option>
					<option value="monthly"    <?php if (esc_attr($stype) == 'monthly')    { echo 'selected="selected"'; } ?>>monthly   </option>
					<option value="daily"      <?php if (esc_attr($stype) == 'daily')      { echo 'selected="selected"'; } ?>>daily     </option>
					<option value="weekly"     <?php if (esc_attr($stype) == 'weekly')     { echo 'selected="selected"'; } ?>>weekly    </option>
					<option value="postbypost" <?php if (esc_attr($stype) == 'postbypost') { echo 'selected="selected"'; } ?>>postbypost</option>
					<option value="alpha"      <?php if (esc_attr($stype) == 'alpha')      { echo 'selected="selected"'; } ?>>alpha     </option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('spcnt'); ?>">
				<input class="widefat" type="checkbox" id="<?php echo $this->get_field_id('spcnt'); ?>" name="<?php echo $this->get_field_name('spcnt'); ?>" value="1" <?php if(esc_attr($spcnt)==1){echo "checked='checked'";} ?>  >
				 <?php echo __( 'Show Post Count', SATEMA_TEXT_DOMAIN ); ?>: 
			</label>
		</p>
		<input type="hidden" id="satema_wdgt_arc_submit" name="satema_wdgt_arc_submit" value="1" />
		<?php
	}
}


class SatemaCategoriesWidget extends WP_Widget {
	function SatemaCategoriesWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, 'SaTema Categories' );
	}
	function widget( $args, $instance ) {
	
		extract($args, EXTR_SKIP);
		echo $before_widget;
		
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$sordr = empty($instance['sordr']) ? ' ' : apply_filters('widget_sordr', $instance['sordr']);
		$sords = empty($instance['sords']) ? ' ' : apply_filters('widget_sords', $instance['sords']);
		$sexcl = empty($instance['sexcl']) ? ' ' : apply_filters('widget_sexcl', $instance['sexcl']);
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		
		$args=array('orderby' => $sordr, 'order' => $sords, 'hierarchical' => true, 'exclude' => array($sexcl));
		$categories=get_categories($args);

		$cat_n = count($categories) - 1;
		$j=0;
		$cat_left='';
		$cat_right='';
		foreach($categories as $category) { 
			if ($j<$cat_n/2):
				$cat_left  = $cat_left .'<li class="cat-item cat-item-' . $category->term_id . '"><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "satema" ), $category->name ) . '">' . $category->name . ' (' . $category->count . ')</a> </li>';
			elseif ($j>=$cat_n/2):
				$cat_right = $cat_right.'<li class="cat-item cat-item-' . $category->term_id . '"><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "satema" ), $category->name ) . '">' . $category->name . ' (' . $category->count . ')</a> </li>';
			endif;
			$j=$j+1;
		}
		?>
		<ul class="span-4 border left">
			<?php echo $cat_left;?>
		</ul>
		<ul class="span-4 last right">
			<?php echo $cat_right;?>
		</ul>

		<?php

		
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title'] );
		$instance['sordr'] = strip_tags($new_instance['sordr'] );
		$instance['sords'] = strip_tags($new_instance['sords'] );
		$instance['sexcl'] = strip_tags($new_instance['sexcl'] );
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'sordr' => '', 'sords' => '', 'sexcl' => '' ) );
		$title = strip_tags($instance['title']);
		$sordr = strip_tags($instance['sordr']);
		$sords = strip_tags($instance['sords']);
		$sexcl = strip_tags($instance['sexcl']);

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __( 'Categories Title', SATEMA_TEXT_DOMAIN );?>    : <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p>
			<label for="<?php echo $this->get_field_id('sordr'); ?>"><?php echo __( 'Categories Order By', SATEMA_TEXT_DOMAIN ); ?>: 
				<select class="widefat" id="<?php echo $this->get_field_id('sordr'); ?>" name="<?php echo $this->get_field_name('sordr'); ?>">
					<option value="id"         <?php if (esc_attr($sordr) == 'id')         { echo 'selected="selected"'; } ?>>id        </option>
					<option value="name"       <?php if (esc_attr($sordr) == 'name')       { echo 'selected="selected"'; } ?>>name      </option>
					<option value="slug"       <?php if (esc_attr($sordr) == 'slug')       { echo 'selected="selected"'; } ?>>slug      </option>
					<option value="count"      <?php if (esc_attr($sordr) == 'count')      { echo 'selected="selected"'; } ?>>count     </option>
					<option value="term_group" <?php if (esc_attr($sordr) == 'term_group') { echo 'selected="selected"'; } ?>>term_group</option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('sords'); ?>"><?php echo __( 'Categories Order', SATEMA_TEXT_DOMAIN ); ?>   : 
				<select class="widefat" id="<?php echo $this->get_field_id('sords'); ?>" name="<?php echo $this->get_field_name('sords'); ?>">
					<option value="asc"  <?php if (esc_attr($sords) == 'asc')  { echo 'selected="selected"'; } ?>>Ascending  </option>
					<option value="desc" <?php if (esc_attr($sords) == 'desc') { echo 'selected="selected"'; } ?>>Descending </option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('sexcl'); ?>"><?php echo __( 'Excludes Categories', SATEMA_TEXT_DOMAIN ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('sexcl'); ?>" name="<?php echo $this->get_field_name('sexcl'); ?>" type="text" value="<?php echo esc_attr($sexcl); ?>" />
			</label>
		</p>
		<input type="hidden" id="satema_wdgt_ctg_submit" name="satema_wdgt_ctg_submit" value="1" />
		
		<?php
	}
}

function satema_register_widgets() {
	register_widget( 'SatemaCategoriesWidget' );
	register_widget( 'SatemaArchivesWidget' );
}
add_action( 'widgets_init', 'satema_register_widgets' );



//CREATE PORTFOLIO TEMPLATE
add_action('init', 'satema_create_portfolio');
function satema_create_portfolio() {
	$portfolio_args = array(
		'label' => __('Portfolio', SATEMA_TEXT_DOMAIN),
		'singular_label' => __('Portfolio', SATEMA_TEXT_DOMAIN),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
			'rewrite' => array('slug' => 'portfolio'),
			'query_var' => true,
			'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'thumbnail')
	);
		register_post_type('portfolio',$portfolio_args);
	}

//add actions portfolio
add_action("admin_init", "satema_add_portfolio");
add_action('save_post', 'satema_update_website_url');

//add portfolio
function satema_add_portfolio(){
	add_meta_box("portfolio_details", __('Portfolio Options', SATEMA_TEXT_DOMAIN), "satema_portfolio_options", "portfolio", "normal", "high");
}

//options portfolio
function satema_portfolio_options(){
	global $post;
	$custom      = get_post_custom($post->ID);
	$website_url = $custom["website_url"][0];
	?>
	<div id="portfolio-options">
		<label>Website URL:</label><input name="website_url" value="<?php echo $website_url; ?>" />		
	</div><!--end portfolio-options-->   
	<?php
}

//update portfolio
function satema_update_website_url(){
	global $post;
	update_post_meta($post->ID, "website_url", $_POST["website_url"]);
}

//add filter portfolio
add_filter("manage_edit-portfolio_columns", "satema_portfolio_edit_columns");
add_action("manage_posts_custom_column",  "satema_portfolio_columns_display");
 
function satema_portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Project Title",
		"description" => "Description",
	);
	return $portfolio_columns;
}
	 
function satema_portfolio_columns_display($portfolio_columns){
	switch ($portfolio_columns)
	{
		case "description":
			the_excerpt();
			break;				
	}
}	
	
	
//CREATE PORTFOLIO TEMPLATE
//END




?>