<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $catModel = new CategoriesModel();
        $cat = $catModel->select()->orderBy('id', 'Desc')->findAll();
        return view('admin/category/index', ['cat' => $cat]);
    }

    public function create()
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {
            return view('admin/category/create_cat');
        } else {
            if ($this->validate(
                [
                    'name' => 'required|max_length[124]',
                    'slug' => 'required|max_length[124]|is_unique[categories.slug,name]',
                ],
                [
                    'name' => [
                        'required' => 'Please fill Category Name',
                        'max_length' => 'Name is too large'
                    ],
                    'slug' => [
                        'required' => 'Please fill Category slug',
                        'is_unique' => 'This Slug is Already Exist',
                        'max_length' => 'slug is too large'
                    ],
                ]
            )) {
                $catModel = new CategoriesModel();

                $result = $catModel->save([
                    'name' => $this->request->getPost('name'),
                    'slug' => strtolower($this->request->getPost('slug')),
                ]);

                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add an Category', "type" => "success"]);
                    return redirect()->to(site_url("admin/categories"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/categories/create"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();
            }
        }
    }


    // public function edit($id)
    // {
    //     helper('form');
    //     $session = session();
    //     if ($this->request->getMethod() === 'get') {

    //         $catModel = new CategoriesModel();
    //         $itis = $catModel->where('id', $id)->first();

    //         return view('admin/category/edit', ['cat' => $itis, 'id' => $id]);
    //     } else {


    //         //Need To work from here

    //         $image = \Config\Services::image();
    //         $session = session();

    //         if ($this->validate(
    //             [
    //                 'name' => 'required|max_length[124]',
    //                 'slug' => 'required|max_length[124]',
    //             ],
    //             [
    //                 'name' => [
    //                     'required' => 'Please fill Category Name',
    //                     'max_length' => 'Name is too large'
    //                 ],
    //                 'slug' => [
    //                     'required' => 'Please fill Category slug',
    //                     'is_unique' => 'This Slug is Already Exist',
    //                     'max_length' => 'slug is too large'
    //                 ],
    //             ]
    //         )) {
    //             $newfilename = null;

    //             $catModel = new CategoriesModel();
    //             $oldresult = $catModel->select('slug')->findAll();

    //             echo "<pre>";
    //             print_r($oldresult);
    //             exit;
    //             foreach ($oldresult as $slugs) {
    //                 if ($slugs['slug'] === strtolower($this->request->getPost('slug'))) {
    //                     # code...
    //                 }
    //             }



    //             if ($oldresult['slug'] === strtolower($this->request->getPost('slug'))) {
    //                 $session->setFlashdata('msg', ["msg" => 'Please use new slug', "type" => "success"]);
    //                 return redirect()->back()->withInput();
    //             }

    //             $result = [
    //                 // 'tours_id' => $tour_id,
    //                 'name' => $this->request->getPost('name'),
    //                 'slug' => strtolower($this->request->getPost('slug')),
    //             ];
    //             if ($newfilename !== null) {
    //                 $result['cover_image'] = $newfilename;
    //                 $this->remFile('uploads/tours/itineraries' . $oldresult['cover_image']);
    //             }
    //             $result = $itiModel->update($id, $result);
    //             if ($result) {
    //                 $session->setFlashdata('msg', ["msg" => 'You have successfully Update an itineraries', "type" => "success"]);
    //                 return redirect()->to(base_url("/admin/itineraries/" . $tour_id));
    //             } else {
    //                 $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => 'Unknown Error'], "type" => "warning"]);
    //                 return redirect()->to(base_url("/admin/itineraries/" . $tour_id . "/edit/" . $id));
    //             }
    //         } else {
    //             $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
    //             return redirect()->back()->withInput();

    //             // return redirect()->to(base_url("/admin/tours/edit/" . $id));
    //         }
    //     }
    // }

    public function delete($id)
    {
        $session = session();
        $itiModel = new CategoriesModel();
        if (!empty($itiModel->select('id')->where('id', $id)->first())) {
            if ($itiModel->delete($id)) {
                $session->setFlashdata('msg', ['msg' => 'Successfully Deleted a Category', 'type' => 'success']);
                return redirect()->to(site_url("admin/categories"));
            } else {
                $session->setFlashdata('invalid_creds', ['errors' => "Something went wrong", 'type' => 'danger']);
                return redirect()->to(site_url("admin/categories/" . $id));
            }
        } else {
            $session->setFlashdata('invalid_creds', ['errors' => "Category Not Found", 'type' => 'danger']);
            return redirect()->to(site_url("admin/categories/" . $id));
        }
    }
}
