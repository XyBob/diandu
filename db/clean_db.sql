TRUNCATE TABLE tp_account;
TRUNCATE TABLE tp_account_apply;
TRUNCATE TABLE tp_adv;
TRUNCATE TABLE tp_bank_card_apply;
TRUNCATE TABLE tp_bank_card;

TRUNCATE TABLE tp_big_area;
TRUNCATE TABLE tp_brand;
TRUNCATE TABLE tp_building;
TRUNCATE TABLE tp_city_change_log;
TRUNCATE TABLE tp_class;
TRUNCATE TABLE tp_collect;
TRUNCATE TABLE tp_cust_flash;
TRUNCATE TABLE tp_coupon;
TRUNCATE TABLE tp_customer_service_online;
TRUNCATE TABLE tp_card_pay_log;

TRUNCATE TABLE tp_deposit_apply;
TRUNCATE TABLE tp_email_log;
TRUNCATE TABLE tp_first_buy_item;
TRUNCATE TABLE tp_foot_man;
TRUNCATE TABLE tp_foot_man_refund;
TRUNCATE TABLE tp_foot_man_rank;
TRUNCATE TABLE tp_foot_man_award;
TRUNCATE TABLE tp_foot_man_apply;

TRUNCATE TABLE tp_freight_coupon;
TRUNCATE TABLE tp_freight;
TRUNCATE TABLE tp_freight_activity;
TRUNCATE TABLE tp_freight_activity_rule;

TRUNCATE TABLE tp_integral;
TRUNCATE TABLE tp_integral_change_class;
TRUNCATE TABLE tp_integral_change_sort;
TRUNCATE TABLE tp_integral_exchange_record;
TRUNCATE TABLE tp_integral_exchange_record_item;

TRUNCATE TABLE tp_item;
TRUNCATE TABLE tp_item_photo;
TRUNCATE TABLE tp_item_txt;
TRUNCATE TABLE tp_item_txt_photo;
TRUNCATE TABLE tp_item_type;
TRUNCATE TABLE tp_item_package;
TRUNCATE TABLE tp_item_package_txt_photo;
TRUNCATE TABLE tp_item_package_photo;
TRUNCATE TABLE tp_item_package_txt;
TRUNCATE TABLE tp_item_package_detail;
TRUNCATE TABLE tp_item_refund_change;
TRUNCATE TABLE tp_item_sku_price;
TRUNCATE TABLE tp_item;

TRUNCATE TABLE tp_link;
TRUNCATE TABLE tp_login_log;
TRUNCATE TABLE tp_logs;

TRUNCATE TABLE tp_member;
TRUNCATE TABLE tp_merchant;
TRUNCATE TABLE tp_merchant_apply;
TRUNCATE TABLE tp_merchant_class;
TRUNCATE TABLE tp_merchant_comment_user;
TRUNCATE TABLE tp_merchant_order;

TRUNCATE TABLE tp_merge_pay;
TRUNCATE TABLE tp_merge_pay_detail;

TRUNCATE TABLE tp_message;

TRUNCATE TABLE tp_new_item;
TRUNCATE TABLE tp_new_shop_item;

TRUNCATE TABLE tp_notice;
TRUNCATE TABLE tp_notice_sort;
TRUNCATE TABLE tp_notice_txt_photo;
TRUNCATE TABLE tp_notice_txt;

TRUNCATE TABLE tp_order;
TRUNCATE TABLE tp_order_item;
TRUNCATE TABLE tp_order_log;
TRUNCATE TABLE tp_order_promotion;
TRUNCATE TABLE tp_order_push;
TRUNCATE TABLE tp_order_rob;
TRUNCATE TABLE tp_order_temp;

TRUNCATE TABLE tp_promotion_item_discount;
TRUNCATE TABLE tp_promotion_item_discount_detail;
TRUNCATE TABLE tp_promotion_item_discount_rank;
TRUNCATE TABLE tp_promotion_log;
TRUNCATE TABLE tp_promotion_order_discount;
TRUNCATE TABLE tp_promotion_order_discount_rank;

TRUNCATE TABLE tp_property;
TRUNCATE TABLE tp_property_value;

TRUNCATE TABLE tp_push_log;

TRUNCATE TABLE tp_pv_main;
TRUNCATE TABLE tp_pv_respondent_data;
TRUNCATE TABLE tp_pv_system_analysis;

TRUNCATE TABLE tp_quick_item;
TRUNCATE TABLE tp_recommend_item;

TRUNCATE TABLE tp_shopping_cart;
TRUNCATE TABLE tp_user_address;
TRUNCATE TABLE tp_user_comment;
TRUNCATE TABLE tp_user_comment_merchant;
TRUNCATE TABLE tp_user_comment_foot_man;
TRUNCATE TABLE tp_user_rank;
TRUNCATE TABLE tp_user_requirement;
TRUNCATE TABLE tp_user_requirement_log;
TRUNCATE TABLE tp_user_suggest;

TRUNCATE TABLE tp_sms_log;
TRUNCATE TABLE tp_sort;
TRUNCATE TABLE tp_verify_code;
DELETE FROM tp_users WHERE role_type = 3;
