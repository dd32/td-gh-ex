<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly ?>
<div id="author" class="row">
    <div class="col width-100 last">
    	<?php echo get_avatar(get_the_author_email(), '100'); ?>
    	<h1 class="name"><?php the_author_meta('display_name'); ?></h1>
        <p class="description"><?php the_author_meta('description'); ?></p>
    	<a class="posts" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">Find all posts by <?php the_author_meta('display_name'); ?></a>
    </div>
</div>