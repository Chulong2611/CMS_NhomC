<?php
/**
 * Custom Footer - Project Nhóm C
 */
?>

</div><footer id="colophon" class="site-footer custom-footer-group-c">
    <div class="container">
        
        <div class="footer-site-branding">
            <h2 class="footer-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h2>
        </div>

        <nav class="footer-navigation">
            <?php 
                // Gọi cái menu tên là "Footer Menu" bạn vừa tạo ở Bước 1
                wp_nav_menu( array(
                    'menu'           => 'Footer Menu', 
                    'container'      => false,
                    'menu_class'     => 'footer-menu-list',
                    'depth'          => 1,
                    'fallback_cb'    => false, // Nếu chưa tạo menu thì không hiện gì
                ) ); 
            ?>
        </nav>

        <div class="footer-social-icons">
            
            <a href="https://www.facebook.com/" class="social-btn facebook">
                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/></svg>
            </a>

            <a href="https://www.google.com/" class="social-btn google">
                <svg viewBox="0 0 24 24" width="20" height="20"><path fill="#EA4335" d="M12 5.04c1.64 0 3.12.56 4.28 1.68l3.18-3.18C17.52 1.76 14.96.8 12 .8 7.36.8 3.36 3.48 1.44 7.28l3.72 2.88C6.04 6.8 8.76 5.04 12 5.04"/><path fill="#34A853" d="M23.56 12.2c0-.84-.08-1.64-.2-2.4H12v4.52h6.48c-.28 1.48-1.12 2.76-2.36 3.6l3.76 2.92c2.24-2.08 3.68-5.16 3.68-8.64"/><path fill="#4A90E2" d="M5.16 14.4c-.24-.72-.4-1.48-.4-2.28 0-.8.16-1.56.4-2.28L1.44 6.96C.52 8.48 0 10.2 0 12c0 1.8.52 3.52 1.44 5.04l3.72-2.64"/><path fill="#FBBC05" d="M12 23.2c3.12 0 5.68-1.04 7.6-2.8l-3.76-2.92c-1.04.72-2.4 1.16-3.84 1.16-3.24 0-5.96-2.16-6.96-5.08l-3.72 2.64C3.36 20.52 7.36 23.2 12 23.2"/></svg>
            </a>

            <a href="https://www.line.me/" class="social-btn line">
                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M20.2 6.5c-2.6-2.5-6-3.9-9.7-3.9s-7.1 1.4-9.7 3.9C-1.8 9.1-2 15.3 5.4 19.4c.5.3.8.9.6 1.5l-.6 2c0 .2-.1.5.1.7.2.2.6.3.9.1l2.8-1.6c.4-.2.9-.3 1.4-.2 1 .3 2.1.4 3.1.4 3.7 0 7.1-1.4 9.7-3.9 5.3-5.3 2.1-11.9-3.2-11.9zM7.8 13.9H5.7c-.4 0-.7-.3-.7-.7V9.7c0-.4.3-.7.7-.7s.7.3.7.7v2.8h1.4c.4 0 .7.3.7.7s-.3.7-.7.7zm2.9 0c-.4 0-.7-.3-.7-.7V9.7c0-.4.3-.7.7-.7s.7.3.7.7v3.5c0 .4-.3.7-.7.7zm4.3-.7c-.3.4-.8.7-1.3.7-.1 0-.3 0-.4-.1-.1 0-.2-.1-.2-.2v2.8c0 .4-.3.7-.7.7s-.7-.3-.7-.7V9.7c0-.4.3-.7.7-.7s.7.3.7.7v2.4l1.8-2.5c.1-.1.2-.2.4-.2.4 0 .7.3.7.7v3.1zM18.4 11c0 .4-.3.7-.7.7h-1.4v.7h1.4c.4 0 .7.3.7.7s-.3.7-.7.7h-2.1c-.4 0-.7-.3-.7-.7V9.7c0-.4.3-.7.7-.7h2.1c.4 0 .7.3.7.7s-.3.7-.7.7h-1.4v.7h1.4c.4-.1.7.2.7.6z"/></svg>
            </a>

            <a href="https://x.com/" class="social-btn twitter">
                <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/></svg>
            </a>
        </div>
        
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>