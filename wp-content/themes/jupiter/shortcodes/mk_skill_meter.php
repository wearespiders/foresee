<?php

extract( shortcode_atts( array(
			'title' => '',
			'color' => theme_option( THEME_OPTIONS, 'skin_color' ),
			'percent' => 50,
			'el_class' => '',
		), $atts ) );


echo '<div class="mk-skill-meter mk-shortcode '.$el_class.'">
                    <div class="mk-skill-meter-title">'.$title.'</div>
                    <div class="mk-progress-bar">
                        <span class="progress-outer" data-width="'.$percent.'" style="background-color:'.$color.';">
                            <span class="progress-inner"></span>
                        </span>
                    </div>
                    <div class="clearboth"></div></div>';
