<?php
/**
 * SINGLE CASE STUDY
 *
 * @package TIMEFINANCE
 */

$image = get_field( 'image' );
$all_articles_button = get_field( 'all_articles_button' );
$image_alt = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );

?>
<section class="case-study-detail">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<?php
				if ( $image ) {
					?>
					<img class="case-study-images" width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
					<?php
				} else {
					the_post_thumbnail(); //phpcs:ignore
				}
				?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="case-study-detail-conent sticky-top">
					<div class="case-study-date">
						<?php
						echo get_the_date( 'm F Y', get_the_ID() );
						echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'case-study-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
						?>
					</div>
					<div class="case-study-title">
						<?php echo get_the_title(); //phpcs:ignore ?>
					</div>
					<div class="social-icon">
						<span class="share-article"><?php echo esc_html__( 'Share this post', 'timefinance' ); ?></span>
						<a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true?url=<?php the_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="Share Us On LinkedIn"><img src="<?php echo get_template_directory_uri(); // phpcs:ignore?>/inc/assets/linkedin-white.svg"></a>
						<a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="Share Us On Twitter"><img src="<?php echo get_template_directory_uri(); // phpcs:ignore?>/inc/assets/twitter-white.svg"></a>
					</div>
					<?php
					if ( $all_articles_button && ! empty( $all_articles_button['url'] ) && ! empty( $all_articles_button['title'] ) ) {
						$link_url    = $all_articles_button['url'];
						$link_title  = $all_articles_button['title'];
						$link_target = $all_articles_button['target'] ? $all_articles_button['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php
					}
					?>
				</div>
			</div>
			<div class="col-8">
				<?php
				$_term = get_queried_object();
				if ( have_rows( 'page_builder', $_term ) ) {
					while ( have_rows( 'page_builder', $_term ) ) {
						the_row();
						$layout_section = get_row_layout();
						switch ( $layout_section ) {
							case 'content_block':
								$template_name = str_replace( '_', '-', $layout_section );
								get_template_part( 'template-parts/acf-flexible/' . $template_name );
								break;
							default:
								break;
						}
					}
				}
				?>
			</div>
		</div>
	</div>
</section>
