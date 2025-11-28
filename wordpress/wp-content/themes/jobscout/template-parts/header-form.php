<?php
/**
 *
 * Creating a custom job search form for homepage
 * The [jobs] shortcode is will use search_location and search_keywords variables from the query string.
 *
 * @link https://wpjobmanager.com/document/tutorial-creating-custom-job-search-form/
 *
 * @package JobScout
 */
$find_a_job_link = get_option( 'job_manager_jobs_page_id', 0 );
$post_slug       = get_post_field( 'post_name', $find_a_job_link );
$ed_job_category = get_option( 'job_manager_enable_categories' );  

if( $post_slug ){
    $action_page =  home_url( '/'. $post_slug );
}else {
    $action_page =  home_url( '/' );
}
?>

<div class="job_listings">

  <form class="jobscout_job_filters" method="GET" action="<?php echo esc_url( home_url( '/jobs' ) ); ?>">
    <div class="search_jobs">

      <div class="search_keywords input-with-icon">
        <label for="search_keywords"><?php esc_html_e( 'Keywords', 'jobscout' ); ?></label>
        <span class="search-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#e67e22" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </span>
        <input type="text" id="search_keywords" name="search_keywords" placeholder="<?php esc_attr_e( 'Nhập công việc, công ty,...', 'jobscout' ); ?>">
      </div>

      <div class="search_location input-with-icon">
        <label for="search_location"><?php esc_html_e( 'Location', 'jobscout' ); ?></label>
        <span class="search-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#e67e22" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </span>
    
    <?php
    global $wpdb;
    $table = $wpdb->prefix . 'postmeta';
    
    // 1. QUERY SQL (Đã thêm điều kiện loại bỏ UK)
    $sql = "SELECT DISTINCT SUBSTRING_INDEX(meta_value, ',', -1) as location 
            FROM {$table} 
            WHERE meta_key LIKE '%location%' 
            AND meta_value != '' 
            AND meta_value NOT LIKE '%UK%'"; // <-- DÒNG NÀY ĐỂ LOẠI BỎ 'UK'
            
    $data = $wpdb->get_results($sql);
    
    // 2. Xử lý dữ liệu bằng PHP (Để sạch đẹp và sắp xếp A-Z chuẩn)
    $location_list = array();
    if ( $data ) {
        foreach ( $data as $value ) {
            // Cắt khoảng trắng thừa
            $clean_loc = trim( $value->location );
            
            // Kiểm tra kỹ lại lần nữa (đề phòng UK có khoảng trắng ' UK ')
            if ( ! empty( $clean_loc ) && $clean_loc !== 'UK' ) {
                $location_list[] = $clean_loc;
            }
        }
    }
    
    // 3. Loại bỏ trùng lặp và Sắp xếp A-Z (Tiếng Việt)
    $location_list = array_unique( $location_list ); 
    usort($location_list, function($a, $b) {
        return strcmp( remove_accents($a), remove_accents($b) );
    });
    ?>

    <select id="search_location" name="search_location" class="search-location-select">
        <option value="">Chọn khu vực</option>
        
        <?php 
        // 4. Hiển thị danh sách
        foreach ( $location_list as $loc ) : 
        ?>
            <option value="<?php echo esc_attr( $loc ); ?>">
                <?php echo esc_html( $loc ); ?>
            </option>
        <?php 
        endforeach; 
        ?>
    </select>
      </div>
      
      <?php if( $ed_job_category ){ ?>
          <div class="search_categories custom_search_categories">
            <label for="search_category"><?php esc_html_e( 'Job Category', 'jobscout' ); ?></label>
            <select id="search_category" class="robo-search-category" name="search_category">
            <option value=""><?php _e( 'Select Job Category', 'jobscout' ); ?></option>
              <?php foreach ( get_job_listing_categories() as $jobcat ) : ?>
                <option value="<?php echo esc_attr( $jobcat->term_id ); ?>"><?php echo esc_html( $jobcat->name ); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
      <?php } ?>
      
      <div class="search_submit">
        <input type="submit" value="<?php esc_attr_e( 'Tìm kiếm', 'jobscout'); ?>" />
      </div>

    </div>
  </form>

</div>