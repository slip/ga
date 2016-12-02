<?php
// Add Shortcode
function resolutionathens_subheading_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'text' => '',
		),
		$atts
	);

	return '<p class="subheading">'.$atts['text'].'</p>';

}
add_shortcode( 'subheading', 'resolutionathens_subheading_shortcode' );