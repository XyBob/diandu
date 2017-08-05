<?php
/**
 * 店铺分类控制器
 */

class FrontIndexAction extends FrontAction
{
    public function FrontIndexAction()
    {
        parent::_initialize();
        $this->LUNBO_NUM=3;
        $this->recommend_num=5;//推荐展示条数
        $config_obj = new ConfigBaseModel();
        $this->range = $config_obj->getConfig('range');//距离范围
        $this->near_num=5;//附近店铺展示条数
    }

    /*
     * 计算距离
     */
    function getDistance($latitude1, $lng1, $latitude2, $lng2){

        //将角度转为狐度
        $radlatitude1=deg2rad($latitude1);//deg2rad()函数将角度转换为弧度
        $radlatitude2=deg2rad($latitude2);
        $radLng1=deg2rad($lng1);
        $radLng2=deg2rad($lng2);
        $a=$radlatitude1-$radlatitude2;
        $b=$radLng1-$radLng2;
        $s=2*asin(sqrt(pow(sin($a/2),2)+cos($radlatitude1)*cos($radlatitude2)*pow(sin($b/2),2)))*6378.137;
        return $s;
    }
    public function home_index(){
        //1定位，选择开通地区

        $local_latitude=30.28911;
        $local_longitude=120.015243;
        //通过定位获取地区
        $area_id=11;
        session('area_id',$area_id);
        //$where='area_id=
        $where='';
        //2轮播
        $cust_flash_obj = new CustFlashModel();
        $cust_flash_list = $cust_flash_obj->getCustFlashList('','isuse=1','serial ASC',$this->LUNBO_NUM);
        //dump($cust_flash_list);
        //3店铺分类,展示启用的
        $Store_type_obj = new StoreTypeModel();
        $store_type_list = $Store_type_obj->getStoreTypeList('', 'isuse=1', 'serial ASC');
        //dump($store_type_list);
        //4推荐店铺,以让利排序，
        $bussiness_obj=new BusinessModel();
        $store_recommend_list=$bussiness_obj->getBusinessList($where,'rate desc',$this->recommend_num);
        //dump($bussiness_list);
        //5人气产品,二期添加

        //6附近店铺，位置距离计算，获取每个店铺的经纬度和当前的经纬度,这里加上筛选县区
        $bussiness_list=$bussiness_obj->getBusinessList($where,'');
        foreach($bussiness_list as $v){
             $distance=$this->getDistance($local_latitude,$local_longitude,$v['latitude'],$v['longitude']);
             if ($distance<$this->range){
                 $c=$v['id'];
                 $bussiness_one=$bussiness_obj->getOneBusiness("business_id=$c");
                 $bussiness_one['distance']=$distance;
                 $bussiness_local_lists[]=$bussiness_one;
             }
        }
        session('bussiness_local_lists',$bussiness_local_lists);
        $total=count($bussiness_local_lists);
        //取设置的条数
        $bussiness_local_list=array_slice($bussiness_local_lists,0,$this->near_num);
        $this->assign('cust_flash_list',$cust_flash_list);
        $this->assign('store_type_list',$store_type_list);
        $this->assign('store_recommend_list',$store_recommend_list);
        $this->assign('bussiness_local_list',$bussiness_local_list);
        $this->assign('total',$total);
        $this->assign('firstRow',$this->near_num);
        $this->assign('head_title','首页');
        $this->display();

    }
    //附近店铺查看更多
    public function get_more(){

        $firstRow=$this->_post('firstRow');
        $bussiness_local_lists=session('bussiness_local');
        //取设置的条数
        $bussiness_local_list=array_slice($bussiness_local_lists,$firstRow,$this->near_num);
        echo json_encode($bussiness_local_list);
        exit();

    }

    public function store_details(){
        $business_classify_id=$this->_get('business_classify_id');
        if (!$business_classify_id){
            echo "<script>alert('非法参数');window.location='home_index';</script>";
            exit();
        }
        $business_obj=new BusinessModel();
        $business_info=$business_obj->getBusinessInfo("business_classify_id=$business_classify_id");
        $this->assign('business_info',$business_info);
        //附近推荐,控制条数，获取店铺经纬度
        $where='';
        $area_id=session('area_id');
        if ($area_id){
            $where.="area_id=$area_id";
        }
        $bussiness_obj=new BusinessModel();
        $bussiness_list=$bussiness_obj->getBusinessList($where,'');
        $i=1;
        foreach($bussiness_list as $v){
            $distance=$this->getDistance($business_info['latitude'],$business_info['longtitude'],$v['latitude'],$v['longitude']);
            if ($distance<$this->range){
                $c=$v['id'];
                $bussiness_one=$bussiness_obj->getOneBusiness("business_id=$c");
                $bussiness_one['distance']=$distance;
                $bussiness_near_lists[]=$bussiness_one;
                $i++;
                if ($i>$this->near_num)
                    break;
            }
        }
        //session('bussiness_near_lists',$bussiness_near_lists);//有下拉需要释放
        $total=count($bussiness_near_lists);
        $bussiness_near_list=array_slice($bussiness_near_lists,0,$this->near_num);
        $this->assign('bussiness_near_list',$bussiness_near_list);
        $this->assign('total',$total);
        $this->assign('firstRow',$this->near_num);
        $this->assign('head_title',"店铺详情");
        $this->display();
    }

    public function person_center(){
        $this->display('Tpl/Index/person_center.html');
    }
    //申请成为商家
    public function apply_for_business(){
        if ($_POST){
            //验证各种
            $business_name = isset($_POST['business_name'])?$_POST['business_name']:"";
            $contacts = isset($_POST['contacts'])?$_POST['contacts']:"";
            $contact_number = isset($_POST['contact_number'])?$_POST['contact_number']:"";
            $industry_id = isset($_POST['industry_id'])?$_POST['industry_id']:"";
            $business_classify_id = isset($_POST['business_classify_id'])?$_POST['business_classify_id']:"";
            $rate = isset($_POST['rate'])?$_POST['rate']:0;
            $consumption = isset($_POST['consumption'])?$_POST['consumption']:"";
            $province_id = isset($_POST['province_id'])?$_POST['province_id']:"";
            $city_id = isset($_POST['city_id'])?$_POST['city_id']:"";
            $area_id = isset($_POST['area_id'])?$_POST['area_id']:"";
            $address = isset($_POST['address'])?$_POST['address']:"";
            $desc = isset($_POST['desc'])?$_POST['desc']:"";
            $sign_pic= isset($_POST['sign_pic'])?$_POST['sign_pic']:"";
            $license_pic= isset($_POST['license_pic'])?$_POST['license_pic']:"";
            $evn_pic= isset($_POST['evn_pic'])?$_POST['evn_pic']:"";

            $arr = array(
                "business_name" => $business_name,
                "contacts" => $contacts,
                "industry_id" => $industry_id,
                "contact_number" => $contact_number,
                "business_classify_id" => $business_classify_id,
                "rate" => $rate,
                "consumption" => $consumption,
                "province_id" => $province_id,
                "city_id" => $city_id,
                "area_id" => $area_id,
                "address" => $address,
                "desc" => $desc,
                "sign_pic" => $sign_pic,
                "license_pic" => $license_pic,
                "evn_pic" => $evn_pic,
                "addtime" => time(),
                "status" => 5,

            );

            $r = M('business')->add($arr);
            if($r){
                exit("success");
            }
            exit('failure');

        }else{
            //获取省份列表
            $province = M('address_province');
            $province_list = $province->field('province_id, province_name')->select();

            $business_classify = new BusinessClassifyModel();
            $business_classify_list = $business_classify->getBusinessClassifyList("","serial desc");

            $this->assign('province_list', $province_list);
            $this->assign('business_classify_list', $business_classify_list);
            $this->display('Tpl/Index/apply_for_businesses.html');
        }
    }

    //发送验证码
    public function get_verify_code(){
        $mobile=$this->_request('mobile');
        if (!preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile)) {//验证手机号
            $return_data = array(
                'code' => -1,
                'msg' => '请输入正确的手机号'
            );
            echo json_encode($return_data);
            exit;
        }
        $verify_code_obj = new VerifyCodeModel();
        $verify_code = $verify_code_obj->generateVerifyCode($mobile);
        if ($verify_code) {
            $sms_obj = new SMSModel();
            $result = $sms_obj->sendVerifyCode($mobile, $verify_code);
            if ($result == 1) {
                $return_data = array(
                    'code' => 1,
                    'msg' => '验证码发送成功',
                );
            } else {
                $return_data = array(
                    'code' => -1,
                    'msg' => '验证码发送失败',
                );
            }
        } else {
            $return_data = array(
                'code' => 0,
                'msg' => '请不要重复操作',
            );
        }
        echo json_encode($return_data);
        exit;
    }

    //注册,注意：这里的username其实是登陆账号
    function  register(){
        $user_id=session('user_id');
        $username=trim($this->_get('username'));
        $pwd=trim($this->_get('pwd'));
        $confirm_pwd=trim($this->_get('confirm_pwd'));
        $mobile=trim($this->_get('mobile'));
        $verify_code=trim($this->_get('verify_code'));
        //手机号格式判断
        if (!preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile)) {//验证手机号
            $this->send_to_ajax('-1','请输入正确的手机号');
        }
        //验证码判断
        $verify_code_obj = new VerifyCodeModel();//验证验证码
        $result = $verify_code_obj->checkVerifyCodeValid($verify_code, $mobile);//检查验证码的有效性
        if($result){
            //两次密码判断
            if($pwd!==$confirm_pwd){
                $this->send_to_ajax('-1','两次密码不一致');
            }
            $user_obj=new UserModel($user_id);
            $num=$user_obj->getUserNum('mobile = '.$mobile);//判断这个手机有没有被绑定
            if(!$num){
                $arr=array(
                    'username'=>$username,
                    'password'=>md5($pwd),
                    'mobile'=>$mobile,
                );
                $result=$user_obj->editUserInfo($arr);
                if($result){
                    $this->send_to_ajax('1','注册成功');
                }else{
                    $this->send_to_ajax('-1','注册失败');
                }
            }else{
                $this->send_to_ajax('-1','改手机号已经被注册了');
            }
        }else{
            $this->send_to_ajax('-1','验证码错误');
        }



    }
}
?>
