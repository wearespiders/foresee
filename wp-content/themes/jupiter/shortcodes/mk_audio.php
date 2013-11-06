<?php

extract( shortcode_atts( array(
            'mp3_file' => '',
            'ogg_file' => '',
            'audio_author' => '',
            'thumb'=> '',
            'el_class' => '',
        ), $atts ) );
wp_enqueue_script( 'jquery-jplayer' );
$output = '';
$audio_id = mt_rand( 99, 999 );
$image_src  = theme_image_resize( $thumb, 50, 50 );
$output .= '<div class="mk-single-audio mk-shortcode '.$el_class.'">';
if ( $thumb ) {
    $output .= '<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" />';
}
if ( $audio_author ) {
    $output .= '<span class="mk-audio-author">'.$audio_author.'</span>';
}
$output .= '<script type="">

        jQuery(document).ready(function($) {

                jQuery("#jquery_jplayer_'.$audio_id.'").jPlayer({
                    ready: function () {
                        $(this).jPlayer("setMedia", {';
if ( $mp3_file ) {
    $output .= 'mp3: "'.$mp3_file.'",';
}
if ( $ogg_file ) {
    $output .= 'ogg: "'.$ogg_file.'",';
}

$output .= ' });
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
            </div></div>';
echo $output;
