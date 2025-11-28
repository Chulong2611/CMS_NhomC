<?php
/**
 * Custom Job Listing - Modified for Group C Project
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
// Lấy dữ liệu cần thiết
$company_name = get_the_company_name(); // Lấy tên công ty chuẩn của WPJM
$job_featured = get_post_meta( get_the_ID(), '_featured', true );

?>
<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->_job_location_lng ); ?>" data-latitude="<?php echo esc_attr( $post->_job_location_lat ); ?>">

	<div class="job_listing-logo">
		<?php the_company_logo( 'thumbnail' ); ?>
	</div>

	<div class="job_listing-about">
		<div class="job_listing-position">
			
			<h3 class="job_listing-title">
				<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
			</h3>
			
			<div class="job-date-created">
				Created: <?php echo get_the_date('M d, Y'); ?>
			</div>

			<div class="job-meta-single-pill">
				<?php
				// A. Loại công việc (Fulltime...)
				if ( get_option( 'job_manager_enable_types' ) ) {
					$job_types = wpjm_get_the_job_types();
					if ( ! empty( $job_types ) ) {
						foreach ( $job_types as $type ) {
							echo '<span class="meta-item">' . esc_html( $type->name ) . '</span>';
						}
					}
				}

				// B. Tên công ty (Thay cho Category cũ)
				if ( $company_name ) {
					echo '<span class="meta-item">' . esc_html( $company_name ) . '</span>';
				}

				// C. Địa điểm (Ho Chi Minh City...)
				$location = get_the_job_location();
				if ( $location ) {
					echo '<span class="meta-item">' . esc_html( $location ) . '</span>';
				}
				?>
			</div>
		</div>

		<div class="job_listing-description">
			<?php 
			// Nếu có nhập Excerpt thì lấy, không thì cắt tự động 20 từ
			if ( has_excerpt() ) {
				echo get_the_excerpt();
			} else {
				echo wp_trim_words( get_the_content(), 20, '...' ); 
			}
			?>
		</div>
	</div>

	<?php if( $job_featured ){ ?>
		<div class="featured-label"><?php esc_html_e( 'Featured', 'jobscout' ); ?></div>
	<?php } ?>

</li>