<?php
/**
 * Featured Post Widget
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


/**
 * Featured Post widget class
 *
 * @since Clean Magazine 0.2
 */
class clean_magazine_featured_post_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	function __construct() {

		$this->defaults = array(
			'title'           => '',
			'post_number'     => 1,
			'disable_image'   => 0,
			'image_alignment' => 'left',
			'image_size'      => '',
			'disable_title'   => 0,
			'hide_category'   => 0,
			'hide_tags'       => 0,
			'hide_posted_on'  => 1,
			'hide_author'     => 1,
			'content_type'    => 'excerpt',
			'content_limit'   => 200,
			'more_text'       => __( 'Read More ...', 'clean-magazine' ),
		);

		$widget_ops = array(
			'classname'   => 'ct-featured-post ctfeaturedpostpage',
			'description' => __( 'Displays featured posts with thumbnails', 'clean-magazine' ),
		);

		$control_ops = array(
			'id_base' => 'ct-featured-post',
		);

		parent::__construct(
			'ct-featured-post', // Base ID
			__( 'CT: Recent Posts', 'clean-magazine' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	function form( $instance ) {

		//* Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$style = 'style="display: none;"';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'clean-magazine' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e( 'No. of Posts', 'clean-magazine' ); ?>:</label>
			<input type="number" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" value="<?php echo absint( $instance['post_number'] ); ?>" class="small-text" min="1" />
		</p>

		<p>
        	<input class="checkbox ct_feat_post_disable_image" type="checkbox" <?php checked($instance['disable_image'], true) ?> id="<?php echo $this->get_field_id( 'disable_image' ); ?>" name="<?php echo $this->get_field_name( 'disable_image' ); ?>" />
        	<label for="<?php echo $this->get_field_id('disable_image'); ?>"><?php _e( 'Check to Disable Image', 'clean-magazine' ); ?></label><br />
        </p>

        <p <?php echo ( $instance['disable_image'] )? $style : '';  ?>>
			<label for="<?php echo $this->get_field_id( 'image_alignment' ); ?>"><?php _e( 'Image Alignment', 'clean-magazine' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'image_alignment' ); ?>" name="<?php echo $this->get_field_name( 'image_alignment' ); ?>" class="widefat">
				<?php
					$image_alignment_choices = array(
						'top'    => __( 'Top', 'clean-magazine' ),
						'left'   => __( 'Left', 'clean-magazine' ),
						'right'  => __( 'Right', 'clean-magazine' ),
						'center' => __( 'Center', 'clean-magazine' ),
					);

				foreach ( $image_alignment_choices as $key => $value ) {
					echo '<option value="' . $key . '" '. selected( $key, $instance['image_alignment'], false ) .'>' . $value .'</option>';
				}
				?>
			</select>
		</p>

		<p <?php echo ( $instance['disable_image'] )? $style : '';  ?>>
			<label for="<?php echo $this->get_field_id( 'image_size' ); ?>"><?php _e( 'Image Size', 'clean-magazine' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'image_size' ); ?>" class="clean-magazine-image-size-selector" name="<?php echo $this->get_field_name( 'image_size' ); ?>">
				<option value="thumbnail">thumbnail (<?php echo get_option( 'thumbnail_size_w' ); ?>x<?php echo get_option( 'thumbnail_size_h' ); ?>)</option>
				<?php
				$sizes = clean_magazine_get_additional_image_sizes();
				foreach( (array) $sizes as $name => $size )
					echo '<option value="'.esc_attr( $name ).'" '.selected( $name, $instance['image_size'], FALSE ).'>'.esc_html( $name ).' ( '.$size['width'].'x'.$size['height'].' )</option>';
				?>
			</select>
		</p>

        <p>
        	<input class="checkbox" type="checkbox" <?php checked($instance['disable_title'], true) ?> id="<?php echo $this->get_field_id( 'disable_title' ); ?>" name="<?php echo $this->get_field_name( 'disable_title' ); ?>" />
        	<label for="<?php echo $this->get_field_id('disable_title'); ?>"><?php _e( 'Check to Disable Title', 'clean-magazine' ); ?></label><br />
        </p>

        <p>
			<span class="description"><?php _e( 'Post Meta Info', 'clean-magazine' ); ?></span><br/>
			<input class="checkbox" type="checkbox" <?php checked($instance['hide_category'], true) ?> id="<?php echo $this->get_field_id( 'hide_category' ); ?>" name="<?php echo $this->get_field_name( 'hide_category' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_category'); ?>"><?php _e( 'Check to Hide Cagegory', 'clean-magazine' ); ?></label><br />
        	<input class="checkbox" type="checkbox" <?php checked($instance['hide_tags'], true) ?> id="<?php echo $this->get_field_id( 'hide_tags' ); ?>" name="<?php echo $this->get_field_name( 'hide_tags' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_tags'); ?>"><?php _e( 'Check to Hide Tags', 'clean-magazine' ); ?></label><br />
        	<input class="checkbox" type="checkbox" <?php checked($instance['hide_posted_on'], true) ?> id="<?php echo $this->get_field_id( 'hide_posted_on' ); ?>" name="<?php echo $this->get_field_name( 'hide_posted_on' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_posted_on'); ?>"><?php _e( 'Check to Hide Posted On Date', 'clean-magazine' ); ?></label><br />
        	<input class="checkbox" type="checkbox" <?php checked($instance['hide_author'], true) ?> id="<?php echo $this->get_field_id( 'hide_author' ); ?>" name="<?php echo $this->get_field_name( 'hide_author' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_author'); ?>"><?php _e( 'Check Hide to Author', 'clean-magazine' ); ?></label><br />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'content_type' ); ?>"><?php _e( 'Content Type', 'clean-magazine' ); ?>:</label>
			<select class="ct_feat_post_content_type" id="<?php echo $this->get_field_id( 'content_type' ); ?>" name="<?php echo $this->get_field_name( 'content_type' ); ?>">
				<option value="content" <?php selected( 'content', $instance['content_type'] ); ?>><?php _e( 'Show Content', 'clean-magazine' ); ?></option>
				<option value="excerpt" <?php selected( 'excerpt', $instance['content_type'] ); ?>><?php _e( 'Show Excerpt', 'clean-magazine' ); ?></option>
				<option value="content-limit" <?php selected( 'content-limit', $instance['content_type'] ); ?>><?php _e( 'Show Content Limit', 'clean-magazine' ); ?></option>
				<option value="" <?php selected( '', $instance['content_type'] ); ?>><?php _e( 'No Content', 'clean-magazine' ); ?></option>
			</select>
			<br />
			<label <?php echo ( 'content-limit' != $instance['content_type'] )? $style : '';  ?>for="<?php echo $this->get_field_id( 'content_limit' ); ?>"><?php _e( 'Limit content to', 'clean-magazine' ); ?>
				<input type="text" id="<?php echo $this->get_field_id( 'content_limit' ); ?>" name="<?php echo $this->get_field_name( 'content_limit' ); ?>" value="<?php echo esc_attr( intval( $instance['content_limit'] ) ); ?>" size="3" />
				<?php _e( 'characters', 'clean-magazine' ); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_text' ); ?>"><?php _e( 'More Text (if applicable)', 'clean-magazine' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'more_text' ); ?>" name="<?php echo $this->get_field_name( 'more_text' ); ?>" value="<?php echo esc_html( $instance['more_text'] ); ?>" />
		</p>

		<script>
		jQuery(document).ready(function($){
			disable_image = $( '.ct_feat_post_disable_image' );
			disable_image.change(function(){
				image_alignment = $(this).parent().next();
				image_size = $(this).parent().next().next();

				if( $(this).is(':checked') ) {
					image_alignment.hide();
					image_size.hide();
				}
				else {
					image_alignment.show();
					image_size.show();
				}
				return false;
			});

			content_type = $( '.ct_feat_post_content_type' );
			content_type.change(function(){
				content_type_val = $(this).val();
				content_limit = $(this).next().next();

				if( 'content-limit' == content_type_val ) {
					content_limit.show();
				}
				else {
					content_limit.hide();
				}
				return false;
			});
		});
		</script>
       	<?php
	}

	function update( $new_instance, $old_instance ) {

		$instance                    = $old_instance;
		$instance['title']           = sanitize_text_field( $new_instance['title'] );
		$instance['post_number']     = absint( $new_instance['post_number'] );
		$instance['disable_image']   = clean_magazine_sanitize_checkbox( $new_instance['disable_image'] );
		$instance['image_alignment'] = sanitize_key( $new_instance['image_alignment'] );
		$instance['image_size']      = sanitize_key( $new_instance['image_size'] );
		$instance['disable_title']   = clean_magazine_sanitize_checkbox( $new_instance['disable_title'] );
		$instance['hide_category']   = clean_magazine_sanitize_checkbox( $new_instance['hide_category'] );
		$instance['hide_tags']       = clean_magazine_sanitize_checkbox( $new_instance['hide_tags'] );
		$instance['hide_posted_on']  = clean_magazine_sanitize_checkbox( $new_instance['hide_posted_on'] );
		$instance['hide_author']     = clean_magazine_sanitize_checkbox( $new_instance['hide_author'] );
		$instance['content_type']    = sanitize_key( $new_instance['content_type'] );
		$instance['content_limit']   = absint( $new_instance['content_limit'] );
		$instance['more_text']       = sanitize_text_field( $new_instance['more_text'] );
		return $instance;
	}

	function widget( $args, $instance ) {
		global $post, $wp_query;

		$output ='';

		// Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$output .= $args['before_widget'];

		// Set up the author bio
		if ( ! empty( $instance['title'] ) ) {
			$output .= $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
		}

		$query_args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $instance['post_number'],
			'ignore_sticky_posts' => '1',
		);

		$wp_query = new WP_Query( $query_args );

		if ( have_posts() ) :
			$output .= '<div class="article-wrap">';
				while ( have_posts() ) : the_post();
					$output .= '
					<article class="post-'. $post->ID . ' post type-post hentry">';

						$title_attribute = the_title_attribute( array( 'echo' => false ) );

						if( !$instance['disable_image'] && has_post_thumbnail() ) {

							$output.= '
							<figure class="featured-image">
								<a href="' . esc_url( get_permalink() ) . '" title="' . $title_attribute . '">' .
									get_the_post_thumbnail(
										$post->ID,
										$instance['image_size']
										) .'
								</a>
							</figure>';
						}

						$output .= '<div class="entry-container">';

						$output .= '<header class="entry-header">';

						if ( !$instance['disable_title'] ) {
							$output .= '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" title="'. $title_attribute .'">'. get_the_title() .'</a></h2>';
						}

						if (
							$instance['hide_category'] &&
							$instance['hide_tags'] &&
							$instance['hide_posted_on'] &&
							$instance['hide_author'] ) {
						}

						$output .= clean_magazine_get_highlight_meta(
									$instance['hide_category'],
									$instance['hide_tags'],
									$instance['hide_posted_on'],
									$instance['hide_author']
								);

						$output .= '</header><!-- .entry-header -->';

						if ( 'excerpt' == $instance['content_type'] ) {
							$output .= '<div class="entry-summary">';
							$output .= '<p>' . get_the_excerpt() . '</p>';
							$output .= '</div><!-- .entry-summary -->';
						}
						elseif ( 'content-limit' == $instance['content_type'] ) {
							$output .= '<div class="entry-summary">';
							$output .= clean_magazine_get_the_content_limit( (int) $instance['content_limit'], esc_html( $instance['more_text'] ) );
							$output .= '</div><!-- .entry-summary -->';
						}

						elseif( 'content' == $instance['content_type'] ) {
							$output .= '<div class="entry-content">';
							$output .= get_the_content( esc_html( $instance['more_text'] ) );
							$output .= '</div><!-- .entry-content -->';

						}

						$output .= '</div><!-- .entry-container -->';
					$output .= '</article><!-- .type-post -->';
				endwhile;
			$output .= '</div><!-- .article-wrap -->';
		endif;

		//* Restore original query
		wp_reset_query();

		$output .= $args['after_widget'];

		echo $output;
	}
}

//From Codex: https://codex.wordpress.org/Widgets_API
add_action('widgets_init',
	create_function('', 'return register_widget("clean_magazine_featured_post_widget");')
);

