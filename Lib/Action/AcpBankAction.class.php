<?php
/**
 * acp后台银行卡类型管理
 */
class AcpBankAction extends AcpAction
{

    /**
     * 初始化
     * @return void
     * @todo 初始化方法
     */
    public function _initialize()
    {
        parent::_initialize();
    }

    public function get_search_condition()
    {
        //初始化查询条件
        $where = '';

        $bank_name = trim(I('request.bank_name'));
        if ($bank_name) {
            $where .= ' AND bank_name LIKE "%' . $bank_name . '%"';
            $this->assign('bank_name', $bank_name);
        }

        return $where;
    }

    private function bank_list($where, $head_title, $opt)
    {
        $where .= ' AND isuse != 2';
        $where .= $this->get_search_condition();

        $bank_obj = new BankModel();

        $bank_list = $bank_obj->getBankList('', $where);
        $this->assign('bank_list', $bank_list);
        // dump($bank_list);exit;

        $this->assign('opt', $opt);
        $this->assign('head_title', $head_title);
        $this->display('get_bank_list');
    }

    public function get_bank_list()
    {
        $this->bank_list('1=1', '所有银行卡类型', 'all');
    }

    public function add_bank()
    {
//        var_dump($_POST);
//        die();
        if (IS_POST) {
            $post = I('post.');

            $bank_name   = $post['bank_name'];
            $base_pic    = $post['base_pic'];
            $description = trim($post['description']);
            $cdtbrd = trim($post['cdtbrd']);
            $isuse       = intval($post['isuse']);

            if (!$bank_name) {
                $this->error('对不起，请输入标题！');
            }

            if (!$cdtbrd) {
                $this->error('对不起，请填写收款行行号');
            }

            $data = array(
                'bank_name'   => $bank_name,
                'base_pic'    => $base_pic,
                'cdtbrd'      => $cdtbrd,
                'description' => $description,
                'isuse'       => $isuse,
            );

            $bank_obj = new BankModel();
            $bank_id  = $bank_obj->addBank($data);

            if ($bank_id) {

                $this->success('恭喜，银行卡类型添加成功！', '/AcpBank/get_bank_list');
            } else {
                $this->error('对不起，银行卡类型添加失败！');
            }

        } else {

            $this->assign('base_pic_data', array(
                'name'  => 'base_pic',
                'title' => '银行logo',
                'dir'   => 'bank_logo',
            ));

            $this->assign('head_title', '添加银行卡类型');
            $this->display();
        }
    }

    public function edit_bank()
    {
        $bank_id = intval(I('request.bank_id'));

        $bank_obj  = new BankModel();
        $bank_info = $bank_obj->getBankInfo('bank_id = ' . $bank_id);

        if (!$bank_info) {
            $this->error('对不起，操作失败！');
        }

        if (IS_POST) {
            $post = I('post.');

            $bank_name   = $post['bank_name'];
            $base_pic    = $post['base_pic'];
            $description = trim($post['description']);
            $cdtbrd = trim($post['cdtbrd']);
            $isuse       = intval($post['isuse']);

            if (!$bank_name) {
                $this->error('对不起，请输入标题！');
            }

            if (!$cdtbrd) {
                $this->error('对不起，请填写收款行行号');
            }

            $data = array(
                'bank_name'   => $bank_name,
                'base_pic'    => $base_pic,
                'cdtbrd'      => $cdtbrd,
                'description' => $description,
                'isuse'       => $isuse,
            );

            $bank_obj = new BankModel($bank_id);
            $result   = $bank_obj->saveBank($data);

            if ($result) {

                $this->success('恭喜，银行卡类型编辑成功！');
            } else {
                $this->error('对不起，银行卡类型编辑失败！');
            }

        } else {

            $this->assign('base_pic_data', array(
                'name'  => 'base_pic',
                'title' => '银行logo',
                'url'   => $bank_info['base_pic'],
                'dir'   => 'bank_logo',
            ));

            $this->assign('bank_info', $bank_info);
            $this->assign('head_title', '编辑银行卡类型');
            $this->display('add_bank');
        }
    }

    /**
     * 图片压缩加水印
     * @param string $base_img 原图地址(绝对路径)
     * @return array 生成的图片信息
     */
    protected function _resizeImg($base_img)
    {
        import('ORG.Util.Image');
        $Image = new Image();

        $arr_img = array();

        if (!is_file($base_img)) {
            return $arr_img;
        }

        $base_img_info = pathinfo($base_img);
        $img_path      = $base_img_info['dirname'] . '/';
        $img_extension = $base_img_info['extension'];
        $img_name      = str_replace('.' . $img_extension, '', $base_img_info['basename']);

        /***** 等比缩放 开始 *****/

        // 生成大图
        $big_img_path = $img_path . $img_name . C('BIG_IMG_SUFFIX') . '.' . $img_extension;
        $big_img      = $Image->thumb($base_img, $big_img_path, $img_extension, C('BIG_IMG_SIZE'), C('BIG_IMG_SIZE'));

        // 生成中图
        $middle_img_path = $img_path . $img_name . C('MIDDLE_IMG_SUFFIX') . '.' . $img_extension;
        $middle_img      = $Image->thumb($base_img, $middle_img_path, $img_extension, C('MIDDLE_IMG_SIZE'), C('MIDDLE_IMG_SIZE'));

        // 生成小图
        $small_img_path = $img_path . $img_name . C('SMALL_IMG_SUFFIX') . '.' . $img_extension;
        $small_img      = $Image->thumb($base_img, $small_img_path, $img_extension, C('SMALL_IMG_WIDTH'), C('SMALL_IMG_HEIGHT'));
        /***** 等比缩放 结束 *****/

        $arr_img['big_img']    = $big_img;
        $arr_img['middle_img'] = $middle_img;
        $arr_img['small_img']  = $small_img;

        /***** 图片加水印 开始 *****/
        // 判断水印功能是否开启
        /*if ($this->system_config['WATER_PRINT_OPEN'] && file_exists(APP_PATH . $this->system_config['WATER_PRINT_IMG'])) {
        // 水印图片
        $water_img = APP_PATH . $this->system_config['WATER_PRINT_IMG'];

        // 水印透明度
        $alpha = intval($this->system_config['WATER_PRINT_TRANSPARENCY']);

        //水印位置
        $position = intval($this->system_config['WATER_PRINT_IMG_POSITION']);

        // 大图加水印
        if ($big_img) {
        $Image->water($big_img, $water_img, '', $alpha, $position);
        }

        // 中图加水印
        if ($middle_img) {
        $Image->water($middle_img, $water_img, '', $alpha, $position);
        }

        // 小图尺寸太小，不建议添加水印
        }*/
        /***** 图片加水印 结束 *****/

        return $arr_img;
    }

    public function edit_bank_isuse()
    {
        if (IS_AJAX && IS_POST) {
            $id = intval(I('post.id'));

            $bank_obj  = new BankModel();
            $bank_info = $bank_obj->getBankInfo('bank_id = ' . $id);

            if (!$bank_info) {
                $this->error('对不起，操作失败！');
            }

            $dest = $bank_info['isuse'] == 1 ? 0 : 1;

            $bank_obj->where('bank_id = ' . $id)->setField('isuse', $dest);

            $this->ajaxReturn(array(
                'isuse' => $dest,
            ));
        }
    }

    public function edit_bank_serial()
    {
        if (IS_AJAX && IS_POST) {
            $id     = intval(I('post.id'));
            $serial = intval(I('post.serial'));

            $bank_obj  = new BankModel();
            $bank_info = $bank_obj->getBankInfo('bank_id = ' . $id);

            if (!$bank_info) {
                $this->error('对不起，操作失败！');
            }

            $bank_obj->where('bank_id = ' . $id)->setField('serial', $serial);

            $this->success('操作成功！');
        }
    }

    public function delete_bank()
    {
        if (IS_AJAX && IS_POST) {
            $id = intval(I('post.id'));

            $bank_obj  = new BankModel();
            $bank_info = $bank_obj->getBankInfo('bank_id = ' . $id);

            if (!$bank_info) {
                $this->error('对不起，操作失败！');
            }

            $bank_obj->delBank($id);

            $this->success('删除成功！');
        }
    }

}
