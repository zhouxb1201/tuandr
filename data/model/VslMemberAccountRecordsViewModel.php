<?php
namespace data\model;

use data\model\BaseModel as BaseModel;
/**
 * 会员账户流水表(积分，余额)
 * @author  www.vslai.com
 *
 */
class VslMemberAccountRecordsViewModel extends BaseModel {
    protected $table = 'vsl_member_account_records';
 /**
     * 获取列表返回数据格式
     * @param unknown $page_index
     * @param unknown $page_size
     * @param unknown $condition
     * @param unknown $order
     * @return unknown
     */
    public function getViewList($page_index, $page_size, $condition, $order){
        $queryList = $this->getViewQuery($page_index, $page_size, $condition, $order);
        $queryCount = $this->getViewCount($condition);
        $list = $this->setReturnList($queryList, $queryCount, $page_size);
        return $list;
    }
    /**
     * 获取列表
     * @param unknown $page_index
     * @param unknown $page_size
     * @param unknown $condition
     * @param unknown $order
     * @return \data\model\multitype:number
     */
    public function getViewQuery($page_index, $page_size, $condition, $order)
    {
        //设置查询视图
        $viewObj = $this->alias('nmar')
        ->join('sys_user su','nmar.uid = su.uid','left')
        ->field('nmar.*, su.nick_name, su.user_name, su.user_tel, su.user_email, su.user_headimg');
        $list = $this->viewPageQuery($viewObj, $page_index, $page_size, $condition, $order);
        return $list;
    }
    /**
     * 获取列表数量
     * @param unknown $condition
     * @return \data\model\unknown
     */
    public function getViewCount($condition)
    {
         $viewObj = $this->alias('nmar')
        ->join('sys_user su','nmar.uid = su.uid','left')
        ->field('nmar.id');
        $count = $this->viewCount($viewObj,$condition);
        return $count;
    }
    
}