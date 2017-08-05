<?php
/**
 * 商家分类模型类
 */

class BusinessClassifyModel extends Model
{

    /**
     * 构造函数
     * @author 徐永
     * @todo 构造函数
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getBusinessClassifyList($where='',$orderBy=''){
        return $this->where($where)->order($orderBy)->limit()->select();
    }
    //增加商家分类
    public function addBusinessClassify($arr){
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    //编辑商家分类
    public function editBusinessClassify($business_classify_id,$arr){
            return $this->where('business_classify_id = ' . $business_classify_id)->save($arr);
    }

    //编辑商家分类
    public function getBusinessClassifyInfo($business_classify_id){
        return $this->where('business_classify_id = ' . $business_classify_id)->find();
    }
    //编辑商家分类
    public function getBusinessClassifyNum($where){
        return $this->where($where)->count();
    }

}
