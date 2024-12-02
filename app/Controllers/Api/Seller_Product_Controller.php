<?php

namespace App\Controllers\Api;

use App\Models\ProductModel;
use App\Models\ProductItemModel;
use App\Models\ProductConfigModel;
use App\Models\ProductMetaDetalisModel;
use App\Models\CommonModel;
use App\Models\VendorModel;
use App\Models\ProductImagesModel;
use App\Models\VariationModel;
use App\Models\VariationOptionModel;
use App\Models\VariantImagesModel;
use App\Models\DiscountsModel;
use App\Models\OrdersModel;
use App\Models\OrderItemsModel;

class Seller_Product_Controller extends Api_Controller
{
     
    public function products($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Product not Found',
            'data' => null
        ];

        $vendor_id = $this->is_seller_logedin();
        // $VendorModel = new VendorModel();
        // $vendorRow = $VendorModel->where('user_id', $user_id)->first();
        // $vendor_id = !empty($vendorRow['uid']) ? $vendorRow['uid'] : '';

        // $this->prd($vendor_id);

        $CommonModel = new CommonModel();

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
            product_item.manufacturer_brand AS manufacturer_brand,
            product_item.manufacturer_name AS manufacturer_name,
            product_meta_detalis.uid AS meta_id,
            product_meta_detalis.meta_title,
            product_meta_detalis.meta_description,
            product_meta_detalis.meta_keywords,
            users.user_name AS vendor,
            vendor.uid AS vendor_id
        FROM
            product
        JOIN
            product_item ON product.uid = product_item.product_id
        JOIN
            product_meta_detalis ON product.uid = product_meta_detalis.product_id
        JOIN 
            categories ON product.category_id = categories.uid
        JOIN
            vendor ON product.vendor_id = vendor.uid
        JOIN
            users ON vendor.user_id = users.uid";

        $sql .= " WHERE
        product.vendor_id = '{$vendor_id}';";

        if (!empty($data['p_id'])) {
            $p_id = $data['p_id'];
            $sql .= " WHERE
                product.uid = '{$p_id}';";
        }else if(!empty($data['c_id'])){
            $c_id = $data['c_id'];
            $sql .= " WHERE
                product.category_id = '{$c_id}';";
        } else {
            $sql .= ";";
        }


        //$this->prd()

        $products = $CommonModel->customQuery($sql);

        if (count($products) > 0) {
            $ProductImagesModel = new ProductImagesModel();
            foreach ($products as $key => $product) {
                $products[$key]->product_img = $ProductImagesModel->where('product_id', $product->product_id)->findAll();
            }

            $resp["status"] = true;
            $resp["data"] = !empty($data['p_id']) ? $products[0] : $products;
            $resp["message"] = 'Products Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    private function best_selling()
    {
        $resp = [
            'status' => false,
            'message' => 'Orders not found',
            'data' => []
        ];

        try {
            
            $OrderItemsModel = new OrderItemsModel();
            $product = $OrderItemsModel
                    ->distinct()
                    ->select('product_id')
                    ->findAll();
            $all_product_qty = array();
            if (count($product) > 0) {
                $i=0;
                foreach ($product as $index => $item) {
                    $i++;
                    $quantity = $OrderItemsModel
                            ->select('product_id, qty, order_id, uid')
                            ->where('product_id', $item)
                            ->findAll();
                    $total_qty = 0;
                    foreach ($quantity as $index => $qty) {
                        $total_qty = $total_qty + $qty['qty'];
                    }
                    $all_product_qty[$i]['total_qty'] = $total_qty;
                    $all_product_qty[$i]['product_id'] = $item['product_id'];
                    
                }
                $totalQty = array();
                foreach ($all_product_qty as $key => $row) {
                    $totalQty[$key] = $row['total_qty'];
                }
                array_multisort($totalQty, SORT_DESC, $all_product_qty);

                
                foreach($all_product_qty as $index => $product_qty){
                    $product_data = $this->products(['p_id'=> $product_qty['product_id']]);
                    $all_product_qty[$index]['product_data'] =  $product_data['status']  == true ? $product_data['data'] : null;
                }

                $all_product_qty = json_decode(json_encode($all_product_qty), true);
                // $this->prd($all_product_qty);
            }


            if (count($all_product_qty) > 0) {
                $resp = [
                    'status' => true,
                    'message' => 'Orders found',
                    'data' => $all_product_qty
                ];
            }

        } catch (\Exception $e) {
            // Handle Any Error
            $resp['message'] = $e->getMessage();
        }



        return $resp;
    }

    private function total_product()
    {
        $resp = [
            'status' => false,
            'message' => 'no product found',
            'data' => 0
        ];

        $vendor_id = $this->is_seller_logedin();
        // $VendorModel = new VendorModel();
        // $vendorRow = $VendorModel->where('user_id', $user_id)->first();
        // $vendor_id = !empty($vendorRow['uid']) ? $vendorRow['uid'] : '';

        //  $this->prd($vendor_id);
        try {
            $ProductModel = new ProductModel();
            $totalProduct = $ProductModel->where('vendor_id', $vendor_id)->countAllResults();
            if (!empty($totalProduct)) {
                $resp = [
                    'status' => true,
                    'message' => 'Total product found',
                    'data' => $totalProduct
                ];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e;
        }
        return $resp;
    }

    private function total_order()
    {
        $resp = [
            'status' => false,
            'message' => 'no order found',
            'data' => 0
        ];
        try {
            $OrdersModel = new OrdersModel();
            $totalOrder = $OrdersModel->countAll();
            if (!empty($totalOrder)) {
                $resp = [
                    'status' => true,
                    'message' => 'Total order found',
                    'data' => $totalOrder
                ];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e;
        }
        return $resp;
    }






















    public function GET_seller_product()
    {
        $data = $this->request->getGet();

        $resp = $this->products($data);
        return $this->response->setJSON($resp);
    }

    public function GET_best_selling()
    {
        $resp = $this->best_selling();
        return $this->response->setJSON($resp);
    }

    public function GET_total_product()
    {
        $resp = $this->total_product();
        return $this->response->setJSON($resp);
    }

    public function GET_total_order()
    {
        $resp = $this->total_order();
        return $this->response->setJSON($resp);
    }
}
