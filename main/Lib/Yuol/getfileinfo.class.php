<?php
/**
 * 获取数据库中的文件信息
 * @author rex
 *
 */
class getfileinfo{
	public $fileModel;
	public function __construct() {
		$this->url=$url;
		$this->fileModel=M('files');
	}
	
	/**
	 * 获取数据库中的文件信息
	 * @param unknown $conditionArray
	 * @throws Exception 调用错误，$conditionArray必须为数组！
	 * @return Ambigous <mixed, boolean, NULL, multitype:>
	 */
	public function GET($conditionArray){
		if(!is_array($conditionArray)){
			throw new Exception('调用错误，$conditionArray必须为数组！');
		}
		$result=$this->fileModel->where($conditionArray)->find();
		return $result;
	}
}