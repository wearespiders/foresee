<?php

/*
	VIDEO WIDGET
*/

class Artbees_Widget_video extends WP_Widget {

	function Artbees_Widget_video() {
		$widget_ops = array( 'classname' => 'widget_video', 'description' => 'You can add youtube and Vimeo' );
		$this->WP_Widget( 'video', THEME_SLUG.' - '.'Video', $widget_ops );


	}



	function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$type= $instance['type'];
		$clip_id= $instance['clip_id'];
		$width= $instance['width'];


		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;



		if ( !empty( $clip_id ) ) {

			$height = intval( $width * 9 / 16 );

			// Vimeo Video post type
			if ( $type =='vimeo' ) {
				echo '<div class="mk-video-container"><iframe src="http://player.vimeo.com/video/'.$clip_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=00c65d" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
			}

			// Youtube Video post type
			if ( $type =='youtube' ) {
				$height = intval( $width * 9 / 16 ) + 25;
				echo '<div class="mk-video-container"><iframe src="http://www.youtube.com/embed/'.$clip_id.'?showinfo=0&theme=light&color=white&autohide=1" frameborder="0" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
			}

			// dailymotion Video post type
			if ( $type =='dailymotion' ) {

				echo '<div class="mk-video-container"><iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$clip_id.'?foreground=%2300c65d&highlight=%23ffffff&background=%23000000&logo=0"></iframe></div>';
			}

			// bliptv Video post type
			if ( $type =='bliptv' ) {
				echo '<div class="mk-video-container"><iframe src="http://blip.tv/play/'.$clip_id.'.x?p=1" width="'.$width.'" height="'.$height.'" frameborder="0" allowfullscreen></iframe><embed type="application/x-shockwave-flash" src="http://a.blip.tv/api.swf#'.$clip_id.'" style="display:none"></embed></div>';
			}


			// viddler Video post type
			if ( $type =='viddler' ) {
				echo '<div class="mk-video-container"><iframe id="viddler-bdce8c7" src="//www.viddler.com/embed/'.$clip_id.'/?f=1&offset=0&autoplay=0&secret=18897048&disablebranding=0&view_secret=18897048" width="'.$width.'" height="'.$height.'" frameborder="0" mozallowfullscreen="true" webkitallowfullscreen="true" scrolling="no" style="overflow:hidden !important;"></iframe></div>';
			}
		}




		echo $after_widget;

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type'] = strip_tags( $new_instance['type'] );
		$instance['clip_id'] = $new_instance['clip_id'];
		$instance['width'] = (int) $new_instance['width'];

		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type = isset( $instance['type'] ) ? $instance['type'] : 'youtube';
		$clip_id = isset( $instance['clip_id'] ) ? $instance['clip_id'] : '';
		$width = isset( $instance['width'] ) ? absint( $instance['width'] ) : 300;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

     	<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>">Type:</label>
			<select name="<?php echo $this->get_field_name( 'type' ); ?>" id="<?php echo $this->get_field_id( 'type' ); ?>" class="widefat">
            	<option value="youtube"<?php selected( $type, 'youtube' );?>>Youtube</option>
				<option value="vimeo"<?php selected( $type, 'vimeo' );?>>Vimeo</option>
				<option value="dailymotion"<?php selected( $type, 'dailymotion' );?>>dailymotion</option>
				<option value="bliptv"<?php selected( $type, 'bliptv' );?>>bliptv</option>
				<option value="viddler"<?php selected( $type, 'viddler' );?>>viddler</option>

			</select>
		</p>

		<p><label for="<?php echo $this->get_field_id( 'clip_id' ); ?>">Clip Id:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'clip_id' ); ?>" name="<?php echo $this->get_field_name( 'clip_id' ); ?>" type="text" value="<?php echo $clip_id; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'width' ); ?>">Width</label>
		<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo $width; ?>" size="3" /></p>

<?php

	}
}
/***************************************************/
