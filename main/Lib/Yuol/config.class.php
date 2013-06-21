<?php
/**
 * 配置处理
 * @author 李俊
 *
 */
class config{
	public $configModel;
	
	public function __construct() {
		$this->configModel=M("config");
	}
	/**
	 * 配置设置
	 * @param string $key 键名
	 * @param any $value 键值
	 * @return int 非0，成功
	 */
	private function setc($key, $value) {
		$data['key']=$key;
		$data['value']=base64_encode(json_encode($value));
		if (self::getc($key)) {
			return $this->configModel->where(array('key'=>$key))->save($data);
		}else{
			$this->configModel->add($data);
		}
	}
	/**
	 * 获取配置
	 * @param string $key 键名
	 * @return mixed
	 */
	private function getc($key) {
		$_config=$this->configModel->where(array('key'=>$key))->find();
		return json_decode(base64_decode($_config['value']));
	}
	/**
	 * 配置设置-直接调用
	 * @param string $key 键名
	 * @param any $value 键值
	 * @return int 非0，成功
	 */
	static public function SET($key, $value) {
		$c=new config();
		return $c->setc($key, $value);
	}
	/**
	 * 获取配置-直接调用
	 * @param string $key 键名
	 * @return mixed
	 */
	static public function GET($key) {
		$c=new config();
		return $c->getc($key);
	}
}