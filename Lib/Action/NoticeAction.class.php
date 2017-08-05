<?php

// 公告
class noticeAction extends FrontAction {

    function _initialize() {
        parent::_initialize();
    }


    /**
     * 公告列表
     * @return void
     * @author <zgq@360shop.cc>
     * @todo 根据条件把公告表tp_notice数据取出来
     */
    public function notice_list()
    {
        $id = $this->_get('id');
        $noticeCategory = new NoticeCategoryModel();
        if(!$id)
        {
            $where = '';
        }
        elseif(!ctype_digit($id))
        {
            header('Location: /Common/page404');
        }
        else
        {
            $where = 'notice_sort_id=' . $id;
            $noticeCategoryInfo = $noticeCategory->getNoticeCategory($id, 'notice_sort_name');
            $this->assign('notice_sort_name', $noticeCategoryInfo['notice_sort_name']);
            $this->assign('notice_sort_id', $id);
        }
        $generalNotice = new GeneralNoticeModel();
        $generalNoticeList = $generalNotice->getGeneralNoticeListFrontPage($where);


        $pagination = array_pop($generalNoticeList);
        foreach($generalNoticeList as $key => $val)
        {
            $generalNoticeList[$key]['addtime'] = date('Y-m-d H:i:s', $val['addtime']);
        }
        $fields = 'notice_sort_id,notice_sort_name';
        $where = 'isuse=1';
        $noticeCategoryList = $noticeCategory->getNoticeCategoryList('', '', $fields, $where);


        $this->assign('pagination', $pagination);
        $this->assign('notice_category_list', $noticeCategoryList);
        $this->assign('general_notice_list', $generalNoticeList);


        $this->assign('head_title', '全部公告');
        $this->display();
    }

    /**
     * 文章详情
     * @return void
     * @author <zgq@360shop.cc>
     * @todo 根据条件把文章表tp_notice与文章内容tp_notice_txt,文章图片tp_notice_txt_photo数据取出来
     */
    public function notice_display()
    {
        $sortId = $this->_get('sort_id');
        $id = $this->_get('id');
        if(!$id || !ctype_digit($id))
        {
            header('Location: /Common/page404');
        }
        $generalnotice = new GeneralNoticeModel();
        $generalnotice->addClickdot($id);

        $fields = 'title,notice_source,clickdot,addtime';
        $generalnoticeInfo = $generalnotice->getnoticeInfo($id, $fields);
        $generalnoticeContents = $generalnotice->getnoticeContents($id, true);

        $generalnoticeInfo['addtime'] = date('Y-m-d H:i:s', $generalnoticeInfo['addtime']);
        $summary = filterAndSubstr($generalnoticeContents, 200, '<p><a><br>');

        $fields = 'notice_sort_id,notice_sort_name';
        $where = 'isuse=1';
        $noticeCategory = new NoticeCategoryModel();
        $noticeCategoryList = $noticeCategory->getnoticeCategoryList('', '', $fields, $where);

        $this->assign('notice_category_list', $noticeCategoryList);
        $this->assign('general_notice_info', $generalnoticeInfo);
        $this->assign('general_notice_contents', $generalnoticeContents);
        $this->assign('summary', $summary);
        $this->assign('notice_sort_id', $sortId);

        $this->assign('list_src', '/notice/notice_list');
        $this->assign('list_title', '全部公告');
        $this->assign('head_title', '公告详情');
        $this->display();
    }


    /**
     * 帮助中心
     * @return void
     * @author <zgq@360shop.cc>
     * @todo 根据条件把文章分类表tp_notice_sort中是帮助中心的数据取出来
     */
    public function helpcenter()
    {
        $id = $this->_get('id');
        $helpCenter = new HelpCenterModel();
        if($id)
        {
            if(!ctype_digit($id))
            {
                header('Location: /Common/page404');
            }
            if(!$helpCenter->getTotal('help_id=' . $id))
            {
                header('Location: /Common/page404');
            }
            $helpInfo = $helpCenter->getHelpInfo($id, 'title');
            $this->assign('help_title', $helpInfo['title']);
            $this->assign('help_contents', $helpCenter->getHelpContents($id));
        }

        $fields = 'help_sort_id,help_sort_name';
        $where = 'isuse=1';
        $helpCenterCategory = new HelpCenterCategoryModel();
        $helpCenterCategoryList = $helpCenterCategory->getHelpCenterCategoryList('', '', $fields, $where);

        foreach($helpCenterCategoryList as $key => $val)
        {
            $fields = 'help_id,title';
            $where = 'isuse=1 AND help_sort_id=' . $val['help_sort_id'];
            $helpCenterCategoryList[$key]['left_help_center_menu'] = $helpCenter->getHelpList('', '', $fields, $where);
        }

        $this->assign('help_center_category_list', $helpCenterCategoryList);
        $this->assign('head_title', '帮助中心');
        $this->display();
    }


    /**
     * 帮助中心详情
     * @param string
     * @return void
     * @author <zgq@360shop.cc>
     * @todo 根据条件把文章表tp_notice中notice_tag字段是帮助中心的数据取出来
     */
    public function helpcenter_display() {


        $head_title = $this->get_header_title('帮助中心详情页');
        $this->assign('head_title', $head_title);
        $this->display();
    }


}

