<?php 

global $post;
$options = theme_option(THEME_OPTIONS); 
$single_layout = get_post_meta( $post->ID, '_layout', true );

if($single_layout == 'default' || empty($single_layout)) {
	$single_layout = $options['single_layout'];
}
$image_height = $options['single_featured_image_height'];

	if ( $single_layout=='full' ) {
		$image_width = theme_option( THEME_OPTIONS, 'grid_width' );
	} else {
		$image_width = 800;
	}


function social_networks_meta() {
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$output = '<meta property="og:image" content="'.get_image_src( $image_src_array[ 0 ] ).'"/>'. "\n";
	$output .= '<meta property="og:url" content="'.get_permalink().'"/>'. "\n";
	$output .= '<meta property="og:title" content="'.get_the_title().'"/>'. "\n";
	echo $output;
}
add_action('wp_head', 'social_networks_meta');

get_header(); ?>

<nav class="mk-blog-pagination mk-loop-next-prev">
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
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 

		$post_type = get_post_meta( $post->ID, '_single_post_type', true );
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height);

	?>		

	<div class="theme-page-wrapper mk-blog-single <?php echo $single_layout; ?>-layout vc_row-fluid mk-grid row-fluid">
		<div class="theme-content">
		<h1 class="the-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>	
		<?php if($options['single_meta_section'] == 'true' && get_post_meta( $post->ID, '_disable_meta', true ) != 'false') : ?>
		<div class="blog-single-meta">
			<div class="mk-blog-author"><?php _e('By', 'mk_framework'); ?> <?php the_author_posts_link(); ?></div>
				<time class="mk-post-date" datetime="<?php the_time( 'F jS, Y' ) ?>">
					<?php _e('Posted', 'mk_framework'); ?> <a href="<?php get_month_link( the_time( "Y" ), the_time( "m" ) ) ?>"><?php the_time( 'F jS, Y' ) ?></a>
				</time>
				<div class="mk-post-cat"> <?php _e('In', 'mk_framework'); ?> <?php the_category( ', ' ) ?></div>
		</div>	
		<?php endif; ?>
		<article id="<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="<?php echo $post_type; ?>-post-type">
									

			<a href="#comments" class="mk-classic-comments"><i class="mk-moon-bubble-10"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a>
			<span class="mk-blog-share-container">
			<span class="mk-blog-share"><i class="mk-moon-share-2"></i></span>
			<div class="single-share-buttons">
			<span class="single-share-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php get_permalink(); ?>"  data-text="<?php get_the_title(); ?>" data-count="vertical">Tweet</a></span>
			<span class="single-share-button mk-facebook"><fb:like href="<?php get_permalink(); ?>" layout="box_count"></fb:like></span>
			<span class="single-share-button"><div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div></span>
			<div class="clearboth"></div></div>
			<div class="clearboth"></div>
			</span>


			<?php 

			if($options['single_disable_featured_image'] == 'true' && get_post_meta( $post->ID, '_disable_featured_image', true ) != 'false') :

			if($post_type == 'image' || $post_type == 'portfolio') { ?>
				<?php if(has_post_thumbnail()) : ?>
						<div class="single-featured-image">	
							<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo get_image_src($image_src['url']); ?>" height="<?php echo $image_height; ?>" width="<?php echo $image_width; ?>" />
						</div>		
				<?php endif; ?>		
			<?php } elseif($post_type == 'video') { 
				$skin_color = $options['skin_color'];	
				$video_id = get_post_meta( $post->ID, '_single_video_id', true );	
				$video_site  = get_post_meta( $post->ID, '_single_video_site', true );


				if($video_site =='vimeo') {
				echo '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color='.str_replace("#", "", $skin_color).'" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}


				if($video_site =='youtube') {
				echo '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.youtube.com/embed/'.$video_id.'?showinfo=0&amp;theme=light&amp;color=white&amp;rel=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}

				if($video_site =='dailymotion') {
				echo '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http://www.dailymotion.com/embed/video/'.$video_id.'?logo=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}
		
			} elseif($post_type == 'audio') { 	
				$audio_id = mt_rand( 99, 999 );
				$mp3_file  = get_post_meta( $post->ID, '_mp3_file', true );
				$ogg_file  = get_post_meta( $post->ID, '_ogg_file', true );
				$audio_author  = get_post_meta( $post->ID, '_single_audio_author', true ); 
				wp_enqueue_script( 'jquery-jplayer' );
				$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
				$image_src  = theme_image_resize( $image_src_array[ 0 ], 50, 50);
				echo '<div class="mk-single-audio">';
				if ( has_post_thumbnail() ) {
					echo '<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
				}
				if($audio_author) {
					echo '<span class="mk-audio-author">'.$audio_author.'</span>';
				}
			echo '<script type="">

		jQuery(document).ready(function($) {

				jQuery("#jquery_jplayer_'.$audio_id.'").jPlayer({
					ready: function () {
						$(this).jPlayer("setMedia", {';
			if ( $mp3_file ) {
				echo 'mp3: "'.$mp3_file.'",';
			}
			if ( $ogg_file ) {
				echo 'ogg: "'.$ogg_file.'",';
			}

			echo ' });
					},
					play: function() { // To avoid both jPlayers playing together.
						$(this).jPlayer("pauseOthers");
					},
					swfPath: "'.THEME_JS.'",
					supplied: "mp3, ogg",
					cssSelectorAncestor: "#jp_container_'.$audio_id.'",
					wmode: "window"
				});

		})

		</script>
		<div id="jquery_jplayer_'.$audio_id.'" class="jp-jplayer"></div>
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
			</div></div>
			';				
	 }   

	 endif;

 ?>

							<div class="clearboth"></div>
							<div class="mk-single-content">
								<?php the_content(); ?>
							</div>
							<?php wp_link_pages('before=<div class="mk-page-links">'.__('Pages:', 'mk_framework').'&after=</div>'); ?>

							<div class="single-post-tags">
								<?php if($options['diable_single_tags'] == 'true' && get_post_meta( $post->ID, '_disable_tags', true ) != 'false') : ?>
									<span><?php _e('Tags:', 'mk_framework'); ?></span> 
									<?php the_tags(' ',''); ?>
								<?php endif; ?>
							</div>
							<div class="single-back-top">
								<a href="#"><i class="mk-icon-chevron-up"></i><?php _e('Back to Top', 'mk_framework'); ?></a>	
							</div>




				<?php if($options['enable_blog_author'] == 'true' && get_post_meta( $post->ID, '_disable_about_author', true ) != 'false') : ?>
						<div class="mk-about-author-wrapper">
								<div class="avatar-wrapper"><?php global $user; echo get_avatar( get_the_author_meta('email'), '65',false ,get_the_author_meta('display_name', $user['ID'])); ?></div>
								<div class="mk-about-author-meta">
								<a class="about-author-name" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
								<div class="about-author-desc"><?php the_author_meta('description'); ?></div>
								<ul class="about-author-social">
									<?php 
									if(get_the_author_meta( 'twitter' )) {
										echo '<li><a class="twitter-icon" title="'.__('Follow me on Twitter','mk_framework').'" href="'.get_the_author_meta( 'twitter' ).'"><i class="mk-icon-twitter"></i></a></li>';
									}
									if(get_the_author_meta('email')) {
										echo '<li><a class="email-icon" title="'.__('Get in touch with me via email','mk_framework').'" href="mailto:'.get_the_author_meta('email').'"><i class="mk-icon-envelope-alt"></i></a></li>';
									}
									?>																											
								</ul>
								</div>
								<div class="clearboth"></div>
						</div>
					<?php endif; ?>
						


						<?php 
					if($options['enable_single_related_posts'] == 'true' && get_post_meta( $post->ID, '_disable_related_posts', true ) != 'false') :
						theme_class('blog_similar_posts'); 
					endif;
						?>
					
					<?php 
					if($options['enable_blog_single_comments'] == 'true') : 
						comments_template( '', true ); 
					endif;
					?>
			</div>		
			</article>
			<div class="clearboth"></div>
			</div>
				<?php endwhile; ?>
			<?php  if($single_layout != 'full') get_sidebar();  ?>
			<div class="clearboth"></div>	
		</div>

</div>
<?php get_footer(); ?>