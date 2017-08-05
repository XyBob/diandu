<?php
/**
 * 地区模型
 * @access public
 * @author 姜伟
 * @Date 2014-05-28
 */
class AreaModel extends Model
{
	/**
	 * 构造函数
	 * @author 姜伟
	 * @param $area_id 区/县ID
	 * @return void
	 * @todo 初始化区/县id
	 */
	public function AreaModel($area_id)
	{
		parent::__construct('address_area');

		if ($area_id = intval($area_id))
		{
			$this->area_id = $area_id;
		}
	}

	/**
	 * 获取区/县信息
	 * @author 姜伟
	 * @param int $area_id 区/县id
	 * @param string $fields 要获取的字段名
	 * @return array 区/县基本信息
	 * @todo 根据where查询条件查找区/县表中的相关数据并返回
	 */
	public function getAreaInfo($where, $fields = '')
	{
		return $this->field($fields)->where($where)->find();
	}

	/**
	 * 根据where子句查询区/县信息
	 * @author 姜伟
	 * @param string $fields
	 * @param string $where
	 * @param string $orderby
	 * @param string $limit
	 * @return array 区/县基本信息
	 * @todo 根据SQL查询字句查询区/县信息
	 */
	public function getAreaList($fields = '', $where = '', $orderby = '')
	{
		return $this->field($fields)->where($where)->order($orderby)->limit()->select();
	}

	/**
	 * 获取区/县列表页数据信息列表
	 * @author 姜伟
	 * @param array $area_list
	 * @return array $area_list
	 * @todo 根据传入的$area_list获取更详细的区/县列表页数据信息列表
	 */
	public function getListData($area_list)
	{
		$user_obj = new UserModel();
		//$agent_obj = new AgentModel();
		$band_card_obj = new BankCardModel();
		foreach ($area_list AS $k => $v)
		{
			//获取城市名称
			$city = M('address_city');
			$city_info = $city->field('city_name, province_id')->where('city_id = ' . $v['city_id'])->find();
			$area_list[$k]['city_name'] = $city_info['city_name'];
			//获取省份名称
			$province = M('address_province');
			$area_list[$k]['province_name'] = $province->where('province_id = ' . $city_info['province_id'])->getField('province_name');

			//获取城市代理商的账户信息
			if (isset($v['is_open']) && $v['is_open'] == 1)
			{
				$where = 'group_id = 1 AND area_id = ' . $v['area_id'] . ' AND role_type = ' . UserModel::ROLE_CITY_AGENT;
				$user_obj = new UserModel();
				$user_info = $user_obj->getUserInfo('user_id, realname, mobile, username, id', $where);
				$area_list[$k]['realname'] = $user_info['realname'] ? $user_info['realname'] : '';
				$area_list[$k]['mobile'] = $user_info['mobile'] ? $user_info['mobile'] : '';
				$area_list[$k]['username'] = $user_info['username'] ? $user_info['username'] : '';
				$area_list[$k]['id'] = $user_info['id'] ? $user_info['id'] : '';
				//银行卡信息
				$card_info = $band_card_obj->getBankCardInfo('user_id = ' . $user_info['user_id'], '');
				if ($card_info)
				{
					$province_list[$k]['bank_realname'] = $card_info['realname'] ? $card_info['realname'] : '';
					$province_list[$k]['openning_bank'] = $card_info['opening_bank'] ? $card_info['opening_bank'] : '';
					$province_list[$k]['bank_account'] = $card_info['account'] ? $card_info['account'] : '';
				}
//				$agent_info = $agent_obj->getAgentInfo('agent_id = ' . $user_info['user_id'], '');
//				$area_list[$k] = array_merge($agent_info, $area_list[$k]);
			}
		}

		return $area_list;
	}

	/**
	 * 根据where子句获取区/县数量
	 * @author 姜伟
	 * @param string|array $where where子句
	 * @return int 满足条件的区/县数量
	 * @todo 根据where子句获取区/县数量
	 */
	public function getAreaNum($where = '')
	{
		return $this->where($where)->count();
	}

	/**
	 * 修改区/县信息
	 * @author 姜伟
	 * @param array $arr 区/县信息数组
	 * @return boolean 操作结果
	 * @todo 修改区/县信息
	 */
	public function editArea($arr)
	{
		return $this->where('area_id = ' . $this->area_id)->save($arr);
	}

	public static function getAreaString($province_id, $city_id, $area_id = 0)
	{
		$area_string = '';
		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$area_string .= $province_name ? $province_name : '';

		//城市
		$city_obj = M('address_city');
		$city_name = $city_obj->where('city_id = ' . intval($city_id))->getField('city_name');
		$area_string .= $city_name ? ' ' . $city_name : '';

		//地区
		$area_name = '';
		if ($area_id)
		{
			$area_obj = M('address_area');
			$area_name = $area_obj->where('area_id = ' . intval($area_id))->getField('area_name');
			$area_string .= $area_name ? ' ' . $area_name : '';
		}

		return $area_string . ' ';
	}

	public static function getProvince_id($province_id = 0, $city_id = 0, $area_id = 0)
	{
		$area_string = array();

		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$area_string['province_name'] = $province_name ? $province_name : '';



		//城市
		$city_obj = M('address_city');
		$city_name = $city_obj->where('city_id = ' . intval($city_id))->getField('city_name');
		$area_string['city_name'] = $city_name ? $city_name : '';

		//地区
		$area_name = '';

		$area_obj = M('address_area');
		$area_name = $area_obj->where('area_id = ' . intval($area_id))->getField('area_name');
		$area_string['area_name'] = $area_name ? $area_name : '';


		return $area_string;
	}

	//获取根据拼音分组的城市列表
	function getCityListGroupByPy()
	{
		$city_obj = M('address_city');
		$city_list = $city_obj->field('city_id, city_name, py')->where('py != ""')->order('py ASC')->select();
		$new_city_list = array();
		foreach ($city_list AS $k => $v)
		{
			$py = $v['py'];
			unset($v['py']);
			$new_city_list[$py][] = $v;
		}

		return $new_city_list;
	}

	//获取根据拼音分组的区县列表
	function getAreaListGroupByPy()
	{
		$area_obj = M('address_area');
		$area_list = $area_obj->field('area_id, area_name, py')->where('py != ""')->order('py ASC')->select();
		$new_area_list = array();
		foreach ($area_list AS $k => $v)
		{
			$py = $v['py'];
			unset($v['py']);
			$new_area_list[$py][] = $v;
		}

		return $new_area_list;
	}

	//获取已开通城市列表
	function getOpenedCityList()
	{
		$city_obj = M('address_city');
		$city_list = $city_obj->field('city_id, city_name')->where('is_open = 1')->select();
		return $city_list;
	}

	//获取已开通区县列表
	function getOpenedAreaList($where = '')
	{
		$area_obj = M('address_area');
		$area_list = $area_obj->field('area_id, area_name')->where('is_open = 1' . $where)->select();
		return $area_list;
	}

	//获取热门城市列表
	function getHotCityList()
	{
		$city_obj = M('address_city');
		$city_list = $city_obj->field('city_id, city_name')->where('city_id IN (' . $GLOBALS['config_info']['HOT_CITY'] . ')')->select();
		return $city_list;
	}

	//获取热门区县列表
	function getHotAreaList()
	{
		$area_obj = M('address_area');
		$area_list = $area_obj->field('area_id, area_name')->where('area_id IN (' . $GLOBALS['config_info']['HOT_CITY'] . ')')->select();
		return $area_list;
	}

	//获取默认城市
	function getDefaultCity()
	{
		//默认城市算法:若用户设置过默认城市,则为默认的城市;若用户未设置过默认城市,则为最近一次访问过的城市;若用户第一次访问则取用户IP所在城市,若该城市未开通,则取管理员设置的默认城市
		$city_change_log_obj = new CityChangeLogModel();
		$area_info = $city_change_log_obj->getCityChangeLogInfo('user_id = ' . intval(session('user_id')), 'end_area_id', 'addtime DESC');
		return $area_info ? $area_info['end_area_id'] : 0;
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

	//根据城市名称和区县名称获取区县ID
	function getAreaID($area, $city)
	{
		//初始化
		$area_id = 0;
		$city_id = 0;

		//获取city_id
		$city_obj = M('address_city');
		$city_id = $city_obj->where('city_name = "' . $city . '"')->getField('city_id');
		if (!$city_id)
		{
			return 0;
		}

		//获取area_id
		$area_obj = M('address_area');
		$area_id = $area_obj->where('area_name = "' . $area . '"' . ' AND city_id = ' . $city_id)->getField('area_id');
		return $area_id ? $area_id : 0;
	}

	//获取城市是否开通
	function getAreaIsOpen($area_id)
	{
		//获取area_id
		$area_obj = M('address_area');
		$is_open = $area_obj->where('area_id = ' . $area_id)->getField('is_open');
		return $is_open;
	}

	//根据area_id获取city_id
	public static function getCityId($area_id)
	{
		$area_obj = M('address_area');
		$city_id = $area_obj->where('area_id = ' . intval($area_id))->getField('city_id');

		return intval($city_id);
	}

	//根据city_id获取province_id
	public static function getProvinceId($city_id)
	{
		$city_obj = M('address_city');
		$province_id = $city_obj->where('city_id = ' . intval($city_id))->getField('province_id');

		return intval($province_id);
	}

	/**
	 * 开通新城市相关处理
	 * @author 姜伟
	 * @param $area_id 区/县ID
	 * @return void
	 * @todo 开通城市代理商账号，导入配置项、默认商家分类信息、默认用户等级、默认镖师等级
	 */
	public function openNewCity($user_info, $agent_info)
	{
		$province_id = $user_info['province_id'];
		$city_id = $user_info['city_id'];
		$area_id = $user_info['area_id'];
		/*** 保存省市县信息begin ***/
		//保存内容
		$data = array(
				'is_open'	=> 1,
				'addtime'	=> time(),
		);
		if ($area_id)
		{
			$user_info['is_area_agent'] = 1;
			$area_obj = new AreaModel($area_id);
			//是否已开通
			$num = $area_obj->getAreaNum('is_open = 1 AND area_id = ' . $area_id);
			if ($num)
			{
				return array(
						'msg'	=> '抱歉，该区/县已开通',
						'code'	=> -1,
				);
			}
			$success = $area_obj->editArea($data);
		}
		elseif ($city_id)
		{
			$user_info['is_city_agent'] = 1;
			$city_obj = new CityModel($city_id);
			//是否已开通
			$num = $city_obj->getCityNum('is_open = 1 AND city_id = ' . $city_id);
			if ($num)
			{
				return array(
						'msg'	=> '抱歉，该城市已开通',
						'code'	=> -1,
				);
			}
			$success = $city_obj->editCity($data);
		}
		elseif ($province_id)
		{
			$user_info['is_province_agent'] = 1;
			$province_obj = new ProvinceModel($province_id);
			//是否已开通
			$num = $province_obj->getProvinceNum('is_open = 1 AND province_id = ' . $province_id);
			if ($num)
			{
				return array(
						'msg'	=> '抱歉，该省份已开通',
						'code'	=> -1,
				);
			}
			$success = $province_obj->editProvince($data);
		}
		/*** 保存省市县信息begin ***/

		//开通城市代理商账号
		//查看省份已有账号
		$user_obj = new UserModel();
		$where = 'group_id = 1 AND role_type = ' . UserModel::ROLE_CITY_AGENT;
		$where .= $area_id ? ' AND area_id = ' . $area_id : ' AND area_id = 0' . ($city_id ? ' AND city_id = ' . $city_id : 'c AND city_id = 0 AND province_id = ' . $province_id);
		$fields = 'user_id';
		$result = $user_obj->getUserInfo($fields, $where);
		$user_id = 0;
		if ($result)
		{
			$user_id = $result['user_id'];
			//已存在，修改
			$user_obj = new UserModel($result['user_id']);
			$user_info['is_enable'] = 1;
			$user_obj->editUserInfo($user_info);

			//修改代理商信息
			//$agent_obj = new AgentModel($result['user_id']);
			//$agent_obj->editAgent($agent_info);
		}
		else
		{
			$user_info['role_type'] = UserModel::ROLE_CITY_AGENT;
			$user_info['group_id'] = 1;
			$user_info['is_enable'] = 1;
			$user_obj = new UserModel();
			$user_id = $user_obj->addUser($user_info);

			//添加代理商信息
			//$agent_obj = new AgentModel();
			//$agent_info['agent_id'] = $user_id;
			//$agent_obj->addAgent($agent_info);
		}
#echo $user_obj->getLastSql() . "<br>";
#echo $agent_obj->getLastSql() . "<br>";
#die;
		$data = array(
			'user_id'	=> $user_id
		     );
		if ($area_id)
		{
			$area_obj = new AreaModel($area_id);
			$success = $area_obj->editArea($data);
		}
		elseif ($city_id)
		{
			$city_obj = new CityModel($city_id);
			$success = $city_obj->editCity($data);
		}
		elseif ($province_id)
		{
			$province_obj = new ProvinceModel($province_id);
			$success = $province_obj->editProvince($data);
		}
		return array(
				'code'	=> 0
		);
	}

	//根据省份名称和城市名称获取省份和城市ID
	function getIdByName($province, $city)
	{
		//初始化
		$province_id = 0;
		$city_id = 0;

		//获取city_id
		$city_obj = M('address_city');
		$city_info = $city_obj->field('city_id, province_id')->where('city_name LIKE "' . $city . '%"')->find();
		log_file($city_info . ' sql = ' . $city_obj->getLastSql(), 'wxpay');

		return $city_info;
	}
}
