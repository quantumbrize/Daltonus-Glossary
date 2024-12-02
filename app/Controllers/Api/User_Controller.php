<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CommonModel;
use App\Models\UsersModel;
use App\Models\UserImageModel;
use App\Models\AddressModel;
use App\Models\MessageModel;
use App\Models\AccessModel;
use App\Models\StaffAccessModel;
use App\Models\StaffModel;
use App\Models\VendorModel;
use App\Models\NoticebarModel;
use App\Models\SociallinkModel;
use App\Models\AboutModel;
use App\Models\AdmintagModel;
use App\Models\FrontendtagModel;
use App\Models\ProductModel;


class User_Controller extends Api_Controller
{
    public function __construct()
    {
        // Load session library
        $this->session = \Config\Services::session();
    }

    // private function update_user($data)
    // {

    //     $resp = [
    //         'status' => false,
    //         'message' => 'Faild!',
    //         'data' => null
    //     ];

    //     if (empty($data['name'])) {
    //         $resp['message'] = 'Please Enter Name';
    //     } else if (empty($data['number'])) {
    //         $resp['message'] = 'Please Enter Number';
    //     } else if (empty($data['email'])) {
    //         $resp['message'] = 'Please Enter Email';
    //     } else {

    //         $user_data = [
    //             'user_name' => $data['name'],
    //             'number' => $data['number'],
    //             'email' => $data['email'],
    //         ];
    //         $UserModel = new UsersModel();
    //         $UserModel->transStart();
    //         try {
    //             $UserModel
    //                 ->where('uid', $data['user_id'])
    //                 ->set($user_data)
    //                 ->update();
    //             $UserModel->transCommit();
    //         } catch (\Exception $e) {
    //             $UserModel->transRollback();
    //             throw $e;
    //         }

    //         $update_address_data = [
    //             'city' => $data['city'],
    //             'country' => $data['country'],
    //             'zipcode' => $data['zip'],
    //             'district' => $data['district'],
    //             'state' => $data['state'],
    //             'locality' => $data['locality'],
    //             'is_primary' => 'primary',
    //         ];

    //         $add_address_data = [
    //             'uid' => $this->generate_uid(UID_ADDRESS),
    //             'user_id' => $data['user_id'],
    //             'city' => $data['city'],
    //             'country' => $data['country'],
    //             'zipcode' => $data['zip'],
    //             'district' => $data['district'],
    //             'state' => $data['state'],
    //             'locality' => $data['locality'],
    //             'is_primary' => 'primary',
    //         ];

    //         $UserAddressModel = new AddressModel();
    //         $AddressData = $UserAddressModel
    //             ->where('user_id', $data['user_id'])
    //             ->where('is_primary', 'primary')
    //             ->get()
    //             ->getResultArray();
    //         $UserAddressData = !empty($AddressData[0]) ? $AddressData[0] : null;
    //         $UserAddressModel->transStart();
    //         try {
    //             if (!empty($UserAddressData)) {
    //                 $UserAddressModel
    //                     ->where('user_id', $data['user_id'])
    //                     ->where('is_primary', 'primary')
    //                     ->set($update_address_data)
    //                     ->update();
    //             } else {
    //                 $UserAddressModel->insert($add_address_data);
    //             }
    //             $UserAddressModel->transCommit();
    //         } catch (\Exception $e) {
    //             $UserAddressModel->transRollback();
    //             throw $e;
    //         }

    //         $uploadedFiles = $this->request->getFiles();
    //         // $this->prd($uploadedFiles);
    //         if (!empty($uploadedFiles['images'])) {
    //             $UserImagesModel = new UserImageModel();
    //             $UsersData = $UserImagesModel
    //                 ->where('user_id', $data['user_id'])
    //                 ->get()
    //                 ->getResultArray();
    //             $UserImageData = !empty($UsersData[0]) ? $UsersData[0] : null;
    //             foreach ($uploadedFiles['images'] as $file) {
    //                 $file_src = $this->single_upload($file, PATH_USER_IMG);
    //                 $UserImagesModel->transStart();
    //                 try {
    //                     if (!empty($UserImageData)) {
    //                         $user_image_data = [
    //                             'img' => $file_src,
    //                         ];
    //                         $UserImagesModel
    //                             ->where('user_id', $data['user_id'])
    //                             ->set($user_image_data)
    //                             ->update();
    //                     } else {
    //                         $user_image_data = [
    //                             'uid' => $this->generate_uid(UID_USER_IMG),
    //                             'user_id' => $data['user_id'],
    //                             'img' => $file_src,
    //                         ];
    //                         $UserImagesModel->insert($user_image_data);
    //                     }
    //                     $UserImagesModel->transCommit();
    //                 } catch (\Exception $e) {
    //                     $UserImagesModel->transRollback();
    //                     throw $e;
    //                 }

    //             }
    //         }
    //         $resp['status'] = true;
    //         $resp['message'] = 'Update Successful';
    //         $resp['data'] = ['user_id' => $data['user_id']];
    //     }
    //     return $resp;
    // }

    private function update_user($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];

        if (empty($data['name'])) {
            $resp['message'] = 'Please Enter Name';
        } else if (empty($data['number'])) {
            $resp['message'] = 'Please Enter Number';
        } else if (empty($data['email'])) {
            $resp['message'] = 'Please Enter Email';
        } else {

            $user_data = [
                'user_name' => $data['name'],
                'email' => $data['email'],
            ];
            $UserModel = new UsersModel();
            $UserModel->transStart();
            try {
                $UserModel
                    ->where('uid', $data['user_id'])
                    ->set($user_data)
                    ->update();
                $UserModel->transCommit();
            } catch (\Exception $e) {
                $UserModel->transRollback();
                throw $e;
            }

            $uploadedFiles = $this->request->getFiles();
            // $this->prd($uploadedFiles);
            if (!empty($uploadedFiles['images'])) {
                $UserImagesModel = new UserImageModel();
                $UsersData = $UserImagesModel
                    ->where('user_id', $data['user_id'])
                    ->get()
                    ->getResultArray();
                $UserImageData = !empty($UsersData[0]) ? $UsersData[0] : null;
                foreach ($uploadedFiles['images'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_IMG);
                    $UserImagesModel->transStart();
                    try {
                        if (!empty($UserImageData)) {
                            $user_image_data = [
                                'img' => $file_src,
                            ];
                            $UserImagesModel
                                ->where('user_id', $data['user_id'])
                                ->set($user_image_data)
                                ->update();
                        } else {
                            $user_image_data = [
                                'uid' => $this->generate_uid(UID_USER_IMG),
                                'user_id' => $data['user_id'],
                                'img' => $file_src,
                            ];
                            $UserImagesModel->insert($user_image_data);
                        }
                        $UserImagesModel->transCommit();
                    } catch (\Exception $e) {
                        $UserImagesModel->transRollback();
                        throw $e;
                    }

                }
            }
            $resp['status'] = true;
            $resp['message'] = 'Update Successful';
            $resp['data'] = ['user_id' => $data['user_id']];
        }
        return $resp;
    }

    private function change_password($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Password Changed Faild!',
            'data' => null
        ];

        if (empty($data['old_password'])) {
            $resp['message'] = 'Please Enter Old Password';
        } else if (empty($data['new_password'])) {
            $resp['message'] = 'Please Enter New Password';
        } else if (empty($data['confirm_password'])) {
            $resp['message'] = 'Please Enter Confirm Password';
        } else {

            $UserModel = new UsersModel();
            $UsersData = $UserModel
                ->where('uid', $data['user_id'])
                ->where('password', md5($data['old_password']))
                ->where('type', 'user')
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
            if (!empty($UsersData)) {
                $UserModel->transStart();
                try {
                    $UserModel
                        ->where('uid', $data['user_id'])
                        ->set(['password' => md5($data['new_password'])])
                        ->update();
                    $UserModel->transCommit();
                } catch (\Exception $e) {
                    $UserModel->transRollback();
                    throw $e;
                }
                $resp['status'] = true;
                $resp['message'] = 'Password Changed Successfully';
                $resp['data'] = "";
            } else {
                $resp['message'] = 'Old password did not match!';
            }
        }
        return $resp;
    }

    private function message($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];

        if (empty($data['name'])) {
            $resp['message'] = 'Please Enter Name';
        } else if (empty($data['email'])) {
            $resp['message'] = 'Please Enter Email';
        } else if (empty($data['phone'])) {
            $resp['message'] = 'Please Enter Phone No.';
        } else if (empty($data['subject'])) {
            $resp['message'] = 'Please Enter Subject';
        } else if (empty($data['message'])) {
            $resp['message'] = 'Please Enter Message';
        } else {
            $insert_message = [
                'uid' => $this->generate_uid(UID_MESSAGE),
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'subject' => $data['subject'],
                'message' => $data['message'],
            ];
            $MessageModel = new MessageModel();
            $MessageModel->transStart();
            try {
                $messageData = $MessageModel->insert($insert_message);
                $MessageModel->transCommit();
            } catch (\Exception $e) {
                $MessageModel->transRollback();
                throw $e;
            }

            if ($messageData) {
                $resp['status'] = true;
                $resp['message'] = 'Message Submit Successful';
                $resp['data'] = "";
            }

        }
        return $resp;
    }

    private function get_user()
    {
        $user_id = $this->is_logedin();
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if (!empty($user_id)) {
            $UsersModel = new UsersModel();
            $UsersData = $UsersModel
                ->where('uid', $user_id)
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;

            $UserAddressModel = new AddressModel();
            $AddressData = $UserAddressModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $AddressData = !empty($AddressData[0]) ? $AddressData[0] : null;

            $AllAddressData = $UserAddressModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $AllAddressData = !empty($AllAddressData) ? $AllAddressData : null;

            $UserImageModel = new UserImageModel();
            $ImageData = $UserImageModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $ImageData = !empty($ImageData[0]) ? $ImageData[0] : null;
            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "user_id" => $user_id,
                "user_data" => $UsersData,
                "address" => $AddressData,
                "user_img" => $ImageData,
                "all_address" => $AllAddressData,
            ];
        }
        return $resp;
    }

    private function get_admin($data)
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if (!empty($data['user_id'])) {
            $UsersModel = new UsersModel();
            $UsersData = $UsersModel
                ->where('uid', $data['user_id'])
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
            $UsersImageData = '';
            if($UsersData && $UsersData['type'] == 'staff'){
                $UserImageModel = new UserImageModel();
                $UsersImageData = $UserImageModel
                ->where('user_id', $data['user_id'])
                ->get()
                ->getResultArray();
            $UsersImageData = !empty($UsersImageData[0]) ? $UsersImageData[0] : null;
            }
            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "user_data" => $UsersData,
                "user_image" => $UsersImageData,
            ];
        } else {
            $resp = [
                "user_data" => $data['user_id'],];
        }
        return $resp;
    }

    private function update_admin($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];

        if (empty($data['nameInput'])) {
            $resp['message'] = 'Please Enter Name';
        } else if (empty($data['emailInput'])) {
            $resp['message'] = 'Please Enter Number';
        } else if (empty($data['phonenumberInput'])) {
            $resp['message'] = 'Please Enter Email';
        } else if (empty($data['user_id'])) {
            $resp['message'] = 'User Not Found';
        } else {

            $user_data = [
                'user_name' => $data['nameInput'],
                'email' => $data['emailInput'],
                'number' => $data['phonenumberInput'],
            ];
            $UserModel = new UsersModel();
            $UserModel->transStart();
            try {
                $UserModel
                    ->where('uid', $data['user_id'])
                    ->set($user_data)
                    ->update();
                $UserModel->transCommit();
            } catch (\Exception $e) {
                $UserModel->transRollback();
                throw $e;
            }
            $resp['status'] = true;
            $resp['message'] = 'Update Successful';
            $resp['data'] = ['user_id' => $data['user_id']];
        }
        return $resp;
    }

    private function change_admin_password($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Password Changed Faild!',
            'data' => null
        ];

        if (empty($data['old_password'])) {
            $resp['message'] = 'Please Enter Old Password';
        } else if (empty($data['new_password'])) {
            $resp['message'] = 'Please Enter New Password';
        } else if (empty($data['confirm_password'])) {
            $resp['message'] = 'Please Enter Confirm Password';
        } else {
            $UserModel = new UsersModel();
            $UsersData = $UserModel
                ->where('uid', $data['user_id'])
                ->where('password', md5($data['old_password']))
                ->where('type', 'admin')
                ->orWhere('type', 'staff')
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
            if (!empty($UsersData) || $UsersData != null) {
                $UserModel->transStart();
                try {
                    $UserModel
                        ->where('uid', $data['user_id'])
                        ->set(['password' => md5($data['new_password'])])
                        ->update();
                    $updated = $UserModel->transCommit();
                    if($updated){
                        $resp['status'] = true;
                        $resp['message'] = 'Password Changed Successfully';
                        $resp['data'] = "";
                    }
                } catch (\Exception $e) {
                    $UserModel->transRollback();
                    throw $e;
                }
                
            } else {
                $resp['message'] = 'Old password did not match!';
            }
        }
        return $resp;
    }

    private function customer($user_id)
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if (!empty($user_id)) {
            $UsersModel = new UsersModel();
            $UsersData = $UsersModel
                ->where('uid', $user_id)
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;

            $UserAddressModel = new AddressModel();
            $AddressData = $UserAddressModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $AddressData = !empty($AddressData[0]) ? $AddressData[0] : null;

            $AllAddressData = $UserAddressModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $AllAddressData = !empty($AllAddressData) ? $AllAddressData : null;

            $UserImageModel = new UserImageModel();
            $ImageData = $UserImageModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $ImageData = !empty($ImageData[0]) ? $ImageData[0] : null;
            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "user_id" => $user_id,
                "user_data" => $UsersData,
                "address" => $AddressData,
                "user_img" => $ImageData,
                "all_address" => $AllAddressData,
            ];
        } else {
            $UsersModel = new UsersModel();
            $users = $UsersModel->where('type', 'user')->findAll();
            if (count($users) > 0) {
                $UserImageModel = new UserImageModel();
                foreach ($users as $index => $user) {
                    $img = $UserImageModel->where('user_id', $user['uid'])->first();
                    $users[$index]['user_img'] = $img;
                }

            }
            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "user_data" => $users,
            ];
        }
        return $resp;
    }

    private function delete_customer($data)
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if ($data) {
            $UserModel = new UsersModel();
            $UserModel->transStart();
            try {
                $UserModel
                    ->where('uid', $data['user_id'])
                    ->set(['status' => 'deleted'])
                    ->update();
                $UserModel->transCommit();
            } catch (\Exception $e) {
                $UserModel->transRollback();
                throw $e;
            }
            $resp = [
                "status" => true,
                "message" => "Data Deleted",
                "user_data" => ""
            ];
        }
        return $resp;
    }

    private function total_customer()
    {
        $resp = [
            'status' => false,
            'message' => 'no customer found',
            'data' => 0
        ];
        try {
            $UsersModel = new UsersModel();
            $totalUsers = $UsersModel->where('type', 'user')->countAllResults();
            if (!empty($totalUsers)) {
                $resp = [
                    'status' => true,
                    'message' => 'Total customers found',
                    'data' => $totalUsers
                ];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e;
        }
        return $resp;
    }

    private function staff_access($data)
    {
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => []
        ];


        try {
            $AccessModel = new AccessModel();
            if (empty($data['staff_id'])) {
                $allAccess = $AccessModel->findAll();
                if ($allAccess) {
                    $resp['status'] = true;
                    $resp['message'] = "All access data retrieved";
                    $resp['data'] = $allAccess;
                } else {
                    // If no access data found at all
                    $resp['message'] = "No access data found";
                }
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }
        return $resp;
    }
    private function access_add($data)
    {
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => []
        ];
        try {
            $AccessModel = new AccessModel();
            // Generating a UID for the access
            $uid = $this->generate_uid(UID_ACCESS);
            // Access data from the parameter $data
            $accessData = [
                "uid" => $uid,
                "name" => $data['name'],
                "status" => "active"
            ];

            // Insert data into the database
            $isAdded = $AccessModel->insert($accessData);

            // Check if data is successfully inserted
            if ($isAdded) {
                $resp['status'] = true;
                $resp['message'] = "Data inserted successfully";
                $resp['data'] = ['access_id' => $uid];
            } else {
                $resp['message'] = "Failed to insert data";
            }
        } catch (\Exception $e) {
            // Catching any exceptions and setting error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;
    }
    private function staff_add($data)
    {
        $response = [
            "status" => false,
            "message" => "Staff Not Added",
            "data" => []
        ];

        try {
            if (
                empty($data['staffName']) ||
                empty($data['staffEmail']) ||
                empty($data['staffNumber']) ||
                empty($data['staffPassword']) ||
                empty($data['staffRole'])
            ) {
                $response['message'] = "Please Add All Staff Details";

            } else {
                $UsersModel = new UsersModel();
                $isExists = $UsersModel->where(['email' => $data['staffEmail'], 'type' => 'staff'])->findAll();
                //$this->prd($isEmailExists);

                if (empty($isExists)) {
                    // Instantiate necessary models
                    $UsersModel = new UsersModel();
                    $StaffModel = new StaffModel();

                    // Prepare user data
                    $userData = [
                        "uid" => $this->generate_uid(UID_USER),
                        "user_name" => $data['staffName'],
                        "email" => $data['staffEmail'],
                        "number" => $data['staffNumber'],
                        "password" => md5($data['staffPassword']),
                        "status" => "active",
                        "type" => "staff"
                    ];

                    // Insert user data
                    $isUsersAdded = $UsersModel->insert($userData);

                    // If user added successfully, proceed to add staff
                    if ($isUsersAdded) {
                        $staffData = [
                            "uid" => $this->generate_uid(UID_STAFF),
                            "user_id" => $userData['uid'],
                            "role" => $data['staffRole'],
                            "status" => "active"
                        ];

                        // Insert staff data
                        $isStaffAdded = $StaffModel->insert($staffData);

                        // If staff added successfully and access rights are provided, insert staff access
                        if ($isStaffAdded && !empty($data['selectedAccess'])) {
                            foreach ($data['selectedAccess'] as $index => $item) {
                                $StaffAccessModel = new StaffAccessModel();
                                $accessData = [
                                    "uid" => $this->generate_uid(UID_STAFF_ACCESS),
                                    "staff_id" => $staffData['uid'],
                                    "access_id" => $item
                                ];
                                $StaffAccessModel->insert($accessData);
                            }
                            // Update response upon successful addition
                            $response = [
                                "status" => true,
                                "message" => "Staff Added Successfully",
                                "data" => ['staff_id' => $staffData['uid']]
                            ];
                        }

                    }
                } else {
                    $response['message'] = 'Try Diffrent Email';
                }

            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    private function staff($data)
    {

        $response = [
            "status" => false,
            "message" => "Staff Not Found",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();
            if (!isset($data['s_id'])) {
                $sql = "SELECT 
                        staff.uid AS staff_id,
                        staff.role AS staff_role,
                        users.user_name AS staff_name,
                        users.uid AS user_id,
                        users.email AS staff_email,
                        users.number AS staff_number
                    FROM
                        staff
                    JOIN 
                        users ON staff.user_id = users.uid;";
                $staff = $CommonModel->customQuery($sql);
                $staff = json_decode(json_encode($staff), true);
            } else {
                $s_id = $data['s_id'];
                $sql = "SELECT 
                            staff.uid AS staff_id,
                            staff.role AS staff_role,
                            users.user_name AS staff_name,
                            users.uid AS user_id,
                            users.email AS staff_email,
                            users.number AS staff_number
                        FROM
                            staff
                        JOIN 
                            users ON staff.user_id = users.uid 
                        WHERE
                            staff.uid = '{$s_id}';";
                $staff = $CommonModel->customQuery($sql);
                $staff = json_decode(json_encode($staff), true);
                $staff = !empty($staff) ? $staff[0] : null;

                $sql_access = "SELECT 
                            access.uid AS access_id
                        FROM
                            access
                        JOIN
                            staff_access ON staff_access.access_id = access.uid
                        WHERE 
                            staff_access.staff_id = '{$s_id}';";
                $access = $CommonModel->customQuery($sql_access);
                $access = json_decode(json_encode($access), true);
                $access = !empty($access) ? $access : null;

                $accArr = [];
                if (!empty($access)) {
                    foreach ($access as $index => $item) {
                        $accArr[$index] = $item['access_id'];
                    }
                }

                $staff['access'] = $accArr;
            }


            $response = [
                "status" => !empty($staff),
                "message" => !empty($staff) ? "Staff Found" : "Staff Not Found",
                "data" => !empty($staff) ? $staff : []
            ];


        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $response['message'] = $e->getMessage();
        }



        return $response;
    }


    private function access_update($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
        ];

        try {
            $StaffAccessModel = new StaffAccessModel();

            $conditions = ['staff_id' => $data['staff_id'], 'access_id' => $data['access_id']];

            if ($StaffAccessModel->where($conditions)->countAllResults()) {
                // If a record exists with the provided staff_id and access_id, delete it
                $isUpdated = $StaffAccessModel->where($conditions)->delete();
            } else {
                // If no record exists, insert a new one
                $accessData = [
                    "uid" => $this->generate_uid(UID_STAFF_ACCESS),
                    "staff_id" => $data['staff_id'],
                    "access_id" => $data['access_id']
                ];
                $isUpdated = $StaffAccessModel->insert($accessData);
            }

            // Update response based on success or failure
            if ($isUpdated) {
                $resp['status'] = true;
                $resp['message'] = "Access updated successfully.";
            } else {
                $resp['message'] = "Failed to update access.";
            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }


    private function staff_update($data)
    {

        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {

            if (
                empty($data['staffName']) ||
                empty($data['staffEmail']) ||
                empty($data['staffNumber']) ||
                empty($data['staffRole'])
            ) {
                $resp['message'] = "Please Add All Staff Details";
            } else {
                $staff_id = $data['staffId'];
                $sql = "SELECT
                            users.uid AS user_id
                        FROM 
                            users
                        JOIN
                            staff ON users.uid = staff.user_id
                        WHERE
                            staff.uid = '{$staff_id}';";
                $CommonModel = new CommonModel();
                $user_id = $CommonModel->customQuery($sql);
                $user_id = json_decode(json_encode($user_id), true);
                $user_id = !empty($user_id) ? $user_id[0]['user_id'] : null;

                $updateStaffData = [
                    "role" => $data['staffRole'],
                ];
                $updateUserData = [
                    "user_name" => $data['staffName'],
                    "number" => $data['staffNumber'],
                    "email" => $data['staffEmail']
                ];

                $UsersModel = new UsersModel();
                $StaffModel = new StaffModel();

                // Update user details
                $isUserUpdated = $UsersModel->where(['uid' => $user_id])->set($updateUserData)->update();
                // Update staff details
                $isStaffUpdated = $StaffModel->where(['user_id' => $user_id])->set($updateStaffData)->update();

                if ($isUserUpdated && $isStaffUpdated) {
                    $resp = [
                        "status" => true,
                        "message" => "Updated",
                        "data" => ['user_id' => $user_id]
                    ];
                } else {
                    $resp["message"] = "Failed to update.";
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function seller_list($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {

            $sql = "SELECT
                        vendor.uid AS vendor_id,
                        vendor.user_img,
                        vendor.signature_img,
                        vendor.pan_img,
                        vendor.aadhar_img,
                        vendor.pin,
                        vendor.pin2,
                        vendor.pin3,
                        vendor.pin4,
                        vendor.pin5,
                        users.uid AS user_id,
                        users.user_name,
                        users.number,
                        users.email,
                        users.status
                    FROM
                        vendor
                    JOIN users ON vendor.user_id = users.uid
                    WHERE
                        (users.type = 'admin' OR users.type = 'seller')";
            $CommonModel = new CommonModel();

            $vendors = $CommonModel->customQuery($sql);
            $vendors = json_decode(json_encode($vendors), true);
            if (!empty($vendors)) {
                $resp['status'] = true;
                $resp['message'] = "All vendors data retrieved";
                $resp['data'] = $vendors;
            } else {
                // If no access data found at all
                $resp['message'] = "No vendors data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function add_new_seller($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['user_name'])) {
                $resp['message'] = 'Please add user name';
            } else if (empty($data['number'])) {
                $resp['message'] = 'Please add number';
            } else if (empty($data['email'])) {
                $resp['message'] = 'Please add email';
            } else if (empty($data['vendorPin1'])) {
                $resp['message'] = 'Please add pin code';
            } else if (empty($data['password'])) {
                $resp['message'] = 'Please add password';
            } else if (empty($uploadedFiles['user_img'])) {
                $resp['message'] = 'Please add user image';
            }else if (empty($uploadedFiles['signature'])) {
                $resp['message'] = 'Please add signature';
            }else if (empty($uploadedFiles['pan_img'])) {
                $resp['message'] = 'Please add pan card image';
            }else if (empty($uploadedFiles['aadhar_img'])) {
                $resp['message'] = 'Please add aadhar card image';
            }else {

                $user_data = [
                    "uid" => $this->generate_uid(UID_USER),
                    "user_name" => $data['user_name'],
                    "email" => $data['email'],
                    "number" => $data['number'],
                    "password" => md5($data['password']),
                    "type" => 'seller',
                    "status" => 'inactive'
                ];
                $vendor_data = [
                    "uid" => $this->generate_uid(UID_VENDOR),
                    "user_id" => $user_data['uid'],
                    "pin" => $data['vendorPin1'],
                    "pin2" => $data['vendorPin2'],
                    "pin3" => $data['vendorPin3'],
                    "pin4" => $data['vendorPin4'],
                    "pin5" => $data['vendorPin5']
                    // "status" => 'active'
                ];
                foreach ($uploadedFiles['user_img'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_IMG);
                    $vendor_data['user_img'] = $file_src;
                }
                foreach ($uploadedFiles['signature'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_DOC);
                    $vendor_data['signature_img'] = $file_src;
                }
                foreach ($uploadedFiles['pan_img'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_DOC);
                    $vendor_data['pan_img'] = $file_src;
                }
                foreach ($uploadedFiles['aadhar_img'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_DOC);
                    $vendor_data['aadhar_img'] = $file_src;
                }
                $UsersModel = new UsersModel();
                $VendorModel = new VendorModel();

                // Insert user data
                $UsersModel->insert($user_data);
                // Insert vendor data
                $VendorModel->insert($vendor_data);

                $resp['status'] = true;
                $resp['message'] = 'Seller added successfully';
                $resp['data'] = ['vendor_id' => $vendor_data['uid']];
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function seller($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        // $this->prd($data['user_id']);

        try {

            $sql = "SELECT
                        vendor.uid AS vendor_id,
                        vendor.user_img,
                        vendor.signature_img,
                        vendor.pan_img,
                        vendor.aadhar_img,
                        vendor.pin,
                        vendor.pin2,
                        vendor.pin3,
                        vendor.pin4,
                        vendor.pin5,
                        users.uid AS user_id,
                        users.user_name,
                        users.number,
                        users.email
                    FROM
                        vendor
                    JOIN users ON vendor.user_id = users.uid
                    WHERE
                    users.uid = '{$data['user_id']}'";

            $CommonModel = new CommonModel();
            $vendors = $CommonModel->customQuery($sql);

            $vendors = json_decode(json_encode($vendors), true);
            if (!empty($vendors)) {
                $resp['status'] = true;
                $resp['message'] = "All vendors data retrieved";
                $resp['data'] = $vendors[0];
            } else {
                // If no access data found at all
                $resp['message'] = "No vendors data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function update_seller($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update.",
            "data" => []
        ];

        try {
            if (empty($data['user_name'])) {
                $resp['message'] = 'Please add user name';
            } else if (empty($data['number'])) {
                $resp['message'] = 'Please add number';
            } else if (empty($data['email'])) {
                $resp['message'] = 'Please add email';
            }  else if (empty($data['vendorPin1'])) {
                $resp['message'] = 'Please add pin code';
            } else {

                $updateUserData = [
                    "user_name" => $data['user_name'],
                    "email" => $data['email'],
                    "number" => $data['number'],
                ];

                $updateVendorDoc = [
                    "pin" => $data['vendorPin1'],
                    "pin2" => $data['vendorPin2'],
                    "pin3" => $data['vendorPin3'],
                    "pin4" => $data['vendorPin4'],
                    "pin5" => $data['vendorPin5']
                ];
                $uploadedFiles = $this->request->getFiles();
                if(isset($uploadedFiles['user_img'])){
                    foreach ($uploadedFiles['user_img'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_IMG);
                        $updateVendorDoc['user_img'] = $file_src;
                    }
                }
                if(isset($uploadedFiles['signature'])){
                    foreach ($uploadedFiles['signature'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_DOC);
                        $updateVendorDoc['signature_img'] = $file_src;
                    }
                }
                if(isset($uploadedFiles['pan_img'])){
                    foreach ($uploadedFiles['pan_img'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_DOC);
                        $updateVendorDoc['pan_img'] = $file_src;
                    }
                }
                if(isset($uploadedFiles['aadhar_img'])){
                    foreach ($uploadedFiles['aadhar_img'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_DOC);
                        $updateVendorDoc['aadhar_img'] = $file_src;
                    }
                }
                $UsersModel = new UsersModel();
                $VendorModel = new VendorModel();
                // $this->prd($updateVendorDoc);
                // Update user details
                $isUserUpdated = $UsersModel->where(['uid' => $data['user_id']])->set($updateUserData)->update();
                if($isUserUpdated){
                    $isVendorUpdated = $VendorModel->where(['user_id' => $data['user_id']])->set($updateVendorDoc)->update();
                    if($isVendorUpdated){
                        $resp['status'] = true;
                        $resp['message'] = 'Seller update successfully';
                        $resp['data'] = "";
                    }
                }
                // Insert user data
                // $UsersModel->insert($user_data);
                
                
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function seller_delete($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to Delete Seller.",
            "data" => []
        ];

        // $this->prd($data['user_id']);

        try {

            $UsersModel = new UsersModel();
            $VendorModel = new VendorModel();
            $deleteUser = $UsersModel->where('uid', $data['user_id'])->delete();
            if($deleteUser){
                $deleteVendor = $VendorModel->where('user_id', $data['user_id'])->delete();
            }
            if ($deleteVendor) {
                $resp['status'] = true;
                $resp['message'] = "Seller Deleteted Successful";
                $resp['data'] = "";
            } else {
                // If no access data found at all
                $resp['message'] = "No Seller found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function message_all()
    {
        $resp = [
            'status' => false,
            'message' => 'No messages found',
            'data' => []
        ];
        try {
            $MessageModel = new MessageModel();
            $messages = $MessageModel->findAll();
            if (count($messages) > 0) {
                $resp = [
                    'status' => true,
                    'message' => 'Messages found',
                    'data' => $messages
                ];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e;
        }
        return $resp;
    }

    private function update_user_billing($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];

        if (empty($data['name'])) {
            $resp['message'] = 'Please Enter Name';
        } else if (empty($data['number'])) {
            $resp['message'] = 'Please Enter Number';
        } else if (empty($data['email'])) {
            $resp['message'] = 'Please Enter Email';
        } else {

            $user_data = [
                'user_name' => $data['name'],
                'email' => $data['email'],
            ];
            $UserModel = new UsersModel();
            $UserModel->transStart();
            try {
                $UserModel
                    ->where('uid', $data['user_id'])
                    ->set($user_data)
                    ->update();
                $UserModel->transCommit();
            } catch (\Exception $e) {
                $UserModel->transRollback();
                throw $e;
            }

            $update_address_data = [
                'city' => $data['city'],
                'country' => $data['country'],
                'zipcode' => $data['zip'],
                'district' => $data['district'],
                'state' => $data['state'],
                'locality' => $data['locality'],
                'is_primary' => 'primary',
            ];

            $add_address_data = [
                'uid' => $this->generate_uid(UID_ADDRESS),
                'user_id' => $data['user_id'],
                'city' => $data['city'],
                'country' => $data['country'],
                'zipcode' => $data['zip'],
                'district' => $data['district'],
                'state' => $data['state'],
                'locality' => $data['locality'],
                'is_primary' => 'primary',
            ];

            $UserAddressModel = new AddressModel();
            $AddressData = $UserAddressModel
                ->where('user_id', $data['user_id'])
                ->get()
                ->getResultArray();
            $UserAddressData = !empty($AddressData[0]) ? $AddressData[0] : null;
            $UserAddressModel->transStart();
            try {
                if (!empty($UserAddressData)) {
                    $UserAddressModel
                        ->where('user_id', $data['user_id'])
                        ->where('is_primary', 'primary')
                        ->set($update_address_data)
                        ->update();
                } else {
                    $UserAddressModel->insert($add_address_data);
                }
                $UserAddressModel->transCommit();
            } catch (\Exception $e) {
                $UserAddressModel->transRollback();
                throw $e;
            }
            
            $resp['status'] = true;
            $resp['message'] = 'Update Successful';
            $resp['data'] = ['user_id' => $data['user_id']];
        }
        return $resp;
    }

    private function update_user_address($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];

        if (empty($data['city'])) {
            $resp['message'] = 'Please Enter city';
        } else if (empty($data['country'])) {
            $resp['message'] = 'Please Enter country';
        } else if (empty($data['zip'])) {
            $resp['message'] = 'Please Enter zip code';
        } else if (empty($data['district'])) {
            $resp['message'] = 'Please Enter district';
        } else if (empty($data['state'])) {
            $resp['message'] = 'Please Enter state';
        } else if (empty($data['locality'])) {
            $resp['message'] = 'Please Enter locality';
        } else {

            $update_address_data = [
                'city' => $data['city'],
                'country' => $data['country'],
                'zipcode' => $data['zip'],
                'district' => $data['district'],
                'state' => $data['state'],
                'locality' => $data['locality'],
                'is_primary' => 'primary',
            ];

            $add_address_data = [
                'uid' => $this->generate_uid(UID_ADDRESS),
                'user_id' => $data['user_id'],
                'city' => $data['city'],
                'country' => $data['country'],
                'zipcode' => $data['zip'],
                'district' => $data['district'],
                'state' => $data['state'],
                'locality' => $data['locality'],
                'is_primary' => 'primary',
            ];

            $UserAddressModel = new AddressModel();
            $AddressData = $UserAddressModel
                ->where('user_id', $data['user_id'])
                ->get()
                ->getResultArray();
            $UserAddressData = !empty($AddressData[0]) ? $AddressData[0] : null;
            $UserAddressModel->transStart();
            try {
                if (!empty($UserAddressData)) {
                    $UserAddressModel
                        ->where('user_id', $data['user_id'])
                        ->where('is_primary', 'primary')
                        ->set($update_address_data)
                        ->update();
                } else {
                    $UserAddressModel->insert($add_address_data);
                }
                $UserAddressModel->transCommit();
            } catch (\Exception $e) {
                $UserAddressModel->transRollback();
                throw $e;
            }
            
            $resp['status'] = true;
            $resp['message'] = 'Update Successful';
            $resp['data'] = ['user_id' => $data['user_id']];
        }
        return $resp;
    }

    private function update_user_status($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update.",
            "data" => []
        ];
        // $this->prd($data['user_status']);
        try {
            if (empty($data['user_status'])) {
                $resp['message'] = 'User status not found';
            } else if (empty($data['user_id'])) {
                $resp['message'] = 'User not found';
            } else {

                $updateUserData = [
                    "status" => $data['user_status'],
                ];
                // $this->pr($data['user_id']);
                // $this->prd($data['user_status']);
                $UsersModel = new UsersModel();
                $VendorModel = new VendorModel();

                $isUserUpdated = $UsersModel->where(['uid' => $data['user_id']])->set($updateUserData)->update();
                if($isUserUpdated){
                    $isvendorUpdated = $VendorModel->where(['user_id' => $data['user_id']])->set($updateUserData)->update();
                    if($isvendorUpdated){
                            $resp['status'] = true;
                            $resp['message'] = 'Status update successfully';
                            $resp['data'] = "";
                        
                    }
                    
                }
                
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }
    private function update_social($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Failed!',
            'data' => null
        ];
        $uid=$data['uid'];

        if (empty($data['facebook'])) {
            $resp['message'] = 'Please Enter Facebook Link';
        } else if (empty($data['twitter'])) {
            $resp['message'] = 'Please Enter Twitter Link';
        } else if (empty($data['instagram'])) {
            $resp['message'] = 'Please Enter Instagram Link';
        } else if (empty($data['youtube'])) {
            $resp['message'] = 'Please Enter Youtube Link';
        } else {

            $link_data = [
                // "uid" => $this->generate_uid('SOCLIN'),
                'facebook' => $data['facebook'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],
                'youtube' => $data['youtube']
            ];
            $SociallinkModel = new SociallinkModel();
            $SociallinkModel->transStart();
            try {
                $SociallinkModel->where('uid', $uid)->set($link_data)->update();
                $SociallinkModel->transCommit();
            } catch (\Exception $e) {
                $SociallinkModel->transRollback();
                throw $e;
            }
            $resp['status'] = true;
            $resp['message'] = 'Insertion Successful';
            $resp['data'] = [];
        }
        return $resp;
    }
    private function get_social()
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        $SociallinkModel = new SociallinkModel();
        $SocialData = $SociallinkModel
            ->first();
            
        $resp = [
            "status" => true,
            "message" => "Data fetched",
            "user_data" => $SocialData
        ];
        return $resp;
    }
    private function get_notice()
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        $NoticebarModel = new NoticebarModel();
        $Noticedata = $NoticebarModel
            ->first();
            
        $resp = [
            "status" => true,
            "message" => "Data fetched",
            "user_data" => $Noticedata
        ];
        return $resp;
    }

    private function update_notice($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Failed!',
            'data' => null
        ];
        $uid=$data['uid'];

        if (empty($data['notice'])) {
            $resp['message'] = 'Please Enter Notice';
        } else {

            $notice_data = [
                "uid" => $this->generate_uid('NOTLIN'),
                'notice' => $data['notice']
            ];
            $NoticebarModel = new NoticebarModel();
            $NoticebarModel->transStart();
            try {
                // $NoticebarModel->insert($link_data);
                $NoticebarModel->where('uid', $uid)->set($notice_data)->update();
                $NoticebarModel->transCommit();
            } catch (\Exception $e) {
                $NoticebarModel->transRollback();
                throw $e;
            }
            $resp['status'] = true;
            $resp['message'] = 'Insertion Successful';
            $resp['data'] = [];
        }
        return $resp;
    }

    private function get_meta()
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        $AboutModel = new AboutModel();
        $MetaData = $AboutModel
            ->first();
            
        $resp = [
            "status" => true,
            "message" => "Data fetched",
            "user_data" => $MetaData
        ];
        return $resp;
    }

    // private function get_tags_admin()
    // {
    //     // echo $user_id;
    //     $resp = [
    //         "status" => false,
    //         "message" => "Data Not Found",
    //         "user_data" => ""
    //     ];
    //     $AdmintagModel = new AdmintagModel();
    //     $tagData = $AdmintagModel
    //         ->findAll();
            
    //     $resp = [
    //         "status" => true,
    //         "message" => "Data fetched",
    //         "user_data" => $tagData
    //     ];
    //     return $resp;
    // }

    private function get_tags_frontend()
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        $FrontendtagModel = new FrontendtagModel();
        $tagData = $FrontendtagModel
            ->findAll();
            
        $resp = [
            "status" => true,
            "message" => "Data fetched",
            "user_data" => $tagData
        ];
        return $resp;
    }
    private function get_sizechart($data)
    {
        // Initialize the response array
        $resp = [
            "status" => false,
            "message" => "Size Chart Not Found",
            "image_name" => ""
        ];

        // Check if the 'uid' is passed
        $uid = isset($data['uid']) ? $data['uid'] : null;
        // $this->prd($uid);

        log_message('debug', 'Received UID: ' . $uid);

        // Check if 'uid' is provided and is valid
        
            $ProductModel = new ProductModel();
            $product = $ProductModel->where('uid', $uid)->first();

            
            $resp = [
                "status" => true,
                "message" => "Size chart found",
                "image_name" => $product['size_chart']
            ];
            // $this->prd($resp);

            return $resp;
    }

    












    public function POST_add_new_seller()
    {
        $data = $this->request->getPost();
        $resp = $this->add_new_seller($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_user_billing()
    {
        $data = $this->request->getPost();
        $resp = $this->update_user_billing($data);
        return $this->response->setJSON($resp);
    }
    public function POST_update_user_status()
    {
        $data = $this->request->getPost();
        $resp = $this->update_user_status($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_user_address()
    {
        $data = $this->request->getPost();
        $resp = $this->update_user_address($data);
        return $this->response->setJSON($resp);
    }

    public function GET_seller_list()
    {
        $data = $this->request->getGet();
        $resp = $this->seller_list($data);
        return $this->response->setJSON($resp);
    }

    public function GET_a_seller()
    {
        $data = $this->request->getGet();
        $resp = $this->seller($data);
        return $this->response->setJSON($resp);
    }

    public function POST_staff_update()
    {
        $data = $this->request->getPost();
        $resp = $this->staff_update($data);
        return $this->response->setJSON($resp);
    }

    public function GET_access_update()
    {
        $data = $this->request->getGet();
        $resp = $this->access_update($data);
        return $this->response->setJSON($resp);
    }


    public function GET_staff()
    {
        $data = $this->request->getGet();
        $resp = $this->staff($data);
        return $this->response->setJSON($resp);

    }

    public function POST_staff_add()
    {
        $data = $this->request->getPost();
        $resp = $this->staff_add($data);
        return $this->response->setJSON($resp);

    }
    public function GET_access_add()
    {

        $data = $this->request->getGet();
        $resp = $this->access_add($data);
        return $this->response->setJSON($resp);

    }

    public function GET_staff_access()
    {
        $data = $this->request->getGet();
        $resp = $this->staff_access($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_user()
    {
        $data = $this->request->getPost();
        $resp = $this->update_user($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_seller()
    {
        $data = $this->request->getPost();
        $resp = $this->update_seller($data);
        return $this->response->setJSON($resp);

    }

    public function GET_message_all()
    {
        $data = $this->request->getGet();
        $resp = $this->message_all($data);
        return $this->response->setJSON($resp);

    }

    public function POST_change_password()
    {
        $data = $this->request->getPost();
        $resp = $this->change_password($data);
        return $this->response->setJSON($resp);

    }

    public function POST_message()
    {
        $data = $this->request->getPost();
        $resp = $this->message($data);
        return $this->response->setJSON($resp);

    }

    public function GET_get_user()
    {

        $resp = $this->get_user();
        return $this->response->setJSON($resp);

    }

    public function GET_customer()
    {
        $data = $this->request->getGet();
        $resp = $this->customer($data);
        return $this->response->setJSON($resp);

    }

    public function GET_delete_customer()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_customer($data);
        return $this->response->setJSON($resp);

    }

    public function GET_total_customer()
    {
        $resp = $this->total_customer();
        return $this->response->setJSON($resp);
    }

    public function GET_seller_delete()
    {
        $data = $this->request->getGet();
        $resp = $this->seller_delete($data);
        return $this->response->setJSON($resp);
    }

    public function GET_get_admin()
    {
        $data = $this->request->getGet();
        $resp = $this->get_admin($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_admin()
    {
        $data = $this->request->getPost();
        $resp = $this->update_admin($data);
        return $this->response->setJSON($resp);

    }

    public function POST_change_admin_password()
    {
        $data = $this->request->getPost();
        $resp = $this->change_admin_password($data);
        return $this->response->setJSON($resp);

    }

    public function GET_sociallink()
    {
        $resp = $this->get_social();
        return $this->response->setJSON($resp);

    }

    public function GET_noticebar(){
        $resp=$this->get_notice();
        return $this->response->setJSON($resp);
    }
    public function POST_insert_noticelink()
    {
        $data = $this->request->getPost();
        $resp = $this->update_notice($data);
        return $this->response->setJSON($resp);

    }
    public function POST_insert_sociallink()
    {
        $data = $this->request->getPost();
        $resp = $this->update_social($data);
        return $this->response->setJSON($resp);

    }

    public function GET_admin_meta()
    {
        // $data = $this->request->getPost();
        $resp = $this->get_meta();
        return $this->response->setJSON($resp);

    }

    // public function GET_admin_tags()
    // {
    //     // $data = $this->request->getPost();
    //     $resp = $this->get_tags_admin();
    //     return $this->response->setJSON($resp);

    // }
    public function GET_frontend_tags()
    {
        // $data = $this->request->getPost();
        $resp = $this->get_tags_frontend();
        return $this->response->setJSON($resp);

    }

    public function GET_size_chart()
    {
        $data = $this->request->getPost();
        $resp = $this->get_sizechart($data);
        return $this->response->setJSON($resp);

    }
}
