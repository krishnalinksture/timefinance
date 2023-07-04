<?php
/**
 * TRUSTPILOT
 *
 * @package TIMEFINANCE
 */

$select_style              = get_sub_field( 'select_style' );
$main_title              = get_sub_field( 'title' );
$select_tag              = get_sub_field( 'select_tag' );
$content                 = get_sub_field( 'content' );
$trustpilot              = get_sub_field( 'trustpilot' );
$select_background_color = get_sub_field( 'select_background_color' );
$section_id              = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'trustpilot-block-' );

switch ( $select_style ) {
	case 'style-1':
		?>
		<section class="trustpilot-block <?php echo $select_background_color . ' ' . $select_style; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-9 content">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						echo $content; //phpcs:ignore
						echo $trustpilot; //phpcs:ignore
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
		break;
	case 'style-2':
		?>
		<section class="trustpilot-block <?php echo $select_background_color . ' ' . $select_style; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
			<div class="container">
				<div class="row justify-content-start">
					<div class="col-10 content">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						echo $content; //phpcs:ignore
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
		break;
}
