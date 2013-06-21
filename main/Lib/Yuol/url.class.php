<?php
class url{
	public $url;
	public function __construct($url){
		$this->url=$url;
	}
	/**
	 * 按照迅雷协议对url进行加密
	 */
	public function thunder() {
		$encode_url='thunder://'.base64_encode('AA'.$this->url.'ZZ');
		return $encode_url;
	}
	/**
	 * 返回迅雷下载地址
	 * @param string $url 原始URL
	 * @return string 迅雷URL
	 */
	static public function TH($url) {
		$u=new url($url);
		return $u->thunder();
	}
	/**
	 * 返回原始内网URL
	 * @param string $url 原始URL
	 * @return string 原始URL
	 */
	static public function IN($url) {
		return $url;
	}
}