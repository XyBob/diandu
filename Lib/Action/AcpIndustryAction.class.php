<?php
/**
 * 行业分类控制器
 */

class AcpIndustryAction extends AcpAction
{
    public function AcpindustryAction()
    {
        parent::_initialize();
    }

    /*
     * 行业列表
     */
    public function get_industry_list()
    {
        $industry_name = $this->_request('industry_name');
        $where = '1=1';
        if ($industry_name) {
            $where .= ' AND industry_name LIKE "%' . $industry_name . '%"';
            $this->assign('key_words', $industry_name);
        }
        $industry_obj = new IndustryModel();
        //分页处理
        import('ORG.Util.Pagelist');
        $count = $industry_obj->getindustryNum($where);
        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $industry_obj->setStart($Page->firstRow);
        $industry_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('show', $show);
        $industry_list = $industry_obj->getindustryList('', $where, ' serial ASC');
        $this->assign('industry_list', $industry_list);
        $this->assign('head_title', '行业分类列表');
        $this->display();

    }

    /**
     * @access public
     * @todo 添加行业分类
     *
     */
    public function add_industry()
    {
        $submit = $this->_post('submit');
        if ($submit == 'submit')                //执行添加操作
        {
            $industry_name = $this->_post('industry_name');
            $rate = $this->_post('rate');
            $serial = $this->_post('serial');
            $isuse = $this->_post('isuse');
            if (!$industry_name) {
                $this->error('行业名不能为空');
            }
            if (!is_numeric($serial)) {
                $this->error('对不起，排序号必须为0-255的整数，请重新输入');
            }
            if (!$rate || !is_numeric($rate)) {
                $this->error('比例格式错误或不能为空，请重新输入');
            }

            $data = array(
                'industry_name' => $industry_name,
                'rate' => $rate,
                'isuse' => $isuse,
                'serial' => $serial,
            );
            $industry_obj = new IndustryModel();
            $industry_id = $industry_obj->addindustry($data);

            if ($industry_id) {
                $this->success('恭喜您，行业分类添加成功', '/AcpIndustry/get_industry_list');
            } else {
                echo M()->getLastSql();
                $this->error('抱歉，添加失败');
            }
        }
        $this->assign('head_title', '添加行业分类');
        $this->display();
    }

    /**
     * @access public
     * @todo 修改行业分类
     *
     */
    public function edit_industry()
    {

        $industry_id = intval($this->_get('industry_id'));
        $industry_obj = new IndustryModel();
        $industry_info = $industry_obj->getindustryInfo('industry_id = ' . $industry_id, '');

        if (!$industry_info) {
            $this->error('抱歉，此分类不存在', U('/Acpindustry/get_industry_list'));
        }
        $submit = $this->_post('submit');
        if ($submit == 'submit')                //执行添加操作
        {
            $industry_name = $this->_post('industry_name');
            $rate = $this->_post('rate');
            $serial = $this->_post('serial');
            $isuse = $this->_post('isuse');
            if (!$industry_name) {
                $this->error('行业名不能为空');
            }
            if (!is_numeric($serial)) {
                $this->error('对不起，排序号必须为0-255的整数，请重新输入');
            }
            if (!$rate || !is_numeric($rate)) {
                $this->error('比例格式错误或不能为空，请重新输入');
            }

            $data = array(
                'industry_name' => $industry_name,
                'rate' => $rate,
                'serial' => $serial,
                'isuse' => $isuse,
            );

            $industry_obj = new IndustryModel($industry_id);
            $success = $industry_obj->editindustry($data);
            // echo $industry_obj->getLastSql();die;
            if ($success) {
                $this->success('恭喜您，行业分类修改成功', U('/AcpIndustry/get_industry_list'));
            } else {
                $this->success('抱歉，修改失败');
            }
        }

        $this->assign('industry_info', $industry_info);
        $this->assign('head_title', '修改行业分类');
        $this->display();
    }

    //删除轮播图
    public function del_industry()
    {
        $id = intval($this->_post('id'));
        if ($id) {

            $industry_obj = new IndustryModel($id);
            $success = $industry_obj->delindustry($id);

            echo $success ? 'success' : 'failure';
            exit;
        }

        exit('failure');
    }

}
?>
