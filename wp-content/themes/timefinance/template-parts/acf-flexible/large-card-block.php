<?php
/**
 * LARGE CARD BLOCK
 *
 * @package TIMEFINANCE
 */

$large_card       = get_sub_field( 'large_card' );
$main_title       = get_sub_field( 'title' );
$select_tag       = get_sub_field( 'select_tag' );
$background_color = get_sub_field( 'background_color' );
$padding_settings = get_sub_field( 'padding_settings' );
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'large-card-block-' );

if ( ! empty( $main_title ) || have_rows( 'large_card' ) ) {
	?>
	<section class="large-card-block <?php echo $background_color . ' ' . $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) ) {
				?>
				<div class="row">
					<div class="col">
						<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>'; ?>
					</div>
				</div>
				<?php
			}
			if ( have_rows( 'large_card' ) ) {
				?>
				<div class="row justify-content-center text-center">
					<?php
					while ( have_rows( 'large_card' ) ) {
						the_row();
						$card_title = get_sub_field( 'card_title' );
						$image      = get_sub_field( 'image' );
						$content    = get_sub_field( 'content' );
						$cta_button = get_sub_field( 'cta_button' );
						$box_link = get_sub_field( 'box_link' );
						$image_alt  = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );
						if ( ! empty( $image ) || ! empty( $card_title ) || ! empty( $content ) || ! empty( $cta_button ) ) {
							?>
							<div class="col-md">
								<a class="box-link" href="<?php echo esc_url( $box_link['url'] ); ?>">
									<div class="large-card-box">
										<?php
										if ( ! empty( $image ) ) {
											?>
											<div class="large-card-image">
												<img width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
											</div>
											<?php
										}
										if ( ! empty( $card_title ) || ! empty( $content ) || ! empty( $cta_button ) ) {
											?>
											<div class="large-card-content">
												<?php
												if ( ! empty( $card_title ) ) {
													?>
													<div class="large-card-title">
														<?php echo esc_html( $card_title ); ?>
													</div>
													<?php
												}
												if ( ! empty( $content ) ) {
													echo $content; //phpcs:ignore
												}
												if ( $cta_button ) {
													?>
													<button class="btn">
													<?php
													echo esc_html( $cta_button );
													?>
													</button>
													<?php
												}
												?>
											</div>
											<?php
										}
										?>
									</div>
								</a>
							</div>
							<?php
						}
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
	</section>
	<?php
}
