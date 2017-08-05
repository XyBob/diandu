/***************2016-03-14************/
DROP TABLE IF EXISTS `tp_templet_package`;
CREATE TABLE `tp_templet_package` (
      `templet_package_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
      `templet_package_name` varchar(32) NOT NULL DEFAULT '' COMMENT '页面名称',
      `image` varchar(128) NOT NULL DEFAULT '' COMMENT '缩略图',
      `user_id` int(16) NOT NULL DEFAULT '0' COMMENT '所属用户',
      `desc` text NOT NULL COMMENT '描述',
      `serial` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序号',
      `isuse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否启用，1启用，0关闭',
      `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '记录生成时间',
      PRIMARY KEY (`templet_package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='模板套餐表';


DROP TABLE IF EXISTS `tp_templet`;
CREATE TABLE `tp_templet` (
      `templet_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
      `page_id` int(8) NOT NULL DEFAULT '0' COMMENT '页面ID',
      `templet_package_id` int(8) NOT NULL DEFAULT '0' COMMENT '模板ＩＤ',
      `serial` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序号',
      `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否有效，1有效，0无效',
      PRIMARY KEY (`templet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='套餐—页面明细表';


DROP TABLE IF EXISTS `tp_page`;
CREATE TABLE `tp_page` (
      `page_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
      `page_name` varchar(32) NOT NULL DEFAULT '' COMMENT '页面名称',
      `image` varchar(128) NOT NULL DEFAULT '' COMMENT '缩略图',
      `page_url` varchar(128) NOT NULL DEFAULT '' COMMENT '页面地址',
      `page_desc` text NOT NULL COMMENT '页面描述',
      `serial` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序号',
      `isuse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否启用，1启用，0关闭',
      `file_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '文件名（查找时使用）',
      PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='页面模板表';


#2016-05-04 jw 模板相关
ALTER TABLE tp_page ADD COLUMN page_type TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '页面类型，1首页，2列表页，3详情页，4团购，其他待扩充';
ALTER TABLE tp_page ADD COLUMN user_id INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '模板所属用户，值为0表示模板为公用模板，不为0时表示模板为定制模板，属个人所有';
ALTER TABLE tp_page ADD COLUMN zip_url varchar(255) NOT NULL DEFAULT '' COMMENT 'zip保存路径';
ALTER TABLE tp_page DROP COLUMN user_id;
ALTER TABLE tp_page DROP COLUMN zip_url;
ALTER TABLE tp_page ADD COLUMN version varchar(16) NOT NULL DEFAULT '' COMMENT '版本号，模板自动更新用';

INSERT INTO tp_config(config_name, config_value) VALUES ('cur_templet_package_id', 0);

#2016-05-07 jw 促销相关
DROP TABLE if EXISTS tp_discount_minus;
CREATE TABLE `tp_discount_minus` (
	  `discount_minus_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `merchant_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
	  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，开始时间',
	  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，结束时间',
	  `num` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '减多少',
	  `amount_limit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单满多少(此处指合并支付的总金额)可使用该满减活动',
	  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '当前满减活动是否有效，1是0否，若为否，发放满减活动时，选择满减活动时不会出现该满减活动',
	  `use_time` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '用户可享受几次这样的折扣，0表示无限制',
	  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题/描述',
	  `scope` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '使用范围，1仅限微信，2仅限APP，0全部',
	  `genre_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '三级分类ID，表示该活动只支持该分类下的商品，若为0则无此限制',
	  PRIMARY KEY (`discount_minus_id`),
	  KEY `tp_area` (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='满减活动表';

DROP TABLE if EXISTS tp_user_discount_minus;
CREATE TABLE `tp_user_discount_minus` (
	  `user_discount_minus_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `discount_minus_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '满减活动ID',
	  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
	  `merchant_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
	  `num` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '减了多少',
	  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单金额',
	  `order_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单ID',
	  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  `genre_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '三级分类ID，表示该活动只支持该分类下的商品，若为0则无此限制',
	  PRIMARY KEY (`user_discount_minus_id`),
	  KEY `tp_area` (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户满减活动表';

DROP TABLE if EXISTS tp_buy_give;
CREATE TABLE `tp_buy_give` (
	  `buy_give_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `merchant_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
	  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，开始时间',
	  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，结束时间',
	  `gift_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '礼品ID',
	  `vouchers_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '抵用券ID',
	  `give_num` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '赠送抵用券的数量',
	  `amount_limit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单满多少(此处指合并支付的总金额)可使用该买赠活动',
	  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '当前买赠活动是否有效，1是0否，若为否，发放买赠活动时，选择买赠活动时不会出现该买赠活动',
	  `use_time` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '用户可享受几次这样的折扣，0表示无限制',
	  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题/描述',
	  `scope` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '使用范围，1仅限微信，2仅限APP，0全部',
	  `genre_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '三级分类ID，表示该活动只支持该分类下的商品，若为0则无此限制',
	  PRIMARY KEY (`buy_give_id`),
	  KEY `tp_area` (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='买赠活动表';

DROP TABLE if EXISTS tp_user_buy_give;
CREATE TABLE `tp_user_buy_give` (
	  `user_buy_give_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `buy_give_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '买赠活动ID',
	  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
	  `merchant_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
	  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单金额',
	  `order_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单ID',
	  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  `genre_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '三级分类ID，表示该活动只支持该分类下的商品，若为0则无此限制',
	  PRIMARY KEY (`user_buy_give_id`),
	  KEY `tp_area` (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户买赠活动表';

DROP TABLE if EXISTS tp_gift;
CREATE TABLE `tp_gift` (
	  `gift_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `merchant_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
	  `gift_name` varchar(32) NOT NULL DEFAULT '' COMMENT '礼品名称',
	  `pic` varchar(255) NOT NULL DEFAULT '' COMMENT '礼品图片地址',
	  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '礼品描述',
	  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否上架，1是0否',
	  `serial` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序号',
	  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  PRIMARY KEY (`gift_id`),
	  KEY `tp_area` (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='礼品表';

DROP TABLE if EXISTS tp_vouchers;
CREATE TABLE `tp_vouchers` (
	  `vouchers_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `merchant_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
	  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，开始时间',
	  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，结束时间',
	  `num` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '面额',
	  `amount_limit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单满多少(此处指合并支付的总金额)可使用该优惠券',
	  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '当前优惠券类型是否有效，1是0否，若为否，发放优惠券时，选择优惠券类型时不会出现该优惠券类型',
	  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题/描述',
	  `scope` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '使用范围，1仅限微信，2仅限APP，3全部',
	  `use_time` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '用户可享受几次这样的折扣，0表示无限制',
	  `keywords` varchar(16) NOT NULL DEFAULT '' COMMENT '关键词，用于根据关键词领取优惠券',
	  `building_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '小区ID',
	  `class_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '限制的一级分类ID，为0则不限制',
	  `sort_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '限制的二级分类ID，为0则不限制',
	  `genre_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '限制的三级分类ID，为0则不限制',
	  PRIMARY KEY (`vouchers_id`),
	  KEY `tp_area` (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='优惠券类型表';

DROP TABLE if EXISTS tp_user_vouchers;
CREATE TABLE `tp_user_vouchers` (
	  `user_vouchers_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `vouchers_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '优惠券类型ID',
	  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
	  `merchant_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
	  `num` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '面额',
	  `order_amount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单总金额',
	  `order_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单ID',
	  `use_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '使用时间',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题/描述',
	  `scope` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '使用范围，1仅限微信，2仅限APP，0全部',
	  `amount_limit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单(商家为商家总金额，系统为合并>支付的总金额)满多少可使用该优惠券',
	  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，开始时间',
	  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，结束时间',
	  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否可用，1是0否',
	  `building_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '小区ID',
	  `genre_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '三级分类ID，表示该活动只支持该分类下的商\n品，若为0则无此限制',
	  PRIMARY KEY (`user_vouchers_id`),
	  KEY `tp_area` (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户优惠券表';

CREATE TABLE `tp_coupon_set` (
	  `coupon_set_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `vouchers_ids` text COMMENT '优惠券ID列表，英文逗号隔开',
	  `type_num` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '领券类型，1新人优惠券，2注册>领券，3通用领券',
	  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，开始时间',
	  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期，结束时间',
	  `bg_pic` varchar(255) NOT NULL DEFAULT '' COMMENT '背景图',
	  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题/描述',
	  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否生效',
	  PRIMARY KEY (`coupon_set_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='优惠券领券设置表';

CREATE TABLE `tp_group_buy` (
	  `group_buy_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `group_name` varchar(255) NOT NULL DEFAULT '' COMMENT '团购名称',
	  `group_desc` varchar(255) NOT NULL DEFAULT '商品简介' COMMENT '商品简介',
	  `unit` varchar(8) NOT NULL COMMENT '单位',
	  `item_sn` varchar(32) NOT NULL DEFAULT '' COMMENT '商品货号',
	  `base_pic` varchar(128) NOT NULL DEFAULT '' COMMENT '原图',
	  `group_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '团购价',
	  `sales_num` int(11) NOT NULL DEFAULT '0' COMMENT '销售量',
	  `clickdot` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
	  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
	  `onstore_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上架时间',
	  `serial` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序号',
	  `isuse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '3种含义，0下架，1上架，2已删除（假删除）',
	  `stock` int(11) NOT NULL DEFAULT '0' COMMENT '库存',
	  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
	  `item_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品号',
	  `people_limit` int(8) NOT NULL DEFAULT '0' COMMENT '参团人数',
	  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '到期时间',
	  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '开始时间',
	  `status` tinyint(6) NOT NULL DEFAULT '0' COMMENT '状态：0,未开团， 1,已开团， 2,组团完成',
	  PRIMARY KEY (`group_buy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='团购商品表';

CREATE TABLE `tp_group_buy_user` (
	  `group_buy_user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `group_buy_id` int(11) NOT NULL DEFAULT '0' COMMENT '团购ID',
	  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
	  `addtime` int(11) NOT NULL,
	  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单',
	  PRIMARY KEY (`group_buy_user_id`),
	  KEY `tp_group_buy` (`group_buy_id`),
	  KEY `tp_users` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='团购-用户关联表';

CREATE TABLE `tp_genre` (
	  `genre_id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `sort_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '二级分类ID',
	  `genre_name` varchar(255) NOT NULL DEFAULT '' COMMENT '三级分类名称',
	  `pic` varchar(255) NOT NULL DEFAULT '' COMMENT '分类图片',
	  `serial` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序号',
	  `isuse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否启用，1启用，0关闭',
	  `province_id` mediumint(8) unsigned NOT NULL DEFAULT '330000' COMMENT '省份ID',
	  `city_id` mediumint(8) unsigned NOT NULL DEFAULT '330300' COMMENT '城市ID',
	  `area_id` mediumint(8) unsigned NOT NULL DEFAULT '330382' COMMENT '区/县ID',
	  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商品三级分类';

ALTER TABLE tp_order ADD COLUMN `group_buy_id` int(11) NOT NULL DEFAULT '0' COMMENT '团购id';
ALTER TABLE tp_order ADD COLUMN `is_group_buy` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否团购';

CREATE TABLE `tp_order_coupon` (
	  `order_coupon_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
	  `order_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单ID',
	  `coupon` text COMMENT '优惠描述，json字符串',
	  PRIMARY KEY (`order_coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COMMENT='订单优惠表';

# 2016-05-16 15:46:35 tale 增加会员卡id
ALTER TABLE `tp_user_vouchers` ADD COLUMN `member_card_id` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '会员卡id';

# 2016-05-17 15:29:35 zlf 商品增加是否推荐
ALTER TABLE `tp_item` ADD COLUMN `is_recommend` tinyint(4) NOT NULL DEFAULT '0' COMMENT '2种含义，0非推荐，1推荐（首页推荐）';
# 2016-05-17 16:13:35 zlf 增加首页广告图片表
DROP TABLE if EXISTS tp_index_ads;
CREATE TABLE `tp_index_ads` (
  `index_ads_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '商品标题',
  `link` varchar(128) NOT NULL DEFAULT '' COMMENT '链接',
  `pic` varchar(128) NOT NULL DEFAULT '' COMMENT '图片路径',
  `serial` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序号',
  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '有效性，0不显示，1显示，2已删除',
  `size_style` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '图片尺寸类型，0.全幅大图，1.半幅中图，2.小图1/3幅',
  PRIMARY KEY (`index_ads_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='首页广告图片表';
# 2016-05-18 14:08:35 zlf 增加首页导航定制表
DROP TABLE if EXISTS tp_index_nav;
CREATE TABLE `tp_index_nav` (
  `index_nav_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题',
  `link` varchar(128) NOT NULL DEFAULT '' COMMENT '链接',
  `pic` varchar(128) NOT NULL DEFAULT '' COMMENT '图标路径',
  `serial` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序号',
  `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '有效性，0不显示，1显示，2已删除',
  PRIMARY KEY (`index_nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='首页导航定制表';

#2016-05-19 jiangwei 用户表增加默认地址
ALTER TABLE tp_users ADD COLUMN `user_address_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户默认配送地址';

#2016-05-27 jiangwei 用户表增加各级代理提成比例
ALTER TABLE tp_users ADD COLUMN `first_agent_rate` decimal(4,2) NOT NULL DEFAULT '0.00' COMMENT '一级代理提成比例';
ALTER TABLE tp_users ADD COLUMN `second_agent_rate` decimal(4,2) NOT NULL DEFAULT '0.00' COMMENT '二级代理提成比例';
ALTER TABLE tp_users ADD COLUMN `third_agent_rate` decimal(4,2) NOT NULL DEFAULT '0.00' COMMENT '三级代理提成比例';
ALTER TABLE tp_users DROP COLUMN second_agent_rate;
ALTER TABLE tp_users DROP COLUMN third_agent_rate;

#2016-06-25 jiangwei 微信公众号菜单保存
INSERT INTO tp_config(config_name, config_value) VALUES ('wx_menu', '');
CREATE TABLE `tp_wx_menu` (
  `wx_menu` TEXT COMMENT 'json格式的菜单信息'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信菜单表';
INSERT INTO tp_wx_menu VALUE ('');

#2016-07-03 jiangwei 积分签到相关
CREATE TABLE `tp_integral_signin` (
  `integral_signin_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `signin_days` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '连续签到天数',
  `award` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '奖励积分数，如连续签到7天可得30积分，连续签到超过天数最大值，按最大值赠送积分；若中图中断，从第一天重新开始计算。',
  PRIMARY KEY (`integral_signin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='积分签到规则表';

#2016-07-03 jiangwei 得到确认收货后赠送积分设置
CREATE TABLE `tp_integral_order_rule` (
  `integral_order_rule_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `amount_limit` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '消费金额',
  `award` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '奖励积分数，如消费30元-50元可得10积分，消费1000元以上可得1000积分。',
  `rate` decimal(4,1) NOT NULL DEFAULT 0 COMMENT '奖励积分比例，如消费30元-50元赠送消费金额的10%积分数，消费1000元以上可得消费金额的30%积分数。award和rate同时设置的情况下，award优先，rate将失效。',
  PRIMARY KEY (`integral_order_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='积分赠送规则表';

#2016-07-03 jiangwei 提现说明文章
INSERT INTO tp_article(article_sort_id, article_tag, title, isuse) VALUES (4, 'about_deposit', '提现说明', 1);
#2016-07-03 jiangwei 起提金额设置，为0表示不限制
INSERT INTO tp_config(config_name, config_value) VALUES ('deposit_limit', 500);

#2016-07-03 jiangwei 商品表增加积分抵扣上限
ALTER TABLE tp_item CHANGE COLUMN integral_exchange_rate integral_exchange_num decimal(8,2) NOT NULL DEFAULT 0.00 COMMENT '积分抵扣上限';
#2016-07-03 jiangwei 订单表增加积分抵扣数量
ALTER TABLE tp_order ADD COLUMN integral_exchange_num decimal(8,2) NOT NULL DEFAULT 0.00 COMMENT '积分抵扣数量';

#2016-07-03 jiangwei 用户表增加支付宝账户、支付宝户名，微信账号
ALTER TABLE tp_users ADD COLUMN alipay_account VARCHAR(32) NOT NULL DEFAULT '' COMMENT '支付宝账户';
ALTER TABLE tp_users ADD COLUMN alipay_account_name VARCHAR(8) NOT NULL DEFAULT '' COMMENT '支付宝账户户名';
ALTER TABLE tp_users ADD COLUMN wx_account VARCHAR(32) NOT NULL DEFAULT '' COMMENT '微信账户';

# 2016-07-20 cuilukai 用户表增加商家备注、订单重要等级
ALTER TABLE tp_order ADD COLUMN merchant_remark VARCHAR(255) NOT NULL DEFAULT '' COMMENT '商家备注';
ALTER TABLE tp_order ADD COLUMN star_num tinyint(3) NOT NULL DEFAULT '0' COMMENT '订单重要程度, 分0-5级';


#2016-08-22 xyc item表 是否为纯积分商品
alter table tp_item add is_integral TINYINT(1) not null  default 0 COMMENT '是否为纯积分商品，0否，1是';

#2016-08-22 xyc item表 积分抵扣
alter table tp_item add integral_exchange int(11) not null default 0 COMMENT '积分抵扣';

#2016-08-22 xyc order表 是否为纯积分兑换
alter table tp_order add is_integral TINYINT(1) not null default 0 COMMENT '是否纯积分兑换，0否，1是';


#2016-08-22 xyc class表 是否有积分商品
alter table tp_class add has_all_integral TINYINT(1) not null default 0 COMMENT '是否有积分商品，0否，1是';


#地理围栏表
DROP TABLE IF EXISTS `tp_school_wl`;
CREATE TABLE `tp_school_wl` (
  `school_wl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '学校地理围栏id',
  `school_id` int(11) NOT NULL DEFAULT '0' COMMENT '学校id',
  `wl` text NOT NULL COMMENT '地理围栏点坐标',
  PRIMARY KEY (`school_wl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='学校地理围栏';
#学校表
CREATE TABLE `tp_school` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(48) NOT NULL DEFAULT '' COMMENT '学校名称',
  `school_code` varchar(10) NOT NULL DEFAULT '' COMMENT '学校特征码',
  `serial` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `geo_fencing` varchar(255) NOT NULL DEFAULT '' COMMENT '地理围栏',
  `center_lng` varchar(20) NOT NULL DEFAULT '' COMMENT '学校中心点经度',
  `center_lat` varchar(20) NOT NULL DEFAULT '' COMMENT '学校中心点纬度',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='学校表';




#商品批发价格表
DROP TABLE IF EXISTS `tp_item_wholesale_price`;
CREATE TABLE `tp_item_wholesale_price` (
  `item_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `min_num` int(11) NOT NULL DEFAULT '0' COMMENT '数量1',
  `max_num` int(11) NOT NULL DEFAULT '0' COMMENT '数量2',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '批发折扣（%）'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品批发价格表';

# 2016-10-21 jw 订单自动确认收货
INSERT INTO tp_config(config_name, config_value) VALUES ('order_auto_confirm_time', 336);


#2016-10-26 xyc 微信关键字回复表
CREATE TABLE `tp_wx_kw_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(50) NOT NULL DEFAULT '' COMMENT '规则名称',
  `reply_type` varchar(20) NOT NULL DEFAULT '' COMMENT '回复类型，text（文本），news（图文），image（图片）',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `text_value` varchar(255) NOT NULL DEFAULT '' COMMENT '文本消息的内容 或 图文消息的摘要',
  `news_title` varchar(126) NOT NULL DEFAULT '' COMMENT '图文标题',
  `news_link` varchar(255) NOT NULL DEFAULT '' COMMENT '图文链接',
  `img_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片消息的图片链接 或 图文消息缩略图的链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='微信关键字回复表';

#关键词表加media_id字段
ALTER TABLE tp_wx_kw_reply ADD COLUMN media_id varchar(255) NOT NULL DEFAULT '' COMMENT '图片上传到微信后返回的media_id，用于标记图片地址';
ALTER TABLE tp_wx_kw_reply CHANGE COLUMN id wx_kw_reply_id INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键';
ALTER TABLE tp_wx_kw_reply ADD COLUMN media_url varchar(255) NOT NULL DEFAULT '' COMMENT '图片上传到微信后返回的图片链接地址';
ALTER TABLE tp_wx_kw_reply ADD COLUMN expire_time INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '图片有效时间';


#微信去群发消息设置
CREATE TABLE `tp_wx_mass_msg` (
  `msg_type` varchar(10) NOT NULL DEFAULT '' COMMENT '消息类型，news（图文），image（图片），text（文本）',
  `media_id` text NOT NULL COMMENT '若设置的消息类型为图文则为图文的media_id， 消息类型为文本时则为文本内容',
  `group` varchar(10) NOT NULL DEFAULT '' COMMENT '群发对象，all（全部用户），数字为用户组id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# 2016-11-10 11:09:06 tale
ALTER TABLE `tp_wx_kw_reply` ADD COLUMN `isuse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否可用，1是0否';
ALTER TABLE tp_order ADD COLUMN `com` varchar(16) NOT NULL DEFAULT '' COMMENT '物流公司编号';
ALTER TABLE tp_order ADD COLUMN `detail` text COMMENT '物流查询结果保存'; 

#2017-01-22 jiangwei 订单表
ALTER TABLE tp_order ADD COLUMN `realname` VARCHAR(16) NOT NULL DEFAULT '' COMMENT '收货人姓名';
ALTER TABLE tp_order ADD COLUMN `mobile` VARCHAR(16) NOT NULL DEFAULT '' COMMENT '收货人手机号';
ALTER TABLE tp_order ADD COLUMN `province_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '收货人所在省份';
ALTER TABLE tp_order ADD COLUMN `city_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '收货人所在城市';
ALTER TABLE tp_order ADD COLUMN `area_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '收货人所在区县';
ALTER TABLE tp_order ADD COLUMN `address` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '收货人详细地址';

#2016-11-29 jiangwei 银行卡表
ALTER TABLE tp_bank ADD COLUMN `cdtbrd` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '招商银行转账接口需要用到的收款行行号';
