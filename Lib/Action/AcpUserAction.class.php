<?php
/**
 * 用户的基础类
 * 注意全站要加上用户类别，即user表的role_type=3。否则会取出管理员数据造成问题
 *
 */
class AcpUserAction extends AcpAction
{
    public function AcpUserAction()
    {
        parent::_initialize();
        $this->assign('USER_NAME', C('USER_NAME'));
    }

    private function get_search_condition()
    {
        //初始化SQL查询的where子句
        $where = '';

        //user_id
        $user_id = $this->_request('user_id');
        if (isset($user_id)&&$user_id)
        {
            $where .= ' AND user_id = ' . $user_id;
        }

        //mobile
        $mobile = $this->_request('mobile');
        if ($mobile)
        {
            $where .= ' AND mobile LIKE "%' . $mobile . '%"';
        }

        //username
        $username = $this->_request('username');
        if ($username)
        {
            $where .= ' AND username LIKE "%' . $username . '%"';
        }

        //真实姓名
        $realname = $this->_request('realname');
        if ($realname)
        {
            $where .= ' AND realname LIKE "%' . $realname . '%"';
        }

        $nickname = $this->_request('nickname');
        if ($nickname)
        {
            $where .= ' AND nickname LIKE "%' . $nickname . '%"';
        }

        //QQ
        $qq = $this->_request('qq');
        if ($qq)
        {
            $where .= ' AND qq LIKE "%' . $qq . '%"';
        }

        //邮箱
        $email = $this->_request('email');
        if ($email)
        {
            $where .= ' AND email LIKE "%' . $email . '%"';
        }

        //门店编号
        $store_sn = $this->_request('store_sn');
        if ($store_sn)
        {
            $where .= ' AND store_sn LIKE "%' . $store_sn . '%"';
        }

        //大区
        $big_area_id = $this->_request('big_area_id');
        $big_area_id = ($big_area_id == '') ? 0 : $big_area_id;
        $big_area_id = intval($big_area_id);
        if ($big_area_id)
        {
            $where .= ' AND big_area_id = ' . intval($big_area_id);
        }

        //用户等级
        $user_rank_id = $this->_request('user_rank_id');
        $user_rank_id = ($user_rank_id == '') ? 0 : $user_rank_id;
        $user_rank_id = intval($user_rank_id);
        if ($user_rank_id)
        {
            $where .= ' AND user_rank_id = ' . intval($user_rank_id);
        }

        /*注册时间begin*/
        //起始时间
        $start_time = $this->_request('start_time');
        $start_time = str_replace('+', ' ', $start_time);
        $start_time = strtotime($start_time);
        #echo $start_time;
        if ($start_time)
        {
            $where .= ' AND reg_time >= ' . $start_time;
        }

        //结束时间
        $end_time = $this->_request('end_time');
        $end_time = str_replace('+', ' ', $end_time);
        $end_time = strtotime($end_time);
        if ($end_time)
        {
            $where .= ' AND reg_time <= ' . $end_time;
        }
        /*注册时间end*/
        #echo $where;
        //重新赋值到表单
        $this->assign('user_id', $user_id);
        $this->assign('mobile', $mobile);
        $this->assign('username', $username);
        $this->assign('realname', $realname);
        $this->assign('nickname',$nickname);
        $this->assign('user_rank_id', $user_rank_id);
        $this->assign('start_time', $start_time ? $start_time : '');
        $this->assign('end_time', $end_time ? $end_time : '');

        /*重定向页面地址begin*/
        $redirect = $_SERVER['PATH_INFO'];
        $redirect .= $username ? '/username/' . $username : '';
        $redirect .= $user_rank_id ? '/user_rank_id/' . $user_rank_id : '';
        $redirect .= $start_time ? '/start_time/' . $start_time : '';
        $redirect .= $end_time ? '/end_time/' . $end_time : '';
        $redirect .= $realname ? '/realname/' . $realname : '';

        $this->assign('redirect', url_jiami($redirect));
        /*重定向页面地址end*/

        return $where;
    }
    
    /**
     * 获取用户列表，公共方法
     * @author 姜伟
     * @param string $where
     * @param string $head_title
     * @param string $opt   引入的操作模板文件
     * @todo 获取用户列表，公共方法
     */
    function user_list($where, $head_title, $opt)
    {

        $where .= $this->get_search_condition();
        $user_obj = new UserModel(); 

        //分页处理
        import('ORG.Util.Pagelist');
        $count = $user_obj->getUserNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
        $user_obj->setStart($Page->firstRow);
        $user_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('show', $show);

        $user_list = $user_obj->getUserList('', $where, ' reg_time DESC');
        $user_list = $user_obj->getListData($user_list);
        $this->assign('user_list', $user_list);
        #echo "<pre>";
        #print_r($user_list[0]);
        #echo "</pre>";
        #echo $user_obj->getLastSql();

        //用户等级列表
        $user_rank_obj = new UserRankModel();
        $rank_list = $user_rank_obj->getUserRankList(); 
        $this->assign('rank_list', $rank_list);

        //获取大区列表
        $big_area_obj = M('big_area');
        $big_area_list = $big_area_obj->field('big_area_id, area_name')->order()->select();
        $this->assign('big_area_list', $big_area_list);

        //地址链接
        $url = 'http://' . $_SERVER['HTTP_HOST'];
        $this->assign('url', $url);

        $this->assign('opt', $opt);
        $this->assign('head_title', $head_title);
        $this->display(APP_PATH . 'Tpl/AcpUser/get_user_list.html');
    }

    public function get_all_user_list()
    {
        $this->user_list('(role_type !=1)', C('USER_NAME') . '列表', 'user');
    }
    //用户统计
    public function get_all_user()
    {
        $where='';
        $province='';
        $city='';
        $area='';
        //起始时间
        if(IS_POST){
            $start_time = $this->_request('start_time');
            $start_time = str_replace('+', ' ', $start_time);
            $start_time = strtotime($start_time);
            #echo $start_time;
            if ($start_time)
            {
                $where .= ' AND reg_time >= ' . $start_time;
            }

            //结束时间
            $end_time = $this->_request('end_time');
            $end_time = str_replace('+', ' ', $end_time);
            $end_time = strtotime($end_time);
            if ($end_time)
            {
                $where .= ' AND reg_time <= ' . $end_time;
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
            $where = substr($where,4);
            $count_shop = D('business')->where($where.' AND status = 1')->count();
            $count_user = D('users')->where($where.' AND role_type=3')->count();
            //echo D('users')->getLastSql();
        }
        else{
            $count_shop = D('business')->where('status=1')->count();
            $count_user = D('users')->where('role_type=3')->count();
        }

        if($count_shop){
            $this->assign("count_shop",$count_shop);
        }
        if($count_user){
            $this->assign("count_user",$count_user);
        }
        $this->assign('start_time',$start_time);
        $this->assign('end_time',$end_time);
        //获取省份列表
        $province = M('address_province');
        $province_list = $province->field('province_id, province_name')->select();
        $this->assign('province_list', $province_list);
        $this->assign('head_title', '用户统计');
        $this->display();

    }
    //推广员列表
    public function get_extend_user_list()
    {
        $this->user_list('role_type = 3 AND is_extend_user = 1', '推广员列表', 'extend_user');
    }

    //推广员推广列表
    public function extend_user()
    {
        $user_id = I('get.user_id', 0, 'int');
        $this->user_list('role_type = 3 AND parent_id = ' . $user_id, '推广员推广列表', 'user');
    }

    //门店管理员
    //@author wzg
    public function get_dept_user_list()
    {
        $this->user_list('role_type = 6', '门店管理员');
    }

    /**
     * 添加用户
     * @author cc
     * @param void
     * @return void
     * @todo 添加用户
     */
    public function add_user()
    {
        $action = $this->_post('action');
        $redirect = $this->_get('redirect');
        $redirect = ($redirect)?url_jiemi($redirect):'/AcpUser/get_all_user_list';
                        
        if($action == 'add')            //提交动作
        {
            /* post提交 begin */
            $data = array();
            $realname = $this->_post('realname');
            //$nickname           = $this->_post('nickname');
            //$password           = $this->_post('password');
            //$realname           = $this->_post('realname');
            $mobile             = $this->_post('mobile');
            // $address            = $this->_post('address');
            //$user_type          = $this->_post('user_type');
            //$email              = $this->_post('email');
            //$qq                 = $this->_post('qq');
            $store_sn           = $this->_post('store_sn');
            //$big_area_id        = $this->_post('big_area_id');
            //$area_id            = $this->_post('area_id');
            //$city_id            = $this->_post('city_id');
            //$province_id        = $this->_post('province_id');
            /* post提交 end */
            
            /* 数据验证 begin */
            if ($realname == '') 
            {
                $this->error('对不起，用户名不能为空');
            }
            /*if(!$password)
            {
                $this->error('对不起，密码不能为空！');           //参数错误
            }
            else
            {
                if(strlen($password) < 6)
                {
                    $this->error('对不起，密码不能少于6位');
                }
               
            }*/
            /*if($nickname == '')
            {
                $this->error('对不起，加盟商名称不能为空！');           //参数错误
            }
            if($realname == '')
            {
                $this->error('对不起，联系人不能为空！');           //参数错误
            }*/
            if(!$mobile || !checkMobile($mobile))
            {
                $this->error('对不起，手机号格式不正确');
            } else {
                //判断这个号码是否已用过
                //role_type = 5
                if(D('User')->where('is_extend_user = 1 AND mobile = ' . $mobile)->find()) {
                    $this->error('对不起，此手机号已用');
                }
            }
            /*if($qq == '')
            {
                $this->error('对不起，QQ号不能为空！');           //参数错误
            }*/
            if($store_sn == '')
            {
                $this->error('对不起，门店编号不能为空！');           //参数错误
            }
            /*if(!$big_area_id)
            {
                $this->error('对不起，大区不能为空！');           //参数错误
            }
            if(!$area_id)
            {
                $this->error('对不起，地区不能为空！');           //参数错误
            }*/
            
            $user_obj = D('User');
            //检查username是否存在
            //$username_info = $user_obj->field('user_id')->where('realname = "' . $realname.'"')->find();
            // dump($username_info);echo $user_obj->getLastSql();die;
            //if ($username_info) {
             //   $this->error('对不起，用户名已存在！');
            //}
            //检查store_sn是否存在
            //$store_sn_info = $user_obj->field('user_id')->where('store_sn = "' . $store_sn .'"')->find();
            //if ($store_sn_info) {
             //   $this->error('对不起，门店编号已存在！');
           // }
            /* 数据验证 end */

            /* 写入数据库 begin */
            $data = array(
                'realname'      =>  $realname,
                //'nickname'      =>  $nickname,
                'password'      =>  MD5($mobile),
                //'realname'      =>  $realname,
                'mobile'        =>  $mobile,
                // 'address'       =>  $address,
                //'user_type'     =>  $user_type,
                //'email'         =>  $email,
                //'qq'            =>  $qq,
                'store_sn'      =>  $store_sn,
                //'big_area_id'   =>  $big_area_id,
                //'area_id'       =>  $area_id,
                //'city_id'       =>  $city_id,
                //'province_id'   =>  $province_id,
                'role_type'     => 3,
                'is_extend_user'  => 1,
            );

            //如果此号码已在用户中绑定,则直接与其合并,成为推广员
            $user_info = $user_obj->getUserInfo('', 'role_type = 3 AND is_extend_user = 0 AND mobile = ' . $mobile);
            if ($user_info) {
                unset($user_info['mobile']);
                $r = $user_obj->where('user_id = ' . $user_info['user_id'])->save($data);
            } else {

                $r = $user_obj->addUser($data);
                #$info = json_decode($r,true);
            }

            if($r) {
                $this->success(C('AGENT_NAME') . '添加成功！');
            } else {
                $this->error(C('AGENT_NAME') . '添加失败！');
            }
            /* 写入数据库 end */
        }
        else
        {
            //获取大区列表
            /*$big_area_obj = M('big_area');
            $big_area_list = $big_area_obj->field('big_area_id, area_name')->order()->select();
            $this->assign('big_area_list', $big_area_list);

            //获取省份列表
            $province = M('address_province');
            $province_list = $province->field('province_id, province_name')->select();
            $this->assign('province_list', $province_list);*/

            //门店列表
            $dept_list = M('Dept')->where('isuse = 1')->select();
            $this->assign('dept_list', $dept_list);

            $this->assign('head_title','添加' . C('AGENT_NAME'));
            $this->display();
        }
        
    }

    /**
     * 编辑用户
     * @author cc
     * @param void
     * @return void
     * @todo 编辑用户
     */
    public function edit_user()
    {
        $action = $this->_post('action');
        $redirect = $this->_get('redirect');
        $redirect = ($redirect)?url_jiemi($redirect):'/AcpUser/get_all_user_list';
             
        $user_id = $this->_get('user_id');
        $user_id = intval($user_id);

        if($action == 'edit')            //提交动作
        {
            /* post提交 begin */
            $data = array();
            //$username           = $this->_post('username');
            //$nickname           = $this->_post('nickname');
            //$password           = $this->_post('password');
            $realname           = $this->_post('realname');
            $mobile             = $this->_post('mobile');
            // $address            = $this->_post('address');
            //$user_type          = $this->_post('user_type');
            //$email              = $this->_post('email');
            //$qq                 = $this->_post('qq');
            $store_sn           = $this->_post('store_sn');
            //$big_area_id        = $this->_post('big_area_id');
            //$area_id            = $this->_post('area_id');
            //$city_id            = $this->_post('city_id');
            //$province_id        = $this->_post('province_id');
            /* post提交 end */
            
            /* 数据验证 begin */
            /*if($username == '')
            {
                $this->error('对不起，用户名不能为空！');           //参数错误
            }
            if($nickname == '')
            {
                $this->error('对不起，加盟商名称不能为空！');           //参数错误
            }*/
            if($realname == '')
            {
                $this->error('对不起，联系人不能为空！');           //参数错误
            }
            if($mobile && !checkMobile($mobile))
            {
                $this->error('对不起，手机号格式不正确');
            }
            /*if($qq == '')
            {
                $this->error('对不起，QQ号不能为空！');           //参数错误
            }*/
            if($store_sn == '')
            {
                $this->error('对不起，门店编号不能为空！');           //参数错误
            }
            /*if($big_area_id == '')
            {
                $this->error('对不起，大区不能为空！');           //参数错误
            }
            if($area_id == '')
            {
                $this->error('对不起，地区不能为空！');           //参数错误
            }*/
            
            $user_obj = new UserModel($user_id);
            //检查store_sn是否存在
            $store_sn_info = $user_obj->field('user_id')->where('user_id <> ' . $user_id . ' AND store_sn = "' . $store_sn .'"')->find();
            if ($store_sn_info) {
                $this->error('对不起，门店编号已存在！');
            }
            /* 数据验证 end */

            /* 写入数据库 begin */
            $data = array(
                'username'      =>  $username,
                'nickname'      =>  $nickname,
                'realname'      =>  $realname,
                'mobile'        =>  $mobile,
                // 'address'       =>  $address,
                'user_type'     =>  $user_type,
                'email'         =>  $email,
                'qq'            =>  $qq,
                'store_sn'      =>  $store_sn,
                'big_area_id'   =>  $big_area_id,
                'area_id'       =>  $area_id,
                'city_id'       =>  $city_id,
                'province_id'   =>  $province_id,
            );
            if ($password) {
                $data['password'] = MD5($password);
            }

            $user_obj->setUserInfo($data);
            $r = $user_obj->saveUserInfo();

            #$info = json_decode($r,true);
            if($r){
                $this->success(C('AGENT_NAME') . '修改成功！', $redirect);
            }else{
                $this->error(C('AGENT_NAME') . '修改失败！');           //错误信息
            }
            /* 写入数据库 end */
        }
        else
        {

            if (!$user_id)
            {
                $this->error('无效的用户号', $redirect);
            }

            //调用用户模型的getUserInfo获取用户信息
            $user_obj = new UserModel($user_id);
            $user_info = $user_obj->getUserInfo('username, username, nickname, realname, email, mobile, address, province_id, city_id, area_id, big_area_id, consumed_money, left_money, user_rank_id, reg_time, store_sn, user_type, qq, is_enable');
            // dump($user_info);echo $user_obj->getLastSql();die;
            if (!$user_info)
            {
                $this->error('无效的用户号', $redirect);
            }
            $this->assign('user_info', $user_info);

            //获取大区列表
            $big_area_obj = M('big_area');
            $big_area_list = $big_area_obj->field('big_area_id, area_name')->order()->select();
            $this->assign('big_area_list', $big_area_list);

            //获取省份列表
            $province = M('address_province');
            $province_list = $province->field('province_id, province_name')->select();

            //获取商圈地理信息
            $provice_info  = $province->field('province_id, province_name')->where('province_id = '. $user_info['province_id'])->select();

            $city_obj      = M('address_city');
            $city_info     = $city_obj->field('city_id, city_name')->where('city_id = '. $user_info['city_id'])->select();
            $city_list     = $city_obj->field('city_id, city_name')->where('province_id = '. $user_info['province_id'] )->select();

            $area_obj      = M('address_area');
            $area_info     = $area_obj->field('area_id, area_name')->where('area_id = '. $user_info['area_id'])->select();
            $area_list     = $area_obj->field('area_id, area_name')->where('city_id = '. $user_info['city_id'] )->select();

            $this->assign('province_list', $province_list);
            $this->assign('city_list', $city_list);
            $this->assign('area_list', $area_list);
            $this->assign('province_info', $provice_info[0]);
            $this->assign('city_info', $city_info[0]);
            $this->assign('area_info', $area_info[0]);

            $this->assign('head_title','添加' . C('AGENT_NAME'));
            $this->display();
        }
        
    }

    /**
     * 添加门店管理员
     * @author wzg
     * @todo role_type = 6
     */
    public function add_dept_user()
    {
        $cur_url = '/AcpUser/add_dept_user.html';
        $act = I('act', '', 'strip_tags');
        if ('add' == $act) {
            $linkman  	 = $this->_post('linkman');
			$username 	 = $this->_post('name');
			$password 	 = $this->_post('password');
			$re_password = $this->_post('re_password');
			$mobile 	 = $this->_post('mobile');
			$tel 		 = $this->_post('tel');
			$email		 = $this->_post('email');
			$sex		 = $this->_post('sex');
            $priv_list   = $this->_post('priv_list');

			if (!$priv_list)
			{
				$this->error('对不起，请至少选择一个门店！');
			}
			$priv_list = substr($priv_list, 0, -1);

			if(!$linkman)
			{
				$this->error('对不起，请输入联系人姓名',$cur_url);
			}
			
			if(!$username)
			{
				$this->error('对不起，请指定一个登录名',$cur_url);
			}
			else
			{
				require_once('Lib/Model/UserModel.class.php');
				$UserModel = new UserModel();
				$num = $UserModel->listUserNum("username = '" . $username . "'");
				if($num)
				{
					$this->error('对不起，该登录名已经存在，请重新指定',$cur_url);
				}
			}
			if(!$password)		//如果未指定密码，则密码默认等同于用户名
			{
				$password = $username;
			}
			else
			{
				if(strlen($password) < 6)
				{
					$this->error('对不起，密码不能少于6位',$cur_url);
				}
				if($password != $re_password)
				{
					$this->error('对不起，两次密码输入不匹配',$cur_url);
				}
			}
			
			if(!$mobile && !$tel)
			{
				$this->error('对不起，手机和固话请至少填写一个',$cur_url);
			}
			else
			{
				if($mobile && !checkMobile($mobile))
				{
					$this->error('对不起，手机号格式不正确',$cur_url);
				}
				if($tel && !checkTel($tel))
				{
					$this->error('对不起，固话号格式不正确',$cur_url);
				}
			}
			
			if(!$email || !checkEmail($email))
			{
				$this->error('对不起，请输入正确的邮箱地址',$cur_url);
			}
			
			$data = array(
					'role_type'			=>	6,			//管理员
					'username'			=>	$username,
					'realname'			=>	$linkman,
					'password'			=>	md5($password),
					'mobile'			=>	$mobile,
					'tel'				=>	$tel,
					'email'				=>	$email,
					'sex'				=>	$sex,
					'reg_time'			=>	time(),
					'is_enable'			=>	1,
                    'dept_list'         => $priv_list,
			);
			$user_id = $UserModel->addUser($data);
			// echo $UserModel->getLastSql();
			if($user_id)
			{
				$this->success('恭喜您，您成功的添加了一个管理员！',$cur_url);
			}
			else
			{
				$this->error('抱歉，添加失败！', $cur_url);
			}

        }
        $dept_obj = new DeptModel();
        $dept_list = $dept_obj->where('isuse = 1')->select();

        $this->assign('dept_list', $dept_list);
        $this->assign('head_title', '添加门店管理员');
        $this->display();    
    }

    /**
     * 修改门店管理员
     * @author wzg
     */
    public function edit_dept_user()
    {
        $user_id = I('get.user_id', 0, 'int');
        if (!$user_id) $this->error('用户不存在');

        $UserModel = new UserModel($user_id);
        $user_info = $UserModel->getUserInfo('', 'user_id = ' . $user_id);
        $user_info['dept_list'] = explode(',', $user_info['dept_list']);
        $this->assign('user_info', $user_info);

        $act = I('act', '', 'strip_tags');
        if ('add' == $act) {
            $linkman  	 = $this->_post('linkman');
			$username 	 = $this->_post('name');
			$password 	 = $this->_post('password');
			$re_password = $this->_post('re_password');
			$mobile 	 = $this->_post('mobile');
			$tel 		 = $this->_post('tel');
			$email		 = $this->_post('email');
			$sex		 = $this->_post('sex');
            $priv_list   = $this->_post('priv_list');

			if (!$priv_list)
			{
				$this->error('对不起，请至少选择一个门店！');
			}
			$priv_list = substr($priv_list, 0, -1);

			if(!$linkman)
			{
				$this->error('对不起，请输入联系人姓名');
			}
			
			if(!$username)
			{
				$this->error('对不起，请指定一个登录名');
			}
			else
			{
				require_once('Lib/Model/UserModel.class.php');
				$num = $UserModel->listUserNum("user_id != " . $user_id . "AND username = '" . $username . "'");
				if($num)
				{
					$this->error('对不起，该登录名已经存在，请重新指定');
				}
			}
			if(!$password)		//如果未指定密码，则密码默认等同于用户名
			{
				$password = $username;
			}
			else
			{
				if(strlen($password) < 6)
				{
					$this->error('对不起，密码不能少于6位');
				}
				if($password != $re_password)
				{
					$this->error('对不起，两次密码输入不匹配');
				}
			}
			
			if(!$mobile && !$tel)
			{
				$this->error('对不起，手机和固话请至少填写一个');
			}
			else
			{
				if($mobile && !checkMobile($mobile))
				{
					$this->error('对不起，手机号格式不正确');
				}
				if($tel && !checkTel($tel))
				{
					$this->error('对不起，固话号格式不正确');
				}
			}
			
			if(!$email || !checkEmail($email))
			{
				$this->error('对不起，请输入正确的邮箱地址');
			}
			
			$data = array(
					//'role_type'			=>	6,			//管理员
					'username'			=>	$username,
					'realname'			=>	$linkman,
					'password'			=>	md5($password),
					'mobile'			=>	$mobile,
					'tel'				=>	$tel,
					'email'				=>	$email,
					'sex'				=>	$sex,
					//'reg_time'			=>	time(),
					//'is_enable'			=>	1,
                    'dept_list'         => $priv_list,
			);
			$user_id = $UserModel->editUserInfo($data);
			// echo $UserModel->getLastSql();
			if($user_id)
			{
				$this->success('恭喜您，您成功的修改了一个管理员！');
			}
			else
			{
				$this->error('抱歉，修改失败！');
			}

        }
        $dept_obj = new DeptModel();
        $dept_list = $dept_obj->where('isuse = 1')->select();

        $this->assign('dept_list', $dept_list);
        $this->assign('head_title', '添加门店管理员');
        $this->display(APP_PATH . 'Tpl/AcpUser/add_dept_user.html');
    }

    /**
     * type AJAX
     * 批量删除会员(实际是控制tp_users表中的is_enable字段)
     */
    public function del_users()
    {
        $users  = $this->_post('id');

        //$submit = $this->_post('submit');
       /* if(!$users)
        {
            exit(json_encode(array('type'=>-1,'meesage'=>'请求被拒绝，请稍后再次尝试!')));
        }*/
        if($_SESSION['user_info']['role_type'] != 1)
        {
            exit(json_encode(array('type'=>-2,'meesage'=>'您没有执行该项操作的权限!')));
        }
        $user_arr = explode(',',$users);
        require_once('Lib/Model/UserModel.class.php');
        $UserModel = new UserModel();
        
        $sucess = 0;
        $false  = 0;
        foreach($user_arr as $v)
        {
                if($UserModel->del_user($v))          //执行删除（实际为更改字段值）
                {
                    $sucess++;
                }

        }
        if($false)
        {
            exit(json_encode(array('type'=>-2,'meesage'=>'您成功的删除了'.$sucess.'个用户')));
        }
        else
        {
            exit(json_encode(array('type'=>1,'meesage'=>'恭喜您！成功删除'.$sucess.'个用户！')));
        }
    }
  
    /**
     * 用户等级列表
     * @author 姜伟
     * @return void
     * @todo 
     */
    public function get_user_rank_list()
    {
            $UserRankModel = new UserRankModel();
            $total = $UserRankModel->getUserRankNum();            //总共有多少个级别
            //处理分页
            import('ORG.Util.Pagelist');                        // 导入分页类
            $per_page_num = C('PER_PAGE_NUM');              //分页 每页显示条数
            $Page = new Pagelist($total, $per_page_num);        // 实例化分页类 传入总记录数和每页显示的记录数
            $page_str = $Page->show();                      //分页输出
            $this->assign('page_str',$page_str);
            
            $UserRankModel->setStart($Page->firstRow);         //分页获取所有的级别信息
            $UserRankModel->setLimit($Page->listRows);
            $rank_list  = $UserRankModel->getUserRankList();      
            foreach($rank_list as $k=>$v)
            {
              //  $rank_list[$k]['logo']  =  C('IMG_DOMAIN').$v['logo'];
                $rank_list[$k]['upgrade_money'] = sprintf('%0.2f',$v['upgrade_money']);
            }
            
            $this->assign('rank_list',$rank_list);
            $this->assign('head_title',C('USER_NAME') . '等级列表');
            $this->display();
    }

    /**
     * @access public
     * @todo 添加一个用户级别
     * 
     */
    public function add_user_rank()
    {
        $submit = $this->_post('submit');
        $redirect = $this->_get('redirect');
        $redirect = ($redirect)?url_jiemi($redirect):'/AcpUser/get_user_rank_list';
        if($submit == 'add')            //提交动作
        {
            $data = array();
            $logo = '';
        /*    if ($res = uploadImg('user_logo')) {
                if (isset($res['error_msg'])) {
                    $this->error($res['error_msg']);
                } elseif(isset($res['pic_url'])) {
                    $logo = $res['pic_url'];
                }
            }*/
            $rankname      = $this->_post('rankname');
            $upgrade_money = $this->_post('money');
            $discount      = $this->_post('discount');
            $desc          = $this->_post('desc');
            if(!$rankname)
            {
                $this->error('对不起，等级名不能为空！', U());           //参数错误
            }
            if(!$upgrade_money && $upgrade_money != 0)
            {
                $this->error('对不起，请指定一个预设消费金额！', U());           //参数错误
            }
            if(!$discount || $discount < 1 || $discount > 100)
            {
                $this->error('对不起，折扣率必须为1-100的整数！', U());           //参数错误
            }
            $data = array(
                'rank_name'     =>  $rankname,
                'upgrade_money' =>  $upgrade_money,
                'discount'      =>  $discount,
                'logo'          =>  $logo?$logo:'',
                'desc'          =>  $desc?$desc:''
            );
            $UserRankModel = new UserRankModel();
            $r = $UserRankModel->addUserRank($data);
            $info = json_decode($r,true);
            if($info['type'] != 1)
            {
                $this->success(C('USER_NAME') . '等级添加成功！', $redirect);           //错误信息
            }
            else
            {
                $this->error(C('USER_NAME') . '等级添加失败！', $redirect);
            }
        }
        else
        {
            $this->assign('head_title','添加' . C('USER_NAME') . '等级');
            $this->display();
        }
    }
        
    /**
     * @access public
     * @todo 编辑一个用户级别
     * 
     */
    public function edit_user_rank()
    {
        $rank_id  = $this->_get('rank');
        $redirect = $this->_get('redirect');
        $submit = $this->_post('submit');
        
        $redirect = ($redirect)?url_jiemi($redirect):U('/AcpUser/get_user_rank_list');
        if(!$rank_id)
        {
            $this->error('对不起，参数错误！', $redirect);           //参数错误
        }
        $UserRankModel = new UserRankModel($rank_id);
        if($submit == 'edit')
        {
            $data = array();
            $logo = '';
            /*if ($res = uploadImg('user_logo')) {
                if (isset($res['error_msg'])) {
                    $this->error($res['error_msg']);
                } elseif(isset($res['pic_url'])) {
                    $logo = $res['pic_url'];
                }
            }*/
            $rankname      = $this->_post('rankname');
            $upgrade_money = $this->_post('money');
            $discount      = $this->_post('discount');
            $desc          = $this->_post('desc');
            $user_rank_id = $this->_post('rid');
            if(!$user_rank_id)
            {
                $this->error('对不起，参数错误！');           //参数错误
            }
            if(!$rankname)
            {
                $this->error('对不起，等级名不能为空！');           
            }
            if(!$upgrade_money && $upgrade_money != 0)
            {
                $this->error('对不起，请指定一个预设消费金额！');         
            }
            if(!$discount || $discount < 1 || $discount > 100)
            {
                $this->error('对不起，折扣率必须为1-100的整数！');    
            }
            $data = array(
                'rank_name'     =>  $rankname,
                'upgrade_money' =>  $upgrade_money,
                'discount'      =>  $discount,
                'logo'          =>  $logo?$logo:'',
                'desc'          =>  $desc?$desc:''
            );
            $r =  $UserRankModel->editUserRank($data);
            $redirect = ($redirect)?url_jiemi($redirect):U('/AcpUser/edit_user_rank/rank/' . $rank_id);
            if($r)
            {
                $this->success(C('USER_NAME') . '等级修改成功！', $redirect);
            }
            else
            {
                $this->error(C('USER_NAME') . '等级修改失败！');
            }
        }
        
        $r = $UserRankModel->getUserRankInfo('user_rank_id = ' . $rank_id);
        if(!$r)
        {
            $this->error('对不起，不存在的级别！', $redirect);           //参数错误
        }
        $r['logo'] = ($logo)?C('IMG_DOMAIN').$v['logo']:'';
        $this->assign('rank_info',$r);
        $this->assign('head_title','编辑' . C('USER_NAME') . '级别');
        $this->display();
    }
        
    /**
     * @access public
     * @todo 删除一个用户级别
     * type AJAX
     */
    public function del_rank()
    {
        $rank_id  = $this->_post('rank');
        $rank_id  = url_jiemi($rank_id);
        $redirect = $this->_get('redirect');
        
        $redirect = ($redirect)?url_jiemi($redirect):U('/AcpUser/get_user_rank_list');
        if(!$rank_id)
        {
            return json_encode(array('type'=>-10,'message'=>'对不起，参数错误！'));
        }
        
        require_once('Lib/Model/UserRankModel.class.php');
        $UserRankModel = new UserRankModel();
        $json_info = $UserRankModel->delUserRankById($rank_id);
        exit($json_info);
    }

    /**
     * 查看用户详情
     * @author 姜伟
     * @param void
     * @return void
     * @todo 从地址栏获取用户ID，调用获取用户模型的getUserInfo方法获取用户信息
     */
    public function user_detail()
    {
        //接收用户ID，验证用户ID有效性
        $redirect = $this->_get('redirect');
        $redirect = $redirect ? url_jiemi($redirect) : U('/AcpUser/get_all_user_list');
        $user_id = $this->_get('user_id');
        $user_id = intval($user_id);

        if (!$user_id)
        {
            $this->error('无效的用户号', $redirect);
        }

        //调用用户模型的getUserInfo获取用户信息
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo('');
        // echo $user_obj->getLastSql();die;
        if (!$user_info)
        {
            $this->error('无效的用户号', $redirect);
        }

        //性别
        $user_info['sex'] = ($user_info['sex'] == 0) ? '女' : ($user_info['sex'] == 1 ? '男' : '未知');

        //禁用状态
        $user_info['is_enable'] = ($user_info['is_enable'] == 1) ? '正常' : '已禁用';

        //等级
        $user_rank_obj = new UserRankModel();
        $user_rank_info = $user_rank_obj->getUserRankInfo('user_rank_id = ' . $user_info['user_rank_id'], 'rank_name');
        $user_info['rank_name'] = $user_rank_info ? $user_rank_info['rank_name'] : '';

        //地址
        $user_info['area_string'] = AreaModel::getAreaString($user_info['province_id'], $user_info['city_id'], $user_info['area_id']);

        //获取大区列表
        $big_area_obj = M('big_area');
        $user_info['big_area_name'] = $big_area_obj->where('big_area_id = ' . $user_info['big_area_id'])->getField('area_name');

        #echo "<pre>";
        #print_r($user_info);
        #echo "</pre>";

        $this->assign('user_info', $user_info);
        $this->assign('head_title', '查看用户详情');
        $this->display();
    }

    /**
     * 注册用户按日统计
     */
    public function user_reg_stat_by_day() 
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

        //获取今日注册用户按日统计数
        $user_obj = new UserModel();
        $user_stat_list = $user_obj->field('DATE_FORMAT(FROM_UNIXTIME(reg_time), "%H") AS hour, COUNT(*) AS reg_num')->where('reg_time >= ' . $start_time . ' AND reg_time <= ' . $end_time)->group('hour')->order('reg_time DESC')->select();

        $new_user_stat_list = array();
        for ($i = 0; $i <= 24; $i ++)
        {
            $new_user_stat_list[$i] = 0;
        }

        //组成数组
        foreach ($user_stat_list AS $key => $val)
        {
            $new_user_stat_list[intval($val['hour'])] = $val['reg_num'];
        }

        $this->assign('uv_list', $new_user_stat_list);
        $this->assign('user_stat_list', $new_user_stat_list);
        $this->assign('date', $date);
        #echo "<pre>";
        #print_r($new_pv_list);
        #print_r($new_uv_list);

        //TITLE中的页面标题
        $this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '注册用户按日统计');
        $this->display();
    }

    /**
     * 注册用户按月统计
     */
    public function user_reg_stat_by_month() 
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

        //获取今日注册用户按月统计数
        $user_obj = new UserModel();
        $user_stat_list = $user_obj->field('DATE_FORMAT(FROM_UNIXTIME(reg_time), "%d") AS day, COUNT(*) AS reg_num')->where('reg_time >= ' . $start_time . ' AND reg_time <= ' . $end_time)->group('day')->order('reg_time DESC')->select();

        $new_user_stat_list = array();
        for ($i = 0; $i <= 30; $i ++)
        {
            $new_user_stat_list[$i] = 0;
        }

        //组成数组
        foreach ($user_stat_list AS $key => $val)
        {
            $new_user_stat_list[intval($val['day'])] = $val['reg_num'];
        }

        $this->assign('user_stat_list', $new_user_stat_list);
        $this->assign('user_stat_list', $new_user_stat_list);
        $this->assign('date', $date);
        $this->assign('day_num', date('d', mktime(0,0,0,$month + 1,0,$year)));

        //TITLE中的页面标题
        $this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '注册用户按月统计');
        $this->display();
    }

    /**
     * 注册用户按年统计
     */
    public function user_reg_stat_by_year() 
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

        //获取今日注册用户按年统计数
        $user_obj = new UserModel();
        $user_stat_list = $user_obj->field('DATE_FORMAT(FROM_UNIXTIME(reg_time), "%m") AS month, COUNT(*) AS reg_num')->where('reg_time >= ' . $start_time . ' AND reg_time <= ' . $end_time)->group('month')->order('reg_time DESC')->select();

        $new_user_stat_list = array();
        for ($i = 0; $i <= 12; $i ++)
        {
            $new_user_stat_list[$i] = 0;
        }

        //组成数组
        foreach ($user_stat_list AS $key => $val)
        {
            $new_user_stat_list[intval($val['month'])] = $val['reg_num'];
        }

        $this->assign('user_stat_list', $new_user_stat_list);
        $this->assign('date', $date);

        //TITLE中的页面标题
        $this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '注册用户按年统计');
        $this->display();
    }

    /**
     * 用户消费统计
     */
    public function user_consume_stat() 
    {
        $field = 'user_id, COUNT(order_id) AS order_num, AVG(pay_amount) AS amount_avg, SUM(pay_amount) AS total';
        $where = 'order_status = ' . OrderModel::CONFIRMED;
        #$where = 'order_status = 0';
        $order = 'total DESC, amount_avg DESC';
        $group = 'user_id';

        $order_obj = new OrderModel();
        $total = $order_obj->where($where)->count('DISTINCT user_id');
        //处理分页
        import('ORG.Util.Pagelist');    // 导入分页类
        $per_page_num = C('PER_PAGE_NUM');  //分页 每页显示条数
        $Page = new Pagelist($total, $per_page_num);    // 实例化分页类 传入总记录数和每页显示的记录数
        $page_str = $Page->show();      //分页输出
        $this->assign('page_str',$page_str);
        
        $order_obj->setStart($Page->firstRow);  //分页获取所有的级别信息
        $order_obj->setLimit($Page->listRows);
        
        //获取用户消费统计
        $user_stat_list = $order_obj->field($field)->where($where)->group($group)->order($order)->limit()->select();

        foreach ($user_stat_list AS $k => $v)
        {
            //用户基本信息
            $user_obj = new UserModel($user_id);
            $user_info = $user_obj->getUserInfo('nickname, realname, mobile, province, city, province_id, city_id, area_id, user_rank_id, reg_time');

            //用户所在区域
            $area_string = AreaModel::getAreaString($user_info['province_id'], $user_info['city_id'], $user_info['area_id']);
             $area_string = $area_string ? $area_string : '【' . $user_info['provice'] . '】' . '【' . $user_info['city'] . '】';
            $user_info['area_string'] = $area_string;

            //用户等级名称
            $user_rank_obj = new UserRankModel();
            $user_rank_info = $user_rank_obj->getUserRankInfo('user_rank_id = ' . $user_info['user_rank_id'], 'rank_name');
            $user_info['rank_name'] = $user_rank_info ? $user_rank_info['rank_name'] : '--';
            unset($user_info['province_id']);
            unset($user_info['city_id']);
            unset($user_info['area_id']);
            unset($user_info['province']);
            unset($user_info['city']);
            $user_info['total'] = $v['total'];
            $user_info['amount_avg'] = $v['amount_avg'];
            $user_info['order_num'] = $v['order_num'];
            $user_stat_list[$k] = $user_info;
        }
        #echo "<pre>";
        #print_r($user_stat_list);

        $this->assign('user_stat_list', $user_stat_list);

        //TITLE中的页面标题
        $this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '用户消费统计');
        $this->display();
    }

    private function get_suggest_search_condition()
    {
        //初始化SQL查询的where子句
        $where = '';

        //消息内容
        $message = $this->_request('message');
        if ($message)
        {
            $where .= ' AND message LIKE "%' . $message . '%"';
        }

        //消息类型
        $message_type = $this->_request('message_type');
        if (is_numeric($message_type) && $message_type)
        {
            $where .= ' AND message_type = ' . $message_type;
        }

        //状态
        $state = $this->_request('state');
        if (is_numeric($state) && $state >= 0)
        {
            $where .= ' AND state = ' . intval($state);
        }

        /*提交时间begin*/
        //起始时间
        $start_time = $this->_request('start_time');
        $start_time = str_replace('+', ' ', $start_time);
        $start_time = strtotime($start_time);
        #echo $start_time;
        if ($start_time)
        {
            $where .= ' AND addtime >= ' . $start_time;
        }

        //结束时间
        $end_time = $this->_request('end_time');
        $end_time = str_replace('+', ' ', $end_time);
        $end_time = strtotime($end_time);
        if ($end_time)
        {
            $where .= ' AND addtime <= ' . $end_time;
        }
//        var_dump($where);
//        exit;
        /*提交时间end*/
        #echo $where;
        //重新赋值到表单
        $this->assign('message', $message);
        $this->assign('state', $state);
        $this->assign('message_type', $message_type);
        $this->assign('start_time', $start_time ? $start_time : '');
        $this->assign('end_time', $end_time ? $end_time : '');

        /*重定向页面地址begin*/
        $redirect = $_SERVER['PATH_INFO'];
        $redirect .= $message ? '/message/' . $message : '';
        $redirect .= $state ? '/state/' . $state : '';
        $redirect .= $message_type ? '/message_type/' . $message_type : '';
        $redirect .= $start_time ? '/start_time/' . $start_time : '';
        $redirect .= $end_time ? '/end_time/' . $end_time : '';

        $this->assign('redirect', url_jiami($redirect));
        /*重定向页面地址end*/

        return $where;
    }
    
    /**
     * 获取用户意见反馈列表，公共方法
     * @author 姜伟
     * @param string $where
     * @param string $head_title
     * @param string $opt   引入的操作模板文件
     * @todo 获取意见反馈用户列表，公共方法
     */
    function user_suggest_list($where, $head_title, $opt)
    {

        $where .= $this->get_suggest_search_condition();
        $user_suggest_obj = new UserSuggestModel();
        //分页处理
        import('ORG.Util.Pagelist');
        $count = $user_suggest_obj->getUserSuggestNum($where);
//        var_dump($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
        $user_suggest_obj->setStart($Page->firstRow);
        $user_suggest_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('show', $show);

        $user_suggest_list = $user_suggest_obj->getUserSuggestList('', $where, ' addtime DESC');
        $user_suggest_list = $user_suggest_obj->getListData($user_suggest_list);
        $this->assign('user_suggest_list', $user_suggest_list);
        #echo "<pre>";
        #print_r($user_suggest_list);die;
        #echo "</pre>";
        #echo $user_suggest_obj->getLastSql();

        //状态列表
        $this->assign('state_list', UserSuggestModel::getStateList());
        //类型列表
//        $this->assign('type_list', UserSuggestModel::getTypeList());

        $this->assign('opt', $opt);
        $this->assign('head_title', $head_title);
        $this->display(APP_PATH . 'Tpl/AcpUser/get_user_suggest_list.html');
    }

    public function get_user_suggest_list()
    {
        $this->user_suggest_list('1', C('USER_NAME') . '意见列表');
    }

    public function ajax_del_user()
    {
        $ids = I('id', NULL, 'strip_tags');

        if ($ids) {
            $handle_array = explode(',', $ids);
            $success_num = 0;
            foreach ($handle_array AS $id) {
                $success_num += D('User')->delRecord($id);
            }
            exit($success_num ? 'success' : 'failure');
        } else {
            exit('failure');
        }
    }

    //积分明细
    public function integral_detail(){
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        $user_id    = $this->_request('user_id', 0);
        $packet_id = $this->_request('packet_id', 0);
        $packet = $this->_request('packet');
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
        //按用户id筛选
        if($user_id)
            $where['user_id'] = $user_id;
        
        
        //获取订单列表
        import('ORG.Util.Pagelist');// 导入分页类
        $integral_obj = new IntegralModel();
        $count  = $integral_obj->getIntegralNum($where);

        $Page         = new Pagelist($count,C('PER_PAGE_NUM')); 
        $show         = $Page->show();
        $fields       = 'user_id,addtime,change_type,integral,start_integral,end_integral,remark';
        $integral_obj->setStart($Page->firstRow);
        $integral_obj->setLimit(C('PER_PAGE_NUM'));
        $changed_list = $integral_obj->getIntegralList($fields, $where, 'addtime desc');
     
        $UserModel = new UserModel();
        foreach ($changed_list as $key => $value) 
        {
            $user_info                         = $UserModel->getParamUserInfo('user_id = ' . $value['user_id'], 'username,realname');
            $changed_list[$key]['username']    = $user_info['realname'];
            $changed_list[$key]['change_type'] = $integral_obj->integralChangeType($value['change_type']);
        }
       // dump($changed_list);  
        //p($changed_list);
        $this->assign('changed_list', $changed_list);
        $this->assign('page', $show);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);

        $this->assign('head_title', '积分明细');
        $this->display();
    }  




    //设置上级代理
    public function ajax_set_user_father(){
        $user_id = I('user_id','', 'intval');
        $father_id = I('father_id','', 'intval');
        if(!$user_id || $father_id === false){
            exit('failure');
        }
        $user_obj = new UserModel($user_id);
        $user_obj->setUserInfo(array('first_agent_id'=>$father_id));
        if($user_obj->saveUserInfo()){
            exit('success');
        }
        exit('failure');
    }

    //查看我推荐的人
    public function get_my_recommenders(){

        $type=$this->_get('type');//1代表推荐的人,2代表推荐的店
        $user_id = $this->_get('user_id');
        $user_obj=new UserModel();
        if($type==1){
            $where='role_type=3 and first_agent_id = '.$user_id;
        }else if($type==2){
            $where='is_merchant=1 and role_type=3 and second_agent_id = '.$user_id;
        }

        $mobile = $this->_request('mobile');
        if ($mobile)
        {
            $where .= ' AND mobile LIKE "%' . $mobile . '%"';
        }


        $nickname = $this->_request('nickname');
        if ($nickname)
        {
            $where .= ' AND nickname LIKE "%' . $nickname . '%"';
        }

        /*注册时间begin*/
        //起始时间
        $start_time = $this->_request('start_time');
        $start_time = str_replace('+', ' ', $start_time);
        $start_time = strtotime($start_time);
        #echo $start_time;
        if ($start_time)
        {
            $where .= ' AND reg_time >= ' . $start_time;
        }

        //结束时间
        $end_time = $this->_request('end_time');
        $end_time = str_replace('+', ' ', $end_time);
        $end_time = strtotime($end_time);
        if ($end_time)
        {
            $where .= ' AND reg_time <= ' . $end_time;
        }

        $this->assign('mobile', $mobile);
        $this->assign('nickname',$nickname);
        $this->assign('start_time', $start_time ? $start_time : '');
        $this->assign('end_time', $end_time ? $end_time : '');


        //分页处理
        import('ORG.Util.Pagelist');
        $count = $user_obj->getUserNum($where);
        $Page = new Pagelist($count,C('PER_PAGE_NUM'));
        $user_obj->setStart($Page->firstRow);
        $user_obj->setLimit($Page->listRows);
        $show = $Page->show();
        $this->assign('show', $show);
        $user_list=$user_obj->getUserList('',$where);
        if($type==1){
            $this->assign('user_list',$user_list);
            $this->assign('head_title','ta推荐的人');
            $this->display('get_business_recommend');
        }else if($type==2){
            if($user_list){
                foreach($user_list as $k=>$v){
                    $ids_arr[]=$v['user_id'];
                }
                $ids=implode(',',$ids_arr);//先取成为商家的用户id
                $business_obj=new BusinessModel();
                $where='user_id in ('.$ids.')';
                if(IS_POST){
                    $key_words=$this->_post('key_words');//商家名
                    $contact_number=$this->_post('contact_number');
                    if($key_words){
                        $where.=' AND business_name LIKE "%'.$key_words.'%"';
                    }
                    if($contact_number){
                        $where.=' AND contact_number LIKE "%'.$contact_number.'%"';
                    }
                }
                $business_list=$business_obj->getBusinessList($where);//再去商家表根据user_id取数据

            }else{
                $business_list=array();
            }
            $this->assign('key_words',$key_words);
            $this->assign('contact_number',$contact_number);
            $this->assign('business_list',$business_list);
            $this->assign('head_title','ta推荐的店铺');
            $this->display('get_business_recommend_business');//商店推荐的商店
        }

    }
    //设置代理
    function set_agent(){

        $user_id=$this->_get('user_id');
        $user_obj=new UserModel();
        $user_info=$user_obj->getUserInfo('','user_id = '.$user_id);

        $province_obj = new AddressProvinceModel();//获取省信息
        $province_list = $province_obj->getProvinceList();
        $this->assign('province_list',$province_list);
        $this->assign('nickname',$user_info['nickname']);
        $this->assign('user_id',$user_id);
        $this->assign('head_title','设置代理');
        $this->display();
    }

    public function get_city()//市联动
    {
        $province_id = $this->_post('province_id');
        $city_obj = new AddressCityModel();
        $city_list = $city_obj->getCity($province_id);//市信息
        echo json_encode($city_list);
        exit;
    }
    public function get_area()//区联动
    {
        $city_id = $this->_post('city_id');
        $area = M('address_area');
        $area_list = $area->field('area_id,area_name')->where('city_id = ' . $city_id)->select();

        echo json_encode($area_list);
        exit;
    }
    //修改推荐人
    public function edit_agent(){
        $user_id=$this->_get('user_id');
        $user_obj=new UserModel();
        $this->assign('head_title','修改推荐人');
        if(IS_POST){
            $data=$this->_post();
            //echo json_encode($data);
//            exit;
           // $agent = $user_obj->where('user_id='.$data['user_id'])->find();
            //echo json_encode($agent);
            //exit;
            if($agent = $user_obj->where('user_id='.$data['user_id'])->find()){
                $first_agent['first_agent_id']=$agent['user_id'];
                $user_obj->where('user_id='.$user_id)->save($first_agent);
                $this->success('修改成功','/AcpUser/get_all_user_list');
            }
            else{
                $this->error('没有该用户');
            }
        }
        $this->display();
    }

    //修改商家推荐人
    public function edit_agent_shop(){
        $user_id=$this->_get('user_id');
        $user_obj=new UserModel();
        $this->assign('head_title','修改商家推荐人');
        if(IS_POST){
            $data=$this->_post();
//            echo json_encode($data);
//            exit;
            if($agent = $user_obj->where('user_id='.$data['user_id'])->find()){
                $first_agent['second_agent_id']=$agent['user_id'];
                $user_obj->where('user_id='.$user_id)->save($first_agent);
                $this->success('修改成功','/AcpBusiness/get_business_list');
            }
            else{
                $this->error('没有该用户');
            }
        }
        $this->display();
    }
}
?>
