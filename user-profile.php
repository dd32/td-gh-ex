<div class="user-profile media">
    <div class="pull-left author-avater">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 110 ); ?>
    </div>
    <div class="media-body">
        <div class="profile-heading">
            <h3><?php the_author_posts_link(); ?></h3>
        </div>
        <div class="website-link"><?php echo esc_url(the_author_meta('user_url')); ?></div>
        <div class="author-description">
            <?php echo esc_attr(the_author_meta('description')); ?>
        </div>

            <div class="author-social-profile">
                <?php 
                    $facebookLink = get_the_author_meta('facebook');
                    $twitterLink  = get_the_author_meta('twitter');
                    $gplusLink = get_the_author_meta('gplus');
                    $linkedinLink = get_the_author_meta('linkedin');
                    $tumblrLink = get_the_author_meta('tumblr');
                    $pinterestLink = get_the_author_meta('pinterest');
                ?>
                <?php
                    if ($facebookLink){
                        echo "<a href='".esc_url($facebookLink)."'><i class='fa fa-facebook'></i></a>";
                    }
                ?>
                <?php
                    if ($twitterLink){
                        echo "<a href='".esc_url($twitterLink)."'><i class='fa fa-twitter'></i></a>";
                    }
                ?>
                <?php
                    if ($gplusLink){
                        echo "<a href='".esc_url($gplusLink)."'><i class='fa fa-google-plus'></i></a>";
                    }
                ?>
                <?php
                    if ( $linkedinLink ){
                        echo "<a href='".esc_url($linkedinLink)."'><i class='fa fa-linkedin'></i></a>";
                    }
                ?>
                <?php
                    if ( $tumblrLink ){
                        echo "<a href='".esc_url($tumblrLink)."'><i class='fa fa-tumblr'></i></a>";
                    }
                ?>
                <?php
                    if ( $pinterestLink ){
                        echo "<a href='".esc_url($pinterestLink)."'><i class='fa fa-pinterest'></i></a></li>";
                    }
                ?>
            </div>
    </div>
</div><!-- .user-profile -->