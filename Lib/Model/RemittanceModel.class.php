<?php
/**
 * 银行卡汇款记录表模型
 */

class RemittanceModel extends Model
{
    // 汇款记录id
    public $remittance_id;

    /**
     * 构造函数
     * @author wzh
     * @param $remittance_id 汇款记录ID
     * @return void
     * @todo 初始化汇款记录id
     */
    public function RemittanceModel($remittance_id)
    {
        parent::__construct('remittance');

        if ($remittance_id = intval($remittance_id)) {
            $this->remittance_id = $remittance_id;
        }
    }

    /**
     * 获取汇款记录信息
     * @author wzh
     * @param int $bank_id  汇款记录id
     * @param string $fields 要获取的字段名
     * @return array 汇款记录基本信息
     * @todo 根据where查询条件查找收藏表中的相关数据并返回
     */
    public function getRemittanceInfo($where, $fields = '')
    {
        return $this->field($fields)->where($where)->find();
    }

    /**
     * 修改汇款记录信息
     * @author wzh
     * @param array $arr 汇款记录信息数组
     * @return boolean 操作结果
     * @todo 修改汇款记录信息
     */
    public function saveRemittance($arr)
    {
        return $this->where('remittance_id = ' . $this->remittance_id)->save($arr);
    }

    /**
     * 添加汇款记录
     * @author wzh
     * @param array $arr 汇款信息数组
     * @return boolean 操作结果
     * @todo 添加银行
     */
    public function addRemittance($arr)
    {
        if (!is_array($arr)) {
            return false;
        }

        $arr['addtime'] = time();
        $arr['status'] = 0;
        return $this->add($arr);
    }

    /**
     * 根据where子句获取汇款数量
     * @author wzh
     * @param string|array $where where子句
     * @return int 满足条件的汇款数
     * @todo 根据where子句获取银行数数量
     */
    public function getRemittanceNum($where = '')
    {
        return $this->where($where)->count();
    }

    /**
     * 根据where子句查询汇款信息
     * @author wzh
     * @param string $fields
     * @param string $where
     * @param string $orderby
     * @param string $limit
     * @return array 汇款基本信息
     * @todo 根据SQL查询字句查询汇款信息
     */
    public function getRemittanceList($fields = '', $where = '', $orderby = '', $limit = '')
    {
        return $this->field($fields)->where($where)->order($orderby)->limit()->select();
    }
}
