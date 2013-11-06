<?php

extract( shortcode_atts( array(
            "sortable" => 'true',
            'order'=> 'DESC',
            'count' => -1,
            'style'=> 'fancy',
            'offset' => '',
            'orderby'=> 'date',

        ), $atts ) );

$query = array(
    'post_type' => 'faq',
    'posts_per_page' => (int)$count,
);

if ( $orderby ) {
    $query['orderby'] = $orderby;
}
if ( $order ) {
    $query['order'] = $order;
}
if ( $offset ) {
    $query['offset'] = $offset;
}

$r = new WP_Query( $query );


$output = '';
if ( $sortable == 'true' ) {
    $output .= '<header class="filter-faq"><ul>';
    $terms = array();

    $terms = get_terms( 'faq_category', 'hide_empty=1' );
    $output .= '<li><a class="current" data-filter="" href="#">'.__( 'All', 'mk_framework' ).'</a></li>';
    foreach ( $terms as $term ) {
        $output .= '<li><a data-filter="'.$term->slug . '" href="#">' . $term->name . '</a></li>';
    }
    $output .= '<div class="clearboth"></div></ul></header><div class="clearboth"></div>';
}

$output .= '<section class="mk-faq-container '.$style.'-style-wrapper" >';

if ( $r->have_posts() ):
    while ( $r->have_posts() ) :
        $r->the_post();

    $terms = get_the_terms( get_the_id(), 'faq_category' );
$terms_slug = array();
$terms_name = array();
if ( is_array( $terms ) ) {
    foreach ( $terms as $term ) {
        $terms_slug[] = $term->slug;
        $terms_name[] = $term->name;
    }
}
$output .= '<div class="mk-toggle '.$style.'-style mk-faq-toggle ' . implode( ' ', $terms_slug ) . '">';
$output .= '<span class="mk-toggle-title"><i class="mk-icon-question-sign"></i>'.get_the_title().'</span>';
$output .= '<div class="mk-toggle-pane">'.get_the_content().'</div>';
$output .= '</div>';
endwhile;
endif;

$output .= '<div class="clearboth"></div></section><div class="clearboth"></div>';


wp_reset_query();

echo $output;
