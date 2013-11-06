<?php
function theme_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
     <?php $comment_time_format = theme_option( THEME_OPTIONS, 'comment_time_format' ); ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="mk-single-comment" id="comment-<?php comment_ID(); ?>">
			<div class="gravatar"><?php echo get_avatar( $comment, $size='35', $default='' ); ?></div>
			<div class="comment-meta">
					<?php printf( '<span class="comment-author">%s</span>', get_comment_author_link() ) ?>
					
                    <?php edit_comment_link( '', '', '' ) ?>
                    <time class="comment-time"><?php echo get_comment_time('F jS, Y h:i A'); ?></time>
			</div>
			<span class="comment-reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			</span>
			<div class="clearboth"></div>
			<div class="comment-content">
					<?php comment_text() ?>

<?php if ( $comment->comment_approved == '0' ) : ?>
					<span class="unapproved"><?php _e( 'Your comment is awaiting moderation.', 'mk_framework' );?></span>
<?php endif; ?>
				<div class="clearboth"></div>
			</div>

		       
		</div>		
<?php
}

function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-wrap comments-pings">

			<div class="comment-content">

				<div class="comment-meta">

					<?php printf( '<span class="comment_author"><b>%s</b></span>', get_comment_author_link() ) ?>

				</div>
				<div class="comment-data">
					<?php comment_text() ?>

								<time class="comment-time"><?php echo get_comment_time('F jS, Y h:i A'); ?></time>
<?php if ( $comment->comment_approved == '0' ) : ?>
					<span class="unapproved">Your comment is awaiting moderation.</span>
<?php endif; ?>
				</div>
                <div class="clearboth"></div>
	</div>





<?php } ?>

<section id="comments">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'mk_framework' );?></p>
</section><!-- #comments -->
<?php
return;
endif;

if ( have_comments() ) : ?>
	<h4 class="blog-comment-title"><?php printf( _n( 'Comments', 'Showing %1$s comments', get_comments_number(), 'mk_framework' ),
	number_format_i18n( get_comments_number() )); ?></h4>
	<ul class="mk-commentlist">
		<?php
wp_list_comments( 'callback=theme_comments&type=comment' );
?>
	</ul>





<?php
if ( have_comments() ) : ?>
<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
<h4 class="blog-comment-title"><?php _e( 'pingbacks / trackbacks', 'mk_framework' ); ?></h4>

<ul class="mk-commentlist">
<?php wp_list_comments( 'callback=list_pings&type=pings' ); ?>
</ul>
<?php endif; endif; ?>

<?php else :
	if ( ! comments_open() ) :
		endif;
	endif;
?>

 <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="comments-navigation">
		<div class="comments-previous"><?php previous_comments_link(); ?></div>
		<div class="comments-next"><?php next_comments_link(); ?></div>
	</nav>
<?php endif;?>

<?php if ( comments_open() ) : ?>

	<div id="respond">
		<h3 class="respond-heading"><?php _e('Leave a Comment', 'mk_framework'); ?></h3>

		
    	<div class="cancel-comment-reply">
        	<?php cancel_comment_reply_link(); ?>
		</div>
<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
		<div class="comment-form-info"><?php printf( __( 'You must be <a href="%s">logged in</a> to post a comment', 'mk_framework' ), wp_login_url( get_permalink() ) ); ?></div>
<?php else : ?>
	<?php if ( is_user_logged_in() ) : ?>
			<div class="comment-form-info"><?php printf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'mk_framework' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( get_permalink()  ) )?></div>
	<?php endif; ?>		
   		<form class="<?php if(! is_user_logged_in()) { ?> mk-not-logged <?php } else { ?> mk-logged <?php } ?>" action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" id="commentform">
   		

<?php if ( ! is_user_logged_in() ) : ?>
			<div class="comment-form-name comment-form-row">
            <input type="text" name="author" class="text_input" id="author" value="<?php if($comment_author) {echo $comment_author; } ?>" tabindex="54" placeholder="<?php _e('Name (Required)', 'mk_framework'); ?>"  />
			</div>

			<div class="comment-form-email comment-form-row">
    <input type="text" name="email" class="text_input" id="email" value="<?php if($comment_author_email) {echo $comment_author_email; } ?>" tabindex="56" placeholder="<?php _e('Email (Required)', 'mk_framework'); ?>" />
			</div>

			<div class="comment-form-website comment-form-row">
    <input type="text" name="url" class="text_input" id="url" value="<?php if($comment_author_url) {echo $comment_author_url; } ?>"  tabindex="57" placeholder="<?php _e('Website', 'mk_framework'); ?>" />
			</div>

<?php endif; ?>

	<div class="comment-textarea">
            <textarea class="textarea" name="comment" rows="8" id="comment" tabindex="58"></textarea>
     </div>


	<a class="mk-button comment-form-button three-dimension mk-skin-button medium" onclick="jQuery('#commentform').submit();return false;" tabindex="59" href="#"><?php _e( 'POST COMMENT', 'mk_framework' )?></a>
	<a href="#" class="comments-back-top"><i class="mk-icon-chevron-up"></i><?php _e('Back to Top', 'mk_framework'); ?></a>
	<div class="clearboth"></div>
	<?php comment_id_fields(); ?>
			<?php do_action( 'comment_form', $post->ID ); ?>
		</form>
<?php endif; ?>
	</div><!--/respond-->

<?php endif; ?>

</section>
