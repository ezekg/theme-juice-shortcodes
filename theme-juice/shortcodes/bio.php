<?php

/**
 * Bio component shortcode
 *
 * @param {Array}  $atts         - Array containing arguments for shortcode
 * @param {String} $atts->$name  - Name to place inside of the bio
 * @param {String} $atts->$role  - Role to place inside of the bio
 * @param {String} $atts->$image - Image to place inside of the bio
 * @param {String} $content      - The actual bio text
 *
 * @return {Void}
 *
 * @example
 *   ```
 *   [bio name='John Doe' role='Owner' image='url/to/img.jpg']...[/bio]
 *   ```
 */
add_shortcode( "bio", function( $atts, $content = null ) {
    extract( shortcode_atts( array(
        "name" => null,
        "role" => null,
        "image" => get_template_directory_uri() . "/assets/images/default-bio-image.png",
    ), $atts, "bio" ) );

    $buffer = array();

    $buffer[] = "<div class='bio'>";

    if ( $image ) {
        $buffer[] = "<div class='bio__thumb'>";
        $buffer[] = "<div class='bio__thumb__overflow'>";
        $buffer[] = "<img src='$image'>";
        $buffer[] = "</div>";
        $buffer[] = "</div>";
    }

    $buffer[] = "<div class='bio__content'>";

    if ( $name ) {
        $buffer[] = "<p>Name: $name</p>";
    }

    if ( $role ) {
        $buffer[] = "<p>Role: $role</p>";
    }

    if ( $content ) {
        $buffer[] = do_shortcode( $content );
    }

    $buffer[] = "</div>";

    $buffer[] = "</div>";

    return implode( "", $buffer );
});
