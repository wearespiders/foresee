<?php

$page_layout = theme_option( THEME_OPTIONS, 'search_page_layout' );


get_header(); ?>
<div id="theme-page">
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout  mk-grid vc_row-fluid row-fluid">
		<div class="theme-content">
			<section class="mk-search-loop">

				<section class="widget widget_search"><p><?php _e('Not so happy with results? Search for a new keyword ', 'mk_framework'); ?></p>
				<form class="mk-searchform" method="get" id="searchform" action="<?php echo home_url(); ?>">
				<i class="mk-icon-remove-sign"></i>
				<input type="text" class="text-input" placeholder="Search site" value="" name="s" id="s" />
				<i class="mk-icon-search"><input value="" type="submit" class="search-button" type="submit" /></i>
				</form>
				</section>
			<?php
				$exclude_cats = theme_option( THEME_OPTIONS, 'excluded_cats' );
				foreach ( $exclude_cats as $key => $value ) {
					$exclude_cats[$key] = -$value;
				}
				if ( stripos( $query_string, 'cat=' ) === false ) {
					query_posts( $query_string."&cat=".implode( ",", $exclude_cats ) );
				}else {
					query_posts( $query_string.implode( ",", $exclude_cats ) );
				}

				if ( have_posts() ):
				while ( have_posts() ) :
					the_post();

				$post_type =  get_post_type();
				?>

					<article class="search-result-item">
						<h4 class="the-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div class="search-loop-meta">
							<div class="mk-blog-author">By <?php the_author_posts_link(); ?></div>
							<time datetime="<?php the_time( 'F, j' ); ?>">
								In <a href="<?php echo get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ); ?>"><?php the_time( 'M. t, h:i A' ); ?></a>
							</time>
							<?php if($post_type == 'post') { ?>
							<span class="mk-search-cats">On <?php echo get_the_category_list( ', ' ); ?></span>
						<?php } elseif ($post_type == 'portfolio') { 
								$terms = get_the_terms(get_the_id(), 'portfolio_category');
								$terms_slug = array();
								$terms_name = array();
								if (is_array($terms)) {
									foreach($terms as $term) {
										$terms_name[] = $term->name;
											}
								}

							?>	
							<span class="mk-search-cats">On <?php echo implode(', ', $terms_name); ?></span>
							<?php } elseif($post_type == 'news'){
								$terms = get_the_terms(get_the_id(), 'news_category');
								$terms_slug = array();
								$terms_name = array();
								if (is_array($terms)) {
									foreach($terms as $term) {
										$terms_name[] = $term->name;
											}
								}
								?>
								<span class="mk-search-cats">On <?php echo implode(', ', $terms_name); ?></span>
							<?php }	?>
							
						</div>
						<div class="the-excerpt"><?php the_excerpt(); ?></div>
						<a class="mk-search-permnalink" href="<?php echo get_permalink(); ?>"><?php echo get_permalink(); ?></a>
					</article>

				

				<?php
				$post_type = '';
				endwhile;
				theme_blog_pagenavi($before = '', $after = '', NULL, $paged);
				wp_reset_query();
				endif;
				

				
			?>

		</section>
		</div>

	<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
	<div class="clearboth"></div>
	</div>
</div>
<?php get_footer(); ?>
