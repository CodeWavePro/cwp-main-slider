<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$slides_per_screen = ( isset( $atts['slides_per_screen'] ) && $atts['slides_per_screen'] ) ? $atts['slides_per_screen'] : 1;
$timer = ( isset( $atts['timer'] ) && $atts['timer'] ) ? $atts['timer'] : 7;
$timer *= 1000; // Seconds to miliseconds for JS.

switch ( $atts['effect'] ) {
	case 'choice-1':
		$effect = 'fadeOut';
		break;

	case 'choice-2':
		$effect = 'slideOutLeft';
		break;

	case 'choice-3':
		$effect = '';
		break;
	
	default:
		$effect = '';
		break;
}

switch ( $atts['is_overlay'] ) {
	case true:
		$overlay_color = ( isset( $atts['overlay_color'] ) && $atts['overlay_color'] ) ? $atts['overlay_color'] : '#000';
		$overlay_opacity = ( isset( $atts['overlay_opacity'] ) && $atts['overlay_opacity'] ) ? $atts['overlay_opacity'] : 0.5;
		break;
	
	default:
		$overlay_color = 'transparent';
		$overlay_opacity = 0;
		break;
}

if ( isset( $atts['slider'] ) && $atts['slider'] ) {
	?>
	<div class = "cwp-slider owl-carousel owl-theme" data-slides = "<?php esc_attr_e( $slides_per_screen ) ?>" data-effect = "<?php esc_attr_e( $effect ) ?>" data-timer = "<?php esc_attr_e( $timer ) ?>">

		<?php
		foreach ( $atts['slider'] as $slide ) {
			$image = ( isset( $slide['image'] ) && $slide['image'] ) ? $slide['image']['url'] : '#';
			$title = ( isset( $slide['title'] ) && $slide['title'] ) ? $slide['title'] : '' ;
			$description = ( isset( $slide['description'] ) && $slide['description'] ) ? $slide['description'] : '' ;
			?>

			<div class = "cwp-slide" style = "background-image: url(<?php esc_attr_e( $image ) ?>)">
				<div class = "section-overlay" style = "background-color:<?php esc_attr_e( $overlay_color )?>;opacity:<?php esc_attr_e( $overlay_opacity )?>"></div>

				<div class = "fw-container">
					<div class = "fw-row">
						<div class = "fw-col-xs-12">
							<div class = "cwp-slide-text">
					 			<h2 class = "cwp-slide-text__header">
					 				<?php esc_html_e( $title ) ?>
					 			</h2>

					 			<div class = "cwp-slide-text__description">
					 				<?php _e( $description ) ?>
					 			</div>

					 			<?php
					 			if ( ( $atts['is_socials'] == 1 ) && fw_get_db_customizer_option( 'socials' ) ) {
					 				?>
					 				<ul class = "cwp-slide-icons">
					 					<?php
					 					foreach ( fw_get_db_customizer_option( 'socials' ) as $soc ) {
					 						$fa_class = ( isset( $soc['icon'] ) && $soc['icon'] ) ? $soc['icon'] : '';
					 						$link = ( isset( $soc['link'] ) && $soc['link'] ) ? $soc['link'] : '#';
					 						$is_new_tab = ( isset( $soc['is_new_tab'] ) && ( $soc['is_new_tab'] === true ) ) ? '_blank' : '';
					 						?>
					 						<li class = "cwp-slide-icon">
												<a class = "cwp-slide-icon__link" href = "<?php esc_attr_e( $link ) ?>" target = "<?php esc_attr_e( $is_new_tab ) ?>">
													<i class = "cwp-slide-icon__fa <?php esc_attr_e( $fa_class ) ?>"></i>
												</a>
											</li>
					 						<?php
					 					}
					 					?>
									</ul>
					 				<?php
					 			}
					 			?>

					 		</div><!-- .cwp-slide-text -->
						</div><!-- .fw-col-xs-12 -->
					</div><!-- .fw-row -->
				</div><!-- .fw-container -->
			</div><!-- .cwp-slide -->

			<?php
		}
		?>

	</div><!-- .cwp-slider -->
	<?php
}
