<?php

class FrontAboutAction extends GlobalAction {
    public function about_diandu(){
        $this->show_explain('about','关于我们');
        $this->display();
    }
    public function show_explain($tag,$type){

        $a['article_tag']=$tag;
        $about_obj =M('article');
        $text_obj = M('article_txt');

        $article_id =$about_obj->where($a)->getField('article_id');
//        echo json_encode($article_id);
//        echo json_encode($tag);
//        echo json_encode($type);
//        exit;
//    if(IS_POST) {
//        $contents = $_POST['contents'];
//
//        $data['contents'] =$contents;
//        if ($article_id) {
//            $r = $text_obj->editArticleTxt($article_id,$data);
//            if ($r) {
//                $this->success('恭喜您，'.$type.'编辑成功！');
//            } else {
//                $this->error('对不起,'.$type.'编辑失败！');
//            }
//        }else{
//            $arr['article_tag']=$tag;
//            $article_id=$about_obj->add($arr);
//            if (!$article_id){
//                $this->error('出错');
//            }
//            $data['article_id']=$article_id;
//            $res=$text_obj->addArticleTxt($data);
//            if (!$res){
//                $this->error("添加协议出错");
//            }
//            $this->success("恭喜您，添加成功");
//
//        }
//    }
        $text_contents = $text_obj->where('article_id='.$article_id)->getField('contents');
//        $text_contents=str_replace("<p>","",$text_contents);
//        $text_contents=str_replace("</p>","",$text_contents);
        $this->assign('text_contents', $text_contents);
//        echo $text_contents;
//        exit;
        $this->assign('head_title','关于我们');
//        $this->assign('head_title', '编辑'.$type.'协议');
    }
}
