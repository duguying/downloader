<?php
class GeturlAction extends Action {
	/**
	 * 获取下载URL
	 */
	public function index() {
		$urlArray=array();
		$url=$_GET['url'];
		import('@.Yuol.chkurl');
		if(!chkurl::GO($url)){
			header("Location:".U('geturl/err'));
		};
		import('@.Yuol.store');
		try {
			$fileInfo=store::GET($url);
		} catch (Exception $e) {
			$urlArray['error']=$e->getMessage();
		}
		$urlArray['lc']='http://'.$_SERVER['HTTP_HOST'].U('/down/index/'.$fileInfo['id']);
		import('@.Yuol.url');
		$urlArray['th']=url::TH($urlArray['lc']);
		$urlArray['in']=url::IN($url);
		$this->ajaxReturn($urlArray);
	}
	/**
	 * 错误信息
	 */
	public function err() {
		$urlArray['error']="不是指定的内网地址！";
		$this->ajaxReturn($urlArray);
	}
}