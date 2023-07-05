<?php
/**
 * CLIENT CUSTOM POST BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title  = get_sub_field( 'title' );
$select_tag  = get_sub_field( 'select_tag' );
$select_post = get_sub_field( 'select_post' );
$section_id  = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'client-custom-post-block-' );

if ( ! empty( $main_title ) ) {
	?>
	<section class="client-custom-post-block" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) ) {
				?>
				<div class="row">
					<div class="col-9">
						<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>'; ?>
					</div>
				</div>
				<?php
			}
			?>
			<div class="row">
				<?php
				foreach ( $select_post as $client_post ) {
					setup_postdata( $client_post );
					?>
					<div class="col">
						<div class="client-image">
							<?php echo get_the_post_thumbnail( $client_post->ID ); ?>
						</div>
						<div class="client-category">
							<?php
							$terms = get_the_terms( $client_post->ID, 'case-study-categories' );
							foreach ( $terms as $_term ) {
							echo $_term->name; //phpcs:ignore
							}
							?>
						</div>
						<div class="client-title">
							<?php echo esc_html( get_the_title( $client_post->ID ) ); ?>
						</div>
						<div class="client-read-more btn">
							<a href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo esc_html( 'Read More' ); ?></a>
						</div>
					</div>
					<?php
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
