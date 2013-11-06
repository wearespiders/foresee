<?php

$el_class = $title = $twitter_name = $tweet_count = $el_position = $tweets_count = '';
extract( shortcode_atts( array(
			'title' => '',
			'twitter_name' => 'twitter',
			'tweets_count' => 5,
			'el_class' => ''
		), $atts ) );
$output = '';

$consumer_key = theme_option( THEME_OPTIONS, 'twitter_consumer_key' );
$consumer_secret = theme_option( THEME_OPTIONS,  'twitter_consumer_secret' );
$access_token = theme_option( THEME_OPTIONS,  'twitter_access_token' );
$access_token_secret = theme_option( THEME_OPTIONS,  'twitter_access_token_secret' );

$el_class = $this->getExtraClass( $el_class );
$id = mt_rand( 99, 999 );

if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= '<div class="mk-shortcode mk-twitter-shortcode '.$el_class.'">';
if ( $consumer_key && $consumer_secret && $access_token && $access_token_secret && $tweets_count ) {

	$transName = 'list_tweets_'.$id;
	$cacheTime = 10;
	delete_transient( $transName );
	if ( false === ( $twitterData = get_transient( $transName ) ) ) {
		// require the twitter auth class
		@require_once THEME_WIDGETS . '/twitteroauth/twitteroauth.php';
		$twitterConnection = new TwitterOAuth(
			$consumer_key,  // Consumer Key
			$consumer_secret,       // Consumer secret
			$access_token,       // Access token
			$access_token_secret        // Access token secret
		);
		$twitterData = $twitterConnection->get(
			'statuses/user_timeline',
			array(
				'screen_name'     => $twitter_name,
				'count'           => $tweets_count,
				'exclude_replies' => false
			)
		);
		if ( $twitterConnection->http_code != 200 ) {
			$twitterData = get_transient( $transName );
		}

		// Save our new transient.
		set_transient( $transName, $twitterData, 60 * $cacheTime );
	};
	$twitter = get_transient( $transName );
	if ( $twitter && is_array( $twitter ) ) {
		$output .='<div id="tweets_'.$id.'">';
		$output .='<ul class="mk-tweet-list mk-tweet-shortcode">';
		foreach ( $twitter as $tweet ):
			$output .='<li><span class="tweet-text">';
		$latestTweet = $tweet->text;
		$latestTweet = preg_replace( '/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet );
		$latestTweet = preg_replace( '/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet );
		$output .= $latestTweet;
		$output .= '</span>';
		$twitterTime = strtotime( $tweet->created_at );
		$timeAgo = mk_ago( $twitterTime );
		$output .= '<a href="http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str.'" class="tweet-time">'.$timeAgo.'</a>';
		$output .= '</li>';
		endforeach;
		$output .='</ul>';
		$output .= '</div>';
	}
}
$output .= '</div>';


$output = $this->startRow( $el_position ) . $output . $this->endRow( $el_position );
echo $output;
