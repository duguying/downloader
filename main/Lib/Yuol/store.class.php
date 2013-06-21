<?php
/**
 * 保存文件信息
 * @author rex
 *
 */
class store{
	public $url;
	public $fileModel;
	public $head;
	public function __construct($url) {
		$this->url=$url;
		$this->fileModel=M('files');
		$this->head=get_headers($url,1);
// 		FFDEBUG($this->head);
	}
	/**
	 * 保存文件
	 * @throws Exception
	 */
	public function storeFile() {
		
		$doc_type=include_once APP_PATH.'Conf/mime_config.php';
		foreach ($doc_type as $value) {
			if (!$this->head) {
				throw new Exception('文件不存在！');
			}
			if (((int)$this->head['Content-Length']/1024)>10240){
				throw new Exception('文件超过10M，禁止下载！');
			}
			if ($this->head['Content-Type']==$value) {
				$id=$this->storeInfo();
				$local=C('STORE_PATH').$id;
				$r=Download($this->url, $local);
				$mime_chk=true;
				break;
			}
		}
		if(!$mime_chk){
			throw new Exception('不支持的文件类型！');
		}
	}
	/**
	 * 向数据库中添加文件信息
	 * @return Ambigous <mixed, boolean, string, unknown>
	 */
	private function storeInfo() {
		$data['url'] = $this->url;
		$data['size'] = (int)$this->head['Content-Length'];
		$data['type'] = $this->head['Content-Type'];
		$data['time'] = time();
		return $this->fileModel->add($data);
	}
	/**
	 * 获取文件<br/>
	 * 保存并下载
	 * @param string $url
	 * @return array 文件信息
	 */
	public static function GET($url) {
		$f=new store($url);
		$ir=$f->getdownloadinfo();
		if($ir){//如果文件存在，并且过期，则更新
			//TODO
		}else{
			$f->storeFile();
			return self::GET($url);
		}
		return $ir;
	}
	public function getdownloadinfo(){
		$result=$this->fileModel->where(array('url'=>$this->url))->find();
		return $result;
	}
}
