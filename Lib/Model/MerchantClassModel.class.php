<?php
/**
 * 商家商品分类模型类
 */

class MerchantClassModel extends BaseModel
{
    // 商家商品分类id
    public $merchant_class_id;
   
    /**
     * 构造函数
     * @author 姜伟
     * @param $merchant_class_id 商家商品分类ID
     * @return void
     * @todo 初始化商家商品分类id
     */
    public function MerchantClassModel($merchant_class_id)
    {
        parent::__construct('merchant_class');

        if ($merchant_class_id = intval($merchant_class_id))
		{
            $this->merchant_class_id = $merchant_class_id;
		}
    }

    /**
     * 获取商家商品分类信息
     * @author 姜伟
     * @param int $merchant_class_id 商家商品分类id
     * @param string $fields 要获取的字段名
     * @return array 商家商品分类基本信息
     * @todo 根据where查询条件查找商家商品分类表中的相关数据并返回
     */
    public function getMerchantClassInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改商家商品分类信息
     * @author 姜伟
     * @param array $arr 商家商品分类信息数组
     * @return boolean 操作结果
     * @todo 修改商家商品分类信息
     */
    public function editMerchantClass($arr)
    {
        return $this->where('merchant_class_id = ' . $this->merchant_class_id)->save($arr);
    }

    /**
     * 添加商家商品分类
     * @author 姜伟
     * @param array $arr 商家商品分类信息数组
     * @return boolean 操作结果
     * @todo 添加商家商品分类
     */
    public function addMerchantClass($arr)
    {
        if (!is_array($arr)) return false;

		$arr['addtime'] = time();

        return $this->add($arr);
    }

    /**
     * 删除商家商品分类
     * @author 姜伟
     * @param int $merchant_class_id 商家商品分类ID
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delMerchantClass($merchant_class_id)
    {
        if (!is_numeric($merchant_class_id)) return false;
		return $this->where('merchant_class_id = ' . $merchant_class_id)->delete();
    }

    /**
     * 根据where子句获取商家商品分类数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的商家商品分类数量
     * @todo 根据where子句获取商家商品分类数量
     */
    public function getMerchantClassNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询商家商品分类信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 商家商品分类基本信息
     * @todo 根据SQL查询字句查询商家商品分类信息
     */
    public function getMerchantClassList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit($limit)->select();
    }

    /**
     * 获取商家商品分类列表页数据信息列表
     * @author 姜伟
     * @param array $merchant_class_list
     * @return array $merchant_class_list
     * @todo 根据传入的$merchant_class_list获取更详细的商家商品分类列表页数据信息列表
     */
    public function getListData($merchant_class_list)
    {
		foreach ($merchant_class_list AS $k => $v)
		{
			//商户信息
			$merchant_obj = new MerchantModel($v['merchant_id']);
			$merchant_info = $merchant_obj->getMerchantInfo('merchant_id = ' . $v['merchant_id'], 'shop_name');
			$merchant_class_list[$k]['shop_name'] = $merchant_info['shop_name'];

			//商品总数
			$item_obj = new ItemModel();
			$merchant_class_list[$k]['item_num'] = $item_obj->getItemNum('isuse != 2 AND merchant_class_id = ' . $v['merchant_class_id']);
		}

		return $merchant_class_list;
    }
}
