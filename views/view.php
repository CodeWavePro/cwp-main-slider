<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$slides_per_screen = ( isset( $atts['slides_per_screen'] ) && $atts['slides_per_screen'] ) ? $atts['slides_per_screen'] : 1;
$timer = ( isset( $atts['timer'] ) && $atts['timer'] ) ? $atts['timer'] : 7;
$is_autoplay = ( isset( $atts['is_autoplay'] ) && ( $atts['is_autoplay'] == 1 ) ) ? 'true' : 'false';
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

switch ( $atts['is_overlay']['choice'] ) {
	case 'enable':
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
	<div class = "cwp-slider owl-carousel owl-theme"
		data-autoplay = "<?php echo esc_attr( $is_autoplay ) ?>"
		data-slides = "<?php echo esc_attr( $slides_per_screen ) ?>"
		data-effect = "<?php echo esc_attr( $effect ) ?>"
		data-timer = "<?php echo esc_attr( $timer ) ?>">

		<?php
		foreach ( $atts['slider'] as $slide ) {
			$image = ( isset( $slide['image'] ) && $slide['image'] ) ? $slide['image']['url'] : '#';
			$title = ( isset( $slide['title'] ) && $slide['title'] ) ? $slide['title'] : '' ;
			$description = ( isset( $slide['description'] ) && $slide['description'] ) ? $slide['description'] : '' ;
			?>

			<!-- Single slide. -->
			<div class = "cwp-slide">
				<!-- Overlay block with its color and opacity from options.php file. -->
				<div class = "section-overlay"
					 style = "background-color: <?php echo esc_attr( $overlay_color ) ?>;
							  opacity: <?php echo esc_attr( $overlay_opacity ) ?>">
				</div>

				<div class = "fw-container">
					<div class = "fw-row">
						<div class = "fw-col-xs-12">
							<div class = "cwp-slide-image-wrapper">
								<img class = "cwp-slide__image animated" src = "<?php echo esc_url( $image ) ?>" />
							</div>

							<div class = "cwp-slide-text">
					 			<h2 class = "cwp-slide-text__header animated">
					 				<?php printf( esc_html__( '%s', 'mebel-laim' ), $title ) ?>
					 			</h2>

					 			<div class = "cwp-slide-text__description animated">
					 				<?php printf( esc_html__( '%s', 'mebel-laim' ), $description ) ?>
					 			</div>

					 			<?php
					 			if ( ( $atts['is_socials'] == 1 ) && fw_get_db_customizer_option( 'socials' ) ) {
					 				?>
					 				<ul class = "cwp-slide-icons animated">
					 					<?php
					 					foreach ( fw_get_db_customizer_option( 'socials' ) as $soc ) {
					 						$fa_class = ( isset( $soc['icon'] ) && $soc['icon'] ) ? $soc['icon'] : '';
					 						$link = ( isset( $soc['link'] ) && $soc['link'] ) ? $soc['link'] : '#';
					 						$is_new_tab = ( isset( $soc['is_new_tab'] ) && ( $soc['is_new_tab'] === true ) ) ? '_blank' : '';
					 						?>
					 						<li class = "cwp-slide-icon">
												<a class = "cwp-slide-icon__link" href = "<?php echo esc_url( $link ) ?>" target = "<?php echo esc_attr( $is_new_tab ) ?>">
													<i class = "cwp-slide-icon__fa <?php echo esc_attr( $fa_class ) ?>"></i>
												</a>
											</li>
					 						<?php
					 					}
					 					?>
									</ul><!-- .cwp-slide-icons -->
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