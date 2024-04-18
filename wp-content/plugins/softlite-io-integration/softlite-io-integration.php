<?php
/**
 * Plugin Name: SoftLite.io Integration
 * Description: This plugin is used to integrate Softlite.io tools into your website
 * Plugin URI:  https://softlite.io/clonewebx/
 * Version:     1.0.4
 * Author:      SoftLite.io
 * Author URI:  https://softlite.io/
 * Text Domain: softlite
 * Domain Path: /languages
 * Elementor tested up to: 3.13.4
 * Elementor Pro tested up to: 3.13.2
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'SOFTLITE_VERSION', '1.0.4' );

final class Softlite {
    
    private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function init() {
        if ( defined('ELEMENTOR_VERSION') && version_compare( ELEMENTOR_VERSION, '3.10.0', '>=' ) ) {
            add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
            add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles_widget' ] );
            add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
            add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'add_custom_css_for_editor' ] );
            add_action( 'wp_print_scripts', [ $this, 'dequeue_scripts' ] );
            add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
        }
        
        $this->setup_updater();
    }

    public function dequeue_scripts() {
        wp_dequeue_script( 'editor-css-script' );
    }

    public function init_widgets($widgets_manager) {
        require_once( __DIR__ . '/inc/elementor/widgets/call-to-action.php' );
        $widgets_manager->register( new \Softlite_Call_To_Action() );
        require_once( __DIR__ . '/inc/elementor/widgets/image.php' );
        $widgets_manager->register( new \Softlite_Image() );
    }

    public function init_controls() {
        require_once( __DIR__ . '/inc/elementor/extensions/custom-css.php' );
		new Softlite_Custom_Css();

        require_once( __DIR__ . '/inc/elementor/extensions/background.php' );
		new Softlite_Background_Image();
    }

    public function enqueue_styles_widget() {
		wp_register_style( 'softlite-integration-widget-style', plugin_dir_url( __FILE__ ) . 'assets/css/minify/widget.min.css', [], SOFTLITE_VERSION );
	}

    public function add_custom_css_for_editor() {
        wp_dequeue_script( 'editor-css-script' );
        
        wp_enqueue_script(
            'purify',
            plugin_dir_url( __FILE__ ) . 'assets/js/minify/purify.min.js',
            [],
            SOFTLITE_VERSION,
            true
        );

        wp_enqueue_script(
            'softlite-elementor-editor-script',
            plugin_dir_url( __FILE__ ) . 'assets/js/minify/elementor-editor.js',
            ['elementor-frontend', 'purify'],
            SOFTLITE_VERSION,
            true
        );

        wp_localize_script(
            'softlite-elementor-editor-script',
            'elementData',
            array(
                'postID' => get_the_ID()
            )
        );
    }

    public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'softlite',
			[
				'title' => __( 'Softlite.io Itegration', 'softlite' ),
				'icon' => 'fa fa-plug',
			]
		);

	}

    private function setup_updater() {
		require_once( 'updater.php' );
		$plugin_slug = plugin_basename( __FILE__ );
		new Softlite_Updater( $plugin_slug, SOFTLITE_VERSION );
	}

}

// Instantiate Softlite.
Softlite::instance();