<?php
class IndexAction extends Action {
	public $config=array();
	public function __construct(){
		$this->config['root']=C('WWW_PATH');
		$this->assign('config' ,$this->config);
		import('@.Yuol.task');
		task::GO();
	}
	/**
	 * 主页
	 */
    public function index(){
    	checkDir();
		import('@.Yuol.url');
		import('@.Yuol.count');
		$this->assign('conf', json_encode($this->config));
		$this->assign('count', count::C());
		if(!isOldIE()){
			$this->display(APP_PATH.'Tpl/index.html');
		}else {
			$urlArray=array();
			$url=$_GET['url'];
			import('@.Yuol.chkurl');
			if ($url) {
				if(!chkurl::GO($url)){
					header("Location:".U('./'));
				};
				import('@.Yuol.store');
				try {
					$fileInfo=store::GET($url);
				} catch (Exception $e) {
				}
				$urlArray['lc']='http://'.$_SERVER['HTTP_HOST'].U('/down/index/'.$fileInfo['id']);
				import('@.Yuol.url');
				$urlArray['th']=url::TH($urlArray['lc']);
				$urlArray['in']=url::IN($url);
				$this->assign('urlArray', $urlArray);
			}
			$this->display(APP_PATH.'Tpl/old/index.html');
		}
    }
    

}