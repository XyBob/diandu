<?php
class SMSModel extends Model
{
     public function __construct(){
		$this->db(0);
		$this->tableName = C('DB_PREFIX') . 'sms_log';
     }
     
    /** 
     * @access public
     * @desc 用实际数据替换格式化的消息格式 （参考tp_sms_set表中sms_text字段）
     * @param string $sms_text	预处理的格式化短信内容
     * @param string $type 类型。3种值：'verify_code'
     * @param array $data 对应类型的数据。比如：如果$send_name为order_create即与订单有关，那么这里的$data就是订单的数据（数据通过订单模型在控制器中获取）
     * @return string $new_text 返回替换好的新短信内容               
     * 
     */
    public function replaceSMSSettingParams($sms_text='', $type='', $data=array())
    {
        if(!$sms_text || !$type)
        {
        	return false;
        }

        switch ($type)          //对于跟多的文字模版支持，这里再行添加
        {
            case 'verify_code':
                //$sms_text = str_replace('#verify_code#', $data['verify_code'], $sms_text);	 //订单编号
                $sms_text = '您的验证码为'.$data['verify_code'].'，感谢您的支持。【店都平台】';
                break;
            default :
                break;
        }
        return $sms_text;
    }

	/**
	 * 极速：发送短信
	 * @author 姜伟
	 * @param string $mobile 手机号
	 * @param string $text 发送内容
	 * @return void
	 * @todo 初始化数据库，数据表
	 */
    public function sendSMS($mobile, $text)
    {
		//发送短信
        $key = D('ConfigBase')->getConfig('sms_key');
		//$key = '00ea59a4b3c7b4a7';
		$url = 'http://api.jisuapi.com/sms/send?appkey=' . $key . '&mobile=' . $mobile . '&content=' . $text;
		$result = json_decode(file_get_contents($url), true);
      /*  echo json_encode($result);
        exit;*/
		//数据
		$data = array(
			'send_mobile_list'	=> $mobile,
			'send_text'			=> $text,
			'sms_send_time'		=> time(),
			'sms_send_state'	=> $result['status'],
		);
		//写日志
		if (isset($result['status']) && $result['status'] == 0)
		{
			//发送成功，保存到发送记录中
			$this->add($data);
		}
		else
		{
			//发送失败，保存到日志中
			log_file(json_encode($data) . "\n" . json_encode($result), 'sms_error_log', true);
		}

		return $result['status']=='0'? 1 : -1;
	}

	/**
	 * 发送短信
	 * @author 姜伟
	 * @param string $mobile 手机号
	 * @param string $text 发送内容
	 * @return void
	 * @todo 初始化数据库，数据表
	 */
    /*public function sendSMS($mobile, $text)
    {
		//发送短信
        $uid = D('ConfigBase')->getConfig('sms_uid');
        $key = D('ConfigBase')->getConfig('sms_key');
        $uid = $uid ? $uid : "达利2015";
        $key = $key ? $key : "e5d272fbac61f0e59878";

        $url = 'http://utf8.sms.webchinese.cn/?Uid='.$uid.'&Key='.$key
            .'&smsMob=' . $mobile . '&smsText=' . $text;
		$send_state = file_get_contents($url);

		//写日志
		$data = array(
			'send_mobile_list'	=> $mobile,
			'send_text'			=> $text,
			'sms_send_time'		=> time(),
			'sms_send_state'	=> $send_state,
		);
		$this->add($data);

		return $send_state;
	}*/
   
    /** 
     * @access public
     * @desc 获取短信发送历史记录
     * @param string $where  
     * @param string $limit  
     * @param string $order
     * @return bool 返回查询结果
     */
    public function getSMSSendingList($where='', $limit='0,20', $order='sms_send_time DESC')
    {
        $data = $this->where($where)->order($order)->limit($limit)->select();
        return $data;
    }
   
    /** 
     * @access public
     * @desc 获取剩余短信数  (通过$this->ConfigBaseMode->getConfig('sms_total')进行获取)
     */
    public function getSMSLeftNumber()
    {
		$url = 'http://sms.webchinese.cn/web_api/SMS/?Action=SMS_Num&Uid=jjedw&Key=e646f760d00cd4e69102';
		$sms_num = file_get_contents($url);

		return $sms_num;
    }
   
    /**
     * @access public
     * @todo 发送验证码
     * @param int $mobile 接收者手机号。必须
     * @param string $verify_code 验证码
     * @return 成功返回1，失败返回其它数字
     */
    public function sendVerifyCode($mobile, $verify_code)
    {
    	if(!$mobile || !$verify_code)
    	{
    		return 0;
    	}

    	$row = $this->getSMSSettingByTag('verify_code');	//根据发送标记（事件）获取相应配置信息
    	if(!$row['state'])		//如果该项短信服务已经关闭
    	{
    		return -1;
    	}
    	$data = array(			//组装数据
			'verify_code'	=>	$verify_code
    	);
        $sms_text = $row['sms_text'] ? $row['sms_text'] : $row['default_sms_text'];
    	$message =  $this->replaceSMSSettingParams($row['sms_text'], 'verify_code', $data);		//短信内容
    	$send_state = $this->sendSMS($mobile,$message);

    	return $send_state;
    }
 
    /** 
     * @access public
     * @desc 根据发送标记获得相应设置信息
     */
    public function getSMSSettingByTag($send_name)
    {
		$sms_set_obj = new SMSSetModel();
		return $sms_set_obj->getSMSSettingByTag($send_name);
    }

    /** 
     * @access public
     * @desc    获取短信配置项
     */
    public function getSMSSettingList()
    {
        $this->trueTableName = C('DB_PREFIX').'sms_set';
        $row = $this->select();
        if($row)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }
    }
  
    /** 
     * @access public
     * @desc 设置短信配置项
     * @param string $send_name 要设置的项目 为where条件所用
     * @data array  $data 数组，参数值 如：array('state'=>1,'to_admin'=>1)（格式参考TP框架CURD操作中更新部分）
     * @return bool 成功返回TRUE 否则返回FALSE
     */
    public function setSMSSetting($send_name,$data=array())
    {
        if(!$send_name || empty($data))
        {
            return FALSE;
        }
      #  $this->trueTableName = C('DB_PREFIX').'sms_set';           //操作tp_sms_set表
        $sms_set = M('sms_set');
        if($sms_set->where('send_name = "'.$send_name.'"')->save($data))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
