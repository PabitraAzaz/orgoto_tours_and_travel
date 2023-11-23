<?php

namespace App\Controllers;

use App\Models\AccomodationModel;
use App\Models\CategoriesModel;
use App\Models\ItinerariesModel;
use App\Models\MessageModel;
use App\Models\PlacesModel;
use App\Models\ReviewsModel;
use App\Models\TourBookModel;
use App\Models\ToursModel;

class Home extends BaseController
{
    public function index(): string
    {
        //Model Load
        $tourModel = new ToursModel();
        $placeModel = new PlacesModel();
        $categoryModel = new CategoriesModel();
        $reviewModel = new ReviewsModel();



        //get value through Model
        $tourdetails = $tourModel->getToursDetails();

        $places = $placeModel->findAll();
        $categories = $categoryModel->findAll();
        $reviews = $reviewModel->findAll();

        // echo "<pre>";print_r($tourdetails);exit;

        $continents = ['asia', 'africa', 'europe', 'north_america', 'south_amrica', 'oseania', 'antarctica'];

        return view('web/home', ['tours' => $tourdetails, 'places' => $places, 'categories' => $categories, 'reviews' => $reviews, 'continents' => $continents]);
    }


    public function tourdetails($id)
    {
        helper('form');

        $tourModel = new ToursModel();
        $placeModel = new PlacesModel();
        $accoModel = new AccomodationModel();
        $itinerariesModel = new ItinerariesModel();
        $tourdetails = $tourModel->getTourDetailsbyId($id);
        $places = $placeModel->select()->where('tours_id', $id)->findAll();
        $acc = $accoModel->select()->where('tours_id', $id)->findAll();
        $iti = $itinerariesModel->select()->where('tours_id', $id)->findAll();

        // echo "<pre>";print_r($tourdetails);exit;


        return view('web/tour-detail', ['tours' => $tourdetails, 'places' => $places, 'accomodation' => $acc, 'iti' => $iti]);
    }

    public function cotactUs()
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {
            return view('web/contact-us');
        } else {
            if ($this->validate(
                [
                    'name' => 'required|max_length[124]',
                    'email' => 'required|max_length[124]',
                    'phone_no' => 'required|max_length[13]',
                    'message' => 'required|max_length[255]',
                    // 'email' => 'required|max_length[124]',
                ],
                [
                    'name' => [
                        'required' => 'Please fill Full Name',
                        'max_length' => 'Full Name is too large'
                    ],
                    'email' => [
                        'required' => 'Please fill email',
                        'max_length' => 'email is too large'
                    ],
                    'phone_no' => [
                        'required' => 'Please fill Phone Number',
                        'max_length' => 'Phone Number is too large'
                    ],
                    'message' => [
                        'required' => 'Please fill Message',
                        'max_length' => 'Message is too large'
                    ],
                ]
            )) {
                $message = new MessageModel();

                $result = $message->save([
                    'full_name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone_no' => $this->request->getPost('phone_no'),
                    'phone' => $this->request->getPost('phone_no'),
                    'message' => $this->request->getPost('message'),
                ]);

                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'Your message was sent, thank you! We will contact you soon.', "type" => "success"]);
                    return redirect()->to(site_url("contact-us"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("contact-us"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();
            }
        }
    }

    public function aboutUs()
    {
        return view('web/about-us');
    }

    public function bookTour($id)
    {
        helper('form');
        $session = session();
        if ($this->request->getMethod() === 'get') {

            $tourModel = new ToursModel();

            $tour = $tourModel->select('title')->where('id', $id)->first();

            return view('web/thank-you', ['tour' => $tour]);
        } else {
            if ($this->validate(
                [
                    'name' => 'required|max_length[124]',
                    'email' => 'required|max_length[124]|valid_email',
                    'phone' => 'required|max_length[13]',
                    'journey_date' => 'required',
                    'people' => 'required',
                    'message' => 'required|max_length[255]',
                ],
                [
                    'name' => [
                        'required' => 'Please fill Full Name',
                        'max_length' => 'Full Name is too large'
                    ],
                    'email' => [
                        'required' => 'Please fill email',
                        'max_length' => 'email is too large',
                        'valid_email' => 'Please Enter a valid email'
                    ],
                    'phone' => [
                        'required' => 'Please fill Phone Number',
                        'max_length' => 'Phone Number is too large'
                    ],
                    'journey_date' => [
                        'required' => 'Please select from Journey Date'
                    ],
                    'people' => [
                        'required' => 'Please fill people'
                    ],
                    'message' => [
                        'required' => 'Please fill Message',
                        'max_length' => 'Message is too large'
                    ],
                ]
            )) {
                $tourBookingModel = new TourBookModel();

                $result = $tourBookingModel->save([
                    'tours_id' => $id,
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone_no' => $this->request->getPost('phone'),
                    'message' => $this->request->getPost('message'),
                    'people' => $this->request->getPost('people'),
                    'journey_date' => $this->request->getPost('journey_date'),
                ]);


                if ($result) {
                    // $session->setFlashdata('msg', ["msg" => 'Your message was sent, thank you! We will contact you soon.', "type" => "success"]);
                    return redirect()->to(base_url("thank-you/" . $id));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("contact-us"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->to(base_url('tour-details/' . $id . '#popup1'))->withInput();
                // return redirect()->back()->withInput();
            }
        }
    }
}
