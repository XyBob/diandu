<?php
/**
 * 商家订单模型类
 */

class MerchantOrderModel extends BaseModel
{
    // 商家订单id
    public $merchant_order_id;

	//is_refund状态-未退款
	const UNREFUNDED = 0;

	//is_refund状态-申请退款中
	const REFUNDING = 1;

	//is_refund状态-已拒绝退款
	const REJECTED = 2;

	//is_refund状态-已退款
	const REFUNDED = 3;

	//is_refund状态-已拒绝退款
	const ADMIN_REJECTED = 4;

	//is_refund状态-已退款
	const ADMIN_REFUNDED = 5;
 
	//reply_state状态-未处理
	const UNHANDLED = 0;

	//reply_state状态-已接单
	const ACCEPTED = 1;

	//reply_state状态-手动拒单
	const MANUAL_REFUSED = 2;

	//reply_state状态-超时拒单
	const TIMEOUT_REFUSED = 3;
  
    /**
     * 构造函数
     * @author 姜伟
     * @param $merchant_order_id 商家订单ID
     * @return void
     * @todo 初始化商家订单id
     */
    public function MerchantOrderModel($merchant_order_id)
    {
        parent::__construct('merchant_order');

        if ($merchant_order_id = intval($merchant_order_id))
		{
            $this->merchant_order_id = $merchant_order_id;
		}
    }

    /**
     * 获取商家订单信息
     * @author 姜伟
     * @param int $merchant_order_id 商家订单id
     * @param string $fields 要获取的字段名
     * @return array 商家订单基本信息
     * @todo 根据where查询条件查找商家订单表中的相关数据并返回
     */
    public function getMerchantOrderInfo($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改商家订单信息
     * @author 姜伟
     * @param array $arr 商家订单信息数组
     * @return boolean 操作结果
     * @todo 修改商家订单信息
     */
    public function editMerchantOrder($arr, $where = '')
    {
		$where = $where ? $where : 'merchant_order_id = ' . $this->merchant_order_id;
        return $this->where($where)->save($arr);
    }

    /**
     * 商家响应用户订单
     * @author 姜伟
     * @param int $reply_state
     * @param int $order_id
     * @return boolean 操作结果
     * @todo 商家响应用户订单
     */
    public function replyOrder($reply_state, $order_id, $merchant_promise_time = 0, $merchant_id = 0)
    {
		//修改商家反馈状态
		$merchant_id = $merchant_id ? $merchant_id : intval(session('user_id'));
		#$merchant_id = 7000;
		$arr = array(
			'reply_state'			=> $reply_state,
			'merchant_check_time'	=> time(),
			'merchant_promise_time'	=> $merchant_promise_time,
		);
		$where = 'order_id = ' . $order_id . ' AND merchant_id = ' . $merchant_id;
        $success = $this->where($where)->save($arr);

		//刷新拒单率
		if ($reply_state == self::MANUAL_REFUSED || $reply_state == self::TIMEOUT_REFUSED)
		{
			$merchant_obj = new MerchantModel();
			$merchant_obj->recalculateSerialItem($merchant_id, 'refuse_order_rate', 0, true);
		}

		//商家接单/拒单的相应处理，###未完成
		
		//判断订单中是否全部商家都已反馈，若是，判断是否有拒绝订单的商家，若有，判断是否全部拒绝，若全部拒绝，退还全部镖金；若部分拒绝，重新计算商品总价和镖金；若有部分商家未反馈，继续。
		if ($this->isAllMerchantReply($order_id))
		{
#log_file('pre push order. order_id = ' . $order_id, 'lunxun');
			//全部作出反馈
			$order_list = $this->getMerchantOrderList('merchant_id, reply_state', 'order_id = ' . $order_id);
#log_file('11pre: sql = ' . $this->getLastSql(), 'lunxun');
#log_file('11pre: order_list = ' . json_encode($order_list), 'lunxun');
			$all_reply_state = $this->allReplyState($order_list);

			$order_obj = new OrderModel($order_id);
			//更新所有商家响应订单的时间
			$arr = array(
				'all_reply_time'	=> time()
			);
			$order_obj->setOrderInfo($arr);
			$order_obj->saveOrderInfo();

			if ($all_reply_state == 0)
			{
#log_file('1pre push order. order_id = ' . $order_id, 'lunxun');
				//全部拒绝
				//退还订单所有金额
				$order_obj->allRefused();
			}
			elseif ($all_reply_state == 2)
			{
#log_file('2pre push order. order_id = ' . $order_id, 'lunxun');
				//部分拒单，退还拒单的商品总价和镖金差价给用户
				$order_obj->partialRefused();

				//若全部反馈，且不是全部拒绝，推送镖师，###未完成
			}
#log_file('6pre:all_reply_state = ' . $all_reply_state, 'lunxun');

			//###jw 改为：若有商家接单或商家全部拒单情况下，修改订单状态为
			//改为不推送镖师###jw
			if ($all_reply_state == 1 || $all_reply_state == 2)
			{
				$order_obj = new OrderModel($order_id);
				//变更订单状态为待收货
				$order_obj->setOrderState(OrderModel::PRE_DELIVERY);
			}

			//改为不推送镖师###jw
			#if ($all_reply_state == 1 || $all_reply_state == 2)
			#{
				/*** 将订单加入待抢订单表及缓存中begin ***/
				#$order_rob_obj = new OrderRobModel();
				#$arr = array(
					#'order_id'		=> $order_id,
					#'state'			=> 0,
					#'addtime'		=> time(),
				#);
				#$order_rob_obj->addOrderRob($arr);
	##log_file('6pre: ' . $order_rob_obj->getLastSql(), 'lunxun');
				#//推送镖师
			#MapModel::pushOrder($order_id);
#
			#}

			/*** 将订单加入待抢订单表及缓存中end ***/

			/*** 推送镖师begin ***/
			//获取推送的镖师列表
			/*$foot_man_list = MapModel::getFootManList($order_id);
log_file('3pre push order. order_id = ' . $order_id);
log_file(arrayToString($foot_man_list));
			$order_push_arr = array();
			foreach ($foot_man_list AS $k => $v)
			{
				//一一推送镖师
				$user_id = $v['user_id'];
				$msg = $v;
				$push_obj = new PushModel();
				$push_obj->push($user_id, $msg);

				//保存到数据库
				$order_push_arr[] = array(
					'order_id'		=> $order_id,
					'foot_man_id'	=> $user_id,
					'push_time'		=> $v['push_time'],
					'addtime'		=> time(),
					'content'		=> json_encode($v['msg']),
				);
			}
			$order_push_obj = new OrderPushModel();
			$order_push_obj->addAll($order_push_arr);*/

			/*** 推送镖师end ***/
		}
		else
		{
#log_file('not pre push order. order_id = ' . $order_id, 'lunxun');
		}

		//其他回复订单事件，###未完成
		//写日志
		$order_obj = new OrderModel($order_id);
		$order_obj->saveLog(OrderModel::PAYED, OrderModel::PAYED, $order_id, 0, $merchant_id, 0, 'reply');

		//通知用户，###未完成
		//暂时取消(未免给用户造成已接单的误解，因为实际接单是在镖师接单时)
		//拒单推送，接单不推送
		$order_info = $order_obj->getOrderInfo('user_id, order_sn');
		$opt = $reply_state == self::ACCEPTED ? 'accept' : 'reject';
		$merchant_obj = new MerchantModel($merchant_id);
		$merchant_info = $merchant_obj->getMerchantInfo('merchant_id = ' . $merchant_id, 'shop_name');
		$shop_name = $merchant_info['shop_name'];
		if ($opt == 'accept')
		{
			//获取商家订单信息
			$merchant_order_obj = new MerchantOrderModel();
			$where = 'order_id = ' . $order_id . ' AND merchant_id = ' . $merchant_id;
			$merchant_order_info = $this->getMerchantOrderInfo($where, 'pay_amount');

			//获取商品列表
			$order_item_obj = new OrderItemModel();
			$order_item_list = $order_item_obj->getOrderItemList('item_name, number', $where);
			$item_str = '';
			foreach ($order_item_list AS $v)
			{
				$item_str .= $v['item_name'] . '*' . $v['number'] . ',';
			}
			$item_str = substr($item_str, 0, -1);

			$msg = array(
				'first'		=> '商家【' . $shop_name . '】已接受您的订单',
				'keyword1'	=> $item_str,
				'keyword2'	=> date('Y-m-d H:i', time()),
				'keyword3'	=> $merchant_order_info['pay_amount'],
				'order_id'	=> $order_id,
			);
			PushModel::wxPush($order_info['user_id'], 'accept', $msg);

			return $success;
			#return true;
		}
		else
		{
			$msg = array(
				'first'		=> '抱歉，商家【' . $shop_name . '】拒绝了您的订单，款项将原路退回，点击查看详情',
				'keyword1'	=> $order_info['order_sn'],
				'keyword2'	=> date('Y-m-d H:i', time()),
				'order_id'	=> $order_id,
			);
			PushModel::wxPush($order_info['user_id'], 'reject', $msg);

			//退还特价促销次数和抵用券
			$order_obj = new OrderModel($order_id);
			$order_obj->returnCoupon($merchant_id);

			return $success;
		}

		return true;
    }

    /**
     * 镖师于商家处签到
     * @author 姜伟
     * @param int $merchant_order_id
     * @param string $nfc_code
     * @return boolean 操作结果
     * @todo 镖师于商家处签到
     */
    public function signin($merchant_order_id, $nfc_code)
    {
		$foot_man_id = intval(session('user_id'));
		#$foot_man_id = 6820;

#log_file($merchant_order_id . ',nfc_code = ' . $nfc_code);
		//查看商家订单信息
		$merchant_order_info = $this->getMerchantOrderInfo('merchant_order_id = ' . $merchant_order_id, 'merchant_id, order_id');
#log_file('merchant_order_info = ' . json_encode($merchant_order_info));
		if (!$merchant_order_info)
		{
			return false;
		}
		$order_id = $merchant_order_info['order_id'];
		$merchant_id = $merchant_order_info['merchant_id'];
		
		//查看nfc_code有效性
		$where = 'merchant_id = ' . $merchant_order_info['merchant_id'] . ' AND nfc_code = "' . $nfc_code . '"';
		$merchant_obj = new MerchantModel();
		$merchant_info = $merchant_obj->getMerchantInfo($where, 'merchant_id');
#log_file('merchant_info = ' . json_encode($merchant_info));
#log_file($merchant_obj->getLastSql());

		if (!$merchant_info)
		{
			return false;
		}

		//获取订单信息
		$where = 'merchant_order_id = ' . $merchant_order_id;
		$arr = array(
			'foot_man_signin_time'	=> time()
		);
		$success = $this->where($where)->save($arr);
#log_file($this->getLastSql());

		//其他签到事件，###未完成
		//写日志
		$order_obj = new OrderModel($order_id);
		$order_obj->saveLog(OrderModel::PRE_DELIVERY, OrderModel::PRE_DELIVERY, $order_id, 0, $merchant_id, intval(session('user_id')), 'signin');

		return $success;
	}

    /**
     * 镖师于商家处取货
     * @author 姜伟
     * @param int $merchant_id
     * @param int $order_id
     * @return boolean 操作结果
     * @todo 镖师于商家处取货
     */
    public function pickup($merchant_id, $order_id)
    {
		$foot_man_id = intval(session('user_id'));
		#$foot_man_id = 6820;
		//获取订单信息
		$where = 'merchant_id = ' . $merchant_id . ' AND order_id = ' . $order_id;
		$arr = array(
			'foot_man_pickup_time'	=> time()
		);
		$success = $this->where($where)->save($arr);
		$merchant_obj = new MerchantModel();
		$merchant_obj->recalculateSerialItem($merchant_id, 'make_time_avg', 0, true);
		//是否及时
		$merchant_obj->recalculateSerialItem($merchant_id, 'on_time_rate', 0, true);

		$order_obj = new OrderModel($order_id);
		$opt = 'pickup';
		//###未完成，查看是否全部取完货，若全部取完，变更状态为，PRE_DELIVERY，否则不变更
		$order_list = $this->getMerchantOrderList('foot_man_pickup_time', 'is_refund = 0 AND order_id = ' . $order_id);
		$all_pickup = $this->allPickup($order_list);
		if ($all_pickup)
		{
			//记录订单表中的start_delivery_time（全部取货完毕开始计算配送时间的时间点）
			$arr = array(
				'start_delivery_time'	=> time()
			);
			$order_obj->setOrderInfo($arr);
			$order_obj->saveOrderInfo();
			$opt = 'delivery';
		}

		//其他取货事件，###未完成
		$push_obj = new PushModel();
		if ($success)
		{
			//推送商家
			$push_arr = array(
				'opt'		=> 'pickup',
				'push_time'	=> 0,
				'msg'		=> array(
					'opt'		=> 'pickup',
					'order_id'	=> $order_id,
				),
			);
			$push_obj->push($merchant_id, $push_arr);

			//推送用户
			$push_arr = array(
				'opt'		=> 'user_pickup',
				'push_time'	=> 0,
				'msg'		=> array(
					'opt'			=> 'user_pickup',
					'order_id'		=> $order_id,
					'merchant_id'	=> $merchant_id,
					'msg'			=> '镖师取货通知',
				),
			);
			//获取用户ID
			$order_info = $order_obj->getOrderInfo('user_id');
			$user_id = intval($order_info['user_id']);
			//推送消息
			$push_obj->push($user_id, $push_arr);
		}

		//写日志
		$order_obj->saveLog(OrderModel::PRE_DELIVERY, OrderModel::PRE_DELIVERY, $order_id, 0, $merchant_id, intval(session('user_id')), $opt);

		return $success;
	}

	/**
     * 判断当前订单的商家是否全部拒绝（返回0），部分拒绝（返回2），全部接单（返回1）
     * @author 姜伟
     * @param int $order_id
     * @return boolean 操作结果
     * @todo 判断当前订单的商家是否全部拒绝（返回0），部分拒绝（返回2），全部接单（返回1）
     */
    public function allReplyState($order_list)
    {
		$total_num = count($order_list);
		$refuse_num = 0;
		foreach ($order_list AS $k => $v)
		{
#log_file('11pre: reply_state = ' . $v['reply_state']);
			$refuse_num += ($v['reply_state'] == self::UNHANDLED || $v['reply_state'] == self::ACCEPTED) ? 0 : 1;
		}

		if ($refuse_num == $total_num)
		{
			return 0;
		}
		elseif ($refuse_num == 0)
		{
			return 1;
		}

		return 2;
	}

	/**
     * 判断当前订单的商家是否全部取完货（返回1），未取完（返回0）
     * @author 姜伟
     * @param int $order_id
     * @return boolean 操作结果
     * @todo 判断当前订单的商家是否全部取完货（返回1），未取完（返回0）
     */
    public function allPickup($order_list)
    {
		#log_file('order_list = ' . json_encode($order_list), 'order');
		$total_num = count($order_list);
		$pickup_num = 0;
		foreach ($order_list AS $k => $v)
		{
			$pickup_num += ($v['foot_man_pickup_time'] > 0) ? 1 : 0;
		}

		#log_file('pickup_num = ' . $pickup_num . ', total_num = ' . $total_num, 'order');
		if ($pickup_num == $total_num)
		{
			return 1;
		}

		return 0;
	}

	/**
     * 判断当前订单的商家是否全部作出反馈
     * @author 姜伟
     * @param int $order_id
     * @return boolean 操作结果
     * @todo 判断当前订单的商家是否全部作出反馈
     */
    public function isAllMerchantReply($order_id)
    {
		$order_num = $this->getMerchantOrderNum('order_id = ' . $order_id . ' AND reply_state = 0');
		//若未处理订单数量不为0，返回false，否则返回true
		return $order_num ? false : true;
	}

    /**
     * 添加商家订单
     * @author 姜伟
     * @param array $arr 商家订单信息数组
     * @return boolean 操作结果
     * @todo 添加商家订单
     */
    public function addMerchantOrder($arr)
    {
        if (!is_array($arr)) return false;

		$arr['addtime'] = time();

        return $this->add($arr);
    }

    /**
     * 删除商家订单
     * @author 姜伟
     * @param int $merchant_order_id 商家订单ID
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delMerchantOrder($merchant_order_id)
    {
        if (!is_numeric($merchant_order_id)) return false;
		return $this->where('merchant_order_id = ' . $merchant_order_id)->delete();
    }

    /**
     * 根据where子句获取商家订单数量
     * @author 姜伟
     * @param string|array $where where子句
     * @return int 满足条件的商家订单数量
     * @todo 根据where子句获取商家订单数量
     */
    public function getMerchantOrderNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询商家订单信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 商家订单基本信息
     * @todo 根据SQL查询字句查询商家订单信息
     */
    public function getMerchantOrderList($fields = '', $where = '', $orderby = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit()->select();
    }

    /**
     * 获取商家订单列表页数据信息列表
     * @author 姜伟
     * @param array $merchant_order_list
     * @return array $merchant_order_list
     * @todo 根据传入的$merchant_order_list获取更详细的商家订单列表页数据信息列表
     */
    public function getListData($merchant_order_list)
    {
		foreach ($merchant_order_list AS $k => $v)
		{
			//产品名称
			$item_obj = new ItemModel($v['item_id']);
			$item_info = $item_obj->getItemInfo('item_id = ' . $v['item_id'], 'item_name, isuse, stock, mall_price, base_pic');
			$merchant_order_list[$k]['item_name'] = $item_info['item_name'];
			$merchant_order_list[$k]['mall_price'] = $item_info['mall_price'];
			$merchant_order_list[$k]['small_pic'] = $item_info['base_pic'];


			$status = '';
			if ($item_info['isuse'] == 0)
			{
				$status = '已下架';
			}
			elseif ($item_info['isuse'] == 1)
			{
				$status = $item_info['stock'] ? '上架中' : '缺货';
			}
			$merchant_order_list[$k]['status'] = $status;
		}

		return $merchant_order_list;
    }

    /**
     * 获取商家订单列表页数据信息列表
     * @author cc
     * @param array $merchant_order_list
     * @return array $merchant_order_list
     * @todo 根据传入的$merchant_order_list获取更详细的商家订单列表页数据信息列表
     */
    public function getOrderListData($merchant_order_list)
    {
        foreach ($merchant_order_list AS $k => $v)
        {
            $merchant_order_list[$k] = $this->convertOrderState($v);
            $order_info = D('Order')->field('order_sn,isuse, addtime, user_remark')
                                    ->where('order_id = ' . $v['order_id'])
                                    ->find();
            $merchant_order_list[$k]['addtime']     = $order_info['addtime'];
            $merchant_order_list[$k]['order_sn']    = $order_info['order_sn'];
            $merchant_order_list[$k]['user_remark'] = $order_info['user_remark'];
            if ($order_info['isuse'] == 0)
            {
                unset($merchant_order_list[$k]);
            }
        }

        return $merchant_order_list;
    }

    public function getListDataForPCList($merchant_order_list)
    {
        foreach ($merchant_order_list AS $k => $v)
        {
            $merchant_order_list[$k] = $this->convertOrderState($v);
            $order_info = D('Order')->field('order_sn,isuse, addtime, user_remark, foot_man_id, user_address_id')
                                    ->where('order_id = ' . $v['order_id'])
                                    ->find();
            $merchant_order_list[$k]['addtime']     = $order_info['addtime'];
            $merchant_order_list[$k]['order_sn']    = $order_info['order_sn'];
            $merchant_order_list[$k]['user_remark'] = $order_info['user_remark'];
            if ($order_info['isuse'] == 0)
            {
                unset($merchant_order_list[$k]);
            }
            $order_item_obj = new OrderItemModel();
            $item_list = $order_item_obj->getOrderItemList('item_name, number, real_price', 'order_id = ' . $v['order_id'] . ' AND merchant_id = ' . $v['merchant_id']);
            $merchant_order_list[$k]['item_list'] = $item_list;

            //获取镖师信息
            if ($order_info['foot_man_id'])
            {
                $user_obj = new UserModel($order_info['foot_man_id']);
                $user_info = $user_obj->getUserInfo('realname, mobile');
                $merchant_order_list[$k]['foot_man_realname'] = $user_info['realname'];
                $merchant_order_list[$k]['foot_man_mobile']   = $user_info['mobile'];
            }
            //订单地址
            if ($order_info['user_address_id']) {
                $user_address_obj  = new UserAddressModel();
                $user_address_info = $user_address_obj->getUserAddressInfo(
                    'user_address_id = ' . $order_info['user_address_id'], 
                    'realname, mobile, address, building_id'
                );

                $building_info  = D('Building')->where('building_id = %d', $user_address_info['building_id'])
                    ->field('building_name, area_id')
                    ->find();

                $area_string    = AreaModel::getAreaString(0, 0, $building_info['area_id']);

                $merchant_order_list[$k]['area_string'] = $area_string .  $building_info['building_name'] . $user_address_info['address'];
                $merchant_order_list[$k]['realname']    = $user_address_info['realname'];
                $merchant_order_list[$k]['mobile']      = $user_address_info['mobile'];
            }
        }

        return $merchant_order_list;
    }


    /**
     * 获取商家单个订单详细数据信息
     * @author cc
     * @param array $merchant_order_info
     * @return array $merchant_order_info
     * @todo 根据传入的$merchant_order_info获取商家单个订单详细数据信息
     */
    public function getOrderData($merchant_order_info)
    {
        $order_info = D('Order')->field('')
                                ->where('order_id = ' . $merchant_order_info['order_id'])
                                ->find();
        $merchant_order_info['order_sn'] = $order_info['order_sn'];
        $merchant_order_info['addtime'] = $order_info['addtime'];
        $merchant_order_info['pay_time'] = $order_info['pay_time'];
        $merchant_order_info['rob_time'] = $order_info['rob_time'];
        $merchant_order_info['start_delivery_time'] = $order_info['start_delivery_time'];
        $merchant_order_info['delivery_time'] = $order_info['delivery_time'];
        $merchant_order_info['confirm_time'] = $order_info['confirm_time'];
        $merchant_order_info['user_remark'] = $order_info['user_remark'];

		//获取用户手机号
		$user_address_obj = new UserAddressModel();
		$user_address_info = $user_address_obj->getUserAddressInfo('user_address_id = ' . $order_info['user_address_id'], 'mobile');
        $merchant_order_info['user_mobile'] = $user_address_info['mobile'];

		//获取镖师手机号
		if ($order_info['foot_man_id'])
		{
			$user_obj = new UserModel($order_info['foot_man_id']);
			$user_info = $user_obj->getUserInfo('mobile');
			$merchant_order_info['foot_man_mobile'] = $user_info['mobile'];
		}

        return $merchant_order_info;
    }

    /**
     * 获取商家订单商品列表数据信息
     * @author cc
     * @param string $order_id,$merchant_id
     * @return string $order_id,$merchant_id
     * @todo 根据传入的订单ID和商家ID获取商家订单商品列表数据信息
     */
    public function getOrderItemData($order_id, $merchant_id)
    {
        $orderitem_obj = new OrderItemModel($order_id);
        $item_list = $orderitem_obj->getOrderItemList('', 'order_id = ' . $order_id . ' AND merchant_id = ' . $merchant_id);
        return $item_list;
    }

    /**
     * 商家处理用户退款申请
     * @author 姜伟
     * @param int $merchant_order_id
     * @param int $refund_state
     * @return boolean
     * @todo 商家处理用户退款申请
	 * @test 测试点：1、查看商家订单表中is_refund字段是否变化；2、查看是否推送用户；3、若为管理员处理，查看是否推送商家；4、若为同意退款，查看用户余额中是否增加了相应的金额；5、若本次退款全部处理完毕，查看订单状态是否变更，订单退款申请状态是否变更；6、查看日志是否写成功；
     */
    public function replyOrderRefund($merchant_order_id, $refund_state)
    {
		//判断该笔退款是否已处理
		$merchant_order_info = $this->getMerchantOrderInfo('merchant_order_id = ' . $merchant_order_id, 'is_refund, order_id, total_amount, merchant_id');

		if ($merchant_order_info['is_refund'] == self::REFUNDED || $merchant_order_info['is_refund'] == self::ADMIN_REJECTED || $merchant_order_info['is_refund'] == self::ADMIN_REFUNDED)
		{
			//已处理，退出
			return false;
		}

		$order_id = $merchant_order_info['order_id'];
		$order_obj = new OrderModel($order_id);
		try
		{
			$order_info = $order_obj->getOrderInfo('user_id');
		}
		catch (Exception $e)
		{
			return false;
		}

		//获取操作人ID
		$user_id = intval(session('user_id'));
		$merchant_id = $merchant_order_info['merchant_id'];

		//修改商家订单状态
		$arr = array(
			'is_refund'	=> $refund_state
		);
		$success = $this->editMerchantOrder($arr);
log_file($this->getLastSql(), 'refund');
		#echo $this->getLastSql();

		//推送商家
		$push_obj = new PushModel();
		if ($refund_state == MerchantOrderModel::ADMIN_REJECTED || $refund_state == MerchantOrderModel::ADMIN_REFUNDED)
		{
			$push_arr = array(
				'opt'		=> 'admin_refund_apply',
				'push_time'	=> 0,
				'msg'		=> array(
					'opt'		=> 'admin_refund_apply',
					'order_id'	=> $order_id,
					'state'		=> $refund_state == MerchantOrderModel::ADMIN_REJECTED ? 2 : 1,	//退款状态，2拒绝，1同意
				),
			);
			$push_obj->push($merchant_id, $push_arr);
		}

		//是否同意退款，若是，退还款项
		if ($refund_state == MerchantOrderModel::REFUNDED || $refund_state == MerchantOrderModel::ADMIN_REFUNDED)
		{
			$role_name = $refund_state == MerchantOrderModel::REFUNDED ? '商家' : '管理员';
			//退还款项
			$real_refund = $order_obj->calRefundAmount($merchant_order_info['total_amount']);
			$account_obj = new AccountModel();
			$account_obj->addAccount($order_info['user_id'], 9, $real_refund, $role_name . '同意退款', $order_id, '', $merchant_order_id);
		}

		//是否处理完毕，目标订单状态处理
		$end_order_status = OrderModel::REFUNDING;
		if ($refund_state == self::REFUNDED || $refund_state == self::ADMIN_REJECTED || $refund_state == self::ADMIN_REFUNDED)
		{
log_file('bbbb', 'order');
			//判断是否处理完毕
			$item_refund_change_obj = new ItemRefundChangeModel();
			$all_reply = $item_refund_change_obj->isAllReplied($order_id);
log_file('all_reply = ' . $all_reply, 'refund');
			if ($all_reply == -1)
			{
				//所有拒单，返回待确认状态
				$order_obj->setOrderState(OrderModel::DELIVERED);
				$end_order_status = OrderModel::DELIVERED;

				//退款申请表状态变更
				$item_refund_change_obj = new ItemRefundChangeModel();
				$item_refund_change_info = $item_refund_change_obj->getItemRefundChangeInfo('order_id = ' . $order_id, 'item_refund_change_id');
				#log_file($item_refund_change_info['item_refund_change_id']);
				$item_refund_change_obj = new ItemRefundChangeModel($item_refund_change_info['item_refund_change_id']);
				$item_refund_change_obj->refuseItemRefundChangeApply();
			}
			elseif ($all_reply == 1)
			{
				$item_refund_change_obj = new ItemRefundChangeModel();
				$item_refund_change_info = $item_refund_change_obj->getItemRefundChangeInfo('state = 0 AND order_id = ' . $order_id, 'item_refund_change_id');
				//所有处理完毕，设为已退款状态
				#$order_obj->passRefundApply($item_refund_change_info['item_refund_change_id']);
				#log_file($item_refund_change_obj->getLastSql());
				#log_file($item_refund_change_info['item_refund_change_id']);
				$end_order_status = OrderModel::REFUNDED;
				$item_refund_change_obj = new ItemRefundChangeModel($item_refund_change_info['item_refund_change_id']);
				$item_refund_change_obj->passItemRefundChangeApply();
			}
		}

		//写日志
		switch ($refund_state)
		{
			case self::REFUNDED:
				$order_obj->saveLog(OrderModel::REFUNDING, $end_order_status, $order_id, $order_info['user_id'], $merchant_id, 0, 'merchant_pass_refund');
				break;
			case self::REJECTED:
				$order_obj->saveLog(OrderModel::REFUNDING, $end_order_status, $order_id, $order_info['user_id'], $merchant_id, 0, 'merchant_refuse_refund');
				break;
			case self::ADMIN_REFUNDED:
				$order_obj->saveLog(OrderModel::REFUNDING, $end_order_status, $order_id, $order_info['user_id'], $merchant_id, 0, 'admin_pass_merchant_refund');
				break;
			case self::ADMIN_REFUNDED:
				$order_obj->saveLog(OrderModel::REFUNDING, $end_order_status, $order_id, 0, $merchant_id, 0, 'admin_refuse_merchant_refund');
				break;
			default:
				break;
		}

		//推送用户，###未完成
		$opt = ($refund_state == MerchantOrderModel::ADMIN_REJECTED || $refund_state == MerchantOrderModel::REFUNDED) ? 'accept' : 'reject';
		//获取商家名称
		$merchant_obj = new MerchantModel();
		$merchant_info = $merchant_obj->getMerchantInfo('merchant_id = ' . $merchant_id, 'shop_name');
		$shop_name = $merchant_info['shop_name'];
		$msg = array(
			'first'		=> '商家【' . $shop_name . ($opt == 'accept' ? '】同意退款' : '】拒绝退款'),
			'keyword1'	=> '商家【' . $shop_name . ($opt == 'accept' ? '】同意退款，款项将原路退回，点击查看详情' : '】拒绝退款'),
			'keyword2'	=> $merchant_order_info['total_amount'] . '元',
			'keyword3'	=> $opt == 'accept' ? '符合退款条件' : '不符合退款条件',
			'order_id'	=> $order_id,
		);
		PushModel::wxPush($order_info['user_id'], 'refund', $msg);

		return true;
    }

    /**
     * 查找商家订单是否超时未反馈订单，并自动拒绝，推送用户
     * @author cc
     * @param void
     * @return boolean
     * @todo 商家处理用户退款申请
	 * @test 查找商家订单是否超时未反馈订单，并自动拒绝，推送用户
     */
    public function autoRejectOrder()
    {
		$merchant_auto_reject_time = $GLOBALS['config_info']['MERCHANT_AUTO_REJECT_TIME'];
		$merchant_order_list = $this->field('merchant_order_id, o.order_id, merchant_id')->join('tp_order AS o ON o.order_id = tp_merchant_order.order_id')->where('o.pay_time > 0 AND reply_state = 0 AND o.pay_time < ' . (time() - $merchant_auto_reject_time))->select();
		if ($merchant_order_list)
		{
			log_file($this->getLastSql(), 'autoRejectOrder', true);
			log_file(json_encode($merchant_order_list), 'autoRejectOrder', true);
		}
		#echo "<pre>";
		#print_r($merchant_order_list);
		#die;
		foreach ($merchant_order_list AS $key => $v)
		{
			$success = $this->replyOrder(self::TIMEOUT_REFUSED, $v['order_id'], 0, $v['merchant_id']);
		}
	}

	/**
	 * 退款状态数字转化文字
	 * @author 姜伟
	 * @param int $refund_state
	 * @return string $refund_state
	 * @todo 将退款状态由数字转化成文字后返回
	 */
    public function convertRefundState($order_state)
    {
		$order_state_name = '';
		switch ($order_state)
		{
			case self::UNREFUNDED:
				$order_state_name = '未退款';
				break;
			case self::REFUNDING:
				$order_state_name = '退款中';
				break;
			case self::REJECTED:
				$order_state_name = '商家/镖师拒绝退款';
				break;
			case self::REFUNDED:
				$order_state_name = '商家/镖师同意退款';
				break;
			case self::ADMIN_REFUNDED:
				$order_state_name = '管理员同意退款';
				break;
			case self::ADMIN_REJECTED:
				$order_state_name = '管理员拒绝退款';
				break;
			default:
				$order_state_name = '';
				break;
		}

		return $order_state_name;
	}

    /**
     * 修改商家订单抢单时间
     * @author 姜伟
     * @param int $order_id
     * @return boolean 操作结果
     * @todo 修改商家订单抢单时间
     */
    public function setRobTime($order_id)
    {
		$arr = array(
			'rob_time'	=> time()
		);
        return $this->where('order_id = ' . $order_id)->save($arr);
    }

    /**
     * 返回订单评价状态
     * @author cc
     * @param int $order_id
     * @return boolean 已评价true 未评价false
     * @todo 返回订单评价状态
     */
    public function orderCommentState($order_id)
    {
        $is_comment = D('MerchantCommentUser')->field('merchant_comment_user_id')->where('order_id = ' . $order_id)->find();
        return $is_comment ? true : false ;
    }

    /**
     * 订单状态转化文字
     * @author cc
     * @param array $order_info
     * @return array $order_info
     * @todo 返回订单状态转化文字
     */
    public function convertOrderState($order_info)
    {
        if ($order_info['reply_state'] == 0) {
            $order_info['status_name'] = '未处理';
        }
        elseif ($order_info['reply_state'] == 1 && $order_info['is_confirm'] == 0) {
            $order_info['status_name'] = '已接单';
        }
        elseif ($order_info['reply_state'] == 1 && $order_info['is_confirm'] >= 1) {
            $order_info['status_name'] = '已完成';
            $order_info['is_comment'] = $this->orderCommentState($order_info['order_id']);
        }
        elseif ($order_info['reply_state'] == 2) {
            $order_info['status_name'] = '已拒绝';
        }
        elseif ($order_info['reply_state'] == 3) {
            $order_info['status_name'] = '已超时';
        }
        else{
            $order_info['status_name'] = '其他';
        }

        if ($order_info['is_refund'] > MerchantOrderModel::UNREFUNDED) {
            $order_info['status_name'] = '退款处理';
        }

        return $order_info ;
    }
}
