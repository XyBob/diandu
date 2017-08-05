<?php

class IndexAction extends FrontAction
{


    function _initialize()
    {
//        if (ACTION_NAME != 'js') {
//            parent::_initialize();
//        }
        parent::_initialize();
        $this->rate = 0.006;
        $this->LUNBO_NUM = 3;
        $this->num = 3;
        $this->recommend_num = 5;//推荐展示条数
        $this->search_num = 3;  //搜索显示条数
        $config_obj = new ConfigBaseModel();
        $this->range = $config_obj->getConfig('range')*1000;//距离范围
        //$this->range = 50*1000;//距离范围
        $this->near_num = 6;//附近店铺展示条数
        $this->shop_type_num = 2;//店铺分类页面展示条数
        $this->detail_near_num = 6;//店铺详情附近展示条数
        $this->pre_near_num = $config_obj->getConfig('pre_near_num');//店铺详情附近展示条数,每次加载的数量
        $this->BUSINESS_STATUS_OK = 1; //店铺正常，可修改--表示正常营业
        $this->firstRow=0;

        $this->max = 120; //防止死循环

//        session("local_longitude",120.019117);
//        session("local_latitude",30.283613);
//        session("area_id",330110);
    }


    //消费者的推荐人（可以是用户或商户）；
    //商家的推荐人（可以是用户或商户）；
    //平台拿0.6%  $plat_user_id；
    //  todo order_id(--订单记录含有店铺id)
    function test()
    {
        echo commission(123, 1);
        // echo  is_exist_city_agent(330300);
    }

    //wx-js
    function js()
    {
        //获取jsapi-ticket
        Vendor('Wxin.WeiXin');
        $appid = C('appid');
        $secret = C('appsecret');
        $wx_obj = new WxApi();
        $access_token = WxApi::getAccessToken($appid, $secret);
        $result = $wx_obj->getJsapiTicket($access_token);
        $ticket = $result['ticket'];
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel($user_id);
        $arr = array(
            'ticket' => $ticket
        );
        $user_obj->setUserInfo($arr);
        $user_obj->saveUserInfo();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/Index/js';
        vendor('wxpay.WxPayPubHelper');
        $address_obj = new Address();
        $params = $address_obj->getParametersAll($ticket, $url, $appid);

        $this->assign('params', $params);
        log_file($params['signature']);
        $this->assign('head_title', '微信JS-SDK测试');
        $this->display();
    }

    //unserialize
    function unserialize()
    {
        if (isset($_POST['submit'])) {
            echo "<pre>反序列化值：";
            print_r(unserialize($_POST['str']));
        }
        $this->display();
    }

    //解析json
    function parse_json()
    {
        print_r(json_decode('{"code":42037,"error_msg":"\u62a2\u5355\u5931\u8d25"}', true));
        if (isset($_POST['submit'])) {
            echo "<pre>json值：";
            print_r(json_decode($_POST['str']), true);
        }
        $this->display();
    }

    //MD5测试
    function getmd5()
    {
        if (isset($_POST['submit'])) {
            echo "<h1>MD5值：" . md5($_POST['str']) . "</h1>";
        }
        $this->display();
    }

    //静态页跳转方法
    function redirect($url)
    {
        if (!empty($_POST)) {
            redirect($url);
        }
    }

    /*
    * 计算距离
    */
    function getDistance($latitude1, $lng1, $latitude2, $lng2)
    {

        //var_dump($latitude1."--".$lng1."--".$latitude2."--".$lng2);
        //将角度转为狐度
        $radlatitude1 = deg2rad($latitude1);//deg2rad()函数将角度转换为弧度
        $radlatitude2 = deg2rad($latitude2);
        $radLng1 = deg2rad($lng1);
        $radLng2 = deg2rad($lng2);
        $a = $radlatitude1 - $radlatitude2;
        $b = $radLng1 - $radLng2;
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radlatitude1) * cos($radlatitude2) * pow(sin($b / 2), 2))) * 6378.137;
        return $s;
    }

    //首页
    public function index()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
            $is_wechat = 1;
        }else{
            $is_wechat = 0;
        }
        redirect('/Index/home_index');
        $this->assign('is_wechat',$is_wechat);
        $this->assign('head_title', '盈软科技');
        $this->display();
    }
    /***  店都一期  ***/
    //店都主页
    public function home_index()
    {
        //1浏览器定位，选择开通地区,定位了的需要距离，没定位的不需要距离
        //todo 开通地区
        //取session中地区--
        $area_id = session('area_id');
        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');

        //log用 ------------- begin
        $area_obj = new AddressAreaModel();
        $now_area = '';

        if($area_id){
            $now_area = $area_obj->getAreaName($area_id);
        }
        //log用 ------------- end

        //存在就使用，a主要是控制定位。定位不准啊。。。。
        //1.只存在area_id 无需定位
//        if ($area_id && !$local_latitude && !$local_longitude) {
//            log_file("需要定位，缺少经纬度，现在的session_id=".session_id()."---user_id=".session('user_id').'  --  地区：'.$now_area,'home_index');
//            $this->assign('a', 1);
//        }
        //都存在，无需定位
        if ($area_id && $local_latitude && $local_longitude) {
            log_file("无需定位，现在的session_id=".session_id()."---user_id=".session('user_id')
                .'  --  地区：'.$now_area
                .'--经度:'.$local_longitude
                .'--纬度:'.$local_latitude,'home_index');
            $this->assign('a', 2);
        }else{
            if(session('user_id') == 62375){
                $this->assign('a', 1);
            }

        }


        //没选择地区，需要定位，并设置session--
        if (!$area_id) {
            log_file("开始进入主页,需要定位，现在的session_id=".session_id()."---user_id=".session('user_id'),'home_index');
            $local_latitude = $this->_get('lat');
            $local_longitude = $this->_get('lng');
            $area = $this->_get('area');//设置地区id
            $area_id = M('address_area')->where(['area_name' => $area])->getField('area_id');
            if($area_id){
                $now_area = $area_obj->getAreaName($area_id);
            }

            if ($local_latitude && $local_longitude) {
                session('local_latitude', $local_latitude);
                session('local_longitude', $local_longitude);
                session('area_id', $area_id);
                session('local', 11);
                $this->assign('a', 2);
                //log_file("已经获取了经纬度，现在的session_id=".session_id()."---user_id=".session('user_id')."--- 定位地区:".$area,'home_index');
                log_file("已经获取了经纬度，现在的session_id=".session_id()."---user_id=".session('user_id')
                    .'  --  地区：'.$now_area
                    .'--经度:'.$local_longitude
                    .'--纬度:'.$local_latitude,'home_index');
            } else {
                //a为1 时发起定位
                log_file("发起定位，现在的user_id=".session('user_id'),'home_index');
                $this->assign('a', 1);
            }
        }

        $local = session('local');
        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');
        $where = "status=$this->BUSINESS_STATUS_OK";
        // 加上地区,需要释放筛选条件释放
        $this->get_area_name();
        $area_id = session('area_id');
//        if ($area_id){
//            $where.=' and area_id='.$area_id;
//        }

        //2轮播--ok
        $cust_flash_obj = new CustFlashModel();
        $cust_flash_list = $cust_flash_obj->getCustFlashList('', 'isuse=1', 'serial ASC', $this->LUNBO_NUM);

        //3店铺分类, 展示启用的--ok
        $Store_type_obj = new StoreTypeModel();
        $store_type_list = $Store_type_obj->getStoreTypeList('', 'isuse=1', 'serial ASC');
        $i = 0;
        $j = 0;
        foreach ($store_type_list as $v) {
            $store_type_list_all[$j][] = $v;
            $i++;
            if ($i % 8 == 0) {
                $j++;
            }
        }
        $bussiness_obj = new BusinessModel();
        $near_vegetable_market_list = $bussiness_obj->getNearBusinessInfoByDistance(
            $local_longitude,
            $local_latitude,
            'business_classify_id=25'
        );
        $near_vegetable_market_list=$near_vegetable_market_list[0];
        $near_vegetable_market_list['address']=str_replace('-',' ',$near_vegetable_market_list['address']);
        $this->assign("vegetable_market",$near_vegetable_market_list);
        //4推荐店铺,以让利排序，--本地计算距离
        $tag_where = "b.status=$this->BUSINESS_STATUS_OK";

        //计算评分后续再加
        $store_recommend_lists = $bussiness_obj->getBusinessListData('', $tag_where, 'rate desc', $this->recommend_num);
//        if ($area_id){
//            $where.=' and area_id='.$area_id;
//        }
        // ------------------------------ 显示最近的一家菜市场 -------------------------------------- begin
        //距离放大计数
        $c_cnt = 1;

        do{
            //获取附近的商店列表，这里开始查找
            $vegetable_market_list = $bussiness_obj->getVeMarketListByDistance(
                $local_longitude,
                $local_latitude,
                'business_classify_id=25 AND distance < '.$this->range * $c_cnt,
                $this->firstRow,
                ($this->pre_near_num)
            );
            $c_cnt = $c_cnt + 1;
        } while(!$vegetable_market_list&&$c_cnt<$this->max);

        // ------------------------------ 显示最近的一家菜市场 -------------------------------------- end


        // ------------------------------ 开始附近的店铺的查找 -------------------------------------- begin
        //$area_id = 330302;

        //$business_list = $bussiness_obj->getBusinessList(' status=1 AND area_id = "'.$area_id.'"');
        $business_list = $bussiness_obj->getAllBusinessList('status=1 and business_classify_id!=25');
        //测试用 --by wzh
//        if(session('user_id') == 62264){
//            //$this->assign('a', 1);
//            var_dump($bussiness_obj->getLastSql());
//        }
        //区内的所有店铺数量
        $total_business = count($business_list);
        //这个区内有店铺，开始查询
        if($total_business > 0){
            $t = 1;
            do{
                //获取附近的商店列表，这里开始查找
                $handle_bussiness_local_list = $bussiness_obj->getBusinessListByDistance(
                    $local_longitude,
                    $local_latitude,
                    'distance < '.$this->range * $t,
                    $this->firstRow,
                    $this->pre_near_num

                );
              //  log_file($bussiness_obj->getLastSql(),'index');
                $t = $t + 1;
            } while(!$handle_bussiness_local_list&&$t<$this->max);
            //完成第一次查找了，并且找到数据，进行下一步操作
            if($handle_bussiness_local_list){
                $num = count($handle_bussiness_local_list) + $this->firstRow;
                //如果第一次查到的数量小于总数量，继续找
                if($num < $total_business){

                    //如果第一次找到的数量已经够了，结束战斗
                    if(count($handle_bussiness_local_list) >= $this->pre_near_num){
                        //结束
//                        var_dump('over'.$num);
//                        $num = $this->pre_near_num;

                    }else{

                        //如果还不够第一次的数量，那么继续找，直到数量够了，或者超出最大距离
                        while($num < $this->pre_near_num&&$num < $total_business&&$t<$this->max) {
                            $t = $t + 1;
                            $handle_bussiness_local_list_new = $bussiness_obj->getBusinessListByDistance(
                                $local_longitude,
                                $local_latitude,
                                'distance < '.$this->range * $t,
                                $num,
                                $this->pre_near_num - $num
                            );
                            log_file($bussiness_obj->getLastSql(),'index');
                            log_file($num,'index');
                            log_file($t,'index');
                            //var_dump($bussiness_obj->getLastSql());
                            //获取到新的数量，合并
                            if($handle_bussiness_local_list_new) {
                                $num += count($handle_bussiness_local_list_new);
                                $handle_bussiness_local_list = array_merge($handle_bussiness_local_list, $handle_bussiness_local_list_new);
                            }else if($num > $total_business){
                                //没找到了，那么就没有东西了，跳出循环
                                break;
                            }
                        }
                    }
                }
            }
            //echo json_encode($handle_bussiness_local_list);exit;
        }
        // ------------------------------ 结束附近的店铺的查找 -------------------------------------- end
//        var_dump($t);
//        var_dump($store_recommend_lists);
        //$handle_bussiness_local_list = array_reverse($handle_bussiness_local_list);

        /*if ($local) {
            foreach ($store_recommend_lists as $key => $v) {
                $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
                $distance = round($distance, 2);

                $store_recommend_lists[$key]['distance'] = round($store_recommend_lists[$key]['distance']/1000,2);
                $customer_num = M('order')->where("order_status=1 and business_id=".$v['business_id'])->group('user_id')->count();
                //var_dump($order_obj->getLastSql());
                $v['customer_num'] = $customer_num ? $customer_num : 0;

                 //if ($distance<$this->range){// 距离范围内显示，待释放
                $v['distance'] = $distance;
                $store_recommend_list[] = $v;
                // }
            }
        } else {
            $store_recommend_list = $store_recommend_lists;
        }*/
        

        //5人气产品
      /*  $hot_goods_obj = new HotGoodsModel();
        $first_hot_goods = M('hot_goods')->where('isuse=1 and serial=1')->find();
        $hot_goods_list = $hot_goods_obj->getHotGoodsList('', 'isuse=1 and serial <> 1', 'serial asc', 5);
        $this->assign('first_hot_goods', $first_hot_goods);
        $this->assign('hot_goods_list', $hot_goods_list);*/

//        //附近店铺，位置距离计算
//        $total=$bussiness_obj->getBusinessListNum($where);
//        $bussiness_local_list = $bussiness_obj->getBusinessList($where, 'rate desc');
//        //var_dump(count($bussiness_local_list));
//        $start_range=0;
//        if ($local) {
//            //for($i=0;$i<ceil($total/$this->near_num);$i++) {
//            for($i=0;$i<$total;$i++) {
//                foreach ($bussiness_local_list as $k=>$v) {
//                    $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
//                    $distance = round($distance, 2);
//                    if ($distance>$start_range&&$distance<$start_range+$this->range){
//                      $bussiness_local_ids[] = $v['business_id'];
//                     }
//                }
//                $start_range = $this->range + $start_range;
//            }
//            //var_dump($bussiness_local_ids);
//
//        } else {
//            $bussiness_local_lists = '';
//        }
        //得到的id存session,下拉加载的时候,取session里面的id
//        session('bussiness_local_ids', $bussiness_local_ids);
//        $bussiness_local_ids = array_slice($bussiness_local_ids, 0, $this->near_num);
//        $bussiness_local_list=$bussiness_obj->getBusinessList('business_id in ('.implode(',',$bussiness_local_ids).')','FIND_IN_SET(business_id,"'.implode(',',$bussiness_local_ids).'")');

//        $bussiness_obj->setStart(0);
//        $bussiness_obj->setLimit($this->near_num);
//        $where = "status=$this->BUSINESS_STATUS_OK";
//        $bussiness_local_list = $bussiness_obj->getBusinessList($where, 'rate desc');


        foreach ($handle_bussiness_local_list as $key=>$v) {
            //$distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
            //$distance = round($distance, 2);
            $handle_bussiness_local_list[$key]['address'] = str_replace('-',' ',$handle_bussiness_local_list[$key]['address']);
            $handle_bussiness_local_list[$key]['distance'] = round($handle_bussiness_local_list[$key]['distance']/1000,2);
            $customer_num = M('order')->where("order_status=1 and business_id=".$v['business_id'])->count();
            $v['customer_num'] = $customer_num ? $customer_num : 0;
            $handle_bussiness_local_list[$key]['customer_num'] = $v['customer_num'];
            $handle_bussiness_local_list[$key]['star'] = round($v['star']);
        }
        //附近的店铺--取设置的条数
        //$bussiness_local_list = array_slice($bussiness_local_lists, 0, $this->near_num);

        //判断是否是微信
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
            $is_wechat = 1;
        }else{
            $is_wechat = 0;
        }
        $this->assign('is_wechat',$is_wechat);


/*
        if(!$local_latitude){
            $local_latitude = session('local_latitude');
        }
        if(!$local_longitude){
            $local_longitude = session('local_longitude');
        }*/

        $near_building=get_building_by_lat_and_lon($local_latitude,$local_longitude);//附近建筑
        $user_address_obj=new  UserAddressModel();
        $user_address_list=$user_address_obj->getAddressListByDistance($local_longitude,$local_latitude,'',session('user_id'));

        $this->assign('user_address_list',$user_address_list);
        $this->assign('near_building',$near_building);
        $this->assign('cust_flash_list', $cust_flash_list);
        $this->assign('store_type_list_all', $store_type_list_all);//店铺分类
        $this->assign('store_type_list', $store_type_list);//分类，判断名称
       // $this->assign('store_recommend_list', $store_recommend_list);//推荐的店铺
        $this->assign('bussiness_local_list', $handle_bussiness_local_list);//附近的店铺
        $this->assign('total', $total_business);//店铺总数
        $this->assign('firstRow', $num);
        $this->assign('t',$t);//距离倍数
        $this->assign('head_title', '首页');
        $this->display();
    }
    //获取位置
    public function get_area_name()
    {
        $area_id = session('area_id');
        $area_name = M('address_area')->where(['area_id' => $area_id])->getField('area_name');
        $this->assign('area_name', $area_name);
    }
    //附近店铺-查看更多
    public function get_near_more()
    {


        $firstRow = $this->_post('firstRow');//第一条数据
        //var_dump($firstRow);
        $t = $this->_post('t');//距离倍数

        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');

        log_file("get_near_more，现在的session_id=".session_id()."---user_id=".session('user_id')
            .'--经度:'.$local_longitude
            .'--纬度:'.$local_latitude,'home_index');

        $bussiness_obj = new BusinessModel();

        $area_id = session('area_id');
        //$area_id = 330302;
        $business_list = $bussiness_obj->getAllBusinessList('',' status=1 and is_open=1 and business_classify_id!=25 ');
        //区内的所有店铺数量
        $total_business = count($business_list);
        //这个区内有店铺，开始查询
        if($total_business - ($firstRow) > 0){
            do{
                //获取附近的商店列表，这里开始查找
                $handle_bussiness_local_list = $bussiness_obj->getBusinessListByDistance(
                    $local_longitude,
                    $local_latitude,
                    'distance < '.$this->range * $t,
                    $firstRow,
                    $this->pre_near_num
                );
                $t = $t + 1;
            } while(!$handle_bussiness_local_list&&$t<$this->max);

            //var_dump($bussiness_obj->getLastSql());

            //完成第一次查找了，并且找到数据，进行下一步操作
            if($handle_bussiness_local_list){
                //这次查出来的数量
                $num = count($handle_bussiness_local_list);
                //var_dump($num);

                //如果第一次查到的数量加上已有的数量小于总数量，继续找
                if($num + ($firstRow) < $total_business ){
                    //如果第一次找到的数量已经够了，拼接字符串，结束战斗
                    if($num > $this->pre_near_num){
                        //结束

                    }else{
                        //如果还不够第一次的数量，那么继续找，直到数量够了,或者全部找出来了，或者超出最大距离
                        while($num < $this->pre_near_num&&$num + ($firstRow) < $total_business&&$t < $this->max) {
                            $t = $t + 1;
                            $handle_bussiness_local_list_new = $bussiness_obj->getBusinessListByDistance(
                                $local_longitude,
                                $local_latitude,
                                'distance < '.$this->range * $t,
                                $num + $firstRow,
                                $this->pre_near_num - $num
                            );

                            //获取到新的数量，合并
                            if($handle_bussiness_local_list_new) {
                                $num += count($handle_bussiness_local_list_new);
                                $handle_bussiness_local_list = array_merge($handle_bussiness_local_list, $handle_bussiness_local_list_new);
                            }else if($num > $total_business){
                                //没找到了，那么就没有东西了，跳出循环
                                break;
                            }
                        }
                    }
                }
            }
        }
        //    echo $bussiness_obj->getLastSql();exit;
        foreach ($handle_bussiness_local_list as $key=>$v) {
//            $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
//            $distance = round($distance, 2);
            $handle_bussiness_local_list[$key]['address'] = str_replace('-',' ',$handle_bussiness_local_list[$key]['address']);
            $handle_bussiness_local_list[$key]['distance'] = round($handle_bussiness_local_list[$key]['distance']/1000,2);
            $customer_num = M('order')->where("order_status=1 and business_id=".$v['business_id'])->count();
            $v['customer_num'] = $customer_num ? $customer_num : 0;
            $handle_bussiness_local_list[$key]['customer_num'] = $v['customer_num'];
            $handle_bussiness_local_list[$key]['star'] = round($v['star']);
        }

        //$handle_bussiness_local_list = array_reverse($handle_bussiness_local_list);
//        $bussiness_obj = new BusinessModel();
//        $bussiness_local_ids = session('bussiness_local_ids');
//        $bussiness_local_ids = array_slice($bussiness_local_ids, $firstRow, $this->near_num);
//        $bussiness_local_list=$bussiness_obj->getBusinessList('business_id in ('.implode(',',$bussiness_local_ids).')','FIND_IN_SET(business_id,"'.implode(',',$bussiness_local_ids).'")');


//        $bussiness_obj->setStart($firstRow);
//        $bussiness_obj->setLimit($this->pre_near_num);
//        $where = "status=$this->BUSINESS_STATUS_OK";
//        $bussiness_local_list = $bussiness_obj->getBusinessList($where, 'rate desc');


//        $local_latitude = session('local_latitude');
//        $local_longitude = session('local_longitude');
//        foreach ($bussiness_local_list as $v) {
//            $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
//            $distance = round($distance, 2);
//            $v['distance'] = $distance;
//            $customer_num = M('order')->where("order_status=1 and business_id=".$v['business_id'])->count();
//            $v['customer_num'] = $customer_num ? $customer_num : 0;
//            $handle_bussiness_local_list[] = $v;
//
//        }



       // $bussiness_local_list = array_slice($bussiness_local_lists, $firstRow, $this->near_num);
        echo json_encode(array(
            "data" => $handle_bussiness_local_list,
            "t" => $t,
            "firstRow" => $num?$num + $firstRow:$firstRow
        ));
        exit();
    }

    //商家分类列表
    public function shop_type_list()
    {
        $id = $this->_request('id');//分类id
        $firstRow = $this->_request('firstRow')?$this->_request('firstRow'):0;
        //所有可用分类
        $store_type_obj = new StoreTypeModel();
        $store_type_list = $store_type_obj->getStoreTypeList('', 'isuse=1', 'serial ASC');

        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');
        $this->get_area_name();

        $where = "is_open = 1";
        if ($id) {
            $where .=  " AND business_classify_id=" . $id;
        }
        $area_id = session('area_id');
       // echo $area_id;exit;
       // $area_id = 330110;//测试用

        //店铺距离+让利排序
        $business_obj = new BusinessModel();
        $business_list=$business_obj->getShopTypeData(
            $local_longitude,
            $local_latitude,
            $where,
            $firstRow,
            $this->shop_type_num,
            $area_id,
            $id
        );
     //   echo json_encode($business_list);exit;
       // echo $business_obj->getLastSql();exit;
        //多少人去过
        foreach($business_list as $k=>$v){
            $customer_num=M('order')->where("order_status=1 and business_id=".$v['business_id'])->group('user_id')->count();
            $business_list[$k]['customer_num']=$customer_num?$customer_num:0;
            $business_list[$k]['star']=round($v['star']);
            $business_list[$k]['distance']=round($v['distance']/1000,2);
        }

        $business_total=$business_obj->getShopTypeNum(
            $local_longitude,
            $local_latitude,
            $area_id,
            $id
        );

        if(IS_AJAX){
            $business_list['len']=count($business_list);
            $business_list['firstRow']=$this->shop_type_num;
            $business_list['total']=$business_total[0]['total'];
            echo json_encode($business_list);
            exit;
        }

        $this->assign('firstRow', $this->shop_type_num);
        $this->assign('total', $business_total[0]['total']);
        $this->assign("business_list", $business_list);
        $this->assign("store_type_list", $store_type_list);
        $this->assign("head_title", "店铺分类");
        $this->assign('id', $id);
        $this->display();
    }

//

    //店铺分类下---下拉加载
    public function get_load_more()
    {

        $where = "status=$this->BUSINESS_STATUS_OK";
        $area_id = session('area_id');
//        if ($area_id) {
//            $where .=" and area_id=$area_id";
//         }
        $firstRow = $this->_post('firstRow');
        $business_classify_id = $this->_post('business_classify_id');
        if ($business_classify_id) {
            $where .= " and business_classify_id=$business_classify_id";
        }
//        $key_words=$this->_post('key_words');
//        if ($key_words){
//            $where.=' and business_name like "%'.$key_words.'%"';
//        }
        $business_obj = new BusinessModel();
        $business_lists = $business_obj->getBusinessList($where, 'rate desc', $firstRow . ',' . $this->shop_type_num);
        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');
        foreach ($business_lists as $v) {
            $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
            $distance = round($distance, 2);
            $business_id=$v['business_id'];
            // if ($distance<$this->range){
            $v['distance'] = $distance;
            $customer_num=M('order')->where("order_status=1 and business_id=$business_id")->group('user_id')->count();
            $v['customer_num']=$customer_num?$customer_num:0;
            $business_list[] = $v;
            // }
        }
        if (!$business_list) {
            echo "0";
            exit;
        }
        echo json_encode($business_list);
        exit;
    }

    //点击商铺分类--ajax实现--/查出所有店铺
    public function select_business_type()
    {
        $where = "status=$this->BUSINESS_STATUS_OK";
        $area_id = session('area_id');
//        if ($area_id){
//            $where.=' area_id='.$area_id;
//        }
        $business_classify_id = $this->_post('business_classify_id');
        if ($business_classify_id) {
            $where .= " and business_classify_id=$business_classify_id";
        }
        $business_obj = new BusinessModel();
        $business_lists = $business_obj->getBusinessList($where, 'rate desc', $this->shop_type_num);

        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');
        foreach ($business_lists as $v) {
            $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
            $distance = round($distance, 2);
//            $business_id=$v['business_id'];
            // if ($distance<$this->range){
            $v['distance'] = $distance;
//            $customer_num=M('order')->where("order_status=1 and business_id=$business_id")->group('user_id')->count();
//            $v['customer_num']=$customer_num?$customer_num:0;
            $business_list[] = $v;
            // }
        }
        $total = count($business_obj->getBusinessList($where));
        if (!$business_list) {
            $datas = array(
                'code' => -1,
                'total' => $total,
                'data' => '',
            );
        } else {
            $datas = array(
                'code' => 1,
                'total' => $total,
                'data' => $business_list,
            );
        }
        // echo json_encode($business_list);
        echo json_encode($datas);
        exit();

    }

    //查看店铺详情
    public function shop_detail()
    {
        $user_id = session('user_id');
        $business_id = $this->_get('business_id');

        $obj_discount = new DiscountMinusModel();
        $time = time();
        $where = 'merchant_id='.$business_id.' AND scope=2 AND isuse=1 AND '.$time.'>start_time AND '.$time.'< end_time';
        $out_discount = $obj_discount->getDiscountMinusList('num,amount_limit',$where,'num ASC','1');//外卖满减
//        echo $obj_discount->getLastSql();
//        die();
        $obj_order = new OrderModel();
        $in_cost_num = $obj_order->getOrderNum('business_id='.$business_id.' AND order_status=1');
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo("business_id=$business_id");
        $business_info['stars'] = round($business_info['star']);
        $business_info['address'] = str_replace('-',' ',$business_info['address']);
        $actives_breaks = $obj_discount->getDiscountMinusList('',"merchant_id=$business_id AND isuse=1  and start_time <".time()." and end_time >".time(),'num ASC','');//满减
        $obj_voucher = new VouchersModel($user_id);
        $actives_coupons = $obj_voucher->getVouchersList('','merchant_id='.$business_id.' and isuse=1 AND '.$time.' > start_time AND '.$time.'< end_time','');//优惠券
        $obj_user_voucher = new UserVouchersModel();
        foreach ($actives_coupons as $k=>$v){
            $is_receive = $obj_user_voucher->getUserVouchersNum('vouchers_id='.$v['vouchers_id'].' AND user_id='.$user_id.' AND isuse=1');//判断当前用户是否拥有该优惠券
            //echo $obj_user_voucher->getLastSql();
            $all_receive = $obj_user_voucher->getUserVouchersNum('merchant_id='.$business_id.' AND vouchers_id='.$v['vouchers_id']);//优惠券总共被多少人领取
            //echo $obj_user_voucher->getLastSql();
            $actives_coupons[$k]['all_receive'] = $all_receive;
            if($is_receive != 0){
                $actives_coupons[$k]['have'] = 1;
            }else{
                $actives_coupons[$k]['have'] = 0;
            }
        }
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
            $is_wechat = 1;
        }else{
            $is_wechat = 0;
        }
        $this->assign('is_wechat', $is_wechat);
        //echo json_encode($actives_breaks);
        //echo json_encode($actives_coupons);
        $lat = $business_info['latitude'];
        $lng = $business_info['longitude'];
//        $lat = 30;
//        $lng = 120;
        $this->assign('lat', $lat);
        $this->assign('lng', $lng);
        $this->assign('business_info', $business_info);
        $evn_pic = $business_info['evn_pic'];
        $evn_pic_arr = explode(',', $evn_pic);
        $this->assign('evn_pic_arr', $evn_pic_arr);


     /*   //附近推荐,控制条数，获取店铺经纬度
        $where = "status=$this->BUSINESS_STATUS_OK AND business_id<>'".$business_info['business_id']."'";
        $area_id = session('area_id');
        if ($area_id){
            $where.=" AND area_id=$area_id";
        }
        $bussiness_obj = new BusinessModel();
        $bussiness_list = $bussiness_obj->getBusinessList($where,'rate desc');

        //var_dump($bussiness_obj->getLastSql());
        $i = 1;
        foreach ($bussiness_list as $v) {
            $distance = $this->getDistance($lat, $lng, $v['latitude'], $v['longitude']);
            $distance = round($distance, 2);
            if ($distance < $this->range) {
//            if ($v['business_id'] == $business_id)
//                    continue;
            $business_id=$v['business_id'];
            // if ($distance<$this->range){
            // var_dump($distance);
            $customer_num=M('order')->where("order_status=1 and business_id=$business_id")->group('user_id')->count();
            $v['customer_num']=$customer_num?$customer_num:0;
            $v['distance'] = $distance;
            $bussiness_near_lists[] = $v;
                $i++;
            if ($i > $this->detail_near_num)
                    break;
            }
        }

        //session('bussiness_near_lists',$bussiness_near_lists);//有下拉需要释放
        $total = count($bussiness_near_lists);*/
        //$bussiness_near_list=array_slice($bussiness_near_lists,0,$this->near_num);
        $this->assign('out_discount',$out_discount);
        $this->assign('in_cost_num',$in_cost_num);
        $this->assign('active_break',$actives_breaks);
        $this->assign('active_coupon',$actives_coupons);
//        echo json_encode($actives_breaks);
//        die();
//        echo json_encode($actives_coupons);
//        die();
       // $this->assign('bussiness_near_lists', $bussiness_near_lists);
        //$this->assign('total', $total);
        $this->assign('firstRow', $this->detail_near_num);
        $this->assign('head_title', "店铺详情");
        $this->display();
    }
    public function get_voucher(){
        $user_id = session('user_id');
        if($user_id != null) {
            $voucher_id = $this->_post('voucherid');
            $obj_user_voucher = new UserVouchersModel();
            $voucher_num = $obj_user_voucher->getUserVouchersNum('vouchers_id=' . $voucher_id . ' AND user_id=' . $user_id.' AND isuse=1');
            if ($voucher_num == 0) {
                $obj_voucher = new VouchersModel($voucher_id);
                $data_user_vouchers = $obj_voucher->getVouchersInfo('vouchers_id=' . $voucher_id, 'vouchers_id,merchant_id,num,province_id,city_id,area_id,amount_limit,title,scope,start_time,end_time');
                $data_user_vouchers['user_id'] = $user_id;
                $obj_user_voucher->addUserVouchers($data_user_vouchers);
                echo "receive";
            } else {
                echo "received";
            }
        }else{
            echo "login";
        }
        //$date['vouchers_id']=$voucher_id;
        //$data['user_id']=$user_id;

}
//查看商品详情
    public function commodity_detail(){
        $item_id = $this->_get('item_id');
        $item_obj = new ItemModel();
        $item_info = $item_obj->getUsefulItemInfoById($item_id);
//        echo json_encode($item_info);
//        die();
        $this->assign("item_info",$item_info);
        $this->display();


    }

    //地图-页
    public function get_map()
    {
        $business_id = $this->_get('business_id');
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo("business_id=$business_id");
        $lat = $business_info['latitude'];
        $lng = $business_info['longitude'];
        if (!$lat){
            $lat=30;
        }
        if (!$lng){
            $lng=120;
        }
        $config_obj=new ConfigBaseModel();
        $map_ad=$config_obj->getConfig('map_ad');//地图页面广告图片
        $this->assign('map_ad',$map_ad);
        $this->assign('lat', $lat);
        $this->assign('sign_pic', $business_info['sign_pic']);
        $this->assign('lng', $lng);
        $this->display();
    }

    //todo 买单
    public function buy_bill()
    {
        $this->display();
    }
    //todo 买单支付成功
    public function pay_success()
    {
        $this->display();
    }
    //支付
    public function pay_bill()
    {
        if (IS_POST) {

        } else {
            $this->display();
        }

    }
    //todo 收货地址
    public function goods_address()
    {
        $this->display();
    }
    //todo 新建收货地址和地址修改
    public function new_goods_address()
    {
        $this->display();
    }
    //我推荐的店铺
    public function my_recom_shop()
    {
        $this->display();
    }

    //我推荐的个人
    public function my_recom_person()
    {
        $this->display();
    }
    //我的客户
    public function my_customer()
    {
        $this->display();
    }
    //消费订单列表页
    public function consum_order_list()
    {
        $this->display();
    }

    //手机验证 绑定手机
    public function phone_check()
    {
		$this->assign('redirect_url', '/FrontUserCenter/personal_data');
		$this->assign('head_title', '注册');
        $this->display();
    }
    //todo 登录
    public function login()
    {
        $this->display();
    }
    //设置
    public function set()
    {
        $config_obj=new ConfigBaseModel();
        $server_number=$config_obj->getConfig('customer_service_telephone');
        $this->assign('server_number',$server_number);
        $this->assign('head_title','设置');
        $this->display();
    }

    //查看帮助列表页，公告、新闻资讯列表页参考此页
    public function help_list()
    {
        $this->display();
    }

    //帮助详情，公告详情、新闻资讯详情参考此页
    public function help_detail()
    {
        $this->display();
    }

    //关于我们
    public function about_diandu()
    {
        $this->display();
    }

    //意见反馈
    public function feedback()
    {
        $this->display();
    }

    //搜索页
    public function search_shop()
    {

        $where = "b.status=$this->BUSINESS_STATUS_OK";
        //获取定位session位置
        $this->get_area_name();
        $area_id = session('area_id');
//        if ($area_id){
//            $where.=" and b.area_id=$area_id";
//        }
        $local = '2';
        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');

        $key_words = $this->_request('key_words');

        $bussiness_obj = new BusinessModel();
        if ($key_words) {
            $this->assign('ok', 1);
            $where .= ' and b.is_use = 1 and b.business_name like "%' . $key_words . '%"';
            $business_lists = $bussiness_obj->getBusinessListData('', $where, 'rate desc', $this->search_num);
            if ($local) {
                foreach ($business_lists as $v) {
                    $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
                    $distance = round($distance, 2);
                    // if ($distance<$this->range){//距离标准，待释放
                    $v['distance'] = $distance;
                    $v['star'] = round($v['star']);
                    $business_list[] = $v;
                    // }
                }
            } else {
                $business_list = $business_lists;
            }

            $this->assign("business_list", $business_list);
        }
        $total = count($bussiness_obj->getBusinessListData('', $where));
        $total=$total?$total:0;
        $hot_search_obj=new HotSearchModel();
        $hot_search_list=$hot_search_obj->getHotSearchList('','serial');
        /*echo json_encode($hot_search_list);exit;*/
       // echo json_encode($business_list);exit;
        $this->assign('hot_search_list',$hot_search_list);
        $this->assign('firstRow', $this->search_num);
        $this->assign('total', $total);
        $this->assign('key_words', $key_words);
        $this->assign("head_title", "搜索");
        $this->display();
    }

    //搜索下拉
    public function get_search_list()
    {
        $where = "b.status=$this->BUSINESS_STATUS_OK";
        $area_id = session('area_id');
        if ($area_id) {
          //  $where .= " and b.area_id=$area_id";
        }
        //存在local 表示为当前位置
        //需要计算店铺的经纬度和定位的距离，否则为外地
        $local = 2;
        $local_latitude = session('local_latitude');
        $local_longitude = session('local_longitude');
        $firstRow = $this->_post('firstRow');
        $key_words = $this->_post('key_words');
        if ($key_words) {
            $where .= ' and b.business_name like "%' . $key_words . '%"';
        }
        $business_obj = new BusinessModel();
        $business_lists = $business_obj->getBusinessListData('', $where, 'rate desc', $firstRow . ',' . $this->search_num);
        if (!$business_lists) {
            echo "failure";
            exit;
        }
        if ($local) {
            foreach ($business_lists as $v) {
                $distance = $this->getDistance($local_latitude, $local_longitude, $v['latitude'], $v['longitude']);
                $distance = round($distance, 2);
                // if ($distance<$this->range){//距离标准，待释放
                $v['distance'] = $distance;
                $business_list[] = $v;
                // }
            }
        } else {
            $business_list = $business_lists;
        }
        echo json_encode($business_list);
        exit;
    }

    /*todo 个人中心*/
    public function person_center()
    {
        $business_obj = new BusinessModel();
        $business = $business_obj->where('user_id="' . session('user_id') . '"')->find();

        if ($business) {
            $this->assign("status", $business['status']);
        } else {
            $this->assign("status", 0);
        }
        $this->display();
    }
    /*todo 申请成为外卖商家*/
    public function apply_takeout_store(){
        $business_obj = new BusinessModel();
        $user_id = session('user_id');
        if($_POST){
            $contacts = isset($_POST['contacts'])?$_POST['contacts']:'';
            $contact_number = isset($_POST['contact_number'])?$_POST['contact_number']:'';
            $province_id = isset($_POST['province_id'])?$_POST['province_id']:'';
            $city_id = isset($_POST['city_id'])?$_POST['city_id']:0;
            $area_id= isset($_POST['area_id'])?$_POST['area_id']:0;
            $address= isset($_POST['address'])?$_POST['address']:0;
            $latitude= isset($_POST['latitude'])?$_POST['latitude']:0;
            $longitude= isset($_POST['longitude'])?$_POST['longitude']:0;
            $delivery_fee= isset($_POST['delivery_fee'])?$_POST['delivery_fee']:0;
            $delivery_time= isset($_POST['delivery_time'])?$_POST['delivery_time']:0;
            $box_fee= isset($_POST['box_fee'])?$_POST['box_fee']:0;
            $range= isset($_POST['range'])?$_POST['range']:0;

            if(!$contacts){
                exit('联系人不能为空');
            }

            if(!$contact_number){
                exit('联系人号码不能为空');
            }

            if(!$province_id){
                exit('请选择省份');
            }

            if(!$city_id){
                exit('请选择城市');
            }

            if(!$area_id){
                exit('请选择地区');
            }

            if(!$address){
                exit('请输入详细地址');
            }

            if(!$latitude){
                exit('请输入纬度');
            }

            if(!$longitude){
                exit('请输入经度');
            }

            if(!$delivery_time){
                exit('请输入配送时间');
            }

            if(!$delivery_fee){
                exit('请输入配送费');
            }

            if(!$box_fee){
                exit('请输入餐盒费');
            }

            if(!$range){
                exit('请输入配送距离');
            }

            $arr = array(
                "contacts" => $contacts,
                "contact_number" => $contact_number,
                "province_id" => $province_id,
                "city_id" => $city_id,
                "area_id" => $area_id,
                "address" => $address,
                "out_status" => BusinessModel::IS_REVIEW,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "delivery_fee" => $delivery_fee,
                "delivery_time" => $delivery_time,
                "box_fee" => $box_fee,
                "range" => $range,
            );

            $r = $business_obj->where("user_id='" . $user_id . "'")->save($arr);

            if($r!==false){
                exit("success");
            }

            exit('failure');
        }else{
            //$business_obj = new BusinessModel();
            $business_info = $business_obj->getBusinessInfo('user_id='.session('user_id'));

            //获取省份列表
            $province = M('address_province');
            $city_obj = new CityModel();
            $area_obj = new AreaModel();
            $province_list = $province->field('province_id, province_name')->select();

            $business_classify = new BusinessClassifyModel();
            $business_classify_list = $business_classify->getBusinessClassifyList("","serial");

            $business_industry = new IndustryModel();
            $business_industry_list = $business_industry->getindustryList("","serial");

            if ($business_info['province_id'] != 0) {
                $city_list = $city_obj->getCityList("", "province_id='" . $business_info['province_id'] . "'");
                $this->assign('city_list', $city_list);
            }

            if ($business_info['city_id'] != 0) {
                $area_list = $area_obj->getAreaList("", "city_id='" . $business_info['city_id'] . "'");
                $this->assign('area_list', $area_list);
            }


            $this->assign('business',$business_info);
            $this->assign('province_list', $province_list);
            $this->assign('business_classify_list', $business_classify_list);
            $this->assign('business_industry_list', $business_industry_list);
            $this->display();
        }
    }

    public function out_review(){
        $this->assign('head_title', '申请提交成功');
        $this->display();
    }
    /*todo 申请成为商家*/
    public function apply_for_businesses()
    {
        if ($_POST) {
            //验证各种
            $user_id = session('user_id');
            //$user_id = 39454;
            $business_obj = new BusinessModel();
            if (!$business_obj->create($_POST)) {
                exit($business_obj->getError());
            } else {
                if ($user_id) {
                    //$rate = $_POST['rate'] / 100;
                    $config = $this->system_config;
                    if($_POST['business_classify_id']==25){//菜市场
                        $rate = $config['ALL_BUSINESS_RATE_OUTSIDE']/100;
                    }else{
                        $rate = $config['ALL_BUSINESS_RATE']/100;
                    }

                    //设置参数
                    $arr = array(
                        "business_name" => $_POST['business_name'],
                        "contacts" => $_POST['contacts'],
                   /*     "industry_id" => $_POST['industry_id'],*/
                        "contact_number" => $_POST['contact_number'],
                        "business_classify_id" => $_POST['business_classify_id'],
                        "rate" => $rate,
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
                        "status" => BusinessModel::BUSINESS_NOT_PAY,
                        "user_id" => $user_id,
                        "latitude" => $_POST['latitude'],
                        "longitude" => $_POST['longitude'],
                        "mail"=>  $_POST['mail'],
                        'category_id'=>$_POST['category_id'],
                 /*       "business_license"=> $_POST['business_license'],
                        "business_license_type"=> $_POST['business_license_type'],*/
                        'star'=>5,
                        'full_name'=>$_POST['full_name']
//                        "type" => 3,
                    );

                    $business_res = $business_obj->where("user_id='" . $user_id . "'")->find();
                    if ($business_res) {
                        //审核未通过的话，重新保存提交，状态改成未付款，上次付款已经退回
                        if($business_res['status']==BusinessModel::BUSINESS_NOT_PASS){
                            $arr['status'] = BusinessModel::BUSINESS_NOT_PAY;
                        }else {
                            $arr['status'] = $business_res['status'];
                        }
                        //存在的话，修改,保持原来的状态

                        $arr['addtime'] = $business_res['addtime'];
                        $r = $business_obj->where("user_id='" . $user_id . "'")->save($arr);

                    } else {
                        //不存在，新添加
                        $r = $business_obj->add($arr);
                    }
                    if ($r !== false) {
                        exit("success");
                    }
                    exit("failure");
                } else {
                    $this->error("用户未登录");
                }
            }

        } else {
            //获取省份列表
            $province = M('address_province');
            $city_obj = new CityModel();
            $area_obj = new AreaModel();
            $province_list = $province->field('province_id, province_name')->select();

            $business_classify = new BusinessClassifyModel();
            $business_classify_list = $business_classify->getBusinessClassifyList("", "serial");

            $business_industry = new IndustryModel();
            $business_industry_list = $business_industry->getindustryList("", "serial");

            $business_obj = new BusinessModel();
            $where = "user_id='" . session('user_id') . "'";
            $business = $business_obj->getBusinessInfo($where);
            $address=$business['address'];
            $address_arr=explode('-',$address);
            $business['address1']=$address_arr[0];
            $business['address2']=$address_arr[1];
            if ($business) {
                $this->assign('business', $business);
                $evn_pics = explode(",", $business['evn_pic']);
                $this->assign('evn_pics', $evn_pics);
            }

            if ($business['province_id'] != 0) {
                $city_list = $city_obj->getCityList("", "province_id='" . $business['province_id'] . "'");
                $this->assign('city_list', $city_list);
            }

            if ($business['city_id'] != 0) {
                $area_list = $area_obj->getAreaList("", "city_id='" . $business['city_id'] . "'");
                $this->assign('area_list', $area_list);
            }

            $this->assign('province_list', $province_list);
            $this->assign('business_classify_list', $business_classify_list);
            $this->assign('business_industry_list', $business_industry_list);
            $this->display();
        }
    }

    /*todo 个人资料*/
    public function personal_data()
    {
        $this->display();
    }
   /*todo 提醒后台登陆密码*/
    public function background_password(){
        $user_id=session('user_id');
        $user_obj=new UserModel();
        $user_info=$user_obj->getUserInfo('username','user_id = '.$user_id);
        $this->assign('username',$user_info['username']);
        $this->assign('head_title','确认后台密码');
        $this->display();
    }
    /*todo 修改密码*/
    public function modify_password(){
        $this->display();
    }
    /*todo 成为商家确认支付*/
    public function confirm_payment()
    {

        if (IS_POST) {
            $config_obj=new ConfigBaseModel();
            $business_apply_money=$config_obj->getConfig('business_apply');
            $business_obj = new BusinessModel();//去商家表中取申请的信息
            $where = "user_id='" . session('user_id') . "'";
            $business_info = $business_obj->getBusinessInfo($where);

            $arr = array(
                'type' => 3,//申请商家费
                'business_id' => $business_info['business_id'],
                'province_id' => $business_info['province_id'],
                'city_id' => $business_info['city_id'],
                'area_id' => $business_info['area_id'],
                'pay_amount' => $business_apply_money,
                'total_amount' => $business_apply_money,
                'source' => 1,//来自微信
            );
            $order_obj = new OrderModel();
            $order_num=$order_obj->getOrderNum('order_status=1 and type=3 and user_id='. session('user_ids'));
            if($order_num&&$business_info['status']!=2){
                //订单表里记录+不是审核被拒绝 不能再付款,避免重复付款
                echo 'has payed';
                exit;
            }
            $order_id = $order_obj->addOrder($arr);
            if ($order_id) {
                $weixin_obj = new WXPayModel();
                $result = $weixin_obj->pay_code($order_id);
                echo $result;
                exit;
            }
        }
        $config_obj=new ConfigBaseModel();
        $business_apply_money=$config_obj->getConfig('business_apply');
        $this->assign('business_apply_money',$business_apply_money);
        $this->assign('head_title', '确认支付');
        $this->display();
    }

    public function confirm_payment_wxpay(){
        $config_obj=new ConfigBaseModel();
        $business_apply_money=$config_obj->getConfig('business_apply');
        $business_obj = new BusinessModel();//去商家表中取申请的信息
        $where = "user_id='" . session('user_id') . "'";
        $business_info = $business_obj->getBusinessInfo($where);

        $arr = array(
            'type' => 3,//申请商家费
            'business_id' => $business_info['business_id'],
            'province_id' => $business_info['province_id'],
            'city_id' => $business_info['city_id'],
            'area_id' => $business_info['area_id'],
            'pay_amount' => $business_apply_money,
            'total_amount' => $business_apply_money,
            'source' => 1,//来自微信
        );
        $order_obj = new OrderModel();
        log_file("arr:".json_encode($arr),'confirm_wxpay');
        $order_num=$order_obj->getOrderNum('order_status=1 and type=3 and user_id='. session('user_ids'));
        if($order_num&&$business_info['status']!=2){
            //订单表里记录+不是审核被拒绝 不能再付款,避免重复付款
            echo 'has payed';
            exit;
        }
        $order_id = $order_obj->addOrder($arr);
        log_file("order_id:".$order_id,'confirm_wxpay');
        if ($order_id) {
            $weixin_obj = new WXPayModel(true);
            $result = $weixin_obj->mobile_pay_code($order_id);
            log_file("app_apply:".json_encode($result),'confirm_wxpay');
            echo json_encode($result);
            exit;
        }
    }

    /*todo 支付成功*/
    public function payment_success()
    {
        $this->display();
    }

    /*todo 添加银行卡*/
    public function add_card()
    {
        $this->display();
    }

    /*todo 绑定成功*/
    public function bind_success()
    {
        $this->display();
    }

    /*todo 我的账户*/
    public function my_account()
    {
        $user_obj = new UserModel();
        $user_obj->userId = session("user_id");
        //$where = "user_id='".session("user_id")."'";
        $left_money = $user_obj->getLeftMoney();
        $this->assign("left_money", $left_money);
        $this->display();
    }

    /*todo 账户明细*/
    public function account_list()
    {
        $this->display();
    }

    /*todo 提现记录*/
    public function withdrawal_records()
    {
        $this->display();
    }

    /*todo 提现（没绑定过银行卡）*/
    public function withdrawal_need_bind()
    {
        $this->display();
    }

    /*todo 提现（绑定过银行卡）*/
    public function withdrawal_normal()
    {
        $this->display();
    }

    /*todo 提现审核*/
    public function withdrawal_audit()
    {
        $this->display();
    }

    /*todo 我的银行卡*/
    public function my_bank_card()
    {
        $bank_card_obj = new BankCardModel();
        $bank_obj = new BankModel();
        $bank_card = $bank_card_obj->getBankCardInfo("user_id='" . session("user_id") . "'");
        if ($bank_card) {
            //$this->assign("bank_card",$bank_card);
            $bank_num = substr($bank_card['account'], -4);
            $this->assign("bank_num", $bank_num);
            $bank = $bank_obj->getBankInfo("bank_id='" . $bank_card['bank_id'] . "'");
            $this->assign("bank_name", $bank['bank_name']);
        }
        $this->display();
    }

    /*todo 我的银行卡*/
    public function modify_card()
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
            $this->display();
        }
    }
    /*todo 我的优惠券*/
    public function my_coupons()
    {
        $this->display();
    }
    /*todo 我的优惠券详情*/
    public function my_coupons_details()
    {
        $this->display();
    }
    /*todo 我的信息*/
    public function my_info()
    {
        $this->display();
    }
    /*todo 信息*/
    public function info()
    {
        $this->display();
    }
     /*todo 充值*/
    public function top_up()
    {
        $this->display();
    }
    /*todo 我的二维码*/
    public function my_qr_code()
    {
        $this->display();
    }
    /*todo 我的订单*/
    public function my_order()
    {
        $this->display();
    }
    /*todo 订单详情*/
    public function my_order_detail()
    {
        $this->display();
    }
    /*todo 用户的订单 */
    public function consumer_order()
    {
        $this->display();
    }
    /*todo 用户的订单详情 */
    public function consumer_order_detail()
    {
        $this->display();
    }
    /*todo 用户的评价页面*/
    public function evaluation()
    {
        $this->display();
    }
    /*todo 菜市场分类*/
    public function market_classification()
    {
        $this->display();
    }
//    /*todo 我的店铺*/
//    public function my_store(){
//      $this->display();
//    }
//    /*todo 店铺资料*/
//    public function store_data(){
//        if ($_POST){
//            //验证各种
//            $user_id = session('user_id');
//            //$user_id = 39454;
//            $business_obj = new BusinessModel();
//            if(!$business_obj->create($_POST)){
//                exit($business_obj->getError());
//            } else{
//                if($user_id){
//                    //设置参数
//                    $arr = array(
//                        "business_name" => $_POST['business_name'],
//                        "contacts" => $_POST['contacts'],
//                        "industry_id" => $_POST['industry_id'],
//                        "contact_number" => $_POST['contact_number'],
//                        "business_classify_id" => $_POST['business_classify_id'],
//                        "rate" => $_POST['rate']/100,
//                        "consumption" => $_POST['consumption'],
//                        "province_id" => $_POST['province_id'],
//                        "city_id" => $_POST['city_id'],
//                        "area_id" => $_POST['area_id'],
//                        "address" => $_POST['address'],
//                        "desc" => $_POST['desc'],
//                        "sign_pic" => $_POST['sign_pic'],
//                        "license_pic" => $_POST['license_pic'],
//                        "evn_pic" => $_POST['evn_pic'],
//                        "addtime" => time(),
//                        "status" => 5,
//                        "user_id" => $user_id,
//                    );
//
//                    $business_res = $business_obj->where("user_id='".$user_id."'")->find();
//                    if($business_res){
//                        //存在的话，修改
//                        $arr['addtime'] = $business_res['addtime'];
//                        $r = $business_obj->where("user_id='".$user_id."'")->save($arr);
//
//                    }else{
//                        //不存在，新添加
//                        $r = $business_obj->add($arr);
//                    }
//                    if($r!==false){
//                        exit("success");
//                    }
//                    exit("failure");
//                }else{
//                    $this->error("用户未登录");
//                }
//            }
//
//        }else{
//            //获取省份列表
//            $province = M('address_province');
//            $city_obj = new CityModel();
//            $area_obj = new AreaModel();
//            $province_list = $province->field('province_id, province_name')->select();
//
//            $business_classify = new BusinessClassifyModel();
//            $business_classify_list = $business_classify->getBusinessClassifyList("","serial");
//
//            $business_industry = new IndustryModel();
//            $business_industry_list = $business_industry->getindustryList("","serial");
//
//            $business_obj = new BusinessModel();
//            $where = "user_id='".session('user_id')."'";
//            $business = $business_obj->getBusinessInfo($where);
//            if($business){
//                $this->assign('business', $business);
//                $evn_pics = explode(",",$business['evn_pic']);
//                $this->assign('evn_pics', $evn_pics);
//            }
//
//            if($business['city_id']!=0){
//                $city_list = $city_obj->getCityList("","city_id='".$business['city_id']."'");
//                $this->assign('city_list', $city_list);
//            }
//
//            if($business['area_id']!=0){
//                $area_list = $area_obj->getAreaList("","area_id='".$business['area_id']."'");
//                $this->assign('area_list', $area_list);
//            }
//
//            $this->assign('province_list', $province_list);
//            $this->assign('business_classify_list', $business_classify_list);
//            $this->assign('business_industry_list', $business_industry_list);
//            $this->display();
//        }
//    }
    /*todo 收款二维码*/
    public function gathering_qr_code()
    {
        $this->display();
    }
//    /*todo 数据统计*/
//    public function data_statistics(){
//      $this->display();
//    }
//    /*todo 财务统计*/
//    public function financial_statistics(){
//      $this->display();
//    }
    /*todo 我的银行卡无*/
    public function my_bank_card_no()
    {
        $this->display();
    }


	/*****店都二期*****/
	//菜市场主页
	public function market_index()
    {
        $this->display();
    }
    //外卖列表页
	public function take_out_index()
    {
        $this->display();
    }
    //商家外卖
    public function take_out_shop()
    {
        $this->display();
    }
    //菜市场外卖
    public function market_shop()
    {
      $this->display();
    }
    //外卖商品详情、菜市场商品详情
    public function out_goods_details()
    {
        $this->display();
    }
    /*todo 提交订单*/
    public function submit_order()
    {
      $this->display();
    }
    //领取优惠券
    public function get_coupon()
    {
        $user_id=session('user_id');
        $order_id=$this->_get('order_id');
        $user_voucher_obj=new UserVouchersModel();
        $where='user_id = '.$user_id.' AND from_order_id = '.$order_id;
        $success=false;
        $success=$user_voucher_obj->getUserVouchersInfo($where);
        //echo $user_voucher_obj->getLastSql();
        $voucher_info='';
        if($success){
            $voucher_info=$success;
            $success= 1;//已领取
        }else{
            $success= 0;
        }
        //echo $success;
        $this->assign('voucher_info',$voucher_info);
        $this->assign('is_have',$success);
        //分享代码
        $share_obj = new ShareModel();
        $share=$share_obj->getShareInfo();
        $share_info['pic'] = $share['share_pic'];
        $share_info['head_title']=$share['share_title'];
        $share_info['desc']=$share['share_desc'];
        $this->assign('share_info', $share_info);
        $wx_share_link='http://'.$_SERVER['HTTP_HOST'].'/Index/get_coupon/order_id/'.$order_id;
        $this->assign('wx_share_link', $wx_share_link);
        $this->assign('order_id',$order_id);
        $this->display();
    }
    /**
     * 企业付款测试
     */
    public function rebate()
    {
        vendor("wxpay.WxPayPubHelper");
        $mchPay = new WxMchPay();
        // 用户openid
        $user_id = cur_user_id();
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo('openid');
        $mchPay->setParameter('openid', 'o7bmws_dlX6MYz1W_zguVlRsUOYA');
        // 商户订单号
        $mchPay->setParameter('partner_trade_no', 'test-' . time());
        // 校验用户姓名选项
        $mchPay->setParameter('check_name', 'NO_CHECK');
        // 企业付款金额  单位为分
        $mchPay->setParameter('amount', 100);
        // 企业付款描述信息
        $mchPay->setParameter('desc', '开发测试');
        // 调用接口的机器IP地址  自定义
        $mchPay->setParameter('spbill_create_ip', '127.0.0.1'); # getClientIp()
        // 收款用户姓名
        // $mchPay->setParameter('re_user_name', 'Max wen');
        // 设备信息
        // $mchPay->setParameter('device_info', 'dev_server');

        $data = $mchPay->getResult();
        log_file('pay_result = ' . json_encode($data), 'qiye_pay', true);
        if (!empty($data)) {
            if ($data['result_code'] == 'FAIL') {
                echo $data['err_code_des'];
            }
            dump($data);
            return $data;
        }
    }

    function go_near_business(){
        $data = get_place_by_ip();
        $local_longitude = $data['content']['point']['x'];
        $local_latitude = $data['content']['point']['y'];
        $business_obj = new BusinessModel();
        $near_vegetable_market_list =  $business_obj->getVeMarketListByDistance(
            $local_longitude,
            $local_latitude,
            'business_classify_id=25',
            0,
            100
        );
        $business_id=$near_vegetable_market_list[0]['business_id'];
        redirect('/FrontMerchant/take_out_shop/business_id/'.$business_id);
    }
}
