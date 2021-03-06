<?php
/**
* The template for adding Customizer Custom Controls
*
* @package Catch Themes
* @subpackage Clean Magazine
* @since Clean Magazine 0.2
*/

//Custom control for dropdown category multiple select
class clean_magazine_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
	public $type = 'dropdown-categories';

	public $name;

	public function render_content() {
		$dropdown = wp_dropdown_categories(
			array(
				'name'             => $this->name,
				'echo'             => 0,
				'hide_empty'       => false,
				'show_option_none' => false,
				'hide_if_empty'    => false,
			)
		);

		$dropdown = str_replace('<select', '<select multiple = "multiple" style = "height:95px;" ' . $this->get_link(), $dropdown );

		printf(
			'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
			$this->label,
			$dropdown
		);

		echo '<p class="description">'. __( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'clean-magazine' ) . '</p>';
	}
}


//Custom control for dropdown category multiple select
class clean_magazine_Important_Links extends WP_Customize_Control {
    public $type = 'important-links';

    public function render_content() {
    	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
        $important_links = array(
						'theme_instructions' => array(
							'link'	=> esc_url( 'https://catchthemes.com/theme-instructions/clean-magazine/' ),
							'text' 	=> __( 'Theme Instructions', 'clean-magazine' ),
							),
						'support' => array(
							'link'	=> esc_url( 'https://catchthemes.com/support/' ),
							'text' 	=> __( 'Support', 'clean-magazine' ),
							),
						'changelog' => array(
							'link'	=> esc_url( 'https://catchthemes.com/changelogs/clean-magazine-theme/' ),
							'text' 	=> __( 'Changelog', 'clean-magazine' ),
							),
						'donate' => array(
							'link'	=> esc_url( 'http://catchthemes.com/donate/' ),
							'text' 	=> __( 'Donate Now', 'clean-magazine' ),
							),
						'review' => array(
							'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/clean-magazine' ),
							'text' 	=> __( 'Review', 'clean-magazine' ),
							),
						);
		foreach ( $important_links as $important_link) {
			echo '<p><a target="_blank" href="' . $important_link['link'] .'" >' . esc_attr( $important_link['text'] ) .' </a></p>';
		}
    }
}
