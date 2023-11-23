<?php

namespace App\Models;

use CodeIgniter\Model;

class TourBookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tour_bookings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tours_id', 'name', 'email', 'phone_no', 'message', 'people', 'journey_date'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTour()
    {
        $result = $this->select('tour_bookings.id as id , tour_bookings.name as name , tour_bookings.email as email , tour_bookings.phone_no as phone_no ,tour_bookings.message as message , tour_bookings.people as people, tour_bookings.journey_date as journey_date ,tours.title as title')->join('tours', 'tour_bookings.tours_id=tours.id')->findAll();

        return $result;
    }
}
