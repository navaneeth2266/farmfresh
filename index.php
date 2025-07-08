<?php get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        Farm Fresh Meat & Seafood
                        <span class="text-primary">Delivered Fresh</span>
                    </h1>
                    <p class="hero-description">
                        Premium quality meat, seafood & ready-to-cook products delivered to your doorstep in 90 minutes.
                    </p>
                    <div class="hero-buttons">
                        <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-primary">Order Now</a>
                        <a href="<?php echo esc_url(home_url('/products')); ?>" class="btn btn-outline">Explore Menu</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-fresh-meat.jpg" alt="Farm fresh meat and seafood" loading="lazy" />
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="icon-shield"></i>
                    </div>
                    <div class="feature-content">
                        <h3>100% Fresh</h3>
                        <p>Freshest meat & seafood</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="icon-truck"></i>
                    </div>
                    <div class="feature-content">
                        <h3>90 Min Delivery</h3>
                        <p>Fast & reliable delivery</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="icon-award"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Premium Quality</h3>
                        <p>Hand-picked by experts</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="icon-chef"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Ready to Cook</h3>
                        <p>Pre-marinated options</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">Shop by Category</h2>
            <div class="categories-grid">
                <?php
                $categories = array(
                    array(
                        'name' => 'Chicken',
                        'slug' => 'chicken',
                        'count' => '25+ items',
                        'image' => get_template_directory_uri() . '/assets/images/categories/chicken.jpg'
                    ),
                    array(
                        'name' => 'Mutton',
                        'slug' => 'mutton', 
                        'count' => '18+ items',
                        'image' => get_template_directory_uri() . '/assets/images/categories/mutton.jpg'
                    ),
                    array(
                        'name' => 'Fish & Seafood',
                        'slug' => 'fish-seafood',
                        'count' => '30+ items', 
                        'image' => get_template_directory_uri() . '/assets/images/categories/seafood.jpg'
                    ),
                    array(
                        'name' => 'Ready to Cook',
                        'slug' => 'ready-to-cook',
                        'count' => '40+ items',
                        'image' => get_template_directory_uri() . '/assets/images/categories/ready-to-cook.jpg'
                    ),
                    array(
                        'name' => 'Marinades',
                        'slug' => 'marinades',
                        'count' => '15+ items',
                        'image' => get_template_directory_uri() . '/assets/images/categories/marinades.jpg'
                    ),
                    array(
                        'name' => 'Eggs',
                        'slug' => 'eggs',
                        'count' => '8+ items',
                        'image' => get_template_directory_uri() . '/assets/images/categories/eggs.jpg'
                    )
                );
                
                foreach ($categories as $category) :
                ?>
                <div class="category-item">
                    <a href="<?php echo esc_url(home_url('/product-category/' . $category['slug'])); ?>" class="category-link">
                        <div class="category-image">
                            <img src="<?php echo esc_url($category['image']); ?>" alt="<?php echo esc_attr($category['name']); ?>" loading="lazy" />
                        </div>
                        <h3 class="category-name"><?php echo esc_html($category['name']); ?></h3>
                        <p class="category-count"><?php echo esc_html($category['count']); ?></p>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Bestsellers</h2>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-outline">View All</a>
            </div>
            <div class="products-grid">
                <?php
                $bestseller_products = array(
                    array(
                        'id' => 1,
                        'name' => 'Chicken Curry Cut (Small)',
                        'price' => 299,
                        'original_price' => 349,
                        'weight' => '500g',
                        'rating' => 4.5,
                        'reviews' => 1250,
                        'image' => get_template_directory_uri() . '/assets/images/products/chicken-curry-cut.jpg',
                        'badge' => 'Bestseller',
                        'delivery_time' => '90 mins'
                    ),
                    array(
                        'id' => 2,
                        'name' => 'Mutton Curry Cut (Medium)',
                        'price' => 649,
                        'original_price' => 699,
                        'weight' => '500g',
                        'rating' => 4.3,
                        'reviews' => 890,
                        'image' => get_template_directory_uri() . '/assets/images/products/mutton-curry-cut.jpg',
                        'badge' => 'Premium',
                        'delivery_time' => '90 mins'
                    ),
                    array(
                        'id' => 3,
                        'name' => 'Fresh Pomfret - Medium',
                        'price' => 450,
                        'original_price' => 500,
                        'weight' => '500g',
                        'rating' => 4.6,
                        'reviews' => 567,
                        'image' => get_template_directory_uri() . '/assets/images/products/pomfret-fish.jpg',
                        'badge' => 'Fresh Catch',
                        'delivery_time' => '90 mins'
                    ),
                    array(
                        'id' => 4,
                        'name' => 'Chicken Seekh Kebab',
                        'price' => 199,
                        'original_price' => 229,
                        'weight' => '200g',
                        'rating' => 4.4,
                        'reviews' => 2100,
                        'image' => get_template_directory_uri() . '/assets/images/products/chicken-seekh-kebab.jpg',
                        'badge' => 'Ready to Cook',
                        'delivery_time' => '90 mins'
                    ),
                    array(
                        'id' => 5,
                        'name' => 'Prawns - Large',
                        'price' => 399,
                        'original_price' => 449,
                        'weight' => '250g',
                        'rating' => 4.2,
                        'reviews' => 445,
                        'image' => get_template_directory_uri() . '/assets/images/products/large-prawns.jpg',
                        'badge' => 'Ocean Fresh',
                        'delivery_time' => '90 mins'
                    ),
                    array(
                        'id' => 6,
                        'name' => 'Chicken Biryani Cut',
                        'price' => 329,
                        'original_price' => 379,
                        'weight' => '750g',
                        'rating' => 4.7,
                        'reviews' => 1890,
                        'image' => get_template_directory_uri() . '/assets/images/products/chicken-biryani-cut.jpg',
                        'badge' => "Chef's Special",
                        'delivery_time' => '90 mins'
                    )
                );
                
                foreach ($bestseller_products as $product) :
                ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>" loading="lazy" />
                        <span class="product-badge"><?php echo esc_html($product['badge']); ?></span>
                        <button class="wishlist-btn" data-product-id="<?php echo $product['id']; ?>">
                            <i class="icon-heart"></i>
                        </button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo esc_html($product['name']); ?></h3>
                        <div class="product-rating">
                            <div class="stars">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <i class="icon-star <?php echo $i <= $product['rating'] ? 'filled' : ''; ?>"></i>
                                <?php endfor; ?>
                                <span class="rating-text"><?php echo number_format($product['rating'], 1); ?></span>
                            </div>
                            <span class="review-count">(<?php echo number_format($product['reviews']); ?>)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">₹<?php echo number_format($product['price']); ?></span>
                            <span class="original-price">₹<?php echo number_format($product['original_price']); ?></span>
                            <span class="product-weight"><?php echo esc_html($product['weight']); ?></span>
                        </div>
                        <div class="product-actions">
                            <div class="delivery-time">
                                <i class="icon-clock"></i>
                                <span><?php echo esc_html($product['delivery_time']); ?></span>
                            </div>
                            <button class="add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">
                                <i class="icon-plus"></i>
                                Add
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2 class="newsletter-title">Get Fresh Deals & Updates</h2>
                <p class="newsletter-description">
                    Subscribe to our newsletter and never miss out on fresh deals and new arrivals.
                </p>
                <form class="newsletter-form" id="newsletter-form">
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <button type="submit" class="btn btn-white">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
