<?php
class getmime{
	public $fileModel;
	public function __construct() {
		$this->fileModel=M('files');
	}
	public function getById($id){
		return $this->fileModel->where(array('id'=>$id))->find();
	}
	/**
	 * 获取指定ID的mime
	 * @param int $id ID
	 */
	public static function MIME($id){
		$id=(int)$id;
		$m=new getmime();
		$resultArray=$m->getById($id);
		$mimeConf=include_once './main/Conf/mime_config.php';
		$ftype=array_keys($mimeConf,$resultArray['type']);
		$resultArray['ftype']=$ftype[0];
		FFDEBUG($resultArray);
		return $resultArray;
	}
}