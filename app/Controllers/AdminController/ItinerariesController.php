<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\ItinerariesModel;

class ItinerariesController extends BaseController
{
    public function index($tour_id)
    {
        $itiModel = new ItinerariesModel();
        $acc = $itiModel->where('tours_id', $tour_id)->findAll();
        return view('admin/itineraries/index', ['iti' => $acc, 'id' => $tour_id]);
    }
    public function create($tour_id)
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {
            return view('admin/itineraries/create', ['tour_id' => $tour_id]);
        } else {
            $image = \Config\Services::image();

            if ($this->validate(
                [
                    'cover_image' => 'uploaded[cover_image]|is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[cover_image, 2048]',

                    'day' => 'required|max_length[124]',
                    'destination' => 'required|max_length[124]',
                    'description' => 'required|max_length[124]',

                    'breakfast' => 'required|max_length[124]',
                    'lunch' => 'required|max_length[124]',
                    'dinner' => 'required|max_length[124]',
                ],
                [
                    'cover_image' => [
                        // 'required'=>'Please upload a image',
                        'uploaded' => 'Please upload an Cover image',
                        'is_image' => 'Please upload a valid Image type of Cover Image',
                        'mime_in' => 'Please upload a valid image type of Cover Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Cover Image'
                    ],

                    'day' => [
                        'required' => 'Please fill Day',
                    ],
                    'destination' => [
                        'required' => 'Please fill Destination',
                    ],
                    'description' => [
                        'required' => 'Please fill Description',
                    ],
                    'breakfast' => [
                        'required' => 'Please choose breakfast option',
                    ],
                    'lunch' => [
                        'required' => 'Please choose lunch option',
                    ],
                    'dinner' => [
                        'required' => 'Please choose dinner option',
                    ],
                ]
            )) {
                $itiModel = new ItinerariesModel();

                $tourFile = $this->request->getFile("cover_image");
                if (trim($tourFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $tourFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tourFileName = round(microtime(true)) . '.' . end($temp);
                    $tourFileName = "Itineraries" . $tourFileName;
                }
                $image->withFile($tourFile)->save('uploads/tours/itineraries/' . $tourFileName, 70);

                $result = $itiModel->save([
                    'cover_image' => $tourFileName,
                    'tours_id' => $tour_id,
                    'day' => $this->request->getPost('day'),
                    'destinations' => $this->request->getPost('destination'),
                    'description' => $this->request->getPost('description'),
                    'breakfast' => $this->request->getPost('breakfast'),
                    'lunch' => $this->request->getPost('lunch'),
                    'dinner' => $this->request->getPost('dinner'),
                ]);

                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add an Itineraries', "type" => "success"]);
                    return redirect()->to(site_url("admin/itineraries/" . $tour_id));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/itineraries/" . $tour_id . "/create"));
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

            $itiModel = new ItinerariesModel();

            $itis = $itiModel->where('id', $id)->first();

            return view('admin/itineraries/edit', ['iti' => $itis, 'tours_id' => $tour_id, 'id' => $id]);
        } else {


            //Need To work from here

            $image = \Config\Services::image();
            $session = session();

            if ($this->validate(
                [
                    'cover_image' => 'is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[cover_image, 2048]',

                    'day' => 'required|max_length[124]',
                    'destination' => 'required|max_length[124]',
                    'description' => 'required|max_length[124]',

                    'breakfast' => 'required|max_length[124]',
                    'lunch' => 'required|max_length[124]',
                    'dinner' => 'required|max_length[124]',
                ],
                [
                    'cover_image' => [
                        'is_image' => 'Please upload a valid Image type',
                        'mime_in' => 'Please upload a valid image type',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB'
                    ],
                    'day' => [
                        'required' => 'Please fill Day',
                    ],
                    'destination' => [
                        'required' => 'Please fill Destination',
                    ],
                    'description' => [
                        'required' => 'Please fill Description',
                    ],
                    'breakfast' => [
                        'required' => 'Please choose breakfast option',
                    ],
                    'lunch' => [
                        'required' => 'Please choose lunch option',
                    ],
                    'dinner' => [
                        'required' => 'Please choose dinner option',
                    ],

                ]
            )) {
                $newfilename = null;

                $itiModel = new ItinerariesModel();
                $oldresult = $itiModel->select('cover_image')->where('id', $id)->first();


                $file = $this->request->getFile("cover_image");
                if (trim($file) !== '') {
                    // $file = $this->request->getFile("tour_image");
                    $thumbnail = $file->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = "Places" . $newfilename;


                    $image->withFile($file)->save('uploads/tours/itineraries/' . $newfilename, 70);
                    // $image->withFile($file)->save('uploads/tours/' . $newfilename, 70);
                }
                $result = [
                    // 'tours_id' => $tour_id,
                    'day' => $this->request->getPost('day'),
                    'destinations' => $this->request->getPost('destination'),
                    'description' => $this->request->getPost('description'),
                    'breakfast' => $this->request->getPost('breakfast'),
                    'lunch' => $this->request->getPost('lunch'),
                    'dinner' => $this->request->getPost('dinner'),
                ];
                if ($newfilename !== null) {
                    $result['cover_image'] = $newfilename;
                    $this->remFile('uploads/tours/itineraries' . $oldresult['cover_image']);
                }
                $result = $itiModel->update($id, $result);
                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Update an itineraries', "type" => "success"]);
                    return redirect()->to(base_url("/admin/itineraries/" . $tour_id));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => 'Unknown Error'], "type" => "warning"]);
                    return redirect()->to(base_url("/admin/itineraries/" . $tour_id . "/edit/" . $id));
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
        $itiModel = new ItinerariesModel();
        if (!empty($itiModel->select('id')->where('id', $id)->first())) {
            if ($itiModel->delete($id)) {
                $session->setFlashdata('msg', ['msg' => 'Successfully Deleted an Places', 'type' => 'success']);
                return redirect()->to(site_url("admin/itineraries/" . $tour_id));
            } else {
                $session->setFlashdata('invalid_creds', ['errors' => "Something went wrong", 'type' => 'danger']);
                return redirect()->to(site_url("admin/itineraries/" . $tour_id));
            }
        } else {
            $session->setFlashdata('invalid_creds', ['errors' => "Item Not Found", 'type' => 'danger']);
            return redirect()->to(site_url("admin/itineraries/" . $tour_id));
        }
    }
}
