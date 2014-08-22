<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Bharat
 * @since Bharat 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'bharat' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php if ( ! post_password_required() && ! is_attachment() ) :
				the_post_thumbnail();
			endif; ?>

			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<!-- meta starts -->
					<div class="meta-home-blog">
						<ul class="meta-fields">
							<li class="meta-author"><?php the_author_posts_link(); ?></li>
							<li class="meta-date"><?php
                        $archive_year = get_the_time('Y');
                        $archive_month = get_the_time('M');
                        $archive_day = get_the_time('d');
                        ?>
                        <a href="<?php
                        echo get_day_link($archive_year,
                                $archive_month,
                                $archive_day);
                        ?>"><?php echo esc_html( get_the_date() ) ?></a></li>
							<li class="meta-category"><?php the_category(', '); ?></li>
						</ul>
					</div>
				<!-- meta starts -->
		</div><!-- .entry-meta -->
		<?php endif; ?>
			<!-- <?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bharat' ) . '</span>', __( '1 Reply', 'bharat' ), __( '% Replies', 'bharat' ) ); ?>
				</div><!-- .comments-link 
			<?php endif; // comments_open() ?>-->

		</header><!-- .entry-header -->

		<?php if ( (is_search())  ||  (is_home()) ||  (is_archive()) ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
		<div class="bar">
			<div class="share">
				<!-- twitter -->
				<a class="share-twitter" onclick="window.open('http://twitter.com/home?status=<?php the_title_attribute(); ?> - <?php the_permalink() ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title_attribute(); ?> - <?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" target="blank"><i class="fa fa-twitter"></i></a>
				
				<!-- facebook -->
				<a class="share-facebook" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink() ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" target="blank"><i class="fa fa-facebook"></i></a>
				
				<!-- google plus -->
				<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink() ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink() ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><i class="fa fa-google-plus"></i></a>
				
				<!-- Linkedin -->
				<a onclick="MyWindow=window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title_attribute(); ?>&amp;source=<?php echo esc_url(home_url()); ?>','MyWindow','width=600,height=400'); return false;" title="Share on LinkedIn" style="cursor:pointer;" target="_blank" id="linkedin-share"><i class="fa fa-linkedin"></i></a>
				
				<!-- Pinterest -->
				<?php $thethumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<a onclick="MyWindow=window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&amp;media=<?php echo $thethumbnail; ?>&amp;description=<?php the_title_attribute(); ?>','MyWindow','width=600,height=400'); return false;" style="cursor:pointer;" target="_blank" id="pinterest-share"><i class="fa fa-pinterest"></i></a>
			</div><!-- share -->								
		</div>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bharat' ) ); ?>
					<div class="bar">
			<div class="share">
				<!-- twitter -->
				<a class="share-twitter" onclick="window.open('http://twitter.com/home?status=<?php the_title_attribute(); ?> - <?php the_permalink() ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title_attribute(); ?> - <?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" target="blank"><i class="fa fa-twitter"></i></a>
				
				<!-- facebook -->
				<a class="share-facebook" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink() ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" target="blank"><i class="fa fa-facebook"></i></a>
				
				<!-- google plus -->
				<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink() ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink() ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><i class="fa fa-google-plus"></i></a>
				
				<!-- Linkedin -->
				<a onclick="MyWindow=window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title_attribute(); ?>&amp;source=<?php echo esc_url(home_url()); ?>','MyWindow','width=600,height=400'); return false;" title="Share on LinkedIn" style="cursor:pointer;" target="_blank" id="linkedin-share"><i class="fa fa-linkedin"></i></a>
				
				<!-- Pinterest -->
				<?php $thethumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<a onclick="MyWindow=window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&amp;media=<?php echo $thethumbnail; ?>&amp;description=<?php the_title_attribute(); ?>','MyWindow','width=600,height=400'); return false;" style="cursor:pointer;" target="_blank" id="pinterest-share"><i class="fa fa-pinterest"></i></a>
			</div><!-- share -->								
		</div>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bharat' ), 'after' => '</div>' ) ); ?>
			
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<!-- <?php bharat_entry_meta(); ?> -->
			<?php edit_post_link( __( 'Edit', 'bharat' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'bharat_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'bharat' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'bharat' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->

