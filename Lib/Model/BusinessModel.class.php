<?php
/**
 * 商家模型类
 */

class BusinessModel extends Model
{
    const NOT_OUT = 0; //未开通外卖；
    const OUT_PASS = 1; //开通外卖审核通过；
    const IS_REVIEW = 2; //开通外卖审核中；
    const IS_NOT_PASS = 3; //开通外卖审核未通过；

    const BUSINESS_NOT_CREATE = 0;//未申请
    const BUSINESS_PASS = 1;//审核通过
    const BUSINESS_NOT_PASS = 2;//审核未通过
    const BUSINESS_FREEZE = 3;//冻结
    const BUSINESS_REVIEW  = 4;//待审核
    const BUSINESS_NOT_PAY = 5;//未付款

    /**
     * 构造函数
     * @author 徐永
     * @todo 构造函数
     */
    public function __construct()
    {
        parent::__construct();
    }



    protected $_validate = array(
        array('contacts', 'require', '请输入联系人！'),
        array('contact_number', 'require', '请输入联系电话！'),
        array('business_name', 'require', '请输入店铺名！'),
        array('contact_number',  '/^((400[0-9]{7})|(800[0-9]{7})|(1[34578]{1}\d{9})|((0[0-9]{2,3}[\-]?)?([0-9]{6,8})+(\-[0-9]{1,4})?))$/','请输入正确联系人手机号'),
        //array('rate', 'require', '请输入让利比例！'),
        array('consumption', 'require', '请输入人均消费！'),
        array('address', 'require', '请输入详细地址！'),
        array('desc', 'require', '请输入店铺简介！'),
        array('sign_pic', 'require', '请上传店招图！'),
        array('license_pic', 'require', '请上传营业执照！'),
        array('province_id', 'require', '请选择省份！'),
        array('city_id', 'require', '请选择城市！'),
        array('area_id', 'require', '请选择区/县！'),
    );
    /**
     * 添加商家
     * @author 徐永
     * @param array $arr 商家信息
     * @return boolean 操作结果
     * @todo 添加品牌
     */
    public function addBusiness($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除商家
     * @author 徐永
     * @param int $business_id 商家ID
     * @return boolean 操作结果
     * @todo 删除商家
     */
    public function delBusiness($business_id)
    {
        if (!is_numeric($business_id)) return false;


        return $this->where('business_id = ' . $business_id)->delete();
    }

    /**
     * 更改商家信息
     * @author 徐永
     * @param int $business_id 商家ID
     * @param array $arr 商家信息数组
     * @return boolean 操作结果
     * @todo 更改商家信息
     */
    public function setBusiness($business_id, $arr)
    {
        if (!is_numeric($business_id) || !is_array($arr)) return false;
        return $this->where('business_id = ' . $business_id)->save($arr);
    }

    /**
     * 获取商家信息
     * @author xuyong
     * @param int $business_id ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 品牌信息
     * @todo 获取商家信息
     */
    public function getBusinessInfo($where, $fields = null)
    {
      //  if (!is_numeric($business_id))   return false;
        return $this->field($fields)->where($where)->find();
    }

    /**
     * 获取商家某个字段的信息
     * @author 徐永
     * @param int $brand_id 商家ID
     * @param string $field 查询的字段名
     * @return array 商家信息
     * @todo 获取商家某个字段的信息
     */
    public function getBusinessField($business_id, $field)
    {
        if (!is_numeric($business_id))   return false;
        return $this->where('business_id = ' . $business_id)->getField($field);
    }

    /**
     * 获取商家列表
     * @author 蔡继辉
     * @param string $where where子句
     * @return array 商家列表
     * @todo 获取商家列表
     */
    public function getBusinessList($where='',$orderBy='',$limit='')
    {
        /*if($limit) {
            $result = $this->where($where)->order($orderBy)->limit($limit)->select();
        }else{
            $result = $this->where($where)->order($orderBy)->limit()->select();
        }*/
        $result = $this->where($where)->order($orderBy)->limit()->select();
        //增加推荐人
        foreach ($result as $k => $v){
            $secondid = D('users')->where("user_id=".$result[$k]['user_id'])->field('second_agent_id')->find();
            //$secondname = D('users')->where('user_id='.$secondid['second_agent_id'])->field('realname')->find();
            $result[$k]['second_agent_id'] = $secondid['second_agent_id'];
        }
        return $result;

    }

    public function getAllBusinessList($where='',$orderBy=''){

        $result = $this->where($where)->order($orderBy)->select();
        return $result;
    }

    /**
     * @param $local_longitude 经度
     * @param $local_latitude 纬度
     * @param string $where 查询条件
     * @param $firstRow 查询开始位置
     * @param $getRowNum 查询条数
     * @return mixed
     */
    public function getBusinessListByDistance($local_longitude,$local_latitude,$where,$firstRow,$getRowNum){
        return $this->query('SELECT * from'.BusinessModel::getDistanceSqlBFromTable($local_longitude,$local_latitude,$firstRow,$getRowNum,'tp_business','busi')
            .' where '.$where
            //.' order by rate desc'
        );
    }

    public function getVeMarketListByDistance($local_longitude,$local_latitude,$where,$firstRow,$getRowNum){
        return $this->query('SELECT * from'.BusinessModel::getDistanceSqlByVeMarket($local_longitude,$local_latitude,$firstRow,$getRowNum,'tp_business','busi')
            .' where '.$where
        //.' order by rate desc'
        );
    }
    public function getNearBusinessInfoByDistance($local_longitude,$local_latitude,$where){
        return $this->query('SELECT * from'.BusinessModel::getNearBusinessInfoFromTable($local_longitude,$local_latitude,'tp_business','busi')
            .' where '.$where
        //.' order by rate desc'
        );
    }
    public function getBusinessListData($fields,$where='',$orderby='',$limit=''){

        $store_type_obj=new StoreTypeModel();
        $data=M("business as b")->field("*".$fields)
            ->join("left JOIN {$store_type_obj->getTableName()} as s on s.business_classify_id=b.business_classify_id ")
            ->where($where)
            ->order($orderby)
            ->limit($limit)
            ->select();
        return $data;

    }
    //统计
    public function getBusinessListNum($where=''){

        $store_type_obj=new StoreTypeModel();
        $data=M("business as b")->field("*")
            ->join("left JOIN {$store_type_obj->getTableName()} as s on s.business_classify_id=b.business_classify_id ")
            ->where($where)
            ->count();
        return $data;

    }
    public function getBusinessNum($where='') {
        return $this->where($where)->count();
    }

    public function editBusiness($business_id,$arr){
        return $this->where('business_id = ' . $business_id)->save($arr);
    }

    public function getOneBusiness($business='',$orderBy=''){
        return $this->where($business)->order($orderBy)->find();
    }


    public static  function getDistanceSqlBFromTable($lon,$lat,$firstRow,$getRowNum,$table_name,$temp_name){
        $sql = '(SELECT *,ROUND('
            .'6378.138 * 2 * ASIN('
            .'SQRT('
            .    'POW('
            .        'SIN('
            .            '('
            .                $lat.'* PI() / 180 - latitude * PI() / 180'
            .           ') / 2'
            .        '),2'
            .    ') + COS('.$lat.' * PI() / 180) * COS(latitude * PI() / 180) * POW('
            .        'SIN('
            .            '('
            .                $lon.' * PI() / 180 - longitude * PI() / 180'
            .            ') / 2'
            .        '),'
            .       ' 2'
            .    ')'
            .')'
            .') * 1000'
            .') AS distance '
            .'from '.$table_name
            .' where status=1 AND business_classify_id!=25 and is_use = 1'
//            .'area_id="'.$area_id
            .' order by distance asc '
            .' limit '.$firstRow.','
            .$getRowNum
            .' ) as '.$temp_name;

        return $sql;
    }

    function getNearBusinessInfoFromTable($lon,$lat,$table_name,$temp_name){
        $sql = '(SELECT *,ROUND('
            .'6378.138 * 2 * ASIN('
            .'SQRT('
            .    'POW('
            .        'SIN('
            .            '('
            .                $lat.'* PI() / 180 - latitude * PI() / 180'
            .           ') / 2'
            .        '),2'
            .    ') + COS('.$lat.' * PI() / 180) * COS(latitude * PI() / 180) * POW('
            .        'SIN('
            .            '('
            .                $lon.' * PI() / 180 - longitude * PI() / 180'
            .            ') / 2'
            .        '),'
            .       ' 2'
            .    ')'
            .')'
            .') * 1000'
            .') AS distance '
            .'from '.$table_name
            .' where status=1 and is_use = 1'
//            .'area_id="'.$area_id
            .' order by distance asc '
            .' ) as '.$temp_name;
        return $sql;
    }
    function getBusinessCouponData($user_vouchers_list){
        foreach($user_vouchers_list as $k=>$v){
            $business_info=$this->getBusinessInfo('business_id = '.$v['merchant_id']);
            $user_vouchers_list[$k]['address']=$business_info['address'];
            $user_vouchers_list[$k]['business_name']=$business_info['business_name'];
        }
        return $user_vouchers_list;
    }

    //前台外卖列表数据处理
    function getTakeOutListData($take_out_list){
        $vouchers_obj=new VouchersModel();
        $discount_minus_obj=new DiscountMinusModel();
        foreach($take_out_list as $k=>$v){
            $take_out_list[$k]['discount_minus_list']=$discount_minus_obj->getDiscountMinusList('','merchant_id = '.$v['business_id']);
            $take_out_list[$k]['voucher']=$vouchers_obj->getVouchersInfo('merchant_id = '.$v['business_id']);
            $take_out_list[$k]['star']=round($take_out_list[$k]['star']);
        }
        return $take_out_list;
    }

    //外卖按照距离排序的sql
    public static  function getTakeOutDistanceSql($lon,$lat,$table_name,$temp_name){
        $sql = '(SELECT *,ROUND('
            .'6378.138 * 2 * ASIN('
            .'SQRT('
            .    'POW('
            .        'SIN('
            .            '('
            .                $lat.'* PI() / 180 - latitude * PI() / 180'
            .           ') / 2'
            .        '),2'
            .    ') + COS('.$lat.' * PI() / 180) * COS(latitude * PI() / 180) * POW('
            .        'SIN('
            .            '('
            .                $lon.' * PI() / 180 - longitude * PI() / 180'
            .            ') / 2'
            .        '),'
            .       ' 2'
            .    ')'
            .')'
            .') * 1000'
            .') AS distance '
            .'from '.$table_name
            .' where  is_out = 1 and status=1 and is_open=1 and is_use = 1'
//            .'area_id="'.$area_id
            .' order by distance asc '
           /* .' limit '.$firstRow.','
            .$getRowNum*/
            .' ) as '.$temp_name;

        return $sql;
    }
    public function getTakeOutListByDistance($local_longitude,$local_latitude,$where,$firstRow,$getRowNum){
        return $this->query('SELECT * from'.BusinessModel::getTakeOutDistanceSql($local_longitude,$local_latitude,'tp_business','busi')
            .' where '.$where.' limit '.$firstRow.','.$getRowNum
        //.' order by rate desc'
        );
    }
    public function getTakeOutNum($local_longitude,$local_latitude,$where){

        return $this->query('SELECT count(*) as count from'.BusinessModel::getTakeOutDistanceSql($local_longitude,$local_latitude,'tp_business','busi')
            .' where '.$where
        );
    }

    public function getShopTypeData($local_longitude,$local_latitude,$where,$firstRow,$getRowNum,$area_id,$business_classify_id){
        return $this->query('SELECT * from'.BusinessModel::getDistanceSqlByArea($local_longitude,$local_latitude,$firstRow,$getRowNum,'tp_business','busi',$area_id,$business_classify_id)
            .' where '.$where
        .' order by rate desc limit '.$firstRow.','.$getRowNum
        );
    }

    public function getDistanceSqlByArea($lon,$lat,$firstRow,$getRowNum,$table_name,$temp_name,$area_id,$business_classify_id){
        $sql = '(SELECT *,ROUND('
            .'6378.138 * 2 * ASIN('
            .'SQRT('
            .    'POW('
            .        'SIN('
            .            '('
            .                $lat.'* PI() / 180 - latitude * PI() / 180'
            .           ') / 2'
            .        '),2'
            .    ') + COS('.$lat.' * PI() / 180) * COS(latitude * PI() / 180) * POW('
            .        'SIN('
            .            '('
            .                $lon.' * PI() / 180 - longitude * PI() / 180'
            .            ') / 2'
            .        '),'
            .       ' 2'
            .    ')'
            .')'
            .') * 1000'
            .') AS distance '
            .'from '.$table_name
            .' where status=1 and is_use = 1'
            .' and area_id='.$area_id;
        if($business_classify_id){
            $sql.=' and business_classify_id = '.$business_classify_id;
        }
           /*  $sql.=' order by distance asc '
            .' limit '.$firstRow.','
            .$getRowNum*/
        $sql.=' ) as '.$temp_name;

        return $sql;
    }

    public function getShopTypeNum($local_longitude,$local_latitude,$area_id,$business_classify_id){
        return $this->query('SELECT count(*)as total from'.BusinessModel::getDistanceNumSqlByArea($local_longitude,$local_latitude,'tp_business','busi',$area_id,$business_classify_id));
    }

    public function getDistanceNumSqlByArea($lon,$lat,$table_name,$temp_name,$area_id,$business_classify_id){
        $sql = '(SELECT *,ROUND('
            .'6378.138 * 2 * ASIN('
            .'SQRT('
            .    'POW('
            .        'SIN('
            .            '('
            .                $lat.'* PI() / 180 - latitude * PI() / 180'
            .           ') / 2'
            .        '),2'
            .    ') + COS('.$lat.' * PI() / 180) * COS(latitude * PI() / 180) * POW('
            .        'SIN('
            .            '('
            .                $lon.' * PI() / 180 - longitude * PI() / 180'
            .            ') / 2'
            .        '),'
            .       ' 2'
            .    ')'
            .')'
            .') * 1000'
            .') AS distance '
            .'from '.$table_name
            .' where status=1';
            if($business_classify_id){
                $sql.=' and business_classify_id = '.$business_classify_id;
            }
            $sql.=' and area_id='.$area_id
            .' order by distance asc '
            .' ) as '.$temp_name;

        return $sql;
    }

    public static  function getDistanceSqlByVeMarket($lon,$lat,$firstRow,$getRowNum,$table_name,$temp_name){
        $sql = '(SELECT *,ROUND('
            .'6378.138 * 2 * ASIN('
            .'SQRT('
            .    'POW('
            .        'SIN('
            .            '('
            .                $lat.'* PI() / 180 - latitude * PI() / 180'
            .           ') / 2'
            .        '),2'
            .    ') + COS('.$lat.' * PI() / 180) * COS(latitude * PI() / 180) * POW('
            .        'SIN('
            .            '('
            .                $lon.' * PI() / 180 - longitude * PI() / 180'
            .            ') / 2'
            .        '),'
            .       ' 2'
            .    ')'
            .')'
            .') * 1000'
            .') AS distance '
            .'from '.$table_name
            .' where status=1 AND is_open=1 AND business_classify_id=25 and is_use = 1'
//            .'area_id="'.$area_id
            .' order by distance asc '
            .' limit '.$firstRow.','
            .$getRowNum
            .' ) as '.$temp_name;

        return $sql;
    }
}
