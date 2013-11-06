<?php 
/*
	CONTACT INFORMATION WIDGET
*/
class Artbees_Widget_Contact_Info extends WP_Widget {

	function Artbees_Widget_Contact_Info() {
		$widget_ops = array( 'classname' => 'widget_contact_info', 'description' => 'Displays a list of contact info.' );
		$this->WP_Widget( 'contact_info', THEME_SLUG.' - '. 'Contact Info', $widget_ops );

	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$company = $instance['company'];
		$person = $instance['person'];
		$phone = $instance['phone'];
		$fax = $instance['fax'];
		$email = $instance['email'];
		$address = $instance['address'];
		$website = $instance['website'];
		$skype = $instance['skype'];



		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

?>
			<ul>
			<?php if ( !empty( $person ) ):?><li><i class="mk-moon-user-7"></i><span><?php echo $person;?></span></li><?php endif;?>	
			<?php if ( !empty( $company ) ):?><li><i class="mk-moon-office"></i><span><?php echo $company;?></span></li><?php endif;?>
			<?php if ( !empty( $address ) ):?><li><i class="mk-icon-home"></i><span><?php echo $address;?></span></li><?php endif;?>
			<?php if ( !empty( $phone ) ):?><li><i class="mk-icon-phone"></i><span><?php echo $phone;?></span></li><?php endif;?>
			<?php if ( !empty( $fax ) ):?><li><i class="mk-icon-print"></i><span><?php echo $fax;?></span></li><?php endif;?>
			<?php if ( !empty( $email ) ):?><li><i class="mk-icon-envelope-alt"></i><span><a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email);?></a></span></li><?php endif;?>
			<?php if ( !empty( $website ) ):?><li><i class="mk-icon-globe"></i><span><a href="<?php echo $website; ?>"><?php echo str_replace('http://', '', $website); ?></a></span></li><?php endif;?>
			<?php if ( !empty( $skype ) ):?><li><i class="mk-moon-skype"></i><span><a href="skype:<?php echo $skype; ?>?call"><?php echo $skype;?></a></span></li><?php endif;?>
			</ul>
		<?php
		echo $after_widget; 

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['phone'] = strip_tags( $new_instance['phone'] );
		$instance['fax'] = strip_tags( $new_instance['fax'] );
		$instance['email'] = strip_tags( $new_instance['email'] );
		$instance['address'] = strip_tags( $new_instance['address'] );
		$instance['website'] = strip_tags( $new_instance['website'] );
		$instance['person'] = strip_tags( $new_instance['person'] );
		$instance['company'] = strip_tags( $new_instance['company'] );
		$instance['skype'] = strip_tags( $new_instance['skype'] );


		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$phone = isset( $instance['phone'] ) ? esc_attr( $instance['phone'] ) : '';
		$fax = isset( $instance['fax'] ) ? esc_attr( $instance['fax'] ) : '';
		$email = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
		$address = isset( $instance['address'] ) ? esc_attr( $instance['address'] ) : '';
		$website = isset( $instance['website'] ) ? esc_attr( $instance['website'] ) : '';
		$person = isset( $instance['person'] ) ? esc_attr( $instance['person'] ) : '';
		$company = isset( $instance['company'] ) ? esc_attr( $instance['company'] ) : '';
		$skype = isset( $instance['skype'] ) ? esc_attr( $instance['skype'] ) : '';

?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'person' ); ?>">Person:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'person' ); ?>" name="<?php echo $this->get_field_name( 'person' ); ?>" type="text" value="<?php echo $person; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'company' ); ?>">Company:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'company' ); ?>" name="<?php echo $this->get_field_name( 'company' ); ?>" type="text" value="<?php echo $company; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'address' ); ?>">Address:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo $address; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'phone' ); ?>">Phone:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo $phone; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'fax' ); ?>">Fax:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" type="text" value="<?php echo $fax; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'email' ); ?>">Email:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'website' ); ?>">Website:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'website' ); ?>" name="<?php echo $this->get_field_name( 'website' ); ?>" type="text" value="<?php echo $website; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'skype' ); ?>">Skype Username:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" type="text" value="<?php echo $skype; ?>" /></p>



		

<?php
	}

}
/***************************************************/