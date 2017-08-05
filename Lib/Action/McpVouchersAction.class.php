<?php

/**
 * acp后台商品类
 */
class McpVouchersAction extends McpAction
{

    /**
     * 初始化
     * @author 姜伟
     * @return void
     * @todo 初始化方法
     */
    function _initialize()
    {
        parent::_initialize();

        // 引入商品公共函数库
        require_cache('Common/func_item.php');
    }

    /**
     * 接收搜索表单数据，组织返回where子句
     * @author wsq
     * @param void
     * @return void
     * @todo 接收表单提交的参数，过滤合法性，组织成where子句并返回
     */
    function get_search_condition()
    {
        $where = "";
        //添加时间范围起始时间
        $start_date = $this->_request('start_date');
        $start_date = str_replace('+', ' ', $start_date);
        $start_date = strtotime($start_date);
        $this->assign('start_date', $start_date);
        if ($start_date) {
            $where .= ' AND addtime >= ' . $start_date;
            $this->assign('start_date', $start_date);
        }

        $end_date = $this->_request('end_date');
        $end_date = str_replace('+', ' ', $end_date);
        $end_date = strtotime($end_date);
        if ($end_date) {
            $where .= ' AND addtime <= ' . $end_date;
            $this->assign('end_date', $end_date);
        }

        $shop_name = $this->_request('shop_name');
        if ($shop_name) {
            $merchant_list = D('Merchant')->where('shop_name LIKE "%' . $shop_name . '%"')
                ->field('merchant_id')
                ->select();

            $user_ids = array();
            if ($merchant_list) {
                foreach ($merchant_list AS $k => $v) array_push($user_ids, $v['merchant_id']);
                $user_ids = implode(',', $user_ids);
                $where .= ' AND merchant_id in ( ' . $user_ids . ' )';
            } else {
                $where .= ' AND false';
            }
            $this->assign('shop_name', $shop_name);
        }

        $user_name = $this->_request('user_name');
        if ($user_name) {
            $user_list = D('User')->where('nickname LIKE "%' . $user_name . '%"')
                ->field('user_id')
                ->select();

            $user_list2 = D('User')->where('realname LIKE "%' . $user_name . '%"')
                ->field('user_id')
                ->select();

            if (!$user_list && !$user_list2) {
                $where .= ' AND false';

            } else {
                $user_ids = array();
                if ($user_list) {
                    foreach ($user_list AS $k => $v) array_push($user_ids, $v['user_id']);
                }

                if ($user_list2) {
                    foreach ($user_list2 AS $k => $v) array_push($user_ids, $v['user_id']);
                }

                $user_ids = implode(',', $user_ids);
                $where .= ' AND user_id in ( ' . $user_ids . ' )';
            }

            $this->assign('user_name', $user_name);
        }

        $discount_id = intval($this->_request('discount_id'));
        if ($discount_id)
            $where .= ' AND discount_minus_id = ' . $discount_id;


        return $where;
    }

    //获取满减信息
    //@author wsq
    public function get_discount_minus_list()
    {
        $where = "1" . $this->get_search_condition();
        $discount_obj = D('DiscountMinus');
        $count = $discount_obj->getDiscountMinusNum($where);
        $sort = $this->get_and_set_sort_info(array(
            'amount_limit', 'num', 'use_time',
        ));

        $sort = $sort ? $sort : ' addtime DESC';

        import('ORG.Util.Pagelist');
        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $discount_obj->setStart($Page->firstRow);
        $discount_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('page', $Page);
        $this->assign('show', $show);

        $discount_list = $discount_obj->getDiscountMinusList('', $where, $sort);
        $discount_list = $discount_obj->getListData($discount_list);

        $this->assign('discount_list', $discount_list);

        $this->assign('opt', $opt);
        $this->assign('head_title', $head_title);
        $this->display();
    }

    //获取满减明细
    //@author wsq
    public function get_discount_minus_detail()
    {
        $where = "1" . $this->get_search_condition();
        $discount_obj = D('UserDiscountMinus');
        $count = $discount_obj->getUserDiscountMinusNum($where);
        $sort = $this->get_and_set_sort_info(array(
            'order_amount', 'num',
        ));

        $sort = $sort ? $sort : ' addtime DESC';

        import('ORG.Util.Pagelist');
        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $discount_obj->setStart($Page->firstRow);
        $discount_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('page', $Page);
        $this->assign('show', $show);

        $discount_list = $discount_obj->getUserDiscountMinusList('', $where, $sort);
        $discount_list = $discount_obj->getListData($discount_list);

        $this->assign('discount_list', $discount_list);

        $this->assign('opt', $opt);
        $this->assign('head_title', $head_title);
        $this->display();
    }

    //add_vouchers
    //添加优惠券
    public function add_vouchers()
    {
        $action = I('post.action');
        $vouchers_obj = D('Vouchers');

        D('Merchant')->setLimit(1000);
        $merchant_list = D('Merchant')->getMerchantList('merchant_id, shop_name');
        $this->assign('merchant_list', $merchant_list);

        if ($action == 'add') {
            if ($vouchers_obj->create()) {
                $vouchers_obj->addtime = time();
                #$vouchers_obj->use_time  = 0;
                $vouchers_id = $vouchers_obj->add();
                if ($vouchers_id) {
                    $this->success('添加成功!', '/McpVouchers/get_all_vouchers_list');

                } else {
                    echo $vouchers_obj->getLastSql();
                    exit;
                    $this->error('添加失败!');

                }

            } else {
                $this->error($vouchers_obj->getError());
            }
        }
        $business_id = session('business_id');
        $this->assign('business_id', $business_id);
        $this->assign('action', 'add');
        $this->assign("head_title", "添加抵用券");

        $this->display();
    }

    //@author
    //修改抵用券
    public function edit_vouchers()
    {

        $vouchers_id = I('get.vouchers_id', 0, 'int');
        if (!$vouchers_id) $this->error('参数不合法!');

        $action = I('post.action');
        $vouchers_obj = D('Vouchers');

        $vouchers_info = $vouchers_obj->where('vouchers_id =' . $vouchers_id)->find();
        $this->assign('vouchers_info', $vouchers_info);

        D('Merchant')->setLimit(1000);
        $merchant_list = D('Merchant')->getMerchantList('merchant_id, shop_name');
        $this->assign('merchant_list', $merchant_list);


        if ($action == 'edit') {
            if ($vouchers_obj->create()) {
                $status = $vouchers_obj->where('vouchers_id =' . $vouchers_id)->save();
                if ($status) {
                    $this->success('修改成功!', '/McpVouchers/get_all_vouchers_list');

                } else {
                    $this->error('修改失败!');

                }

            } else {
                $this->error($vouchers_obj->getError());
            }
        }
        $this->assign('business_id',session('business_id'));
        $this->assign('action', 'edit');
        $this->assign("head_title", "编辑抵用券");
        $this->display(APP_PATH . '/Tpl/McpVouchers/add_vouchers.html');
    }

    //@author wsq
    //获取抵用券列表
    function get_vouchers_list($where, $head_title, $opt)
    {

        $vouchers_obj = D('Vouchers');

        $where .= $this->get_search_condition();
        $sort = $this->get_and_set_sort_info(array('amount_limit', 'isuse', 'num'));
        $sort = $sort ? $sort : ' addtime DESC';

        import('ORG.Util.Pagelist');

        $count = $vouchers_obj->where($where)->count();
        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $vouchers_obj->setStart($Page->firstRow);
        $vouchers_obj->setLimit($Page->listRows);

        $vouchers_list = $vouchers_obj->getVouchersList('', $where, $sort);
        $vouchers_list = $vouchers_obj->getListData($vouchers_list);
        $show = $Page->show();

        $this->assign('page', $Page);
        $this->assign('show', $show);

        $this->assign('vouchers_list', $vouchers_list);
        $this->assign('head_title', $head_title);
        $this->display(APP_PATH . 'Tpl/McpVouchers/get_vouchers_list.html');
    }

    //@author wsq
    //获取所有抵用券列表
    public function get_all_vouchers_list()
    {
        $merchant_id=session('business_id');
        $this->get_vouchers_list(
            "true and merchant_id = $merchant_id",
            '所有抵用券列表'
        );
    }
    //@author wsq
    //获取系统抵用券列表
    public function get_system_vouchers_list()
    {
        $this->get_vouchers_list(
            'merchant_id = 0',
            '系统抵用券列表'
        );
    }

    //@author wsq
    //获取商家抵用券列表
    public function get_merchant_vouchers_list()
    {
        $this->get_vouchers_list(
            'merchant_id <> 0',
            '商家抵用券列表'
        );
    }

    //@author wsq
    //删除抵用券
    public function delete_vouchers()
    {
        $vouchers_id = I('post.vouchers_id', 0, 'int');

        if ($vouchers_id) {
            $where = 'vouchers_id = ' . $vouchers_id;
            $status = D('Vouchers')->where($where)->delete();
            exit($status ? 'success' : 'failure');
        }

        exit('failure');
    }

    //@author wsq
    //设置上下架
    public function set_enable()
    {
        $vouchers_id = I('post.vouchers_id', 0, 'int');
        $opt = I('post.opt');

        if ($vouchers_id && is_numeric($opt)) {
            $status = D('Vouchers')->where('vouchers_id =' . $vouchers_id)->setField('isuse', $opt);
            exit($status ? 'success' : 'failure');
        }

        exit('failure');
    }

    //批量上下架
    //@author wsq
    public function batch_set_enable()
    {
        $vouchers_ids = I('post.vouchers_ids');
        $opt = I('post.opt');

        if ($vouchers_ids && is_numeric($opt)) {
            $vouchers_array = explode(',', $vouchers_ids);
            $success_num = 0;
            $vouchers_obj = D('Vouchers');

            foreach ($vouchers_array AS $vouchers_id) {
                $status = $vouchers_obj->where('vouchers_id =' . $vouchers_id)->setField('isuse', $opt);
                $success_num += $status ? 1 : 0;

            }
            exit($success_num ? 'success' : 'failure');

        } else {
            exit('failure');

        }
    }

    //@author wsq
    //批量删除抵用券
    public function batch_delete_vouchers()
    {
        $vouchers_ids = I('post.vouchers_ids');

        if ($vouchers_ids) {
            $vouchers_array = explode(',', $vouchers_ids);
            $success_num = 0;
            $vouchers_obj = D('Vouchers');

            foreach ($vouchers_array AS $vouchers_id) {
                $status = $vouchers_obj->where('vouchers_id =' . $vouchers_id)->delete();
                $success_num += $status ? 1 : 0;

            }
            exit($success_num ? 'success' : 'failure');

        } else {
            exit('failure');

        }
    }

    //获取活动明细
    //@author xuyong
    public function get_vouchers_detail()
    {
        $business_id=session('business_id');
        //echo $business_id;
        //从订单表取出使用该满减活动的记录
        $discount_id = $this->_request('discount_id');
        $customer_name=$this->_request('customer_name');
        $start_time=strtotime($this->_request('start_time'));
        $end_time=strtotime($this->_request('end_time'));
        $order_obj = new OrderModel();
        if(empty($discount_id)){
            $where='coupon_id>0';
        }else{
            $where='coupon_id = '.$discount_id;
        }

        if($start_time&&$end_time){
            $where.=' AND addtime >= '.$start_time.' AND addtime <='.$end_time;

        }

        //分页
        import('ORG.Util.Pagelist');
        $count = $order_obj->getOrderNum($where);
        //if($customer_name!=''){
            $count=$order_obj->getOrderWithUserVoucherNum($business_id,$customer_name,$start_time,$end_time);
           // echo $order_obj->getLastSql();
            //echo $count;
       // }
        //echo $count;
        //分页处理
        //import('ORG.Util.Pagelist');
        //$count = $user_obj->getUserNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
        $order_obj->setStart($Page->firstRow);
        $order_obj->setLimit($Page->listRows);
        $limit=$Page->firstRow.','.$Page->listRows;
        $show = $Page->show();
        $this->assign('show', $show);
        $order='addtime DESC';
        $order_list = $order_obj->getOrderWithUserVoucherList($business_id,$customer_name,$start_time,$end_time,$limit,$order);
        //echo json_encode($order_list);exit;
        //echo $order_obj->getLastSql();
//        $discount_used_detail_list=$order_obj->getOrderListData($order_list,$customer_name);
//        if(!$discount_used_detail_list){
//            $discount_used_detail_list='';
//        }

        $this->assign('vouchers_used_detail_list',$order_list);
        $this->assign('start_time',$start_time);
        $this->assign('end_time',$end_time);
        $this->assign('customer_name',$customer_name);
        $this->assign('discount_id',$discount_id);
        $this->assign('head_title', "获取满减活动明细");
        $this->display();
    }
}

?>
