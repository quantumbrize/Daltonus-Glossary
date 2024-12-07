<?php
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);
defined('FILE_READ_MODE') or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') or define('DIR_WRITE_MODE', 0755);
defined('FOPEN_READ') or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');
defined('EXIT_SUCCESS') or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('rest_controller_path') or define('rest_controller_path', 'libraries/RestController.php');
defined('DATA') or define('DATA', 'data');
defined('HTTP_STATUS') or define('HTTP_STATUS', 'http_status');
defined('key_status') or define('key_status', 'status');
defined('key_message') or define('key_message', 'message');
defined('key_data') or define('key_data', 'data');
defined('http_ok') or define('http_ok', 200);
defined('header_allow_origin') or define('header_allow_origin', 'Access-Control-Allow-Origin: *');
defined('header_allow_headers') or define('header_allow_headers', 'Access-Control-Allow-Headers: *');
defined('header_allow_methods') or define('header_allow_methods', "Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH");
defined('helper_form') or define('helper_form', 'form');
defined('helper_url') or define('helper_url', 'url');
defined('field_date') or define('field_date', 'Y-m-d');
defined('field_date_time') or define('field_date_time', 'Y-m-d H:i:s');
defined('field_location') or define('field_location', 'Asia/Kolkata');
/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR') || define('HOUR', 3600);
defined('DAY') || define('DAY', 86400);
defined('WEEK') || define('WEEK', 604800);
defined('MONTH') || define('MONTH', 2_592_000);
defined('YEAR') || define('YEAR', 31_536_000);
defined('DECADE') || define('DECADE', 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS') || define('EXIT_SUCCESS', 0);        // no errors
defined('EXIT_ERROR') || define('EXIT_ERROR', 1);          // generic error
defined('EXIT_CONFIG') || define('EXIT_CONFIG', 3);         // configuration error
defined('EXIT_UNKNOWN_FILE') || define('EXIT_UNKNOWN_FILE', 4);   // file not found
defined('EXIT_UNKNOWN_CLASS') || define('EXIT_UNKNOWN_CLASS', 5);  // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') || define('EXIT_USER_INPUT', 7);     // invalid user input
defined('EXIT_DATABASE') || define('EXIT_DATABASE', 8);       // database error
defined('EXIT__AUTO_MIN') || define('EXIT__AUTO_MIN', 9);      // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') || define('EXIT__AUTO_MAX', 125);    // highest automatically-assigned error code

define('EVENT_PRIORITY_LOW', 200);
define('EVENT_PRIORITY_NORMAL', 100);
define('EVENT_PRIORITY_HIGH', 10);




//////////////////////////////////////////////__URL
// defined('BASE_URL') || define('BASE_URL', 'https://daltonusstore.com/');
defined('BASE_URL') || define('BASE_URL', 'http://localhost/Daltonus-Glossary/');


//////////////////////////////////////////////__DATABASE
// defined('DB_TEST_hostname') || define('DB_TEST_hostname', 'localhost');
// defined('DB_TEST_username') || define('DB_TEST_username', 'u865002673_user');
// defined('DB_TEST_password') || define('DB_TEST_password', 'Rtw@1342AQ!');
// defined('DB_TEST_database') || define('DB_TEST_database', 'u865002673_database');
// defined('DB_TEST_DBDriver') || define('DB_TEST_DBDriver', 'MySQLi');

defined('DB_TEST_hostname') || define('DB_TEST_hostname', '103.92.235.18');
defined('DB_TEST_username') || define('DB_TEST_username', 'jungleef');
defined('DB_TEST_password') || define('DB_TEST_password', '!2maASwe@seQ');
defined('DB_TEST_database') || define('DB_TEST_database', 'jungleef_daltonus_glossery');
defined('DB_TEST_DBDriver') || define('DB_TEST_DBDriver', 'MySQLi');



//////////////////////////////////////////////__TABLE
defined('TABLE_USERS')              || define('TABLE_USERS',                'users');
defined('TABLE_OTP')                || define('TABLE_OTP',                  'otp');
defined('TABLE_CATEGORIES')         || define('TABLE_CATEGORIES',           'categories');
defined('TABLE_PRODUCT')            || define('TABLE_PRODUCT',              'product');
defined('TABLE_PRODUCT_METADETALS') || define('TABLE_PRODUCT_METADETALS',   'product_meta_detalis');
defined('TABLE_PRODUCT_ITEM')       || define('TABLE_PRODUCT_ITEM',         'product_item');
defined('TABLE_PRODUCT_CONFIG')     || define('TABLE_PRODUCT_CONFIG',       'product_config');
defined('TABLE_PRODUCT_IMAGE')      || define('TABLE_PRODUCT_IMAGE',        'product_images');
defined('TABLE_VARIATION')          || define('TABLE_VARIATION',            'variation');
defined('TABLE_VARIATION_OPTION')   || define('TABLE_VARIATION_OPTION',     'variation_option');
defined('TABLE_VENDOR')             || define('TABLE_VENDOR',               'vendor');
defined('TABLE_VARIANT_IMG')        || define('TABLE_VARIANT_IMG',          'variation_images');
defined('TABLE_CART')               || define('TABLE_CART',                 'user_cart');
defined('TABLE_DISCOUNTS')          || define('TABLE_DISCOUNTS',            'discounts');
defined('TABLE_PAYMENTS')           || define('TABLE_PAYMENTS',             'payments');
defined('TABLE_ORDERS')             || define('TABLE_ORDERS',               'orders');
defined('TABLE_ORDERS_ITEMS')       || define('TABLE_ORDERS_ITEMS',         'order_items');
defined('TABLE_ORDER_CANCEL')       || define('TABLE_ORDER_CANCEL',         'orders_cancelled');
defined('TABLE_ORDER_RETURN')       || define('TABLE_ORDER_RETURN',         'orders_return'); 
defined('TABLE_ACCESS')             || define('TABLE_ACCESS',               'access'); 
defined('TABLE_STAFF')              || define('TABLE_STAFF',                'staff'); 
defined('TABLE_STAFF_ACCESS')       || define('TABLE_STAFF_ACCESS',         'staff_access'); 
 


//////////////////////////////////////////////__UID_PRIFIX
defined('UID_USER')                 || define('UID_USER',           'USR');
defined('UID_OTP')                  || define('UID_OTP',            'OTP');
defined('UID_CATEGORY')             || define('UID_CATEGORY',       'CAT');
defined('UID_PRODUCT')              || define('UID_PRODUCT',        'PRO');
defined('UID_PRODUCT_ITEM')         || define('UID_PRODUCT_ITEM',   'PRI');
defined('UID_PRODUCT_META')         || define('UID_PRODUCT_META',   'PRM');
defined('UID_PRODUCT_IMG')          || define('UID_PRODUCT_IMG',    'PRG');
defined('UID_ADDRESS')              || define('UID_ADDRESS',        'ADRS');
defined('UID_USER_IMG')             || define('UID_USER_IMG',       'UIMG');
defined('UID_MESSAGE')              || define('UID_MESSAGE',        'MSG');
defined('UID_VAR_OPT')              || define('UID_VAR_OPT',        'VRO');
defined('UID_VAR_IMG')              || define('UID_VAR_IMG',        'VRI');
defined('UID_PRO_CONFIG')           || define('UID_PRO_CONFIG',     'PCON');
defined('UID_CART')                 || define('UID_CART',           'CRT');
defined('UID_BANNER')               || define('UID_BANNER',         'BNR');
defined('UID_DISCOUNTS')            || define('UID_DISCOUNTS',      'DIS');
defined('UID_ORDERS')               || define('UID_ORDERS',         'ORD');
defined('UID_ORDERS_ITEMS')         || define('UID_ORDERS_ITEMS',   'ORDI');
defined('UID_PAYMENTS')             || define('UID_PAYMENTS',       'PAY');
defined('UID_CANCEL')               || define('UID_CANCEL',         'ORDC');
defined('UID_RETURN')               || define('UID_RETURN',         'RTN');
defined('UID_ACCESS')               || define('UID_ACCESS',         'ACC');
defined('UID_STAFF')                || define('UID_STAFF',          'STF');
defined('UID_STAFF_ACCESS')         || define('UID_STAFF_ACCESS',   'STFA');
defined('UID_VENDOR')               || define('UID_VENDOR',         'VEN');




//////////////////////////////////////////////__STATUS
defined('STATUS_PENDING')           || define('STATUS_PENDING', 'pending');
defined('STATUS_ACTIVE')            || define('STATUS_ACTIVE', 'active');
defined('STATUS_DEACTIVE')          || define('STATUS_DEACTIVE', 'deactive');


//////////////////////////////////////////////__TYPE
defined('TYPE_USER')                || define('TYPE_USER', 'user');
defined('TYPE_ADMIN')               || define('TYPE_ADMIN', 'admin');
defined('TYPE_VENDOR')              || define('TYPE_VENDOR', 'vendor');



//////////////////////////////////////////////__SESSION
defined('SES_USER_USER_ID')         || define('SES_USER_USER_ID', 'USER_user_id');
defined('SES_USER_TYPE')            || define('SES_USER_TYPE', 'USER_user_type');
defined('SES_ADMIN_USER_ID')        || define('SES_ADMIN_USER_ID', 'ADMIN_user_id');
defined('SES_ADMIN_TYPE')           || define('SES_ADMIN_TYPE', 'ADMIN_user_type');
defined('SES_STAFF_USER_ID')        || define('SES_STAFF_USER_ID', 'STAFF_user_id');
defined('SES_STAFF_TYPE')           || define('SES_STAFF_TYPE', 'STAFF_user_type');
defined('SES_STAFF_ACCESS')         || define('SES_STAFF_ACCESS', 'STAFF_user_access');
defined('SES_SELLER_USER_ID')       || define('SES_SELLER_USER_ID', 'SELLER_user_id');
defined('SES_SELLER_ID')            || define('SES_SELLER_ID', 'SELLER_id');
defined('SES_SELLER_TYPE')          || define('SES_SELLER_TYPE', 'SELLER_user_type');
defined('SES_SELLER_ACCESS')        || define('SES_SELLER_ACCESS', 'SELLER_user_access');

//////////////////////////////////////////////__PATH
defined('PATH_PRODUCT_IMG')         || define('PATH_PRODUCT_IMG', ROOTPATH  . 'public/uploads/product_images');
defined('PATH_VARIANT_IMG')         || define('PATH_VARIANT_IMG', ROOTPATH  . 'public/uploads/variant_images');
defined('PATH_USER_IMG')            || define('PATH_USER_IMG', ROOTPATH  . 'public/uploads/user_images');
defined('PATH_CATEGORY_IMG')        || define('PATH_CATEGORY_IMG', ROOTPATH  . 'public/uploads/category_images');
defined('PATH_USER_DOC')            || define('PATH_USER_DOC', ROOTPATH  . 'public/uploads/user_documents');
defined('PATH_BANNER_IMG')          || define('PATH_BANNER_IMG', ROOTPATH  . 'public/uploads/banner_images');
defined('PATH_LOGO')                || define('PATH_LOGO', ROOTPATH  . 'public/uploads/logo');
defined('PATH_PROMOTION_CARD_IMG')  || define('PATH_PROMOTION_CARD_IMG', ROOTPATH  . 'public/uploads/promotion_card_images');

//////////////////////////////////////////////__SHIPPING_AUTH
defined('SHIPPING_KEY')                || define('SHIPPING_KEY', 'B1M6Se65GnWzaTZBRoEW7cDZQ4mxRa60VGRu8UxBB8OI26uybUg4uRkfWdpcWhl5crtprvkY4uvTim4UxkT0QXGbAZyvijh3KTWYqOE5G8yCzv3hRsmO1toFNFPh3IfHBzAbyHP6dB0p73i8nBxTmYQdjoJfNPiYnoGnUXfGrO7aoF3RXu7bWV5Zx55k1riqU3QLcUxWfJXm4w6W45shhthN5OPwEETwLtQifwElqnhhXejCpYPpHmDriEL7toJu');
defined('SHIPPING_USER_NAME')          || define('SHIPPING_USER_NAME', 'ela12031');
defined('ICARRY_API_URL')              || define('ICARRY_API_URL', 'https://www.icarry.in/');


//////////////////////////////////////////////__PAGEDATA
define(
    'PAGE_DATA_ADMIN',
    [
        'data_page' => [],
        'data_header' => [
            'header_link' => [],
            'title' => '',
            'header' => [],
            'sidebar' => [],
            'site' => 'admin'
        ],
        'data_footer' => [
            'footer_link' => [],
            'footer' => [],
            'site' => 'admin'
        ]
    ]
);

define(
    'PAGE_DATA_FRONTEND',
    [
        'data_page' => [],
        'data_header' => [
            'header_link' => [],
            'title' => '',
            'header' => [],
            'sidebar' => [],
            'site' => 'frontend'
        ],
        'data_footer' => [
            'footer_link' => [],
            'footer' => [],
            'site' => 'frontend'
        ]
    ]
);

define(
    'PAGE_DATA_SELLER',
    [
        'data_page' => [],
        'data_header' => [
            'header_link' => [],
            'title' => '',
            'header' => [],
            'sidebar' => [],
            'site' => 'seller'
        ],
        'data_footer' => [
            'footer_link' => [],
            'footer' => [],
            'site' => 'seller'
        ]
    ]
);
?>