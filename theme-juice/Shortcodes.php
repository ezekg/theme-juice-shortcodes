<?php

namespace ThemeJuice;

/**
 * Setup and import shortcodes
 *
 * @package Theme Juice Starter
 * @subpackage Theme Juice Shortcodes
 * @author Ezekiel Gabrielse, Produce Results
 * @link https://produceresults.com
 * @copyright Produce Results (c) 2014
 * @since 1.0.0
 */
class Shortcodes {

    // class_exists('\\Foo\\Bar')

    /**
     * @var {Array} - Array that contains theme assets
     */
    public $shortcodes;

    /**
     * Constructor
     *
     * @param {Array} $options - Array that contains shortcodes to register
     */
    public function __construct( $options = array() ) {

        // Merge new options with defaults
        if ( ! empty( $options ) ) {
            $options = array_merge( array(
                "accordion" => true,
                "colors" => true,
                "column" => true,
                "button" => true,
                "fonts" => true,
                "video" => true,
                "staff" => true,
                "bio" => true,
                "map" => true,
            ), $options );
        }

        // Set shortcodes, discald false values, grab keys
        $this->shortcodes = array_keys( array_filter( $options ) );

        // Fix for PHP <= 5.3.x not allowing $this inside of closures
        $self = $this;

        // Add shortcodes
        if ( ! empty( $self->shortcodes ) ) {
            add_action( "init", function() use ( $self ) {
                foreach ( $self->shortcodes as $shortcode ) {
                    $self->register_shortcode( $shortcode );
                }
            });
        }
    }

    /**
     * Register shortcode
     *
     * @param {String} $handle - The name of the shortcode to register
     *
     * @return {Void}
     */
    public function register_shortcode( $shortcode ) {

        // Make sure shortcode doesn't already exist
        if ( ! shortcode_exists( $shortcode ) && file_exists( $_file = __DIR__ . "/shortcodes/$shortcode.php" ) ) {

            // Import contents of shortcode within closure
            add_shortcode( $shortcode, function() use ( $_file ) {
                include $_file;
            });
        }
    }
}
