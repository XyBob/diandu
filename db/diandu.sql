-- 商家分类表
CREATE TABLE `tp_business_classify` (
  `business_classify_id` int(10) AUTO_INCREMENT NOT NULL COMMENT '自增id',
  `business_classify_name` varchar(255) NOT NULL COMMENT '分类名',
  `img_url` varchar(255) NOT NULL COMMENT '分类图标',
  `isuse` int  NOT NULL COMMENT '是否启用 1启用 0未启用',
  `serial` int(11) NOT NULL DEFAULT '255' COMMENT '排序号',
  PRIMARY KEY (`business_classify_id`)
) ENGINE=innodb DEFAULT CHARSET=utf8 COMMENT='商家分类表';
-- 行业分类表
CREATE TABLE `tp_industry` (
  `industry_id` int(10) AUTO_INCREMENT NOT NULL COMMENT '自增id',
  `industry_name` varchar(20) NOT NULL COMMENT '行业名称',
  `rate` FLOAT NOT NULL COMMENT '抽成比例',
  `isuse` int  NOT NULL COMMENT '是否启用 1启用 0未启用',
  `serial` int(11) NOT NULL DEFAULT '255' COMMENT '排序号',
  PRIMARY KEY (`industry_id`)
) ENGINE=innodb DEFAULT CHARSET=utf8 COMMENT='行业分类表';
-- 商家表
CREATE TABLE `tp_business` (
  `business_id` int(10) AUTO_INCREMENT NOT NULL COMMENT '自增id',
  `business_name` varchar(255) NOT NULL COMMENT '商家名字',
  `contacts` varchar(255) NOT NULL COMMENT '联系人',
  `contact_number` varchar(255) NOT NULL,
  `business_classify_id` int(11) NOT NULL COMMENT '店铺分类id',
  `industry_id` tinyint(4) NOT NULL COMMENT '行业id,1代表普通店铺2代表菜市场',
  `rate` float NOT NULL COMMENT '让利比例',
  `consumption` int(11) NOT NULL COMMENT '人均消费',
  `province_id` int(11) NOT NULL COMMENT '省id',
  `city_id` int(11) NOT NULL COMMENT '市id',
  `area_id` int(11) NOT NULL COMMENT '区id',
  `address` varchar(255) NOT NULL COMMENT '店铺详细地址',
  `desc` varchar(255) NOT NULL COMMENT '店铺介绍',
  `sign_pic` varchar(255) NOT NULL COMMENT '店招图片',
  `evn_pic` text NOT NULL COMMENT '环境图片,用逗号分割',
  `license_pic` varchar(255) NOT NULL COMMENT '营业执照',
  `addtime` varchar(255) NOT NULL,
  `status` int(255) NOT NULL COMMENT '状态 1代表通过 2代表不通过 3代表冻结 4代表待审核',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `longitude` varchar(255) NOT NULL COMMENT '经度',
  `latitude` varchar(255) NOT NULL COMMENT '纬度',
  `cost` int(11) NOT NULL COMMENT '开通费用',
  PRIMARY KEY (`business_id`)
) ENGINE=innodb DEFAULT CHARSET=utf8 COMMENT='商家表';

-- 店都二期商店添加字段
ALTER TABLE `tp_business`
ADD COLUMN `star`  float NOT NULL COMMENT '评分星级' AFTER `reg_time`,
ADD COLUMN `is_open`  tinyint NOT NULL COMMENT '是否营业中' AFTER `reg_time`,
ADD COLUMN `is_out`  tinyint NOT NULL COMMENT '是否有外卖' AFTER `reg_time`,
ADD COLUMN `is_tpl`  tinyint NOT NULL COMMENT '设置为模板' AFTER `reg_time`,
ADD COLUMN `range`  INT NOT NULL COMMENT '配送距离' AFTER `reg_time`;


-- 添加区代理user_id xuyong
ALTER TABLE `tp_address_area`
ADD COLUMN `user_id`  int NOT NULL COMMENT '区代理的user_id' AFTER `addtime`;

-- 添加市代理user_id xuyong
ALTER TABLE `tp_address_city`
ADD COLUMN `user_id`  int NOT NULL COMMENT '市代理的user_id' AFTER `is_open`;
-- by wzh
ALTER TABLE `tp_address_city`
ADD COLUMN `addtime`  int NOT NULL COMMENT '市代理的添加时间' AFTER `city_name`;

-- 添加省代理user_id xuyong
ALTER TABLE `tp_address_province`
ADD COLUMN `user_id`  int NOT NULL COMMENT '省代理的user_id' AFTER `province_name`;
-- by wzh
ALTER TABLE `tp_address_province`
ADD COLUMN `addtime`  int NOT NULL COMMENT '省代理的添加时间' AFTER `province_name`;

-- 修改订单表 xuyong
ALTER TABLE `tp_order`
ADD COLUMN `type`  tinyint NOT NULL COMMENT '1代表到店消费2代表菜市场' AFTER `is_integral`,
ADD COLUMN `business_id`  int NOT NULL COMMENT '商家id' AFTER `type`;


-- 修改用户表备注 xuyong
ALTER TABLE `tp_users`
MODIFY COLUMN `role_type`  tinyint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户类型，1为管理员，2为商家，3为用户，5为代理' AFTER `user_id`;
-- 添加身份证字段 by wzh
ALTER TABLE `tp_users` ADD COLUMN `id`  int NOT NULL COMMENT '代理商身份证号' AFTER `realname`;

-- 修改订单表 添加省市区 xuyong
ALTER TABLE `tp_order`
ADD COLUMN `province_id`  int NOT NULL COMMENT '省id' AFTER `business_id`,
ADD COLUMN `city_id`  int NOT NULL COMMENT '区id' AFTER `province_id`,
ADD COLUMN `area_id`  int NOT NULL COMMENT '县id' AFTER `city_id`;

-- 用户表修改 xuyong
ALTER TABLE `tp_users`
ADD COLUMN `is_province_agent`  tinyint NOT NULL DEFAULT 0 COMMENT '是否是区代理' AFTER `first_agent_rate`,
ADD COLUMN `is_city_agent`  tinyint NOT NULL DEFAULT 0 COMMENT '是否是市代理' AFTER `is_province_agent`,
ADD COLUMN `is_area_agent`  tinyint NOT NULL DEFAULT 0 COMMENT '是否是区代理' AFTER `is_city_agent`;

-- 银行卡表 wzh
CREATE TABLE `tp_bank` (
  `bank_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL DEFAULT '' COMMENT '银行名称',
  `base_pic` varchar(255) NOT NULL DEFAULT '' COMMENT '图标',
  `description` text NOT NULL COMMENT '描述',
  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='银行表';

-- 代理人银行账号信息表 wzh
CREATE TABLE `tp_agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `bank_name` varchar(32) NOT NULL DEFAULT '' COMMENT '银行名称',
  `bank_account` varchar(32) NOT NULL DEFAULT '' COMMENT '银行账号',
  `bank_realname` varchar(16) NOT NULL DEFAULT '' COMMENT '持卡人姓名',
  `openning_bank` varchar(32) NOT NULL DEFAULT '' COMMENT '开户行',
  `bank_mobile` varchar(16) NOT NULL DEFAULT '' COMMENT '预留手机号',
  PRIMARY KEY (`agent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62540 DEFAULT CHARSET=utf8 COMMENT='合伙人表';


-- 配置表添加内容 wzh
INSERT INTO `tp_config` VALUES ('business_rate', '20');
INSERT INTO `tp_config` VALUES ('personal_rate', '30');
INSERT INTO `tp_config` VALUES ('join_prov_rate', '10');
INSERT INTO `tp_config` VALUES ('join_city_rate', '10');
INSERT INTO `tp_config` VALUES ('join_area_rate', '10');
INSERT INTO `tp_config` VALUES ('join_business_rate', '10');
INSERT INTO `tp_config` VALUES ('join_personal_rate', '10');
INSERT INTO `tp_config` VALUES ('pre_near_num', '10');

-- 用户表添加是否是商家字段 xuyong
ALTER TABLE `tp_users`
ADD COLUMN `is_merchant`  tinyint NOT NULL COMMENT '是否是商家1代表是2代表否' AFTER `history_look_ids`;
ALTER TABLE `tp_users`
MODIFY COLUMN `role_type`  tinyint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户类型，1为管理员，3为用户或者商家，5为代理' AFTER `user_id`;
-- 订单表修改备注 xuyong
ALTER TABLE `tp_order`
MODIFY COLUMN `type`  tinyint(4) NOT NULL COMMENT '1代表到店消费2代表菜市场3是申请商家费' AFTER `is_integral`;

ALTER TABLE tp_users ADD COLUMN jpush_reg_id varchar(255) NOT NULL DEFAULT '' COMMENT '极光推送id';


-- 打款表添加查询代码 wzh
ALTER TABLE `tp_remittance`
ADD COLUMN `reqnbr` varchar(255) NOT NULL COMMENT '打款订单结果查询号码' AFTER `pay_suc_time`,
ADD COLUMN `is_above` tinyint(4) NOT NULL COMMENT '是否是超过最高打款额' AFTER `pay_suc_time`;

ALTER TABLE tp_users MODIFY COLUMN `headimgurl` varchar(255) NOT NULL DEFAULT '' COMMENT '头像地址'
ALTER TABLE tp_users MODIFY   `province` varchar(8) NOT NULL DEFAULT '' COMMENT '用户所在省份名称';

-- 修改订单表 xuyong
ALTER TABLE `tp_order`
ADD COLUMN `discount_mins_id`  int NOT NULL COMMENT '满减活动id' AFTER `area_id`,
ADD COLUMN `discount_mins_num`  int NOT NULL COMMENT '满减活动抵扣金额' AFTER `discount_mins_id`;

-- 修改满减表 xuyong
ALTER TABLE `tp_discount_minus`
MODIFY COLUMN `isuse`  tinyint(3) NOT NULL DEFAULT 0 COMMENT '当前满减活动是否有效，1是0否，若为否，发放满减活动时，选择满减活动时不会出现该满减活动' AFTER `amount_limit`;

-- 修改商家类型表 xuyong
ALTER TABLE `tp_business_classify`
ADD COLUMN `tpl_business_id`  int NOT NULL COMMENT '模板商家id' AFTER `serial`;

ALTER TABLE `tp_item`
ADD COLUMN `business_id`  int NOT NULL COMMENT '商家id';
-- 修改分类表 xuyong
ALTER TABLE `tp_class`
ADD COLUMN `industry_type`  tinyint NOT NULL COMMENT '行业类型 1代表普通商店2代表菜市场',
ADD COLUMN `business_id`  int NOT NULL COMMENT '商家id';
-- 创建评分表 majian
CREATE TABLE `tp_evaluation` (
  `evaluation_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '评分id',
  `user_id` int(11) NOT NULL COMMENT '用户的id',
  `business_id` int(11) NOT NULL COMMENT '商家的id',
  `order_id` int(11) NOT NULL COMMENT '订单的id',
  `score` int(2) NOT NULL COMMENT '评价的分数',
  `addtime` int(11) NOT NULL COMMENT '评价的时间',
  PRIMARY KEY (`evaluation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='评分表';

-- 修改商家表 xuyong
ALTER TABLE `tp_business`
ADD COLUMN `delivery_time`  int NOT NULL COMMENT '配送时间' AFTER `sumscore`;
ALTER TABLE `tp_business`
ADD COLUMN `delivery_fee`  int NOT NULL COMMENT '配送费' AFTER `delivery_time`,
ADD COLUMN `out_status`  int NOT NULL COMMENT '开通外卖状态' AFTER `delivery_time`,
ADD COLUMN `box_fee`  int NOT NULL COMMENT '餐盒费' AFTER `delivery_time`,
ADD COLUMN `start_delivery_fee`  int NOT NULL COMMENT '起送费' AFTER `delivery_fee`;
-- 修改订单表 majian
ALTER TABLE `tp_order`
ADD COLUMN `is_evaluate`  tinyint(3) NOT NULL DEFAULT 0 COMMENT '未评价订单0，已评价订单1' ;

-- 增加收藏表 xuyong
CREATE TABLE `tp_like` (
  `like_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `business_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='收藏表';

-- 修改收获地址表 xuyong
ALTER TABLE `tp_user_address`
ADD COLUMN `is_default`  tinyint NOT NULL COMMENT '是否是默认地址' AFTER `isuse`;
ADD COLUMN `zip_code`  int NOT NULL COMMENT '邮编' AFTER `is_default`;
-- 修改订单表 majian
ALTER TABLE `tp_order`
ADD COLUMN `platform_discount_id`  int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '平台满减id（和商家满减存放在同一张表中）' ,
ADD COLUMN `platform_discounts`  decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '平台满减具体金额' ;
-- 修改订单表 majian
ALTER TABLE `tp_order`
ADD COLUMN `arrive_time`  int(10)  NOT NULL DEFAULT 0 COMMENT '用户希望送达时间' AFTER `platform_discounts`;
-- 修改订单表 majian
ALTER TABLE `tp_order`
ADD COLUMN `cancel_reason`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户取消订单的原因';

ALTER TABLE `tp_user_vouchers`
ADD COLUMN `from_order_id`  int(11) NULL DEFAULT null COMMENT '确认用户是否已经领取过该订单分享的优惠券了';
-- 修改银行卡表 xuyong
ALTER TABLE `tp_bank_card`
ADD COLUMN `id_card_no`  varchar(255) NOT NULL COMMENT '持卡人身份证' AFTER `bind_time`;
-- 修改上架表 xuyong
ALTER TABLE `tp_business`
ADD COLUMN `mail`  varchar(255) NOT NULL COMMENT '联系人邮箱',
ADD COLUMN `business_license`  varchar(255) NOT NULL COMMENT '营业执照号',
ADD COLUMN `business_license_type`  varchar(255) NOT NULL COMMENT '营业执照类型';
-- 修改站内信表 xuyong
ALTER TABLE `tp_message`
ADD COLUMN `describe`  varchar(255) NOT NULL COMMENT '简述';
ADD COLUMN `order_id`  int NOT NULL;

-- 创建关键词表 xuyong
CREATE TABLE `tp_hot_search` (
  `hot_search_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hot_search_words` varchar(255) DEFAULT NULL COMMENT '热门搜索关键字',
  `serial` int(255) NOT NULL COMMENT '排序号',
  PRIMARY KEY (`hot_search_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='热门搜索表';
-- 添加分享描述表 majian
CREATE TABLE `tp_share` (
  `share_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `share_title` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '优惠券分享时候显示的标题',
  `share_pic` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '分享优惠券显示的图片',
  `share_desc` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '分享时候的描述',
  PRIMARY KEY (`share_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 修改商家表 xuyong
ALTER TABLE `tp_business`
MODIFY COLUMN `is_open`  tinyint(4) NOT NULL DEFAULT 0 COMMENT '是否营业中' AFTER `is_out`;
-- 修改商品类型表 xuyong
ALTER TABLE `tp_item_type`
ADD COLUMN `business_id`  int NOT NULL COMMENT '商家id';
-- 修改商家表 xuyong
ALTER TABLE `tp_business`
ADD COLUMN `full_name`  varchar(255) NOT NULL COMMENT '店铺全名';

ALTER TABLE `tp_business`
ADD COLUMN `category_id`  varchar(255) NOT NULL COMMENT '营业类型';
-- 修改商家表
ALTER TABLE `tp_business`
ADD COLUMN `delivery_fee_free`  int(11) NOT NULL DEFAULT 0 COMMENT '满多少免配送费';

-- 修改收藏表 majian
ALTER TABLE `tp_like`
ADD COLUMN `addtime`  int(11) NOT NULL DEFAULT 0 COMMENT '关注的时间' ;

-- 修改商家表 xuyong
ALTER TABLE `tp_business`
ADD COLUMN `business_left_money`  int NOT NULL COMMENT '商家钱包';

ALTER TABLE `tp_business`
ADD COLUMN `freeze_money`  int NOT NULL COMMENT '商家钱包冻结池';

ALTER TABLE `tp_business`
MODIFY COLUMN `business_left_money`  decimal(11,2) NOT NULL COMMENT '商家钱包' ,
MODIFY COLUMN `freeze_money`  decimal(11,2) NOT NULL COMMENT '商家钱包冻结池' ;

ALTER TABLE `tp_order`
ADD COLUMN `mch_id`  int NOT NULL COMMENT '商家id(银行)';

ALTER TABLE `tp_business`
MODIFY COLUMN `business_left_money`  decimal(10,2) NOT NULL COMMENT '商家钱包' AFTER `delivery_fee_free`,
MODIFY COLUMN `freeze_money`  decimal(10,2) NOT NULL COMMENT '商家钱包冻结池' AFTER `business_left_money`;

ALTER TABLE `tp_deposit_apply`
ADD COLUMN `order_id`  int NOT NULL COMMENT '订单id';

ALTER TABLE `tp_business`
ADD COLUMN `is_use`  tinyint(1) NOT NULL COMMENT '是否显示';



