<?php
/**
 * 商品一级分类模型类
 */

class LikeModel extends Model
{
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($like_id=0)
    {
        parent::__construct();
        $this->like_id = $like_id;
    }

    public function getLikeNum($where='') {
        return $this->where($where)->count();
    }


    public function addLike($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }


    public function delLike($where)
    {
        return $this->where($where)->delete();
    }

    public function getLikeInfo($where){
        return $this->where($where)->find();
    }
    public function getLikeUserList($where){
        $user_obj=new UserModel();
        $user_like_list=$this->field('*')
            ->join("left JOIN {$user_obj->getTableName()} on {$user_obj->getTableName()}.user_id={$this->getTableName()}.user_id")
            ->where($where)
            ->select();
        return $user_like_list;
    }

    public function getLikeList($where){

        return $this->where($where)->field('user_id')->select();
    }

    public function getUserIdList($fields,$where){
        return $this->field($fields)->where($where)->select();
    }


}
