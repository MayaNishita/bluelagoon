<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'seos-photography';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'seos-photography' ),
				'background-image'      => esc_attr__( 'Background Image', 'seos-photography' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'seos-photography' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'seos-photography' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'seos-photography' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'seos-photography' ),
				'inherit'               => esc_attr__( 'Inherit', 'seos-photography' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'seos-photography' ),
				'cover'                 => esc_attr__( 'Cover', 'seos-photography' ),
				'contain'               => esc_attr__( 'Contain', 'seos-photography' ),
				'background-size'       => esc_attr__( 'Background Size', 'seos-photography' ),
				'fixed'                 => esc_attr__( 'Fixed', 'seos-photography' ),
				'scroll'                => esc_attr__( 'Scroll', 'seos-photography' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'seos-photography' ),
				'left-top'              => esc_attr__( 'Left Top', 'seos-photography' ),
				'left-center'           => esc_attr__( 'Left Center', 'seos-photography' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'seos-photography' ),
				'right-top'             => esc_attr__( 'Right Top', 'seos-photography' ),
				'right-center'          => esc_attr__( 'Right Center', 'seos-photography' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'seos-photography' ),
				'center-top'            => esc_attr__( 'Center Top', 'seos-photography' ),
				'center-center'         => esc_attr__( 'Center Center', 'seos-photography' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'seos-photography' ),
				'background-position'   => esc_attr__( 'Background Position', 'seos-photography' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'seos-photography' ),
				'on'                    => esc_attr__( 'ON', 'seos-photography' ),
				'off'                   => esc_attr__( 'OFF', 'seos-photography' ),
				'all'                   => esc_attr__( 'All', 'seos-photography' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'seos-photography' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'seos-photography' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'seos-photography' ),
				'greek'                 => esc_attr__( 'Greek', 'seos-photography' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'seos-photography' ),
				'khmer'                 => esc_attr__( 'Khmer', 'seos-photography' ),
				'latin'                 => esc_attr__( 'Latin', 'seos-photography' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'seos-photography' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'seos-photography' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'seos-photography' ),
				'arabic'                => esc_attr__( 'Arabic', 'seos-photography' ),
				'bengali'               => esc_attr__( 'Bengali', 'seos-photography' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'seos-photography' ),
				'tamil'                 => esc_attr__( 'Tamil', 'seos-photography' ),
				'telugu'                => esc_attr__( 'Telugu', 'seos-photography' ),
				'thai'                  => esc_attr__( 'Thai', 'seos-photography' ),
				'serif'                 => _x( 'Serif', 'font style', 'seos-photography' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'seos-photography' ),
				'monospace'             => _x( 'Monospace', 'font style', 'seos-photography' ),
				'font-family'           => esc_attr__( 'Font Family', 'seos-photography' ),
				'font-size'             => esc_attr__( 'Font Size', 'seos-photography' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'seos-photography' ),
				'line-height'           => esc_attr__( 'Line Height', 'seos-photography' ),
				'font-style'            => esc_attr__( 'Font Style', 'seos-photography' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'seos-photography' ),
				'top'                   => esc_attr__( 'Top', 'seos-photography' ),
				'bottom'                => esc_attr__( 'Bottom', 'seos-photography' ),
				'left'                  => esc_attr__( 'Left', 'seos-photography' ),
				'right'                 => esc_attr__( 'Right', 'seos-photography' ),
				'center'                => esc_attr__( 'Center', 'seos-photography' ),
				'justify'               => esc_attr__( 'Justify', 'seos-photography' ),
				'color'                 => esc_attr__( 'Color', 'seos-photography' ),
				'add-image'             => esc_attr__( 'Add Image', 'seos-photography' ),
				'change-image'          => esc_attr__( 'Change Image', 'seos-photography' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'seos-photography' ),
				'add-file'              => esc_attr__( 'Add File', 'seos-photography' ),
				'change-file'           => esc_attr__( 'Change File', 'seos-photography' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'seos-photography' ),
				'remove'                => esc_attr__( 'Remove', 'seos-photography' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'seos-photography' ),
				'variant'               => esc_attr__( 'Variant', 'seos-photography' ),
				'subsets'               => esc_attr__( 'Subset', 'seos-photography' ),
				'size'                  => esc_attr__( 'Size', 'seos-photography' ),
				'height'                => esc_attr__( 'Height', 'seos-photography' ),
				'spacing'               => esc_attr__( 'Spacing', 'seos-photography' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'seos-photography' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'seos-photography' ),
				'light'                 => esc_attr__( 'Light 200', 'seos-photography' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'seos-photography' ),
				'book'                  => esc_attr__( 'Book 300', 'seos-photography' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'seos-photography' ),
				'regular'               => esc_attr__( 'Normal 400', 'seos-photography' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'seos-photography' ),
				'medium'                => esc_attr__( 'Medium 500', 'seos-photography' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'seos-photography' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'seos-photography' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'seos-photography' ),
				'bold'                  => esc_attr__( 'Bold 700', 'seos-photography' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'seos-photography' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'seos-photography' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'seos-photography' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'seos-photography' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'seos-photography' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'seos-photography' ),
				'add-new'           	=> esc_attr__( 'Add new', 'seos-photography' ),
				'row'           		=> esc_attr__( 'row', 'seos-photography' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'seos-photography' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'seos-photography' ),
				'back'                  => esc_attr__( 'Back', 'seos-photography' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'seos-photography' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'seos-photography' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'seos-photography' ),
				'none'                  => esc_attr__( 'None', 'seos-photography' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'seos-photography' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'seos-photography' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'seos-photography' ),
				'initial'               => esc_attr__( 'Initial', 'seos-photography' ),
				'select-page'           => esc_attr__( 'Select a Page', 'seos-photography' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'seos-photography' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'seos-photography' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'seos-photography' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'seos-photography' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
