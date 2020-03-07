<?php
define('HTTP_CODE_OK', 200);
define('HTTP_CODE_CREATED', 201);
define('HTTP_CODE_NO_CONTENT', 204);
define('HTTP_CODE_BAD_REQUEST', 400);
define('HTTP_CODE_NOT_AUTHORIZED', 401);
define('HTTP_CODE_NOT_FOUND', 404);

class ErrorProcess {
    public function createError($message, $errorCode) {
        http_response_code($errorCode);
        return ['message' => $message];
    }

    public function dieError($message, $errorCode) {
        echo json_encode($this->createError($message, $errorCode));
		die();
    }
}

function setText($val) 
{
	global $displayData;
	$displayData = $val;
}

function printResults($data, $httpCode) {
	setText(json_encode($data));
	http_response_code($httpCode);
}
