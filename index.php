<?php 
require_once 'connection.php';
require_once 'helpers.php';

$error = new ErrorProcess();

$path_info = !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (!empty($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
$url = explode('/', ltrim($path_info, '/'));

if(count($url) <= 1 && empty($url[0])) {
    $error->dieError('No selector recevied', HTTP_CODE_NOT_FOUND);
}

$displayData = '';
switch($url[0]) {
	case 'uploadFile':
		$tableField = explode ('~', $url[1]); 
		if(count($tableField) !== 2) { $error->dieError('Invalid data received. Must be table~column. Found: "'.$url[1].'"', HTTP_CODE_NOT_FOUND); }
		
		$datas = getEnumValues($tableField[0], $tableField[1]);
		printResults($datas, HTTP_CODE_OK);
		break;
	default:
		$error->dieError('Invalid selector recevied: ' . $url[0], HTTP_CODE_NOT_FOUND);
		break;
}
echo $displayData;
