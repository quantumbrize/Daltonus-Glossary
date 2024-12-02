<?php

namespace App\Controllers\Api;

use App\Models\UserCartModel;
use App\Models\VariantImagesModel;
use App\Models\CommonModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use App\Models\ProductItemModel;
use Config\Exceptions;
use App\Controllers\Api\Product_Controller;
use App\Models\ItemStocksModel;


class Cart_Controller extends Api_Controller
{
    public function index(): void
    {
        echo 'CART';
    }


    private function cart_add($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Cannot Add Item To Cart',
            'data' => null
        ];

        $cartData = [
            'uid' => $this->generate_uid(UID_CART),
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            'variation_id' => $data['variation_id'],
            'qty' => $data['qty'],
            'size' => $data['size'],
        ];

        $UserCartModel = new UserCartModel();
        try {

            $isAdded = $UserCartModel->insert($cartData);
            if ($isAdded) {
                $resp['status'] = true;
                $resp['message'] = 'Item Added To Cart';
                $resp['data'] = ['cart_id' => $cartData['uid']];

            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function cart($user_id)
    {
        $resp = [
            'status' => false,
            'message' => 'Cart Not Found',
            'data' => []
        ];
        $UserCartModel = new UserCartModel();

        try {

            // Selecting the cart with the specified User
            // $cart = $UserCartModel->where('user_id', $user_id)->findAll();
            $CommonModel = new CommonModel();
            $sql = "SELECT
                user_cart.uid as cart_id,
                user_cart.user_id,
                user_cart.product_id,
                user_cart.variation_id,
                user_cart.qty
            FROM
                user_cart
            WHERE 
                user_cart.user_id = '{$user_id}'";

            $cart = json_decode(json_encode($CommonModel->customQuery($sql)), true);
            // $this->prd($cart);
            if (count($cart) > 0) {
                // $Product_Controller = new Product_Controller();
                foreach ($cart as $index => $item) {
                    $product = $this->products_for_cart(['p_id' => $item['product_id'], 'config_id' => $item['variation_id']]);

                    // $this->prd($product);

                    $cart[$index]['product'] = $product['data'];
                    $cart[$index]['img_url'] = $product['img_url'] ? $product['img_url'] : '';
                }
                // die();

            }
            // Check if the cart exists
            if ($cart) {
                // Cart exists
                $resp['status'] = true;
                $resp['message'] = 'Cart Found';
                $resp['data'] = $cart;
            } else {
                $resp['status'] = false;
                $resp['message'] = 'Cart Is Empty';
                $resp['data'] = [];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }


        return $resp;
    }

    public function products_for_cart($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Product not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = '';
        if (!empty($data['config_id'])) {
            $sql = "SELECT
                product.uid AS product_id,
                product.name AS name,
                product.description AS description,
                product.status AS product_status,
                product.created_at AS created_at,
                product.uid,
                categories.name AS category,
                categories.uid AS category_id,
                product_item.uid AS product_item_id,
                product_item.price AS base_price,
                product_item.sku AS product_stock,
                product_item.discount AS base_discount,
                product_item.product_tags AS tags,
                product_item.publish_date AS publish_date,
                product_item.status AS status,
                product_item.visibility AS visibility,
                product_item.quantity,
                product_item.size_chart,
                product_item.tax,
                product_item.delivery_charge,
                product_item.manufacturer_brand AS manufacturer_brand,
                product_item.manufacturer_name AS manufacturer_name,
                product_config.uid AS product_config_id,
                product_config.created_at AS created_at,
                product_meta_detalis.uid AS meta_id,
                product_meta_detalis.meta_title,
                product_meta_detalis.meta_description,
                product_meta_detalis.meta_keywords,
                users.user_name AS vendor,
                vendor.uid AS vendor_id,
                GROUP_CONCAT(product_size_list.uid) AS size_list_id,
                GROUP_CONCAT(product_size_list.name) AS size_list_name,
                GROUP_CONCAT(product_size_list.size_list) AS size_list
            FROM
                product
            LEFT JOIN
                product_config ON product.uid = product_config.product_id
            LEFT JOIN
                product_item ON product.uid = product_item.product_id
            LEFT JOIN
                product_meta_detalis ON product.uid = product_meta_detalis.product_id
            LEFT JOIN 
                categories ON product.category_id = categories.uid
            LEFT JOIN
                vendor ON product.vendor_id = vendor.uid
            LEFT JOIN
                users ON vendor.user_id = users.uid
            LEFT JOIN
                product_size_list ON product.size_id = product_size_list.uid";

            if (!empty($data['config_id'])) {
                $config_id = $data['config_id'];
                $sql .= " WHERE
                    product_config.uid = '{$config_id}';";
            } else {
                $sql .= ";";
            }

            $products = $CommonModel->customQuery($sql);
            
            if (count($products) > 0) {
                $VariantImagesModel = new VariantImagesModel();
                foreach ($products as $key => $product) {
                    $products[$key]->product_img = $VariantImagesModel->where('config_id', $product->product_config_id)->findAll();
                }
                // Fetch product sizes (similar to products function)
                $ItemStocksModel = new ItemStocksModel();
                foreach ($products as $key => $product) {
                    $products[$key]->product_sizes = $ItemStocksModel->where('product_id', $product->product_id)->where('varient_id', '')->findAll();
                }

                $resp["status"] = true;
                $resp["data"] = !empty($data['config_id']) ? $products[0] : $products;
                $resp['img_url'] = '/public/uploads/variant_images/';
                $resp["message"] = 'Products Found';
            }
        } else {
            $sql = "SELECT
                product.uid AS product_id,
                product.name AS name,
                product.description AS description,
                product.created_at AS created_at,
                categories.name AS category,
                categories.uid AS category_id,
                product_item.uid AS product_item_id,
                product_item.price AS base_price,
                product_item.sku AS product_stock,
                product_item.discount AS base_discount,
                product_item.product_tags AS tags,
                product_item.publish_date AS publish_date,
                product_item.status AS status,
                product_item.visibility AS visibility,
                product_item.quantity,
                product_item.delivery_charge,
                product_item.tax,
                product_item.size_chart,
                product_item.manufacturer_brand AS manufacturer_brand,
                product_item.manufacturer_name AS manufacturer_name,
                product_meta_detalis.uid AS meta_id,
                product_meta_detalis.meta_title,
                product_meta_detalis.meta_description,
                product_meta_detalis.meta_keywords,
                users.user_name AS vendor,
                vendor.uid AS vendor_id,
                GROUP_CONCAT(product_size_list.uid) AS size_list_id,
                GROUP_CONCAT(product_size_list.name) AS size_list_name,
                GROUP_CONCAT(product_size_list.size_list) AS size_list
            FROM
                product
            LEFT JOIN
                product_item ON product.uid = product_item.product_id
            LEFT JOIN
                product_meta_detalis ON product.uid = product_meta_detalis.product_id
            LEFT JOIN 
                categories ON product.category_id = categories.uid
            LEFT JOIN
                vendor ON product.vendor_id = vendor.uid
            LEFT JOIN
                users ON vendor.user_id = users.uid
            LEFT JOIN
                product_size_list ON product.size_id = product_size_list.uid";

            if (!empty($data['p_id'])) {
                $p_id = $data['p_id'];
                $sql .= " WHERE
                    product.uid = '{$p_id}';";
            } else {
                $sql .= ";";
            }

            $products = $CommonModel->customQuery($sql);

            if (count($products) > 0) {
                $ProductImagesModel = new ProductImagesModel();
                foreach ($products as $key => $product) {
                    $products[$key]->product_img = $ProductImagesModel->where('product_id', $product->product_id)->findAll();
                }
                
                // Fetch product sizes (similar to products function)
                $ItemStocksModel = new ItemStocksModel();
                foreach ($products as $key => $product) {
                    $products[$key]->product_sizes = $ItemStocksModel->where('product_id', $product->product_id)->where('varient_id', '')->findAll();
                }

                $resp["status"] = true;
                $resp["data"] = !empty($data['p_id']) ? $products[0] : $products;
                $resp['img_url'] = 'public/uploads/product_images/';
                $resp["message"] = 'Products Found';
            }
        }
        
        return $resp;
    }


    private function cart_remove($cart_id)
    {
        $resp = [
            'status' => false,
            'message' => 'Failed to Remove Item',
        ];

        $UserCartModel = new UserCartModel();

        try {
            $deleted = $UserCartModel->where('uid', $cart_id)->delete();
            if ($deleted) {
                $resp['status'] = true;
                $resp['message'] = 'Item Removed Successfully';
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }



    private function cart_empty($user_id)
    {
        $resp = [
            'status' => false,
            'message' => 'Failed to Empty Cart'
        ];

        $UserCartModel = new UserCartModel();

        try {
            $deleted = $UserCartModel->where('user_id', $user_id)->delete();
            if ($deleted) {
                $resp['status'] = true;
                $resp['message'] = 'Cart Emptyed Successfully';
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }



    private function cart_item_update($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Failed Update Quantity'
        ];

        $UserCartModel = new UserCartModel();
        try {
            $cart = $UserCartModel->where('uid', $data['cart_id'])->first();
            if ($cart) {
                // Update the properties of the loaded record
                $cart['qty'] = $data['qty'];
                // Save the changes
                $UserCartModel->save($cart);
                $resp = [
                    'status' => true,
                    'message' => 'Quantity Updated'
                ];
            } else {
                $resp['message'] = 'Failed Update Quantity';
            }

        }catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }


        return $resp;

    }







    public function GET_cart()
    {
        $user_id = $this->request->getGet('user_id');

        $resp = $this->cart($user_id);
        return $this->response->setJSON($resp);
    }

    public function POST_cart_add()
    {
        $data = $this->request->getPost();

        $resp = $this->cart_add($data);
        return $this->response->setJSON($resp);

    }

    public function GET_cart_remove()
    {
        $cart_id = $this->request->getGet('cart_id');

        $resp = $this->cart_remove($cart_id);
        return $this->response->setJSON($resp);
    }


    public function GET_cart_empty()
    {
        $user_id = $this->request->getGet('user_id');

        $resp = $this->cart_empty($user_id);
        return $this->response->setJSON($resp);
    }


    public function GET_cart_item_update()
    {
        $data = $this->request->getGet();

        $resp = $this->cart_item_update($data);
        return $this->response->setJSON($resp);
    }




}