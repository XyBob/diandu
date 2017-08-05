<?php
/**
 * 合伙人模型类
 */

class AgentModel extends Model
{
    // 合伙人id
    public $agent_id;

    protected $_validate = array(
        array('bank_account', 'require', '请输入卡号！'),
        array('bank_name', 'require', '请输入银行名称！'),
        array('openning_bank', 'require', '请输入开户行！'),
        array('bank_realname', 'require', '请输入持卡人姓名！'),
        array('bank_mobile',  '/^((400[0-9]{7})|(800[0-9]{7})|(1[34578]{1}\d{9})|((0[0-9]{2,3}[\-]?)?([0-9]{6,8})+(\-[0-9]{1,4})?))$/','请输入正确联系人手机号'),
    );
   
    /**
     * 构造函数
     * @author 姜伟
     * @param $agent_id 合伙人ID
     * @return void
     * @todo 初始化合伙人id
     */
    public function AgentModel($agent_id)
    {
        parent::__construct('agent');

        if ($agent_id = intval($agent_id))
		{
            $this->agent_id = $agent_id;
		}
    }

    /**
     * 获取合伙人信息
     * @author 姜伟
     * @param int $agent_id 合伙人id
     * @param string $fields 要获取的字段名
     * @return array 合伙人基本信息
     * @todo 根据where查询条件查找合伙人表中的相关数据并返回
     */
    public function getAgentInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改合伙人信息
     * @author 姜伟
     * @param array $arr 合伙人信息数组
     * @return boolean 操作结果
     * @todo 修改合伙人信息
     */
    public function editAgent($arr)
    {
        return $this->where('agent_id = ' . $this->agent_id)->save($arr);
    }

    /**
     * 添加合伙人
     * @author 姜伟
     * @param array $arr 合伙人信息数组
     * @return boolean 操作结果
     * @todo 添加合伙人
     */
    public function addAgent($arr)
    {
        if (!is_array($arr)) return false;

		$arr['addtime'] = time();

        return $this->add($arr);
    }

    /**
     * 删除合伙人
     * @author 姜伟
     * @param int $agent_id 合伙人ID
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delAgent($agent_id)
    {
        if (!is_numeric($agent_id)) return false;
        return $this->where('agent_id = ' . $agent_id)->save(array('isuse' => 2));
    }

    /**
     * 根据where子句获取合伙人数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的合伙人数量
     * @todo 根据where子句获取合伙人数量
     */
    public function getAgentNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询合伙人信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 合伙人基本信息
     * @todo 根据SQL查询字句查询合伙人信息
     */
    public function getAgentList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit()->select();
    }

    /**
     * 获取合伙人列表页数据信息列表
     * @author 姜伟
     * @param array $agent_list
     * @return array $agent_list
     * @todo 根据传入的$agent_list获取更详细的合伙人列表页数据信息列表
     */
    public function getListData($agent_list)
    {
        require_cache('Common/func_item.php');

		foreach ($agent_list AS $k => $v)
		{
			//产品名称
			$item_obj = new ItemModel($v['item_id']);
			$item_info = $item_obj->getItemInfo('item_id = ' . $v['item_id'], 'item_name, isuse, stock, mall_price, base_pic, is_gift');
			$agent_list[$k]['item_name']  = $item_info['item_name'];
            $agent_list[$k]['mall_price'] = $item_info['mall_price'];
			$agent_list[$k]['is_gift']    = $item_info['is_gift'];
			$agent_list[$k]['small_pic']  = small_img($item_info['base_pic']);

			$status = '';
			if ($item_info['isuse'] == 0)
			{
				$status = '已下架';
			}
			elseif ($item_info['isuse'] == 1)
			{
				$status = $item_info['stock'] ? '上架中' : '缺货';
			}
			$agent_list[$k]['status'] = $status;
		}

		return $agent_list;
    }
}
