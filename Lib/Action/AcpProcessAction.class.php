<?php
/**
 * 协议说明管理
 * 
 *
 */
class AcpProcessAction extends AcpAction
{
	/**
     * 构造函数
     * @return void
     * @todo
     */
	public function AcpProcessAction()
	{
		parent::_initialize();
	}
	//编辑和新增
    public function edit_for_explain($tag,$type){

        $about_obj =M('article');
        $text_obj = new ArticleTxtModel();
        $a['article_tag']=$tag;
        //不存在协议id,就新增
        $article_id =$about_obj->where($a)->getField('article_id');
//        echo json_encode($article_id);
//        echo json_encode($tag);
//        echo json_encode($type);
//        exit;
        if(IS_POST) {
            $contents = $_POST['contents'];

            $data['contents'] =$contents;
            if ($article_id) {
                $r = $text_obj->editArticleTxt($article_id,$data);
                if ($r) {
                    $this->success('恭喜您，'.$type.'编辑成功！');
                } else {
                    $this->error('对不起,'.$type.'编辑失败！');
                }
            }else{
                $arr['article_tag']=$tag;
                $article_id=$about_obj->add($arr);
                if (!$article_id){
                    $this->error('出错');
                }
                $data['article_id']=$article_id;
                $res=$text_obj->addArticleTxt($data);
                if (!$res){
                    $this->error("添加协议出错");
                }
                $this->success("恭喜您，添加成功");

            }
        }

        $text_contents = $text_obj->where('article_id='.$article_id)->getField('contents');
        $this->assign('text_contents', $text_contents);
        $this->assign('head_title', $type);
    }

    public function edit_reg_explain(){
        $this->edit_for_explain('reg','注册');
        $this->display();
    }
    public function edit_bussiness_explain(){
        $this->edit_for_explain('bussniess_apply','商家入驻');
        $this->display();
    }

    public function edit_about_explain(){
        $this->edit_for_explain('about','关于我们');
        $this->display();
    }
    public function edit_help_explain(){
        $this->edit_for_explain('help','帮助');
        $this->display();
    }
    //金融贷款
    public function jrd_loan(){

    }
    //优惠券的说明
    public function coupon_explain(){

    }

}
