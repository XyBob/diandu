<?php
/**
 * 修改分享优惠券详情
 */

class ShareModel extends Model
{

    /**
     * 构造函数
     * @return void
     */
    public function DiscountMinusModel()
    {
        parent::__construct('share_describe');

    }
    //获取分享优惠券信息
    public function getShareInfo(){
        return $this->find();
    }
    //修改分享优惠券信息
    public function changeShareInfo($where,$arr){

        if($this->where($where)->save($arr)){
            return true;
        }else{
            return false;
        }
    }
    //增加分享优惠券信息
    public function addShare($arr){

        if($this->add($arr)){
            return true;
        }else{
            return false;
        }
    }
}