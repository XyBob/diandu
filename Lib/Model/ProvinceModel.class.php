<?php
/**
 * 地区模型
 * @access public
 * @author 姜伟
 * @Date 2014-05-28
 */
class ProvinceModel extends Model
{
    /**
     * 构造函数
     * @author 姜伟
     * @param $province_id 省份ID
     * @return void
     * @todo 初始化省份id
     */
    public function ProvinceModel($province_id)
    {
        parent::__construct('address_province');

        if ($province_id = intval($province_id))
		{
            $this->province_id = $province_id;
		}
    }

    /**
     * 获取省份信息
     * @author 姜伟
     * @param int $province_id 省份id
     * @param string $fields 要获取的字段名
     * @return array 省份基本信息
     * @todo 根据where查询条件查找省份表中的相关数据并返回
     */
    public function getProvinceInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 根据where子句查询省份信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 省份基本信息
     * @todo 根据SQL查询字句查询省份信息
     */
    public function getProvinceList($fields = '', $where = '', $orderby = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit()->select();
    } 

    /**
     * 获取省份列表页数据信息列表
     * @author 姜伟
     * @param array $province_list
     * @return array $province_list
     * @todo 根据传入的$province_list获取更详细的省份列表页数据信息列表
     */
    public function getListData($province_list)
    {
		$user_obj = new UserModel();
		//$agent_obj = new AgentModel();
		$band_card_obj = new BankCardModel();
		foreach ($province_list AS $k => $v)
		{
			//获取省份名称
			$province = M('address_province');
			$province_list[$k]['province_name'] = $province->where('province_id = ' . $v['province_id'])->getField('province_name');

			//获取省份代理商的账户信息
			if (isset($v['is_open']) && $v['is_open'] == 1)
			{
				$where = 'group_id = 1 AND area_id = 0 AND province_id = ' . $v['province_id'] . ' AND role_type = ' . UserModel::ROLE_CITY_AGENT;
				$user_obj = new UserModel();
				$user_info = $user_obj->getUserInfo('user_id, realname, mobile, username, id', $where);
				$province_list[$k]['realname'] = $user_info['realname'] ? $user_info['realname'] : '';
				$province_list[$k]['mobile'] = $user_info['mobile'] ? $user_info['mobile'] : '';
				$province_list[$k]['username'] = $user_info['username'] ? $user_info['username'] : '';
				$province_list[$k]['id'] = $user_info['id'] ? $user_info['id'] : '';
				//银行卡信息
				$card_info = $band_card_obj->getBankCardInfo('user_id = ' . $user_info['user_id'], '');
				if ($card_info)
				{
					$province_list[$k]['bank_realname'] = $card_info['realname'] ? $card_info['realname'] : '';
					$province_list[$k]['openning_bank'] = $card_info['opening_bank'] ? $card_info['opening_bank'] : '';
					$province_list[$k]['bank_account'] = $card_info['account'] ? $card_info['account'] : '';
				}
//				$agent_info = $agent_obj->getAgentInfo('agent_id = ' . $user_info['user_id'], '');
//				if($agent_info) {
//					$province_list[$k] = array_merge($agent_info, $province_list[$k]);
//				}
			}
		}

		return $province_list;
    }

    /**
     * 根据where子句获取省份数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的省份数量
     * @todo 根据where子句获取省份数量
     */
    public function getProvinceNum($where = '')
    {
        return $this->where($where)->count();
    }
    
    /**
     * 修改省份信息
     * @author 姜伟
     * @param array $arr 省份信息数组
     * @return boolean 操作结果
     * @todo 修改省份信息
     */
    public function editProvince($arr)
    {
        return $this->where('province_id = ' . $this->province_id)->save($arr);
    }

	public static function getProvinceString($province_id, $province_id, $province_id = 0)
	{
		$province_string = '';
		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$province_string .= $province_name ? $province_name : '';

		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$province_string .= $province_name ? ' ' . $province_name : '';

		//地区
		$province_name = '';
		if ($province_id)
		{
			$province_obj = M('address_province');
			$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
			$province_string .= $province_name ? ' ' . $province_name : '';
		}

		return $province_string . ' ';
	}

	public static function getProvince_id($province_id = 0, $province_id = 0, $province_id = 0)
	{
		$province_string = array();
		
		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$province_string['province_name'] = $province_name ? $province_name : '';
		
		

		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$province_string['province_name'] = $province_name ? $province_name : '';

		//地区
		$province_name = '';
		
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$province_string['province_name'] = $province_name ? $province_name : '';
		

		return $province_string;
	}

	//获取根据拼音分组的区县列表
	function getProvinceListGroupByPy()
	{
		$province_obj = M('address_province');
		$province_list = $province_obj->field('province_id, province_name, py')->where('py != ""')->order('py ASC')->select();
		$new_province_list = array();
		foreach ($province_list AS $k => $v)
		{
			$py = $v['py'];
			unset($v['py']);
			$new_province_list[$py][] = $v;
		}

		return $new_province_list;
	}

	//用百度地图IP地址获取当前用户地图坐标
	function getLocation()
	{
		$ip = get_client_ip();
		$url = 'http://api.map.baidu.com/location/ip?ak=hnNZPbMZkO4FyKXDyxoV0iFj&coor=bd09ll&ip=' . $ip;
		#$url = 'http://api.map.baidu.com/location/ip?ak=hnNZPbMZkO4FyKXDyxoV0iFj&coor=bd09ll';
		$content = file_get_contents($url);
		$content = json_decode($content, true);
		return array(
			'lon'	=> $content['content']['point']['x'],
			'lat'	=> $content['content']['point']['y'],
		);
	}

	//根据省份名称和区县名称获取区县ID
	function getProvinceID($province, $province)
	{
		//初始化
		$province_id = 0;
		$province_id = 0;

		//获取province_id
		$province_obj = M('address_province');
		$province_id = $province_obj->where('province_name = "' . $province . '"')->getField('province_id');
		if (!$province_id)
		{
			return 0;
		}

		//获取province_id
		$province_obj = M('address_province');
		$province_id = $province_obj->where('province_name = "' . $province . '"' . ' AND province_id = ' . $province_id)->getField('province_id');
		return $province_id ? $province_id : 0;
	}

	//获取省份是否开通
	function getProvinceIsOpen($province_id)
	{
		//获取province_id
		$province_obj = M('address_province');
		$is_open = $province_obj->where('province_id = ' . $province_id)->getField('is_open');
		return $is_open;
	}

    /**
     * 开通新省份相关处理
     * @author 姜伟
     * @param $province_id 省份ID
     * @return void
     * @todo 开通省份代理商账号，导入配置项、默认商家分类信息、默认用户等级、默认镖师等级
     */
    public function openNewProvince($arr)
    {
		$province_id = intval($arr['province_id']);
		$province_id = self::getProvinceId($province_id);
		$province_id = self::getProvinceId($province_id);

		//开通省份，省份
		$province_obj = M('address_province');
		$save_arr = array(
				'is_open'	=> 1
				);
		$province_obj->where('province_id = ' . $province_id)->save($save_arr);

		$province_obj = M('address_province');
		$save_arr = array(
				'is_open'	=> 1
				);
		$province_obj->where('province_id = ' . $province_id)->save($save_arr);

		//开通省份代理商账号
		$arr['role_type'] = UserModel::ROLE_CITY_AGENT;
		$arr['province_id'] = $province_id;
		$arr['province_id'] = $province_id;
		$arr['province_id'] = $province_id;
		$arr['group_id'] = 1;
		$user_obj = new UserModel();
		$user_obj->addUser($arr);

		/*** 导入配置项begin ***/
		$config_obj = new ConfigBaseModel();
		$config_info = $GLOBALS['config_info'];
		$black_list = $config_obj->black_list;
		foreach ($black_list AS $k => $v)
		{
			unset($config_info[strtoupper($v)]);
		}

		$arr = array();
		$i = 0;
		foreach ($config_info AS $k => $v)
		{
			$arr[$i]['config_name'] = strtolower($k);
			$arr[$i]['config_value'] = $v;
			$arr[$i]['province_id'] = $province_id;
			$arr[$i]['province_id'] = $province_id;
			$arr[$i]['province_id'] = $province_id;
			$i ++;
		}
		$config_obj->addAll($arr);
		#echo "<pre>";
		#print_r($arr);
		#echo $config_obj->getLastSql() . "<br>";
		/*** 导入配置项end ***/

		/*** 商家分类导入begin ***/
		$class_obj = new ClassModel();
		$class_list = $class_obj->getClassList('province_id = 0');
		if (!$class_list)
		{
			$class_list = $class_obj->getClassList('province_id = 330382');
		}
		foreach ($class_list AS $k => $v)
		{
			unset($class_list[$k]['class_id']);
			$class_list[$k]['province_id'] = $province_id;
			$class_list[$k]['province_id'] = $province_id;
			$class_list[$k]['province_id'] = $province_id;
		}
		$class_obj->addAll($class_list);
		#echo "<pre>";
		#print_r($class_list);
		#echo $class_obj->getLastSql() . "<br>";
		/*** 商家分类导入end ***/

		/*** 镖师等级导入begin ***/
		$foot_man_rank_obj = new FootManRankModel();
		$foot_man_rank_list = $foot_man_rank_obj->getFootManRankList('', 'province_id = 0');
		if (!$foot_man_rank_list)
		{
			$foot_man_rank_list = $foot_man_rank_obj->getFootManRankList('', 'province_id = 330382');
		}
		foreach ($foot_man_rank_list AS $k => $v)
		{
			unset($foot_man_rank_list[$k]['foot_man_rank_id']);
			$foot_man_rank_list[$k]['province_id'] = $province_id;
			$foot_man_rank_list[$k]['province_id'] = $province_id;
			$foot_man_rank_list[$k]['province_id'] = $province_id;
		}
		$foot_man_rank_obj->addAll($foot_man_rank_list);
		#echo $foot_man_rank_obj->getLastSql();
		#echo "<pre>";
		#print_r($foot_man_rank_list);
		#die;
		/*** 镖师等级导入end ***/
	}
}
