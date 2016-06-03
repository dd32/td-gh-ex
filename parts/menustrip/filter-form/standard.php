<h2><?PHP echo __("Filter", 'antonine'); ?></h2>
<form action="javascript:function(){return false;}">
<?PHP
	$categories = get_categories();
	echo "<label for='antonine_category'>" . __("Choose a category", "antonine") . "</label>";
	echo "<select id='antonine_category'>";
	echo "<option value='0'>" . __("All categories", 'antonine') . "</option>";
	foreach($categories as $category){
		echo "<option value='" . $category->term_id . "'>" . $category->name . "</option>";
	}
	echo "</select>";
	$tags = get_tags();
	echo "<label for='antonine_tag'>" . __("Choose a tag", "antonine") . "</label>";
	echo "<select id='antonine_tag'>";
	echo "<option value='0'>" . __("All Tags", 'antonine') . "</option>";
	foreach($tags as $tag){
		echo "<option value='" . $tag->term_id . "'>" . $tag->name . "</option>";
	}
	echo "</select>";
	
	$args = array(
								'posts_per_page'   => -1,
								'post_status'           => "published"
							);
							
	$query = new WP_Query( $args );	

	$dates = array();
	$authors = array();
	$posts_count = count($query->posts);
	foreach($query->posts as $index => $post){
		$authors[$post->post_author] = ucfirst(get_the_author_meta( "display_name", $post->post_author ));
		$post_date = $post->post_date;
		$parts = explode(" ", $post_date);
		$date_parts = explode("-",$parts[0]);
		if(!in_array($date_parts[0] . "-" . $date_parts[1], $dates)){
			$dates[$date_parts[0] . "-" . $date_parts[1]] = __("All of", 'antonine') . " " . date("F Y", mktime(0,0,0,$date_parts[1],1,$date_parts[0]));
		}
		if(!in_array($parts[0], $dates)){
			$dates[$parts[0]] = "--- " . date("l, jS F Y", mktime(0,0,0,$date_parts[1],$date_parts[2],$date_parts[0]));
		}
	}
	
	wp_reset_query();
	echo "<label for='antonine_date'>" . __("Choose a date", "antonine") . "</label>";
	echo "<select id='antonine_date'>";
	echo "<option value='0'>" . __("All dates", 'antonine') . "</option>";
	foreach($dates as $date => $name){
		echo "<option value='" . $date . "'>" . $name . "</option>";
	}
	echo "</select>";
	
	asort($authors);
	
	echo "<label for='antonine_author'>" . __("Choose an author", "antonine") . "</label>";
	echo "<select id='antonine_author'>";
	echo "<option value='0'>" . __("All Authors", 'antonine') . "</option>";
	foreach($authors as $id => $name){
		echo "<option value='" . $id . "'>" . $name . "</option>";
	}
	echo "</select>";
	echo "<label for='antonine_free_text'>" . __("Free text", 'antonine') . "</label><input type='text' name='freetext' id='antonine_free_text' maxlength='100' />";
	echo "<p><span id='antonine_posts_count'>" . $posts_count . " " . __("Matching Posts", 'antonine') . "</span> <button id='filterShowButton'>" . __("Show", "antonine") . "</button></p>";
?>
</form>