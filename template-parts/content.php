<?php
/**
 * Template part for displaying posts.
 *
 * @package Aglee Lite
 */

?>
<?php
$blog_display_type = get_theme_mod('blog_post_layout','blog_image_large');
 
 $blog_display_class = '';
 switch($blog_display_type){
    case 'blog_image_large' :
        $blog_display_class = 'blog-image-large';       
        break;
    case 'blog_image_medium' :
        $blog_display_class = 'blog-image-medium';       
        break;
    case 'blog_image_alternate_medium' :
        $blog_display_class = 'blog-image-alternate-medium';       
        break;
    case 'blog_full_content' :
        $blog_display_class = 'blog-full-content';       
        break;
    default:
        $blog_display_class = 'blog-image-large';
 }
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>            
            	<div class="entry-content">
            		<?php
                        if($blog_display_class == 'blog-full-content'){
                            $img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-full-width', true );
                        }
                        elseif($blog_display_class == 'blog-image-large'){
                            $img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-large', true );
                        }else{
                            $img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-medium', true ); 
                        }
            		?>
                    <div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <a href="<?php the_permalink(); ?>" class="blog_listing_img">
                        <img src="<?php echo $img_src[0]; ?>" />
                    </a>
                    <div class="blog-excerpt"><?php the_excerpt(); ?></div>
                    <div class="blog-bottom-content">
                        <span class="blog_author"><?php echo get_the_author();?></span>
                        <span class="blog_post_date"><?php echo get_the_date(); ?></span>
                    </div>
            	</div><!-- .entry-content -->
</article><!-- #post-## -->
