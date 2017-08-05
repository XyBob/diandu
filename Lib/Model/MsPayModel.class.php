<?php

/**
 * 民生银行支付接口
 * Created by wzh.
 * User: Administrator
 * Date: 2017-06-01
 * Time: 10:59
 */
class MsPayModel extends PaywayModel
{

    /*
        微信公众号支付：pay.weixin.jspay
        微信刷卡支付：pay.weixin.micropay
        微信扫码支付：pay.weixin.native
        支付宝服务窗支付：pay.alipay.jspay
        支付宝刷卡支付：pay.alipay.micropay
        支付宝扫码支付：pay.alipay.native
        */

    //回调地址
    public $NOTIFY_URL = '';

    public $APP_ID = '';

    public $APP_SECRET = '';

    public function __construct()
    {
        //回调地址
        $this->NOTIFY_URL = 'http://' . $_SERVER['HTTP_HOST'] . '/Global/wxpay_response';
        $this->NOTIFY_URL_ALIPAY = 'http://' . $_SERVER['HTTP_HOST'] . '/Global/alipay_wxpay_response';
        $get = [
            //正式
            'app_id' => 1000000012,
            'appSecret' => '7a299cb5f3a7c3bbc76244666e4ade11f75398da'
            //测试
//		    'app_id' => 1000000002,
//			'appSecret' => 'fc1c776fb5bd1126bff3f172bb91b14197185c66'
        ];

        $this->APP_ID = $get['app_id'];
        $this->APP_SECRET = $get['appSecret'];

    }


    //进件，获取第三方商户id
    function get_mch_id($business_id)
    {
        //测试代码
        Vendor('mspayapi');
        $Payapi = new MSPayapi();

        $data = $this->get_common_params();

        $business_obj = new BusinessModel();

        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);
        $bank_card_obj = new BankCardModel();
        $bank_info = $bank_card_obj->getBankCardInfo('user_id =' . $business_info['user_id']);
        $address = str_replace('-', '', $business_info['address']);
        if ($business_info) {
            $data['info'] = json_encode(array(
                'bankSpName' => $business_info['full_name'],
                'aliasName' => $business_info['business_name'],//简称
                'categoryId' => /*'2015062600002758'*/
                    $business_info['category_id'],
                'servicePhone' => $business_info['contact_number'],
                'contactName' => $business_info['contacts'],
                'contactPhone' => $business_info['contact_number'],
                'contactMobile' => $business_info['contact_number'],
                'contactEmail' => $business_info['mail'],
                'contactType' => 'LEGAL_PERSON',
                'contactIdCardNo' => $bank_info['id_card_no'],
                'provinceCode' => $business_info['province_id'],
                'cityCode' => $business_info['city_id'],
                'districtCode' => $business_info['area_id'],
                'addressType' => 'BUSINESS_ADDRESS',
                'address' => $address,
                /* 'businessLicense'=>$business_info['business_license'],
                 'businessLicenseType'=>$business_info['business_license_type'],
                 'cardNo'=>$bank_info['account'],
                 'cardName'=>$bank_info['realname']*/
            ));

        }
        /*  $data['info'] = json_encode(array(
              'bankSpName' => '温州市店都商城',
              'aliasName' => '店都',
              'categoryId' => '2015062600002758',
              'servicePhone' => '057789781519',
              'contactName' => '余红兵',
              'contactPhone' => '15168352432',
              'contactMobile' => '15168352432',
              'contactEmail' => '2223651717@qq.com',
              'contactType' => 'LEGAL_PERSON',
              'contactIdCardNo' => '32068219800408911X',
              'provinceCode' => '330000',
              'cityCode' => '330300',
              'addressType' => '注册地址',
              'address' => '浙江省温州市鹿城区双屿镇温州国际鞋博城2F-A35号',
          ));*/


        $data['rate'] = 4;
        $data['weixin_mch_id'] = '1957';


        $ret = $Payapi->create($data, $this->APP_SECRET);
        log_file($ret, 'get_mch_id');
        //var_dump($ret);
        //$ret = '{"status" : 0,"msg" : "操作成功！","data" : {"mch_id" : "10002321" }}';
        $data_res = json_decode($ret, true);
        if ($data_res['status'] == 0) {
            //获取商户id成功
            $mch_id = $data_res['data']['mch_id'];
            log_file($mch_id, 'get_mch_id');
            return $mch_id;
            //var_dump($mch_id);
        } else {
            return false;
        }

    }

    function edit_mch_info($mch_id, $business_id)
    {
        /*     $info = array(
                 'bankSpName' => '温州市店都商城',
                 'aliasName' => '店都',
                 'categoryId' => '2015062600002758',
                 'servicePhone' => '057789781519',
                 'contactName' => '余红兵',
                 'contactPhone' => '15168352432',
                 'contactMobile' => '15168352432',
                 'contactEmail' => '2223651717@qq.com',
                 'contactType' => 'LEGAL_PERSON',
                 'contactIdCardNo' => '32068219800408911X',
                 'provinceCode' => '330000',
                 'cityCode' => '330300',
                 'addressType' => '注册地址',
                 'address' => '浙江省温州市鹿城区双屿镇温州国际鞋博城2F-A35号',
             );*/

        //测试代码
        Vendor('mspayapi');
        $Payapi = new MSPayapi();
        $data = $this->get_common_params();

        $business_obj = new BusinessModel();

        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);
        $bank_card_obj = new BankCardModel();
        $bank_info = $bank_card_obj->getBankCardInfo('user_id =' . $business_info['user_id']);
        $address = explode('-', $business_info['address']);
        $address = implode('', $address);

        if ($business_info) {
            $info = array(
                'bankSpName' => $business_info['full_name'],//全称
                'aliasName' => $business_info['business_name'],//简称
                'categoryId' => '2015062600002758',
                'servicePhone' => $business_info['contact_number'],
                'contactName' => $business_info['contacts'],
                'contactPhone' => $business_info['contact_number'],
                'contactMobile' => $business_info['contact_number'],
                'contactEmail' => $business_info['mail'],
                'contactType' => 'LEGAL_PERSON',
                'contactIdCardNo' => $bank_info['id_card_no'],
                'provinceCode' => $business_info['province_id'],
                'cityCode' => $business_info['city_id'],
                'addressType' => 'BUSINESS_ADDRESS',
                'address' => $address,
                'businessLicense' => $business_info['business_license'],
                'businessLicenseType' => str_replace('-', '', $business_info['business_license_type']),
                'cardNo' => $bank_info['account'],
                'cardName' => $bank_info['realname']
            );
        }

        $data['mch_id'] = $mch_id;
        $data['info'] = json_encode($info);

        $data['rate'] = 2.6;
        $data['weixin_mch_id'] = '1957';


        $ret = $Payapi->updatemch($data, $this->APP_SECRET);
        log_file($ret, 'edit_mch_info');
        //var_dump($ret);
        //$ret = '{"status" : 0,"msg" : "操作成功！","data" : {"mch_id" : "10002321" }}';
        $data_res = json_decode($ret, true);
        if ($data_res['status'] == 0) {
            //获取商户id成功
            $mch_id = $data_res['data']['mch_id'];
            log_file($mch_id, 'get_mch_id');
            return $mch_id;
            //var_dump($mch_id);
        } else {
            return false;
        }

    }


    //查询第三方商户信息
    function query_mch_info()
    {
        Vendor('mspayapi');
        $Payapi = new MSPayapi();

        $data = $this->get_common_params();

        $data['mch_id'] = 2;

        $ret = $Payapi->querymch($data, $this->APP_SECRET);

        $data_res = json_decode($ret);
        if ($data_res->status == 0) {
            //获取商户信息
            $mch_id = $data_res->data->mch_id;
            //设置商户号处理


            print_r($ret);
        } else {
            var_dump($ret);
        }
    }

    //查询余额
    function balance($mch_id)
    {
        Vendor('mspayapi');
        $Payapi = new MSPayapi();

        $data = $this->get_common_params();

        $data['mch_id'] = $mch_id;

        $ret = $Payapi->balance($data, $this->APP_SECRET);
        return $ret;exit;

      /*  $data_res = json_decode($ret);
        if ($data_res->status == 0) {
            echo $ret;exit;
            print_r($ret);
        } else {
            var_dump($ret);
        }*/
    }


    //支付
    function pay_code($order_id = 0, $voucher_amount = 0.00, $business_id)
    {
        Vendor('mspayapi');
        $Payapi = new MSPayapi();

        $out_trade_no = '';

        $data = $this->get_common_params();

        //第三方商户号，后期用户配置  get_mch_id() 获得
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);
        $data['mch_id'] = $business_info['mch_id'];
        //  $data['mch_id'] = '2';
        $data['title'] = '店都消费';
        // $total_fee = 0;

        $user_id = intval(session('user_id'));
        log_file("user_id:" . $user_id, 'ms_wxpay_response');
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo('openid');
        $openid = $user_info['openid'];
        $out_trade_no = time() . '_payorder_' . $order_id;

        //订单存在，进行下一步操作
        if ($order_id) {

            $order_obj = new OrderModel($order_id);
            $order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, user_address_id, voucher_code, business_id');

//            if ($order_info['voucher_code'] && $voucher_amount) {
//                $total_fee = $voucher_amount < 0.01 ? 0.01 : $voucher_amount;
//            } else {
            $total_fee = $order_info['pay_amount'];
            $total_fee = $total_fee < 0.01 ? 0.01 : $total_fee;
//            }
            //传递参数，回调截取后面的order_id去处理
            //$out_trade_no=date('Ymdhms') . '_payorder_' . $order_id;


            //获取店铺名称
            $business_obj = new BusinessModel();
            $business_info = $business_obj->getBusinessInfo('business_id = ' . $order_info['business_id'], 'business_name');

            if ($business_info) {
                $data['title'] = $GLOBALS['config_info']['SHOP_NAME'] . '-' . $business_info['business_name'] . '消费';
            }
        } else {
            return false;
        }
        //金额单位为分
        $data['total_fee'] = $total_fee ? $total_fee * 100 : 1;

        // $data['total_fee'] = 1;

        $data['openid'] = $openid;
        //$data['openid'] = 'owW85wcdoSaQ5KdPsTJSwQU7IGRc';
        $data['out_trade_no'] = $out_trade_no;
        $data['channel'] = 'pay.weixin.jspay';
        $data['notify_url'] = $this->NOTIFY_URL;

        $ret = $Payapi->paywxggh($data, $this->APP_SECRET);
        $data_res = json_decode($ret);
        log_file("Pay_code_result:" . $ret, 'ms_wxpay_response');
        if ($data_res->status == 0) {
            //获取支付调起信息
            return $data_res->data;
        } else {
            return ($ret);
        }

    }


    function pay_response()
    {
        $data = $_POST;
        log_file('in pay_response:' . '回调成功' . json_encode($data), 'ms_wxpay_response');

        //民生银行回到返回数据
//{"status":"0","app_id":"1000000012","billno":"2017060610000000125808844595"
//,"out_trade_no":"1496720757_payorder_0","total_fee":"1","pay_time":"20170606"
//,"bank_type":"0","bank_billno":"100123028573","timestamp":"1496720763"
//,"sign":"454FF6AA7DE5DCF6CAD0D5FB2CDEB917"}


        if (isset($_POST['status']) && $_POST['status'] == 0) {
            //回到成功，返回交易信息
            //获取支付类型
            $row_dd = isset($data['out_trade_no']) ? explode('_', $data['out_trade_no']) : '';
            $pay_type = $row_dd[1];
            $order_id = ($pay_type == 'payorder') ? $row_dd[2] : 0;

            //订单存在
            if ($order_id) {
                #$this->log_result('进入订单支付');
                //获取订单信息
                $order_obj = new OrderModel($order_id);
                try {
                    $order_info = $order_obj->getOrderInfo('order_id,pay_amount,total_amount, express_fee, pay_time, order_status, user_id, voucher_code,type,business_id');
                    //log_file($order_obj->getLastSql(),"my_pay");
                    $user_id = $order_info['user_id'];
                } catch (Exception $e) {
                    return false;
                }

                /* 检查支付的金额是否相符*/
                $total_fee = floatval($order_info['pay_amount']) * 100;

                if ($order_info['voucher_code']) {
                    $ticket_obj = new TicketModel();
                    $ticket_info = $ticket_obj->getTicketInfo($order_info['voucher_code']);
                    $card_code = $ticket_obj->where('voucher_code = ' . $order_info['voucher_code'])->getField('card_code');
                    if (!$card_code) return false;
                    //验证
                    $ticket_money = $ticket_obj->validTicketInfo($ticket_info);
                    if (!$ticket_money) {
                        return false;
                    }
                    if ($ticket_money * 100 + $data['total_fee'] != $order_info['pay_amount'] * 100) {
                        return false;
                    }

                } else {

                    //            if ($total_fee != $data['total_fee'])
                    //          {
                    //            return false;
                    //      }
                }

                //检查订单是否已付款，若已付款，退出
                if ($order_info['order_status']) {
                    return false;
                }
                $trade_no = $data['billno'];
                //调用订单模型的payOrder方法设置订单状态为已付款
                $order_obj->payOrder($trade_no, 'wxpay');
                collect($order_info['business_id'], $user_id, true);
                //调用账户模型的addAccount充值等额预存款金额
                $account_obj = new AccountModel();
                /* $account_obj->addAccount($user_id, 1, intval($data['total_fee']) / 100,
                     '微支付充值', 0, $trade_no);*/

                if ($order_info['type'] == 1 || $order_info['type'] == 2) {//到店消费,外卖消费
                    $business_obj = new BusinessModel();
                    $business_user_id = $business_obj->getBusinessField($order_info['business_id'], "user_id");
//                    $business_rate = $business_obj->getBusinessField($order_info['business_id'],"rate");
                    $business_name = $business_obj->getBusinessField($order_info['business_id'], "business_name");
                    $config_obj = new ConfigBaseModel();
                    if ($order_info['type'] == 1) {
                        $business_rate = ($config_obj->getConfig('all_business_rate')) / 100;
                    } elseif ($order_info['type'] == 2) {
                        $business_rate = ($config_obj->getConfig('all_business_rate_outside')) / 100;
                    }

                    log_file("step1", 'wxpay', true);
                    //信息表添加内容,商家在个人信息中可以看到
                    $message_obj = new MessageBaseModel();
                    if ($order_info['type'] == 2) {
                        $arr = array(
                            'reply_user_id' => $business_user_id,
                            'message_title' => '新增订单',
                            'order_id' => $order_info['order_id'],
                            'message_type' => 2,
                            'addtime' => time(),
                            'isuse' => 1,
                        );
                    }
                    $message_obj->addMessageByArr($arr);

                    log_file(json_encode($arr), 'wxpay', true);
                    //在like表中添加关注关系
                    $like_obj = new LikeModel();
                    $like_info = $like_obj->getLikeInfo('business_id = ' . $order_info['business_id'] . ' and user_id = ' . $order_info['user_id']);
                    if (!$like_info) {
                        $like_obj->addLike(array('business_id' => $order_info['business_id'], 'user_id' => $order_info['user_id'], 'addtime' => time()));
                    }

                    log_file("order_info : " . json_encode($order_info), 'wxpay', true);
                    //log_file($business_obj->getLastSql());
                    $account_obj->addAccount($user_id, AccountModel::ONLINE_VOUCHER, $order_info['pay_amount'], '微信充值', $order_id, $trade_no);
                    log_file("order_info :微信充值 ", 'wxpay', true);

                    if ($order_info['type'] == 1) {
                        $account_obj->addAccount($user_id, AccountModel::STORE_CONSUMPTION, -1 * $order_info['pay_amount'], '店内消费', $order_id, $trade_no);
                        log_file('明细sql' . $account_obj->getLastSql(), 'wxpay', true);
                    } else {
                        $account_obj->addAccount($user_id, AccountModel::TAKE_OUT_PAY, -$order_info['pay_amount'], '外卖消费', $order_id, $trade_no);
                    }
                    //$account_obj->addAccount($user_id, AccountModel::STORE_CONSUMPTION, -intval($data['total_fee']) / 100, '店内消费', 0, $trade_no);
                    log_file("order_info :店内消费 ", 'wxpay', true);
                    //todo 改成2位后面直接舍去 2017-05-04
                    //需要让利的钱
                    $rate_amount = intval($data['total_fee']) * ($business_rate);
                    //保留2位小数
                    $rate_amount = floor($rate_amount) / 100;
                    //实际打给店铺的钱
                    $for_business_amount = intval($data['total_fee']) / 100 - $rate_amount;
                    log_file($for_business_amount . "---" . $data['total_fee'] . "---" . $business_rate, 'wxpay');

                    //算出来小于0.01就设置成0.01
                    if ($for_business_amount < 0.01) {
                        $for_business_amount = 0.01;
                    }
                    $amount = intval($data['total_fee']) / 100;
                    $msg = array(
                        "first" => "尊敬的客户，您刚刚进行了一笔消费",
                        "keyword1" => $business_name,
                        "keyword2" => $order_info['pay_amount'],
                        "keyword3" => date('Y-m-d H:i:s'),
                        "remark" => "感谢你的光临"
                    );

                    PushModel::wxPush($user_id, 'pay_in_business', $msg);

                    $msg = array(
                        "first" => "尊敬的商户，您的店铺刚刚完成一笔店内支付订单",
                        "keyword1" => $business_name,
                        "keyword2" => $order_info['pay_amount'] * (1 - $business_rate),
                        "keyword3" => date('Y-m-d H:i:s'),
                        "remark" => "感谢您的使用"
                    );

                    //推送消息给APP
                    $title = "";
                    $push_msg = array(
                        //'content'=>'',
                        //'is_speech' => 0,
                        'order_id' => $order_id,
                        'type' => 2
                    );
                    $push_obj = new PushModel();
                    if ($order_info['type'] == 2) {
                        $title = "你有一笔新的外卖订单";
                        $push_msg['is_speech'] = 0;
                        $push_msg['content'] = '你有一笔新的外卖订单';

                    } else if ($order_info['type'] == 1) {
                        $title = "微信到店支付收款";
                        $push_msg['is_speech'] = 1;
                        $push_msg['content'] = '微信到店支付收款' . $order_info['pay_amount'] . '元';
                    }

                    $push_obj->jpush_user($title, $business_user_id, 'http', $push_msg);

                    PushModel::wxPush(intval($business_user_id), 'pay_in_business', $msg);

                    if ($order_info['type'] == 1) {
                        commission($order_info['order_id'], $order_info['type']);
                        //  $this->in_stroe_withdrawals($order_id,$for_business_amount);//打款
                    }

                    /*
                                        //自动打款给商家银行卡
                                        $account_obj->addAccount($business_user_id, AccountModel::STORE_CONSUMPTION_INCOME, $for_business_amount , '店内消费收入', $order_id, $trade_no);
                                        $account_obj->addAccount($business_user_id, AccountModel::PAY_TO_BANK, -$for_business_amount , '打款到银行卡', $order_id, $trade_no);

                                        //自动打款给商家银行卡
                                       /* $bank_card_obj = new BankCardModel();
                                        $bank_card_info = $bank_card_obj->getBankCardInfo("user_id='".$business_user_id."'");

                                        log_file("bank_info : " . json_encode($bank_card_info), 'wxpay', true);


                                        if($bank_card_info){
                                            $bank_card_id = $bank_card_info['bank_card_id'];

                                            $arr = array(
                                                "bank_card_id" => $bank_card_id,
                                                "pay_amount" => $for_business_amount,
                                                "business_id" => $order_info['business_id'],
                                                "order_id" => $order_info['order_id'],
                                                "remark" => "打款中，请勿进行手动打款。。",
                                            );

                                            //实例化汇款表
                                            $remittance_obj = new RemittanceModel();

                                            //添加汇款成功的项目
                                            $remittance_obj->addRemittance($arr);

                                            log_file("remittance_obj : " . $remittance_obj->getLastSql(), 'wxpay', true);
                                            //开始汇款
                                            log_file("remittance_obj : 开始打款", 'wxpay', true);
                                            $config_obj = new ConfigBaseModel();

                                            if($for_business_amount>$config_obj->getConfig("max_auto_pay_amount")){
                                                log_file("remittance_obj : 超过自动打款限额，自动转入失败列表", 'wxpay', true);
                                                $arr = array(
                                                    "is_above" => 1,
                                                    "remark" => "超过自动打款限额,打款失败",
                                                );

                                                $where = "order_id='". $order_info['order_id']."'";
                                                $remittance_obj->where($where)->save($arr);
                                            }else{
                                                $result = $this->pay_to_bank($bank_card_id,$for_business_amount,$order_info['order_id']);
                                                //汇款成功，修改状态，并且填入成功时间
                                                if(!$result){
                                                    log_file("remittance_obj : 汇款成功", 'wxpay', true);
                                                    $arr = array(
                                                        "status" => 1,
                                                        "pay_suc_time" => time(),
                                                        "remark" => "自动打款成功！！",
                                                    );

                                                    $where = "order_id='". $order_info['order_id']."'";
                                                    $remittance_obj->where($where)->save($arr);
                                                }else{
                                                    log_file("remittance_obj : 汇款失败，error：".$result, 'wxpay', true);
                                                    $arr = array(
                                                        "remark" => $result,
                                                    );

                                                    $where = "order_id='". $order_info['order_id']."'";
                                                    $remittance_obj->where($where)->save($arr);
                                                }
                                            }


                                        }*/
                    //log_file($account_obj->getLastSql());
                }
                return 1;
            } else {
                return false;
            }
        }

        return false;
    }

    //获取支付宝支付参数
    public function alipay_pay_code($order_id = 0, $voucher_amount = 0.00, $ali_user_id, $business_id)
    {

        Vendor('mspayapi');
        $Payapi = new MSPayapi();

        $out_trade_no = '';

        $data = $this->get_common_params();
        $order_obj = new OrderModel($order_id);
        $order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, user_address_id, voucher_code, business_id');
        //第三方商户号，后期用户配置  get_mch_id() 获得
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);
        $data['mch_id'] = $business_info['mch_id'];
        // $data['mch_id'] = '1';
        $data['title'] = '店都消费';
        // $total_fee = 0;
        $total_fee = $order_info['pay_amount'];
        $total_fee = $total_fee < 0.01 ? 0.01 : $total_fee;
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel($user_id);
//        $user_info = $user_obj->getUserInfo('openid');
//        $openid = $user_info['openid'];
        $out_trade_no = time() . '_payorder_' . $order_id;

        //金额单位为分
        $data['total_fee'] = $total_fee ? $total_fee * 100 : 1;


        $data['openid'] = $ali_user_id;


        //$data['openid'] = 'owW85wcdoSaQ5KdPsTJSwQU7IGRc';
        $data['out_trade_no'] = $out_trade_no;
        $data['channel'] = 'pay.alipay.jspay';
        $data['notify_url'] = $this->NOTIFY_URL_ALIPAY;
        log_file($this->NOTIFY_URL_ALIPAY, "notify");
        $ret = $Payapi->payzfbfwc($data, $this->APP_SECRET);
        log_file($ret, 'ali');
        return $ret;
    }

    function alipay_pay_response()
    {
        $data = $_POST;
        log_file('in pay_response:' . '回调成功' . json_encode($data), 'alipay_response');

        //民生银行回到返回数据
//{"status":"0","app_id":"1000000012","billno":"2017060610000000125808844595"
//,"out_trade_no":"1496720757_payorder_0","total_fee":"1","pay_time":"20170606"
//,"bank_type":"0","bank_billno":"100123028573","timestamp":"1496720763"
//,"sign":"454FF6AA7DE5DCF6CAD0D5FB2CDEB917"}


        if (isset($_POST['status']) && $_POST['status'] == 0) {
            //回到成功，返回交易信息
            //获取支付类型
            $row_dd = isset($data['out_trade_no']) ? explode('_', $data['out_trade_no']) : '';
            $pay_type = $row_dd[1];
            $order_id = ($pay_type == 'payorder') ? $row_dd[2] : 0;

            //订单存在
            if ($order_id) {
                #$this->log_result('进入订单支付');
                //获取订单信息
                $order_obj = new OrderModel($order_id);
                try {
                    $order_info = $order_obj->getOrderInfo('order_id,pay_amount, total_amount, express_fee, pay_time, order_status, user_id, voucher_code,type,business_id');
                    //log_file($order_obj->getLastSql(),"my_pay");
                    $user_id = $order_info['user_id'];
                } catch (Exception $e) {
                    return false;
                }

                /* 检查支付的金额是否相符*/
                $total_fee = floatval($order_info['pay_amount']) * 100;

                if ($order_info['voucher_code']) {
                    $ticket_obj = new TicketModel();
                    $ticket_info = $ticket_obj->getTicketInfo($order_info['voucher_code']);
                    $card_code = $ticket_obj->where('voucher_code = ' . $order_info['voucher_code'])->getField('card_code');
                    if (!$card_code) return false;
                    //验证
                    $ticket_money = $ticket_obj->validTicketInfo($ticket_info);
                    if (!$ticket_money) {
                        return false;
                    }
                    if ($ticket_money * 100 + $data['total_fee'] != $order_info['pay_amount'] * 100) {
                        return false;
                    }

                } else {
                    log_file('total_fee:' . $total_fee, 'alipay_response');
                    log_file('实际付款:' . $data['total_fee'], 'alipay_response');
//                    if ($total_fee != $data['total_fee'])
//                    {
//                        return false;
//                    }
                }

                //检查订单是否已付款，若已付款，退出
                if ($order_info['order_status']) {
                    return false;
                }
                $trade_no = $data['billno'];
                //调用订单模型的payOrder方法设置订单状态为已付款
                $order_obj->payOrder($trade_no, 'alipay');

                //collect($order_info['business_id'],$user_id,true);
                //调用账户模型的addAccount充值等额预存款金额
                $account_obj = new AccountModel();
                /* $account_obj->addAccount($user_id, 1, intval($data['total_fee']) / 100,
                     '微支付充值', 0, $trade_no);*/

                if ($order_info['type'] == 1 || $order_info['type'] == 2) {//到店消费
                    log_file('订单类型:' . $order_info['type'], 'alipay_response');
                    $business_obj = new BusinessModel();
                    $business_user_id = $business_obj->getBusinessField($order_info['business_id'], "user_id");
                    $business_rate = $business_obj->getBusinessField($order_info['business_id'], "rate");
                    $business_name = $business_obj->getBusinessField($order_info['business_id'], "business_name");

                    //信息表添加内容,商家在个人信息中可以看到
                    /*                   $message_obj = new MessageBaseModel();
                                       if ($order_info['type'] == 2) {
                                           $arr = array(
                                               'reply_user_id' => $business_user_id,
                                               'message_title' => '新增订单',
                                               'order_id'=>$order_id,
                                               'addtime'=>time(),
                                               'isuse'=>1,
                                           );
                                       }
                                       $message_obj->addMessageByArr($arr);
                                        */
                    log_file("order_info : " . json_encode($order_info), 'Alipay', true);
                    //log_file($business_obj->getLastSql());
                    $account_obj->addAccount($user_id, AccountModel::ONLINE_VOUCHER, intval($order_info['pay_amount']) / 100, '支付宝充值', $order_id, $trade_no);
                    log_file("order_info :支付宝充值 ", 'alipay', true);
                    $account_obj->addAccount($user_id, AccountModel::STORE_CONSUMPTION, -intval($order_info['pay_amount']) / 100, '店内消费', $order_id, $trade_no);
                    log_file("order_info :店内消费 ", 'alipay', true);
                    //log_file($account_obj->getLastSql());
                    //todo 改成2位后面直接舍去 2017-05-04
                    //需要让利的钱
                    $rate_amount = intval($data['total_fee']) * ($business_rate);
                    //保留2位小数
                    $rate_amount = floor($rate_amount) / 100;
                    //实际打给店铺的钱
                    $for_business_amount = intval($data['total_fee']) / 100 - $rate_amount;
                    log_file($for_business_amount . "---" . $data['total_fee'] . "---" . $business_rate, 'wxpay');

                    //算出来小于0.01就设置成0.01
                    if ($for_business_amount < 0.01) {
                        $for_business_amount = 0.01;
                    }
                    $amount = intval($data['total_fee']) / 100;

                    $msg = array(
                        "first" => "尊敬的商户，您的店铺刚刚完成一笔店内支付订单",
                        "keyword1" => $business_name,
                        "keyword2" => $amount,
                        "keyword3" => date('Y-m-d H:i:s'),
                        "remark" => "感谢您的使用"
                    );

                    PushModel::wxPush(intval($business_user_id), 'pay_in_business', $msg);

                    //推送消息给APP
                    $title = "";
                    $push_msg = array(
                        //'content'=>'',
                        //'is_speech' => 0,
                        'order_id' => $order_id,
                        'type' => 2
                    );
                    $push_obj = new PushModel();
                    if ($order_info['type'] == 2) {
                        $title = "你有一笔新的外卖订单";
                        $push_msg['is_speech'] = 0;
                        $push_msg['content'] = '你有一笔新的外卖订单';

                    } else if ($order_info['type'] == 1) {
                        $title = "支付宝到店支付收款";
                        $push_msg['is_speech'] = 1;
                        $push_msg['content'] = '支付宝到店支付收款' . $order_info['pay_amount'] . '元';
                    }

                    $push_obj->jpush_user($title, $business_user_id, 'http', $push_msg);

                    if ($order_info['type'] == 1) {
                        commission($order_info['order_id'], $order_info['type']);
                        //  $this->in_stroe_withdrawals($order_id,$for_business_amount);//打款
                    }
                    /*
                                        $account_obj->addAccount($business_user_id, AccountModel::STORE_CONSUMPTION_INCOME, $for_business_amount , '店内消费收入', $order_id, $trade_no);
                                        $account_obj->addAccount($business_user_id, AccountModel::PAY_TO_BANK, -$for_business_amount , '打款到银行卡', $order_id, $trade_no);

                                        //自动打款给商家银行卡
                                        $bank_card_obj = new BankCardModel();
                                        $bank_card_info = $bank_card_obj->getBankCardInfo("user_id='".$business_user_id."'");

                                        log_file("bank_info : " . json_encode($bank_card_info), 'wxpay', true);


                                        if($bank_card_info){
                                            $bank_card_id = $bank_card_info['bank_card_id'];

                                            $arr = array(
                                                "bank_card_id" => $bank_card_id,
                                                "pay_amount" => $for_business_amount,
                                                "business_id" => $order_info['business_id'],
                                                "order_id" => $order_info['order_id'],
                                                "remark" => "打款中，请勿进行手动打款。。",
                                            );

                                            //实例化汇款表
                                            $remittance_obj = new RemittanceModel();

                                            //添加汇款成功的项目
                                            $remittance_obj->addRemittance($arr);

                                            log_file("remittance_obj : " . $remittance_obj->getLastSql(), 'wxpay', true);
                                            //开始汇款
                                            log_file("remittance_obj : 开始打款", 'wxpay', true);
                                            $config_obj = new ConfigBaseModel();

                                            if($for_business_amount>$config_obj->getConfig("max_auto_pay_amount")){
                                                log_file("remittance_obj : 超过自动打款限额，自动转入失败列表", 'wxpay', true);
                                                $arr = array(
                                                    "is_above" => 1,
                                                    "remark" => "超过自动打款限额,打款失败",
                                                );

                                                $where = "order_id='". $order_info['order_id']."'";
                                                $remittance_obj->where($where)->save($arr);
                                            }else{
                                                $result = $this->pay_to_bank($bank_card_id,$for_business_amount,$order_info['order_id']);
                                                //汇款成功，修改状态，并且填入成功时间
                                                if(!$result){
                                                    log_file("remittance_obj : 汇款成功", 'wxpay', true);
                                                    $arr = array(
                                                        "status" => 1,
                                                        "pay_suc_time" => time(),
                                                        "remark" => "自动打款成功！！",
                                                    );

                                                    $where = "order_id='". $order_info['order_id']."'";
                                                    $remittance_obj->where($where)->save($arr);
                                                }else{
                                                    log_file("remittance_obj : 汇款失败，error：".$result, 'wxpay', true);
                                                    $arr = array(
                                                        "remark" => $result,
                                                    );

                                                    $where = "order_id='". $order_info['order_id']."'";
                                                    $remittance_obj->where($where)->save($arr);
                                                }
                                            }


                                        }*/
                    //log_file($account_obj->getLastSql());
                }
                return 1;
            } else {
                return false;
            }
        }

        return false;
    }


    //获取公共参数
    function get_common_params()
    {
        $data = array(
            //统一参数
            'app_id' => $this->APP_ID,
            'nonce_str' => time(),
            'version' => '1.0',
            'timestamp' => time(),
        );
        return $data;
    }

    //提现接口
    function  withdrawals($user_id, $total_fee, $order_id = '')
    {
        Vendor('mspayapi');
        if ($user_id != 1) {
            $business_obj = new BusinessModel();
            $business_info = $business_obj->getBusinessInfo('user_id = ' . $user_id);
            $bank_card_obj = new BankCardModel();
            $bank_info = $bank_card_obj->getBankCardInfo('user_id =' . $user_id);
            $mch_id = $business_info['mch_id'];
        } else {
            $mch_id = 1;
            $bank_info['realname'] = '余洪斌';
            $bank_info['account'] = '62178566100059970944';
        }

        if ($order_id) {
            $order_obj = new OrderModel();
            $order_info = $order_obj->getOrderByInfo('', 'order_id = ' . $order_id);
            $mch_id = $order_info['mch_id'];
        }
        $data = $this->get_common_params();
        $arr = array(
            'mch_id' => $mch_id,
            'out_trade_no' => time() . $user_id,
            'total_fee' => $total_fee * 100,//单位:分
            'trade_type' => 2,
            'account_type' => 0,
            'account_name' => $bank_info['realname'],
            'account_no' => $bank_info['account'],
        );
        log_file('request_data:' . json_encode($arr), 'withdrawals');
        $data = array_merge($data, $arr);
        /* echo json_encode($arr);exit;*/
        $Payapi = new MSPayapi();
        $ret = $Payapi->transfer($data, $this->APP_SECRET);
        log_file('商家名:' . $business_info['business_name'] . '--mch_id:' . $mch_id . '--提款金额:' . $total_fee, 'withdrawals');
        log_file('result:' . json_encode($ret), 'withdrawals');
        $result = json_decode($ret, true);
        if ($result['status'] == 0) {
            return array('code' => 1, 'msg' => '');
        } else {
            return array('code' => -1, 'msg' => $result['msg']);
        }

    }

    //判断当前时间是否是提现时间
    function during_withdraw()
    {
        $day_of_week = date("w");
        if ($day_of_week == 1) {//周一早上11点~晚上11点
            $start_hour = 11;
            $end_hour = 23;
        } else {//非周一 早上五点~晚上11点
            $start_hour = 5;
            $end_hour = 23;
        }
        if (date('H') >= $start_hour && date('H') <= $end_hour) {
            return true;
        } else {
            return false;
        }
    }

    //到店消费自动打款,注:money的单位是分
    function in_stroe_withdrawals($order_id, $money)
    {
        log_file($money, 'dakuan');
        $order_obj = new OrderModel();
        $order_info = $order_obj->getOrderByInfo('', 'order_id = ' . $order_id);
        $business_id = $order_info['business_id'];
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);
        $bank_card_obj = new BankCardModel();
        $bank_card_info = $bank_card_obj->getBankCardInfo("user_id=" . $business_info['user_id']);
        log_file('bank_info:' . json_encode($bank_card_info), 'dakuan');

        $business_obj->where('business_id = ' . $business_id)->setInc('freeze_money', $money);//冻结池加钱
        //$business_obj->where('business_id = '.$business_id)->setDec('business_left_money',$money/100);//余额减
        $data = $this->get_common_params();
        $arr = array(
            'mch_id' => $order_info['mch_id'],
            'out_trade_no' => time(),
            'total_fee' => $money * 100,//单位:分
            'trade_type' => 2,
            'account_type' => 0,
            'account_name' => $bank_card_info['realname'],
            'account_no' => $bank_card_info['account'],
        );
        $data = array_merge($data, $arr);
        log_file('data:' . json_encode($data), 'dakuan');
        vendor('mspayapi');
        $Payapi = new MSPayapi();
        $ret = $Payapi->transfer($data, $this->APP_SECRET);

        log_file('打款金额:' . $money, 'dakuan');
        log_file('mch_id:' . $order_info['mch_id'], 'dakuan');
        // log_file('result:'.json_encode($ret),'dakuan');
        log_file('收款人:' . $bank_card_info['realname'], 'dakuan');
        log_file('收款银行卡号:' . $bank_card_info['account'], 'dakuan');
        log_file('-----------------------------', 'dakuan');
        $result = json_decode($ret, true);
        if ($result['status'] == 0) {//打款成功,添加记录
            //$business_obj->where('business_id = '.$business_id)->setDnc('freeze_money',$money/100);//冻结池减钱
            $bank_data = array(
                'deposit_type' => 1,
                'bank_card_id' => $bank_card_info['bank_card_id'],
                'money' => $money,
                'state' => 1,
                'user_id' => $business_info['user_id'],
                'role_type' => 2,
                'order_id' => $order_id
            );
            $deposit_apply_obj = new DepositApplyModel();
            $deposit_apply_obj->addRemittance($bank_data);
            log_file('sql:' . $deposit_apply_obj->getLastSql(), 'dakuan');
        } else {
            $business_obj->where('business_id = ' . $business_id)->setDec('business_left_money', $money);//余额减
            $bank_data = array(
                'deposit_type' => 1,
                'bank_card_id' => $bank_card_info['bank_card_id'],
                'money' => $money,
                'state' => 0,
                'user_id' => $business_info['user_id'],
                'role_type' => 2,
                'admin_remark' => $result['msg'],
                'order_id' => $order_id
            );

            $deposit_apply_obj = new DepositApplyModel();
            $deposit_apply_obj->addRemittance($bank_data);
            log_file('sql:' . $deposit_apply_obj->getLastSql(), 'dakuan');
        }

    }
}
