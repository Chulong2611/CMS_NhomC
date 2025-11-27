<?php
/**
 * Template Name: Custom Jobs Page (Project Nhom C)
 */

get_header(); 
?>

<div class="custom-news-banner job-banner-bg">
    <div class="overlay"></div>
    <div class="container">
        <h1 class="page-title">THAM GIA CÙNG CHÚNG TÔI</h1>
    </div>
</div>

<div id="primary" class="content-area" style="padding-top: 60px; padding-bottom: 60px; background-color: #f5f5f5;">
    <main id="main" class="site-main container">
        
        <div class="jobs-header-row" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            
            <h2 class="section-title" style="margin: 0; font-size: 24px; font-weight: 700; text-transform: uppercase;">ALL JOBS</h2>
            
            <div class="job-sort-wrapper">
                <select class="custom-job-select" onchange="if (this.value) window.location.href=this.value" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer;">
                    <option value="?orderby=date">Mới nhất</option>
                    <option value="?orderby=title">Theo tên (A-Z)</option>
                    <option value="?orderby=rand">Ngẫu nhiên</option>
                </select>
            </div>
        </div>

        <?php echo do_shortcode('[jobs show_filters="false" per_page="12"]'); ?>

    </main>
</div>

<?php get_template_part( 'sections/newsletter' ); ?>

<?php get_footer(); ?>