<?php
/**
 * 系统版本类
 */

class AcpVersionAction extends AcpAction
{
	public function AcpVersionAction()
	{
		parent::_initialize();
	}

    /**
     * @access public
     * @todo 设置系统版本
	 * @param string $app_type 商家安卓版merchant_android，镖师安卓版foot_man_android
     * 
     */
    public function set_version($app_type)
    {
		$app_type_bak = $app_type;
		$app_type .= '_version';
		$submit = $this->_post('submit');
		if($submit == 'submit')				//执行添加操作
		{
			$version	 = $this->_post('version');
			$pic	 = $this->_post('pic');
			
			if(!$version)
			{
				$this->error('对不起，请输入版本号');
			}

			//版本比较
			$new_version_num = intval(str_replace('.', '', $version));
			$old_version = $GLOBALS['config_info'][strtoupper($app_type)];
			$old_version_num = intval(str_replace('.', '', $old_version));
			if ($new_version_num <= $old_version_num)
			{
				$this->error('对不起，当前版本号为' . $old_version . '，请填写更高版本号');
			}
		
			if(!isset($_FILES['pic']))
			{
				$this->error('对不起，请上传客户端');
			}
		
			$path = UploadFile($_FILES['pic'], $app_type_bak . '_' . $version);
			$data = array(
					$app_type	=>	$version,
			);
			$ConfigBaseModel = new ConfigBaseModel();
			$ConfigBaseModel->setConfigs($data);

			$this->success('恭喜您，系统版本设置成功');
		}

		$this->assign('cur_version', $GLOBALS['config_info'][strtoupper($app_type)]);
		$this->assign('head_version','设置系统版本');
		$this->display('merchant_android_version_setting');
	}

    /**
     * @access public
     * @todo 设置商家安卓系统版本
	 * @param void
     * 
     */
    public function merchant_android_version_setting()
    {
		$this->set_version('merchant_android');
	}

    /**
     * @access public
     * @todo 设置镖师安卓系统版本
	 * @param void
     * 
     */
    public function foot_man_android_version_setting()
    {
		$this->set_version('foot_man_android');
	}
}
?>
