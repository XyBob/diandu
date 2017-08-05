<?php
/**
 * 人气商品模型类
 */

class HotSearchModel extends Model
{

    public function HotSearchModel()
    {
        parent::__construct('hot_search');

    }

    public function getHotSearchList($where,$group){
        return $this->where($where)->group($group)->select();
    }

    public function getHotSearchNum($where,$group){
        return $this->where($where)->group($group)->count();
    }

    public function addHotSearch($arr){
        return $this->add($arr);
    }

    public function getHotSearchInfo($where){
        return $this->where($where)->find();
    }
    public function editHotSearch($arr,$id){
        return $this->where('hot_search_id = '.$id)->save($arr);
    }
    public function delHotSearch($id){
        return $this->where('hot_search_id = '.$id)->delete();
    }

}