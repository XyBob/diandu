<?php
/**
 * 登录日志模型类
 */

class LoginLogModel extends Model
{
    // 登录日志id
    public $login_log_id;
   
    /**
     * 构造函数
     * @author 姜伟
     * @param $login_log_id 登录日志ID
     * @return void
     * @todo 初始化登录日志id
     */
    public function LoginLogModel($login_log_id)
    {
        parent::__construct('login_log');

        if ($login_log_id = intval($login_log_id))
		{
            $this->login_log_id = $login_log_id;
		}
    }

    /**
     * 获取登录日志信息
     * @author 姜伟
     * @param int $login_log_id 登录日志id
     * @param string $fields 要获取的字段名
     * @return array 登录日志基本信息
     * @todo 根据where查询条件查找登录日志表中的相关数据并返回
     */
    public function getLoginLogInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改登录日志信息
     * @author 姜伟
     * @param array $arr 登录日志信息数组
     * @return boolean 操作结果
     * @todo 修改登录日志信息
     */
    public function editLoginLog($arr)
    {
        return $this->where('login_log_id = ' . $this->login_log_id)->save($arr);
    }

    /**
     * 添加登录日志
     * @author 姜伟
     * @param array $arr 登录日志信息数组
     * @return boolean 操作结果
     * @todo 添加登录日志
     */
    public function addLoginLog($arr)
    {
        if (!is_array($arr)) return false;

		$arr['login_time'] = time();

        return $this->add($arr);
    }

    /**
     * 删除登录日志
     * @author 姜伟
     * @param int $login_log_id 登录日志ID
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delLoginLog($login_log_id)
    {
        if (!is_numeric($login_log_id)) return false;
        return $this->where('login_log_id = ' . $login_log_id)->save(array('isuse' => 2));
    }

    /**
     * 根据where子句获取登录日志数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的登录日志数量
     * @todo 根据where子句获取登录日志数量
     */
    public function getLoginLogNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询登录日志信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 登录日志基本信息
     * @todo 根据SQL查询字句查询登录日志信息
     */
    public function getLoginLogList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit($limit)->select();
    }

    /**
     * 获取登录日志列表页数据信息列表
     * @author 姜伟
     * @param array $login_log_list
     * @return array $login_log_list
     * @todo 根据传入的$login_log_list获取更详细的登录日志列表页数据信息列表
     */
    public function getListData($login_log_list)
    {
		foreach ($login_log_list AS $k => $v)
		{
			$login_log_list[$k]['link_login_log'] = U('/FrontLoginLog/login_log_detail/login_log_id/' . $v['login_log_id']);
			//产品名称
			$item_obj = new ItemModel($v['item_id']);
			$item_info = $item_obj->getItemInfo('item_id = ' . $v['item_id'], 'item_name');
			$login_log_list[$k]['item_name'] = $item_info['item_name'];
			$status = '';
			if ($v['isuse'] == 0)
			{
				$status = '已下架';
			}
			else
			{
				$status = '上架中';
			}
			$login_log_list[$k]['status'] = $status;
		}

		return $login_log_list;
    }
}
