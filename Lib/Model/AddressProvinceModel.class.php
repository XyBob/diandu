<?php

class AddressProvinceModel extends Model
{
    public function __construct()
    {
        parent::__construct('address_province');
    }
    public function getProvinceList($where=''){

        return $this->where($where)->select();
    }
    public function getProvinceName($province_id){

        return $this->where('province_id = '. $province_id)->getField('province_name');
    }
    public function getProvinceInfo($province_id){
        return $this->where('province_id = '.$province_id)->find();
    }
}