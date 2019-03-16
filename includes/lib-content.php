<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
/*
 *  lib-content.php
 *  functions related to displaying posts and pages
 */


if ( ! function_exists( 'weaverx_comment' ) ) {
function weaverx_comment( $comment, $args, $depth ) {
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own weaverx_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Weaver Xtreme 1.0
 */
// not needed: $GLOBALS['comment'] = $comment;

switch ( $comment->comment_type ) {
case 'pingback' :
case 'trackback' :
?>
<li class="pingback">
	<p><?php echo esc_html__( 'Pingback:', 'weaver-xtreme' ); ?><?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'weaver-xtreme' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
	break;

	default :
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="comment">
		<footer class="comment-meta">
			<div class="comment-author vcard">
				<?php
				$avatar_size = 40;
				if ( '0' != $comment->comment_parent ) {
					$avatar_size = 32;
				}

				echo get_avatar( $comment, $avatar_size );

				/* translators: 1: comment author, 2: date and time */
				printf( weaverx_filter_text( __( '%1$s on %2$s <span class="says">said:</span>', 'weaver-xtreme' ) ),
					sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
					sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( esc_html__( '%1$s at %2$s', 'weaver-xtreme' ), get_comment_date(), get_comment_time() )
					)
				);

				edit_comment_link( esc_html__( 'Edit', 'weaver-xtreme' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .comment-author .vcard -->

			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'weaver-xtreme' ); ?></em>
				<br/>
			<?php endif; ?>

		</footer>

		<div class="comment-content"><?php comment_text(); ?></div>
		<?php
		$rl = get_comment_reply_link( array_merge( $args, array( 'reply_text' => weaverx_filter_text( __( 'Reply <span>&darr;</span>', 'weaver-xtreme' ) ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
		if ( $rl != '' ) {
			?>
			<div class="reply">
				<?php echo $rl; ?>
			</div><!-- .reply -->
			<?php
		}
		?>
	</article><!-- #comment-## -->

	<?php
	break;
	} /* end switch */
	}
	} // ends check for weaverx_comment()
	//--


	if ( ! function_exists( 'weaverx_comments_popup_link' ) ) {
		function weaverx_comments_popup_link() {
			/* generate comment bubble for posts */
			if ( ( weaverx_getopt_checked( 'show_post_bubble' ) || weaverx_is_checked_post_opt( '_show_post_bubble' ) )
			     && comments_open() && ! post_password_required() ) {
				echo '<span class="comments-link comments-bubble">';
				comments_popup_link( '<span class="leave-reply">' . '&nbsp;' .
				                     '</span>', _x( '1', 'comments number', 'weaver-xtreme' ), _x( '%', 'comments number', 'weaver-xtreme' ) );
				echo '</span>';
			}
		}
	}
	//--

	if ( ! function_exists( 'weaverx_content_nav' ) ) {
		/**
		 * Display navigation to next/previous pages when applicable
		 */
		function weaverx_content_nav( $nav_id, $from_search = false ) {
			global $wp_query;

			if ( $wp_query->max_num_pages > 1 ) {
				?>
				<nav id="<?php echo $nav_id; ?>">
					<h3 class="assistive-text"><?php echo esc_html__( 'Post navigation', 'weaver-xtreme' ); ?></h3>
					<?php
					if ( weaverx_getopt( 'nav_style' ) == 'prev_next' ) {
						$prev = apply_filters( 'weaverx_older_posts', '<span class="meta-nav">&larr; </span>' . esc_html__( 'Previous Post', 'weaver-xtreme' ) );
						$next = apply_filters( 'weaverx_newer_posts', esc_html__( 'Next Post', 'weaver-xtreme' ) . '<span class="meta-nav">&rarr; </span>' );
						?>
						<div class="nav-previous"><?php next_posts_link( $prev ); ?></div>
						<div class="nav-next"><?php previous_posts_link( $next ); ?></div>
						<?php
					} elseif ( weaverx_getopt( 'nav_style' ) == 'paged_left' ) {
						echo( "\t<div class=\"nav-previous\">" );
						if ( function_exists( 'wp_pagenavi' ) ) {
							wp_pagenavi();
						} elseif ( function_exists( 'wp_paginate' ) ) {
							wp_paginate( 'title=' );
						} else {
							echo weaverx_get_paginate_archive_page_links( 'plain', 2, 3 );
						}
						echo "\t</div>\n";
					} elseif ( weaverx_getopt( 'nav_style' ) == 'paged_right' ) {
						echo( "\t<div class=\"nav-next\">" );
						if ( function_exists( 'wp_pagenavi' ) ) {
							wp_pagenavi();
						} elseif ( function_exists( 'wp_paginate' ) ) {
							wp_paginate( 'title=' );
						} else {
							echo weaverx_get_paginate_archive_page_links( 'plain', 2, 3 );
						}
						echo "\t</div>\n";
					} else {    // Older/Newer posts
						$prev = apply_filters( 'weaverx_older_posts', weaverx_filter_text( __( '<span class="meta-nav">&larr;</span> Older posts', 'weaver-xtreme' ) ) );
						$next = apply_filters( 'weaverx_newer_posts', weaverx_filter_text( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'weaver-xtreme' ) ) );
						?>
						<div class="nav-previous"><?php next_posts_link( $prev ); ?></div>
						<div class="nav-next"><?php previous_posts_link( $next ); ?></div>
					<?php } ?>
				</nav>
				<div class="clear-nav-id clear-both"></div><!-- #<?php echo $nav_id; ?> -->
				<?php
			}
		}
	}
	//--


	if ( ! function_exists( 'weaverx_continue_reading_link' ) ) {
		function weaverx_continue_reading_link() {
			/**
			 * Returns a "Continue Reading" link for excerpts
			 */

			$rep = weaverx_t_get( 'more_msg' );
			if ( ! $rep ) {
				$rep = weaverx_getopt( 'excerpt_more_msg' );
			}

			$rep = apply_filters( 'weaverx_more_message', $rep );

			if ( ! empty( $rep ) ) {
				$msg = '<span class="more-msg">' . $rep . '</span>';
			} else {
				$msg = weaverx_filter_text( __( '<span class="more-msg">Continue reading &rarr;</span>', 'weaver-xtreme' ) );
			}

			return ' <a class="more-link" href="' . esc_url( get_permalink() ) . '">' . $msg . '</a>';
		}
	}
	//--

	add_filter( 'weaverx_more_message', 'weaverx_more_message_filter' );
	function weaverx_more_message_filter( $msg ) {
		return do_shortcode( $msg );
	}

	if ( ! function_exists( 'weaverx_edit_link' ) ) {
		function weaverx_edit_link( $echo = 'echo' ) {

//	if ( is_customize_preview() ) {
//		$edit = '<strong><span class="edit-link-customizer">' . esc_html__('Close Customizer to enable Edit.', 'weaver_xtreme' ) . '</span></strong>';
//	} else {
			$before     = '<span class="edit-link">';
			$after      = '</span>';
			$link_label = esc_html__( 'Edit', 'weaver-xtreme' );
			$id         = 0;

			if ( ! $post = get_post( $id ) ) {
				return;
			}

			if ( ! $url = get_edit_post_link( $post->ID ) ) {
				return;
			}

			$post_type_obj = get_post_type_object( $post->post_type );
			$link          = '<a class="post-edit-link" href="' . $url . '" title="' . esc_attr( $post_type_obj->labels->edit_item ) . '">' . $link_label . '</a>';
			$flink         = apply_filters( 'edit_post_link', $link, $post->ID );
			if ( ! $flink ) {
				$flink = $link;
			}                    // some https vs http bug in WP
			$edit = $before . $flink . $after;


			$is_elementor = ! ! get_post_meta( $post->ID, '_elementor_edit_mode', true );

			if ( $is_elementor ) {
				$link_label = esc_html__( 'Edit with Elementor', 'weaver-xtreme' );

				$eurl  = str_replace( 'action=edit', 'action=elementor', $url );
				$after = $after . "\n<!-- url: {$url} eurl: {$eurl} -->";
				$link  = '<a class="post-edit-link post-edit-link-builder" href="' . $eurl . '" title="' . esc_attr( $post_type_obj->labels->edit_item ) . '">' . $link_label . '</a>';
				$flink = apply_filters( 'edit_post_link', $link, $post->ID );
				if ( ! $flink ) {
					$flink = $link;
				}                    // some https vs http bug in WP
				$edit .= $before . $flink . $after;
			}
//	}


			if ( 'echo' == $echo ) {
				echo $edit;
			} else {
				return $edit;
			}
		}
	}
	//--

	if ( ! function_exists( 'weaverx_get_wp_custom_logo' ) ) {
		/**
		 * Displays the optional custom logo.
		 *
		 * Does nothing if the custom logo is not available.
		 *
		 */
		function weaverx_get_wp_custom_logo() {
			if ( function_exists( 'the_custom_logo' ) ) {
				return get_custom_logo();
			}

			return '';
		}
	}

	if ( ! function_exists( 'weaverx_get_wp_custom_logo_url' ) ) {
		/**
		 * Displays the optional custom logo.
		 *
		 * Does nothing if the custom logo is not available.
		 *
		 */
		function weaverx_get_wp_custom_logo_url( $size = 'full' ) {

			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image          = '';

			// We have a logo. Logo is go.
			if ( $custom_logo_id ) {
				$image = wp_get_attachment_image_url( $custom_logo_id, $size );
			}

			return $image;
		}
	}

	if ( ! function_exists( 'weaverx_entry_header' ) ) {
		function weaverx_entry_header( $format_title = '', $do_excerpt = false ) {
			/* display entry header ( title ) for posts */

			$arg = ( $do_excerpt ) ? 'post_excerpt' : 'post_full';

			weaverx_fi( $arg, 'title-before' );

			$lead = '<h2 ' . weaverx_title_class( 'post_title', false, 'post-title entry-title' ) . weaverx_schema( 'headline' ) . '>';
			if ( $format_title != '' && ! weaverx_getopt( 'hide_post_format_icon' ) && ! weaverx_is_checked_post_opt( '_pp_hide_post_format_label' ) ) {
				$icon = "<span class=\"post-format-icon genericon genericon-{$format_title}\"></span>";
				$lead .= $icon;
			}

			weaverx_post_title( $lead, '</h2>' );
		}
	}
	//--


	if ( ! function_exists( 'weaverx_post_title' ) ) {
// display the post title
		function weaverx_post_title( $before = '', $after = '' ) {

			if ( weaverx_is_checked_post_opt( '_pp_hide_post_title' ) || weaverx_t_get( 'hide_title' ) ) {
				return;
			}

			echo( $before );
			$title = the_title( '', '', false );
			?>
			<a href="<?php esc_url( the_permalink() ); ?>" title="<?php printf( esc_attr( esc_html__( 'Permalink to %s', 'weaver-xtreme' ) ),
				the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $title; ?></a>
			<?php
			echo( $after . "\n" );

		}
	} // if weaverx_post_title
	//--


	if ( ! function_exists( 'weaverx_link_pages' ) ) {
		function weaverx_link_pages() {
			wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'weaver-xtreme' ) . '</span>', 'after' => '</div>' ) );
		}
	}
	//--


	if ( ! function_exists( 'weaverx_not_found_search' ) ) {
		function weaverx_not_found_search( $file_name ) {
			?>
			<article id="post-0" class="post no-results not-found">
				<header class="page-header">
					<h1 class="page-title entry-title title-search"><?php echo esc_html__( 'Nothing Found', 'weaver-xtreme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content clearfix">
					<p>
						<?php
						if ( ! weaverx_getopt( '_hide_not_found_search' ) ) {
						echo esc_html__( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'weaver-xtreme' );
						?>
					</p>
					<p>
						<?php
						get_search_form();
						}
						?>
					</p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
			<?php
		}
	}
	//--


	function weaverx_url_grabber() {
		/**
		 * Return the URL for the first link found in the post content.
		 */
		if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) ) {
			return false;
		}

		return esc_url_raw( $matches[1] );
	}

	//--

	// ------------------------------------- POST META INFO -----------------------------------

	if ( ! function_exists( 'weaverx_format_posted_on_footer' ) ) {
		function weaverx_format_posted_on_footer( $who ) {
			if ( weaverx_is_checked_post_opt( '_pp_hide_bottom_post_meta' ) || weaverx_is_checked_page_opt( '_pp_hide_infobottom' ) ) {
				weaverx_edit_link();

				return;
			}
			?>
			<footer class="entry-utility">
				<?php weaverx_posted_on();
				if ( comments_open() ) {
				$msg   = apply_filters( 'weaverx_leave_reply_blog', esc_html__( 'Leave a reply', 'weaver-xtreme' ) );
				$r1    = apply_filters( 'weaverx_reply_1', weaverx_filter_text( __( '<b>1</b> Reply', 'weaver-xtreme' ) ) );
				$rmany = apply_filters( 'weaverx_reply_many', weaverx_filter_text( __( '<b>%</b> Replies', 'weaver-xtreme' ) ) );
				echo '<span ' . weaverx_meta_info_class( 'post_info_bottom' ) . '><span class="comments-link">';
				comments_popup_link( '<span class="leave-reply">' . '&nbsp;&nbsp;' . $msg . '</span>', $r1,
					$rmany ); ?></span></span>

				<?php
				}
				weaverx_edit_link();
				?>
			</footer><!-- #entry-utility -->
			<?php
		}
	}
	//--


	if ( ! function_exists( 'weaverx_meta_info_class' ) ) {
		function weaverx_meta_info_class( $who ) {
			// 'post_hide_date', 'post_hide_author', 'post_hide_categories', 'hide_singleton_category', 'post_hide_tags'

			$class = 'meta-info-wrap';

			if ( weaverx_getopt( 'post_hide_date' ) ) {        // check for hide various elements
				$class .= ' post-hide-date';
			}
			if ( weaverx_getopt( 'post_hide_author' ) ) {        // check for hide various elements
				$class .= ' post-hide-author';
			}
			if ( weaverx_getopt( 'post_hide_categories' ) ) {        // check for hide various elements
				$class .= ' post-hide-categories';
			}
			if ( weaverx_getopt( 'hide_singleton_category' ) ) {       // check for hide various elements
				$class .= ' post_hide_single_cat';
			}
			if ( weaverx_getopt( 'post_hide_tags' ) ) {        // check for hide various elements
				$class .= ' post-hide-tags';
			}
			if ( weaverx_getopt( 'hide_permalink' ) ) {        // check for hide various elements
				$class .= ' post-hide-permalink';
			}

			if ( $class != 'meta-info-wrap' || weaverx_getopt( 'post_icons' ) == 'fonticons' || weaverx_getopt( 'post_icons' ) == 'graphics' ) {
				if ( weaverx_getopt( 'post_icons' ) != 'graphics' ) {
					$class .= ' entry-meta-gicons ';
				} else {
					$class .= ' entry-meta-icons';
				}
			}

			$class .= weaverx_text_class( $who, true );


			return 'class="' . trim( $class ) . '"';
		}
	}
	//--


	if ( ! function_exists( 'weaverx_post_bottom_info' ) ) {
		function weaverx_post_bottom_info( $type = '' ) {
			/**
			 * Prints HTML with meta information for the bottom meta line.
			 */
			weaverx_posted_in( $type );
		}
	}
	//--


	if ( ! function_exists( 'weaverx_posted_in' ) ) {
		function weaverx_posted_in( $type = '' ) {
			/**
			 * Prints HTML with meta information for the current post-date/time and author.
			 * Create your own weaverx_posted_in to override in a child theme
			 */

			if ( weaverx_getopt_checked( 'post_info_hide_bottom' )
			     || weaverx_is_checked_post_opt( '_pp_hide_bottom_post_meta' )
			     || weaverx_is_checked_page_opt( '_pp_hide_infobottom' )
			     || weaverx_t_get( 'hide_bottom_info' ) ) {    // hide bottom?
				weaverx_edit_link();

				return;
			}

			if ( weaverx_is_checked_page_opt( '_pp_hide_infobottom' )
			     && ! weaverx_t_get( 'showposts' ) ) {
				return;
			}

			$pi = "\n<div " . weaverx_meta_info_class( 'post_info_bottom' ) . ">\n";

			if ( $type == 'single' ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'weaver-xtreme' ) );

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'weaver-xtreme' ) );

				if ( $categories_list ) {
					$cat_count = count( get_the_category() );
					if ( $cat_count < 2 && weaverx_getopt_checked( 'hide_singleton_category' ) ) {
						$pi .= "\t\t\t<span class=\"cat-links post_hide-singleton-category\">\n";
					} else {
						$pi .= "\t\t\t<span class=\"cat-links\">\n";
					}
					$pi .= sprintf( weaverx_filter_text( __( '<span class="%1$s">Posted in</span> %2$s', 'weaver-xtreme' ) ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );

					$pi .= "\t\t\t</span>\n";

				} // End if categories
				/* translators: used between list items, there is a space after the comma */

				if ( $tags_list ) {
					$pi .= "\t\t\t<span class=\"tag-links\">\n";
					$pi .= sprintf( weaverx_filter_text( __( '<span class="%1$s">Tagged</span> %2$s', 'weaver-xtreme' ) ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
					$pi .= "\t\t\t</span>\n";
				} // End if $tags_list

				$pi .= '<span class="permalink-icon"><a href="' . esc_url( get_permalink() ) . '" title="Permalink to ' . the_title_attribute( array( 'echo' => false ) ) .
				       '" rel="bookmark">' . esc_html__( 'permalink', 'weaver-xtreme' ) . '</a></span>';


				$pi .= weaverx_edit_link( 'noecho' );

			} elseif ( $type == 'reply' ) {
				$dummy = true;
			} else {    // else not single
				$show_sep = false;
				if ( 'page' != get_post_type() ) { // Hide category and tag text for pages on Search

					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'weaver-xtreme' ) );
					$cat_count       = count( get_the_category() );
					$skip            = ( $cat_count < 2 && weaverx_getopt_checked( 'hide_singleton_category' ) );
					if ( $categories_list && ! $skip ) {
						$pi       .= '<span class="cat-links">';
						$pi       .= sprintf( weaverx_filter_text( __( '<span class="%1$s">Posted in</span> %2$s', 'weaver-xtreme' ) ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
						$show_sep = true;
						$pi       .= '</span>';
					} // End if categories
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', esc_html__( ', ', 'weaver-xtreme' ) );
					if ( $tags_list ) {
						if ( $show_sep ) {
							$pi .= '<span class="sep"> | </span>';
						} // End if $show_sep
						$pi       .= '<span class="tag-links">';
						$pi       .= sprintf( weaverx_filter_text( __( '<span class="%1$s">Tagged</span> %2$s', 'weaver-xtreme' ) ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
						$show_sep = true;
						$pi       .= '</span>';
					} // End if $tags_list
				} // End if 'page' != get_post_type()

				if ( comments_open() ) {
					if ( $show_sep ) {
						$pi .= '<span class="sep"> | </span>';
					} // End if $show_sep
					$pi .= '<span class="comments-link">';
					ob_start();     // yuck - why doesn't WP make all the utilities have an echo option??
					comments_popup_link( '<span class="leave-reply">' . esc_html__( 'Leave a reply', 'weaver-xtreme' ) . '</span>', weaverx_filter_text( __( '<b>1</b> Reply', 'weaver-xtreme' ) ),
						weaverx_filter_text( __( '<b>%</b> Replies', 'weaver-xtreme' ) ) );
					$pi .= ob_get_clean();
					$pi .= '</span>';

				} // End if comments_open()
				$pi .= weaverx_edit_link( 'noecho' );
			}    // end non-single
			$pi .= "\n</div><!-- .entry-meta-icons -->\n";
			echo apply_filters( 'weaverx_posted_in', $pi, $type );
		}
	}
	//--


	if ( ! function_exists( 'weaverx_posted_on' ) ) {
		function weaverx_posted_on( $type = '' ) {
			/**
			 * Prints HTML with meta information for the current post-date/time and author.
			 * Create your own weaverx_posted_on to override in a child theme
			 */

			if ( weaverx_getopt_checked( 'post_info_hide_top' )
			     || weaverx_is_checked_post_opt( '_pp_hide_top_post_meta' )
			     || weaverx_is_checked_page_opt( '_pp_hide_infotop' )
			     || weaverx_t_get( 'hide_top_info' ) ) {    // hide top?
				return;
			}

			if ( weaverx_is_checked_page_opt( '_pp_hide_infotop' )
			     && ! weaverx_t_get( 'showposts' ) ) {
				return;
			}

			$po = "<span " . weaverx_meta_info_class( 'post_info_top' ) . ">\n";
			if ( ( weaverx_getopt_default( 'show_post_avatar', 'hide' ) == 'start' )
			     || weaverx_is_checked_post_opt( '_pp_show_post_avatar' )
			     || weaverx_t_get( 'show_avatar' ) ) {
				$po .= '<span class="post-avatar post-avatar-start">';
				$po .= get_avatar( get_the_author_meta( 'user_email' ), weaverx_getopt_default( 'post_avatar_int', 28 ), null, 'avatar' );
				$po .= '</span>';
			}


			$po .= sprintf( weaverx_filter_text( __( '<span class="sep posted-on">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'weaver-xtreme' ) ),
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				sprintf( esc_attr( esc_html__( 'View all posts by %s', 'weaver-xtreme' ) ), get_the_author() ),
				weaverx_get_the_author()
			);


			// updated time changed 3.1.11 to handle published as well. Can't mess with messages because of translations.

			if ( get_the_time( 'Y/m/d' ) !== get_the_modified_time( 'Y/m/d' ) ) {    // get original and modified dates - ignore revisions on same day
				$time_string = '<time class="updated" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . get_the_modified_date() . '</time>';
			} else {
				$time_string = '<time class="published updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . get_the_date() . '</time>';
			}

			$po .= $time_string;     // required for Google Structured Data

			if ( weaverx_getopt_default( 'show_post_avatar', 'hide' ) == 'end' ) {
				$po .= '<span class="post-avatar post-avatar-end">';
				$po .= get_avatar( get_the_author_meta( 'user_email' ), weaverx_getopt_default( 'post_avatar_int', 28 ), null, 'avatar' );
				$po .= '</span>';
			}
			$po .= "\n</span><!-- .entry-meta-icons -->";
			echo apply_filters( 'weaverx_posted_on', $po, $type );
		}
	}
	//--


	if ( ! function_exists( 'weaverx_post_top_meta' ) ) {
		function weaverx_post_top_meta( $type = '' ) {
			/**
			 * Prints HTML with meta information for the top meta line.
			 */
			// $type for single
			echo "<div class=\"entry-meta \">\n";
			echo weaverx_schema( 'published' );
			weaverx_posted_on( $type );
			weaverx_comments_popup_link();
			echo "</div><!-- /entry-meta -->\n";
		}
	}
	//--

	function weaverx_per_post_style() {
		// Emit a <style> for this post
		do_action( 'weaverx_per_post', get_the_ID() );
	}

	// ------------------------------------- TITLES -----------------------------------


	if ( ! function_exists( 'weaverx_archive_title' ) ) {
		function weaverx_archive_title( $title = '', $type, $extra = '' ) {
			// The page title for archive-like pages
			// $type is for type of the archive - could be used to show icon

			if ( ! $title ) {
				$title = the_title( '', '', false );
			}
			?>
			<h1 class="page-title archive-title entry-title title-<?php echo $type . $extra; ?>"><span<?php echo weaverx_title_class( 'archive_title' ) . '>' . $title; ?></span></h1>
			<?php
		}
	}
	//--


	if ( ! function_exists( 'weaverx_page_title' ) ) {
		function weaverx_page_title( $title = '' ) {
			// The page title

			if ( ! $title ) {
				$title = the_title( '', '', false );
			}
			if ( ! weaverx_is_checked_page_opt( '_pp_hide_page_title' ) ) {
				?>
				<header class="page-header">
					<?php weaverx_fi( 'page', 'title-before' ); ?>
					<h1<?php echo weaverx_title_class( 'page_title', false, 'page-title entry-title' ) . weaverx_schema( 'headline' ) . '>' . $title; ?></h1>
				</header><!-- .page-header -->
				<?php
			}
		}
	}
	//--


	if ( ! function_exists( 'weaverx_single_title' ) ) {
	function weaverx_single_title( $title = '' ) {
	// The page title for single view page
	if ( weaverx_is_checked_post_opt( '_pp_hide_post_title' ) || weaverx_t_get( 'hide_title' ) ) {
		return;
	}
	if ( ! $title ) {
		$title = the_title( '', '', false );
	}
	?>
	<header class="page-header">
		<?php weaverx_fi( 'post', 'title-before' ); ?>
		<h1 class="page-title entry-title title-single <?php echo weaverx_title_class( 'post_title', true ) . '"' . weaverx_schema( 'headline' ) . '>' . $title; ?></h1>
		<?php weaverx_post_top_meta( 'single' ); ?>
	</header><!-- .page-header -->
<?php
		}
		}
		//--


		if ( ! function_exists( 'weaverx_fi' ) ) {
			function weaverx_fi( $who, $where ) {
				// Emit Featured Image depending on settings and who and where called from
				// $who includes: post, page, post_excerpt, post_full

				$hide = weaverx_getopt( $who . '_fi_hide' );

				if ( $hide == 'hide' || weaverx_t_get( 'hide_featured_image' ) || ! has_post_thumbnail() ) // hide all or no FI
				{
					return false;
				}

				$show = '';

				if ( $where != 'title_featured' &&
				     ( weaverx_get_per_page_value( '_pp_wvrx_pwp_type' ) == 'title'
				       || weaverx_get_per_page_value( '_pp_wvrx_pwp_type' ) == 'title_featured'
				       || weaverx_t_get( 'show' ) == 'title'
				       || weaverx_t_get( 'show' ) == 'title_featured'
				     )
				) {
					return false;
				} elseif ( $where == 'title_featured' ) {
					$show = $where;
				}


				if ( ! $show ) {
					if ( $who == 'page' ) // || $who == 'post_full' )
					{
						$show = weaverx_get_per_page_value( '_pp_fi_location' );
					} elseif ( isset( $GLOBALS['weaverx_page_who'] ) && $GLOBALS['weaverx_page_who'] == 'single' ) {
						$show = weaverx_get_per_post_value( '_pp_fi_location' );
					} else {
						$show = weaverx_get_per_post_value( '_pp_post_fi_location' );
					}
				}


				if ( ! $show ) {
					$show = weaverx_getopt_default( $who . '_fi_location', 'content-top' );
				}    // 'page' or 'post'
				elseif ( $show == 'hide' ) {
					return false;
				}


				if ( $where == 'post-pre' && strpos( $show, 'post-bg' ) !== false ) {    // showing a BG image
					$before     = '<style type="text/css">';
					$after      = '</style>';
					$image      = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );        // ( url, width, height )
					$hdr        = $image[0];
					$hdr_height = $image[2];
					$hdr_width  = $image[1];

					// wp customizer preview hack for WP 4.4 beta, might go away for 4.4 release
					$url = get_template_directory_uri();
					$url = str_replace( array( 'http://', 'https://' ), '', $url );
					$hdr = str_replace( '%s', $url, $hdr );        // 4.4 preview breaks this
					$hdr = str_replace( array( 'http://', 'https://' ), '//', $hdr );
					if ( $who == 'page' ) {
						$selector = '#container';
					} elseif ( $who == 'post' && $where == 'post-pre' ) {
						$selector = '#post-' . get_the_ID() . '{background-color:transparent;}' . '#container';
					} else {
						$selector = '#post-' . get_the_ID();
					}

					$style = '';
					switch ( $show ) {
						case 'post-bg-parallax':

						case 'post-bg-parallax-full':                // previous: background-repeat: no-repeat; background-position: center center; background-attachment: fixed;
							$style = "background-image:url( {$hdr} );";  // parallax full - use in conjunction with .wvrx-parallax
							break;

						case 'post-bg':
							$style = "background:url( {$hdr} ) repeat;background-color:transparent;"; // tile vertically
							break;

						case 'post-bg-cover':        // cover - responsive
							$style = "background:url( {$hdr} );background-repeat:no-repeat;background-position:center center;
background-size:cover;background-color:transparent;box-sizing:border-box;"; // cover
							break;

						default:        // no others
							break;
					}

					// echo "{$before}{$selector}{ {$style} }{$after}\n";
					if ( $style ) {
						weaverx_inline_style( "{$before}{$selector}{ {$style} }{$after}\n", 'weaverx-fi:lib-content.php' );
					}


					return true;
				} // end as bg image

				//weaverx_alert( 'in fi - who: ' . $who . ' where: ' . $where . ' show: ' . $show );


				//$align = ( $where == 'title_featured' ) ? 'fi-alignleft' : weaverx_getopt_default( $who . '_fi_align' , 'fi-alignleft' );

				$align = weaverx_getopt_default( $who . '_fi_align', 'fi-alignleft' );

				$before = '';
				if ( $where == 'post-pre' ) {
					$align  .= '-pb';    // need to be able to fixup alignment for small devices
					$before = '<div class="clear-post-before clear-both"></div>';
				}

				$fi_class = 'featured-image fi-' . $who . '-' . $where . ' fi-' . $show . ' ' . $hide . ' ' . $align; // construct fi class

				$attr = array( 'class' => $fi_class );

				// add width if defined

				$w = weaverx_getopt( $who . '_fi_width' );
				if ( $w ) {
					$attr['style'] = 'width:' . $w . '%';
				}

				//weaverx_alert( 'in fi - who: ' . $who . ' where: ' . $where . ' show: ' . $show );

				if ( $show == $where || ( $show == 'post-before' && $where == 'post-pre' ) || ( $show == 'title-banner' && $where == 'title-before' ) ) {

					if ( $show == 'header-image' ) {            // special case : header replacement area
						$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );        // ( url, width, height )
						if ( ! $image ) {
							return false;
						}

						return $image[0];                // let the header code handle the details...
					}

					$size = weaverx_getopt_default( $who . '_fi_size', 'thumbnail' );
					// weaverx_debug_comment( 'FI who:' . $who . ' FI size:' . $size );

					if ( get_post_thumbnail_id() ) {
						if ( ( $href = weaverx_get_per_post_value( '_pp_fi_link' ) ) == '' ) {        // per page link override?
							if ( $who == 'post_excerpt' ) {
								$href = esc_url( get_permalink() );
							} else {
								$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );        // ( url, width, height )
								$href  = esc_url( $image[0] );
							}
						}

						$fi_img = weaverx_schema( 'image', get_the_post_thumbnail( null, $size, $attr ) );

						$fi_after = apply_filters( 'weaverx_fi_after', '' );        // added 3.1.10

						if ( $who == 'page' && weaverx_getopt( 'page_fi_nolink' ) ) {
							$the_fi = "\n{$before}{$fi_img}{$fi_after}\n";
						} elseif ( $who != 'page' && weaverx_getopt( 'post_fi_nolink' ) ) {
							$the_fi = "\n{$before}{$fi_img}{$fi_after}\n";
						} else {
							$the_fi = "\n{$before}<a class=\"wvrx-fi-link\" href=\"{$href}\">{$fi_img}</a>{$fi_after}\n";
						}

						/* else if ( $who == 'page' ){
							$link = weaverx_getopt( 'page_fi_altlink' );
							if ( $link != '' )
								$href = $link;
							$the_fi = "\n{$before}<a class=\"wvrx-fi-link\" href=\"{$href}\">{$fi_img}</a>{$fi_after}\n";
						} else {		// not a page
							$link = weaverx_getopt( 'post_fi_altlink' );
							if ( $link != '' )
								$href = $link;
								$the_fi = "\n{$before}<a class=\"wvrx-fi-link\" href=\"{$href}\">{$fi_img}</a>{$fi_after}\n";
						} */

						echo apply_filters( 'weaverx_fi_link', $the_fi, $before, $href, $fi_img, $who, $fi_after );  // Added 3.1.5; Changed 3.1.11 to add the $fi_after

						if ( $show == 'title-banner' ) {
							echo '<div class="clear-both"></div>';
						}

						return false;
					}
				}

				return false;
			}
		}
		//--


		function weaverx_the_page_content( $who = '' ) {

			weaverx_fi( $who, 'content-top' );
			weaverx_the_contnt();
			weaverx_fi( $who, 'content-bottom' );
		}

		//--


		function weaverx_the_contnt() {
			if ( ( weaverx_is_checked_page_opt( '_pp_raw_html' ) && ! weaverx_t_get( 'showposts' ) ) || weaverx_is_checked_post_opt( '_pp_raw_html' ) ) {
				remove_filter( 'the_content', 'wpautop' );
				remove_filter( 'the_content', 'wptexturize' );
			}
			the_content( weaverx_continue_reading_link() );
		}

		//--


		// ========================= special content =========================

		function weaverx_post_div( $type = 'content' ) {
			// echo the start <div> for posts
			// include columns class if set
			$class = '';
			$cols  = weaverx_getopt( 'post_cols' );
			if ( $cols != '' && $cols != '1' ) {
				$class = ' cols-' . $cols;
			}
			echo '    <div class="entry-' . $type . ' clearfix' . $class . '"' . weaverx_schema( 'entry-' . $type ) . '>' . "\n";
		}

		function weaverx_the_post_full() {

			if ( weaverx_is_checked_post_opt( '_pp_force_post_excerpt' ) && ! weaverx_is_checked_post_opt( '_pp_force_post_full' ) ) {
				// check both values - force_excerpt and force_full -  here to avoid recursion
				weaverx_the_post_excerpt();
				return;
			}

			weaverx_fi( 'post_full', 'content-top' );

			weaverx_the_contnt();

			weaverx_fi( 'post_full', 'content-bottom' );
		}

		//--


		function weaverx_the_post_excerpt() {

			if ( weaverx_is_checked_post_opt( '_pp_force_post_full' ) ) {
				weaverx_the_post_full();

				return;
			}

			weaverx_fi( 'post_excerpt', 'content-top' );

			the_excerpt( 'more...' );

			weaverx_fi( 'post_excerpt', 'content-bottom' );
		}

		//--


		function weaverx_the_post_full_single() {
			global $page;

			if ( $page <= 1 ) {
				weaverx_fi( 'post', 'content-top' );
			}

			weaverx_the_contnt();

			if ( $page <= 1 ) {
				weaverx_fi( 'post', 'content-bottom' );
			}
		}

		//--


		function weaverx_show_only_title() {

			//echo "\n <!-- ********* end of a post ********** -->\n";

			if ( ! weaverx_t_get( 'showposts' )
			     && ( weaverx_get_per_page_value( '_pp_wvrx_pwp_type' ) == 'title'
			          || weaverx_t_get( 'show' ) == 'title'
			     )
			) {
				echo weaverx_schema( 'mainEntityOfPage' );
				echo "\t</article><!-- /#post -->\n";

				return true;
			} elseif ( ! weaverx_t_get( 'showposts' )
			           && ( weaverx_get_per_page_value( '_pp_wvrx_pwp_type' ) == 'title_featured'
			                || weaverx_t_get( 'show' ) == 'title_featured'
			           )
			) {
				weaverx_fi( 'post_excerpt', 'title_featured' );            // show FI
				//echo "\t</article><!-- /#post; --><div style='clear:both'></div>\n";
				echo weaverx_schema( 'mainEntityOfPage' );
				echo "\t</article><!-- /#post; -->\n";

				return true;
			} elseif ( weaverx_t_get( 'showposts' ) && weaverx_t_get( 'show' ) == 'title_featured' ) {
				weaverx_fi( 'post_excerpt', 'title_featured' );            // show FI
				echo weaverx_schema( 'mainEntityOfPage' );
				echo "\t</article><!-- /#post. --><div class='clear-both'></div>\n";

				return true;
			} elseif ( weaverx_t_get( 'showposts' ) && ( weaverx_t_get( 'show' ) == 'title' || weaverx_t_get( 'show' ) == 'titlelist' ) ) {
				echo weaverx_schema( 'mainEntityOfPage' );
				echo "\t</article><!-- /#post -->\n";

				return true;
			}

			return false;
		}

		//--


		function weaverx_do_excerpt() {
			// return true if this kind of page should be excerpted

			if ( weaverx_t_get( 'show' ) == 'excerpt' )   // for Weaver Xtreme Plus
			{
				return true;
			}

			if ( weaverx_t_get( 'show' ) == 'full' )   // for Weaver Xtreme Plus
			{
				return false;
			}

			if ( weaverx_is_checked_post_opt( '_pp_force_post_excerpt' ) ) {
				return true;
			}

			if ( weaverx_is_checked_post_opt( '_pp_force_post_full' ) ) {
				return false;
			}

			$n1 = weaverx_get_per_page_value( '_pp_fullposts' );
			if ( ! $n1 ) {
				$n1 = weaverx_getopt( 'fullpost_first' );
			}

			if ( $n1 ) {
				global $page, $paged;
				if ( ! ( $paged >= 2 || $page >= 2 )
				     && weaverx_post_count() <= $n1 ) {
					return false;
				}
			}

			$pwp = weaverx_get_per_page_value( '_pp_wvrx_pwp_type' );

			if ( $pwp == 'full' )    // need to check before archive/search
			{
				return false;
			}    // override global setting
			if ( $pwp == 'excerpt' ) {
				return true;
			}    // override global setting

			if ( is_search() ) {
				return ! weaverx_getopt_checked( 'fullpost_search' );
			}
			if ( is_archive() ) {
				return ! weaverx_getopt_checked( 'fullpost_archive' );
			}

			return ! weaverx_getopt_checked( 'fullpost_blog' );
		}

		//--

		function weaverx_inline_style( $style, $who ) {
			echo $style;
		}

		function weaverx_author_info() {
		if ( get_the_author_meta( 'description' ) && ! weaverx_getopt( 'hide_author_bio' ) ) { // If a user has filled out their description, show a bio on their entries ?>
		<div class='clear-both'></div>
		<div id=" author-info">
		<div id="author-description">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'weaverx_author_bio_avatar_size', 75 ) ); ?>
			</div><!-- #author-avatar -->
			<p class="author-title"><?php printf( esc_html__( 'About %s', 'weaver-xtreme' ), get_the_author() ); ?></p>
			<p><?php the_author_meta( 'description' ); ?></p>
			<div id="author-link">
				<span class="vcard author post-author"><span class="fn">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( esc_html__( 'View all posts by %s', 'weaver-xtreme' ), weaverx_get_the_author() ); ?>
					</a></span></span>
			</div><!-- #author-link	-->
		</div><!-- #author-description -->
		</div><!-- #author-info -->

		<?php }
		}



		// ------------------------------------- FILTERS -----------------------------------


		function weaverx_auto_excerpt_more( $more ) {
			/**
			 * Replaces "[...]" ( appended to automatically generated excerpts ) with an ellipsis and weaverx_continue_reading_link().
			 *
			 * To override this in a child theme, remove the filter and add your own
			 * function tied to the excerpt_more filter hook.
			 */
			return ' <span class="excerpt-dots">&hellip;</span>' . weaverx_continue_reading_link();
		}

		add_filter( 'excerpt_more', 'weaverx_auto_excerpt_more' );


		function weaverx_custom_excerpt_more( $output ) {
			/**
			 * Adds a pretty "Continue Reading" link to custom post excerpts.
			 *
			 * To override this link in a child theme, remove the filter and add your own
			 * function tied to the get_weaverx_the_post_excerpt filter hook.
			 */

			if ( has_excerpt() && ! is_attachment() ) {
				$output .= weaverx_continue_reading_link();
			}

			return $output;
		}

		add_filter( 'the_excerpt', 'weaverx_custom_excerpt_more' );


		function weaverx_the_excerpt_filter( $excerpt ) {    // filter definition
			return do_shortcode( $excerpt );
		}

		add_filter( 'the_excerpt', 'weaverx_the_excerpt_filter', 10, 1 );



		function weaverx_trim_excerpt( $text = '' ) {
			$raw_excerpt = $text;
			if ( '' == $text ) {
				$text          = get_the_content( '' );
				$orig_text_len = strlen( $text );

				$text = strip_shortcodes( $text );
				// $stripped_text_len = strlen( $text );

				$text              = apply_filters( 'the_content', $text );
				$text              = str_replace( ']]>', ']]&gt;', $text );
				$excerpt_length    = apply_filters( 'excerpt_length', 55 );
				$excerpt_more      = apply_filters( 'excerpt_more', ' ' . '[...]' );
				$text              = wp_trim_words( $text, $excerpt_length, $excerpt_more );
				$stripped_text_len = strlen( $text );
			}
			if ( '' == $raw_excerpt && $orig_text_len > $stripped_text_len && get_post_format() == '' && ! empty( $excerpt_more ) ) {    // have stripped shortcodes
				if ( strpos( $text, $excerpt_more ) === false ) {
					$text .= $excerpt_more;
				}
			}

			return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
		}
		//--

		remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
		add_filter( 'get_the_excerpt', 'weaverx_trim_excerpt' );


		?>
