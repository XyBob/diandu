<?php
/**
 * 商家分类模型
 */

class IndustryModel extends Model
{
    // 分类id
    public $industry_id;
   
    /**
     * 构造函数
     * @author 姜伟
     * @param $industry_id 分类ID
     * @return void
     * @todo 初始化分类id
     */
    public function IndustryModel($industry_id)
    {
        parent::__construct('industry');

        if ($industry_id = intval($industry_id))
		{
            $this->industry_id = $industry_id;
		}
    }

    /**
     * 获取分类信息
     * @author 姜伟
     * @param int $industry_id 分类id
     * @param string $fields 要获取的字段名
     * @return array 分类基本信息
     * @todo 根据where查询条件查找分类表中的相关数据并返回
     */
    public function getindustryInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改分类信息
     * @author 姜伟
     * @param array $arr 分类信息数组
     * @return boolean 操作结果
     * @todo 修改分类信息
     */
    public function editindustry($arr)
    {
        return $this->where('industry_id = ' . $this->industry_id)->save($arr);
    }

    /**
     * 添加分类
     * @author 姜伟
     * @param array $arr 分类信息数组
     * @return boolean 操作结果
     * @todo 添加分类
     */
    public function addindustry($arr)
    {
        if (!is_array($arr)) return false;

		//$arr['addtime'] = time();

        return $this->add($arr);
    }

    /**
     * 删除分类
     * @author 姜伟
     * @param int $industry_id 分类ID
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delindustry($industry_id)
    {
        if (!is_numeric($industry_id)) return false;
		return $this->where('industry_id = ' . $industry_id)->delete();
    }

    /**
     * 根据where子句获取分类数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的分类数量
     * @todo 根据where子句获取分类数量
     */
    public function getindustryNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询分类信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 分类基本信息
     * @todo 根据SQL查询字句查询分类信息
     */
    public function getindustryList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit($limit)->select();
    }

}
