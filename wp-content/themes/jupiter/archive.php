<?php



if ( isset( $_REQUEST['portfolio_category'] ) ) {

	$page_layout = theme_option( THEME_OPTIONS, 'archive_portfolio_layout' );
	$loop_style = theme_option( THEME_OPTIONS, 'archive_portfolio_style' );
	$column = theme_option( THEME_OPTIONS, 'archive_portfolio_column' );
	$pagination_style = theme_option( THEME_OPTIONS, 'archive_portfolio_pagination_style' );

} else {

	$page_layout = theme_option( THEME_OPTIONS, 'archive_page_layout' );
	$loop_style = theme_option( THEME_OPTIONS, 'archive_loop_style' );
	$pagination_style = theme_option( THEME_OPTIONS, 'archive_pagination_style' );

}



get_header(); ?>
<div id="theme-page">
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout  mk-grid vc_row-fluid row-fluid">
		<div class="theme-content">
			<?php
if ( isset( $_REQUEST['portfolio_category'] ) ) {
	echo do_shortcode( '[mk_portfolio style="'.$loop_style.'" column="'.$column.'" pagination_style="'.$pagination_style.'"]' );
} else {
	$exclude_cats = theme_option( THEME_OPTIONS, 'excluded_cats' );
	foreach ( $exclude_cats as $key => $value ) {
		$exclude_cats[$key] = -$value;
	}
	if ( stripos( $query_string, 'cat=' ) === false ) {
		query_posts( $query_string."&cat=".implode( ",", $exclude_cats ) );
	}else {
		query_posts( $query_string.implode( ",", $exclude_cats ) );
	}
	echo do_shortcode( '[mk_blog style="'.$loop_style.'" width="1/1" el_position="first last" pagination_style="'.$pagination_style.'"]' );
}
?>
		</div>

	<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
	<div class="clearboth"></div>
	</div>
</div>
<?php get_footer(); ?>
