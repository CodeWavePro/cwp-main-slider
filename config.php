<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg['page_builder'] = [
	'title'					=> esc_html__( 'CWP Main Slider', 'mebel-laim' ),
	'description'			=> esc_html__( 'Add Main Section slider with settings. No need any wrapping.', 'mebel-laim' ),
	'tab'					=> esc_html__( 'Content Elements', 'mebel-laim' ),
	'icon' 					=> 'dashicons dashicons-format-gallery',
	'disable_correction'	=> true
];