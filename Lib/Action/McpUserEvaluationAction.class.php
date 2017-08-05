<?php
/**
 用户评价列表
 */
class McpUserEvaluationAction extends McpAction
{
    public function get_evaluation(){
        if($user_id = $_SESSION['user_info']['user_id']){
            $obj_business = D('business');
            $business = $obj_business->field('business_id')->where('user_id='.$user_id)->find();
            $obj = D('evaluation');
            $where = 'business_id='.$business['business_id'];
            //分页处理
            $count = $obj->where($where)->count();
            import('ORG.Util.Pagelist');
            //$count = $obj->getItemNum($where);
            $Page = new Pagelist($count,C('PER_PAGE_NUM'));
            $obj->setStart($Page->firstRow);
            $obj->setLimit($Page->listRows);
            $show = $Page->show();
            $this->assign('page', $Page);
            $this->assign('show', $show);
//            echo $Page.$show;
//            die();
            $evaluation_list = $obj->where($where)->order("addtime DESC")->limit()->select();
            foreach ($evaluation_list as $k=>$v){
                //评价用户详情
                $user_info = D('Users')->field('nickname,headimgurl')->where('user_id='.$v['user_id'])->find();
                //echo D('User')->getLastSql();
                $evaluation_list[$k]['nickname']=$user_info['nickname'];
                $evaluation_list[$k]['headimgurl']=$user_info['headimgurl'];
            }
            $this->assign('evaluation_list', $evaluation_list);
            $this->assign('head_title',"用户评价");
            $this->display();

        }

    }
}
