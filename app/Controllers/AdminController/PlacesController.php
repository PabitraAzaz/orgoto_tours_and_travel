<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\PlacesModel;

class PlacesController extends BaseController
{
    public function index($tour_id)
    {
        $accModel = new PlacesModel();
        $places = $accModel->where('tours_id', $tour_id)->findAll();
        return view('admin/places/index', ['place' => $places, 'id' => $tour_id]);
    }
    public function create($tour_id)
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {
            return view('admin/places/create', ['tour_id' => $tour_id]);
        } else {
            $image = \Config\Services::image();

            if ($this->validate(
                [
                    'cover_image' => 'uploaded[cover_image]|is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[cover_image, 2048]',

                    'name' => 'required|max_length[124]',
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
                ]
            )) {
                $placeModel = new PlacesModel();

                $tourFile = $this->request->getFile("cover_image");
                if (trim($tourFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $tourFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tourFileName = round(microtime(true)) . '.' . end($temp);
                    $tourFileName = "Places_" . $tourFileName;
                }
                $image->withFile($tourFile)->save('uploads/tours/places/' . $tourFileName, 70);

                $result = $placeModel->save([
                    'cover_image' => $tourFileName,
                    'tours_id' => $tour_id,
                    'name' => $this->request->getPost('name'),
                ]);

                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add a Place', "type" => "success"]);
                    return redirect()->to(site_url("admin/places/" . $tour_id));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/places/" . $tour_id . "/create"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();
            }
        }
    }



    public function edit($tour_id, $id)
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {

            $placeModel = new PlacesModel();

            $places = $placeModel->where('id', $id)->first();

            return view('admin/places/edit', ['place' => $places, 'tours_id' => $tour_id, 'id' => $id]);
        } else {
            $image = \Config\Services::image();
            $session = session();

            if ($this->validate(
                [
                    'cover_image' => 'is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[cover_image, 2048]',

                    'name' => 'required|max_length[124]',
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

                ]
            )) {
                $newfilename = null;

                $placeModel = new PlacesModel();
                $oldresult = $placeModel->select('cover_image')->where('id', $id)->first();


                $file = $this->request->getFile("cover_image");
                if (trim($file) !== '') {
                    // $file = $this->request->getFile("tour_image");
                    $thumbnail = $file->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = "Places" . $newfilename;


                    $image->withFile($file)->save('uploads/tours/places/' . $newfilename, 70);
                    // $image->withFile($file)->save('uploads/tours/' . $newfilename, 70);
                }
                $result = [
                    'name' => $this->request->getPost('name'),
                ];
                if ($newfilename !== null) {
                    $result['cover_image'] = $newfilename;
                    $this->remFile('uploads/tours/places' . $oldresult['cover_image']);
                }
                $result = $placeModel->update($id, $result);
                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Update an Places', "type" => "success"]);
                    return redirect()->to(base_url("/admin/places/" . $tour_id));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => 'Unknown Error'], "type" => "warning"]);
                    return redirect()->to(base_url("/admin/places/" . $tour_id . "/edit/" . $id));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();

                // return redirect()->to(base_url("/admin/tours/edit/" . $id));
            }
        }
    }

    public function delete($tour_id, $id)
    {
        $session = session();
        $placeModel = new PlacesModel();
        if (!empty($placeModel->select('id')->where('id', $id)->first())) {
            if ($placeModel->delete($id)) {
                $session->setFlashdata('msg', ['msg' => 'Successfully Deleted an Places', 'type' => 'success']);
                return redirect()->to(site_url("admin/places/" . $tour_id));
            } else {
                $session->setFlashdata('invalid_creds', ['errors' => "Something went wrong", 'type' => 'danger']);
                return redirect()->to(site_url("admin/places/" . $tour_id));
            }
        } else {
            $session->setFlashdata('invalid_creds', ['errors' => "Item Not Found", 'type' => 'danger']);
            return redirect()->to(site_url("admin/places/" . $tour_id));
        }
    }
}
