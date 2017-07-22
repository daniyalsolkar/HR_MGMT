<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interviewer;
use App\Transformers\InterviewerTransformer;
use League\Fractal;

class InterviewerController extends BaseController
{
    //

    public function registerInterviewer(Request $request)
    {
    	$interviewer=Interviewer::create($request->all());
    	if(is_null($interviewer))
    	{
             return $this->sendFailureResponse(11,'Registration Failed');
    	}

    	$response = fractal()
    	->item($interviewer)
	    ->transformWith(new InterviewerTransformer())
    	->toArray();

    	return $response;
    }

}
