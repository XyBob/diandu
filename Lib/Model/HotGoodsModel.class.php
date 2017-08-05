<?php
/**
 * 人气商品模型类
 */

class HotGoodsModel extends Model
{
    // 人气商品id
    public $hot_goods_id;
   
    /**
     * 构造函数
     * @author 姜伟
     * @param $hot_goods_id 人气商品ID
     * @return void
     * @todo 初始化人气商品id
     */
    public function HotGoodsModel($hot_goods_id)
    {
        parent::__construct('hot_goods');

        if ($hot_goods_id = intval($hot_goods_id))
		{
            $this->hot_goods_id = $hot_goods_id;
		}
    }

    /**
     * 获取人气商品信息
     * @author 姜伟
     * @param int $hot_goods_id 人气商品id
     * @param string $fields 要获取的字段名
     * @return array 人气商品基本信息
     * @todo 根据where查询条件查找人气商品表中的相关数据并返回
     */
    public function getHotGoodsInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改人气商品信息
     * @author 姜伟
     * @param array $arr 人气商品信息数组
     * @return boolean 操作结果
     * @todo 修改人气商品信息
     */
    public function editHotGoods($arr)
    {
        return $this->where('hot_goods_id = ' . $this->hot_goods_id)->save($arr);
    }

    /**
     * 添加人气商品
     * @author 姜伟
     * @param array $arr 人气商品信息数组
     * @return boolean 操作结果
     * @todo 添加人气商品
     */
    public function addHotGoods($arr)
    {
        if (!is_array($arr)) return false;

		$arr['addtime'] = time();

        return $this->add($arr);
    }

    /**
     * 删除人气商品
     * @author 姜伟
     * @param int $hot_goods_id 人气商品ID
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delHotGoods($hot_goods_id)
    {
        if (!is_numeric($hot_goods_id)) return false;
		return $this->where('hot_goods_id = ' . $hot_goods_id)->delete();
    }

    /**
     * 根据where子句获取人气商品数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的人气商品数量
     * @todo 根据where子句获取人气商品数量
     */
    public function getHotGoodsNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询人气商品信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 人气商品基本信息
     * @todo 根据SQL查询字句查询人气商品信息
     */
    public function getHotGoodsList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit($limit)->select();
    }

    /**
     * 获取人气商品列表页数据信息列表
     * @author 姜伟
     * @param array $hot_goods_list
     * @return array $hot_goods_list
     * @todo 根据传入的$hot_goods_list获取更详细的人气商品列表页数据信息列表
     */
    public function getListData($hot_goods_list)
    {
		foreach ($hot_goods_list AS $k => $v)
		{
			//产品名称
			$item_obj = new ItemModel($v['item_id']);
			$item_info = $item_obj->getItemInfo('item_id = ' . $v['item_id'], 'item_name, isuse, stock, mall_price, base_pic');
			$hot_goods_list[$k]['item_name'] = $item_info['item_name'];
			$hot_goods_list[$k]['mall_price'] = $item_info['mall_price'];
			$hot_goods_list[$k]['small_pic'] = $item_info['base_pic'];

			$status = '';
			if ($item_info['isuse'] == 0)
			{
				$status = '已下架';
			}
			elseif ($item_info['isuse'] == 1)
			{
				$status = $item_info['stock'] ? '上架中' : '缺货';
			}
			$hot_goods_list[$k]['status'] = $status;
		}

		return $hot_goods_list;
    }
}
