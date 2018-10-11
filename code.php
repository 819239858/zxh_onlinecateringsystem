<?php
//凡是与session有关的,之前必须调用函数session_start();
session_start();
define('IN_TG',true);
require dirname(__FILE__).'/includes/common.inc.php';
_code();
function _code($_width = 75, $_height = 25, $_rnd_code = 4) {
	// 创建验证码。
	for ($i = 0; $i < $_rnd_code; $i++) {
		$_nmsg .= dechex(mt_rand(0, 15));//dechex() 函数把十进制转换为十六进制
	}
	//保存在SESSION
	$_SESSION['code'] = $_nmsg;
	// 创建一张图片
	$_img = imagecreatetruecolor($_width, $_height);
	//白色 背景
	$_white = imagecolorallocate($_img, 255, 255, 255);
	//填充
	imagefill($_img, 0, 0, $_white);
	//黑色边框
	$_black = imagecolorallocate($_img, 255, 255, 255);
	imagerectangle($_img, 0, 0, $_width - 1, $_height - 1, $_black);
	//随机划线条
	for ($i = 0; $i < 6; $i++) {
		$_rnd_color = imagecolorallocate($_img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
		imageline($_img, mt_rand(0, $_width), mt_rand(0, $_height), mt_rand(0, $_width), mt_rand(0, $_height), $_rnd_color);
	}
	//随机打雪花
	for ($i = 1; $i < 100; $i++) {
		$_rnd_color = imagecolorallocate($_img, mt_rand(0, 255), mt_rand(200, 255), mt_rand(200, 255));
		imagestring($_img, 1, mt_rand(0, $_white), mt_rand(0, $_height), "*", $_rnd_color);

	}
	// 输出验码；
	for ($i = 0; $i < strlen($_SESSION['code']); $i++) {
		$_rnd_color = imagecolorallocate($_img, mt_rand(0, 150), mt_rand(100, 200), mt_rand(100, 255));
		imagestring($_img, 5, $i * $_width / $_rnd_code, mt_rand(1, $_height / 2), $_SESSION['code'][$i], $_rnd_color);
	}
	//输出图像
	header('Content-Type:image/png');
	imagepng($_img);
	//销毁
	imagedestroy($_img);
}
?>