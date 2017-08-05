<?php
/**
 * 银行卡模型类
 */

class BankModel extends Model
{
    // 银行id
    public $bank_id;

    /**
     * 构造函数
     * @author clk
     * @param $bank_id 银行ID
     * @return void
     * @todo 初始化银行id
     */
    public function BankModel($bank_id)
    {
        parent::__construct('bank');

        if ($bank_id = intval($bank_id)) {
            $this->bank_id = $bank_id;
        }
    }

    /**
     * 获取银行信息
     * @author clk
     * @param int $bank_id  银行id
     * @param string $fields 要获取的字段名
     * @return array 银行基本信息
     * @todo 根据where查询条件查找收藏表中的相关数据并返回
     */
    public function getBankInfo($where, $fields = '')
    {
        return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改银行信息
     * @author 姜伟
     * @param array $arr 银行信息数组
     * @return boolean 操作结果
     * @todo 修改银行信息
     */
    public function saveBank($arr)
    {
        return $this->where('bank_id = ' . $this->bank_id)->save($arr);
    }

    /**
     * 添加银行
     * @author clk
     * @param array $arr 银行信息数组
     * @return boolean 操作结果
     * @todo 添加银行
     */
    public function addBank($arr)
    {
        if (!is_array($arr)) {
            return false;
        }

        //$arr['addtime'] = time();

        $arr['isuse'] = 1;

        return $this->add($arr);
    }

    /**
     * 删除银行
     * @author clk
     * @param int $bank_id 银行ID
     * @return boolean 操作结果
     * @todo
     */
    public function delBank($bank_id)
    {
        if (!is_numeric($bank_id)) {
            return false;
        }

        $bank_info = $this->getBankInfo('bank_id = '.$bank_id);
        if (!$bank_info) {
            return false;
        }

        return $this->where('bank_id = ' .$bank_id)->save(array('isuse' => 2));
    }

    /**
     * 根据where子句获取银行数量
     * @author clk
     * @param string|array $where where子句
     * @return int 满足条件的银行数
     * @todo 根据where子句获取银行数数量
     */
    public function getBankNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询银行信息
     * @author 姜伟
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 银行基本信息
     * @todo 根据SQL查询字句查询银行信息
     */
    public function getBankList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->select();
    }

	//招商银行直接支付转账：暂时弃用（因为要收费，只有5W以上的转账才有用武之地）
	function bank_direct_pay($bank_card_id, $amount)
	{
		header("Content-Type:text/html; charset=UTF-8");

		//查询银行卡信息
		$bank_card_obj = new BankCardModel();
		$bank_card_info = $bank_card_obj->getBankCardInfo('bank_card_id = ' . $bank_card_id, 'realname, opening_bank, account, bank_id');
		#dump($bank_card_info);
		if (!$bank_card_info)
		{
			return -1;
		}

		//根据银行名称判断是否本行
		$bank_obj = new BankModel();
		$bank_name = $bank_obj->where('bank_id = ' . $bank_card_info['bank_id'])->getField('bank_name');
		$BNKFLG = $bank_name == '招商银行' ? 'Y' : 'N';
		$realname = $bank_card_info['realname'];
		$opening_bank = $bank_card_info['opening_bank'];
		$realname = $bank_card_info['realname'];
		$account = $bank_card_info['account'];

		$url = 'http://' . $GLOBALS['config_info']['BANK_PAY_IP'];
		$postfields = '<?xml version="1.0" encoding="GBK"?>
			<CMBSDKPGK>
			<INFO>
			<FUNNAM>DCPAYMNT</FUNNAM>
			<DATTYP>2</DATTYP>
			<LGNNAM>zhqbpay</LGNNAM>
			</INFO>
			<SDKPAYRQX>
			<BUSCOD>N02031</BUSCOD>
			</SDKPAYRQX>
			<DCOPDPAYX>
			<YURREF>' . ('ZHQB' . time() . randLenString()). '</YURREF>
			<DBTACC>579900750510806</DBTACC>
			<DBTBBK>57</DBTBBK>
			<TRSAMT>' . $amount . '</TRSAMT>
			<CCYNBR>10</CCYNBR>
			<STLCHN>N</STLCHN>
			<NUSAGE>' . iconv("UTF-8", "GBK//IGNORE", '提现转账') . '</NUSAGE>
			<BNKFLG>' . $BNKFLG . '</BNKFLG>
			<CRTFLG>Y</CRTFLG>
			<CRTACC>' . $account . '</CRTACC>
			<CRTNAM>' . iconv("UTF-8", "GBK//IGNORE", $realname) . '</CRTNAM>
			<CRTBNK>' . iconv("UTF-8", "GBK//IGNORE", $opening_bank) . '</CRTBNK>
			<CRTADR>' . iconv("UTF-8", "GBK//IGNORE", $opening_bank) . '</CRTADR>
			</DCOPDPAYX>
			</CMBSDKPGK>
			';
		#echo $postfields;
        $curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
        curl_close($ch);
		#var_dump($resp);
		libxml_disable_entity_loader(true);
		$result = json_decode(json_encode(simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA)), true);   

		return $result;
		if (!isset($result['RETCOD']))
		{
			//接口异常，请联系开发人员解决
			return - 2;
		}
		if ($result['RETCOD'] != 0)
		{
			//返回result['ERRMSG']
			return - 2;
		}
	}

	//招商银行网银贷记转账：主用这个接口（因为5W以下免费，5W以上无法使用该接口，需要用直接支付接口）
	function bank_main_pay($bank_card_id, $amount)
	{
		header("Content-Type:text/html; charset=UTF-8");

		//查询银行卡信息
		$bank_card_obj = new BankCardModel();
		$bank_card_info = $bank_card_obj->getBankCardInfo('bank_card_id = ' . $bank_card_id, 'realname, opening_bank, account, bank_id');
//		dump($bank_card_info);
//		exit();
		if (!$bank_card_info)
		{
			return -1;
		}

		//根据银行名称判断是否本行
		$bank_obj = new BankModel();
		$bank_info = $bank_obj->field('bank_name, cdtbrd')->where('bank_id = ' . $bank_card_info['bank_id'])->find();
		$bank_name = $bank_info['bank_name'];
		$BNKFLG = $bank_name == '招商银行' ? 'Y' : 'N';
		$realname = $bank_card_info['realname'];
		$opening_bank = $bank_card_info['opening_bank'];
		$realname = $bank_card_info['realname'];
		$account = $bank_card_info['account'];
		$cdtbrd = $bank_info['cdtbrd'];
		$url = 'http://' . $GLOBALS['config_info']['BANK_PAY_IP'];
		log_file($url,'zh');
		$postfields = '<?xml version="1.0" encoding="GBK"?>' .
			'<CMBSDKPGK>' . 
				'<INFO>' . 
					'<FUNNAM>NTIBCOPR</FUNNAM>' . //接口名
					'<DATTYP>2</DATTYP>' . //传输数据类型
					'<LGNNAM>diandupay</LGNNAM>' . //前置登录用户名，需要用经办账号开通（根据操作手册开通即可）
				'</INFO>' . 
				'<NTOPRMODX>' . 
					'<BUSMOD>00001</BUSMOD>' . //业务模式编号 
				'</NTOPRMODX>' . 
				'<NTIBCOPRX>' . 
					'<SQRNBR>' . time() . '</SQRNBR>' . //流水号（10位字符串）
					'<BBKNBR>CB</BBKNBR>' . //付款账号银行号
					'<ACCNBR>577904463810802</ACCNBR>' . //付方银行账号
					'<CNVNBR>0000002130</CNVNBR>' . //协议号
					'<YURREF>' . ('ZHQB' . time() . randLenString()). '</YURREF>' . //业务参考号
					'<CCYNBR>10</CCYNBR>' . 
					'<TRSAMT>' . $amount . '</TRSAMT>' . 
					'<CRTSQN>RCV0000002</CRTSQN>' . //收方编号
					#'<NTFCH1>396162022@qq.com</NTFCH1>' . 
					#'<NTFCH2>15158131315</NTFCH2>' . 
					'<CDTNAM>' . iconv("UTF-8", "GBK//IGNORE", $realname) . '</CDTNAM>' . 
					'<CDTEAC>' . $account . '</CDTEAC>' . //收方银行账号
					'<CDTBRD>' . $cdtbrd . '</CDTBRD>' . //收方行行号
					'<TRSTYP>C210</TRSTYP>' . //业务类型编码（大类）
					'<TRSCAT>09001</TRSCAT>' . //业务种类编码（大类下的小类）
				'</NTIBCOPRX>' . 
			'</CMBSDKPGK>';
		#echo $postfields;
		//log_file($postfields,'zh');
		//print_r($postfields);
//		exit();
        $curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
		log_file('error:'.curl_error($curl),'zh');
		log_file('result1:'.$resp,'zh');
        curl_close($curl);
		#var_dump($resp);
		libxml_disable_entity_loader(true);
		$result = json_decode(json_encode(simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA)), true);   
		log_file('result2:'.json_encode($result),'zh');
		return $result;
		if (!isset($result['RETCOD']))
		{
			//接口异常，请联系开发人员解决
			return - 2;
		}
		if ($result['RETCOD'] != 0)
		{
			//返回result['ERRMSG']
			return - 2;
		}
	}

	//网银贷记转账结果查询
	function bank_pay_result_search($reqnbr)
	{
		header("Content-Type:text/html; charset=UTF-8");
		$url = 'http://' . $GLOBALS['config_info']['BANK_PAY_IP'];
		$postfields = '
			<?xml version="1.0" encoding="GBK"?>
			<CMBSDKPGK>
			<INFO>
			<FUNNAM>NTEBPINF</FUNNAM>
			<DATTYP>2</DATTYP>
			<LGNNAM>diandupay</LGNNAM>
			</INFO>
			<NTEBPINFX>
			<REQNBR>' . (string) $reqnbr . '</REQNBR>
			<TRXNBR></TRXNBR>
			</NTEBPINFX>
			</CMBSDKPGK>
			';
		$curl = curl_init(); // 启动一个CURL会话
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields); // Post提交的数据包
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
		$resp = curl_exec($curl); // 执行操作
		curl_close($ch);
		libxml_disable_entity_loader(true);
		$result = json_decode(json_encode(simplexml_load_string($resp, 'SimpleXMLElement', LIBXML_NOCDATA)), true);   
		return $result;
	}
}
