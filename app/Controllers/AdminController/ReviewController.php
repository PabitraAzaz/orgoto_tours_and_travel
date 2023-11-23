<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\MessageModel;
use App\Models\ReviewsModel;

class ReviewController extends BaseController
{
    public function index()
    {
        $reviewModel = new ReviewsModel();
        $review = $reviewModel->orderBy('id', 'desc')->findAll();

        // echo "<pre>";
        // print_r($review);
        // exit;
        return view('admin/review/index', ['review' => $review]);
    }

    public function create()
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {
            return view('admin/review/create');
        } else {
            $image = \Config\Services::image();

            if ($this->validate(
                [
                    'cover_image' => 'uploaded[cover_image]|is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[cover_image, 2048]',

                    'name' => 'required|max_length[124]',
                    'message' => 'required|max_length[255]',
                ],
                [
                    'cover_image' => [
                        // 'required'=>'Please upload a image',
                        'uploaded' => 'Please upload an Cover image',
                        'is_image' => 'Please upload a valid Image type of Cover Image',
                        'mime_in' => 'Please upload a valid image type of Cover Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Cover Image'
                    ],

                    'name' => [
                        'required' => 'Please fill Places Name',
                    ],
                    'message' => [
                        'required' => 'Please fill Message',
                    ],
                ]
            )) {
                $msgModel = new ReviewsModel();

                $tourFile = $this->request->getFile("cover_image");
                if (trim($tourFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $tourFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tourFileName = round(microtime(true)) . '.' . end($temp);
                    $tourFileName = "Review-" . $tourFileName;
                }
                $image->withFile($tourFile)->save('uploads/reviews/' . $tourFileName, 70);

                $result = $msgModel->save([
                    'image' => $tourFileName,
                    'name' => $this->request->getPost('name'),
                    'message' => $this->request->getPost('message'),
                ]);

                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add a review', "type" => "success"]);
                    return redirect()->to(site_url("admin/review"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/review/create"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();
            }
        }
    }



    public function edit($id)
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {

            $reviewModel = new ReviewsModel();

            $review = $reviewModel->where('id', $id)->first();

            return view('admin/review/edit', ['review' => $review, 'id' => $id]);
        } else {
            $image = \Config\Services::image();
            $session = session();

            if ($this->validate(
                [
                    'cover_image' => 'is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[cover_image, 2048]',

                    'name' => 'required|max_length[124]',
                    'message' => 'required|max_length[124]',
                ],
                [
                    'cover_image' => [
                        'is_image' => 'Please upload a valid Image type',
                        'mime_in' => 'Please upload a valid image type',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB'
                    ],
                    'name' => [
                        'required' => 'Please fill Places Name',
                    ],
                    'message' => [
                        'required' => 'Please fill Message',
                    ],
                ]
            )) {
                $newfilename = null;

                $reviewModel = new ReviewsModel();
                $oldresult = $reviewModel->select('image')->where('id', $id)->first();


                $file = $this->request->getFile("cover_image");
                if (trim($file) !== '') {
                    // $file = $this->request->getFile("tour_image");
                    $thumbnail = $file->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = "Review-" . $newfilename;


                    $image->withFile($file)->save('uploads/reviews/' . $newfilename, 70);
                    // $image->withFile($file)->save('uploads/tours/' . $newfilename, 70);
                }
                $result = [
                    'name' => $this->request->getPost('name'),
                    'message' => $this->request->getPost('message'),
                ];
                if ($newfilename !== null) {
                    $result['image'] = $newfilename;
                    $this->remFile('uploads/review/' . $oldresult['image']);
                }
                $result = $reviewModel->update($id, $result);
                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Update an Review', "type" => "success"]);
                    return redirect()->to(base_url("/admin/review"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => 'Unknown Error'], "type" => "warning"]);
                    return redirect()->to(base_url("/admin/review/edit/" . $id));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();

                // return redirect()->to(base_url("/admin/tours/edit/" . $id));
            }
        }
    }

    public function delete($id)
    {
        $session = session();
        $reviewModel = new ReviewsModel();
        if (!empty($reviewModel->select('id')->where('id', $id)->first())) {
            if ($reviewModel->delete($id)) {
                $session->setFlashdata('msg', ['msg' => 'Successfully Deleted an Testimonial', 'type' => 'success']);
                return redirect()->to(site_url("admin/review"));
            } else {
                $session->setFlashdata('invalid_creds', ['errors' => "Something went wrong", 'type' => 'danger']);
                return redirect()->to(site_url("admin/review/"));
            }
        } else {
            $session->setFlashdata('invalid_creds', ['errors' => "Item Not Found", 'type' => 'danger']);
            return redirect()->to(site_url("admin/review/"));
        }
    }
}
