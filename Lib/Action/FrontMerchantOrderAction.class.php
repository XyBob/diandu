<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-04-25
 * Time: 16:36
 */
vendor('AlipaySDK.AopClient');
class FrontMerchantOrderAction extends FrontAction{

    function _initialize()
    {
        parent::_initialize();
    }
    //获取所有满足条件的优惠券
    public function in_discount($business_id,$user_id){
//        $business_id=$this->_post('business_id');
//        $user_id=$this->_post('user_id');
//        $user_id=39454;
//        $business_id=24;
        $time=time();
        $discount_obj=new DiscountMinusModel();
        $discount_shop = $discount_obj->getDiscountMinusList('discount_minus_id,num,amount_limit',"merchant_id=$business_id AND isuse='1' AND (scope='1' or scope='0') AND $time > start_time AND $time
         < end_time ",'amount_limit ASC','');//商家满减
        $discount_platform = $discount_obj->getDiscountMinusList('discount_minus_id,num,amount_limit',"merchant_id='0' AND isuse='1' AND (scope='1' or scope='0')  AND $time > start_time AND $time
         < end_time ",'','');//平台减免
        //$actives_coupons = D('vouchers')->where("merchant_id=$business_id AND isuse='1'")->find();//优惠券
        $user_voucher_obj=new UserVouchersModel();
        $actives_coupons=$user_voucher_obj->getUserVouchersList('vouchers_id',"user_id=$user_id AND merchant_id=$business_id AND isuse='1' AND (scope='1' or scope='0') ",'','');//满足条件的优惠券
        $voucher_obj=new VouchersModel();
        foreach ($actives_coupons as $k=>$v){
            //$actives_coupons[$k]=$voucher_obj->getVouchersInfo('vouchers_id='.$v['vouchers_id'],'vouchers_id');
            //$actives_coupons[$k]=$voucher_obj->getVouchersInfo('vouchers_id='.$v['vouchers_id'],'num');
            $VouchersInfo=$voucher_obj->getVouchersInfo('vouchers_id='.$v['vouchers_id'],'vouchers_id,num,amount_limit');
            if(empty($VouchersInfo)){
               continue;
            }
            $handel_actives_coupons[$k]=$VouchersInfo?$VouchersInfo:'';
        }
        $data["shop"]=$discount_shop;
        $data["platform"]=$discount_platform;
        $data["voucher"]=$handel_actives_coupons;
        return $data;


    }
    function curl($url,$data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    public function buy_bill(){
        $business_id = $this->_request('business_id');
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($user_agent, 'MicroMessenger')){
           //微信
            $ua='Wx';
        }elseif(strpos($user_agent, 'Alipay')){
            $ua='Ali';
            //支付宝
            $state=$this->_request('state');
            if(!$state){//第一次进来,需要去支付宝接口拿auto_code
                AlipayModel::AliAuthorize($business_id);
            }else{//支付宝回调
                $auth_code=$this->_request('auth_code');//根据auto_code获取支付宝用户id
                log_file($auth_code,'Alipay');
                $Client = new AopClient();
                $privatekey="MIIEpQIBAAKCAQEAyo/BIenCFvALjhyDu7YO2sbAutKRdsnXQx2aucEPI9rFsWph+yyzpt/b/p4CXMxgO8bjkM2w6cZUKpq5tx1OhHeJ3W/nWmV1akT52Gs7dVnxZpXjQRTYCcW/aIBLF1kZHB7DnuJzcmr66ER/HoJU/Up9/5AhO8UXCe1K2a5WERcYlGMphgJ2tutWzUyjp02AwydMoyyebuQrAEnHW0YOpzioJW1jepB4mf0e1DuLWmrq0qB5RJ06yjfPFrGL2lw10i77OPSLItZy+7DbP7bjjz6A76BCoq/rN+n77wo0f1YYroBbPj+ZtIlrugKmjiG5Ma/M18I7QiT3r3TZAelPNwIDAQABAoIBAQCvD0QLihmKd1SVMgGLddEqtECWdSrwLYpTX797r+TkyMq4BMe/KqfsnWVkjKxgBOVaZA4B9DJkJ1pQI75DChn0k9bbQD4CutKZ0BjZN/t/9QaS8REhCuGWuIcuykmbWQ5BZjkMFItPpDNKDwCJnnvTF9EC0E5YeIHru19H98o8I15elxqNSVY+/okFhHv16hDYsYASQ2i+ndfwwKgEnTvksDC/2S5QLZxLqPNFH8hUPhUQJp36LNIvLx5A6jAsPu8CG81zKt0lx6SSw5FpqnnxDaG77Y2rzu84sdKevrGVakfOBMZ2oUXjq2pIXbTpci9zVzzCJUDNoyVyuELa1nq5AoGBAPKVCQrIv00TVnHqCrWW86d2SPevR7GtyeuLcXsENl1+MIxmo61e/4Ic6xJJHMzMi7z0SIq8/fG7ioHh0UUv4h4fEbvBZ+h7jq4Cs3UMrLUn2DdgEA5IMYS2bkNqfST74bvQnOxvX7G6ROfI+jsdsiQof5zPLuPIF9ozc7+aXuV7AoGBANXEBt0dIQNDkT3yWgAh5+1PjTzZckdYepO2fRM1OXr1Yy+cHvf4KHdZLodm2kDB66qIua/DdPpZPC+NOBnWB535rK7WGUhicHy4jd3TRgtCeEJd/03oOFaIyFulUYvTuk53E8LvLwmUFf9NinDpfHSG13HCbWgkV2qqgFgV2Op1AoGAbD7Mth82HfKPFG3XMYiWWReTH9L7LvHZtF2Y2cfbaoSwrTXvu6E0ap701kgBrfFoOXzYEfCbcI67E5Hsi+79+2rpwtpev4LC/CsAYS6ysnOBK9SV1Ympbwro0PRnu2UaKXDBVU+tZ+UycitgXZi2sSPRLevVhJb47ckf0VPVHJkCgYEAqy4kFPMbmaKE76dgXRTJxibbQmwa8HkxB5KuTDBmDEnvGJQb1JTbyt8WvIUnp43i65g7oj2SMlw9LxMWZtIXHXFv0D5Q1r9FtwqPSKDESYX8CaF+LeQVIW69i24yhBeT7Pu8TnD9KN12VBDDGTJQYHwOkOGSfUAE5L0Os/siznUCgYEAk9jZHFmn3QiJWXElRP0uJBQPjPOy6+iyhpnPnbkgbAbdu9KGQJnzNLOmdxuT3rfUUyo0w8K62jVywWXzAkre/7ULKGLu08+H5Yy0p+xWyKExPoaCI01wxQaFX0JqJPzk/BJwadkxtZgfFTws9Dlaa9UHGzKquHYuehcy+peHLT0=";
                $url="https://openapi.alipay.com/gateway.do";
                $arr=array(
                    'app_id'=>'2017040106519435',
                    'method'=>'alipay.system.oauth.token',
                    'charset'=>'GBK',
                    'sign_type'=>'RSA2',
                    'timestamp'=>date('Y-m-d H:i:s',time()),
                    'version'=>'1.0',
                    'grant_type'=>'authorization_code',
                    'code'=>$auth_code,
                    'refresh_token'=>'',
                );
                $content=$Client->getSignContent($arr);
                log_file($content,'Alipay');
                $sign=$Client->alonersaSign($content,$privatekey,'RSA2');
                $arr['sign']=$sign;
                log_file($sign,'Alipay');
                $data=$this->curl($url,$arr);
                log_file($data,'Alipay');
                $ali_user_arr=json_decode($data,true);
                $ali_user_id=$ali_user_arr['alipay_system_oauth_token_response']['user_id'];//支付宝用户的id
                log_file($ali_user_id,'Alipay');
                //echo $ali_user_id;exit;
                $this->assign('ali_user_id',$ali_user_id);
            }
        }
            if(isset($_GET['business_id'])){
                $business_id = $_GET['business_id'];
            }else{
                exit("business_id获取失败");
            }
            $actives_breaks = D('DiscountMinus')->where("merchant_id=$business_id AND isuse='1' AND ( scope='1' or scope='0' )")->find();//满减
            $actives_coupons = D('vouchers')->where("merchant_id=$business_id AND isuse='1' AND ( scope='1' or scope='0' )")->find();//优惠券
            $where = "business_id='".$business_id."'";
            $business_obj = new BusinessModel();
            $business = $business_obj->getBusinessInfo($where);
            $is_check = 1;
            //支付宝进来+该商家进件审核没通过
            if($business['mch_status']!=1&&strpos($user_agent, 'Alipay')){
                $is_check=0;
            }
            $user_obj = new UserModel();
            $where_user = "user_id='".session('user_id')."'";
            $user_business_referee = $user_obj->getUserInfo('first_agent_id',$where_user);

            //如果用户没有推荐人，就设置商家是他的推荐人,过滤商家是自己
             log_file('修改前用户推荐人:'.$user_business_referee['first_agent_id'],'buy_bill');
            if(!$user_business_referee['first_agent_id']&&$business['user_id']!=session('user_id')){
                //var_dump($user_business_referee);
                $arr = array(
                   'first_agent_id' => $business['user_id'],
                );
                $user_obj->where($where_user)->save($arr);
                log_file('修改后用户推荐人:'.$business['user_id'],'buy_bill');
                log_file('edit_sql:'.$user_obj->getLastSql(),'buy_bill');
            }

            log_file(json_encode($user_business_referee).'--business_user_id:'.$business['user_id'].'--user_id:'.session('user_id'),'buy_bill');

            if($business){
                $data=$this->in_discount($business_id,session('user_id'));
                $this->assign('data',json_encode($data));
                //$business_user_id = $business['user_id'];
                //$this->assign("business_user_id",$business_user_id);
                $this->assign('user_id',session('user_id'));
                $this->assign("business",$business);
                $this->assign('actives_break',$actives_breaks);
                $this->assign('actives_coupon',$actives_coupons);
            }
            $this->assign('is_check',$is_check);
            $this->assign('ua',$ua);
            $this->assign('head_title','买单');
            $this->display();

    }
    public function pay_bill(){
        $order_id = $this->_get('order_id');
//        var_dump($order_id);
//        exit();
        $order_obj = new OrderModel($order_id);
//        $where="order_status=.".OrderModel::PRE_PAY."'";

        if($order_id){
            $order_info = $order_obj->getOrderInfo();
            if($order_info){
                $business_obj = new BusinessModel();
                $business = $business_obj->where("business_id='".$order_info['business_id']."'")->find();
                $this->assign("amount",$order_info['pay_amount']);
                $this->assign("order_sn",$order_info['order_sn']);
                $this->assign("order_id",$order_id);
                $this->assign("business_name",$business['business_name']);
                $this->assign("business_user_id",$business['user_id']);
            }
        }
        $this->display();
    }

    public function createOrder(){
//        if(session('user_id') == 62264){
//            exit(json_encode(array(
//                "code" => 0,
//                "order_id" => 0
//            )));
//        }
        $order_obj = new OrderModel();

        $business_id = $this->_post('business_id');
        $pay_amount = $this->_post('pay_amount');//实际支付价格
        $total_amount = $this->_post('total_amount');//优惠前价格
        $pay_way=$this->_post('pay_way');
        $discount_mins_id = $this->_post('shop_discount_id');
        $discount_mins_num = $this->_post('shop_discount_num');
        $coupon_id = $this->_post('coupon_id');
        $coupon_amount = $this->_post('coupon_num');
        $platform_discount_id = $this->_post('platform_discount_id');
        $platform_discounts = $this->_post('platform_discount_num');
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = '.$business_id,'');
       /* if($business_info['mch_status']==1){
            $mch_id = $business_info['mch_id'];
            $mch_id = 1;
        }else{
            $mch_id = 1;
        }*/
        $mch_id = $business_info['mch_id'];
//        $amount = 0.01;
        if($pay_way=='Wx'){
            $pay_way='wxpay';
        }elseif($pay_way=='Ali'){
            $pay_way='alipay';
        }elseif($pay_way=='Wallet'){
            $pay_way='walletpay';
        }
        $where = "business_id='".$business_id."'";
        $business_obj = new BusinessModel();
        $business = $business_obj->getBusinessInfo($where);

        if($business){
            $arr = array(
                "pay_amount" => $pay_amount,
                "total_amount" => $total_amount,
                "province_id"=>$business['province_id'],
                "city_id"=>$business['city_id'],
                "area_id"=>$business['area_id'],
                "business_id"=>$business_id,
                'coupon_id' => $coupon_id,
                'coupon_amount' => $coupon_amount,
                'discount_mins_id' => $discount_mins_id,
                'discount_mins_num' => $discount_mins_num,
                'platform_discount_id' => $platform_discount_id,
                'platform_discounts' => $platform_discounts,
                "type"=> 1,
                'payway'=>$pay_way,
                'mch_id'=>$mch_id
            );

            $order_id = $order_obj->addOrder($arr);

            if($order_id){
                change_voucher_isuse($order_id);
                exit(json_encode(array(
                    "code" => 0,
                    "order_id" => $order_id
                )));
            }else{
                exit(json_encode(array(
                    "code" => 1,
                    "msg" => "创建订单失败"
                )));
            }
        }

    }


    //获取微信支付的参数
    function get_wx_param(){

        $coin_num = $this->_post('coin_num');
        $business_id=$this->_post('business_id');
       // $coin_num=$coin_num/10000;
        $coin_num=1;
//        $business_user_id = $this->_post('business_user_id');
        $order_id = $this->_post('order_id');
//        if($business_user_id==""||$coin_num==""){
//        }
//        var_dump($business_user_id);
//        exit();
        $user_id = intval(session('user_id'));
        $order_obj = new OrderModel($order_id);
        $order_info = $order_obj->getOrderByInfo('','order_id = '.$order_id);
        $state = $order_obj->getOrderState();
        if($state == 1){
            $this->json_exit(array(
                "code" => 1,
                "msg" => "订单已支付"
            ));
        }


        //if(session('user_id') ==/* 62264*/62810){
      if($order_info['type']==1){
            log_file('come in',"get_wx_param");
            $mspay_obj = new MsPayModel();
            $ret = $mspay_obj->pay_code($order_id,$coin_num,$business_id);
            //var_dump($ret);
            if($ret->pay_info){
                //$this->json_exit($ret->pay_info);
                log_file('pay_info:'.json_encode($ret->pay_info),"get_wx_param");
                $this->json_exit(json_encode($ret->pay_info));
            }
            die();
      }else{
           log_file("coin_num:".$coin_num."--user_id:".$user_id,"get_wx_param");
           if (is_numeric($coin_num) && $user_id)
           {
               $wxpay_obj = new WXPayModel();
               $jsApiParameters = $wxpay_obj->pay_code($order_id, $coin_num,0,false);
               log_file($jsApiParameters,"get_wx_param");
               $this->json_exit($jsApiParameters);
           }
      }
        //}

        //exit($state);
      /*  log_file("coin_num:".$coin_num."--user_id:".$user_id,"get_wx_param");
        if (is_numeric($coin_num) && $user_id)
        {

            $wxpay_obj = new WXPayModel();
            //JSAPI
            $jsApiParameters = $wxpay_obj->pay_code($order_id, $coin_num,0,false);
            log_file($jsApiParameters,"get_wx_param");
            $this->json_exit($jsApiParameters);
        }
       */
        $this->json_exit(array(
            "code" => 1,
            "msg" => "获取支付信息失败"
        ));
    }

    //获取支付宝支付的参数
    function get_ali_param(){
        $business_id=$this->_post('business_id');
        $coin_num = $this->_post('coin_num');
        $coin_num = 1;
        $order_id = $this->_post('order_id');
        $ali_user_id= $this->_post('ali_user_id');
        $mspay_obj = new MsPayModel();
        $ret = $mspay_obj->alipay_pay_code($order_id,$coin_num,$ali_user_id,$business_id);
        echo $ret;
        exit;

    }

    //app端获取支付参数
    function get_mobile_wxpay_param(){
        $coin_num = $this->_post('coin_num');
        $business_id=$this->_post('business_id');
        // $coin_num=$coin_num/10000;
        $coin_num=1;
//        $business_user_id = $this->_post('business_user_id');
        $order_id = $this->_post('order_id');
//        if($business_user_id==""||$coin_num==""){
//        }
//        var_dump($business_user_id);
//        exit();
        $user_id = intval(session('user_id'));
        $order_obj = new OrderModel($order_id);
        $state = $order_obj->getOrderState();
        if($state == 1){
            $this->json_exit(array(
                "code" => 1,
                "msg" => "订单已支付"
            ));
        }

        if (is_numeric($coin_num) && $user_id)
        {

            $wxpay_obj = new WXPayModel(true);
            //JSAPI
            $jsApiParameters = $wxpay_obj->mobile_pay_code($order_id, $coin_num,0,false);
            log_file($jsApiParameters,"get_wx_param");
            $this->json_exit($jsApiParameters);
        }

        $this->json_exit(array(
            "code" => 1,
            "msg" => "获取支付信息失败"
        ));
    }


    //app端获取支付参数
    function get_mobile_alipay_param(){
        $coin_num = $this->_post('coin_num');
        $business_id=$this->_post('business_id');
        // $coin_num=$coin_num/10000;
        $coin_num=1;
//        $business_user_id = $this->_post('business_user_id');
        $order_id = $this->_post('order_id');
//        if($business_user_id==""||$coin_num==""){
//        }
//        var_dump($business_user_id);
//        exit();
        $user_id = intval(session('user_id'));
        $user_id = 62819;
        $order_obj = new OrderModel($order_id);
        $state = $order_obj->getOrderState();
        if($state == 1){
            $this->json_exit(array(
                "code" => 1,
                "msg" => "订单已支付"
            ));
        }

        if (is_numeric($coin_num) && $user_id)
        {

            $alipay_obj = new AlipayModel();
            //JSAPI

            $jsApiParameters = $alipay_obj->mobile_pay_code($order_id, $coin_num);

            log_file($jsApiParameters,"get_wx_param");
            $this->json_exit($jsApiParameters);
        }

        $this->json_exit(array(
            "code" => 1,
            "msg" => "获取支付信息失败"
        ));
    }


    //验证支付密码+付钱+修改订单状态
    function wallet_pay(){
        $pwd=trim($this->_post('pwd'));
        $order_id=trim($this->_post('order_id'));
        $type=$this->_post('type');
        $user_id=session('user_id');
        $user_obj=new UserModel($user_id);
        $order_obj=new OrderModel();
        $user_info=$user_obj->getUserInfo('','user_id = '.$user_id);
        if(/*md5($pwd)===$user_info['pay_password']*/true){
            $order_info=$order_obj->getOrderByInfo('','order_id = '.$order_id);
            $pay_amount=$order_info['pay_amount'];
            log_file('order_id='.$order_id,'left_money');
            log_file('pay_amount='.$pay_amount,'left_money');
            if($user_info['left_money']<$pay_amount){
                $return_data=array(
                    'code'=>-1,
                    'msg'=>'余额不足'
                );
                echo json_encode($return_data);exit;
            }

            $account_obj=new AccountModel();
            if($type=='in_store'){
                $account_obj->addAccount($user_id, AccountModel::STORE_CONSUMPTION, -$pay_amount, '到店钱包支付',$order_id);
            }else{
                $account_obj->addAccount($user_id, AccountModel::TAKE_OUT_PAY, -$pay_amount, '外卖钱包支付',$order_id);
            }
            //修改订单状态为已发货,添加支付时间
            $time=time();
            $result=$order_obj->editOrderInfo($order_id,array('order_status'=>1,'payway'=>'walletpay','pay_time'=>$time));
            if($type=='in_store') {
                commission($order_id, 1);
            }
            if($result){
                $return_data=array(
                    'code'=>1,
                    'msg'=>'购买成功!'
                );
            }else{
                $return_data=array(
                    'code'=>-1,
                    'msg'=>'购买失败!'
                );
            }
        }else{
            $return_data=array(
                'code'=>-1,
                'msg'=>'密码错误'
            );
        }
        echo json_encode($return_data);
        exit;
    }

//    function check_remittance(){
//        $remittance_obj = new RemittanceModel();
//        $payway_obj = new PaywayModel();
//        $start_time = time();
//        $end_time = time() + 60;
//        echo $start_time;
//        $remittance_list = $remittance_obj->getRemittanceList("","status=0 AND addtime >= ".$start_time." AND addtime <= ".$end_time);
//
//        $bank_obj = new BankModel();
//
//        foreach($remittance_list as $key=>$val){
//            $pay_result = $bank_obj->bank_pay_result_search($val['reqnbr']);
//            if ($pay_result['INFO']['RETCOD'] != 0 || isset($pay_result['NTEBPINFZ']['RJCRSN']))
//            {
//               //重新打款
//                $payway_obj->pay_to_bank($val['bank_card_id'],$val['pay_amount'],$val['order_id']);
//            }else{
//                //不处理
//            }
//        }
//    }

}
