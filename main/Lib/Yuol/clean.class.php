<?php
/**
 * 清理存储文件夹
 * @author 李俊
 *
 */
class clean{
	private  $dir;
	private $safe_file;
	public function __construct() {
		$dir=ls(C('STORE_PATH'));
		$this->dir=$dir['file'];
		$this->safe_file=<<<YUOL
﻿order allow,deny 
deny from all
YUOL;
	}
	/**
	 * 清除文件夹中的文件
	 */
	public function cleanf() {
		foreach ($this->dir as $value) {
			unlink(C('STORE_PATH').$value);
		};
	}
	/**
	 * 从数据库记录中删除
	 */
	public function cleandb() {
		$file_info=M('files');
		foreach ($this->dir as $value) {
			$file_info->where(array('id'=>$value))->delete();
		};
	}
	/**
	 * 写入安全文件
	 * @return number 非0正常
	 */
	public function setSafe() {
		return file_put_contents(C("STORE_PATH").'.htaccess', $this->safe_file);
	}
	/**
	 * 清理存储文件
	 * @return number 非0正常
	 */
	static public function CLEAN(){
		$c=new clean();
		$c->cleanf();
		$c->cleandb();
		return $c->setSafe();
	}
}