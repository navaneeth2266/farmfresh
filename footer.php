<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-branding">
                        <div class="footer-logo">
                            <div class="logo-icon">
                                <i class="icon-barn"></i>
                            </div>
                            <span class="site-title">FarmFresh</span>
                        </div>
                        <p class="footer-description">
                            Farm fresh meat & seafood delivered to your doorstep with love and care.
                        </p>
                    </div>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-1',
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Categories</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-2',
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Support</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-3',
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="copyright">
                    &copy; <?php echo date('Y'); ?> FarmFresh. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
