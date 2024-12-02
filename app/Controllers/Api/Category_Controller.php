<?php

namespace App\Controllers\Api;

use App\Models\CategoriesModel;
use App\Models\CommonModel;

class Category_Controller extends Api_Controller
{
    public function index(): void
    {
        echo 'CATEGORY';
    }

    private function getCategoriesTree($parent_id)
    {
        $categoriesModel = new CategoriesModel();
        $categories = $parent_id == null ? $categoriesModel->findAll() : $categoriesModel->where('parent_id', $parent_id)->findAll();

        $result = [];

        foreach ($categories as $category) {

            $subcategories = $this->getCategoriesTree($category['uid']);

            // Include only top-level categories that have subcategories
            if ($parent_id === null && !empty($subcategories)) {
                $result[] = [
                    'uid' => $category['uid'],
                    'name' => $category['name'],
                    'subCategories' => $subcategories,
                ];
            } else if ($parent_id !== null) {
                $result[] = [
                    'uid' => $category['uid'],
                    'name' => $category['name'],
                    'subCategories' => $subcategories,
                ];
            }
        }

        return $result;
    }



    private function getCategory($parent_id = null)
    {
        $categoriesModel = new CategoriesModel();
        $categories = $parent_id == null ? $categoriesModel->where('parent_id', 'null')->findAll() : $categoriesModel->where('parent_id', $parent_id)->findAll();
        return $categories;
    }

    private function addCategory($parent_id, $category_name)
    {   
        $uploadedFiles = $this->request->getFiles();

        $data = [
            'uid' => $this->generate_uid(UID_CATEGORY),
            'name' => $category_name,
            'parent_id' => !empty($parent_id) ? $parent_id : '',
            'img_path' => $this->single_upload($uploadedFiles['images'][0], PATH_CATEGORY_IMG)
        ];
        $categoriesModel = new CategoriesModel();
        $add = $categoriesModel->insert($data);
        if ($add) {
            return $data;
        } else {
            return $data;
        }
    }

    private function deleteCategory($category_id)
    {


        $categoriesModel = new CategoriesModel();
        $categoriesModel->where('parent_id', $category_id)->delete();
        $deleted = $categoriesModel->where('uid', $category_id)->delete();

        return $deleted;

    }


    private function updateCategory($category_id, $name)
    {

        $categoriesModel = new CategoriesModel();
        $category = $categoriesModel->where('uid', $category_id)->first();
        if ($category) {
            $uploadedFiles = $this->request->getFiles();
            if(!empty($uploadedFiles['images'][0])){
                $category['img_path'] = $this->single_upload($uploadedFiles['images'][0], PATH_CATEGORY_IMG);
            }
            // Update the properties of the loaded record
            $category['name'] = $name;
            // Save the changes
            $categoriesModel->save($category);
            return true;
        } else {
            return false;
        }
    }

    public function getCategorySingle()
    {
        $categoriesModel = new CategoriesModel();
        $category = $categoriesModel->whereNotIn('parent_id', ['null'])->findAll();
        return $category;
    }

    public function extractNamesAndUids($data)
    {
        $result = [];
        foreach ($data as $item) {
            $result[] = ['uid' => $item['uid'], 'name' => $item['name']];
            if (!empty($item['subCategories'])) {
                $result = array_merge($result, $this->extractNamesAndUids($item['subCategories']));
            }
        }
        return $result;
    }


    public function categories_list($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Products Not Found',
            'data' => []
        ];

        try {

            $Product_Controller = new Product_Controller();
            if (empty($data['c_id'])) {
                $allProduct = $Product_Controller->products([]);
                $resp['status'] = !empty($allProduct['data']);
                $resp['data'] = !empty($allProduct['data']) ? $allProduct['data'] : [];
                $resp['message'] = !empty($allProduct['data']) ? 'Products Found' : 'Products Not Found';
            } else {
                $cat_tree = $this->getCategoriesTree($data['c_id']);
                $products = [];
                if (empty($cat_tree)) {
                    $pro = $Product_Controller->products(['c_id' => $data['c_id']]);
                    if (!empty($pro['data'])) {
                        $products = $pro['data'];
                    }
                } else {

                    $categorys = $this->extractNamesAndUids($cat_tree);
                    
                    if (!empty($categorys)) {
                        foreach ($categorys as $index => $item) {
                            $data = $Product_Controller->products(['c_id' => $item['uid']]);
                            if (!empty($data['data'])) {
                                $products = $data['data'];
                            }
                        }
                    }
                }
                //$this->prd($cat_tree);
                $resp['status'] = !empty($products);
                $resp['data'] = !empty($products) ? $products : [];
                $resp['message'] = !empty($products) ? 'Products Found' : 'Products Not Found';
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function getACategory($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Category Not Found',
            'data' => []
        ];
        if (!empty($data['c_id'])) {
            $categoriesModel = new CategoriesModel();
            $categories = $categoriesModel->where('uid', $data['c_id'])->first();
            $resp = [
                'status' => true,
                'message' => 'Category Found',
                'data' => $categories,
            ];
        }

        return $resp;
    }





























    public function POST_delete_category()
    {
        $category_id = $this->request->getPost('category_id');
        $delete = $this->deleteCategory($category_id);
        $response = [
            'status' => $delete,
            'message' => $delete ? 'categories deletd' : 'categories not deletd',
        ];
        return $this->response->setJSON($response);
    }



    public function POST_add_category()
    {
        $parent_id = !empty($this->request->getPost('parent_id')) ? $this->request->getPost('parent_id') : null;
        $category_name = !empty($this->request->getPost('category_name')) ? $this->request->getPost('category_name') : null;
        $addData = $this->addCategory($parent_id, $category_name);
        $response = [
            'status' => !empty($addData),
            'message' => !empty($addData) ? 'categories added' : 'categories not added',
            'data' => $addData
        ];
        return $this->response->setJSON($response);
    }

    public function POST_update_category()
    {
        $category_id = $this->request->getPost('category_id');
        $name = $this->request->getPost('name');
        $update = $this->updateCategory($category_id, $name);
        $response = [
            'status' => $update,
            'message' => $update ? 'categories updated' : 'categories not updated',
        ];
        return $this->response->setJSON($response);
    }


    public function GET_category()
    {
        $parent_id = !empty($this->request->getGet('parent_id')) ? $this->request->getGet('parent_id') : null;
        $category = $this->getCategory($parent_id);
        $response = [
            'status' => !empty($category),
            'message' => !empty($category) ? 'categories found' : 'categories not found',
            'data' => !empty($category) ? $category : null
        ];
        return $this->response->setJSON($response);
    }

    public function GET_categories()
    {

        $visited = [];
        $categoriesTree = $this->getCategoriesTree(null);
        $response = [
            'status' => !empty($categoriesTree),
            'message' => !empty($categoriesTree) ? 'categories found' : 'categories not found',
            'data' => !empty($categoriesTree) ? $categoriesTree : null
        ];
        $CommonModel = new CommonModel();
        $data = $CommonModel->customQuery('SELECT * FROM `categories`');
        return $this->response->setJSON($response);
    }

    public function GET_category_single(){

        $category = $this->getCategorySingle();
        $response = [
            'status' => !empty($category),
            'message' => !empty($category) ? 'categories found' : 'categories not found',
            'data' => !empty($category) ? $category : null
        ];
        return $this->response->setJSON($response);
    }

    public function GET_a_category()
    {

        $data = $this->request->getGet();
        $resp = $this->getACategory($data);
        return $this->response->setJSON($resp);

    }

    public function GET_categories_list()
    {

        $data = $this->request->getGet();
        $resp = $this->categories_list($data);
        return $this->response->setJSON($resp);

    }


}