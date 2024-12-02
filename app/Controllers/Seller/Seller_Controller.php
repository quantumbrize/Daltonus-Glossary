<?php

namespace App\Controllers\Seller;

use App\Controllers\Main_Controller;
use App\Models\UsersModel;
use App\Models\StaffAccessModel;
use App\Models\AccessModel;
use App\Models\StaffModel;
use App\Models\VendorModel;

class Seller_Controller extends Main_Controller
{
    public function index(): void
    {
        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['dashboard_css.php'],
                'header_asset_link' => [
                    'assets_admin/libs/jsvectormap/css/jsvectormap.min.css',
                    'assets_admin/libs/swiper/swiper-bundle.min.css'
                ],
                'title' => 'Dashboard',
                'header' => [],
                'sidebar' => ['dashboard' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['dashboard_js.php'],
                'footer_asset_link' => [
                    'assets_admin/libs/apexcharts/apexcharts.min.js',
                    'assets_admin/libs/jsvectormap/js/jsvectormap.min.js',
                    'assets_admin/libs/jsvectormap/maps/world-merc.js',
                    'assets_admin/libs/swiper/swiper-bundle.min.js',
                    'assets_admin/js/pages/dashboard-ecommerce.init.js'
                ],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/dashboard', $data);
    }

    public function isAuth($page, $data)
    {
        $session = \Config\Services::session();
        if (empty($session->get(SES_SELLER_USER_ID))) {
            return $this->load_login();
        } else {
            $this->load_page($page, $data);
        }
    }
    public function load_login(): void
    {
        echo view('seller/login');
    }


    public function logout()
    {
        $session = \Config\Services::session();

        $session->remove(SES_SELLER_USER_ID);
        $session->remove(SES_SELLER_ID);
        $session->remove(SES_SELLER_TYPE);
        $session->remove(SES_SELLER_ACCESS);

        return redirect()->to('seller/login');

    }


    public function handle_login()
    {
        $response = [
            "status" => false,
            "message" => "user not found"
        ];

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $UsersModel = new UsersModel();
        $UsersData = $UsersModel
            ->where('password', md5($password))
            ->where('email', $email)
            ->where('type', 'seller')
            ->where('status', 'active')
            ->get()
            ->getResultArray();
        $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;

        if (!empty($UsersData)) {
            $response["status"] = true;
            $VendorModel = new VendorModel();
            $vendor_data = $VendorModel->select('uid')->where('user_id', $UsersData['uid'])->find();
            $vendor_id = $vendor_data[0]['uid'];
            $session = \Config\Services::session();
            $session->set(SES_SELLER_ID, $vendor_id);
            $session->set(SES_SELLER_USER_ID, $UsersData['uid']);
            $session->set(SES_SELLER_TYPE, $UsersData['type']);
            $response["message"] = "Seller Found";

        }
        echo json_encode($response);

    }

    public function load_all_products()
    {

        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['products_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['products_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/products', $data);

    }

    public function load_add_products()
    {
        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['products_add_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['products_add_js.php'],
                'footer_asset_link' => ['assets_admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js'],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/products_add', $data);

    }


    public function load_all_orders()
    {

        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['orders_css.php'],
                'header_asset_link' => [],
                'title' => 'Orders',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['orders_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/orders', $data);



    }


    public function load_all_orders_returns()
    {

        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['returns_css.php'],
                'header_asset_link' => [],
                'title' => 'Orders',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['returns_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/returns', $data);

    }

    public function load_single_order()
    {

        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['order_single_css.php'],
                'title' => 'Order',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['order_single_js.php'],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/order_single', $data);

    }

    public function load_single_product()
    {

        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['product_single_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['product_single_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/product_single', $data);

    }

    public function load_product_update()
    {
        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['product_update_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['product_update_js.php'],
                'footer_asset_link' => ['assets_admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js'],
                'footer' => [],
                'site' => 'seller'
            ]
        ];
        $this->isAuth('/seller/product_update', $data);
    }

    public function load_product_variant_add()
    {

        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['product_variant_add_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['product_variant_add_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/product_variant_add', $data);

    }

    public function load_order_return()
    {

        $data = PAGE_DATA_SELLER;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['order_return_single_css.php'],
                'title' => 'Return Details',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'seller'
            ],
            'data_footer' => [
                'footer_link' => ['order_return_single_js.php'],
                'footer' => [],
                'site' => 'seller'
            ]
        ];

        $this->isAuth('/seller/order_return_single', $data);

    }



}


?>