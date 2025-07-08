-- Create custom tables for FarmFresh WordPress theme

-- Newsletter subscribers table
CREATE TABLE IF NOT EXISTS `wp_farmfresh_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `subscribed_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Product reviews table (if not using WooCommerce)
CREATE TABLE IF NOT EXISTS `wp_farmfresh_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `rating` tinyint(1) NOT NULL CHECK (`rating` >= 1 AND `rating` <= 5),
  `review_text` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('approved','pending','spam') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Wishlist table
CREATE TABLE IF NOT EXISTS `wp_farmfresh_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_product` (`user_id`, `product_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Delivery zones table
CREATE TABLE IF NOT EXISTS `wp_farmfresh_delivery_zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `delivery_fee` decimal(10,2) DEFAULT 0.00,
  `delivery_time` varchar(50) DEFAULT '90 mins',
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `pincode` (`pincode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample delivery zones
INSERT INTO `wp_farmfresh_delivery_zones` (`zone_name`, `pincode`, `delivery_fee`, `delivery_time`, `is_active`) VALUES
('Mumbai Central', '400001', 0.00, '90 mins', 1),
('Mumbai South', '400002', 0.00, '90 mins', 1),
('Mumbai North', '400050', 25.00, '120 mins', 1),
('Pune Central', '411001', 50.00, '120 mins', 1),
('Delhi Central', '110001', 75.00, '150 mins', 1);
