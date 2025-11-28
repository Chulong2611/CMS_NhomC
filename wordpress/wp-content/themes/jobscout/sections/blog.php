<?php
/**
 * Newest Blog Entries - Giống Y HỆT ảnh thầy gửi (đến từng pixel)
 * Thay thế hoàn toàn file cũ sections/blog.php
 */

$blog_heading = get_theme_mod( 'blog_section_title', __( 'NEWEST BLOG ENTRIES', 'jobscout' ) );

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 4,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query( $args );

if ( $qry->have_posts() ) : ?>
<section id="blog-section" class="tc-newest-blog-entries">
    <div class="container">
        <?php if ( $blog_heading ) : ?>
            <h2 class="section-title"><?php echo esc_html( $blog_heading ); ?></h2>
        <?php endif; ?>

        <div class="blog-grid">
            <?php while ( $qry->have_posts() ) : $qry->the_post(); ?>
                <article class="blog-card">
                    <div class="card-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'medium_large', array( 'alt' => esc_attr( get_the_title() ) ) );
                            } else {
                                // Ảnh mặc định nếu bài không có thumbnail
                                echo '<img src="https://via.placeholder.com/600x400/eeeeee/cccccc?text=No+Image" alt="no thumb">';
                            }
                            ?>
                        </a>
                    </div>

                    <div class="card-content">
                        <h3 class="card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="card-excerpt">
                            <?php 
                            if ( has_excerpt() ) {
                                echo wp_trim_words( get_the_excerpt(), 28, '...' );
                            } else {
                                echo wp_trim_words( get_the_content(), 28, '...' );
                            }
                            ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<style>
/* Đúng 100% ảnh thầy gửi - không thêm thắt gì */
.tc-newest-blog-entries { padding: 100px 0 80px; background: #fff; }
.tc-newest-blog-entries .section-title {
    text-align: center;
    font-size: 36px;
    font-weight: 800;
    text-transform: uppercase;
    color: #222;
    margin-bottom: 60px;
    letter-spacing: 1px;
}

.blog-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    max-width: 1240px;
    margin: 0 auto;
}

.blog-card {
    background: #fff;
    display: flex;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-8px);
}

.card-image {
    flex: 0 0 45%;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .card-image img {
    transform: scale(1.08);
}

.card-content {
    flex: 1;
    padding: 35px 30px 35px 40px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 15px;
    line-height: 1.3;
}

.card-title a {
    color: #222;
    text-decoration: none;
}

.card-title a:hover {
    color: #f60;
}

.card-excerpt {
    color: #555;
    font-size: 15px;
    line-height: 1.65;
    margin-bottom: 20px;
}

.read-more {
    color: #ff6600;
    font-size: 14px;
    font-weight: 600;
    text-transform: none;
    text-decoration: none;
    align-self: flex-start;
}

.read-more:hover {
    color: #e55a00;
    text-decoration: underline;
}

/* Mobile */
@media (max-width: 860px) {
    .blog-grid { grid-template-columns: 1fr; }
    .blog-card { flex-direction: column; }
    .card-image { height: 250px; }
    .card-content { padding: 25px; }
}
</style>
<?php endif; ?>