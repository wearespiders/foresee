<form class="mk-searchform" method="get" id="searchform" action="<?php echo home_url(); ?>">
	<i class="mk-icon-remove-sign"></i>
	<input type="text" class="text-input" placeholder="<?php _e('Search site', 'mk_framework'); ?>" value="<?php if(!empty($_GET['s'])) echo get_search_query(); ?>" name="s" id="s" />
	<i class="mk-icon-search"><input value="" type="submit" class="search-button" type="submit" /></i>
</form> 