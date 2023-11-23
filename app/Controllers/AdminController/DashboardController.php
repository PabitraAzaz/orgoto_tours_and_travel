<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\MessageModel;
use App\Models\Settings;
use App\Models\TourBookModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() === "get") {
            return view('admin/dashboard');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('admin_auth');
        return redirect()->to(base_url('/'));
    }
    public function message()
    {
        $msgModel = new MessageModel();
        $message = $msgModel->orderBy('id', 'desc')->findAll();
        return view('admin/message', ['msg' => $message]);
    }

    public function tour_book()
    {
        $bookModel = new TourBookModel();
        $book = $bookModel->getTour();

        // echo "<pre>";print_r($book);exit;
        return view('admin/booking', ['book' => $book]);
    }
    public function delete_booking($id)
    {
        $session = session();
        $bookModel = new TourBookModel();
        if (!empty($bookModel->select('id')->where('id', $id)->first())) {
            if ($bookModel->delete($id)) {
                $session->setFlashdata('msg', ['msg' => 'Successfully Deleted a Booking', 'type' => 'success']);
                return redirect()->to(site_url("admin/booking"));
            } else {
                $session->setFlashdata('invalid_creds', ['errors' => "Something went wrong", 'type' => 'danger']);
                return redirect()->to(site_url("admin/booking/" . $id));
            }
        } else {
            $session->setFlashdata('invalid_creds', ['errors' => "Booking Info Not Found", 'type' => 'danger']);
            return redirect()->to(site_url("admin/booking/" . $id));
        }
    }
}
