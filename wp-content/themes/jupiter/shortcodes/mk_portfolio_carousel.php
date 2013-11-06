<?php

extract( shortcode_atts( array(
			'title' => '',
			'style' => 'classic',
			'view_all' => '',
			'count'=> 10,
			'author' => '',
			'posts' => '',
			'offset' => 0,
			'cat' => '',
			'order'=> 'DESC',
			'orderby'=> 'date',
			'show_items' => 4,
			'disable_title_cat' => 'true',
			'el_class' => '',
		), $atts ) );
wp_enqueue_script( 'jquery-flexslider' );
$id = mt_rand( 99, 999 );
$query = array(
	'post_type' => 'portfolio',
	'posts_per_page' => (int)$count,
);
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $cat != '' ) {
	global $wp_version;
	if ( version_compare( $wp_version, "3.1", '>=' ) ) {
		$query['tax_query'] = array(
			array(
				'taxonomy' => 'portfolio_category',
				'field' => 'slug',
				'terms' => explode( ',', $cat )
			)
		);
	}else {
		$query['taxonomy'] = 'portfolio_category';
		$query['term'] = $cat;
	}
}
if ( $posts ) {
	$query['post__in'] = explode( ',', $posts );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$r = new WP_Query( $query );

global $post;


$output = '';
if ( $style == 'classic' ) :

	$show_items = 4;

	$output .= '<div class="mk-shortcode mk-portfolio-carousel '.$el_class.'">';
$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style"><span>'.$title.'</span>';
$output .= '<a href="'.get_permalink( $view_all ).'" class="mk-portfolio-view-all">'.__( 'VIEW ALL', 'mk_framework' ).'</a></h3>';

$output .= '<div id="mk-portfolio-carousel-'.$id.'" class="mk-flexslider"><ul class="mk-flex-slides">';

if ( $r->have_posts() ):
	while ( $r->have_posts() ) :
		$r->the_post();

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
$image_src  = theme_image_resize( $image_src_array[ 0 ], 260, 180 );

$output .= '<li>';
$output .= '<div class="mk-portfolio-carousel-thumb"><img width="260" height="180" src="'.$image_src['url'].'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
$output .= '<div class="portfolio-carousel-overlay"></div>';
$output .= '<a class="mk-lightbox portfolio-carousel-lightbox" alt="'.get_the_title().'" title="'.get_the_title().'" rel="prettyPhoto[p-c-'.$id.']" href="'.$image_src_array[0].'"><i class="mk-icon-zoom-in"></i></a>';
$output .= '<a class="portfolio-carousel-permalink" href="'.get_permalink().'"><i class="mk-icon-link"></i></a>';
$output .= '</div>';
$output .= '<div class="portfolio-carousel-extra-info">';
$output .= '<a class="portfolio-carousel-title" href="'.get_permalink().'">'.get_the_title().'</a><div class="clearboth"></div>';
$output .= '<div class="portfolio-carousel-cats">'.implode( ' ', $terms_name ).'</div>';
$output .= '</div>';

$output .= '</li>';

endwhile;
endif;
wp_reset_query();

$output .= '</ul></div><div class="clearboth"></div></div>';

else :



/* Modern Style : added in v2.0 */


$output .= '<div class="mk-shortcode mk-portfolio-carousel-modern '.$el_class.'">';
$output .= '<div id="mk-portfolio-carousel-'.$id.'" class="mk-flexslider"><ul class="mk-flex-slides">';
$i = 0;

if ( $r->have_posts() ):
	while ( $r->have_posts() ) :
		$r->the_post();
	$i++;

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
$image_src  = theme_image_resize( $image_src_array[ 0 ], 500, 350);

$output .= '<li>';

$output .= '<div class="portfolio-modern-column">';
$output .= '<div class="mk-portfolio-modern-image"><img width="500" height="350" src="'.$image_src['url'].'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
$output .= '<div class="image-hover-overlay"></div>';
if ( $post_type == 'image' || $post_type == '' ) {
	$output .='<a title="'.get_the_title().'" class="modern-post-type-icon" href="'.$permalink.'"><i class="mk-moon-plus"></i></a>';

} else  if ( $post_type == 'video' ) {
		$output .='<a title="'.get_the_title().'" class="modern-post-type-icon modern-video-icon" href="'.$permalink.'"><i class="mk-moon-play-2"></i></a>';
}
if($disable_title_cat != 'false') {
$output .= '<div class="portfolio-modern-meta">';
$output .= '<a class="the-title" href="'.get_permalink().'">'.get_the_title().'</a><div class="clearboth"></div>';
$output .= '<div class="portfolio-categories">'.implode( ' ', $terms_name ).'</div>';
$output .= '</div>';
}
$output .= '</div>';
$output .= '</div>';


$output .= '</li>';


endwhile;
endif;
wp_reset_query();

$output .= '</ul></div><div class="clearboth"></div></div>';

endif;

$output .= '<script type="text/javascript">
        jQuery(document).ready(function() {
        	var style = "'.$style.'",
        	item_width;
        	if(style == "modern") {
        		var screen_width = jQuery(window).width(),
        		items_to_show = '.$show_items.';

        		if(screen_width > 1200) {
        			item_width = screen_width/items_to_show;
        		} else if(screen_width < 1200 && screen_width > 800) {
        			item_width = screen_width/3;
        		} else if(screen_width < 800 && screen_width > 540){
        			item_width = screen_width/2;
        		} else {
        			item_width = screen_width;
        		}

        	} else {
        		item_width = 275;
        	}
        	

            jQuery(window).on("load",function () {
                jQuery("#mk-portfolio-carousel-'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "slide",
                    smoothHeight: true,
                    slideshowSpeed: 6000,
                    animationSpeed: 400,
                    pauseOnHover: true,
                    controlNav: false,
                    directionNav:true,
                    prevText: "",
                    nextText: "",
                    itemWidth: item_width,
                    itemMargin: 0,
                    maxItems:'.$show_items.',
                    minItems: 1,
                    move: 1
                });
            });
        });
        </script>';
echo $output;
