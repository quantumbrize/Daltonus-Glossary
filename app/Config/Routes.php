<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

// Frontend Routes
$routes->get('/',                                   'Frontend\Frontend_Controller::home'); // Home page
$routes->get('/logout',                             'Frontend\Frontend_Controller::logout'); // Logout functionality
$routes->get('/login',                              'Frontend\Frontend_Controller::load_login'); // Load login page
$routes->post('/login-action',                      'Frontend\Frontend_Controller::handle_login'); // Handle login form submission
$routes->get('/forgot-password',                    'Frontend\Frontend_Controller::load_forgot_password'); // Load forgot password page
$routes->get('/sign-up',                            'Frontend\Frontend_Controller::load_signup'); // Load sign up page
$routes->get('/vendor/sign-up',                     'Frontend\Frontend_Controller::load_vendor_signup'); // Load vendor sign up page
$routes->get('/sign-up-success',                    'Frontend\Frontend_Controller::signup_success'); // Sign up success page
$routes->post('/sign-up-action',                    'Frontend\Frontend_Controller::handle_signup'); // Handle sign up form submission
$routes->get('/resend-otp',                         'Frontend\Frontend_Controller::resend_otp'); // Handle Resend OTP
$routes->get('/change-password',                    'Frontend\Frontend_Controller::change_password'); // Load change password page
$routes->post('/change-password-action',            'Frontend\Frontend_Controller::handle_change_password'); // Handle change password form submission
$routes->post('/send-otp',                          'Frontend\Frontend_Controller::send_otp'); // Send OTP for verification
$routes->get('/verify-otp',                         'Frontend\Frontend_Controller::load_otp'); // Load OTP verification page
$routes->post('/verify-otp-action',                 'Frontend\Frontend_Controller::verify_otp'); // Handle OTP verification form submission
$routes->get('/product/list',                       'Frontend\Product_Controller::product_list'); // List of products
$routes->get('/product/details',                    'Frontend\Product_Controller::product_details'); // Product details page
$routes->get('/product/category',                   'Frontend\Product_Controller::product_category'); // Product category page
$routes->get('/user/account',                       'Frontend\Frontend_Controller::account'); // User account page
$routes->get('/user/address',                       'Frontend\Frontend_Controller::address'); // User address page
$routes->get('/user/cart',                          'Frontend\Product_Controller::cart'); // User cart page
$routes->get('/user/cart/checkout',                 'Frontend\Product_Controller::cart_checkout'); // Checkout page
$routes->get('/about-us',                           'Frontend\Frontend_Controller::about_us'); // About us page
$routes->get('/purchase-guide',                     'Frontend\Frontend_Controller::purchase_guide'); // Purchase guide page
$routes->get('/terms-conditions',                   'Frontend\Frontend_Controller::terms_conditions'); // Terms and conditions page
$routes->get('/privacy-policy',                     'Frontend\Frontend_Controller::privacy_policy'); // Privacy policy page
$routes->get('/faq',                                'Frontend\Frontend_Controller::faq'); // FAQ page
$routes->get('/invoice',                            'Frontend\Order_Controller::invoice'); // Invoice page
$routes->get('/order/success',                      'Frontend\Order_Controller::order_success'); // Order success page
$routes->get('/order/track',                        'Frontend\Order_Controller::track_order'); // Track order page
$routes->get('/order/cancel',                       'Frontend\Order_Controller::cancel_order'); // Cancel order page
$routes->get('/order/return',                       'Frontend\Order_Controller::return_order'); // Return order page
$routes->get('/order/item/return',                  'Frontend\Order_Controller::return_order_item'); // Return order item page
$routes->get('/order/history',                      'Frontend\Order_Controller::order_history'); // Order history page
$routes->get('/order/conformation',                 'Frontend\Order_Controller::conformation'); // Order confirmation page
$routes->get('/order/returns',                      'Frontend\Order_Controller::returns'); // Order returns page
$routes->get('/contact-us',                         'Frontend\Frontend_Controller::contact_us'); // Contact us page
$routes->get('/payment',                            'Frontend\Order_Controller::payment'); // Payment page
$routes->get('/billing',                            'Frontend\Order_Controller::billing'); // Billing page
$routes->get('/review',                             'Frontend\Product_Controller::review'); // Review page
$routes->get('/wishlist',                           'Frontend\Product_Controller::wishlist'); // Wishlist page
$routes->get('/user/details',                       'Frontend\Frontend_Controller::user_details'); // User Details page
$routes->get('/user/notification',                  'Frontend\Frontend_Controller::notification'); // User Notification page
$routes->get('/promo-code',                         'Frontend\Frontend_Controller::promo_code'); // User Promo Code page
$routes->get('/categoris',                          'Frontend\Frontend_Controller::categoris'); // User Categoris page





// Admin Routes
$routes->get('/admin',                              'Admin\Admin_Controller::index'); // Admin dashboard page
$routes->get('/admin/login',                        'Admin\Admin_Controller::load_login'); // Admin login page
$routes->get('/admin/logout',                       'Admin\Admin_Controller::logout'); // Admin logout functionality
$routes->post('/admin/login-action',                'Admin\Admin_Controller::handle_login'); // Handle admin login form submission
$routes->get('/admin/categories',                   'Admin\Category_Controller::index'); // Admin categories page
$routes->get('/admin/product',                      'Admin\Product_Controller::load_single_product'); // Admin single product page
$routes->get('/admin/product/list',                 'Admin\Product_Controller::index'); // Admin product list page
$routes->get('/admin/product/add',                  'Admin\Product_Controller::load_product_add'); // Admin product add page
$routes->get('/admin/product/bulk/add',             'Admin\Product_Controller::load_product_add_bulk'); // Admin product add page
$routes->get('/admin/product/bulk/edit',            'Admin\Product_Controller::load_product_bulk_edit'); // Admin product add page

$routes->get('/admin/product/update',               'Admin\Product_Controller::load_product_update'); // Admin product update page
$routes->get('/admin/product/variant/add',          'Admin\Product_Controller::load_add_variants'); // Admin add product variants page
$routes->get('/admin/orders',                       'Admin\Orders_Controller::index'); // Admin orders page
$routes->get('/admin/orders/returns',               'Admin\Orders_Controller::load_orders_returns'); // Admin order returns page
$routes->get('/admin/orders/returns/details',       'Admin\Orders_Controller::load_orders_returns_single'); // Admin order returns details page
$routes->get('/admin/user/order',                   'Admin\Orders_Controller::load_single_order'); // Admin single order page
$routes->get('/admin/users/customers',              'Admin\User_Controller::load_customer'); // Admin customers page
$routes->get('/admin/users/vendors',                'Admin\User_Controller::load_vendor'); // Admin vendors page
$routes->get('/admin/users/staff',                  'Admin\User_Controller::load_staff'); // Admin staff page
$routes->get('/admin/users/staff/add',              'Admin\User_Controller::load_staff_add'); // Admin add staff page
$routes->get('/admin/users/staff/update',           'Admin\User_Controller::load_staff_update'); // Admin Staff Update page
$routes->get('/admin/banners',                      'Admin\Admin_Controller::banner'); // Admin banners page
$routes->get('/admin/banners/add',                  'Admin\Admin_Controller::banners_add'); // Admin add banners page
$routes->get('/admin/banners/update',               'Admin\Admin_Controller::banners_update'); // Admin update banners page
$routes->get('/admin/discounts/add',                'Admin\Admin_Controller::discounts_add'); // Admin add discounts page
$routes->get('/admin/discounts',                    'Admin\Admin_Controller::discounts_list'); // Admin discounts list page
$routes->get('/admin/promotion-card',               'Admin\Admin_Controller::promotion_card'); // Admin promotion card page
$routes->get('/admin/profile',                      'Admin\User_Controller::load_admon_profile'); // Admin Staff Update page
$routes->get('/admin/messages',                     'Admin\User_Controller::load_messages'); // Admin Test Update page
$routes->get('/admin/about',                        'Admin\Admin_Controller::load_about'); // Admin About page
$routes->get('/admin/taxes',                        'Admin\User_Controller::load_tax'); // Admin Taxes page
$routes->get('/admin/add/expart-review',            'Admin\User_Controller::load_add_expart_review'); // Admin Expart Review page
$routes->get('/admin/exparts-reviews',              'Admin\User_Controller::load_expart_review'); // Admin Expart Review page
$routes->get('/admin/reviews',                      'Admin\User_Controller::load_review'); // Admin Expart Review page






// Seller Routes 
$routes->get('/seller',                             'Seller\Seller_Controller::index'); // Seller index
$routes->get('/seller/login',                       'Seller\Seller_Controller::load_login'); // Seller load login page
$routes->get('/seller/logout',                      'Seller\Seller_Controller::logout'); // Seller logout page
$routes->post('/seller/login-action',               'Seller\Seller_Controller::handle_login'); // Seller action login
$routes->get('/seller/product/list',                'Seller\Seller_Controller::load_all_products'); // Seller Product
$routes->get('/seller/product/add',                 'Seller\Seller_Controller::load_add_products'); // Seller Product add
$routes->get('/seller/orders',                      'Seller\Seller_Controller::load_all_orders'); // Seller oders 
$routes->get('/seller/orders/returns',              'Seller\Seller_Controller::load_all_orders_returns'); // Seller oders  returns
$routes->get('/seller/order/details',               'Seller\Seller_Controller::load_single_order'); // single order page seller
$routes->get('/seller/product',                     'Seller\Seller_Controller::load_single_product'); // single product load
$routes->get('/seller/product/update',              'Seller\Seller_Controller::load_product_update'); // single product update
$routes->get('/seller/product/variant/add',         'Seller\Seller_Controller::load_product_variant_add'); // single product variant
$routes->get('/seller/orders/returns/details',      'Seller\Seller_Controller::load_order_return'); // single product variant





// Api Routes
$routes->get('/api',                                'Api\Api_Controller::index'); // API index
$routes->get('/api/categories/all',                 'Api\Category_Controller::GET_categories'); // Get all categories
$routes->get('/api/categories/single',              'Api\Category_Controller::GET_category_single'); // Get single category
$routes->get('/api/categories',                     'Api\Category_Controller::GET_category'); // Get categories
$routes->get('/api/category/product/list',          'Api\Category_Controller::GET_categories_list');
$routes->post('/api/category/add',                  'Api\Category_Controller::POST_add_category'); // Add category
$routes->post('/api/category/update',               'Api\Category_Controller::POST_update_category'); // Update category
$routes->post('/api/category/delete',               'Api\Category_Controller::POST_delete_category'); // Delete category
$routes->get('/api/category/by/id',                 'Api\Category_Controller::GET_a_category'); // Get a single category by id
$routes->get('/api/product',                        'Api\Product_Controller::GET_product'); // Get product
$routes->get('/api/letest-arrival/product',         'Api\Product_Controller::GET_letest_arrival_products'); // Get letest arrival product
$routes->get('/api/product/images',                 'Api\Product_Controller::GET_produt_images'); // Get product Images
$routes->post('/api/update/product/images',         'Api\Product_Controller::POST_update_product_images'); // Post product Images update
$routes->post('/api/update/product/description',    'Api\Product_Controller::POST_update_product_description'); // Post product Description update
$routes->post('/api/product/bulk/update',           'Api\Product_Controller::POST_product_bulk_update'); // Post product Bulk update

$routes->get('/api/search/product',                 'Api\Product_Controller::GET_search_products'); // Search product
$routes->post('/api/product/add',                   'Api\Product_Controller::POST_add_product'); // Add product
$routes->post('/api/product/bulk/add',              'Api\Product_Controller::POST_add_product_bulk'); // Add product
$routes->post('/api/product/update',                'Api\Product_Controller::POST_update_product'); // Update product
$routes->get('/api/product/delete',                 'Api\Product_Controller::GET_delete_product'); // delete product
$routes->get('/api/product/variant',                'Api\Product_Controller::GET_variation'); // Get product variant
$routes->get('/api/product/variant/options',        'Api\Product_Controller::GET_variation_options'); // Get product variant options
$routes->post('/api/product/variant/add',           'Api\Product_Controller::POST_add_new_variant'); // Add new product variant
$routes->get('/api/product/variant/delete',         'Api\Product_Controller::GET_delete_variant'); // Add new product variant
$routes->get('/api/product/variant/stock/update',   'Api\Product_Controller::GET_product_config_stock_update'); // Update product configuration stock
$routes->get('/api/product/stock/update',           'Api\Product_Controller::GET_product_stock_update'); // Update product stock
$routes->get('/api/user/id',                        'Api\Product_Controller::GET_user_id'); // Get user ID
$routes->get('/api/total/product',                  'Api\Product_Controller::GET_total_product'); // Get total product
$routes->get('/api/delete/product-img',             'Api\Product_Controller::GET_product_img_delete'); // Delete a product image
$routes->post('/api/user/update',                   'Api\User_Controller::POST_update_user'); // Update user
$routes->post('/api/user/billing-address/update',   'Api\User_Controller::POST_update_user_billing'); // Update user Billing
$routes->post('/api/user/address/update',           'Api\User_Controller::POST_update_user_address'); // Update user Address
$routes->get('/api/user/orders',                    'Api\Order_Controller::GET_user_orders'); // Get user orders
$routes->post('/api/change/password',               'Api\User_Controller::POST_change_password'); // Change user password
$routes->post('/api/message',                       'Api\User_Controller::POST_message'); // Send message
$routes->get('/api/all/messages',                   'Api\User_Controller::GET_message_all');  // GET all messages
$routes->get('/api/user',                           'Api\User_Controller::GET_get_user'); // Get user
$routes->get('/api/total/customer',                 'Api\User_Controller::GET_total_customer'); // Get total customer
$routes->get('/api/user/staff/',                    'Api\User_Controller::GET_staff'); // Get All Staff
$routes->get('/api/user/staff/access',              'Api\User_Controller::GET_staff_access'); // Get all access OR staff access
$routes->post('/api/user/staff/add',                'Api\User_Controller::POST_staff_add');  // Add staff access
$routes->post('/api/user/staff/update',             'Api\User_Controller::POST_staff_update');  // Update staff access
$routes->get('/api/user/staff/access/add',          'Api\User_Controller::GET_access_add');  // Get all access OR staff access
$routes->get('/api/user/staff/access/update',       'Api\User_Controller::GET_access_update');  // Get Update User Access 
$routes->get('/api/user/cart',                      'Api\Cart_Controller::GET_cart'); // Get user cart
$routes->post('/api/user/cart/add',                 'Api\Cart_Controller::POST_cart_add'); // Add item to cart
$routes->get('/api/user/cart/remove',               'Api\Cart_Controller::GET_cart_remove'); // Remove item from cart
$routes->get('/api/user/cart/empty',                'Api\Cart_Controller::GET_cart_empty'); // Empty cart
$routes->get('/api/user/cart/item/update',          'Api\Cart_Controller::GET_cart_item_update'); // Update cart item
$routes->get('/api/order',                          'Api\Order_Controller::GET_order_details'); // Get order details
$routes->post('/api/order/confirm',                 'Api\Order_Controller::POST_order_confirm'); // Confirm order
$routes->get('/api/order/cancel',                   'Api\Order_Controller::GET_order_cancel'); // Cancel order
$routes->get('/api/order/return',                   'Api\Order_Controller::GET_order_return_request'); // Request order return
$routes->get('/api/order/status/update',            'Api\Order_Controller::GET_order_status_update'); // Update order status
$routes->get('/api/order/item/status/update',       'Api\Order_Controller::GET_order_item_status_update'); // Update order item status
$routes->get('/api/order/returns/status/update',    'Api\Order_Controller::GET_order_return_status_update'); // Update order return status
$routes->get('/api/order/payment/status/update',    'Api\Order_Controller::GET_order_payment_status_update'); // Update order payment status
$routes->get('/api/order/returns',                  'Api\Order_Controller::GET_user_order_returns'); // Get user order returns
$routes->get('/api/prescription',                   'Api\Order_Controller::GET_user_prescription'); // Get user prescription

$routes->post('/api/banner/add',                    'Api\Banner_Controller::POST_add_banner'); // Add banner
$routes->get('/api/banners',                        'Api\Banner_Controller::GET_banners'); // Get banners
$routes->get('/api/banner/delete',                  'Api\Banner_Controller::GET_delete_banner'); // Delete banner
$routes->get('/api/banner/update',                  'Api\Banner_Controller::GET_update_banner'); // Update banner
$routes->post('/api/update/banner',                 'Api\Banner_Controller::POST_banner_update'); // Update banner
$routes->get('/api/about',                          'Api\Banner_Controller::GET_about'); // Get About
$routes->get('/api/taxes',                          'Api\Banner_Controller::GET_Taxes'); // Get About
$routes->post('/api/update/about',                  'Api\Banner_Controller::POST_about_update'); // POST Update About
$routes->post('/api/update/tax',                    'Api\Banner_Controller::POST_tax_update'); // POST Update Tax

$routes->get('/api/discounts',                      'Api\Product_Controller::GET_discounts_all'); // Get all discounts
$routes->get('/api/discounts/delete',               'Api\Product_Controller::GET_discounts_delete'); // Delete discounts
$routes->post('/api/discounts/add',                 'Api\Product_Controller::POST_discounts_add'); // Add discounts
$routes->get('/api/product-size/list',              'Api\Product_Controller::GET_product_size_lists'); // Get Product Size List

$routes->get('/api/customers',                      'Api\User_Controller::GET_customer'); // Get customers
$routes->get('/api/delete/customer',                'Api\User_Controller::GET_delete_customer'); // Delete customer
$routes->get('/api/promotion-card/update',          'Api\Banner_Controller::POST_update_promotion_card'); // Update promotion card
$routes->post('/api/update/promotion-card',         'Api\Banner_Controller::POST_promotion_card_update'); // Update promotion card
$routes->get('/api/orders',                         'Api\Order_Controller::GET_all_orders'); // Get all orders
$routes->get('/api/total/order',                    'Api\Order_Controller::GET_total_order'); // Get total order
$routes->get('/api/revenue',                        'Api\Order_Controller::GET_revenue'); // Get revenue
$routes->get('/api/seller',                         'Api\User_Controller::GET_a_seller');// Get a seller
$routes->get('/api/delete/seller',                  'Api\User_Controller::GET_seller_delete');// Seller Delete
$routes->post('/api/update/seller',                 'Api\User_Controller::POST_update_seller'); // Update seller
$routes->get('/api/get/admin',                      'Api\User_Controller::GET_get_admin');  // GET Admin Update
$routes->post('/api/update/admin',                   'Api\User_Controller::POST_update_admin');  // POST Admin Data
$routes->post('/api/change/admin/password',          'Api\User_Controller::POST_change_admin_password');  // POST Change Admin Password
$routes->post('/api/add/expart-review',             'Api\Product_Controller::POST_expart_review_add');
$routes->get('/api/exparts-review',                 'Api\Product_Controller::GET_expart_reviews');
$routes->post('/api/add/review',                    'Api\Product_Controller::POST_review_add'); // POST Update About
$routes->get('/api/reviews',                        'Api\Product_Controller::GET_reviews');
$routes->get('/api/reviews/status/update',          'Api\Product_Controller::GET_preview_status_update');
$routes->get('/api/delete/expart-review',           'Api\Product_Controller::GET_expart_review_delete');
$routes->get('/api/users/review',                   'Api\Product_Controller::GET_reviews_users');
$routes->post('/api/update/user/status',            'Api\User_Controller::POST_update_user_status'); // Update User Status

$routes->post('/api/product/add/bulk',              'Api\Product_Controller::POST_add_product_bulk'); // Add product

// SELLER SECTION
$routes->get('/api/best-selling',                   'Api\Product_Controller::GET_best_selling'); // Get best selling products
$routes->get('/api/best-selling/item',              'Api\Product_Controller::GET_best_selling_item'); // Get best selling products for a seller
$routes->get('/api/seller/product',                 'Api\Seller_Product_Controller::GET_seller_product'); // Get seller product
$routes->get('/api/seller/products',                'Api\Seller_Product_Controller::GET_total_product'); // Get total product
$routes->get('/api/seller/orders/total',            'Api\Seller_Product_Controller::GET_total_order'); // Get total order
$routes->get('/api/seller/orders',                  'Api\Order_Controller::GET_seller_order'); // Get all vendor order
$routes->get('/api/total/selling/item',             'Api\Order_Controller::GET_total_selling_item'); // Get total selling order
$routes->get('/api/seller/revenue',                 'Api\Order_Controller::GET_seller_revenue'); // Get seller revenue
$routes->get('/api/seller/order/returns',           'Api\Order_Controller::GET_seller_order_return_request'); // Get all vendor order
$routes->get('/api/seller/earning',                 'Api\Order_Controller::GET_seller_earning'); // Get all vendor order
$routes->get('/api/sellers',                        'Api\User_Controller::GET_seller_list');// Get all vendors
$routes->post('/api/seller/add',                    'Api\User_Controller::POST_add_new_seller');// Get all vendors


$routes->get('/api/get/social',                      'Api\User_Controller::GET_sociallink');
$routes->get('/api/get/notice',                      'Api\User_Controller::GET_noticebar');

$routes->post('/api/link/admin',                    'Api\User_Controller::POST_insert_sociallink');
$routes->post('/api/notice/admin',                  'Api\User_Controller::POST_insert_noticelink');

$routes->get('/api/get/admin/meta',                 'Api\User_Controller::GET_admin_meta');

// $routes->post('/tags/admin/save',                     'Api\Banner_Controller::POST_admin_tags');
$routes->post('/tags/frontend/save',                     'Api\Banner_Controller::POST_frontend_tags');

// $routes->get('/api/get/admintags',                     'Api\User_Controller::GET_admin_tags');
$routes->get('/api/get/frontendtags',                     'Api\User_Controller::GET_frontend_tags');

$routes->post('/product/get_size_chart',            'Api\User_Controller::GET_size_chart');



