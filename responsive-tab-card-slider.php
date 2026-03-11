<?php
/**
 * Plugin Name: Responsive Tab to Card Slider for Elementor
 * Plugin URI: https://mavera.site
 * Description: Adds a responsive tab-to-card slider widget for Elementor using the bundled Swiper library.
 * Version: 1.0.1
 * Requires at least: 6.5
 * Requires PHP: 7.4
 * Author: Mavera Dijital A.Ş.
 * Author URI: https://mavera.site
 * Text Domain: responsive-tab-card-slider
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class RTCS_Elementor_Plugin {
	const VERSION = '1.0.1';

	/**
	 * @var RTCS_Elementor_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Singleton accessor.
	 *
	 * @return RTCS_Elementor_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Boot plugin hooks.
	 */
	private function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Initialize when Elementor is loaded.
	 */
	public function init() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'register_frontend_scripts' ) );
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'register_frontend_styles' ) );
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
	}

	/**
	 * Register frontend script.
	 */
	public function register_frontend_scripts() {
		wp_register_script(
			'rtcs-widget',
			plugins_url( 'assets/js/responsive-tab-card-slider.js', __FILE__ ),
			array( 'elementor-frontend', 'swiper' ),
			self::VERSION,
			true
		);
	}

	/**
	 * Register frontend style.
	 */
	public function register_frontend_styles() {
		wp_register_style(
			'rtcs-widget',
			plugins_url( 'assets/css/responsive-tab-card-slider.css', __FILE__ ),
			array(),
			self::VERSION
		);
	}

	/**
	 * Register Elementor widgets.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Manager instance.
	 */
	public function register_widgets( $widgets_manager ) {
		require_once __DIR__ . '/includes/widgets/class-responsive-tab-card-slider-widget.php';

		$widgets_manager->register( new \RTCS\Widgets\Responsive_Tab_Card_Slider_Widget() );
	}
}

RTCS_Elementor_Plugin::instance();
