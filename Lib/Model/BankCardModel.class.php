<?php
/**
 * 商家分类模型类
 */

class BankCardModel extends Model
{

    /**
     * 构造函数
     * @author 徐永
     * @todo 构造函数
     */
    public function __construct()
    {
        parent::__construct('bank_card');
    }

    //数量
    public function getBankCardNum($where=''){
        return $this->where($where)->count();
    }

    public function getBankCardList($where='',$orderBy=''){
        return $this->where($where)->order($orderBy)->limit()->select();
    }

    public function getBankCardInfo($where=''){
        return $this->where($where)->find();
    }
    //增加银行卡
    public function addBankCard($arr){
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    //编辑银行卡
    public function editBankCard($bank_card_id,$arr){
        return $this->where('bank_card_id = ' . $bank_card_id)->save($arr);
    }

    //删除银行卡
    public function delBankCard($bank_card_id){
        return $this->where('bank_card_id = '.$bank_card_id)->delete();
   }
    //联表获取结果
    public function unionGetBankCardList($where='',$orderBy=''){
        $data=$this->field('tp_bank_card.*,tp_bank_card.realname as bank_card_realname')
            ->join('left JOIN '.M('users')->getTableName().' as l on l.user_id = tp_bank_card.user_id')
            ->where($where)
            ->order($orderBy)
            ->limit()
            ->select();
        //return M('bank_card as h')->getLastSql();
        return $data;
    }

    public function unionGetBankCardNum($where='',$orderBy=''){
        $count=M('bank_card as h')->field()
            ->join('left JOIN '.M('users')->getTableName().' as l on l.user_id = h.user_id')
            ->where($where)
            ->order($orderBy)
            ->count();
        return $count;
    }


}
