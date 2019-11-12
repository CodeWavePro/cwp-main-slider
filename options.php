<?php if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slider'	=> array(
	    'type'				=> 'addable-box',
	    'label'				=> __( 'Slider settings', 'mebel-laim' ),
	    'desc'				=> __( 'Please add, remove or edit your slides', 'mebel-laim' ),

	    'box-options'		=> array(
	    	'image'			=> array(
			    'type'			=> 'upload',
			    'label'			=> __( 'Image', 'mebel-laim' ),
			    'desc'			=> __( 'Please upload slide image', 'mebel-laim' ),
			    'images_only'	=> true
			),

	        'title'	=> array(
	        	'type'	=> 'text',
	        	'label'	=> __( 'Title', 'mebel-laim' ),
			    'desc'	=> __( 'Please enter slide title', 'mebel-laim' )
	        ),

	        'description'	=> array(
			    'type'			=> 'wp-editor',
			    'label'			=> __( 'Description', 'mebel-laim' ),
			    'desc'			=> __( 'Please enter slide description', 'mebel-laim' ),
			    'size'			=> 'small',
			    'editor_height'	=> 150,
			    'wpautop'		=> true,
			    'editor_type'	=> false,
			    'shortcodes'	=> false
			)
	    ),

	    'template'			=> '{{- title }}',
	    'limit'				=> 0,
	    'add-button-text'	=> __( 'Add Slide', 'mebel-laim' ),
	    'sortable'			=> true
	),

	'is_socials'	=> array(
		'type'	=> 'switch',
		'label'	=> __( 'Add social buttons from "View -> Customize -> Contacts -> Socials" to this slider?', 'mebel-laim' )
	),

	'is_autoplay'	=> array(
		'type'	=> 'switch',
		'label'	=> __( 'Auto play slider?', 'mebel-laim' )
	),

	'slides_per_screen'	=> array(
    	'type'	=> 'text',
    	'label'	=> __( 'Slides Per Screen', 'mebel-laim' ),
	    'desc'	=> __( 'Please enter the number of slides', 'mebel-laim' )
    ),

    'timer'	=> array(
    	'type'	=> 'text',
    	'label'	=> __( 'Timer (seconds)', 'mebel-laim' ),
	    'desc'	=> __( 'Please enter the number of seconds for slider timer', 'mebel-laim' )
    ),

    'effect'	=> array(
	    'type'		=> 'radio',
	    'value'		=> 'choice-1',
	    'label'		=> __( 'Sliding Effect', 'mebel-laim' ),
	    'desc'		=> __( 'Please select an effect', 'mebel-laim' ),

	    'choices' => array(
	        'choice-1'	=> __( 'Fade', 'mebel-laim' ),
	        'choice-2'	=> __( 'Slide', 'mebel-laim' ),
	        'choice-3'	=> __( 'Slide (default)', 'mebel-laim' )
	    ),

	    'inline'	=> true
	),

    'is_overlay'	=> array(
		'type'	=> 'switch',
		'label'	=> __( 'Add overlay to slider?', 'mebel-laim' )
	),

	'overlay_color'	=> array(
		'type'  => 'color-picker',
		'label' => __( 'Overlay Color', 'mebel-laim' ),
		'desc'  => __( 'Please select color or write its value in HEX', 'mebel-laim' )
	),

	'overlay_opacity'	=> array(
	    'type'			=> 'slider',
	    'label'			=> __( 'Overlay Opacity', 'mebel-laim' ),
	    'desc'			=> __( 'Please select an opacity of overlay (0 - min color, 1 - max color)', 'mebel-laim' ),
	    'value'			=> 0.5,
	    'properties'	=> array(
	        'min'	=> 0,
	        'max'	=> 1,
	        'step'	=> 0.05
	    )
	)
);