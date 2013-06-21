<?php
/**
 * 火狐浏览器Debug函数
 * 将php变量信息在firebug的控制台中显示
 * 注意：此功能可能会使页面UI发生轻微异常，UI设计工作时请关闭此功能
 * @param any_type $msg 变量，任意类型
 */
function FFDEBUG($msg) {
	if (C('FFDEBUG')) {
		echo '<script type="text/javascript">console.log('.json_encode($msg).')</script>',"\n";
	}
	return $msg;
}
/**
 * 列出目录下的所有文件及文件夹
 * @param string $path 路径
 * @return array('dir'=>$dirArray, 'file'=>$fileArray);
 * @author <a href="mailto:duguying2008@gmail.com">李俊</a>
 */
function ls($path) {
	if (!is_dir($path)) {
		throw new Exception('指定目'.$path.'录不存在！');
	}
	$handle = opendir($path);
	$dirArray=array();
	$fileArray=array();
	while (false !== ($file = readdir($handle))) {
		if (is_dir($file)) {
			array_push($dirArray, $file);
		}else{
			array_push($fileArray, $file);
		}
	}
	return array('dir'=>$dirArray, 'file'=>$fileArray);
}
/**
 * 判断是否为低版本的IE浏览器
 * @return boolean 若是IE8,IE7,IE6,IE5, 则返回True否则返回False
 */
function isOldIE() {
	$isOld=false;
	$ua=$_SERVER['HTTP_USER_AGENT'];
	switch (true) {
		case preg_match('/MSIE 5/i', $ua):
			$isOld=true;
			break;
		case preg_match('/MSIE 6/i', $ua):
			$isOld=true;
			break;
		case preg_match('/MSIE 7/i', $ua):
			$isOld=true;
			break;
		case preg_match('/MSIE 8/i', $ua):
			$isOld=true;
			break;
	}
	return $isOld;
}
/**
 * 检查浏览器更新
 */
function chkUpdate() {
	if (isOldIE()) {
		header('Location: http://www.google.cn/intl/zh-CN/chrome/browser/?hl=zh-CN&brand=CHMI');
	}
}
/**
 * 检测php扩展是否存在
 * @param string $ext
 * @return boolean
 */
function dll_exist($ext){
	if(!extension_loaded($ext)){
		return false;
	}else{
		return true;
	}
}
/**
 * 下载文件
 * @param string $url URL
 * @param string $local 保存位置
 * @return Ambigous <number, mixed>
 */
function download($url, $local) {
	import('@.Yuol.Http');
	if (dll_exist('curl')) {
		$r=Http::curlDownload($url, $local);
	}else{
		$content=Http::fsockopenDownload($url);
		$r=file_put_contents($local, $content);
	}
	return $r;
}
