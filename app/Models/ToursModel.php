<?php

namespace App\Models;

use CodeIgniter\Model;

class ToursModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'categories', 'continent', 'cover_image', 'title', 'short_description', 'price', 'duration', 'journey_date_1', 'journey_date_2', 'journey_date_3', 'trip_map_description', 'trip_map_image'
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


    public function getToursDetails()
    {
        $result = $this->select('tours.id as tours_id, tours.cover_image as tour_cover_image ,tours.continent as continent, tours.title as tours_title , tours.short_description  as tours_sh_desc ,tours.price as tours_price , tours.duration as tours_duration, tours.journey_date_1 as tours_j1 , tours.journey_date_2 as tours_j2 , tours.journey_date_3 as tours_j3, tours.trip_map_description as tours_trip_map_description, tours.trip_map_image as tours_tmap , categories.name as c_name')->join('categories', 'tours.categories = categories.id')->findAll();

        return $result;
    }

    public function getTourDetailsbyId($tour_id)
    {
        $result = $this->select('tours.id as tours_id , tours.categories as tours_cat , tours.cover_image as tours_c_image , tours.title as tours_title , tours.short_description as tours_sh_desc , tours.price as tours_price , tours.duration as tours_duration ,tours.journey_date_1 as tours_j1 , tours.journey_date_2 as tours_j2 ,tours.journey_date_3 as tours_j3,tours.trip_map_description as tours_tmap_desc ,tours.trip_map_image as tours_tmap_image, categories.name as c_name')->join('categories', 'tours.categories = categories.id')->where('tours.id', $tour_id)->first();

        return $result;
    }
}
