<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_oEmbed_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'oembed';
	}


	public function get_title() {
		return __( 'oEmbed', 'bsd-commerce-elementor-extension' );
	}


	public function get_icon() {
		return 'fa fa-code';
	}


	public function get_categories() {
		return [ 'general' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'bsd-commerce-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'url',
			[
				'label' => __( 'URL to embed', 'bsd-commerce-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'bsd-commerce-elementor-extension' ),
			]
		);

		$this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = wp_oembed_get( $settings['url'] );

		echo '<div class="oembed-elementor-widget">';

		echo ( $html ) ? $html : $settings['url'];

		echo '</div>';

	}

}