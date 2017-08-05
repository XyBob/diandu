<?php
class ArticleTxtModel extends Model
{
    public function ArticleTxtModel()
    {
        parent::__construct('article_txt');

    }

    //单条信息
    public function getArticleTxtInfo($where, $fields = '')
    {
        return $this->field($fields)->where($where)->find();
    }
    //获取列表
    public function getArticleTxtList($fields = '', $where = '', $orderby = '', $groupby = '')
    {
        return $this->field($fields)->where($where)->group($groupby)->order($orderby)->limit()->select();
    }
    //获取数量
    public function getArticleTxtNum($where='')
    {
        $count = $this->where($where)->count();
        return $count;
    }
    //增加文章内容
    public function addArticleTxt($arr){
        return $this->add($arr);
    }

    //删除信息
    public function delArticleTxt($information_id){
        return $this->where('article_id = '.$information_id)->delete();
    }
    //修改信息
    public function editArticleTxt($article_id,$arr){
        return $this->where('article_id = ' . $article_id)->save($arr);
    }
}