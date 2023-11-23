<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\Settings;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        $session = session();
        if ($this->request->getMethod() === 'get') {
            return view('admin/login');
        } elseif ($this->request->getMethod() === 'post') {
            if ($this->validate(
                [
                    'email' => 'required|valid_email|max_length[254]',
                    'password' => 'required|max_length[254]'
                ],
                [
                    'email' => [
                        'required' => 'Please provide an email',
                        'valid_email' => 'Please provide a valid email',
                        'max_length' => 'Email is too long',
                    ], 'password' => [
                        'required' => 'Please provide a password',
                        'max_length' => 'Password is too long',
                    ]
                ]
            )) {
                $userModel = new UserModel();
                $result = $userModel->checklogindata(
                    $this->request->getPost('email'),
                    md5($this->request->getPost('password')),
                );
                if ($result) {
                    if ($result['status'] === 'active') {


                        $settingModel = new Settings();
                        $website_name = $settingModel->select()->first();

                        $user = [
                            'id' => $result['id'],
                            // 'f_name' => $result['f_name'],
                            'name' => $result['name'],
                            'email' => $result['email'],
                            'website' => $website_name['website_name']
                        ];
                        $session->set('admin_auth', $user);
                        // echo "suc";
                        return redirect()->to(base_url('/admin/dashboard'));
                    } else {

                        // echo "inac";
                        $session->setFlashdata('invalid_creds', ["errors" => 'You are suspended', "type" => "danger"]);
                        return redirect()->to(base_url('/admin'));
                    }
                } else {
                    $session->setFlashdata('error_msg', ["msg" => 'Invalid Credentials', "type" => "danger"]);
                    return redirect()->to(base_url('/admin'));
                }
            } else {

                // echo "iDont";
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->to(base_url('/admin'));
            }
        } else {
            $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
            return redirect()->to('/admin');
        }
    }
}
