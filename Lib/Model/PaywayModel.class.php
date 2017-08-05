<?php
/**
*  支付方式
*  @ Date : 2014/04/02
*  @ Author : lyf@360shop.cc
*/

class PaywayModel extends Model 
{
	/**
	 * 支付方式ID
	 */

	private $paywayId = 0;

	/** 
	 * 构造函数
	 * @Author 姜伟
	 * @param array $payway_info 支付方式信息数组
	 * @return boolean 成功返回true 失败返回false
	 * @todo 检验参数有效性，将支付方式信息根据pay_tag更新到数据库
	 */
    public function PaywayModel($paywayId)
    {
		$this->paywayId = intval($paywayId);
        $this->db(0);
        $this->tableName = C('DB_PREFIX') . 'payway';
    }

    /** 
	 * 获取APP有效的支付方式列表
	 * @Author zlf
	 * @param string $fields
	 * @param string $where
	 * @param string $order
	 * @return boolean 成功返回true 失败返回false
	 * @todo 根据参数获取支付方式信息列表
	 */
    public function getAppPaywayList($fields = '', $where = '', $order = '')
    {
		return $this->field($fields)->where('pay_tag = "alipay" OR pay_tag = "wallet"' . $where)->order($order)->select();
    }
    
	/** 
	 * 获取银行列表
	 * @Author 姜伟
	 * @param void
	 * @return array $bank_list
	 * @todo 获取银行列表
	 */
    public function getBankList()
    {
		return $this->field('payway_id, pay_tag, pay_name, pay_logo')->where('pay_type = 2')->order('payway_id ASC')->select();
    }
    
	/** 
	 * 获取有效的支付方式列表
	 * @Author 姜伟
	 * @param string $fields
	 * @param string $where
	 * @param string $order
	 * @return boolean 成功返回true 失败返回false
	 * @todo 根据参数获取支付方式信息列表
	 */
    public function getPaywayList($fields = '', $where = '', $order = '')
    {
        // todo: 过滤暂时在模型里面控制
        //$member_card_id = D('User')->getMemberCardID(intval(session('user_id')));

        $where .= " AND pay_tag <> 'cardpay'";
		$list = $this->field()->where('isuse = 1' . $where)->order($order)->select();
		//点都会员卡暂时不用
//        $pay_card_list = D('MemberCard')->getPayCardList(intval(session('user_id')));
//        if ($pay_card_list) {
//            $card_pay_info = $this->field()->where('pay_tag = "cardpay"')->find();
//            $pay_name = $card_pay_info['pay_name'];
//            foreach ($pay_card_list AS $k => $v) {
//                $card_pay_info['pay_name'] = $pay_name . '［'. substr($v['card_code'], -4,4) . '］';
//                $card_pay_info['card_code'] = $v['card_code'];
//                array_push($list, $card_pay_info);
//            }
//        }
        return $list;
    }
    
	/** 
	 * 获取所有支付方式列表
	 * @Author 姜伟
	 * @param string $fields
	 * @param string $where
	 * @param string $order
	 * @return boolean 成功返回true 失败返回false
	 * @todo 根据参数获取支付方式信息列表
	 */
    public function getAllPaywayList($fields = '', $where = '', $order = '')
    {
		return $this->field($fields)->where($where)->order($order)->select();
    }
     
    public function getPaywayInfoById($id)
    {
    	return $this->where('payway_id = ' . $id)->find();    	
    }

    //根据payway_id获取pay_tag
    public function getPayTagById($payway_id)
    {
        if (!is_numeric($payway_id))  return false;
    	return $this->where('payway_id = ' . $payway_id)->getField('pay_tag');    	
    }

    //根据pay_name获取payway_id
    public function getPayIdByName($pay_name)
    {
        if (!$pay_name)  return false;
    	return $this->where('pay_name LIKE "%' . $pay_name . '%"')->getField('payway_id');    	
    }
  
	/** 
	 * 编辑支付方式，参数支付方式数组
	 * @Author 姜伟
	 * @param array $payway_info 支付方式信息数组
	 * @return boolean 成功返回true 失败返回false
	 * @todo 检验参数有效性，将支付方式信息根据pay_tag更新到数据库
	 */
    public function editPayway($payway_info)
    {
		$valid_field = array('pay_tag', 'pay_desc', 'isuse');
		foreach ($valid_field AS $k => $v)
		{
			if (!isset($payway_info[$v]))
			{
				return 0;
			}
		}

		return $this->where('pay_tag = "' . $payway_info['pay_tag'] . '"')->save($payway_info);
    }
       
	/** 
	 * 通过支付标签获取支付方式信息，参数支付标签，如alipay
	 * @Author 姜伟
	 * @param string $pay_tag 支付方式标签
	 * @return array 成功返回支付方式信息 失败返回null
	 * @todo 从数据表中取参数pay_tag对应的支付方式信息
	 */
    public function getPaywayInfoByTag($pay_tag)
    {
		return $this->where('pay_tag = "' . $pay_tag . '"')->find();
    }

    /**
     * 获取支付方式信息
     * @author 姜伟
     * @param int $payway_id 支付方式id
     * @param string $fields 要获取的字段名
     * @return array 支付方式基本信息
     * @todo 根据where查询条件查找支付方式表中的相关数据并返回
     */
    public function getPaywayInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }


	/**
	 * 汇款给指定银行账号
	 * @param int $bank_card_id 银行卡id
	 * @param float $amount 汇款金额
	 * @param int $order_id 汇款对应的订单号
	 * @return string 错误信息
	 */
	function pay_to_bank($bank_card_id,$amount,$order_id=0){
		$bank_obj = new BankModel();
		$result = $bank_obj->bank_main_pay($bank_card_id, $amount);

		//汇款添加查询字段，用于打款失败后，重新发起打款的前置查询
		if($order_id){
			$remittance_obj = new RemittanceModel();
			if($result['NTOPRRTNZ']['REQNBR']) {
				$remittance = $remittance_obj->where("order_id='" . $order_id . "'")->save(array("reqnbr" => $result['NTOPRRTNZ']['REQNBR']));
				log_file("remittance : " . $remittance_obj->getLastSql(), 'pay_to_bank', true);
			}
		}

		log_file("reqnbr : " .$result['NTOPRRTNZ']['REQNBR'], 'pay_to_bank', true);
		log_file("order_id : " .$order_id, 'pay_to_bank', true);

		$admin_remark = '';
		if (!isset($result['INFO']['RETCOD']))
		{
			$admin_remark = '接口异常，可能是前置机未开启，若不是该原因，请联系开发人员解决' . json_encode($result);
		}
		if ($result['INFO']['RETCOD'] != 0 && $result['NTOPRRTNZ']['ERRCOD'] != 'SUC0000')
		{
			//返回result['INFO']['ERRMSG']
			$admin_remark = '接口异常，招行返回结果：' . $result['INFO']['ERRMSG'];
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
			log_file("result : " . json_encode($result), 'pay_to_bank', true);
			log_file("pay_result : " . json_encode($pay_result), 'pay_to_bank', true);
			if ($pay_result['INFO']['RETCOD'] != 0 || isset($pay_result['NTEBPINFZ']['RJCRSN']))
			{
				//返回result['INFO']['ERRMSG']
				$admin_remark = '接口异常，招行返回结果：' . "<br>" . $pay_result['NTEBPINFZ']['RJCRSN'] . ';' . $pay_result['NTEBPINFZ']['RTNNAR'];
			}

			//非打款失败时的状态处理
			if($pay_result['NTEBPINFZ']['TRXSTS']){
				switch($pay_result['NTEBPINFZ']['TRXSTS']){
					case 01:
						$admin_remark = '这笔打款申请被银行取消';
						break;
					case 11:
						$admin_remark = '这笔打款申请被银行拒绝';
						break;
				}
			}
		}

		return $admin_remark;
	}
}
