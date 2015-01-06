<?php

/**
 * Import JSON color map, create shortcode for each color
 *
 * @package Theme Juice Starter
 * @subpackage Theme Juice Shortcodes
 * @author Ezekiel Gabrielse, Produce Results
 * @link https://produceresults.com
 * @copyright Produce Results (c) 2014
 * @since 1.0.0
 */
if ( file_exists( $_file = get_template_directory() . "/assets/json/colors.json" ) ) {

    /**
     * Get contents of colors map exported from Sass
     */
    $colors = json_decode( file_get_contents( $_file ), true );

    /**
     * Loop through color map and create a shortcode with 'shade' atts
     *   for each shade specified for the particular color.
     */
    foreach ( $colors as $color => $shades ) {

        /**
         * Color shortcode
         *
         * @param {Array}  $atts                - Array containing arguments for shortcode
         * @param {String} $atts->$shade (base) - Shade of the color to use
         * @param {String} $content             - The content to color
         *
         * @return {Void}
         *
         * @example
         *   ```
         *   [blue shade='light']...[/blue]
         *   ```
         */
        add_shortcode( $color, function( $atts, $content = null ) use ( $color, $shades ) {
            extract( shortcode_atts( array(
                "shade" => "base"
            ), $atts, $color ) );

            foreach ( $shades as $_shade => $hex ) {
                if ( $_shade === $shade ) {
                    return "<span style='color:$hex;'>$content</span>";
                }
            }
        });
    }
}
