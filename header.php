<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="site-branding">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <div class="logo-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/farmfresh-logo.png" alt="FarmFresh Logo" class="site-logo" />
                                <span class="site-title">FarmFresh</span>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- Location -->
                <div class="header-location">
                    <i class="icon-map-pin"></i>
                    <span class="location-text">Deliver to:</span>
                    <span class="location-name">Mumbai 400001</span>
                </div>

                <!-- Search Bar -->
                <div class="header-search">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" class="search-field" placeholder="Search for meat, seafood & more..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="search-submit">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Header Actions -->
                <div class="header-actions">
                    <a href="<?php echo esc_url(wp_login_url()); ?>" class="login-btn">
                        <i class="icon-user"></i>
                        <span>Login</span>
                    </a>
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-btn">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="hamburger"></span>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'nav-menu',
                ));
                ?>
            </nav>
        </div>
    </header>
