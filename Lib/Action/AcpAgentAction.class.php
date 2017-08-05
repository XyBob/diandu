<?php
/**
 * 合伙人管理
 * 
 *
 */
class AcpAgentAction extends AcpAction
{
	/**
     * 构造函数
     * @return void
     * @todo
     */
	public function AcpAgentAction()
	{
		parent::_initialize();
	}

	/**
     * 所有省份列表
     * @author 姜伟
     * @return void
     * @todo 从role表取出数据
     */
	public function all_province()
	{
        //分页处理
        import('ORG.Util.Pagelist');
		//获取总数
		$province_obj = new ProvinceModel();
        $count = $province_obj->getProvinceNum();
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
		$province_obj->setStart($Page->firstRow);
        $province_obj->setLimit($Page->listRows);
        $show = $Page->show();
		$province_list = $province_obj->getProvinceList('is_open, province_name, province_id, addtime', '', 'is_open DESC');
		$province_list = $province_obj->getListData($province_list);
		#echo $province_obj->getLastSql();
		#dump($city_list);
		#echo "<pre>";
		#print_r($province_list);
		#die;

		$this->assign('province_list', $province_list);
		$this->assign('show', $show);
		$this->assign('head_title', '已开通省份');
		$this->display('opened_province');
	}

	/**
     * 已开通省份列表
     * @author 姜伟
     * @return void
     * @todo 从role表取出数据
     */
	public function opened_province()
	{
        //分页处理
        import('ORG.Util.Pagelist');
		//获取总数
		$where = 'is_open = 1';
		$province_obj = new ProvinceModel();
        $count = $province_obj->getProvinceNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
		$province_obj->setStart($Page->firstRow);
        $province_obj->setLimit($Page->listRows);
        $show = $Page->show();
		$province_list = $province_obj->getProvinceList('is_open, province_name, province_id, addtime', $where, 'addtime DESC');
		#echo $province_obj->getLastSql();
		#dump($city_list);
		$province_list = $province_obj->getListData($province_list);
		#echo "<pre>";
		#print_r($province_list);
		#die;

		$this->assign('province_list', $province_list);
		$this->assign('show', $show);
		$this->assign('head_title', '已开通省份');
		$this->display();
	}

	/**
     * 已开通城市列表
     * @author 姜伟
     * @return void
     * @todo 从role表取出数据
     */
	public function opened_city()
	{
        //分页处理
        import('ORG.Util.Pagelist');
		//获取总数
		$where = 'is_open = 1';
		$city_obj = new CityModel();
        $count = $city_obj->getCityNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
		$city_obj->setStart($Page->firstRow);
        $city_obj->setLimit($Page->listRows);
        $show = $Page->show();
		$city_list = $city_obj->getCityList('is_open, city_name, city_id, addtime, province_id', $where, 'addtime DESC');
		#echo $city_obj->getLastSql();
		#dump($city_list);
		$city_list = $city_obj->getListData($city_list);
		#echo "<pre>";
		#print_r($city_list);
		#die;

		$this->assign('city_list', $city_list);
		$this->assign('show', $show);
		$this->assign('head_title', '已开通城市');
		$this->display();
	}
	
	/**
     * 已开通区县列表
     * @author 姜伟
     * @return void
     * @todo 从role表取出数据
     */
	public function opened_area()
	{
        //分页处理
        import('ORG.Util.Pagelist');
		//获取总数
		$where = 'is_open = 1';
		$area_obj = new AreaModel();
        $count = $area_obj->getAreaNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
		$area_obj->setStart($Page->firstRow);
        $area_obj->setLimit($Page->listRows);
        $show = $Page->show();
		$area_list = $area_obj->getAreaList('is_open, area_name, area_id, addtime, city_id', $where, 'addtime DESC');
		#echo $area_obj->getLastSql();
		#dump($area_list);
		$area_list = $area_obj->getListData($area_list);
		#echo "<pre>";
		#print_r($area_list);
		#die;

		$this->assign('area_list', $area_list);
		$this->assign('show', $show);
		$this->assign('head_title', '已开通区县');
		$this->display();
	}

	/**
	 * 关闭城市
	 * @author 姜伟
	 * @param void
	 * @return void
	 * @todo 关闭城市
	 */
	public function closeCity()
	{
		$province_id = intval($this->_post('province_id'));
		$city_id = intval($this->_post('city_id'));
		$area_id = intval($this->_post('area_id'));

		if ($province_id)
		{
			//查看省份下面是否有开通的城市
			$city_obj = new CityModel();
			$city_num = $city_obj->getCityNum('is_open = 1 AND province_id = ' . $province_id);
			if ($city_num)
			{
				$this->json_exit('抱歉，该省份下辖尚有' . $city_num . '个城市开通着，无法删除该城市', -1);
			}

			$province_obj = new ProvinceModel($province_id);
			$arr = array(
				'is_open'	=> 0
			);
			$success = $province_obj->editProvince($arr);

			//修改合伙人状态
			$user_obj = new UserModel();
			$arr = array(
				'is_enable' => 0,
			);
			$user_obj->where('role_type = 5 AND city_id = 0 AND area_id = 0 AND province_id = ' . $province_id)->save($arr);

			$arr = array(
				'msg'	=> $success ? '关闭成功' : '关闭失败',
				'code'	=> $success ? 0 : -1,
			);
			$this->json_exit($arr);
		}

		if ($city_id)
		{
			//查看省份下面是否有开通的区县
			$area_obj = new AreaModel();
			$area_num = $area_obj->getAreaNum('is_open = 1 AND city_id = ' . $city_id);
			if ($area_num)
			{
				$this->json_exit('抱歉，该城市下辖尚有' . $area_num . '个区/县开通着，无法删除该城市', -1);
			}

			$city_obj = new CityModel($city_id);
			$arr = array(
				'is_open'	=> 0
			);
			$success = $city_obj->editCity($arr);

			//修改合伙人状态
			$user_obj = new UserModel();
			$arr = array(
				'is_enable' => 0,
			);
			$user_obj->where('role_type = 5 AND area_id = 0 AND city_id = ' . $city_id)->save($arr);

			$arr = array(
				'msg'	=> $success ? '关闭成功' : '关闭失败',
				'code'	=> $success ? 0 : -1,
			);
			$this->json_exit($arr);
		}

		if ($area_id)
		{
			$area_obj = new AreaModel($area_id);
			$arr = array(
				'is_open'	=> 0
			);
			$success = $area_obj->editArea($arr);

			//修改合伙人状态
			$user_obj = new UserModel();
			$arr = array(
				'is_enable' => 0,
			);
			$user_obj->where('role_type = 5 AND area_id = ' . $area_id)->save($arr);

			$arr = array(
				'msg'	=> $success ? '关闭成功' : '关闭失败',
				'code'	=> $success ? 0 : -1,
			);
			$this->json_exit($arr);
		}

		echo 'failure';
		exit;
	}
	
	/**
	 * @access public
     * @todo 开通新城市
     * @return void
     * @author 姜伟
     */
	public function add_agent()
	{
		$act = $this->_post('act');
		if($act == 'save')		//提交保存时
		{
			$province_id		= intval($this->_post('province_id'));
			$city_id			= intval($this->_post('city_id'));
			$area_id			= intval($this->_post('area_id'));
			$realname			= $this->_post('realname');
			$mobile				= $this->_post('mobile');
			$username			= $this->_post('username');
			$password			= $this->_post('password');
			$pay_password		= $this->_post('pay_password');
			$address		= $this->_post('address');
			$id		= $this->_post('id');
			$bank_name		= $this->_post('bank_name');
			$bank_account		= $this->_post('bank_account');
			$bank_realname		= $this->_post('bank_realname');
			$openning_bank		= $this->_post('openning_bank');
			$bank_mobile		= $this->_post('bank_mobile');
//			$agent_type		= $this->_post('agent_type');

			if(!$province_id && !$city_id && !$area_id)
			{
				$this->error('对不起, 请选择代理的省/市/县');
			}

			if(!$realname)
			{
				$this->error('对不起，请输入联系人姓名');
			}

			if(!$mobile)
			{
				$this->error('对不起，请填写手机号');
			}
			else
			{
				if($mobile && !checkMobile($mobile))
				{
					$this->error('对不起，手机号格式不正确');
				}
			}
			
			if(!$username)
			{
				$this->error('对不起，请指定一个登录名');
			}
			else
			{
				$UserModel = new UserModel();
				$num = $UserModel->getUserNum('username = "' . $username . '"');
				if($num)
				{
					$this->error('对不起，该登录名已经存在，请重新指定');
				}
			}

			if(!$password)	//如果未指定密码，则密码默认等同于用户名
			{
				$password = $username;
			}
			else
			{
				if(strlen($password) < 6)
				{
					$this->error('对不起，密码不能少于6位');
				}
			}
	
			if(!$pay_password)	//如果未指定密码，则密码默认等同于用户名
			{
				$pay_password = $username;
			}
			else
			{
				if(strlen($pay_password) < 6)
				{
					$this->error('对不起，支付密码不能少于6位');
				}
			}

			if(!$address)
			{
				$this->error('对不起，请输入联系地址');
			}

			/*if(!$id)
			{
				$this->error('对不起，请输入身份证号');
			}

			if(!$bank_name)
			{
				$this->error('对不起，请输入开户银行');
			}

			if(!$bank_account)
			{
				$this->error('对不起，请输入银行卡号');
			}

			if(!$bank_realname)
			{
				$this->error('对不起，请输入持卡人姓名');
			}

			if(!$openning_bank)
			{
				$this->error('对不起，请输入开户支行');
			}

			if(!$bank_mobile)
			{
				$this->error('对不起，请输入预留手机号');
			}*/

			$user_info = array(
				'username'		=> $username,
				'password'		=> md5($password),
				'pay_password'	=> md5($pay_password),
				'realname'		=> $realname,
				'mobile'		=> $mobile,
				'id'			=> (string) $id,
				'address'		=> $address,
				'province_id'	=> $province_id,
				'city_id'		=> $city_id,
				'area_id'		=> $area_id,
			);

			$agent_info = array(
//				'agent_type'	=> $agent_type,
				'bank_name'	=> (string) $bank_name,
				'bank_account'	=> (string) $bank_account,
				'bank_realname'	=> (string) $bank_realname,
				'openning_bank'	=> (string) $openning_bank,
				'bank_mobile'	=> (string) $bank_mobile,
			);
			$area_obj = new AreaModel();
			$result = $area_obj->openNewCity($user_info, $agent_info);
			if ($result['code'] == 0)
			{
				if ($area_id)
				{
					$this->success('恭喜你，区/县开通成功!', '/AcpAgent/opened_area');
				}
				elseif ($city_id)
				{
					$this->success('恭喜你，城市开通成功!', '/AcpAgent/opened_city');
				}
				elseif ($province_id)
				{
					$this->success('恭喜你，省份开通成功!', '/AcpAgent/opened_province');
				}
			}
			else
			{
				$this->error($result['msg']);
			}
		}
	
		//获取省份列表
		$province = M('address_province');
		$province_list = $province->field('province_id, province_name')->select();
		$this->assign('province_list', $province_list);

		$this->assign('opt', 'add');
		$this->assign('head_title','开通新城市');
		$this->display();
	}
	
	/**
	 * @access public
     * @todo 修改已开通城市的账户信息
     * @return void
     * @author 姜伟
     */
	public function edit_agent()
	{
		$province_id = $this->_get('province_id');
		$city_id = $this->_get('city_id');
		$area_id = $this->_get('area_id');
		//获取账号信息
		$user_obj = new UserModel();
		$where = 'group_id = 1 AND role_type = ' . UserModel::ROLE_CITY_AGENT;
		$where .= $area_id ? ' AND area_id = ' . $area_id : ' AND area_id = 0' . ($city_id ? ' AND city_id = ' . $city_id : ' AND city_id = 0 AND province_id = ' . $province_id);
		$fields = 'user_id, realname, mobile, username, id, address';
		$user_info = $user_obj->getUserInfo($fields, $where);
		foreach ($user_info AS $k => $v)
		{
			$this->assign($k, $v);
		}
		#echo $user_obj->getLastSql();
		#dump($user_info);

		//获取银行卡信息
		$agent_obj = new AgentModel();
		$where = 'agent_id = ' . $user_info['user_id'];
		$agent_info = $agent_obj->getAgentInfo($where);
		foreach ($agent_info AS $k => $v)
		{
			$this->assign($k, $v);
		}
		$user_id = $user_info['user_id'];

		$act = $this->_post('act');
		if($act == 'save')		//提交保存时
		{
			$province_id		= intval($this->_post('province_id'));
			$city_id			= intval($this->_post('city_id'));
			$area_id			= intval($this->_post('area_id'));
			$realname			= $this->_post('realname');
			$mobile				= $this->_post('mobile');
			$username			= $this->_post('username');
			$password			= $this->_post('password');
			$pay_password		= $this->_post('pay_password');
			$address		= $this->_post('address');
			$id		= $this->_post('id');
			$bank_name		= $this->_post('bank_name');
			$bank_account		= $this->_post('bank_account');
			$bank_realname		= $this->_post('bank_realname');
			$openning_bank		= $this->_post('openning_bank');
			$bank_mobile		= $this->_post('bank_mobile');
//			$agent_type		= $this->_post('agent_type');

			if(!$realname)
			{
				$this->error('对不起，请输入联系人姓名');
			}

			if(!$mobile)
			{
				$this->error('对不起，请填写手机号');
			}
			else
			{
				if($mobile && !checkMobile($mobile))
				{
					$this->error('对不起，手机号格式不正确');
				}
			}
			
			if(!$username)
			{
				$this->error('对不起，请指定一个登录名');
			}
			else
			{
				$UserModel = new UserModel();
				$num = $UserModel->getUserNum('username = "' . $username . '" AND user_id != ' . $user_id);
				if($num)
				{
					$this->error('对不起，该登录名已经存在，请重新指定');
				}
			}

			if(!$address)
			{
				$this->error('对不起，请输入联系地址');
			}

			if(!$id)
			{
				$this->error('对不起，请输入身份证号');
			}

//			if(!$bank_name)
//			{
//				$this->error('对不起，请输入开户银行');
//			}
//
//			if(!$bank_account)
//			{
//				$this->error('对不起，请输入银行卡号');
//			}
//
//			if(!$bank_realname)
//			{
//				$this->error('对不起，请输入持卡人姓名');
//			}
//
//			if(!$openning_bank)
//			{
//				$this->error('对不起，请输入开户支行');
//			}
//
//			if(!$bank_mobile)
//			{
//				$this->error('对不起，请输入预留手机号');
//			}

			$user_info = array(
				'username'		=> $username,
				'realname'		=> $realname,
				'mobile'		=> $mobile,
				'id'			=> $id,
				'address'		=> $address,
			);

			if ($password)
			{
				$user_info['password'] = md5($password);
			}
			if ($pay_password)
			{
				$user_info['password'] = md5($pay_password);
			}
			$user_obj = new UserModel($user_id);
			$user_obj->setUserInfo($user_info);
			$user_obj->saveUserInfo();
			#echo $user_obj->getLastSql();
			#die;

			//修改合伙人信息
			$agent_info = array(
//				'agent_type'	=> $agent_type,
				'bank_name'		=> $bank_name,
				'bank_account'	=> $bank_account,
				'bank_realname'	=> $bank_realname,
				'openning_bank'	=> $openning_bank,
				'bank_mobile'	=> $bank_mobile,
			);
			$agent_obj = new AgentModel($user_id);
			$result = $agent_obj->editAgent($agent_info);
			#echo $agent_obj->getLastSql();
			#die;
			$this->success('恭喜你，账户信息修改成功!');
		}
	
		//获取省份列表
		$province = M('address_province');
		$province_list = $province->field('province_id, province_name')->select();
		$this->assign('province_list', $province_list);

		$this->assign('province_id', $province_id);
		$this->assign('city_id', $city_id);
		$this->assign('area_id', $area_id);
		$this->assign('area_string', AreaModel::getAreaString($province_id, $city_id, $area_id));
		$this->assign('opt', 'edit');
		$this->assign('head_title','修改区域代理账户');
		$this->display('add_agent');
	}
}
