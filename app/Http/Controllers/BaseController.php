<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    //
    public function sendSuccessResponse($content)
	{
		$response = array();
		$response['status'] = "success";
		$response['response'] = $content;

        return (new response($response,200))
            ->header('Content-Type','application/json');
	}
	
	public function sendFailureResponse($errorCode ,$message="", $content=null)
	{
		$response = array();
		$response['status'] = "failure";
		$response['code'] = $errorCode;

		if(strlen($message)>0)
			$response['message'] = $message;
		
		if($content!=null)
			$response['response'] = $content;
		
	    return (new response($response,201))
        	->header('Content-Type','application/json');
	}
}
