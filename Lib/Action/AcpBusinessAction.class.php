<?php

/**
 * acp后台商家类
 */
class AcpBusinessAction extends AcpAction
{
    /**
     * 初始化
     * @author cc
     * @return void
     * @todo 初始化方法
     */
    function _initialize()
    {
        parent::_initialize();
    }

    //商家列表
    function get_business_list($examine = '1', $out_status = '')
    {
        //因为用同一个页面,前端页面用该字段区分待审核的商家列表
        //1代表审核通过的商家，2代表审核未通过的，3代表冻结的商家，4代表待审核的商家
        $where = '1';
        if ($examine == '4') {
            $where .= ' AND status = 4';
            $this->assign('examine', 4);
        } else if ($examine == '3') {
            $where .= ' AND status = 3';
            $this->assign('examine', 3);
        } else if ($examine == '2') {
            $where .= ' AND status = 2';
            $this->assign('examine', 2);
        } else if ($examine == '1') {
            $where .= ' AND status = 1';
            $this->assign('examine', 1);
        }
        //外卖商家的状态
        if ($out_status == 1) {
            $where .= ' AND out_status=1';
        } elseif ($out_status == 2) {
            $where .= ' AND out_status=2';
        } elseif ($out_status == 3) {
            $where .= ' AND out_status=3';
        }

        if (IS_POST) {
            $key_words = $this->_request('key_words');
            $mobile = $this->_request('mobile');
            if ($key_words) {
                $where .= ' AND business_name LIKE "%' . $key_words . '%"';
            }
            if ($mobile) {
                $where .= ' AND contact_number LIKE "%' . $mobile . '%"';
            }
        }

        $business_obj = new BusinessModel();

        import('ORG.Util.Pagelist');
        $count = $business_obj->getBusinessNum($where);

        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $this->assign('url', $_SERVER['SERVER_NAME']);
        $business_obj->setStart($Page->firstRow);
        $business_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('page', $Page);
        $this->assign('show', $show);

        $business_list = $business_obj->getBusinessList($where, 'addtime desc');
      //  echo $business_obj->getLastSql();exit;
        //填充行业名字
        //获取店铺类型列表
        $business_classify_obj = new BusinessClassifyModel();
        $business_classify_list = $business_classify_obj->getBusinessClassifyList('isuse = 1');

        foreach ($business_list as $key => $val) {
            foreach ($business_classify_list as $key2 => $val2)
                if ($business_list[$key]['business_classify_id'] == $val2['business_classify_id']) {
                    $business_list[$key]['industry_name'] = $val2['business_classify_name'];
                }
        }

        /*//获取店铺类型列表
        $business_classify_obj = new BusinessClassifyModel();
        $business_classify_list = $business_classify_obj->getBusinessClassifyList('isuse = 1');*/

        $this->assign('business_classify_list', $business_classify_list);
        $this->assign('business_list', $business_list);
        $this->assign('key_words', $key_words);
        $this->assign('mobile', $mobile);
        $this->display('get_business_list');
    }

    //待审核的商家列表
    function get_examine_business_list()
    {
        $examine = '4';
        $this->assign('head_title', '待审核的商家列表');
        $this->get_business_list($examine);
    }

    //冻结的商家
    function freeze_business_list()
    {
        $examine = '3';
        $this->assign('head_title', '冻结的商家列表');
        $this->get_business_list($examine);
    }

    //审核未通过的商家
    function no_pass_business_list()
    {
        $examine = '2';
        $this->assign('head_title', '审核未通过的商家列表');
        $this->get_business_list($examine);
    }
    //外卖商家
    function take_out_business_list(){
        //审核通过的+外卖审核通过的
        $this->assign('head_title', '外卖商家列表');
        $this->get_business_list(BusinessModel::BUSINESS_PASS,BusinessModel::OUT_PASS);
    }
    //审核中的外卖商家
    function examine_take_out_business_list(){
        //审核通过的+外卖审核通过的
        $this->assign('head_title', '审核中的外卖商家列表');
        $this->get_business_list(BusinessModel::BUSINESS_PASS,BusinessModel::IS_REVIEW);
    }
    //外卖审核未通过的商家
    function no_pass_take_out_business_list()
    {
        $this->assign('head_title', '外卖审核未通过的商家列表');
        $this->get_business_list(BusinessModel::BUSINESS_PASS,BusinessModel::IS_NOT_PASS);
    }
    //编辑商家
    function edit_business()
    {
        $business_id = $this->_get('business_id');

        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);
        $address_arr=explode('-',$business_info['address']);
        $business_info['address1']=$address_arr[0];//地址
        $business_info['address2']=$address_arr[1];//详细地址
        //获取省市县名称
        $address_province_obj = new AddressProvinceModel();
        $business_info['province'] = $address_province_obj->getProvinceName($business_info['province_id']);
        $address_city_obj = new AddressCityModel();
        $business_info['city'] = $address_city_obj->getCityName($business_info['city_id']);
        $address_area_obj = new AddressAreaModel();
        $business_info['area'] = $address_area_obj->getAreaName($business_info['area_id']);

        //店铺分类
        $business_sort_obj = new BusinessClassifyModel();
        $business_sort_info = $business_sort_obj->getBusinessClassifyInfo($business_info['business_classify_id']);
        $business_info['business_classify'] = $business_sort_info['business_classify_name'];


        //店铺行业，分类列表
        $business_classify = new BusinessClassifyModel();
        $business_classify_list = $business_classify->getBusinessClassifyList("", "serial");

        $business_industry = new IndustryModel();
        $business_industry_list = $business_industry->getindustryList("", "serial");

        //获取省份列表
        $province = M('address_province');
        $province_list = $province->field('province_id, province_name')->select();
        $this->assign('province_list', $province_list);

        //获取市列表
        $city = M('address_city');
        $city_list = $city->field('city_id, city_name')->where('province_id = ' . $business_info['province_id'])->select();
        $this->assign('city_list', $city_list);

        //获取区列表
        $area = M('address_area');
        $area_list = $area->field('area_id, area_name')->where('city_id = ' . $business_info['city_id'])->select();
        $this->assign('area_list', $area_list);

        $this->assign('business_classify_list', $business_classify_list);
        $this->assign('business_industry_list', $business_industry_list);

        //编辑
        if (IS_POST) {
            $data = $this->_post();
            if ($business_obj->create()) {
                $business_id = $data['business_id'];
                unset($data['business_id']);
                if (!$data['evn_pic']) {
                    $this->error('请添加轮播图');
                }

//                $config = $this->system_config;
//                $data['rate'] = $config['ALL_BUSINESS_RATE']/100;
//                var_dump($data['rate']);
//                exit();
                $data['rate'] = $data['rate'] / 100;
                //让利比例不能超过100%
                if ($data['rate'] > 1) {
                    $data['rate'] = 1;
                }
                $bank_card_data_id=$data['bank_card_data_id'];
                $bank_card_data=array(
                    'bank_id'=>$data['bank_id'],
                    'account'=>$data['card_number'],
                    'id_card_no'=>$data['id_card'],
                    'opening_bank'=>$data['bank_branch'],
                    'realname'=>$data['realname']
                );
                unset($data['bank_id']);
                unset($data['card_number']);
                unset($data['id_card']);
                unset($data['bank_branch']);
                unset($data['realname']);
                unset($data['bank_card_data_id']);
                $data['address']=$data['address'].'-'.$data['address_detail'];
                $bank_card_obj = new BankCardModel();
                $bank_card_obj->editBankCard($bank_card_data_id,$bank_card_data);
               // echo $bank_card_obj->getLastSql();exit;
                $data['evn_pic'] = implode(',', $data['evn_pic']);
                if ($data['province_id'] == 0 || $data['city_id'] == 0 || $data['area_id'] == 0) {
                    $this->error('请选择省市区');
                }
                $result = $business_obj->editBusiness($business_id, $data);
                if ($result !== false) {
                    $this->success('编辑成功', '/AcpBusiness/get_business_list');
                } else {
                    $this->error('编辑失败');
                }
            } else {
                $this->error($business_obj->getError());
            }
        }

        $this->assign('sign_pic', array(
            'title' => '店招图',
            'batch' => false,
            'name' => 'sign_pic',
            'help' => '<front style="color: red">添加封面图，建议上传长宽比为1:1的图片<front style="color: red">',
            'url' => $business_info['sign_pic'],
        ));
        $evn_pic = array(
            'title' => '轮播图',
            'batch' => true,
            'name' => 'evn_pic',
            'help' => '<front style="color: red">添加轮播图，建议上传长宽比为1:1的图片</front>',
        );

        if ($business_info['evn_pic']) {
            $evn_pic['pic_arr'] = explode(',', $business_info['evn_pic']);
        }
        $this->assign('evn_pic', $evn_pic);
        $this->assign('license_pic', array(
            'title' => '营业执照',
            'batch' => false,
            'name' => 'license_pic',
            'help' => '<front style="color: red">添加轮播图，建议上传长宽比为1:1的图片</front>',
            'url' => $business_info['license_pic'],
        ));
        $bank_obj = new BankModel();
        $bank_list = $bank_obj->getBankList();
        $this->assign('bank_list', $bank_list);

        $bank_card_obj = new BankCardModel();
        $bank_card_info=$bank_card_obj->getBankCardInfo('user_id = '.$business_info['user_id']);
       // echo json_encode($bank_card_info);exit;
        $this->assign('bank_card_info',$bank_card_info);
        $this->assign('business_info', $business_info);
        $this->assign('head_title', '编辑商家');
        $this->display();
    }

    //修改进件信息
    function do_updatemch(){
        $business_id = $this->_post('business_id');
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);
        if($business_id){
            if(!$business_info['mch_id']) {//没有mch_id才进件
                $mspay_obj=new MsPayModel();
                $result=$mspay_obj->get_mch_id($business_id);//返回的是mch_id,第一次进件
                if ($result) {
                    $business_obj->editBusiness($business_id, array('mch_id' => $result));
                } else {
                    $return_data = array(
                        'code' => -1,
                        'msg' => '进件失败,该手机号已经进过件',
                    );
                    echo json_encode($return_data);
                    exit;
                }
            }else{
                $mspay_obj=new MsPayModel();
                $result=$mspay_obj->edit_mch_info($business_info['mch_id'],$business_id);//修改进件信息
                if (!$result) {
                    $return_data = array(
                        'code' => -1,
                        'msg' => '修改进件信息失败,信息正在审核中！请过段时间操作',
                    );

                }else{

//                    $data = array(
//                        'mch_status'=>3,//进件审核状态
//                    );
//
//                    $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态

                    $return_data = array(
                        'code' => 0,
                        'msg' => '修改进件信息成功,等待重新审核通过',
                    );
                }

                echo json_encode($return_data);
                exit;
            }
        }
    }

    //添加商家
    function add_business()
    {

        //店铺行业，分类列表
        $business_classify = new BusinessClassifyModel();
        $business_classify_list = $business_classify->getBusinessClassifyList("", "serial");

        $business_industry = new IndustryModel();
        $business_industry_list = $business_industry->getindustryList("", "serial");

        //获取省份列表
        $province = M('address_province');
        $province_list = $province->field('province_id, province_name')->select();
        $this->assign('province_list', $province_list);

        //获取市列表
        $city = M('address_city');
        $city_list = $city->field('city_id, city_name')->where('province_id = ' . $business_info['province_id'])->select();
        $this->assign('city_list', $city_list);

        //获取区列表
        $area = M('address_area');
        $area_list = $area->field('area_id, area_name')->where('city_id = ' . $business_info['city_id'])->select();
        $this->assign('area_list', $area_list);

        $this->assign('business_classify_list', $business_classify_list);
        $this->assign('business_industry_list', $business_industry_list);


        //初始化图片上传控件
        $this->assign('sign_pic', array(
            'title' => '店招图',
            'batch' => false,
            'name' => 'sign_pic',
            'help' => '<front style="color: red">添加封面图，建议上传长宽比为1:1的图片<front style="color: red">',
            'url' => '',
        ));
        $evn_pic = array(
            'title' => '轮播图',
            'batch' => true,
            'name' => 'evn_pic',
            'help' => '<front style="color: red">添加轮播图，建议上传长宽比为1:1的图片</front>',
        );

        $this->assign('evn_pic', $evn_pic);
        $this->assign('license_pic', array(
            'title' => '营业执照',
            'batch' => false,
            'name' => 'license_pic',
            'help' => '<front style="color: red">添加轮播图，建议上传长宽比为1:1的图片</front>',
            'url' => '',
        ));

        $business_obj = new BusinessModel();
        //添加
        if (IS_POST) {
            //die();
            $data = $this->_post();
//            var_dump($data);
//            die('开始添加店铺...开发中');
            if($data['business_classify_id']==25){
                $data['is_open']=1;
            }
//                echo json_encode($data);exit;
            if ($business_obj->create()) {
                //$business_id=$data['business_id'];
                if (!$data['username']) {
                    $this->error('请输入用户名');
                }
                if (!$data['password']) {
                    $this->error('请输入密码');
                }
                //echo json_encode($data);exit;

                //创建一个用户
                $user_obj = new UserModel();
                //注册该用户，并标注为已关注
                $arr = array(
                    'role_type' => 3,
                    'is_enable' => 1,
                    'subscribe' => 1,
                    'reg_time' => time(),
                    'headimgurl' => '',
                    'nickname' => '后台添加的商铺用户',
                    'city' => '温州',
                    'province' => '浙江',
                    'username' => $data['username'],
                    'password' => md5($data['password']),
                );

                /*$user_info = $user_obj->getUserInfo('', 'username="' . $data['username'] . '"');
                if ($user_info) {
                    $this->error('用户名已存在');
                }*/
                $user_id = $user_obj->addUser($arr);
                if (!$user_id) {
                    $this->error('用户信息添加失败');
                }
                $data['user_id'] = $user_id;

                if (!$data['longitude'] || !$data['latitude']) {
                    $this->error('请在地图上选择位置');
                }

                if (!$data['realname']) {
                    $this->error('请输入持卡人');
                }

                if (!$data['bank_id']) {
                    $this->error('请选择银行');
                }
                if (!$data['bank_branch']) {
                    $this->error('请输入开户行');
                }
                if (!$data['card_number']) {
                    $this->error('请输入银行卡卡号');
                }
                log_file('card_number:' . $data['card_number'], 'add_business');
                $data['card_number'] = $this->strFilter($data['card_number']);

                unset($data['business_id']);
                if (!$data['evn_pic']) {
                    $this->error('请添加轮播图');
                }

                $data['rate'] = $data['rate'] / 100;
                //让利比例不能超过100%
                if ($data['rate'] > 1) {
                    $data['rate'] = 1;
                }

                $data['evn_pic'] = implode(',', $data['evn_pic']);
                if ($data['province_id'] == 0 || $data['city_id'] == 0 || $data['area_id'] == 0) {
                    $this->error('请选择省市区');
                }

                //绑定银行卡
                $bank_card_obj = new BankCardModel();
                $card_arr = array(
                    'user_id' => $user_id,
                    'bank_id' => $data['bank_id'],
                    'realname' => $data['realname'],
                    'opening_bank' => $data['bank_branch'],
                    'bind_time' => time(),
                    'account' => $data['card_number'],
                    'id_card_no'=>$data['id_card']
                );
                log_file('card_arr:' . json_encode($card_arr), 'add_business');
                $res = $bank_card_obj->addBankCard($card_arr);

                if (!$res) {
                    $this->error('银行卡信息添加失败');
                }

                //添加余下信息
                $data['addtime'] = time();
                $data['status'] = 4;
                $data['address'] = $data['address'].'-'.$data['address'];
//                $data['longitude'] = 120.019117;
//                $data['latitude'] = 30.283613;
//                $config = $this->system_config;
//                $data['rate'] = $config['ALL_BUSINESS_RATE']/100;
                //添加商店
                $result = $business_obj->addBusiness($data);
                if ($result) {
                    $this->success('添加成功', '/AcpBusiness/get_business_list');
                } else {
                    $this->error('添加失败');
                }
            } else {
                $this->error($business_obj->getError());
            }
        }

        $bank_obj = new BankModel();
        $bank_list = $bank_obj->getBankList();
        $this->assign('bank_list', $bank_list);

        $this->display();
    }

    function strFilter($str)
    {
        $str = str_replace('.', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('-', '', $str);
        return trim($str);
    }

    //待审核店铺的详情
    function examine_business_detail()
    {
        $business_id = $this->_get('business_id');
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id=' . $business_id);
        if($business_info['business_license_type']=='NATIONAL_LEGAL_MERGE'){
            $business_info['business_license_type']='营业执照（多证合一）';
        }if($business_info['business_license_type']=='NATIONAL_LEGAL'){
            $business_info['business_license_type']='营业执照';
        }if($business_info['business_license_type']=='INST_RGST_CTF'){
            $business_info['business_license_type']='事业单位法人证书';
        }
        //获取省市县名称
        $address_province_obj = new AddressProvinceModel();
        $business_info['province'] = $address_province_obj->getProvinceName($business_info['province_id']);
        $address_city_obj = new AddressCityModel();
        $business_info['city'] = $address_city_obj->getCityName($business_info['city_id']);
        $address_area_obj = new AddressAreaModel();
        $business_info['area'] = $address_area_obj->getAreaName($business_info['area_id']);

        //店铺分类
        $business_sort_obj = new BusinessClassifyModel();
        $business_sort_info = $business_sort_obj->getBusinessClassifyInfo($business_info['business_classify_id']);
        $business_info['business_classify'] = $business_sort_info['business_classify_name'];

        if ($business_info['evn_pic']) {
            $evn_pic = explode(',', $business_info['evn_pic']);
        }
        $this->assign('evn_pic', $evn_pic);
        $this->assign('business_info', $business_info);
        $this->assign('head_title', '待审核店铺详情');
        $this->display();
    }


    //店铺审核的办法
    function examine()
    {
        $business_id = $this->_post('business_id');
        $flag = $this->_post('flag');

        $business_obj = new BusinessModel();
        $business_info=$business_obj->getBusinessInfo('business_id = '.$business_id);
        if ($flag == 'true') {
            if(!$business_info['mch_id']) {//没有mch_id才进件
                $mspay_obj=new MsPayModel();
                $result=$mspay_obj->get_mch_id($business_id);//返回的是mch_id,第一次进件
                if ($result) {
                    $business_obj->editBusiness($business_id, array('mch_id' => $result));
                } else {
                    $return_data = array(
                        'code' => -1,
                        'msg' => '审核失败,进件失败,该手机号已经进过件',
                    );
                    echo json_encode($return_data);
                    exit;
                }
            }else{
                $mspay_obj=new MsPayModel();
                $result=$mspay_obj->edit_mch_info($business_info['mch_id'],$business_id);//修改进件信息
                if (!$result) {
                    $return_data = array(
                        'code' => -1,
                        'msg' => '审核失败,信息正在审核中！请过段时间操作',
                    );
                    echo json_encode($return_data);
                    exit;
                }
            }
            log_file(json_encode($result),'into_pieces');

            $data = array(
                'status' => 1,
                'mch_status'=>3,//进件审核状态
                'is_use'=>1
            );
            if($business_info['business_classify_id']==25){//是菜市场
                $data = array(
                    'status' => 1,
                    'is_out'=> 1,
                    'mch_status'=>3,
                    'is_use'=>1
                );
            }
            $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
            if ($result) {
                $user_id = $business_obj->getBusinessField($business_id, 'user_id');
                $user_obj = new UserModel($user_id);
                $user_info = $user_obj->getUserInfo('', 'user_id = ' . $user_id);//取出数据,把用户的手机号变为用户名
                if ($user_info['role_type'] == 3 && $user_info['is_merchant'] == 1) {
                    $return_data = array(
                        'code' => -1,
                        'msg' => '审核失败,该用户已经是商家',
                    );
                    $business_obj->editBusiness($business_id, array('status' => 4));//回滚一下
                    echo json_encode($return_data);
                    exit;
                }
                if ($user_info['first_agent_id']) {
                    $arr = array(
                        'is_merchant' => 1,
                        'second_agent_id' => $user_info['first_agent_id'],
                    );
                } else {
                    $arr = array(
                        'is_merchant' => 1,
                    );
                }
                log_file('修改前用户推荐人:'.$user_info['first_agent_id'],'examine');
                log_file('修改前商家推荐人:'.$user_info['second_agent_id'],'examine');
                if ($user_obj->editUserInfo($arr)) {
                    $user_info = $user_obj->getUserInfo('', 'user_id = ' . $user_id);
                    log_file('修改后用户推荐人:'.$user_info['first_agent_id'],'examine');
                    log_file('修改后商家推荐人:'.$user_info['second_agent_id'],'examine');
                    log_file('edit_sql:'.$user_obj->getLastSql(),'examine');
                    $focus_business_user_list=$user_obj->getUserList('','first_agent_id = '.$user_id);//该商家推荐的用户,自动关注该商家
                    if($focus_business_user_list){
                        foreach($focus_business_user_list as $k=>$v){
                            collect($business_id,$v['user_id'],true);
                        }
                    }

                    $order_obj = new OrderModel();
                    $order_info = $order_obj->getOrderByInfo('', 'order_status = 1 and business_id = ' . $business_id . ' and type = 3');


                    commission($order_info['order_id'], 3);//通过审核,各级代理分钱

                    //推送店铺外卖审核成功4
                    $user_obj=new UserModel($user_id);
                    $user_info=$user_obj->getUserInfo('nickname,username','user_id = '.$user_id);
                    $msg = array(
                        "first" => "尊敬的用户，您的店铺已通过审核",
                        "keyword1" => $user_info['nickname'],
                        "keyword2" => $user_info['username'],
                        "keyword3" => "审核通过",
                        "keyword4" => "--",
                        "remark" => "感谢您的使用",
                        "url"=>"dd.diandupt.com/FrontUserCenter/person_center",
                    );
                    PushModel::wxPush($user_id, 'literature_review', $msg);

                    $return_data = array(
                        'code' => 1,
                        'msg' => '审核通过成功',
                    );
                } else {
                    log_file('edit_sql:'.$user_obj->getLastSql(),'examine');
                    $return_data = array(
                        'code' => -1,
                        'msg' => '审核通过失败',
                    );
                }
                echo json_encode($return_data);
                exit;
            } else {
                $return_data = array(
                    'code' => -1,
                    'msg' => '审核通过失败',
                );
                echo json_encode($return_data);
                exit;
            }
        } else {

            $data = array(
                'status' => 2,
                'reg_time' => time(),
            );
            $order_obj = new OrderModel();
            $order_info = $order_obj->getOrderByInfo('', 'order_status = 1 and business_id = ' . $business_id . ' and type = 3');
            $wx_pay_obj = new WXPayModel();

            if ($wx_pay_obj->wx_refund($order_info['pay_code'], /*$order_info['pay_amount']*/0.01)) {
                $account_obj=new AccountModel();
                log_file('orderInfo = ' . json_encode($order_info), 'wxpay');
                $business_user_id = $business_obj->getBusinessField($business_id, 'user_id');
                $account_obj->addRefundAccount($business_user_id,AccountModel::REFUND,0,'商家审核拒绝失败,微信退款'.$order_info['pay_amount'].'元',$order_info['order_id'],$order_info['pay_code']);
                $order_obj->editOrderInfo($order_info['order_id'],array('order_status'=>7));
                $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
                $return_data = array(
                    'code' => 1,
                    'msg' => '审核拒绝成功,申请费已返还给用户',
                );

                $user_id = $business_obj->getBusinessField($business_id, 'user_id');

                //推送店铺外卖审核成功4
                $user_obj=new UserModel($user_id);
                $user_info=$user_obj->getUserInfo('nickname,username','user_id = '.$user_id);
                $msg = array(
                    "first" => "尊敬的用户，您的店铺未通过审核",
                    "keyword1" => $user_info['nickname'],
                    "keyword2" => $user_info['username'],
                    "keyword3" => "审核未通过",
                    "keyword4" => "请确认资料是否有误",
                    "remark" => "感谢您的使用",
                    "url"=>"dd.diandupt.com/FrontUserCenter/person_center",
                );
                PushModel::wxPush($user_id, 'literature_review', $msg);
               /* $msg = array(
                    "first" => "尊敬的客户，您的店铺申请被拒绝，已退款",
                    "keyword1" => "审核未通过",
                    "keyword2" => $order_info['pay_amount'],
                    "remark" => "请修改相关信息重新申请"
                );

                PushModel::wxPush(intval($user_id), 'refund', $msg);*/


                echo json_encode($return_data);
                exit;
            } else {
                $return_data = array(
                    'code' => -1,
                    'msg' => '审核拒绝失败',
                );
                echo json_encode($return_data);
                exit;
            }
        }
    }
    //店铺审核的办法
    function examine_take_out()
    {
        $business_id = $this->_post('business_id');
        $flag = $this->_post('flag');

        $business_obj = new BusinessModel();
        if ($flag == 'true') {
            $data = array(
                'is_out'=>1,
                'out_status' => 1
            );
            $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
            if ($result) {
                $user_id = $business_obj->getBusinessField($business_id, 'user_id');

                //推送店铺外卖审核成功
                $user_obj=new UserModel($user_id);
                $user_info=$user_obj->getUserInfo('nickname,username','user_id = '.$user_id);
                $msg = array(
                    "first" => "尊敬的用户，您的店铺外卖已通过审核",
                    "keyword1" => $user_info['nickname'],
                    "keyword2" => $user_info['username'],
                    "keyword3" => "审核通过",
                    "keyword4" => "--",
                    "remark" => "感谢您的使用",
                    "url"=>"dd.diandupt.com/FrontUserCenter/person_center",
                );
                PushModel::wxPush($user_id, 'literature_review', $msg);
                $return_data = array(
                    'code' => 1,
                    'msg' => '审核通过成功',
                );
                echo json_encode($return_data);
               // PushModel::wxPush(intval($user_id), 'literature_review', $msg);
                exit;
            }else{
                $return_data = array(
                    'code' => -1,
                    'msg' => '审核通过失败',
                );
                echo json_encode($return_data);
            }

        } else {
            $data = array(
                'out_status' => 3,
            );
            $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
            if ($result) {


                $user_id = $business_obj->getBusinessField($business_id, 'user_id');

//                $msg = array(
//                    "first" => "尊敬的客户，您申请的店铺外卖功能被拒绝",
//                    "keyword1" => "审核未通过",
//                    "remark" => "请修改相关信息重新申请"
//                );

               // PushModel::wxPush(intval($user_id), 'refund', $msg);

                $return_data = array(
                    'code' => 1,
                    'msg' => '审核拒绝成功',
                );
                //推送店铺外卖审核成功
                $user_obj=new UserModel($user_id);
                $user_info=$user_obj->getUserInfo('nickname,username','user_id = '.$user_id);
                $msg = array(
                    "first" => "尊敬的用户，您的店铺外卖未通过审核",
                    "keyword1" => $user_info['nickname'],
                    "keyword2" => $user_info['username'],
                    "keyword3" => "审核未通过",
                    "keyword4" => "--",
                    "remark" => "感谢您的使用",
                    "url"=>"dd.diandupt.com/FrontUserCenter/person_center",
                );
                PushModel::wxPush($user_id, 'literature_review', $msg);

                echo json_encode($return_data);
               // PushModel::wxPush(intval($user_id), 'refund', $msg);
                exit;
            } else {
                $return_data = array(
                    'code' => -1,
                    'msg' => '审核拒绝失败',
                );
                echo json_encode($return_data);
                exit;
            }
        }
    }
//审核未通过商家的详情
    function no_pass_business_detail()
    {
        $business_id = $this->_get('business_id');
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);

        //获取省市县名称
        $address_province_obj = new AddressProvinceModel();
        $business_info['province'] = $address_province_obj->getProvinceName($business_info['province_id']);
        $address_city_obj = new AddressCityModel();
        $business_info['city'] = $address_city_obj->getCityName($business_info['city_id']);
        $address_area_obj = new AddressAreaModel();
        $business_info['area'] = $address_area_obj->getAreaName($business_info['area_id']);

        //店铺分类
        $business_sort_obj = new BusinessClassifyModel();
        $business_sort_info = $business_sort_obj->getBusinessClassifyInfo($business_info['business_classify_id']);
        $business_info['business_classify'] = $business_sort_info['business_classify_name'];

        if ($business_info['evn_pic']) {
            $evn_pic = explode(',', $business_info['evn_pic']);
        }
        $this->assign('evn_pic', $evn_pic);
        $this->assign('business_info', $business_info);
        $this->assign('head_title', '审核未通过店铺详情');
        $this->display();
    }

    //恢复到待审核的办法
    function no_pass()
    {
        $business_id = $this->_post('business_id');
        $flag = $this->_post('flag');

        $business_obj = new BusinessModel();
        if ($flag == 'true') {
            $data = array(
                'status' => 2
            );
            $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
            if ($result) {
                /*$user_id=$business_obj->getBusinessField($business_id,'user_id');
                $user_obj=new UserModel($user_id);
                $user_info=$user_obj->getUserInfo('','user_id = '.$user_id);//取出数据,把用户的手机号变为用户名
                if($user_info['role_type']==3&&$user_info['is_merchant']==1){
                    $return_data=array(
                        'code'=>-1,
                        'msg'=>'审核失败,该用户已经是商家',
                    );
                    $business_obj->editBusiness($business_id,array('status'=>4));//回滚一下
                    echo json_encode($return_data);
                    exit;
                }
                $arr=array(
                    'role_type'=>2,
                    'username'=>$user_info['mobile'],
                    'password'=>md5('123456'),//初始密码
                );
                if($user_obj->editUserInfo($arr)){
                    $return_data=array(
                        'code'=>1,
                        'msg'=>'恢复待审核通过成功',
                    );
                }else{
                    $return_data=array(
                        'code'=>-1,
                        'msg'=>'恢复待审核通过失',
                    );
                }
                echo json_encode($return_data);
                exit;*/
                $return_data = array(
                    'code' => 1,
                    'msg' => '恢复待审核成功',
                );
            } else {
                $return_data = array(
                    'code' => -1,
                    'msg' => '恢复待审核失败',
                );

            }
            echo json_encode($return_data);
            exit;
        } else {
            $data = array(
                'status' => 4
            );
            $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
            if ($result) {
                $return_data = array(
                    'code' => 1,
                    'msg' => '恢复待审核成功',
                );
                echo json_encode($return_data);
                exit;
            }
        }
    }

    //冻结的商家的详情
    function freeze_business_detail()
    {
        $business_id = $this->_get('business_id');
        $business_obj = new BusinessModel();
        $business_info = $business_obj->getBusinessInfo('business_id = ' . $business_id);

        //获取省市县名称
        $address_province_obj = new AddressProvinceModel();
        $business_info['province'] = $address_province_obj->getProvinceName($business_info['province_id']);
        $address_city_obj = new AddressCityModel();
        $business_info['city'] = $address_city_obj->getCityName($business_info['city_id']);
        $address_area_obj = new AddressAreaModel();
        $business_info['area'] = $address_area_obj->getAreaName($business_info['area_id']);

        //店铺分类
        $business_sort_obj = new BusinessClassifyModel();
        $business_sort_info = $business_sort_obj->getBusinessClassifyInfo($business_info['business_classify_id']);
        $business_info['business_classify'] = $business_sort_info['business_classify_name'];

        if ($business_info['evn_pic']) {
            $evn_pic = explode(',', $business_info['evn_pic']);
        }
        $this->assign('evn_pic', $evn_pic);
        $this->assign('business_info', $business_info);
        $this->assign('head_title', '冻结的商家的详情');
        $this->display();
    }

    //解除冻结的办法
    function freeze()
    {
        $business_id = $this->_post('business_id');
        $flag = $this->_post('flag');

        $business_obj = new BusinessModel();
        if ($flag == 'false') {
            $data = array(
                'status' => 1
            );
            $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
            if ($result) {
                $return_data = array(
                    'code' => 1,
                    'msg' => '解除冻结成功',
                );
                echo json_encode($return_data);
                exit;
            }
        }
    }

    //冻结商家的办法
    function freeze_business()
    {
        $business_id = $this->_post('business_id');
        $flag = $this->_post('flag');

        $business_obj = new BusinessModel();
        if ($flag == 'false') {
            $data = array(
                'status' => 3
            );
            $result = $business_obj->editBusiness($business_id, $data);//改变状态商家的状态
            if ($result) {
                $return_data = array(
                    'code' => 1,
                    'msg' => '冻结商家成功',
                );
                echo json_encode($return_data);
                exit;
            }
        }
    }

    //商家分类列表
    function business_sort_list()
    {
        $business_sort_obj = new BusinessClassifyModel();

        import('ORG.Util.Pagelist');
        $count = $business_sort_obj->getBusinessClassifyNum();
        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $business_sort_obj->setStart($Page->firstRow);
        $business_sort_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('page', $Page);
        $this->assign('show', $show);

        $business_sort_list = $business_sort_obj->getBusinessClassifyList();
        $this->assign('business_sort_list', $business_sort_list);
        $this->assign('head_title', '商家分类列表');
        $this->display();
    }

    //添加商家分类
    function add_business_sort()
    {

        if (IS_POST) {
            $arr = $this->_post();
            $business_sort_obj = new BusinessClassifyModel();
            $result = $business_sort_obj->addBusinessClassify($arr);
            if ($result) {
                $this->success('编辑成功', '/AcpBusiness/business_sort_list');
            } else {
                $this->error('编辑失败');
            }

        }
        $this->assign('pic_data', array(
            'title' => '店招图',
            'batch' => false,
            'name' => 'img_url',
            'help' => '添加封面图',
        ));
        $this->assign('head_title', '添加商家分类');
        $this->display();
    }

    //删除商家
    function del_business()
    {
        $ids = $this->_post('obj_id');
        $business_obj = new BusinessModel();
        $idarr = explode(',', $ids);
        /*if(count($idarr)>1){
            array_pop($idarr);//删除元素最后一个元素
        }*/


        foreach ($idarr as $id) {
            $arr = array(
                'status' => 0
            );
            //$r=$business_obj->delBusiness($id);
            $r = $business_obj->setBusiness($id, $arr);
            if ($r === false) {
                echo 'fail';
                exit;
            }
        }
        echo 'success';
        exit;
    }

    //商家推荐
    function get_business_recommend()
    {
        $type = $this->_get('type');//1代表推荐的人,2代表推荐的店
        $user_id = $this->_get('user_id');
        $user_obj = new UserModel();
        if ($type == 1) {
            $where = 'role_type=3 and first_agent_id = ' . $user_id;
        } else if ($type == 2) {
            $where = 'is_merchant=1 and role_type=3 and second_agent_id = ' . $user_id;
        }

        $mobile = $this->_request('mobile');
        if ($mobile) {
            $where .= ' AND mobile LIKE "%' . $mobile . '%"';
        }


        $nickname = $this->_request('nickname');
        if ($nickname) {
            $where .= ' AND nickname LIKE "%' . $nickname . '%"';
        }

        /*注册时间begin*/
        //起始时间
        $start_time = $this->_request('start_time');
        $start_time = str_replace('+', ' ', $start_time);
        $start_time = strtotime($start_time);
        #echo $start_time;
        if ($start_time) {
            $where .= ' AND reg_time >= ' . $start_time;
        }

        //结束时间
        $end_time = $this->_request('end_time');
        $end_time = str_replace('+', ' ', $end_time);
        $end_time = strtotime($end_time);
        if ($end_time) {
            $where .= ' AND reg_time <= ' . $end_time;
        }

        $this->assign('mobile', $mobile);
        $this->assign('nickname', $nickname);
        $this->assign('start_time', $start_time ? $start_time : '');
        $this->assign('end_time', $end_time ? $end_time : '');


        //分页处理
        import('ORG.Util.Pagelist');
        $count = $user_obj->getUserNum($where);
        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $user_obj->setStart($Page->firstRow);
        $user_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('show', $show);
        $user_list = $user_obj->getUserList('', $where);
        if ($type == 1) {
            $this->assign('user_list', $user_list);
            $this->assign('head_title', 'ta推荐的人');
            $this->display('get_business_recommend');
        } else if ($type == 2) {
            if ($user_list) {
                foreach ($user_list as $k => $v) {
                    $ids_arr[] = $v['user_id'];
                }
                $ids = implode(',', $ids_arr);//先取成为商家的用户id
                $business_obj = new BusinessModel();
                $where = 'user_id in (' . $ids . ')';
                if (IS_POST) {
                    $key_words = $this->_post('key_words');//商家名
                    $contact_number = $this->_post('contact_number');
                    if ($key_words) {
                        $where .= ' AND business_name LIKE "%' . $key_words . '%"';
                    }
                    if ($contact_number) {
                        $where .= ' AND contact_number LIKE "%' . $contact_number . '%"';
                    }
                }
                $business_list = $business_obj->getBusinessList($where);//再去商家表根据user_id取数据

            } else {
                $business_list = array();
            }
            $this->assign('key_words', $key_words);
            $this->assign('contact_number', $contact_number);
            $this->assign('business_list', $business_list);
            $this->assign('head_title', 'ta推荐的店铺');
            $this->display('get_business_recommend_business');//商店推荐的商店
        }

    }

    public function get_city()//市联动
    {
        $province_id = $this->_post('province_id');
        $city_obj = new AddressCityModel();
        $city_list = $city_obj->getCity($province_id);//市信息
        echo json_encode($city_list);
        exit;
    }

    public function get_area()//区联动
    {
        $city_id = $this->_post('city_id');
        $area = M('address_area');
        $area_list = $area->field('area_id,area_name')->where('city_id = ' . $city_id)->select();

        echo json_encode($area_list);
        exit;
    }

    //设置模板商家
    function set_tpl_business()
    {
        $tpl_business_id = $this->_post('tpl_business_id');//模板商家id
        $business_classify_id = $this->_post('business_classify_id');//店铺类型id
        $business_classify_obj = new BusinessClassifyModel();
        $business_classify_info = $business_classify_obj->getBusinessClassifyInfo($business_classify_id);
        $old_tpl_business_id = $business_classify_info['tpl_business_id'];//原先的模板商家id,若无则为0
        $result = $business_classify_obj->editBusinessClassify($business_classify_id, array('tpl_business_id' => $tpl_business_id));
        if ($result) {
            $business_obj = new BusinessModel();//修改商家表中is_tpl字段
            $business_obj->editBusiness($tpl_business_id, array('is_tpl' => 1));//模板商家置1
            if ($old_tpl_business_id) {
                $business_obj->editBusiness($old_tpl_business_id, array('is_tpl' => 0));//原先模板商家置0
            }
            echo 'success';
        } else {
            echo 'fail';
        }
    }

    function is_use(){
        $business_id = $this->_post('business_id');
        $change_to = $this->_post('change_to');
        $business_obj = new BusinessModel();
        $result = $business_obj->editBusiness($business_id,array('is_use'=>$change_to?$change_to:0));
        if($result){
            $return_data=array(
              'code'=>1,
                'msg'=>'修改成功'
            );
        }else{
            $return_data=array(
                'code'=>-1,
                'msg'=>/*'修改失败'*/$business_obj->getLastSql()
            );
        }
        echo json_encode($return_data);exit;
    }
}