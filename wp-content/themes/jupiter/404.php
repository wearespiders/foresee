<?php 
get_header(); ?>
<div id="theme-page">
	<div class="theme-page-wrapper full-layout  mk-grid row-fluid">
		<div class="theme-content">
			<div class="not-found-wrapper">

				<span class="not-found-title"><?php _e('WHOOPS!', 'mk_framework'); ?></span>
				<span class="not-found-subtitle"><?php _e('404', 'mk_framework'); ?></span>
				<span class="not-found-desc"><?php _e('It looks like you are lost! Try searching here', 'mk_framework'); ?></span>

				<div class="mk-notfound-search">
				      <form method="get" id="mk-notfound-search" action="<?php echo home_url(); ?>">
				        <span>
				        <input type="text" class="notfound-text-input" value="" name="s" id="s" placeholder="<?php _e('Search site', 'mk_framework'); ?>" />
				        <i class="mk-icon-remove-sign"></i><i class="mk-icon-search"><input value="" type="submit" class="notfound-search-btn" type="submit" /></i>
				        </span>
				    </form> 
    			</div>
    			<div class="clearboth"></div>
			</div>
			
		
		</div>
	<div class="clearboth"></div>	
	</div>
</div>
<?php get_footer(); ?>