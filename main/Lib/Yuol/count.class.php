<?php
/**
 * 统计访问次数
 * @author 李俊
 *
 */
class count{
	public $count;
	public function __construct() {
		import('@.Yuol.config');
		$this->count=config::GET('count');
		
	}
	function update() {
		++$this->count;
		config::SET('count', $this->count);
		return $this->count;
	}
	/**
	 * 统计
	 * @return int 当前次数
	 */
	static public function C() {
		$c=new count();
		return $c->update();
	}
}