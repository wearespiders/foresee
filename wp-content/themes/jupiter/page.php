<?php
global $post;
$page_layout = get_post_meta( $post->ID, '_layout', true );

if ( empty( $page_layout ) ) {
	$page_layout = 'right';
}

get_header(); ?>
<div id="theme-page">
	<div id="mk-page-id-<?php echo $post->ID; ?>" class="theme-page-wrapper mk-main-wrapper <?php echo $page_layout; ?>-layout  mk-grid vc_row-fluid row-fluid">
		<div class="theme-content">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
					<div class="clearboth"></div>
					<?php wp_link_pages( 'before=<div id="mk-page-links">'.__( 'Pages:', 'mk_framework' ).'&after=</div>' ); ?>
			<?php endwhile; ?>
		</div>
	<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
	<div class="clearboth"></div>
	</div>
	<div class="clearboth"></div>
</div>
<?php theme_class( 'mk_footer_twitter' ); ?>
<?php get_footer(); ?>
