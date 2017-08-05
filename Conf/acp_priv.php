<?php
/**
 * 管理员权限数组
 *
 * id 为权限唯一标识符tangren
 * name 为权限或菜单对应的名字
 * mod_do_url 为对应的网址，其中do必须以acp_开头
 * in_menu 当此为空时表示本身就是左侧菜单；不为空时，其值必须是id，此id就是当' . C('USER_NAME') . '处于此权限页面时对应左侧菜单的特殊显示的权限id
 *
 * ID规则：第一级为01至99的数字；
 *        第二级为0101至9999的数字，其中前两位为上级ID值；
 *        第三级为010101至999999的数字，其中最前面两位为顶级ID值，中间两位为上级ID值；
 *        以此类推
 */
$admin_menu_file = array();

$admin_menu_file[0] = array('id' => '01', 'mod_name' => 'System', 'name' => '系统管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpConfig/base_config');
$admin_menu_file[0]['menu_list'] = array(
	'系统设置'	=> array(
		#array('id' => '0101', 'name' => '头部菜单设置', 'mod_do_url' => '/AcpConfig/list_menu', 'in_menu' => ''),
		array('id' => '0101', 'name' => '修改密码', 'mod_do_url' => '/AcpConfig/set_password', 'in_menu' => ''),
		array('id' => '0102', 'name' => '基础设置', 'mod_do_url' => '/AcpConfig/base_config', 'in_menu' => ''),			//OK-CC
		array('id' => '0198', 'name' => '到店分销比例设置', 'mod_do_url' => '/AcpConfig/fenxiao_config', 'in_menu' => ''),			//OK-CC
		array('id' => '0299', 'name' => '外卖分销比例设置', 'mod_do_url' => '/AcpConfig/outside_fenxiao_config', 'in_menu' => ''),			//OK-CC
		array('id' => '0200', 'name' => '开店提成比例设置', 'mod_do_url' => '/AcpConfig/business_fenxiao_config', 'in_menu' => ''),			//OK-CC
		array('id' => '0104', 'name' => '搜索范围设置', 'mod_do_url' => '/AcpConfig/set_range', 'in_menu' => ''),			//OK-CC
		array('id' => '0105', 'name' => '管理员登录日志', 'mod_do_url' => '/AcpConfig/list_log', 'in_menu' => ''),			//OK-CC
		#array('id' => '0192', 'name' => '配送费设置', 'mod_do_url' => '/AcpConfig/send_setting', 'in_menu' => ''),			//OK-CC
		array('id' => '0199', 'name' => '新用户关注设置', 'mod_do_url' => '/AcpConfig/subscribe_set', 'in_menu' => ''),
		#array('id' => '0135', 'name' => '高级设置', 'mod_do_url' => '/AcpConfig/advanced_setting', 'in_menu' => ''),
		array('id' => '0103', 'name' => '短信设置', 'mod_do_url' => '/AcpConfig/sms_config', 'in_menu' => ''),
		array('id' => '0137', 'name' => '支付方式设置', 'mod_do_url' => '/AcpPayment/list_payment', 'in_menu' => ''),	//OK-DONE
		array('id' => '0130', 'name' => '支付宝接口设置', 'mod_do_url' => '/AcpPayment/set_alipay', 'in_menu' => '0137'),//OK-DONE
		#array('id' => '0131', 'name' => '网银在线接口设置', 'mod_do_url' => '/AcpPayment/set_chinabank', 'in_menu' => '0137'),//OK-DONE
		#array('id' => '0132', 'name' => '电子钱包设置', 'mod_do_url' => '/AcpPayment/set_wallet', 'in_menu' => '0137'),//OK-DONE
		array('id' => '0138', 'name' => '微信支付设置', 'mod_do_url' => '/AcpPayment/set_wxpay', 'in_menu' => '0137'),//OK-DONE
		array('id' => '0139', 'name' => '微信APP支付设置', 'mod_do_url' => '/AcpPayment/set_mobile_wxpay', 'in_menu' => '0137'),//OK-DONE
		array('id' => '0140', 'name' => '支付宝APP支付设置', 'mod_do_url' => '/AcpPayment/set_mobile_alipay', 'in_menu' => '0137'),//OK-DONE
		#array('id' => '0133', 'name' => '线下付款设置', 'mod_do_url' => '/AcpPayment/set_offline', 'in_menu' => '0137'),//OK-DONE
		// array('id' => '0134', 'name' => '关于潘朵拉', 'mod_do_url' => '/AcpArticle/edit_about', 'in_menu' => ''),
// 		array('id' => '0105', 'name' => '邮件设置', 'mod_do_url' => '/AcpConfig/email_config', 'in_menu' => ''),
 	/*	array('id' => '0186', 'name' => '运费设置', 'mod_do_url' => '/AcpConfig/shopping_fare', 'in_menu' => ''),*/
 		array('id' => '0156', 'name' => '公众号菜单设置', 'mod_do_url' => '/AcpConfig/menu_set', 'in_menu' => ''),
/* 		array('id' => '0157', 'name' => '公众号关键字回复设置', 'mod_do_url' => '/AcpConfig/auto_reply_list', 'in_menu' => ''),
 		array('id' => '0158', 'name' => '增加关键字回复', 'mod_do_url' => '/AcpConfig/add_auto_reply', 'in_menu' => '0157'),
 		array('id' => '0159', 'name' => '修改关键字回复', 'mod_do_url' => '/AcpConfig/edit_auto_reply', 'in_menu' => '0157'),
 		array('id' => '0160', 'name' => '公众号消息群发设置', 'mod_do_url' => '/AcpConfig/set_mass_msg', 'in_menu' => ''),*/
 		
	),
	/*'APP端通知管理'	=> array(
		array('id' => '0161', 'name' => '通知列表', 'mod_do_url' => '/AcpAppPush/push_list', 'in_menu' => ''),
	 	array('id' => '0162', 'name' => '发送通知', 'mod_do_url' => '/AcpAppPush/app_push', 'in_menu' => ''),
	 ),*/
	/* '配送设置'	=> array(
	 	array('id' => '0116', 'name' => '配送方式列表', 'mod_do_url' => '/AcpShipping/list_company', 'in_menu' => '',),
	 	array('id' => '0117', 'name' => '添加配送方式', 'mod_do_url' => '/AcpShipping/add_company', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0118', 'name' => '修改配送方式', 'mod_do_url' => '/AcpShipping/edit_company', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0119', 'name' => '添加配送区域', 'mod_do_url' => '/AcpShipping/add_region', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0120', 'name' => '修改配送区域', 'mod_do_url' => '/AcpShipping/edit_region', 'in_menu' => '0116', 'in_top' => '0'),
	 	array('id' => '0121', 'name' => '快递单模板', 'mod_do_url' => '/AcpShipping/list_express_template', 'in_menu' => '', 'in_top' => '0'),
	 	array('id' => '0122', 'name' => '修改快递单打印模板', 'mod_do_url' => '/AcpShipping/edit_express_template', 'in_menu' => '0121', 'in_top' => '0')
	 ),*/
	 #'大区管理'	=> array(
	 #	array('id' => '0167', 'name' => '大区列表', 'mod_do_url' => '/AcpBigArea/list_area', 'in_menu' => '',),
	 #	array('id' => '0168', 'name' => '添加大区', 'mod_do_url' => '/AcpBigArea/add_area', 'in_menu' => '',),
	 #	array('id' => '0169', 'name' => '修改大区', 'mod_do_url' => '/AcpBigArea/edit_area', 'in_menu' => '0167',),
	 #),
	'管理员与权限'	=> array(																						//OK-DONE
		array('id' => '0106', 'name' => '管理员列表', 'mod_do_url' => '/AcpRole/list_admin', 'in_menu' => ''),
		array('id' => '0107', 'name' => '添加管理员', 'mod_do_url' => '/AcpRole/add_admin', 'in_menu' => '0106'),
		array('id' => '0108', 'name' => '修改管理员', 'mod_do_url' => '/AcpRole/edit_admin', 'in_menu' => '0106'),
		array('id' => '0109', 'name' => '删除管理员', 'mod_do_url' => '/AcpRole/del_admin', 'in_menu' => '0106'),
		array('id' => '0110', 'name' => '激活/禁用管理员', 'mod_do_url' => '/AcpRole/set_admin', 'in_menu' => '0106'),
		array('id' => '0111', 'name' => '恢复已删除管理员', 'mod_do_url' => '/AcpRole/hf_admin', 'in_menu' => '0106'),
		array('id' => '0112', 'name' => '角色列表', 'mod_do_url' => '/AcpRole/list_role', 'in_menu' => ''),
		array('id' => '0113', 'name' => '添加角色', 'mod_do_url' => '/AcpRole/add_role', 'in_menu' => '0112'),
		array('id' => '0114', 'name' => '修改角色', 'mod_do_url' => '/AcpRole/edit_role', 'in_menu' => '0112'),
		array('id' => '0115', 'name' => '删除角色', 'mod_do_url' => '/AcpRole/del_role', 'in_menu' => '0112'),
		array('id' => '0116', 'name' => '激活/禁用角色', 'mod_do_url' => '/AcpRole/set_admin_group', 'in_menu' => '0112'),
		array('id' => '0117', 'name' => '恢复已删除角色', 'mod_do_url' => '/AcpRole/hf_admin_group', 'in_menu' => '0112'),
	),
	#'在线客服'	=> array(
	#	array('id' => '0122', 'name' => '上架的客服账号', 'mod_do_url' => '/AcpCustomerServiceOnline/get_onsale_customer_service_online_list', 'in_menu' => ''),
	#	array('id' => '0123', 'name' => '下架的客服账号', 'mod_do_url' => '/AcpCustomerServiceOnline/get_store_customer_service_online_list', 'in_menu' => ''),
	#	array('id' => '0124', 'name' => '添加客服', 'mod_do_url' => '/AcpCustomerServiceOnline/add_customer_service_online', 'in_menu' => ''),
	#	array('id' => '0121', 'name' => '修改客服', 'mod_do_url' => '/AcpCustomerServiceOnline/edit_customer_service_online', 'in_menu' => '0122'),
	#),
	'轮播图'	=> array(
        array('id' => '0144', 'name' => '轮播图片列表', 'mod_do_url' => '/AcpCustFlash/get_cust_flash_list', 'in_menu' => ''),//OK-DONE
        array('id' => '0145', 'name' => '添加轮播图片', 'mod_do_url' => '/AcpCustFlash/add_cust_flash', 'in_menu' => ''),//OK-DONE
        array('id' => '0146', 'name' => '修改轮播图片', 'mod_do_url' => '/AcpCustFlash/edit_cust_flash', 'in_menu' => '0144'),//OK-DONE
        array('id' => '0125', 'name' => '删除轮播图片', 'mod_do_url' => '/AcpCustFlash/del_cust_flash', 'in_menu' => '0144'),//OK-DONE
    ),
    '热门搜索'	=> array(
        array('id' => '0154', 'name' => '热门搜索列表', 'mod_do_url' => '/AcpHotGoods/get_hot_search_list', 'in_menu' => ''),//OK-DONE
        array('id' => '0155', 'name' => '添加热门搜索', 'mod_do_url' => '/AcpHotGoods/add_hot_search', 'in_menu' => ''),//OK-DONE
        array('id' => '0156', 'name' => '修改热门搜索', 'mod_do_url' => '/AcpHotGoods/edit_hot_search', 'in_menu' => '0154'),//OK-DONE
        array('id' => '0157', 'name' => '删除热门搜索', 'mod_do_url' => '/AcpHotGoods/del_hot_search', 'in_menu' => '0154'),//OK-DONE
    ),
    '关于'=> array(
            array('id' => '0149', 'name' => '关于我们', 'mod_do_url' => '/AcpProcess/edit_about_explain', 'in_menu' => ''),//OK-DONE
            //array('id' => '0147', 'name' => '注册说明编辑', 'mod_do_url' => '/AcpProcess/edit_reg_explain', 'in_menu' => ''),//OK-DONE
            //array('id' => '0148', 'name' => '商家入驻协议编辑', 'mod_do_url' => '/AcpProcess/edit_bussiness_explain', 'in_menu' => ''),//OK-DONE
           // array('id' => '0149', 'name' => '其他', 'mod_do_url' => '/AcpProcess/edit_explain', 'in_menu' => ''),//OK-DONE
            array('id' => '0152', 'name' => '修改街道', 'mod_do_url' => '/AcpStreet/edit_street', 'in_menu' => '0147'),//OK-DONE
            array('id' => '0151', 'name' => '删除街道', 'mod_do_url' => '/AcpStreet/del_street', 'in_menu' => '0147'),//OK-DONE
    ),
	/*'首页广告图片'	=> array(
		array('id' => '0152', 'name' => '首页广告图片列表', 'mod_do_url' => '/AcpIndexAds/get_index_ads_list', 'in_menu' => ''),//OK-DONE
		array('id' => '0153', 'name' => '添加首页广告图片', 'mod_do_url' => '/AcpIndexAds/add_index_ads', 'in_menu' => ''),//OK-DONE
		array('id' => '0154', 'name' => '修改首页广告图片', 'mod_do_url' => '/AcpIndexAds/edit_index_ads', 'in_menu' => '0152'),//OK-DONE
		array('id' => '0155', 'name' => '删除首页广告图片', 'mod_do_url' => '/AcpIndexAds/del_index_ads', 'in_menu' => '0152'),//OK-DONE
	),
    '街道管理'	=> array(
		array('id' => '0147', 'name' => '街道列表', 'mod_do_url' => '/AcpStreet/get_street_list', 'in_menu' => ''),//OK-DONE
		array('id' => '0148', 'name' => '添加街道', 'mod_do_url' => '/AcpStreet/add_street', 'in_menu' => ''),//OK-DONE
		array('id' => '0149', 'name' => '修改街道', 'mod_do_url' => '/AcpStreet/edit_street', 'in_menu' => '0147'),//OK-DONE
		array('id' => '0151', 'name' => '删除街道', 'mod_do_url' => '/AcpStreet/del_street', 'in_menu' => '0147'),//OK-DONE
	),*/
	#'顶部广告位'	=> array(
	#	array('id' => '0164', 'name' => '广告图片列表', 'mod_do_url' => '/AcpCustFlash/top_adv_list', 'in_menu' => ''),//OK-CC
	#	array('id' => '0165', 'name' => '添加广告图片', 'mod_do_url' => '/AcpCustFlash/add_adv', 'in_menu' => ''),//OK-CC
	#	array('id' => '0166', 'name' => '修改广告图片', 'mod_do_url' => '/AcpCustFlash/edit_adv', 'in_menu' => '0164'),//OK-CC
	#	array('id' => '0125', 'name' => '删除轮播图片', 'mod_do_url' => '/AcpCustFlash/del_adv', 'in_menu' => '0144'),//OK-CC
	#),
    /*
	'系统版本管理'	=> array(
		array('id' => '0118', 'name' => '安卓版APP设置', 'mod_do_url' => '/AcpVersion/android_version_setting', 'in_menu' => ''),//going-JW
		array('id' => '0119', 'name' => 'IOS版APP设置', 'mod_do_url' => '/AcpVersion/ios_version_setting', 'in_menu' => ''),//going-JW
	),
     */
//	'意见反馈管理'	=> array(
//		array('id' => '0150', 'name' => '意见反馈列表', 'mod_do_url' => '/AcpUser/get_user_suggest_list', 'in_menu' => ''),//OK-CC
//	),

	// '友情链接'	=> array(
	// 	array('id' => '0118', 'name' => '友情链接列表', 'mod_do_url' => '/AcpConfig/list_link', 'in_menu' => ''),
	// 	array('id' => '0119', 'name' => '添加友情链接', 'mod_do_url' => '/AcpConfig/add_link', 'in_menu' => '0125', 'in_top' => '0'),
	// 	array('id' => '0120', 'name' => '修改友情链接', 'mod_do_url' => '/AcpConfig/edit_link', 'in_menu' => '0125', 'in_top' => '0'),
	// ),
	/* '门店管理'	=> array(
	 	array('id' => '0188', 'name' => '门店列表', 'mod_do_url' => '/AcpDept/dept_list', 'in_menu' => ''),
	 	array('id' => '0189', 'name' => '添加门店', 'mod_do_url' => '/AcpDept/add_dept', 'in_menu' => '0188'),
	 	array('id' => '0187', 'name' => '门店启用', 'mod_do_url' => '/AcpDept/set_enable', 'in_menu' => '0188'),
	 	array('id' => '0187', 'name' => '门店启用', 'mod_do_url' => '/AcpDept/sync_data', 'in_menu' => '0188'),
	 	#array('id' => '0180', 'name' => '修改友情链接', 'mod_do_url' => '/AcpConfig/edit_link', 'in_menu' => '0125', 'in_top' => '0'),
	 ),*/
);

$admin_menu_file[6] = array('id' => '07', 'mod_name' => 'page_model', 'name' => '分类管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpTempletPackage/get_templet_package_list');
$admin_menu_file[6]['menu_list'] = array(
    '店铺分类管理'	=> array(
        array('id' => '0751', 'name' => '店铺类型列表', 'mod_do_url' => '/AcpStoreType/get_store_type_list', 'in_menu' => ''),//OK-DONE
        array('id' => '0752', 'name' => '添加店铺类型', 'mod_do_url' => '/AcpStoreType/add_store_type', 'in_menu' => ''),//OK-DONE
        array('id' => '0753', 'name' => '修改店铺类型', 'mod_do_url' => '/AcpStoreType/edit_store_type', 'in_menu' => '0751'),//OK-DONE
        array('id' => '0754', 'name' => '删除店铺类型', 'mod_do_url' => '/AcpStoreType/del_store_type', 'in_menu' => '0751'),//OK-DONE
		array('id' => '0755', 'name' => '查看模板商品', 'mod_do_url' => '/AcpStoreType/get_model_item', 'in_menu' => '0751'),//OK-DONE
		array('id' => '0756', 'name' => '商品详情', 'mod_do_url' => '/AcpStoreType/item_detail', 'in_menu' => '0751'),//OK-DONE
    ),
    '行业分类管理'	=> array(
        array('id' => '0761', 'name' => '行业类型列表', 'mod_do_url' => '/AcpIndustry/get_industry_list', 'in_menu' => ''),//OK-DONE
        array('id' => '0762', 'name' => '添加行业类型', 'mod_do_url' => '/AcpIndustry/add_industry', 'in_menu' => ''),//OK-DONE
        array('id' => '0763', 'name' => '修改行业类型', 'mod_do_url' => '/AcpIndustry/edit_industry', 'in_menu' => '0761'),//OK-DONE
        array('id' => '0764', 'name' => '删除行业类型', 'mod_do_url' => '/AcpIndustry/del_industry', 'in_menu' => '0761'),//OK-DONE
    ),
);

$admin_menu_file[1] = array('id' => '02', 'mod_name' => 'User', 'name' => C('USER_NAME') . '管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpUser/get_all_user_list');
$admin_menu_file[1]['menu_list'] = array(
	C('USER_NAME') . '管理'	=> array(
		array('id' => '0201', 'name' => C('USER_NAME') . '列表', 'mod_do_url' => '/AcpUser/get_all_user_list', 'in_menu' => ''),//OK-CC
        array('id' => '0202', 'name' => C('USER_NAME') . '统计', 'mod_do_url' => '/AcpUser/get_all_user', 'in_menu' => ''),//OK-CC
        array('id' => '0205', 'name' =>'查看ta推荐的人', 'mod_do_url' => '/AcpUser/get_my_recommenders', 'in_menu' => '0201'),//OK-CC
		array('id' => '0202', 'name' => '查看' . C('USER_NAME') . '详情', 'mod_do_url' => '/AcpUser/user_detail', 'in_menu' => '0201'),//OK-CC
		array('id' => '0203', 'name' => '设置代理', 'mod_do_url' => '/AcpUser/set_agent', 'in_menu' => '0201'),//OK-CC
		array('id' => '0204', 'name' => '修改推荐人', 'mod_do_url' => '/AcpUser/edit_agent', 'in_menu' => '0201'),//OK-CC
/*		array('id' => '0203', 'name' => '推广员列表', 'mod_do_url' => '/AcpUser/get_extend_user_list', 'in_menu' => ''),//OK-CC

		array('id' => '0211', 'name' => '添加推广员', 'mod_do_url' => '/AcpUser/add_user', 'in_menu' => ''),//OK-CC
		array('id' => '0212', 'name' => '修改' . C('USER_NAME'), 'mod_do_url' => '/AcpUser/edit_user', 'in_menu' => '0201'),//OK-CC*/
		//array('id' => '0213', 'name' => '查看推广列表', 'mod_do_url' => '/AcpUser/extend_user', 'in_menu' => '0203'),//OK-CC
		/*array('id' => '0243', 'name' => '积分明细', 'mod_do_url' => '/AcpUser/integral_detail', 'in_menu' => ''),*/
	),
		'商家管理'	=> array(
		array('id' => '0206', 'name' => '商家列表', 'mod_do_url' => '/AcpBusiness/get_business_list', 'in_menu' => ''),//OK-CC
		array('id' => '0207', 'name' => '编辑商家', 'mod_do_url' => '/AcpBusiness/edit_business', 'in_menu' => '0206'),//
		array('id' => '0215', 'name' => '添加商家', 'mod_do_url' => '/AcpBusiness/add_business', 'in_menu' => ''),//
		array('id' => '0214', 'name' => '推荐的人', 'mod_do_url' => '/AcpBusiness/get_business_recommend', 'in_menu' => '0206'),//
		array('id' => '0208', 'name' => '待审核的商家列表', 'mod_do_url' => '/AcpBusiness/get_examine_business_list', 'in_menu' => ''),//OK-CC
		array('id' => '0209', 'name' => '待审核的商家详情', 'mod_do_url' => '/AcpBusiness/examine_business_detail', 'in_menu' => '0208'),//OK-CC
        array('id' => '0210', 'name' => '审核未通过的商家列表', 'mod_do_url' => '/AcpBusiness/no_pass_business_list', 'in_menu' => ''),//OK-CC
        array('id' => '0211', 'name' => '审核未通过的商家详情', 'mod_do_url' => '/AcpBusiness/no_pass_business_detail', 'in_menu' => '0210'),//OK-CC
        array('id' => '0212', 'name' => '冻结的商家列表', 'mod_do_url' => '/AcpBusiness/freeze_business_list', 'in_menu' => ''),//OK-CC
        array('id' => '0213', 'name' => '冻结的商家详情', 'mod_do_url' => '/AcpBusiness/freeze_business_detail', 'in_menu' => '0212'),//OK-CC
		),
		'外卖商家管理'	=> array(
		array('id' => '0216', 'name' => '外卖商家列表', 'mod_do_url' => '/AcpBusiness/take_out_business_list', 'in_menu' => ''),//OK-CC
		array('id' => '0217', 'name' => '外卖待审核的商家列表', 'mod_do_url' => '/AcpBusiness/examine_take_out_business_list', 'in_menu' => ''),//OK-CC
		array('id' => '0218', 'name' => '外卖审核未通过的商家详情', 'mod_do_url' => '/AcpBusiness/no_pass_take_out_business_list', 'in_menu' => ''),//OK-CC
		),
		/*'商家分类'	=> array(
		array('id' => '0231', 'name' => '商家分类列表', 'mod_do_url' => '/AcpBusiness/business_sort_list', 'in_menu' => ''),//OK-CC
		array('id' => '0232', 'name' => '添加分类', 'mod_do_url' => '/AcpBusiness/add_business_sort', 'in_menu' => ''),//OK-CC
		array('id' => '0233', 'name' => '修改分类', 'mod_do_url' => '/AcpBusiness/edit_business_sort', 'in_menu' => '0231'),//OK-CC
		),*/

//		'商家分类'	=> array(
//		array('id' => '0231', 'name' => '商家分类列表', 'mod_do_url' => '/AcpUser/get_dept_user_list', 'in_menu' => ''),//OK-CC
//		array('id' => '0232', 'name' => '添加分类', 'mod_do_url' => '/AcpUser/add_dept_user', 'in_menu' => ''),//OK-CC
//		array('id' => '0233', 'name' => '修改分类', 'mod_do_url' => '/AcpUser/edit_dept_user', 'in_menu' => '0231'),//OK-CC
//		),
   /* '分销管理'	=> array(
		array('id' => '0234', 'name' => '用户列表', 'mod_do_url' => '/AcpAgent/get_agent_list', 'in_menu' => ''),//JW
	),
    '门店管理员'	=> array(
		array('id' => '0231', 'name' => '门店管理员列表', 'mod_do_url' => '/AcpUser/get_dept_user_list', 'in_menu' => ''),//OK-CC
		array('id' => '0232', 'name' => '添加门店管理员', 'mod_do_url' => '/AcpUser/add_dept_user', 'in_menu' => ''),//OK-CC
		array('id' => '0233', 'name' => '修改门店管理员', 'mod_do_url' => '/AcpUser/edit_dept_user', 'in_menu' => '0231'),//OK-CC
	),*/
	// C('USER_NAME') . '统计'	=> array(
	// 	array('id' => '0203', 'name' => C('USER_NAME') . '注册日统计', 'mod_do_url' => '/AcpUser/user_reg_stat_by_day', 'in_menu' => ''),
	// 	array('id' => '0207', 'name' => C('USER_NAME') . '注册月统计', 'mod_do_url' => '/AcpUser/user_reg_stat_by_month', 'in_menu' => ''),
	// 	array('id' => '0208', 'name' => C('USER_NAME') . '注册年统计', 'mod_do_url' => '/AcpUser/user_reg_stat_by_year', 'in_menu' => ''),
	// 	array('id' => '0210', 'name' => C('USER_NAME') . '消费统计', 'mod_do_url' => '/AcpUser/user_consume_stat', 'in_menu' => ''),
	// ),
	/*C('USER_NAME') . '等级'	=> array(
		array('id' => '0204', 'name' => C('USER_NAME') . '等级列表', 'mod_do_url' => '/AcpUser/get_user_rank_list', 'in_menu' => ''),//OK-DONE
		array('id' => '0205', 'name' => '添加' . C('USER_NAME') . '等级', 'mod_do_url' => '/AcpUser/add_user_rank', 'in_menu' => ''),//OK-DONE
		array('id' => '0206', 'name' => '修改' . C('USER_NAME') . '等级', 'mod_do_url' => '/AcpUser/edit_user_rank', 'in_menu' => '0204'),//OK-DONE
		// array('id' => '0209', 'name' => C('USER_NAME') . '等级统计', 'mod_do_url' => '/AcpUser/user_rank_stat', 'in_menu' => ''),
	),*/
	'代理管理'	=> array(
		array('id' => '0225', 'name' => '所有省份', 'mod_do_url' => '/AcpAgent/all_province', 'in_menu' => ''),
		array('id' => '0226', 'name' => '已开通省份', 'mod_do_url' => '/AcpAgent/opened_province', 'in_menu' => ''),
		array('id' => '0228', 'name' => '修改合伙人信息', 'mod_do_url' => '/AcpAgent/edit_agent', 'in_menu' => '0225'),
		array('id' => '0229', 'name' => '已开通城市', 'mod_do_url' => '/AcpAgent/opened_city', 'in_menu' => ''),
		array('id' => '0230', 'name' => '关闭省市县', 'mod_do_url' => '/AcpAgent/close', 'in_menu' => '0225'),
		array('id' => '0231', 'name' => '已开通区县', 'mod_do_url' => '/AcpAgent/opened_area', 'in_menu' => ''),
		array('id' => '0227', 'name' => '开通省市县', 'mod_do_url' => '/AcpAgent/add_agent', 'in_menu' => ''),
	),
);

/*$admin_menu_file[2] = array('id' => '03', 'mod_name' => 'Item', 'name' => C('ITEM_NAME') . '管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpItem/get_onsale_item_list');
$admin_menu_file[2]['menu_list'] = array(
	C('ITEM_NAME') . '管理'	=> array(
		array('id' => '0301', 'name' => '出售中的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_onsale_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0302', 'name' => '仓库中的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_store_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0316', 'name' => '库存报警的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_alarm_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0317', 'name' => '售罄的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_sold_out_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0318', 'name' => '积分' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_integral_item_list', 'in_menu' => ''),//OK-CC
		array('id' => '0303', 'name' => '添加' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/add_item', 'in_menu' => ''),//OK-CC
		array('id' => '0304', 'name' => '修改' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/edit_item', 'in_menu' => '0301'),//OK-CC
		array('id' => '0378', 'name' => '设置批发价' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/set_wholesale_price', 'in_menu' => '0301'),//OK-CC
	),//OK-CC
	//C('ITEM_NAME') . '统计'	=> array(			//going-WSQ
	//	array('id' => '0305', 'name' => '单品销量统计', 'mod_do_url' => '/AcpItem/item_sales_num_stat', 'in_menu' => ''),//单个商品的销量和销售量统计，并增加柱状图比较该商品本月和上月的销售额，可导出excel
	//	array('id' => '0315', 'name' => '导出单品销售报表', 'mod_do_url' => '/AcpItem/item_export', 'in_menu' => ''),//可以根据区域、省市县、时间、门店编码、商品ID等筛选导出
	//),
	C('ITEM_NAME') . '分类'	=> array(			//OK-DONE
		array('id' => '0307', 'name' => '一级分类列表', 'mod_do_url' => '/AcpClass/get_level_one', 'in_menu' => ''),
		array('id' => '0308', 'name' => '添加一级分类', 'mod_do_url' => '/AcpClass/add_level_one', 'in_menu' => ''),
		array('id' => '0309', 'name' => '修改一级分类', 'mod_do_url' => '/AcpClass/edit_level_one', 'in_menu' => '0307'),
		array('id' => '0310', 'name' => '二级分类列表', 'mod_do_url' => '/AcpClass/get_level_two', 'in_menu' => ''),
		array('id' => '0311', 'name' => '添加二级分类', 'mod_do_url' => '/AcpClass/add_level_two', 'in_menu' => ''),
		array('id' => '0312', 'name' => '修改二级分类', 'mod_do_url' => '/AcpClass/edit_level_two', 'in_menu' => '0310'),
	),
	C('ITEM_NAME') . '规格属性'	=> array(		//OK-DONE
		array('id' => '0351', 'name' => C('ITEM_NAME') . '类型列表', 'mod_do_url' => '/AcpItemType/list_type', 'in_menu' => ''),
        array('id' => '0352', 'name' => '添加' . C('ITEM_NAME') . '类型', 'mod_do_url' => '/AcpItemType/add_type', 'in_menu' => '0351'),
        array('id' => '0353', 'name' => '编辑' . C('ITEM_NAME') . '类型', 'mod_do_url' => '/AcpItemType/edit_type', 'in_menu' => '0351'),
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
);*/

$admin_menu_file[2] = array('id' => '03', 'mod_name' => 'Order', 'name' => '订单管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpOrder/get_pre_pay_order_list');
$admin_menu_file[2]['menu_list'] = array(

	'历史订单'	=> array(
		array('id' => '0309', 'name' => '所有订单', 'mod_do_url' => '/AcpOrder/get_all_order_list', 'in_menu' => ''),//going-WSQ
        array('id' => '0310', 'name' => '订单详情', 'mod_do_url' => '/AcpOrder/order_detail', 'in_menu' => '0309'),//going-WSQ
        array('id' => '0311', 'name' => '用户详情', 'mod_do_url' => '/AcpOrder/user_detail', 'in_menu' => '0309'),//going-WSQ
        array('id' => '0312', 'name' => '商家详情', 'mod_do_url' => '/AcpOrder/business_detail', 'in_menu' => '0309'),//going-WSQ
        array('id' => '0313', 'name' => '商家详情', 'mod_do_url' => '/AcpOrder/edit_order', 'in_menu' => '0309'),//going-WSQ
		array('id' => '0319', 'name' => '已发货的订单', 'mod_do_url' => '/AcpOrder/get_delivered_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => '0325', 'name' => '确认收货的订单', 'mod_do_url' => '/AcpOrder/get_confirmed_order_list', 'in_menu' => ''),//going-WS
		array('id' => '0320', 'name' => '等待发货的订单', 'mod_do_url' => '/AcpOrder/get_pre_deliver_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => '0321', 'name' => '退款受理中的订单', 'mod_do_url' => '/AcpOrder/get_refunding_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => '0322', 'name' => '退款的订单', 'mod_do_url' => '/AcpOrder/get_refunded_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => '0323', 'name' => '订单详情', 'mod_do_url' => '/AcpOrder/order_detail', 'in_menu' => '0309'),//going-WSQ
		array('id' => '0324', 'name' => '取消的订单', 'mod_do_url' => '/AcpOrder/get_canceled_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => '0318', 'name' => '总后台介入的退款订单', 'mod_do_url' => '/AcpOrder/refund_order', 'in_menu' => ''),//going-WSQ
        /*		array('id' => '0310', 'name' => '所有退货订单', 'mod_do_url' => '/AcpOrder/get_refunded_order_list', 'in_menu' => ''),//going-WSQ
		#array('id' => '0411', 'name' => '所有换货订单', 'mod_do_url' => '/AcpOrder/get_changed_order_list', 'in_menu' => ''),
		array('id' => '0312', 'name' => '所有确认订单', 'mod_do_url' => '/AcpOrder/get_confirmed_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => '0316', 'name' => '所有取消订单', 'mod_do_url' => '/AcpOrder/get_canceled_order_list', 'in_menu' => ''),*/
	),//going-WSQ
	'订单统计'	=> array(
		array('id' => '0314', 'name' => '订单日统计', 'mod_do_url' => '/AcpOrder/order_stat_by_day', 'in_menu' => ''),//going-WSQ
		array('id' => '0315', 'name' => '订单月统计', 'mod_do_url' => '/AcpOrder/order_stat_by_month', 'in_menu' => ''),//going-WSQ
		array('id' => '0317', 'name' => '订单年统计', 'mod_do_url' => '/AcpOrder/order_stat_by_year', 'in_menu' => ''),//going-WSQ
		//array('id' => '0421', 'name' => '订单区域统计', 'mod_do_url' => '/AcpOrder/order_stat_by_area', 'in_menu' => ''),//going-WSQ
		array('id' => '0316', 'name' => '导出订单', 'mod_do_url' => '/AcpOrder/order_export', 'in_menu' => ''),//可以根据区域、省市县、时间、门店编码等筛选导出			//going-WSQ
	),
);

$admin_menu_file[3] = array('id' => '04', 'mod_name' => 'Account', 'name' => '财务管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpFinance/get_account_apply_list');
$admin_menu_file[3]['menu_list'] = array(
	'日常处理'	=> array(
		#array('id' => '0501', 'name' => '入账申请列表', 'mod_do_url' => '/AcpFinance/get_account_apply_list', 'in_menu' => ''),
		array('id' => '0436', 'name' => '总后台提现', 'mod_do_url' => '/AcpFinance/platform_withdraw', 'in_menu' => ''),
		array('id' => '0402', 'name' => '调整余额', 'mod_do_url' => '/AcpFinance/edit_account', 'in_menu' => ''),//增加手机号、QQ号，修改字段名称展示之，加导出按钮，跳到财务导出页导出Excel	//going-WSQ
		array('id' => '0403', 'name' => '财务变动明细', 'mod_do_url' => '/AcpFinance/get_account_log', 'in_menu' => ''),//修改字段名称展示之	//going-WSQ
	),
	'商家提现(到店/扫码)'	=> array(
				array('id' => '0416', 'name' => '提现记录', 'mod_do_url' => '/AcpDeposit/get_deposit_list', 'in_menu' => ''),
				array('id' => '0417', 'name' => '提现失败列表', 'mod_do_url' => '/AcpDeposit/get_deposit_apply_list', 'in_menu' => ''),
				array('id' => '0419', 'name' => '通过提现申请', 'mod_do_url' => '/AcpDeposit/set_state', 'in_menu' => '0417'),
				array('id' => '0420', 'name' => '拒绝提现申请', 'mod_do_url' => '/AcpDeposit/refuse', 'in_menu' => '0417'),
				array('id' => '0425', 'name' => '提现统计', 'mod_do_url' => '/AcpDeposit/deposit_stat', 'in_menu' => ''),
			/*array('id' => '0524', 'name' => '导出提现申请', 'mod_do_url' => '/AcpDeposit/export_deposit_apply', 'in_menu' => ''),*/
		),
	'商家打款(外卖)'	=> array(
				array('id' => '0431', 'name' => '打款失败列表', 'mod_do_url' => '/AcpFinance/remittance_fail', 'in_menu' => ''),
				array('id' => '0432', 'name' => '全部打款列表', 'mod_do_url' => '/AcpFinance/all_remittance', 'in_menu' => ''),
		),
	'用户/代理提现管理'	=> array(
				array('id' => '0430', 'name' => '提现记录', 'mod_do_url' => '/AcpDeposit/get_user_deposit_list', 'in_menu' => ''),
				array('id' => '0435', 'name' => '提现列表', 'mod_do_url' => '/AcpDeposit/get_user_deposit_apply_list', 'in_menu' => ''),
				array('id' => '0432', 'name' => '通过提现申请', 'mod_do_url' => '/AcpDeposit/set_state', 'in_menu' => '0417'),
				array('id' => '0433', 'name' => '拒绝提现申请', 'mod_do_url' => '/AcpDeposit/refuse', 'in_menu' => '0417'),
				array('id' => '0434', 'name' => '提现统计', 'mod_do_url' => '/AcpDeposit/user_deposit_stat', 'in_menu' => ''),
			/*array('id' => '0524', 'name' => '导出提现申请', 'mod_do_url' => '/AcpDeposit/export_deposit_apply', 'in_menu' => ''),*/
	),
	'银行卡管理'	=> array(
		array('id' => '0426', 'name' => '银行卡类型', 'mod_do_url' => '/AcpBank/get_bank_list', 'in_menu' => ''),
		array('id' => '0427', 'name' => '添加银行卡类型', 'mod_do_url' => '/AcpBank/add_bank', 'in_menu' => '0426'),
		array('id' => '0428', 'name' => '编辑银行卡类型', 'mod_do_url' => '/AcpBank/edit_bank', 'in_menu' => '0426'),
		array('id' => '0429', 'name' => '用户银行卡列表', 'mod_do_url' => '/AcpFinance/bank_card_list', 'in_menu' => ''),//增加手机号、QQ号，修改字段名称展示之，加导出按钮，跳到财务导出页导出Excel	//going-WSQ
		/*array('id' => '0427', 'name' => '财务变动明细', 'mod_do_url' => '/AcpFinance/get_account_log', 'in_menu' => ''),//修改字段名称展示之	//going-WSQ*/
	),
	'财务统计'	=> array(
        array('id' => '0404', 'name' => '营业额统计', 'mod_do_url' => '/AcpFinance/all_order', 'in_menu' => ''),
        array('id' => '0406', 'name' => '充值日统计', 'mod_do_url' => '/AcpFinance/recharge_stat_by_day', 'in_menu' => ''),
		array('id' => '0407', 'name' => '充值月统计', 'mod_do_url' => '/AcpFinance/recharge_stat_by_month', 'in_menu' => ''),
		array('id' => '0408', 'name' => '充值年统计', 'mod_do_url' => '/AcpFinance/recharge_stat_by_year', 'in_menu' => ''),
		array('id' => '0405', 'name' => '导出财务数据', 'mod_do_url' => '/AcpFinance/export_account', 'in_menu' => ''),//增加筛选项，可根据手机号、门店编号导出	//going-WSQ
	),
);

$admin_menu_file[7] = array('id' => '09', 'mod_name' => 'FreightActivity', 'name' => '营销活动管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/McpDiscountMinus/get_discount_minus_list');
$admin_menu_file[7]['menu_list'] = array(
    '满减活动管理'	=> array(# NEW-done-WSQ
        array('id' => '0903', 'name' => '添加满减活动', 'mod_do_url' => '/AcpDiscountMinus/add_discount_minus', 'in_menu' => ''),
        array('id' => '0905', 'name' => '修改满减活动', 'mod_do_url' => '/AcpDiscountMinus/edit_discount_minus', 'in_menu' => '0901'),
        array('id' => '0901', 'name' => '满减活动列表', 'mod_do_url' => '/AcpDiscountMinus/get_discount_minus_list', 'in_menu' => ''),
        array('id' => '0902', 'name' => '满减活动明细', 'mod_do_url' => '/AcpDiscountMinus/get_discount_minus_detail', 'in_menu' => ''),
        // array('id' => '0703', 'name' => '满减活动统计', 'mod_do_url' => '/McpDiscountMinus/discount_minus_stat', 'in_menu' => ''),
    ),
    '分享优惠券管理'	=> array(# NEW-done-WSQ
        array('id' => '0906', 'name' => '用户分享管理', 'mod_do_url' => '/AcpDiscountMinus/manage_share', 'in_menu' => ''),
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
//    '优惠券管理' => array(# NEW-done-WSQ
//        array('id' => '0714', 'name' => '添加优惠券', 'mod_do_url' => '/McpVouchers/add_vouchers', 'in_menu' => ''),
//        array('id' => '0715', 'name' => '修改优惠券', 'mod_do_url' => '/McpVouchers/edit_vouchers', 'in_menu' => '0718'),
//        // array('id' => '0716', 'name' => '系统优惠券列表', 'mod_do_url' => '/McpVouchers/get_system_vouchers_list', 'in_menu' => ''),
//        // array('id' => '0717', 'name' => '仓储优惠券列表', 'mod_do_url' => '/McpVouchers/get_merchant_vouchers_list', 'in_menu' => ''),
//        array('id' => '0718', 'name' => '所有优惠券列表', 'mod_do_url' => '/McpVouchers/get_all_vouchers_list', 'in_menu' => ''),
//        array('id' => '0719', 'name' => '优惠券明细', 'mod_do_url' => '/McpVouchers/get_vouchers_detail', 'in_menu' => ''),
//        // array('id' => '0720', 'name' => '优惠券统计', 'mod_do_url' => '/McpVouchers/vouchers_stat', 'in_menu' => ''),
//        array('id' => '0735', 'name' => '删除优惠券', 'mod_do_url' => '/McpVouchers/delete_vouchers', 'in_menu' => '0714'),
//        array('id' => '0736', 'name' => '批量删除优惠券', 'mod_do_url' => '/McpVouchers/batch_delete_vouchers', 'in_menu' => '0714'),
//        array('id' => '0737', 'name' => '优惠券上下架', 'mod_do_url' => '/McpVouchers/set_enable', 'in_menu' => '0714'),
//        array('id' => '0738', 'name' => '优惠券批量上下架', 'mod_do_url' => '/McpVouchers/batch_set_enable', 'in_menu' => '0714'),
//    ),
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

$admin_menu_file[4] = array('id' => '05', 'mod_name' => 'page_model', 'name' => '商家反馈管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpTempletPackage/get_templet_package_list');
$admin_menu_file[4]['menu_list'] = array(
    '意见反馈管理'	=> array(
        array('id' => '0501', 'name' => '意见反馈列表', 'mod_do_url' => '/AcpUser/get_user_suggest_list', 'in_menu' => ''),//OK-CC
    ),
//	'页面模板设置'	=> array(
//		array('id' => '0509', 'name' => '页面模版列表', 'mod_do_url' => '/AcpPage/get_selected_page_list', 'in_menu' => ''),
//		array('id' => '0510', 'name' => '修改页面模板', 'mod_do_url' => '/AcpPage/edit_page', 'in_menu' => ''),
    /*array('id' => '0611', 'name' => '换模板套装', 'mod_do_url' => '/AcpPage/edit_package', 'in_menu' => ''),*/
    #array('id' => '0605', 'name' => '页面模板列表', 'mod_do_url' => '/AcpPage/get_page_list', 'in_menu' => ''),
    #array('id' => '0606', 'name' => '添加页面模板', 'mod_do_url' => '/AcpPage/add_page', 'in_menu' => ''),
    #array('id' => '0607', 'name' => '删除页面模板', 'mod_do_url' => '/AcpPage/delete_page', 'in_menu' => '0605'),
    #array('id' => '0608', 'name' => '修改页面模板', 'mod_do_url' => '/AcpPage/edit_page', 'in_menu' => '0605'),
    //),
    /*'首页导航定制'	=> array(
        array('id' => '0612', 'name' => '首页导航列表', 'mod_do_url' => '/AcpIndexNav/get_index_nav_list', 'in_menu' => ''),
        array('id' => '0613', 'name' => '添加首页导航', 'mod_do_url' => '/AcpIndexNav/add_index_nav', 'in_menu' => ''),
        array('id' => '0614', 'name' => '修改首页导航', 'mod_do_url' => '/AcpIndexNav/edit_index_nav', 'in_menu' => '0612'),
    ),*/
);

/*$admin_menu_file[6] = array('id' => '07', 'mod_name' => 'FreightActivity', 'name' => '营销活动管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpDiscountMinus/get_discount_minus_list');*/
/*$admin_menu_file[6]['menu_list'] = array(
	'满减活动管理'	=> array(# NEW-done-WSQ
		array('id' => '0703', 'name' => '添加满减活动', 'mod_do_url' => '/AcpDiscountMinus/add_discount_minus', 'in_menu' => ''),
		array('id' => '0705', 'name' => '修改满减活动', 'mod_do_url' => '/AcpDiscountMinus/edit_discount_minus', 'in_menu' => '0701'),
        array('id' => '0701', 'name' => '满减活动列表', 'mod_do_url' => '/AcpDiscountMinus/get_discount_minus_list', 'in_menu' => ''),
        array('id' => '0702', 'name' => '满减活动明细', 'mod_do_url' => '/AcpDiscountMinus/get_discount_minus_detail', 'in_menu' => ''),
        // array('id' => '0703', 'name' => '满减活动统计', 'mod_do_url' => '/AcpDiscountMinus/discount_minus_stat', 'in_menu' => ''),
    ),
    '买赠活动管理'    => array(# NEW-going-JW
        array('id' => '0709', 'name' => '添加买赠活动', 'mod_do_url' => '/AcpBuyGive/add_buy_give', 'in_menu' => ''),
        array('id' => '0710', 'name' => '修改买赠活动', 'mod_do_url' => '/AcpBuyGive/edit_buy_give', 'in_menu' => '0706'),
		// array('id' => '0704', 'name' => '系统买赠活动列表', 'mod_do_url' => '/AcpBuyGive/get_system_buy_give_list', 'in_menu' => ''),
		// array('id' => '0705', 'name' => '仓储买赠活动列表', 'mod_do_url' => '/AcpBuyGive/get_merchant_buy_give_list', 'in_menu' => ''),
		array('id' => '0706', 'name' => '所有买赠活动列表', 'mod_do_url' => '/AcpBuyGive/get_all_buy_give_list', 'in_menu' => ''),
		array('id' => '0707', 'name' => '买赠活动明细', 'mod_do_url' => '/AcpBuyGive/get_buy_give_detail', 'in_menu' => ''),
		// array('id' => '0708', 'name' => '买赠活动统计', 'mod_do_url' => '/AcpBuyGive/buy_give_stat', 'in_menu' => ''),
	),
    '礼品管理'  => array(# NEW-done-WSQ
        array('id' => '0728', 'name' => '礼品列表', 'mod_do_url' => '/AcpGift/get_gift_list', 'in_menu' => ''),
        array('id' => '0729', 'name' => '添加礼品', 'mod_do_url' => '/AcpGift/add_gift', 'in_menu' => ''),
        array('id' => '0730', 'name' => '修改礼品', 'mod_do_url' => '/AcpGift/edit_gift', 'in_menu' => '0728'),
        array('id' => '0731', 'name' => '礼品上下架', 'mod_do_url' => '/AcpGift/set_enable', 'in_menu' => '0728'),
        array('id' => '0732', 'name' => '礼品批量上下架', 'mod_do_url' => '/AcpGift/batch_set_enable', 'in_menu' => '0728'),
        array('id' => '0733', 'name' => '删除礼品', 'mod_do_url' => '/AcpGift/delete_gift', 'in_menu' => '0728'),
        array('id' => '0734', 'name' => '批量删除礼品', 'mod_do_url' => '/AcpGift/batch_delete_gift', 'in_menu' => '0728'),
    ),
// 	'特价促销活动管理'	=> array(# NEW-done-WSQ
// 		array('id' => '0740', 'name' => '待审核列表', 'mod_do_url' => '/AcpSpecialOffer/get_per_apply_special_offer_list', 'in_menu' => ''),
// 		array('id' => '0711', 'name' => '特价促销活动列表', 'mod_do_url' => '/AcpSpecialOffer/get_special_offer_list', 'in_menu' => ''),
// 		array('id' => '0712', 'name' => '特价促销活动明细', 'mod_do_url' => '/AcpSpecialOffer/get_special_offer_detail', 'in_menu' => ''),
// 		array('id' => '0713', 'name' => '特价促销活动统计', 'mod_do_url' => '/AcpSpecialOffer/special_offer_stat', 'in_menu' => ''),
// 	),
    '优惠券管理' => array(# NEW-done-WSQ
        array('id' => '0714', 'name' => '添加优惠券', 'mod_do_url' => '/AcpVouchers/add_vouchers', 'in_menu' => ''),
        array('id' => '0715', 'name' => '修改优惠券', 'mod_do_url' => '/AcpVouchers/edit_vouchers', 'in_menu' => '0718'),
        // array('id' => '0716', 'name' => '系统优惠券列表', 'mod_do_url' => '/AcpVouchers/get_system_vouchers_list', 'in_menu' => ''),
        // array('id' => '0717', 'name' => '仓储优惠券列表', 'mod_do_url' => '/AcpVouchers/get_merchant_vouchers_list', 'in_menu' => ''),
        array('id' => '0718', 'name' => '所有优惠券列表', 'mod_do_url' => '/AcpVouchers/get_all_vouchers_list', 'in_menu' => ''),
        array('id' => '0719', 'name' => '优惠券明细', 'mod_do_url' => '/AcpVouchers/get_vouchers_detail', 'in_menu' => ''),
        // array('id' => '0720', 'name' => '优惠券统计', 'mod_do_url' => '/AcpVouchers/vouchers_stat', 'in_menu' => ''),
        array('id' => '0735', 'name' => '删除优惠券', 'mod_do_url' => '/AcpVouchers/delete_vouchers', 'in_menu' => '0714'),
        array('id' => '0736', 'name' => '批量删除优惠券', 'mod_do_url' => '/AcpVouchers/batch_delete_vouchers', 'in_menu' => '0714'),
        array('id' => '0737', 'name' => '优惠券上下架', 'mod_do_url' => '/AcpVouchers/set_enable', 'in_menu' => '0714'),
        array('id' => '0738', 'name' => '优惠券批量上下架', 'mod_do_url' => '/AcpVouchers/batch_set_enable', 'in_menu' => '0714'),
    ),
    '优惠券领券管理'   => array(# tale
        array('id' => '0764', 'name' => '添加领券', 'mod_do_url' => '/AcpCouponSet/add_coupon_set', 'in_menu' => ''),
        array('id' => '0765', 'name' => '修改领券', 'mod_do_url' => '/AcpCouponSet/edit_coupon_set', 'in_menu' => '0767'),
        array('id' => '0767', 'name' => '所有领券列表', 'mod_do_url' => '/AcpCouponSet/get_coupon_set_list', 'in_menu' => ''),
	),
	'团购商品管理'	=> array(
		array('id' => '0768', 'name' => '团购中的商品', 'mod_do_url' => '/AcpGroupBuy/get_onsale_group_buy_list', 'in_menu' => ''),
		array('id' => '0769', 'name' => '仓库中的团购商品', 'mod_do_url' => '/AcpGroupBuy/get_store_group_buy_list', 'in_menu' => ''),
		array('id' => '0770', 'name' => '添加团购商品', 'mod_do_url' => '/AcpGroupBuy/add_group_buy', 'in_menu' => ''),
		array('id' => '0771', 'name' => '修改团购商品', 'mod_do_url' => '/AcpGroupBuy/edit_group_buy', 'in_menu' => '0421'),
	),
	'团购订单管理'	=> array(
		array('id' => '0772', 'name' => '已付款未结束订单', 'mod_do_url' => '/AcpOrder/get_group_payed_order_list', 'in_menu' => ''),
		array('id' => '0773', 'name' => '已完成/待发货订单', 'mod_do_url' => '/AcpOrder/get_group_pre_deliver_order_list', 'in_menu' => ''),
		array('id' => '0774', 'name' => '已发货订单', 'mod_do_url' => '/AcpOrder/get_group_delivered_order_list', 'in_menu' => ''),
		array('id' => '0775', 'name' => '发货', 'mod_do_url' => '/AcpOrder/deliver_order', 'in_menu' => '0501'),
		array('id' => '0776', 'name' => '待退款订单', 'mod_do_url' => '/AcpOrder/get_group_pre_refund_order_list', 'in_menu' => ''),
		array('id' => '0777', 'name' => '已退款订单', 'mod_do_url' => '/AcpOrder/get_group_refunded_order_done_list', 'in_menu' => ''),
	),
);*/
/*$admin_menu_file[7] = array('id' => '07', 'mod_name' => 'School', 'name' => '学校信息管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpSchool/get_school_list');
$admin_menu_file[7]['menu_list'] = array(
	'学校信息管理'	=> array(
		array('id' => '0809', 'name' => '学校列表', 'mod_do_url' => '/AcpSchool/get_school_list', 'in_menu' => ''),
		array('id' => '0810', 'name' => '添加学校', 'mod_do_url' => '/AcpSchool/add_school', 'in_menu' => ''),
		array('id' => '0811', 'name' => '修改学校', 'mod_do_url' => '/AcpSchool/edit_school', 'in_menu' => '0809'),
		array('id' => '0811', 'name' => '设置地理围栏', 'mod_do_url' => '/AcpSchool/set_wl', 'in_menu' => '0809'),

	),
);*/
$admin_menu_file[5] = array('id' => '06', 'mod_name' => 'Article', 'name' => '文章资讯', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpArticle/list_article');
$admin_menu_file[5]['menu_list'] = array(
    '帮助管理'	=> array(
        array('id' => '0601', 'name' => '帮助列表', 'mod_do_url' => '/AcpHelp/list_help', 'in_menu' => ''),//OK-CC
        array('id' => '0602', 'name' => '添加帮助', 'mod_do_url' => '/AcpHelp/add_help', 'in_menu' => ''),//OK-CC
        array('id' => '0603', 'name' => '修改帮助', 'mod_do_url' => '/AcpHelp/edit_help', 'in_menu' => '0601'),//OK-CC
        array('id' => '0604', 'name' => '帮助栏目列表', 'mod_do_url' => '/AcpHelp/list_sort', 'in_menu' => '')//OK-CC

    ),
	'资讯管理'	=> array(
		array('id' => '0605', 'name' => '资讯列表', 'mod_do_url' => '/AcpArticle/list_article', 'in_menu' => ''),//OK-CC
		array('id' => '0606', 'name' => '添加资讯', 'mod_do_url' => '/AcpArticle/add_article', 'in_menu' => ''),//OK-CC
		array('id' => '0607', 'name' => '修改资讯', 'mod_do_url' => '/AcpArticle/edit_article', 'in_menu' => '0605'),//OK-CC
        array('id' => '0608', 'name' => '资讯栏目列表', 'mod_do_url' => '/AcpArticle/list_sort', 'in_menu' => '')//OK-CC

    ),
	'公告管理'	=> array(
		array('id' => '0611', 'name' => '公告列表', 'mod_do_url' => '/AcpNotice/list_notice', 'in_menu' => ''),//OK-CC
		array('id' => '0612', 'name' => '添加公告', 'mod_do_url' => '/AcpNotice/add_notice', 'in_menu' => ''),//OK-CC
		array('id' => '0613', 'name' => '修改公告', 'mod_do_url' => '/AcpNotice/edit_notice', 'in_menu' => '0611'),//OK-CC
		array('id' => '0614', 'name' => '公告栏目列表', 'mod_do_url' => '/AcpNotice/list_sort', 'in_menu' => '')//OK-CC

	),
	'站内信'	=> array(
		array('id' => '0615', 'name' => '站内信列表', 'mod_do_url' => '/AcpMessage/list_message', 'in_menu' => ''),//OK-CC
		array('id' => '0616', 'name' => '发布站内信', 'mod_do_url' => '/AcpMessage/add_message', 'in_menu' => ''),//OK-CC
		array('id' => '0617', 'name' => '修改站内信', 'mod_do_url' => '/AcpMessage/edit_message', 'in_menu' => '0615'),//OK-CC
		),

);

// $admin_menu_file[6] = array('id' => '07', 'mod_name' => 'Stat', 'name' => '统计', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpStat/today_flow_detail');
// $admin_menu_file[6]['menu_list'] = array(
// 	'流量统计'	=> array(
// 		array('id' => '0701', 'name' => '今日流量', 'mod_do_url' => '/AcpStat/today_flow_detail', 'in_menu' => ''),
// 		array('id' => '0702', 'name' => '历史流量日统计', 'mod_do_url' => '/AcpStat/history_flow_detail_d', 'in_menu' => ''),
// 		array('id' => '0706', 'name' => '历史流量月统计', 'mod_do_url' => '/AcpStat/history_flow_detail_m', 'in_menu' => ''),
// 		array('id' => '0707', 'name' => '历史流量年统计', 'mod_do_url' => '/AcpStat/history_flow_detail_y', 'in_menu' => ''),
// 		#array('id' => '0703', 'name' => '页面统计', 'mod_do_url' => '/AcpStat/page_stat', 'in_menu' => ''),
// 	),
// 	#'客服统计'	=> array(
// 		#array('id' => '0704', 'name' => '客服流量详情', 'mod_do_url' => '/AcpStat/customer_service_detail', 'in_menu' => ''),
// 		#array('id' => '0705', 'name' => '客服流量统计', 'mod_do_url' => '/AcpStat/customer_service_stat', 'in_menu' => '')
// 	#),
// );

//$admin_menu_file[6] = array('id' => '07', 'mod_name' => 'Integer', 'name' => '积分管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpIntegral/get_integral_list');
//$admin_menu_file[6]['menu_list'] = array(
//	'积分管理'	=> array(
//		array('id' => '0701', 'name' => '积分列表', 'mod_do_url' => '/AcpIntegral/get_user_integral_list', 'in_menu' => ''),	//操作栏增加"调整积分", 点击调到调整积分页，选择变动类型，修改积分余额(user表left_integral和total_integral)	//OK-CC
//		array('id' => '0702', 'name' => '积分明细', 'mod_do_url' => '/AcpIntegral/get_user_integral_detail', 'in_menu' => ''),//OK-CC
//		array('id' => '0709', 'name' => '调整积分', 'mod_do_url' => '/AcpIntegral/get_user_integral_edit', 'in_menu' => '0701'),//OK-CC
//		array('id' => '0710', 'name' => '积分兑换列表', 'mod_do_url' => '/AcpIntegral/get_order_list', 'in_menu' => ''),
//        array('id' => '0711', 'name' => '积分兑换详情', 'mod_do_url' => '/AcpIntegral/order_detail', 'in_menu' => '0710'),
//        array('id' => '0712', 'name' => '兑换物品发货', 'mod_do_url' => '/AcpIntegral/deliver_order', 'in_menu' => '0710'),
//	),
//	'积分变动类型管理'	=> array(
//		array('id' => '0703', 'name' => '积分一级变动类型列表', 'mod_do_url' => '/AcpIntegral/get_level_one', 'in_menu' => ''),//OK-CC
//		array('id' => '0704', 'name' => '添加积分一级变动类型', 'mod_do_url' => '/AcpIntegral/add_level_one', 'in_menu' => ''),//OK-CC
//		array('id' => '0705', 'name' => '修改积分一级变动类型', 'mod_do_url' => '/AcpIntegral/edit_level_one', 'in_menu' => '0703'),//OK-CC
//		array('id' => '0706', 'name' => '积分二级变动类型列表', 'mod_do_url' => '/AcpIntegral/get_level_two', 'in_menu' => ''),//OK-CC
//		array('id' => '0707', 'name' => '添加积分二级变动类型', 'mod_do_url' => '/AcpIntegral/add_level_two', 'in_menu' => ''),//OK-CC
//		array('id' => '0708', 'name' => '修改积分二级变动类型', 'mod_do_url' => '/AcpIntegral/edit_level_two', 'in_menu' => '0706'),//OK-CC
//	),
//);
//
//$admin_menu_file[7] = array('id' => '08', 'mod_name' => 'Promo', 'name' => '营销管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpPromo/list_item_discount');
//$admin_menu_file[7]['menu_list'] = array(
//	#'礼品管理'	=> array(
//		#array('id' => '0801', 'name' => '礼品列表', 'mod_do_url' => '/AcpGift/list_gift', 'in_menu' => ''),
//			#array('id' => '0811', 'name' => '编辑礼品', 'mod_do_url' => '/AcpGift/edit_gift', 'in_menu' => '0801'),
//		#array('id' => '0802', 'name' => '添加礼品', 'mod_do_url' => '/AcpGift/add_gift', 'in_menu' => ''),
//		#array('id' => '0803', 'name' => '礼品赠送记录', 'mod_do_url' => '/AcpGift/list_gift_log', 'in_menu' => ''),
//	#),
//	'营销规则'	=> array(
//		array('id' => '0804', 'name' => '指定商品直接优惠', 'mod_do_url' => '/AcpPromo/list_item_discount', 'in_menu' => ''),//going-WSQ
//		array('id' => '0812', 'name' => '添加商品促销活动', 'mod_do_url' => '/AcpPromo/add_item_discount', 'in_menu' => '0804'),//going-WSQ
//		array('id' => '0813', 'name' => '编辑商品优惠活动', 'mod_do_url' => '/AcpPromo/edit_item_discount', 'in_menu' => '0804'),//going-WSQ
//		#array('id' => '0808', 'name' => '指定商品赠礼品', 'mod_do_url' => '/AcpPromo/list_item_gift', 'in_menu' => ''),
//		#array('id' => '0814', 'name' => '添加商品促销活动(送礼)', 'mod_do_url' => '/AcpPromo/add_item_gift', 'in_menu' => '0808'),
//		#array('id' => '0815', 'name' => '编辑商品促销活动(送礼)', 'mod_do_url' => '/AcpPromo/edit_item_gift', 'in_menu' => '0808'),
//		array('id' => '0806', 'name' => '订单满额优惠', 'mod_do_url' => '/AcpPromo/list_order_discount', 'in_menu' => ''),//going-WSQ
//		array('id' => '0816', 'name' => '添加订单促销(优惠)', 'mod_do_url' => '/AcpPromo/add_order_discount', 'in_menu' => '0806'),//going-WSQ
//		array('id' => '0817', 'name' => '编辑订单促销(优惠)', 'mod_do_url' => '/AcpPromo/edit_order_discount', 'in_menu' => '0806'),//going-WSQ
//		#array('id' => '0807', 'name' => '订单满额包邮', 'mod_do_url' => '/AcpPromo/set_free_shipping', 'in_menu' => ''),
//		#array('id' => '0808', 'name' => '订单满额赠礼品', 'mod_do_url' => '/AcpPromo/list_order_gift', 'in_menu' => ''),
//			#array('id' => '0818', 'name' => '添加订单促销(送礼)', 'mod_do_url' => '/AcpPromo/add_order_gift', 'in_menu' => '0808'),
//			#array('id' => '0819', 'name' => '编辑订单促销(送礼)', 'mod_do_url' => '/AcpPromo/edit_order_gift', 'in_menu' => '0808'),
//		#array('id' => '0809', 'name' => '新人下单打折', 'mod_do_url' => '/AcpPromo/set_new_user_discount', 'in_menu' => ''),
//		array('id' => '0818', 'name' => '优惠券列表', 'mod_do_url' => '/AcpPromo/coupon_list', 'in_menu' => ''),//going-WSQ
//		array('id' => '0819', 'name' => '添加优惠券', 'mod_do_url' => '/AcpPromo/add_coupon', 'in_menu' => '0818'),//going-WSQ
//		array('id' => '0820', 'name' => '编辑优惠券', 'mod_do_url' => '/AcpPromo/edit_coupon', 'in_menu' => '0818'),//going-WSQ
//		array('id' => '0821', 'name' => '删除优惠券', 'mod_do_url' => '/AcpPromo/del_coupon', 'in_menu' => '0818'),//going-WSQ
//		//array('id' => '0822', 'name' => '今日最大牌', 'mod_do_url' => '/AcpPromo/major_config', 'in_menu' => ''),//going-WSQ
//	),
//	#'营销效果'	=> array(
//		#array('id' => '0810', 'name' => '营销方式效果对比', 'mod_do_url' => '/AcpPromo/chart_promos_result', 'in_menu' => ''),
//	#),
//);

//$admin_menu_file[8] = array('id' => '09', 'mod_name' => 'Requirement', 'name' => '需求管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpRequireMent/get_pre_handle_requirement_list');
//$admin_menu_file[8]['menu_list'] = array(
//	'需求管理'	=> array(
//		array('id' => '0902', 'name' => '待处理需求', 'mod_do_url' => '/AcpRequirement/get_pre_handle_requirement_list', 'in_menu' => ''), //going-JX
//		array('id' => '0903', 'name' => '已完成需求', 'mod_do_url' => '/AcpRequirement/get_finished_requirement_list', 'in_menu' => ''),//going-JX
//		array('id' => '0904', 'name' => '需求详情', 'mod_do_url' => '/AcpRequirement/requirement_detail', 'in_menu' => '0901'),//going-JX
//		array('id' => '0901', 'name' => '所有需求列表', 'mod_do_url' => '/AcpRequirement/get_all_requirement_list', 'in_menu' => ''),//going-JX
//
//		//新增加一个需求时，若管理员后台开着，有语音提醒（叮咚），并提示跳转--going-JW
//	)
//);

//$admin_menu_file[9] = array('id' => '10', 'mod_name' => 'IntergalRule', 'name' => '积分规则', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpArticle/common_article/tag/integral_source');
//$admin_menu_file[9]['menu_list'] = array(
//	'积分规则'	=> array(
//		array('id' => '1009', 'name' => '积分来源', 'mod_do_url' => '/AcpArticle/common_article/tag/integral_source', 'in_menu' => ''),
//		array('id' => '1010', 'name' => '积分消费', 'mod_do_url' => '/AcpArticle/common_article/tag/integral_consume', 'in_menu' => ''),
//
//	)
//);
//
//$admin_menu_file[10] = array('id' => '11', 'mod_name' => 'IntergalCase', 'name' => '积分方案', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpArticle/common_article/tag/integral_rule');
//$admin_menu_file[10]['menu_list'] = array(
//	'积分方案'	=> array(
//		array('id' => '1103', 'name' => '积分方案', 'mod_do_url' => '/AcpArticle/common_article/tag/integral_rule', 'in_menu' => ''),
//
//	)
//);
