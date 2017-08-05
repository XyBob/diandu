<?php
// 用于需要用户验证的全局类
class GlobalAction extends Action {
	private $key = '@J4*A9N7&B^A9Y7j6sWv8m5%q_p+z-h=';
    function _initialize() {
		//$_COOKIE['PHPSESSID'] == '(null)' 解决ios的cookie的PHPSESSID传空的时候出现的问题
		if($_COOKIE['PHPSESSID'] == "(null)"){
			session("user_id",null);//清空以前(null)做为sessionid时候的存在userid的问题
			//cookie('PHPSESSID',session_id(), 864000 + time());//重新分配session_id
			//session("user_id",null);//确保此时的user_id 为空
		}
        if(!$_COOKIE['PHPSESSID']){
            cookie('PHPSESSID',session_id(), 864000 + time());
        }
        log_file('globalaction:'.$_COOKIE['PHPSESSID'],'index');
        header("Content-Type:text/html; charset=utf-8");

		//图片上传路径
        define('DS', DIRECTORY_SEPARATOR);
		define('UPLOAD_IMAGE_PATH', './Uploads/image/');

        //清除缓存 (开发模式下不需要缓存)
		if(PHP_OS!="LINUX")
		{
			$cache = Cache::getInstance();
			$cache->clear();
		}

        //取得系统配置
        $system_config = array();
        $Mconfig = M("Config");
        $config = $Mconfig->cache(true, 86400)->select();
        if (is_array($config)) {
        	foreach ($config as $k => $v) {
        		$system_config[strtoupper($v['config_name'])] = html_entity_decode($v['config_value']);
        	}
        }

        $system_config['CUR_TIME'] = time();
        $system_config['WEBSITE_DOMAIN'] = $this->_server('HTTP_HOST');
        $this->assign("system_config", $system_config);
        $this->system_config = $system_config;

        $GLOBALS['config_info'] = $system_config;

        //用户IP
        $this->user_ip = get_client_ip();
        $this->assign("user_ip", $this->user_ip);

        //加密当前网址
        if($this->parameter && is_string($this->parameter)) {
			parse_str($this->parameter,$parameter);
		}elseif(is_array($this->parameter)){
			$parameter = $this->parameter;
		}elseif(empty($this->parameter)){
			unset($_GET[C('VAR_URL_PARAMS')]);
			$var =  $_GET;
			if(empty($var)) {
				$parameter  =   array();
			}else{
				$parameter  =   $var;
			}
			if ($_POST) {
				foreach ($_POST as $k => $v) {
					$parameter[$k] = $v;
				}
			}
		}

		$this->cur_url = url_jiami(U('', $parameter));
        $this->assign("cur_url", $this->cur_url);

        $this->mod = MODULE_NAME;
        $this->do = ACTION_NAME;
        $this->assign("mod", MODULE_NAME);
        $this->assign("do", ACTION_NAME);
        $this->assign("SYSTEM_MONEY_NAME", $system_config['SYSTEM_MONEY_NAME']);

        //加载公用常量
        include_once(CONF_PATH . 'constants.php');

        //qianniu
        $this->assign('up_token', get_qiniu_uploader_up_token());
        $this->assign('image_domain', C('QINIU_UPLOAD_DRIVER_CONFIG.QINIU_IMAGES_DOMAIN'));

		//种COOKIE
		if (isset($_COOKIE['user_cookie'])) {
			$GLOBALS['user_cookie'] = $_COOKIE['user_cookie'];

		} else {
			$cookie_value = md5(get_client_ip() . time());
			cookie('user_cookie',null);    //一定要先清空
			cookie('user_cookie', $cookie_value, time()+3600*24*3650);	//默认30天有效期
			$GLOBALS['user_cookie'] = $cookie_value;
		}

        $version = C("VERSION");
        $version = $version ? $version : 201612201549;
		$this->assign('version', $version);

        $is_web_enable = C("WEB_ENABLE");
		//PC&微信&APP区分
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if ($is_web_enable && !strpos($agent, 'micromessenger') && !strpos($agent, 'iphone') && !strpos($agent, 'ipad') && !strpos($agent, 'android'))
		{
            if (strpos(strtolower(MODULE_NAME), 'global') !== false) return;
            if (strpos(strtolower(MODULE_NAME), 'acp')    !== false) return;
            if (strpos(strtolower(MODULE_NAME), 'logout') !== false) return;
            if (strpos(strtolower(MODULE_NAME), 'login')  !== false) return;

			if (!strpos(strtolower(MODULE_NAME), 'pc')) {
				$module_name = str_replace('Front', 'FrontPc', MODULE_NAME);
				$module_name = str_replace('Index', 'IndexPc', $module_name);
				$module_name = str_replace('index', 'indexPc', $module_name);
				$module_name = str_replace('Ucp', 'UcpPc', $module_name);
				$module_name = str_replace('ucp', 'ucpPc', $module_name);

				$request_uri = $_SERVER['REQUEST_URI'];
				$request_uri = str_replace('/' . MODULE_NAME . '/' . ACTION_NAME, '', $request_uri);
				#die($request_uri);

				$url = '/' . $module_name . '/' . ACTION_NAME . $request_uri;
                trace($url, '-------- url -------');
				#die($url);
				redirect($url);
			}
        } else {
            if (strpos(strtolower(MODULE_NAME), 'frontpc') !== false) redirect('/');
            if (strpos(strtolower(MODULE_NAME), 'indexpc') !== false) redirect('/');
            if (strpos(strtolower(MODULE_NAME), 'ucppc')   !== false) redirect('/');
        }
    }

    public function _empty(){
	}

    // 图片上传
    public function upload_image()
    {
        $dir    = I('get.dir', C('DEFAULT_IMAGE_UPLOAD_DIR'));
        $result = auto_upload_handler($_FILES['imgFile'], $dir);
        echo json_encode($result);
        exit;
    }

	protected function _ajaxFeedback($status, $data = null, $msg = '')
	{
		$data['status'] = $status;
		$data['msg'] = $msg;
		echo json_encode($data);
		exit;
	}

	/**
	 * 记录日志
	 *
	 * op_type			操作方式，1增加、2修改、3删除、4访问
	 * mark				日志说明
	 * tb_name			操作表名
	 * tb_id			操作表中的ID号
	 * op_user_id		操作者用户ＩＤ
	 * change_user_id	被修改的用户ＩＤ
	 */
	protected function save_logs($op_type, $mark, $tb_name = '', $tb_id = 0, $op_user_id = 0, $change_user_id = 0) {
		if (!(isset($op_user_id) && $op_user_id > 0)) $op_user_id = $this->login_user['user_id'];

		if (!in_array($op_type, array(1, 2, 3, 4))) return '';

		if (!$mark) return '';

		$s_arr = array(
		'op_user_id' => $op_user_id,
		'change_user_id' => $change_user_id,
		'ip' => $this->user_ip,
		'op_date_time' => date('Y-m-d H:i:s'),
		'op_time' => time(),
		'op_type' => $op_type,
		'tb_name' => $tb_name,
		'tb_id' => $tb_id,
		'linkman' => (isset($this->login_user['linkman'])) ? $this->login_user['linkman'] : '',
		'mark' => $mark
		);

		$Log = M('Logs');
		$Log->add($s_arr);
	}

	public function test_memcache()
	{
		S(MD5('a'), '1111111111111111');
		echo 'a = ' . S(MD5('a')) . "<br>";
		S(MD5('b'), '222222');
		$cache = Cache::getInstance();
		echo 'b = ' . S(MD5('b')) . "<br>";
		$cache->clear();
	}

	public function test_redis()
	{
		error_reporting(E_ALL);
		$obj = new Redis();
		$obj->connect('localhost', 6379);
		$planter_id = session('planter_id');
		$planter_id = 2008;
		$command_info = $obj->get('command_' . $planter_id);
		if (!$command_info)
		{
			die('对不起，当前未登录或未绑定种植机');
		}
		else
		{
			echo "<pre>";
			print_r(PlanterModel::parseCommand($command_info));
		}
	}

	/**
	 * 获取sign
	 * @author 姜伟
	 * @param array $params 请求参数列表
	 * @return string sign
	 * @todo 排序，组成请求字符串后，连接key进行MD5加密，返回
	 */
	function generateSign($data)
	{
		ksort($data);

		$sign = '';
		foreach($data as $key => $val)
		{
			if($key != 'token')
			{
				$sign .= "&$key=$val";
			}
		}

		$sign = md5(substr($sign, 1) . $this->key);
		return $sign;
	}

	function test_curl()
	{
		$url = 'http://api.pandorabox.mobi/?m=api&a=api';
		$vars = array(
			'appid'			=> '11',
			'api_name'		=> 'plant.user.register',
			'mobile'		=> '15158131315',
			'nickname'		=> '诸葛青云',
			'password'		=> '698d51a19d8a121ce581499d7b701668',
			'PHPSESSID'		=> '',
			'username'		=> 'jiangwei',
		);
		$token = $this->generateSign($vars);
		$vars['token'] = $token;

		echo "<pre>";
		$result = $this->getData($url, $vars);
		print_r($result);
		var_dump(json_decode($result));
	}

	//获取https的get请求结果
	function getData($c_url, $vars = '')
	{
		$curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_REFERER, 'https://mp.weixin.qq.com/cgi-bin/singlemsgpage?t=wxm-singlechat&lang=zh_CN');
		curl_setopt($curl, CURLOPT_URL, $c_url); // 要访问的地址
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
		curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
		curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer

		#curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转

        $postfields = '';
        foreach ($vars as $key => $value){
            $postfields .= '&' . urlencode($key) . '=' . urlencode($value);
        }

		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_POSTFIELDS, substr($postfields, 1)); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		//curl_setopt($curl, CURLOPT_HEADER, 1); // 显示返回的Header区域内容
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
		$tmpInfo = curl_exec($curl); // 执行操作
		if (curl_errno($curl))
		{
			echo 'Errno'.curl_error($curl);//捕抓异常
		}
		curl_close($curl); // 关闭CURL会话
		return $tmpInfo; // 返回数据
	}

	public function test_db_cache()
	{
		require_once('Lib/Model/AzTemplateModel.class.php');
		$aztemplate_obj = new AzTemplateModel();
		$aztemplate_obj->get_module_list();
		echo "<br>db cache: ";
		var_dump(S(MD5('SELECT * FROM `tp_template_model` WHERE ( isuse = 1 ) ORDER BY serial ')));

		//清除缓存
		$cache = Cache::getInstance();
		$cache->clear();
		echo "<br>after flushing cache: ";
		var_dump(S(MD5('SELECT * FROM `tp_template_model` WHERE ( isuse = 1 ) ORDER BY serial ')));

		//测试对空数组执行empty函数的返回值
		$a = array();
		var_dump(empty($a));

		echo "<hr>";
		$user = M('users');
		var_dump($user);
	}

	/**
	* 根据条件把文章表
	* @param string
	* @return void
	* @author <zgq@360shop.cc>
	* @todo 根据条件把文章表tp_article数据取出来
	*/
	function get_header_title($str)
	{
		return  $str. '-' .$this->system_config['SHOP_TITLE'];
	}

	function test_sms()
	{
		$UserModel = new UserModel();
		$mobile = '15158131315';
		$time = time();
		if($time - session('code_time_mark') < 60 )	//60s内不重新发送
		{
			exit;
		}
		session('verify_phone',null);
		$username = $this->_post('user');	//加密后的用户名
		$username = $username?url_jiemi($username):'';
		$username = 'aaa';

		if(!$username)
		{
			exit(json_encode(array('type'=>-3,'message'=>'请求出错')));
		}
		if(!check_mobile($mobile))
		{
			exit(json_encode(array('type'=>-2,'message'=>'请输入正确的手机号')));
		}
		//检查该手机号是否已经绑定过账号
		$check = $UserModel->getUserList('mobile = '.$mobile);	//一个手机号只能绑定一个账号
		if($check)	//如果该手机号已经有账号绑定过了，提示不能绑定
		{
			exit(json_encode(array('type'=>-2,'message'=>'对不起，该手机号已经被绑定了,请更换一个手机号！')));
		}
		session('phone',$mobile);
		session('code_time_mark',time());	//标记发送时间

		//生成验证码数字
		$codeSet = '0123456789';
		for ($i = 0; $i<6; $i++) {	//6位数字
			$code[$i] = $codeSet[mt_rand(0, 9)];
		}
		// 保存验证码
		$str = join('', $code);
		$str = strtoupper($str);	//生成的验证码
		require_once('Lib/Model/SMSModel.class.php');
		$SMSModel = new SMSModel();
		$result = $SMSModel->sendCode($mobile,$str);		//发送短信
		$_SESSION['verify_phone'] = md5($str);			//session存储验证码
		if($result['status'])
		{
			exit(json_encode(array('type'=>1)));		//验证码发送成功
		}
		else if($result['wrong'])
		{
			exit(json_encode(array('type'=>-1,'message'=>$result['message'])));
		}
		else{
			exit(json_encode(array('type'=>-1,'message'=>'发送失败')));
		}
	}

	function test_csv()
	{
		//初始化预约对象
		$agent_appoint_obj = new AppointModel();
		$agent_appoint_obj->setStart(0);
		//一次性最多可导出1000条数据
		$agent_appoint_obj->setLimit(1000);

		$fields = '';
		$arr = $agent_appoint_obj->getAppointListByQueryString($fields, $where);

		//引入PHPExcel类库
		vendor('Excel.PHPExcel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")
				->setLastModifiedBy("")
				->setTitle("预约报表")
				->setSubject("预约报表")
				->setDescription("预约报表")
				->setKeywords("预约,报表")
				->setCategory("预约报表");

		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet(0)->setTitle('预约报表');          //标题
		$objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);      //单元格宽度
		$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial'); //设置字体
		$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);      //设置字体大小
		$objPHPExcel->getActiveSheet(0)->setCellValue('A1', '预约号');
		$objPHPExcel->getActiveSheet(0)->setCellValue('B1', '手机号');
		$objPHPExcel->getActiveSheet(0)->setCellValue('C1', '预约状态');
		$objPHPExcel->getActiveSheet(0)->setCellValue('D1', '预约时间');

		$i  = 2;
		//每行数据的内容
		foreach ($arr as  $value)
		{
			for ($j = 0; $j < 10; $j++)
			{
			//预约号
			$objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, " " . $value['appoint_number']);

			//商品总金额
			$objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, $value['mobile']);

			//商品总成本价
			$objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, AppointModel::convertAppointStatus($value['appoint_status']));

			//商品总折扣
			$objPHPExcel->getActiveSheet(0)->setCellValue('D' . $i, date('Y-m-d H:i:s', $value['appoint_time']));
			$i++;
			}
		}

		//直接输出文件到浏览器下载
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="预约报表_' . date("YmdHis") . '.xls"');
		header('Cache-Control: max-age=0');
		ob_clean(); //关键
		flush(); //关键
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}

	//测试发送验证码
	function test_send_vc()
	{
		//获取验证码
		$verify_code_obj = new VerifyCodeModel();
//短信数量
$sms_obj = new SMSModel();
$sms_num = $sms_obj->getSMSLeftNumber();
var_dump($sms_num);
$mobile = $this->_request('mobile');
		$verify_code = $verify_code_obj->generateVerifyCode($mobile);
		var_dump($verify_code);
		die;
		if ($verify_code)
		{
			$sms_obj = new SMSModel();
			$send_state = $sms_obj->sendVerifyCode('15158131315', $verify_code);
			var_dump($send_state);
		}
	}

	function mp_event()
	{
		log_file('mp_event', 'subscribe');
		if (isset($_GET['signature']))
		{
			$postStr = file_get_contents("php://input");
			if (empty($postStr) && isset($_GET['signature']) && $_GET['signature'])
			{
				log_file('没有global入口', 'subscribe');
				ob_clean();
				echo $_GET['echostr'];

				exit;
			}
			else
			{
				log_file('global入口', 'subscribe');
				require('frame/Extend/Vendor/Wxin/WeiXinPush.php');
				$wechatObj = new wechatCallbackapiTest();
				$wechatObj->weixin_run(); //执行接收器方法
			}
		}
	}

	function generate_planter()
	{
		die;
		$planter_obj = new PlanterModel();
		$num = 0;
		for ($i = 0; $i < 1000; $i ++)
		{
			$arr = array(
				'planter_code'		=> sprintf("%06d", $i),
				'serial_num'		=> sprintf("%06d", $i),
				'addtime'			=> time(),
				'last_visit_time'	=> time(),
			);
			$success = $planter_obj->add($arr);
			echo $planter_obj->getLastSql() . "<br>";
			$num += $success ? 1 : 0;
		}
		echo $num;
	}

	//接收推送消息，返回命令
	function receive_push()
	{
		if (isset($_REQUEST['IO']))
		{
			$planter_id = intval($_REQUEST['planter_id']);

			$planter_obj = new PlanterModel($planter_id);
			if (!$planter_obj->checkVisitValid())
			{
				exit('invalid visit');
			}
			//保存温度、湿度、光照度
			$arr = array();
			$str = '';
			if (isset($_REQUEST['ADC1']))
			{
				$arr['temperature'] = $_REQUEST['ADC1'];
			}
			if (isset($_REQUEST['ADC2']))
			{
				$arr['outside_temperature'] = $_REQUEST['ADC2'];
			}
			if (isset($_REQUEST['ADC3']))
			{
				$arr['humidity'] = $_REQUEST['ADC3'];
			}
			if (isset($_REQUEST['ADC4']))
			{
				$arr['illuminance'] = $_REQUEST['ADC4'];
			}
			if (isset($_REQUEST['ADC5']))
			{
				$arr['alarm'] = $_REQUEST['ADC5'];
			}
			if (!empty($arr))
			{
				$planter_obj->editPlanter($arr);
			}

			$planter_obj = new PlanterModel($planter_id);
			$planter_info = $planter_obj->getPlanterInfo('planter_id = ' . $planter_id, 'ton, toff, box_state, temperature, humidity, illuminance, outside_temperature, alarm');
			$command = $planter_info['box_state'];

			$str .= '&ADC1=' . $planter_info['temperature'];
			$str .= '&ADC2=' . $planter_info['outside_temperature'];
			$str .= '&ADC3=' . $planter_info['humidity'];
			$str .= '&ADC4=' . $planter_info['illuminance'];
			$str .= '&ADC5=' . $planter_info['alarm'];
			$ton = sprintf('%04d', $planter_info['ton']);
			$toff = sprintf('%04d', $planter_info['toff']);
			$pre_str = 'IO=' . $_REQUEST['IO'] . "\n";
			$str = 'GPIO=' . $command . '&T1=' . $ton . '&T2=' . $toff . $str . 'END';
			#log_file($pre_str . $str . "\nIP:" . get_client_ip());
			echo $str;

			if ($command[4] == 1)
			{
				$success = $planter_obj->sendCommand(5, 0, $planter_id);
			}
		}

		if (!empty($_FILES))
		{
			echo "<pre>";
			print_r($_FILES);
			echo "</pre>";
		}
	}

	//接收推送消息，返回命令
	function receive_img()
	{
		#log_file("receive_img\n" . $_SERVER['QUERY_STRING'] . "\nIP:" . get_client_ip());
		$en = explode('image/', $_SERVER['QUERY_STRING']);
		log_file("en\n" . $en[1] . "\nIP:" . get_client_ip());
		$en = str_replace('_', '+', $en[1]);
		$en = str_replace('%2b', '+', $en);
		$en = str_replace('#a', '//', $en);
		$en = base64_decode('/' . $en);
		file_put_contents('Uploads/img.jpg', $en);

		/*foreach ($_REQUEST AS $k => $v)
		{
			$en = str_replace('_', '+', $k);
			$en = base64_decode($en);
			file_put_contents('Uploads/img.jpg', $en);
			break;
		}*/
		#$en = str_replace('_', '+', $_REQUEST['data']);
		#echo "11111<br>";
		#var_dump($en);
		#$en = base64_decode($en);
		#echo "22222<br>";
		#var_dump($en);
		#file_put_contents('Uploads/img.jpg', $en);
		echo "<pre>";
		print_r($_REQUEST);
		print_r($_FILES);
		echo "</pre>";
	}

	function take_photo()
	{
		$user_id = intval($_REQUEST['user_id']);
		if (!$user_id)
		{
			exit;
		}

		$user_obj = new UserModel($user_id);
		$success = $user_obj->sendCommand(5, 1, $user_id);
		echo $success ? 'success' : 'failure';
	}

	function show_img()
	{
		echo "原图<br><img src='/Uploads/img.jpg'>";
		echo "<br>参照图<br><img src='/Uploads/tomato1.jpg'>";
	}

	function cal_express_fee()
	{
		//获取当前IP所在省份城市
		$area_info = getIPSource(get_client_ip());

		//调用物流模型ShippingCompanyModel的calculateShippingFee
		$default_express_company = $GLOBALS['config_info']['DEFAULT_EXPRESS_COMPANY'];
		$shipping_company_obj = new ShippingCompanyModel();
		var_dump($shipping_company_obj->calculateShippingFee($default_express_company, $area_info['province_id'], 3000, 30));
	}

	function import_area()
	{
		set_time_limit(0);
		$province_obj = M('address_province');
		$city_obj = M('address_city');
		$area_obj = M('address_area');

		$file = fopen('doc/area.txt', 'r');
		$line = 0;
		$province_id = 0;
		$city_id = 0;
		$is_zhixia = 0;
		while (!feof($file))
		{
			$line ++;
			$str = fgets($file, 1024);
			$code = substr($str, 0, 6);
			$last4code = substr($code, 2, 4);
			$last2code = substr($code, 4, 2);
			echo "$last4code, $last2code<br>";
			if ($last4code == '0000')
			{
				//省份
				$province_name = substr($str, 10, -1);
				echo "省份：$province_name<br>";
				$arr = array(
					'province_id'	=> $code,
					'province_name'	=> $province_name,
				);
				$province_id = $province_obj->add($arr);
				if (!$province_id)
				{
					echo $province_obj->getLastSql() . "<br>";
					echo "省份$province_name插入失败<br>";
				}
			}
			elseif ($last2code == '00')
			{
				//城市
				$city_name = substr($str, 12, -1);
				$is_zhixia = $city_name == '市辖区' || $city_name == '县' ? 1 : 0;
				echo "城市：$city_name<br>";
				if (!$is_zhixia)
				{
					$arr = array(
						'city_id'		=> $code,
						'province_id'	=> $province_id,
						'city_name'		=> $city_name,
					);
					$city_id = $city_obj->add($arr);
					if (!$city_id)
					{
						echo $city_obj->getLastSql() . "<br>";
						echo "城市$city_name插入失败<br>";
					}
				}
			}
			elseif ($is_zhixia)
			{
				//城市
				$city_name = substr($str, 14, -1);
				echo "城市：$city_name<br>";
				$arr = array(
					'city_id'		=> $code,
					'province_id'	=> $province_id,
					'city_name'		=> $city_name,
				);
				$city_id = $city_obj->add($arr);
				if (!$city_id)
				{
					echo $city_obj->getLastSql() . "<br>";
					echo "城市$city_name插入失败<br>";
				}
			}
			else
			{
				//地区
				$area_name = substr($str, 14, -1);
				if ($code == 0)
				{
					var_dump($code = substr($str, 14, -1));
					echo "code invalid.<br>";
				}
				echo "地区：$area_name<br>";
				$arr = array(
					'area_id'		=> $code,
					'city_id'		=> $city_id,
					'area_name'		=> $area_name,
				);
				$area_id = $area_obj->add($arr);
				if (!$area_id)
				{
					echo $area_obj->getLastSql() . "<br>";
					echo "地区$area_name插入失败<br>";
				}
			}
		}
	}

	function test_get_item()
	{
		$item_id = 502;
		$item_obj = new ItemModel($item_id);
		$item_info = $item_obj->getItemInfo('item_id = ' . $item_id, 'item_name, t_desc, h_desc, i_desc, item_sn, has_sku, base_pic, mall_price, market_price, stock, weight, sales_num, class_id');
		if (!$item_info)
		{
			ApiModel::returnResult(42025, null, '商品不存在');
		}

		//是否种子
		$class_obj = new ClassModel();
		$class_info = $class_obj->getClassInfo('class_id = ' . $item_info['class_id'], 'class_tag');
		$is_seed = 0;
		if ($class_info && $class_info['class_tag'] == 'seed')
		{
			$is_seed = 1;
		}
		$item_info['is_seed'] = $is_seed;

		echo "<br>";
		print_r($item_info);
	}

	function hello_world() {
		$user = D("User")->where('user_id=1')->find();
		session('user_info', $user);
		$this->redirect('/Acp');
	}

	function hello_world_set()
	{
		$user = D("User")->where('user_id=1')->find();
		session('user_info', $user);
		$this->redirect('/AcpConfig/setting');
	}

	function control()
	{
		$command1 = $this->_request('k1');
		$command2 = $this->_request('k2');
		if (!is_numeric($command1) || !is_numeric($command2))
		{
			exit('参数不正确');
		}

		$success1 = $planter_obj->sendCommand(1, $command1);
		$success2 = $planter_obj->sendCommand(4, $command2);
	}

	function show_log()
	{
		echo "<pre>";
		$log = system('tail -n 10 /var/www/nginx/access.log');
	}

	function gene_img()
	{
		set_time_limit(0);
		//遍历商品表，将上线商品的图片生成中图和小图
		$item_obj = new ItemModel();
		$item_list = $item_obj->getItemList('', 'isuse = 1');
		foreach ($item_list AS $k => $v)
		{
			echo $k . "<br>";
			$arr_img = $this->resizeImg($v['base_pic']);
			echo "<pre>";
			print_r($v);
			print_r($arr_img);
		}
	}

    /**
     * 图片压缩加水印
     * @param string $base_img 原图地址(绝对路径)
     * @return array 生成的图片信息
     */
    protected function resizeImg($base_img) {
        import('ORG.Util.Image');
        $Image = new Image();

        $arr_img = array();

$base_img = APP_PATH . $base_img;
var_dump(is_file($base_img));
        if (!is_file($base_img)) return $arr_img;

        $base_img_info = pathinfo($base_img);
        $img_path = $base_img_info['dirname'] . '/';
        $img_extension = $base_img_info['extension'];
        $img_name = str_replace('.' . $img_extension, '', $base_img_info['basename']);

        /***** 等比缩放 开始 *****/

        // 生成大图
        $big_img_path = $img_path . $img_name . C('BIG_IMG_SUFFIX') . '.' . $img_extension;
        $big_img = $Image->thumb($base_img, $big_img_path, $img_extension, C('BIG_IMG_SIZE'), C('BIG_IMG_SIZE'));

        // 生成中图
        $middle_img_path = $img_path . $img_name . C('MIDDLE_IMG_SUFFIX') . '.' . $img_extension;
        $middle_img = $Image->thumb($base_img, $middle_img_path, $img_extension, C('MIDDLE_IMG_SIZE'), C('MIDDLE_IMG_SIZE'));

        // 生成小图
        $small_img_path = $img_path . $img_name . C('SMALL_IMG_SUFFIX') . '.' . $img_extension;
        $small_img = $Image->thumb($base_img, $small_img_path, $img_extension, C('SMALL_IMG_WIDTH'), C('SMALL_IMG_HEIGHT'));
        /***** 等比缩放 结束 *****/

        $arr_img['big_img']    = $big_img;
        $arr_img['middle_img'] = $middle_img;
        $arr_img['small_img']  = $small_img;
        return $arr_img;
    }

    //微信公众号菜单创建
    function create_menu()
    {
        //杭州创辉
        #$appid = 'wx3b6bfcb6495dff9e';
        #$secret = 'f23adf9fb219fdabb7e4cc092c41a96a';
        //马上到
        #$appid = C('APPID');
        #$secret = C('APPSECRET');
        $host = 'http://' . $_SERVER['HTTP_HOST'];
        //微世界
        $appid = C('APPID');
        $secret = C('APPSECRET');
        //$host = 'http://test-msd.yurtree.com';
        vendor('Wxin.WeiXin');
        $access_token = WxApi::getAccessToken($appid, $secret);
        $weixin_obj = new WxApi($access_token);
        $menu_list = $weixin_obj->menu_get();
        $new_menu = array(
            'button' => array(
                '0' => array(
                    'type'	=> 'view',
                    'name'	=> '店都平台',
                    'url'	=> $host
                ),
                '1' => array(
                    'type'	=>	'view',
                    'name'	=>	'个人',
                    'url'	=>	$host . '/Index/person_center'
                ),
                /*'2' => array(
                    'name' => '帮助',
                    'sub_button' => array(
                        '0' => array(
                            'type' => 'click',
                            'name' => '客服',
                            'key' => 'customer_service'
                        ),
                        '1' => array(
                            'type' => 'view',
                            'name' => '帮助中心',
                            'url' => $host . '/FrontHelp/help_list'
                        ),
                        '2' => array(
                            'type' => 'view',
                            'name' => '关于亲，马上到',
                            'url' => $host . '/FrontHelp/about'
                        ),
                    )
				)*/
            )
        );

        $result = $weixin_obj->menu_create($new_menu);
        var_dump($result);
    }


	//微信公众号菜单创建
	function create_menu_pandora()
	{
		$appid = 'wx2326612672cbb5e3';
		$secret = 'd565998cc524e4af8c20ccea0c80da77';
		vendor('Wxin.WeiXin');
		$access_token = WxApi::getAccessToken($appid, $secret);
		$weixin_obj = new WxApi($access_token);
		$menu_list = $weixin_obj->menu_get();
		echo "<pre>";
		print_r($menu_list);
		$new_menu = array(
			'button' => array(
				'0' => array(
					'type' => 'view',
					'name' => '潘朵拉BOX',
					'url' => 'http://smartplant.pandorabox.mobi/FrontPlanter/pandorabox'
				),
				'1' => array(
					'type' => 'view',
					'name' => '商城',
					'url' => 'http://smartplant.pandorabox.mobi/FrontMall/mall_home'
					/*'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '商城首页',
							'url' => 'http://smartplant.pandorabox.mobi/FrontMall/mall_home'
						),
						'1' => array(
							'type' => 'view',
							'name' => '搜索',
							'url' => 'http://smartplant.pandorabox.mobi/FrontMall/mall_plant_list'
						),
						'2' => array(
							'type' => 'view',
							'name' => '购物车',
							'url' => 'http://smartplant.pandorabox.mobi/FrontCart/cart'
						),
						'3' => array(
							'type' => 'view',
							'name' => '我要充值',
							'url' => 'http://smartplant.pandorabox.mobi/FrontUser/recharge/'
						),
						'4' => array(
							'type' => 'view',
							'name' => '充值记录',
							'url' => 'http://smartplant.pandorabox.mobi/FrontUser/recharge_list'
						),
					)*/
				),
				'2' => array(
					'name' => '我',
					'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '个人中心',
							'url' => 'http://smartplant.pandorabox.mobi/FrontUser/personal_center'
						),
						'1' => array(
							'type' => 'click',
							'name' => '客服',
							'key' => 'customer_service'
						),
						'2' => array(
							'type' => 'view',
							'name' => '帮助中心',
							'url' => 'http://smartplant.pandorabox.mobi/FrontHelp/help_list'
						),
						'3' => array(
							'type' => 'view',
							'name' => '关于潘朵拉',
							'url' => 'http://smartplant.pandorabox.mobi/FrontHelp/about'
						),
						'4' => array(
							'type' => 'view',
							'name' => '潘朵拉BOX宣传片',
							'url' => 'http://smartplant.pandorabox.mobi/FrontHelp/welcome_video.html'
						),
					)
				)
			)
		);

		$result = $weixin_obj->menu_create($new_menu);
		var_dump($result);
	}

	//微信公众号菜单创建
	function create_menu_minglou_jingjiren()
	{
		$appid = 'wx8c5edf0b09247e84';
		$secret = '1d5827e9692def13f8453373733bbb96';
		vendor('Wxin.WeiXin');
		$access_token = WxApi::getAccessToken($appid, $secret);
		$weixin_obj = new WxApi($access_token);
		$menu_list = $weixin_obj->menu_get();
		echo "<pre>";
		print_r($menu_list['menu']);
		//保存原菜单
		#$new_menu = '{"button":[{"name":"\u676d\u5dde\u697c\u5e02","sub_button":[{"type":"view","name":"\u540d\u697c\u7f51\u5fae\u7ad9","url":"http:\/\/adminhz.0571ml.com\/site\/index","sub_button":[]},{"type":"view","name":"\u63a8\u8350\u697c\u76d8","url":"http:\/\/adminhz.0571ml.com\/site\/reBuildings","sub_button":[]},{"type":"view","name":"\u8054\u7cfb\u6211\u4eec","url":"http:\/\/adminhz.0571ml.com\/site\/option","sub_button":[]}]},{"type":"view","name":"\u770b\u623f\u62a5\u540d","url":"http:\/\/adminhz.0571ml.com\/site\/activity","sub_button":[]},{"name":"\u540d\u697c\u6d3b\u52a8","sub_button":[{"type":"view","name":"\u8282\u76ee\u56de\u987e","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u770b\u623f\u9001\u793c","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u6211\u8981\u5356\u623f","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u6211\u8981\u88c5\u4fee","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u540d\u697c\u63a8\u8350\u4f1a","url":"http:\/\/mp.weixin.qq.com\/s?__biz=MjM5MTk3MjY4MQ==&mid=201241013&idx=1&sn=c0b5b4e71ff4ea862365a4e81c59cdcf&scene=1&from=groupmessage&isappinstalled=0#rd","sub_button":[]}]}]}';
		$domain = 'http://0571ml.yurtree.com';
		$new_menu = array(
			'button' => array(
				'0' => array(
					'name' => '杭州楼市',
					'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '名楼微网站',
							'url' => $domain
						),
						'1' => array(
							'type' => 'view',
							'name' => '节目回顾',
							'url' => $domain . '/FrontNews/news_list/sort_id/22'
						),
						'2' => array(
							'type' => 'view',
							'name' => '联系我们',
							'url' => $domain . '/FrontNews/news_detail/tag/wx_contact_us'
						),
						'3' => array(
							'type' => 'view',
							'name' => '楼市资讯',
							'url' => $domain . '/FrontNews/news_list'
						)
					)
				),
				'1' => array(
					'name' => '经纪人',
					'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '注册登录',
							'url' => $domain . '/FrontUser/regist'
						),
						'1' => array(
							'type' => 'click',
							'name' => '客户备案',
							'key' => 'appoint'
						),
						'2' => array(
							'type' => 'click',
							'name' => '个人中心',
							'key' => 'personal_center'
						),
						'3' => array(
							'type' => 'view',
							'name' => '操作指南',
							'url' => $domain . '/FrontNews/news_detail/tag/record_guide'
						),
						'4' => array(
							'type' => 'view',
							'name' => '近期活动',
							'url' => $domain . '/FrontActivity/activity_list'
						)
					)
				),
				'2' => array(
					'type' => 'view',
					'name' => '合作楼盘',
					'url' => $domain
				)
			)
		);

		$result = $weixin_obj->menu_create($new_menu);
		var_dump($result);
	}

	//微信公众号菜单创建
	function create_menu_minglou()
	{
		$appid = 'wxa1c38206f718e33f';
		$secret = '59f3cfbbb78769240906ca0e3cc831f6';
		vendor('Wxin.WeiXin');
		$access_token = WxApi::getAccessToken($appid, $secret);
		$weixin_obj = new WxApi($access_token);
		$menu_list = $weixin_obj->menu_get();
		echo "<pre>";
		print_r($menu_list['menu']);
		//保存原菜单
		#$new_menu = '{"button":[{"name":"\u676d\u5dde\u697c\u5e02","sub_button":[{"type":"view","name":"\u540d\u697c\u7f51\u5fae\u7ad9","url":"http:\/\/adminhz.0571ml.com\/site\/index","sub_button":[]},{"type":"view","name":"\u63a8\u8350\u697c\u76d8","url":"http:\/\/adminhz.0571ml.com\/site\/reBuildings","sub_button":[]},{"type":"view","name":"\u8054\u7cfb\u6211\u4eec","url":"http:\/\/adminhz.0571ml.com\/site\/option","sub_button":[]}]},{"type":"view","name":"\u770b\u623f\u62a5\u540d","url":"http:\/\/adminhz.0571ml.com\/site\/activity","sub_button":[]},{"name":"\u540d\u697c\u6d3b\u52a8","sub_button":[{"type":"view","name":"\u8282\u76ee\u56de\u987e","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u770b\u623f\u9001\u793c","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u6211\u8981\u5356\u623f","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u6211\u8981\u88c5\u4fee","url":"http:\/\/adminhz.0571ml.com\/site\/error","sub_button":[]},{"type":"view","name":"\u540d\u697c\u63a8\u8350\u4f1a","url":"http:\/\/mp.weixin.qq.com\/s?__biz=MjM5MTk3MjY4MQ==&mid=201241013&idx=1&sn=c0b5b4e71ff4ea862365a4e81c59cdcf&scene=1&from=groupmessage&isappinstalled=0#rd","sub_button":[]}]}]}';
		$domain = 'http://0571ml.yurtree.com';
		$new_menu = array(
			'button' => array(
				'0' => array(
					'name' => '杭州楼市',
					'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '名楼微网站',
							'url' => $domain . '/Index/index/user_tag/1'
						),
						'1' => array(
							'type' => 'view',
							'name' => '楼盘推荐',
							'url' => $domain . '/FrontBuilding/building_list/user_tag/1'
						),
						'2' => array(
							'type' => 'view',
							'name' => '联系我们',
							'url' => $domain . '/FrontNews/news_detail/tag/wx_contact_us/user_tag/1'
						),
						#'3' => array(
							#'type' => 'view',
							#'name' => '楼市资讯',
							#'url' => $domain . '/FrontNews/news_list/user_tag/1'
						#)
					)
				),
				'1' => array(
					'type' => 'view',
					'name' => '看房报名',
					'url' => $domain . '/FrontActivity/activity_list/user_tag/1'
				),
				'2' => array(
					'name' => '名楼活动',
					'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '节目回顾',
							'url' => $domain . '/FrontNews/news_list/sort_id/22/user_tag/1'
						),
						'1' => array(
							'type' => 'view',
							'name' => '看房送礼',
							'url' => $domain . '/Public/Images/acp/logo.png'
						),
						'2' => array(
							'type' => 'view',
							'name' => '我要卖房',
							'url' => $domain . '/Public/Images/acp/logo.png'
						),
						'3' => array(
							'type' => 'view',
							'name' => '我要装修',
							'url' => $domain . '/Public/Images/acp/logo.png'
						),
						'4' => array(
							'type' => 'view',
							'name' => '名楼推荐会',
							'url' => $domain . '/FrontNews/news_detail/id/212/user_tag/1'
						),
					)
				)
			)
		);

		$result = $weixin_obj->menu_create($new_menu);
		var_dump($result);
	}

	//微信公众号菜单创建
	function create_menu_yurtree()
	{
		$appid = 'wx3b6bfcb6495dff9e';
		$secret = 'f23adf9fb219fdabb7e4cc092c41a96a';
		$host = 'http://smartplant.pandorabox.mobi';
		#$appid = 'wxf39c1f30969a7e57';
		#$secret = 'f2d31b4cfe7662e7573276086f207be8';
		#$host = 'http://www.yurtree.com';
		vendor('Wxin.WeiXin');
		$access_token = WxApi::getAccessToken($appid, $secret);
		$weixin_obj = new WxApi($access_token);
		$menu_list = $weixin_obj->menu_get();
		echo "<pre>";
		print_r($menu_list);
		$new_menu = array(
			'button' => array(
				'0' => array(
					'type' => 'view',
					'name' => '帮助中心',
					'url' => $host . '/FrontHelp/help_list'
				),
				'1' => array(
					'type' => 'view',
					'name' => '商城',
					'url' => $host . '/FrontMall/mall_home'
					/*'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '商城首页',
							'url' => 'http://smartplant.pandorabox.mobi/FrontMall/mall_home'
						),
						'1' => array(
							'type' => 'view',
							'name' => '搜索',
							'url' => 'http://smartplant.pandorabox.mobi/FrontMall/mall_plant_list'
						),
						'2' => array(
							'type' => 'view',
							'name' => '购物车',
							'url' => 'http://smartplant.pandorabox.mobi/FrontCart/cart'
						),
						'3' => array(
							'type' => 'view',
							'name' => '我要充值',
							'url' => 'http://smartplant.pandorabox.mobi/FrontUser/recharge/'
						),
						'4' => array(
							'type' => 'view',
							'name' => '充值记录',
							'url' => 'http://smartplant.pandorabox.mobi/FrontUser/recharge_list'
						),
					)*/
				),
				'2' => array(
					'name' => '我',
					'sub_button' => array(
						'0' => array(
							'type' => 'view',
							'name' => '个人中心',
							'url' => $host . '/FrontUser/personal_center'
						),
						'1' => array(
							'type' => 'click',
							'name' => '客服',
							'key' => 'customer_service'
						),
					)
				)
			)
		);

		$result = $weixin_obj->menu_create($new_menu);
		var_dump($result);
	}

    //微信公众号菜单创建
    function create_menu_b2c()
    {
	//B2C分销版
        $appid = C('APPID');
        $secret = C('APPSECRET');
        $host = 'http://' . $_SERVER['HTTP_HOST'];
        vendor('Wxin.WeiXin');
        $access_token = WxApi::getAccessToken($appid, $secret);
        $weixin_obj = new WxApi($access_token);
        $menu_list = $weixin_obj->menu_get();
        $new_menu = array(
            'button' => array(
                '0' => array(
                    'type'	=> 'view',
                    'name'	=> '商城',
                    'url'	=> $host
                ),
                '1' => array(
                    'type'	=>	'view',
                    'name'	=>	'个人',
                    'url'	=>	$host . '/FrontUser/personal_center'
                ),
                '2' => array(
                    'name' => '帮助',
                    'sub_button' => array(
                        '0' => array(
                            'type' => 'click',
                            'name' => '客服',
                            'key' => 'customer_service'
                        ),
                        '1' => array(
                            'type' => 'view',
                            'name' => '帮助中心',
                            'url' => $host . '/FrontHelp/help_list'
                        ),
                        '2' => array(
                            'type' => 'view',
                            'name' => '关于',
                            'url' => $host . '/FrontHelp/about'
                        ),
                        '3' => array(
                            'type' => 'view',
                            'name' => '专属推广二维码',
                            'url' => $host . '/FrontUser/my_qr_code'
                        ),
                    )
                )
            )
        );
		#echo "<pre>";
		#print_r($new_menu);
		#die;

        $result = $weixin_obj->menu_create($new_menu);
        var_dump($result);
    }


	//发送客服消息
	function send_cs()
	{
		//发送提示消息
		$appid = C('APPID');
		$secret = C('APPSECRET');
		vendor('Wxin.WeiXin');
		$access_token = WxApi::getAccessToken($appid, $secret);
		$weixin_obj = new WxApi($access_token);

		$user_id = intval(session('user_id'));
		if (!$user_id)
		{
			exit('请先登录');
		}
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('openid');
		echo $user_obj->getLastSql();

		$result = $weixin_obj->message_custom_send_text($user_info['openid'], $GLOBALS['config_info']['DEFAULT_MSG']);
		var_dump($result);
	}

	//设置ton，toff
	function set_time()
	{
		$redis = new Redis();
		$redis->connect('localhost', 6379);
		for ($planter_id = 2044; $planter_id < 2644; $planter_id ++)
		{
			#$planter_id = 2013;
			$planter_obj = new PlanterModel($planter_id);
			$planter_obj->flushCommand('T1', '60');
			$planter_obj->flushCommand('T2', '86340');
			$status_info = $redis->get('status_' . $planter_id);
			#$command_info = $redis->set('command_' . $planter_id, 'GPIO=101011&T1=1800&T2=1800&ADC1=20&ADC2=25&ADC3=60&ADC4=10000&ADC5=0&MD=0END');
			$command_info = $redis->get('command_' . $planter_id);
			echo "<pre>";
			print_r($command_info);
			print_r($status_info);
			$planter_obj = new PlanterModel($planter_id);
			$planter_info = $planter_obj->getPlanterInfo('planter_id = ' . $planter_id);
			print_r($planter_info);
		}
	}

	//添加及其脚本
	function add_planter()
	{
		$planter_obj = new PlanterModel();
		$planter_auth_obj = new PlanterAuthModel();
		$num = 0;
		$mac_arr = array(
			'001fa8806015',
			'001fa8805fc0',
			'001fa8805fcb',
			'001fa8805fc6',
			'001fa8805fd0',
			'001fa8806039',
			'001fa8805fd5',
			'001fa880602d',
			'001fa8805fc8',
			'001fa8806024',
			'001fa8806025',
			'001fa880603c',
			'001fa8805574',
			'001fa880602e',
			'001fa8806017',
			'001fa8805fcf',
			'001fa8806018',
			'001fa880601c',
			'001fa880602c',
			'001fa8805568',
			'001fa880740b',
			'001fa88073df',
		);
		foreach ($mac_arr AS $k => $v)
		{
			$arr = array(
				'planter_code'		=> $v,
				'serial_num'		=> $v,
				'user_id'			=> 7545,
				'planter_name'		=> 'ZLL' . sprintf("%02d", $k),
				'addtime'			=> time(),
				'pickup_time'		=> time(),
				'last_visit_time'	=> time(),
			);
			$planter_id = $planter_obj->add($arr);
			$planter_obj = new PlanterModel($planter_id);
			$planter_obj->getPlanterInfo();

			//绑定用户
			$bind_user_arr = array(
				'7036'
			);
			foreach ($bind_user_arr AS $key => $val)
			{
				$arr = array(
					'planter_id'	=> $planter_id,
					'user_id'		=> $val,
					'auth_time'		=> time(),
					'isuse'			=> 1,
				);
				$planter_auth_id = $planter_auth_obj->add($arr);
				echo $planter_auth_obj->getLastSql() . "<br>";
			}
			echo $planter_obj->getLastSql() . "<br>";
			$num += $planter_id ? 1 : 0;
		}
		echo $num;
	}

	//批量授权
	function add_auth()
	{
		//绑定用户
		$planter_auth_obj = new PlanterAuthModel();
		$bind_user_arr = array(
			'6019'
		);
		for ($val = 2022; $val < 2044; $val ++)
		{
			$arr = array(
				'planter_id'	=> $val,
				'user_id'		=> 6019,
				'auth_time'		=> time(),
				'isuse'			=> 1,
			);
			$planter_auth_id = $planter_auth_obj->add($arr);
			echo $planter_auth_obj->getLastSql() . "<br>";
		}
	}

	//批量初始化种植机redis数据
	function batch_init()
	{
		for ($i = 2044; $i < 2644; $i ++)
		{
			$planter_obj = new PlanterModel($i);
			$planter_obj->getPlanterInfo();
		}
	}

	function aaaaa()
	{
echo 'http://' . $_SERVER['HTTP_HOST'] . $GLOBALS['config_info']['SUBSCRIBE_PIC'];
	}

	//批量添加机器，并生成EXCEL
	function batch_add_planter()
	{
		$planter_obj = new PlanterModel();
		$num = 0;
		$mac = '001FA8000';
		$mac_arr = array();
		for ($i = 349; $i < 949; $i ++)
		{
			$mac_arr[] = $mac . $i;
		}

		//获取批次
		$no = $planter_obj->getNextNo();
		$a = array();

		foreach ($mac_arr AS $k => $v)
		{
			$serial_num = $planter_obj->generateSerialNum();
			$product_id = $planter_obj->generateProductID($no);
			$arr = array(
				'planter_code'		=> $v,
				'serial_num'		=> $serial_num,
				'product_id'		=> $product_id,
				'user_id'			=> 0,
				'planter_name'		=> '我的种植机',
				'addtime'			=> time(),
			);
			$a[] = $arr;
			echo "<pre>";
			print_r($arr);
			#die;

			$planter_id = $planter_obj->add($arr);
			#$planter_obj = new PlanterModel($planter_id);
			#$planter_obj->getPlanterInfo();

			$num += $planter_id ? 1 : 0;
		}

		#die;
		//引入PHPExcel类库
		$title = "【潘朵拉魔盒】第" . intval($no) . "批种植机信息";
		vendor('Excel.PHPExcel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("潘朵拉魔盒")
				->setLastModifiedBy("潘朵拉魔盒")
				->setTitle($title)
				->setSubject($title)
				->setDescription($title)
				->setKeywords($title)
				->setCategory($title);

		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet(0)->setTitle($title);          //标题
		$objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);      //单元格宽度
		$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial'); //设置字体
		$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);      //设置字体大小
		$objPHPExcel->getActiveSheet(0)->setCellValue('A1', 'mac地址');
		$objPHPExcel->getActiveSheet(0)->setCellValue('B1', '序列号');
		$objPHPExcel->getActiveSheet(0)->setCellValue('C1', '生产ID');

		//每行数据的内容
		foreach ($a AS $k => $value)
		{
			static $i  = 2;

			//mac地址
			$objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, $value['planter_code']);

			//序列号
			$objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, $value['serial_num']);

			//生产ID
			$objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, $value['product_id']);

			$i++;
		}

		//直接输出文件到浏览器下载
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $title . date("YmdHis") . '.xls"');
		header('Cache-Control: max-age=0');
		ob_clean(); //关键
		flush(); //关键
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

		echo $num;
	}

	//消息素材接口测试
	function batchget_material()
	{
		//微世界服务号
		$appid = 'wx3b6bfcb6495dff9e';
		$secret = 'f23adf9fb219fdabb7e4cc092c41a96a';
		//亲，马上到服务号
		#$appid = 'wx9d315da8a10eb580';
		#$secret = '7403ec417eb22e5ab2cbfba069755a5e';
		vendor('Wxin.WeiXin');
		$access_token = WxApi::getAccessToken($appid, $secret);
		$weixin_obj = new WxApi($access_token);
		$params = array(
			'type'		=> 'news',
			'offset'	=> 0,
			'count'		=> 20,
		);
		$news_list = $weixin_obj->batchget_material($params);
		echo "<pre>素材列表";
		print_r($news_list);

		$group_list = $weixin_obj->groups_get();
		echo "<pre>分组列表";
		print_r($group_list);

		//发送群组消息
		$params = array(
			'filter'	=> array(
				'group_id'	=> 3,
			),
			'mpnews'	=> array(
				'media_id'	=> '17383712803',
			),
			'msgtype'	=> 'mpnews',
		);
		$result = $weixin_obj->send_message($params);
		echo "<pre>";
		print_r($result);
	}

    //异步请求返回json的方法
    function json_exit($data, $code = 0)
    {
        if (is_array($data))
        {
            exit(json_encode($data));
        }
        else
        {
            exit(json_encode(array(
                'msg'	=> $data,
                'code'	=> $code,
            )));
        }
    }

    function wsq_test()
    {
        //dump(D('MemberCard')->getERPMemberInfoByMemberCardIDOrMobile("510005736"));
        //dump(D('MemberCard')->getERPMemberInfoByMemberCardIDOrMobile("18668063037"));
        //dump(D('MemberCard')->bindMemberCard(39453,"86699799"));
        //dump(D('MemberCard')->createNewMemberForERPSystemByUserID(39606));
        //dump(D('MemberCard')->getERPMemberInfoByMemberCardIDOrMobile("510005736"));
        //$result = (D('Connection')->getResult(
        //    array(
        //        'type' => "09",
        //        'msg' => json_encode(array('GoodsCode' => '')),
        //    )
        //));
        //dump($result);
        //dump(D('Connection')->decodeCompressData($result['CompressData']));
        //dump(D('MemberCard')->bindMemberCard(39453,"86699799"));
        //dump(D('MemberCard')->payByCard(39452,1,0.1));
        //dump(D('MemberCard')->payByCard(39453,NOW_TIME,0.1));
        //dump(D('MemberCard')->createNewMemberForERPSystemByUserID(39453));
        //dump(D('MemberCard')->getERPMemberInfoByMemberCardIDOrMobile("13157187278"));
        //dump(D('MemberCard')->bindMemberCard(39457,"86699801"));
        //
        //dump(D('Order')->syncOrderInfo(340));
        //dump(D('Order')->getDeptList());
        //dump(D('Order')->getERPOrderStatus(24));
        //dump(D('MemberCard')->createNewMemberForERPSystemByUserID(39453));
        //echo $goods_list[2][0];


        //$start = $_REQUEST['ss'];
        //$length = $_REQUEST['ll'];

        //$start = intval($start)?$start:0;
        //$length = intval($length)?$length:10;
        //$user_info = D('User')->syncUserInfoFromCSV($start,$length);
        //dump(D('Ticket')->getERPTicketInfo('39606'));
    }

    function test()
    {
        dump(D('MemberCard')->getERPMemberInfoByMemberCardIDOrMobile("18668063037"));
    }

    function sync()
    {
        $status = D('Item')->syncItemInfo();
        exit($status? 'success':'failure');
    }


    function upload_local_file($file_name, $bucket='images')
    {
        $upToken = get_qiniu_uploader_up_token($bucket);
        $putExtra = new Qiniu_PutExtra();
        $putExtra->Crc32 = 1;
        list($ret, $err) = Qiniu_PutFile($upToken, $file_name, __file__, $putExtra);
        echo "====> Qiniu_PutFile result: \n";
        if ($err !== null) {
            //var_dump($err);
            exit(json_encode($err));
        } else {
            //var_dump($ret);
            exit(json_encode($err));
        }

    }

	//下载模板zip包，解压到相应目录
	function down_temp_zip()
	{
		$page_obj = new PageModel();
		$page_obj->usePage(1);
		die;

		$from_path = 'http://crm.com/Uploads/zip/default.zip';
		$to_path = 'Uploads/' . time() . '.zip';

		put_file_from_url_content($from_path, $to_path);

		$file_name = APP_PATH . 'Tpl/Public/mall_home/blue';
		if (file_exists($file_name))
		{
			delFileUnderDir($file_name);
		}
		$command = 'unzip ' . $to_path . ' -d ' . $file_name;
		$success = @system($command);
		#dump($success);
		#echo $command;
		die;
	}

	function updatePage()
	{
		$page_obj = new PageModel();
		$page_obj->updatePage(1);
	}

	//排序
    //@author wsq
    //如果有排序请求则返回 sort 信息
    protected function get_and_set_sort_info($sort_items)
    {
        $default_order = "desc";
        $url_prefix    = "/" . MODULE_NAME . "/" . ACTION_NAME . "/sort/";

        if (!count($sort_items)) return NULL;

        foreach($sort_items AS $item) {
            $sort_url   = $url_prefix . $item . "." . $default_order;
            $this->assign($item . "_sort_url", $sort_url);
            $this->assign($item . "_sort_order", $default_order);
        }

        $sort  = I('get.sort', NULL, 'strip_tags');
        if ($sort) {
            $sort_info  = explode('.', $sort);
            $sort       = ' ' . str_replace('.', ' ', $sort);
            $sort_name  = $sort_info[0];
            $sort_order = $sort_info[1];
            $new_order  = strtolower($sort_order) ==  'desc'? 'asc' : 'desc';
            $sort_url   = $url_prefix . $sort_name . "." . $new_order;
            $this->assign($sort_name . "_sort_url", $sort_url);
            $this->assign($sort_name . "_sort_order", $new_order);
        }

        return $sort;
    }

    function wxpay()
    {
	    $wxpay_obj = new WXPayModel();
	    //JSAPI
	    $jsApiParameters = $wxpay_obj->pay_code(0, 0.01, 1);
	    $arr = json_decode($jsApiParameters, true);
echo "<img src='" . 'http://qr.liantu.com/api.php?text=' . $arr['code_url'] . "'>";
	    dump($arr);
    }

	function jg()
	{
		/*** demo ***/
		//推所有人
		$jg_obj = new PushModel();
		#$result = $jg_obj->jpush_all('hello');		//通过封装的方法推送
		#$result = $jg_obj->jpush('all', 'hello');	//通过统一的方法推送
		#dump($result);
		#die;

		//推指定用户，根据设备ID推送
		$receiver = array(
			'registration_id'	=> array(
				'100d8559094ecb2a119'
			)
		);
		#$result = $jg_obj->jpush_user('hello', 39454);	//通过封装的方法推送
		$result = $jg_obj->jpush($receiver,'hello1');	//通过统一的方法推送
		#dump($result);
		#die;

		//推指定标签组用户
		$receiver = array(
			'tag'	=> array(
				'user'
			)
		);
		$result = $jg_obj->jpush_tag('hello', 'user');	//通过封装方法推送
		#$result = $jg_obj->jpush($receiver,'hello1');	//通过统一的方法推送
		dump($result);
	}

	//自动确认订单
	function auto_confirm()
	{
        //自动确认订单
        $order_obj = new OrderModel();
        $order_obj->autoConfirmOrder();
	}

	function down_user()
	{
		if(strpos($agent, 'iphone') || strpos($agent, 'ipad'))
		{
			redirect('https://itunes.apple.com/us/app/zheng-hui-qian-bao/id1167284604?mt=8');
		}
		else
		{
			redirect('http://' . $_SERVER['HTTP_HOST'] . '/wallet.apk');
		}
	}

	function down_merchant()
	{
		if(strpos($agent, 'iphone') || strpos($agent, 'ipad'))
		{
			redirect('https://itunes.apple.com/us/app/zheng-hui-shang-jia/id1167284616?mt=8');
		}
		else
		{
			redirect('http://' . $_SERVER['HTTP_HOST'] . '/wallet_enterprise.apk');
		}
	}



	function index(){
		//微信群发消息
		$mass_msg_obj = D('WxMassMsg');
		$msg_info = $mass_msg_obj->getWxMassMsg();
		if($msg_info){
			$msg = array();
			$touser = $msg_info['group'];
			$type = $msg_info['msg_type'];
			if($touser == 'all'){
				$user_obj = D('User');
				$openid_arr = $user_obj->getUserField('openid');
				$msg['touser'] = $openid_arr;
			}else{
				$msg = array(
					'filter' => array('group_id' => $touser)
					);
			}
			if($type == 'news') $type = 'mpnews';
			$msg['msgtype'] = $type;
			switch ($type) {
				case 'text':
					$msg[$type] = array(
						'content' => $msg_info['media_id']
						);
					break;
				case 'image':
				case 'viedo':
				case 'vioce':
				case 'mpnews':
					$msg[$type] = array(
						'media_id' => $msg_info['media_id']
						);
					break;
			}
			Vendor('Wxin.WeiXin');
			$appid = C('APPID');
			$secret = C('APPSECRET');
			$access_token = WxApi::getAccessToken($appid, $secret);
			$wx_obj = new WxApi($access_token);
			$result = $wx_obj->message_mass_send($msg);
			//dump($result);
		}
	}

	function flush_order_address()
	{
		$user_address_obj = new UserAddressModel();
		$order_obj = new OrderModel();
		$order_obj->setLimit(100000000);
		$order_list = $order_obj->getOrderList('order_id, user_address_id', '', 'order_id DESC');
		foreach ($order_list AS $k => $v)
		{
			if ($v['user_address_id'])
			{
				$order_obj = new OrderModel($v['order_id']);
				$user_address_info = $user_address_obj->field('mobile, realname, province_id, city_id, area_id, address')->where('user_address_id = ' . $v['user_address_id'])->find();
				dump($user_address_info);
				$order_obj->setOrderInfo($user_address_info);
				$order_obj->saveOrderInfo();
				echo $order_obj->getLastSql() . "<br>";
			}
		}
	}

	function test_jisu_sms()
	{
		$sms_obj = new SMSModel();
		$content = '您的验证码为323432，感谢您的支持。【店都平台】';//utf8
		$result = $sms_obj->sendSMS('15158131315', $content);
		dump($result);
	}

	//测试转账接口
	function zhuanzhang()
	{
        header("Content-Type:text/html; charset=UTF-8");
		$url = 'http://192.168.1.105:8080';
		$postfields = '<?xml version="1.0" encoding="GBK"?>
			<CMBSDKPGK>
			<INFO>
			<FUNNAM>DCPAYMNT</FUNNAM>
			<DATTYP>2</DATTYP>
			<LGNNAM>zhqbpay</LGNNAM>
			</INFO>
			<SDKPAYRQX>
			<BUSCOD>N02031</BUSCOD>
			</SDKPAYRQX>
			<DCOPDPAYX>
			<YURREF>' . ('ZHQB' . time() ). '</YURREF>
			<DBTACC>579900750510806</DBTACC>
			<DBTBBK>57</DBTBBK>
			<TRSAMT>0.01</TRSAMT>
			<CCYNBR>10</CCYNBR>
			<STLCHN>N</STLCHN>
			<NUSAGE>ceshi</NUSAGE>
			<BNKFLG>Y</BNKFLG>
			<CRTACC>6226095710871547</CRTACC>
			<CRTNAM>' . iconv("UTF-8", "GBK//IGNORE", '王宋清'). '</CRTNAM>
			<CRTBNK>招商银行</CRTBNK>
			</DCOPDPAYX>
			</CMBSDKPGK>
			';
        $curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
        curl_close($curl);
		#var_dump($resp);
		$xml = libxml_disable_entity_loader(true);
		$xml = json_decode(json_encode(simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		dump($xml);
	}

	//测试转账接口：跨行
	function zhuanzhang2()
	{
        header("Content-Type:text/html; charset=UTF-8");
		$url = 'http://192.168.1.105:8080';
		$postfields = '<?xml version="1.0" encoding="GBK"?>
			<CMBSDKPGK>
			<INFO>
			<FUNNAM>DCPAYMNT</FUNNAM>
			<DATTYP>2</DATTYP>
			<LGNNAM>zhqbpay</LGNNAM>
			</INFO>
			<SDKPAYRQX>
			<BUSCOD>N02031</BUSCOD>
			</SDKPAYRQX>
			<DCOPDPAYX>
			<YURREF>' . ('ZHQB' . time()). '</YURREF>
			<DBTACC>579900750510806</DBTACC>
			<DBTBBK>57</DBTBBK>
			<TRSAMT>0.01</TRSAMT>
			<CCYNBR>10</CCYNBR>
			<STLCHN>N</STLCHN>
			<NUSAGE>' . iconv("UTF-8", "GBK//IGNORE", '测试') . '</NUSAGE>
			<BNKFLG>N</BNKFLG>
			<CRTFLG>Y</CRTFLG>
			<CRTACC>6217001540016760876</CRTACC>
			<CRTNAM>' . iconv("UTF-8", "GBK//IGNORE", '姜伟') . '</CRTNAM>
			<CRTBNK>' . iconv("UTF-8", "GBK//IGNORE", '中国建设银行杭州余杭太炎支行') . '</CRTBNK>
			<CRTADR>' . iconv("UTF-8", "GBK//IGNORE", '中国建设银行杭州余杭太炎支行') . '</CRTADR>
			</DCOPDPAYX>
			</CMBSDKPGK>
			';
        $curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
        curl_close($curl);
		#var_dump($resp);
		$xml = libxml_disable_entity_loader(true);
		$xml = json_decode(json_encode(simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		dump($xml);
	}

	//测试封装的转账接口
	function zhuanzhang3()
	{
		header("Content-Type:text/html; charset=UTF-8");
		$bank_obj = new BankModel();
		$result = $bank_obj->bank_direct_pay(12, 0.01);
		dump($result);
		$result = $bank_obj->bank_direct_pay(13, 0.01);
		dump($result);
	}

	//网银贷记转账
	function zhuanzhang4()
	{
		$amount = 0.01;
		header("Content-Type:text/html; charset=UTF-8");
		$url = 'http://192.168.1.189:9000';
		$postfields = '
			<?xml version="1.0" encoding="GBK"?>
			<CMBSDKPGK>
				<INFO>
					<FUNNAM>NTIBCOPR</FUNNAM>
					<DATTYP>2</DATTYP>
					<LGNNAM>diandupay</LGNNAM>
				</INFO>
				<NTOPRMODX>
					<BUSMOD>00001</BUSMOD>
				</NTOPRMODX>
				<NTIBCOPRX>
					<SQRNBR>' . time() . '</SQRNBR>
					<BBKNBR>CB</BBKNBR>
					<ACCNBR>577904463810802</ACCNBR>
					<CNVNBR>0000002130</CNVNBR>
					<YURREF>' . ('ZHQB' . time() . randLenString()) . '</YURREF>
					<CCYNBR>10</CCYNBR>
					<TRSAMT>' . $amount . '</TRSAMT>
					<CRTSQN>RCV0000002</CRTSQN>
					<NTFCH1>wuzhenhai@beyondin.com</NTFCH1>
					<NTFCH2>15168352432</NTFCH2>
					<CDTNAM>' . iconv("UTF-8", "GBK//IGNORE", '吴振海') . '</CDTNAM>
					<CDTEAC>6228480338795665078</CDTEAC>
					<CDTBRD>103100000026</CDTBRD>
					<TRSTYP>C210</TRSTYP>
					<TRSCAT>09001</TRSCAT>
				</NTIBCOPRX>
			</CMBSDKPGK>
			';
		$curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
dump($resp);
		curl_close($curl);
		$xml = libxml_disable_entity_loader(true);
		$xml = json_decode(json_encode(simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		dump($xml);
	}

	/**
	 * @param int $bank_card_id 银行卡id
	 * @param float $amount 汇款金额
	 * @return string 错误信息
	 */
	function pay_to_bank($bank_card_id=17,$amount=0.01){
		$bank_obj = new BankModel();
		$result = $bank_obj->bank_main_pay($bank_card_id, $amount);

		$admin_remark = '';
		if (!isset($result['INFO']['RETCOD']))
		{
			$admin_remark = '接口异常，可能是前置机未开启，若不是该原因，请联系开发人员解决' . json_encode($result);
		}
		if ($result['INFO']['RETCOD'] != 0 && $result['NTOPRRTNZ']['ERRCOD'] != 'SUC0000')
		{
			//返回result['INFO']['ERRMSG']
			$admin_remark = '接口异常，招行返回结果1：' . $result['INFO']['ERRMSG'];
		}

		if (!$admin_remark)
		{
			//未报错情况下，等待5秒，去请求获取银行的业务处理结果
			sleep(5);
			$reqnbr = $result['NTOPRRTNZ']['REQNBR'];
			$pay_result = $bank_obj->bank_pay_result_search($reqnbr);
			#dump($result);
			#dump($reqnbr);
			#dump($pay_result);
			log_file("result : " . json_encode($result), 'bank_main_pay', true);
			log_file("pay_result : " . json_encode($pay_result), 'bank_main_pay', true);
			if ($pay_result['INFO']['RETCOD'] != 0 || isset($pay_result['NTEBPINFZ']['RJCRSN']))
			{
				//返回result['INFO']['ERRMSG']
				print_r($pay_result);
				$admin_remark = '接口异常，招行返回结果2：' . "<br>" . $pay_result['NTEBPINFZ']['RJCRSN'] . ';' . $pay_result['NTEBPINFZ']['RTNNAR'];
			}


		}
		print_r($admin_remark);
		print_r($result);
		exit();
	}

	//用封装好的接口测试
	function zhuanzhang5()
	{
		$bank_obj = new BankModel();
		$result = $bank_obj->bank_direct_pay(12, 0.01);
		dump($result);
		$result = $bank_obj->bank_main_pay(13, 0.01);
		dump($result);
	}

	function clean_data()
	{
		die;
		//用户数据
		$sql = array();
		$sql[] = 'TRUNCATE TABLE tp_account';
		$sql[] = 'UPDATE tp_address_province SET is_open = 0, user_id = 0, addtime = 0';
		$sql[] = 'UPDATE tp_address_city SET is_open = 0, user_id = 0, addtime = 0';
		$sql[] = 'UPDATE tp_address_area SET is_open = 0, user_id = 0, addtime = 0';
		$sql[] = 'TRUNCATE TABLE tp_agent';
		$sql[] = 'TRUNCATE TABLE tp_authenticate_copy';
		$sql[] = 'TRUNCATE TABLE tp_bank_card';
		$sql[] = 'TRUNCATE TABLE tp_bank_card_apply';
		$sql[] = 'TRUNCATE TABLE tp_collect';
		$sql[] = 'TRUNCATE TABLE tp_coupon';
		$sql[] = 'TRUNCATE TABLE tp_coupon_merchant';
		$sql[] = 'TRUNCATE TABLE tp_deposit_apply';
		$sql[] = 'TRUNCATE TABLE tp_login_log';
		$sql[] = 'TRUNCATE TABLE tp_logs';
		$sql[] = 'TRUNCATE TABLE tp_merchant';
		#$sql[] = 'TRUNCATE TABLE tp_merchant_class';
		$sql[] = 'TRUNCATE TABLE tp_order';
		$sql[] = 'TRUNCATE TABLE tp_order_coupon';
		$sql[] = 'TRUNCATE TABLE tp_order_item';
		$sql[] = 'TRUNCATE TABLE tp_order_log';
		$sql[] = 'TRUNCATE TABLE tp_order_temp';
		$sql[] = 'TRUNCATE TABLE tp_packet_deposit_apply';
		$sql[] = 'TRUNCATE TABLE tp_push_log';
		$sql[] = 'TRUNCATE TABLE tp_shake_log';
		$sql[] = 'DELETE FROM tp_users WHERE user_id > 3';
		$sql[] = 'TRUNCATE TABLE tp_verify_code';
		$sql[] = 'TRUNCATE TABLE tp_sms_log';
		$sql[] = 'TRUNCATE TABLE tp_user_address';
		$sql[] = 'TRUNCATE TABLE tp_business';
		$sql[] = 'DELETE FROM tp_users WHERE role_type = 3 OR role_type = 2';
		$obj = M('order');
		foreach ($sql AS $k => $v)
		{
			$obj->query($v);
			echo $obj->getLastSql() . "<br>";
		}
	}

	function get_headimgurl()
	{
		$user_obj = new UserModel();
		$user_obj->setLimit(1000);
		$user_list = $user_obj->getUserList('', 'role_type = 3 AND headimgurl = ""');
		foreach ($user_list AS $k => $v)
		{
$user_info = get_headimgurl($v['openid']);
unset($user_info['language']);
unset($user_info['country']);
unset($user_info['subscribe_time']);
unset($user_info['remark']);
unset($user_info['groupid']);
$user_obj->userId = $v['user_id'];
$user_obj->editUserInfo($user_info);
echo $user_obj->getLastSql() . "<br>";
		}
	}

function generate_qr_code()
{
$user_id = $this->_request('user_id');
$file = get_qr_code($user_id);
dump($file);
}

	//网银贷记转账结果查询
	function bank_pay_result_search()
	{
		$reqnbr = $_REQUEST['sn'];
		//exit($reqnbr);
		if(!$reqnbr){
			die();
		}
		header("Content-Type:text/html; charset=UTF-8");
		$url = 'http://' . $GLOBALS['config_info']['BANK_PAY_IP'];
		$postfields = '
			<?xml version="1.0" encoding="GBK"?>
			<CMBSDKPGK>
			<INFO>
			<FUNNAM>NTEBPINF</FUNNAM>
			<DATTYP>2</DATTYP>
			<LGNNAM>diandupay</LGNNAM>
			</INFO>
			<NTEBPINFX>
			<REQNBR>' . (string) $reqnbr . '</REQNBR>
			<TRXNBR></TRXNBR>
			</NTEBPINFX>
			</CMBSDKPGK>
			';
		$curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
		curl_close($curl);
		libxml_disable_entity_loader(true);
		$result = json_decode(json_encode(simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		$str = '';
		foreach($result['NTEBPINFZ'] as $k => $v)
		{
		   $str.= '['.$k.']'.'=>'.$v.'</br>';
		}
		exit($str);
	}

	function getOrderInfo(){
		$order_obj = new OrderModel();
		$val['order_id'] = 96;
		$where = "order_id='". $val['order_id']."'";
		$order_info = $order_obj->getOrderByInfo('',$where);
		var_dump($order_info);
		var_dump($order_obj->getLastSql());
		exit();
	}


	//测试调用
	function do_qiniu_copy(){
		var_dump($this->qiniu_copy());
	}

	//七牛图片复制接口
	/**
	 * @param string $img_url 需要复制的图片url
	 * @return string 返回json字符串
	 */
	function qiniu_copy($img_url='')
	{
		vendor('qiniu7.autoload');
		//$bucket='pannationalarts-images';
		//图片域名，注意末尾加 '/'
		$url_head = 'http://img.pannationalarts.com/';
		if($img_url=='') {
			$img_url = 'http://img.pannationalarts.com/Uploads/image/default/2017-05/20170503193242_63760.jpg';//测试时暂时写死，之后获取
		}
		//获取目录和文件名
		$key = str_replace($url_head,'',$img_url);


		//配置储存的目录和文件名
		$key_arr = explode('/',$img_url);
		$len = count($key_arr);
		$img_name = $key_arr[$len-1];//取文件名
		$key2 = str_replace($img_name,'copy_'.time().'_'.$img_name,$key);

		// 需要填写你的 Access Key 和 Secret Key
		$accessKey = C('QINIU_UPLOAD_DRIVER_CONFIG.QINIU_ACCESS_KEY');
		$secretKey = C('QINIU_UPLOAD_DRIVER_CONFIG.QINIU_SECRET_KEY');

		// 构建鉴权对象
		$auth = new \Qiniu\Auth($accessKey, $secretKey);


		// 要上传的空间
		$bucket = C('QINIU_UPLOAD_DRIVER_CONFIG.QINIU_IMAGES_BUCKET');

		//base64url安全加密
		$entry_base = \Qiniu\base64_urlSafeEncode($bucket.":".$key);//需要被复制的文件信息base64处理
		$copy_entry_base = \Qiniu\base64_urlSafeEncode($bucket.":".$key2);//保存的文件信息base64处理



		$data = '/copy/'.$entry_base.'/'.$copy_entry_base;
		//加密处理请求信息
		//Qiniu_SetKeys($accessKey, $secretKey);
		//获取管理凭证
		$accessToken  = $auth->sign($data."\n");
		//var_dump($data);
//		exit();

		header("Content-Type:text/html; charset=UTF-8");

		//设置请求凭证
		$author = "QBox ".$accessToken;
		$headers = array();
		$headers[] = 'Content-Type: application/x-www-form-urlencoded;';
		$headers[] = 'Authorization:'.$author;
		//var_dump($headers);

		$url = 'http://rs.qiniu.com'.$data;

		$curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
		curl_close($curl);
		//var_dump($resp);

		//返回为空的话表示成功，不为空的话，返回错误信息
		if(!$resp){
			return json_encode(
				array(
					'code'=>0,
				    'img_url'=>$url_head.$key2
				)
			);
		}else{
			return json_encode(
				array(
					'code'=>1,
					'err_msg'=>$resp
				)
			);
		}
	}



	//民生银行接口请求生成签名
	public function makesign($data, $appSecret)
	{
		ksort($data);
		$getdata = $data;//除去签名数据
		if (isset($getdata['sign'])) {
			unset($getdata['sign']);
		}
		$signstr = '';
		foreach ($getdata as $key => $val) {
			if ($signstr) {
				$signstr = $signstr . '&' . $key . '=' . $val;
			} else {
				$signstr = $key . '=' . $val;
			}
		}
		$stringSignTemp = $signstr . '&key=' . $appSecret;
		$sign = strtoupper(md5($stringSignTemp));
		return $sign;
	}


	function ms_pay_test(){
		$mspay_obj = new MsPayModel();
		$mspay_obj->get_mch_id();

//ODM支付接口
	}

	function ms_query(){
		$mspay_obj = new MsPayModel();
		$mspay_obj->query_mch_info();
	}

	function ms_edit(){
		$mspay_obj = new MsPayModel();
		$mspay_obj->edit_mch_info();
	}


	function ali_pay(){
		$mspay_obj = new MsPayModel();
		$mspay_obj->alipay_pay_code();
	}

	/**
	 * 微信付款成功后的异步回调处理
	 * @author zt
	 * @param void
	 * @return void
	 * @todo 调用微信支付模型验证来源可靠性后，获取订单号，调用订单模型的payOrder方法设置订单状态为已付款
	 */
	public function wxpay_response()
	{

		log_file('globalAction -- ms_wxpay_response: in','ms_wxpay_response');
		$wxpay_obj = new MsPayModel();
		$success = $wxpay_obj->pay_response();
		if ($success)
		{
			echo 'success';
		}
	}

	/**
	 * 微信付款成功后的异步回调处理
	 * @author zt
	 * @param void
	 * @return void
	 * @todo 调用微信支付模型验证来源可靠性后，获取订单号，调用订单模型的payOrder方法设置订单状态为已付款
	 */
	public function alipay_wxpay_response()
	{

		log_file('globalAction -- alipay_wxpay_response: in','alipay_wxpay_response');
		$wxpay_obj = new MsPayModel();
		$success = $wxpay_obj->alipay_pay_response();
		if ($success)
		{
			echo 'success';
		}
	}

	/**
	 * 支付宝付款成功后的回调处理
	 * @author zt
	 * @param void
	 * @return void
	 * @todo 调用支付宝支付模型验证来源可靠性后，获取订单号，调用订单模型的payOrder方法设置订单状态为已付款
	 */
	public function mobile_alipay()
	{

		$wxpay_obj = new AlipayModel();
		$success = $wxpay_obj->mobile_pay_response();
		if ($success)
		{
			echo 'success';
		}
	}

	//测试退款
	function test_refund(){
		$mspay_obj=new MsPayModel();
		$result=$mspay_obj->get_mch_id(53);
		//log_file(json_encode($result),'into_pieces');


		/*$order_id=$this->_request('order_id');
		$order_obj=new OrderModel();
		$order_info=$order_obj->getOrderByInfo('','order_id = '.$order_id);
		$wxpay_obj=new WXPayModel();
		$wxpay_obj->wx_refund($order_info['pay_code'],0.01);*/
		/*$alipay_obj=new AlipayModel();
		$data=$alipay_obj->refund_apply_no_pwd($order_id);
		echo $data;*/
	}

	//获取附近建筑物(根据经纬度)
	function get_building_by_lat_and_lon(){
		$local_latitude = 30.2890097713;
		$local_longitude = 120.0162366923;
		$ak='1NyB7vqPhw6BhHXUvHum4NeD';
		$url='http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location='.$local_latitude.','.$local_longitude.'&output=json&pois=1&ak='.$ak;
		$str=file_get_contents($url);
		//整理格式
		$str = str_replace('renderReverse&&renderReverse(',"",$str);
		$newstr = substr($str,0,strlen($str)-1);
		$result=json_decode($newstr,true);

		$result=$result['result']['pois'];//各个建筑的点
	/*	foreach($result as $k=>$v){
			$pois[$k]['name']=$v['name'];
			$pois[$k]['point']=$v['point'];
		}*/
		//echo json_encode($pois);exit;
		$near_building_arr=array_column($result, 'point','name');
		echo json_encode($near_building_arr);
		exit;
	}
	//获取附近建筑物(根据关键字)
	function get_building_by_key_words(){
		$key_words='乐富海邦园';
		$city='杭州';
		$ak='1NyB7vqPhw6BhHXUvHum4NeD';
		$url='http://api.map.baidu.com/place/v2/search?q='.$key_words.'&region='.$city.'&output=json&ak='.$ak;
		$str=file_get_contents($url);

		$result=json_decode($str,true);

		$result=$result['results'];//各个建筑的点
		foreach($result as $k=>$v){
			$pois[$k]['name']=$v['name'];
			$pois[$k]['point']=$v['location'];
		}
		echo json_encode($pois);
		exit;

	}

	//改变超时且已付款的订单
	function change_paid_and_overtime_order(){
		$config_obj=new ConfigBaseModel();
		$over_time=$config_obj->getConfig('over_time');//单位h
		if(!$over_time){
			exit;
		}
		$over_time=time()-$over_time*24*3600;
		$order_obj=new OrderModel();
		$num=$order_obj->getOrderNum('type=2 and order_status=1 and  user_id = 62819 and start_delivery_time <'.$over_time);
		$order_obj->setLimit($num);
		$order_list=$order_obj->getOrderList('order_id','type=2 and user_id = 62819 and order_status=1 and start_delivery_time <'.$over_time);
		$order_list=array_column($order_list, 'order_id');
		if(empty($order_list)){
			exit;
		}
		$order_obj->query("update tp_order set order_status = 3 where order_id in (".implode(',',$order_list).")");
		log_file('sql:'.$order_obj->getLastSql(),'change_order_status');
	}

	//进件通知接口
	public function get_mch_response(){
		$data=$this->_request();
		log_file('data:'.json_encode($data),'get_mch_response');
		log_file('data_type:'.gettype($data),'get_mch_response');

//		$data = json_encode($data);
//		$data = json_decode($data,true);
		$mch_id=$data['data']['mch_id'];
		log_file('$mch_id:'.$mch_id,'get_mch_response');
		$mch_status=$data['data']['status'];
		log_file('$mch_status:'.$mch_status,'get_mch_response');
		$business_obj=new BusinessModel();
		$business_info=$business_obj->getBusinessInfo('mch_id = '.$mch_id);
		log_file('$business_obj:'.$business_obj->getLastSql(),'get_mch_response');
		if($business_info){
			$arr=array(
				'mch_status'=>$mch_status,
//				'business_name' => $data['bankSpName'],//简称
//				'contact_number'=> $data['servicePhone'],
			);
			if($mch_status==1) {
			$business_obj->editBusiness($business_info['business_id'], $arr);
				log_file('sql:'.$business_obj->getLastSql(),'get_mch_response');
				//推送进件成功
                $user_obj=new UserModel($business_info['user_id']);
                $user_info=$user_obj->getUserField('nickname,username');
                $msg = array(
                    "first" => "尊敬的用户，您的进件已通过审核",
                    "keyword1" => $user_info['nickname'],
                    "keyword2" => $user_info['username'],
                    "keyword3" => "进件审核通过",
                    "keyword4" => "--",
                    "remark" => "感谢您的使用",
                    "url"=>"dd.diandupt.com/FrontUserCenter/person_center",
                );
                //PushModel::wxPush($user_id, 'pay_in_business', $msg);
                PushModel::wxPush($business_info['user_id'], 'literature_review', $msg);
			}else{
				$business_obj->editBusiness($business_info['business_id'], $arr);
				log_file('sql:'.$business_obj->getLastSql(),'get_mch_response');
				//推送进件失败
                $user_obj=new UserModel($business_info['user_id']);
                $user_info=$user_obj->getUserField('nickname,username');
                $msg = array(
                    "first" => "尊敬的用户，您的进件未通过审核",
                    "keyword1" => $user_info['nickname'],
                    "keyword2" => $user_info['username'],
                    "keyword3" => "进件未审核通过",
                    "keyword4" => "--",
                    "remark" => "感谢您的使用",
                    "url"=>"dd.diandupt.com/FrontUserCenter/person_center",
                );
                //PushModel::wxPush($user_id, 'pay_in_business', $msg);
                PushModel::wxPush($business_info['user_id'], 'literature_review', $msg);
			}
		}

		exit(json_encode(array(
			"code" => 0,
			"msg" => "success"
		)));
	}

	public function test_withdrawals(){
		$mspay_obj=new MsPayModel();
		$mspay_obj->withdrawals(56,10);
	}

	public function getBtToken(){
		$appid = 'wx6842ca2f2f927378';
		$secret = 'c69f128a7481ffd09fd8becc8fa79f63';
		$url ="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret."";
		$ret = $this->getData($url);
		$data=json_decode($ret);
		$access_token = $data->access_token;
		//获取产品id
		$product_id = 37326;
		//$result = $this->getData("https://api.weixin.qq.com/device/getqrcode?access_token=".$access_token."&product_id=".$product_id);

		//var_dump($result);
		//授权设备
		$mac = 'FFFF32353971';
//		$mac = '7014A62A14D2';
		var_dump($mac);
		$drvice_id = "gh_71760b749180_09343f817b3a303e";

		$params = '{'
		.'"device_num":"1",'
        .'"device_list":['
    	.'			{'
		.'				"id":"'.$drvice_id.'",'
		.'				"mac":"'.$mac.'",'
		.'				"connect_protocol":"3",'
		.'			    "auth_key":"",'
		.'				"close_strategy":"1",'
		.'				"conn_strategy":"1",'
		.'				"crypt_method":"0",'
		.'				"auth_ver":"0",'
		.'				"manu_mac_pos":"-1",'
		.'				"ser_mac_pos":"-2",'
		.'				"ble_simple_protocol": "0"'
   		.'			 }'
    	.'			],'
        .'"op_type":"1",'
       // .'"product_id": "'.$product_id.'"'
     .' }';
		$r =$this->getDataWithParams("https://api.weixin.qq.com/device/authorize_device?access_token=".$access_token, $params);
		//print_r($params);
		var_dump($r);

		//查询是否绑定
//		$ret = $this->getData('https://api.weixin.qq.com/device/get_stat?access_token='.$access_token.'&device_id='.$drvice_id);
//		var_dump($ret);

	}


	//获取https的get请求结果
	function getDataWithParams($c_url, $vars = '')
	{
		$curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_REFERER, 'https://mp.weixin.qq.com/cgi-bin/singlemsgpage?t=wxm-singlechat&lang=zh_CN');
		curl_setopt($curl, CURLOPT_URL, $c_url); // 要访问的地址
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
		curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
		curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer

		#curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转

		$postfields = $vars;
//		foreach ($vars as $key => $value){
//			$postfields .= '&' . urlencode($key) . '=' . urlencode($value);
//		}

		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		//curl_setopt($curl, CURLOPT_HEADER, 1); // 显示返回的Header区域内容
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
		$tmpInfo = curl_exec($curl); // 执行操作
		if (curl_errno($curl))
		{
			echo 'Errno'.curl_error($curl);//捕抓异常
		}
		curl_close($curl); // 关闭CURL会话
		return $tmpInfo; // 返回数据
	}

	function test_balance(){
		$ms_pay_obj = new MsPayModel();
		echo $ms_pay_obj ->balance(22);

	}
	function test_balance1(){
		$business_obj = new BusinessModel();
		$business_info = $business_obj->query('select sum(ms_left_money) from tp_business where ms_left_money!=""');
		$business_info = $business_obj->getBusinessList('status = 1');
		$ms_pay_obj = new MsPayModel();
		foreach($business_info as $k=>$v){
			$res=$ms_pay_obj ->balance($v['mch_id']);
			$data_res = json_decode($res,true);
			$business_obj->editBusiness($v['business_id'],array('ms_left_money'=>$data_res['data']['balance']));
			usleep(100000);
		}
	}
}
