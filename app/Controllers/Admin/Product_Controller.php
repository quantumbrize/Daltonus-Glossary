<?php
namespace App\Controllers\Admin;
use App\Controllers\Admin\Admin_Controller;

class Product_Controller extends Admin_Controller{

    public function index(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['products_css.php'],
                'header_asset_link' => [
                    'assets_admin/libs/nouislider/nouislider.min.css',
                    'assets_admin/libs/gridjs/theme/mermaid.min.css',
                    'assets_admin/css/app.min.css',
                    'assets_admin/css/custom.min.css'
                ],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['products_js.php'],
                'footer_asset_link'=> [
                    'assets_admin/libs/nouislider/nouislider.min.js',
                    'assets_admin/libs/wnumb/wNumb.min.js',
                    'assets_admin/libs/gridjs/gridjs.umd.js',
                    'assets_admin/js/pages/ecommerce-product-list.init.js',
                ],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/products',$data);
    }

    
    public function load_product_add(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['products_add_css.php'],
                'header_asset_link' => [],
                'title' => 'Products | Add',
                'header' => [],
                'sidebar' => ['products'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['products_add_js.php'],
                'footer_asset_link'=> ['assets_admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/products_add',$data);
    }

    public function load_product_add_bulk(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['load_product_add_bulk_css.php'],
                'header_asset_link' => [],
                'title' => 'Products | Add',
                'header' => [],
                'sidebar' => ['products'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['load_product_add_bulk_js.php'],
                'footer_asset_link'=> [],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/load_product_add_bulk',$data);
    }

    public function load_product_bulk_edit(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['load_product_bulk_edit_css.php'],
                'header_asset_link' => [],
                'title' => 'Products | Edit',
                'header' => [],
                'sidebar' => ['products'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['load_product_bulk_edit_js.php'],
                'footer_asset_link'=> [],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/load_product_bulk_edit',$data);
    }


    public function load_single_product(){
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['product_single_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['product_single_js.php'],
                'footer_asset_link'=> [],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/product_single',$data);
    } 

    public function load_add_variants(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['product_variant_add_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['product_variant_add_js.php'],
                'footer_asset_link'=> [],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/product_variant_add',$data);

    }


    public function load_product_update(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['product_update_css.php'],
                'header_asset_link' => [],
                'title' => 'Products',
                'header' => [],
                'sidebar' => ['products'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['product_update_js.php'],
                'footer_asset_link'=> ['assets_admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];
        $this->isAuth('/admin/product_update',$data);
    }



}
