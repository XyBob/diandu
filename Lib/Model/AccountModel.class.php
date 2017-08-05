<?php

/**
 * @author 姜伟
 * @deprecated 记录用户账户变动明细的类库
 * @
 * */
class AccountModel extends Model
{
    /*
     *
			'1'	=> '在线充值',
			'2'	=> '银行汇入',
			'3'	=> '手动录入',
			'4'	=> '支付宝付款',
			'5'	=> '订单消费',
			'6'	=> '手动扣款',
			'7'	=> '订单退款',
			'8'=> '订单确认收货',
     *
     */

    const ONLINE_VOUCHER = 1;
    const BANK_VOUCHER = 2;
    const MANUAL_OPERATOR = 3;
    const ONLINE_PAY = 4;
    const ORDER_COST = 5;
    const MANUAL_DECRESE = 6;
    const ORDER_REFOUND = 7;
    const ORDER_CONFIRMD = 8;
    const FIRST_LEVEL_AGENT_GAIN = 9;
    const SECOND_LEVEL_AGENT_GAIN = 10;
    const THIRD_LEVEL_AGENT_GAIN = 11;
    const GROUP_BUY_COST = 12;
    const GROUP_REFUND = 13;
    const INTEGRAL_MONEY_COST = 14; //积分商城消费
    const DEPOSIT_APPLY = 15;//提现申请
    const REFUSE_DEPOSIT = 16;//拒绝提现申请
    const STORE_CONSUMPTION = 17;//到店消费
    const BUSINESS_APPLY = 18;//商家申请
    const STORE_CONSUMPTION_INCOME = 19;//店内消费收入
    const AGENT_INCOME = 20;//代理收入
    const SERVICE_FEE = 21;//平台服务费
    const PROVINCE_AGENT_GAIN = 22;//省级代理收入
    const CITY_AGENT_GAIN = 23;//市级代理收入
    const AREA_AGENT_GAIN = 24;//县级代理收入
    const REC_USER_GAIN = 25;//推荐个人收入
    const REC_MERCHANT_GAIN = 26;//推荐商家收入
    const SYSTEM_PROFIT = 27;//让利剩余
    const PAY_TO_BANK = 28;//自动打款到银行卡
    const TAKE_OUT_PAY = 29;//外卖消费
    const REFUND = 30;//退款
    const TAKE_OUT_IN = 31;//外卖收入

    /**
     * 构造函数
     * @author 姜伟
     * @param void
     * @return void
     * @todo 初始化数据库，数据表
     * */
    public function AccountModel()
    {
        $this->db(0);
        $this->tableName = C('DB_PREFIX') . 'account';
    }

    /**
     * 修改用户账户余额，并写入账户变动日志
     * @author 姜伟
     * @param string $user_id 用户ID
     * @param int $change_type 变动类型
     * @param float $amount 变动金额(正负数）
     * @param string $remark 管理员备注，线上充值时，该参数为第三方支付平台返回的交易码
     * @param int $order_id 订单ID
     * @param string $proof 线下操作的凭证，非必填
     * @return float $amount_after_pay 余额不足时返回-1
     * @todo 1、调用分销商模型的getLeftMoney方法获取变动前余额$amount_before_pay；2、计算变动后$amount_after_pay = $amount_before_pay + $amount; 3、若$amount_after_pay小于0，返回-1退出，否则调用分销商模型的setLeftMoeny方法修改分销商余额；4、将账户变动信息写入到账户变动日志表account中；5、返回变动后的余额 $amount_after_pay
     * */
    public function addAccount($user_id, $change_type, $amount, $remark = '', $order_id = 0, $proof = '')
    {
        log_file("addAccount : " . $amount . "---abs:" . abs($amount), 'wxpay', true);
        if (abs($amount) < 0.01) {
            return -1;
        }
        /*判断余额是否足够*/
        //调用UserModel的getLeftMoney方法获取预存款余额
        $user_obj = new UserModel($user_id);
        //变动前的余额
        $amount_before_pay = $user_obj->getLeftMoney();
        trace($amount_before_pay, 'amount_before_pay');
        log_file($user_obj->getLastSql(), 'addAccount');
        //变动后的余额
//        if($change_type!= AccountModel::BUSINESS_APPLY) {
        $amount_after_pay = $amount_before_pay + $amount;
        trace($amount_after_pay, 'amount_after_pay');

        //若余额不足，返回-1
        if ($amount_after_pay < 0.00) {
            return -1;
        }
//        }else{
//            $amount_after_pay=$amount_before_pay;
//        }


        /*写账户变动日志begin*/
        //判断入账 or 出账
        $amount_in = $amount_out = 0.00;
        if ($amount > 0) {
            $amount_in = $amount;
        } else {
            $amount_out = $amount * -1;
        }
        $user_info = $user_obj->field('role_type,is_merchant')->where('user_id=' . $user_id)->find();
        log_file('user_info:' . json_encode($user_info), 'test');
        //在account表中role_type的1是商家，2则是用户，3是admin，4是代理(暂时没有)
        if ($user_info['is_merchant'] != "1") {
            if ($user_info['role_type'] == "1") {
                $role_type = 3;
                //$role['role_type']=3;
            }
            if ($user_info['role_type'] == "3") {
                $role_type = 2;
                //$role['role_type']=2;
            }
            if ($user_info['role_type'] == "5") {
                $role_type = 4;
                //$role['role_type']=4;
            }
        } else {
            $role_type = 1;
        }
        log_file('role_type:' . $role_type, 'test');
        //组成数组
        $this->data['user_id'] = $user_id;
        $this->data['change_type'] = $change_type;
        $this->data['amount_in'] = $amount;
        $this->data['amount_out'] = $amount_out;
        $this->data['amount_before_pay'] = $amount_before_pay;
        $this->data['amount_after_pay'] = $amount_after_pay;
        $this->data['order_id'] = $order_id;
        $this->data['operater'] = session('user_id') ? intval(session('user_id')) : 0;
        $this->data['addtime'] = time();
        $this->data['remark'] = $remark;
        $this->data['proof'] = $proof;
        $this->data['ip'] = get_client_ip();
        $this->data['role_type'] = $role_type;

        //执行驱动事件
        switch ($change_type) {
            case self::ONLINE_VOUCHER:
                log_file('user_info:在线充值', 'test');
                $this->voucher();//在线充值
                $this->data['pay_code'] = $proof;
                $user_obj->setLeftMoney($amount_after_pay);
                break;
            case self::BANK_VOUCHER:
                $this->offlinePay();//线下汇款充值
                break;
            case self::MANUAL_OPERATOR://jx1954
                $user_obj->setLeftMoney($amount_after_pay);//设置金额,解决充值的问题
                $this->manualVoucher();//手动录入
                break;
            case self::ONLINE_PAY:
                $this->onlinePayOrder();//线上支付
                break;
            case self::ORDER_COST:
                $this->payOrder($order_id, $proof);//订单消费
                $user_obj->setLeftMoney($amount_after_pay);
                $user_obj->where('user_id = %d', intval($user_id))->setInc('consumed_money', $amount_out);

                break;
            case self::ORDER_REFOUND:
                //获取支付方式
                $payway_info = $this->getPayInfo($order_id);
                if (!$payway_info) {
                    return false;
                }

                //$this->data['payway'] = $payway_info['payway_id'];
                $pay_tag = $payway_info['pay_tag'];
                if ($pay_tag != 'wallet') {
                    //unset($this->data['amount_after_pay']);
                    //unset($this->data['amount_before_pay']);

                    //如果是第三方支付，则退回第三方，用户余额不变
                    $amount_after_pay = $amount_before_pay;

                    //执行第三方退款操作
                    if ($pay_tag == 'wxpay') {
                        $item_refund_change_id = M('ItemRefundChange')->where('order_id = ' . $order_id)->getField('item_refund_change_id');
                        trace($item_refund_change_id, 'wuzeguo');
                        $pay_code = M('Order')->where('order_id = ' . $order_id)->getField('pay_code');

                        //微信支付
                        $wxpay_obj = new WXPayModel();
                        $status = $wxpay_obj->refund($order_id, $item_refund_change_id, 1, $amount, $pay_code);
                        if (!$status) return false;
                    }

                    if ($pay_tag == 'cardpay') {
                        //会员卡支付
                        $member_car_obj = new MemberCardModel();
                        $status = $member_car_obj->refund($order_id, $user_id, $amount);
                        if (!$status) return false;

                    }

                } else {
                    //调用UserModel的setLeftMoeny方法修改分销商余额
                    $user_obj->setLeftMoney($amount_after_pay);
                }

                break;
            case self::GROUP_BUY_COST:
                //如果是团购则记录信息
                //group_buy_user表
                if ($change_type == self::GROUP_BUY_COST) {
                    $group_buy_user_obj = new GroupBuyUserModel();
                    $group_buy_id = M('Order')->where('order_id  = ' . $order_id)->getField('group_buy_id');
                    $arr = array(
                        'user_id' => $user_id,
                        'order_id' => $order_id,
                        'group_buy_id' => $group_buy_id,
                        'addtime' => time(),
                    );
                    $group_buy_user_obj->addGroupBuyUser($arr);

                    //修改group_buy表状态
                    $group_buy_obj = new GroupBuyModel($group_buy_id);
                    $group_buy_obj->setGroupBuyStatus();
                }

                //订单状态
                $this->payOrder($order_id, $proof);//订单消费
                $user_obj->setLeftMoney($amount_after_pay);
                $user_obj->where('user_id = %d', intval($user_id))->setInc('consumed_money', $amount_out);

                break;
            case self::GROUP_REFUND:
                //获取支付方式
                $payway_info = $this->getPayInfo($order_id);
                if (!$payway_info) {
                    return false;
                }

                //$this->data['payway'] = $payway_info['payway_id'];
                $pay_tag = $payway_info['pay_tag'];
                if ($pay_tag != 'wallet') {
                    //unset($this->data['amount_after_pay']);
                    //unset($this->data['amount_before_pay']);

                    //如果是第三方支付，则退回第三方，用户余额不变
                    $amount_after_pay = $amount_before_pay;

                    //执行第三方退款操作
                    if ($pay_tag == 'wxpay') {
                        $info = M('Order')->field('pay_code, group_buy_id')->where('order_id = ' . $order_id)->find();
                        $pay_code = $info['pay_code'];
                        $item_refund_change_id = NOW_TIME . $order_id;

                        //微信支付
                        $wxpay_obj = new WXPayModel();
                        $status = $wxpay_obj->refund($order_id, $item_refund_change_id, 1, $amount, $pay_code);
                        if (!$status) return false;
                    }

                    if ($pay_tag == 'cardpay') {
                        //会员卡支付
                        $member_car_obj = new MemberCardModel();
                        $status = $member_car_obj->refund($order_id, $user_id, $amount);
                        if (!$status) return false;

                    }

                } else {
                    //调用UserModel的setLeftMoeny方法修改分销商余额
                    $user_obj->setLeftMoney($amount_after_pay);
                }
                break;

            case self::INTEGRAL_MONEY_COST :
                $this->payOrder($order_id, $proof);//订单消费
                $user_obj->setLeftMoney($amount_after_pay);
                $user_obj->where('user_id = %d', intval($user_id))->setInc('consumed_money', $amount_out);
                break;
            case self::DEPOSIT_APPLY:
                $user_obj->setLeftMoney($amount_after_pay);
                $this->depositApply($user_id, $amount * -1);
                break;
            case self::REFUSE_DEPOSIT:
                $user_obj->setLeftMoney($amount_after_pay);
                $this->depositApply($user_id, $amount * -1);
                break;
            //店内消费
            case self::STORE_CONSUMPTION:
                log_file('user_info:STORE_CONSUMPTION', 'test');
                $user_obj->setLeftMoney($amount_after_pay);
                break;
            //店铺店内消费收入
            case self::STORE_CONSUMPTION_INCOME:
                $user_obj->setLeftMoney($amount_after_pay);
                break;
            case self::PAY_TO_BANK:
                $user_obj->setLeftMoney($amount_after_pay);
                break;
            //店铺申请消费逻辑
            case self::BUSINESS_APPLY:
                $user_obj->setLeftMoney($amount_after_pay);
                break;
            case self::AGENT_INCOME:
                $user_obj->setLeftMoney($amount_after_pay);
                break;
            default:
                $user_obj->setLeftMoney($amount_after_pay);
                log_file('sql = ' . $user_obj->getLastSql(), 'commission', true);
                break;
            //trigger_error(__CLASS__ . ', ' . __FUNCTION__ . ', 无效的参数change_type');
        }

        $app_list = C('APP_LIST');
        foreach ($app_list AS $k => $v) {
            foreach ($v['account'] AS $key => $val) {
                if ($change_type == $val) {
                    //调用相关组件的相关方法
                    $class = $k . 'Model';
                    $func = strtolower($k) . $change_type;
                    $obj = new $class();
                    $obj->$func($order_id, $user_id, $amount);
                    break;
                }
            }
        }
        log_file('user_info:保存到数据库', 'test');
        //保存到数据库
        $this->add($this->data);
        /*写账户变动日志end*/
        log_file('account: ' . $this->getLastSql());
        return $amount_after_pay;
    }

    //退款明细(通过微信支付和支付宝支付,钱要原路返回,通过钱包支付的订单使用addAccount)
    /*
     * param介绍,$user_id:退款人用户id,$change_type这里是AccountModel::REFUND=30,$amount:退款金额,$remark:备注,$order_id:订单号
     */
    public function addRefundAccount($user_id, $change_type, $amount, $remark = '', $order_id = 0, $proof = '')
    {
        $user_obj = new UserModel($user_id);

        //变动前后的余额一致
        $amount_before_pay = $user_obj->getLeftMoney();
        trace($amount_before_pay, 'amount_before_pay');
        $amount_after_pay = $amount_before_pay;

        //组成数组
        $this->data['user_id'] = $user_id;
        $this->data['change_type'] = $change_type;
        $this->data['amount_in'] = $amount;
        $this->data['amount_out'] = 0;
        $this->data['amount_before_pay'] = $amount_before_pay;
        $this->data['amount_after_pay'] = $amount_after_pay;
        $this->data['order_id'] = $order_id;
        $this->data['operater'] = session('user_id') ? intval(session('user_id')) : 0;
        $this->data['addtime'] = time();
        $this->data['remark'] = $remark;
        $this->data['proof'] = $proof;
        $this->data['ip'] = get_client_ip();
        $this->data['role_type'] = 2;
        //保存到数据库
        $this->add($this->data);
    }

    //商家明细计算
    public function addBusinessAccount($user_id, $change_type, $amount, $remark = '', $order_id = 0, $proof = '', $role_type = '')
    {
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('user_id = ' . $user_id);
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo();
        //注意这里的到店消费$role_type=2
        if ($role_type == 2) {
            $amount_before_pay = $business_info['business_left_money'];
            log_file('amount_before_pay:' . $amount_before_pay, 'dianpusheng');
            trace($amount_before_pay, 'amount_before_pay');
            $amount_after_pay = $amount_before_pay + $amount;
            log_file('amount_after_pay:' . $amount_after_pay, 'dianpusheng');
            $business_info = $business_obj->getBusinessInfo('user_id = ' . $user_info['user_id']);
            log_file('变动金额:' . $amount, 'dianpusheng');
            $business_left_money = $business_info['business_left_money'] + $amount;
            log_file('变动前冻结池金额'.$business_info['freeze_money'],'dianpusheng');

            $freeze_money = $business_info['freeze_money'] + $amount;
            log_file('冻结池:：' . $freeze_money, 'dianpusheng');
            if($change_type==AccountModel::DEPOSIT_APPLY){//商家提现,修改资金冻结池
                $business_obj->setBusiness($business_info['business_id'], array('business_left_money' => $business_left_money,'freeze_money'=>$freeze_money));
            }else{
                $business_obj->setBusiness($business_info['business_id'], array('business_left_money' => $business_left_money));
            }
            log_file('sql语句：' . $business_obj->getLastSql(), 'dianpusheng');
           // log_file('店铺剩余价格：' . $business_left_money, 'dianpusheng', true);
            $remark .= '(算上平台减免费用)';
        } else {
            //变动前后的余额一致
            $amount_before_pay = $user_info['left_money'];
            trace($amount_before_pay, 'amount_before_pay');
            $amount_after_pay = $amount_before_pay + $amount;
            log_file('店铺价格：' . $amount_after_pay, 'dianpusheng', true);
        }


        //组成数组
        $this->data['user_id'] = $user_id;
        $this->data['change_type'] = $change_type;
        $this->data['amount_in'] = $amount;
        $this->data['amount_out'] = 0;
        $this->data['amount_before_pay'] = $amount_before_pay;
        $this->data['amount_after_pay'] = $amount_after_pay;
        $this->data['order_id'] = $order_id;
        $this->data['operater'] = session('user_id') ? intval(session('user_id')) : 0;
        $this->data['addtime'] = time();
        $this->data['remark'] = $remark;
        $this->data['proof'] = $proof;
        $this->data['ip'] = get_client_ip();
        $this->data['role_type'] = 2;
        //保存到数据库
        $this->add($this->data);
        log_file('account:sql语句：' . $this->getLastSql(), 'dianpusheng');
    }

    /**
     * @access public
     * @todo   添加短信支付日志(表tp_sms_pay)
     * @author zhoutao
     * @param  string $pay_code 支付平台返回的交易码，唯一。 必须
     * @param  int $pay_state 充值状态。1表示成功，0表示失败
     * @param  float $pay_money 支付的金额。默认为0.00
     * @param  int $sms_total 充值的短信总条数。默认为0
     * @return void
     */
    public function addSMSPayLog($pay_code, $pay_state, $pay_money = 0.00, $sms_total = 0)
    {
        if (!$pay_code) {
            return false;
        }
        $this->tableName = 'sms_pay';
        $data = array(
            'pay_code' => $pay_code,
            'pay_money' => $pay_money,
            'sms_total' => $sms_total,
            'pay_time' => time(),
            'pay_state' => $pay_state
        );
        $this->add($data);
    }

    /**
     * @author 姜伟
     * @deprecated 根据查询条件获得账户明细列表总条数
     * @param string $fields 返回的数据库字段列表，英文逗号隔开，为空则取全部字段
     * @param string $where 查询条件，where字句，为空则取全部
     * @return array $account_list 账户明细列表
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountNum($where = '')
    {
        return $this->where($where)->count();
    }


    /**
     * @author 姜伟
     * @deprecated 根据查询条件获得账户明细列表
     * @param string $fields 返回的数据库字段列表，英文逗号隔开，为空则取全部字段
     * @param string $where 查询条件，where字句，为空则取全部
     * @return array $account_list 账户明细列表
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountList($fields = '', $where = '', $order = '', $limit = '')
    {
        return $this->field($fields)->where($where)->limit()->order($order)->select();
    }

    /**
     * @author 姜伟
     * @deprecated 获得单个用户的账户明细列表
     * @param int $user_id 用户ID
     * @return array $account_list
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountDetailByUserId($user_id)
    {
        $user_id = intval($user_id);
        if (!$user_id) {
            trigger_error(__CLASS__ . ', ' . __FUNCTION__ . '，无效的参数user_id');
        }

        //返回的字段列表
        $fields = 'change_type, amount_in, amount_out, amount_after_pay, amount_before_pay, order_id, operater, addtime, remark, proof, ip';

        //查询条件
        $where = 'user_id = ' . $user_id;

        return $this->getAccountList($fields, $where);
    }

    /**
     * @author 姜伟
     * @deprecated 获得所有用户的账户明细列表
     * @param void
     * @return array $account_list
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountDetailByUsers()
    {
        //返回的字段列表
        $fields = 'user_id, change_type, amount_in, amount_out, amount_after_pay, amount_before_pay, order_id, operater, addtime, remark, proof, ip';

        return $this->getAccountList($fields);
    }

    /**
     * @author 姜伟
     * @deprecated 用户在线充值
     * @param void
     * @return void
     * @todo 调用分销商模型的方法改变累计充值字段，发送邮件、短信等
     * */
    public function voucher()
    {
        //require_once('Lib/Model/UserModel.class.php');
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel($user_id);

        //充值
        trace($this->data['amount_after_pay'], 'wuzeguo_amount');
        $user_obj->setLeftMoney($this->data['amount_after_pay']);
    }

    /**
     * @author 姜伟
     * @deprecated 用预存款余额支付订单
     * @param int $order_id 订单ID
     * @param string $proof 消费码
     * @return void
     * @todo 调用订单模型的payOrder方法即可
     * @version 1.0
     * */
    public function payOrder($order_id, $proof)
    {
        if (!$order_id) return;
        //调用订单模型的payOrder方法
        $order_obj = new OrderModel($order_id);
        $payway = $order_obj->where('order_id=%d', intval($order_id))->getField('payway');
        $order_obj->payOrder($proof, $payway);
    }

    /**
     * @author 姜伟
     * @deprecated 管理员手工扣款
     * @param void
     * @return void
     * @todo 发送邮件、短信等
     * @version 1.0
     * */
    public function manualDeduct()
    {
    }

    /**
     * @author 姜伟
     * @deprecated 管理员手工录入
     * @param void
     * @return void
     * @todo 发送邮件、短信等
     * @version 1.0
     * */
    public function manualVoucher()
    {
    }

    /**
     * @author 姜伟
     * @deprecated 线上支付订单
     * @param void
     * @return void
     * @todo 线上支付订单，发送邮件、短信等
     * @version 1.0
     * */
    public function onlinePayOrder()
    {
        $this->payOrder();
    }

    /**
     * @author 姜伟
     * @deprecated 线下汇款充值
     * @param void
     * @return void
     * @todo 线下汇款充值，发送邮件、短信等
     * @version 1.0
     * */
    public function offlinePay()
    {
    }

    /**
     * @author 姜伟
     * @deprecated 查询第三方支付平台返回的交易码是否已存在于account表中
     * @param string $trade_no 第三方支付平台返回的交易码
     * @return boolean 存在返回true，不存在返回false
     * @todo 查询第三方支付平台返回的交易码是否已存在于account表中
     * @version 1.0
     * */
    public function checkPayCodeExists($trade_no)
    {
        $account_info = $this->field('account_id')->where('pay_code = "' . $trade_no . '"')->find();

        return $account_info ? true : false;
    }

    /**
     * 获取财务明细列表页数据信息列表
     * @author 姜伟
     * @param array $account_list
     * @return array $account_list
     * @todo 根据传入的$account_list获取更详细的财务明细列表页数据信息列表
     */
    public function getListData($account_list)
    {
        foreach ($account_list AS $k => $v) {
            //操作类型
            $change_type_list = self::getChangeTypeList();
            $change_type_name = $change_type_list[$v['change_type']];
            $account_list[$k]['change_type'] = $change_type_name;

            //操作人
            $user_id = $v['operater'] ? $v['operater'] : $v['user_id'];
            $user_obj = new UserModel($user_id);
            $user_info = $user_obj->getUserInfo('realname');
            $account_list[$k]['operater'] = $user_info ? $user_info['realname'] : '--';

            $account_list[$k]['amount_in'] = $v['amount_in'] > 0.00 ? $v['amount_in'] : $v['amount_out'];

            //订单号
            if ($v['order_id']) {
                $order_obj = new OrderModel($v['order_id']);
                $order_info = $order_obj->getOrderInfo('order_sn');
                $account_list[$k]['order_sn'] = $order_info['order_sn'];
            } else {
                $account_list[$k]['order_sn'] = '--';
            }

        }

        return $account_list;
    }

    /**
     * 获取财务变动类型列表
     * @author 姜伟
     * @param void
     * @return array $change_type_list
     * @todo 获取财务变动类型列表
     */
    public static function getChangeTypeList()
    {
        $arr = array(
            self::ONLINE_VOUCHER => '在线充值',
            self::BANK_VOUCHER => '银行汇入',
            self::MANUAL_OPERATOR => '手动录入',
            self::ONLINE_PAY => '支付宝付款',
            self::ORDER_COST => '订单消费',
            self::MANUAL_DECRESE => '手动扣款',
            self::ORDER_REFOUND => '订单退款',
            self::ORDER_CONFIRMD => '订单确认收货',
            self::FIRST_LEVEL_AGENT_GAIN => '一级代理收益',
            self::SECOND_LEVEL_AGENT_GAIN => '二级代理收益',
            self::THIRD_LEVEL_AGENT_GAIN => '三级代理收益',
            self::INTEGRAL_MONEY_COST => '积分商城消费',
            self::DEPOSIT_APPLY => '提现申请',
            self::REFUSE_DEPOSIT => '拒绝提现申请',
            self::STORE_CONSUMPTION => '到店消费',
            self::BUSINESS_APPLY => '商家申请',
            self::STORE_CONSUMPTION_INCOME => '店铺营业额收入',
            self::AGENT_INCOME => '代理收入',
            self::SERVICE_FEE => '平台服务费',
            self::PROVINCE_AGENT_GAIN => '省级代理收入',
            self::CITY_AGENT_GAIN => '市级代理收入',
            self::AREA_AGENT_GAIN => '县级代理收入',
            self::REC_USER_GAIN => '推荐个人收入',
            self::REC_MERCHANT_GAIN => '推荐商家收入',
            self::SYSTEM_PROFIT => '让利剩余',
            self::PAY_TO_BANK => '自动打款到银行卡',
            self::TAKE_OUT_PAY => '外卖消费',
            self::TAKE_OUT_IN => '外卖收入',
            self::REFUND => '退款',
        );

        $app_list = C('APP_LIST');
        foreach ($app_list AS $k => $v) {
            foreach ($v['account'] AS $key => $val) {
                $arr[$key] = $val;
            }
        }

        return $arr;
    }

    //变动类型数字转化文字
    function convertChangeType($change_type)
    {
        $change_type_list = self::getChangeTypeList();
        return $change_type_list[$change_type];
    }

    /**
     * 根据订单ID获取支付信息
     * @author 姜伟
     * @param int $order_id
     * @return float
     * @todo 根据订单ID获取支付信息
     */
    public function getPayInfo($order_id)
    {
        //获取支付方式
        $order_obj = new OrderModel($order_id);
        $order_info = $order_obj->getOrderInfo('payway');

        //获取支付方式信息
        $payway_obj = new PaywayModel();
        $payway_info = $payway_obj->getPaywayInfo('payway_id = ' . $order_info['payway']);
        if (!$payway_info) {
            return false;
        }

        return $payway_info;
    }

    /**
     * @author 姜伟
     * @deprecated 根据查询条件获得账户总和
     * @param string $where 查询条件，where字句，为空则取全部
     * @return float $amount
     * @todo
     * */
    public function sumAccount($where = '')
    {
        return $this->where($where)->sum('amount_in');
    }

    //提现申请
    public function depositApply($user_id, $amount)
    {
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo('frozen_money');
        $user_obj->setUserInfo(array(
            'frozen_money' => $user_info['frozen_money'] + $amount
        ));
        $user_obj->saveUserInfo();
    }

    public function todayEarnings($where)
    {
        return $this->where($where)->sum('amount_in');
    }
}
