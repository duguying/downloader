<?php
/**
 * 事务处理
 * @author 李俊
 *
 */
class task{
	/**
	 * 上次清理的时间
	 * @var unknown
	 */
	public $taskTime;
	
	public function __construct() {
		import('@.Yuol.config');
		
		$this->taskTime=config::GET('task');
		
	}
	/**
	 * 检查是否到期，并清理
	 * @return Ambigous <number, mixed, boolean, string, unknown>|number
	 */
	public function check() {
		if(!$this->taskTime){
			return config::SET('task', time());
		}elseif($this->taskTime+2592000<time()) {//过期
			config::SET('task', time());
			import('@.Yuol.clean');
			return clean::CLEAN();
		};
	}
	/**
	 * 事务处理<br/>
	 * 每隔1个月清理一次暂存文件夹
	 */
	static public function GO(){
		$t=new task();
		return $t->check();
	}
}