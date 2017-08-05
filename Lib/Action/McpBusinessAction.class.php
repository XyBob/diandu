<?php

/**
 * mcp后台商家类
 */
class McpBusinessAction extends McpAction
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

    //编辑商家
    function edit_business()
    {
        $user_id = session('user_id');
        //var_dump($user_id);

        $business_obj = new BusinessModel();
        //$business_id=$this->_get('business_id');
        $business_info = $business_obj->getBusinessInfo('user_id = ' . $user_id);
//        var_dump($business_obj->getLastSql());
//        var_dump($business_info);

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
//                if($data['old_rate']>$data['rate']){
//                    $this->error('让利比例不能比前一次小');
//                }
                unset($data['old_rate']);
                $data['evn_pic'] = implode(',', $data['evn_pic']);
                $result = $business_obj->editBusiness($business_id, $data);
                if ($result !== false) {
                    $this->success('编辑成功');
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

        $this->assign('business_info', $business_info);
        $this->assign('head_title', '编辑商家');
        $this->display();
    }
    //查看关注本店铺的用户列表
    function focus_my_store_user_list()
    {
        /*"{$this->getTableName()}.business_id=".$business_id;*/
        $data=$this->_post();
        $where='tp_like.business_id='.session('business_id');
        if($data['nickname']){
            $where.=' and tp_users.nickname like "%'.$data['nickname'].'%"';
        }
        if($data['mobile']){
            $where.=' and tp_users.mobile like "%'.$data['mobile'].'%"';
        }
        if($data['start_time']){
            $where.=' and tp_users.reatime >='.$data['start_time'];
        }
        if($data['end_time']){
            $where.=' and tp_users.reatime <='.$data['end_time'];
        }
        $like_obj=new LikeModel();
        $like_list=$like_obj->getLikeUserList($where);
       /* echo json_encode($like_obj->getLastSql());*/
        $this->assign('like_list', $like_list);
        $this->assign('head_title', '关注本店的用户列表');
        $this->assign('nickname',$data['nickname']);
        $this->assign('mobile',$data['mobile']);
        $this->assign('start_time',$data['start_time']);
        $this->assign('end_time',$data['end_time']);
        $this->display();
    }

}