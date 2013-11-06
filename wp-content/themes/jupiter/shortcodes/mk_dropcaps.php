<?php

extract( shortcode_atts( array(
			'style' => 'simple-style',
			'el_class' => '',
		), $atts ) );


echo '<span class="mk-dropcaps mk-shortcode '.$style.' '.$el_class.'">'.do_shortcode( strip_tags( $content ) ).'</span>';
