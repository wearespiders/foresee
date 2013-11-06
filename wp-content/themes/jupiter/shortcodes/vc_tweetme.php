<?php

$type = '';
extract( shortcode_atts( array(
			'type' => 'horizontal'//horizontal, vertical, none
		), $atts ) );
$output = '<div class="wpb_tweetme"><a href="http://twitter.com/share" class="twitter-share-button" data-count="'.$type.'">'. __( "Tweet", "mk_framework" ) .'</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>'.$this->endBlockComment( 'tweetmeme' )."</div>\n";
echo $output;
