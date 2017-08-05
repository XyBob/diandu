<?php
/**
 * acp后台商品类
 */
class AcpGiftAction extends AcpAction
{

    /**
     * 初始化
     * @author wsq
     * @return void
     * @todo 初始化方法
     */
    public function _initialize()
    {
        parent::_initialize();
        // 引入商品公共函数库
        require_cache('Common/func_item.php');
    }

    protected function get_search_condition()
    {
        $where = "";

        $start_time = $this->_request('start_time');
        $start_time = str_replace('+', ' ', $start_time);
        $start_time = strtotime($start_time);
        if ($start_time) {
            $where .= ' AND addtime >= ' . $start_time;
            $this->assign('start_time', $start_time);
        }

        $end_time = $this->_request('end_time');
        $end_time = str_replace('+', ' ', $end_time);
        $end_time = strtotime($end_time);
        if ($end_time) {
            $where .= ' AND addtime <= ' . $end_time;
            $this->assign('end_time', $end_time);
        }

        $shop_name = $this->_request('shop_name');
        if ($shop_name) {
            $merchant_list = D('Merchant')->where('shop_name LIKE "%' . $shop_name . '%"')
                ->field('merchant_id')
                ->select();

            $user_ids = array();
            if ($merchant_list) {
                foreach ($merchant_list as $k => $v) {
                    array_push($user_ids, $v['merchant_id']);
                }

                $user_ids = implode(',', $user_ids);
                $where .= ' AND merchant_id IN ( ' . $user_ids . ' )';
            } else {
                $where .= ' AND false';
            }
            $this->assign('shop_name', $shop_name);
        }

        $gift_name = $this->_request('gift_name');
        if ($gift_name) {
            $this->assign('gift_name', $gift_name);
            $gift_id_list = D('Gift')->where('gift_name LIKE "%' . $gift_name . '%"')
                ->field('gift_id')->select();

            $gift_ids = array();
            if ($gift_id_list) {
                foreach ($gift_id_list as $k => $v) {
                    array_push($gift_ids, $v['gift_id']);
                }

                $gift_ids = implode(',', $gift_ids);
                $where .= ' AND gift_id IN ( ' . $gift_ids . ' )';

            } else {
                $where .= ' AND false';
            }

        }

        $mobile = $this->_request('mobile');
        if ($mobile) {
            $user_list = D('User')->where('mobile LIKE "%' . $mobile . '%"')
                ->field('user_id')
                ->select();

            $user_ids = array();
            foreach ($user_list as $k => $v) {
                array_push($user_ids, $v['user_id']);
            }

            $user_ids = implode(',', $user_ids);
            $where .= ' AND user_id in ( ' . $user_ids . ' )';
            $this->assign('mobile', $mobile);
        }

        return $where;
    }

    //获取所有用户奖品券信息
    //@author wsq
    public function get_gift_list()
    {
        $gift_obj = D('Gift');

        $where = '1' . $this->get_search_condition();
        $sort  = $this->get_and_set_sort_info(array('serial', 'isuse'));
        $sort  = $sort ? $sort : ' addtime DESC';

        import('ORG.Util.Pagelist');

        $count = $gift_obj->where($where)->count();
        $Page  = new Pagelist($count, C('PER_PAGE_NUM'));
        $gift_obj->setStart($Page->firstRow);
        $gift_obj->setLimit($Page->listRows);

        $gift_list = $gift_obj->getGiftList('', $where, $sort);
        $gift_list = $gift_obj->getListData($gift_list);
        $show      = $Page->show();

        $this->assign('page', $Page);
        $this->assign('show', $show);

        $this->assign('gift_list', $gift_list);
        $this->assign('head_title', '礼品列表');
        $this->display();
    }

    //@author
    //添加礼品
    public function add_gift()
    {
        $action   = I('post.action');
        $gift_obj = D('Gift');

        $merchant_list = D('Merchant')->getMerchantList('merchant_id, shop_name');
        $this->assign('merchant_list', $merchant_list);

        if ($action == 'add') {
            if ($gift_obj->create()) {
                $gift_obj->add();
                $this->success('添加成功!', '/AcpGift/get_gift_list');

            } else {
                $this->error($gift_obj->getError());
            }
        }

        // 礼品图片
        $this->assign('pic_data', array(
            'name'  => 'pic',
            'title' => '礼品图片',
        ));

        $this->assign('action', 'add');
        $this->assign("head_title", "添加礼品");

        $this->display();
    }

    //@author
    //修改礼品
    public function edit_gift()
    {
        $gift_id = I('get.gift_id', 0, 'int');
        if (!$gift_id) {
            $this->error('参数不合法!');
        }

        $gift_obj  = D('Gift');
        $gift_info = $gift_obj->where('gift_id =' . $gift_id)->find();
        $this->assign('gift_info', $gift_info);

        $pic_path = $gift_info['pic'] ? APP_PATH . $gift_info['pic'] : false;
        $this->assign('pic_path', $pic_path);

        $merchant_list = D('Merchant')->getMerchantList('merchant_id, shop_name');
        $this->assign('merchant_list', $merchant_list);

        $action = I('post.action');
        if ($action == 'edit') {
            if ($gift_obj->create()) {
                $status = $gift_obj->where('gift_id =' . $gift_id)->save();
                $this->success('修改成功!', '/AcpGift/get_gift_list');
                $this->error('修改失败!');

            } else {
                $this->error($gift_obj->getError());
            }
        }

        // 礼品图片
        $this->assign('pic_data', array(
            'name'  => 'pic',
            'url'   => $gift_info['pic'],
            'title' => '礼品图片',
        ));

        $this->assign('action', 'edit');
        $this->assign("head_title", "编辑礼品");
        $this->display('add_gift');
    }

    //@author wsq
    //删除礼品
    public function delete_gift()
    {
        $gift_id = I('post.gift_id', 0, 'int');

        if ($gift_id) {
            $where  = 'gift_id = ' . $gift_id;
            $status = D('Gift')->where($where)->delete();
            exit($status ? 'success' : 'failure');
        }

        exit('failure');
    }

    //@author wsq
    //设置上下架
    public function set_enable()
    {
        $gift_id = I('post.gift_id', 0, 'int');
        $opt     = I('post.opt');

        if ($gift_id && is_numeric($opt)) {
            $status = D('Gift')->where('gift_id =' . $gift_id)->setField('isuse', $opt);
            exit($status ? 'success' : 'failure');
        }

        exit('failure');
    }

    //批量上下架
    //@author wsq
    public function batch_set_enable()
    {
        $gift_ids = I('post.gift_ids');
        $opt      = I('post.opt');

        if ($gift_ids && is_numeric($opt)) {
            $gift_array  = explode(',', $gift_ids);
            $success_num = 0;
            $gift_obj    = D('Gift');

            foreach ($gift_array as $gift_id) {
                $status = $gift_obj->where('gift_id =' . $gift_id)->setField('isuse', $opt);
                $success_num += $status ? 1 : 0;

            }
            exit($success_num ? 'success' : 'failure');

        } else {
            exit('failure');

        }
    }

    //@author wsq
    //批量删除礼品
    public function batch_delete_gift()
    {
        $gift_ids = I('post.gift_ids');

        if ($gift_ids) {
            $gift_array  = explode(',', $gift_ids);
            $success_num = 0;
            $gift_obj    = D('Gift');

            foreach ($gift_array as $gift_id) {
                $status = $gift_obj->where('gift_id =' . $gift_id)->delete();
                $success_num += $status ? 1 : 0;

            }
            exit($success_num ? 'success' : 'failure');

        } else {
            exit('failure');

        }
    }

}
