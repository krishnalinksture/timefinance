<?php
/**
 * FOOTER FILE.
 *
 * @package TIMEFINANCE
 */

?>
</main><!-- main content : END -->
<?php
$main_title    = get_field( 'title', 'options' );
$select_tag    = get_field( 'select_tag', 'options' );
$mail          = get_field( 'mail', 'options' );
$pop_up_title  = get_field( 'pop_up_title', 'options' );
$pop_up_form   = get_field( 'pop_up_form', 'options' );
$trustpilot    = get_field( 'trustpilot', 'options' );
$form_logo     = get_field( 'form_logo', 'options' );
$footer_logo     = get_field( 'footer_logo', 'options' );
$footer_address     = get_field( 'footer_address', 'options' );
$footer_social_icon     = get_field( 'footer_social_icon', 'options' );
$footer_content     = get_field( 'footer_content', 'options' );
$footer_form   = ( ! empty( $pop_up_form ) ) ? '[forminator_form id="' . $pop_up_form . '"]' : '';
$form_logo_alt = ( isset( $form_logo['alt'] ) && ! empty( $form_logo['alt'] ) ) ? $form_logo['alt'] : ( isset( $form_logo['title'] ) && ! empty( $form_logo['title'] ) ? $form_logo['title'] : '' );
$footer_logo_alt = ( isset( $footer_logo['alt'] ) && ! empty( $footer_logo['alt'] ) ) ? $footer_logo['alt'] : ( isset( $footer_logo['title'] ) && ! empty( $footer_logo['title'] ) ? $footer_logo['title'] : '' );

if ( is_active_sidebar( 'footer-column-1' ) || ! empty( $main_title ) || ! empty( $trustpilot ) || ! empty( $mail ) || ! empty( $pop_up_title ) || ! empty( $pop_up_form ) ) {
	?>
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="footer-title">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						if ( $mail && ! empty( $mail['url'] ) && ! empty( $mail['title'] ) ) {
							$link_url    = $mail['url'];
							$link_title  = $mail['title'];
							$link_target = $mail['target'] ? $mail['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
							<?php
						}
						?>
						<div class="popup-form">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<?php echo esc_html( $pop_up_title ); ?>
							</button>
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<img class="prs-logo" width="<?php echo $form_logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$form_logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $form_logo['url']; ?>" srcset="<?php echo $form_logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $form_logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $form_logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $form_logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $form_logo_alt; //phpcs:ignore ?>">
										</div>
										<div class="modal-body">
											<?php
											if ( ! empty( $pop_up_form ) ) {
												?>
												<div class="row justify-content-center">
													<div class="col">
														<?php
														if ( ! empty( $pop_up_form ) ) {
															?>
															<div class="footer-popup-form">
																<?php echo do_shortcode( $footer_form ); ?>
															</div>
															<?php
														}
														?>
													</div>
												</div>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						if ( ! empty( $trustpilot ) ) {
							?>
							<div class="trustpilot">
								<?php echo $trustpilot; //phpcs:ignore ?>
							</div>
							<?php
						}
						?>
					</div>
					<?php
					if ( is_active_sidebar( 'footer-column-1' ) ) {
						?>
						<div class="col-6">
							<div class="footer-menu-first">
								<?php dynamic_sidebar( 'footer-column-1' ); ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
		if ( ! empty( $footer_logo ) || ! empty( $footer_address ) || ! empty( $footer_content ) || have_rows( 'footer_social_icon', 'options' ) ) {
			?>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-6">
							<?php
							if ( ! empty( $form_logo ) ) {
								?>
								<div class="col-lg-auto">
									<img class="prs-logo" width="<?php echo $form_logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $form_logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $form_logo['url']; ?>" srcset="<?php echo $form_logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $form_logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $form_logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $form_logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $form_logo_alt; //phpcs:ignore ?>">
								</div>
								<?php
							}
							?>
						</div>
						<div class="col-3">
							<?php echo $footer_address; //phpcs:ignore
							if ( have_rows( 'footer_social_icon', 'options' ) ) {
								while ( have_rows( 'footer_social_icon', 'options' ) ) {
									the_row();
									$social_icon      = get_sub_field( 'social_icon', 'options' );
									$social_icon_link = get_sub_field( 'social_icon_link', 'options' );
									$social_icon_alt  = ( isset( $social_icon['alt'] ) && ! empty( $social_icon['alt'] ) ) ? $social_icon['alt'] : ( isset( $social_icon['title'] ) && ! empty( $social_icon['title'] ) ? $social_icon['title'] : '' );
									if ( $social_icon_link ) {
										$link_url    = $social_icon_link['url'];
										$link_title  = $social_icon_link['title'];
										$link_target = $social_icon_link['target'] ? $social_icon_link['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
											<img src="<?php echo esc_url( $social_icon['url'] ); ?>" alt="<?php echo $social_icon_alt; // phpcs:ignore ?>" />
										</a>
										<?php
									}
								}
							}
							?>
						</div>
						<div class="col-3">
						<?php
						echo $footer_content; //phpcs:ignore
						if ( is_active_sidebar( 'footer-bottom' ) ) {
							?>
							<div class="col-6">
								<div class="footer-bottom-menu">
									<?php dynamic_sidebar( 'footer-bottom' ); ?>
								</div>
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
	</footer>
	<?php
}
	wp_footer();
?>

</body>
</html>
