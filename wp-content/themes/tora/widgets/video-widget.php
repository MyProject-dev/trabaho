<?php

class Tora_Video_Widget extends WP_Widget {

    public function __construct() {
		$widget_ops = array('classname' => 'tora_video_widget', 'description' => __( 'Display a video from Youtube, Vimeo etc.', 'tora') );
        parent::__construct(false, $name = __('Tora: Video', 'tora'), $widget_ops);
		$this->alt_option_name = 'tora_video_widget';
    }
	
	public function form($instance) {
		$title     	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$url    	= isset( $instance['url'] ) ? esc_url( $instance['url'] ) : '';
	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'tora'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<p><label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Paste the URL of the video (only from a network that supports oEmbed, like Youtube, Vimeo etc.):', 'tora' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo $url; ?>" size="3" /></p>
	
	<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = esc_url_raw($new_instance['url']);

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['tora_video_widget']) )
			delete_option('tora_video_widget');		  
		  
		return $instance;
	}

	public function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'tora_video_widget', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$url   = isset( $instance['url'] ) ? esc_url( $instance['url'] ) : '';

		echo $before_widget;
		
		if ( $title ) echo $before_title . $title . $after_title;
		
		if( ($url) ) {
			echo wp_oembed_get($url);
		}
		echo $after_widget;


		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'tora_video_widget', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
	
}