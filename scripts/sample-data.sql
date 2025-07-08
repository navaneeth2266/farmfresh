-- Insert sample data for FarmFresh WordPress theme

-- Sample newsletter subscribers
INSERT INTO `wp_farmfresh_subscribers` (`email`, `subscribed_at`, `status`) VALUES
('john.doe@example.com', NOW(), 'active'),
('jane.smith@example.com', NOW(), 'active'),
('customer@farmfresh.com', NOW(), 'active');

-- Sample product categories (WordPress terms)
INSERT INTO `wp_terms` (`name`, `slug`, `term_group`) VALUES
('Chicken', 'chicken', 0),
('Mutton', 'mutton', 0),
('Fish & Seafood', 'fish-seafood', 0),
('Ready to Cook', 'ready-to-cook', 0),
('Marinades', 'marinades', 0),
('Eggs', 'eggs', 0);

-- Get the term IDs for taxonomy insertion
SET @chicken_id = (SELECT term_id FROM wp_terms WHERE slug = 'chicken');
SET @mutton_id = (SELECT term_id FROM wp_terms WHERE slug = 'mutton');
SET @fish_id = (SELECT term_id FROM wp_terms WHERE slug = 'fish-seafood');
SET @ready_id = (SELECT term_id FROM wp_terms WHERE slug = 'ready-to-cook');
SET @marinades_id = (SELECT term_id FROM wp_terms WHERE slug = 'marinades');
SET @eggs_id = (SELECT term_id FROM wp_terms WHERE slug = 'eggs');

-- Insert into term taxonomy
INSERT INTO `wp_term_taxonomy` (`term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(@chicken_id, 'product_cat', 'Fresh chicken products', 0, 0),
(@mutton_id, 'product_cat', 'Premium mutton cuts', 0, 0),
(@fish_id, 'product_cat', 'Fresh fish and seafood', 0, 0),
(@ready_id, 'product_cat', 'Ready to cook items', 0, 0),
(@marinades_id, 'product_cat', 'Marinades and spices', 0, 0),
(@eggs_id, 'product_cat', 'Farm fresh eggs', 0, 0);

-- Sample products (WordPress posts)
INSERT INTO `wp_posts` (`post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `post_name`, `post_type`, `post_content_filtered`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`) VALUES
(1, NOW(), NOW(), 'Fresh chicken curry cut, perfect for making delicious curries and gravies.', 'Chicken Curry Cut (Small)', 'Fresh chicken curry cut - 500g', 'publish', 'chicken-curry-cut-small', 'product', '', '', '', NOW(), NOW()),
(1, NOW(), NOW(), 'Premium mutton curry cut, tender and flavorful.', 'Mutton Curry Cut (Medium)', 'Premium mutton curry cut - 500g', 'publish', 'mutton-curry-cut-medium', 'product', '', '', '', NOW(), NOW()),
(1, NOW(), NOW(), 'Fresh pomfret fish, cleaned and ready to cook.', 'Fresh Pomfret - Medium', 'Fresh pomfret fish - 500g', 'publish', 'fresh-pomfret-medium', 'product', '', '', '', NOW(), NOW()),
(1, NOW(), NOW(), 'Delicious chicken seekh kebab, ready to cook.', 'Chicken Seekh Kebab', 'Ready to cook chicken seekh kebab - 200g', 'publish', 'chicken-seekh-kebab', 'product', '', '', '', NOW(), NOW()),
(1, NOW(), NOW(), 'Large fresh prawns, cleaned and deveined.', 'Prawns - Large', 'Fresh large prawns - 250g', 'publish', 'prawns-large', 'product', '', '', '', NOW(), NOW()),
(1, NOW(), NOW(), 'Chicken biryani cut, perfect for making biryani.', 'Chicken Biryani Cut', 'Chicken biryani cut - 750g', 'publish', 'chicken-biryani-cut', 'product', '', '', '', NOW(), NOW());

-- Sample product meta (prices, etc.)
SET @product1_id = (SELECT ID FROM wp_posts WHERE post_name = 'chicken-curry-cut-small');
SET @product2_id = (SELECT ID FROM wp_posts WHERE post_name = 'mutton-curry-cut-medium');
SET @product3_id = (SELECT ID FROM wp_posts WHERE post_name = 'fresh-pomfret-medium');
SET @product4_id = (SELECT ID FROM wp_posts WHERE post_name = 'chicken-seekh-kebab');
SET @product5_id = (SELECT ID FROM wp_posts WHERE post_name = 'prawns-large');
SET @product6_id = (SELECT ID FROM wp_posts WHERE post_name = 'chicken-biryani-cut');

-- Product meta data
INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES
(@product1_id, '_price', '299'),
(@product1_id, '_regular_price', '349'),
(@product1_id, '_sale_price', '299'),
(@product1_id, '_weight', '500'),
(@product1_id, '_stock_status', 'instock'),
(@product1_id, '_featured', 'yes'),

(@product2_id, '_price', '649'),
(@product2_id, '_regular_price', '699'),
(@product2_id, '_sale_price', '649'),
(@product2_id, '_weight', '500'),
(@product2_id, '_stock_status', 'instock'),
(@product2_id, '_featured', 'yes'),

(@product3_id, '_price', '450'),
(@product3_id, '_regular_price', '500'),
(@product3_id, '_sale_price', '450'),
(@product3_id, '_weight', '500'),
(@product3_id, '_stock_status', 'instock'),
(@product3_id, '_featured', 'yes'),

(@product4_id, '_price', '199'),
(@product4_id, '_regular_price', '229'),
(@product4_id, '_sale_price', '199'),
(@product4_id, '_weight', '200'),
(@product4_id, '_stock_status', 'instock'),
(@product4_id, '_featured', 'yes'),

(@product5_id, '_price', '399'),
(@product5_id, '_regular_price', '449'),
(@product5_id, '_sale_price', '399'),
(@product5_id, '_weight', '250'),
(@product5_id, '_stock_status', 'instock'),
(@product5_id, '_featured', 'yes'),

(@product6_id, '_price', '329'),
(@product6_id, '_regular_price', '379'),
(@product6_id, '_sale_price', '329'),
(@product6_id, '_weight', '750'),
(@product6_id, '_stock_status', 'instock'),
(@product6_id, '_featured', 'yes');

-- Assign products to categories
INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(@product1_id, @chicken_id, 0),
(@product2_id, @mutton_id, 0),
(@product3_id, @fish_id, 0),
(@product4_id, @ready_id, 0),
(@product5_id, @fish_id, 0),
(@product6_id, @chicken_id, 0);
