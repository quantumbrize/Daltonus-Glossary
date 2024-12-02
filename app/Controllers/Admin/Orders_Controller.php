<?php
namespace App\Controllers\Admin;

use App\Controllers\Admin\Admin_Controller;

class Orders_Controller extends Admin_Controller
{

    public function index(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['orders_css.php'],
                'title' => 'Orders',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['orders_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/orders', $data);
    }

    public function load_single_order()
    {

        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['order_single_css.php'],
                'title' => 'Order',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['order_single_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/order_single', $data);

    }

    public function load_orders_returns()
    {

        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['order_return_css.php'],
                'title' => 'Returns',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['order_return_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/order_return', $data);


    }


    public function load_orders_returns_single()
    {

        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['order_return_single_css.php'],
                'title' => 'Return Details',
                'header' => [],
                'sidebar' => ['orders' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['order_return_single_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/order_return_single', $data);


    }

}

?>