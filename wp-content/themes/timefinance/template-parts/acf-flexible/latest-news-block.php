<?php
/**
 * LATEST NEWS BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title         = get_sub_field( 'title' );
$select_tag         = get_sub_field( 'select_tag' );
$select_post        = get_sub_field( 'select_post' );
$select_title_align = get_sub_field( 'select_title_align' );
$padding_settings   = get_sub_field( 'padding_settings' );
$section_id         = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'latest-news-block-' );

?>
<section class="latest-news-block <?php echo $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<?php
		if ( ! empty( $main_title ) ) {
			?>
			<div class="row">
				<div class="col">
					<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4 ' . $select_title_align . '">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>'; //phpcs:ignore ?>
				</div>
			</div>
			<?php
		}
		?>
		<div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center">
			<?php
			$args = array(
				'post_type'      => $select_post,
				'post_status'    => 'publish',
				'posts_per_page' => 3,
				'orderby'        => 'post_date',
			);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) {
				$loop->the_post();
				$read_more_button = get_field( 'read_more_button' );
				?>
				<div class="col col-sm-8 col-md-6 col-lg-4">
					<div class="latest-news">
						<?php
						if ( get_the_post_thumbnail() ) {
							?>
							<div class="latest-news-image">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php
						}
						?>
						<div class="latest-news-content-box">
							<?php
							if ( get_the_title() ) {
								?>
								<div class="latest-news-title">
									<?php echo esc_html( get_the_title() ); ?>
								</div>
								<?php
							}
							if ( get_the_excerpt() ) {
								?>
								<p><?php echo get_the_excerpt(); //phpcs:ignore ?></p>
								<?php
							}
							if ( ! empty( $read_more_button ) ) {
								?>
								<div class="read-more btn">
									<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( $read_more_button ); ?></a>
								</div>
								<?php
							} else {
								?>
								<div class="read-more btn">
									<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( 'Read More' ); ?></a>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<?php
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</section>
