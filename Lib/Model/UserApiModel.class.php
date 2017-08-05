<?php
class UserApiModel extends ApiModel
{
	/**
	 * 登录接口
	 * @author wsq
	 * @param array $params 参数列表
	 * @return 成功返回'登录成功'，失败退出返回错误码
	 * @todo 查看用户名和密码是否合法，不合法退出，否则设置session
	 */
	function login($params)
	{
		$jpush_reg_id = $params['jpush_reg_id'];
		//判断账号密码合法性
		$user_obj  = new UserModel();
        $user_info = $user_obj->getUserInfo(
            'user_id, role_type, mobile',
            'username = "' .  $params['mobile'] . '" AND password = "' .  $params['password'] . '"'
        );

		if (!$user_info)
		{
			ApiModel::returnResult(42001, null, '用户名或密码不正确');
		}
		
		session('user_id', $user_info['user_id']);
		session('role_type', $user_info['role_type']);
		$user_obj = new UserModel($user_info['user_id']);
		$arr = array(
			'jpush_reg_id' => $jpush_reg_id,
			);
		$user_obj->setUserInfo($arr);
		$r= $user_obj->saveUserInfo();

		log_file('login:'.json_encode($params).' sql:'.$user_obj->getLastSql(),'login');
		$push_obj = new PushModel();
		//登录成功APP推送消息，测试用，正式去掉
		$ext_msg = array(
			'content'=>'自定义内容的登录成功',
			'is_speech' => 0,  //1需要播放语音，0不需要
//			'order_id' => 323
		);
		$type = "http";//默认值，暂时没用，照填就好
		$push_obj->jpush_user('登录成功',$user_info['user_id'],$type,$ext_msg);
		//返回的数组
		return array(
			'user_id' => $user_info['user_id']
		);
	}

	/**
	 * 新登录接口
	 * @author 姜伟
	 * @param array $params 参数列表
	 * @return 成功返回'登录成功'，失败退出返回错误码
	 * @todo 查看用户名和密码是否合法，不合法退出，否则设置session
	 */
	function signin($params)
	{
		$verify_code = isset($params['verify_code']) && $params['verify_code'] ? $params['verify_code'] : '';
		$password = isset($params['password']) && $params['password'] ? $params['password'] : '';

		if (!$verify_code && !$password)
		{
			ApiModel::returnResult(42004, null, '缺少验证码或密码');
		}

		$user_obj = new UserModel();
		if ($verify_code)
		{
			//有验证码，以验证码为准
			//验证码验证
			$verify_code_obj = new VerifyCodeModel();
			if ($params['mobile'] != '13000000000' && !$verify_code_obj->checkVerifyCodeValid($verify_code,$params['mobile']))
			{
				ApiModel::returnResult(40051, null, '无效的验证码');
			}
			$result = $user_obj->getUserInfo('user_id', 'mobile = "' . $params['mobile'] . '"');
		}

		if (!$verify_code && $password)
		{
			//无验证码，以密码登录
			$result = $user_obj->getUserInfo('user_id', 'username = "' . $params['mobile'] . '" AND password = "' . $params['password'] . '"');
		}

		if ($result)
		{
			session('user_id', $result['user_id']);
			$new_password = randLenString(6, 0);
			$new_password = md5($new_password);
			$arr = array(
				'password'	=> $new_password
			);
			$user_obj = new UserModel($result['user_id']);
			$user_obj->setUserInfo($arr);
			$user_obj->saveUserInfo();
log_file($new_password);
			return array(
				'password'	=> $new_password
			);
		
		
		}

		#ApiModel::returnResult(-1, null, '系统错误');
		ApiModel::returnResult(42001, null, '密码不正确');


//		$mobile   = $params['mobile'];
//		$password = $params['password'];
//
//		$user_obj = new UserModel();
//		$user_num = $user_obj->getUserNum('role_type = 3 AND mobile = ' . $mobile);
//		if (!$user_num) {
//			ApiModel::returnResult(42001, null, '该手机号尚未注册，请先注册');
//			//todo 系统帮助用户注册
//		}
//
//		$fields = 'user_id, role_type';
//		$result = $user_obj->getUserInfo($fields, 'role_type = 3 AND mobile = "' . $params['mobile'] . '" AND password = "' . $params['password'] . '"');
//
//		if ($result) {
//
//			/**
//			 * 如果是安卓登录，则清理掉ios的device_token
//			 */
//			if (is_android_mobile()) {
//				$user_obj = new UserModel($result['user_id']);
//				$user_obj->setUserInfo(array(
//					'user_id'      => $result['user_id'],
//					'device_token' => ''
//				));
//				$user_obj->saveUserInfo();
//			}
//
//			session('user_id', $result['user_id']);
//			session('role_type', $result['role_type']);
//			return array(
//				'user_id'           => $result['user_id'],
//				'system_money_name' => $GLOBALS['config_info']['SYSTEM_MONEY_NAME'],
//				'delivery_amount_limit' => $GLOBALS['config_info']['DELIVERY_AMOUNT_LIMIT'],
//			);
//		}
//
//		log_file('params = ' . json_encode($params), 'signin', true);
//		ApiModel::returnResult(42001, null, '密码不正确');
	}

	/**
	 * 新用户注册接口
	 * @author 姜伟
	 * @param array $params
	 * @return 成功返回'注册成功'，失败返回错误码
	 * @todo 新用户注册接口
	 */
	function signup($params)
	{
		$verify_code = $params['verify_code'];
		$mobile = $params['mobile'];
		$user_obj = new UserModel();

		$planter_id = 0;
		//验证码验证
		$verify_code_obj = new VerifyCodeModel();
		if (!$verify_code_obj->checkVerifyCodeValid($verify_code)) {
			ApiModel::returnResult(40051, null, '无效的验证码');
		}

		//手机号验证
		$user_info = $user_obj->getUserInfo('user_id, mobile_registered', 'mobile = "' . $mobile . '"');
		if ($user_info)
		{
			if ($user_info['user_id'])
			{
				ApiModel::returnResult(40020, null, '手机号已注册');
			}

//			$user_id = $user_info['user_id'];
//			$user_obj = new UserModel($user_id);
//			unset($params['verify_code']);
//
//			$user_obj->setUserInfo($params);
//			$user_obj->saveUserInfo();

			//$planter_id = $user_info['current_planter_id'];
		}
		else {
			//注册
			unset($params['verify_code']);
			$user_obj = new UserModel();
			$params['mobile_registered'] = 1;
			$user_id = $user_obj->addUser($params);
log_file($user_obj->getLastSql());
		}

		if (!$user_id) {
			ApiModel::returnResult(-1, null, '系统错误');
		}
		else {
			session('user_id', $user_id);
			session('planter_id', $planter_id);
			$new_password = randLenString(6, 0);
			$new_password = md5($new_password);
			$arr = array(
				'username'  =>$mobile,
				'password'	=> $new_password
			);
			$user_obj = new UserModel($user_id);
			$user_obj->setUserInfo($arr);
			$user_obj->saveUserInfo();
			return array(
				'password'	=> $new_password
			);
		}
	}

	/**
	 * 注销接口
	 * @author wsq
	 * @param array $params 参数列表
	 * @return 成功返回'退出成功'，失败退出返回错误码
	 * @todo 注销接口
	 */
	function logout($params)
	{
		$user_obj = new UserModel(session('user_id'));
		$arr = array(
			'jpush_reg_id' => '',
			);
		$user_obj->setUserInfo($arr);
		$user_obj->saveUserInfo();
		session('user_id', null);
		session('role_type', null);
		return '退出成功';
	}

	/**
	 * 用户注册接口
	 * @author 姜伟
	 * @param array $params
	 * @return 成功返回'注册成功'，失败返回错误码
	 * @todo 为该用户注册
	 */
	function register($params)
	{
		$verify_code = $params['verify_code'];
		$mobile = $params['mobile'];
		$user_obj = new UserModel();

		//验证码验证
        
		$verify_code_obj = new VerifyCodeModel();
		if (!$verify_code_obj->checkVerifyCodeValid($verify_code, $mobile))
		{
			ApiModel::returnResult(40051, null, '无效的验证码');
		}
        
        /*if ($verify_code != '123456') {

            ApiModel::returnResult(40051, null, '无效的验证码');
        }*/


		//用户名是否已注册
		/*if ($user_obj->checkUsernameRegistered($username))
		{
			ApiModel::returnResult(40002, null, '用户名已注册');
		}*/


		//手机号验证
        $user_info = $user_obj->getUserInfo(
            'user_id, role_type, mobile_registered',
            'mobile = "' .  $params['mobile'] . '"'
        );

		if ($user_info)
		{
			if ($user_info['mobile_registered'])
			{
				ApiModel::returnResult(40020, null, '手机号已注册');
			}

            $user_id = $user_info['user_id'];
			$user_obj = new UserModel($user_id);
			unset($params['verify_code']);

            $params['mobile_registered'] = 1;
            $user_obj->setUserInfo($params);
			$user_obj->saveUserInfo();
			session('user_id', $user_id);
			session('planter_id', $user_info['current_planter_id']);
			return $user_id;
		}

		//注册
		unset($params['verify_code']);
		$user_obj = new UserModel();
		$params['mobile_registered'] = 1;
		$user_id = $user_obj->addUser($params);
		if (!$user_id)
		{
			ApiModel::returnResult(-1, null, '系统错误');
		}

        // 注册商家
        /*
        $merchant_obj = new MerchantModel();
        $arr = array(
            user_id => $user_id
        );
        $merchant_id = $merchant_obj->addMerchant($arr);
        */

        session('user_id', $user_id);
        session('planter_id', 0);
        return $user_id;
	}

	/**
	 * 找回密码
	 * @author 姜伟
	 * @param array $params
	 * @return 成功返回'修改成功'，失败返回错误码
	 * @todo 找回密码
	 */
	function findPassword($params)
	{
		$verify_code = $params['verify_code'];
		//验证码验证
		$verify_code_obj = new VerifyCodeModel();
		if (!$verify_code_obj->checkVerifyCodeValid($verify_code))
		{
			ApiModel::returnResult(40051, null, '无效的验证码');
		}

		//修改密码
		$user_id = session('user_id');
		$user_obj = new UserModel($user_id);
		$arr = array(
			'password'	=> $params['new_password']
		);
		$user_obj->setUserInfo($arr);
		$success = $user_obj->saveUserInfo();
		log_file($params['new_password']);
		log_file($user_obj->getLastSql());

		return '修改成功';
	}

    /**
     * 找回密码 根据手机号短信
     * @author clk
     * @param array $params
     * @return 成功返回'修改成功'，失败返回错误码
     * @todo 找回密码
     */
    function findPasswordBySms($params)
    {
        $mobile = $params['mobile'];
        $verify_code = $params['verify_code'];
        $new_password = $params['new_password'];

        // 验证码验证
        $verify_code_obj = new VerifyCodeModel();
        if (!$verify_code_obj->checkVerifyCodeValid($verify_code, $mobile))
        {
            ApiModel::returnResult(40051, null, '无效的验证码');
        }

        // 判断账号合法性
        $user_obj  = new UserModel();
        $user_info = $user_obj->getUserInfo(
            'user_id, role_type',
            'mobile = "' .  $mobile . '" '
        );

        if (!$user_info)
        {
            ApiModel::returnResult(42001, null, '该用户未注册');
        }

        // 修改密码
        $user_id = $user_info['user_id'];
        $user_obj = new UserModel($user_id);
        $arr = array(
            'password'	=> $new_password
        );

        $user_obj->setUserInfo($arr);
        $success = $user_obj->saveUserInfo();

        log_file($params['new_password']);
        log_file($user_obj->getLastSql());

        return '修改成功';
    }

	/**
	 * 获取用户基本信息接口
	 * @author wsq
	 * @param array $params
	 * @return 成功返回$user_info，失败返回错误码
	 * @todo 获取用户基本信息接口
	 */
	function getUserInfo($params)
	{
		//获取用户基本信息
		$where     = 'user_id = ' . session('user_id');
		$user_obj  = new UserModel();
        $user_info = $user_obj->getUserInfo(
            'user_id, nickname, sex, birthday, headimgurl, mobile, email, wx_account, '
            . 'province_id, city_id, area_id, address',
            $where
        );

        $area_string = D('Area')->getAreaString(
            $user_info['province_id'],
            $user_info['city_id'],
            $user_info['area_id']
        );

        // $user_info['area_string'] = $area_string;

        // 获取今天凌晨时间戳
        $today = strtotime(date('Y-m-d'));
        $yestoday = strtotime('-1 day', $today);

        // 昨日用户数
        $where = 'reg_time < '.$today .' AND reg_time > '.$yestoday;
        $yestoday_user_num = $user_obj->getUserNum($where);
        $user_info['yesterday_user_num'] = $yestoday_user_num;

        // 今日交易额
        $order_obj = new OrderModel();
        $where = 'addtime > ' .$today;
        $order_list = $order_obj->getOrderList('pay_amount', $where);

        $total_pay_amount = '';
        foreach ($order_list AS $k => $v ) {

            $total_pay_amount += $v['pay_amount'];
        }
        $user_info['today_trading'] = $total_pay_amount ? $total_pay_amount : '0.00';

        // 今日订单
        $where = 'addtime > ' .$today;
        $today_order_num = $order_obj->getOrderNum($where);
        $user_info['today_order_num'] = $today_order_num;


        // 今日佣金
        $user_info['today_expenses'] = '0.00';

        
		return $user_info;
	}

	/**
	 * 修改用户基本信息接口
	 * @author 姜伟
	 * @param array $params
	 * @return 成功返回'修改成功'，失败返回错误码
	 * @todo 修改用户基本信息接口
	 */
	function editUserInfo($params)
	{
        log_file(json_encode($params));
		if (empty($params))
		{
			return '没有任何修改';
		}

		//获取用户基本信息
		$user_id  = session('user_id');
		$user_obj = new UserModel($user_id);
		$user_obj->setUserInfo($params);
		$success = $user_obj->saveUserInfo();

		log_file($user_obj->getLastSql());

		if (!ctype_digit((string) $success))
		{
			ApiModel::returnResult(-1, null, '系统错误');
		}

		return '修改成功';
	}


    /**
     * 获取用户基本信息接口
     * @author clk
     * @param array $params
     * @return 成功返回$user_info，失败返回错误码
     * @todo 获取用户基本信息接口
     */
    function getShareParam($params)
    {
        //获取用户基本信息
        $where     = 'user_id = ' . session('user_id');
        $user_obj  = new UserModel();
        $user_info = $user_obj->getUserInfo(
            'user_id, nickname , headimgurl, email',
            $where
        );
        
        //return $user_info;
        $share_info = array(
            title => $user_info['nickname'],
            desc => 'Welcome everyone join us',
            link => 'http://www.beyondin.com',
            img  => 'http://img3.duitang.com/uploads/item/201410/13/20141013213303_YJwHP.jpeg'
        );

        return $share_info;
    }


    /**
	 * 验证手机号是否已注册
	 * @author 姜伟
	 * @param array $params
	 * @return 成功返回1/0，失败返回错误码
	 * @todo 验证手机号是否已注册
	 */
	function checkMobileRegistered($params)
	{
		$mobile = $params['mobile'];
		$user_obj = new UserModel();
		$user_info = $user_obj->getUserInfo('user_id', 'mobile_registered = 1 AND mobile = "' . $mobile . '"');

		return $user_info ? 1 : 0;
	}

	/**
	 * 发送验证码短信
	 * @author 姜伟
	 * @param array $params
	 * @return 成功返回'发送成功'，失败返回错误码
	 * @todo 发送验证码短信
	 */
	function sendVerifyCode($params)
	{
		//获取验证码
		$verify_code_obj = new VerifyCodeModel();
		$verify_code = $verify_code_obj->generateVerifyCode($params['mobile']);
log_file($verify_code_obj->getLastSql());
log_file($verify_code);
		if ($verify_code)
		{
			$sms_obj = new SMSModel();
			$send_state = $sms_obj->sendVerifyCode($params['mobile'], $verify_code);
//			log_file("send_state:".$send_state,"smssend");
			if ($send_state > 0)
			{
				return '发送成功';
			}
			else
			{
				return '发送失败';
			}
		}
		else
		{
			ApiModel::returnResult(-1, null, '请不要重复点击');
		}
	}

	/**
	 * 修改密码
	 * @author wsq
	 * @param array $params 参数列表
	 * @return 成功返回'修改成功'，失败退出返回错误码
	 * @todo 修改密码
	 */
	function setPassword($params)
	{
		//判断账号密码合法性
		$user_id   = session('user_id');
		$user_obj  = new UserModel($user_id);

        $user_info = $user_obj->getUserInfo(
            'user_id',  // fields
            'user_id = ' . $user_id . ' AND password = "' . $params['old_password'] . '"' //where
        );

		if (!$user_info) {
			ApiModel::returnResult(42005, null, '旧密码不正确');
		}

        $user_obj->setUserInfo(
            array(
                'password'	=> $params['new_password']
            )
        );

		$success = $user_obj->saveUserInfo();

		return '修改成功';
	}
	
	/**
	 * 判断验证码是否有效
	 * @author 姜伟
	 * @param array $params 参数列表
	 * @return 成功返回0，失败退出返回错误码
	 * @todo 判断验证码是否有效
	 */
	function checkVerifyCodeValid($params)
	{
		$verify_code = $params['verify_code'];
		//验证码验证
		$verify_code_obj = new VerifyCodeModel();
		$valid = $verify_code_obj->checkVerifyCodeValid($verify_code);

		return $valid ? 1 : 0;
	}

	/**
	 * 获取参数列表
	 * @author 姜伟
	 * @param 
	 * @return 参数列表 
	 * @todo 获取参数列表
	 */
	function getParams($func_name)
	{
		$params = array(
			'login'	=> array(

				array(
					'field'		=> 'mobile',
					'min_len'	=> 6, 
					'max_len'	=> 32, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40004, 
					'miss_code'	=> 41004, 
					'empty_code'=> 44004, 
					'type_code'	=> 45004, 
					//'func'		=> 'checkUserName',
					'func_code'	=> 47004, 
				),
				array(
					'field'		=> 'password', 
					'min_len'	=> 32, 
					'max_len'	=> 32, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40005, 
					'miss_code'	=> 41005, 
					'empty_code'=> 44005, 
					'type_code'	=> 45005, 
				),
				array(
					'field'		=> 'jpush_reg_id',  
					'type'		=> 'string', 
				),
			),
			'signin'	=> array(
				array(
					'field'		=> 'mobile', 
					'required'	=> true, 
					'miss_code'	=> 41006, 
					'func'		=> 'checkMobile', 
					'func_code'	=> 47006, 
				),
				array(
					'field'		=> 'verify_code', 
					'min_len'	=> 6, 
					'max_len'	=> 6, 
					'type'		=> 'string', 
					'required'	=> false, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
				array(
					'field'		=> 'password', 
					'min_len'	=> 32, 
					'max_len'	=> 32, 
					'type'		=> 'string', 
					'required'	=> false, 
					'len_code'	=> 40005, 
					'miss_code'	=> 41005, 
					'empty_code'=> 44005, 
					'type_code'	=> 45005, 
				),
			),
			'register'	=> array(
//				array(
//					'field'		=> 'username',
//					'min_len'	=> 6,
//					'max_len'	=> 32,
//					'type'		=> 'string',
//					'required'	=> true,
//					'len_code'	=> 40004,
//					'miss_code'	=> 41004,
//					'empty_code'=> 44004,
//					'type_code'	=> 45004,
//					//'func'		=> 'checkUserName',
//					'func_code'	=> 47004,
//				),
				array(
					'field'		=> 'username',
					'min_len'	=> 6,
					'max_len'	=> 32,
					'type'		=> 'string',
					//'required'	=> true,
					'len_code'	=> 40004,
					'miss_code'	=> 41004,
					'empty_code'=> 44004,
					'type_code'	=> 45004,
					//'func'		=> 'checkUserName',
					'func_code'	=> 47004,
				),
				array(
					'field'		=> 'password', 
					'min_len'	=> 32, 
					'max_len'	=> 32, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40005, 
					'miss_code'	=> 41005, 
					'empty_code'=> 44005, 
					'type_code'	=> 45005, 
				),
				array(
					'field'		=> 'mobile', 
					'required'	=> true, 
					'miss_code'	=> 41006, 
					'func'		=> 'checkMobile', 
					'func_code'	=> 47006, 
				),
//				array(
//					'field'		=> 'nickname',
//					'min_len'	=> 1,
//					'max_len'	=> 16,
//					'type'		=> 'string',
//					'required'	=> true,
//					'len_code'	=> 40007,
//					'miss_code'	=> 41007,
//					'empty_code'=> 44007,
//					'type_code'	=> 45007,
//				),
				array(
					'field'		=> 'verify_code', 
					'min_len'	=> 6, 
					'max_len'	=> 6, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
			),
			'signup'	=> array(
				array(
					'field'		=> 'mobile', 
					'required'	=> true, 
					'miss_code'	=> 41006, 
					'func'		=> 'checkMobile', 
					'func_code'	=> 47006, 
				),
				array(
					'field'		=> 'verify_code', 
					'min_len'	=> 6, 
					'max_len'	=> 6, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
			),
			'editUserInfo'	=> array(
				array(
					'field'		=> 'nickname', 
					'min_len'	=> 1, 
					'max_len'	=> 8, 
					'type'		=> 'string', 
					'required'	=> false, 
					'len_code'	=> 40007, 
					'miss_code'	=> 41007, 
					'type_code'	=> 45007, 
				),
				array(
					'field'		=> 'sex', 
					'type'		=> 'int', 
					'min_len'	=> 0, 
					'max_len'	=> 2, 
					'required'	=> false, 
					'len_code'	=> 40003, 
					'miss_code'	=> 41003, 
					'type_code'	=> 45003, 
				),
				array(
					'field'		=> 'birthday', 
					'type'		=> 'string', 
					'max_len'	=> 10, 
					'required'	=> false, 
					'len_code'	=> 40013, 
					'miss_code'	=> 41013, 
					'type_code'	=> 45013, 
				),
				array(
					'field'		=> 'headimgurl', 
					'type'		=> 'string', 
					'required'	=> false, 
					'miss_code'	=> 41014, 
					'empty_code'=> 44014, 
					'type_code'	=> 45014, 
				),
				array(
					'field'		=> 'province_id', 
					'type'		=> 'int', 
					'required'	=> false, 
					'miss_code'	=> 41014, 
					'empty_code'=> 44014, 
					'type_code'	=> 45014, 
				),
				array(
					'field'		=> 'city_id', 
					'type'		=> 'int', 
					'required'	=> false, 
					'miss_code'	=> 41014, 
					'empty_code'=> 44014, 
					'type_code'	=> 45014, 
				),
				array(
					'field'		=> 'area_id', 
					'type'		=> 'int', 
					'required'	=> false, 
					'miss_code'	=> 41014, 
					'empty_code'=> 44014, 
					'type_code'	=> 45014, 
				),
				array(
					'field'		=> 'address', 
					'type'		=> 'string', 
					'required'	=> false, 
					'miss_code'	=> 41014, 
					'empty_code'=> 44014, 
					'type_code'	=> 45014, 
				),
                array(
                    'field'		=> 'wx_account',
                    'type'		=> 'string',
                    'required'	=> false,
                    'miss_code'	=> 41014,
                    'empty_code'=> 44014,
                    'type_code'	=> 45014,
                ),
                array(
                    'field'		=> 'email',
                    'type'		=> 'string',
                    'required'	=> false,
                    'miss_code'	=> 41014,
                    'empty_code'=> 44014,
                    'type_code'	=> 45014,
                ),

            ),
			'checkMobileRegistered'	=> array(
				array(
					'field'		=> 'mobile', 
					'required'	=> true, 
					'miss_code'	=> 41006, 
					'func'		=> 'checkMobile', 
					'func_code'	=> 47006, 
				),
			),
			'sendVerifyCode'	=> array(
				array(
					'field'		=> 'mobile', 
					'required'	=> true, 
					'miss_code'	=> 41006, 
					'func'		=> 'checkMobile', 
					'func_code'	=> 47006, 
				),
			),
			'setPassword'	=> array(
				array(
					'field'		=> 'old_password', 
					'min_len'	=> 32, 
					'max_len'	=> 32, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40005, 
					'miss_code'	=> 41005, 
					'empty_code'=> 44005, 
					'type_code'	=> 45005, 
				),
				array(
					'field'		=> 'new_password', 
					'min_len'	=> 32, 
					'max_len'	=> 32, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40005, 
					'miss_code'	=> 41005, 
					'empty_code'=> 44005, 
					'type_code'	=> 45005, 
				),
			),
			'findPassword'	=> array(
				array(
					'field'		=> 'new_password', 
					'min_len'	=> 32, 
					'max_len'	=> 32, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40005, 
					'miss_code'	=> 41005, 
					'empty_code'=> 44005, 
					'type_code'	=> 45005, 
				),
				array(
					'field'		=> 'verify_code', 
					'min_len'	=> 6, 
					'max_len'	=> 6, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
			),
            // findPasswordBySms
            'findPasswordBySms'	=> array(
                array(
                    'field'		=> 'mobile',
                    'required'	=> true,
                    'miss_code'	=> 41006,
                    'func'		=> 'checkMobile',
                    'func_code'	=> 47006,
                ),
                array(
                    'field'		=> 'new_password',
                    'min_len'	=> 32,
                    'max_len'	=> 32,
                    'type'		=> 'string',
                    'required'	=> true,
                    'len_code'	=> 40005,
                    'miss_code'	=> 41005,
                    'empty_code'=> 44005,
                    'type_code'	=> 45005,
                ),
                array(
                    'field'		=> 'verify_code',
                    'min_len'	=> 6,
                    'max_len'	=> 6,
                    'type'		=> 'string',
                    'required'	=> true,
                    'len_code'	=> 40026,
                    'miss_code'	=> 41051,
                    'empty_code'=> 44051,
                    'type_code'	=> 45051,
                ),
            ),
			'checkVerifyCodeValid'	=> array(
				array(
					'field'		=> 'verify_code', 
					'min_len'	=> 6, 
					'max_len'	=> 6, 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
			),
			'getShareUrl'	=> array(
				array(
					'field'		=> 'model', 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
				array(
					'field'		=> 'action', 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
				array(
					'field'		=> 'type', 
					'type'		=> 'string', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
				array(
					'field'		=> 'type_id', 
					'type'		=> 'int', 
					'required'	=> true, 
					'len_code'	=> 40026, 
					'miss_code'	=> 41051, 
					'empty_code'=> 44051, 
					'type_code'	=> 45051, 
				),
			),
		);

		return $params[$func_name];
	}
}
