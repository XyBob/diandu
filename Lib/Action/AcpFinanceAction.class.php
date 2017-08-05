<?php

/**
 * 财务管理类
 * 
 *
 */
class AcpFinanceAction extends AcpAction {
    
    /**
     * 构造函数
     * @author 姜伟
     * @return void
     * @todoget_account_log
     */
    public function AcpFinanceAction() {
         parent::_initialize();
    }
 
    /**
     * 代理商余额变动明细
     * @author 姜伟
     * @return void
     * @todo 取account表中该用户的所有数据
     */
    public function get_account_log() {
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        $user_id    = $this->_request('user_id', 0);
        
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }

        //通过时间区间筛选数据
        if($start_time && $end_time)
            $where['addtime'] = array( array('GT', strtotime($start_time)), array('LT', strtotime($end_time)), 'AND');
        if($user_id)
            $where['user_id'] = $user_id;
            #$where['change_type'] =array(array('EQ', 20),array('EQ', 19),'or');//显示店内消费收入和代理收入
        //获取订单列表
        import('ORG.Util.Pagelist');// 导入分页类
        $AccountModel = new AccountModel();
        $count        = $AccountModel->getAccountNum($where);
        $Page         = new Pagelist($count,C('PER_PAGE_NUM')); 
        $show         = $Page->show();
        $fields       = 'user_id,proof,addtime,change_type,amount_in,amount_out,amount_after_pay,remark,amount_before_pay';
		$AccountModel->setStart($Page->firstRow);
		$AccountModel->setLimit(C('PER_PAGE_NUM'));
        $changed_list = $AccountModel->getAccountList($fields, $where, 'account_id desc');
        $UserModel = new UserModel();
        foreach ($changed_list as $key => $value) 
        {
            $user_info                         = $UserModel->getParamUserInfo('user_id = ' . $value['user_id'], 'username');
            $changed_list[$key]['username']    = $user_info['username'];
            $changed_list[$key]['change_type'] = AccountModel::convertChangeType($value['change_type']);
        }
       // dump($changed_list);
        $this->assign('changed_list', $changed_list);
        $this->assign('page', $show);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
		$this->assign('head_title', '款项出入明细');
		
        $this->display();
    }


    //营业额统计
    public function all_order()
    {
        $where='';
        $province='';
        $city='';
        $area='';
        $turnover=0.00;
        //起始时间
        if(IS_POST){
            $start_time = $this->_request('start_time');
            $start_time = str_replace('+', ' ', $start_time);
            $start_time = strtotime($start_time);
            #echo $start_time;
            if ($start_time)
            {
                $where .= ' AND pay_time >= ' . $start_time;
            }

            //结束时间
            $end_time = $this->_request('end_time');
            $end_time = str_replace('+', ' ', $end_time);
            $end_time = strtotime($end_time);
            if ($end_time)
            {
                $where .= ' AND pay_time <= ' . $end_time;
            }
            if($start_time && $end_time){
                if($start_time>$end_time){
                    $this->error("起止时间不要大于终止时间");
                }
            }

            $province_id		= intval($this->_post('province_id'));
            $city_id			= intval($this->_post('city_id'));
            $area_id			= intval($this->_post('area_id'));
            if($province_id != null){
                $province = D('address_province')->where('province_id='.$province_id)->field('province_name')->find();
                $where.=' AND province_id='.$province_id;
                if($city_id != null){
                    $city = D('address_city')->where('city_id='.$city_id)->field('city_name')->find();
                    $where.= ' AND city_id='.$city_id;
                    if( $area_id != null){
                        $area = D('address_area')->where('area_id='.$area_id)->field('area_name')->find();
                        $where.=' AND area_id='.$area_id;
                    }
                }
            }
            $this->assign("where",$province['province_name'].$city['city_name'].$area['area_name']);
            //查询数量
            $where.=' AND order_status = 1';
            $where = substr($where,4);
            $turnover = D('order')->where($where)->sum('pay_amount');//营业额
            //echo D('order')->getLastSql();
        }
        else{
            $turnover = D('order')->where('order_status=1')->sum('pay_amount');//营业额
        }
        $this->assign('start_time',$start_time);
        $this->assign('end_time',$end_time);
        $this->assign("turnover",$turnover);
        //echo $turnover;
        //获取省份列表
        $province = M('address_province');
        $province_list = $province->field('province_id, province_name')->select();
        $this->assign('province_list', $province_list);
        $this->assign('head_title', '营业额统计');
        $this->display();

    }

     /**
     * 简单地列出代理商
     * @author 姜伟
     * @return void
     * @todo 从user表，取出属于代理商的数据列出来
     */
	public function edit_account()
	{
        $realname = $this->_request('realname', '');
        $username = $this->_request('username', '');

        //筛选条件
        $where['role_type']         = array('EQ', 3);
        $where['is_enable']       = 1;

        //用户姓名筛选
        if ($realname)
            $where['realname'] = array('LIKE', '%' . $realname . '%');

        //用户账号筛选
        if ($username)
            $where['nickname'] = array('LIKE', '%' . $username . '%');

        import('ORG.Util.Pagelist');
        $UserModel  = new UserModel();
        $count      = $UserModel->getUserNum($where);
        $Page       = new Pagelist($count, C('PER_PAGE_NUM'));
        $show       = $Page->show();

		$UserModel->setStart($Page->firstRow);
		$UserModel->setLimit(C('PER_PAGE_NUM'));
        $user_list  = $UserModel->getUserList('nickname, realname, left_money, user_id', $where, 'user_id desc');
        //缺少判断可操作的权限===============================================================================
        $this->assign('data', $user_list);
        $this->assign('page', $show);
        $this->assign('realname', $realname);
        $this->assign('username', $username);
		$this->assign('head_title', '调整用户余额');
		
        $this->display();
    }
    
    /**
     * 待确认的入账
     * @author 姜伟
     * @return void
     * @todo 从tp_account_apply表取出申请的列表
     */
	public function get_account_apply_list()
	{
        $username   = $this->_request('username', '');
        $order_id   = $this->_request('order_id', '');
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }

        //筛选条件
        $where['apply_state'] = 0; 
        //用户账号筛选
        if($username)
        {
            $UserModel  = new UserModel();
            $user_info  = $UserModel->getParamUserInfo('username like "%'. $username .'%"', 'user_id');
            if($user_info)
			{
                $where['user_id']= $user_info['user_id'];
			}
        }
        
        //通过时间区间筛选数据
        if($start_time && $end_time)
            $where['addtime'] = array( array('gt', str_format_time($start_time)), array('lt', str_format_time($end_time)), 'and'); 

        //通过订单ID筛选
        if($order_id)
            $where['order_id']= $order_id;
        
        //获取入账申请列表
        import('ORG.Util.Pagelist');
        $AccountApplyModel  = new AccountApplyModel();
        $count              = $AccountApplyModel->getUnhandledAccountApplyNum($where);
        $Page               = new Pagelist($count,C('PER_PAGE_NUM')); 
        $show               = $Page->show();
        $account_apply_list = $AccountApplyModel->getAccountApplyList($where, '', 'addtime desc', $Page->firstRow . ',' . $Page->listRows);
        $UserModel          = new UserModel();
        foreach ($account_apply_list as $key => $value) 
        {
            $user_info = $UserModel->getParamUserInfo('user_id = '. $value['user_id'], 'username');
            $account_apply_list[$key]['username'] = $user_info['username'];
        }
  // dump($account_apply_list); 
        //缺少判断可操作的权限===============================================================================
        
        $this->assign('data', $account_apply_list);
        $this->assign('page', $show);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('username', $username);
		$this->assign('head_title', '线下入账申请');
		
        $this->display();
    }
     
    /**
     * 导出财务数据
     * @author 姜伟
     * @return void
     * @todo 从account表导出数据，支持选定代理商或起始时间
     */
    public function export_account() {
   
        $action     = $this->_request('action');
        $agent_no   = I('agent_no', '0');
        $start_time = I('start_time');
        $end_time   = I('end_time');
        /*if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }*/

        $export_url = '';
        if($action == 'select')
        {
            $tag = false;
            //通过代理商编号获取代理商的user_id
            if($agent_no)
            {
                $where     = array();
                $user_info = M('users')->where('agent_no = "'. $agent_no . '"')->field('user_id,username')->find();
                //echo  M('users')->_sql();
               
                //通过user_id获取指定数据
                if($user_info)
                    $where['user_id'] = $user_info['user_id'];
                else
                    $tag = true;
            }
            
            //通过时间区间筛选数据
            if($start_time && $end_time)
                $where['addtime'] = array( array('GT', str_format_time($start_time)), array('LT', str_format_time($end_time)), 'AND'); 
          
            //获取总条数
            $account    = M('account');
            $count      = $account->where($where)->order('addtime')->count();
            $export_url = '/AcpFinance/export_account/action/export/agent_no/'. $agent_no . '/start_time/'. $start_time .'/end_time/'. $end_time ;
            $count      = ($tag) ? 0 : $count ;
           
        }
        else if($action == 'export')
        {
            $tag = false;
            //通过代理商编号获取代理商的user_id
            if($agent_no && $agent_no != 'start_time')
            {
                $where     = array();
                $user_info = M('users')->where('agent_no = "'. $agent_no . '"')->field('user_id,username')->find();
                if($user_info)
                    $where['user_id'] = $user_info['user_id'];
                 else
                    $tag = true;
            }
            //通过时间区间筛选数据
             $start_time = I('start_time');
            $end_time   = I('end_time');
            if($start_time && $end_time)
            {
                $where = 'addtime >='.strtotime($start_time).' and addtime <='.strtotime($end_time);
                //$where['addtime'] = array('GT',str_format_time($start_time)); 
                //$where['addtime'] = array('LT', str_format_time($end_time)); 
            }   

            //获取数据
            $account = M('account');
            $arr     = $account->where($where)->order('addtime')->select();
            #echo $account->getLastSql();die;
            #echo "<pre>";
            #print_r($arr);die;
            
            $count   = count($arr);
            $count   = ($tag) ? 0 : $count ;
        
            //引入PHPExcel类库
            vendor('Excel.PHPExcel');
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Da")
                    ->setLastModifiedBy("Da")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX,generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet(0)->setTitle('财务变动明细报表');          //标题
            $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);      //单元格宽度
            $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial'); //设置字体
            $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);      //设置字体大小
            $objPHPExcel->getActiveSheet(0)->setCellValue('A1', '用户名');
            $objPHPExcel->getActiveSheet(0)->setCellValue('B1', '操作类型');
            $objPHPExcel->getActiveSheet(0)->setCellValue('C1', '入账金额');
            $objPHPExcel->getActiveSheet(0)->setCellValue('D1', '出账金额');
            $objPHPExcel->getActiveSheet(0)->setCellValue('E1', '变动前预存款金额');
            $objPHPExcel->getActiveSheet(0)->setCellValue('F1', '变动后预存款结余');
            $objPHPExcel->getActiveSheet(0)->setCellValue('G1', '相关订单号');
            $objPHPExcel->getActiveSheet(0)->setCellValue('H1', '操作人');
            $objPHPExcel->getActiveSheet(0)->setCellValue('I1', '记录生成时间');
            $objPHPExcel->getActiveSheet(0)->setCellValue('J1', '备注');
            $objPHPExcel->getActiveSheet(0)->setCellValue('K1', '支付凭证号');
            $objPHPExcel->getActiveSheet(0)->setCellValue('L1', '操作人IP');
            
            //每行数据的内容
            foreach ($arr as  $value) {
                static $i  = 2;
                //获取用户信息
                $user_info = M('users')->where('user_id = ' . $value['user_id'])->field('username')->find();
               
                //用户名
                $objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, $user_info['username']);
                //操作类型
                $objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, change_change_type($value['change_type']));
                //入账金额
                $objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, $value['amount_in']);
                //出账金额
                $objPHPExcel->getActiveSheet(0)->setCellValue('D' . $i, $value['amount_out']);
                //变动前预存款金额
                $objPHPExcel->getActiveSheet(0)->setCellValue('E' . $i, $value['amount_before_pay']);
                //变动后预存款结余
                $objPHPExcel->getActiveSheet(0)->setCellValue('F' . $i, $value['amount_after_pay']);
                //相关订单号
				$order_sn = '--';
				if ($value['order_id'])
				{
                    try
                    {
                        $order_obj = new OrderModel($value['order_id']);
                        $order_info = $order_obj->getOrderInfo('order_sn');
                        $order_sn = "'" . $order_info['order_sn'];
                    }
                    catch (Exception $e)
                    {
                        //订单不存在，不处理
                    }
				}
                $objPHPExcel->getActiveSheet(0)->setCellValue('G' . $i, $order_sn);
                //操作人姓名
				$realname = '--';
				if ($value['operater'])
				{
					$user_obj = new UserModel($value['operater']);
					$user_info = $user_obj->getUserInfo('realname');
				}
                $objPHPExcel->getActiveSheet(0)->setCellValue('H' . $i, $realname);
                //记录生成时间
                $value['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
                $objPHPExcel->getActiveSheet(0)->setCellValue('I' . $i, $value['addtime']);
                //备注
                $objPHPExcel->getActiveSheet(0)->setCellValue('J' . $i, $value['remark']);
                //支付凭证号
                $objPHPExcel->getActiveSheet(0)->setCellValue('K' . $i, $value['proof']);
                //操作人IP
                $objPHPExcel->getActiveSheet(0)->setCellValue('L' . $i, $value['ip']);
                $i++;
            }
            
            //直接输出文件到浏览器下载
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="财务变动明细报表_' . date("YmdHis") . '.xls"');
            header('Cache-Control: max-age=0');
            ob_clean(); //关键
            flush(); //关键
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
        }
        
        if($start_time == 'end_time')
		{
            $start_time = '';
		}
        
        
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('count', $count);
        $this->assign('export_url', $export_url);
		$this->assign('head_title', '导出财务数据');
		
        $this->display();
    }

    
     /**
     * 申请入帐明细
     * @author 姜伟
     * @return void
     * @todo 从tp_account_apply表取出申请的列表
     */
    public function account_apply_list() {
        $username      = $this->_request('username', '');
        $start_time    = $this->_request('start_time', '');
        $end_time      = $this->_request('end_time', '');
        $apply_state   = $this->_request('apply_state', 4);
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }
        //筛选条件
        if($apply_state != 4)
             $where['apply_state'] = $apply_state; 
        //用户名称筛选
        if($username)
        {
            $UserModel  = new UserModel();
            $user_info  = $UserModel->getParamUserInfo('username like "%'. $username .'%"', 'user_id');
            if($user_info)
                $where['user_id']= $user_info['user_id'];
        }   
   
        //通过时间区间筛选数据
        if($start_time && $end_time)
            $where['addtime'] = array( array('gt', str_format_time($start_time)), array('lt', str_format_time($end_time)), 'and'); 

        //获取订单列表
        import('ORG.Util.Pagelist');
        $AccountApplyModel  = new AccountApplyModel();
        $count              = $AccountApplyModel->getUnhandledAccountApplyNum($where);

        $Page               = new Pagelist($count,C('PER_PAGE_NUM')); 
        $show               = $Page->show();
        $account_apply_list = $AccountApplyModel->getAccountApplyList($where, '', '', $Page->firstRow . ',' . $Page->listRows);
     //dump($account_apply_list);
        $UserModel          = new UserModel();
        foreach ($account_apply_list as $key => $value) 
        {
            $user_info                            = $UserModel->getParamUserInfo('user_id = '. $value['user_id'], 'username');
            $account_apply_list[$key]['username'] = $user_info['username'];
        }
     
 
        //缺少判断可操作的权限===============================================================================
        
        $this->assign('data', $account_apply_list);
        $this->assign('page', $show);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('username', $username);
        $this->assign('apply_state', $apply_state);
		$this->assign('head_title', '申请入账明细');
		
        $this->display();
    }
    

    /**
     * 通过,或拒绝入账申请
     * @author 姜伟
     * @return void
     * @todo 往account表插入一条记录
     * @todo 修改用户的预存金额
     * @todo 修改account表中记录的行状态
     * @todo 向款项出入明细表增加一条记录
     */
    public function confirm_enter() {
        $action           = $this->_request('action', '');
        $account_apply_id = $this->_request('id', 0);
        //缺少判断可操作的权限===============================================================================
        if(!$account_apply_id)
            $this->error('对不起,没有找到可操作的ID!');

        if($action == 'by')
        {
            //获取该条信息记录
            $AccountApplyModel  = new AccountApplyModel($account_apply_id);
            $account_apply_info = $AccountApplyModel->getAccountApplyById($account_apply_id);
           
            if(!$account_apply_info) 
                $this->error('对不起,没有你要查询的数据!');
            
            $AccountModel = new AccountModel();
            $left_money          = $AccountModel->addAccount($account_apply_info['user_id'], 3, $account_apply_info['amount'], '管理员手动通过入账申请', $account_apply_info['order_id'], $account_apply_info['proof']);
            if($left_money < 0)
                $this->error('对不起,余额不足，修改用户预存款失败!');
            
			//根据订单号取订单ID
			$order_obj = new OrderModel();
			$order_id = $order_obj->getOrderIdByOrderSn($account_apply_info['order_id']);
			//若申请信息中有订单号，自动为该笔订单付款
			$order_id = intval($order_id);
			if ($order_id)
			{
				//获取订单信息
				$order_obj = new OrderModel($order_id);
				try
				{
					$order_info = $order_obj->getOrderInfo('order_sn, pay_amount, order_status, order_type');
					//若未付款，为该笔订单付款，否则不处理
					if ($order_info['order_status'] == 0)
					{
						//为该笔订单付款

						$is_virtual_stock_order = $order_info['order_type'] == 2 ? true : false;
						$left_money = $AccountModel->addAccount($account_apply_info['user_id'], 5, floatval($order_info['pay_amount']) * -1, '支付订单号为' . $order_info['order_sn'] . '的订单', $order_id, $account_apply_info['proof'], $is_virtual_stock_order);
					}
				}
				catch (Exception $e)
				{
					//订单不存在，不处理
				}
			}

             //修改account表中记录的行状态为通过
            $apply_state_tag =  $AccountApplyModel->passAccountApply(array( 'apply_state' => 1));
            
            if($apply_state_tag)
                $this->success('恭喜您,操作已成功！该用户账户余额已调整为：' . $left_money);
            
        }
        else if($action == 'refusal')
        {
            //修改account表中记录的行状态为拒绝
            $AccountApplyModel = new AccountApplyModel($account_apply_id);
            $apply_state_tag   =  $AccountApplyModel->passAccountApply(array( 'apply_state' => 2));
            
            if($apply_state_tag)
                $this->success('恭喜您,操作已成功!');
        }
    }
    
    
    /**
     * 修改代理商的账户余额
     * @author 姜伟
     * @return void
     * @todo 如果金额为0，返回加款失败；如果减款金额大于总余额，返回失败；
     * @todo 增加user表的left_money字段，往account表插入一条记录
     */
    public function set_amount() {
        $action      = $this->_request('action', '');
        $user_id     = $this->_request('user_id', 0);
        $amount_type = $this->_request('amount_type', 0);
        $amount      = $this->_request('amount', 0.00);
        $remark      = $this->_request('remark', '');
       //缺少判断可操作的权限===============================================================================
        if(!$user_id)
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,没有找到可操作的ID!')));
        if(!$amount)
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,变动金额必须大于0!')));
        if($amount && !preg_match('/^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$/', $amount))
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,变动金额格式不正确!')));
        
        if($action == 'set')
        {
            //加款还是减款
            $change_type = 3;
            
            if($amount_type)
            {
                  $amount      = '-'.$amount;
                  $change_type = 6;
            }
                
            
            //增加user表的left_money字段，并往account表插入一条记录
            $AccountModel = new AccountModel();
            $tag          = $AccountModel->addAccount($user_id, $change_type, $amount, $remark, '', '');
                
            if(!$tag)
                exit(json_encode(array('code'=>400, 'msg'=>'对不起,操作失败,当前减款金额大于总余额!')));
            
            exit(json_encode(array('code'=>200, 'msg'=>'恭喜您,操作成功!')));
        }
    }

    
   
    
    
    /**
     * 入账比例报表
     * @author 姜伟
     * @return void
     * @todo 从order表中取出多种v，按它们已付款的订单额，显示成线状图(除电子钱包外的饼图)
     */
    public function chart_payment() {
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }
        $s_time = str_format_time($start_time);
        $e_time = str_format_time($end_time);

        if($s_time > $e_time)
             $this->error('对不起,您选择的开始时间不能大于结束时间!');
        
        //按时间统计出每种支付方式的总金额
        $OrderModel = new OrderModel();
        $OrderModel->setListFields('payway_name, pay_time');
        $order_listt     = $OrderModel->getVolumeOfTradeGroupByPayway($s_time, $e_time);

        //计算总金额的百分之1
        $order_total_volumn     = $OrderModel->getVolumeOfTrade($s_time, $e_time);
        $order_total_volumn_one = number_format(($order_total_volumn / 100), 2, '.', '');

        //输出饼状图
        import('ORG.Util.Highcharts');
        $arr = array();
        foreach($order_listt as $k=>$value)
        {
            $proportion      = number_format(($value['total_volumn'] / $order_total_volumn_one), 2, '.', '');
            $arr[$k]['name'] =   $value['payway_name'] .":". $value['total_volumn'] .'元';
            $arr[$k]['num']  =  $proportion;
        }
        $data = ch_json_encode($arr);
        $this->assign('data',$data);

        $this->assign('time', $start_time . ' 至  '  .$end_time);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('order_listt', $order_listt);
		$this->assign('head_title', '入账比例报表');
		
        $this->display();
    }

    /**
     * 充值按日统计
     */
    public function recharge_stat_by_day() 
    {
		$add_time = $this->_post('add_time');
		$start_time = 0;
		$end_time = 0;
		$date = '';

		if ($add_time)
		{
			$start_time = strtotime(date('Y-m-d', strtotime($add_time)));
			#$end_time = strtotime(date('Y-m-d', strtotime($add_time))) + 115200;
			$end_time = strtotime(date('Y-m-d', strtotime($add_time))) + 115200;
			$date = date('Y-m-d', strtotime($add_time));
		}
		else
		{
			//今天0点的时间戳
			$end_time = strtotime(date('Y-m-d', time())) + 86400;

			//昨天0点的时间戳
			#$start_time = strtotime(date('Y-m-d', time())) - 86400;
			$start_time = strtotime(date('Y-m-d', time()));
			$date  = date('Y-m-d', $start_time);
		}

		//获取充值统计数据
		$account_obj = new AccountModel();
		$recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%H") AS hour, COUNT(*) AS recharge_num, SUM(amount_in) AS total_amount')->where('change_type >= 1 AND change_type <= 2 AND addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('hour')->order('addtime DESC')->select();

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 24; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['hour'])] = $val['total_amount'];
		}

		$this->assign('recharge_amount_stat_list', $new_recharge_stat_list);

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 24; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['hour'])] = $val['recharge_num'];
		}

		$this->assign('recharge_num_stat_list', $new_recharge_stat_list);
		$this->assign('date', $date);
		#echo "<pre>";
		#print_r($recharge_stat_list);
		#echo $account_obj->getLastSql();
		#print_r($new_uv_list);

        //TITLE中的页面标题
		$this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '充值按日统计');
        $this->display();
    }

    /**
     * 充值按月统计
     */
    public function recharge_stat_by_month() 
    {
		$year = $this->_post('year');
		$month = $this->_post('month');
		$year = $year ? $year : date('Y');
		$month = $month ? $month : date('m');
		$start_time = 0;
		$end_time = 0;
		$date = '';

		if ($year && $month)
		{
			$this->assign('year', $year);
			$this->assign('month', $month);
			$start_time = mktime(0, 0, 0, $month, 1, $year);
			if ($month == 12)
			{
				$year ++;
				$month = 1;
			}
			else
			{
				$month ++;
			}

			$end_time = mktime(0, 0, 0, $month, 1, $year) - 1;
			$date = $year . '-' . date('m');
		}

		//获取充值统计数据
		$account_obj = new AccountModel();
		$recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%m") AS day, COUNT(*) AS recharge_num, SUM(amount_in) AS total_amount')->where('change_type >= 1 AND change_type <= 2 AND addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('day')->order('addtime DESC')->select();

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 30; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['day'])] = $val['total_amount'];
		}

		$this->assign('recharge_amount_stat_list', $new_recharge_stat_list);

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 30; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['day'])] = $val['recharge_num'];
		}

		$this->assign('recharge_num_stat_list', $new_recharge_stat_list);
		$this->assign('date', $date);
		$this->assign('day_num', date('d', mktime(0,0,0,$month + 1,0,$year)));

        //TITLE中的页面标题
		$this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '订单按月统计');
        $this->display();
    }

    /**
     * 充值按年统计
     */
    public function recharge_stat_by_year() 
    {
		$year = $this->_post('year');
		$start_time = 0;
		$end_time = 0;
		$date = '';

		if ($year)
		{
			$start_time = mktime(0, 0, 0, 1, 1, $year);
			$end_time = mktime(0, 0, 0, 1, 1, $year + 1) - 1;
			$date = date('Y-m-d', strtotime($year));
		}
		else
		{
			$year = date('Y');
			$start_time = mktime(0, 0, 0, 1, 1, $year);
			$end_time = mktime(0, 0, 0, 1, 1, $year + 1) - 1;
		}
		$this->assign('year', $year);

		//获取充值统计数据
		$account_obj = new AccountModel();
		$recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%m") AS month, COUNT(*) AS recharge_num, SUM(amount_in) AS total_amount')->where('change_type >= 1 AND change_type <= 2 AND addtime >= ' . $start_time . ' AND addtime <= ' . $end_time)->group('month')->order('addtime DESC')->select();

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 12; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['month'])] = $val['total_amount'];
		}

		$this->assign('recharge_amount_stat_list', $new_recharge_stat_list);

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 12; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['month'])] = $val['recharge_num'];
		}

		$this->assign('recharge_num_stat_list', $new_recharge_stat_list);
		$this->assign('date', $date);

        //TITLE中的页面标题
		$this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '订单按年统计');
        $this->display();
    }

    //银行卡列表
    function bank_card_list(){
        $bank_card_obj=new BankCardModel();

        $where=1;
        if(IS_POST){
            $data=$this->_post();
            if($data['nickname']){
                $nickname=$data['nickname'];
                $where.=' and l.nickname like "%'.$nickname.'%"';
            }
            if($data['bank_card_realname']){
                $bank_card_realname=$data['bank_card_realname'];
                $where.=' and tp_bank_card.realname like "%'.$bank_card_realname.'%"';
            }
            if($data['account']){
                $account=$data['account'];
                $where.=' and tp_bank_card.account like "%'.$account.'%"';
            }
        }

        import('ORG.Util.Pagelist');
        $count = $bank_card_obj->unionGetBankCardNum($where);

        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        $bank_card_obj->setStart($Page->firstRow);
        $bank_card_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('page', $Page);
        $this->assign('show', $show);

        $bank_card_list=$bank_card_obj->uniongetBankCardList($where);
        //var_dump($bank_card_obj->getLastSql());
       /* echo json_encode($bank_card_list);
        exit;*/
        $this->assign('account',$account);
        $this->assign('nickname',$nickname);
        $this->assign('bank_card_realname',$bank_card_realname);
        $this->assign('bank_card_list', $bank_card_list);
        $this->assign('head_title', '银行卡列表');
        $this->display();
    }

    //打款失败列表
    function remittance_fail(){
        $remittance_obj = new RemittanceModel();

        import('ORG.Util.Pagelist');
        $where = "status=0";
        $count = $remittance_obj->getRemittanceNum($where);
//        var_dump($count);

        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        //var_dump($Page);
        $remittance_obj->setStart($Page->firstRow);
        $remittance_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('page', $Page);
        $this->assign('show', $show);

        $remittance_list = $remittance_obj->getRemittanceList("",$where,"remittance_id desc");

        $bank_card_obj = new BankCardModel();
        $business_obj = new BusinessModel();

        foreach($remittance_list as $key=>$val){
            $bank_card_info = $bank_card_obj->getBankCardInfo("bank_card_id='".$val['bank_card_id']."'");
            $business_info = $business_obj->getBusinessInfo("business_id='".$val['business_id']."'");

            $remittance_list[$key]['account'] = $bank_card_info['account'];
            $remittance_list[$key]['business_name'] = $business_info['business_name'];
        }

        //var_dump($remittance_list);
        $this->assign("remittance_list",$remittance_list);
        $this->display();
    }

    //打款失败列表
    function all_remittance(){
        $remittance_obj = new RemittanceModel();

        import('ORG.Util.Pagelist');
        $where = "1";
        $count = $remittance_obj->getRemittanceNum($where);
//        var_dump($count);

        $Page = new Pagelist($count, C('PER_PAGE_NUM'));
        //var_dump($Page);
        $remittance_obj->setStart($Page->firstRow);
        $remittance_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('page', $Page);
        $this->assign('show', $show);

        $remittance_list = $remittance_obj->getRemittanceList("",$where,"remittance_id desc");

        $bank_card_obj = new BankCardModel();
        $business_obj = new BusinessModel();

        foreach($remittance_list as $key=>$val){
            $bank_card_info = $bank_card_obj->getBankCardInfo("bank_card_id='".$val['bank_card_id']."'");
            $business_info = $business_obj->getBusinessInfo("business_id='".$val['business_id']."'");

            $remittance_list[$key]['account'] = $bank_card_info['account'];
            $remittance_list[$key]['business_name'] = $business_info['business_name'];
        }

        //var_dump($remittance_list);
        $this->assign("remittance_list",$remittance_list);
        $this->display();
    }


    //单个打款
    function re_pay_to_bank(){
        if(isset($_POST['remittance_id'])){
            $remittance_id = $_POST['remittance_id'];
            $this->check_remittance($remittance_id);
        }
    }

    //全部重新打款
    function re_pay_all(){
        $this->check_remittance();
    }

    //检查打款状态，并且重新打款
    function check_remittance($remittance_id = 0){
//        var_dump($remittance_id);
//        exit();
        $remittance_obj = new RemittanceModel();
        $payway_obj = new PaywayModel();
//        $start_time = time();
//        $end_time = time() + 60;
        //echo $start_time;

        if($remittance_id){
            $remittance_list = $remittance_obj->getRemittanceList("","status=0 AND remittance_id='".$remittance_id."'");
        }else{
            $remittance_list = $remittance_obj->getRemittanceList("","status=0");
        }

        $total = count($remittance_list);
        $suc = 0;
        $fail = 0;

        $bank_obj = new BankModel();

        //var_dump($remittance_list);

        foreach($remittance_list as $key=>$val){
            //检查是否有查询码，有的话就是打款过一次，可以查询打款状态
            if($val['reqnbr']){
                $pay_result = $bank_obj->bank_pay_result_search($val['reqnbr']);
//                print_r("pay_result".$pay_result);
//                exit();
                //没有返回
                if(!$pay_result){
                    $arr = array(
                        "remark" => '请求无响应，查询不到结果，请稍候再试',
                    );
                    $where = "order_id='". $val['order_id']."'";
                    $remittance_obj->where($where)->save($arr);
                    $fail = $fail + 1;
                    continue;
                }

                if ($pay_result['INFO']['RETCOD'] != 0 || isset($pay_result['NTEBPINFZ']['RJCRSN']))
                {
                    //重新打款
                    //die();
                    $admin_remark = $payway_obj->pay_to_bank($val['bank_card_id'],$val['pay_amount'],$val['order_id']);
                    if($admin_remark){
                        $arr = array(
                            "remark" => $admin_remark,
                        );

                        $where = "order_id='". $val['order_id']."'";
                        $remittance_obj->where($where)->save($arr);
                        $fail = $fail + 1;
                    }else{
                        $arr = array(
                            "status" => 1,
                            "pay_suc_time" => time(),
                            "remark" => '手动打款成功',
                        );

                        $where = "order_id='". $val['order_id']."'";
                        $remittance_obj->where($where)->save($arr);
                        $suc = $suc + 1;
                    }
                }else if($pay_result&&isset($pay_result['NTEBPINFZ']['TRXSTS'])&&$pay_result['NTEBPINFZ']['TRXSTS']==12){
                    //不用重新打款，已成功的
                    $arr = array(
                        "status" => 1,
                        "pay_suc_time" => time(),
                        "remark" => '根据查询显示，不用重新打款，已成功的',
                    );

                    $where = "order_id='". $val['order_id']."'";
                    $remittance_obj->where($where)->save($arr);
                    $suc = $suc + 1;
                }else{
                    $arr = array(
                        "remark" => '未知错误，请稍候再试',
                    );
                    $where = "order_id='". $val['order_id']."'";
                    $remittance_obj->where($where)->save($arr);
                    $fail = $fail + 1;
                }
            }else{
                //没有查询码的话，就是超过最大自动打款限额的，不需要查询打款状态
                //检查是否是超过打款限额
//                $config_obj = new ConfigBaseModel();
//                $max_amount = $config_obj->getConfig("max_auto_pay_amount");
//
//                $order_obj = new OrderModel();
//                $where = "order_id='". $val['order_id']."'";
//                $order_info = $order_obj->getOrderByInfo('',$where);
                //var_dump($order_info);

                if($val['is_above']!=1){
                    $fail = $fail + 1;
                    $arr = array(
                        "remark" => '手动打款失败原因：未超过打款限额，也未获取到查询码，这个订单存在问题，请联系技术人员处理',
                    );
                    $where = "order_id='". $val['order_id']."'";
                    $remittance_obj->where($where)->save($arr);
                    continue;
                }

                //重新打款，这次是手动打款
                //die();
                $admin_remark = $payway_obj->pay_to_bank($val['bank_card_id'],$val['pay_amount'],$val['order_id']);
                if($admin_remark){
                    $fail = $fail + 1;
                }else{
                    $admin_remark = '手动打款成功';
                    $suc = $suc + 1;
                }

                $arr = array(
                    "remark" => $admin_remark,
                );

                $where = "order_id='". $val['order_id']."'";
                $remittance_obj->where($where)->save($arr);
            }
        }


        exit("打款总数:".$total."--成功：".$suc."--失败：".$fail);
    }

    /**
     *
     * @author xuyong
     * @param void
     * @param void
     * @return string
     * @todo 总后台提现
     */
    function platform_withdraw(){

        $user_id = session('user_id');
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo();
        if(IS_POST){
            $data=$this->_post();
            if(md5($data['password'])!=$user_info['password']){
              $this->error('密码错误!');
            }
            if($data['withdraw_money']>$user_info['left_money']){
                $this->error('钱包余额不足!');
            }
            $ms_pay_obj = new MsPayModel();
            $result = $ms_pay_obj->withdrawals('1',$data['withdraw_money']);
            if($result['code']==1){
                $this->success('提现成功');
            }else{
                $this->error($result['msg']);
            }

        }


        $left_money = $user_info['left_money'];
        $this->assign('left_money',$left_money);
        $this->assign("head_title",'总后台提现');
        $this->display();
    }
}

?>
