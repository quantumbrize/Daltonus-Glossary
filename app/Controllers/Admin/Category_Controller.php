<?php
namespace App\Controllers\Admin;
use App\Controllers\Admin\Admin_Controller;

class Category_Controller extends Admin_Controller{

    public function index(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['categories_css.php'],
                'title' => 'Categories',
                'header' => [],
                'sidebar' => ['categories'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['categories_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/categories',$data);
    }

    

 


}

?>