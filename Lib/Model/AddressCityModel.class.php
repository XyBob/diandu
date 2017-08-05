<?php

class AddressCityModel extends Model
{
    public function __construct()
    {
        parent::__construct('address_city');
    }
    public function getCityList($where=''){

        return $this->where($where)->select();
    }

    public function getCity($province_id){
        if(!is_numeric($province_id)){
            return false;
        }
        return $this->where('province_id = '.$province_id)->select();
    }
    public function getCityName($city_id){

        return $this->where('city_id = '.$city_id)->getField('city_name');
    }
    public function getCityInfo($city_id){
        return $this->where('city_id = '.$city_id)->find();
    }


}