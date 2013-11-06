<?php

extract( shortcode_atts( array(
			'title' => '',
			'year' => '',
			'month' => '',
			'hour' => '',
			'day' => '',
			'minute' => '',
			'el_class' => '',
		), $atts ) );
$output =  '';
$id = mt_rand( 99, 999 );
wp_enqueue_script( 'jquery-countdown', THEME_JS. '/jquery.countdown.js', array( 'jquery' ), false, true );
$output .= '<div class=" '.$el_class.' mk-event-countdown">';
if ( !empty( $title ) ) {
	$output .= '<div class="mk-event-title">'.$title.'</div>';
}
$output .= '<ul id="mk-uc-countdown" class="event-countdown-'.$id.'">
                        <li>
                            <span class="days timestamp">00</span>
                            <span class="timeRef">'.__( 'days', 'mk_framework' ).'</span>
                        </li>
                        <li>
                            <span class="hours timestamp">00</span>
                            <span class="timeRef">'.__( 'hours', 'mk_framework' ).'</span>
                        </li>
                        <li>
                            <span class="minutes timestamp">00</span>
                            <span class="timeRef">'.__( 'minutes', 'mk_framework' ).'</span>
                        </li>
                        <li>
                            <span class="seconds timestamp">00</span>
                            <span class="timeRef">'.__( 'seconds', 'mk_framework' ).'</span>
                        </li>
                    </ul>
            <script>
                jQuery(document).ready(function(){
                    jQuery(".event-countdown-'.$id.'").countdown({
                        date: "'.$day.' '.$month.' '.$year.' '.$hour.':'.$minute.':00",
                        format: "on"
                    });
                });
            </script>';
$output .= '</div>';
echo $output;
