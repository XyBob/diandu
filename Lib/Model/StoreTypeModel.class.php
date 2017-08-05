<?php
/**
 * 商家分类模型
 */

class StoreTypeModel extends Model
{
    // 分类图片id
    public $business_classify_id;
   
    /**
     * 构造函数
     * @author 姜伟
     * @param $business_classify_id 分类图片ID
     * @return void
     * @todo 初始化分类图片id
     */
    public function StoreTypeModel($business_classify_id)
    {
        parent::__construct('business_classify');

        if ($business_classify_id = intval($business_classify_id))
		{
            $this->business_classify_id = $business_classify_id;
		}
    }

    /**
     * 获取分类图片信息
     * @author 姜伟
     * @param int $business_classify_id 分类图片id
     * @param string $fields 要获取的字段名
     * @return array 分类图片基本信息
     * @todo 根据where查询条件查找分类图片表中的相关数据并返回
     */
    public function getStoreTypeInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改分类图片信息
     * @author 姜伟
     * @param array $arr 分类图片信息数组
     * @return boolean 操作结果
     * @todo 修改分类图片信息
     */
    public function editStoreType($arr)
    {
        return $this->where('business_classify_id = ' . $this->business_classify_id)->save($arr);
    }

    /**
     * 添加分类图片
     * @author 姜伟
     * @param array $arr 分类图片信息数组
     * @return boolean 操作结果
     * @todo 添加分类图片
     */
    public function addStoreType($arr)
    {
        if (!is_array($arr)) return false;

		//$arr['addtime'] = time();

        return $this->add($arr);
    }

    /**
     * 删除分类图片
     * @author 姜伟
     * @param int $business_classify_id 分类图片ID
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delStoreType($business_classify_id)
    {
        if (!is_numeric($business_classify_id)) return false;
		return $this->where('business_classify_id = ' . $business_classify_id)->delete();
    }

    /**
     * 根据where子句获取分类图片数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的分类图片数量
     * @todo 根据where子句获取分类图片数量
     */
    public function getStoreTypeNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询分类图片信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 分类图片基本信息
     * @todo 根据SQL查询字句查询分类图片信息
     */
    public function getStoreTypeList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit()->select();
    }

    /**
     * 获取分类图片列表页数据信息列表
     * @author 姜伟
     * @param array $cust_flash_list
     * @return array $cust_flash_list
     * @todo 根据传入的$cust_flash_list获取更详细的分类图片列表页数据信息列表
     */
    public function getListData($cust_flash_list)
    {
		foreach ($cust_flash_list AS $k => $v)
		{
			//产品名称
			$item_obj = new ItemModel($v['item_id']);
			$item_info = $item_obj->getItemInfo('item_id = ' . $v['item_id'], 'item_name, isuse, stock, mall_price, base_pic');
			$cust_flash_list[$k]['item_name'] = $item_info['item_name'];
			$cust_flash_list[$k]['mall_price'] = $item_info['mall_price'];
			$cust_flash_list[$k]['small_pic'] = $item_info['base_pic'];

			$status = '';
			if ($item_info['isuse'] == 0)
			{
				$status = '已下架';
			}
			elseif ($item_info['isuse'] == 1)
			{
				$status = $item_info['stock'] ? '上架中' : '缺货';
			}
			$cust_flash_list[$k]['status'] = $status;
		}

		return $cust_flash_list;
    }
}
