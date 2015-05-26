<?php

namespace ThemeJuice\Packages;

class Shortcodes implements PackageInterface {

  /**
   * @var {Array}
   */
  public $shortcodes;

  /**
   * @var {Array}
   */
  private $defaults = array(
    "accordion" => true,
    "colors" => true,
    "button" => true,
    "fonts" => true,
    "video" => true,
    "staff" => true,
    "bio" => true,
    "col" => true,
    "map" => true,
  );

  /**
   * Constructor
   *
   * @param {Array} $options - Array that contains functions
   */
  public function __construct( $options = array() ) {

    // Merge new options with defaults
    $options = array_merge( $this->defaults, $options );

    // Set shortcodes, discald false values, grab keys
    $this->shortcodes = array_keys( array_filter( $options ) );

    // Fix for PHP <= 5.3.x not allowing $this inside of closures
    $self = $this;

    // Add shortcodes
    if ( ! empty( $self->shortcodes ) ) {
      add_action( "init", function() use ( &$self ) {
        foreach ( $self->shortcodes as $shortcode ) {
          $self->register_shortcode( $shortcode );
        }
      });
    }
  }

  /**
   * Register shortcode
   *
   * @param {String} $shortcode - The name of the shortcode to register
   *
   * @return {Void}
   */
  public function register_shortcode( $shortcode ) {

    // Make sure shortcode doesn't already exist, and that the file itself
    //  exists. If we're all good, then include it.
    if ( ! shortcode_exists( $shortcode ) && file_exists( $file = __DIR__ . "/lib/$shortcode.php" ) ) {
      include $file;
    }
  }
}
