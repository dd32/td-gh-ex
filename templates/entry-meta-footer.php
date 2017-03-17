<?php $post_category = get_the_category(); 
	if ( $post_category ) {?>
		<span class="postedinbottom"><i class="icon-folder-close"></i> <?php the_category(', ') ?></span>
	<?php }
	$tags = get_the_tags(); 
	if ($tags) { ?>
		<span class="posttags color_gray"><i class="icon-tag"></i> <?php the_tags('', ', ', ''); ?> </span>
	<?php } 

	global $pinnacle;
echo '<meta itemprop="dateModified" content="'.esc_attr(get_the_modified_date('c')).'">';
echo '<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="'.esc_url(get_the_permalink()).'">';
echo '<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';
    if (!empty($pinnacle['x1_logo_upload']['url'])) {  
    echo '<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';
    echo '<meta itemprop="url" content="'.esc_attr($pinnacle['x1_logo_upload']['url']).'">';
    echo '<meta itemprop="width" content="'.esc_attr($pinnacle['x1_logo_upload']['width']).'">';
    echo '<meta itemprop="height" content="'.esc_attr($pinnacle['x1_logo_upload']['height']).'">';
    echo '</div>';
    }
    echo '<meta itemprop="name" content="'.esc_attr(get_bloginfo('name')).'">';
echo '</div>';