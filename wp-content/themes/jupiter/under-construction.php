<?php 
/*
Template Name: Under Construction
*/
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

	<?php 
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
		wp_head();

		$year = theme_option( THEME_OPTIONS, 'uc_year');
		$month = theme_option( THEME_OPTIONS, 'uc_month');
		$day = theme_option( THEME_OPTIONS, 'uc_day');
		$hour = theme_option( THEME_OPTIONS, 'uc_hour');
		$minute = theme_option( THEME_OPTIONS, 'uc_minute');
	?>

	<script>
		jQuery(document).ready(function(){
			jQuery("#mk-uc-countdown").countdown({
				date: "<?php echo $day; ?> <?php echo $month; ?> <?php echo $year; ?> <?php echo $hour; ?>:<?php echo $minute; ?>:00",
				format: "on"
			});
		});
	</script>
</head>

<body>
<div class="mk-uc-header">
<?php if(theme_option( THEME_OPTIONS, 'uc_logo' ) != '') : ?>
<div class="mk-uc-header-logo">
    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo theme_option( THEME_OPTIONS, 'uc_logo' );?>" /></a>
</div>
<?php endif; ?>
<div class="mk-trans-border"></div>
</div>
<div class="mk-uc-wrapper">
<span class="mk-uc-title"><?php echo theme_option( THEME_OPTIONS, 'uc_title' );?></span>
<span class="mk-uc-subtitle"><?php echo theme_option( THEME_OPTIONS, 'uc_subtitle' );?></span>

<ul id="mk-uc-countdown">
			<li>
				<span class="days timestamp">00</span>
				<span class="timeRef"><?php _e('days', 'mk_framework'); ?></span>
			</li>
			<li>
				<span class="hours timestamp">00</span>
				<span class="timeRef"><?php _e('hours', 'mk_framework'); ?></span>
			</li>
			<li>
				<span class="minutes timestamp">00</span>
				<span class="timeRef"><?php _e('minutes', 'mk_framework'); ?></span>
			</li>
			<li>
				<span class="seconds timestamp">00</span>
				<span class="timeRef"><?php _e('seconds', 'mk_framework'); ?></span>
			</li>
</ul>


<div class="mk-uc-social-subscribe">

	<ul class="uc-social">
		<?php

			$facebook = theme_option( THEME_OPTIONS, 'uc_facebook' );
			$twitter = theme_option( THEME_OPTIONS, 'uc_twitter' );
			$gplus = theme_option( THEME_OPTIONS, 'uc_gplus' );
			$rss = theme_option( THEME_OPTIONS, 'uc_rss' );
			$mailchimp_action_url = theme_option( THEME_OPTIONS, 'uc_mailchimp_action_url' );

	if($twitter) {
		echo '<li><a class="twitter-icon" title="'.__('Follow us in Twitter','mk_framework').'" href="'.$twitter.'"><i class="socialico-square-twitter"></i></a></li>';
	}
	if($facebook) {
		echo '<li><a class="facebook-icon" title="'.__('Follow us in Facebook','mk_framework').'" href="'.$facebook.'"><i class="socialico-square-facebook"></i></a></li>';
	}
	if($gplus) {
		echo '<li><a class="googleplus-icon" title="'.__('Follow us in Google Plus','mk_framework').'" href="'.$gplus.'"><i class="socialico-square-googleplus"></i></a></li>';
	}
	if($rss) {
		echo '<li><a class="rss-icon" title="'.__('Subscribe to our RSS feed','mk_framework').'" href="'.$rss.'"><i class="socialico-square-rss"></i></a></li>';
	}

	?>			
	</ul>

	<div id="mk-uc-subscribe">
		<form action="<?php echo $mailchimp_action_url; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<input type="email" value="" name="EMAIL" class="email text-input" id="mce-EMAIL" placeholder="<?php _e('Enter your email to subscribe', 'mk_framework'); ?>" required>
			<input type="submit" value="<?php _e('submit', 'mk_framework'); ?>" name="subscribe" id="mc-embedded-subscribe" class="mk-button small mk-skin-button three-dimension">
		</form>
	</div>


</div>

<div class="clearboth"></div>
</div>



<?php wp_footer(); ?>
</body>
</html>