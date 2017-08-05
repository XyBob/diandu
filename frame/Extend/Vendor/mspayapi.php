<?php
class MSPayapi
{
    //接口域名
    protected $apiurl='http://api.dev.vyicoo.com/v2';
    //支付路径
    protected $payurl = '/pay/gateway';
    //查询路径
    protected $queryurl='/pay/order/query';
    //提现路径
    protected $transferurl='/pay/transfer';
    //进件路径
    protected $createurl='/mch/create';
    //商户号查询
    protected $mchqueryurl='/mch/query';
    //修改进件信息
    protected $mchupdateurl='/mch/update';
    //查询商户余额
    protected $balanceurl='/pay/balance';

    public function __construct(){
        //回调地址
        $this->NOTIFY_URL = 'http://' . $_SERVER['HTTP_HOST'] . '/Front/wxpay_response';
    }


    //支付宝服务窗支付
    public function payzfbfwc($data,$appSecret){
        $data['sign'] = $this->makesign($data, $appSecret);
      //  print_r($data);echo '<hr>';
        log_file('data:'.json_encode($data),"ali");
        $ret=$this->curlpost($this->apiurl.$this->payurl,$data);
       // log_file($ret,'ali');
        return $ret;
    }
    //微信公共号支付
    public function paywxggh($data,$appSecret){
        //回调地址
        //$data['notify_url'] = $this->NOTIFY_URL;
        $data['sign'] = $this->makesign($data, $appSecret);
        log_file("Pay_code_data:".json_encode($data),'ms_wxpay_response');
        //print_r($data);echo '<hr>';
        $ret=$this->curlpost($this->apiurl.$this->payurl,$data);
        return $ret;
    }
    //刷卡接口=》提交授权码支付
    public function paycard($data,$appSecret)
    {
        $topauth_code = substr($data['auth_code'], 0, 2);
        if ($topauth_code == 28) {
            $data['channel'] = 'pay.alipay.native';
        } else {
            $data['channel'] = 'pay.weixin.micropay';
        }
        $data['sign'] = $this->makesign($data, $appSecret);
        print_r($data);echo '<hr>';
        $ret=$this->curlpost($this->apiurl.$this->payurl,$data);
        return $ret;
    }

    //查询
    public function queryorder($data,$appSecret){
//        echo $this->apiurl.$this->queryurl;
        $data['sign'] = $this->makesign($data, $appSecret);
        var_dump($data);echo '<hr>';
        $ret=$this->curlpost($this->apiurl.$this->queryurl,$data);
        return $ret;
    }

    //查询进件信息
    public function querymch($data,$appSecret){
//        echo $this->apiurl.$this->queryurl;
        $data['sign'] = $this->makesign($data, $appSecret);
      //  print_r($data);echo '<hr>';
        $ret=$this->curlpost($this->apiurl.$this->mchqueryurl,$data);
        return $ret;
    }

    //修改进件信息
    public function updatemch($data,$appSecret){
        //echo $this->apiurl.$this->mchupdateurl;
        $data['sign'] = $this->makesign($data, $appSecret);
        //print_r($data);echo '<hr>';
        $ret=$this->curlpost($this->apiurl.$this->mchupdateurl,$data);
        return $ret;
    }
    //扫码接口=》返回支付二维码码
    public function paycode($data,$appSecret)
    {
        $data['sign'] = $this->makesign($data, $appSecret);
        print_r($data);echo '<hr>';
        $ret=$this->curlpost($this->apiurl.$this->payurl,$data);
        return $ret;
    }

    //提现接口
    public function transfer($data, $appSecret){
        $data['sign'] = $this->makesign($data, $appSecret);
       // echo json_encode($data);exit;
        $ret=$this->curlpost('https://pay.vyicoo.com/v2'.$this->transferurl,$data);
        log_file('结果:'.$ret,'dakuan');
        return $ret;
    }

    //进件接口
    public function create($data, $appSecret){
        $data['sign'] = $this->makesign($data, $appSecret);
       // var_dump($data);echo '<hr>';
        $ret=$this->curlpost($this->apiurl.$this->createurl,$data);
        return $ret;
    }
    //查询余额
    public function balance($data, $appSecret){
        $data['sign'] = $this->makesign($data, $appSecret);
       //  var_dump($data);exit;
        $ret=$this->curlpost($this->apiurl.$this->balanceurl,$data);
        log_file('结果:'.$ret,'balance');
        return $ret;
    }

    public function curlpost($url, $data)
    {
        //$headers[] = 'Content-Type: multipart/form-data;';

        $host = $url;
       // echo $host;exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $host);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //var_dump(curl_error($ch));
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }


    //生成签名
    public function makesign($data, $appSecret)
    {
        ksort($data);
        $getdata = $data;//除去签名数据
        if (isset($getdata['sign'])) {
            unset($getdata['sign']);
        }
        $signstr = '';
        foreach ($getdata as $key => $val) {
            if ($signstr) {
                $signstr = $signstr . '&' . $key . '=' . $val;
            } else {
                $signstr = $key . '=' . $val;
            }
        }
        $stringSignTemp = $signstr . '&key=' . $appSecret;
        $sign = strtoupper(md5($stringSignTemp));
        return $sign;
    }
}