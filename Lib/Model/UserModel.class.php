<?php
/**
 * 用户基类
 * @ access public
 * @ author zhoutao0928@sina.com 、zhoutao@360shop.cc
 * @ Date 2014-02-20
 */
class UserModel extends Model
{
	/**
	 * 用户ID，对应tp_users数据表中的user_id
     * role_type = 5 推广员， role_type = 6 门店管理员
	 */
    public $userId;
    public $agent_no;
    
    //add_type常量定义
    const TABLE_NAME  = 'users';
    const PRIMARY_KEY = 'user_id';
    
    const ROLE_ADMIN    = 1;
    const CUSTOMER = 3;
    const MERCHANT = 2;
    const ROLE_CITY_AGENT  = 5;

	/**
	 * 用户信息数组，对应tp_users数据表中的一条数据
	 * 可以通过_set和_get方法获取其中的值
	 */
    public $data = array();
  //  protected $tableName = 'users'; 
    /**
     * 构造函数
     * @author 姜伟
     * @param userId 用户ID
     * @return nothing
     * @todo 初始化用户ID字段
     */
    public function UserModel($userId = 0, $agent_no = '')
    {
		if ($userId = intval($userId))
		{
			$this->userId = $userId;
			$this->agent_no = $agent_no;
		}
		/*else
		{
			$user_info = $this->getUserInfoByUserCookie('user_id');
			$this->userId = $user_info ? $user_info['user_id'] : 0;
		}*/
        $this->db(0);
        $this->tableName = C('DB_PREFIX').'users';
    }

    /**
     * 修改用户信息
     * @author wzg
     * @todo 用user_id去修改对应的数据
     */
    public function editUserInfo($arr)
    {
        //验证user_id
        if (!$this->userId) {
            return false;
        }
        return $this->where('user_id = ' . $this->userId)->save($arr);
    }

	/**
     * 用user_cookie注册一个用户
     * @author 姜伟
     * @param void
     * @return 用户ID
     * @todo 用user_cookie注册一个用户
     */
    public function registerUserByUserCookie()
    {
		$arr = array(
			'role_type'		=> 3,
			'is_enable'		=> 1,
			'reg_time'		=> time(),
			'user_cookie'	=> $GLOBALS['user_cookie'],
			'openid'		=> session('openid'),
		);
		return $this->add($arr);
	}
    
	/**
     * 用户已验证手机
     * @author 姜伟
     * @param string $mobile
     * @param string $realname
     * @return 成功返回1，失败返回0
     * @todo 将用户设为已验证手机，并将手机号和姓名保存到数据库
     */
    public function setMobileVerified($mobile, $realname)
    {
		$arr = array(
			'is_mobile_verified'	=> 1,
			'mobile'				=> $mobile,
			'realname'				=> $realname,
		);
		return $this->where('user_id = ' . $this->userId)->save($arr);
	}

	/**
     * 根据openid查询用户信息
     * @author 姜伟
     * @param string $fields
     * @return 不存在返回false，存在返回array $user_info
     * @todo 根据openid查询用户信息
     */
    public function getUserInfoByUserOpenid($fields = '')
    {
		$openid = session('openid');
		if (!$openid)
		{
			return false;
		}
		$where = 'openid = "' . $openid . '"';
		return $this->field($fields)->where($where)->find();
	}
    
    /**
     * 获取用户信息，若当前对象的信息为空，则从数据库中取
     * @author 姜伟
     * @param string $fields 字段列表，英文逗号隔开
	 * @return 用户信息数组，$this->data
	 * @todo 返回当前对象的data信息数组
     */
    public function getUserInfo($fields, $where = '')
    {
		/*if (!empty($this->data))
		{
			return $this->data;
		}*/

		//从数据库中查找当前用户ID的用户信息
		$where = $where ? $where : $this->checkFieldValid();
		if (!$where)
		{
			return null;
		}
		$user_info = $this->field($fields)->where($where)->find();

		//检查user_info合法性
		if (!$user_info)
		{
			trigger_error(__CLASS__ . ', '.__FUNCTION__ . ', 该用户不存在');
		}

		return $user_info;
    }

      /**
     * 判断当前对象userId合法性，返回$where字句
     * @author 姜伟
     * @param void
     * @return string $where
	 * @todo 若userId存在，则用userId，若不符合，报错退出
     */
    public function checkFieldValid()
    {
		//过滤userId
		$userId = intval($this->userId);
		if ($userId)
		{
			return 'user_id = ' . $userId . ' AND is_enable = 1';
		}
		trigger_error(__CLASS__ . ', ' . __FUNCTION__ . ', 对象的userId属性不合法');
    }
    
    
    /**
     * 设置用户信息，赋给$data属性
     * @author 姜伟
     * @param array $data，用户信息数组，由控制层检验数据合法性后传入
     * @return 用户信息数组，$this->data
	 * @todo 根据传入的data数组设置当前对象的data属性。
     */
    public function setUserInfo($data)
    {
		$this->data = $data;
    }

    /**
     * 将当前用户信息data保存到数据库
     * @author 姜伟
     * @param nothing
     * @return nothing
	 * @todo 将当前对象的data属性数据保存到数据库。但不修改：账户余额、累计充值金额、消费金额字段、密码
     */
    public function saveUserInfo()
	{
		if (!empty($this->data))
		{
			//入库前过滤敏感字段
			$data = $this->filterField();
			$result = $this->where('user_id = ' . $this->userId)->save($data);
			log_file($this->getLastSql(), 'cb', true);
			log_file(show_debug_info(), 'cb', true);
			return $result;
		}
	}

    /**
     * 更改用户提现信息
     * @author majian
     * @param int $user_id 商家ID
     * @param array $arr 商家信息数组
     * @return boolean 操作结果
     * @todo 更改用户信息
     */
    public function setUserMoney($user_id, $arr)
    {
        if (!is_numeric($user_id) || !is_array($arr)) return false;
        return $this->where('user_id = ' . $user_id)->save($arr);
    }

    /**
     * 过滤敏感字段的修改
     * @author 姜伟
     * @param nothing
     * @return array $data	过滤掉敏感字段后的用户信息数组
	 * @todo 将当前对象的data数组进行字段过滤，主要过滤以下字段：账户余额、累计充值金额、消费金额字段、密码
     */
    public function filterField()
	{
	    // 去除密码过滤  'password'
		$filter_fields = array('left_money', 'consumed_money', 'pay_money');
		$data = $this->data;

		foreach ($filter_fields AS $key => $value)
		{
			unset($data[$value]);
		}

		return $data;
	}

    /**
     * 修改密码
     * @author 姜伟
     * @param $password 新密码
     * @param $user_type 默认为null,如果有值（此时该值只能为1，表示是修改商家自己的密码，此密码还需要在az表里记录明文密码）
     * @return nothing
	 * @todo 修改当前用户的密码，如果是用户，同时调用InstallModel中的set_password方法修改AZ上shops表里面存的明文密码
     */
    public function setPassword($password,$user_id = null)
    {
		if ($password)
		{
			//修改用户表中当前用户的密码
			$arr = array(
				#'plain_password' => $password,
				'password'       => md5($password)
			);
			$this->where('user_id = ' . $this->userId)->save($arr);
			
			/*if($user_id == 1)
			{
				//修改AZ上shops表中的明文密码
				require_once('Lib/Model/InstallModel.class.php');
				$install_obj = new InstallModel();
				$install_obj->set_password($password);
			}*/
		}
    }

    /**
     * @access public
     * @todo 修改用户级别
     * @param int $agent_rank_id 级别ID。 必须
     * @param bool $is_rank_manual 是否是手动提升等级(管理员手动操作时，此参数传入TRUE)。 默认FALSE
     * @param bool $write_log   是否记录系统操作日志（管理员控制时，此参数传入TRUE）。  默认为FALSE
     */
  public function setUserRank($agent_rank_id, $is_rank_manual=FALSE, $write_log=FALSE)
  {
      if(!$agent_rank_id)
      {
          return FALSE;
      }
      
      $data = array(
          'agent_rank_id'       => $agent_rank_id
      );
      $data['is_rank_manual'] = $is_rank_manual?1:0;        //是否是管理员手动提升等级的
      if($this->where('user_id = '.$this->userId)->save($data))
      {
          if($write_log)
          {
               require_once('Lib/Model/LogModel.class.php');
               $LogModel = new LogModel();
               $LogModel->save_logs($_SESSION['user_info']['user_id'], 2, '修改用户级别', C('DB_PREFIX').'users', 'agent_rank_id', $this->userId);    //$_SESSION['user_info'] 是登录用户的信息
          } 
         return TRUE;
      }
      
      return FALSE;
  }

  
  /**
   * @todo 根据用户ID获取该用户在系统中是否有重要的关联信息，用来作删除用户的依据。一旦找到关联信息，则返回FALSE
   * @access public
   * @param int $user_id 用户ID
   */
  public function getUserRelatedInfo($user_id)
  {
      if(!$user_id)
      {
          return false;
      }
      //1、判断该用户有没有提交的定单
      $order = M('order');
      $r2 = $order->where('user_id = '.$user_id)->select();
      if($r2)
      {
          return false;     //有则不能删除该用户，返回false
      }
      
      //2、判断用户是否有消费金额记录（即tp_userss表中的left_money和consumed_money字段）
      $r3 = $this->where('user_id = '.$user_id)->field('left_money,consumed_money')->find();
      if($r3['left_money'] > 0.00 || $r3['consumed_money'] > 0.00)
      {
          return false; //消费过，返回false
      }
       
      //4、判断用户是否有移动端分销的商品
      $weixin_item_page = M('weixin_item_page');
      $r4 = $weixin_item_page->where('user_id = '.$user_id)->select();
      if($r4)
      {
          return false;         //有则不能删除该用户，返回false
      }
       
      return true;
  }
  
  
  /**
   * @access public
   * @todo 设置用户的禁用状态
   * @param array $user_id 用户ID。 必须
   * @param int $is_enable 禁用状态，只有2个值：1正常可用、2删除禁用。默认为2
   */
  public function setUsersEnable($user_id, $is_enable=2)
  {
      if(!$user_id)
      {
          return false;
      }
      $data['is_enable'] = $is_enable;
      $r = $this->where('user_id = '.$user_id)->save($data);
      return $r;
  }
  
	/**
	 * 根据传入的查询条件查找订单表中的订单列表
	 * @author 姜伟
	 * @param string $fields
	 * @param string $where
	 * @param string $groupby
	 * @return array $user_list
	 * @todo 根据where子句查询订单表中的订单信息，并以数组形式返回
	 */
	public function getUserList($fields = '', $where = '', $order = '', $limit = '', $groupby = '')
	{
		return $this->field($fields)->where($where)->group($groupby)->order($order)->limit()->select();
	}
   
	/**
	 * 获取列表页用户列表
	 * @author 姜伟
	 * @param array $user_list
	 * @return array $user_list
	 * @todo 获取列表页用户列表
	 */
    public function getListData($user_list)
	{

		foreach ($user_list AS $k => $v)
		{

			//用户所在区域
			$area_string = AreaModel::getAreaString($v['province_id'], $v['city_id'], $v['area_id']);
			 $area_string = $area_string ? $area_string : '【' . $v['province'] . '】' . '【' . $v['city'] . '】';
			$user_list[$k]['area_string'] = $area_string;

			//用户等级名称
			$user_rank_obj = new UserRankModel();
			$user_rank_info = $user_rank_obj->getUserRankInfo('user_rank_id = ' . $v['user_rank_id'], 'rank_name');
			$user_list[$k]['rank_name'] = $user_rank_info ? $user_rank_info['rank_name'] : '--';

            //用户名
            $user_list[$k]['nickname'] = $v['nickname'] ? $v['nickname'] : $v['realname'];

            //上级推荐人
            $referrer = D('users')->where('user_id ='.$user_list[$k]['first_agent_id'])->field('nickname')->find();
            $user_list[$k]['referrer'] = $referrer['nickname'];

            //推荐的人数以及商家数量
            $num = D('users')->where('first_agent_id ='.$user_list[$k]['user_id'])->count();
            $num_shop = D('users')->where('is_merchant = 1 AND second_agent_id ='.$user_list[$k]['user_id'])->count();
            $user_list[$k]['num_people'] = $num;
            $user_list[$k]['num_shop'] = $num_shop;		


		}
		return $user_list;
	}

   
	/**
	 * 获取列表页用户列表
	 * @author 姜伟
	 * @param array $user_list
	 * @return array $user_list
	 * @todo 获取列表页用户列表
	 */
    public function getAgentListData($user_list)
	{
		foreach ($user_list AS $k => $v)
		{
			//用户所在区域
			$area_string = AreaModel::getAreaString($v['province_id'], $v['city_id'], $v['area_id']);
			 $area_string = $area_string ? $area_string : '【' . $v['province'] . '】' . '【' . $v['city'] . '】';
			$user_list[$k]['area_string'] = $area_string;

			//用户等级名称
			$user_rank_obj = new UserRankModel();
			$user_rank_info = $user_rank_obj->getUserRankInfo('user_rank_id = ' . $v['user_rank_id'], 'rank_name');
			$user_list[$k]['rank_name'] = $user_rank_info ? $user_rank_info['rank_name'] : '--';

            //用户名
            $user_list[$k]['nickname'] = $v['nickname'] ? $v['nickname'] : $v['realname'];

			//上级昵称
      if($v['first_agent_id']){
        $user_obj2 = new UserModel();
        $user_info = $user_obj2->getUserInfo('nickname', 'user_id = ' . $v['first_agent_id']);
        $user_list[$k]['parent_nickname'] = $user_info['nickname'];
      }
			

			//一级代理数量
			$user_list[$k]['first_agent_num'] = $this->getUserNum('first_agent_id = ' . $v['user_id']);

			//二级代理数量
			$user_list[$k]['second_agent_num'] = $this->getUserNum('second_agent_id = ' . $v['user_id']);

			//三级代理数量
			$user_list[$k]['third_agent_num'] = $this->getUserNum('third_agent_id = ' . $v['user_id']);
		}

		return $user_list;
	}

  /**
   * @access public
   * @todo 获取特定用户群（根据用户ID串）的特定字段信息
   * @param string $users 由用户ID组成的字符串。 必须   比如：'2,32,115,38'
   * @param string $fields 要获取的特定字段信息。 默认为空表示获取所有的  例如：'email,mobile,username'
   * @return 返回查询结果
   */
  public function getUserFieldsByUsers($users, $fileds='')
  {
      if(!$users || $users == '')
      {
          return FALSE;
      }
      $r = $this->where('user_id IN('.$users.')')->field($fileds)->select();
      return $r?$r:FALSE;
  }
  
  /**
   * @access public
   * @todo 设置用户申请的审核状态
   * @param int $user_id 待处理的用户ID
   * @param int $type 处理的结果。默认为0，表示不通过
   * @return bool 操作成功返回TRUE;否则返回FALSE;
   */
  public function setAuditPassed($user_id,$type=0)
  {
      if(!$user_id)
      {
          return FALSE;
      }
      $type = $type?1:0;
      $data = array('is_audit_passed'=>$type);
      if($type == 1)		//审核通过时，为用户指派一个编号
      {
      	$data['agent_no'] = 'D_'.$user_id.rand(10,99);
      }
      if($this->where('user_id = '.$user_id)->save($data))
      {
          return TRUE;
      }
      return FALSE;
  }
  
  /**
   * @access public
   * @todo 组装待提升等级的基本查询条件
   */
  public function connectWhere($where='')
  {
  	require_once('Lib/Model/ConfigBaseModel.class.php');
      $ConfigBaseModel = new ConfigBaseModel();
      $agent_pre_upgrade_rate = $ConfigBaseModel->getConfig('agent_pre_upgrade_rate');
      $percent = (100-$agent_pre_upgrade_rate)/100;       //浮动的范围，比如：(100-10)/100 = 90% = 0.9
      
      require_once('Lib/Model/AgentRankModel.class.php');
      $AgentRankModel = new AgentRankModel();
      $rank_list  = $AgentRankModel->listAgentRank();      //获取所有的级别信息
      $rank_count = count($rank_list);
      $connect  = '';
      if($rank_list)
      {
        if($where != '')
        {
            $connect .= ' AND( ';
        }
        foreach($rank_list as $k=>$v)
        {
            $float_upgrade_money = sprintf('%0.2f',$v['upgrade_money']*$percent);   //算出每一个级别升级的浮动额度标准
            $upgrade_money = sprintf('%0.2f',$v['upgrade_money']);
            $connect .= '(consumed_money between '.$float_upgrade_money.' and '.$upgrade_money.')';
            if($k+1 < $rank_count)
            {
                  $connect .= ' or ';
            }
        }
        if($where != '')
        {
        	$connect .= ')';
        }
      }
      
      return $where.$connect;
  }
  
  /**
   * @access public
   * @todo 获取待提升等级的用户数量
   * @param string $where 额外的查询条件。 默认为空
   * @return int 查询的数量
   */
  public function rankWatingUserNum($where='')
  {
      $count = $this->where($where)->count();#echo ($this->getLastSql()).'<hr/>';
      return $count;
  }
  
  
  /**
   * @access public
   * @todo 获取所有的用户的总数
   * @param $where 查询条件
   */
  public function getUserNum($where='')
  {
      $count = $this->where($where)->count();
      return $count;
  }
  
  /**
   * 检测用户名是否已注册
   * @author 姜伟
   * @param $username
   * @return boolean 已注册返回true，否则返回false
   * @todo 检测用户名是否已注册
   */
  public function checkUsernameRegistered($username)
  {
	  $user_info = $this->field('user_id')->where('username = "' . $username . '"')->find();
	  return $user_info ? true : false;
  }

  /**
   * @access public 
   * @todo 注册一个用户 
   * @param array $data 组装好的数据
   */
  public function addUser($data)
  {
  		if(!$data || empty($data))
  		{
  			return false;
  		}

		$arr = array(
			'role_type'		=> 3,
			'is_enable'		=> 1,
			'pay_password'		=> md5('123456'),
			'reg_time'		=> time(),
		);
		$data = array_merge($arr, $data);

  		$user_id = $this->add($data);
  		return $user_id;
  }
  
  
 /**
  * @access protected
  * @todo 获取指定用户，指定字段的内容
  * @param int $user_id 用户ID。 必须
  * @param string $fields 所要字段组成的字符串，由','分割。 默认为空，获取所有信息
  */
  protected  function getUserFieldsById($user_id, $fields='')
  {
     if(!$user_id)
     {
         return FALSE;
     }
     $r =$this->where('user_id = '.$user_id)->field($fields)->find();
     return $r;
 }
 
 
  /**
   * @access public
   * @todo 根据条件获取用户信息
   * @param type $where $field 
   * 
   */
  public function getParamUserInfo($where='', $field='')
  {
      $r = $this->where($where)->field($field)->find();
      return $r;
  }
 
  /**
   * @access public
   * @todo 根据级别ID获取该级别的会员
   * @param int $agent_rank_id 级别ID。必须
   * return  查询结果或者FALSE
   */
  public function getUsersByRankId($agent_rank_id)
  {
  	if(!$agent_rank_id)
  	{
  		return FALSE;
  	}
  	$r = $this->where('agent_rank_id = '.$agent_rank_id)->select();
  	return $r?$r:FALSE;
  }

	/**
	 * 查看当前用户表中是否有关联某角色的管理员
	 * @author 姜伟
	 * @param int $group_id
	 * @return boolean 有返回true，无返回false
	 * @todo 查看当前用户表中是否有关联某角色的管理员
	 */
	public function checkRelatedUserExists($group_id)
	{
		$user_info = $this->field('user_id')->where('group_id = ' . intval($group_id))->find();
		return $user_info ? true : false;
	}

	/**
	 * 判断密码安全强度
	 * @author 姜伟
	 * @param void
	 * @return 弱1，中2，强3
	 * @todo 根据密码的长度，是否包含大小写、字母、数字、符号判断密码强度
	 */
	public function getPasswordSafeLevel()
	{
		$user_info = $this->getUserInfo('plain_password');
		if (!$user_info)
		{
			return 0;
		}

		$plain_password = $user_info['plain_password'];

		$score = 0;
		if(preg_match("/[0-9]+/",$plain_password))
		{
			$score ++; 
		}
		if(preg_match("/[0-9]{3,}/",$plain_password))
		{
			$score ++; 
		}
		if(preg_match("/[a-z]+/",$plain_password))
		{
			$score ++; 
		}
		if(preg_match("/[a-z]{3,}/",$plain_password))
		{
			$score ++; 
		}
		if(preg_match("/[A-Z]+/",$plain_password))
		{
			$score ++; 
		}
		if(preg_match("/[A-Z]{3,}/",$plain_password))
		{
			$score ++; 
		}
		if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/",$plain_password))
		{
			$score += 2; 
		}
		if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/",$plain_password))
		{
			$score ++ ; 
		}
		if(strlen($plain_password) >= 10)
		{
			$score ++; 
		}

		//判断强弱
		if ($score >= 0 && $score <= 4)
		{
			return 1;
		}
		elseif ($score >= 5 && $score <= 8)
		{
			return 2;
		}
		elseif ($score >= 9)
		{
			return 3;
		}

		return 0;
	}

	/**
     * 获取预存款余额
     * @author 姜伟
     * @param void
     * @return float $left_money
	 * @todo 获取预存款余额，left_money字段的值，并返回
     */
	public function getLeftMoney()
	{
		//获取用户表中当前用户的预存款余额
		$where = $this->checkFieldValid();
		$user_info = $this->getUserInfo('left_money');
		return $user_info['left_money'];
	}

	/**
     * 修改预存款余额
     * @author 姜伟
     * @param float $left_money
     * @return void
	 * @todo 修改当前用户的预存款余额，修改数据表中的left_money字段值
     */
	public function setLeftMoney($left_money)
	{
		$left_money = floatval($left_money);

		if (is_float($left_money))
		{
			//修改用户表中当前用户的预存款余额
			$where = $this->checkFieldValid();
			return $this->where($where)->save(array('left_money' => $left_money));
		}

		return false;
	}
 
  /**
   * @access public
   * @todo 获取所有的用户的总数
   * @param $where 查询条件
   */
  public function listUserNum($where='')
  {
      $count = 0;
      $count = $this->where($where)->count();
      return $count;
  }
 
  /**
   * @access public
   * @todo 切换种植机
   * @param $planter_id
   * @return boolean
   * @todo 先验证权限，再切换
   */
  public function changeCurrentPlanter($planter_id)
  {
		$planter_obj = new PlanterModel($planter_id);
		$planter_info = $planter_obj->getPlanterInfo('planter_id = ' . $planter_id, 'planter_id');
		if (!$planter_info || !$planter_obj->checkPriv())
		{
			//种植机不存在或权限不足
			return false;
		}

		$arr = array(
			'current_planter_id'	=> $planter_id
		);
		$success = $this->where('user_id = ' . $this->userId)->save($arr);
		if ($success)
		{
			session('planter_id', $planter_id);
		}

		return $success;
	}

	/**
	 * @access public
	 * @todo 在APP中已注册的账户，在微信登录，绑定手机号
	 * @param int $user_id 当前微信微信id
	 * @param  int $registered_user_id 已注册的user_id
	 * @return boolean
	 * @todo 在APP中已注册的账户，在微信登录，绑定手机号
	 */
	public function bindWeixinMobile($user_id, $registered_user_id)
	{
		//微信信息
		$user_obj = new UserModel($user_id);
		$old_user_info = $user_obj->getUserInfo('openid, refresh_token, access_token, token_expires_time, nickname, sex, city, province, headimgurl, user_cookie');
		$user_obj = new UserModel($registered_user_id);
		$user_obj->setUserInfo($old_user_info);
		$state = $user_obj->saveUserInfo();
		log_file($user_obj->getLastSql(), 'bindWeixinMobile', true);
        $this->where('user_id=%d', $user_id)->delete();

		return $state;
	}

  /**
   * 根据用户姓名查询用户ID列表
   * @author 姜伟
   * @param string $realname 用户姓名
   * @return string 用户ID列表，英文逗号隔开
   * @todo 根据用户姓名查询用户ID列表
   */
  public function getUserIdByRealname($realname)
  {
    if ($realname)
    {
      $user_info = $this->field('GROUP_CONCAT(user_id) AS user_ids')->where('realname LIKE "%' . $realname . '%"')->group('"1"')->find();
      return $user_info['user_ids'];
    }
    return null;
  }

  /**
   * 根据用户nickname查询用户ID列表
   * @author cc
   * @param string $nickname 用户nickname
   * @return string 用户ID列表，英文逗号隔开
   * @todo 根据用户nickname查询用户ID列表
   */
  public function getUserIdByNickname($nickname)
  {
    if ($nickname)
    {
      $user_info = $this->field('GROUP_CONCAT(user_id) AS user_ids')->where('nickname LIKE "%' . $nickname . '%"')->group('"1"')->find();
      return $user_info['user_ids'];
    }
    return null;
  }

  /**
   * 根据用户手机号查询用户ID列表
   * @author cc
   * @param string $手机号 用户手机号
   * @return string 用户ID列表，英文逗号隔开
   * @todo 根据用户手机号查询用户ID列表
   */
  public function getUserIdByMobile($mobile)
  {
    if ($mobile)
    {
      $user_info = $this->field('GROUP_CONCAT(user_id) AS user_ids')->where('mobile LIKE "%' . $mobile . '%"')->group('"1"')->find();
      return $user_info['user_ids'];
    }
    return null;
  }

  // 更新会员卡号信息
  // @author wsq
  public function getMemberCardID($user_id=false)
  {
      if ($user_id) {
          $info = $this->where('user_id=%d', $user_id)->field('member_card_id, mobile')->find();

          if ($info['member_card_id']) {
              return $info['member_card_id'];
          } else if ($info['mobile']) {
              $user_info = $this->getUserInfo('member_card_id, mobile');
              $card_info = D('MemberCard')->getERPMemberInfoByMemberCardIDOrMobile($user_info['member_card_id']);

              if ($card_info) {
                $this->where('user_id=%d', $user_id)->setField('member_card_id', $card_info['Data'][0]['MobilePhone']);
                return $card_info['Data'][0]['MobilePhone'];
              }
          } 
      } 

      return NULL;
  }

  // 更新用户信息
  // @author wsq
  public function syncUserInfoFromCSV($start, $length)
  {
      /*
  [0] => string(9) "冯泽鑫"
  [1] => string(9) "冯泽鑫"
  [2] => string(11) "15905796814"
  [3] => string(1) "0"
  [4] => string(12) "普通会员"
  [5] => string(14) "2015-8-5 14:09"
  [6] => string(9) "2016-1-17"
  [7] => string(6) "孕妈"
  [8] => string(9) "700055661"
       */
      $start = $start? $start:0;
      $length =  $length? $length:100;
      $user_list = D('TmpData')->limit($start.','.$length)->select();
      dump(D('TmpData')->getLastSql());
      //$user_list = D('TmpData')->limit()->select();
      foreach ($user_list AS $k => $v) {
          $nickname = $v['nickname'];
          $realname = $v['realname'];
          $mobile = $v['mobile'];
          $integral = $v['integral'];
          $reg_time = $v['reg_time'];
          $reg_time = strtotime($reg_time);
          $birthday = $v['birthday'];
          $birthday = strtotime($birthday);
          $sex = $v['sex'];
          //0保密、1 男、2 女
          if ($sex == "男") {
              $sex = 1;
          } else if ($sex == "女") {
              $sex = 2;
          } else if ($sex == "孕妈") {
              $sex = 3;
          } else {
              $sex = 0;
          }
          $member_card_id = $v['member_card_id'];
          $user_id = $this->where('mobile=%d', $mobile)->getField('user_id');
          if (!$user_id) {
              //$member_card_id = 
              $user_id = $this->add(
                  array(
                      'mobile' => $mobile,
                      'username' => $mobile,
                      'nickname' => $nickname,
                      'realname' => $realname,
                      'birthday' => $birthday,
                      'reg_time' => $reg_time,
                      'sex' => $sex,
                  )
              );
          }
          $count = D('MemberCard')->where('user_id=%d AND card_code = %s', $user_id, $member_card_id)->find();
          if (!$count) {
              D('MemberCard')->bindMemberCard($user_id, $member_card_id);
          }
      }
      dump("success");
      return NULL;
  }

    /**
     * 删除
     * @author wsq
     * @param int $id 
     * @return boolean 操作结果
     * @todo is_del设为1
     */
    public function delRecord($id, $delete=true)
    {
        if (!is_numeric($id)) return false;
        if ($delete) {
            return $this->where(self::PRIMARY_KEY . ' = %d', $id)->delete();  //真删除
        } else {
            return $this->where(self::PRIMARY_KEY . ' = %d', $id)->save(array('is_enable' => 2)); //假删除
        }
    }

	function setParent($user_id, $first_agent_id)
	{
		$user_obj  = D('User');
		$parent_info = $user_obj->where('user_id = ' . $first_agent_id)
			->field('first_agent_id, second_agent_id, user_id')
			->find();
		//上级用户ID
		$first_agent_id = $parent_info['user_id'];

		$status = $user_obj->where('user_id =' . $user_id)->save(array(
			'first_agent_id'	=> $parent_info['user_id'] ? $parent_info['user_id'] : 0,
			#'second_agent_id'	=> $parent_info['first_agent_id'] ? $parent_info['first_agent_id'] : 0,
			#'third_agent_id'	=> $parent_info['second_agent_id'] ? $parent_info['second_agent_id'] : 0,
		));

		//修改当前用户的下级的上级关系
		/*$arr = array(
			'second_agent_id'	=> $first_agent_id,
			'third_agent_id'	=> $parent_info['first_agent_id'],
		);
		$user_obj->where('first_agent_id = ' . $user_id)->save($arr);

		//修改当前用户的下下级的上级关系
		$arr = array(
			'third_agent_id'	=> $first_agent_id,
		);
		$user_obj->where('second_agent_id = ' . $user_id)->save($arr);*/

		return $status;
	}

  /**
   * 获取某一字段的值
   * @param  [type] $field 字段名
   * @param  string $where 查询条件
   * @return [type]        一维数组
   */
  public function getUserField($field){
    return $this->getField($field, true);
  }
    public function del_user($user_id){
        return $this->where('user_id = '.$user_id)->delete();
    }
}
