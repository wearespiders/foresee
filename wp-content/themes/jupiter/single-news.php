<?php 
global $post;
$page_layout = get_post_meta( $post->ID, '_layout', true );
$options =  theme_option(THEME_OPTIONS);

if($page_layout == 'default') {
	$page_layout = theme_option(THEME_OPTIONS, 'news_layout');
}

$terms = get_the_terms(get_the_id(), 'news_category');
$terms_slug = array();
$terms_name = array();
if (is_array($terms)) {
	foreach($terms as $term) {
		$terms_name[] = $term->name;
			}
}

if ( $page_layout=='full' ) {
		$image_width = 1140;
	} else {
		$image_width = 760;
}
$image_height = $options['news_featured_image_height'];





get_header(); ?>

<nav class="mk-news-pagination mk-loop-next-prev">
<?php


$next_post = get_next_post();
if ( !empty( $next_post ) ) {
	echo '<a href="'.get_permalink( $next_post->ID ).'" title="'.get_the_title( $next_post->ID ).'" class="mk-next-post"><i class="mk-icon-chevron-right"></i></a>';
}

$prev_post = get_previous_post();
if ( !empty( $prev_post ) ) {
	echo '<a href="'.get_permalink( $prev_post->ID ).'" title="'.get_the_title( $prev_post->ID ).'" class="mk-prev-post"><i class="mk-icon-chevron-left"></i></a>';
}

if(4==3){paginate_links(); posts_nav_link(); next_posts_link(); previous_posts_link();}
?>
</nav>
<div id="theme-page">
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout vc_row-fluid mk-grid row-fluid">
		<div class="theme-content">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="news-post-heading">
			<?php if($options['news_page'] != '') : ?>
				<a class="back-news-page" href="<?php echo get_permalink($options['news_page']); ?>"><i class="mk-icon-double-angle-left"></i><?php _e('Back to News', 'mk_framework'); ?></a>
			<?php endif; ?>

				<ul class="news-single-social">
					<li><a onClick="window.print()" href="#"><?php _e('Print', 'mk_framework'); ?></a></li>
					<li><a href="mailto:info@company.com?subject=<?php the_title(); ?>&body=<?php the_excerpt(); ?>"><?php _e('Email', 'mk_framework'); ?></a></li>
					<li class="mk-news-share"><a href="#"><?php _e('Share', 'mk_framework'); ?></a>
						<div class="news-share-buttons">
						<span class="share-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php get_permalink(); ?>"  data-text="<?php get_the_title(); ?>" data-count="vertical">Tweet</a></span>
						<span class="share-button"><fb:like href="<?php get_permalink(); ?>" layout="box_count"></fb:like></span>
						<span class="share-button"><div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div></span>
						<div class="clearboth"></div></div>
					</li>
				</ul>
				<div class="clearboth"></div>
			</div>
			<div class="single-news-meta">
			<h1 class="news-single-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

			<div class="news-single-categories"><?php echo implode(', ', $terms_name); ?></div>

			<time class="news-single-date" datetime="<?php the_time( 'F jS, Y' ) ?>">
					<a href="<?php get_month_link( the_time( "Y" ), the_time( "m" ) ) ?>"><?php the_time( 'F jS, Y' ) ?></a>
			</time>
			</div>

			<?php if('' != get_the_post_thumbnail()) : 
				$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
				$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height);
			?>
			<div class="news-featured-image">	
				<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo get_image_src($image_src['url']); ?>" height="<?php echo $image_height; ?>" width="<?php echo $image_width; ?>" />
			</div>
			<?php endif; ?>

			<div class="news-post-content">
				<?php the_content();?>
			</div>	

			<div class="mk-back-top">
				<a href="#" class="mk-back-top-link"><i class="mk-icon-arrow-up"></i><?php _e('Back to Top', 'mk_framework'); ?></a>
			</div>

			<div class="clearboth"></div>
			<?php endwhile; ?>
		</div>

	<?php if($page_layout != 'full') get_sidebar(); ?>	
	<div class="clearboth"></div>	
	</div>
</div>
<?php get_footer(); ?>