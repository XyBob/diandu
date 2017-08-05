<?php
/**
 * 人气商铺类
 */

class AcpHotGoodsAction extends AcpAction
{
	public function AcpHotGoodsAction()
	{
		parent::_initialize();
	}

	private function get_search_condition()
	{
		//初始化SQL查询的where子句
		$where = '';

		//标题
		$title = $this->_request('title');
		if ($title)
		{
			$where .= ' AND title LIKE "%' . $title . '%"';
		}

		//状态
		$isuse = $this->_request('isuse');
		if (is_numeric($isuse) && $isuse != -1)
		{
			$where .= ' AND isuse LIKE "%' . $isuse . '%"';
		}

		#echo $where;
		//重新赋值到表单
		$this->assign('title', $title);
		$this->assign('isuse', $isuse);

		/*重定向页面地址begin*/
		$redirect = $_SERVER['PATH_INFO'];
		$redirect .= $title ? '/title/' . $title : '';
		$redirect .= $isuse ? '/isuse/' . $isuse : '';

		$this->assign('redirect', url_jiami($redirect));
		/*重定向页面地址end*/

		return $where;
	}

	/**
	 * 获取人气商品列表，公共方法
     * @author 姜伟
	 * @param string $where
	 * @param string $head_title
	 * @param string $opt	引入的操作模板文件
     * @todo 获取人气商品列表，公共方法
     */
	function hot_goods_list($where, $head_title, $opt)
	{
		$where .= $this->get_search_condition();
		$hot_goods_obj = new HotGoodsModel();

        //分页处理
        import('ORG.Util.Pagelist');
        $count = $hot_goods_obj->getHotgoodsNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
		$hot_goods_obj->setStart($Page->firstRow);
        $hot_goods_obj->setLimit($Page->listRows);
        $show = $Page->show();
		$this->assign('show', $show);

		$hot_goods_list = $hot_goods_obj->getHotgoodsList('', $where, ' serial');
		echo json_encode($hot_goods_obj->getLastSql());
		exit;
		//$hot_goods_list = $hot_goods_obj->getListData($hot_goods_list);
		$this->assign('hot_goods_list', $hot_goods_list);
		//dump($hot_goods_list);
		$this->assign('opt', $opt);
		$this->assign('head_title', $head_title);
		#$this->display(APP_PATH . 'Tpl/AcpHotgoods/get_hot_goods_list.html');
	}

	public function get_hot_goods_list()
	{
		$this->hot_goods_list('1 = 1', '首页人气商品列表');
		$this->display();

	}

    /**
     * @access public
     * @todo 添加人气商品
     *
     */
    public function add_hot_goods()
    {
		$submit = $this->_post('submit');
		if($submit == 'submit')				//执行添加操作
		{
			$title	 = $this->_post('title');
			$link = $this->_post('link');
			$serial = $this->_post('serial');
			$pic	 = $this->_post('pic');
			$isuse	 = $this->_post('isuse');


			if(!is_numeric($serial))
			{
				$this->error('对不起，排序号必须为0-255的整数，请重新输入');
			}

			if(!$pic)
			{
				$this->error('对不起，请上传图片');
			}

			$data = array(
					'title'	=>	$title,
					'link'	=>	$link,
					'serial'=>	$serial,
					'pic'	=>	$pic,
					'isuse'	=>	$isuse,
			);
            $this->_resizeImg(APP_PATH . ltrim($pic, '/'));

			$hot_goods_obj = new HotGoodsModel();
			$hot_goods_id = $hot_goods_obj->addHotgoods($data,1);
			#echo "<pre>";
			#print_r($data);
			#die;
			if ($hot_goods_id)
			{
				$this->success('恭喜您，人气商品添加成功','/AcpHotGoods/get_hot_goods_list');
			}
			else
			{
				$this->success('抱歉，添加失败');
			}
		}

        $this->assign('pic_data', array(
            'name' => 'pic',
            'help' => '<span style="color:red;"></span><span style="color:green;"></span>暂时只支持上传单张2M以内JPEG,PNG,GIF格式图片'
        ));

		$this->assign('head_title','添加人气商品');
		$this->display();
	}

    /**
     * @access public
     * @todo 修改人气商品
     *
     */
    public function edit_hot_goods()
    {
		$redirect = $this->_get('redirect');
		$hot_goods_id = intval($this->_get('hot_goods_id'));
		$hot_goods_obj = new HotGoodsModel();
		$hot_goods_info = $hot_goods_obj->getHotGoodsInfo('hot_goods_id = ' . $hot_goods_id, '');
		#echo $hot_goods_obj->getLastSql();
		#echo "<pre>";
		#print_r($hot_goods_info);
		#die;

		if (!$hot_goods_info)
		{
			$this->error('抱歉，轮播图位不存在', U('/AcpHotgoods/get_hot_goods_list'));
		}

		$submit = $this->_post('submit');
		if($submit == 'submit')				//执行添加操作
		{
			$title	 = $this->_post('title');
			$link = $this->_post('link');
			$serial = $this->_post('serial');
			$pic	 = $this->_post('pic');
            // echo $pic;die;
			$isuse	 = $this->_post('isuse');



			if(!is_numeric($serial))
			{
				$this->error('对不起，排序号必须为0-255的整数，请重新输入');
			}

			if(!$pic)
			{
				$this->error('对不起，请上传图片');
			}

			if(!is_numeric($isuse))
			{
				$this->error('对不起，请选择是否显示');
			}

			$data = array(
					'title'	=>	$title,
					'link'	=>	$link,
					'serial'=>	$serial,
					'pic'	=>	$pic,
					'isuse'	=>	$isuse,
			);

			$hot_goods_obj = new HotGoodsModel($hot_goods_id);
			$success = $hot_goods_obj->editHotGoods($data);
            // echo $hot_goods_obj->getLastSql();die;
			if ($success)
			{
				$this->success('恭喜您，人气商品修改成功');
			}
			else
			{
				$this->success('抱歉，修改失败');
			}
		}
         //dump($hot_goods_info);
		foreach ($hot_goods_info AS $k => $v)
		{
			if ($k == 'pic')
			{
				$this->assign('pic_img_path', APP_PATH . $v);
			}
			if ($k == 'link')
			{
				$this->assign('hot_goods_link', $v);
			}
			$this->assign($k, $v);
		}

        $this->assign('pic_data', array(
            'name' => 'pic',
            'url' => $hot_goods_info['pic'],
            'help' => '<span style="color:red;"></span><span style="color:green;"></span>,暂时只支持上传单张2M以内JPEG,PNG,GIF格式图片'
        ));

		$this->assign('head_title','修改人气商品');
		$this->display();
	}

	//删除轮播图
	public function del_hot_goods()
    {
		$id        = intval($this->_post('id'));
		if ($id)
		{

            $hot_goods_obj = new HotGoodsModel($id);
            $success = $hot_goods_obj->delHotGoods($id);

			echo $success ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	/**
     * 图片压缩加水印
     * @param string $base_img 原图地址(绝对路径)
     * @return array 生成的图片信息
     */
    protected function _resizeImg($base_img) {
        import('ORG.Util.Image');
        $Image = new Image();

        $arr_img = array();

        if (!is_file($base_img)) return $arr_img;

        $base_img_info = pathinfo($base_img);
        $img_path = $base_img_info['dirname'] . '/';
        $img_extension = $base_img_info['extension'];
        $img_name = str_replace('.' . $img_extension, '', $base_img_info['basename']);

        /***** 等比缩放 开始 *****/

        // 生成大图
        $big_img_path = $img_path . $img_name . C('BIG_IMG_SUFFIX') . '.' . $img_extension;
        $big_img = $Image->thumb($base_img, $big_img_path, $img_extension, C('BIG_IMG_SIZE'), C('BIG_IMG_SIZE'));

        // 生成中图
        $middle_img_path = $img_path . $img_name . C('MIDDLE_IMG_SUFFIX') . '.' . $img_extension;
        $middle_img = $Image->thumb($base_img, $middle_img_path, $img_extension, C('MIDDLE_IMG_SIZE'), C('MIDDLE_IMG_SIZE'));

        // 生成小图
        $small_img_path = $img_path . $img_name . C('SMALL_IMG_SUFFIX') . '.' . $img_extension;
        $small_img = $Image->thumb($base_img, $small_img_path, $img_extension, C('SMALL_IMG_WIDTH'), C('SMALL_IMG_HEIGHT'));
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

	function get_hot_search_list(){
		$hot_search_obj=new HotSearchModel();

		//分页处理
		import('ORG.Util.Pagelist');
		$count = $hot_search_obj->getHotSearchNum();
		$Page = new Pagelist($count,C('PER_PAGE_NUM'));
		$hot_search_obj->setStart($Page->firstRow);
		$hot_search_obj->setLimit($Page->listRows);
		$show = $Page->show();
		$this->assign('show', $show);

		$hot_search_list=$hot_search_obj->getHotSearchList();
		$this->assign('hot_search_list',$hot_search_list);
		$this->assign('head_title', '热门搜索关键字列表');
		$this->display(APP_PATH . 'Tpl/AcpHotgoods/get_hot_goods_list.html');
	}

	function add_hot_search(){
		$hot_search_obj=new HotSearchModel();
		if(IS_POST){
			$data=$this->_post();
			unset($data['hot_search_id']);
			$result=$hot_search_obj->addHotSearch($data);
			if($result){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
		$this->assign('head_title', '添加热门搜索关键字');
		$this->display(APP_PATH . 'Tpl/AcpHotgoods/add_hot_goods.html');
	}

	function edit_hot_search(){
		$hot_search_obj=new HotSearchModel();
		$hot_search_id=$this->_get('hot_search_id');
		$hot_search_info=$hot_search_obj->getHotSearchInfo('hot_search_id='.$hot_search_id);
		if(IS_POST){
			$data=$this->_post();
			$hot_search_id=$data['hot_search_id'];
			unset($data['hot_search_id']);
			$result=$hot_search_obj->editHotSearch($data,$hot_search_id);
			if($result){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
		$this->assign('hot_search_info',$hot_search_info);
		$this->assign('head_title', '编辑热门搜索关键字');
		$this->display(APP_PATH . 'Tpl/AcpHotgoods/add_hot_goods.html');
	}
	function del_hot_search(){
		$hot_search_id=$this->_post('id');
		$hot_search_obj=new HotSearchModel();
		$result=$hot_search_obj->delHotSearch($hot_search_id);
		if($result){
			$return_data=array(
				'code'=>1,
				'msg'=>''
			);
		}else{
			$return_data=array(
					'code'=>-1,
					'msg'=>$hot_search_obj->getLastSql()
			);
		}
		echo json_encode($return_data);exit;
	}

}
?>
