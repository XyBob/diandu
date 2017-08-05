<?php
/**
 * 站内消息类
 * @author zhoutao@360shop.cc zhoutao0928@sina.com
 *
 */
class McpMessageAction extends McpAction {


    /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function McpMessageAction()
    {
        parent::_initialize();
    }

    /**
     * 获取消息列表
     * @author 姜伟
     * @param void
     * @return void
     * @todo 获取消息列表
     */
    public function get_message_list()
    {
        $eventlog = M('eventlog');
        $where = 'MsgType = "text"';
        //数据总量
        $total = $eventlog->where($where)->count();

        //处理分页
        import('ORG.Util.Pagelist');                        // 导入分页类
        $per_page_num = C('PER_PAGE_NUM');              //分页 每页显示条数
        $per_page_num = 3000;
        $Page = new Pagelist($total, $per_page_num);        // 实例化分页类 传入总记录数和每页显示的记录数
        $page_str = $Page->show();                      //分页输出
        $this->assign('page_str',$page_str);

        $message_list = $eventlog->field('keyword, CreateTime, send_ids')->where($where)->order('CreateTime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $file = fopen('message.txt', 'a');
        foreach ($message_list AS $k => $v)
        {
            fwrite($file, $v['keyword'] . "\n");
        }
        fclose($file);
        $this->assign('message_list', $message_list);

        $this->display();
    }

    /**
     *
     * @return void
     * @todo tp_message表中，message_type=2的消息
     */
    public function list_message()
    {
        require_once('Lib/Model/MessageBaseModel.class.php');
        $MessageBaseModel = new MessageBaseModel();

        $where = 'send_user_id = '.session('user_id').' and reply_user_id ='.session('user_id');
        $total = $MessageBaseModel->countAllMessageList($where);            //符合条件的总消息数
        //处理分页
        import('ORG.Util.Pagelist');                        // 导入分页类
        $per_page_num = C('PER_PAGE_NUM');              //分页 每页显示条数
        $Page = new Pagelist($total, $per_page_num);        // 实例化分页类 传入总记录数和每页显示的记录数
        //获取查询参数
        $map['mod_id'] = 2;

        foreach($map as $k=>$v){
            $Page->parameter.= "$k=".$v.'&';	//为分页添加搜索条件
        }
        $page_str = $Page->show();                      //分页输出
        $this->assign('page_str',$page_str);

        $MessageBaseModel->setStart($Page->firstRow);
        $MessageBaseModel->setLimit($Page->listRows);
        $r = $MessageBaseModel->getAllMessageList($where);
      /*  echo $MessageBaseModel->getLastSql();
        exit;*/
        $this->assign('messagelist',$r);
        $this->assign('head_title','查看所有站内信');
        $this->display();
    }


    public function add_message(){
        $business_id=session('business_id');
        $data=$this->_post();
        $MessageBaseModel = new MessageBaseModel();

        if(IS_POST){
            $data=$this->_post();
           /* echo json_encode($data);
            exit;*/
            $like_obj=new LikeModel();
            $like_list=$like_obj->getLikeList('business_id='.$business_id);

            foreach($like_list as $k=>$v){
                $like_list[$k]['send_user_id']= session('user_id');
                $like_list[$k]['addtime']=time();
                $like_list[$k]['message_type']=3;
                $like_list[$k]['reply_user_id']=$v['user_id'];
                $like_list[$k]['message_title']='商家站内信';
                $like_list[$k]['message_contents']=$data['message_contents'];
                $like_list[$k]['describe']=$data['describe'];
                $like_list[$k]['isuse']=1;
                unset($like_list[$k]['user_id']);
            }
            $new_data['send_user_id']=session('user_id');
            $new_data['addtime']=time();
            $new_data['message_type']=3;
            $new_data['reply_user_id']=session('user_id');
            $new_data['message_title']='商家站内信';
            $new_data['message_contents']=$data['message_contents'];
            $new_data['describe']=$data['describe'];
            $new_data['isuse']=1;
            array_push($like_list,$new_data);
            $result=$MessageBaseModel->addAll($like_list);
            //echo $MessageBaseModel->getLastSql();exit;
            if($result){
                $business_obj=new BusinessModel();
                $business_info=$business_obj->getBusinessInfo('business_id = '.$business_id);
                if($business_info['is_out']==1){
                    $url="dd.diandupt.com/FrontMerchant/take_out_shop/business_id/".$business_id;
                }else{
                    $url="dd.diandupt.com/Index/shop_detail/business_id/".$business_id;
                }
                $msg = array(
                    "first" => "尊敬的用户，您有来自商家 ".$business_info['business_name']." 的消息",
                    "keyword1" => $data['describe'],
                    "keyword2" => date('Y-m-d H:i:s'),
                    "remark" => "感谢您的使用",
                    "url"=>$url,
                );
                $count=$like_obj->getLikeNum();
                $like_obj->setLimit($count);
                $user_list=$like_obj->getUserIdList('user_id','business_id = '.$business_id);
                //echo $like_obj->getLastSql();exit;
                foreach ($user_list as $k=>$v){
                    PushModel::wxPush($v['user_id'], 'message_push', $msg);
                }


                $this->success('添加成功','/McpMessage/list_message');
            }else{
                $this->error('添加失败');
            }
        }
        $this->assign('head_title','添加站内信');
        $this->display();
    }

    public function edit_message(){
        $message_id=$this->_get('message_id');
        $MessageBaseModel = new MessageBaseModel();
        $message_info=$MessageBaseModel->getMessageInfo('message_id='.$message_id);
        if(IS_POST){
            $data=$this->_post();
            $result=$MessageBaseModel->editMessage($message_id,$data);
            if($result){
                $this->success('修改成功','/McpMessage/list_message');
            }else{

                $this->error('修改失败');
            }
        }
        $this->assign('message_info',$message_info);
        $this->assign('head_title','编辑站内信');
        $this->display('add_message');
    }
    //删除站内信
    public function del_message(){
        $message_id=$this->_post('message_id');
        $MessageBaseModel = new MessageBaseModel();
        $result=$MessageBaseModel->deleteMessage($message_id);
        if ($result){
            echo "success";exit;
        }else{
            echo "error";exit;
        }

    }

}
?>
