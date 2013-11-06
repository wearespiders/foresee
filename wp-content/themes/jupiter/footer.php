<?php 
$mk_options = theme_option(THEME_OPTIONS);

$mk_footer_class = '';
if($mk_options['footer_size'] == 'true') {
  $mk_footer_class = ' mk-background-stretch';
}
if($mk_options['disable_footer'] == 'false') {
  $mk_footer_class = ' mk-footer-disable';
}

?>
<section id="mk-footer" class="<?php echo $mk_footer_class; ?>">
<?php if($mk_options['disable_footer'] == 'true') : ?>
<div class="footer-wrapper mk-grid">
<div class="mk-padding-wrapper">
<?php
$footer_column = $mk_options['footer_columns'];
if(is_numeric($footer_column)):
	switch ( $footer_column ):
		case 1:
		$class = '';
			break;
		case 2:
			$class = 'mk-col-1-2';
			break;
		case 3:
			$class = 'mk-col-1-3';
			break;
		case 4:
			$class = 'mk-col-1-4';
			break;
		case 5:
			$class = 'mk-col-1-5';
			break;
		case 6:
			$class = 'mk-col-1-6';
			break;		
	endswitch;
	for( $i=1; $i<=$footer_column; $i++ ):
?>
<?php if($i == $footer_column): ?>
<div class="<?php echo $class; ?>"><?php theme_class('footer_sidebar'); ?></div>
<?php else:?>
			<div class="<?php echo $class; ?>"><?php theme_class('footer_sidebar'); ?></div>
<?php endif;		
endfor; 

else : 

switch($footer_column):
		case 'third_sub_third':
?>
		<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
		<div class="mk-col-2-3">
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'sub_third_third':
?>
		<div class="mk-col-2-3">
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
		</div>
		<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
<?php
			break;
		case 'third_sub_fourth':
?>
		<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
		<div class="mk-col-2-3 last">
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'sub_fourth_third':
?>
		<div class="mk-col-2-3">
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-4"><?php theme_class('footer_sidebar'); ?></div>
		</div>
		<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
<?php
			break;
		case 'half_sub_half':
?>
		<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
		<div class="mk-col-1-2">
			<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'half_sub_third':
?>
		<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
		<div class="mk-col-1-2">
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'sub_half_half':
?>
		<div class="mk-col-1-2">
			<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
		</div>
		<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
<?php
			break;
		case 'sub_third_half':
?>
		<div class="mk-col-1-2">
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
			<div class="mk-col-1-3"><?php theme_class('footer_sidebar'); ?></div>
		</div>
		<div class="mk-col-1-2"><?php theme_class('footer_sidebar'); ?></div>
<?php
			break;
	endswitch;
endif;?> 


<div class="clearboth"></div>      
</div>
</div>
<?php endif;?>
<?php if ( $mk_options['disable_sub_footer'] == 'true' ) { ?>
<div id="sub-footer">
	<div class="mk-grid">
		<?php if ( !empty( $mk_options['footer_logo'] ) ) {?>
		<div class="mk-footer-logo">
		    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $mk_options['footer_logo']; ?>" /></a>
		</div>
		<?php } ?>
		
    	<span class="mk-footer-copyright"><?php echo stripslashes($mk_options['copyright']); ?></span>
    	<?php theme_class('footer_menu'); ?>
	</div>
	<div class="clearboth"></div>

</div>
<?php } ?>

</section>






<?php 

	
	if($mk_options['custom_js']) : 
	?>
		<script type="text/javascript">
		
		<?php echo stripslashes($mk_options['custom_js']); ?>
		
		</script>
	
	
	<?php 
	endif;
	
	if($mk_options['analytics']){
		?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo stripslashes($mk_options['analytics']); ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<?php 

	}
?>
</div>
<a href="#" class="mk-go-top"><i class="mk-icon-chevron-up"></i></a>
<?php if($mk_options['disable_quick_contact'] == 'true') { theme_class('mk_quick_contact'); } ?>
<?php wp_footer(); ?>
</body>
</html>




