<?php
class WPBakeryShortCode_mk_blog extends WPBakeryShortCode {

}



/*
* Blog Classic Style
*/
function blog_classic_style( $atts, $current ) {
	global $post;
	extract( $atts );

	$orientation = get_post_meta( $post->ID, '_classic_orientation', true );
	switch ( $orientation ) {
	case 'landscape':
		$orientation_class = 'mk-blog-landscape';
		if ( $layout=='full' ) {
			$image_width = 1100;
			$image_height = 400;
		}else {
			$image_width = 800;
			$image_height = 370;
		}
		break;
	case 'portraite':
		$orientation_class = 'mk-blog-portraite';
		if ( $layout=='full' ) {
			$image_width = 550;
			$image_height = 600;
		}else {
			$image_width = 400;
			$image_height = 400;
		}
		break;
	default:
		$orientation_class = 'mk-blog-landscape';
		if ( $layout=='full' ) {
			$image_width = 1100;
			$image_height = 400;
		}else {
			$image_width = 800;
			$image_height = 370;
		}
	}

	$output = '';



	$post_type = get_post_meta( $post->ID, '_single_post_type', true );

	if($post_type == '') {
		$post_type = 'image';
	}


	
		// Image post type
		if ( $post_type == 'image' || $post_type == 'portfolio' || $post_type == '' ) {
			$output .='<article id="'.get_the_ID().'" class="mk-blog-classic-item mk-isotop-item image-post-type '.$orientation_class.'">' . "\n";
			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
			$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height);
			$show_lightbox = get_post_meta( $post->ID, '_disable_post_lightbox', true );
			if(($show_lightbox == 'true' || $show_lightbox == '') && $disable_lightbox == 'true') {
				$lightbox_code = ' rel="prettyPhoto[blog-classic]" class="mk-lightbox" href="'.$image_src_array[ 0 ].'"';
			} else {
				$lightbox_code = ' href="'.get_permalink().'"';
			}
			$output .='<div class="featured-image"><a title="'.get_the_title().'"'.$lightbox_code.'>';
			if ( has_post_thumbnail() ) {
				$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
			}
			$output .='<div class="image-hover-overlay"></div>';
			$output .='<a class="post-type-badge '.$post_type.'-icon" href="'.get_permalink().'"><span></span></a>';
			$output .='</a></div>';
			$output .='<div class="mk-blog-meta">';
			$output .= '<div class="mk-blog-author">By ';
			ob_start();
			the_author_posts_link();
			$output .= ob_get_clean().'</div>';
			$output .='<div class="mk-categories">In '.get_the_category_list( ', ' ).' Posted </div>';
			$output .='<time datetime="'.get_the_time( 'F jS, Y' ).'">';
			$output .='<a href="'.get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ).'">'.get_the_time( 'F jS, Y' ).'</a>';
			$output .='</time>';
			$output .='<div class="clearboth"></div>';
			$output .='<h3 class="the-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
			$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
			if($disable_comments_share != 'false') {
			ob_start();
			comments_number( '0', '1', '%' );
			$output .= '<a href="'.get_permalink().'#comments" class="mk-classic-comments"><i class="mk-moon-bubble-10"></i><span>'.ob_get_clean().'</span></a>';
			$output .= '<span class="mk-blog-share-container">';
			$output .= '<span class="mk-blog-share"><i class="mk-moon-share-2"></i></span>';
			$output .= '<div class="mk-blog-share-buttons">';
			$output .= '<span class="blog-share-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink().'"  data-text="'.get_the_title().'" data-count="horizental">Tweet</a></span>';
			$output .= '<span class="blog-share-button"><fb:like href="'.get_permalink().'" layout="button_count"></fb:like></span>';
			$output .= '<span class="blog-share-button classic-googleplus"><g:plusone size="medium" href="'.get_permalink().'"></g:plusone></span>';
			$output .= '<div class="clearboth"></div></div>';
			$output .= '</span>';
			}
			$output .= '<a class="mk-readmore" href="'.get_permalink().'"><i class="mk-icon-double-angle-right"></i>'.__('Read More', 'mk_framework').'</a>';			
			$output .='<div class="clearboth"></div></div>';
			$output .='</article>' . "\n\n\n";
		}


			
			


		if ( $post_type == 'video' ) {

			$video_id = get_post_meta( $post->ID, '_single_video_id', true );
			$video_site  = get_post_meta( $post->ID, '_single_video_site', true );

			
			$output .='<article id="'.get_the_ID().'" class="mk-blog-classic-item mk-isotop-item video-post-type '.$orientation_class.'">' . "\n";
			$output .='<div class="featured-image">';
			if($video_site =='vimeo') {
			$output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}

			if($video_site =='youtube') {
			$output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.youtube.com/embed/'.$video_id.'?showinfo=0&amp;theme=light&amp;color=white&amp;rel=0" frameborder="0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
			}

			if($video_site =='dailymotion') {
			$output .= '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.dailymotion.com/embed/video/'.$video_id.'?logo=0" frameborder="0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
			}
			$output .='</div>';
			$output .='<div class="mk-blog-meta">';
			$output .= '<div class="mk-blog-author">By ';
			ob_start();
			the_author_posts_link();
			$output .= ob_get_clean().'</div>';
			$output .='<span class="mk-categories">In '.get_the_category_list( ', ' ).' Posted </span>';
			$output .='<time datetime="'.get_the_time( 'F jS, Y' ).'">';
			$output .='<a href="'.get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ).'">'.get_the_time( 'F jS, Y' ).'</a>';
			$output .='</time>';
			$output .='<div class="clearboth"></div>';

			$output .='<h3 class="the-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
			$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
			if($disable_comments_share != 'false') {
			ob_start();
			comments_number( '0', '1', '%' );
			$output .= '<a href="'.get_permalink().'#comments" class="mk-classic-comments"><i class="mk-moon-bubble-10"></i><span>'.ob_get_clean().'</span></a>';
			$output .= '<span class="mk-blog-share-container">';
			$output .= '<span class="mk-blog-share"><i class="mk-moon-share-2"></i></span>';
			$output .= '<div class="mk-blog-share-buttons">';
			$output .= '<span class="blog-share-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink().'"  data-text="'.get_the_title().'" data-count="horizental">Tweet</a></span>';
			$output .= '<span class="blog-share-button"><fb:like href="'.get_permalink().'" layout="button_count"></fb:like></span>';
			$output .= '<span class="blog-share-button classic-googleplus"><g:plusone size="medium" href="'.get_permalink().'"></g:plusone></span>';
			$output .= '<div class="clearboth"></div></div>';
			$output .= '</span>';
			}
			$output .= '<a class="mk-readmore" href="'.get_permalink().'"><i class="mk-icon-double-angle-right"></i>'.__('Read More', 'mk_framework').'</a>';			
			$output .='<div class="clearboth"></div></div>';
			$output .='</article>' . "\n\n\n";

		}







		if ( $post_type == 'audio' ) {
			
			$audio_id = mt_rand( 99, 999 );
			$mp3_file  = get_post_meta( $post->ID, '_mp3_file', true );
			$ogg_file  = get_post_meta( $post->ID, '_ogg_file', true );
			$audio_author  = get_post_meta( $post->ID, '_single_audio_author', true ); 

			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
			$image_src  = theme_image_resize( $image_src_array[ 0 ], 50, 50);

			$output .='<article id="'.get_the_ID().'" class="mk-blog-classic-item mk-isotop-item audio-post-type">' . "\n";
			$output .='<div class="mk-audio-section">';	
			if ( has_post_thumbnail() ) {
				$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
			}
			if($audio_author) {
				$output .='<span class="mk-audio-author">'.$audio_author.'</span>';
			}
			$output .='<div class="clearboth"></div><div data-mp3="'.$mp3_file.'" data-ogg="'.$ogg_file.'" id="jquery_jplayer_'.$audio_id.'" class="jp-jplayer mk-blog-audio"></div>
			<div id="jp_container_'.$audio_id.'" class="jp-audio">
				<div class="jp-type-single">
					<div class="jp-gui jp-interface">
						<div class="jp-time-holder">
							<div class="jp-current-time"></div> /
							<div class="jp-duration"></div>
						</div>
						
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-volume-bar">
							<i class="mk-icon-volume-off"></i><div class="inner-value-adjust"><div class="jp-volume-bar-value"></div></div>
						</div>
						<ul class="jp-controls">
							<li><a href="javascript:;" class="jp-play" tabindex="1"><i class="mk-icon-play"></i></a></li>
							<li><a href="javascript:;" class="jp-pause" tabindex="1"><i class="mk-icon-pause"></i></a></li>
						</ul>
					</div>
					<div class="jp-no-solution">
						<span>Update Required</span>
						To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
					</div>
				</div>
		</div>';
		$output .='</div>';

		$output .='<div class="mk-blog-meta">';

		$output .='<h3 class="the-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
		$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
		if($disable_comments_share != 'false') {
		ob_start();
		comments_number( '0', '1', '%' );
		$output .= '<a href="'.get_permalink().'#comments" class="mk-classic-comments"><i class="mk-moon-bubble-10"></i><span>'.ob_get_clean().'</span></a>';
		$output .= '<span class="mk-blog-share-container">';
		$output .= '<span class="mk-blog-share"><i class="mk-moon-share-2"></i></span>';
		$output .= '<div class="mk-blog-share-buttons">';
		$output .= '<span class="blog-share-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink().'"  data-text="'.get_the_title().'" data-count="horizental">Tweet</a></span>';
		$output .= '<span class="blog-share-button"><fb:like href="'.get_permalink().'" layout="button_count"></fb:like></span>';
		$output .= '<span class="blog-share-button classic-googleplus"><g:plusone size="medium" href="'.get_permalink().'"></g:plusone></span>';
		$output .= '<div class="clearboth"></div></div>';
		$output .= '<span>';
		}
		$output .= '<a class="mk-readmore" href="'.get_permalink().'"><i class="mk-icon-double-angle-right"></i>'.__('Read More', 'mk_framework').'</a>';			
		$output .='<div class="clearboth"></div></div>';
		$output .='</article>' . "\n\n\n";

		}



		



	return $output;

}
/*******************************************/









/*
* Blog Classic Style
*/
function blog_grid_style( $atts, $i, $current ) {
	global $post;
	extract( $atts );

	$image_height = $grid_image_height;

	switch ( $column ) {
			case 1 :
				if ( $layout=='full' ) {
					$image_width = 1100;
				}else {
					$image_width = 800;
				}
				$column_css = 'one-column';
			break;
			case 2 :
				if ( $layout=='full' ) {
					$image_width = 550;
				}else {
					$image_width = 500;
				}
				$column_css = 'two-column';
			break;

			case 3 :
				$image_width = 500;
				$column_css = 'three-column';
			break;

			case 4 :
				$image_width = 500;
				$column_css = 'four-column';
			break;
			default :
				$image_width = 500;
	}

	$output = $last_col = '';

		if($i%$column == 0) {
			$last_col = ' last-column';
		}

	$post_type = get_post_meta( $post->ID, '_single_post_type', true );

	if($post_type == '') {
		$post_type = 'image';
	}

	
		// Image post type
		if ( $post_type == 'image' || $post_type == 'portfolio' || $post_type == '' ) {
			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
			$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height);
			$output .='<article id="'.get_the_ID().'" class="mk-blog-grid-item image-post-type '.$column_css. $last_col .'">' . "\n";
			$show_lightbox = get_post_meta( $post->ID, '_disable_post_lightbox', true );

			if(($show_lightbox == 'true' || $show_lightbox == '') && $disable_lightbox == 'true') {
				$lightbox_code = ' rel="prettyPhoto[blog-classic]" class="mk-lightbox" href="'.$image_src_array[ 0 ].'"';
			} else {
				$lightbox_code = ' href="'.get_permalink().'"';
			}
			$output .='<div class="featured-image"><a title="'.get_the_title().'"'.$lightbox_code.'>';
			
			if ( has_post_thumbnail() ) {
				$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
			}
			$output .='</a></div>';
			$output .='<div class="mk-blog-meta">';
			$output .='<h3 class="the-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
			if($disable_meta !='false') {
				$output .= '<div class="mk-blog-author">By ';
				ob_start();
				the_author_posts_link();
				$output .= ob_get_clean().'</div>';
				$output .='<div class="mk-categories">In '.get_the_category_list( ', ' ).' Posted </div>';
				$output .='<time datetime="'.get_the_time( 'F jS, Y' ).'">';
				$output .='<a href="'.get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ).'">'.get_the_time( 'F jS, Y' ).'</a>';
				$output .='</time>';
				$output .='<div class="clearboth"></div>';
			}
			
			$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
			$output .= '<a class="mk-readmore" href="'.get_permalink().'"><i class="mk-icon-double-angle-right"></i>'.__('Read More', 'mk_framework').'</a>';			
			$output .='<div class="clearboth"></div></div>';
			$output .='</article>' . "\n\n\n";
		}






		if ( $post_type == 'video' ) {

			$video_id = get_post_meta( $post->ID, '_single_video_id', true );
			$video_site  = get_post_meta( $post->ID, '_single_video_site', true );
			$skin_color = theme_option(THEME_OPTIONS, 'skin_color' );


			$output .='<article id="'.get_the_ID().'" class="mk-blog-grid-item video-post-type '.$column_css. $last_col .'">' . "\n";
			$output .='<div class="featured-image">';
			if($video_site =='vimeo') {
			$output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color='.str_replace("#", "", $skin_color).'" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}
			if($video_site =='youtube') {
			$output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.youtube.com/embed/'.$video_id.'?showinfo=0&amp;theme=light&amp;color=white&amp;rel=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
			}

			if($video_site =='dailymotion') {
			$output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.dailymotion.com/embed/video/'.$video_id.'?logo=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
			}
			$output .='</div>';
			$output .='<div class="mk-blog-meta">';
			$output .='<h3 class="the-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
			if($disable_meta !='false') {
				$output .= '<div class="mk-blog-author">By ';
				ob_start();
				the_author_posts_link();
				$output .= ob_get_clean().'</div>';
				$output .='<div class="mk-categories">In '.get_the_category_list( ', ' ).' Posted </div>';
				$output .='<time datetime="'.get_the_time( 'F jS, Y' ).'">';
				$output .='<a href="'.get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ).'">'.get_the_time( 'F jS, Y' ).'</a>';
				$output .='</time>';
				$output .='<div class="clearboth"></div>';
			}

			
			$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
			$output .= '<a class="mk-readmore" href="'.get_permalink().'"><i class="mk-icon-double-angle-right"></i>'.__('Read More', 'mk_framework').'</a>';			
			$output .='<div class="clearboth"></div></div>';
			$output .='</article>' . "\n\n\n";

		}







		if ( $post_type == 'audio' ) {
			
			$audio_id = mt_rand( 99, 999 );
			$mp3_file  = get_post_meta( $post->ID, '_mp3_file', true );
			$ogg_file  = get_post_meta( $post->ID, '_ogg_file', true );
			$audio_author  = get_post_meta( $post->ID, '_single_audio_author', true ); 

			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
			$image_src  = theme_image_resize( $image_src_array[ 0 ], 50, 50);

			$output .='<article id="'.get_the_ID().'" class="mk-blog-grid-item audio-post-type '.$column_css.$last_col .'">' . "\n";
			$output .='<div class="mk-audio-section">';	
			if ( has_post_thumbnail() ) {
				$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
			}
			if($audio_author) {
				$output .='<span class="mk-audio-author">'.$audio_author.'</span>';
			}
			$output .='<div class="clearboth"></div><div data-mp3="'.$mp3_file.'" data-ogg="'.$ogg_file.'" id="jquery_jplayer_'.$audio_id.'" class="jp-jplayer mk-blog-audio"></div>
			<div id="jp_container_'.$audio_id.'" class="jp-audio">
				<div class="jp-type-single">
					<div class="jp-gui jp-interface">
						<div class="jp-time-holder">
							<div class="jp-current-time"></div> /
							<div class="jp-duration"></div>
						</div>
						
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-volume-bar">
							<i class="mk-icon-volume-off"></i><div class="inner-value-adjust"><div class="jp-volume-bar-value"></div></div>
						</div>
						<ul class="jp-controls">
							<li><a href="javascript:;" class="jp-play" tabindex="1"><i class="mk-icon-play"></i></a></li>
							<li><a href="javascript:;" class="jp-pause" tabindex="1"><i class="mk-icon-pause"></i></a></li>
						</ul>
					</div>
					<div class="jp-no-solution">
						<span>Update Required</span>
						To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
					</div>
				</div>
		</div>';
		$output .='</div>';

		$output .='<div class="mk-blog-meta">';
		$output .='<h3 class="the-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
		if($disable_meta !='false') {
				$output .= '<div class="mk-blog-author">By ';
				ob_start();
				the_author_posts_link();
				$output .= ob_get_clean().'</div>';
				$output .='<div class="mk-categories">In '.get_the_category_list( ', ' ).' Posted </div>';
				$output .='<time datetime="'.get_the_time( 'F jS, Y' ).'">';
				$output .='<a href="'.get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ).'">'.get_the_time( 'F jS, Y' ).'</a>';
				$output .='</time>';
				$output .='<div class="clearboth"></div>';
			}
		$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
		$output .= '<a class="mk-readmore" href="'.get_permalink().'"><i class="mk-icon-double-angle-right"></i>'.__('Read More', 'mk_framework').'</a>';			
		$output .='<div class="clearboth"></div></div>';
		$output .='</article>' . "\n\n\n";

		}

		if($i%$column == 0) {
			$output .= '<div class="clearboth"></div>';
		}

		



	return $output;

}
/*******************************************/













/*
* Blog Newspaper Style
*/
function blog_newspaper_style($atts, $current ) {
	global $post;
	extract( $atts );

	$image_width = 300;


	if ( $layout == 'full' ) {
		$layout_class = 'newspaper-full-layout';
	} else {
		$layout_class = 'newspaper-with-sidebar';
	}
	$output = '';

	$post_type = get_post_meta( $post->ID, '_single_post_type', true );

	if($post_type == '') {
		$post_type = 'image';
	}

		$output .='<article id="'.get_the_ID().'" class="mk-blog-newspaper-item mk-isotop-item '.$layout_class.'">' . "\n";
	
		// Image post type
		if ( $post_type == 'image' || $post_type == 'portfolio' || $post_type == '' ) {
			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
			$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, 9999);
			$show_lightbox = get_post_meta( $post->ID, '_disable_post_lightbox', true );

			if(($show_lightbox == 'true' || $show_lightbox == '') && $disable_lightbox == 'true') {
				$lightbox_code = ' rel="prettyPhoto[blog-classic]" class="mk-lightbox" href="'.$image_src_array[ 0 ].'"';
			} else {
				$lightbox_code = ' href="'.get_permalink().'"';
			}
			$output .='<div class="featured-image"><a title="'.get_the_title().'"'.$lightbox_code.'>';
			
			if ( has_post_thumbnail() ) {
				$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
			}
			$output .='<div class="image-hover-overlay"></div>';
			$output .='<div class="post-type-badge '.$post_type.'-icon" href="'.get_permalink().'"><span></span></div>';
			$output .='</a></div>';
			
		}






		if ( $post_type == 'video' ) {

			$video_id = get_post_meta( $post->ID, '_single_video_id', true );
			$video_site  = get_post_meta( $post->ID, '_single_video_site', true );

			
			$output .='<div class="featured-image">';
			if($video_site =='vimeo') {
			$output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}

			if($video_site =='youtube') {
			$output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.youtube.com/embed/'.$video_id.'?showinfo=0&amp;theme=light&amp;color=white&amp;rel=0" frameborder="0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
			}

			if($video_site =='dailymotion') {
			$output .= '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.dailymotion.com/embed/video/'.$video_id.'?logo=0" frameborder="0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
			}
			
			$output .='</div>';

		}







		if ( $post_type == 'audio' ) {
			
			$audio_id = mt_rand( 99, 999 );
			$mp3_file  = get_post_meta( $post->ID, '_mp3_file', true );
			$ogg_file  = get_post_meta( $post->ID, '_ogg_file', true );
			$audio_author  = get_post_meta( $post->ID, '_single_audio_author', true ); 

			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
			$image_src  = theme_image_resize( $image_src_array[ 0 ], 50, 50);
			$output .='<div class="mk-audio-section">';	
			if ( has_post_thumbnail() ) {
				$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
			}
			if($audio_author) {
				$output .='<span class="mk-audio-author">'.$audio_author.'</span>';
			}
			$output .='<div class="clearboth"></div><div data-mp3="'.$mp3_file.'" data-ogg="'.$ogg_file.'" id="jquery_jplayer_'.$audio_id.'" class="jp-jplayer mk-blog-audio"></div>
			<div id="jp_container_'.$audio_id.'" class="jp-audio">
				<div class="jp-type-single">
					<div class="jp-gui jp-interface">
						<div class="jp-time-holder">
							<div class="jp-current-time"></div> /
							<div class="jp-duration"></div>
						</div>
						
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-volume-bar">
							<i class="mk-icon-volume-off"></i><div class="inner-value-adjust"><div class="jp-volume-bar-value"></div></div>
						</div>
						<ul class="jp-controls">
							<li><a href="javascript:;" class="jp-play" tabindex="1"><i class="mk-icon-play"></i></a></li>
							<li><a href="javascript:;" class="jp-pause" tabindex="1"><i class="mk-icon-pause"></i></a></li>
						</ul>
					</div>
					<div class="jp-no-solution">
						<span>Update Required</span>
						To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
					</div>
				</div>
		</div>';
		$output .='</div>';

		}


		$output .='<div class="mk-blog-meta">';
		
		$output .='<time datetime="'.get_the_time( 'F jS, Y' ).'">';
		$output .='<a href="'.get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ).'">'.get_the_time( 'F jS, Y' ).'</a>';
		$output .='</time>';
		$output .='<div class="clearboth"></div>';

		$output .='<h3 class="the-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
		$output .='<div class="the-excerpt">'.get_the_excerpt();
		$output .= '<a class="mk-readmore" href="'.get_permalink().'">'.__('Read More', 'mk_framework').'<i class="mk-icon-double-angle-right"></i></a>';
		$output .= '</div></div>';
		if($disable_comments_share != 'false') {
		ob_start();
		comments_number( __('No Response', 'mk_framework'), __('1 Response', 'mk_framework') , __('% Responses', 'mk_framework'));
		$output .= '<div class="mk-newspaper-comments-share">';
		$output .= '<span class="mk-comment-count"><i class="mk-moon-bubble-10"></i>'.ob_get_clean().'</span>';
		$output .= '<span class="mk-share-count"><i class="mk-moon-share-2"></i>'.__('Share', 'mk_framework').'</span>';
		$output .= '<div class="clearboth"></div>';

		$c_args = array(
			'number' => '4',
			'status' => 'approve',
			'post_id' => $post->ID
		);
		$comments = get_comments( $c_args );
		$output .= '<ul class="mk-newspaper-comments-list">';
		foreach ( $comments as $comment ) :
			$output .= '<li>';
		$output .=  get_avatar( $comment->comment_author_email, 35 );
		if(!empty($comment->comment_author_url)) {
			$output .= '<span class="comment-author"><a href="'.$comment->comment_author_url.'">' . $comment->comment_author . '</a></span>';
		} else {
			$output .= '<span class="comment-author">' . $comment->comment_author . '</span>';
		}
		
		$stripped_comment = strip_tags( $comment->comment_content );
		$output .= '<span class="comment-content">' . substr( $stripped_comment, 0, 60 ) . '...</span>';
		$output .= '<div class="clearboth"></div></li>';
		endforeach;
		$output .= '</ul>';
		$output .= '<div class="newspaper-share-buttons">';
		$output .= '<span class="share-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink().'"  data-text="'.get_the_title().'" data-count="vertical">Tweet</a></span>';
		$output .= '<span class="share-button mk-facebook"><fb:like href="'.get_permalink().'" layout="box_count"></fb:like></span>';
		$output .= '<span class="share-button mk-googleplus"><g:plusone annotation="vertical-bubble" size="tall"></g:plusone></span>';
		$output .= '</div>';

		$output .= '</div>';
		}

		$output .='</article>' . "\n\n\n";

	return $output;

}