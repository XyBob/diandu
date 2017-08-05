<?php
/**
 * 店铺分类控制器
 */

class AcpStoreTypeAction extends AcpAction
{
	public function AcpStoreTypeAction()
	{
		parent::_initialize();
	}

	/**
	 * 获取店铺分类列表，公共方法
     * @author 姜伟
	 * @param string $where
	 * @param string $head_title
	 * @param string $opt	引入的操作模板文件
     * @todo 获取店铺分类列表，公共方法
     */
	function store_type_list($where, $head_title, $opt)
	{

        $business_classify_name = $this->_request('business_classify_name');
        if ($business_classify_name)
        {
            $where .= ' AND business_classify_name LIKE "%' . $business_classify_name . '%"';
        }
		$Store_type_obj = new StoreTypeModel();

        //分页处理
        import('ORG.Util.Pagelist');
        $count = $Store_type_obj->getStoreTypeNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
		$Store_type_obj->setStart($Page->firstRow);
        $Store_type_obj->setLimit($Page->listRows);
        $show = $Page->show();
		$this->assign('page',$page);
		$this->assign('show', $show);

		$store_type_list = $Store_type_obj->getStoreTypeList('', $where, ' serial ASC');
		//$Store_type_list = $Store_type_obj->getListData($Store_type_list);
		$this->assign('store_type_list', $store_type_list);
		$this->assign('opt', $opt);
		$this->assign('head_title', $head_title);
		#$this->display(APP_PATH . 'Tpl/AcpStoreType/get_Store_type_list.html');
	}

	public function get_store_type_list()
	{
		$this->store_type_list('1 = 1', '店铺分类列表');
		$this->display();

	}

    /**
     * @access public
     * @todo 添加店铺分类
     *
     */
    public function add_store_type()
    {
		$submit = $this->_post('submit');
		if($submit == 'submit')				//执行添加操作
		{
			$business_classify_name= $this->_post('business_classify_name');
            $img_url = $this->_post('img_url');
			$serial = $this->_post('serial');
			$isuse=$this->_post('isuse');

			if(!is_numeric($serial))
			{
				$this->error('对不起，排序号必须为0-255的整数，请重新输入');
			}

			if(!$img_url)
			{
				$this->error('对不起，请上传图片');
			}

			$data = array(
					'business_classify_name'=>	$business_classify_name,
					'img_url'	=>	$img_url,
				    'isuse'=>$isuse,
					'serial'=>	$serial,
			);
            $this->_resizeImg(APP_PATH . ltrim($img_url, '/'));

			$Store_type_obj = new StoreTypeModel();
			$Store_type_id = $Store_type_obj->addStoreType($data,1);

			if ($Store_type_id)
			{
				$this->success('恭喜您，店铺分类添加成功','/AcpStoreType/get_Store_type_list');
			}
			else
			{
				$this->error('抱歉，添加失败');
			}
		}

        $this->assign('pic_data', array(
            'title' =>'分类图标',
            'name' => 'img_url',
            'help' => '<span style="color:red;">图片尺寸：64*64像素；</span><span style="color:green;"></span>暂时只支持上传单张2M以内JPEG,PNG,GIF格式图片'
        ));

		$this->assign('head_title','添加店铺分类');
		$this->display();
	}

    /**
     * @access public
     * @todo 修改店铺分类
     *
     */
    public function edit_store_type()
    {

        $business_classify_id = intval($this->_get('business_classify_id'));
		$store_type_obj = new StoreTypeModel();
		$store_type_info = $store_type_obj->getStoreTypeInfo('business_classify_id = ' . $business_classify_id, '');

		if (!$store_type_info)
		{
			$this->error('抱歉，此分类不存在', U('/AcpStoreType/get_store_type_list'));
		}
		$submit = $this->_post('submit');
		if($submit == 'submit')				//执行添加操作
		{
            $business_classify_name	= $this->_post('business_classify_name');
			$img_url= $this->_post('img_url');
            $serial = $this->_post('serial');
            $isuse = $this->_post('isuse');
			if(!is_numeric($serial))
			{
				$this->error('对不起，排序号必须为0-255的整数，请重新输入');
			}
			if(!$img_url)
			{
				$this->error('对不起，请上传图片');
			}

			$data = array(
					'business_classify_name'	=>	$business_classify_name,
					'serial'=>	$serial,
					'isuse'=>	$isuse,
					'img_url'	=>	$img_url,
			);

			$Store_type_obj = new StoreTypeModel($business_classify_id);
			$success = $Store_type_obj->editStoreType($data);
            // echo $Store_type_obj->getLastSql();die;
			if ($success)
			{
				$this->success('恭喜您，店铺分类修改成功',U('/AcpStoreType/get_store_type_list'));
			}
			else
			{
				$this->success('抱歉，修改失败');
			}
		}

        $this->assign('pic_data', array(
            'title' =>'分类图标',
            'name' => 'img_url',
            'url' => $store_type_info['img_url'],
            'help' => '<span style="color:red;">图片尺寸：64*64像素；</span><span style="color:green;"></span>,暂时只支持上传单张2M以内JPEG,PNG,GIF格式图片'
        ));
        $this->assign('store_type_info',$store_type_info);
		$this->assign('head_title','修改店铺分类');
		$this->display();
	}

	//删除轮播图
	public function del_store_type()
    {
		$id        = intval($this->_post('id'));
		if ($id)
		{

            $Store_type_obj = new StoreTypeModel($id);
            $success = $Store_type_obj->delStoreType($id);

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
	//模板商品列表
	function get_model_item(){
		//取该分类的模板商家id
		$business_classify_id=$this->_get('business_classify_id');
		$business_classify_obj=new BusinessClassifyModel();
		$business_classify_info=$business_classify_obj->getBusinessClassifyInfo($business_classify_id);
		$tpl_business_id=$business_classify_info['tpl_business_id'];
		if($tpl_business_id){
			$item_obj=new ItemModel();
			$where='business_id = '.$tpl_business_id;
			$item_name=$this->_post('item_name');
			$item_sn=$this->_post('item_sn');
			if($item_name){
				$where.=' AND item_name LIKE "%'.$item_name.'%"';
				$this->assign('item_name',$item_name);
			}
			if($item_sn){
				$where.=' AND item_sn LIKE "%'.$item_sn.'%"';
				$this->assign('item_sn',$item_sn);
			}

			//分页处理
			import('ORG.Util.Pagelist');
			$count = $item_obj->getItemNum($where);
			$Page = new Pagelist($count,C('PER_PAGE_NUM'));
			$item_obj->setStart($Page->firstRow);
			$item_obj->setLimit($Page->listRows);
			$show = $Page->show();
			$this->assign('show', $show);
			$this->assign('page', $Page);

			$item_list=$item_obj->getItemList('',$where);
		}else{
			$item_list=array();
		}

		$this->assign('item_list',$item_list);
		$this->assign('head_title', '模板商品');
		$this->display();
	}

	//商品详情
	function item_detail(){
		$item_id=$this->_get('item_id');
		$item_obj=new ItemModel();
		$item_info=$item_obj->getItemInfo('item_id = '.$item_id);
		$this->assign('item_info',$item_info);
		$this->assign('head_title','模板商品详情');
		$this->display();
	}
}
?>
