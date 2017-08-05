<?php

/**
 * Created by wzh.
 * User: Administrator
 * Date: 2017-04-24
 * Time: 11:48
 */
class FrontMerchantAction extends FrontAction
{
    public $page_num=6;
    //我的店铺
    public function my_store(){
        $user_id=session('user_id');
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id = '.$user_id);
        $today_profit=M('order')->field('sum(total_amount) as today_profit')->where(" ((order_status=1 and type=1 )or (type=2 and order_status=3)) and ".'type!=3 and  addtime >'.strtotime(date('Y-m-d')).' and addtime<'.strtotime(date("Y-m-d",strtotime("+1 day"))).' and business_id ='.$business_info['business_id'])->select();
 //echo json_encode(M('order')->getLastSql());exit;
        $total_profit=M('order')->field('sum(total_amount) as total_profit')->where("((order_status=1 and type=1 )or (type=2 and order_status=3)) and ".'type!=3 and business_id ='.$business_info['business_id'])->select();//把申请成为店铺费用排除
        $business_info['star']=round($business_info['star']);

        //今日收益
        $account_obj=new AccountModel();
        //当天凌晨
        $time=strtotime(date('Y-m-d'));
        $where='user_id = '.$user_id.' and role_type = 2 and addtime > '.$time.' and change_type = 19';
        $today_earn=$account_obj->todayEarnings($where);
        $this->assign('today_earn',$today_earn);
        $this->assign('today_profit',$today_profit[0]['today_profit']);
        $this->assign('total_profit',$total_profit[0]['total_profit']);
        $this->assign('business_info',$business_info);
        $this->assign('head_title','我的店铺');
        $this->display();
    }
    //切换开关店状态
    public function change_open(){
        $is_open=$this->_post('is_open');
        //echo $is_open;
        $arr['is_open']=$is_open;
        $user_id=session('user_id');
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id = '.$user_id,'business_id');
        if($is_open==1){
            $item_obj=new ItemModel();
            $item_list=$item_obj->getItemList('','business_id='.$business_info['business_id']);
            if(!$item_list){
                echo 'no_item';exit;
            }
        }

        $business_obj=new BusinessModel();
        $re=$business_obj->editBusiness($business_info['business_id'],$arr);
        echo $re;
    }

    function gathering_qr_code(){
        $user_id=session('user_id');
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id = '.$user_id);

        $this->assign('business_info',$business_info);
        $this->assign('url',$_SERVER['SERVER_NAME']);
        $this->assign('head_title','收款码');
        $this->display();
    }

    //店铺的订单列表
    function merchant_order(){
        $type=$this->_request('type');
        $order_obj = new OrderModel();
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('user_id='.session('user_id'));
        if($business_info){
            $where = 'tp_order.business_id='.$business_info['business_id']
                .' AND (type='.OrderModel::COMMON_BUSINESS.' or type='
                .OrderModel:: VEGETABLE_MARKET.')';
            $where2 = 'order_status=1 AND business_id='.$business_info['business_id']
                .' AND (type='.OrderModel::IN_BUSINESS.')';
            $total_out = $order_obj->getOrderNum($where);
            $total_in = $order_obj->getOrderNum($where2);
            $order_obj->setStart($this->_request('FirstRow'));
            $order_obj->setLimit($this->page_num);

            //外卖订单列表
            $order_list = $order_obj->getOrderListWithUserInfo('',$where,' addtime DESC ');

            if($type=='take_out'){//下拉加载的时候用
                echo json_encode($order_list);
                exit;
            }

            //到店支付列表
            $order_list_in_busi = $order_obj->getOrderListWithUserInfo('',$where2,' addtime DESC ');
           /*echo json_encode($order_list_in_busi);
            die();*/
            if($type=='in_store'){
                echo json_encode($order_list_in_busi);
                exit;
            }
            //var_dump($order_list_in_busi);
            $this->assign('take_firstrow',$this->page_num);
            $this->assign('take_firstrow',$this->page_num);
            //$this->assign('take_total',5);
            $this->assign('order_list',$order_list);
//            echo json_encode($order_list);
//            die();
            $this->assign('order_list_in_busi',$order_list_in_busi);

            $this->assign('total_out',$total_out);
            $this->assign('total_in',$total_in);
        }

        $this->assign('head_title','订单列表');


        $this->display();
    }
    //我的客户列表
    public function my_customer(){
        $page_num=4;
        $user_id=session('user_id');
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id = '.$user_id);
        //查找所有订单
        $firstRow=intval($this->_request('firstRow'));
        /*$order_obj=new OrderModel();
        $where='business_id = '.$business_info['business_id'];

        $total=$order_obj->getOrderNum($where);
        $order_obj->setStart($firstRow);
        $order_obj->setLimit($page_num);
        $customer_list=$order_obj->getOrderListWithUser('addtime,user_id',$where,' addtime DESC ');*/

        //查找所有客户
        $like_obj=new LikeModel();
        $like_obj->setStart($firstRow);
        $like_obj->setLimit($page_num);
        $customer_list=$like_obj->getLikeUserList('business_id = '.$business_info['business_id']);
        //echo json_encode($customer_list);
        //echo $like_obj->getLastSql();
        if(IS_AJAX){
            echo json_encode($customer_list);
            exit;
        }
        $this->assign('customer_list',$customer_list);
        $this->assign('firstRow',$firstRow);
        $this->assign('total',$total);
        $this->assign('firstRow',$page_num);
        $this->assign('head_title',"我的客户");
        $this->display();
    }

    /*todo 店铺资料*/
    public function store_data(){
        $is_edit=$this->_get('is_edit');
        if ($_POST){
            //验证各种
            $user_id = session('user_id');
            //$user_id = 39454;
            $business_obj = new BusinessModel();
            if(!$business_obj->create($_POST)){
                exit($business_obj->getError());
            } else{
                if($user_id){
                    //设置参数
                    $arr = array(
                        "business_name" => $_POST['business_name'],
                        "contacts" => $_POST['contacts'],
                        "industry_id" => $_POST['industry_id'],
                        "contact_number" => $_POST['contact_number'],
                        "business_classify_id" => $_POST['business_classify_id'],
                        //"rate" => $_POST['rate']/100,
                        "consumption" => $_POST['consumption'],
                        "province_id" => $_POST['province_id'],
                        "city_id" => $_POST['city_id'],
                        "area_id" => $_POST['area_id'],
                        "address" => $_POST['address'],
                        "desc" => $_POST['desc'],
                        "sign_pic" => $_POST['sign_pic'],
                        "license_pic" => $_POST['license_pic'],
                        "evn_pic" => $_POST['evn_pic'],
                        "addtime" => time(),
//                        "status" => $_POST['status'],
                        "user_id" => $user_id,
                        "latitude" => $_POST['latitude'],
                        "longitude" => $_POST['longitude'],
                    );

                    $business_res = $business_obj->where("user_id='".$user_id."'")->find();
                    if($business_res){
                        //存在的话，修改
                        $arr['addtime'] = $business_res['addtime'];
                        unset($arr['status']);//如果存在店铺资料，就不更改status属性，直接修改店家资料
                        $r = $business_obj->where("user_id='".$user_id."'")->save($arr);

                    }else{
                        //不存在，新添加
                        $r = $business_obj->add($arr);
                    }
                    if($r!==false){
                        exit("success");
                    }
                    exit("failure");
                }else{
                    $this->error("用户未登录");
                }
            }

        }else{
            //获取省份列表
            $province = M('address_province');
            $city_obj = new CityModel();
            $area_obj = new AreaModel();
            $province_list = $province->field('province_id, province_name')->select();

            $business_classify = new BusinessClassifyModel();
            $business_classify_list = $business_classify->getBusinessClassifyList("","serial");

            $business_industry = new IndustryModel();
            $business_industry_list = $business_industry->getindustryList("","serial");

            $business_obj = new BusinessModel();
            $where = "user_id='".session('user_id')."'";
            $business = $business_obj->getBusinessInfo($where);
            if($business){
                $this->assign('business', $business);
                $evn_pics = explode(",",$business['evn_pic']);
                $this->assign('evn_pics', $evn_pics);
            }

            if($business['province_id']!=0){
                $city_list = $city_obj->getCityList("","province_id='".$business['province_id']."'");
                $this->assign('city_list', $city_list);
            }

            if($business['city_id']!=0){
                $area_list = $area_obj->getAreaList("","city_id='".$business['city_id']."'");
                $this->assign('area_list', $area_list);
            }
            $this->assign('is_edit',$is_edit);
            $this->assign('province_list', $province_list);
            $this->assign('business_classify_list', $business_classify_list);
            $this->assign('business_industry_list', $business_industry_list);
            $this->display();
        }
    }

    /*todo 数据统计*/
    public function data_statistics(){
        //今天0点的时间戳
        $end_time = strtotime(date('Y-m-d', time()))+86400;

        //昨天0点的时间戳
        //$start_time = strtotime(date('Y-m-d', time())) - 86400;
        $start_time = strtotime(date('Y-m-d', time()));
        $date  = date('Y-m-d', $start_time);
        $user_id=intval(session('user_id'));
        //var_dump($date);
        //获取充值统计数据
        $account_obj = new AccountModel();
        $user_obj = new UserModel();
        $recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%H") AS hour, COUNT(*) AS recharge_num, SUM(amount_in) AS total_amount')->where('change_type = 19 AND user_id='.$user_id .' AND  addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('hour')->order('addtime DESC')->select();
        //推广收益
        $recharge_extra_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%H") AS hour, COUNT(*) AS recharge_num, SUM(amount_in) AS total_amount')->where('(change_type = 25 OR change_type = 26) AND user_id='.$user_id .' AND  addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('hour')->order('addtime DESC')->select();
        $order_obj=new OrderModel();
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id = '.$user_id);
        $order_list=$order_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%H") AS hour,count("*") AS total')->where('order_status = 1 and business_id = '.$business_info['business_id'].' AND type=1 AND  addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('hour')->select();
        //echo json_encode($order_list);exit;
        //推荐用户，推荐人数量
        $where = "first_agent_id='".$user_id."' AND  reg_time >= " . $start_time . " AND reg_time <= " . $end_time;
        $where2 = "is_merchant=1 AND second_agent_id='".$user_id."' AND  reg_time >= " . $start_time . " AND reg_time <= " . $end_time;

        $person_num = $user_obj->getUserList("user_id",$where);
        $merchant_num = $user_obj->getUserList("user_id",$where2);
        //var_dump($user_obj->getLastSql());
        $this->assign("person_num",count($person_num));
        $this->assign("merchant_num",count($merchant_num));

        $new_recharge_stat_list = array();
        $new_recharge_extra_list = array();
        $new_order_list = array();
        for ($i = 0; $i <= 24; $i ++)
        {
            $new_recharge_stat_list[$i] = 0;
            $new_recharge_extra_list[$i] = 0;
            $new_order_list[$i]=0;
        }

        //组成数组
        foreach ($recharge_stat_list AS $key => $val)
        {
            $new_recharge_stat_list[intval($val['hour'])] = $val['total_amount'];

        }
        foreach($order_list AS $key=>$val){
            $new_order_list[intval($val['hour'])]=$val['total'];
        }
        /*echo json_encode($new_order_list);
        exit;*/
        //推广收益
        foreach ($recharge_extra_list AS $key => $val)
        {
            $new_recharge_extra_list[intval($val['hour'])] = $val['total_amount'];

        }
        $this->assign('new_order_list',$new_order_list);
        $this->assign('recharge_amount_stat_list', $new_recharge_stat_list);
        //echo json_encode($new_recharge_stat_list);
        $this->assign('recharge_amount_extra_list', $new_recharge_extra_list);


        $new_recharge_stat_list = array();
        for ($i = 0; $i <= 24; $i ++)
        {
            $new_recharge_stat_list[$i] = 0;
        }

        //组成数组
        foreach ($recharge_stat_list AS $key => $val)
        {
            $new_recharge_stat_list[intval($val['hour'])] = $val['recharge_num'];
        }

        $this->assign('recharge_num_stat_list', $new_recharge_stat_list);
        $this->assign('head_title', '日数据统计');
        $this->assign('date', $date);
        $this->display();
    }
    /*todo 财务统计*/
    public function financial_statistics(){
        $year = $this->_post('year');
        $month = $this->_post('month');
        $year = $year ? $year : date('Y');
        $month = $month ? $month : date('m');
        $start_time = 0;
        $end_time = 0;
        $date = '';

        if ($year && $month)
        {
            $this->assign('year', $year);
            $this->assign('month', $month);
            $start_time = mktime(0, 0, 0, $month, 1, $year);
            if ($month == 12)
            {
                $year ++;
                $month = 1;
            }
            else
            {
                $month ++;
            }

            $end_time = mktime(0, 0, 0, $month, 1, $year) - 1;
            $date = $year . '-' . date('m');
        }
        $user_id=intval(session('user_id'));

        //获取充值统计数据
        $account_obj = new AccountModel();
        $user_obj = new UserModel();
        $recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%m") AS day, COUNT(*) AS recharge_num, SUM(amount_in) AS total_amount')->where('change_type = 19  AND user_id='.$user_id .' AND addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('day')->order('addtime DESC')->select();
       // echo json_encode($recharge_stat_list);exit;
        $recharge_extra_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%m") AS day, COUNT(*) AS recharge_num, SUM(amount_in) AS total_amount')->where('(change_type = 25 OR change_type = 26) AND user_id='.$user_id .' AND  addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('day')->order('addtime DESC')->select();


        $order_obj=new OrderModel();
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('user_id = '.$user_id);
        $order_list=$order_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%m") AS day,count("*") AS total')->where('order_status = 1 and business_id = '.$business_info['business_id'].' AND type=1 AND  addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('day')->select();

        //推荐用户，推荐人数量
        $where = "first_agent_id='".$user_id."' AND  reg_time >= " . $start_time . " AND reg_time <= " . $end_time;
        $where2 = "is_merchant=1 AND second_agent_id='".$user_id."' AND  reg_time >= " . $start_time . " AND reg_time <= " . $end_time;
        $person_num = $user_obj->getUserList("user_id",$where);
        $merchant_num = $user_obj->getUserList("user_id",$where2);
        $this->assign("person_num",count($person_num));
        $this->assign("merchant_num",count($merchant_num));


        $new_recharge_stat_list = array();
        $new_recharge_extra_list = array();
        $new_order_list = array();
        for ($i = 0; $i <= 30; $i ++)
        {
            $new_recharge_stat_list[$i] = 0;
            $new_recharge_extra_list[$i] = 0;
            $new_order_list[$i]=0;
        }

        //组成数组
        foreach ($recharge_stat_list AS $key => $val)
        {
            $new_recharge_stat_list[intval($val['day'])] = $val['total_amount'];
        }


        foreach($order_list AS $key=>$val){
            $new_order_list[intval($val['day'])]=$val['total'];
        }


        //推广收益
        foreach ($recharge_extra_list AS $key => $val)
        {
            $new_recharge_extra_list[intval($val['day'])] = $val['total_amount'];

        }

        $this->assign('new_order_list',$new_order_list);
        $this->assign('recharge_amount_stat_list', $new_recharge_stat_list);
        $this->assign('recharge_amount_extra_list', $new_recharge_extra_list);

        $new_recharge_stat_list = array();
        for ($i = 0; $i <= 30; $i ++)
        {
            $new_recharge_stat_list[$i] = 0;
        }


        //组成数组
        foreach ($recharge_stat_list AS $key => $val)
        {
            $new_recharge_stat_list[intval($val['day'])] = $val['recharge_num'];
        }

        $this->assign('recharge_num_stat_list', $new_recharge_stat_list);
        $this->assign('date', $date);
        $this->assign('day_num', date('d', mktime(0,0,0,$month + 1,0,$year)));

        //TITLE中的页面标题
        $this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '月数据统计');
        $this->display();
    }

    //外卖店铺列表
    function take_out_index(){
        //区信息
        $area_id = session('area_id');
        $user_id = session('user_id');
        $area_name = M('address_area')->where(['area_id' => $area_id])->getField('area_name');
        $this->assign('area_name', $area_name);

        $local_latitude = $this->_request('local_latitude');
        $local_longitude = $this->_request('local_longitude');

        if(!$local_latitude){
            $local_latitude = session('local_latitude');
        }
        if(!$local_longitude){
            $local_longitude = session('local_longitude');
        }

        $near_building=get_building_by_lat_and_lon($local_latitude,$local_longitude);//附近建筑
        $user_address_obj=new  UserAddressModel();
        $user_address_list=$user_address_obj->getAddressListByDistance($local_longitude,$local_latitude,'',$user_id);
        //$user_address_list = array_slice($user_address_list, 0, 3);
        foreach($user_address_list as $k=>$v){
            $user_address_list[$k]['address']=str_replace(";"," ",$v['address']);
        }

        $business_obj=new BusinessModel();
        $firstRow=intval($this->_request('firstRow'));
        $take_out_list=$business_obj->getTakeOutListByDistance($local_longitude,$local_latitude,' distance < 1000000000 and is_out = 1 and status=1 and is_open=1',$firstRow,$this->page_num);
        $take_out_list=$business_obj->getTakeOutListData($take_out_list);

        if(IS_AJAX){
            echo json_encode($take_out_list);
            exit;
        }
        $total=$business_obj->getTakeOutNum($local_longitude,$local_latitude,' distance < 100000'.' and is_out = 1 and status=1 and is_open=1');
        $total=$total[0]['count'];

        if(session('left_high_address')){
            $this->assign('area_name',session('left_high_address'));
        }
        $this->assign('local_latitude',$local_latitude);
        $this->assign('local_longitude',$local_longitude);
        $this->assign('user_address_list',$user_address_list);
        $this->assign('near_building',$near_building);
        $this->assign('firstRow',$this->page_num);
        $this->assign('total',$total);
        $this->assign('take_out_list',$take_out_list);
        $this->assign('head_title', '外卖商家列表');
        $this->display();
    }

    //获取附近建筑物(根据关键字)
    function get_building_by_key_words(){
        $key_words=$this->_request('key_words');
        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');
        $adaress_arr=get_city_by_lat_and_lon($local_latitude,$local_longitude);
        $near_building=get_building_by_key_words($key_words,$adaress_arr['city']);
        echo json_encode($near_building);
    }

    //设置外卖的经纬度,获取筛选地址的外卖列表
    function set_take_out_lan_and_lat(){
        $user_check_address_id=$this->_request('user_address_id');
        $latitude=$this->_request('latitude');
        $longitude=$this->_request('longitude');
      /*  session('take_out_local_latitude',$latitude);
        session('take_out_local_longitude',$longitude);*/
        if($user_check_address_id){
            session('user_check_address_id',$user_check_address_id);
        }

        $business_obj=new BusinessModel();
        $firstRow=intval($this->_request('firstRow'));
        $take_out_list=$business_obj->getTakeOutListByDistance($longitude,$latitude,' distance < 1000000000'.' and is_out = 1 and status=1 and is_open=1',$firstRow,$this->page_num);
        $take_out_list=$business_obj->getTakeOutListData($take_out_list);
        $total=$business_obj->getTakeOutNum($longitude,$latitude,' distance < 100000000'.' and is_out = 1 and status=1 and is_open=1');
        $total=$total[0]['count'];

        if(IS_AJAX){
            $return_data=array(
                'code'=>1,
                'data'=>$take_out_list,
                'total'=>$total,
            );
            echo json_encode(/*$business_obj->getLastSql()*/$return_data);
            exit;
        }

    }

    //修改附近菜市场
    function change_near_business(){
        $latitude=$this->_request('latitude');
        $longitude=$this->_request('longitude');
        $user_check_address_id=$this->_request('user_address_id');
        if($user_check_address_id){
            session('user_check_address_id',$user_check_address_id);
        }
        $business_obj=new BusinessModel();
        $vegetable_market_list = $business_obj->getVeMarketListByDistance(
            $longitude,
            $latitude,
            'business_classify_id=25',
            0,
            10
        );
        $vegetable_market_list=$vegetable_market_list[0];
        $vegetable_market_list['distance']=round($vegetable_market_list['distance']/1000,2);
        $return_data=array(
            'code'=>1,
            'data'=>$vegetable_market_list
        );
        echo json_encode($return_data);
        exit;
    }


    //菜市场店铺
    function market_shop(){
        $business_id=$this->_get('business_id');
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('business_id = '.$business_id);
        $this->assign('business_info',$business_info);

        $item_obj=new ItemModel();//商品
        $item_list=$item_obj->getItemList('','business_id = '.$business_id.' and isuse = 1');

        $class_obj=new ClassModel();//分类
        $class_list=$class_obj->getClassList('business_id = '.$business_id.' and isuse=1');

        $vouchers_obj=new VouchersModel();//优惠券
        $vouchers_list=$vouchers_obj->getVouchersList('','merchant_id = '.$business_id.' and start_time <'.time().' and end_time >'.time().' and isuse = 1');

        $shopping_cart_obj=new ShoppingCartModel();//购物车
        $shopping_cart_list=$shopping_cart_obj->getShoppingCartList('','user_id = '.session('user_id').' and merchant_id='.$business_id);

        $item_sku_pirce_obj=new ItemSkuModel();
        foreach($shopping_cart_list as $k=>$v){
            if($v['item_sku_price_id']){
                $sku_stock=$item_sku_pirce_obj->getSkuInfo($v['item_sku_price_id'],'sku_stock');
                $shopping_cart_list[$k]['stock']=$sku_stock['sku_stock'];
            }else{
                $stock=$item_obj->getItemInfo('item_id = '.$v['item_id'],'stock');
                $shopping_cart_list[$k]['stock']=$stock['stock'];
            }
        }

        $like_obj=new LikeModel();//是否收藏
        $where='business_id = '.$business_id.' and user_id = '.session('user_id');
        $like_num=$like_obj->getLikeNum($where);
        //整理数组
        foreach($item_list as $k=>$v){
            if($shopping_cart_list){
                foreach($shopping_cart_list as $value){
                    if(!$v['has_sku']) {//没有sku的情况
                        if ($v['item_id'] == $value['item_id']) {
                            $item_list[$k]['shopping_cart_number'] = $value['number'];
                        }
                    }else{
                        if ($v['item_id'] == $value['item_id']) {
                            $item_list[$k]['shopping_cart_number'] += $value['number'];
                        }
                    }
                }
            }
        }

        foreach($item_list as $key=>$value){
            $handle_item_list[$value['class_id']][]=$value;
        }

        foreach($class_list as $k=>$v){
            $handle_class_list[$v['class_id']]=$v;
            $handle_class_list[$v['class_id']]['item_list']=$handle_item_list[$v['class_id']];

        }


        //购物车总价与总量
        $total_price='';
        $total_number='';
        $item_sku_pirce_obj=new ItemSkuModel();
        foreach($shopping_cart_list as $k=>$v){
            $sku_value=$item_sku_pirce_obj->getSkuValueBySkuId($v['item_sku_price_id']);
            if($sku_value){
                $shopping_cart_list[$k]['sku_value']=implode('  ',$sku_value);
            }
            $total_price+=$v['total_price'];
            $total_number+=$v['number'];
        }
        $this->assign('like_num',$like_num);
        $this->assign('total_price',$total_price);
        $this->assign('total_number',$total_number);
        $this->assign('shopping_cart_list',$shopping_cart_list);
       /* echo json_encode($shopping_cart_list);
        exit;*/
        $this->assign('vouchers_list',$vouchers_list);
        $this->assign('class_list',$handle_class_list);

        $this->assign('head_title', '外卖列表');
        $this->display();
    }

    //菜市场商品详情
    function out_goods_details(){
        $item_id=$this->_get('item_id');
        $item_obj=new ItemModel();
        $item_info=$item_obj->getItemInfo('item_id='.$item_id,'');
        //$item_text=D('ItemPackageTxt')->field('contents')->where('item_id='.$item_id)->find();//商品详细描述
        //echo json_encode($item_info);
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('business_id='.$item_info['business_id'],'start_delivery_fee,delivery_fee,business_name');
        $sku_obj=new ItemSkuModel();
        //$sku_value1=$sku_obj->itemSkuInfo($item_info['item_id'],'');
        $sku_value2=$sku_obj->itemSkuInfo($item_info['item_id'],'');
        $property_obj=new PropertyValueModel();
        foreach ($sku_value2 as $k=>$v){
            $property_v1=$property_obj->getPropertyValue($v['property_value1'],'property_value');
            $sku_value2[$k]['property_v1']=$property_v1['property_value'];
            $property_v2=$property_obj->getPropertyValue($v['property_value2'],'property_value');
            $sku_value2[$k]['property_v2']=$property_v2['property_value'];
        }
        
        //$this->assign('$sku_value1',$sku_value1);
        $this->assign('sku_value2',$sku_value2);
        $this->assign('business_info',$business_info);
        $this->assign('item_info',$item_info);
        $this->assign('head_title','商品详情');
        $this->display();
    }

    //外卖店铺详情
    function take_out_shop(){
        $business_id=$this->_get('business_id');
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('business_id = '.$business_id);
        $this->assign('business_info',$business_info);

        $item_obj=new ItemModel();//商品
        $num=$item_obj->getItemNum('business_id = '.$business_id.' and isuse = 1');
        $item_obj->setLimit($num);
        $item_list=$item_obj->getItemList('','business_id = '.$business_id.' and isuse = 1');
        //echo json_encode($item_list);exit;
        //echo $item_obj->getLastSql();exit;

        $class_obj=new ClassModel();//分类
        $class_list=$class_obj->getClassList('business_id = '.$business_id.' and isuse=1');

        $vouchers_obj=new VouchersModel();//优惠券
        $vouchers_list=$vouchers_obj->getVouchersList('','merchant_id = '.$business_id.' and start_time <'.time().' and end_time >'.time().' and isuse = 1');

        $shopping_cart_obj=new ShoppingCartModel();//购物车
        $shopping_cart_list=$shopping_cart_obj->getShoppingCartList('','user_id = '.session('user_id').' and merchant_id='.$business_id);

        $item_sku_pirce_obj=new ItemSkuModel();
        foreach($shopping_cart_list as $k=>$v){
            if($v['item_sku_price_id']){
                $sku_stock=$item_sku_pirce_obj->getSkuInfo($v['item_sku_price_id'],'sku_stock');
                $shopping_cart_list[$k]['stock']=$sku_stock['sku_stock'];
            }else{
                $stock=$item_obj->getItemInfo('item_id = '.$v['item_id'],'stock');
                $shopping_cart_list[$k]['stock']=$stock['stock'];
            }
        }

        $like_obj=new LikeModel();//是否收藏
        $where='business_id = '.$business_id.' and user_id = '.session('user_id');
        $like_num=$like_obj->getLikeNum($where);
        //整理数组
        foreach($item_list as $k=>$v){
            if($shopping_cart_list){
                foreach($shopping_cart_list as $value){
                    if(!$v['has_sku']) {//没有sku的情况
                        if ($v['item_id'] == $value['item_id']) {
                            $item_list[$k]['shopping_cart_number'] = $value['number'];
                        }
                    }else{
                        if ($v['item_id'] == $value['item_id']) {
                            $item_list[$k]['shopping_cart_number'] += $value['number'];
                        }
                    }
                }
            }
        }

        foreach($item_list as $key=>$value){
            $handle_item_list[$value['class_id']][]=$value;
        }

        foreach($class_list as $k=>$v){
            $handle_class_list[$v['class_id']]=$v;
            $handle_class_list[$v['class_id']]['item_list']=$handle_item_list[$v['class_id']];

        }

        //购物车总价与总量
        $total_price='';
        $total_number='';
        foreach($shopping_cart_list as $k=>$v){
            $sku_value=$item_sku_pirce_obj->getSkuValueBySkuId($v['item_sku_price_id']);
            if($sku_value){
                $shopping_cart_list[$k]['sku_value']=implode('  ',$sku_value);
            }
            $total_price+=$v['total_price'];
            $total_number+=$v['number'];
        }

        //分享代码
        $share_obj = new ShareModel();
        $share=$share_obj->getShareInfo();
        $share_info['pic'] = $business_info['sign_pic'];
        $share_info['head_title']=$business_info['full_name'];
        $share_info['desc']=$business_info['desc'];
        $this->assign('share_info', $share_info);
        $wx_share_link='http://'.$_SERVER['HTTP_HOST'].'/FrontMerchant/take_out_shop/business_id/'.$business_id;
        $this->assign('wx_share_link', $wx_share_link);

		$this->assign('like_num',$like_num);
        $this->assign('total_price',$total_price);
        $this->assign('total_number',$total_number);
        $this->assign('shopping_cart_list',$shopping_cart_list);
       // echo json_encode($shopping_cart_list);exit;
        $this->assign('vouchers_list',$vouchers_list);
        $this->assign('class_list',$handle_class_list);
        $this->assign('head_title',$business_info['business_name']);
        $this->display();
    }

    //购物车商品的加减
    function shopping_cart_add_and_subtract(){
        $item_id=$this->_post('item_id');
        $operation=$this->_post('operation');
        $item_sku_price_id=$this->_post('item_sku_price_id');
        $business_id=$this->_post('business_id');

        $item_obj=new ItemModel();
        $item_info=$item_obj->getItemInfo('item_id = '.$item_id);

        $shopping_cart_obj=new ShoppingCartModel();
        if($operation>0){//购物车加一件
            $result=$shopping_cart_obj->addShoppingCart($item_id,$item_sku_price_id,$item_info,$business_id);
            if($result){
                echo json_encode($result);
                exit;
            }else{
                echo json_encode($shopping_cart_obj->getLastSql());
                exit;
            }

        }elseif($operation<0){//购物车减一件
            $where='item_id = '.$item_id.' and merchant_id = '.$business_id.' and user_id = '.session('user_id');
            if($item_sku_price_id){
                $where.=' AND item_sku_price_id = '.$item_sku_price_id;
            }
            $shopping_cart_info=$shopping_cart_obj->getShoppingCartInfo($where);
            $result=$shopping_cart_obj->deleteShoppingCart($shopping_cart_info['shopping_cart_id']);
            if($result){
                echo json_encode($result);
                exit;
            }else{
                echo json_encode($shopping_cart_obj->getLastSql());
                exit;
            }
        }
    }

    //清空购物车
    function clear_shopping_cart(){
        $business_id=$this->_post('business_id');
        $shopping_cart_obj=new ShoppingCartModel();
        $result=$shopping_cart_obj->clearShoppingCart('user_id = '.session('user_id').' and merchant_id = '.$business_id);
        if($result){
            echo json_encode(array('code'=>1,'msg'=>''));
            exit;
        }else{
            echo json_encode(array('code'=>0,'msg'=>''));
            exit;
        }
    }

    //收藏功能
    function collect(){
        collect($this->_post('business_id'));
    }


    //商品详情
    function item_detail(){
        $item_id=$this->_get('item_id');
        $item_obj=new ItemModel();
        $item_info=$item_obj->getItemInfo('item_id = '.$item_id);
        if($item_info['has_sku']){
            $item_sku_obj=new ItemSkuModel();
            $data=$item_sku_obj->getSkuValue($item_id,$item_info['item_type_id']);
        }

        //统计月销量
        $order_obj=new OrderModel();
        $month_num=$order_obj->getMonthSalesVolume($item_id);
        $this->assign('month_num',$month_num['num']?$month_num['num']:0);

        $shopping_cart_obj=new ShoppingCartModel();//购物车
        $shopping_cart_list=$shopping_cart_obj->getShoppingCartList('','user_id = '.session('user_id').' and merchant_id='.$item_info['business_id']);
        //购物车总价与总量
        $total_price='';
        $total_number='';
        $this_item_num='';//没有sku的情况,显示该商品的数量
        $item_sku_pirce_obj=new ItemSkuModel();
        foreach($shopping_cart_list as $k=>$v){
            $sku_value=$item_sku_pirce_obj->getSkuValueBySkuId($v['item_sku_price_id']);
            if($sku_value){
                $shopping_cart_list[$k]['sku_value']=implode('  ',$sku_value);
            }
            if($v['item_sku_price_id']==0&&$v['item_id']==$item_id) {
                $this_item_num+=$v['number'];
            }
            if($v['item_sku_price_id']){
                $sku_stock=$item_sku_pirce_obj->getSkuInfo($v['item_sku_price_id'],'sku_stock');
                $shopping_cart_list[$k]['stock']=$sku_stock['sku_stock'];
            }else{
                $stock=$item_obj->getItemInfo('item_id = '.$v['item_id'],'stock');
                $shopping_cart_list[$k]['stock']=$stock['stock'];
            }
            $total_price+=$v['total_price'];
            $total_number+=$v['number'];
        }
        $item_txt_obj=new ItemTxtModel();
        $content=$item_txt_obj->getItemTxt($item_id);
        $business_obj=new BusinessModel();//商家信息
        $business_info=$business_obj->getBusinessInfo('business_id = '.$item_info['business_id']);
        $this->assign('total_price',$total_price);
        $this->assign('total_number',$total_number);
        $this->assign('business_info',$business_info);
        $this->assign('shopping_cart_list',$shopping_cart_list);
        $this->assign('this_item_num',$this_item_num);
        $this->assign('content',$content);
        $this->assign('item_info',$item_info);
        $this->assign('sku_data',$data);
        $this->assign('head_title','商品详情');
        $this->display();
    }

    //获取sku库存
    function get_sku_stock(){
        $item_id=$this->_post('item_id');
        $sku1=$this->_post('sku1');
        $sku2=$this->_post('sku2');
        $flag=$this->_post('flag');
        if($flag) {//sku全部选满,只要返回库存信息
            $where = 'item_id = ' . $item_id;
            if ($sku1 && $sku2) {
                $where .= ' and (property_value1 = ' . $sku1 . ' and property_value2 =' . $sku2 . ')or(' . 'property_value2 = ' . $sku1 . ' and property_value1 =' . $sku2 . ')';
            } else {
                if ($sku1) {
                    $where .= ' and property_value1 = ' . $sku1 . ' or ' . 'property_value2 = ' . $sku1;
                }
                if ($sku2) {
                    $where .= ' and property_value1 = ' . $sku2 . ' or' . 'property_value2 = ' . $sku2;
                }
            }
            $item_sku_price_obj = new ItemSkuModel();
            $item_sku_price_info = $item_sku_price_obj->getSkuPriceInfo($where);
            echo json_encode($item_sku_price_info);
            exit;
        }else{//sku未全部选满,要返回另一条sku的信息
            $where='item_id = ' . $item_id;;
            if ($sku1) {
                $where .= ' and sku_stock!=0 and (property_value1 = ' . $sku1 . ' or ' . ' property_value2 = ' . $sku1.')';
            }
            if ($sku2) {
                $where .= ' and sku_stock!=0 and (property_value1 = ' . $sku2 . ' or' . ' property_value2 = ' . $sku2.')';
            }
            $item_sku_price_obj = new ItemSkuModel();
            $item_sku_price_list=$item_sku_price_obj->getSkuPriceList($where);
            if($item_sku_price_list){
                foreach($item_sku_price_list as $k=>$v){
                    if($sku1){
                        $data[]=$v['property_value2'];
                    }else{
                        $data[]=$v['property_value1'];
                    }
                }
            }
          //  echo json_encode($item_sku_price_obj->getLastSql());
           // exit;
            echo json_encode($data);
            exit;

        }
    }

    function submit_order(){
        $business_id=$this->_get('business_id');
        $user_id=session('user_id');
        //echo $business_id;
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('business_id='.$business_id);
        $shop_obj=new ShoppingCartModel();
        $shop_list=$shop_obj->getShoppingCartList('','user_id='.$user_id.' AND merchant_id='.$business_id,'','');
        $sum_price=0;
        foreach ($shop_list as $k=>$v){
            $shop_list[$k]['sum']=$v['mall_price']*$v['number'];
            $sum_price+=$v['mall_price']*$v['number'];
        }
        $breakes['sum']=$sum_price;
        $shop_detail['box_count']=$shop_obj->getShopingListCount($business_id,$user_id);
        $box_fee=$shop_detail['box_count']*$business_info['box_fee'];
        $sum_price+=$box_fee;
         //echo json_encode($shop_detail);

        //订单界面优惠计算
        $time=time();
        $discount_obj=new DiscountMinusModel();
        $discount_shop_list = $discount_obj->getDiscountMinusList('discount_minus_id,num,amount_limit',"merchant_id=$business_id AND isuse='1' AND $time > start_time AND $time
         < end_time ",'amount_limit ASC','');//商家满减
        $discount_platform_list = $discount_obj->getDiscountMinusList('num,amount_limit',"merchant_id='0' AND isuse='1' AND $time > start_time AND $time
         < end_time ",'','');//平台减免
        $user_voucher_obj=new UserVouchersModel();
        $actives_coupons_list=$user_voucher_obj->getUserVouchersList('vouchers_id',"user_id=$user_id AND merchant_id=$business_id AND isuse='1'",'','');//满足条件的优惠券
        $voucher_obj=new VouchersModel();
        foreach ($actives_coupons_list as $k=>$v){
            $actives_coupons_list[$k]=$voucher_obj->getVouchersInfo('vouchers_id='.$v['vouchers_id'],'vouchers_id,num,amount_limit');
        }
        //商店减免计算
        $breakes['shop']=0;
        $breakes['coupon']=0;
        $breakes['platform']=0;
        foreach ($discount_shop_list as $v){
            if($breakes['sum']>=$v['amount_limit']){
                $breakes['shop']=$v['num'];
            }else{
                break;
            }
        }
        foreach ($actives_coupons_list as $v){
            if($breakes['sum']>=$v['amount_limit']){
                $breakes['coupon']=$v['num'];
            }else{
                break;
            }
        }
        foreach ($discount_platform_list as $v){
            if($breakes['sum']>=$v['amount_limit']){
                $breakes['platform']=$v['num'];
            }else{
                break;
            }
        }
        $breakes['sum']=$breakes['shop']+$breakes['coupon']+$breakes['platform'];
        $sum_price=$sum_price-$breakes['sum'];
        $sum_price+=$business_info['delivery_fee'];
        $this->assign('breakes',$breakes);
        $this->assign('sum_price',$sum_price);
        $this->assign('box_fee',$box_fee);
        $this->assign('business_info',$business_info);
        $this->assign('shop_list',$shop_list);
        $this->assign('head_title','订单提交');
        $this->display();
    }

    public function coupon_detail(){
        $vouchers_id=$this->_get('vouchers_id');
        $vouchers_obj=new VouchersModel();
        $vouchers_info=$vouchers_obj->getVouchersInfo('vouchers_id = '.$vouchers_id);
        $user_vouchers_obj=new UserVouchersModel();
        if($user_vouchers_obj->getUserVouchersInfo('vouchers_id = '.$vouchers_id.' AND user_id = '.session('user_id'))){
            $vouchers_info['is_have']=1;
            //echo $user_vouchers_obj->getLastSql();
        }
        else{
            //echo $vouchers_obj->getLastSql();
            $vouchers_info['is_have']=0;
        }
        $this->assign('vouchers_info',$vouchers_info);
        $this->assign('head_title','优惠券详情');
//        echo json_encode($vouchers_info);
//        die();
        $this->display();
    }

}