<?php

namespace GutenbergBlockExamples;
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if class already defined, bail out
if ( class_exists( 'GutenbergBlockExamples\Blocks' ) ) {
	return;
}


/**
 * This class will create meta boxes for Shortcodes
 *
 * @package    GutenbergBlockExamples
 * @subpackage GutenbergBlockExamples/includes
 */
class Blocks {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * @var string $editor_script_handle the editor script handle id
	 */
	private $editor_script_handle;

	/**
	 * @var string $editor_style_handle the editor style handle id
	 */
	private $editor_style_handle;

	/**
	 * @var string $public_style_handle the public style handle id
	 */
	private $public_style_handle;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->editor_script_handle = 'gbe-block-editor-script';
		$this->editor_style_handle  = 'gbe-block-editor-style';
		$this->public_style_handle  = 'gbe-block-style';


		add_filter( 'block_categories', array( $this, 'register_block_categories' ), 10, 2 );
	}

	/**
	 * Add custom "UiKit" block category
	 * @hooked block_categories
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#managing-block-categories
	 */
	public function register_block_categories( $categories, $post ) {

		// Plugin’s block category title and slug.
		$block_category = array(
			'title' => esc_html__( 'UiKit Components', 'gutenberg-block-examples' ),
			'slug'  => 'uikit'
		);
		$category_slugs = wp_list_pluck( $categories, 'slug' );

		if ( ! in_array( $block_category['slug'], $category_slugs ) ) {
			$categories = array_merge(
				$categories,
				array(
					array(
						'title' => $block_category['title'],
						// Required
						'slug'  => $block_category['slug'],
						// Required
						'icon'  => 'screenoptions',
						// Slug of a WordPress Dashicon or custom SVG
					),
				)
			);
		}


		return $categories;

	}


	/**
	 * Enqueue assets for Editor (admin) and Public (frontend) side
	 * @hooked  enqueue_block_assets
	 */
	public
	function enqueue_block_assets() {

		$style_css = 'style-index.css';
		wp_enqueue_style(
			$this->public_style_handle,
			$this->get_build_url( $style_css ),
			array(),
			filemtime( $this->get_build_dir( $style_css ) )
		);

	}

	/**
	 * Get Build URL path
	 */
	public
	function get_build_url(
		$file_name_with_sub_dir
	) {

		return GBE_URL_PATH . trailingslashit( 'build' ) . $file_name_with_sub_dir;

	}

	/**
	 * Get Build Dir path
	 */
	public
	function get_build_dir(
		$file_name_with_sub_dir
	) {

		return GBE_DIR_PATH . 'build' . DIRECTORY_SEPARATOR . $file_name_with_sub_dir;

	}

	/**
	 * Enqueue CSS and JS assets for Editor
	 * @hooked  enqueue_block_editor_assets
	 */
	public
	function enqueue_block_editor_assets() {

		$script_asset_path = $this->get_build_dir( 'index.asset.php' );

		if ( ! file_exists( $script_asset_path ) ) {
			throw new \Error(
				'You need to first run `npm start` or `npm run build` for the blocks offered by this plugin. Could Not find the index.asset.php file'
			);
		}

		/**
		 * Register Scripts
		 */
		$script_asset = require( $script_asset_path );
		wp_enqueue_script(
			$this->editor_script_handle,
			$this->get_build_url( 'index.js' ),
			$script_asset['dependencies'],
			$script_asset['version']
		);

		/**
		 * Localize Scripts
		 * Passes translations to JavaScript.
		 */
		if ( function_exists( 'wp_set_script_translations' ) ) {
			/**
			 * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
			 * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
			 * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
			 */
			wp_set_script_translations( $this->editor_script_handle, 'gutenberg-block-examples' );
		}

		/**
		 * Register CSS Style
		 */

		$editor_css = 'index.css';
		wp_enqueue_style(
			$this->editor_style_handle,
			$this->get_build_url( $editor_css ),
			array(),
			filemtime( $this->get_build_dir( $editor_css ) )
		);

	}

	/**
	 * Registers all block assets so that they can be enqueued through Gutenberg in
	 * the corresponding context.
	 *
	 *
	 */
	public function register_blocks() {


		// Array of block created in this plugin.
		$blocks = [
			'gbe/message',
			'gbe/card',
		];

		// Loop through $blocks and register each block with the same script and styles.
		foreach ( $blocks as $block ) {
			register_block_type( $block, array(
				'editor_script' => $this->editor_script_handle,
				// Calls registered script above
				'editor_style'  => $this->editor_style_handle,
				// Calls registered stylesheet above
				'style'         => $this->public_style_handle,
				// Calls registered stylesheet above
			) );
		}


	}


}