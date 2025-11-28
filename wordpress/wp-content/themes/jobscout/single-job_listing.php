<?php

/**
 * Template hiển thị chi tiết 1 việc làm (Single Job)
 */
get_header();
global $post;
?>
<div class="job-breadcrumbs-section" style="background-color: #f5f5f5; padding: 20px 0 0;">
	<div class="container">
		<ul class="job-breadcrumbs-list" style="list-style: none; padding: 0; margin: 0; font-size: 13px; color: #999;">
			<li style="display: inline-block;">
				<a href="<?php echo home_url(); ?>" style="color: #e67e22; text-decoration: none;">Trang chủ</a>
			</li>
			<li style="display: inline-block; margin: 0 5px;">/</li>
			<li style="display: inline-block;">
				<a href="<?php echo home_url('/jobs'); ?>" style="color: #e67e22; text-decoration: none;">Tất cả công việc</a>
			</li>
			<li style="display: inline-block; margin: 0 5px;">/</li>
			<li style="display: inline-block;">Chi tiết công việc</li>
		</ul>
	</div>
</div>
<div class="single-job-page-wrapper" style="background-color: #f5f5f5; padding-top: 40px; padding-bottom: 0;">
	<div class="container">

		<div class="single-job-header-card">

			<div class="header-logo">
				<?php the_company_logo('medium'); ?>
			</div>

			<div class="header-info">
				<h1 class="single-job-title"><?php the_title(); ?></h1>
				<div class="single-job-date">
					Created: <?php echo get_the_date('M d, Y'); ?>
				</div>

				<div class="job-meta-single-pill">
					<?php
					// Type
					$job_types = wpjm_get_the_job_types();
					if (! empty($job_types)) {
						foreach ($job_types as $type) {
							echo '<span class="meta-item">' . esc_html($type->name) . '</span>';
						}
					}
					// Category (Dùng Company Name thay thế cho khớp bài trước)
					echo '<span class="meta-item">' . get_the_company_name() . '</span>';
					// Location
					echo '<span class="meta-item">' . get_the_job_location() . '</span>';
					?>
				</div>
			</div>

			<div class="header-actions">
				<button class="btn-share">CHIA SẺ</button>
				<?php if ($apply = get_the_job_application_method()) : ?>
					<a href="<?php echo esc_url($apply->url); ?>" class="btn-apply" target="_blank">NHẬN CÔNG VIỆC</a>
				<?php else: ?>
					<a href="#" class="btn-apply">NHẬN CÔNG VIỆC</a>
				<?php endif; ?>
			</div>
		</div>

		<div class="single-job-body-row">

			<div class="single-job-content-col">
				<div class="content-box-white">
					<?php the_content(); ?>
				</div>
			</div>

			<div class="single-job-sidebar-col">

				<div class="sidebar-widget">
					<h3 class="widget-title">Staff Rating</h3>
					<div class="rating-box">
						<?php
						// 1. Tạo số điểm ngẫu nhiên từ 3.5 đến 5.0
						// (Ví dụ: 3.8, 4.2, 4.9, 5.0)
						$random_rating = rand(35, 50) / 10;

						// 2. Logic hiển thị ngôi sao dựa trên điểm
						// Nếu điểm >= 4.5 thì hiện 5 sao, thấp hơn thì hiện 4 sao (hoặc logic tùy bạn)
						$stars = ($random_rating >= 4.5) ? '★★★★★' : '★★★★☆';
						if ($random_rating < 4.0) $stars = '★★★☆☆';?>

						<span class="stars" style="color: #e67e22; letter-spacing: 2px;"><?php echo $stars; ?></span>
						<span class="rating-num" style="font-weight: bold; color: #333; margin-left: 8px;"><?php echo $random_rating; ?></span>
					</div>
				</div>

				<div class="sidebar-widget">
					<h3 class="widget-title">Company Photos</h3>
					<div class="company-photos-grid">
						<img src="https://via.placeholder.com/300x200?text=Office+1" alt="Office">
					</div>
				</div>

			</div>
		</div>

		<div class="related-jobs-section">
			<h2 class="section-title text-center" style="margin: 50px 0 30px; text-transform: uppercase; font-weight: 800;">OTHER JOBS</h2>

			<ul class="job_listings">
				<?php
				// Query lấy 4 việc làm khác (trừ bài hiện tại)
				$args = array(
					'post_type'      => 'job_listing',
					'posts_per_page' => 4,
					'post__not_in'   => array(get_the_ID()), // Trừ bài đang xem
					'orderby'        => 'rand' // Lấy ngẫu nhiên
				);
				$related_query = new WP_Query($args);

				if ($related_query->have_posts()) :
					while ($related_query->have_posts()) : $related_query->the_post();
						// GỌI LẠI FILE CARD JOB MÀ CHÚNG TA ĐÃ LÀM Ở BƯỚC TRƯỚC
						get_template_part('job_manager/content-job_listing');
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</ul>
		</div>

	</div>
</div>


<div class="news-letter">
	<?php get_template_part('sections/newsletter'); ?>
</div>

<?php get_footer(); ?>