<?php

class WPBakeryShortCode_mk_news extends WPBakeryShortCode {
}



function mk_news_loop( $atts, $current ) {
	global $post;
	extract( $atts );

	$post_style = get_post_meta( $post->ID, '_news_post_style', true );

	$terms = get_the_terms( get_the_id(), 'news_category' );
	$terms_slug = array();
	$terms_name = array();
	if ( is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			$terms_slug[] = $term->slug;
			$terms_name[] = $term->name;
		}
	}

	switch ( $post_style ) {

	case 'full-with-image' :
		if ( $layout == 'full' ) {
			$image_width = 1100;
		} else {
			$image_width = 800;
		}
		break;
	case 'full-without-image' :
		if ( $layout == 'full' ) {
			$image_width = 1100;
		} else {
			$image_width = 800;
		}
		break;
	case 'half-with-image' :
		$image_width = 550;
		break;
	case 'half-without-image' :
		$image_width = 550;
		break;
	case 'fourth-with-image' :
		$image_width = 275;
		break;
	case 'fourth-without-image' :
		$image_width = 275;
	default :




	}


	$output ='<article id="'.get_the_ID().'" style="height:'.$image_height.'px" class="mk-news-item mk-isotop-item news-'.$post_style.'">';

	switch ( $post_style ) {

	case 'full-with-image' :
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height );
		if ( has_post_thumbnail() ) {
			$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
		}
		$output .='<span class="news-date">'.get_the_time( 'Y/m/d' ).'</span>';
		$output .='<div class="news-meta-wrapper">';
		$output .='<div class="news-categories"><span>'. implode( ' ', $terms_name ) .'</span></div>';
		$output .='<div class="clearboth"></div>';
		$output .='<div class="news-the-title"><span><a href="'.get_permalink().'">'.get_the_title().'</a></span></div>';
		$output .= '</div>';
		break;

	case 'full-without-image' :
		$output .='<div class="news-meta-wrapper">';
		$output .='<div class="news-categories"><span>'. implode( ' ', $terms_name ) .'</span></div>';
		$output .='<div class="clearboth"></div>';
		$output .='<div class="news-the-title"><span><a href="'.get_permalink().'">'.get_the_title().'</a></span></div>';
		$output .='<span class="news-date">'.get_the_time( 'Y/m/d' ).'</span>';
		$output .= '</div>';
		$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
		$output .= '<a href="'.get_permalink().'" class="mk-read-more">'.__( 'Read more' , 'mk_framework' ).'<i class="mk-icon-double-angle-right"></i></a>';
		break;


	case 'half-with-image' :
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height );
		if ( has_post_thumbnail() ) {
			$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
		}
		$output .='<span class="news-date">'.get_the_time( 'Y/m/d' ).'</span>';
		$output .='<div class="news-meta-wrapper">';
		$output .='<div class="news-categories"><span>'. implode( ' ', $terms_name ) .'</span></div>';
		$output .='<div class="clearboth"></div>';
		$output .='<div class="news-the-title"><span><a href="'.get_permalink().'">'.get_the_title().'</a></span></div>';
		$output .= '</div>';
		break;

	case 'half-without-image' :
		$output .='<div class="news-meta-wrapper">';
		$output .='<div class="news-categories"><span>'. implode( ' ', $terms_name ) .'</span></div>';
		$output .='<div class="clearboth"></div>';
		$output .='<div class="news-the-title"><span><a href="'.get_permalink().'">'.get_the_title().'</a></span></div>';
		$output .='<span class="news-date">'.get_the_time( 'Y/m/d' ).'</span>';
		$output .='<div class="clearboth"></div>';
		$output .= '</div>';
		$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
		$output .= '<a href="'.get_permalink().'" class="mk-read-more">'.__( 'Read more' , 'mk_framework' ).'<i class="mk-icon-double-angle-right"></i></a>';
		break;


	case 'fourth-with-image' :
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height );
		if ( has_post_thumbnail() ) {
			$output .='<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
		}
		$output .='<span class="news-date">'.get_the_time( 'Y/m/d' ).'</span>';
		$output .='<div class="news-meta-wrapper">';
		$output .='<div class="news-categories"><span>'. implode( ' ', $terms_name ) .'</span></div>';
		$output .='<div class="clearboth"></div>';
		$output .='<div class="news-the-title"><span><a href="'.get_permalink().'">'.get_the_title().'</a></span></div>';
		$output .= '</div>';
		break;


	case 'fourth-without-image' :
		$output .='<div class="news-meta-wrapper">';
		$output .='<div class="news-categories"><span>'. implode( ' ', $terms_name ) .'</span></div>';
		$output .='<div class="clearboth"></div>';
		$output .='<div class="news-the-title"><span><a href="'.get_permalink().'">'.get_the_title().'</a></span></div>';
		$output .='<span class="news-date">'.get_the_time( 'Y/m/d' ).'</span>';
		$output .= '</div>';
		$output .='<div class="the-excerpt">'.get_the_excerpt().'</div>';
		$output .= '<a href="'.get_permalink().'" class="mk-read-more">'.__( 'Read more' , 'mk_framework' ).'<i class="mk-icon-double-angle-right"></i></a>';
	default :


	}



	$output .='</article>';



	return $output;

}
