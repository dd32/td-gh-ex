<?php

function antonine_licence(){
	$license = get_theme_mod("license");
	if($license!="none"){
		switch(get_theme_mod("license")){
			case 'zero' : $text = 'Creative Commons Zero'; $url = "https://creativecommons.org/publicdomain/zero/1.0/"; break;
			case 'cc-by' : $text = 'Creative Commons CC-BY'; $url = "https://creativecommons.org/licenses/by/4.0/";	break;	
			case 'cc-by-sa' : $text = 'Creative Commons CC-BY-SA'; $url = "https://creativecommons.org/licenses/by-sa/4.0/"; break;		
			case 'cc-by-nd' : $text = 'Creative Commons CC-BY-ND'; $url = "https://creativecommons.org/licenses/by-nd/4.0/"; break;		
			case 'cc-by-nc' : $text = 'Creative Commons CC-BY-NC'; $url = "https://creativecommons.org/licenses/by-nc/4.0/"; break;		
			case 'cc-by-nc-sa' : $text = 'Creative Commons CC-BY-NC-SA'; $url = "https://creativecommons.org/licenses/by-nc-sa/4.0/"; break;		
			case 'cc-by-nc-nd' : $text = 'Creative Commons CC-BY-NC-ND'; $url = "https://creativecommons.org/licenses/by-nc-nd/4.0/"; break;
		}
		?><p><a rel="license" href="<?PHP echo $url; ?>"><?PHP echo x("license","antonine","Content licensed as") . " " . $text; ?></a></p><?PHP
	}
}

function antonine_get_categories($id){

	$post_categories = wp_get_post_categories($id);
	$cats = array();
		
	foreach($post_categories as $c){
		$cat = get_category( $c );
		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'link' => get_category_link($c) );
	}
	
	return $cats;

}

function antonine_get_categories_links($id){

	$html = array();
	$cats = antonine_get_categories($id);
	
	foreach($cats as $cat){
		$html[] = "<span property='about' typeof='Thing'><a property='url' href='" . $cat['link'] ."'><span property='name'>" . $cat['name'] . "</span></a></span>";
	}
	
	if(count($html)==0){
		$html[] = __("No Categories", "antonine");
	}
	
	return $html;

}

function antonine_get_tags($id){

	$post_tags = wp_get_post_tags($id);
	$cats = array();
		
	foreach($post_tags as $c){
		$cat = get_tag( $c );
		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'link' => get_tag_link($c) );
	}
	
	return $cats;

}

function antonine_get_tags_links($id){

	$html = array();
	$cats = antonine_get_tags($id);
	
	foreach($cats as $cat){
		$html[] = "span property='subject'><a property='name' href='" . $cat['link'] ."'>" . $cat['name'] . "</a></span>";
	}
	
	if(count($html)==0){
		$html[] = __("No Tags", "antonine");
	}
	
	return $html;

}


function antonine_author_meta() {

	global $post;
	?><div>
		<h6 class='meta_label'><?PHP echo __('Author', 'antonine'); ?></h6><span property="author" typeof="Person"><a property="url" href="<?PHP echo get_author_posts_url($post->post_author); ?>"><span property="name"><?PHP echo get_the_author_meta("display_name"); ?></span></a></span>
	</div>
	<?PHP
	
}

function antonine_entry_meta() {

	global $post;
	?><div>
		<h6 class='meta_label'><?PHP echo __('Categories', 'antonine'); ?></h6><span><?PHP echo implode(" / ", antonine_get_categories_links($post->ID)); ?></span>
	</div>
	<div>
		<h6 class='meta_label'><?PHP echo __('Tags', 'antonine'); ?></h6><span><?PHP echo get_the_tag_list(" ", " / ", " "); ?></span>
	</div>
	<?PHP if(get_theme_mod("author")=="on"){ ?>
	<div>
		<h6 class='meta_label'><?PHP echo __('Author', 'antonine'); ?></h6><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></h6>
	</div>
	<?PHP
	}
	
}

function antonine_archive_title(){

	if(isset($_GET['cat'])){
		$term = $_GET['cat'];
	}else{
		$term = get_term_by( "slug", $_GET['tag'], "post_tag" );
		$term = $term->term_id;
	}

	?><header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			$thumbnail = get_option( 'antonine_' . $term . '_thumbnail_id', 0 );
			if($thumbnail){
				$html = 'background:url(' . wp_get_attachment_url($thumbnail) . ') 0px 0px / cover no-repeat;';
				the_archive_description( '<div class="taxonomy-description"><div class="taxonomy_picture" style="' . $html . '"></div><div class="taxonomy_content">', '</div></div>' );
			}else{
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			}
		?>
	</header><?PHP

}

function antonine_author_title(){

	?><header class="page-header">
		<?php
			echo '<h1 class="page-title">' . ucfirst(get_the_author_meta("display_name")) . '</h1>';
			if(get_the_author_meta("description")!=""){
				echo '<div class="taxonomy-description">' . get_the_author_meta("description") . '</div>';
			}
		?>
	</header><?PHP

}

function antonine_child_categories(){

	?><footer class="page-footer">
		<h1 class="page-title"><?PHP echo __('Related Categories', 'antonine'); ?></h1>
		<div class="taxonomy-description"><?PHP
		
			$category = get_category($_GET['cat']);
			
			$childcats = get_categories('child_of=' . $category->parent . '&hide_empty=1&exclude=' . $_GET['cat']);
			$output = array();
			foreach ($childcats as $childcat) {
				if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
					$output[] = '<a href="'.get_category_link($childcat->cat_ID).'">' . $childcat->cat_name . '</a>';
					$ancestor = $childcat->cat_ID;
				}
			}
			
			echo implode(" / ", $output);
			
		?></div>
	</footer><?PHP

}

function antonine_posts_authors_list($type, $id){

	$the_query = new WP_Query( array($type => $id, 'posts_per_page' => -1) );
	
	$authors = array();

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$authors[] = get_the_author_meta('ID');
		}
	} 
	
	wp_reset_postdata();
	
	return $authors;
	
}

function antonine_posts_authors_html($type, $id){

	$authors = array_unique(antonine_posts_authors_list($type, $id));

	$output = array();
	foreach($authors as $author){
		$output[] = "<a href='" . get_author_posts_url($author) . "'>" . ucfirst(get_the_author_meta( 'display_name', $author )) . "</a>";
	}
	
	echo implode(" / ", $output);

}

