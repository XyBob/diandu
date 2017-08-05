<?php
/**
 * 地区模型
 * @access public
 * @author 姜伟
 * @Date 2014-05-28
 */
class CityModel extends Model
{
    /**
     * 构造函数
     * @author 姜伟
     * @param $city_id 城市ID
     * @return void
     * @todo 初始化城市id
     */
    public function CityModel($city_id)
    {
        parent::__construct('address_city');

        if ($city_id = intval($city_id))
		{
            $this->city_id = $city_id;
		}
    }

    /**
     * 获取城市信息
     * @author 姜伟
     * @param int $city_id 城市id
     * @param string $fields 要获取的字段名
     * @return array 城市基本信息
     * @todo 根据where查询条件查找城市表中的相关数据并返回
     */
    public function getCityInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 根据where子句查询城市信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 城市基本信息
     * @todo 根据SQL查询字句查询城市信息
     */
    public function getCityList($fields = '', $where = '', $orderby = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit()->select();
    } 

    /**
     * 获取城市列表页数据信息列表
     * @author 姜伟
     * @param array $city_list
     * @return array $city_list
     * @todo 根据传入的$city_list获取更详细的城市列表页数据信息列表
     */
    public function getListData($city_list)
    {
		$user_obj = new UserModel();
		//$agent_obj = new AgentModel();
		$band_card_obj = new BankCardModel();
		foreach ($city_list AS $k => $v)
		{
			//获取省份名称
			$province = M('address_province');
			$city_list[$k]['province_name'] = $province->where('province_id = ' . $v['province_id'])->getField('province_name');

			//获取城市代理商的账户信息
			if (isset($v['is_open']) && $v['is_open'] == 1)
			{
				$where = 'group_id = 1 AND area_id = 0 AND city_id = ' . $v['city_id'] . ' AND role_type = ' . UserModel::ROLE_CITY_AGENT;
				$user_obj = new UserModel();
				$user_info = $user_obj->getUserInfo('user_id, realname, mobile, username, id', $where);
				$city_list[$k]['realname'] = $user_info['realname'] ? $user_info['realname'] : '';
				$city_list[$k]['mobile'] = $user_info['mobile'] ? $user_info['mobile'] : '';
				$city_list[$k]['username'] = $user_info['username'] ? $user_info['username'] : '';
				$city_list[$k]['id'] = $user_info['id'] ? $user_info['id'] : '';
				//银行卡信息
				$card_info = $band_card_obj->getBankCardInfo('user_id = ' . $user_info['user_id'], '');
				if ($card_info)
				{
					$province_list[$k]['bank_realname'] = $card_info['realname'] ? $card_info['realname'] : '';
					$province_list[$k]['openning_bank'] = $card_info['opening_bank'] ? $card_info['opening_bank'] : '';
					$province_list[$k]['bank_account'] = $card_info['account'] ? $card_info['account'] : '';
				}
//				$agent_info = $agent_obj->getAgentInfo('agent_id = ' . $user_info['user_id'], '');
//				if ($agent_info)
//				{
//					$city_list[$k] = array_merge($agent_info, $city_list[$k]);
//				}
			}
		}

		return $city_list;
    }

    /**
     * 根据where子句获取城市数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的城市数量
     * @todo 根据where子句获取城市数量
     */
    public function getCityNum($where = '')
    {
        return $this->where($where)->count();
    }
    
    /**
     * 修改城市信息
     * @author 姜伟
     * @param array $arr 城市信息数组
     * @return boolean 操作结果
     * @todo 修改城市信息
     */
    public function editCity($arr)
    {
        return $this->where('city_id = ' . $this->city_id)->save($arr);
    }

	public static function getCityString($province_id, $city_id, $city_id = 0)
	{
		$city_string = '';
		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$city_string .= $province_name ? $province_name : '';

		//城市
		$city_obj = M('address_city');
		$city_name = $city_obj->where('city_id = ' . intval($city_id))->getField('city_name');
		$city_string .= $city_name ? ' ' . $city_name : '';

		//地区
		$city_name = '';
		if ($city_id)
		{
			$city_obj = M('address_city');
			$city_name = $city_obj->where('city_id = ' . intval($city_id))->getField('city_name');
			$city_string .= $city_name ? ' ' . $city_name : '';
		}

		return $city_string . ' ';
	}

	public static function getProvince_id($province_id = 0, $city_id = 0, $city_id = 0)
	{
		$city_string = array();
		
		//省份
		$province_obj = M('address_province');
		$province_name = $province_obj->where('province_id = ' . intval($province_id))->getField('province_name');
		$city_string['province_name'] = $province_name ? $province_name : '';
		
		

		//城市
		$city_obj = M('address_city');
		$city_name = $city_obj->where('city_id = ' . intval($city_id))->getField('city_name');
		$city_string['city_name'] = $city_name ? $city_name : '';

		//地区
		$city_name = '';
		
		$city_obj = M('address_city');
		$city_name = $city_obj->where('city_id = ' . intval($city_id))->getField('city_name');
		$city_string['city_name'] = $city_name ? $city_name : '';
		

		return $city_string;
	}

	//获取根据拼音分组的区县列表
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
	function getCityID($city, $city)
	{
		//初始化
		$city_id = 0;
		$city_id = 0;

		//获取city_id
		$city_obj = M('address_city');
		$city_id = $city_obj->where('city_name = "' . $city . '"')->getField('city_id');
		if (!$city_id)
		{
			return 0;
		}

		//获取city_id
		$city_obj = M('address_city');
		$city_id = $city_obj->where('city_name = "' . $city . '"' . ' AND city_id = ' . $city_id)->getField('city_id');
		return $city_id ? $city_id : 0;
	}

	//获取城市是否开通
	function getCityIsOpen($city_id)
	{
		//获取city_id
		$city_obj = M('address_city');
		$is_open = $city_obj->where('city_id = ' . $city_id)->getField('is_open');
		return $is_open;
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
     * @param $city_id 城市ID
     * @return void
     * @todo 开通城市代理商账号，导入配置项、默认商家分类信息、默认用户等级、默认镖师等级
     */
    public function openNewCity($arr)
    {
		$city_id = intval($arr['city_id']);
		$city_id = self::getCityId($city_id);
		$province_id = self::getProvinceId($city_id);

		//开通省份，城市
		$province_obj = M('address_province');
		$save_arr = array(
				'is_open'	=> 1
				);
		$province_obj->where('province_id = ' . $province_id)->save($save_arr);

		$city_obj = M('address_city');
		$save_arr = array(
				'is_open'	=> 1
				);
		$city_obj->where('city_id = ' . $city_id)->save($save_arr);

		//开通城市代理商账号
		$arr['role_type'] = UserModel::ROLE_CITY_AGENT;
		$arr['province_id'] = $province_id;
		$arr['city_id'] = $city_id;
		$arr['city_id'] = $city_id;
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
			$arr[$i]['city_id'] = $city_id;
			$arr[$i]['city_id'] = $city_id;
			$i ++;
		}
		$config_obj->addAll($arr);
		#echo "<pre>";
		#print_r($arr);
		#echo $config_obj->getLastSql() . "<br>";
		/*** 导入配置项end ***/

		/*** 商家分类导入begin ***/
		$class_obj = new ClassModel();
		$class_list = $class_obj->getClassList('city_id = 0');
		if (!$class_list)
		{
			$class_list = $class_obj->getClassList('city_id = 330382');
		}
		foreach ($class_list AS $k => $v)
		{
			unset($class_list[$k]['class_id']);
			$class_list[$k]['province_id'] = $province_id;
			$class_list[$k]['city_id'] = $city_id;
			$class_list[$k]['city_id'] = $city_id;
		}
		$class_obj->addAll($class_list);
		#echo "<pre>";
		#print_r($class_list);
		#echo $class_obj->getLastSql() . "<br>";
		/*** 商家分类导入end ***/

		/*** 镖师等级导入begin ***/
		$foot_man_rank_obj = new FootManRankModel();
		$foot_man_rank_list = $foot_man_rank_obj->getFootManRankList('', 'city_id = 0');
		if (!$foot_man_rank_list)
		{
			$foot_man_rank_list = $foot_man_rank_obj->getFootManRankList('', 'city_id = 330382');
		}
		foreach ($foot_man_rank_list AS $k => $v)
		{
			unset($foot_man_rank_list[$k]['foot_man_rank_id']);
			$foot_man_rank_list[$k]['province_id'] = $province_id;
			$foot_man_rank_list[$k]['city_id'] = $city_id;
			$foot_man_rank_list[$k]['city_id'] = $city_id;
		}
		$foot_man_rank_obj->addAll($foot_man_rank_list);
		#echo $foot_man_rank_obj->getLastSql();
		#echo "<pre>";
		#print_r($foot_man_rank_list);
		#die;
		/*** 镖师等级导入end ***/
	}
}
