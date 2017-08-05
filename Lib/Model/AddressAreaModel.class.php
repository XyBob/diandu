<?php

class AddressAreaModel extends Model
{
    public function __construct()
    {
        parent::__construct('address_area');
    }
    public function getAreaList($where=''){
        return $this->where($where)->select();
    }

    public function getAreaNum($where){
        return $this->where($where)->count();
    }

    public function getArea($city_id){
        if(!is_numeric($city_id)){
            return false;
        }
        return $this->where('city_id = '.$city_id)->select();
    }

    public function getAreaName($area_id){

        return $this->where('area_id = '.$area_id)->getField('area_name');
    }
    public function closeArea($area_id){

        return $this->where('area_id = '.$area_id)->save(array('is_open'=>0));
    }
    public function openArea($area_id){
        return $this->where('area_id = '.$area_id)->save(array('is_open'=>1));
    }

    public function getAreaInfo($area_id){
        return $this->where('area_id = '.$area_id)->find();
    }


}