<?php
/**
 * CENTRED CONTENT IMAGE GALLERY
 *
 * @package TIMEFINANCE
 */

$image_gallary    = get_sub_field( 'image_gallary' );
$main_title       = get_sub_field( 'title' );
$select_tag       = get_sub_field( 'select_tag' );
$content          = get_sub_field( 'content' );
$padding_settings = get_sub_field( 'padding_settings' );
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'centred-content-image-gallery-' );

if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $image_gallary ) ) {
	?>
	<section class="centred-content-image-gallery <?php echo $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) || ! empty( $content ) ) {
				?>
				<div class="row justify-content-center text-center">
					<div class="col-md-11">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						if ( ! empty( $content ) ) {
							echo $content; //phpcs:ignore
						}
						?>
					</div>
				</div>
				<?php
			}
			if ( ! empty( $image_gallary ) ) {
				?>
				<div class="row justify-content-center">
					<div class="col-lg-10 col-lg-11">
						<div class="row row-cols-2 row-cols-lg-4 row-cols-md-3 justify-content-center align-items-center text-center">
							<?php
							foreach ( $image_gallary as $image ) {
								$image_alt = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );
								?>
								<div class="col logo">
									<img class="image-gallery" width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</section>
	<?php
}
