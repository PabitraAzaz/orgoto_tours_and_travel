<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\AccomodationModel;
use App\Models\CategoriesModel;
use App\Models\ItinerariesModel;
use App\Models\ToursModel;

class TourController extends BaseController
{
    public function index()
    {
        $tourModel = new ToursModel();

        $tour = $tourModel->select('tours.id as tours_id,tours.cover_image as cover_image , tours.title as title , tours.price as price, categories.name as name')->orderBy('tours.id', 'desc')->join('categories', 'tours.categories=categories.id')->findAll();
        return view('admin/tour/index', ['tour' => $tour]);
    }

    public function create()
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {
            $catModel = new CategoriesModel();
            $cat = $catModel->findAll();
            return view('admin/tour/create', ['cat' => $cat]);
        } else {
            $image = \Config\Services::image();

            if ($this->validate(
                [
                    'tour_image' => 'uploaded[tour_image]|is_image[tour_image]|mime_in[tour_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[tour_image, 2048]',
                    'trip_map_image' => 'uploaded[trip_map_image]|is_image[trip_map_image]|mime_in[trip_map_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[trip_map_image, 2048]',
                    'category' => 'required',
                    'continent' => 'required',
                    'title' => 'required|max_length[124]',
                    'sh_desc' => 'required|max_length[124]',
                    'price' => 'required|max_length[124]',
                    'duration' => 'required|max_length[124]',
                    'j_d_1' => 'required|max_length[124]',
                    'j_d_2' => 'permit_empty|max_length[124]',
                    'j_d_3' => 'permit_empty|max_length[124]',
                    'trip_map_description' => 'required|max_length[124]',
                ],
                [
                    'tour_image' => [
                        // 'required'=>'Please upload a image',
                        'uploaded' => 'Please upload an Tour image',
                        'is_image' => 'Please upload a valid Image type of Tour Image',
                        'mime_in' => 'Please upload a valid image type of Tour Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Tour Image'
                    ],
                    'trip_map_image' => [
                        // 'required'=>'Please upload a image',
                        'uploaded' => 'Please upload an Trip image',
                        'is_image' => 'Please upload a valid Image type of Trip Image',
                        'mime_in' => 'Please upload a valid image type of Trip Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Trip Image'
                    ],
                    'category' => [
                        'required' => 'Please Select Category Name',
                    ],
                    'continent' => [
                        'required' => 'Please Select Continent',
                    ],
                    'title' => [
                        'required' => 'Please fill Title',
                        'max_length' => 'Title is too large'
                    ],
                    'sh_desc' => [
                        'required' => 'Please fill Short Desccription',
                        'max_length' => 'Short Desccription is too large'
                    ],
                    'price' => [
                        'required' => 'Please fill Price',
                        'max_length' => 'Price is too large'
                    ],
                    'duration' => [
                        'required' => 'Please fill Duration',
                        'max_length' => 'Duration is too large'
                    ],
                    'j_d_1' => [
                        'required' => 'Please fill Journey Date (One)',
                        'max_length' => 'Journey Date (One) is too large'
                    ],
                    'j_d_2' => [
                        // 'required' => 'Please fill Journey Date (Two)',
                        'max_length' => 'Journey Date (Two) is too large'
                    ],
                    'j_d_3' => [
                        // 'required' => 'Please fill Journey Date (Three)',
                        'max_length' => 'Journey Date (Three) is too large'
                    ],
                    'trip_map_description' => [
                        'required' => 'Please fill Trip Map Description',
                        'max_length' => 'Trip Map Description is too large'
                    ],
                ]
            )) {
                $tourModel = new ToursModel();

                $tourFile = $this->request->getFile("tour_image");
                if (trim($tourFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $tourFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tourFileName = round(microtime(true)) . '.' . end($temp);
                    $tourFileName = "Tour_" . $tourFileName;
                }
                $thumbnail = null;
                $temp = null;
                $image->withFile($tourFile)->save('uploads/tours/' . $tourFileName, 70);


                $tripFile = $this->request->getFile("trip_map_image");
                if (trim($tripFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $tripFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tripFileName = round(microtime(true)) . '.' . end($temp);
                    $tripFileName = "Tour_Trip" . $tripFileName;
                }
                $image->withFile($tourFile)->save('uploads/tours/tripmaps/' . $tripFileName, 70);

                $result = $tourModel->save([
                    'cover_image' => $tourFileName,
                    'trip_map_image' => $tripFileName,
                    'title' => $this->request->getPost('title'),
                    'categories' => $this->request->getPost('category'),
                    'short_description' => $this->request->getPost('sh_desc'),
                    'price' => $this->request->getPost('price'),
                    'duration' => $this->request->getPost('duration'),
                    'journey_date_1' => $this->request->getPost('j_d_1'),
                    'journey_date_2' => $this->request->getPost('j_d_2'),
                    'journey_date_3' => $this->request->getPost('j_d_3'),
                    'trip_map_description' => $this->request->getPost('trip_map_description'),
                ]);

                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add an Tour', "type" => "success"]);
                    return redirect()->to(site_url("admin/tours"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/tours/create"));
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
            $tourModel = new ToursModel();
            $catModel = new CategoriesModel();
            $accoModel = new AccomodationModel();
            $ittiModel = new ItinerariesModel();


            $tour = $tourModel->where('id', $id)->first();
            $cat = $catModel->findAll();
            $acc = $accoModel->where('id', $id)->first();
            $iti = $ittiModel->where('id', $id)->first();

            return view('admin/tour/edit', ['tour' => $tour, 'cat' => $cat, 'acc' => $acc, 'iti' => $iti]);
        } else {
            $image = \Config\Services::image();
            $session = session();

            // echo '<pre>';
            // print_r($_FILES);exit;

            if ($this->validate(
                [
                    'tour_image' => 'is_image[tour_image]|mime_in[tour_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[tour_image, 2048]',
                    'trip_map_image' => 'is_image[trip_map_image]|mime_in[trip_map_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[trip_map_image, 2048]',
                    'category' => 'required',
                    'continent' => 'required',
                    'title' => 'required|max_length[124]',
                    'sh_desc' => 'required|max_length[124]',
                    'price' => 'required|max_length[124]',
                    'duration' => 'required|max_length[124]',
                    'j_d_1' => 'required|max_length[124]',
                    'j_d_2' => 'permit_empty|max_length[124]',
                    'j_d_3' => 'permit_empty|max_length[124]',
                    'trip_map_description' => 'required|max_length[124]',
                ],
                [
                    'tour_image' => [
                        'is_image' => 'Please upload a valid Image type',
                        'mime_in' => 'Please upload a valid image type',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB'
                    ],

                    'trip_map_image' => [
                        'is_image' => 'Please upload a valid Image type',
                        'mime_in' => 'Please upload a valid image type',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB'
                    ],

                    'category' => [
                        'required' => 'Please Select Category Name',
                    ],
                    'continent' => [
                        'required' => 'Please Select Continent',
                    ],
                    'title' => [
                        'required' => 'Please fill Title',
                        'max_length' => 'Title is too large'
                    ],
                    'sh_desc' => [
                        'required' => 'Please fill Short Desccription',
                        'max_length' => 'Short Desccription is too large'
                    ],
                    'price' => [
                        'required' => 'Please fill Price',
                        'max_length' => 'Price is too large'
                    ],
                    'duration' => [
                        'required' => 'Please fill Duration',
                        'max_length' => 'Duration is too large'
                    ],
                    'j_d_1' => [
                        'required' => 'Please fill Journey Date (One)',
                        'max_length' => 'Journey Date (One) is too large'
                    ],
                    'j_d_2' => [
                        // 'required' => 'Please fill Journey Date (Two)',
                        'max_length' => 'Journey Date (Two) is too large'
                    ],
                    'j_d_3' => [
                        // 'required' => 'Please fill Journey Date (Three)',
                        'max_length' => 'Journey Date (Three) is too large'
                    ],
                    'trip_map_description' => [
                        'required' => 'Please fill Trip Map Description',
                        'max_length' => 'Trip Map Description is too large'
                    ],
                ]
            )) {


                $newfilename = null;
                $newfilename1  = null;

                $tourModel = new ToursModel();
                $oldresult = $tourModel->select('cover_image,trip_map_image')->where('id', $id)->first();


                $file = $this->request->getFile("tour_image");
                if (trim($file) !== '') {
                    // $file = $this->request->getFile("tour_image");
                    $thumbnail = $file->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = "Tour_-" . $newfilename;


                    $image->withFile($file)->save('uploads/tours/' . $newfilename, 70);
                }

                $side_image1 = $this->request->getFile("trip_map_image");
                if (trim($side_image1) !== '') {
                    // $file = $this->request->getFile("trip_map_image");
                    $thumbnail = $side_image1->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename1 = round(microtime(true)) . '.' . end($temp);
                    $newfilename1 = "Tour_Trip_-" . $newfilename1;
                    $image->withFile($side_image1)->save('uploads/tours/tripmaps/' . $newfilename1, 70);
                }



                $result = [
                    'title' => $this->request->getPost('title'),
                    'categories' => $this->request->getPost('category'),
                    'short_description' => $this->request->getPost('sh_desc'),
                    'price' => $this->request->getPost('price'),
                    'duration' => $this->request->getPost('duration'),
                    'journey_date_1' => $this->request->getPost('j_d_1'),
                    'journey_date_2' => $this->request->getPost('j_d_2'),
                    'journey_date_3' => $this->request->getPost('j_d_3'),
                    'trip_map_description' => $this->request->getPost('trip_map_description'),
                ];



                if ($newfilename !== null) {
                    $result['cover_image'] = $newfilename;
                    $this->remFile('uploads/tours/' . $oldresult['cover_image']);
                }

                if ($newfilename1 !== null) {
                    $result['trip_map_image'] = $newfilename1;
                    $this->remFile('uploads/tours/tripmaps/' . $oldresult['trip_map_image']);
                }
                $result = $tourModel->update($id, $result);

                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Update a Tour', "type" => "success"]);
                    return redirect()->to(base_url("/admin/tours/edit/" . $id));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => 'Unknown Error'], "type" => "warning"]);
                    return redirect()->to(base_url("/admin/tours/edit/" . $id));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->to(base_url("/admin/tours/edit/" . $id));
            }
        }
    }



    public function delete($id)
    {
        $session = session();
        $itiModel = new ToursModel();
        if (!empty($itiModel->select('id')->where('id', $id)->first())) {
            if ($itiModel->delete($id)) {
                $session->setFlashdata('msg', ['msg' => 'Successfully Deleted a Tour', 'type' => 'success']);
                return redirect()->to(site_url("admin/tours"));
            } else {
                $session->setFlashdata('invalid_creds', ['errors' => "Something went wrong", 'type' => 'danger']);
                return redirect()->to(site_url("admin/tours/" . $id));
            }
        } else {
            $session->setFlashdata('invalid_creds', ['errors' => "Category Not Found", 'type' => 'danger']);
            return redirect()->to(site_url("admin/tours/" . $id));
        }
    }
}
