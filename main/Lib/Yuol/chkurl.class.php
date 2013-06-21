<?php
/**
 * 检查URL是否为指定内网类别
 * @author rex
 *
 */
class chkurl{
	public $url;
	public function __construct($url) {
		$this->url=$url;
	}
	public function check() {
		$urlArray=include_once './main/Conf/url_config.php';
		foreach ($urlArray as $value){
			if ($this->match($this->url, $value)) {
				$result= true;
				break;
			}
		}
		if($result){
			return true;
		}else {
			return false;
		}
	}
	public function match($url, $reg) {
		$reg=addcslashes($reg, '/');
		return preg_match('/^'.$reg.'/i', $url);
	}
	/**
	 * 检查URL是否为指定内网类别
	 * @param string $url URL
	 * @return boolean
	 */
	public static function GO($url){
		$c=new chkurl($url);
		return $c->check();
	}
}