<?php
$options = theme_option( THEME_OPTIONS );
$image_height = $options['Portfolio_single_image_height'];

global $post;

$single_layout = get_post_meta( $post->ID, '_layout', true );

if ( $single_layout == 'default' || empty( $single_layout ) ) {
	$single_layout = $options['portfolio_single_layout'];
}

if ( $single_layout=='full' ) {
	$image_width = 1140;
} else {
	$image_width = 760;
}


$terms = get_the_terms( get_the_id(), 'portfolio_category' );
$terms_slug = array();
$terms_name = array();
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$terms_name[] = $term->name;
	}
}

get_header();
if ( have_posts() ) while ( have_posts() ) : the_post();
	global $post;
?>

<nav class="mk-portfolio-pagination mk-loop-next-prev">
<?php


$next_post = get_next_post();
if ( !empty( $next_post ) ) {
	echo '<a href="'.get_permalink( $next_post->ID ).'" title="'.get_the_title( $next_post->ID ).'" class="mk-next-post"><i class="mk-icon-chevron-right"></i></a>';
}

$prev_post = get_previous_post();
if ( !empty( $prev_post ) ) {
	echo '<a href="'.get_permalink( $prev_post->ID ).'" title="'.get_the_title( $prev_post->ID ).'" class="mk-prev-post"><i class="mk-icon-chevron-left"></i></a>';
}

if ( 4==3 ) {paginate_links(); posts_nav_link(); next_posts_link(); previous_posts_link();}
?>
</nav>


<div id="theme-page">
	<?php
$post_type = get_post_meta( get_the_id(), '_single_post_type', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height );
if ( $post_type == '' ) {
	$post_type = 'image';
}
?>

	<div class="theme-page-wrapper <?php echo $single_layout; ?>-layout mk-grid vc_row-fluid row-fluid">
			<div class="theme-content no-margin-top">
					<article id="<?php the_ID(); ?>">
						<?php if ( $options['portfolio_single_title_location'] == 'inside_post' ) : ?>
						<h1 class="portfolio-title"><?php the_title(); ?></h1>
						<span class="portfolio-single-cat"><?php echo implode( ', ', $terms_name ) ?></span>
					<?php endif; ?>

			<?php
$featured_image = get_post_meta( $post->ID, '_portfolio_featured_image', true ) ? get_post_meta( $post->ID, '_portfolio_featured_image', true ) : 'true';

if ( $featured_image != 'false' ) {
	if ( $post_type == 'image' ) { ?>
						<div class="single-featured-image">
							<a class="mk-lightbox" title="<?php the_title(); ?>" href="<?php echo $image_src_array[0]; ?>"><img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo get_image_src( $image_src['url'] ); ?>" height="<?php echo $image_height; ?>" width="<?php echo $image_width; ?>" /></a>
						</div>
			<?php } elseif ( $post_type == 'video' ) {
		$skin_color = $options['skin_color'];
		$video_id = get_post_meta( $post->ID, '_single_video_id', true );
		$video_site  = get_post_meta( $post->ID, '_single_video_site', true );


		if ( $video_site =='vimeo' ) {
			echo '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color='.str_replace( "#", "", $skin_color ).'" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
		}


		if ( $video_site =='youtube' ) {
			echo '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http://www.youtube.com/embed/'.$video_id.'?showinfo=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
		}

		if ( $video_site =='dailymotion' ) {
			echo '<div  class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http://www.dailymotion.com/embed/video/'.$video_id.'?logo=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
		}

	}

} ?>

				<section class="portfolio-single-content">
						<?php the_content(); ?>
						<div class="clearboth"></div>
				</section>





					<div class="clearboth"></div>
					</article>
					<?php
if ( $options['enable_portfolio_comment'] == 'true' ) :
	comments_template( '', true );
endif;
?>

						<div class="clearboth"></div>
			</div>
			<?php endwhile; ?>
			<?php  if ( $single_layout != 'full' ) get_sidebar();  ?>
			<div class="clearboth"></div>
	</div>

<?php
if ( $options['enable_portfolio_similar_posts'] == 'true' && get_post_meta( $post->ID, '_portfolio_similar', true ) !='false' ) :
	
	theme_class( 'portfolio_similar_posts' );
	
endif;
?>

</div>
<?php get_footer(); ?>
