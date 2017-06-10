<?php 

$images = get_field('select_gallery_images');

if( $images ) : ?>
    <div id="post-slider" class="post-slider">
        <?php foreach( $images as $image ): ?>
            <div class="post-slide" >
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>