<?php
/**
 * CASE STUDIES CUSTOM POST BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$content    = get_sub_field( 'content' );
$case_studies_view_all_button    = get_field( 'case_studies_view_all_button', 'option' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'case-studies-custom-post-block-' );

?>
<section class="case-studies-custom-post-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-2">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<div class="cat-filter">
					<?php echo esc_html( 'FILTER POSTS:' ); ?>
				</div>
				<ul>
					<?php
					$args       = array(
						'taxonomy' => 'case-study-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="case-study-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					?>
					<li class="case-study-cat-list">
						<?php
						if ( $case_studies_view_all_button && ! empty( $case_studies_view_all_button['url'] ) && ! empty( $case_studies_view_all_button['title'] ) ) {
							$link_url    = $case_studies_view_all_button['url'];
							$link_title  = $case_studies_view_all_button['title'];
							$link_target = $case_studies_view_all_button['target'] ? $case_studies_view_all_button['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
							<?php
						}
						?>
					</li>
				</ul>
			</div>
			<div class="col-6">
				<?php
				$args = array(
					'post_type'   => 'case-study',
					'post_status' => 'publish',
					'orderby'     => 'post_date',
				);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) {
					$loop->the_post();
					$read_more_button = get_field( 'read_more_button' );
					?>
					<div class="case-study-box">
						<div class="case-study-image">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="case-study-conent">
							<div class="case-study-date">
								<?php
								echo get_the_date();
								echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'case-study-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
								?>
							</div>
							<div class="case-study-title">
								<?php echo get_the_title(); //phpcs:ignore ?>
							</div>
							<div class="case-study-content">
								<?php echo get_the_content(); //phpcs:ignore ?>
							</div>
							<div class="read-more btn">
								<a href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo esc_html( $read_more_button ); ?></a>
							</div>
						</div>
					</div>
					<?php
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
	</div>
</section>
