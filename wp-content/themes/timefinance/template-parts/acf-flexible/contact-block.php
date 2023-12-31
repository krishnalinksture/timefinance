<?php
/**
 * CONTACT BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title       = get_sub_field( 'title' );
$select_tag       = get_sub_field( 'select_tag' );
$content          = get_sub_field( 'content' );
$padding_settings = get_sub_field( 'padding_settings' );
$select_form      = get_sub_field( 'select_form' );
$form             = ( ! empty( $select_form ) ) ? '[forminator_form id="' . $select_form . '"]' : '';
$section_id       = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'contact-block-' );

if ( ! empty( $main_title ) || ! empty( $content ) || ! empty( $select_form ) ) {
	?>
	<section class="contact-block bg-purple <?php echo $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) || ! empty( $content ) ) {
				?>
				<div class="row">
					<div class="col-md-9">
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
			if ( ! empty( $select_form ) ) {
				?>
				<div class="row">
					<div class="col">
						<div class="contact-form">
							<?php echo do_shortcode( $form ); ?>
							<div class="thankyou-msg-contact"><?php echo esc_html( "Thank you for your message. A member of our team will be in touch shortly. In the meantime, if you're interested in how we use your data please click " ); //phpcs:ignore ?><a href="<?php echo home_url(); ?>/privacy-policy/"><?php echo esc_html( 'here' ); ?></a></div>
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
