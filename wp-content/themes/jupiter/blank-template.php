<?php
/*
Template Name: Blank Page
*/
global $post;
$page_layout = get_post_meta( $post->ID, '_layout', true );

if(empty($page_layout)) {
	$page_layout = 'right';
}
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6"  <?php language_attributes(); ?>>
   <![endif]-->
<!--[if IE 7]>
   <html id="ie7" <?php language_attributes(); ?>>
      <![endif]-->
<!--[if IE 8]>
      <html id="ie8" <?php language_attributes(); ?>>
         <![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]>
         <html <?php language_attributes(); ?>>
            <![endif]-->
<head>
 		<meta charset="<?php bloginfo('charset'); ?>">
        <meta name="Theme Version" content="<?php $theme_data = wp_get_theme(); echo $theme_data['Version']; ?>">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title>
            <?php bloginfo("name"); ?> <?php wp_title("|", true); ?>
        </title>
        <?php $custom_favicon = theme_option( THEME_OPTIONS, 'custom_favicon' ); if ( $custom_favicon ) : ?>
          <link rel="shortcut icon" href="<?php echo $custom_favicon ?>"  />
        <?php endif; ?>
  	  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
		wp_head();
	?>
	<body>
<div id="theme-page">
	<?php 
	if(get_post_meta( $post->ID, '_disable_news_slider', true ) == 'true') :
	theme_class('mk_recent_news', $post->ID);
	endif;
	 ?>
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout  mk-grid row-fluid">
		<div class="theme-content">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
					<div class="clearboth"></div>
			<?php endwhile; ?>
		</div>

	<?php if($page_layout != 'full') get_sidebar(); ?>	
	<div class="clearboth"></div>	
	</div>
</div>

<?php if(theme_option(THEME_OPTIONS,'custom_js')) : ?>
		<script type="text/javascript">
		
		<?php echo stripslashes(theme_option(THEME_OPTIONS,'custom_js')); ?>
		
		</script>
	
	
	<?php 
	endif;
	
	if(theme_option(THEME_OPTIONS,'analytics')){
		?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo stripslashes(theme_option(THEME_OPTIONS,'analytics')); ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<?php 

	}

wp_footer(); ?>
</body>
</html>