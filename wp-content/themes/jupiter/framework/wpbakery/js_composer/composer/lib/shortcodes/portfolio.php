<?php

class WPBakeryShortCode_mk_portfolio extends WPBakeryShortCode {


}




function mk_portfolio_classic_loop( &$r, $atts, $current ) {
	global $post;
	extract( $atts );
	$grid_width = theme_option( THEME_OPTIONS, 'grid_width' );



	if ( $column > 6 ) {
		$column = 6;
	}

	switch ( $column ) {
	case 1:
		if ( $layout == 'full' ) {
			$width = $grid_width;
		} else {
			$width = 770;
		}
		$column_css = 'portfolio-one-column';
		break;
	case 2:
		if ( $layout == 'full' ) {
			$width = $grid_width / 2;
		} else {
			$width = 500;
		}
		$column_css = 'portfolio-two-column';
		break;
	case 3:
		$width = $grid_width / 3;
		$column_css = 'portfolio-three-column';
		break;

	case 4:
		$width = 550;
		$column_css = 'portfolio-four-column';
		break;

	case 5:
		$width = 500;
		$column_css = 'portfolio-five-column';
		break;

	case 6:
		$width = 500;
		$column_css = 'portfolio-six-column';
		break;

	}

	if ( $layout == 'full' ) {
		$layout_class = 'portfolio-full-layout';
	} else {
		$layout_class = 'portfolio-with-sidebar';
	}




	$output = '';



	$terms = get_the_terms( get_the_id(), 'portfolio_category' );
	$terms_slug = array();
	$terms_name = array();
	if ( is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			$terms_slug[] = $term->slug;
			$terms_name[] = '<a href="'.get_term_link( $term->slug, 'portfolio_category' ).'">'.$term->name.'</a>';

		}
	}


	$height = !empty( $height ) ? $height : 600;

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


	$output .='<article id="'.get_the_ID().'" class="mk-portfolio-item mk-portfolio-classic-item mk-isotop-item '.$column_css.' '.$layout_class.' portfolio-'.$post_type.' ' . implode( ' ', $terms_slug ) . '">';

	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$image_src  = theme_image_resize( $image_src_array[ 0 ], $width, $height );

	$lightbox = $single_hover_icon = '';
	if ( $disable_permalink == 'false' ) {
		$single_hover_icon = ' hover-single-icon';
	}

	if ( $post_type == 'image' || $post_type == '' ) {

		$lightbox ='<a rel="prettyPhoto[portfolio-loop]" title="'.get_the_title().'" class="zoom-badge mk-lightbox'.$single_hover_icon.'" href="'.$image_src_array[ 0 ].'"><i class="mk-icon-zoom-in"></i></a>';

	} else  if ( $post_type == 'video' ) {
			$video_id = get_post_meta( $post->ID, '_single_video_id', true );
			$video_site  = get_post_meta( $post->ID, '_single_video_site', true );

			$video_url = '';
			// Vimeo Video post type
			if ( $video_site =='vimeo' ) {
				$video_url = 'http://vimeo.com/'.$video_id;
				// Youtube Video post type
			} elseif ( $video_site =='youtube' ) {
				$video_url = 'http://www.youtube.com/watch?v='.$video_id.'';

				// dailymotion Video post type
			} elseif ( $video_site =='dailymotion' ) {
				$video_url = 'http://www.dailymotion.com/embed/video/'.$video_id.'?logo=0';
			}
			$lightbox ='<a rel="prettyPhoto[portfolio-loop]" title="'.get_the_title().'" class="video-badge mk-lightbox'.$single_hover_icon.'" href="'.$video_url.'"><i class="mk-icon-play"></i></a>';
		}

	$output .='<div class="featured-image">';
	$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'"  />';
	$output .='<div class="image-hover-overlay"></div>';
	if ( $disable_permalink == 'true' ) {
		$output .='<a class="permalink-badge" target="'.$target.'" href="'.$permalink.'"><i class="mk-icon-link"></i></a>';
	}
	$output .= $lightbox;
	$output .='</div>';

	$output .='<div class="portfolio-meta-wrapper">';

	if ( $disable_permalink == 'true' ) {
		$output .='<h3 class="the-title"><a target="'.$target.'" href="'.$permalink.'">'.get_the_title().'</a></h3><div class="clearboth"></div>';
	} else {
		$output .='<h3 class="the-title">'.get_the_title().'</h3><div class="clearboth"></div>';
	}
	$output .='<div class="portfolio-categories">'. implode( ', ', $terms_name ) .' </div>';
	if ( $disable_excerpt == 'true' ) {
		$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
	}
	$output .='</div>';




	$output .='<div class="clearboth"></div></article>' . "\n\n\n";


	return $output;

}
/*******************************************/







function mk_portfolio_modern_loop( &$r, $atts, $current ) {
	global $post;
	extract( $atts );
	$grid_width = theme_option( THEME_OPTIONS, 'grid_width' );



	if ( $column > 6 ) {
		$column = 6;
	}

	switch ( $column ) {
	case 1:
		if ( $layout == 'full' ) {
			$width = $grid_width;
		} else {
			$width = 770;
		}
		$column_css = 'portfolio-one-column';
		break;
	case 2:
		if ( $layout == 'full' ) {
			$width = $grid_width / 2;
		} else {
			$width = 500;
		}
		$column_css = 'portfolio-two-column';
		break;
	case 3:
		$width = $grid_width / 3;
		$column_css = 'portfolio-three-column';
		break;

	case 4:
		$width = 550;
		$column_css = 'portfolio-four-column';
		break;

	case 5:
		$width = 500;
		$column_css = 'portfolio-five-column';
		break;

	case 6:
		$width = 500;
		$column_css = 'portfolio-six-column';
		break;

	}

	if ( $layout == 'full' ) {
		$layout_class = 'portfolio-full-layout';
	} else {
		$layout_class = 'portfolio-with-sidebar';
	}




	$output = '';



	$terms = get_the_terms( get_the_id(), 'portfolio_category' );
	$terms_slug = array();
	$terms_name = array();
	if ( is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			$terms_slug[] = $term->slug;
			$terms_name[] = '<a href="'.get_term_link( $term->slug, 'portfolio_category' ).'">'.$term->name.'</a>';

		}
	}


	$height = !empty( $height ) ? $height : 600;

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


	$output .='<article id="'.get_the_ID().'" class="mk-portfolio-item mk-modern-portfolio-item mk-isotop-item '.$column_css.' '.$layout_class.' portfolio-'.$post_type.' ' . implode( ' ', $terms_slug ) . '">';

	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$image_src  = theme_image_resize( $image_src_array[ 0 ], $width, $height );


	$output .='<div class="featured-image">';
	$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'"  />';
	$output .='<div class="image-hover-overlay"></div>';

	if ( $post_type == 'image' || $post_type == '' ) {
		$output .='<a title="'.get_the_title().'" class="modern-post-type-icon project-load"  data-post-id="'.get_the_ID().'" href="'.$permalink.'"><i class="mk-moon-plus"></i></a>';

	} else  if ( $post_type == 'video' ) {
			$output .='<a title="'.get_the_title().'" class="modern-post-type-icon modern-video-icon project-load" data-post-id="'.get_the_ID().'" href="'.$permalink.'"><i class="mk-moon-play-2"></i></a>';
		}

	$output .='<div class="modern-portfolio-meta">';
	$output .='<h3 class="the-title"><a data-post-id="'.get_the_ID().'" href="'.$permalink.'">'.get_the_title().'</a></h3><div class="clearboth"></div>';
	$output .='<div class="portfolio-categories">'. implode( ', ', $terms_name ) .' </div>';
	$output .='</div>';
	$output .='</div>';



	$output .='<div class="clearboth"></div></article>' . "\n\n\n";


	return $output;

}




/*


add_action( 'wp_ajax_nopriv_mk_ajax_portfolio','mk_ajax_portfolio');
add_action( 'wp_ajax_mk_ajax_portfolio', 'mk_ajax_portfolio');

function mk_ajax_portfolio() {
	if ( isset( $_POST['id'] ) && !empty( $_POST['id'] ) ):
		$output = get_ajax_portfolio_item( $_POST['id'] );
	die( $output );
	else:
		die( 0 );
	endif;
}


function get_ajax_portfolio_item($id = false) {
	
			$query = array();
			global $wp_embed;
			if(empty($id)) return false;
			
			query_posts(array(
				'post_type' => 'portfolio',
				'p'	=> $id
			));
			
			$html = '';
			
			if(have_posts()):
				
				while(have_posts()): the_post();			
			
					$the_id			= get_the_ID();
					$size			= 'full';
					
					$current_post['title']		= get_the_title();
					$current_post['content']	= get_the_content();
					
					// Apply the default wordpress filters to the content
					$content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $current_post['content'] ));
					
					

					$html = "<div id='ajax_project_{$the_id}' class='ajax_project' data-project_id='{$the_id}'>";
						
						$html .= "<div class='project_media'>";
						

						
						$html .= "</div>";
						
						$html .= "<div class='project_description'>";
							
							$html .= "<h2 class='title'>".get_the_title()."</h2>";
							
							$html .= $content;
							
						$html .= "</div>";
						
					$html .= "</div>";
			
				endwhile;
			endif;
			
			wp_reset_query();
			
			if($html)
				return $html;
	
	
}





function add_ajax_library() {
	$html = '<script type="text/javascript">';
	$html.= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
	$html.= '</script>';
	echo $html;
}

add_action('wp_head', 'add_ajax_library');
*/
