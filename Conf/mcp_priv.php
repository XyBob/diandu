<?php
/**
 * 管理员权限数组
 *
 * id 为权限唯一标识符
 * name 为权限或菜单对应的名字
 * mod_do_url 为对应的网址，其中do必须以Mcp_开头
 * in_menu 当此为空时表示本身就是左侧菜单；不为空时，其值必须是id，此id就是当' . C('USER_NAME') . '处于此权限页面时对应左侧菜单的特殊显示的权限id
 *
 * ID规则：第一级为01至99的数字；
 *        第二级为0101至9999的数字，其中前两位为上级ID值；
 *        第三级为010101至999999的数字，其中最前面两位为顶级ID值，中间两位为上级ID值；
 *        以此类推
 */
$admin_menu_file = array();

$admin_menu_file[0] = array('id' => '01', 'mod_name' => 'System', 'name' => '系统管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpConfig/base_config');
$admin_menu_file[0]['menu_list'] = array(
		'系统设置'	=> array(
			#array('id' => '0101', 'name' => '头部菜单设置', 'mod_do_url' => '/McpConfig/list_menu', 'in_menu' => ''),
				array('id' => '0101', 'name' => '修改密码', 'mod_do_url' => '/McpConfig/set_password', 'in_menu' => ''),
				array('id' => '0102', 'name' => '配送距离设置', 'mod_do_url' => '/McpConfig/set_range', 'in_menu' => ''),
				array('id' => '0105', 'name' => '店内付款二维码', 'mod_do_url' => '/McpConfig/qrcode', 'in_menu' => ''),
				array('id' => '0106', 'name' => '开关店设置', 'mod_do_url' => '/McpConfig/business_switch', 'in_menu' => ''),
			#	array('id' => '0102', 'name' => '基础设置', 'mod_do_url' => '/McpConfig/base_config', 'in_menu' => ''),			//OK-CC
			#	array('id' => '0198', 'name' => '分销设置', 'mod_do_url' => '/McpConfig/fenxiao_config', 'in_menu' => ''),			//OK-CC
			#	array('id' => '0104', 'name' => '搜索范围设置', 'mod_do_url' => '/McpConfig/set_range', 'in_menu' => ''),			//OK-CC
			#array('id' => '0192', 'name' => '配送费设置', 'mod_do_url' => '/McpConfig/send_setting', 'in_menu' => ''),			//OK-CC
			/*array('id' => '0199', 'name' => '新用户关注设置', 'mod_do_url' => '/McpConfig/subscribe_set', 'in_menu' => ''),*/
			#array('id' => '0135', 'name' => '高级设置', 'mod_do_url' => '/McpConfig/advanced_setting', 'in_menu' => ''),
			/*array('id' => '0103', 'name' => '短信设置', 'mod_do_url' => '/McpConfig/sms_config', 'in_menu' => ''),*/
			/*array('id' => '0137', 'name' => '支付方式设置', 'mod_do_url' => '/McpPayment/list_payment', 'in_menu' => ''),	//OK-DONE*/
			#array('id' => '0130', 'name' => '支付宝接口设置', 'mod_do_url' => '/McpPayment/set_alipay', 'in_menu' => '0137'),//OK-DONE
			#array('id' => '0131', 'name' => '网银在线接口设置', 'mod_do_url' => '/McpPayment/set_chinabank', 'in_menu' => '0137'),//OK-DONE
			#array('id' => '0132', 'name' => '电子钱包设置', 'mod_do_url' => '/McpPayment/set_wallet', 'in_menu' => '0137'),//OK-DONE
			#	array('id' => '0138', 'name' => '微信支付设置', 'mod_do_url' => '/McpPayment/set_wxpay', 'in_menu' => '0137'),//OK-DONE
			#	array('id' => '0139', 'name' => '微信APP支付设置', 'mod_do_url' => '/McpPayment/set_mobile_wxpay', 'in_menu' => '0137'),//OK-DONE
			#array('id' => '0133', 'name' => '线下付款设置', 'mod_do_url' => '/McpPayment/set_offline', 'in_menu' => '0137'),//OK-DONE
			// array('id' => '0134', 'name' => '关于潘朵拉', 'mod_do_url' => '/McpArticle/edit_about', 'in_menu' => ''),
// 		array('id' => '0105', 'name' => '邮件设置', 'mod_do_url' => '/McpConfig/email_config', 'in_menu' => ''),
			/*	array('id' => '0186', 'name' => '运费设置', 'mod_do_url' => '/McpConfig/shopping_fare', 'in_menu' => ''),*/
				/*array('id' => '0156', 'name' => '公众号菜单设置', 'mod_do_url' => '/McpConfig/menu_set', 'in_menu' => ''),*/
			/* 		array('id' => '0157', 'name' => '公众号关键字回复设置', 'mod_do_url' => '/McpConfig/auto_reply_list', 'in_menu' => ''),
                     array('id' => '0158', 'name' => '增加关键字回复', 'mod_do_url' => '/McpConfig/add_auto_reply', 'in_menu' => '0157'),
                     array('id' => '0159', 'name' => '修改关键字回复', 'mod_do_url' => '/McpConfig/edit_auto_reply', 'in_menu' => '0157'),
                     array('id' => '0160', 'name' => '公众号消息群发设置', 'mod_do_url' => '/McpConfig/set_mass_msg', 'in_menu' => ''),*/

		),
	/*'APP端通知管理'	=> array(
		array('id' => '0161', 'name' => '通知列表', 'mod_do_url' => '/McpAppPush/push_list', 'in_menu' => ''),
	 	array('id' => '0162', 'name' => '发送通知', 'mod_do_url' => '/McpAppPush/app_push', 'in_menu' => ''),
	 ),*/
	/* '配送设置'	=> array(
	 	array('id' => '0116', 'name' => '配送方式列表', 'mod_do_url' => '/McpShipping/list_company', 'in_menu' => '',),
	 	array('id' => '0117', 'name' => '添加配送方式', 'mod_do_url' => '/McpShipping/add_company', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0118', 'name' => '修改配送方式', 'mod_do_url' => '/McpShipping/edit_company', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0119', 'name' => '添加配送区域', 'mod_do_url' => '/McpShipping/add_region', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0120', 'name' => '修改配送区域', 'mod_do_url' => '/McpShipping/edit_region', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0121', 'name' => '快递单模板', 'mod_do_url' => '/McpShipping/list_express_template', 'in_menu' => '', 'in_top' => '0'),
	 	array('id' => '0122', 'name' => '修改快递单打印模板', 'mod_do_url' => '/McpShipping/edit_express_template', 'in_menu' => '0121', 'in_top' => '0')
	 ),*/
	#'大区管理'	=> array(
	#	array('id' => '0167', 'name' => '大区列表', 'mod_do_url' => '/McpBigArea/list_area', 'in_menu' => '',),
	#	array('id' => '0168', 'name' => '添加大区', 'mod_do_url' => '/McpBigArea/add_area', 'in_menu' => '',),
	#	array('id' => '0169', 'name' => '修改大区', 'mod_do_url' => '/McpBigArea/edit_area', 'in_menu' => '0167',),
	#),
	/*	'管理员与权限'	=> array(																						//OK-DONE
				array('id' => '0106', 'name' => '管理员列表', 'mod_do_url' => '/McpRole/list_admin', 'in_menu' => ''),
				array('id' => '0107', 'name' => '添加管理员', 'mod_do_url' => '/McpRole/add_admin', 'in_menu' => '0106'),
				array('id' => '0108', 'name' => '修改管理员', 'mod_do_url' => '/McpRole/edit_admin', 'in_menu' => '0106'),
				array('id' => '0109', 'name' => '删除管理员', 'mod_do_url' => '/McpRole/del_admin', 'in_menu' => '0106'),
				array('id' => '0110', 'name' => '激活/禁用管理员', 'mod_do_url' => '/McpRole/set_admin', 'in_menu' => '0106'),
				array('id' => '0111', 'name' => '恢复已删除管理员', 'mod_do_url' => '/McpRole/hf_admin', 'in_menu' => '0106'),
				array('id' => '0113', 'name' => '添加角色', 'mod_do_url' => '/McpRole/add_role', 'in_menu' => '0112'),
				array('id' => '0114', 'name' => '修改角色', 'mod_do_url' => '/McpRole/edit_role', 'in_menu' => '0112'),
				array('id' => '0115', 'name' => '删除角色', 'mod_do_url' => '/McpRole/del_role', 'in_menu' => '0112'),
				array('id' => '0116', 'name' => '激活/禁用角色', 'mod_do_url' => '/McpRole/set_admin_group', 'in_menu' => '0112'),
				array('id' => '0117', 'name' => '恢复已删除角色', 'mod_do_url' => '/McpRole/hf_admin_group', 'in_menu' => '0112'),
		),*/
	#'在线客服'	=> array(
	#	array('id' => '0122', 'name' => '上架的客服账号', 'mod_do_url' => '/McpCustomerServiceOnline/get_onsale_customer_service_online_list', 'in_menu' => ''),
	#	array('id' => '0123', 'name' => '下架的客服账号', 'mod_do_url' => '/McpCustomerServiceOnline/get_store_customer_service_online_list', 'in_menu' => ''),
	#	array('id' => '0124', 'name' => '添加客服', 'mod_do_url' => '/McpCustomerServiceOnline/add_customer_service_online', 'in_menu' => ''),
	#	array('id' => '0121', 'name' => '修改客服', 'mod_do_url' => '/McpCustomerServiceOnline/edit_customer_service_online', 'in_menu' => '0122'),
	#),
	/*	'轮播图'	=> array(
				array('id' => '0144', 'name' => '轮播图片列表', 'mod_do_url' => '/McpCustFlash/get_cust_flash_list', 'in_menu' => ''),//OK-DONE
				array('id' => '0145', 'name' => '添加轮播图片', 'mod_do_url' => '/McpCustFlash/add_cust_flash', 'in_menu' => ''),//OK-DONE
				array('id' => '0146', 'name' => '修改轮播图片', 'mod_do_url' => '/McpCustFlash/edit_cust_flash', 'in_menu' => '0144'),//OK-DONE
				array('id' => '0125', 'name' => '删除轮播图片', 'mod_do_url' => '/McpCustFlash/del_cust_flash', 'in_menu' => '0144'),//OK-DONE
		),
		'店铺类型管理'	=> array(
				array('id' => '0151', 'name' => '店铺类型列表', 'mod_do_url' => '/McpStoreType/get_store_type_list', 'in_menu' => ''),//OK-DONE
				array('id' => '0152', 'name' => '添加店铺类型', 'mod_do_url' => '/McpStoreType/add_store_type', 'in_menu' => ''),//OK-DONE
				array('id' => '0153', 'name' => '修改店铺类型', 'mod_do_url' => '/McpStoreType/edit_store_type', 'in_menu' => '0151'),//OK-DONE
				array('id' => '0154', 'name' => '删除店铺类型', 'mod_do_url' => '/McpStoreType/del_store_type', 'in_menu' => '0151'),//OK-DONE
		),*/
	/*'首页广告图片'	=> array(
		array('id' => '0152', 'name' => '首页广告图片列表', 'mod_do_url' => '/McpIndexAds/get_index_ads_list', 'in_menu' => ''),//OK-DONE
		array('id' => '0153', 'name' => '添加首页广告图片', 'mod_do_url' => '/McpIndexAds/add_index_ads', 'in_menu' => ''),//OK-DONE
		array('id' => '0154', 'name' => '修改首页广告图片', 'mod_do_url' => '/McpIndexAds/edit_index_ads', 'in_menu' => '0152'),//OK-DONE
		array('id' => '0155', 'name' => '删除首页广告图片', 'mod_do_url' => '/McpIndexAds/del_index_ads', 'in_menu' => '0152'),//OK-DONE
	),
    '街道管理'	=> array(
		array('id' => '0147', 'name' => '街道列表', 'mod_do_url' => '/McpStreet/get_street_list', 'in_menu' => ''),//OK-DONE
		array('id' => '0148', 'name' => '添加街道', 'mod_do_url' => '/McpStreet/add_street', 'in_menu' => ''),//OK-DONE
		array('id' => '0149', 'name' => '修改街道', 'mod_do_url' => '/McpStreet/edit_street', 'in_menu' => '0147'),//OK-DONE
		array('id' => '0151', 'name' => '删除街道', 'mod_do_url' => '/McpStreet/del_street', 'in_menu' => '0147'),//OK-DONE
	),*/
	#'顶部广告位'	=> array(
	#	array('id' => '0164', 'name' => '广告图片列表', 'mod_do_url' => '/McpCustFlash/top_adv_list', 'in_menu' => ''),//OK-CC
	#	array('id' => '0165', 'name' => '添加广告图片', 'mod_do_url' => '/McpCustFlash/add_adv', 'in_menu' => ''),//OK-CC
	#	array('id' => '0166', 'name' => '修改广告图片', 'mod_do_url' => '/McpCustFlash/edit_adv', 'in_menu' => '0164'),//OK-CC
	#	array('id' => '0125', 'name' => '删除轮播图片', 'mod_do_url' => '/McpCustFlash/del_adv', 'in_menu' => '0144'),//OK-CC
	#),
	/*
    '系统版本管理'	=> array(
        array('id' => '0118', 'name' => '安卓版APP设置', 'mod_do_url' => '/McpVersion/android_version_setting', 'in_menu' => ''),//going-JW
        array('id' => '0119', 'name' => 'IOS版APP设置', 'mod_do_url' => '/McpVersion/ios_version_setting', 'in_menu' => ''),//going-JW
    ),
     */
		/*'意见反馈管理'	=> array(
				array('id' => '0150', 'name' => '意见反馈列表', 'mod_do_url' => '/McpUser/get_user_suggest_list', 'in_menu' => ''),//OK-CC
		),*/

	// '友情链接'	=> array(
	// 	array('id' => '0118', 'name' => '友情链接列表', 'mod_do_url' => '/McpConfig/list_link', 'in_menu' => ''),
	// 	array('id' => '0119', 'name' => '添加友情链接', 'mod_do_url' => '/McpConfig/add_link', 'in_menu' => '0125', 'in_top' => '0'),
	// 	array('id' => '0120', 'name' => '修改友情链接', 'mod_do_url' => '/McpConfig/edit_link', 'in_menu' => '0125', 'in_top' => '0'),
	// ),
	/* '门店管理'	=> array(
	 	array('id' => '0188', 'name' => '门店列表', 'mod_do_url' => '/McpDept/dept_list', 'in_menu' => ''),
	 	array('id' => '0189', 'name' => '添加门店', 'mod_do_url' => '/McpDept/add_dept', 'in_menu' => '0188'),
	 	array('id' => '0187', 'name' => '门店启用', 'mod_do_url' => '/McpDept/set_enable', 'in_menu' => '0188'),
	 	array('id' => '0187', 'name' => '门店启用', 'mod_do_url' => '/McpDept/sync_data', 'in_menu' => '0188'),
	 	#array('id' => '0180', 'name' => '修改友情链接', 'mod_do_url' => '/McpConfig/edit_link', 'in_menu' => '0125', 'in_top' => '0'),
	 ),*/
);

$admin_menu_file[1] = array('id' => '02', 'mod_name' => 'User', 'name' =>  '商家管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpBusiness/edit_business');
$admin_menu_file[1]['menu_list'] = array(
		'商家管理' => array(
				array('id' => '0207', 'name' => '编辑我的店铺', 'mod_do_url' => '/McpBusiness/edit_business', 'in_menu' => ''),//
		),
		'关注我的用户'	=> array(
				array('id' => '0208', 'name' => '关注我的用户列表', 'mod_do_url' => '/McpBusiness/focus_my_store_user_list', 'in_menu' => ''),//
		),
);


$admin_menu_file[2] = array('id' => '03', 'mod_name' => 'Item', 'name' => C('ITEM_NAME') . '管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpItem/get_onsale_item_list');
$admin_menu_file[2]['menu_list'] = array(
	C('ITEM_NAME') . '管理'	=> array(
		array('id' => '0301', 'name' => '出售中的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_onsale_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0302', 'name' => '仓库中的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_store_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0316', 'name' => '库存报警的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_alarm_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0317', 'name' => '售罄的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_sold_out_item_list', 'in_menu' => ''),//OK-CC
		//array('id' => '0318', 'name' => '积分' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_integral_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0303', 'name' => '添加' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/add_item', 'in_menu' => ''),//OK-CC
		array('id' => '0304', 'name' => '修改' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/edit_item', 'in_menu' => '0301'),//OK-CC
		//array('id' => '0378', 'name' => '设置批发价' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/set_wholesale_price', 'in_menu' => '0301'),//OK-CC
	),//OK-CC
	//C('ITEM_NAME') . '统计'	=> array(			//going-WSQ
	//	array('id' => '0305', 'name' => '单品销量统计', 'mod_do_url' => '/AcpItem/item_sales_num_stat', 'in_menu' => ''),//单个商品的销量和销售量统计，并增加柱状图比较该商品本月和上月的销售额，可导出excel
	//	array('id' => '0315', 'name' => '导出单品销售报表', 'mod_do_url' => '/AcpItem/item_export', 'in_menu' => ''),//可以根据区域、省市县、时间、门店编码、商品ID等筛选导出
	//),
	C('ITEM_NAME') . '分类'	=> array(			//OK-DONE
		array('id' => '0307', 'name' => '商品分类列表', 'mod_do_url' => '/McpClass/get_level_one', 'in_menu' => ''),
		array('id' => '0308', 'name' => '添加商品分类', 'mod_do_url' => '/McpClass/add_level_one', 'in_menu' => ''),
		array('id' => '0309', 'name' => '修改一级分类', 'mod_do_url' => '/McpClass/edit_level_one', 'in_menu' => '0307'),
	/*	array('id' => '0310', 'name' => '二级分类列表', 'mod_do_url' => '/McpClass/get_level_two', 'in_menu' => ''),
		array('id' => '0311', 'name' => '添加二级分类', 'mod_do_url' => '/McpClass/add_level_two', 'in_menu' => ''),
		array('id' => '0312', 'name' => '修改二级分类', 'mod_do_url' => '/McpClass/edit_level_two', 'in_menu' => '0310'),*/
	),
	C('ITEM_NAME') . '规格属性'	=> array(		//OK-DONE
		array('id' => '0351', 'name' => C('ITEM_NAME') . '类型列表', 'mod_do_url' => '/McpItemType/list_type', 'in_menu' => ''),
		array('id' => '0352', 'name' => '添加' . C('ITEM_NAME') . '类型', 'mod_do_url' => '/McpItemType/add_type', 'in_menu' => '0351'),
		array('id' => '0353', 'name' => '编辑' . C('ITEM_NAME') . '类型', 'mod_do_url' => '/McpItemType/edit_type', 'in_menu' => '0351'),
	),
	'模板商品'	=> array(		//OK-DONE
		array('id' => '0354', 'name' => '商家分类列表', 'mod_do_url' => '/McpItem/store_type_list', 'in_menu' => ''),
		array('id' => '0355', 'name' => '模板商品列表', 'mod_do_url' => '/McpItem/get_model_item', 'in_menu' => '0354'),
		array('id' => '0356', 'name' => '模板商品详情', 'mod_do_url' => '/McpItem/item_detail', 'in_menu' => '0354'),
	),
	//'设置' . C('ITEM_NAME') . '类型'	=> array(
	//    array('id' => '0354', 'name' => '新品', 'mod_do_url' => '/AcpItem/new_item_list', 'in_menu' => ''),//OK-CC
	//    array('id' => '0364', 'name' => '新品设置', 'mod_do_url' => '/AcpItem/new_item_set', 'in_menu' => '0354'),//OK-CC
	//    array('id' => '0355', 'name' => '日常快速订单商品', 'mod_do_url' => '/AcpItem/quick_item_list', 'in_menu' => ''),//OK-CC
	//    array('id' => '0365', 'name' => '日常快速订单商品设置', 'mod_do_url' => '/AcpItem/quick_item_set', 'in_menu' => '0355'),//OK-CC
	//    array('id' => '0356', 'name' => '首批订单商品', 'mod_do_url' => '/AcpItem/first_buy_item_list', 'in_menu' => ''),//OK-CC
	//    array('id' => '0366', 'name' => '首批订单商品设置', 'mod_do_url' => '/AcpItem/first_buy_item_set', 'in_menu' => '0356'),//OK-CC
	//    array('id' => '0357', 'name' => '开业装修', 'mod_do_url' => '/AcpItem/new_shop_item_list', 'in_menu' => ''),//OK-CC
	//    array('id' => '0367', 'name' => '开业装修设置', 'mod_do_url' => '/AcpItem/new_shop_item_set', 'in_menu' => '0357'),//OK-CC
	//    array('id' => '0368', 'name' => '今日推荐', 'mod_do_url' => '/AcpItem/recommend_item_list', 'in_menu' => ''),//OK-CC
	//    array('id' => '0369', 'name' => '今日推荐设置', 'mod_do_url' => '/AcpItem/recommend_item_set', 'in_menu' => '0368'),//OK-CC
	//),//OK-CC
	//'品牌管理'	=> array(
	//    array('id' => '0358', 'name' => '品牌列表', 'mod_do_url' => '/AcpBrand/list_brand', 'in_menu' => ''),//OK-CC
	//    array('id' => '0359', 'name' => '添加品牌', 'mod_do_url' => '/AcpBrand/add_brand', 'in_menu' => ''),//OK-CC
	//    array('id' => '0360', 'name' => '编辑品牌', 'mod_do_url' => '/AcpBrand/edit_brand', 'in_menu' => '0358'),//OK-CC
	//),
	//'套餐商品管理'	=> array(
	//    array('id' => '0361', 'name' => '套餐商品列表', 'mod_do_url' => '/AcpItemPackage/get_item_package_list', 'in_menu' => ''),//OK-CC
	//    array('id' => '0362', 'name' => '添加套餐商品', 'mod_do_url' => '/AcpItemPackage/add_item_package', 'in_menu' => ''),//OK-CC
	//    array('id' => '0363', 'name' => '编辑套餐商品', 'mod_do_url' => '/AcpItemPackage/edit_item_package', 'in_menu' => '0361'),//OK-CC
	//),
);


/*$admin_menu_file[2] = array('id' => '03', 'mod_name' => 'Item', 'name' => C('ITEM_NAME') . '管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpItem/get_onsale_item_list');
$admin_menu_file[2]['menu_list'] = array(
	C('ITEM_NAME') . '管理'	=> array(
		array('id' => '0301', 'name' => '出售中的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_onsale_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0302', 'name' => '仓库中的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_store_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0316', 'name' => '库存报警的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_alarm_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0317', 'name' => '售罄的' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_sold_out_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0318', 'name' => '积分' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/get_integral_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0303', 'name' => '添加' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/add_item', 'in_menu' => ''),//OK-CC
		array('id' => '0304', 'name' => '修改' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/edit_item', 'in_menu' => '0301'),//OK-CC
		array('id' => '0378', 'name' => '设置批发价' . C('ITEM_NAME'), 'mod_do_url' => '/McpItem/set_wholesale_price', 'in_menu' => '0301'),//OK-CC
	),//OK-CC
	//C('ITEM_NAME') . '统计'	=> array(			//going-WSQ
	//	array('id' => '0305', 'name' => '单品销量统计', 'mod_do_url' => '/McpItem/item_sales_num_stat', 'in_menu' => ''),//单个商品的销量和销售量统计，并增加柱状图比较该商品本月和上月的销售额，可导出excel
	//	array('id' => '0315', 'name' => '导出单品销售报表', 'mod_do_url' => '/McpItem/item_export', 'in_menu' => ''),//可以根据区域、省市县、时间、门店编码、商品ID等筛选导出
	//),
	C('ITEM_NAME') . '分类'	=> array(			//OK-DONE
		array('id' => '0307', 'name' => '一级分类列表', 'mod_do_url' => '/McpClass/get_level_one', 'in_menu' => ''),
		array('id' => '0308', 'name' => '添加一级分类', 'mod_do_url' => '/McpClass/add_level_one', 'in_menu' => ''),
		array('id' => '0309', 'name' => '修改一级分类', 'mod_do_url' => '/McpClass/edit_level_one', 'in_menu' => '0307'),
		array('id' => '0310', 'name' => '二级分类列表', 'mod_do_url' => '/McpClass/get_level_two', 'in_menu' => ''),
		array('id' => '0311', 'name' => '添加二级分类', 'mod_do_url' => '/McpClass/add_level_two', 'in_menu' => ''),
		array('id' => '0312', 'name' => '修改二级分类', 'mod_do_url' => '/McpClass/edit_level_two', 'in_menu' => '0310'),
	),
	C('ITEM_NAME') . '规格属性'	=> array(		//OK-DONE
		array('id' => '0351', 'name' => C('ITEM_NAME') . '类型列表', 'mod_do_url' => '/McpItemType/list_type', 'in_menu' => ''),
        array('id' => '0352', 'name' => '添加' . C('ITEM_NAME') . '类型', 'mod_do_url' => '/McpItemType/add_type', 'in_menu' => '0351'),
        array('id' => '0353', 'name' => '编辑' . C('ITEM_NAME') . '类型', 'mod_do_url' => '/McpItemType/edit_type', 'in_menu' => '0351'),
	),
	//'设置' . C('ITEM_NAME') . '类型'	=> array(
    //    array('id' => '0354', 'name' => '新品', 'mod_do_url' => '/McpItem/new_item_list', 'in_menu' => ''),//OK-CC
    //    array('id' => '0364', 'name' => '新品设置', 'mod_do_url' => '/McpItem/new_item_set', 'in_menu' => '0354'),//OK-CC
    //    array('id' => '0355', 'name' => '日常快速订单商品', 'mod_do_url' => '/McpItem/quick_item_list', 'in_menu' => ''),//OK-CC
    //    array('id' => '0365', 'name' => '日常快速订单商品设置', 'mod_do_url' => '/McpItem/quick_item_set', 'in_menu' => '0355'),//OK-CC
    //    array('id' => '0356', 'name' => '首批订单商品', 'mod_do_url' => '/McpItem/first_buy_item_list', 'in_menu' => ''),//OK-CC
    //    array('id' => '0366', 'name' => '首批订单商品设置', 'mod_do_url' => '/McpItem/first_buy_item_set', 'in_menu' => '0356'),//OK-CC
    //    array('id' => '0357', 'name' => '开业装修', 'mod_do_url' => '/McpItem/new_shop_item_list', 'in_menu' => ''),//OK-CC
    //    array('id' => '0367', 'name' => '开业装修设置', 'mod_do_url' => '/McpItem/new_shop_item_set', 'in_menu' => '0357'),//OK-CC
    //    array('id' => '0368', 'name' => '今日推荐', 'mod_do_url' => '/McpItem/recommend_item_list', 'in_menu' => ''),//OK-CC
    //    array('id' => '0369', 'name' => '今日推荐设置', 'mod_do_url' => '/McpItem/recommend_item_set', 'in_menu' => '0368'),//OK-CC
	//),//OK-CC
	//'品牌管理'	=> array(
    //    array('id' => '0358', 'name' => '品牌列表', 'mod_do_url' => '/McpBrand/list_brand', 'in_menu' => ''),//OK-CC
    //    array('id' => '0359', 'name' => '添加品牌', 'mod_do_url' => '/McpBrand/add_brand', 'in_menu' => ''),//OK-CC
    //    array('id' => '0360', 'name' => '编辑品牌', 'mod_do_url' => '/McpBrand/edit_brand', 'in_menu' => '0358'),//OK-CC
	//),
	//'套餐商品管理'	=> array(
    //    array('id' => '0361', 'name' => '套餐商品列表', 'mod_do_url' => '/McpItemPackage/get_item_package_list', 'in_menu' => ''),//OK-CC
    //    array('id' => '0362', 'name' => '添加套餐商品', 'mod_do_url' => '/McpItemPackage/add_item_package', 'in_menu' => ''),//OK-CC
    //    array('id' => '0363', 'name' => '编辑套餐商品', 'mod_do_url' => '/McpItemPackage/edit_item_package', 'in_menu' => '0361'),//OK-CC
	//),
);*/

$admin_menu_file[3] = array('id' => '03', 'mod_name' => 'Order', 'name' => '订单管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpOrder/get_pre_pay_order_list');
$admin_menu_file[3]['menu_list'] = array(

		'历史订单'	=> array(
				array('id' => '0309', 'name' => '所有订单', 'mod_do_url' => '/McpOrder/get_all_order_list', 'in_menu' => ''),//going-WSQ
				array('id' => '0319', 'name' => '已发货的订单', 'mod_do_url' => '/McpOrder/get_delivered_order_list', 'in_menu' => ''),//going-WSQ
				array('id' => '0318', 'name' => '确认收货的订单', 'mod_do_url' => '/McpOrder/get_confirmed_order_list', 'in_menu' => ''),//going-WS
				array('id' => '0320', 'name' => '等待发货的订单', 'mod_do_url' => '/McpOrder/get_pre_deliver_order_list', 'in_menu' => ''),//going-WSQ
				array('id' => '0321', 'name' => '退款受理中的订单', 'mod_do_url' => '/McpOrder/get_refunding_order_list', 'in_menu' => ''),//going-WSQ
				array('id' => '0322', 'name' => '退款的订单', 'mod_do_url' => '/McpOrder/get_refunded_order_list', 'in_menu' => ''),//going-WSQ
				array('id' => '0310', 'name' => '订单详情', 'mod_do_url' => '/McpOrder/order_detail', 'in_menu' => '0309'),//going-WSQ
				array('id' => '0311', 'name' => '取消的订单', 'mod_do_url' => '/McpOrder/get_canceled_order_list', 'in_menu' => ''),//going-WSQ
		),//going-WSQ
		'订单统计'	=> array(
				array('id' => '0313', 'name' => '订单日统计', 'mod_do_url' => '/McpOrder/order_stat_by_day', 'in_menu' => ''),//going-WSQ
				array('id' => '0314', 'name' => '订单月统计', 'mod_do_url' => '/McpOrder/order_stat_by_month', 'in_menu' => ''),//going-WSQ
				array('id' => '0317', 'name' => '订单年统计', 'mod_do_url' => '/McpOrder/order_stat_by_year', 'in_menu' => ''),//going-WSQ
			//array('id' => '0421', 'name' => '订单区域统计', 'mod_do_url' => '/McpOrder/order_stat_by_area', 'in_menu' => ''),//going-WSQ
				array('id' => '0315', 'name' => '导出订单', 'mod_do_url' => '/McpOrder/order_export', 'in_menu' => ''),//可以根据区域、省市县、时间、门店编码等筛选导出			//going-WSQ
		),
);

$admin_menu_file[4] = array('id' => '04', 'mod_name' => 'Account', 'name' => '财务管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpFinance/get_account_apply_list');
$admin_menu_file[4]['menu_list'] = array(
		'日常处理'	=> array(
			#array('id' => '0501', 'name' => '入账申请列表', 'mod_do_url' => '/McpFinance/get_account_apply_list', 'in_menu' => ''),
			#	array('id' => '0402', 'name' => '调整余额', 'mod_do_url' => '/McpFinance/edit_account', 'in_menu' => ''),//增加手机号、QQ号，修改字段名称展示之，加导出按钮，跳到财务导出页导出Excel	//going-WSQ
				array('id' => '0403', 'name' => '财务变动明细', 'mod_do_url' => '/McpFinance/get_account_log', 'in_menu' => ''),//修改字段名称展示之	//going-WSQ
		),
		'提现管理'	=> array(
			    array('id' => '0415', 'name' => '提现', 'mod_do_url' => '/McpDeposit/get_deposit', 'in_menu' => ''),
				array('id' => '0416', 'name' => '提现记录', 'mod_do_url' => '/McpDeposit/get_deposit_list', 'in_menu' => ''),
			    array('id' => '0417', 'name' => '提现提交', 'mod_do_url' => '/McpDeposit/deposit_apply', 'in_menu' => '0315'),
//				array('id' => '0417', 'name' => '提现申请列表', 'mod_do_url' => '/McpDeposit/get_deposit_apply_list', 'in_menu' => ''),
//				array('id' => '0419', 'name' => '通过提现申请', 'mod_do_url' => '/McpDeposit/set_state', 'in_menu' => '0417'),
//				array('id' => '0420', 'name' => '拒绝提现申请', 'mod_do_url' => '/McpDeposit/refuse', 'in_menu' => '0417'),
				array('id' => '0425', 'name' => '提现统计', 'mod_do_url' => '/McpDeposit/deposit_stat', 'in_menu' => ''),
			/*array('id' => '0524', 'name' => '导出提现申请', 'mod_do_url' => '/McpDeposit/export_deposit_apply', 'in_menu' => ''),*/
		),
		'银行卡管理'	=> array(
			array('id' => '0426', 'name' => '绑定银行卡', 'mod_do_url' => '/McpFinance/bind_bank', 'in_menu' => ''),////going-WSQ
			array('id' => '0427', 'name' => '我的银行卡', 'mod_do_url' => '/McpFinance/bank_card_list', 'in_menu' => ''),//增加手机号、QQ号，修改字段名称展示之，加导出按钮，跳到财务导出页导出Excel	//going-WSQ
			array('id' => '0428', 'name' => '编辑银行卡', 'mod_do_url' => '/McpFinance/edit_bank_info', 'in_menu' => '0327'),////going-WSQ
			//array('id' => '0426', 'name' => '用户银行卡列表', 'mod_do_url' => '/McpFinance/bank_card_list', 'in_menu' => ''),//增加手机号、QQ号，修改字段名称展示之，加导出按钮，跳到财务导出页导出Excel	//going-WSQ
			/*array('id' => '0427', 'name' => '财务变动明细', 'mod_do_url' => '/McpFinance/get_account_log', 'in_menu' => ''),//修改字段名称展示之	//going-WSQ*/
		),
		'财务统计'	=> array(
				array('id' => '0406', 'name' => '收益日统计', 'mod_do_url' => '/McpFinance/recharge_stat_by_day', 'in_menu' => ''),
				array('id' => '0407', 'name' => '收益月统计', 'mod_do_url' => '/McpFinance/recharge_stat_by_month', 'in_menu' => ''),
				array('id' => '0408', 'name' => '收益年统计', 'mod_do_url' => '/McpFinance/recharge_stat_by_year', 'in_menu' => ''),
				array('id' => '0405', 'name' => '导出财务数据', 'mod_do_url' => '/McpFinance/export_account', 'in_menu' => ''),//增加筛选项，可根据手机号、门店编号导出	//going-WSQ
		),
);

/*$admin_menu_file[4] = array('id' => '05', 'mod_name' => 'page_model', 'name' => '商家申请管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpTempletPackage/get_templet_package_list');
$admin_menu_file[4]['menu_list'] = array(
		'页面模板'	=> array(
				array('id' => '0509', 'name' => '待审核的商家申请', 'mod_do_url' => '/McpPage/get_selected_page_list', 'in_menu' => ''),
				array('id' => '0510', 'name' => '审核通过的商家申请', 'mod_do_url' => '/McpPage/edit_page', 'in_menu' => ''),
		),

);*/

$admin_menu_file[5] = array('id' => '07', 'mod_name' => 'FreightActivity', 'name' => '营销活动管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpDiscountMinus/get_discount_minus_list');
$admin_menu_file[5]['menu_list'] = array(
	'满减活动管理'	=> array(# NEW-done-WSQ
		array('id' => '0703', 'name' => '添加满减活动', 'mod_do_url' => '/McpDiscountMinus/add_discount_minus', 'in_menu' => ''),
		array('id' => '0705', 'name' => '修改满减活动', 'mod_do_url' => '/McpDiscountMinus/edit_discount_minus', 'in_menu' => '0701'),
        array('id' => '0701', 'name' => '满减活动列表', 'mod_do_url' => '/McpDiscountMinus/get_discount_minus_list', 'in_menu' => ''),
        array('id' => '0702', 'name' => '满减活动明细', 'mod_do_url' => '/McpDiscountMinus/get_discount_minus_detail', 'in_menu' => ''),
        // array('id' => '0703', 'name' => '满减活动统计', 'mod_do_url' => '/McpDiscountMinus/discount_minus_stat', 'in_menu' => ''),
    ),
//    '买赠活动管理'    => array(# NEW-going-JW
//        array('id' => '0709', 'name' => '添加买赠活动', 'mod_do_url' => '/McpBuyGive/add_buy_give', 'in_menu' => ''),
//        array('id' => '0710', 'name' => '修改买赠活动', 'mod_do_url' => '/McpBuyGive/edit_buy_give', 'in_menu' => '0706'),
//		// array('id' => '0704', 'name' => '系统买赠活动列表', 'mod_do_url' => '/McpBuyGive/get_system_buy_give_list', 'in_menu' => ''),
//		// array('id' => '0705', 'name' => '仓储买赠活动列表', 'mod_do_url' => '/McpBuyGive/get_merchant_buy_give_list', 'in_menu' => ''),
//		array('id' => '0706', 'name' => '所有买赠活动列表', 'mod_do_url' => '/McpBuyGive/get_all_buy_give_list', 'in_menu' => ''),
//		array('id' => '0707', 'name' => '买赠活动明细', 'mod_do_url' => '/McpBuyGive/get_buy_give_detail', 'in_menu' => ''),
//		// array('id' => '0708', 'name' => '买赠活动统计', 'mod_do_url' => '/McpBuyGive/buy_give_stat', 'in_menu' => ''),
//	),
//    '礼品管理'  => array(# NEW-done-WSQ
//        array('id' => '0728', 'name' => '礼品列表', 'mod_do_url' => '/McpGift/get_gift_list', 'in_menu' => ''),
//        array('id' => '0729', 'name' => '添加礼品', 'mod_do_url' => '/McpGift/add_gift', 'in_menu' => ''),
//        array('id' => '0730', 'name' => '修改礼品', 'mod_do_url' => '/McpGift/edit_gift', 'in_menu' => '0728'),
//        array('id' => '0731', 'name' => '礼品上下架', 'mod_do_url' => '/McpGift/set_enable', 'in_menu' => '0728'),
//        array('id' => '0732', 'name' => '礼品批量上下架', 'mod_do_url' => '/McpGift/batch_set_enable', 'in_menu' => '0728'),
//        array('id' => '0733', 'name' => '删除礼品', 'mod_do_url' => '/McpGift/delete_gift', 'in_menu' => '0728'),
//        array('id' => '0734', 'name' => '批量删除礼品', 'mod_do_url' => '/McpGift/batch_delete_gift', 'in_menu' => '0728'),
//    ),
// 	'特价促销活动管理'	=> array(# NEW-done-WSQ
// 		array('id' => '0740', 'name' => '待审核列表', 'mod_do_url' => '/McpSpecialOffer/get_per_apply_special_offer_list', 'in_menu' => ''),
// 		array('id' => '0711', 'name' => '特价促销活动列表', 'mod_do_url' => '/McpSpecialOffer/get_special_offer_list', 'in_menu' => ''),
// 		array('id' => '0712', 'name' => '特价促销活动明细', 'mod_do_url' => '/McpSpecialOffer/get_special_offer_detail', 'in_menu' => ''),
// 		array('id' => '0713', 'name' => '特价促销活动统计', 'mod_do_url' => '/McpSpecialOffer/special_offer_stat', 'in_menu' => ''),
// 	),
    '优惠券管理' => array(# NEW-done-WSQ
        array('id' => '0714', 'name' => '添加优惠券', 'mod_do_url' => '/McpVouchers/add_vouchers', 'in_menu' => ''),
        array('id' => '0715', 'name' => '修改优惠券', 'mod_do_url' => '/McpVouchers/edit_vouchers', 'in_menu' => '0718'),
        // array('id' => '0716', 'name' => '系统优惠券列表', 'mod_do_url' => '/McpVouchers/get_system_vouchers_list', 'in_menu' => ''),
        // array('id' => '0717', 'name' => '仓储优惠券列表', 'mod_do_url' => '/McpVouchers/get_merchant_vouchers_list', 'in_menu' => ''),
        array('id' => '0718', 'name' => '所有优惠券列表', 'mod_do_url' => '/McpVouchers/get_all_vouchers_list', 'in_menu' => ''),
        array('id' => '0719', 'name' => '优惠券明细', 'mod_do_url' => '/McpVouchers/get_vouchers_detail', 'in_menu' => ''),
        // array('id' => '0720', 'name' => '优惠券统计', 'mod_do_url' => '/McpVouchers/vouchers_stat', 'in_menu' => ''),
        array('id' => '0735', 'name' => '删除优惠券', 'mod_do_url' => '/McpVouchers/delete_vouchers', 'in_menu' => '0714'),
        array('id' => '0736', 'name' => '批量删除优惠券', 'mod_do_url' => '/McpVouchers/batch_delete_vouchers', 'in_menu' => '0714'),
        array('id' => '0737', 'name' => '优惠券上下架', 'mod_do_url' => '/McpVouchers/set_enable', 'in_menu' => '0714'),
        array('id' => '0738', 'name' => '优惠券批量上下架', 'mod_do_url' => '/McpVouchers/batch_set_enable', 'in_menu' => '0714'),
    ),
	'站内信'	=> array(# NEW-done-WSQ
		array('id' => '0739', 'name' => '站内信列表', 'mod_do_url' => '/McpMessage/list_message', 'in_menu' => ''),
		array('id' => '0740', 'name' => '发布站内信', 'mod_do_url' => '/McpMessage/add_message', 'in_menu' => ''),
		array('id' => '0741', 'name' => '编辑站内信', 'mod_do_url' => '/McpMessage/edit_message', 'in_menu' => '0739'),
			// array('id' => '0703', 'name' => '满减活动统计', 'mod_do_url' => '/McpDiscountMinus/discount_minus_stat', 'in_menu' => ''),
		),
//    '优惠券领券管理'   => array(# tale
//        array('id' => '0764', 'name' => '添加领券', 'mod_do_url' => '/McpCouponSet/add_coupon_set', 'in_menu' => ''),
//        array('id' => '0765', 'name' => '修改领券', 'mod_do_url' => '/McpCouponSet/edit_coupon_set', 'in_menu' => '0767'),
//        array('id' => '0767', 'name' => '所有领券列表', 'mod_do_url' => '/McpCouponSet/get_coupon_set_list', 'in_menu' => ''),
//	),
//	'团购商品管理'	=> array(
//		array('id' => '0768', 'name' => '团购中的商品', 'mod_do_url' => '/McpGroupBuy/get_onsale_group_buy_list', 'in_menu' => ''),
//		array('id' => '0769', 'name' => '仓库中的团购商品', 'mod_do_url' => '/McpGroupBuy/get_store_group_buy_list', 'in_menu' => ''),
//		array('id' => '0770', 'name' => '添加团购商品', 'mod_do_url' => '/McpGroupBuy/add_group_buy', 'in_menu' => ''),
//		array('id' => '0771', 'name' => '修改团购商品', 'mod_do_url' => '/McpGroupBuy/edit_group_buy', 'in_menu' => '0421'),
//	),
//	'团购订单管理'	=> array(
//		array('id' => '0772', 'name' => '已付款未结束订单', 'mod_do_url' => '/McpOrder/get_group_payed_order_list', 'in_menu' => ''),
//		array('id' => '0773', 'name' => '已完成/待发货订单', 'mod_do_url' => '/McpOrder/get_group_pre_deliver_order_list', 'in_menu' => ''),
//		array('id' => '0774', 'name' => '已发货订单', 'mod_do_url' => '/McpOrder/get_group_delivered_order_list', 'in_menu' => ''),
//		array('id' => '0775', 'name' => '发货', 'mod_do_url' => '/McpOrder/deliver_order', 'in_menu' => '0501'),
//		array('id' => '0776', 'name' => '待退款订单', 'mod_do_url' => '/McpOrder/get_group_pre_refund_order_list', 'in_menu' => ''),
//		array('id' => '0777', 'name' => '已退款订单', 'mod_do_url' => '/McpOrder/get_group_refunded_order_done_list', 'in_menu' => ''),
//	),
);
$admin_menu_file[6] = array('id' => '08', 'mod_name' => 'Evaluation', 'name' => '用户评价', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpUserEvaluation/get_evaluation');
$admin_menu_file[6]['menu_list'] = array(
    '用户评价'	=> array(# NEW-done-WSQ
        array('id' => '0803', 'name' => '用户评分列表', 'mod_do_url' => '/McpUserEvaluation/get_evaluation', 'in_menu' => ''),
    ),
);

/*$admin_menu_file[7] = array('id' => '07', 'mod_name' => 'School', 'name' => '学校信息管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpSchool/get_school_list');
$admin_menu_file[7]['menu_list'] = array(
	'学校信息管理'	=> array(
		array('id' => '0809', 'name' => '学校列表', 'mod_do_url' => '/McpSchool/get_school_list', 'in_menu' => ''),
		array('id' => '0810', 'name' => '添加学校', 'mod_do_url' => '/McpSchool/add_school', 'in_menu' => ''),
		array('id' => '0811', 'name' => '修改学校', 'mod_do_url' => '/McpSchool/edit_school', 'in_menu' => '0809'),
		array('id' => '0811', 'name' => '设置地理围栏', 'mod_do_url' => '/McpSchool/set_wl', 'in_menu' => '0809'),

	),
);*/
/*$admin_menu_file[5] = array('id' => '06', 'mod_name' => 'Article', 'name' => '文章资讯', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpArticle/list_article');
$admin_menu_file[5]['menu_list'] = array(
		'资讯管理'	=> array(
				array('id' => '0601', 'name' => '资讯列表', 'mod_do_url' => '/McpArticle/list_article', 'in_menu' => ''),//OK-CC
				array('id' => '0602', 'name' => '添加资讯', 'mod_do_url' => '/McpArticle/add_article', 'in_menu' => ''),//OK-CC
				array('id' => '0603', 'name' => '修改资讯', 'mod_do_url' => '/McpArticle/edit_article', 'in_menu' => '0601'),//OK-CC
		),
		'公告管理'	=> array(
				array('id' => '0611', 'name' => '公告列表', 'mod_do_url' => '/McpNotice/list_notice', 'in_menu' => ''),//OK-CC
				array('id' => '0612', 'name' => '添加公告', 'mod_do_url' => '/McpNotice/add_notice', 'in_menu' => ''),//OK-CC
				array('id' => '0613', 'name' => '修改公告', 'mod_do_url' => '/McpNotice/edit_notice', 'in_menu' => '0811'),//OK-CC
		),
);*/

// $admin_menu_file[6] = array('id' => '07', 'mod_name' => 'Stat', 'name' => '统计', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpStat/today_flow_detail');
// $admin_menu_file[6]['menu_list'] = array(
// 	'流量统计'	=> array(
// 		array('id' => '0701', 'name' => '今日流量', 'mod_do_url' => '/McpStat/today_flow_detail', 'in_menu' => ''),
// 		array('id' => '0702', 'name' => '历史流量日统计', 'mod_do_url' => '/McpStat/history_flow_detail_d', 'in_menu' => ''),
// 		array('id' => '0706', 'name' => '历史流量月统计', 'mod_do_url' => '/McpStat/history_flow_detail_m', 'in_menu' => ''),
// 		array('id' => '0707', 'name' => '历史流量年统计', 'mod_do_url' => '/McpStat/history_flow_detail_y', 'in_menu' => ''),
// 		#array('id' => '0703', 'name' => '页面统计', 'mod_do_url' => '/McpStat/page_stat', 'in_menu' => ''),
// 	),
// 	#'客服统计'	=> array(
// 		#array('id' => '0704', 'name' => '客服流量详情', 'mod_do_url' => '/McpStat/customer_service_detail', 'in_menu' => ''),
// 		#array('id' => '0705', 'name' => '客服流量统计', 'mod_do_url' => '/McpStat/customer_service_stat', 'in_menu' => '')
// 	#),
// );

//$admin_menu_file[6] = array('id' => '07', 'mod_name' => 'Integer', 'name' => '积分管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpIntegral/get_integral_list');
//$admin_menu_file[6]['menu_list'] = array(
//	'积分管理'	=> array(
//		array('id' => '0701', 'name' => '积分列表', 'mod_do_url' => '/McpIntegral/get_user_integral_list', 'in_menu' => ''),	//操作栏增加"调整积分", 点击调到调整积分页，选择变动类型，修改积分余额(user表left_integral和total_integral)	//OK-CC
//		array('id' => '0702', 'name' => '积分明细', 'mod_do_url' => '/McpIntegral/get_user_integral_detail', 'in_menu' => ''),//OK-CC
//		array('id' => '0709', 'name' => '调整积分', 'mod_do_url' => '/McpIntegral/get_user_integral_edit', 'in_menu' => '0701'),//OK-CC
//		array('id' => '0710', 'name' => '积分兑换列表', 'mod_do_url' => '/McpIntegral/get_order_list', 'in_menu' => ''),
//        array('id' => '0711', 'name' => '积分兑换详情', 'mod_do_url' => '/McpIntegral/order_detail', 'in_menu' => '0710'),
//        array('id' => '0712', 'name' => '兑换物品发货', 'mod_do_url' => '/McpIntegral/deliver_order', 'in_menu' => '0710'),
//	),
//	'积分变动类型管理'	=> array(
//		array('id' => '0703', 'name' => '积分一级变动类型列表', 'mod_do_url' => '/McpIntegral/get_level_one', 'in_menu' => ''),//OK-CC
//		array('id' => '0704', 'name' => '添加积分一级变动类型', 'mod_do_url' => '/McpIntegral/add_level_one', 'in_menu' => ''),//OK-CC
//		array('id' => '0705', 'name' => '修改积分一级变动类型', 'mod_do_url' => '/McpIntegral/edit_level_one', 'in_menu' => '0703'),//OK-CC
//		array('id' => '0706', 'name' => '积分二级变动类型列表', 'mod_do_url' => '/McpIntegral/get_level_two', 'in_menu' => ''),//OK-CC
//		array('id' => '0707', 'name' => '添加积分二级变动类型', 'mod_do_url' => '/McpIntegral/add_level_two', 'in_menu' => ''),//OK-CC
//		array('id' => '0708', 'name' => '修改积分二级变动类型', 'mod_do_url' => '/McpIntegral/edit_level_two', 'in_menu' => '0706'),//OK-CC
//	),
//);
//
//$admin_menu_file[7] = array('id' => '08', 'mod_name' => 'Promo', 'name' => '营销管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpPromo/list_item_discount');
//$admin_menu_file[7]['menu_list'] = array(
//	#'礼品管理'	=> array(
//		#array('id' => '0801', 'name' => '礼品列表', 'mod_do_url' => '/McpGift/list_gift', 'in_menu' => ''),
//			#array('id' => '0811', 'name' => '编辑礼品', 'mod_do_url' => '/McpGift/edit_gift', 'in_menu' => '0801'),
//		#array('id' => '0802', 'name' => '添加礼品', 'mod_do_url' => '/McpGift/add_gift', 'in_menu' => ''),
//		#array('id' => '0803', 'name' => '礼品赠送记录', 'mod_do_url' => '/McpGift/list_gift_log', 'in_menu' => ''),
//	#),
//	'营销规则'	=> array(
//		array('id' => '0804', 'name' => '指定商品直接优惠', 'mod_do_url' => '/McpPromo/list_item_discount', 'in_menu' => ''),//going-WSQ
//		array('id' => '0812', 'name' => '添加商品促销活动', 'mod_do_url' => '/McpPromo/add_item_discount', 'in_menu' => '0804'),//going-WSQ
//		array('id' => '0813', 'name' => '编辑商品优惠活动', 'mod_do_url' => '/McpPromo/edit_item_discount', 'in_menu' => '0804'),//going-WSQ
//		#array('id' => '0808', 'name' => '指定商品赠礼品', 'mod_do_url' => '/McpPromo/list_item_gift', 'in_menu' => ''),
//		#array('id' => '0814', 'name' => '添加商品促销活动(送礼)', 'mod_do_url' => '/McpPromo/add_item_gift', 'in_menu' => '0808'),
//		#array('id' => '0815', 'name' => '编辑商品促销活动(送礼)', 'mod_do_url' => '/McpPromo/edit_item_gift', 'in_menu' => '0808'),
//		array('id' => '0806', 'name' => '订单满额优惠', 'mod_do_url' => '/McpPromo/list_order_discount', 'in_menu' => ''),//going-WSQ
//		array('id' => '0816', 'name' => '添加订单促销(优惠)', 'mod_do_url' => '/McpPromo/add_order_discount', 'in_menu' => '0806'),//going-WSQ
//		array('id' => '0817', 'name' => '编辑订单促销(优惠)', 'mod_do_url' => '/McpPromo/edit_order_discount', 'in_menu' => '0806'),//going-WSQ
//		#array('id' => '0807', 'name' => '订单满额包邮', 'mod_do_url' => '/McpPromo/set_free_shipping', 'in_menu' => ''),
//		#array('id' => '0808', 'name' => '订单满额赠礼品', 'mod_do_url' => '/McpPromo/list_order_gift', 'in_menu' => ''),
//			#array('id' => '0818', 'name' => '添加订单促销(送礼)', 'mod_do_url' => '/McpPromo/add_order_gift', 'in_menu' => '0808'),
//			#array('id' => '0819', 'name' => '编辑订单促销(送礼)', 'mod_do_url' => '/McpPromo/edit_order_gift', 'in_menu' => '0808'),
//		#array('id' => '0809', 'name' => '新人下单打折', 'mod_do_url' => '/McpPromo/set_new_user_discount', 'in_menu' => ''),
//		array('id' => '0818', 'name' => '优惠券列表', 'mod_do_url' => '/McpPromo/coupon_list', 'in_menu' => ''),//going-WSQ
//		array('id' => '0819', 'name' => '添加优惠券', 'mod_do_url' => '/McpPromo/add_coupon', 'in_menu' => '0818'),//going-WSQ
//		array('id' => '0820', 'name' => '编辑优惠券', 'mod_do_url' => '/McpPromo/edit_coupon', 'in_menu' => '0818'),//going-WSQ
//		array('id' => '0821', 'name' => '删除优惠券', 'mod_do_url' => '/McpPromo/del_coupon', 'in_menu' => '0818'),//going-WSQ
//		//array('id' => '0822', 'name' => '今日最大牌', 'mod_do_url' => '/McpPromo/major_config', 'in_menu' => ''),//going-WSQ
//	),
//	#'营销效果'	=> array(
//		#array('id' => '0810', 'name' => '营销方式效果对比', 'mod_do_url' => '/McpPromo/chart_promos_result', 'in_menu' => ''),
//	#),
//);

//$admin_menu_file[8] = array('id' => '09', 'mod_name' => 'Requirement', 'name' => '需求管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpRequireMent/get_pre_handle_requirement_list');
//$admin_menu_file[8]['menu_list'] = array(
//	'需求管理'	=> array(
//		array('id' => '0902', 'name' => '待处理需求', 'mod_do_url' => '/McpRequirement/get_pre_handle_requirement_list', 'in_menu' => ''), //going-JX
//		array('id' => '0903', 'name' => '已完成需求', 'mod_do_url' => '/McpRequirement/get_finished_requirement_list', 'in_menu' => ''),//going-JX
//		array('id' => '0904', 'name' => '需求详情', 'mod_do_url' => '/McpRequirement/requirement_detail', 'in_menu' => '0901'),//going-JX
//		array('id' => '0901', 'name' => '所有需求列表', 'mod_do_url' => '/McpRequirement/get_all_requirement_list', 'in_menu' => ''),//going-JX
//
//		//新增加一个需求时，若管理员后台开着，有语音提醒（叮咚），并提示跳转--going-JW
//	)
//);

//$admin_menu_file[9] = array('id' => '10', 'mod_name' => 'IntergalRule', 'name' => '积分规则', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpArticle/common_article/tag/integral_source');
//$admin_menu_file[9]['menu_list'] = array(
//	'积分规则'	=> array(
//		array('id' => '1009', 'name' => '积分来源', 'mod_do_url' => '/McpArticle/common_article/tag/integral_source', 'in_menu' => ''),
//		array('id' => '1010', 'name' => '积分消费', 'mod_do_url' => '/McpArticle/common_article/tag/integral_consume', 'in_menu' => ''),
//
//	)
//);
//
//$admin_menu_file[10] = array('id' => '11', 'mod_name' => 'IntergalCase', 'name' => '积分方案', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpArticle/common_article/tag/integral_rule');
//$admin_menu_file[10]['menu_list'] = array(
//	'积分方案'	=> array(
//		array('id' => '1103', 'name' => '积分方案', 'mod_do_url' => '/McpArticle/common_article/tag/integral_rule', 'in_menu' => ''),
//
//	)
//);
