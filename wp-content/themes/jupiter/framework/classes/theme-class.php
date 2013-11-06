<?php

class theme_class {


	/* Header Toolbar Navigation */
	function header_toolbar_menu() {
		wp_nav_menu( array(
				'theme_location' => 'toolbar-menu',
				'container' => 'nav',
				'container_id' => 'mk-toolbar-navigation',
				'container_class' => 'mk_toolbar_menu',
				'fallback_cb' => '',
			) );
	}


	/* Primary Navigation */
	function primary_menu() {
		wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'container' => 'nav',
				'container_id' => 'mk-main-navigation',
				'container_class' => 'main_menu',
				'menu_class' => 'main-navigation-ul',
				'fallback_cb' => '',
				'walker' => new rc_scm_walker
			) );
	}


	/* Footer Navigation */
	function footer_menu() {
		wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'container' => 'nav',
				'container_id' => 'mk-footer-navigation',
				'container_class' => 'footer_menu',
				'fallback_cb' => '',
			) );
	}





	/* Create Sidebar Widgets */
	function sidebar( $post_id = NULL ) {
		sidebar_generator( 'get_sidebar', $post_id );
	}










	/* Create Footer Widgets */
	function footer_sidebar() {
		sidebar_generator( 'get_footer_sidebar' );
	}



	function header_toolbar_contact() {
		$mk_options = theme_option( THEME_OPTIONS );

		if ( !empty( $mk_options['header_toolbar_phone'] ) ) {
			echo '<span class="header-toolbar-contact"><i class="mk-icon-phone-sign"></i>'.stripslashes( $mk_options['header_toolbar_phone'] ).'</span>';
		}
		if ( !empty( $mk_options['header_toolbar_email'] ) ) {
			echo '<span class="header-toolbar-contact"><i class="mk-icon-envelope-alt"></i><a href="mailto:'.antispambot( $mk_options['header_toolbar_email'] ).'">'.antispambot( $mk_options['header_toolbar_email'] ).'</a></span>';
		}

	}


	function mk_header_search() {
?>
	<div id="mk-header-search">
      <form class="mk-header-searchform" method="get" id="mk-header-searchform" action="<?php echo home_url();  ?>">
        <span>
        <input type="text" class="text-input on-close-state" value="" name="s" id="s" placeholder="<?php _e( 'Search..', 'mk_framework' ); ?>" />
        <i class="mk-icon-search"><input value="" type="submit" class="header-search-btn" /></i>
        </span>
    </form>
    </div>
	<?php
	}



	function custom_logo() {
		$mk_options = theme_option( THEME_OPTIONS );
		if ( !empty( $mk_options['logo'] ) ) {
?>
<div class="header-logo <?php echo $mk_options['logo_position'];?>-logo">
    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $mk_options['logo']; ?>" /></a>
</div>

<?php } else { ?>
<div class="header-logo <?php echo $mk_options['logo_position'];?>-logo">
    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo THEME_IMAGES; ?>/jupiter-logo.png" /></a>
</div>
<?php }
	}



	function main_nav_side_search() {

		$mk_options = theme_option( THEME_OPTIONS );

		?>

		<div class="main-nav-side-search">

			<a class="mk-search-trigger mk-toggle-trigger" href="#"><i class="mk-icon-search"></i></a>
		<div id="mk-nav-search-wrapper" class="mk-box-to-trigger">
		      <form method="get" id="mk-header-navside-searchform" action="<?php echo home_url();  ?>">
		        <input type="text" value="" name="s" id="s" />
		        <i class="mk-icon-search"><input value="" type="submit" /></i>
		    </form>
  		  </div>
		</div>

		<?php
	}






	function start_tour_link() {
		$mk_options = theme_option( THEME_OPTIONS );
		$link_to = $mk_options['header_start_tour_page'];
		$link  = '';
		if ( !empty( $link_to ) ) {
			$link_array = explode( '||', $link_to );
			switch ( $link_array[ 0 ] ) {
			case 'page':
				$link = get_page_link( $link_array[ 1 ] );
				break;
			case 'cat':
				$link = get_category_link( $link_array[ 1 ] );
				break;
			case 'portfolio':
				$link = get_permalink( $link_array[ 1 ] );
				break;
			case 'post':
				$link = get_permalink( $link_array[ 1 ] );
				break;
			case 'manually':
				$link = $link_array[ 1 ];
				break;
			}
		}
		if ( !empty( $mk_options['header_start_tour_text'] ) ) {
			echo '<a href="'.$link.'" class="mk-header-start-tour">'.$mk_options['header_start_tour_text'].'<i class="mk-icon-caret-right"></i></a>';
		}
	}




	function notification_bar( $post_id = NULL ) {
		wp_print_scripts( 'jquery-cookieBar' );
		$more_txt =  get_post_meta( $post_id, 'noti_more_text', true );
		$cookie_name =  get_post_meta( $post_id, 'noti_coockie_name', true );
		if ( get_post_meta( $post_id, 'enable_noti_bar', true ) != 'true' ) {
			return false;
		}

?>

	<div id="mk-notification-bar">
			<span class="mk-noti-message"><?php echo  get_post_meta( $post_id, 'noti_message', true ); ?></span>
			<?php if ( $more_txt ) : ?>
				<a class="mk-noti-more" href="<?php echo get_post_meta( $post_id, 'noti_more_url', true ); ?>"><?php echo $more_txt ?></a>
			<?php endif; ?>
			<a href="#" id="mk-bar-close"><i class="mk-icon-remove"></i></a>
		<div class="clearboth"></div>
	</div>

	<script type="text/javascript">
	    jQuery(document).ready(function() {
	      jQuery('#mk-notification-bar').cookieBar({
	      	closeButton: '#mk-bar-close',
	      	cookieName : "<?php echo $cookie_name; ?>"
	      });
	    });
	</script>
	<?php


	}







	/* Created Page Introduce section for all pages and templates. */
	function page_introduce( $post_id = NULL ) {
		global $post;
		$mk_options = theme_option( THEME_OPTIONS );
		if ( is_front_page() && $mk_options['disable_homepage_title'] == 'false' ) {
			return false;
		}

		if ( is_singular( 'product' ) && $mk_options['woocommerce_single_product_title'] == 'false' ) {
			return false;
		}
		if ( function_exists( 'is_woocommerce' ) && is_shop() && $mk_options['woocommerce_shop_title'] == 'false' ) {
			return false;
		}
		if ( function_exists( 'is_woocommerce' ) && is_archive() && $mk_options['woocommerce_archive_title'] == 'false' ) {
			return false;
		}

		if ( is_singular() && ( get_post_meta( $post_id, '_page_disable_title', true ) == 'false' ) ) {
			return false;
		}
		if ( is_singular() && get_post_meta( $post_id, '_enable_page_gmap', true ) == 'true' || get_post_meta( $post_id, '_enable_slidehsow', true ) == 'true' || is_404() ) {
			return false;
		}



		$align = $title = $subtitle = $shadow_css = '';


		if ( is_page() ) {
			$custom_page_title = get_post_meta( $post_id, '_custom_page_title', true );

			if ( get_post_meta( $post_id, '_page_disable_title', true ) != 'false' ) {
				if ( !empty( $custom_page_title ) ) {
					$title = $custom_page_title;
				} else {
					$title = get_the_title( $post_id );
				}
			}
			$subtitle = get_post_meta( $post_id, '_page_introduce_subtitle', true );
			$align = get_post_meta( $post_id, '_introduce_align', true );

		}

		else if ( is_singular( 'post' ) ) {
				$local_title = get_post_meta( $post_id, '_custom_page_title', true );
				if ( !empty( $local_title ) ) {
					$title =  $local_title;
				} else {
					$title =  $mk_options['blog_single_title'];
				}
				$subtitle = get_post_meta( $post_id, '_page_introduce_subtitle', true );
				$align = get_post_meta( $post_id, '_introduce_align', true );

			}
		else if ( is_singular( 'portfolio' ) ) {
				$local_title = get_post_meta( $post_id, '_custom_page_title', true );
				$subtitle = get_post_meta( $post_id, '_custom_page_subtitle', true );
				if ( !empty( $local_title ) ) {
					$title =  $local_title;
				} else {
					$title =  $mk_options['portfolio_single_title'];
				}
				if ( $mk_options['portfolio_single_title_location'] == 'page_title' ) {
					$title = get_the_title( $post_id );
				}
				$subtitle = get_post_meta( $post_id, '_page_introduce_subtitle', true );
				$align = get_post_meta( $post_id, '_introduce_align', true );

			}
		else if ( is_singular( 'news' ) ) {
				$local_title = get_post_meta( $post_id, '_custom_page_title', true );
				if ( !empty( $local_title ) ) {
					$title =  $local_title;
				} else {
					$title =  $mk_options['news_single_title'];
				}
				$subtitle = get_post_meta( $post_id, '_page_introduce_subtitle', true );
				$align = get_post_meta( $post_id, '_introduce_align', true );
			}


		/* Loads Archive Page Headings */
		if ( is_archive() ) {
			$title = $mk_options['archive_page_title'];
			if ( is_category() ) {
				$subtitle = sprintf( __( 'Category Archive for: "%s"', 'mk_framework' ), single_cat_title( '', false ) );
			}
			elseif ( is_tag() ) {
				$subtitle = sprintf( __( 'Tag Archives for: "%s"', 'mk_framework' ), single_tag_title( '', false ) );
			}
			elseif ( is_day() ) {
				$subtitle = sprintf( __( 'Daily Archive for: "%s"', 'mk_framework' ), get_the_time( 'F jS, Y' ) );
			}
			elseif ( is_month() ) {
				$subtitle = sprintf( __( 'Monthly Archive for: "%s"', 'mk_framework' ), get_the_time( 'F, Y' ) );
			}
			elseif ( is_year() ) {
				$subtitle = sprintf( __( 'Yearly Archive for: "%s"', 'mk_framework' ), get_the_time( 'Y' ) );
			}
			elseif ( is_author() ) {
				if ( get_query_var( 'author_name' ) ) {
					$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
				}
				else {
					$curauth = get_userdata( get_query_var( 'author' ) );
				}
				$subtitle = sprintf( __( 'Author Archive for: "%s"' ), $curauth->nickname );
			}
			elseif ( is_tax() ) {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$subtitle = sprintf( __( 'Archives for: "%s"', 'mk_framework' ), $term->name );
			}
			if ( $mk_options['archive_disable_subtitle'] == 'false' ) {
				$subtitle = '';
			}

		}

		if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			if ( bbp_is_forum_archive() ) {
				$title = bbp_get_forum_archive_title();

			} elseif ( bbp_is_topic_archive() ) {
				$title = bbp_get_topic_archive_title();

			} elseif ( bbp_is_single_view() ) {
				$title = bbp_get_view_title();
			} elseif ( bbp_is_single_forum() ) {

				$forum_id = get_queried_object_id();
				$forum_parent_id = bbp_get_forum_parent_id( $forum_id );

				if ( 0 !== $forum_parent_id )
					$title = array_merge( $item, breadcrumbs_plus_get_parents( $forum_parent_id ) );

				$title = bbp_get_forum_title( $forum_id );
			}
			elseif ( bbp_is_single_topic() ) {
				$topic_id = get_queried_object_id();
				$title = bbp_get_topic_title( $topic_id );
			}

			elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {

				$title = bbp_get_displayed_user_field( 'display_name' );
			}
		}


		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			ob_start();
			woocommerce_page_title();
			$title = ob_get_clean();
		}



		/* Loads Search Page Headings */
		if ( is_search() ) {
			$title = $mk_options['search_page_title'];
			$allsearch = new WP_Query( "s=".get_search_query()."&showposts=-1" ); $count = $allsearch->post_count; wp_reset_query();
			$subtitle  = $count .' '. sprintf( __( 'Search Results for: "%s"', 'mk_framework' ), stripslashes( strip_tags( get_search_query() ) ) );

			if ( $mk_options['search_disable_subtitle'] == 'false' ) {
				$subtitle = '';
			}

		}
		if($mk_options['page_title_shadow'] == 'true') {
			$shadow_css = 'mk-drop-shadow';
		}

		$align = !empty( $align ) ? $align : 'left';


		echo '<section id="mk-page-introduce" class="intro-'.$align.'">';
		echo '<div class="mk-grid">';
		if ( !empty( $title ) && get_post_meta( $post_id, '_page_disable_title', true ) != 'false' ) {
			if ( is_page() || is_archive() || is_search() ) {
				echo '<h1 class="page-introduce-title '.$shadow_css.'">' . $title . '</h1>';
			} else {
				echo '<div class="page-introduce-title '.$shadow_css.'">' . $title . '</div>';
			}

		}

		if ( !empty( $subtitle ) ) {
			echo '<div class="page-introduce-subtitle">';
			echo $subtitle;
			echo '</div>';
		}
		if ( $mk_options['disable_breadcrumb'] == 'true' ) {
			if ( get_post_meta( $post_id, '_disable_breadcrumb', true ) != 'false' ) {
				$this->mk_breadcrumbs();
			}
		}

		echo '<div class="clearboth"></div></div></section>';


	}



	function mk_breadcrumbs( $post_id = NULL ) {
		global $post;

		

		if ( is_singular()) {
			$local_skining = get_post_meta( $post->ID, '_enable_local_backgrounds', true );
			$breadcrumb_skin = get_post_meta( $post->ID, '_breadcrumb_skin', true );
				if ($local_skining == 'true' && !empty( $breadcrumb_skin ) ) {
					$breadcrumb_skin_class = $breadcrumb_skin;
				} else {
					$breadcrumb_skin_class = theme_option( THEME_OPTIONS, 'breadcrumb_skin' );
				}
		} else {
			$breadcrumb_skin_class = theme_option( THEME_OPTIONS, 'breadcrumb_skin' );
		}

		$output = '';
		if ( function_exists( 'mk_breadcrumbs_plus' ) ) {
			$output = mk_breadcrumbs_plus( array(
					'prefix' => '<div class="mk-breadcrumbs-inner '.$breadcrumb_skin_class.'-skin">',
					'suffix' => '</div>',
					'title' => false,
					'home' => __( 'Home', 'mk_framework' ),
					'front_page' => false,
					'bold' => false,
					'blog' => __( 'Blog', 'mk_framework' ),
					'echo' => false,
					'post_id' => $post_id
				) );
		}
		echo $output;

	}


	function header_banner_video() {

		global $post;

		$enable = get_post_meta( $post->ID, '_enable_banner_video', true );

		if ( empty( $enable ) || $enable == 'false' ) { return false;}

		wp_enqueue_script( 'mediaelementplayer-js' );
		wp_enqueue_style(  'mediaelementplayer-css' );

		$color_overlay = get_post_meta( $post->ID, '_banner_video_color_overlay', true );
		$video_pattern = get_post_meta( $post->ID, '_banner_video_pattern', true );
		$video_preview = get_post_meta( $post->ID, '_banner_video_preview', true );
		$webm = get_post_meta( $post->ID, '_banner_video_webm', true );
		$mp4 = get_post_meta( $post->ID, '_banner_video_mp4', true );

		$output = '';


		if ( $video_pattern == 'true' ) {
			$output .= '<div class="mk-video-mask"></div>';
		}
		if ( !empty( $color_overlay ) ) {
			$output .= '<div style="background-color:'.$color_overlay.'" class="mk-video-color-mask"></div>';
		}
		$output .= '<div style="background-image:url('.$video_preview.')" class="mk-video-preload"></div>';
		$output .= '<div class="mk-section-video"><video width="1900" height="1060" poster="'.$video_preview.'" controls="controls" preload="auto" loop="true" autoplay="true">';

		if ( !empty( $mp4 ) ) {
			//MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7
			$output .= '<source type="video/mp4" src="'.$mp4.'" />';
		}
		if ( !empty( $webm ) ) {
			// WebM/VP8 for Firefox4, Opera, and Chrome
			$output .= '<source type="video/webm" src="'.$webm.'" />';
		}

		if ( !empty( $mp4 ) ) {
			//Flash fallback for non-HTML5 browsers without JavaScript
			$output .= '<object width="1900" height="1060" type="application/x-shockwave-flash" data="'.THEME_JS.'/flashmediaelement.swf">';
			$output .= '<param name="movie" value="'.THEME_JS.'/flashmediaelement.swf" />';
			$output .= '<param name="flashvars" value="controls=true&file='.$mp4.'" />';
			$output .= '<img src="'.$video_preview.'" width="1900" height="1060" title="No video playback capabilities" />';
			$output .= '</object>';
		}
		$output .= '</video></div>';

		echo $output;

	}





	/*
Blog Similar posts.
*/
	function blog_similar_posts() {
		global $single_layout;
		global $post;
		$backup             = $post;
		$tags               = wp_get_post_tags( $post->ID );
		$tagIDs             = array();
		$related_post_found = false;



		if ( $single_layout == 'full' ) {
			$showposts = 4;
			$width = 225;
			$height = 160;
		} else {
			$showposts = 3;
			$width = 225;
			$height = 160;
		}

		if ( $tags ) {
			$tagcount = count( $tags );
			for ( $i = 0; $i < $tagcount; $i++ ) {
				$tagIDs[ $i ] = $tags[ $i ]->term_id;
			}
			$related = new WP_Query( array(
					'tag__in' => $tagIDs,
					'post__not_in' => array(
						$post->ID
					),
					'showposts' => $showposts,
					'ignore_sticky_posts' => 1
				) );

			$output = '';
			if ( $related->have_posts() ) {
				$related_post_found = true;

				$output .= '<section class="blog-similar-posts">';

				$output .=  '<div class="similar-post-title">'.__( 'Recommended Posts', 'mk_framework' ).'</div>';

				$output .= '<ul>';
				while ( $related->have_posts() ) {
					$related->the_post();
					$output .= '<li style="width:'.$width.'px;">';
					$output .= '<a class="mk-similiar-thumbnail" href="' . get_permalink() . '" title="' . get_the_title() . '">';
					if ( has_post_thumbnail() ) {
						$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
						$image_src  = theme_image_resize( $image_src_array[ 0 ], $width, $height );
					} else {
						$image_src  = theme_image_resize( THEME_IMAGES . '/empty-thumb.png', $width, $height );

					}
					$output .= '<img style="width: '.$width.'px" src="' . get_image_src( $image_src['url'] ) . '" alt="' . get_the_title() . '" />';
					$output .= '<div class="image-hover-overlay"></div></a>';
					$output .= '<a href="'.get_permalink().'" class="mk-similiar-title">'.get_the_title().'</a>';

					$output .= '</li>';

				}
				$output .= '</ul>';
				$output .= '<div class="clearboth"></div></section>';
			}
			$post = $backup;
		}
		if ( !$related_post_found ) {
			$recent = new WP_Query( array(
					'showposts' => $showposts,
					'nopaging' => 0,
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1
				) );

			$output = '';
			if ( $recent->have_posts() ) {
				$related_post_found = true;

				$output .= '<section class="blog-similar-posts">';

				$output .=  '<div class="similar-post-title">'.__( 'Recent Posts', 'mk_framework' ).'</div>';

				$output .= '<ul>';
				while ( $recent->have_posts() ) {
					$recent->the_post();
					$output .= '<li style="width:'.$width.'px;">';
					$output .= '<a class="mk-similiar-thumbnail" href="' . get_permalink() . '" title="' . get_the_title() . '">';
					if ( has_post_thumbnail() ) {
						$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
						$image_src  = theme_image_resize( $image_src_array[ 0 ], $width, $height );
						$output .= '<img style="width: '.$width.'px" src="' . get_image_src( $image_src['url'] ) . '" alt="' . get_the_title() . '" />';
					} else {
						$image_src  = theme_image_resize( THEME_IMAGES . '/empty-thumb.png', $width, $height );
						$output .= '<img style="width: '.$width.'px" src="' . get_image_src( $image_src['url'] ) . '" alt="' . get_the_title() . '" />';
					}
					$output .= '</a>';
					$output .= '<a href="'.get_permalink().'" class="mk-similiar-title">'.get_the_title().'</a>';

					$output .= '</li>';
				}
				$output .= '</ul>';
				$output .= '<div class="clearboth"></div></section>';
			}


		}
		wp_reset_postdata();
		echo $output;
	}
	/*-----------------*/








	function mk_footer_twitter() {
		global $post;
		$output = '';

		$enable = get_post_meta( $post->ID, '_enable_footer_twitter', true );

		if ( empty( $enable ) || $enable == 'false' ) {
			return false;
		}
		$mk_options = theme_option( THEME_OPTIONS );
		$username = get_post_meta( $post->ID, '_footer_twitter_username', true );
		$bg_color = get_post_meta( $post->ID, '_footer_twitter_bg_color', true );
		$skin = get_post_meta( $post->ID, '_footer_twitter_txt_color', true );
		$count = get_post_meta( $post->ID, '_tweet_count', true );
		$consumer_key = $mk_options['twitter_consumer_key'];
		$consumer_secret = $mk_options['twitter_consumer_secret'];
		$access_token = $mk_options['twitter_access_token'];
		$access_token_secret = $mk_options['twitter_access_token_secret'];

		wp_print_scripts( 'jquery-flexslider' );

		$id = mt_rand( 99, 9999 );




		if ( $username && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count ) {
			$output .= '<div style="background-color:'.$bg_color.'" class="mk-footer-tweets mk-'.$skin.'-skin"><div class="mk-grid">';

			$transName = 'mk_jupiter_footer_tweets';
			$cacheTime = 10;
			delete_transient( $transName );
			if ( false === ( $twitterData = get_transient( $transName ) ) ) {
				// require the twitter auth class
				@require_once THEME_WIDGETS . '/twitteroauth/twitteroauth.php';
				$twitterConnection = new TwitterOAuth(
					$consumer_key, // Consumer Key
					$consumer_secret,    // Consumer secret
					$access_token,       // Access token
					$access_token_secret     // Access token secret
				);
				$twitterData = $twitterConnection->get(
					'statuses/user_timeline',
					array(
						'screen_name'     => $username,
						'count'           => $count,
						'exclude_replies' => false
					)
				);
				if ( $twitterConnection->http_code != 200 ) {
					$twitterData = get_transient( $transName );
				}
				set_transient( $transName, $twitterData, 30 * $cacheTime );
			};
			$twitter = get_transient( $transName );
			if ( $twitter && is_array( $twitter ) ) {
				$output .= '<div id="mk_footer_tweets" class="mk-flexslider">';
				$output .= '<ul class="mk-flex-slides">';
				foreach ( $twitter as $tweet ):
					$output .= '<li>';
				$output .= '<span class="tweet-username">@'.$username.'</span>';
				$output .= '<span class="tweet-text">';

				$latestTweet = $tweet->text;
				$latestTweet = preg_replace( '/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet );
				$latestTweet = preg_replace( '/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet );
				$output .= $latestTweet;
				$output .= '</span>';

				$twitterTime = strtotime( $tweet->created_at );
				$timeAgo = mk_ago( $twitterTime );

				$output .= '<span class="tweet-time">'.$timeAgo.'</span></li>';


				endforeach;
				$output .= '</ul>';
				$output .= '</div>';
				$output .= '</div></div>';

			}


			$output .= '<script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#mk_footer_tweets").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "fade",
                    smoothHeight: false,
                    slideshowSpeed: 5000,
                    animationSpeed: 500,
                    directionNavArrowsLeft : \'<i class="mk-moon-arrow-left-14"></i>\',
    				directionNavArrowsRight : \'<i class="mk-moon-arrow-right-15"></i>\',
                    pauseOnHover: true,
                    controlNav: false,
                    directionNav:false,
                    prevText: "",
                    nextText: ""
                });
            });
        });
        </script>
        <style>

        </style>';
		}


		echo $output;

	}








	/*
Portfolio Similar posts.
*/
	function portfolio_similar_posts() {
		global $single_layout;
		global $post;
		$backup = $post;
		$cats  =  wp_get_object_terms( $post->ID, 'portfolio_category' );
		$catSlugs = array();
		$related_post_found = false;
		$main_grid = theme_option( THEME_OPTIONS, 'grid_width' ) ? theme_option( THEME_OPTIONS, 'grid_width' ) : 1140;
		$width = $main_grid/4;
		$height = $width/1.25;
		$output = '';
		if ( $cats ) {
			$catcount = count( $cats );
			for ( $i = 0; $i < $catcount; $i++ ) {
				$catSlugs[$i] = $cats[$i]->slug;
			}
			$query = array(
				'post__not_in' => array( $post->ID ),
				'showposts'=>4,
				'ignore_sticky_posts'=>1,
				'post_type' => 'portfolio',
			);
			global $wp_version;
			if ( version_compare( $wp_version, "3.1", '>=' ) ) {
				$query['tax_query'] = array(
					array(
						'taxonomy' => 'portfolio_category',
						'field' => 'slug',
						'terms' => $catSlugs
					)
				);
			}else {
				$query['taxonomy'] = 'portfolio_category';
				$query['term'] = implode( ',', $catSlugs );
			}


			$output = '';
			$related = new WP_Query( $query );
			if ( $related->have_posts() ) {
				$related_post_found = true;

				$output .= '<section class="portfolio-similar-posts">';
				$output .=  '<div class="similar-post-title">'.__( 'Related Projects', 'mk_framework' ).'</div>';

				$output .= '<div class="mk-grid">';

				$output .= '<ul>';
				while ( $related->have_posts() ) {
					global $post;
					$related->the_post();
					if ( has_post_thumbnail() ) {
						$output .= '<li>';

						$post_type = get_post_meta( $post->ID, '_single_post_type', true );
						$post_type = !empty( $post_type ) ? $post_type : 'image';
						$link_to = get_post_meta( get_the_ID(), '_portfolio_permalink', true );
						$permalink  = '';
						if ( !empty( $link_to ) ) {
							$link_array = explode( '||', $link_to );
							switch ( $link_array[ 0 ] ) {
							case 'page':
								$permalink = get_page_link( $link_array[ 1 ] );
								break;
							case 'cat':
								$permalink = get_category_link( $link_array[ 1 ] );
								break;
							case 'portfolio':
								$permalink = get_permalink( $link_array[ 1 ] );
								break;
							case 'post':
								$permalink = get_permalink( $link_array[ 1 ] );
								break;
							case 'manually':
								$permalink = $link_array[ 1 ];
								break;
							}
						}

						if ( empty( $permalink ) ) {
							$permalink = get_permalink();
						}

						$terms = get_the_terms( get_the_id(), 'portfolio_category' );
						$terms_slug = array();
						$terms_name = array();
						if ( is_array( $terms ) ) {
							foreach ( $terms as $term ) {
								$terms_slug[] = $term->slug;
								$terms_name[] = $term->name;
							}
						}

						$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
						$image_src  = theme_image_resize( $image_src_array[ 0 ], $width, $height );
						$output .= '<div class="portfolio-similar-posts-image"><img src="'.$image_src['url'].'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
						$output .= '<div class="image-hover-overlay"></div>';
						if ( $post_type == 'image' || $post_type == '' ) {
							$output .='<a title="'.get_the_title().'" class="modern-post-type-icon" href="'.$permalink.'"><i class="mk-moon-plus"></i></a>';

						} else  if ( $post_type == 'video' ) {
								$output .='<a title="'.get_the_title().'" class="modern-post-type-icon modern-video-icon" href="'.$permalink.'"><i class="mk-moon-play-2"></i></a>';
							}

						$output .= '<div class="portfolio-similar-meta">';
						$output .= '<a class="the-title" href="'.get_permalink().'">'.get_the_title().'</a><div class="clearboth"></div>';
						$output .= '<div class="portfolio-categories">'.implode( ' ', $terms_name ).'</div>';
						$output .= '</div>';
						$output .= '</div>';
						$output .= '</li>';
					}
				}
				$output .= '</ul></div>';
				$output .= '<div class="clearboth"></div></section>';
			}
			$post = $backup;
		}
		if ( !$related_post_found ) {
			$recent = new WP_Query( array(
					'post_type' => 'portfolio',
					'showposts' => 4,
					'nopaging' => 0,
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1
				) );

			$output = '';
			if ( $recent->have_posts() ) {
				$related_post_found = false;

				$output .= '<section class="portfolio-similar-posts">';
				$output .=  '<div class="similar-post-title">'.__( 'Most Recent Projects', 'mk_framework' ).'</div>';
				$output .= '<div class="mk-grid">';
				$output .= '<div class="mk-grid">';

				$output .= '<ul>';
				while ( $recent->have_posts() ) {
					global $post;
					$recent->the_post();
					if ( has_post_thumbnail() ) {
						$output .= '<li>';

						$post_type = get_post_meta( $post->ID, '_single_post_type', true );
						$post_type = !empty( $post_type ) ? $post_type : 'image';
						$link_to = get_post_meta( get_the_ID(), '_portfolio_permalink', true );
						$permalink  = '';
						if ( !empty( $link_to ) ) {
							$link_array = explode( '||', $link_to );
							switch ( $link_array[ 0 ] ) {
							case 'page':
								$permalink = get_page_link( $link_array[ 1 ] );
								break;
							case 'cat':
								$permalink = get_category_link( $link_array[ 1 ] );
								break;
							case 'portfolio':
								$permalink = get_permalink( $link_array[ 1 ] );
								break;
							case 'post':
								$permalink = get_permalink( $link_array[ 1 ] );
								break;
							case 'manually':
								$permalink = $link_array[ 1 ];
								break;
							}
						}

						if ( empty( $permalink ) ) {
							$permalink = get_permalink();
						}

						$terms = get_the_terms( get_the_id(), 'portfolio_category' );
						$terms_slug = array();
						$terms_name = array();
						if ( is_array( $terms ) ) {
							foreach ( $terms as $term ) {
								$terms_slug[] = $term->slug;
								$terms_name[] = $term->name;
							}
						}

						$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
						$image_src  = theme_image_resize( $image_src_array[ 0 ], $width, $height );
						$output .= '<div class="portfolio-similar-posts-image"><img src="'.$image_src['url'].'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
						$output .= '<div class="image-hover-overlay"></div>';
						if ( $post_type == 'image' || $post_type == '' ) {
							$output .='<a title="'.get_the_title().'" class="modern-post-type-icon" href="'.$permalink.'"><i class="mk-moon-plus"></i></a>';

						} else  if ( $post_type == 'video' ) {
								$output .='<a title="'.get_the_title().'" class="modern-post-type-icon modern-video-icon" href="'.$permalink.'"><i class="mk-moon-play-2"></i></a>';
							}

						$output .= '<div class="portfolio-similar-meta">';
						$output .= '<a class="the-title" href="'.get_permalink().'">'.get_the_title().'</a><div class="clearboth"></div>';
						$output .= '<div class="portfolio-categories">'.implode( ' ', $terms_name ).'</div>';
						$output .= '</div>';
						$output .= '</div>';
						$output .= '</li>';
					}
				}
				$output .= '</ul></div>';
				$output .= '<div class="clearboth"></div></section>';
			}


		}
		wp_reset_postdata();
		echo $output;
	}
	/*-----------------*/






	function mk_quick_contact() {
		$mk_options = theme_option( THEME_OPTIONS );
		$id = mt_rand( 99, 999 );
		$tabindex_1 = $id;
		$tabindex_2 = $id + 1;
		$tabindex_3 = $id + 2;
		$tabindex_4 = $id + 3;
?>
	<div class="mk-quick-contact-wrapper">
		<a href="#" class="mk-quick-contact-link"><i class="mk-icon-envelope"></i></a>
		<div id="mk-quick-contact">
			<div class="mk-quick-contact-title"><?php echo $mk_options['quick_contact_title']; ?></div>
			<p><?php echo $mk_options['quick_contact_desc']; ?></p>
			<form class="mk-contact-form" action="<?php echo THEME_DIR_URI; ?>/sendmail.php" method="post" novalidate="novalidate">
				<input type="text" placeholder="<?php _e( 'Your Name', 'mk_framework' ); ?>" required="required" id="contact_name" name="contact_name" class="text-input" value="" tabindex="<?php echo $tabindex_1; ?>" />
				<input type="email" required="required" placeholder="<?php _e( 'Your Email', 'mk_framework' ); ?>" id="contact_email" name="contact_email" class="text-input" value="" tabindex="<?php echo $tabindex_2; ?>"  />
				<textarea placeholder="<?php _e( 'Type your message...', 'mk_framework' ); ?>" required="required" id="contact_content" name="contact_content" class="textarea" tabindex="<?php echo $tabindex_3; ?>"></textarea>
	       		<div class="btn-cont"><button type="submit" class="mk-button mk-contact-button mk-skin-button three-dimension small" tabindex="<?php echo $tabindex_4; ?>"><?php _e( 'Send', 'mk_framework' ); ?></button></div>
	       		<i class="mk-contact-loading mk-icon-spinner mk-icon-spin"></i>
	       		<i class="mk-contact-success mk-icon-ok-sign"></i>
				<input type="hidden" value="<?php echo $mk_options['quick_contact_email']; ?>" name="contact_to"/>
			</form>
			<div class="bottom-arrow"></div>
		</div>
	</div>


	<?php
	}







	function mk_slideshow( $post_id = NULL ) {

		$disable_slideshow = get_post_meta( $post_id, '_enable_slidehsow', true );

		if ( $disable_slideshow != 'true' ) {
			return false;
		}

		$slideshow_type = get_post_meta( $post_id, '_slideshow_source', true );

		switch ( $slideshow_type ) {
		case 'layerslider' :
			$this->mk_layerslider( $post_id );
			break;
		case 'revslider' :
			$this->mk_revslider( $post_id );
			break;
		case 'flexslider' :
			$this->mk_flexslider( $post_id );
			break;
		case 'icarousel' :
			$this->mk_icarousel( $post_id );
			break;
		case 'banner_builder' :
			$this->mk_banner_builder( $post_id );
		}


	}








	/* Layer Slider */
	function mk_layerslider( $post_id = NULL ) {
		$source =  get_post_meta( $post_id, '_layer_slider_source', true );

		if ( !empty( $source ) ) {
			echo do_shortcode( '[layerslider id="'.$source.'"]' );
		}
	}










	/* Layer Slider */
	function mk_revslider( $post_id = NULL ) {
		$source =  get_post_meta( $post_id, '_rev_slider_source', true );
		if ( !empty( $source ) ) {
			echo '<div class="mk_rev_slider_wrapper">' .do_shortcode( '[rev_slider '.$source.']' ) . '<div class="clearboth"></div></div>';
		}
	}









	function mk_flexslider_items( $size = array( 1920, 460 ), $post_id ) {
		global $post;
		$number = get_post_meta( $post_id, '_flexslider_count', true );
		$order = get_post_meta( $post_id, '_flexslider_order', true );
		$orderby = get_post_meta( $post_id, '_flexslider_orderby', true );
		$posts_in =  get_post_meta( $post_id, '_flexslider_items', true );

		$query = array(
			'post_type' => 'slideshow',
		);

		if ( $number ) {
			$query['showposts'] = $number;

		}
		if ( $order ) {
			$query['order'] = $order;
		}
		if ( $orderby ) {
			$query['orderby'] = $orderby;
		}
		if ( $posts_in ) {
			$query['post__in'] = $posts_in;
		}
		$loop   = new WP_Query( $query );

		$images = array();
		while ( $loop->have_posts() ):
			$loop->the_post();
		$link_to = get_post_meta( get_the_ID(), '_link_to', true );
		$link  = '';
		if ( !empty( $link_to ) ) {
			$link_array = explode( '||', $link_to );
			switch ( $link_array[ 0 ] ) {
			case 'page':
				$link = get_page_link( $link_array[ 1 ] );
				break;
			case 'cat':
				$link = get_category_link( $link_array[ 1 ] );
				break;
			case 'portfolio':
				$link = get_permalink( $link_array[ 1 ] );
				break;
			case 'post':
				$link = get_permalink( $link_array[ 1 ] );
				break;
			case 'manually':
				$link = $link_array[ 1 ];
				break;
			}
		}


		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		$images[ ] = array(
			'title' => get_post_meta( get_the_ID(), '_title', true ),
			'id'=> get_the_id(),
			'desc' => get_post_meta( get_the_ID(), '_description', true ),
			'title_color' => get_post_meta( get_the_ID(), '_title_color', true ),
			'desc_color' => get_post_meta( get_the_ID(), '_desc_color', true ),
			'src' => get_image_src( $image_src_array[0] ),
			'link' => $link
		);
		endwhile;
		wp_reset_postdata();

		return $images;

	}










	/* FlexsliderSlider */
	function mk_flexslider( $post_id = NULL ) {

		$number = get_post_meta( $post_id, '_flexslider_count', true );
		$slideshow_height = get_post_meta( $post_id, '_flexslider_height', true );
		$layout = get_post_meta( $post_id, '_flexslider_layout', true );
		$slideDirection = get_post_meta( $post_id, '_flexslider_slideDirection', true );
		$slideshow = get_post_meta( $post_id, '_flexslider_slideshow', true );
		$slideshowSpeed = get_post_meta( $post_id, '_flexslider_slideshowSpeed', true );
		$animationDuration = get_post_meta( $post_id, '_flexslider_animationDuration', true );
		$pauseOnHover = get_post_meta( $post_id, '_flexslider_pauseOnHover', true );
		$disableCaption = get_post_meta( $post_id, '_flexslider_disableCaption', true );
		$easing = get_post_meta( $post_id, '_flexslider_easing', true );
		$pagination = ( get_post_meta( $post_id, '_flexslider_pagination', true ) == 'thumb' ) ? 'thumbnails' : "true";
		wp_enqueue_scripts( 'jquery-flexslider' );
		$random_id       = rand( 100, 9999 );
		$width = theme_option( THEME_OPTIONS, 'grid_width' );
		$image_width = theme_option( THEME_OPTIONS, 'grid_width' );

		$pagination_style = '';
		if ( $pagination == 'thumbnails' ) {
			$pagination_style = 'flexslider-thumbnail';
		}


		$output = '<div class="mk-flexsldier-slideshow mk-flexslider '.$pagination_style.'"><div style="max-width:' . $width . 'px;" class="mk-flexslider-wrapper"><div id="flexslider_'.$random_id.'" style="max-width:' . $width . 'px;">';
		$output .= '<ul class="mk-flex-slides">';


		$images   = $this->mk_flexslider_items( 'full', $post_id );
		foreach ( $images as $image ) {
			$slide_id = mt_rand( 50, 100 );
			$title = $image[ 'title' ];
			$desc  = $image[ 'desc' ];
			$title_color = $image[ 'title_color' ];
			$desc_color  = $image[ 'desc_color' ];
			$link = $image['link'];

			$image_src  = theme_image_resize( $image[ 'src' ], $image_width, $slideshow_height );
			$image_thumb_src  = theme_image_resize( $image[ 'src' ], 100, 60 );


			$output .= '<li data-thumb="' . get_image_src( $image_thumb_src['url'] ) . '">';
			$output .= !empty( $link ) ? '<a href="'.$link.'">' : '';
			$output .= '<img alt="'.$title.'" src="' . get_image_src( $image_src['url'] ) . '"  />';
			if ( ( !empty( $title ) || !empty( $desc ) ) && $disableCaption != 'false' ) {
				$output .= '<div class="mk-flex-caption" id="mk-flex-caption-'.$slide_id.'">';
				$output .= !empty( $title ) ? '<div class="flex-title"><span>'.strip_tags( $title ).'</span></div><div class="clearboth"></div>' : '';
				$output .= !empty( $desc ) ? '<div class="flex-desc"><span>'.$desc.'</span></div>' : '';
				$output .= '</div>';
			}

			$output .= !empty( $link ) ? '</a>' : '';
			$output .='</li>';


		}



		$output .= '</ul>';
		$output .= '</div></div></div>';



		$output .= <<<HTML
<script type="text/javascript">
  jQuery(document).ready(function() {
  	jQuery(window).on("load",function () {

	    jQuery('#flexslider_{$random_id}').flexslider({
	    		selector: ".mk-flex-slides > li",
				animation: "fade",
				smoothHeight: true,
				direction:"horizental",
				slideDirection: "{$slideDirection}",
				slideshow: {$slideshow},
				slideshowSpeed: {$slideshowSpeed},
				animationDuration: {$animationDuration},
				pauseOnHover: {$pauseOnHover},
				controlNav: "{$pagination}",
				easing : "{$easing}",
				prevText: "",
				nextText: "",
				pauseText: '',
				playText: '',
				start: mk_complete,
				after: mk_complete
		});

		function mk_complete(args) {
			var caption = jQuery(args.container).find('.mk-flex-caption').attr('style', ''),
				thisCaption = jQuery('.mk-flexslider-wrapper .mk-flex-slides > li.flex-active-slide').find('.mk-flex-caption');
				thisCaption.animate({left:10, opacity:1}, 500, 'easeOutQuint');
		}




	});
});

</script>
HTML;

		echo $output;
	}











	function mk_icarousel_items( $size = array( 1920, 460 ), $post_id ) {
		global $post;
		$number = get_post_meta( $post_id, '_flexslider_count', true );
		$order = get_post_meta( $post_id, '_slideshow_order', true );
		$orderby = get_post_meta( $post_id, '_slideshow_orderby', true );
		$posts_in =  get_post_meta( $post_id, '_slideshow_items_to_show', true );
		$query = array(
			'post_type' => 'icarousel',
		);

		if ( $number ) {
			$query['showposts'] = $number;

		}
		if ( $order ) {
			$query['order'] = $order;
		}
		if ( $orderby ) {
			$query['orderby'] = $orderby;
		}
		if ( $posts_in ) {
			$query['post__in'] = $posts_in;
		}
		$loop   = new WP_Query( $query );

		$images = array();
		while ( $loop->have_posts() ):
			$loop->the_post();



		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		$images[ ] = array(
			'easing' => get_post_meta( get_the_ID(), '_icarousel_easing', true ),
			'id'=> get_the_id(),
			'pause_time' => get_post_meta( get_the_ID(), '_pause_time', true ),
			'src' => get_image_src( $image_src_array[0] ),
		);
		endwhile;
		wp_reset_postdata();

		return $images;

	}





	/* iCarousel Slideshow */
	function mk_icarousel( $post_id = NULL ) {


		$autoplay = get_post_meta( $post_id, '_icarousel_autoplay', true );
		$make_3d = get_post_meta( $post_id, '_icarousel_3d', true );
		$perpective = get_post_meta( $post_id, '_icarousel_perspective', true );
		$pause_on_hover = get_post_meta( $post_id, '_icarousel_pause_on_hover', true );
		$animation_speed = get_post_meta( $post_id, '_icarousel_animation_speed', true );
		$pause_time = get_post_meta( $post_id, '_icarousel_pause_time', true );
		$direction_nav = get_post_meta( $post_id, '_icarousel_direction_nav', true );
		$global_easing = get_post_meta( $post_id, '_icarousel_easing', true );
		$skin_color = theme_option( THEME_OPTIONS, 'skin_color' );

		wp_print_scripts( 'jquery-icarousel' );
		wp_print_scripts( 'jquery-mousewheel' );
		wp_print_scripts( 'jquery-raphael' );
		$random_id       = rand( 100, 9999 );



		$output = '<div class="mk-icarousel-slideshow mk-icarousel"><div id="icarousel_'.$random_id.'">';


		$images   = $this->mk_icarousel_items( 'full', $post_id );
		foreach ( $images as $image ) {
			$easing = $image[ 'easing' ];
			$pause_time  = $image[ 'pause_time' ];
			$id = $image[ 'id' ];
			$image_src  = theme_image_resize( $image[ 'src' ], 470, 360 );

			$output .= '<div style="width:490px !important; height:390px !important; " data-easing="' . $easing . '" data-pausetime="' . $pause_time . '">';
			$output .= '<img width="480" height="360" src="' . get_image_src( $image_src['url'] ) . '"  />';
			$output .='</div>';


		}

		$output .= '</div></div>';



		$output .= <<<HTML
<script type="text/javascript">
  jQuery(document).ready(function() {
  	jQuery(window).on("load",function () {
	jQuery('#icarousel_{$random_id}').css('visibility', 'visible');
  	jQuery('#icarousel_{$random_id}').iCarousel({
        easing: '{$global_easing}', // Easing timing (custom cubic-bezier function is acceptable)
        slides: 5, // How many slides will be shown (Must be an odd number)
        make3D: {$make_3d}, // To Enable or Disable 3D effect.
        perspective: {$perpective}, // The 3D perspective option. (Min 0 & Max 100);
        animationSpeed: {$animation_speed}, // Slide transition speed (Microsecond)
        pauseTime: {$pause_time}, // How long each slide will show (Microsecond)
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: {$direction_nav}, // Next & Previous navigation
        autoPlay: true, // To Enable or Disable the autoplay
        keyboardNav: true, // To Enable or Disable the keyboard navigation
        touchNav: true, // To Enable or Disable the touch navigation
        mouseWheel: true, // To Enable or Disable the mousewheel navigation
        pauseOnHover: {$pause_on_hover}, // To Enable or Disable the carousel when mouse come over it
        randomStart: false, // Start on a random slide
        slidesSpace: 300, // Spaces between slides
        slidesTopSpace: 'auto', // Top Space for the slides
        direction: 'rtl', // Carousel direction when change (right-to-left) set like: 'rtl'
        timer: '360Bar', // Timer style: "Pie", "360Bar" or "Bar"
        timerBg: '#000', // Timer background
        timerColor: '{$skin_color}', // Timer color
        timerOpacity: 0.4, // Timer opacity
        timerDiameter: 20, // Timer diameter
        timerPadding: 3, // Timer padding
        timerStroke: 2, // Timer stroke width
        timerBarStroke: 1, // Timer Bar stroke width
        timerBarStrokeColor: '#EEE', // Timer Bar stroke color
        timerBarStrokeStyle: 'solid', // Timer Bar stroke style
        timerBarStrokeRadius: 4, // Timer Bar stroke radius
        timerPosition: 'top-right', // Timer position (top,middle,bottom)-(left-center-right) set like: 'middle-center'
        timerX: 20, // Timer X position threshold
        timerY: 20, // Timer Y position threshold
        nextLabel: "", // To set the string of the next button (Multilanguage use)
        previousLabel: "", // To set the string of the previous button (Multilanguage use)
        playLabel: "Play", // To set the string of the play button (Multilanguage use)
        pauseLabel: "Pause", // To set the string of the pause button (Multilanguage use)
        onBeforeChange: function(){}, // Triggers before a slide change
        onAfterChange: function(){}, // Triggers after a slide change
        onLastSlide: function(){}, // Triggers when last slide is shown
        onAfterLoad: function(){}, // Triggers when carousel has loaded
        onPause: function(){}, // Triggers when carousel has paused
        onPlay: function(){} // Triggers when carousel has played
    });
});

});

</script>
HTML;

		echo $output;
	}





	/* FlexsliderSlider */
	function mk_banner_builder( $post_id = NULL ) {

		$order = get_post_meta( $post_id, '_banner_order', true );
		$orderby = get_post_meta( $post_id, '_banner_orderby', true );
		$minHeight = get_post_meta( $post_id, '_banner_minHeight', true );
		$padding = get_post_meta( $post_id, '_banner_padding', true );
		$posts_in =  get_post_meta( $post_id, '_banner_items', true );
		$animation = get_post_meta( $post_id, '_banner_animation', true );
		$slideDirection = get_post_meta( $post_id, '_banner_slideDirection', true );
		$slideshow = get_post_meta( $post_id, '_banner_slideshow', true );
		$slideshowSpeed = get_post_meta( $post_id, '_banner_slideshowSpeed', true );
		$animationDuration = get_post_meta( $post_id, '_banner_animationDuration', true );
		wp_enqueue_scripts( 'jquery-flexslider' );

		$query = array(
			'post_type' => 'banner_builder',
		);

		$slides_count = count( $posts_in );

		/*if ( $number ) {
			$query['showposts'] = $number;

		}*/
		if ( $order ) {
			$query['order'] = $order;
		}
		if ( $orderby ) {
			$query['orderby'] = $orderby;
		}
		if ( $posts_in ) {
			$query['post__in'] = $posts_in;
		}
		$loop   = new WP_Query( $query );



		$output = '<div class="mk-banner-builder theme-page-wrapper full-layout"><div style="padding:0;" class="theme-content"><div style="padding:'.$padding.'px;min-height:'.$minHeight.'px;" class="mk-flexslider" id="mk_banner_builder">';
		$output .= '<ul class="mk-banner-slides">';
		while ( $loop->have_posts() ):
			$loop->the_post();

		$output .= '<li><div class="mk-grid row-fluid">'.do_shortcode( get_the_content() ).'</div></li>';
		endwhile;
		wp_reset_query();

		$output .= '</ul>';
		$output .= '<div class="clearboth"></div></div><div class="clearboth"></div></div></div>';



		$output .= <<<HTML
<script type="text/javascript">
var banner = jQuery('#mk_banner_builder').hide();
  jQuery(document).ready(function() {
  	jQuery(window).on("load",function () {
  		banner.show();
	    jQuery(banner).flexslider({
	    		selector: ".mk-banner-slides > li",
				animation: "{$animation}",
				smoothHeight: false,
				direction:"horizental",
				slideshow: {$slideshow},
				slideshowSpeed: {$slideshowSpeed},
				animationDuration: {$animationDuration},
				pauseOnHover: true,
				controlNav: false,
				initDelay: 2000,
				prevText: "",
				nextText: "",
				pauseText: '',
				playText: ''
		});
	});
});

</script>
HTML;



		echo $output;
	}








	/* Homepage Tabbed Area */

	function mk_recent_news( $post_id = NULL ) {
		wp_enqueue_script( 'jquery-flexslider' );
		$count = get_post_meta( $post_id, '_news_count', true );
		$title = get_post_meta( $post_id, '_news_title', true );
		$bg_color = get_post_meta( $post_id, '_teaser_bg', true );
		if ( $bg_color == '' ) {
			$bg_color = '#f6f6f6';
		}
		$id = mt_rand( 99, 9999 );

		$output = '';

		$output = '<div class="mk-news-teaser" style="background-color:'.$bg_color.'"><div class="mk-grid row-fluid ">';

		$output .= '<div class="mk-news-teaser-title"><span>'.$title.'</span></div>';
		$output .= '<div class="mk-flexslider mk-news-teaser-slider" id="news-teaser-'.$id.'"><ul class="mk-flex-slides">';

		$query = array( 'showposts' => $count, 'post_type' => 'news', 'nopaging' => 0, 'orderby'=> 'date', 'order'=>'DESC', 'post_status' => 'publish', 'ignore_sticky_posts' => 1 );

		$r = new WP_Query( $query );

		if ( $r-> have_posts() ) :
			while ( $r-> have_posts() ) : $r -> the_post();

			$output .= '<li>';
		$output .= '<a class="news-teaser-title" href="'.get_permalink().'">'.get_the_title().'</a>';
		$output .= '<time class="news-teaser-date" datetime="'. get_the_time( 'F, j' ).'">
					<span><i class="mk-icon-time"></i>'.get_the_time( 'F j, Y' ).'</span>
					</time>';

		endwhile;

		wp_reset_query();
		endif;


		$output .= '</ul>';


		$output .= '</div>';
		$output .= '<a href="'.get_permalink( theme_option( THEME_OPTIONS, 'news_page' ) ).'" class="mk-button three-dimension small">'.__( 'View All', 'mk_framework' ).'</a>';
		$output .= '<div class="clearboth"></div></div></div>';
		$output .= '<script type="text/javascript">

		jQuery(document).ready(function() {

		jQuery("#news-teaser-'.$id.'").flexslider({
			selector: ".mk-flex-slides > li",
			animation: "fade",              //String: Select your animation type, "fade" or "slide"
			smoothHeight: true,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
			slideshowSpeed: 2000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationSpeed: 600,            //Integer: Set the speed of animations, in milliseconds
			pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
			controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
			prevText: "",           //String: Set the text for the "previous" directionNav item
			nextText: ""              //String: Set the text for the "next" directionNav item
	});

		});
</script>';

		echo $output;
	}




	function mk_header_social() {
		$mk_options = theme_option( THEME_OPTIONS );
		if ( $mk_options['disable_header_social_networks'] == 'false' ) {
			return false;
		}
		switch ( $mk_options['header_social_networks_style'] ) {
		case 'rounded' :
			$icon_style = 'socialico-square-';
			break;
		case 'simple' :
			$icon_style = 'mk-social-';
			break;
		case 'circle' :
			$icon_style = 'mk-socialci-';
			break;
		default :
			$icon_style = 'mk-socialci-';
		}
		$names = explode( ",", $mk_options['header_social_networks_site'] );
		$urls = explode( ",", $mk_options['header_social_networks_url'] );
		$output = '';
		if ( strlen( implode( '', $urls ) ) != 0 ) {
			$output = '<div id="mk-header-social">';
			$output .= '<ul>';
			foreach ( array_combine( $names, $urls ) as $name => $url ) {
				$output .= '<li><a class="'.$name.'-hover" target="_blank" href="'.$url.'"><i class="'.$icon_style.$name.'" alt="'.$name.'" title="'.$name.'"></i></a></li>';
			}
			$output .= '</ul>';

			$output .= '<div class="clearboth"></div></div>';
		}

		echo $output;

	}



	function mk_header_login() {

		global $data;
		if ( is_user_logged_in() ) {
			global $current_user;
			get_currentuserinfo();
?>
			<div class="mk-header-login">
    		<a href="#" id="mk-header-login-button" class="mk-login-link"><i class="mk-icon-user"></i><?php echo $current_user->display_name; ?></a>
    		</div>
		<?php } else {
?>
	<div class="mk-header-login">
    <a href="#" id="mk-header-login-button" class="mk-login-link mk-toggle-trigger"><i class="mk-icon-user"></i><?php _e( 'Login', 'mk_framework' ); ?></a>
	<div class="mk-login-register mk-box-to-trigger">

		<div id="mk-login-panel">
				<form id="mk_login_form" name="mk_login_form" method="post" class="mk-login-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ) ?>">
					<span class="form-section">
					<label for="log"><?php _e( 'Username', 'mk_framework' ); ?></label>
					<input type="text" id="username" name="log" class="text-input">
					</span>
					<span class="form-section">
						<label for="pwd"><?php _e( 'Password', 'mk_framework' ); ?></label>
						<input type="password" id="password" name="pwd" class="text-input">
					</span>
					<?php do_action( 'login_form' );?>
					<label class="mk-login-remember">
						<input type="checkbox" name="rememberme" id="rememberme" value="forever"><?php _e( " Remember Me", 'mk_framework' );?>
					</label>

					<input type="submit" id="login" name="submit_button" class="mk-button small three-dimension mk-skin-button" value="<?php _e( "LOG IN", 'mk_framework' );?>">
					<input type="hidden" value="login" class="" name="mk_form_action">
					<input type="hidden" value="mk_do_action" class="" name="action">
					<input type="hidden" value="<?php echo $_SERVER['PHP_SELF'] ?>" class="mk_login_redirect" name="submit">
					<div class="register-login-links">
							<a href="#" class="mk-forget-password"><?php _e( "Forget?", 'mk_framework' );?></a>
						<?php if ( get_option( 'users_can_register' ) ) { ?>
							<a href="#" class="mk-create-account"><?php _e( "Register", 'mk_framework' );?></a>
						<?php } ?>
					</div>
				</form>
		</div>

		<?php if ( get_option( 'users_can_register' ) ) { ?>
			<div id="mk-register-panel">
					<div class="mk-login-title"><?php _e( "Create Account", 'mk_framework' );?></div>

					<form id="register_form" name="login_form" method="post" class="mk-form-regsiter" action="<?php echo site_url( 'wp-login.php?action=register', 'login_post' ) ?>">
						<span class="form-section">
							<label for="log"><?php _e( 'Username', 'mk_framework' ); ?></label>
							<input type="text" id="reg-username" name="user_login" class="text-input">
						</span>
						<span class="form-section">
							<label for="user_email"><?php _e( 'Your email', 'mk_framework' ); ?></label>
							<input type="text" id="reg-email" name="user_email" class="text-input">
						</span>
						<span class="form-section">
							<label for="user_password"><?php _e( 'Your password', 'mk_framework' ); ?></label>
							<input type="text" id="reg-pass" name="user_password" class="text-input">
						</span>
						<span class="form-section">
							<label for="user_password2"><?php _e( 'Verify password', 'mk_framework' ); ?></label>
							<input type="text" id="reg-pass" name="user_password2" class="text-input">
						</span>
						<span class="form-section">
							<input type="submit" id="signup" name="submit" class="mk-button small three-dimension mk-skin-button" value="<?php _e( "Create Account", 'mk_framework' );?>">
						</span>
						<input type="hidden" value="register" class="" name="mk_form_action">
						<input type="hidden" value="mk_do_login" class="" name="action">
						<input type="hidden" value="<?php echo $_SERVER['PHP_SELF'] ?>" class="mk_login_redirect" name="submit">
						<div class="register-login-links">
							<a class="mk-return-login" href="#"><?php _e( "Already have an account?", 'mk_framework' );?></a>
						</div>
					</form>
			</div>
		<?php } ?>

		<div id="mk-forget-panel">
				<span class="mk-login-title"><?php _e( "Forget your password?", 'mk_framework' );?></span>
				<form id="forgot_form" name="login_form" method="post" class="mk-forget-password-form" action="<?php echo site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ?>">
					<span class="form-section">
							<label for="user_login"><?php _e( 'Username or E-mail', 'mk_framework' ); ?></label>
						<input type="text" id="forgot-email" name="user_login" class="text-input">
					</span>
					<span class="form-section">
						<input type="submit" id="recover" name="submit" class="mk-button small three-dimension mk-skin-button" value="<?php _e( "Get New Password", 'mk_framework' );?>">
					</span>
					<div class="register-login-links">
						<a class="mk-return-login" href="#"><?php _e( "Remember Password?", 'mk_framework' );?></a>
					</div>
				</form>

		</div>
	</div>
</div>
<?php
		}
	}





	function mk_header_subscribe() {

?>

<div id="mk-header-subscribe" class="mk-box-to-trigger">
	<form action="<?php echo theme_option( THEME_OPTIONS, 'mailchimp_action_url' ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		<label for="mce-EMAIL"><?php _e( 'Subscribe to newsletter', 'mk_framework' ); ?></label>
		<input type="email" value="" name="EMAIL" class="email text-input" id="mce-EMAIL" placeholder="<?php _e( 'email address', 'mk_framework' ); ?>" required>
		<input type="submit" value="<?php _e( 'Subscribe', 'mk_framework' ); ?>" name="subscribe" id="mc-embedded-subscribe" class="mk-button small mk-skin-button three-dimension">
	</form>
</div>



<?php
	}




	function mk_header_checkout() {
		global $woocommerce;
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
?>
<div id="mk-header-checkout">
	<span class="cart_details">
		<span class="mk-woo-items"><i class="mk-moon-cart-2"></i><?php echo sprintf( _n( '<strong>%d</strong> item', '<strong>%d</strong> items', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count );?></span>
		<span class="mk-woo-total"><strong><?php echo $woocommerce->cart->get_cart_total(); ?></strong><?php _e( "Total", 'mk_framework' );?></span>
		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'woothemes' ); ?>" class="mk-button three-dimension small mk-skin-button"><i class="mk-moon-cart-2"></i><?php _e( "view cart", 'mk_framework' );?></a>
	</span>
</div>

<?php
		}
	}







	function mk_google_maps( $post_id = NULL ) {
		global $post;
		if ( get_post_meta( $post_id, '_enable_page_gmap', true ) != 'true' ) {
			return false;
		}




		$id = rand( 100, 3000 );

		$latitude = get_post_meta( $post_id, '_page_gmap_latitude', true );
		$longitude = get_post_meta( $post_id, '_page_gmap_longitude', true );
		$zoom = get_post_meta( $post_id, '_page_gmap_zoom', true );
		$panControl = get_post_meta( $post_id, '_enable_panControl', true );
		$zoomControl = get_post_meta( $post_id, '_enable_zoomControl', true );
		$draggable = get_post_meta( $post_id, '_enable_draggable', true );
		$mapTypeControl = get_post_meta( $post_id, '_enable_mapTypeControl', true );
		$scaleControl = get_post_meta( $post_id, '_enable_scaleControl', true );
		$gmap_height = get_post_meta( $post_id, '_gmap_height', true );
		$scrollwheel = get_post_meta( $post_id, '_enable_scrollwheel', true );

		$gmap_disable_coloring = get_post_meta( $post_id, '_disable_coloring', true );
		$gmap_hue = get_post_meta( $post_id, '_gmap_hue', true );
		$gmap_gamma = get_post_meta( $post_id, '_gmap_gamma', true );
		$gmap_saturation = get_post_meta( $post_id, '_gmap_saturation', true );
		$gmap_lightness = get_post_meta( $post_id, '_gmap_lightness', true );


		if ( $zoom < 1 ) {
			$zoom = 1;
		}


?>

	<div id="gmap_page_<?php echo $id;?>" class="mk-header-gmap" style="height:<?php echo $gmap_height; ?>px; width:100%;"></div>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
			jQuery(document).ready(function($) {
  var map;
var gmap_marker = <?php echo get_post_meta( $post_id, '_gmap_marker', true ); ?>;
var pin_icon = "<?php echo get_post_meta( $post_id, '_pin_icon', true ); ?>";

if(pin_icon == '') {
	pin_icon = mk_images_dir + '/gmap_pin.png';
}


  var myLatlng = new google.maps.LatLng(<?php echo $latitude;?>, <?php echo $longitude;?>)
      function initialize() {
        var mapOptions = {
          zoom: <?php echo $zoom;?>,
          center: myLatlng,
	      panControl: <?php echo empty( $panControl ) ? 'false' : $panControl;?>,
		  zoomControl: <?php echo empty( $zoomControl ) ? 'false' : $zoomControl?>,
		  mapTypeControl: <?php echo empty( $mapTypeControl ) ? 'false' :  $mapTypeControl;?>,
		  scaleControl: <?php echo empty( $scaleControl ) ? 'false' : $scaleControl;?>,
		  draggable : <?php echo empty( $draggable ) ? 'false' : $draggable;?>,
		  scrollwheel : <?php echo empty( $scrollwheel ) ? 'false' : $scrollwheel;?>,
	      mapTypeId: google.maps.MapTypeId.ROADMAP,
	      <?php if ( $gmap_disable_coloring == "true" ) { ?>
	      styles: [ { stylers: [
	      			 {hue: "<?php echo $gmap_hue; ?>"},
	      			 {saturation : <?php echo $gmap_saturation; ?> },
				     {lightness: <?php echo $gmap_lightness; ?> },
				     {gamma: <?php echo $gmap_gamma; ?> },
	      			 { featureType: "landscape.man_made", stylers: [ { visibility: "on" } ] }
	      		]
				} ]
		<?php } ?>
        };
        map = new google.maps.Map(document.getElementById('gmap_page_<?php echo $id;?>'), mapOptions);


if(gmap_marker == true) {
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: pin_icon,
        });
}

      }
 		google.maps.event.addDomListener(window, 'load', initialize);
			});
			</script>

			<div class="clearboth"></div>
	<?php


	}




}

function theme_class( $function ) {
	global $_theme_class;
	$_theme_class = new theme_class;
	$args   = array_slice( func_get_args(), 1 );
	return call_user_func_array( array(
			&$_theme_class,
			$function
		), $args );
}
