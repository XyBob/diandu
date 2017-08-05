<?php

class FrontUserCenterAction extends FrontAction
{
    function _initialize()
    {
        if (ACTION_NAME != 'bind_mobile' && ACTION_NAME != 'send_vcode') {
            parent::_initialize();
        }
        //判断是否是微信
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
            $is_wechat = 1;
        } else {
            $is_wechat = 0;
        }
        $this->assign('is_wechat', $is_wechat);

        $this->page_num = 2;
        $this->assign('nav', 'me');
    }


    //个人中心
    public function person_center()
    {

        $user_id = intval(session('user_id'));
        if (isset($_GET['user_id'])) {
            //session('user_id', $_GET['user_id']);
            $user_id = $_GET['user_id'];
        }
        $user_obj = new UserModel();
        $user_info = $user_obj->getUserInfo('', 'user_id = ' . $user_id);
        log_file('person_center'. $user_obj->getLastSql(),'usercenter');
        //if ($user_info['is_merchant']) {
        $business_obj = new BusinessModel();
        $business_info = $business_obj->where('user_id="' . session('user_id') . '"')->find();
        $user_info['business_status'] = $business_info['status'];
        // $total = M('order')->field('sum(pay_amount) as total')->where('user_id = '.$user_id)->select();
        //}
        $user_voucher_obj=new UserVouchersModel();
        $time=time();
        $voucher_num=$user_voucher_obj->getUserVouchersNum('user_id = '.$user_id.' and isuse=1 AND '.$time.' > start_time AND '.$time.'
         < end_time');

        $total = M('order')->field('sum(pay_amount) as total')->where('order_status=1 AND user_id = ' . $user_id)->select();

        $user_info['total_money'] = $total[0]['total'];
        //判断用户是否有银行卡
        $user_id = session('user_id');
        $bank_card_obj = new BankCardModel();
        $bank_card_info = $bank_card_obj->getBankCardInfo('user_id = ' . $user_id);
        if (!$bank_card_info) {
            $this->assign('is_bind_card', 0);
        } else {
            $this->assign('is_bind_card', 1);
        }
        if($user_info['mobile']==''){
            $this->assign('is_mobile', 0);
        } else {
            $this->assign('is_mobile', 1);
        }
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
            $is_wechat = 1;
        } else {
            $is_wechat = 0;
        }
        $this->assign('is_wechat',$is_wechat);
        $this->assign('voucher_num',$voucher_num?$voucher_num:0);
        $this->assign('user_info', $user_info);
        $this->assign('head_title', '我的');
        $this->display();
    }

    //绑定银行卡
    public function bind_bank_card()
    {
        $from = $this->_get('origin');//这个参数判断绑定成功之后返回的路径
        if (IS_POST) {
            $data = $this->_post();
            $from = $data['from'];
            unset($data['from']);
            $data['user_id'] = session('user_id');
            $bank_card_obj = new BankCardModel();
            $num = $bank_card_obj->getBankCardNum('user_id = ' . session('user_id') . ' and is_merchant = 0');
            if ($num) {
                $this->send_to_ajax(-1, '目前只能绑定一张银行卡');
            }

            $data['bind_time'] = time();
            $result = $bank_card_obj->addBankCard($data);
            if ($result) {
                $this->send_to_ajax(1, '绑定成功', $from);
            } else {
                $this->send_to_ajax(-1, '绑定失败');
            }
        }
        $bank_obj = new BankModel();
        $bank_list = $bank_obj->getBankList();
        $this->assign('from', $from);
        $this->assign('bank_list', $bank_list);
        $this->assign('head_title', '绑定银行卡');
        $this->display('bind_bank_card');
    }

    //个人资料
    function personal_data()
    {
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel();
        $user_info = $user_obj->getUserInfo('', 'user_id = ' . $user_id);
        if (!$user_info['username']) {
            $url = '/Index/phone_check';
            redirect($url);
            exit;
        }
        if (IS_POST) {
            $data = $this->_post();
//            $data['birthday'] = strtotime($data['birthday']);
            if (!$data['nickname'] || !$data['nickname'] || !$data['realname']) {
                $this->send_to_ajax(-1, '请您输入完整信息');
            }

            $user_obj = new UserModel($user_id);
            $user_obj->setUserInfo($data);
            $result = $user_obj->saveUserInfo();
            //echo $user_obj->getLastSql();
            /* $result=M('users')->where('user_id = '.$user_id)->save($data);*/

            if ($result !== false) {
                $this->send_to_ajax(1, '保存成功');
            } else {

                $this->send_to_ajax(-1, '保存失败');
            }
        }
        $user_info['birthday'] = date('Y-m-d', $user_info['birthday']);
        $this->assign('user_info', $user_info);
        $this->assign('head_title', '个人资料');
        $this->display();
    }


    //系统设置
    public function set_up()
    {

        $this->assign('head_title', '系统设置');
        $this->display();
    }


    //修改头像
    public function upload_headimg()
    {
        $user_id = intval(session('user_id'));
        $r = uploadImage($_FILES['upfile'], '/user_file/' . $user_id);
        if (!is_array($r)) {
            $user_obj = new UserModel($user_id);
            $user_obj->setUserInfo(array('headimgurl' => $r));
            if ($user_obj->saveUserInfo()) {
                $this->ajaxReturn(['status' => 1, 'img_url' => $r]);
            }
        }
        $this->ajaxReturn($r);
    }

    //我推荐的客户
    function my_recom_person()
    {
        $user_id = session('user_id');
        $user_obj = new UserModel();
        $where = 'first_agent_id = ' . $user_id;

        //分页
        $total = $user_obj->getUserNum($where);
        $firstRow = intval($this->_request('firstRow'));
        $user_obj->setStart($firstRow);
        $user_obj->setLimit($this->page_num);
        $my_recom_person_list = $user_obj->getUserList('', $where, '', '', 'reg_time desc');

        $this->assign('total', $total);
        $this->assign('firstRow', $this->page_num);
        $this->assign('my_recom_person_list', $my_recom_person_list);
        $this->assign('head_title', '我推荐的客户');
        $this->display();
    }

    //我推荐的个人下拉
    function load_my_recom_person()
    {
        $firstRow = $this->_post('firstRow');
        $user_id = session('user_id');
        $user_obj = new UserModel();
        $where = 'first_agent_id = ' . $user_id;

        $user_obj->setStart($firstRow);
        $user_obj->setLimit($this->page_num);
        $my_recom_person_list = $user_obj->getUserList('', $where, '', '', 'reg_time desc');
        foreach ($my_recom_person_list as $k => $v) {
            $my_recom_person_list[$k]['reg_time'] = date('Y-m-d', $my_recom_person_list[$k]['reg_time']);
        }
        echo json_encode($my_recom_person_list);
        exit;
    }

    //我推荐的店铺
    function my_recom_shop()
    {
        $user_id = session('user_id');
        $user_obj = new UserModel();
        $where = 'second_agent_id = ' . $user_id . ' AND is_merchant=1';
        //分页
        $total = $user_obj->getUserNum($where);
        $firstRow = intval($this->_request('firstRow'));
      /*  $user_obj->setStart($firstRow);
        $user_obj->setLimit($this->page_num);*/

        $my_recom_shop_user_list = $user_obj->getUserList('user_id', $where, 'reg_time');//我推荐店铺的user_id
       // echo json_encode($my_recom_shop_user_list);exit;

        if ($my_recom_shop_user_list) {
            foreach ($my_recom_shop_user_list as $k => $v) {
                $my_recom_shop_user_id[] = $v['user_id'];
            }
            $ids = implode(',', $my_recom_shop_user_id);

            $business_obj = new BusinessModel();
            $business_list = $business_obj->getBusinessList('user_id in (' . $ids . ')');
            // echo json_encode($business_list);exit;
            $order_obj = new OrderModel();
            foreach ($business_list as $k => $v) {//去订单表获取日营业额
                $money_total = $order_obj->field('sum(total_amount) as total')
                    ->where('addtime >' . strtotime(date('Ymd', time())) . ' and addtime<' . strtotime(date('Ymd', strtotime("+1 day"))) . ' and type!=3 and order_status=1 and business_id = ' . $v['business_id'])
                    // ->group('total_amount')
                    ->select();
                $turnover = $money_total[0]['total'] ? $money_total[0]['total'] : 0;//营业额处理
                if ($turnover > 1000) {

                }
                $business_list[$k]['turnover'] = $turnover;
            }
        } else {//说明我推荐的店铺是空
            $my_recom_shop_list = '';
        }
        $this->assign('total', $total);
        $this->assign('firstRow', $this->page_num);
        $this->assign('business_list', $business_list);
        $this->assign('head_title', '我推荐的店铺');
        $this->display();
    }

    //我推荐店铺的下拉
    function load_my_recom_shop()
    {

        $firstRow = $this->_post('firstRow');
        $user_id = session('user_id');
        $user_obj = new UserModel();
        $where = 'second_agent_id = ' . $user_id . ' AND is_merchant=1';
        //分页
        $user_obj->setStart($firstRow);
        $user_obj->setLimit($this->page_num);

        $my_recom_shop_user_list = $user_obj->getUserList('user_id', $where, 'reg_time');//我推荐店铺的user_id
        $order_obj = new OrderModel();
        if ($my_recom_shop_user_list) {
            foreach ($my_recom_shop_user_list as $k => $v) {
                $my_recom_shop_user_id[] = $v['user_id'];
            }
            $ids = implode(',', $my_recom_shop_user_id);
            $business_obj = new BusinessModel();
            $business_list = $business_obj->getBusinessList('user_id in (' . $ids . ')');

            foreach ($business_list as $k => $v) {//去订单表获取日营业额
                $money_total = $order_obj->field('sum(total_amount) as total')
                    ->where('addtime >' . strtotime(date('Ymd', time())) . ' and addtime<' . strtotime(date('Ymd', strtotime("+1 day"))) . ' and business_id = ' . $v['business_id'])
                    ->group('total_amount')
                    ->select();
                $turnover = $money_total[0]['total'] ? $money_total[0]['total'] : 0;//营业额处理
                if ($turnover > 1000) {

                }
                $business_list[$k]['turnover'] = $turnover;
            }

        } else {//说明我推荐的店铺是空
            $business_list = '';
        }
        echo json_encode($business_list);
        exit;
    }

    //消费订单
    function consum_order_list()
    {
        $user_id = session('user_id');
        $order_obj = new OrderModel();

        //分页
        $where = '((type=1 and order_status=1) or (type = 2 and order_status=3))and user_id = ' . $user_id;
        $total = $order_obj->getOrderNum($where);
        $firstRow = intval($this->_request('firstRow'));
        $order_obj->setStart($firstRow);
        $order_obj->setLimit($this->page_num);

        $order_list = $order_obj->getOrderList('', $where, 'addtime desc');
        $business_obj = new BusinessModel();
        foreach ($order_list as $k => $v) {
            $business_info = $business_obj->getBusinessInfo('business_id = ' . $v['business_id']);
            $order_list[$k]['business_name'] = $business_info['business_name'];
            $order_list[$k]['sign_pic'] = $business_info['sign_pic'];
        }
        $this->assign('total', $total);
        $this->assign('firstRow', $this->page_num);
        $this->assign('order_list', $order_list);
        $this->assign('head_title', '我的消费订单');
        $this->display();
    }

    //不同状态订单详情
    public function order_detail(){
        $order_id = 12;//订单id
        $obj_order = new OrderModel();

        //order_info提供了订单页面所需要的基本信息，包括优惠券减以及总价等
        if($order_info = $obj_order->where('order_id='.$order_id)->find()){
            //用户信息
            $user_info = D('Users')->where('user_id='.$order_info['user_id'])->find();
            //查找用户的地址
           // $user_address = D('UserAddress')->where('user_id='.$order_info['user_id'])->find();
            $address_obj=new UserAddressModel();
            $user_address=$address_obj->getUserAddressInfo('user_id='.$order_info['user_id'].' AND isuse=1','');
           //echo D('UserAddress')->getLastSql();

            //获取省市县名称
            $address_province_obj=new AddressProvinceModel();
            $user_address['province']=$address_province_obj->getProvinceName($user_address['province_id']);
            $address_city_obj=new AddressCityModel();
            $user_address['city']=$address_city_obj->getCityName($user_address['city_id']);
            $address_area_obj=new AddressAreaModel();
            $user_address['area']=$address_area_obj->getAreaName($user_address['area_id']);

            echo json_encode($user_address);
           // echo json_encode($order_info);

            $commodity_detail = D('OrderItem')->where('order_id='.$order_id)->select();//商品详情
            //echo D('OrderItem')->getLastSql();
            //echo json_encode($commodity_detail);

            //商品价格
            foreach ($commodity_detail as $v){
                $commodity_price=D('Item')->where('item_id='.$v['item_id'])->find();
                $commodity_detail['0']['commodity_price']=$commodity_price['mall_price'];
                $commodity_detail['0']['commodity_price_sum']=$commodity_price['mall_price']*$v['number'];
            }
           // echo json_encode($commodity_detail);//订单上的商品以及商品数量和价格

        }else{
            $this->alert("no order");
        }

    }
    public function consumer_order_detail(){
        //$order_id =$this->_get('order_id');//订单id
        $order_id=$this->_get('order_id');
        $obj_order = new OrderModel();

        //order_info提供了订单页面所需要的基本信息，包括优惠券减以及总价等
        if($order_info = $obj_order->where('order_id='.$order_id.' AND isuse=1')->find()){
            //订单状态
            $order_info['order_status_name'] = OrderModel::getStateStr($order_info['order_status']);
            //支付方式名称
            $payway_obj = new PaywayModel();
            $payway_info = $payway_obj->getPaywayInfo('pay_tag = '."'".$order_info['payway']."'", 'pay_name');
            $order_info['payway_name'] = $payway_info['pay_name'];
            //用户信息
            $user_obj=new UserModel(session('user_id'));
            $user_info=$user_obj->getUserInfo('nickname,username','');
            //商家信息
            $business_obj=new BusinessModel();
            $business_info=$business_obj->getBusinessInfo('business_id='.$order_info['business_id'],'');
            //餐盒费
          /*  $shop_obj=new ShoppingCartModel();
            $box_count=$shop_obj->getShopingListCount($business_info['business_id'],session('user_id'));*/
            $box_fee=$order_info['box_fee'];//餐盒费
            //查找用户的地址
            $address_obj=new UserAddressModel();
            $user_address=$address_obj->getUserAddressInfo('user_address_id='.$order_info['user_address_id'],'');

            //获取省市县名称
            $user_address['address'] = AreaModel::getAreaString($user_address['province_id'], $user_address['city_id'], $user_address['area_id']) . ' ' . $user_address['address'];
            $user_address['address'] = str_replace(';','',$user_address['address']);
            $orderitem_obj=new OrderItemModel($order_id);
            $commodity_detail = $orderitem_obj->getOrderItemList();//订单商品列表
            $item_obj=new ItemModel();
            $item_sku_price=new ItemSkuModel();
            $property_value_obj=new PropertyValueModel();
            //商品价格
            foreach ($commodity_detail as $k=>$v){
                if($v['item_sku_price_id']!=0){
                    $commodity_price=$item_sku_price->getSkuInfo($v['item_sku_price_id'],'sku_price');
                    $commodity_detail[$k]['commodity_price']=$commodity_price['sku_price'];
                    $commodity_detail[$k]['commodity_price_sum']=$commodity_price['sku_price']*$v['number'];
                    //获取sku属性
                    $property=$item_sku_price->getSkuInfo($v['item_sku_price_id'],'');
                    $property_value_one=$property_value_obj->getPropertyValue($property['property_value1'],'property_value');
                    $property_value_two=$property_value_obj->getPropertyValue($property['property_value2'],'property_value');
                    $commodity_detail[$k]['property_value_one']=$property_value_one['property_value'];
                    $commodity_detail[$k]['property_value_two']=$property_value_two['property_value'];

                }else{
//                    echo $item_obj->getLastSql();
//                    die();
                    $commodity_price=$item_obj->getWholesalePrice($v['item_id']);
                    $commodity_pic=$item_obj->getItemInfo('item_id = '.$v['item_id'],'base_pic');
                   // echo $item_obj->getLastSql();
                    $commodity_detail[$k]['base_pic']=$commodity_pic['base_pic'];
//                    echo json_encode($commodity_price);
//                    die();
                    $commodity_detail[$k]['commodity_price']=$commodity_price;
                    $commodity_detail[$k]['commodity_price_sum']=$commodity_price*$v['number'];
                }
            }
            $this->assign('box_fee',$box_fee);
            $this->assign('business_info',$business_info);
            $this->assign('user_info',$user_info);
            $this->assign('order_info',$order_info);
            $this->assign('user_address',$user_address);
            $this->assign('commodity_detail',$commodity_detail);
            $this->assign('head_title','订单详情');


        }else{
            $this->alert("找不到该订单",U('/index'));
        }
        $this->display();

    }


    //消费订单的下拉
    public function load_consum_order()
    {
        $firstRow = $this->_post('firstRow');
        $user_id = session('user_id');

        $order_obj = new OrderModel();
        $where = '((type=1 and order_status=1) or (type = 2 and order_status=3))and user_id = ' . $user_id;

        //分页
        $order_obj->setStart($firstRow);
        $order_obj->setLimit($this->page_num);
        $order_list = $order_obj->getOrderList('', $where, 'addtime desc');
        $business_obj = new BusinessModel();
        foreach ($order_list as $k => $v) {
            $business_info = $business_obj->getBusinessInfo('business_id = ' . $v['business_id']);
            $order_list[$k]['business_name'] = $business_info['business_name'];
            $order_list[$k]['sign_pic'] = $business_info['sign_pic'];
            $order_list[$k]['ymd'] = date('Y-m-d', $order_list[$k]['addtime']);
            $order_list[$k]['his'] = date('H:i:s', $order_list[$k]['addtime']);
        }
        echo json_encode($order_list);
        exit;
    }
    public function evaluation(){
        $order_id=$this->_get('order_id');
        $order_obj=new OrderModel();
        $order_info=$order_obj->getOrderByInfo('','order_id = '.$order_id);
        //销量
        $sales=$order_obj->getOrderNum('business_id = '.$order_info['business_id'].' AND order_status = 3');
//        echo $sales;
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('business_id = '.$order_info['business_id']);
        //echo $business_obj->getLastSql();
//        echo json_encode($business_info);
//        die();
        $this->assign('business_info',$business_info);
        $this->assign('order_info',$order_info);
        $this->assign('sales',$sales);
        //$business_id=$order_info['business_id'];
        $this->assign('head_title','评价订单');
        $this->display();
    }
    //评价订单
    public function evaluation_order()
    {
        $data['user_id'] = intval(session('user_id'));
        $data['order_id'] = $this->_post('order_id');
        $data['score']=$this->_post('score');
        $data['addtime'] = time();
        $order_obj=new OrderModel();
        $order_info=$order_obj->getOrderByInfo('business_id,is_evaluate','order_id = '.$data['order_id']);
        if($order_info['is_evaluate']==0) {
            $data['business_id'] = $order_info['business_id'];
            $obj_evaluation = D('Evaluation');
            //评价成功后先修改订单表中的状态，暂定是order_status=10是已经评价
            //然后从表business中取出评价的总分数，以及star
            //之后进行计算最后更新数据
            if ($obj_evaluation->add($data)) {
                $obj_order = new OrderModel();
                $data_evaluate['is_evaluate']=1;
                $obj_order->where('order_id=' . $data['order_id'])->save($data_evaluate);
                //echo $obj_order->getLastSql();
                $obj_business = new BusinessModel();
                $score = $obj_evaluation->where('business_id = '.$data['business_id'])->sum('score');//总的评价分
                $num_order = $obj_evaluation->where('business_id=' .$data['business_id'])->count();//评价次数
                //echo $obj_evaluation->getLastSql();
                //$score+=$data['score'];
                $star = $score / $num_order;//获取新的star
                $star=round($star,1);
                $business_info['star'] = $star;
                $obj_business->setBusiness($data['business_id'], $business_info);//将数据更新到表中
                echo "success";
            } else {
                echo "failed";
            }
        }else{
            echo "evaluated";
        }
    }

//我的账户
    function my_account()
    {
        $user_id = session('user_id');
      //  $user_obj = new UserModel();
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id='.$user_id);
       /* $user_info = $user_obj->getUserInfo('left_money', 'user_id = ' . $user_id);
        $left_money = $user_info['left_money'];*/
        $this->assign('left_money', $business_info['business_left_money']);
        $this->assign('head_title', '我的商家账户');
        $this->display();
    }

    //我的银行卡
    function my_bank_card()
    {
        $user_id = session('user_id');
        $bank_card_obj = new BankCardModel();
        $bank_card_info = $bank_card_obj->getBankCardInfo('user_id = ' . $user_id);
        $this->assign('head_title', '我的银行卡');
        if ($bank_card_info) {
            $bank_obj = new BankModel();
            $bank_info = $bank_obj->getBankInfo('bank_id = ' . $bank_card_info['bank_id']);
            $bank_card_info['bank_name'] = $bank_info['bank_name'];
            $bank_card_info['last_number'] = substr($bank_card_info['account'], -4);
            $this->assign('bank_card_info', $bank_card_info);
            $this->display('my_bank_card');
        } else {
            $this->display('my_bank_card_no');
        }
    }

    //用户修改银行卡
    function modify_card()
    {
        if (IS_POST) {
            $bank_card_obj = new BankCardModel();
            $r = $bank_card_obj->where("user_id='" . session("user_id") . "'")->save($_POST);
            //exit($bank_card_obj->getLastSql());
            if ($r !== false) {
                exit("success");
            }
            exit("failure");
        } else {
            $bank_card_obj = new BankCardModel();
            $bank_card = $bank_card_obj->getBankCardInfo("user_id='" . session("user_id") . "'");
            if ($bank_card) {
                $bank_obj = new BankModel();
                $this->assign("bank_card", $bank_card);
                $bank = $bank_obj->getBankInfo("bank_id='" . $bank_card['bank_id'] . "'");
                $bank_list = $bank_obj->getBankList();
                $this->assign("bank_name", $bank['bank_name']);
                $this->assign("bank_list", $bank_list);
            }
        }
        $this->assign('head_title', '修改我的银行卡');
        $this->display();
    }

    //增加银行卡(点提现,未绑定银行卡时)
    function add_card()
    {
        $this->bind_bank_card();
        //  $this->display();
    }

    //提现(展示页面)
    function withdrawal()
    {
        $user_id = session('user_id');
        $bank_card_obj = new BankCardModel();
        $bank_card_info = $bank_card_obj->getBankCardInfo('user_id = ' . $user_id);
        $user_id = session('user_id');
        //  $user_obj = new UserModel();
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id='.$user_id);
        $this->assign('money',$business_info['business_left_money']);
        $this->assign('head_title', '提现');
        if ($bank_card_info) {
            $bank_name = D('bank')->where('bank_id=' . $bank_card_info['bank_id'])->field('bank_name')->find();
            $this->assign('bank_name', $bank_name['bank_name']);
            $this->display('withdrawal_normal');
        } else {
            $this->display('withdrawal_need_bind');
        }
    }

    //申请提现,将申请记录插入表,现改为直接提现
    function order_withdrawal()
    {
        if(!$this->during_withdraw()){
            $this->send_to_ajax(-1, '当前不是提现时间哦!');
        }
        $money = $this->_post('money');
        $user_id = session('user_id');
        if (!$user_id) {
            $this->send_to_ajax(-1, '请您先登录');
        }
        $redis = new Redis();
        $redis->connect(C('REDIS_HOST'),C('REDIS_PORT'));
        if($redis->get('account_lock_'.$user_id)){
            $this->send_to_ajax(-1, '请稍后在操作!');
        }else{
            $redis->set('account_lock_'.$user_id,1,2);
        }
        $bank_card_obj = new BankCardModel();
        $bank_card_info = $bank_card_obj->getBankCardInfo("user_id=" . $user_id);

        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id = '.$user_id);

        if($business_info['business_left_money']<$money){
            $this->send_to_ajax(-1, '您的余额不足');
        }


        $ms_pay_obj=new MsPayModel();
        $result=$ms_pay_obj->withdrawals($user_id,$money);
        log_file('提现方法返回:'.json_encode($result),'withdrawals');
        if($result['code']==1){
            $arr = array(
                'deposit_type' => 1,
                'bank_card_id' => $bank_card_info['bank_card_id'],
                'money' => $money,
                'state' => 1,
                'user_id' => $user_id,
                'role_type'=>2,
            );
        }else{
            $arr = array(
                'deposit_type' => 1,
                'bank_card_id' => $bank_card_info['bank_card_id'],
                'money' => $money,
                'state' => 0,
                'admin_remark'=>$result['msg'],
                'user_id' => $user_id,
                'role_type'=>2,
            );
        }
        $deposit_apply_obj = new DepositApplyModel();
        $result = $deposit_apply_obj->addDepositApply($arr);
        if($arr['state']==0){
            $this->send_to_ajax(-1, '提现失败，已移交工作人员处理');
        }
        if ($result == -2) {
            $this->send_to_ajax(-1, '您的余额不足');
        } elseif ($result) {
            $this->send_to_ajax(1, '提现成功');
        } else {
            $this->send_to_ajax(-1, '申请提现失败');
        }
        //log_file('提现金额'.$money,'withdrawal');

        //log_file('变动前金额'.$business_info['business_left_money'],'withdrawal');
       // log_file('变动后金额'.($business_info['business_left_money']-$money),'withdrawal');
      //  $left_money=$business_info['business_left_money']-$money;
     /*   $freeze_money=$business_info['freeze_money']+$money;
        $business_obj->editBusiness($business_info['business_id'],array('freeze_money'=>$freeze_money));*/
     //   log_file('sql:'.$business_obj->getLastSql(),'withdrawal');
     /*   $arr = array(
            'deposit_type' => 1,
            'bank_card_id' => $bank_card_info['bank_card_id'],
            'money' => $money,
            'state' => 0,
            'user_id' => $user_id,
            'role_type'=>2,
        );
        $deposit_apply_obj = new DepositApplyModel();
        $result = $deposit_apply_obj->addDepositApply($arr);
        if ($result == -2) {
            $this->send_to_ajax(-1, '您的余额不足');
        } elseif ($result) {
            $this->send_to_ajax(1, '');
        } else {
            $this->send_to_ajax(-1, '申请提现失败');
        }*/

    }

    //提现记录
    function withdrawal_records()
    {
        $user_id = session('user_id');
        $account_obj = new AccountModel();

        $where = 'user_id = ' . $user_id . ' and (change_type = ' . AccountModel::DEPOSIT_APPLY . ' or change_type = ' . AccountModel::REFUSE_DEPOSIT . ')';

        //分页
        $total = $account_obj->getAccountNum($where);
        $firstRow = intval($this->_request('firstRow'));
        $account_obj->setStart($firstRow);
        $account_obj->setLimit($this->page_num);

        if (IS_POST) {
            $account_list = $account_obj->getAccountList('', $where, 'addtime desc');
            foreach ($account_list as $k => $v) {
                $account_list[$k]['addtime'] = date('Y-m-d  H:i:s', $v['addtime']);
                $account_list[$k]['change_money'] = $v['amount_in'] != '0.00' ? '+' . $v['amount_in'] : '-' . $v['amount_out'];
                $account_list[$k]['change_type'] = $v['change_type'] = AccountModel::DEPOSIT_APPLY ? '申请提现' : '提现拒绝';
                $account_list[$k]['remark'] = $v['remark'] ? $v['remark'] : '--';
            }
            echo json_encode($account_list);
            exit;
        }

        $account_list = $account_obj->getAccountList('', $where, 'addtime desc');
        /*echo json_encode($account_list);
        exit;*/
        $this->assign('total', $total);
        $this->assign('firstRow', $this->page_num);
        $this->assign('account_list', $account_list);
        $this->assign('head_title', '提现记录');
        $this->display();
    }

    //账户明细
    function account_list()
    {
        $user_id = session('user_id');
        $account_obj = new AccountModel();
        $where = 'user_id = ' . $user_id;

        //分页
        $total = $account_obj->getAccountNum($where);
        $firstRow = intval($this->_request('firstRow'));
        $account_obj->setStart($firstRow);
        $account_obj->setLimit($this->page_num);

        $account_list = $account_obj->getAccountList('', $where, 'addtime desc');
        if (IS_POST) {
            //变成前台能直接用的数据
            if ($account_list) {
                foreach ($account_list as $k => $v) {
                    $account_list[$k]['addtime'] = date('Y-m-d  H:i:s');
                    $account_list[$k]['change_money'] = $v['amount_in'] != '0.00' ? '+' . $v['amount_in'] : '-' . $v['amount_out'];
                    $account_list[$k]['change_type'] = AccountModel::convertChangeType($v['change_type']);
                    $account_list[$k]['remark'] = $v['remark'] ? $v['remark'] : '--';
                }
            }
            echo json_encode($account_list);
            exit;
        }

        //变成前台能直接用的数据
        if ($account_list) {
            foreach ($account_list as $k => $v) {
                $account_list[$k]['addtime'] = date('Y-m-d  H:i:s', $v['addtime']);
                $account_list[$k]['change_money'] = $v['amount_in'] != '0.00' ? '+' . $v['amount_in'] : '-' . $v['amount_out'];
                $account_list[$k]['change_type'] = AccountModel::convertChangeType($v['change_type']);
                $account_list[$k]['remark'] = $v['remark'] ? $v['remark'] : '--';
            }
        }
       // echo json_encode($account_list);exit;
        $this->assign('total', $total);
        $this->assign('firstRow', $this->page_num);
        $this->assign('account_list', $account_list);
        $this->assign('head_title', '账户明细');
        $this->display();
    }

    //我的二维码
    function my_qr_code()
    {
        // $user_id=session('user_id');
        $user_id = $this->_get('user_id');
        $user_obj = new UserModel();
        $user_info = $user_obj->getUserInfo('qr_code,nickname,headimgurl,qr_code_expire_time', 'user_id = ' . $user_id);

        $this->assign('user_info', $user_info);
        $this->assign('head_title', '我的二维码');
        $this->display();
    }

    //成为商家时提示用户商家后台登陆密码
    public function confirm_password(){
        $password=$this->_post('password');
        $user_id=session('user_id');
        $user_obj  = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo('user_id', 'user_id = ' . $user_id . ' AND password = "' . MD5($password) . '"');
        if (!$user_info) {
            echo "failed";
        }else{
            echo "success";
        }

    }

    //验证手机号
    public function bind_mobile()
    {
//        var_dump("123");
//        exit();
        $user_id = intval(session('user_id'));
        if ($user_id != 0) {
            $user_obj = new UserModel($user_id);
            //$user_info = $user_obj->getUserInfo('mobile, mobile_registered', 'role_type = 3 AND user_id = ' . $user_id);
            //$this->assign('mobile', $user_info['mobile']);
        } else {
            exit('对不起，user_id获取失败');
        }

        $mobile = $this->_post('mobile');
        $verify_code = $this->_post('vcode');
        $passoword = md5($this->_post('password'));

        //验证手机号和验证码合法性
        $verify_code_obj = new VerifyCodeModel();
        if (!$verify_code_obj->checkVerifyCodeValid($verify_code, $mobile)) {
            exit('对不起，验证码无效');
        }

        //查看当前手机号是否已绑定
        #$num = $user_obj->getUserNum('mobile = "' . $mobile . '"');
        $user_obj2 = new UserModel();
        $user_info = $user_obj2->getUserInfo('user_id, username', 'username = "' . $mobile . '"');
        if ($user_info) {
            exit('抱歉，手机号已注册');
//            //手机号已在APP注册，将微信注册信息覆盖到已注册的手机账户上
//            $success = $user_obj2->bindWeixinMobile($user_id, $user_info['user_id']);
//            if ($success) {
//
//                //D('MemberCard')->createNewMemberForERPSystemByUserID($user_info['user_id']);
//
//                session('user_id', $user_info['user_id']);
//                exit('success');
//            } else {
//                exit('抱歉，系统错误，绑定失败');
//            }
        } else {
            //绑定手机号
            $arr = array(
                'username' => $mobile,
                'password' => $passoword,
                'mobile' => $mobile
            );

            $user_obj->setUserInfo($arr);
            $success = $user_obj->saveUserInfo();
            log_file('sql = ' . $user_obj->getLastSql(), 'bind_mobile', true);
            if ($success) {
                //D('MemberCard')->createNewMemberForERPSystemByUserID($user_id);
                //$url = U('/FrontUser/personal_data');
                exit('success');
            } else {
                exit('抱歉，系统错误，绑定失败');
            }
        }
    }

    public function change_password(){
        $this->assign('head_title','修改密码');
        $this->display();
    }

    //修改密码
    public function change_user_password(){
        $user_id = intval(session('user_id'));
        if ($user_id != 0) {
            $user_obj = new UserModel($user_id);
        } else {
            exit('对不起，user_id获取失败');
        }

        $mobile = $this->_post('mobile');
        $verify_code = $this->_post('vcode');
        $password = md5($this->_post('password'));

        //验证手机号和验证码合法性
        $verify_code_obj = new VerifyCodeModel();
        if (!$verify_code_obj->checkVerifyCodeValid($verify_code, $mobile)) {
            exit('对不起，验证码无效');
        }
        else{
            $arr = array(
                'password' => $password,
            );

            $user_obj->setUserInfo($arr);
            $success = $user_obj->saveUserInfo();
            if ($success) {
                exit('success');
            } else {
                exit('抱歉，系统错误，修改失败');
            }
        }
    }

    public function get_vouchers(){
        $vouchers_id=$this->_post('vouchers_id');
        $vouchers_obj=new VouchersModel();
        $fields='vouchers_id,merchant_id,start_time,end_time,num,amount_limit,province_id,city_id,area_id,title,scope';
        $vouchers_info=$vouchers_obj->getVouchersInfo('vouchers_id = '.$vouchers_id,$fields);
        if($order=$this->_post('order_id')){
            $vouchers_info['from_order_id']=$order;
        }
        $vouchers_info['user_id']=session('user_id');
        $user_vouchers_obj=new UserVouchersModel();
        $result_voucher=$user_vouchers_obj->addUserVouchers($vouchers_info);
        if($result_voucher)
        {
            $return_data=array(
                'code'=>$result_voucher,
                'msg'=>'已领取!'
            );
            echo json_encode($return_data);exit;
            //echo "success";
        }else{
            $return_data=array(
                'code'=>-1,
                'msg'=>'领取失败!'
            );
            echo json_encode($return_data);exit;
            //echo "failed";
        }
    }

    //获取分享优惠券
    public function get_share_vouchers(){
        $user_id=session('user_id');
        $vouchers_obj=new VouchersModel();
        $time=time();
        $where="vouchers_id >= ((SELECT MAX(vouchers_id) FROM tp_vouchers)-(SELECT MIN(vouchers_id) FROM tp_vouchers)) * RAND() + (SELECT MIN(vouchers_id) FROM tp_vouchers) AND start_time < $time AND end_time > $time";
        $fields='vouchers_id,merchant_id,start_time,end_time,num,amount_limit,province_id,city_id,area_id,title,scope';
        $vouchers_info=$vouchers_obj->getVouchersInfo($where,$fields);
        //echo json_encode($vouchers_info);
        $order_id=$this->_post('order_id');
        $user_voucher_obj=new UserVouchersModel();
        $vouchers_info['from_order_id']=$order_id;
        $vouchers_info['user_id']=$user_id;
        if($user_voucher_obj->getUserVouchersInfo('from_order_id = '.$order_id.' AND user_id = '.$user_id)){
            //echo $user_voucher_obj->getLastSql();
            $vouchers_info['status']='failed';
            echo json_encode($vouchers_info);
            //echo "failed";
        }else{
            //echo $user_voucher_obj->getLastSql();
            $user_voucher_obj->addUserVouchers($vouchers_info);
            $user_voucher_info=$user_voucher_obj->getUserVouchersInfo('from_order_id = '.$order_id.' AND user_id = '.$user_id);
            $vouchers_info['status']='success';
            $vouchers_info['user_voucher_id']=$user_voucher_info['user_vouchers_id'];
            echo json_encode($vouchers_info);
            //echo "success";
        }
       // echo $user_voucher_obj->getLastSql();

    }

    //我的优惠券
    function my_coupons()
    {
        $user_id = session('user_id');
        $user_vouchers_obj = new UserVouchersModel();
        $time=time();
        $where = 'user_id = '.$user_id.' and isuse=1 AND '.$time.' > start_time AND '.$time.'
         < end_time';
        $total = $user_vouchers_obj->getUserVouchersNum($where);
        $firstRow = intval($this->_request('firstRow'));
        $user_vouchers_obj->setStart($firstRow);
        $user_vouchers_obj->setLimit($this->page_num);
        $user_vouchers_list = $user_vouchers_obj->getUserVouchersList('', $where);
        $business_obj = new BusinessModel();
        $user_vouchers_list = $business_obj->getBusinessCouponData($user_vouchers_list);
        if (IS_POST) {
            echo json_encode($user_vouchers_list);
            exit;
        }

        $this->assign('total', $total);
        $this->assign('firstRow', $this->page_num);
        $this->assign('user_vouchers_list', $user_vouchers_list);
        $this->assign('head_title', '我的优惠券');
        $this->display();
    }

    //我的优惠券详情
    function my_coupons_details()
    {
        $user_coupon_id = $this->_get('user_coupon_id');
        $user_vouchers_obj = new UserVouchersModel();
        $user_vouchers_info = $user_vouchers_obj->getUserVouchersInfo('user_vouchers_id =' . $user_coupon_id);

        $vouchers_obj = new VouchersModel();
        $vouchers_info = $vouchers_obj->getVouchersInfo('vouchers_id = ' . $user_vouchers_info['vouchers_id']);

        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $vouchers_info['merchant_id']);

        $this->assign('vouchers_info', $vouchers_info);
        $this->assign('business_info', $business_info);
        $this->assign('head_title', '优惠券详情');
        $this->display();
    }

    //提交订单时候增加我的收获地址
    public function add_address(){
        $user_id=session('user_id');
        $realname=$this->_post('realname');
        $mobile=$this->_post('mobile');
        $address=$this->_post('address');
        $address_detail=$this->_post('address_detail');
        $latitude=$this->_post('latitude');
        $longitude=$this->_post('longitude');
        $data['user_id']=$user_id;
        $data['realname']=$realname;
        $data['address']=$address.';'.$address_detail;
        $data['mobile']=$mobile;
        $data['latitude']=$latitude;
        $data['longitude']=$longitude;
        $user_address_obj=new UserAddressModel();

        $result=$user_address_id=$user_address_obj->addUserAddress($data);
       // $result['status']='failed';
        $return_data=array(
            'code'=>1,
            'user_address_id'=>$result
        );
        echo json_encode($return_data);



    }

    //我的收获地址
    function delivery_address()
    {
        $user_address_obj = new UserAddressModel();
        $user_address_list = $user_address_obj->getUserAddressList('', 'user_id = ' . session('user_id'));
        foreach($user_address_list as $k=>$v){
            $user_address_list[$k]['address']=str_replace(";"," ",$v['address']);
        }
        $this->assign('user_address_list', $user_address_list);
        $this->assign('head_title', '我的收获地址');
        $this->display();
    }

  /*  //设置默认收获地址
    function set_default_address()
    {
        $user_address_id = $this->_post('address_id');
        $user_address_obj = new UserAddressModel($user_address_id);
        //先将原来的默认置为0
        $user_address_obj->editUserAddress(array('is_default' => 0), 'user_id = ' . session('user_id'));
        $result = $user_address_obj->editUserAddress(array('is_default' => 1), 'user_address_id = ' . $user_address_id);
        if ($result) {
            echo json_encode(array('code' => 1, 'msg' => ''));
            exit;
        } else {
            echo json_encode(array('code' => -1, 'msg' => ''));
            exit;
            // echo json_encode($user_address_obj->getLastSql());
        }

    }*/

    //删除收获地址
    function del_address()
    {
        $user_address_id = $this->_post('user_address_id');
        $user_address_obj = new UserAddressModel();
        $result = $user_address_obj->delUserAddress($user_address_id);
        if ($result) {
            echo json_encode(array('code' => 1, 'msg' => ''));
            exit;
        } else {
            echo json_encode(array('code' => -1, 'msg' => ''));
            exit;
            // echo json_encode($user_address_obj->getLastSql());
        }
    }

    //编辑我的收获地址
    function edit_goods_address()
    {
        $user_address_id = $this->_get('user_address_id');
        $user_address_obj = new UserAddressModel();
        $user_address_info = $user_address_obj->getUserAddressInfo('user_address_id = ' . $user_address_id);
        $arr=explode(';',$user_address_info['address']);
        $user_address_info['address1']=$arr[0];
        $user_address_info['address2']=$arr[1];

        if (IS_AJAX) {
            $data = $this->_post();
            $user_business_id = $data['user_business_id'];
            $data['address']=$data['detail_address'].';'.$data['address'];
            unset($data['detail_address']);
            unset($data['user_business_id']);
            $result = $user_address_obj->editUserAddress($data, $user_business_id);
            if ($result) {
                //   echo json_encode($user_address_obj->getLastSql());exit;
                echo json_encode(array('code' => 1, 'msg' => ''));
                exit;
            } else {
                // echo json_encode(array('code'=>-1,'msg'=>''));exit;
                echo json_encode($user_address_obj->getLastSql());
                exit;
            }

        }

        $this->assign('user_address_info', $user_address_info);
        $this->assign('head_title', '编辑我的收获地址');
        $this->display();
    }

    //添加新收货地址
    function add_new_goods_address()
    {
        $user_address_obj=new UserAddressModel();

        if (IS_AJAX) {
            $data = $this->_post();
            $data['user_id']=session('user_id');
            $data['address']=$data['detail_address'].';'.$data['address'];
            unset($data['detail_address']);
            $result = $user_address_obj->addUserAddress($data);
            if ($result) {
                echo json_encode(array('code' => 1, 'msg' => ''));
                exit;
            } else {
                echo json_encode($user_address_obj->getLastSql());
                exit;
            }
            }

        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');

        $near_address_arr=get_building_by_lat_and_lon($local_latitude,$local_longitude);
        //echo json_encode($near_address_arr);exit();
        $this->assign('near_address_arr',$near_address_arr[0]);
        $this->assign('local_latitude',$local_latitude);
        $this->assign('local_longitude',$local_longitude);
        $this->assign('head_title', '新建收获地址');
        $this->display();
    }

    //通过省id,获取城市列表
    function get_city()
    {
        $province_id = $this->_post('province_id');
        $city_obj = new CityModel();
        $city_list = $city_obj->getCityList('', 'province_id = ' . $province_id);
        echo json_encode($city_list);
        exit;
    }

    //通过城市id,获取区列表
    function get_area()
    {
        $city_id = $this->_post('city_id');
        $area_obj = new AreaModel();
        $area_list = $area_obj->getAreaList('', 'city_id = ' . $city_id);
        echo json_encode($area_list);
        exit;
    }


    //我的订单页面
    function my_order(){
        $order_obj=new OrderModel();
        $user_id=session('user_id');
        $type=$this->_request('type');
        //外卖订单
        $take_out_where='user_id = '.$user_id.' AND (type = 2 or type = 4) AND isuse = 1';
        $take_out_order_total=$order_obj->getOrderNum($take_out_where);
        $order_obj->setStart($this->_request('TakeOutFirstRow'));
        $order_obj->setLimit($this->page_num);
        $take_out_order_list=$order_obj->getOrderList('',$take_out_where,'addtime desc');
//        echo $order_obj->getLastSql();
//        exit;
        $take_out_order_list=$order_obj->getListData($take_out_order_list);
//        echo json_encode($take_out_order_list);
//        die;
        if($type=='take_out'){//下拉加载的时候用
            echo json_encode($take_out_order_list);
            exit;
        }
        //到店消费订单
        $in_store_where='user_id = '.$user_id.' AND type = 1';
        $in_store_order_total=$order_obj->getOrderNum($in_store_where);
        $order_obj->setStart($this->_request('InStoreFirstRow'));
        $order_obj->setLimit($this->page_num);
        $in_store_order_list=$order_obj->getOrderList('',$in_store_where,'addtime desc');
        $in_store_order_list=$order_obj->getListData($in_store_order_list);
        if($type=='in_store'){
            echo json_encode($in_store_order_list);
            exit;
        }
       /*echo json_encode($take_out_order_list);
        exit;*/
        $this->assign('take_out_order_list',$take_out_order_list);
        $this->assign('in_store_order_list',$in_store_order_list);
        $this->assign('take_out_order_total',$take_out_order_total);
        $this->assign('in_store_order_total',$in_store_order_total);
        $this->assign('TakeOutFirstRow',$this->page_num);
        $this->assign('InStoreFirstRow',$this->page_num);
        $this->assign('head_title','我的订单');
        $this->display();
    }


    function recharge(){
        $this->display();
    }
    //微信钱包充值获取参数
    function get_wallet_recharge_para(){
        $recharge_money=$this->_request('recharge_money');
        $wxpay_obj=new WXPayModel();
        $result=$wxpay_obj->pay_code(0,$recharge_money);
        $this->json_exit($result);
       // $account_obj->addAccount($user_id, AccountModel::ONLINE_VOUCHER, intval($data['total_fee']) / 100, '微信充值', 0, $trade_no);
    }

  /*  //微信钱包充值
    function wallet_recharge(){
        $recharge_money=$this->request('recharge_money');
        $user_id=session('user_id');
        $user_obj=new UserModel();
        if($recharge_money){
            $result=$user_obj->where('user_id ='.$user_id)->setInc('left_money',$recharge_money);
            if($result){
                $account_obj=new AccountModel();
                $account_obj->addAccount($user_id, AccountModel::ONLINE_VOUCHER, $recharge_money, '微信充值');
                $return_data=array(
                    'code'=>1,
                    'msg'=>'充值成功!'
                );
            }else{
                $return_data=array(
                    'code'=>-1,
                    'msg'=>'充值失败!'
                );
            }
            echo json_encode($return_data);
            exit;
        }
    }*/

    //我的消息
    function my_info(){
        $user_id=session('user_id');
        $message_obj = new MessageBaseModel();
        $message_list=$message_obj->getMessageList('(message_type = 1 or reply_user_id='.$user_id.') and isuse=1','addtime desc');

        $this->assign('message_list',$message_list);
        $this->assign('head_title','我的信息');
        $this->display();
    }

    function message_detail(){
        $message_id=$this->_get('message_id');
        $message_obj = new MessageBaseModel();
        $message_info=$message_obj->getMessageInfo('message_id = '.$message_id);
        $this->assign('message_info',$message_info);
        $this->assign('head_title','消息详情');
        $this->display();

    }
    //清空消息
    function clear_message(){
        $user_id=session('user_id');
        $message_obj = new MessageBaseModel();
        $result=$message_obj->where('reply_user_id='.$user_id)->save(array('isuse'=>0));
        if($result){
            $return_data=array(
                'code'=>1,
                'msg'=>0,
            );
        }else{
            $return_data=array(
                'code'=>-1,
                'msg'=>0,
            );
        }
        echo json_encode($return_data);exit;

    }
    function user_withdrawal()
    {
        $user_id = session('user_id');
        $bank_card_obj = new BankCardModel();
        $bank_card_info = $bank_card_obj->getBankCardInfo('user_id = ' . $user_id);
        $user_id = session('user_id');
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo();

        if(IS_POST){
            $money=$this->_post('money');
            if($money<0.01){

            }
            if($user_info['left_money']<$money){
                $return_data=array(
                    'code'=>-1,
                    'msg'=>'',
                );
                echo json_encode($return_data);exit;
            }

            $arr = array(
                'deposit_type' => 1,
                'bank_card_id' => $bank_card_info['bank_card_id'],
                'money' => $money,
                'state' => 0,
                'user_id' => $user_id,
                'role_type'=>1,
            );
            $deposit_apply_obj = new DepositApplyModel();
            $res = $deposit_apply_obj->addDepositApply($arr);

            $account_obj=new AccountModel();
            $result=$account_obj->addaccount($user_id,AccountModel::DEPOSIT_APPLY,-$money,'用户/代理提现');
            if($result&&$res){
                $return_data=array(
                    'code'=>1,
                    'msg'=>'申请提交成功',
                );
            }else{
                $return_data=array(
                    'code'=>-1,
                    'msg'=>'申请提交失败',
                );
            }
            echo json_encode($return_data);exit;
        }



        $this->assign('money',$user_info['left_money']);
        $this->assign('head_title', '提现');

        if ($bank_card_info) {
            $bank_name = D('bank')->where('bank_id=' . $bank_card_info['bank_id'])->field('bank_name')->find();
            $this->assign('bank_name', $bank_name['bank_name']);
            $this->display('user_withdrawal_normal');
        } else {
            $this->display('withdrawal_need_bind');
        }
    }
    //判断当前时间是否是提现时间
    function during_withdraw(){
        $day_of_week = date("w");
        if($day_of_week==1){//周一早上11点~晚上11点
            $start_hour=11;
            $end_hour=23;
        }else{//非周一 早上五点~晚上11点
            $start_hour=5;
            $end_hour=23;
        }
        if(date('H')>=$start_hour&&date('H')<=$end_hour){
            return true;
        }else{
            return false;
        }
    }


}
