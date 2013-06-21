<?php
/**
 * 本站下载接口
 * @author rex
 *
 */
class DownAction extends Action {
	//http://localhost/download/index.php/down/index/djhfkasdhf
	//U('/down/index/$id')
	public function index() {
		$file=$_GET['_URL_'][2];
		import('@.Yuol.getmime');
		$filemime=getmime::MIME($file);
		if ($file=='.htaccess') {
			exit();
		}
		$file_c=file_get_contents(C('STORE_PATH').$file);
		echo $file_c;
		header("Content-Disposition:filename=".$file.'.'.$filemime['ftype']);
		header("Content-type:".$filemime['type'].";charset=utf-8");
	}
}